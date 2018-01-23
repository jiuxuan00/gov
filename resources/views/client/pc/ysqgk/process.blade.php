@extends('client.components.layouts')


@section('content')
    <style>
        .container {background: #fff;}
    </style>


    <div class="container">
        <div class="bd article artlist">
            <div class="hd">
                @include('client.components.crumbs',['title1'=>'依申请公开','title1Link'=>'/ysqgk','title2'=>'申请信息流程图'])
                <!--//End crumbs-->
                <div id="tsxa_l" class="fl column">
                    @include('client.pc.ysqgk.module.slide',['id'=>1])
                </div>

                <div id="tsxa_r" class="fr column">
                    <div class="mod3 clearfix">
                        <span class="title fl">申请信息流程图</span>
                    </div>
                    <div class="mailbox-result">
                        <div style="text-align: center;margin-top: 30px;"><img src="/client/images/government/openness_request_image.jpg" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            navSelect(3)
        })
    </script>
@endsection