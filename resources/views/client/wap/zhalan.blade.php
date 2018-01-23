@extends('client.wap.module.layouts')

@section('title') 走进扎兰 @endsection

@section('style')

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
                @include('client.wap.module.zhalan-navs')
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