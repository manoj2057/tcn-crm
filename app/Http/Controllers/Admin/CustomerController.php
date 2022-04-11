<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Package;
use App\Models\State;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    // Index Page
    public function index(){
        Session::put('admin_page', 'customer');
        return view ('admin.customer.index');
    }

    // Add Customer
    public function add(){
        Session::put('admin_page', 'customer');
        $countries = Country::all();
        $states = State::all();
        $departments = Department::orderBy('department_name', 'ASC')->get();
        return view ('admin.customer.add', compact('countries', 'states', 'departments'));
    }

    // Store Customer
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'company_name' => 'required',
            'department_id' => 'required'
        ];
        $customMessages = [
            'company_name.required' => 'Please enter Company Name',
            'department_id.required' => 'Please Select Group'
        ];
        $this->validate($request, $rules, $customMessages);
        $client = new Customer();

        $generator = Helper::IDGenerator(new Customer(), 'customer_code', 4, 'TCN' );
        $client->customer_code = $generator;
        $client->company_name = $data['company_name'];
        $client->vat = $data['vat'];
        $client->phone = $data['phone'];
        $client->website = $data['website'];
        $client->email = $data['email'];
        $client->address = $data['address'];
        $client->city = $data['city'];
        if(!empty($data['state_id'])) {
            $client->state_id = $data['state_id'];
        }
        if(!empty($data['country_id'])) {
            $client->country_id = $data['country_id'];
        }
        $client->contact_person = $data['contact_person'];
        $client->status = 'active';
        $departments = $data['department_id'];
        $client->save();


        if(!empty($data['colorCheckbox'])){
            $package = new Package();
            $package->customer_id = DB::getPdo()->lastInsertId();
            $package->package_title = $data['package_title'];
            $package->price = $data['price'];
            $package->status = 'active';
            $features[] = $request->features;
            $featuresAll = json_encode($features);
            $package->features = $featuresAll;
            $package->save();

        }

        $client->departments()->attach($departments);
        Session::flash('success_message', 'Client has been saved successfully');
        return redirect()->back();
    }

    public function dataTable(){
        $model = Customer::orderBy('company_name', 'ASC')->get();
        return DataTables::of($model)
            ->addColumn('action', function ($model){
                return view ('admin.customer._actions', [
                    'model' => $model,
                    'url_edit' => route('client.edit', $model->id),
                ]);
            })
            ->addColumn('group', function ($model){
                return view('admin.customer._group', [
                    'model' => $model,
                ]);
            })
            ->editColumn('company_name', function ($model){
                return view('admin.customer._name', [
                    'model' => $model,
                ]);
            })
            ->editColumn('status', function ($model){
                return view('admin.customer._status', [
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


    public function changeStatus(Request $request){
        $customers = Customer::findOrFail($request->member_id);
        $customers->status = $request->status;
        $customers->save();
    }


    // Edit Customer
    public function edit($id){
        Session::put('admin_page', 'customer');
        $client = Customer::findOrFail($id);
        $countries = Country::all();
        $states = State::all();
        $departments = Department::orderBy('department_name', 'ASC')->get();
        $client_department = $client->departments()->pluck('department_id')->toArray();
        $package = Package::where('customer_id', $id)->first();
        return view ('admin.customer.edit', compact('countries', 'states', 'departments', 'client', 'client_department', 'package'));
    }

    // Store Customer
    public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'company_name' => 'required'
        ];
        $customMessages = [
            'company_name.required' => 'Please enter Company Name'
        ];
        $this->validate($request, $rules, $customMessages);
        $client = Customer::findOrFail($id);
        $client->company_name = $data['company_name'];
        $client->vat = $data['vat'];
        $client->phone = $data['phone'];
        $client->website = $data['website'];
        $client->email = $data['email'];
        $client->address = $data['address'];
        $client->city = $data['city'];
        if(!empty($data['state_id'])) {
            $client->state_id = $data['state_id'];
        }
        if(!empty($data['country_id'])) {
            $client->country_id = $data['country_id'];
        }
        $client->contact_person = $data['contact_person'];
        $departments = $data['department_id'];
        $client->save();
        $client->departments()->sync($departments);
        Session::flash('success_message', 'Client has been Updated successfully');
        return redirect()->back();
    }

    // Delete
    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->back()->with('success_message', 'Client Has Been Deleted Successfully');
    }

    // Clients Details
    public function clientsDetail($id){
        Session::put('admin_page', 'customer');
        $client = Customer::findOrFail($id);
        $countries = Country::all();
        $states = State::all();
        $departments = Department::orderBy('department_name', 'ASC')->get();
        $client_department = $client->departments()->pluck('department_id')->toArray();
        $packageDetail = Package::where('customer_id', $id)->first();
        return view ('admin.customer.detail', compact('client', 'countries', 'states', 'departments', 'client_department', 'packageDetail'));
    }

    // Package Details
    public function clientPackage($id){
        Session::put('admin_page', 'customer');
        $client = Customer::findOrFail($id);
        $packageCount = Package::where('customer_id', $client->id)->count();
        $package = Package::where('customer_id', $client->id)->first();
        return view ('admin.customer.package', compact('client', 'packageCount', 'package'));
    }
}
