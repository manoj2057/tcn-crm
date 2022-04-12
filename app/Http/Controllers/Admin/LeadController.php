<?php

namespace App\Http\Controllers\Admin;
use http\Client;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Source;
use App\Models\Admin;
use App\Models\Lead;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
class LeadController extends Controller
{
    public function index(){
        Session::put('admin_page', 'lead');
        return view ('admin.lead.index');
    }

    // Add lead
    public function add(){
        Session::put('admin_page', 'lead');
        $leads = Lead::all();
        $admins = Admin::orderBy('name', 'ASC')->get();
        $sources = Source::orderBy('name', 'ASC')->get();
        return view ('admin.lead.add', compact('leads', 'admins', 'sources'));
    }

    // Store lead
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'name' => 'required',
            
        ];
        $customMessages = [
            'name.required' => 'Please enter  Name',
           
        ];
        $this->validate($request, $rules, $customMessages);
        $lead = new Lead();
        $lead->name = $data['name'];
        $lead->email = $data['email'];
        $lead->phone = $data['phone'];
        $lead->admin_id =$data['admin_id'];
        $lead->source_id=$data['source_id'];
        $lead->status = $data['status'];
        $lead->comment = $data['comment'];
        $lead->save();
        Session::flash('success_message', 'Client has been saved successfully');
        return redirect()->back();
    }


    public function dataTable(){
        $model = lead::orderBy('name', 'ASC')->get();
        return DataTables::of($model)
            ->addColumn('action', function ($model){
                return view ('admin.lead._actions', [
                    'model' => $model,
                    'url_edit' => route('lead.edit', $model->id),
                    'url_delete' => route('lead.destroy', $model->id),

                ]);
            })
            ->editColumn('name', function ($model){
                return view('admin.lead._name', [
                    'model' => $model,
                ]);
            })

            ->editColumn('created_at', function ($model){
               return $model->created_at->format('M, d Y h:i A');
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }


    // Edit lead
    public function edit($id){
        Session::put('admin_page', 'lead');
        $leads = Lead::findOrFail($id);
        $admins = Admin::orderBy('name', 'ASC')->get();
        $sources = Source::orderBy('name', 'ASC')->get();
        
        return view ('admin.lead.edit', compact('leads', 'admins', 'sources'));
    }

    // Store lead
    public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'name' => 'required'
        ];
        $customMessages = [
            'name.required' => 'Please enter  Name'
        ];
        $this->validate($request, $rules, $customMessages);
        $lead = Lead::findOrFail($id);
        $lead->name = $data['name'];
        $lead->email = $data['email'];
        $lead->phone = $data['phone'];
        $lead->admin_id =$data['admin_id'];
        $lead->source_id=$data['source_id'];
        $lead->status = $data['status'];
        $lead->comment = $data['comment'];
        $lead->save();
        Session::flash('success_message', 'Client has been Updated successfully');
        return redirect()->back();
    }

    // Delete
    public function destroy($id){
        $lead = Lead::findOrFail($id);
        $lead->delete();
        return redirect()->back()->with('success_message', 'Client Has Been Deleted Successfully');
    }

    // lead Details
    public function leadDetail($id){
        Session::put('admin_page', 'lead');
        $leads = Lead::findOrFail($id);
        $admins = Admin::orderBy('name', 'ASC')->get();
        $sources = Source::orderBy('name', 'ASC')->get();
        
        return view ('admin.lead.detail', compact('leads', 'admins', 'sources'));
    }

    //store comment
    public function storeComment(Request $request){
        $data = $request->all();
        $rules = [
            'comment' => 'required',
            
        ];
        $customMessages = [
            'comment.required' => 'Please enter  Name',
           
        ];
        $this->validate($request, $rules, $customMessages);
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->save();
        Session::flash('success_message', 'comment has been saved successfully');
        return redirect()->back();
    }

    
}
