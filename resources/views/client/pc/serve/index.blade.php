@extends('client.components.layouts')

@section('title')办事服务@endsection

@section('content')
    <div class="bd serve">
        <div class="container">
            <div class="hd">
                <div class="crumbs">
                    <span><i class="icon_map"></i></span>
                    <span>位置：</span>
                    <span><a target="_blank" href="">首页</a></span>
                    <span class="gt">&gt;</span>
                    <span><a target="_blank" href="">办事服务</a></span>
                </div>
                <!--//End 面包屑-->

                <div class="side">
                    <div class="items">
                        <div class="title"><i></i>综合服务</div>
                        <div class="list list-text">
                            <i class="line"></i>
                            <ul class="">
                                @foreach($zhfw as $item)
                                    @if($item->id !==92)
                                        <li><a target="_blank" href="/serve/{{$item->id}}" target="_blank" title="{{$item->name}}">{{$item->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{--//End 综合服务--}}

                    <div class="items">
                        <div class="title"><i></i>重点办事服务</div>
                        <div class="list list-icon">
                            <ul>
                                @foreach($zdbsfw as $item)
                                    <li style="width: 50%;">
                                        <a target="_blank" href="/serve/{{$item->id}}" target="_blank" title="{{$item->name}}">
                                            <img src="{{url('client/images/serve/icon-zd-').($loop->index + 1).'.png'}}">
                                            <span>{{$item->name}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{--//End 重点办事服务--}}

                    <div class="items">
                        <div class="title"><i></i>公共服务</div>
                        <div class="list list-icon">
                            <ul>
                                @foreach($ggfw as $item)
                                    <li>
                                        <a target="_blank" href="/serve/{{$item->id}}" target="_blank" title="{{$item->name}}">
                                            <img src="{{url('client/images/serve/icon-').($loop->index + 1).'.png'}}">
                                            <span>{{$item->name}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{--//End 公共服务--}}
                </div>
                {{--//End side--}}

                <div class="main">
                    <div class="items">
                        <div class="title"><i></i>服务个人</div>
                        <div class="list-text">
                            <ul>
                                @foreach($fwgr as $item)
                                    <li>
                                        <a target="_blank" href="/serve/{{$item->id}}" target="_blank" title="{{$item->name}}">{{$item->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{--/End/服务个人--}}

                    <div class="line-icon"></div>

                    <div class="items">
                        <div class="title"><i></i>服务企业</div>
                        <div class="list-text">
                            <ul>
                                @foreach($fwqy as $item)
                                    <li>
                                        <a target="_blank" href="/serve/{{$item->id}}" target="_blank" title="{{$item->name}}">{{$item->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{--/End/服务企业--}}

                    <div class="line-icon"></div>

                    <div class="items">
                        <div class="title"><i></i>行政审批</div>
                        <div class="list-text">
                            <ul>
                                @foreach($xzsp as $item)
                                    <li>
                                        <a target="_blank" href="/serve/{{$item->id}}" target="_blank" title="{{$item->name}}">{{$item->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{--/End/行政审批--}}


                </div>
                {{--//End main--}}

            </div>
        </div>
    </div>
    <!--//End 新闻资讯-->
@endsection

@section('js')
    <script>
        $(function(){
            servePage.init();
        })
    </script>
@endsection