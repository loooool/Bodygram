<!DOCTYPE html>
<html>
<head>
    @include('trainer.includes.header_start')
    @yield('header')
    @include('trainer.includes.header_end')
</head>
<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">
@include('trainer.includes.topbar')
@include('trainer.includes.sidebar_left')
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
@include('trainer.includes.footer_start')
@yield('footer')
@include('trainer.includes.footer_end')
</body>
</html>