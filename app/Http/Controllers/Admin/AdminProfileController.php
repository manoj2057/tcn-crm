<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;



class AdminProfileController extends Controller
{
    // Admin Profile
    public function profile(){
        $user = Auth::guard('admin')->user();
        return view ('admin.profile', compact('user'));
    }

    // Admin Update Profile
    public function updateProfile(Request $request, $id){
        $rules = [
            'email' => 'required|email|max:255',
            'name' => 'required|max:255',
        ];
        $customMessages = [
            'email.required' => 'E-Mail Address is required',
            'email.email' => 'Please enter a valid email address',
            'email.max' => 'You are not allowed to enter more than 255 Characters',
            'name.required' => 'Please provide your first name',
            'name.max' => 'You are not allowed to enter more than 255 Characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $user_id = Auth::guard('admin')->user()->id;
        $admin = Admin::findOrFail($user_id);
        $data = $request->all();
        $admin->name = ucwords(strtolower($data['name']));
        $admin->email = strtolower($data['email']);
        $admin->address = $data['address'];
        $admin->phone = $data['phone'];
        $admin->alt_phone = $data['alt_phone'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random.'.'.$extension;
                $image_path = 'public/uploads/'. $filename;
                // Resize Image Code
                Image::make($image_tmp)->save($image_path);
                // Store image name in products table
                $admin->image = $filename;
            }
        }
        $admin->save();
        Session::flash('success_message', 'Profile has been updated successfully');
        return redirect()->back();
    }



    public function changePassword(){
        $user = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        return view ('admin.change_password', compact('user'));
    }

    // Checking User Current Password
    public function chkUserPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_password'];
        $user_id = Auth::guard('admin')->user()->id;
        $check_password = Admin::where('id', $user_id)->first();
        if (Hash::check($current_password, $check_password->password)){
            return "true"; die;
        }else{
            return "false"; die;
        }
    }


    // Update Password
    public function updatePassword(Request $request, $id){
        $validateData = $request->validate([
            'current_password' => 'required|max:255',
            'password' => 'min:6',
            'pass_confirmation' => 'required_with:password|same:password|min:6'
        ]);
        $user = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        $current_user_password = $user->password;
        $data = $request->all();
        if(Hash::check($data['current_password'], $current_user_password)){
            $user->password = bcrypt($data['password']);
            $user->save();
            Session::flash('info_message', 'Password has been updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error_message', 'Your current password does not match with our database');
            return redirect()->back();
        }
    }
}
