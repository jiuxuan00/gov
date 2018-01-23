@extends('client.wap.module.layouts')

@section('title') {{$article->name}} @endsection

@section('css')
@endsection


@section('content')
    <div class="content">
        <div class="con_box">
            <div class="con_title" style="margin-top: 30px;padding-left: 10px;padding-right: 10px;">{{$article->name}}</div>
            <div class="con_time" style="padding-bottom: 10px;">
                <span style="margin-right: 20px;">发布日期：{{date('Y-m-d',strtotime($article->updated_at))}}</span>
                <span>来源：@if(!empty($article->source)) {{$article->source}} @else 扎兰屯政府网 @endif</span>
            </div>
            <div class="con_words" style="padding-left: 20px;padding-right: 20px;">
                @if(!empty($article->video))
                    <video style="width: 100%;" src="{{$article->video}}" controls></video>
                @endif
                {!! $article->content !!}
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(function () {
           $('.content img').each(function () {
               $(this).css({
                   'width':'100%',
                   'height':'auto',
                   'margin-bottom':'10px'
               })
           })
        })
    </script>
@endsection