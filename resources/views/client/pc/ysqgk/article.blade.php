@extends('client.components.layouts')

@section('title')报送排名@endsection

@section('content')
    <style>
        #table313 td { border:1px solid #cecece;padding:10px;text-align:left;font-size:14px}
        #table313 td.dt {background:#eee;width:120px;text-align:center}
        #table313 td.dd {width:393px;}
    </style>
    <div class="container mb20">
        <div class="bd article gongkai">
            <div class="hd">
            @include('client.components.crumbs',['title1'=>'政务公开','title1Link'=>'/government','title2'=>'依申请公开'])
                <!--//End crumbs-->

                <div class="hd wrap">
                    <div class="content">
                        <div class="main" id="main">
                            <table id="table313" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                <tr>
                                    <td class="dt">索引号</td>
                                    <td class="dd">{{$article->serial}}</td>
                                    <td class="dt">公开标题</td>
                                    <td>{{$article->public_title}}</td>
                                </tr>
                                <tr>
                                    <td class="dt">公开时间</td>
                                    <td class="dd">{{date('Y-m-d', strtotime($article->public_time))}}</td>
                                    <td class="dt">审核人</td>
                                    <td>{{$article->auditor}}</td>
                                </tr>
                                <tr>
                                    <td class="dt">发布机构</td>
                                    <td>{{$article->publisher}}</td>
                                    <td class="dt">浏览量</td>
                                    <td>{{$article->count}}</td>
                                </tr>
                                <tr>
                                    <td class="dt">公开内容</td>
                                    <td colspan="3">{!! $article->public_content !!}</td>
                                </tr>
                            </table>
                        </div>


                        <div class="right">
                            <ul>
                                <li>
                                    <div class="text"><a target="_blank" href="javascript:print();">打印</a></div>
                                    <div class="pic"><img src="{{asset('client/images/fabu_right_icon_1.jpg')}}" alt=""></div>
                                </li>
                                <li>
                                    <div class="text jiathis_txt">分享</div>
                                    <div class="pic"><img src="{{asset('client/images/fabu_right_icon_2.jpg')}}" alt=""></div>
                                    <!-- JiaThis Button BEGIN -->
                                    <div class="jiathis_style" style="position: absolute; left: 0px; top:0px; width: 40px;height:40px;">
                                        <a target="_blank" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank" style="background: transparent !important;width: 40px !important;height: 40px !important;position: absolute !important;left: 0px !important;top: 0px !important;margin: 0px !important;padding: 0px !important;"></a>
                                        <a target="_blank" class="jiathis_counter_style" style="display: none !important;"></a>
                                    </div>
                                    <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
                                    <!-- JiaThis Button END -->
                                </li>

                                <li class="font_small">
                                    <div class="text" id="font_size_plus">字大</div>
                                    <div class="pic"><img src="{{asset('client/images/fabu_right_icon_3.jpg')}}" alt=""></div>
                                </li>
                                <li class="font_add font_add_dis">
                                    <div class="text" id="font_size_minus">字小</div>
                                    <div class="pic"><img src="{{asset('client/images/fabu_right_icon_4.jpg')}}" alt=""></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--//End 新闻资讯-->
@endsection

@section('js')
    <script>
        $(function () {
            navSelect(3);
        })
    </script>
@endsection