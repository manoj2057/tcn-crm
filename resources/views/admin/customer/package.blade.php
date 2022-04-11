@extends('admin.includes.admin_design')

@section('title') Package Details for {{ $client->company_name }} @endsection

@section('content')
    <div class="page-header">
        <div class="row ">
            <div class="col">
                <h3 class="page-title">{{ $client->company_name }} Details</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Package Details</li>
                </ul>
            </div>
            @if($packageCount == 0)
            <div class="col-auto float-right ml-auto">
                <a href="departments.html#" class="btn add-btn" ><i class="fa fa-plus"></i> Add Department</a>
            </div>
                @endif
        </div>
    </div>


    <div class="card">
        <div class="card-body">

            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                <li class="nav-item"><a class="nav-link" href="{{ route('clientsDetail', $client->id) }}">Profile</a></li>
                @php $packageCount = \App\Models\Package::where('customer_id', $client->id)->count(); @endphp
                @if($packageCount > 0)
                <li class="nav-item"><a class="nav-link active" href="{{ route('clientPackage', $client->id) }}">Package Details </a></li>
                @endif
                <li class="nav-item"><a class="nav-link" href="saved-jobs.html">Saved</a></li>
                <li class="nav-item"><a class="nav-link" href="applied-jobs.html">Applied</a></li>
                <li class="nav-item"><a class="nav-link" href="interviewing.html">Interviewing</a></li>
            </ul>
        </div>
    </div>


    @include('admin.includes._message')


    <div class="row">

        <div class="col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title m-b-15">Package details:</h6>
                    <table class="table table-striped table-border">
                        <tbody>
                        <tr>
                            <td>Package Title:</td>
                            <td class="text-right">{{ $package->package_title }}</td>
                        </tr>

                        <tr>
                            <td>Package Price:</td>
                            <td class="text-right">Rs. {{ $package->price }}</td>
                        </tr>

                        <tr>
                            <td>Package Status:</td>
                            <td class="text-right">
                                <select name="status" id="status" class="form-control" >
                                    <option value="active" @if($package->status == "active") selected @endif>Active</option>
                                    <option value="inactive" @if($package->status == "inactive") selected @endif>In Active</option>
                                    <option value="onhold" @if($package->status == "onhold") selected @endif>On Hold</option>
                                    <option value="cancelled" @if($package->status == "cancelled") selected @endif>Cancelled</option>
                                </select>
                            </td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="project-title">
                        <table class="table table-striped table-border">
                            <tbody>
                            <tr>
                                <td>Package Features:</td>
                                <td class="text-right"></td>
                            </tr>

                            <tr>
                                @php $resp = json_decode($package->features) @endphp
                                <td colspan="2">
                                    @for($i=0; $i < sizeof($resp[0]); $i++)
                                        <li>{{ $resp[0][$i] }}</li>
                                    @endfor
                                </td>
                            </tr>



                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
