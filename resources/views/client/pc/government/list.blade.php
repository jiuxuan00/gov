@extends('client.components.layouts')

@section('title') {{$cateName->name}} @endsection

@section('content')
    <div class="container mb20">
        <div class="bd news">
            <div class="hd">
                <div class="crumbs">
                    <span><i class="icon_map"></i></span>
                    <span>位置：</span>
                    <span><a target="_blank" href="/" title="首页">首页</a></span>
                    <span class="gt">&gt;</span>
                    <span><a target="_blank" href="/government" title="政务公开">政务公开</a></span>
                    <span class="gt">&gt;</span>
                    <span><a target="_blank" href="">{{$cateName->name}}</a></span>
                </div>

                <div id="tsxa_l" class="fl column">



                @if($cateName->id==95 || $cateName->id==96 || $cateName->id==97 || $cateName->id==98)
                    <div class="nav_third">
                        <div class="nav_name">领导之窗</div>
                        <ul class="nav_ul">
                            <li @if($cateName->id==95) class="yili checked" @else class="yili" @endif>
                                <a class="yia" href="/government/95" traget="_blank">市委领导</a>
                            </li>
                            <li @if($cateName->id==96) class="yili checked" @else class="yili" @endif>
                                <a class="yia" href="/government/96" traget="_blank">市人大领导</a>
                            </li>
                            <li @if($cateName->id==97) class="yili checked" @else class="yili" @endif>
                                <a class="yia" href="/government/97" traget="_blank">市政府领导</a>
                            </li>
                            <li @if($cateName->id==98) class="yili checked" @else class="yili" @endif>
                                <a class="yia" href="/government/98" traget="_blank">市政协领导</a>
                            </li>
                        </ul>
                    </div>
                    @else
                        @include('client.components.listSlideNav')
                @endif


                </div>
                {{--//End tsxa_l--}}



                <div id="tsxa_r" class="fr column">
                    <div class="mod3">
                        <span class="title fl">{{$cateName->name}}</span>
                    </div>
                    {{--//End--}}


                    {{--文本列表--}}
                    @if($cateName->page_type==1)
                        @include('client.pc.government.module.textList')
                    @endif


                    {{--领导之窗--}}
                    @if($cateName->id==95 || $cateName->id==96 || $cateName->id==97 || $cateName->id==98)
                        @include('client.pc.government.module.leader')
                    @endif


                    {{--默认列表--}}
                    @if(!$cateName->page_type)
                        <ul class="third_list">
                            @foreach($articles as $item)
                                <li class="lih">
                                    <span class="fl"><a target="_blank" href="/government/{{$item->pid}}/{{$item->id}}.html">{{$item->name}}</a></span>
                                    <span class="fr">20{{date('y-m-d', strtotime($item->updated_at))}}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif


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
           governmentPage.init();
        });
    </script>
@endsection
