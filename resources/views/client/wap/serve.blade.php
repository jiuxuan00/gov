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
        <div class="ser_down">
            <dl>
                <dd><a href="{{url('/plus/79')}}">综合办事</a></dd>
                <dd><a href="{{url('/plus/77')}}">服务个人</a></dd>
                <dd><a href="{{url('/plus/78')}}">服务企业</a></dd>
                <dd><a href="{{url('/plus/263')}}">公共服务</a></dd>
                <dd><a href="{{url('/plus/264')}}">重点办事服务</a></dd>
                <dd><a href="{{url('/plus/76')}}">办事服务</a></dd>
            </dl>
            <div class="clear"></div>
        </div>

        <div class="leader_action">
            <div class="ld_title">
                <div class="flex_box noChange">
                    <span class="current">
                        综合服务
                        <i></i>
                    </span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists service_li">
                    <ul>
                        <li><a href="{{url('/plus/87')}}">外事侨务</a></li>
                        <li><a href="{{url('/plus/221')}}">政府法制</a></li>
                        <li><a href="{{url('/plus/656')}}">金融服务</a></li>
                        <li><a href="{{url('/plus/90')}}">电子商务</a></li>
                        <li><a href="{{url('/plus/694')}}">就业创业</a></li>
                        <li><a href="{{url('/plus/93')}}">党建阵地</a></li>
                        <li><a href="{{url('/plus/520')}}">黑木耳专栏</a></li>
                        <li><a href="{{url('/plus/521')}}">红十字会</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>


        <div class="leader_action">
            <div class="ld_title">
                <div class="flex_box noChange">
                    <span class="current">服务个人<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists service_li">
                    <ul>
                        @foreach($fwgr as $item)
                        <li><a href="/plus/{{$item->id}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="leader_action">
            <div class="ld_title">
                <div class="flex_box noChange">
                    <span class="current">服务企业<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists service_li">
                    <ul>
                        @foreach($fwqy as $item)
                            <li><a href="/plus/{{$item->id}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="leader_action">
            <div class="ld_title">
                <div class="flex_box noChange">
                    <span class="current">
                        公共服务
                        <i></i>
                    </span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists service_li">
                    <ul>
                        @foreach($ggfw as $item)
                            <li><a href="/plus/{{$item->id}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>

        <div class="leader_action">
            <div class="ld_title">
                <div class="flex_box noChange">
                    <span class="current">重点办事服务<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists service_li">
                    <ul>
                        @foreach($zdbsfw as $item)
                            <li><a href="/plus/{{$item->id}}">{{$item->name}}</a></li>
                        @endforeach
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