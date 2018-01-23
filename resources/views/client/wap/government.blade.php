@extends('client.wap.module.layouts')

@section('css')
    <style>
        .flex_box {
            justify-content: left;
        }
        .flex_box .current {
            float:left;flex: none;
        }
    </style>
@endsection


@section('content')
    <div class="content">
        <div class="local_curr"></div>

        <div class="infor_fourBtn">
            <ul>
                <li><a href="{{url('/plus/95')}}">领导之窗</a></li>
                <li><a href="{{url('/plus/60')}}">依申请公开</a></li>
            </ul>
        </div>
        <div class="infor_fourBtn">
            <ul>
                <li><a href="{{url('/plus/61')}}">公开指南</a></li>
                <li><a href="{{url('/plus/59')}}">公开制度</a></li>
                <li><a href="{{url('/plus/62')}}">公开年报</a></li>
                <li><a href="{{url('/plus/38')}}">公开目录</a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="leader_action small_mar">
            <div class="ld_title">
                <div class="flex_box noChange">
                    <span class="current">政府文件<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists">
                    @include('client.wap.module.list1',['data'=>$zfwj,'cateId'=>163])
                </div>
            </div>
        </div>
        <div class="leader_action small_mar">
            <div class="ld_title">
                <div class="flex_box noChange">
                    <span class="current">政府报告<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists">
                    @include('client.wap.module.list1',['data'=>$zfbg,'cateId'=>40])
                </div>
            </div>
        </div>

        <div class="clear"></div>
        <div class="leader_action">
            <div class="ld_title">
                <div class="flex_box noChange">
                    <span class="current">重点领域信息公开<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists key_areas">
                    <dl>
                        <dd><a href="{{url('/plus/253')}}"><p>权责清单</p></a></dd>
                        <dd><a href="{{url('/plus/257')}}"><p>财政预决算</p></a></dd>
                        <dd><a href="{{url('/plus/47')}}"><p>农村产权交易中心</p></a></dd>
                        <dd><a href="{{url('/plus/688')}}"><p>扶贫脱贫</p></a></dd>
                        <dd><a href="{{url('/plus/256')}}"><p>统计数据信息</p></a></dd>
                        <dd><a href="{{url('/plus/690')}}"><p>社会救助</p></a></dd>

                    </dl>
                    <div class="clear"></div>
                </div>
            </div>
        </div>

        <div class="leader_action small_mar">
            <div class="ld_title">
                <div class="flex_box noChange">
                    <span class="current">规划计划<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists">
                    @include('client.wap.module.list1',['data'=>$ghjh,'cateId'=>53])
                </div>
            </div>
        </div>
        <div class="leader_action small_mar">
            <div class="ld_title">
                <div class="flex_box noChange">
                    <span class="current">政策解读<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists">
                    @include('client.wap.module.list1',['data'=>$zcjd,'cateId'=>167])
                </div>
            </div>
        </div>
        <div class="leader_action small_mar">
            <div class="ld_title">
                <div class="flex_box noChange">
                    <span class="current">热点回应<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists partment_set">
                    @include('client.wap.module.list1',['data'=>$rdhy,'cateId'=>45])
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="leader_action">
            <div class="ld_title">
                <div class="flex_box noChange">
                    <span class="current">政务查阅<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists bm_query">
                    <ul>
                        <li><a href="{{url('/plus/40')}}">政府报告</a></li>
                        <li><a href="{{url('/plus/163')}}">政府文件</a></li>
                        <li><a href="{{url('/plus/610')}}">通知公告</a></li>
                        <li><a href="{{url('/plus/53')}}">规划计划</a></li>
                        <li><a href="{{url('/plus/248')}}">统计数据</a></li>
                        <li><a href="{{url('/plus/258')}}">人事信息</a></li>
                        <li><a href="{{url('/plus/603')}}">新闻发布会</a></li>
                        <li><a href="{{url('/plus/167')}}">政策解读</a></li>
                        <li><a href="{{url('/plus/45')}}">热点回应</a></li>
                        <li><a href="{{url('/plus/43')}}">应急管理</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(function () {

        })
    </script>
@endsection