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
    <!-- Open Sans -->
    <link href='{{ asset('bower_components/css/index') }}' rel='stylesheet' type='text/css'>
    <!-- Stylesheets -->
    <link href='{{ asset('bower_components/bootstrap.min/index.css') }}' rel='stylesheet' type='text/css'>
    <!-- jQuery UI --> 
    <link href="{{ asset('bower_components/jquery-ui1/index.css') }}" rel="stylesheet">
    <!-- Mobile menu -->
    <link href="{{ asset('bower_components/xp_css/css/gozha-nav.css') }}" rel="stylesheet" />
    <!-- Select -->
    <link href="{{ asset('bower_components/xp_css/css/external/jquery.selectbox.css') }}" rel="stylesheet" />
    <!-- Magnific-popup -->
    <link href="{{ asset('bower_components/xp_css/css/external/magnific-popup.css') }}" rel="stylesheet" />
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/xp_css/rs-plugin/css/settings.css') }}" media="screen" />
    <!-- Custom -->
    <link href="{{ asset('bower_components/xp_css/css/style.css?v=1') }}" rel="stylesheet" />
    <!-- Modernizr --> 
    <script src="{{ asset('bower_components/xp_css/js/external/modernizr.custom.js') }}"></script>
    <!-- Custom css -->
    <link rel="stylesheet prefetch" href="{{ asset('bower_components/datepicker/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/swiper/dist/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap-rating/bootstrap-rating.css') }}">
    <link rel="stylesheet" href="{{ asset('custom-css/css.css') }}"/>
    <link rel="stylesheet" href="{{ asset('bower_components/jquery.fancybox.min.css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/flag-icon-css/css/flag-icon.css') }}" />
    @stack('styles')
</head>
<body>
    <div class="wrapper">
        <!--Header-->
        @include('frontend.layouts.header')
        <!--Content-->
        @yield('content')
    </div>
    <!--Footer -->
    @include('frontend.layouts.footer')
    <!-- JavaScript-->
    <!-- jQuery --> 
    <script src="{{ asset('bower_components/jquery.min/index.js') }}"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('bower_components/xp_css/js/external/jquery-1.10.1.min.js') }}"><\/script>')</script>
    <!-- Migrate --> 
    <script src="{{ asset('bower_components/xp_css/js/external/jquery-migrate-1.2.1.min.js') }}"></script>
    <!-- Mobile menu -->
    <script src="{{ asset('bower_components/xp_css/js/jquery.mobile.menu.js') }}"></script>
    <!-- Select -->
    <script src="{{ asset('bower_components/xp_css/js/external/jquery.selectbox-0.2.min.js') }}"></script>
    <!-- Swiper slider -->
    <script src="{{ asset('bower_components/xp_css/js/external/idangerous.swiper.min.js') }}"></script>
    <!-- Form element -->
    <script src="{{ asset('bower_components/xp_css/js/external/form-element.js') }}"></script>
    <!-- Form validation -->
    <script src="{{ asset('bower_components/xp_css/js/form.js') }}"></script>
    <!-- Custom -->
    <script src="{{ asset('bower_components/xp_css/js/custom.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('bower_components/jquery-ui/index.js') }}"></script>
    <!-- Magnific-popup -->
    <script src="{{ asset('bower_components/xp_css/js/external/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('bower_components/jquery.min/index.js') }}"></script>
    <!-- jQuery REVOLUTION Slider -->
    <script type="text/javascript" src="{{ asset('bower_components/xp_css/rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/xp_css/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <!-- Bootstrap 3-->
    <script src="{{ asset('bower_components/bootstrap.min.js/index.js') }}"></script>
    <!-- Typeahead -->
    <script src="{{ asset('typeahead/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap-datepicker/index.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/swiper/dist/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap-rating/bootstrap-rating.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom-js/scripts.js') }}"></script>
    <script src="{{ asset('bower_components/jquery.fancybox.min/index.js') }}"></script>
    @stack('scripts')
</body>
</html>
