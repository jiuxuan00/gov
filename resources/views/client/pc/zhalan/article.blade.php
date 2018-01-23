@extends('client.components.layouts')

@section('title'){{$data->name}}@endsection

@section('content')

    <div class="container mb20">
        <div class="bd article gongkai">
            <div class="hd">
                @include('client.components.crumbs',['title1'=>'走进扎兰','title1Link'=>'/zhalan.html','title2'=>$data->cate_name])
                <!--//End crumbs-->
                @include('client.components.article',['article'=>$data])
            </div>
        </div>
    </div>
    <!--//End 走进扎兰-->
@endsection

@section('js')
    <script>
        $(function () {
            zhalanPage.init();
        })
    </script>
@endsection