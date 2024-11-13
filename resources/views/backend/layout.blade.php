<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <title>LMS | @yield('title')</title>
    <style>
        .main-content {
            margin-left: 280px;
            padding: 20px;
        }
        .sidebar {
            width: 280px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        @include('backend.components.navbar')
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    @include("backend.components.footer")
</body>
</html>
