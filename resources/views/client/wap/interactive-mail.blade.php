@extends('client.wap.module.layouts')

@section('title') 互动交流 @endsection

@section('css')

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
                    <span class="current">@if($dataId==260)市长信箱@elseif($dataId==261)部门信箱@endif<i></i></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                @include('client.wap.module.hdjl-form-mail',['dataId'=>$dataId])
            </div>
        </div>

    </div>
@endsection


@section('js')
    <script src="http://www.zhalantun.gov.cn/client/org/layer/layer.js"></script>
    <script src="{{url('/wap/js/hdjl.js')}}"></script>
@endsection