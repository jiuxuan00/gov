@extends('client.components.layouts')

@section('title')报送排名@endsection

@section('content')
    <style>
        #table313 th {border:1px solid #c2ccd1;padding:5px;background: #eee}
        #table313 td { border:1px solid #c2ccd1;padding:5px;text-align: center;}
    </style>
    <div class="container mb20">
        <div class="bd article gongkai">
            <div class="hd">
                {{--<div class="crumbs">--}}
                    {{--<span><i class="icon_map"></i></span>--}}
                    {{--<span>位置：</span>--}}
                    {{--<span><a target="_blank" href="">首页</a></span>--}}
                    {{--<span class="gt">&gt;</span>--}}
                    {{--<span style="color: #999;">报送排名</span>--}}
                {{--</div>--}}
            @include('client.components.crumbs',['title1'=>'报送排名','title1Link'=>'','title2'=>'报送排名'])
                <!--//End crumbs-->

                <div class="hd wrap">
                    <div class="content">
                        <h1>{{$articles['title']}}</h1>
                        <div class="info">
                            <span class="date">发布日期：{{date('Y-m-d', time())}}</span>
                            <span class="laiyuan">信息来源： 扎兰屯市人民政府</span>
							<span class="laiyuan"><a href="/2017bm.html" target="_blank">2017年部门报送统计</a></span>
							<span class="laiyuan"><a href="/2017xz.html" target="_blank">2017年乡镇报送统计</a></span>

                        </div>

                        <div class="main" id="main">
                            <table id="table313" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                <thead>
                                <tr>
                                    <th>排名</th>
                                    <th>单位</th>
                                    <th>报送量</th>
                                    <th>采用量</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles['data'] as $item)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$item->department}}</td>
                                    <td>{{$item->post_count + $item->post_edit_count}}</td>
                                    <td>{{$item->use_count + $item->use_edit_count}}</td>
                                </tr>
                                @endforeach
                                </tbody>
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
            //去除html标签
//            (function(){
//                var html = $('#main').text();
//                $('#main').text(removeHtmlTag(html));
//                function removeHtmlTag(str) {
//                    str = str.replace(/<\/?[^>]*>/g, ''); //去除HTML tag
//                    return str;
//                }
//            })();

            //文字大小
            (function(){
                var _main=$('#main');
                _main.addClass("font_16");
                $("#font_size_plus").click(function(){
                    changFontSize(1);
                    return false;
                });
                $("#font_size_minus").click(function(){
                    changFontSize(2);
                    return false;
                });


                function changFontSize(i){
                    if(i == 1){
                        if(_main.hasClass("font_18")){return;}
                        if(_main.hasClass("font_16")){_main.removeClass("font_16").addClass("font_18");return;}
                        if(_main.hasClass("font_14")){_main.removeClass("font_14").addClass("font_16");}
                    }else if(i == 2){
                        if(_main.hasClass("font_18")){_main.removeClass("font_18").addClass("font_16");return;}
                        if(_main.hasClass("font_16")){_main.removeClass("font_16").addClass("font_14");return;}
                        if(_main.hasClass("font_14")){}
                    }
                }

            })();
        })
    </script>
@endsection