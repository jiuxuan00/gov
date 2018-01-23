@extends('client.components.layouts')

@section('title')搜索结果@endsection

@section('content')
    <div class="hd">
        <div class="crumbs" style="margin: 10px 0;">
            <span><i class="icon_map"></i></span>
            <span>位置：</span>
            <span><a target="_blank" href="/">首页</a></span>
            <span class="gt">&gt;</span>
            <span style="color: #999;">搜索结果</span>
        </div>
        <!--//End crumbs-->
    </div>
    <div class="container search-result" style="padding-top: 20px;">
        <h1 class="title">您搜索的词条为：<strong>{{$keyword}}</strong></h1>
        @if(is_string($articles))
            <h2 style="text-align: center;">{{$articles}}</h2>
        @else
            <ul class="news">
                @foreach($articles as $item)
                    <li>
                        <a target="_blank" href="/article/{{$item->id}}.html">{{$item->name}}</a>
                        <span class="fr">{{date('Y-m-d',strtotime($item->updated_at))}}</span>
                    </li>
                @endforeach
            </ul>
            <div class="page">
                {{$articles->appends(['keyword' => $keyword])->links()}}
            </div>
        @endif
    </div>
@endsection

@section('js')
@endsection