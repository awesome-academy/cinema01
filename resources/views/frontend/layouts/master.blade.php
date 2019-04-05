<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ __('label.title') }}</title>
    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">
    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Roboto -->
    <link href='{{ asset('bower_components/css/index') }}' rel='stylesheet' type='text/css'>
    <!-- Stylesheets -->
    <!-- Mobile menu -->
    <link href="{{ asset('bower_components/xp_css/css/gozha-nav.css') }}" rel="stylesheet" />
    <!-- Select -->
    <link href="{{ asset('bower_components/xp_css/css/external/jquery.selectbox.css') }}" rel="stylesheet" />
    <!-- Custom -->
    <link href="{{ asset('bower_components/xp_css/css/style.css?v=1') }}" rel="stylesheet" />
    <!-- Modernizr --> 
    <script src="{{ asset('bower_components/xp_css/js/external/modernizr.custom.js') }}"></script>
</head>
<body>
    <div class="wrapper">
        <!--Header-->
        @include('frontend.layouts.header')
        <!--Content-->
        @yield('content')
        <!--Footer -->
        @include('frontend.layouts.footer')
        <!-- JavaScript-->
        <!-- jQuery --> 
        <script src="{{ asset('bower_components/jquery.min/index.js') }}"></script>
        <script>window.jQuery || document.write('<script src="{{ asset('bower_components/xp_css/js/external/jquery-1.10.1.min.js') }}"><\/script>')</script>
        <!-- Migrate --> 
        <script src="{{ asset('bower_components/xp_css/js/external/jquery-migrate-1.2.1.min.js') }}"></script>
        <!-- Bootstrap 3--> 
        <script src="{{ asset('bower_components/jquery.min/index.js') }}"></script>
        <!-- Mobile menu -->
        <script src="{{ asset('bower_components/xp_css/js/jquery.mobile.menu.js') }}"></script>
         <!-- Select -->
        <script src="{{ asset('bower_components/xp_css/js/external/jquery.selectbox-0.2.min.js') }}"></script>
        <!-- Form element -->
        <script src="{{ asset('bower_components/xp_css/js/external/form-element.js') }}"></script>
        <!-- Form validation -->
        <script src="{{ asset('bower_components/xp_css/js/form.js') }}"></script>
        <!-- Custom -->
        <script src="{{ asset('bower_components/xp_css/js/custom.js') }}"></script>
    </div>
</body>
</html>