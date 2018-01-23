@extends('client.wap.module.layouts')

@section('title') 互动交流 @endsection

@section('css')
    <style>
        .footer {
            width: 100%;
            float: left;
        }
        .mailbox {
            width: 100%;
            float: left;
            overflow: hidden;
        }
        .mailbox dt,
        .mailbox dd {
            width: 100%;
            float: left;
        }
        .mailbox span {
            padding: 0 10px;
            font-size: 14px;
            height: 35px;
            line-height: 35px;
            color: #333;
            border: 1px solid #e5e5e5;
            text-align: center;
            float: left;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
        .mailbox span.col1 {
            width: 40%;
            border-top: 0;
        }
        .mailbox span.col2 {
            width: 60%;
            border-left: 0;
            border-top: 0;
        }
        .mailbox dt span {
            background: #e5efff;
        }
        .page {
            width: 100%;
            float: left;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            margin-top: 20px;
        }

        .pagination li {
            float: left;
        }

        .pagination li:first-child,
        .pagination li:last-child {
            display: none;
        }

        .pagination a,
        .pagination span {
            width: 30px;
            line-height: 30px;
            text-align: center;
            float: left;
            background: #eee;
            color: #333;
        }

        .pagination li.active span {
            background: #4976bc;
            color: #fff;
        }

        .Division {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            /*font-size: 14px!important;*/
            line-height: 21px;
        }
    </style>
@endsection


@section('content')
    <div class="content">
        <div class="small_mar">
            <div class="ld_title">
                <div class="gover_ser">
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="city_facts">
                    @include('client.wap.module.hdjl-nav')
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        {{-- //End --}}
        <div class="con_box">
            <div class="local_curr"></div>
            <div class="ld_title">
                <div class="flex_box noChange">
                    <span class="current">{{$cateName->name}}列表<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <dl class="mailbox">
                    <dt>
                        <span class="col1">信件编号</span>
                        <span class="col2">信件标题</span>
                    </dt>
                    @foreach($messages as $item)
                        <dd>
                            <span class="col1">{{$item->serial}}</span>
                            <span class="col2">{{$item->title}}</span>
                        </dd>
                    @endforeach
                </dl>

                <div class="page">
                    {{$messages->links()}}
                </div>
            </div>
        </div>

    </div>
@endsection


@section('js')
    <script src="http://www.zhalantun.gov.cn/client/org/layer/layer.js"></script>
    <script src="{{url('/wap/js/hdjl.js')}}"></script>
@endsection