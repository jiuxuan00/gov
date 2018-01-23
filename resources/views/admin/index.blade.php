@extends('admin.layouts.app')



@section('content')
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo">扎兰屯市人民政府</div>
            <!-- 头部区域（可配合layui已有的水平导航） -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item"><a href="/admin/article/create/" target="main">添加文章</a></li>
                @if(Auth::user()->role == 0)
                    <li class="layui-nav-item"><a href="/admin/cate/create/" target="main">添加分类</a></li>
                    {{--<li class="layui-nav-item"><a href="/admin/user/create/" target="main">添加用户</a></li>--}}
                    <li class="layui-nav-item"><a href="/admin/search" target="main">文章搜索</a></li>
                @endif
            </ul>
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <img src="{{url('/admin/images/avatar.png')}}" class="layui-nav-img">
                        {{Auth::user()->name}}
                    </a>
                </li>
                <li class="layui-nav-item"><a href="/auth/logout">退出</a></li>
            </ul>
        </div>

        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree" lay-filter="test">
                    @if(Auth::user()->role == 0)
                        <li class="layui-nav-item layui-this">
                            <a href="/admin/index"><i class="fa fa-laptop"></i>后台首页</a>
                        </li>
                        <li class="layui-nav-item">
                            <a href="{{url('admin/cate')}}" target="main"><i class="fa fa-navicon"></i>分类管理</a>
                        </li>
                        <li class="layui-nav-item">
                            <a href="{{url('admin/article')}}" target="main"><i class="fa fa-file-text"></i>文章管理</a>
                        </li>
                        <li class="layui-nav-item"><a href="{{url('/admin/submission')}}" target="main"><i class="fa fa-industry"></i>报送管理</a></li>
                        <li class="layui-nav-item">
                            <a href="javascript:;" target="main"><i class="fa fa-envelope-o"></i>信箱管理</a>
                            <dl class="layui-nav-child">
                                <dd><a href="{{url('/admin/message/show?type=1')}}" target="main">市长信箱</a></dd>
                                <dd><a href="{{url('/admin/message/show?type=2')}}" target="main">部门信箱</a></dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a href="{{url('/admin/apply')}}" target="main"><i class="fa fa-envelope-open-o"></i>依申请公开</a>
                        </li>
                        <li class="layui-nav-item">
                            <a href="{{url('/admin/cate/preview')}}" target="main"><i class="fa fa-camera"></i>前台预览</a>
                        </li>
                    @else
                        <li class="layui-nav-item">
                            <a href="{{url('admin/article')}}" target="main"><i class="fa fa-file-text"></i>文章管理</a>
                        </li>
                         <li class="layui-nav-item">
                             <a href="{{url('/admin/message/show')}}" target="main"><i class="fa fa-envelope-o"></i>信箱管理</a>
                         </li>
                        {{--<li class="layui-nav-item">--}}
                            {{--<a href="{{url('/admin/user')}}" target="main"><i class="fa fa-users"></i>用户管理</a>--}}
                        {{--</li>--}}
                        {{--<li class="layui-nav-item"><a href=""><i class="fa fa-link"></i>友情链接</a></li>--}}
                        {{--<li class="layui-nav-item">--}}
                            {{--<a href="javascript:;"><i class="fa fa-file-photo-o"></i>广告管理</a>--}}
                        {{--</li>--}}
                        {{--<li class="layui-nav-item"><a href=""><i class="fa fa-desktop"></i>前台展示</a></li>--}}
                    @endif
                        <li class="layui-nav-item">
                            <a href="{{url('/admin/password')}}" target="main"><i class="fa fa-key fa-fw"></i>修改密码</a>
                        </li>
                </ul>
            </div>
        </div>

        <div class="layui-body">
            <!-- 内容主体区域 -->
            <iframe src="/admin/{{$default}}" frameborder="0" name="main"></iframe>
        </div>


    </div>
@endsection

@section('js')
    <script>
        layui.use(['layer', 'element'], function () {
            var $ = layui.jquery,
                layer = layui.layer,
                element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块

            //iframe自适应
            $(window).on('resize', function () {
                var winH = $('.layui-body').height();
                $('iframe').css('height', winH + 'px');
            }).resize();

        });
    </script>
@endsection