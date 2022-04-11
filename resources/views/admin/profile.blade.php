@extends('admin.includes.admin_design')

@section('title') {{ $user->name }} Profile @endsection


@section('content')
    <!-- Page Content -->
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Edit Profile</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                @include('admin.includes._message')

                <form method="post" action="{{ route('updateProfile', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name"> Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="{{ $user->name }}" name="name" id="name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">E-Mail Address <span class="text-danger">*</span></label>
                                <input class="form-control " value="{{ $user->email }}" name="email" id="email" type="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input class="form-control " value="{{ $user->address }}" type="text" name="address" id="address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input class="form-control" value="{{ $user->phone }}" name="phone" id="phone" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="alt_phone">Alternate Phone</label>
                                <input class="form-control" value="{{ $user->alt_phone }}" type="text" name="alt_phone" id="alt_phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="image">Profile Image</label>
                                <input class="form-control" name="image" id="image" type="file" accept="image/*" onchange="readURL(this);">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            @if(empty($user->image))
                                <img src="{{ asset('public/backend/assets/img/profiles/avatar-02.jpg') }}" style="width: 100px" id="one">
                            @else
                                <img src="{{ asset('public/uploads/'.$user->image) }}" style="width: 100px" id="one">
                            @endif
                        </div>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
@endsection

@section('js')
    <script type="text/javascript">
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(100)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
