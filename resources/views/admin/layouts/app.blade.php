<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/admin/dist/css/bootstrap.min.css') }}" rel="stylesheet">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
@yield('css')

<!-- Custom styles for this template -->
    <link href="{{ asset('assets/admin/css/dashboard.css') }}" rel="stylesheet">
</head>
<body>

@include('admin.layouts.partials.nav')

<div class="container-fluid">
    <div class="row">
        @include('admin.layouts.partials.left')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            @yield('content')
        </main>
    </div>
</div>


<script src="{{ asset('assets/jquery-3.5.1/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('assets/admin/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
@yield('js')
</body>
</html>
