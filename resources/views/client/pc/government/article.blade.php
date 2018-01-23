@extends('client.components.layouts')

@section('title') {{$data->name}} @endsection


@section('content')

    <div class="container mb20">
        <div class="bd article gongkai">
            <div class="hd">
                @include('client.components.crumbs',['title1'=>'政务公开','title1Link'=>'/news','title2'=>$data->cate_name])
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
            governmentPage.detail();
        })
    </script>
@endsection