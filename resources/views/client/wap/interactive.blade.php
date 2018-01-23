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
    </div>
@endsection


@section('js')
    <script src="http://www.zhalantun.gov.cn/client/org/layer/layer.js"></script>
    <script src="{{url('/wap/js/hdjl.js')}}"></script>
@endsection