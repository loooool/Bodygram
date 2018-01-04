<!DOCTYPE html>
<html>
<head>
    @include('admin.includes.header_start')
    @yield('header')
    @include('admin.includes.header_end')
</head>
<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">
@include('admin.includes.topbar')
@include('admin.includes.sidebar_left')
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
@include('admin.includes.footer_start')
@yield('footer')
@include('admin.includes.footer_end')
</body>
</html>