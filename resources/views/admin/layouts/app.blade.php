<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台大布局</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="{{url('/admin/plugins/awesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('/admin/plugins/layui/css/layui.css')}}" media="all">
    <link rel="stylesheet" href="{{url('/admin/css/app.css').'?t='.time()}}" media="all">
    @yield('css')

    <script src="{{url('/admin/plugins/jquery/jquery-3.2.1.min.js')}}" charset="utf-8"></script>
    <script src="{{url('/admin/plugins/layui/layui.js')}}" charset="utf-8"></script>


</head>
<body>

@yield('content')


<script>
    layui.use(['element'], function () {
        var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块
    });
</script>
@yield('js')
</body>
</html>
