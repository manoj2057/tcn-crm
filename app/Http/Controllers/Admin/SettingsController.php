<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    // General Settings
    public function generalSettings(){
        Session::put('admin_page', 'general');
        $settings = GeneralSetting::first();
        return view ('admin.settings.general', compact('settings'));
    }

    // Update General Settings
    public function generalSettingsUpdate(Request $request, $id){
        $setting = GeneralSetting::findOrFail($id);
        $data = $request->all();
        $rules = [
            'app_title' => 'required|max:255',
        ];
        $customMessages = [
            'app_title.required' => 'App Title is required',
            'app_title.max' => 'You are not allowed to enter more than 255 Characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $setting->app_title = $data['app_title'];

        $slug = Str::slug($data['app_title']);
        $currentDate = Carbon::now()->toDateString();
        if ($request->hasFile('logo')) {
            $image_tmp = $request->file('logo');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $slug . '-' . $currentDate . '.' . $extension;
                $image_path = 'public/uploads/settings/' . $filename;
                // Resize Image Code
                Image::make($image_tmp)->save($image_path);
                // Store image name in products table
                $setting->logo = $filename;
            }
        }
        $slug2 = "favicon";
        if ($request->hasFile('favicon')) {
            $image_tmp = $request->file('favicon');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $slug2 . '-' . $currentDate . '.' . $extension;
                $image_path = 'public/uploads/settings/' . $filename;
                // Resize Image Code
                Image::make($image_tmp)->save($image_path);
                // Store image name in products table
                $setting->favicon = $filename;
            }
        }
        $setting->save();
        Session::flash('success_message', 'General Settings has been saved successfully');
        return redirect()->back();
    }
}
