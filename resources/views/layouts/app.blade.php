<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-4.6.0-dist/css/bootstrap.min.css') }}">
    @yield('css')
</head>
<body class="bg-light">

<div class="container-fluid row pt-3">
    <div class="col-3">
        @include('layouts.partials.left')
    </div>
    <div class="col-9">
        @yield('content')
    </div>
</div>

<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="{{ asset('assets/jquery-3.5.1/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
@yield('js')
</body>
</html>
