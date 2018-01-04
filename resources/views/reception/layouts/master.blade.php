<!DOCTYPE html>
<html>
<head>
    @include('reception.includes.header_start')
    @yield('header')
    @include('reception.includes.header_end')
</head>
<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">
@include('reception.includes.topbar')
@include('reception.includes.sidebar_left')
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
@include('reception.includes.footer_start')
@yield('footer')
@include('reception.includes.footer_end')
</body>
</html>