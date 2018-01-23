@extends('client.wap.module.layouts')

@section('style')

@endsection


@section('content')
    <div class="content">
        @include('client.wap.module.focus')
        {{--//End 轮播图--}}

        <div class="leader_action">
            <div class="ld_title">
                <div class="flex_box">
                    <span class="current" rel="news_span" style="cursor: pointer;">政务要闻<i></i></span>
                    <span rel="news_span" style="cursor: pointer;">部门动态<i></i>
                    </span>
                    <span rel="news_span" style="cursor: pointer;">乡镇之窗<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists" rel="news_ul">
                    @include('client.wap.module.list1',['data'=>$tab1['data1'],'cateId'=>211])
                </div>
                <div class="ld_lists" rel="news_ul" style="display:none;">
                    @include('client.wap.module.list1',['data'=>$tab1['data2'],'cateId'=>212])
                </div>
                <div class="ld_lists" rel="news_ul" style="display:none;">
                    @include('client.wap.module.list1',['data'=>$tab1['data3'],'cateId'=>213])
                </div>
            </div>
        </div>
        <div class="leader_action small_mar">
            <div class="ld_title">
                <div class="flex_box">
                    <span class="current" rel="tips_span" style="cursor: pointer;">视频新闻<i></i>
                    </span>
                    <span rel="tips_span" style="cursor: pointer;">通知公告<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists" rel="tips_ul">
                    @include('client.wap.module.list1',['data'=>$tab1['data4'],'cateId'=>214])
                </div>
                <div class="ld_lists" rel="tips_ul" style="display:none;">
                    @include('client.wap.module.list1',['data'=>$tab1['data5'],'cateId'=>215])
                </div>
            </div>
        </div>
        <div class="leader_action small_mar infor_open">
            <div class="infor_top">
                <span>政务公开</span>
            </div>
            <ul>
                <li><a href="{{url('/plus/61')}}">公开指南</a></li>
                <li><a href="{{url('/plus/59')}}">公开制度</a></li>
                <li><a href="{{url('/plus/62')}}">公开年报</a></li>
                <li><a href="{{url('/plus/38')}}">公开目录</a></li>
                <div class="clear"></div>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="leader_action small_mar">
            <div class="ld_title rules_title">
                <div class="flex_box">
                    <span class="current" rel="rules_span" style="cursor: pointer;">工作报告<i></i></span>
                    <span rel="rules_span" style="cursor: pointer;">政府文件<i></i></span>
                    <span rel="rules_span" style="cursor: pointer;">热点回应<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists" rel="rules_ul">
                    @include('client.wap.module.list1',['data'=>$tab2['data1'],'cateId'=>51])
                </div>
                <div class="ld_lists" rel="rules_ul" style="display:none;">
                    @include('client.wap.module.list1',['data'=>$tab2['data2'],'cateId'=>163])
                </div>
                <div class="ld_lists" rel="rules_ul" style="display:none;">
                    @include('client.wap.module.list1',['data'=>$tab2['data3'],'cateId'=>45])
                </div>
            </div>
        </div>

        <div class="leader_action small_mar infor_open">
            <div class="infor_top">
                <span>办事服务</span>
                <div class="clear"></div>
            </div>
            <div class="ser_down">
                <dl>
                    <dd><a href="{{url('/plus/265')}}">行政审批</a></dd>
                    <dd><a href="{{url('/plus/77')}}">服务个人</a></dd>
                    <dd><a href="{{url('/plus/78')}}">服务企业</a></dd>
                    <dd><a href="{{url('/plus/263')}}">公共服务</a></dd>
                    <dd><a href="{{url('/plus/264')}}">重点办事服务</a></dd>
                    <dd><a href="{{url('/plus/79')}}">综合服务</a></dd>
                </dl>
                <div class="clear"></div>
            </div>
        </div>

        <div class="small_mar">
            <div class="ld_title">
                <div class="gover_ser">
                    <div class="infor_top">
                        <span>走进扎兰</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                @include('client.wap.module.zhalan-navs')
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(function () {
            //政务要闻
            $("[rel=news_span]").tab('[rel=news_ul]', 'current', '');
            //便民提示
            $("[rel=tips_span]").tab('[rel=tips_ul]', 'current', '');
            //政策法规
            $("[rel=rules_span]").tab('[rel=rules_ul]', 'current', '');
        })
    </script>
@endsection