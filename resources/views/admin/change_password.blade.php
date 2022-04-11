@extends('admin.includes.admin_design')

@section('site_title') Change Password  @endsection


@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Change Password
                                <label class="float-right" style="font-size: 14px">(<span class="text-danger">*</span>) Mandatory</label>
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                @if(Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="height: 40px; padding: 10px;">
                        {{ Session::get('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="position: relative; top: -10px;">&times;</span>
                        </button>
                    </div>
                @endif
                @if(Session::has('info_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="height: 40px; padding: 10px;">
                        {{ Session::get('info_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="position: relative; top: -10px;">&times;</span>
                        </button>
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger" >
                        <ul style="list-style: none; ">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('updatePassword', $user->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Old password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="current_password"
                               placeholder="Enter Current Password" name="current_password" >

                        <p id="correct_password">
                        </p>
                    </div>
                    <div class="form-group">
                        <label>New password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="pass_confirmation"
                               placeholder="Enter New Password" name="password">
                    </div>
                    <div class="form-group">
                        <label>Confirm password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="pass"
                               placeholder="Confirm Password" name="pass_confirmation" >
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
@endsection

@section('js')
    <script>
        $("#current_password").keyup( function () {
            var current_password = $("#current_password").val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: 'check-password',
                data: {
                    current_password:current_password},
                success: function (resp) {
                    if(resp =="true"){
                        $("#correct_password").text("Current Password Matches").css("color", "green");
                    } else if (resp =="false"){
                        $("#correct_password").text("Password Does Not Match").css("color", "rgb(185, 74, 72)");
                    }
                }, error: function (resp) {
                    alert("Error");
                }

            });
        });
    </script>
@endsection
