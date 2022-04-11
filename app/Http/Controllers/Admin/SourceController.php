<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Source;


class SourceController extends Controller
{
    public function index(){
        Session::put('admin_page', 'source');
        return view ('admin.source.index');
    }

    // Add Customer
    public function add(){
        Session::put('admin_page', 'source');
        $sources = Source::all();
        return view ('admin.source.add', compact('sources'));
    }

    // Store Customer
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'name' => 'required',
            
        ];
        $customMessages = [
            'name.required' => 'Please enter source Name',
            
        ];
        $this->validate($request, $rules, $customMessages);
        $source = new Source();
        $source->name = $data['name'];  
        $source->save();
        Session::flash('success_message', 'Source has been saved successfully');
        return redirect()->back();

    }

    public function dataTable(){
        $model = Source::orderBy('name', 'ASC')->get();
        return DataTables::of($model)
            ->addColumn('action', function ($model){
                return view ('admin.source._actions', [
                    'model' => $model,
                    
                ]);
            })
            
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }


    // Edit Source
    public function edit($id){
        Session::put('admin_page', 'source');
        $sources = Source::findOrFail($id);
        return view ('admin.source.edit', compact('sources', ));
    }

    // Store Customer
    public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'name' => 'required'
        ];
        $customMessages = [
            'name.required' => 'Please enter source Name'
        ];
        $this->validate($request, $rules, $customMessages);
       $source = Source::findOrFail($id);
       $source->name = $data['name'];
       
        $source->save();
        Session::flash('success_message', 'source has been Updated successfully');
        return redirect()->back();
    }

    // Delete
    public function destroy($id){
        $customer = Source::findOrFail($id);
        $customer->delete();
        return redirect()->back()->with('success_message', 'Client Has Been Deleted Successfully');
    }
}
