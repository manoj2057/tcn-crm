@extends('admin.includes.admin_design')

@section('title') Edit Client - {{ $client->company_name }} @endsection

@section('content')
    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Clients</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Clients</a></li>
                        <li class="breadcrumb-item active">Edit Client</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('client.index') }}" class="btn add-btn"><i class="fa fa-eye"></i> View All Clients</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        @include('admin.includes._message')


        <div class="row">
            <div class="col-md-12">
                <div class="card mb-0">

                    <div class="card-body">
                        <form action="{{ route('client.update', $client->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_name">Company Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="company_name" id="company_name" value="{{ $client->company_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_person">Contact Person </label>
                                        <input type="text" class="form-control" name="contact_person" id="contact_person" value="{{ $client->contact_person }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone </label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $client->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-Mail Address </label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $client->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="vat">VAT/PAN Number</label>
                                        <input type="number" class="form-control" name="vat" id="vat" value="{{ $client->vat }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="vat">Groups</label>
                                        <div class="input-group">
                                            <select class="select form-control department" name="department_id[]" id="department_id" multiple>
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}" {{ in_array($department->id, $client_department) ? 'selected' : '' }}>{{ $department->department_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-white" data-toggle="modal" data-target="#add_department"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>







                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" name="address" id="address" value="{{ $client->address }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" name="city" id="city" value="{{ $client->city }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="website">Website</label>
                                                <input type="text" class="form-control" name="website" id="website" value="{{ $client->website }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country_id">Country:</label>
                                                <select class="select" name="country_id" id="country_id">
                                                    <option selected disabled>Select Country</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{ $country->id }}" {{ $country->id == $client->country_id ? 'selected' : '' }}>{{ $country->nicename }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state_id">State/Province:</label>
                                                <select class="select" name="state_id" id="state_id">
                                                    <option selected disabled>Select State</option>
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}" {{ $state->id == $client->state_id ? 'selected' : '' }}>{{ $state->province_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Information</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /Page Content -->


   

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.department').select2({
                placeholder: 'Nothing Selected'
            });
        });
    </script>


    <script>
        $(document).ready(function(){
            $('input[type="checkbox"]').click(function(){
                var inputValue = $(this).attr("value");
                $("." + inputValue).toggle();
            });
        });
    </script>
    @endsection