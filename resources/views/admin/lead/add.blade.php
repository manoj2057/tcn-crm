@extends('admin.includes.admin_design')

@section('title') Add New Lead @endsection

@section('content')
    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Leads</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lead.index') }}">Leads</a></li>
                        <li class="breadcrumb-item active">Add New Lead</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('lead.index') }}" class="btn add-btn"><i class="fa fa-eye"></i> View All Leads</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        @include('admin.includes._message')


        <div class="row">
            <div class="col-md-12">
                <div class="card mb-0">

                    <div class="card-body">
                        <form action="{{ route('lead.store') }}" method="post">
                            @csrf
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="source">Sources</label>
                                            <div class="input-group">
                                                <select class="select form-control department" name="source_id" id="source_id">
                                                    @foreach($sources as $source)
                                                        <option value="{{ $source->id }}">{{ $source->name }}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                        </div>
                                            
                                        <div class="form-group">
                                            <label for="company_name">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
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
                                            <label for="source">Status</label>
                                            <div class="input-group">
                                                <select class="select form-control department" name="status" id="status">
                                                        <option value="New">New</option>
                                                        <option value="Contacted">Contacted</option>
                                                        <option value="Inprocess">In Process</option>
                                            
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            
                                    
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="source">Assigned to</label>
                                        <div class="input-group">
                                            <select class="select form-control department" name="admin_id" id="admin_id" >
                                                @foreach($admins as $admin)
                                                    <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Comment </label>
                                        <textarea class="form-control" name="comment" id="comment" value="{{ old('email') }}"></textarea>
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