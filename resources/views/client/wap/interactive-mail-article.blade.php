@extends('client.wap.module.layouts')

@section('title') 互动交流 @endsection

@section('css')
    <style>
        .mailbox-detail table {
            margin-bottom: 30px;
        }
        .mailbox-detail .bgc1 {
            background: #e5efff;
            font-size: 16px;
        }
        .mailbox-detail .bgc2 {
            background: #eee;
            font-size: 16px;
        }
        .mailbox-detail td {
            height: 28px;
            line-height: 28px;
            padding: 4px 20px;
            font-size: 12px;
            border: 1px solid #dce4ec;
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
                    <span class="current">{{$message->cateName}}<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="ld_box">

                <div class="main mailbox-detail" id="main">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <td colspan="2" class="bgc1">信件内容</td>
                        </tr>
                        <tr>
                            <td width="60">信件标题：</td>
                            <td>{{$message->title}}</td>
                        </tr>
                        <tr>
                            <td>提交日期：</td>
                            <td>{{$message->created_at}}</td>
                        </tr>
                        <tr>
                            <td>信件内容：</td>
                            <td>{{$message->content}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <td colspan="2" class="bgc2">回复情况</td>
                        </tr>
                        <tr>
                            <td width="60">回复单位：</td>
                            <td>{{$message->department}}</td>
                        </tr>
                        <tr>
                            <td>回复时间：</td>
                            <td>{{$message->updated_at}}</td>
                        </tr>
                        <tr>
                            <td>回复内容：</td>
                            <td>{{$message->re_content}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection


@section('js')
    <script src="http://www.zhalantun.gov.cn/client/org/layer/layer.js"></script>
    <script src="{{url('/wap/js/hdjl.js')}}"></script>
@endsection