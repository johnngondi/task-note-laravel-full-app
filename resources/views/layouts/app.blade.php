<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Task & Note Manager') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/brand/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/libraries/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/fa/all.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    @yield('aux-style')

</head>
<body>
<section class="container">
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-2 col-sm-1 col-xs-12"></div>

        <div class="col-xl-4 col-lg-4 col-md-8 col-sm-10 col-xs-12">
            <div class="body pt-4">
                <div class="row mt-2 animated fadeInDown">
                    <div class="col-4 pl-5">
                        <img alt="logo" src="{{ asset('images/brand/logo-128.png') }}" width="50px">
                    </div>
                    <div class="col-8 text-right pr-5 pt-3">
                        @yield('actions')
                    </div>
                </div>

                @yield('content')

            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-2 col-sm-1 col-xs-12"></div>
    </div>
</section>

    @yield('pop-ups')

    @include('components.toast')

</body>
<script type="text/javascript" src="{{ asset('js/libraries/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/libraries/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

    @yield('custom-js')

</html>
