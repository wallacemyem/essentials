<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SignOn</title>
        <!-- Favicon -->
        <link href="{{ asset('signon/') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('signon/') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('signon/') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('signon/') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">

        <div class="main-content">
            @include('signon.layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('signon.layouts.footers.guest')
        @endguest

        <script src="{{ asset('signon/') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('signon/') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        @stack('js')

        <!-- Argon JS -->
        <script src="{{ asset('signon/') }}/js/argon.js?v=1.0.0"></script>
    </body>
</html>
