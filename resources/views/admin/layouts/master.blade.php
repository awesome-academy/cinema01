<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ __('label.title') }}</title>
    <link rel="stylesheet" href="{{ asset('bower_components/jquery.dataTables.min/index.css') }}">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('bower_components/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('bower_components/admin_css/css/sb-admin.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    @include('admin.layouts.header')
    <div id="wrapper">
    @include('admin.layouts.sidebar')
        <div id="content-wrapper">
           @yield('content')
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>{{ __('label.copy-rights') }}</span>
                    </div>
                </div>
            </footer>
        </div>
    <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('bower_components/admin_css/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('bower_components/admin_css/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pagsidebar -->
    <script src="{{ asset('bower_components/admin_css/js/sb-admin.min.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('bower_components/jquery/index.css') }}"></script>
     <!-- DataTables -->
    <script src="{{ asset('bower_components/jquery.dataTables.min.js/index.js') }}"></script>
    <!-- Bootstrap JavaScript -->
    <script src="{{ asset('bower_components/bootstrap.min/index.js') }}"></script>
    <!-- App scripts -->
    @stack('scripts')
</body>
</html>
