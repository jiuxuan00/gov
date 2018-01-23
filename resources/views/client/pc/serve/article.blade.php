@extends('client.components.layouts')

@section('title'){{$data->name}}@endsection

@section('content')

    <div class="container mb20">
        <div class="bd article gongkai">
            <div class="hd">
                @include('client.components.crumbs',['title1'=>'办事服务','title1Link'=>'/serve','title2'=>$data->cate_name])
                <!--//End crumbs-->
                @include('client.components.article',['article'=>$data])
            </div>
        </div>
    </div>
    <!--//End 新闻资讯-->
@endsection

@section('js')
    <script>
        $(function () {
            servePage.detail.init();
        })
    </script>
@endsection