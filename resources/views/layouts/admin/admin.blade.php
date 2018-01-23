<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @yield('meta')
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta name="renderer" content="webkit">
    <meta name="force-rendering" content="webkit">
    <meta name="token" content="{{csrf_token()}}">
    <link href="{{asset('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/style.min.css').'?t='.time()}}" rel="stylesheet" />
    <link href="{{asset('assets/css/style-responsive.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/theme/default.css').'?t='.time()}}" rel="stylesheet" id="theme" />
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{asset('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/datepicker.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->
    @yield('css')
    <script src="{{asset('assets/plugins/pace/pace.min.js')}}"></script>
</head>
<body>

@yield('content')

</body>
<script src="{{asset('assets/plugins/jquery/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-cookie/jquery.cookie.js')}}"></script>

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{asset('assets/plugins/gritter/js/jquery.gritter.js')}}"></script>
<script src="{{asset('assets/plugins/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('assets/plugins/flot/jquery.flot.time.min.js')}}"></script>
<script src="{{asset('assets/plugins/flot/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('assets/plugins/flot/jquery.flot.pie.min.js')}}"></script>
<script src="{{asset('assets/plugins/sparkline/jquery.sparkline.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/js/dashboard.js').'?t='.date('his', time())}}"></script>
<script src="{{asset('assets/js/apps.js').'?t='.date('his', time())}}"></script>
<script src="{{asset('assets/js/custom.js').'?t='.date('his', time())}}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
    $(document).ready(function() {
        App.init();
        Dashboard.init();
    });
</script>
@yield('js')
</html>