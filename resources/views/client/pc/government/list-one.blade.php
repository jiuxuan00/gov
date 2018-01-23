@extends('client.components.layouts')

@section('title') {{$cateName->name}} @endsection


@section('content')
    <style>
        .ts2017 {
            width: 1220px;
            float: left;
        }
        .ts2017 a {
            width: 181px;
            line-height: 40px;
            background: #f9f9f9;
            color: #333;
            text-align: center;
            font-size: 14px;
            border: 1px solid #e7e7e7;
            float: left;
            margin-top: 20px;
            margin-right: 20px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }
        .ts2017 a:hover {
            background: #9d0010;
            color: #fff;
            border-color: #9d0010;
        }
    </style>
    <div class="container mb20">
        <div class="bd news">
            <div class="hd">
                @include('client.components.crumbs',['title1'=>'政务公开','title1Link'=>'/government','title2'=>$cateName->name])
                {{--//crumbs--}}

                <div id="tsxa_r" class="fr column" style="width: 100%;">
                    <div class="mod3">
                        <span class="title fl">{{$cateName->name}}</span>
                    </div>
                    {{--//End--}}
                    <div class="ts2017">
                        @foreach($categories as $item)
                            <a href="/government/{{$item->id}}" title="{{$item->name}}" target="_blank">{{$item->name}}</a>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            governmentPage.init();
        });
    </script>
@endsection
