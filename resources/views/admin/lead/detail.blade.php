@extends('admin.includes.admin_design')

@section('title')  Lead Details- {{ $leads->name }} @endsection

@section('content')
    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $leads->name }} Details</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Lead Details</li>
                    </ul>
                </div>
                
            </div>
        </div>
        <!-- /Page Header -->

        @include('admin.includes._message')


        <div class="row">
            <div class="col-md-12">
                <div class="card mb-0">

                    <div class="card-body">
                        <form action="{{ route('lead.update', $leads->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="vat">Lead</label>
                                        <div class="input-group">
                                            <select class="select form-control department" name="source_id" id="department_id">
                                                @foreach($sources as $source)
                                                    <option value="{{ $source->id }}" {{ $source->id == $leads->source_id ? 'selected' : '' }}>{{ $source->name }}</option>
                                                @endforeach
                                            </select>
                                           
                                        </div>
                                    </div>
                                   

                                    <div class="form-group">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ $leads->name }}">
                                    </div>
                                    
                                   
                                    <div class="form-group">
                                        <label for="email">E-Mail Address </label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $leads->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone </label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $leads->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="source">Status</label>
                                        <div class="input-group">
                                            <select class="select form-control department" name="status" id="status">
                                                
                                                <option value="New" {{ $leads->status == 'New' ? 'selected' : '' }}>New</option>
                                                <option value="Contacted" {{ $leads->status == 'Contacted' ? 'selected' : '' }}>Contacted</option>
                                                
                                                <option value="Inprocess" {{ $leads->status == 'Inprocess' ? 'selected' : '' }}>In Process</option>
                                        
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="source">Assigned to</label>
                                        <div class="input-group">
                                            <select class="select form-control department" name="admin_id" id="admin_id" >
                                                @foreach($admins as $admin)
                                                    <option value="{{ $admin->id }}" {{ $admin->id == $leads->admin_id ? 'selected' : '' }}>{{ $admin->name }}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @php
                                    $comments = App\Models\Comment::latest()->get();
                                    @endphp
                                    <div class="container">
                                        <div class="wrapper">
                                          <h1>All Comments</h1>
                                          <ul class="sessions">
                                          <li>
                                            <div class="time">{{$leads->created_at}}</div>
                                            <div class="author">{{$admin->name}}</div>
                                            <p>{{$leads->comment}}</p>
                                          </li>
                                
                                          
                                          
                                        </ul>

                                          <ul class="sessions">
                                              @foreach($comments as $comment)
                                            <li>
                                              <div class="time">{{$comment->created_at}}</div>
                                              <div class="author">{{$admin->name}}</div>
                                              <p>{{$comment->comment}}</p>
                                            </li>
                                            @endforeach
                                            
                                            
                                          </ul>
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