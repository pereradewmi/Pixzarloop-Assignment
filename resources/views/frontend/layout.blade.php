<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css" />
    <title>LMS | @yield('title')</title>
</head>

<body>

    <div class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    @include('frontend.components.footer')
    
</body>

</html>
