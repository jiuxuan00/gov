@extends('client.components.layouts')

@section('title'){{$cateName->name}}@endsection

@section('content')
    <div class="container mb20">
        <div class="bd news">
            <div class="hd">
                <div class="crumbs">
                    <span><i class="icon_map"></i></span>
                    <span>位置：</span>
                    <span><a target="_blank" href="/" title="首页">首页</a></span>
                    <span class="gt">&gt;</span>
                    <span><a target="_blank" href="/serve" title="办事服务">办事服务</a></span>
                    <span class="gt">&gt;</span>
                    <span><a target="_blank" href="">{{$cateName->name}}</a></span>
                </div>

                <div id="tsxa_l" class="fl column">
                    <div class="portlet">
                        <div class="nav_third">
                            <div class="nav_name">{{$cateName->name}}</div>
                            <ul class="nav_ul">
                            @if($cateId==665 ||$cateId==666 ||$cateId==667 ||$cateId==668 ||$cateId==669 ||$cateId==670||$cateId==671||$cateId==672)
                                {{--就业创业--}}
                                    <li class="yili"><a class="yia" href="/serve/665" target="_blank">最新工作动态</a></li>
                                    <li class="yili"><a class="yia" href="/serve/666" target="_blank">创业扶持政策</a></li>
                                    <li class="yili"><a class="yia" href="/serve/667" target="_blank">创业典型</a></li>
                                    <li class="yili"><a class="yia" href="/serve/668" target="_blank">创业型城市建设</a></li>
                                    <li class="yili"><a class="yia" href="/serve/669" target="_blank">创业经验交流</a></li>
                                    <li class="yili"><a class="yia" href="/serve/670" target="_blank">创业项目推介</a></li>
                                    <li class="yili"><a class="yia" href="/serve/671" target="_blank">就业岗位信息</a></li>
                                    <li class="yili"><a class="yia" href="/serve/672" target="_blank">求职人员信息</a></li>
                            @elseif($cateId==643 ||$cateId==644 ||$cateId==645 ||$cateId==646)
                                {{--外事侨务--}}
                                    <li class="yili">
                                        <a class="yia" href="/serve/643" target="_blank">工作动态</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/644" target="_blank">政策法规</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/645" target="_blank">学习园地</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/646" target="_blank">办事指南</a>
                                    </li>
                            @elseif($cateId==647 ||$cateId==648 ||$cateId==649 ||$cateId==650||$cateId==651||$cateId==652)
                                {{--政府法制--}}
                                    <li class="yili">
                                        <a class="yia" href="/serve/647" target="_blank">新法速递</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/648" target="_blank">行政复议</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/649" target="_blank">执法监督</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/650" target="_blank">工作动态</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/651" target="_blank">学习园地</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/652" target="_blank">清单管理</a>
                                    </li>
                            @elseif($cateId==653 ||$cateId==654 ||$cateId==655 ||$cateId==656)
                                {{--金融服务--}}
                                    <li class="yili">
                                        <a class="yia" href="/serve/653" target="_blank">金融要闻</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/654" target="_blank">政策法规</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/655" target="_blank">办事指南</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/656" target="_blank">金融服务</a>
                                    </li>
                            @elseif($cateId==657 ||$cateId==658 ||$cateId==659 ||$cateId==660||$cateId==661||$cateId==662||$cateId==663||$cateId==664)
                                {{--电子商务--}}
                                    <li class="yili">
                                        <a class="yia" href="/serve/657" target="_blank">最新动态</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/658" target="_blank">发展规划</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/659" target="_blank">指导意见</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/660" target="_blank">扶持政策</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/661" target="_blank">考察调研</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/662" target="_blank">专题会议</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/663" target="_blank">电商扶贫</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/664" target="_blank">资金公示</a>
                                    </li>
                            @elseif($cateId==673 ||$cateId==674 ||$cateId==675 ||$cateId==676||$cateId==677||$cateId==678||$cateId==679||$cateId==680||$cateId==681||$cateId==682)
                                {{--黑木耳专栏--}}
                                    <li class="yili">
                                        <a class="yia" href="/serve/673" target="_blank">最新动态</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/674" target="_blank">发展规划</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/675" target="_blank">指导意见</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/676" target="_blank">扶持政策</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/677" target="_blank">栽培技术</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/678" target="_blank">领导讲话</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/679" target="_blank">经验交流</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/680" target="_blank">视频专题</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/681" target="_blank">木耳功效</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/682" target="_blank">企业名片</a>
                                    </li>
                            @elseif($cateId==607 ||$cateId==608 ||$cateId==609 ||$cateId==610||$cateId==611||$cateId==612||$cateId==613||$cateId==614)
                                {{--红十字会--}}
                                    <li class="yili">
                                        <a class="yia" href="/serve/607" target="_blank">新闻资讯</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/608" target="_blank">领导信息</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/609" target="_blank">机构职能</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/610" target="_blank">通知公告</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/611" target="_blank">社会捐赠</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/612" target="_blank">救灾救援救护</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/613" target="_blank">志愿者风采</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/614" target="_blank">相关知识</a>
                                    </li>
                            @elseif($cateId==81 ||$cateId==84 ||$cateId==655 ||$cateId==85)
                                {{--金融服务--}}
                                    <li class="yili">
                                        <a class="yia" href="/serve/81" target="_blank">旅游景点</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/84" target="_blank">吃住行娱</a>
                                    </li>
                                    <li class="yili">
                                        <a class="yia" href="/serve/85" target="_blank">特产购物</a>
                                    </li>
                            @else
                                    @foreach($categories as $item)
                                        <li class="yili">
                                            <a class="yia" href="/serve/{{$item->id}}"
                                               target="_blank">{{$item->name}}</a>
                                        </li>
                                    @endforeach

                            @endif
                                <li class="yili"><a target="_blank" href="/interactive/list_261/zxbs">在线办事</a></li>
								<li class="yili"><a target="_blank" href="/interactive/zxbssearch">办理查询</a></li>
                            </ul>
                                <div class="pic"><img src="{{url('client/uploads/201709301102.jpg')}}" alt=""></div>
                        </div>
                    </div>
                </div>
                {{--//End tsxa_l--}}


                <div id="tsxa_r" class="fr column">
                    <div class="mod3">
                        <span class="title fl">{{$cateName->name}}</span>
                    </div>
                    {{--//End--}}

                    {{--todo--}}
                    {{--<div class="depart_info"><div class="de_name"><span class="tf"><img src="{{url('client/images/2017021309165836778.png')}}">公开单位：</span> <span class="tb">盟文体新广局</span></div>--}}
                    {{--<div class="clearfix"><div class="de_add fl"><span class="tf"><img src="{{url('client/images/2017021309165733600.png')}}">公开地址：</span> <span class="tb">盟党政综合大楼6楼</span></div>--}}
                    {{--<div class="de_ph fr"><span class="tf"><img src="{{url('client/images/2017021309165858968.png')}}">联系电话：</span> <span class="tb">0482-8268667 &nbsp;</span></div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--//End--}}


                    <ul class="third_list">
                        @foreach($articles as $item)
                            <li class="lih">
                                <span class="fl"><a target="_blank" href="/serve/{{$cateName->id}}/{{$item->id}}.html"
                                                    target="_blank" title="">{{$item->name}}</a></span>
                                <span class="fr">{{date('y-m-d', strtotime($item->updated_at))}}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="page">
                        {{ $articles->links() }}
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            servePage.init();
        });
    </script>
@endsection
