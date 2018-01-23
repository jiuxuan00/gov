@extends('client.components.layouts')

@section('title')新闻动态@endsection

@section('content')
    <div class="container mb20">
        <div class="bd news">
            <div class="hd">
                <div class="crumbs">
                    <span><i class="icon_map"></i></span>
                    <span>位置：</span>
                    <span><a target="_blank" href="/" title="首页">首页</a></span>
                    <span class="gt">&gt;</span>
                    <span><a target="_blank" href="/government" title="{{$cateName->name}}">{{$cateName->name}}</a></span>
                </div>

                <div id="tsxa_l" class="fl column">
                    <!-- @include('client.components.listSlideNav') -->
                    <div class="portlet">
                        <div class="nav_third">
                            <div class="nav_name">新闻动态</div>
                            <ul class="nav_ul">
                                                    <li class="yili">
                                        <a class="yia" href="/news/211" target="_blank">政务要闻</a>
                                    </li>
                                                    <li class="yili">
                                        <a class="yia" href="/news/212" target="_blank">部门动态</a>
                                    </li>
                                                    <li class="yili">
                                        <a class="yia" href="/news/213" target="_blank">乡镇之窗</a>
                                    </li>
                                                    <li class="yili">
                                        <a class="yia" href="/news/214" target="_blank">视频新闻</a>
                                    </li>
                                                    <li class="yili">
                                        <a class="yia" href="/news/215" target="_blank">通告公示</a>
                                    </li>
                                                    <li class="yili">
                                        <a class="yia" href="/news/216" target="_blank">社会热点</a>
                                    </li>
                                            </ul>
                            <div class="pic"><img src="{{url('/client/images/20171108-1.jpg')}}" alt=""></div>
                        </div>

                    </div>
                </div>
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
