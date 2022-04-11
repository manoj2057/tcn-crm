@extends('admin.includes.admin_design_v2')

@section('title') General Settings @endsection

@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">General Settings</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                @include('admin.includes._message')

                <form method="post" action="{{ route('generalSettingsUpdate', $settings->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">App Title</label>
                        <div class="col-lg-9">
                            <input name="app_title" id="app_title" class="form-control" value="{{ $settings->app_title }}" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Logo</label>
                        <div class="col-lg-9">
                            <input type="file" class="form-control" name="logo" id="logo">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label"></label>
                        <div class="col-lg-9">
                            <img src="{{ asset('public/uploads/settings/'.$settings->logo) }}" class="img-fluid settings-image img-thumbnail" width="300" height="40" alt="">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Favicon</label>
                        <div class="col-lg-7">
                            <input type="file" class="form-control" name="favicon" id="favicon">
                            <span class="form-text text-muted">Recommended image size is 16px x 16px</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label"></label>
                        <div class="col-lg-9">
                            <img src="{{ asset('public/uploads/settings/'.$settings->favicon) }}" class="img-fluid settings-image img-thumbnail" style="height: 50px;">
                        </div>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

@endsection
