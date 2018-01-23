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
            <div class="con_title">人口概况</div>
            <div class="con_time"></div>
            <div class="art">
                <ul>
                    <li>
                        <p>2012年，全市总户数160202户，总人口421384人，其中男性人口216230人，女性人口205154人，各占总人口的51.3%和48.7%。在人口构成中，农业人口255364人，非农业人口166020人，各占总人口的60.6%和39.4%。在总人口中，市区人口130475人，农村人口290909人。全市有22个民族，其中：汉族360808人，蒙古族21809人，其他少数民族38767人，各占总人口的85.6%、5.2%和9.2%。</p>
                    </li>
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