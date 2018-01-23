<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="{{asset('assets/img/user-13.jpg')}}" alt="" /></a>
                </div>
                <div class="info">{{Auth::user()->name}}<small>{{Auth::user()->department}}</small></div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">导航</li>

            @if(Auth::user()->role == 0)
                {{--管理员--}}
                <li class="has-sub">
                    <a href="{{url('admin/index')}}" title="首页">
                        <i class="fa fa-laptop"></i>
                        <span>首页</span>
                    </a>
                </li>
                <li class="has-sub">
                    <a href="{{url('admin/cate')}}" title="栏目管理">
                        <i class="fa fa-navicon"></i>
                        <span>栏目管理</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('admin/report')}}">报送排名</a></li>
                        <li><a href="{{url('admin/cate/create')}}">添加栏目</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="{{url('admin/article').'?status=1'}}" title="文章管理">
                        <i class="fa fa-file-text"></i>
                        <span>文章管理</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('admin/article/create')}}">添加文章</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="{{url('admin/user')}}" title="用户管理">
                        <i class="fa fa-users"></i>
                        <span>用户管理</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('admin/user/create')}}">添加用户</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="{{url('admin/link')}}" title="友情链接">
                        <i class="fa fa-link"></i>
                        <span>友情链接</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('admin/link/create')}}">添加友情链接</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="{{url('admin/advert')}}" title="广告管理">
                        <i class="fa fa-file-photo-o"></i>
                        <span>广告管理</span>
                    </a>
                </li>
            @else
                {{--子账号--}}
                <li @if(isset($selectArticle)) class="expend active" @else class="has-sub" @endif>
                    <a href="{{url('admin/article').'?status=1'}}" title="文章管理">
                        <i class="fa fa-file-text"></i>
                        <span>文章管理</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('admin/article/create')}}">添加文章</a></li>
                    </ul>
                </li>
            @endif

            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>