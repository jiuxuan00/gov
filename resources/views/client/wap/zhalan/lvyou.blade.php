@extends('client.wap.module.layouts')

@section('title') 走进扎兰 @endsection

@section('css')
    <style>
        .art {
            padding: 10px 20px;
        }
        .art p {
            font-size: 14px;
            line-height: 25px;
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
                @include('client.wap.module.zhalan-navs')
            </div>
        </div>
        <div class="local_curr"></div>
        {{--//End--}}
        <div class="con_box">
            <div class="con_title">扎兰旅游</div>
            <div class="con_time"></div>
            <div class="art">
                <ul>
                </ul>
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