<!DOCTYPE html>
<html>
<head>
    @include('includes.header_start')
    @yield('header')
    @include('includes.header_end')
</head>
<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">
    @include('includes.topbar')
    @include('includes.sidebar_left')
    <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- end container -->
            </div>
            <!-- end content -->



        </div>
</div>
<!-- END wrapper -->
@include('includes.footer_start')
@yield('footer')
@include('includes.footer_end')
</body>
</html>