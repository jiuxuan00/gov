@extends('client.components.layouts')

@section('style')
    <link rel="stylesheet" href="{{asset('client/css/index.css').'?t='.time()}}">
    <style>
        .mtitle .tabs a {
            color: #9f0007;
            margin-left: 16px;
        }
    </style>
@endsection

@section('content')
    <div class="home">
        <div class="front-page">
            <div class="hd">
                <div class="icon" title="头条"></div>
                <div class="txt">
                    @foreach($toutiao as $item)
                    <h3><a href="/news/{{$item->pid}}/{{$item->id}}.html" target="_blank">{{$item->name}}</a></h3>
                    <p>{{$item->subname}}</p>
                    @endforeach
                </div>
            </div>
        </div>



        <div class="container">
            <div class="hd">
                <div class="banner banner-new ">
                    <!--//End menu -->
                    <div class="content" data-title="tab-content">
                        <div role="panel" class="box zhalan">
                            <div class="focus">
                                <ul>
                                    @foreach($focus as $item)
                                        <li>
                                            <a target="_blank" href="/news/{{$item->pid}}/{{$item->id}}.html">
                                                <img height="390" src="/uploads/{{$item->thumb_url}}" alt="">
                                                <p class="text">{{$item->name}}</p>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <ol>
                                    <li class="active"></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ol>
                                <a target="_blank" class="home_icon prev" href="javascript:;"></a>
                                <a target="_blank" class="home_icon next" href="javascript:;"></a>
                            </div>
                            <div class="news">
                                <div class="tab_menu" data-title="tab-nav">
                                    <a target="_blank" href="/news/211" role="link" class="active">政务要闻</a>
                                    <a target="_blank" href="/news/212" role="link">部门动态</a>
                                    <a target="_blank" href="/news/213" role="link">乡镇之窗</a>
                                    <a target="_blank" href="/news/214" role="link">视频新闻</a>
                                    <div class="cursor"></div>
                                </div>
                                <div class="tab_con" data-title="tab-content">
                                    <div role="panel" style="display: block;">
                                        @include('client.pc.news.li-list',['data'=>$todayZhalan['tab1']])
                                    </div>
                                    {{--//End 要闻--}}
                                    <div role="panel" style="display: none;">
                                        @include('client.pc.news.li-list',['data'=>$todayZhalan['tab2']])
                                    </div>
                                    {{--//End 部门--}}
                                    <div role="panel" style="display: none;">
                                        @include('client.pc.news.li-list',['data'=>$todayZhalan['tab3']])
                                    </div>
                                    {{--//End 乡镇--}}
                                    <div role="panel" style="display: none;">
                                        @include('client.pc.news.li-list',['data'=>$todayZhalan['tab4']])
                                    </div>
                                    {{--//End 视频新闻--}}
                                </div>
                            </div>
                        </div>
                        <!--//End 今日扎兰 -->
                    </div>
                    <!--//End content -->
                </div>
                <!--//End banner -->

                <div class="msgloop msgloop-text mt20">
                    <div class="title"><a target="_blank" href="/news/215" title="通知公告">通知公告</a>
                    </div>
                    <div class="text" id="scrollleft">
                        <div class="con">
                            <ul>
                                @foreach($notice as $item)
                                    <li><a target="_blank" href="/news/{{$item->pid}}/{{$item->id}}.html" target="_blank" title="">{{$item->name}}<span>({{date('Y-m-d', strtotime($item->created_at))}})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!--//End 热点回应 -->

                <div class="slogan">
                    <img height="90" src="{{asset('client/uploads/slogan4.jpg')}}" alt="">
                    <img height="90" src="{{asset('client/uploads/slogan5.jpg')}}" alt="">
                    <img height="90" src="{{asset('client/uploads/slogan6.jpg')}}" alt="">
                    <img height="90" src="{{asset('client/uploads/slogan7.jpg')}}" alt="">
                </div>
                <!--//End slogan -->


                <div class="h-box" style="height: 430px;">
                    <div class="section">
                        <div class="gongkai">
                            <div class="mtitle">
                                <h5><a target="_blank" href="/government" title="政务公开">政务公开</a></h5>
                                <span class="en">Government Information</span>
                                <i class="icon1"></i>
                                <div class="tabs">
                                    <a target="_blank" href="http://yfxz.zlt365.com" title="依法行政">依法行政</a>
									<a target="_blank" href="/government/43" title="应急管理">应急管理</a>
                                    <a target="_blank" href="/government/266" title="政府部门信息公开">政府部门信息公开</a>
                                    <a target="_blank" href="/government/267" title="乡镇街道信息公开">乡镇街道信息公开</a>
                                    <a target="_blank" href="/government" class="more"><i class="icon-more"></i>更多</a>
                                </div>
                            </div>
                            <!--//End mtitle -->
                            <div class="tabox">
                                <div class="menu" data-title="tab-nav">
                                    <a target="_blank" href="/government/163" role="link" class="active"><i
                                                class="home_icon"></i>政府文件<em class="home_icon"></em></a>
                                    <a target="_blank" href="/government/162" role="link"><i
                                                class="home_icon"></i>政办文件<em class="home_icon"></em></a>
                                    <a target="_blank" href="/government/247" role="link"><i class="home_icon"></i>政府工作报告<em
                                                class="home_icon"></em></a>
                                    {{--<a target="_blank" href="/government/616" role="link"><i class="home_icon"></i>重点领域公开<em class="home_icon"></em></a>--}}
                                    <a target="_blank" href="/government/256" role="link"><i
                                                class="home_icon"></i>统计数据<em class="home_icon"></em></a>
                                    <a target="_blank" href="/government/47" role="link"><i class="home_icon"></i>农村产权交易中心<em
                                                class="home_icon"></em></a>
                                    <a target="_blank" href="/government"><i class="home_icon"></i>更多</a>
                                </div>
                                <div class="cont" data-title="tab-content">
                                    <div role="panel" class="panel" style="display: block;">
                                        @include('client.pc.government.module.li-list',['data'=>$government['tab1']])
                                    </div>
                                    <!--//End 政务文件-->
                                    <div role="panel" class="panel">
                                        @include('client.pc.government.module.li-list',['data'=>$government['tab2']])
                                    </div>
                                    <!--//End 政办文件-->
                                    <div role="panel" class="panel">
                                        @include('client.pc.government.module.li-list',['data'=>$government['tab3']])
                                    </div>
                                    <!--//End 政府工作报告-->
                                    <div role="panel" class="panel">
                                        @include('client.pc.government.module.li-list',['data'=>$government['tab5']])
                                    </div>
                                    <!--//End 统计数据-->
                                    <div role="panel" class="panel">
                                        @include('client.pc.government.module.li-list',['data'=>$government['tab6']])
                                    </div>
                                    <!--//End 农村产权交易中心-->
                                </div>
                                <div class="links">
                                    <a target="_blank" href="/government/60" title="依申请公开">依申请公开</a>
                                    <a target="_blank" href="/government/61" title="公开指南">公开指南</a>
                                    <a target="_blank" href="/government/59" title="公开制度">公开制度</a>
                                    <a target="_blank" href="/government/62" title="公开年报">公开年报</a>
                                    <a target="_blank" href="/government/725" title="大事记">大事记</a>
                                    <a target="_blank" href="http://zlts.nmgzfgb.gov.cn/" title="政府公报" style="margin:0;">政府公报</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//End 政务公开 -->

                    <div class="slide_right">
                        <div class="part part2 mt20" style="height: 444px;">
                            <div class="mtitle">
                                <h5><a target="_blank" href="/news/600" title="在线访谈">在线访谈</a></h5>
                                <span class="en">Online Interview</span>
                                <i class="icon1"></i>
                                <i class="icon2"></i>
                                <div class="tabs">
                                    <a target="_blank" href="/news/600" class="more border-no"><i class="icon-more"></i>更多</a>
                                </div>
                            </div>
                            <!--//End mtitle -->

                            <div class="cont">
                                <div class="imgtxt">
                                    <a href="/news/600/34552.html" target="_blank"><img width="180"
                                                            src="{{asset('client/uploads/home_banner.jpg')}}"
                                                            alt=""></a>
                                    <div class="name"><strong>单位：呼伦贝尔市地方病防治研究所</strong></div>
                                    <div class="name"><strong>时间：2017-11-10</strong></div>
                                </div>
                                <div class="info">
                                    {{--<div class="time">时间：2016年10月27日14点-16点</div>--}}
                                    <div class="text" style="margin-top:10px;">
                                        简介：呼伦贝尔市地方病防止研究所成立于1960年，隶属于呼伦贝尔卫生计生委，驻扎在扎兰屯市，床位150张，职工117人，主要负责克山病、大骨节病、碘缺乏病、心脑血管病防治及科研工作，承担全国及自治区克山病、大骨节病重病区的病情及地方病防治项目工作，负责呼伦贝尔市地方病规划的制定和实施，及全市地方病专业技术人员的培训及健康教育等工作。...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//End 在线访谈 -->
                </div>
                {{--//ENd--}}


                <div id="leftMarquee" class="msgloop msgloop-img mt20 mb20">
                    <div class="title"><a target="_blank" href="government/633" title="通知公告">专题<br>聚焦</a></div>
                    <div class="text">
                        <div class="con">
                            <ul>
                                <li><a href="/government/635" target="_blank" title=""><img src="/client/uploads/msgloop/focus-2.jpg" alt=""></a></li>
                                <li><a href="/government/636" target="_blank" title="社会主义核心价值观"><img src="/client/uploads/msgloop/focus-4.jpg" alt=""></a></li>
                                <li><a href="/government/639" target="_blank" title="脱贫攻坚"><img src="/client/uploads/msgloop/focus-5.jpg" alt=""></a></li>
                                <li><a href="/government/638" target="_blank" title="两学一做"><img src="/client/uploads/msgloop/focus-6.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="h-box">
                    <div class="serve">
                        <div class="mtitle">
                            <h5><a target="_blank" href="/serve" title="在线服务">在线服务</a></h5>
                            <span class="en">Convenience Public Service</span>
                            <i class="icon1"></i>
                            <i class="icon2"></i>
                            <div class="tabs">
                                <a target="_blank" href="/serve" class="more border-no"><i class="icon-more"></i>更多</a>
                            </div>
                        </div>
                        <!--//End mtitle -->
                        <div class="cont">
                            <dl>
                                <dt class="active"><i class="home_icon icon1"></i>综合服务</dt>
                                <dd>
                                    <div class="content">
                                        <div style="margin-top:70px;float:left;">
                                            <a target="_blank" href="/serve/87">外事侨务</a>
                                            <a target="_blank" href="/serve/88">政府法制</a>
                                            <a target="_blank" href="/serve/89">金融服务</a>
                                            <a target="_blank" href="/serve/90">电子商务</a>
                                            <a target="_blank" href="/serve/91">就业创业</a>
                                            <a target="_blank" href="/serve/93">党建阵地</a>
                                            <a target="_blank" href="/serve/520">黑木耳专栏</a>
                                            <a target="_blank" href="/serve/521">红十字会</a>
                                        </div>
                                    </div>
                                </dd>
                            </dl>
                            <dl>
                                <dt><i class="home_icon icon4"></i>重点办事</dt>
                                <dd>
                                    <div class="content">
                                        <div style="margin-top:90px;float:left;">
                                            <a target="_blank" href="/serve/528" style="font-size:12px;">户籍和身份证办理</a>
                                            <a target="_blank" href="/serve/529">生育服务</a>
                                            <a target="_blank" href="/serve/530" style="font-size:14px;">保障性住房申请</a>
                                            <a target="_blank" href="/serve/531">商事登记</a>
                                        </div>
                                    </div>
                                </dd>
                            </dl>
                            <dl>
                                <dt><i class="home_icon icon2"></i>公共服务</dt>
                                <dd>
                                    <div class="content">
                                        <div style="margin-top:70px;float:left;">
                                            <a target="_blank" href="/serve/522">教育培训</a>
                                            <a target="_blank" href="/serve/523">医疗卫生</a>
                                            <a target="_blank" href="/serve/524">劳动就业</a>
                                            <a target="_blank" href="/serve/525">社会保障</a>
                                            <a target="_blank" href="/serve/526">招商引资</a>
                                            <a target="_blank" href="/serve/527">休闲旅游</a>
                                        </div>
                                    </div>
                                </dd>
                            </dl>
                            <dl>
                                <dt><i class="home_icon icon3"></i>服务个人</dt>
                                <dd>
                                    <div class="content">
                                        <div style="margin-top:20px;float:left;">
                                            <a target="_blank" href="/serve/532">婚姻生育</a>
                                            <a target="_blank" href="/serve/533">户籍护照</a>
                                            <a target="_blank" href="/serve/534">文化教育</a>
                                            <a target="_blank" href="/serve/535">人事人才</a>
                                            <a target="_blank" href="/serve/536">医疗卫生</a>
                                            <a target="_blank" href="/serve/537">社会保障</a>
                                            <a target="_blank" href="/serve/538">劳动就业</a>
                                            <a target="_blank" href="/serve/539">消费维权</a>
                                            <a target="_blank" href="/serve/540">公安司法</a>
                                            <a target="_blank" href="/serve/541">交通出行</a>
                                            <a target="_blank" href="/serve/542">土地房产</a>
                                            <a target="_blank" href="/serve/543">社会救助</a>
                                            <!--<a target="_blank" href="/serve/544">殡葬管理</a>-->
                                            <!--<a target="_blank" href="/serve/545">公共事业</a>-->
                                        </div>
                                    </div>
                                </dd>
                            </dl>


                            <dl>
                                <dt><i class="home_icon icon2"></i>服务企业</dt>
                                <dd>
                                    <div class="content">
                                        <div style="margin-top:50px;float:left;">
                                            <a target="_blank" href="/serve/546">开办设立</a>
                                            <a target="_blank" href="/serve/547">企业变更</a>
                                            <a target="_blank" href="/serve/548">企业注销</a>
                                            <!--<a target="_blank" href="/serve/549">年检年审</a>-->
                                            <a target="_blank" href="/serve/550">企业纳税</a>
                                            <a target="_blank" href="/serve/551">质量监督</a>
                                            <a target="_blank" href="/serve/552">安全生产</a>
                                            <!--<a target="_blank" href="/serve/553">科技服务</a>-->
                                            <a target="_blank" href="/serve/550">企业纳税</a>
                                            <!--<a target="_blank" href="/serve/554">知识产权</a>-->
                                            <!--<a target="_blank" href="/serve/555">对外贸易</a>-->
                                            <!--<a target="_blank" href="/serve/556">质量监督</a>-->
                                        </div>
                                    </div>
                                </dd>
                            </dl>

                        </div>
                    </div>
                    <!--//End 便民公共服务-->

                    <div class="slide_right">
                        <div class="part part0">
                            <div class="mtitle">
                                <h5><a target="_blank" href="/interactive/" title="互动交流">互动交流</a></h5>
                                <span class="en">Interactive Communication</span>
                                <i class="icon1"></i>
                                <i class="icon2"></i>
                                <div class="tabs">
                                    <a target="_blank" href="/interactive" class="more border-no"><i
                                                class="icon-more"></i>更多</a>
                                </div>
                            </div>
                            <!--//End mtitle -->
                            <div class="icons">
                                <a target="_blank" href="/interactive/list_260">
                                    <i class="home_icon icon1"></i>
                                    <span>书记市长信箱</span>
                                </a>
                                <a target="_blank" href="/interactive/list_261">
                                    <i class="home_icon icon4"></i>
                                    <span>部门信箱</span>
                                </a>
                                <a target="_blank" href="/hdjl/myzj.htm">
                                    <i class="home_icon icon2"></i>
                                    <span>征集调查</span>
                                </a>
                                <a target="_blank" href="/static/online.html">
                                    <i class="home_icon icon3"></i>
                                    <span>网上投诉</span>
                                </a>
                                <a target="_blank" href="/weixin/" id="wechat">
                                    <i class="home_icon icon6"></i>
                                    <span>政务微信</span>
                                </a>
                                <a target="_blank" href="http://weibo.com/zltzwgk" target="_blank">
                                    <i class="home_icon icon5"></i>
                                    <span>政务微博</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{--//ENd--}}

                <div class="col3">
                    <div class="view">
                        <div class="part part1 xxlv">
                            <div class="mtitle">
                                <h5>休闲旅游</h5>
                                <span class="en">Zhalan Scenery</span>
                                <i class="icon1"></i>
                                <i class="icon2"></i>
                            </div>
                            <!--//End mtitle -->
                            <div class="cont">
                                <div class="links" data-title="tab-nav">
                                    <a href="/serve/81" target="_blank" role="link" class="active">旅游景点</a>
                                    <a href="/serve/84" target="_blank" role="link">吃住行娱</a>
                                    <a href="/serve/85" target="_blank" role="link">特产购物</a>
                                    <i class="home_icon icon1"></i>
                                    {{--<a target="_blank" href="" class="more">更多&gt;&gt;</a>--}}
                                </div>
                                <div data-title="tab-content">
                                    <div role="panel">
                                        <ul class="news_list">
                                            @foreach($lyjd as $item)
                                                @if($loop->index==0)
                                                    <li class="pic"><a target="_blank"
                                                                       href="/article/{{$item->id}}.html"
                                                                       target="_blank"><img width="140" height="140"
                                                                                            src="http://new.zhalantun.gov.cn/uploads/20171108/030310.jpg"
                                                                                            alt=""></a></li>
                                                @else
                                                    <li><a target="_blank" href="/article/{{$item->id}}.html"
                                                           target="_blank"><i class="dot"></i>{{$item->name}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!--//End 1 -->

                                    <div role="panel" style="display: none">
                                        <ul class="news_list">
                                            @foreach($czxy as $item)
                                                @if($loop->index==0)
                                                    <li class="pic"><a target="_blank"
                                                                       href="/article/{{$item->id}}.html"
                                                                       target="_blank"><img width="140" height="140"
                                                                                            src="http://new.zhalantun.gov.cn/uploads/20171108/031913.jpg"
                                                                                            alt=""></a></li>
                                                @else
                                                    <li><a target="_blank" href="/article/{{$item->id}}.html"
                                                           target="_blank"><i class="dot"></i>{{$item->name}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!--//End 2 -->

                                    <div role="panel" style="display: none">
                                        <ul class="news_list">
                                            @foreach($tcgw as $item)
                                                @if($loop->index==0)
                                                    <li class="pic"><a target="_blank"
                                                                       href="/article/{{$item->id}}.html"
                                                                       target="_blank"><img width="140" height="140"
                                                                                            src="http://new.zhalantun.gov.cn/uploads/20171108/032304.jpg"
                                                                                            alt=""></a></li>
                                                @else
                                                    <li><a target="_blank" href="/article/{{$item->id}}.html"
                                                           target="_blank"><i class="dot"></i>{{$item->name}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!--//End 3 -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//End 休闲旅游 -->


                    <div class="invest" id="invest" style="margin:0 20px;">
                        <div class="mtitle">
                            <h5>招商投资</h5>
                            <span class="en">Merchants Investment</span>
                            <i class="icon1"></i>
                            <i class="icon2"></i>
                        </div>
                        <!--//End mtitle -->
                        <div class="icons">
                            <div class="items">
                                <a href="/serve/249/27374.html" target="_blank"><i class="icon icon1"></i>投资环境</a>
                                <a style="float: right;" href="/serve/250/25012.html" target="_blank"><i
                                            class="icon icon2"></i>招商项目</a>
                                <a href="/serve/249/27375.html" target="_blank"><i class="icon icon3"></i>投资成本</a>
                                <a style="float: right;" href="/serve/249/27376.html" target="_blank"><i
                                            class="icon icon4"></i>投资程序</a>
                            </div>
                            <div class="pic"><img src="{{url('client/images/home_pic_zstz.jpg')}}" alt=""></div>
                        </div>
                    </div>
                    <!--//End 招商投资 -->


                    <div class="count">
                        <div class="mtitle">
                            <h5>报送统计</h5>
                            <span class="en">Recommended Statistics</span>
                            <i class="icon1"></i>
                            <i class="icon2"></i>
                            <div class="tabs">
                                <a target="_blank" href="http://www.zhalantun.gov.cn/admin/index" class="more border-no"
                                   style="font-size: 20px;"><i class="icon-more"></i>上报入口</a>
                            </div>
                        </div>
                        <!--//End mtitle -->
                        <div class="cont cont-tab baosong">
                            <div class="tab" data-title="tab-nav">
                                <a href="/baosong/list/1.html" target="_blank" role="link" class="active">部门排名</a>
                                <a href="/baosong/list/2.html" target="_blank" role="link">乡镇排名</a>
                            </div>

                            <div class="tab-content" data-title="tab-content">
                                <div class="tab-title">
                                    <ul>
                                        <li class="w w1">排名</li>
                                        <li class="w w2">单位</li>
                                        <li class="w w3">报送量</li>
                                        <li class="w w4">采用量</li>
                                    </ul>
                                </div>
                                <div role="panel">
                                    <ul class="sort_list">
                                        @foreach($subGov as $item)
                                            @if($loop->index<5)
                                                <li>
                                                    <span class="w w1"><i class="num one">{{$loop->index+1}}</i></span>
                                                    <span class="w w2">{{$item->department}}</span>
                                                    <span class="w w3">[{{$item->post_count + $item->post_edit_count}}
                                                        ]</span>
                                                    <span class="w w4">[{{$item->use_count + $item->use_edit_count}}]</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div role="panel" style="display: none;">
                                    <ul class="sort_list">
                                        @foreach($subXzqy as $item)
                                            @if($loop->index<5)
                                                <li>
                                                    <span class="w w1"><i class="num one">{{$loop->index+1}}</i></span>
                                                    <span class="w w2">{{$item->department}}</span>
                                                    <span class="w w3">[{{$item->post_count + $item->post_edit_count}}
                                                        ]</span>
                                                    <span class="w w4">[{{$item->use_count + $item->use_edit_count}}]</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!--//End 保送统计 -->

                </div>
                <!--//End 招商投资-->


            </div>
        </div>
    </div>
    <!--//End home-->
@endsection


@section('js')
    <script type="text/javascript">
        $(function () {
            homePage.init();
            var textCut = function (el, num) {
                for (var i = 0; i < el.length; i++) {
                    var str = $(el[i]).html();
                    var s = str;
                    if (str.length > num) {
                        s = str.substring(0, num) + "...";
                    }
                    $(el[i]).html(s);
                }
            }
            textCut($('.front-page p'), 70);
        })
    </script>
@endsection