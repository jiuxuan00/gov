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
        <div class="leader_action">
            <div class="ld_title">
                <div class="flex_box noChange">
                    <span class="current">
                        扎兰名片
                        <i></i>
                    </span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ld_box">
                <div class="ld_lists">
                    <ul id="data">
                        @foreach($data as $item)
                        <li><a href="/plus/{{$item->pid}}/{{$item->id}}.html">{{$item->name}}</a></li>
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