@extends('client.components.layouts')


@section('content')
    <div class="container mb20">
        <div class="bd news">
            <div class="hd">
                <div class="crumbs">
                    <span><i class="icon_map"></i></span>
                    <span>位置：</span>
                    <span><a target="_blank" href="/" title="首页">首页</a></span>
                    <span class="gt">&gt;</span>
                    <span><a target="_blank" href="/news" title="{{$cateName->name}}">{{$cateName->name}}</a></span>
                </div>

                <div id="tsxa_l" class="fl column">
                    @include('client.components.listSlideNav')
                </div>
                {{--//End tsxa_l--}}


                <div id="tsxa_r" class="fr column">
                    <div class="mod3">
                        <span class="title fl">{{$cateName->name}}</span>
                    </div>
                    {{--//End--}}

                    <ul class="third_list">
                        @foreach($articles as $item)
                            <li class="lih">
                                <span class="fl"><a target="_blank" href="/news/{{$cateName->id}}/{{$item->id}}.html">{{$item->name}}</a></span>
                                <span class="fr">20{{date('y-m-d', strtotime($item->updated_at))}}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="page">
                        {{ $articles->links() }}
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            newsPage.init();
        });
    </script>
@endsection
