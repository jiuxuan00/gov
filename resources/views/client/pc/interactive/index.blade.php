@extends('client.components.layouts')

@section('title')互动交流@endsection


@section('content')
    <div class="bd interactive mb20">
        <div class="container">
            <div class="hd">
                <div class="crumbs">
                    <span><i class="icon_map"></i></span>
                    <span>位置：</span>
                    <span><a target="_blank" href="">首页</a></span>
                    <span class="gt">&gt;</span>
                    <span><a target="_blank" href="">互动交流</a></span>
                </div>
                <!--//End 面包屑-->

                <div class="content" data-type="tab-content">
                    <div class="tabs" data-type="tab">
                        <a href="{{url('/interactive/list_260')}}" class="link active" title="市长信箱" target="_blank">市长信箱</a>
                        <a href="{{url('/interactive/list_261')}}" class="link" title="部门信箱" target="_blank">部门信箱</a>
                    </div>
                    {{--//End tabs--}}
                    <div class="main" data-type="content">
                        <div class="box" style="display:block;">
                            <div class="links">
                                <a target="_blank" class="item" href="{{url('/interactive/list_260')}}" title="我要写信"><i
                                            class="icon pencil"></i>我要写信</a>
                                {{--<a target="_blank" class="item" href=""><i class="icon glass"></i>我要查询</a>--}}
                            </div>
                            {{--//End--}}
                            <div class="list">
                                <ul>
                                    <li class="dt">
                                        <span class="s1">编号</span>
                                        <span class="s2">标题</span>
                                        <span class="s3">已处理情况</span>
                                        <span class="s4">时间</span>
                                    </li>

                                    @foreach($data['sjszyx'] as $item)
                                        <li class="dd">
                                            <span class="s1">{{$item->serial}}</span>
                                            <span class="s2"><a target="_blank" href="/interactive/detail/{{$item->serial}}.html">{{$item->title}}</a></span>
                                            <span class="s3">已处理</span>
                                            <span class="s4">{{date('Y-m-d', strtotime($item->updated_at))}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        {{--//End 书记市长信箱--}}

                        <div class="box">
                            <div class="links">
                                <a target="_blank" class="item" href="{{url('/interactive/260')}}" title="我要写信"><i
                                            class="icon pencil"></i>我要写信</a>
                                {{--<a target="_blank" class="item" href=""><i class="icon glass"></i>我要查询</a>--}}
                            </div>
                            {{--//End--}}
                            <div class="list">
                                <ul>
                                    <li class="dt">
                                        <span class="s1">编号</span>
                                        <span class="s2">标题</span>
                                        <span class="s3">已处理情况</span>
                                        <span class="s4">时间</span>
                                    </li>

                                    @foreach($data['bmxx'] as $item)
                                            <li class="dd">
                                                <span class="s1">{{$item->serial}}</span>
                                                <span class="s2"><a target="_blank" href="/interactive/detail/{{$item->serial}}.html">{{$item->title}}</a></span>
                                                <span class="s3">已处理</span>
                                                <span class="s4">{{date('Y-m-d', strtotime($item->updated_at))}}</span>
                                            </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        {{--//End 部门信箱--}}
                    </div>
                    {{--//End main--}}
                </div>
                {{--//End content--}}

                <div class="line-icon"></div>

                <div class="foot">
                    <div class="item item1" data-type="tab-content">
                        <div class="tabs" data-type="tab">
                            <a target="_blank" class="link active" href="/news/600/">在线访谈</a>
                        </div>
                        <div class="main" data-type="content">
                            <div class="box">
                                @foreach($data['zxft'] as $item)
                                    <a target="_blank" href="/news/{{$item->pid}}/{{$item->id}}.html"><i class="dot"></i>{{$item->name}}</a>
                                @endforeach
                            </div>
                            {{--//End 在线访谈--}}
                        </div>
                    </div>
                    <div class="item item2" data-type="tab-content">
                        <div class="tabs" data-type="tab">
                            <a target="_blank" class="link active" href="{{url('interactive/245')}}">民意征集</a>
                        </div>
                        <div class="main">
                            <div class="box" data-type="content">
                                <a target="_blank" href="/static/wenjuan1.html"><i class="dot"></i>政府网站栏目满意率调查问卷</a>
                                <a target="_blank" href="/static/wenjuan.html"><i class="dot"></i>扎兰屯市创建全国文明城市调查问卷</a>
                            </div>
                            {{--//End 民意征集--}}
                        </div>
                    </div>
                    <div class="item item3" data-type="tab-content">
                        <div class="tabs" data-type="tab">
                            <a target="_blank" class="link active" href="/government/603">新闻发布会</a>
                        </div>
                        <div class="main">
                            <div class="box" data-type="content">
                                @foreach($data['xwfbh'] as $item)
                                    <a target="_blank" href="/news/{{$item->pid}}/{{$item->id}}.html"><i class="dot"></i>{{$item->name}}</a>
                                @endforeach
                                {{--<a target="_blank" href="/government/36/30376.html"><i class="dot"></i>市公安局召开2014年社会治安形势新闻发布会</a>--}}
                                {{--<a target="_blank" href="/government/36/30377.html"><i class="dot"></i>市人民法院召开“深化司法公开--}}
                                {{--提升司法公信力”新闻发布会</a>--}}

                            </div>
                            {{--//End 新闻发布会-}}
                        </div>
                    </div>
                </div>
                {{--//End foot--}}

                        </div>
                    </div>
                </div>
                <!--//End 新闻资讯-->

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            interactivePage.index.init();
        });
    </script>
@endsection