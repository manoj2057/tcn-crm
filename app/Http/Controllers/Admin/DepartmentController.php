<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller
{
    // Index Page
    public function index(){
        Session::put('admin_page', 'department');
        return view ('admin.department.index');
    }

    // Store Department
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'department_name' => 'required'
        ];
        $customMessages = [
            'department_name.required' => 'Please enter Department Name'
        ];
        $this->validate($request, $rules, $customMessages);
        $department = new Department();
        $department->department_name = $data['department_name'];
        $department->email = $data['email'];
        $department->save();
        Session::flash('success_message', 'Department has been saved successfully');
        return redirect()->back();
    }

    public function dataTable(){
        $model = Department::orderBy('department_name', 'ASC')->get();
        return DataTables::of($model)
            ->addColumn('action', function ($model){
                return view ('admin.department._actions', [
                    'model' => $model,
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    // Update Department
    public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'department_name' => 'required'
        ];
        $customMessages = [
            'department_name.required' => 'Please enter Department Name'
        ];
        $this->validate($request, $rules, $customMessages);
        $department = Department::findOrFail($id);
        $department->department_name = $data['department_name'];
        $department->email = $data['email'];
        $department->save();
        Session::flash('info_message', 'Department has been updated successfully');
        return redirect()->back();
    }

    // Delete
    public function destroy($id){
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->back()->with('success_message', 'Department Has Been Deleted Successfully');
    }
}
