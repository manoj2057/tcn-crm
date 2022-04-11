<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/backend/assets/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/bootstrap.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/font-awesome.min.css') }}">
    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/line-awesome.min.css') }}">
    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/plugins/morris/morris.css') }}">
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/dataTables.bootstrap4.min.css') }}">
    <!-- Sweet Alert CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/sweetalert.css') }}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"/>
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/style.css') }}">
    <style>
        .box{
            display: none;
        }
    </style>
</head>
