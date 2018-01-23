@extends('client.components.layouts')

@section('title') 政务公开 @endsection


@section('content')
    <style type="text/css">
        .side .item .content .news_list li {
            padding-right: 0;
        }
    </style>

    <div class="bd government">
        <div class="container">
            <div class="hd">
                <div class="crumbs">
                    <span><i class="icon_map"></i></span>
                    <span>位置：</span>
                    <span><a target="_blank" href="/">首页</a></span>
                    <span class="gt">&gt;</span>
                    <span><a target="_blank" href="/government">政务公开</a></span>
                </div>
                <!--//End 面包屑-->

                <div class="lbox">
                    <div class="side">
                        <div class="item" style="margin-bottom:0">
                            <div class="title">
                                <h4>领导信息</h4>
                                <i class="icon"></i>
                                <a target="_blank" class="more" href="/government/95">更多&gt;&gt;</a>
                            </div>
                            <div class="content leader">
                                <a class="icon icon-szf" href="/government/95" target="_blank">市委领导</a>
                                <a class="icon icon-srd" href="/government/96" style="float: right;" target="_blank">市人大领导</a>
                                <a class="icon icon-sw" href="/government/97" target="_blank">市政府领导</a>
                                <a class="icon icon-szx" href="/government/98" style="float: right;" target="_blank">市政协领导</a>
                            </div>
                        </div>
                        <!--//End 领导信息-->
                        <div class="item" style="margin-bottom:0">
                            <div class="title">
                                <h4>回应关切</h4>
                                <i class="icon"></i>
                                <a target="_blank" class="more" href="/government/95">更多&gt;&gt;</a>
                            </div>
                            <div class="content leader">
                                <a class="icon icon-zc" href="/government/167" target="_blank">政策解读</a>
                                <a class="icon icon-rd" href="/government/45" style="float: right;"
                                   target="_blank">热点回应</a>
                                <a class="icon icon-xw" href="/government/603" target="_blank">新闻发布会</a>
                                <a class="icon icon-zc" href="/government/43" style="float: right;"
                                   target="_blank">应急管理</a>
                            </div>
                        </div>
                        <!--//End 回应关切-->
                        <div class="item">
                            <div class="title">
                                <h4>农村产权交易中心</h4>
                                <!-- <i class="icon"></i> -->
                                <!-- <a target="_blank" class="more" href="/government/47">更多&gt;&gt;</a> -->
                            </div>
                            <div class="content">
                                <ul class="news_list">
                                    @foreach($cqjy as $item)
                                        <li>
                                            <a target="_blank" href="/government/{{$item->pid}}/{{$item->id}}.html"
                                               title="{{$item->name}}"><i class="dot"></i>{{$item->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--//End 农村产权交易中心-->
                        <div class="item">
                            <div class="title">
                                <h4>专题聚焦</h4>
                                <!-- <i class="icon"></i> -->
                                <!-- <a target="_blank" class="more" href="/government/47">更多&gt;&gt;</a> -->
                            </div>
                            <div class="content g1" style="height: 252px;">
                                <style>
                                    .g1 li {
                                        margin-bottom: 10px;
                                    }
                                </style>
                                <ul>
                                    <li><a href="/government/636" target="_blank"><img
                                                    src="{{url('/client/images/ztjj-1.jpg')}}"></a></li>
                                    <li><a href="/government/639" target="_blank"><img
                                                    src="{{url('/client/images/ztjj-2.jpg')}}"></a></li>
                                    <li><a href="/government/638" target="_blank"><img
                                                    src="{{url('/client/images/ztjj-4.jpg')}}"></a></li>
                                    <li><a href="/government/640" target="_blank"><img
                                                    src="{{url('/client/images/ztjj-5.jpg')}}"></a></li>
                                    <li><a href="/government/641" target="_blank"><img
                                                    src="{{url('/client/images/ztjj-6.jpg')}}"></a></li>
                                    <li><a href="/government/635" target="_blank"><img
                                                    src="{{url('/client/images/ztjj-7.jpg')}}"></a></li>
                                    <li><a href="/government/636" target="_blank"><img
                                                    src="{{url('/client/images/ztjj-1.jpg')}}"></a></li>
                                    <li><a href="/government/639" target="_blank"><img
                                                    src="{{url('/client/images/ztjj-2.jpg')}}"></a></li>
                                    <li><a href="/government/638" target="_blank"><img
                                                    src="{{url('/client/images/ztjj-4.jpg')}}"></a></li>
                                    <li><a href="/government/640" target="_blank"><img
                                                    src="{{url('/client/images/ztjj-5.jpg')}}"></a></li>
                                    <li><a href="/government/641" target="_blank"><img
                                                    src="{{url('/client/images/ztjj-6.jpg')}}"></a></li>
                                    <li><a href="/government/635" target="_blank"><img
                                                    src="{{url('/client/images/ztjj-7.jpg')}}"></a></li>
                                </ul>
                                {{--<a href="/government/636"><img src="{{url('/client/images/ztjj-1.jpg')}}"></a>--}}
                                {{--<a href="javascript:;"><img src="{{url('/client/images/ztjj-2.jpg')}}"></a>--}}
                                {{--<a href="javascript:;"><img src="{{url('/client/images/ztjj-3.jpg')}}"></a>--}}
                                {{--<a href="javascript:;"><img src="{{url('/client/images/ztjj-4.jpg')}}"></a>--}}
                                {{--<a href="javascript:;"><img src="{{url('/client/images/ztjj-5.jpg')}}"></a>--}}
                                {{--<a href="javascript:;"><img src="{{url('/client/images/ztjj-6.jpg')}}"></a>--}}
                                {{--<a href="javascript:;"><img src="{{url('/client/images/ztjj-7.jpg')}}"></a>--}}
                                {{--<a href="javascript:;"><img src="{{url('/client/images/ztjj-8.jpg')}}"></a>--}}

                            </div>
                        </div>
                        <!--//End 专题聚焦-->


                    </div>
                </div>
                <!--//End lbox-->

                <div class="midbox">


                    <div class="item">
                        <div class="title">
                            <span class="active">政府文件</span>
                            <span>政办文件</span>
                            <span>工作报告</span>
                            <a target="_blank" href="" class="more">更多&gt;&gt;</a>
                        </div>
                        <div class="content">
                            <ul class="news_list" style="display:block">
                                @foreach($zfwj as $item)
                                    <li>
                                        <a target="_blank" href="/government/{{$item->pid}}/{{$item->id}}.html"
                                           title="{{$item->name}}"><i class="dot"></i>{{$item->name}}<em
                                                    class="time">20{{date('y-m-d', strtotime($item->updated_at))}}</em></a>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="news_list">
                                @foreach($zbwj as $item)
                                    <li>
                                        <a target="_blank" href="/government/{{$item->pid}}/{{$item->id}}.html"
                                           title="{{$item->name}}"><i class="dot"></i>{{$item->name}}<em
                                                    class="time">20{{date('y-m-d', strtotime($item->updated_at))}}</em></a>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="news_list">
                                @foreach($zfbg as $item)
                                    <li>
                                        <a target="_blank" href="/government/{{$item->pid}}/{{$item->id}}.html"
                                           title="{{$item->name}}"><i class="dot"></i>{{$item->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--//End 国务院文件-->

                    <div class="item">
                        <div class="title">
                            <span class="active">重点领域</span>
                        </div>
                        <div class="content a-content">
                             <!--<a href="/government/253" target="_blank">权责清单</a>-->
                            <a href="/government/254" target="_blank">建议提案办理</a>
                            <a href="/government/256" target="_blank">统计数据信息</a>
                            <a href="/government/257" target="_blank">财政预决算</a>
                            <a href="/government/258" target="_blank">人事信息</a>
                            <a href="/government/259" target="_blank">环境保护</a>
                            <a href="/government/684" target="_blank">保障性住房</a>
                            <a href="/government/685" target="_blank">安全生产</a>
                            <a href="/government/686" target="_blank">食品药品安全</a>
                            <a href="/government/687" target="_blank">教育卫生</a>
                            <a href="/government/688" target="_blank">扶贫脱贫</a>
                            <a href="/government/689" target="_blank">农牧业供给侧改革</a>
                            <a href="/government/690" target="_blank">社会救助</a>
                            <a href="/government/691" target="_blank">重大建设项目</a>
                            <a href="/government/692" target="_blank">减税降费</a>
                            <a href="/government/693" target="_blank">国有企业监管</a>
                            <a href="/government/694" target="_blank">就业创业</a>
                            <a href="/government/695" target="_blank">市场及产品质量监管</a>
							<a href="/government/704" target="_blank">行政许可</a>
                            <a href="/government/705" target="_blank">行政处罚</a>

                        </div>
                    </div>
                    <!--//End 重点领域-->

                    <div class="item">
                        <div class="title">
                            <span class="active">公开制度</span>
                            <span>公开年报</span>
                         <!--   <span>公开目录</span> -->
                            <a target="_blank" href="" class="more">更多&gt;&gt;</a>
                        </div>
                        <div class="content">
                            <ul class="news_list" style="display:block">
                                @foreach($gkzd as $item)
                                    <li>
                                        <a target="_blank" href="/government/{{$item->pid}}/{{$item->id}}.html"
                                           title="{{$item->name}}"><i class="dot"></i>{{$item->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="news_list">
                                @foreach($gknb as $item)
                                    <li>
                                        <a target="_blank" href="/government/{{$item->pid}}/{{$item->id}}.html"
                                           title="{{$item->name}}"><i class="dot"></i>{{$item->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                           <!--  <ul class="news_list">
                                @foreach($zfbg as $item)
                                    @if($loop->index<3)
                                        <li><a target="_blank" href="/government/{{$item->pid}}/{{$item->id}}.html"
                                               title="{{$item->name}}"><i class="dot"></i>{{$item->name}}</a></li>
                                    @endif
                                @endforeach
                                @foreach($zfwj as $item)
                                    @if($loop->index<3)
                                        <li><a target="_blank" href="/government/{{$item->pid}}/{{$item->id}}.html"
                                               title="{{$item->name}}"><i class="dot"></i>{{$item->name}}</a></li>
                                    @endif
                                @endforeach
                                @foreach($gknb as $item)
                                    @if($loop->index<2)
                                        <li><a target="_blank" href="/government/{{$item->pid}}/{{$item->id}}.html"
                                               title="{{$item->name}}"><i class="dot"></i>{{$item->name}}</a></li>
                                    @endif 
                                @endforeach 
                            </ul> -->
                        </div>
                    </div>
                    <!--//End 公开制度 公开年报-->


                </div>
                <!--//End midbox-->

                <div class="rbox">
                    <div class="side">
                        <div class="item">
                            <div class="title">
                                <h4>政府信息公开</h4>
                                <i class="icon"></i>
                            </div>
                            <div class="content info">
                                <a target="_blank" href="http://yfxz.zlt365.com"><i class="icon1"></i>依法行政</a>
                                <a target="_blank" href="/government/266"><i class="icon2"></i>政府部门信息公开</a>
                                <a target="_blank" href="/government/267"><i class="icon3"></i>乡镇街道信息公开</a>
                                <a target="_blank" href="/government/238"><i class="icon4"></i>企事业单位信息公开</a>
                                {{--<a target="_blank" href="/government/61"><i class="icon5"></i>公开指南</a>--}}
                            </div>
                        </div>
                        <!--//End 政府信息公开-->

                        <div class="item">
                            <div class="title">
                                <h4>政府工作报告</h4>
                                <i class="icon"></i>
                                <em class="icon"></em>
                            </div>
                            <div class="content hr">
                                <ul class="news_list">
                                    @foreach($zfgzbg as $item)
                                        <li><a target="_blank" href="/government/{{$item->pid}}/{{$item->id}}.html"
                                               title="{{$item->name}}"><i class="dot"></i>{{$item->name}}</a></li>
                                    @endforeach
                                    @foreach($xzxk as $item)
                                        <li><a target="_blank" href="/government/{{$item->pid}}/{{$item->id}}.html"
                                               title="{{$item->name}}"><i class="dot"></i>{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--//End 公告公示-->

                        <div class="item">
                            <div class="title">
                                <h4>执法监督</h4>
                                <i class="icon"></i>
                            </div>
                            <div class="content info">
                                <a target="_blank" href="/government/168"><i class="icon1"></i>环境保护监督检查</a>
                                <a target="_blank" href="/government/169"><i class="icon2"></i>公共卫生监督检查</a>
                                <a target="_blank" href="/government/170"><i class="icon3"></i>安全生产监督检查</a>
                                <a target="_blank" href="/government/171"><i class="icon4"></i>食品药品监督检查</a>
                                <a target="_blank" href="/government/172"><i class="icon5"></i>产品质量监督检查</a>
                            </div>
                        </div>
                        <!--//End 执法监督-->


                    </div>
                </div>
                <!--//End rbox-->

            </div>
        </div>
    </div>
    <!--//End 新闻资讯-->
@endsection

@section('js')
    <script src="{{url('client/js/jquery.imgscroll.min.js')}}"></script>
    <script>
        $(function () {
            governmentPage.init();

            imgScroll.rolling({
                name: 'g1',
                width: '260px',
                height: '100px',
                direction: 'top',
                speed: 30,
                addcss: true
            });

        })
    </script>
@endsection