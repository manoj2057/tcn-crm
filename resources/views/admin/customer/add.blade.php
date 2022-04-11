@extends('admin.includes.admin_design')

@section('title') Add New Client @endsection

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
                        <li class="breadcrumb-item active">Add New Client</li>
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
                        <form action="{{ route('client.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_name">Company Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="company_name" id="company_name" value="{{ old('company_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_person">Contact Person </label>
                                        <input type="text" class="form-control" name="contact_person" id="contact_person" value="{{ old('contact_person') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone </label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-Mail Address </label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="vat">VAT/PAN Number</label>
                                        <input type="number" class="form-control" name="vat" id="vat" value="{{ old('vat') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="vat">Groups</label>
                                        <div class="input-group">
                                            <select class="select form-control department" name="department_id[]" id="department_id" multiple>
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
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
                                                <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="website">Website</label>
                                                <input type="text" class="form-control" name="website" id="website" value="{{ old('website') }}">
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
                                                    <option value="{{ $country->id }}">{{ $country->nicename }}</option>
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
                                                        <option value="{{ $state->id }}">{{ $state->province_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <input  id="colorCheckbox" type="checkbox" name="colorCheckbox" value="red"> &nbsp; &nbsp;
                                    <label for="colorCheckbox"> Add Package</label>
                                </div>
                            </div>

                            <div class="red box ">
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="package_title">Package Title</label>
                                        <input type="text" class="form-control" name="package_title" id="package_title" value="{{ old('package_title') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Package Price</label>
                                        <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}">
                                    </div>
                                </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Package Features <span class="text-danger">*</span></label>
                                            <div class="field-wrapper">
                                                <div class="input-group">
                                                    <input type="text" class="form-control bg-transparent" placeholder="Features"  name="features[]" style="margin-bottom: 4px;">
                                                    <a href="javascript:void(0);" class="add_button" title="Add Field" style="margin-top: 10px;">
                                                        <img src="{{ asset('public/default/add-icon.png') }}" alt="" style="margin-left: 20px">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /Page Content -->


    <!-- Add Department Modal -->
    <div id="add_department" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('department.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="department_name">Department Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="department_name" id="department_name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Department Email </label>
                            <input class="form-control" type="text" name="email" id="email">
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Department Modal -->

@endsection

@section('js')

    <style>
        .box{
            display: none;
        }
    </style>

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


    <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field-wrapper'); //Input field wrapper
            var fieldHTML = '<div class="field-wrapper">\n' +
                '                                    <div class="input-group">\n' +
                '                                        <input type="text" class="form-control bg-transparent" placeholder="Features" data-validation="length" data-validation-length="min1" data-validation-error-msg="Please enter Feature" name="features[]" style="margin-bottom: 4px;">\n' +
                '                                        <a href="javascript:void(0);" class="remove_button " title="Add Field" style="margin-top: 10px;">\n' +
                '                                            <img src="{{ asset('public/default/remove-icon.png') }}" style="margin-left: 20px">\n' +
                '                                        </a>\n' +
                '                                    </div>\n' +
                '                                </div>'; //New input field html

            var x = 1; //Initial field counter is 1


            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });

        });
    </script>
    @endsection
