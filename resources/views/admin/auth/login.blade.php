<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin Login </title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/backend/assets/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/font-awesome.min.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/style.css') }}">
</head>
<body class="account-page">

<!-- Main Wrapper -->
<div class="main-wrapper">
    <div class="account-content">
        <div class="container">

            <!-- Account Logo -->
            <div class="account-logo">
                <a href="{{ route('adminLogin') }}"><img src="{{ asset('public/backend/assets/img/logo2.png') }}" alt="Dreamguy's Technologies"></a>
            </div>
            <!-- /Account Logo -->

            <div class="account-box">
                <div class="account-wrapper">
                    <h3 class="account-title">Login</h3>
                    <p class="account-subtitle">Access to our dashboard</p>


                   @include('admin.includes._message')


                    <!-- Account Form -->
                    <form action="{{ route('loginAdmin') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input class="form-control" type="email" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="password">Password</label>
                                </div>
                                <div class="col-auto">
                                    <a class="text-muted" href="forgot-password.html">
                                        Forgot password?
                                    </a>
                                </div>
                            </div>
                            <input class="form-control" type="password" id="password" name="password">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Login</button>
                        </div>
                        <div class="account-footer">
                            <p>Don't have an account yet? <a href="register.html">Register</a></p>
                        </div>
                    </form>
                    <!-- /Account Form -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{ asset('public/backend/assets/js/jquery-3.2.1.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('public/backend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/js/bootstrap.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('public/backend/assets/js/app.js') }}"></script>

</body>
</html>
