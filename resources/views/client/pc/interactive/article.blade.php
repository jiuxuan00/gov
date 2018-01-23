@extends('client.components.layouts')

@section('title'){{$article->title}}@endsection

@section('content')
    <div class="container mb20">
        <div class="bd article gongkai">
            <div class="hd">
                <div class="crumbs">
                    <span><i class="icon_map"></i></span>
                    <span>位置：</span>
                    <span><a target="_blank" href="">首页</a></span>
                    <span class="gt">&gt;</span>
                    <span><a target="_blank" href="/interactive">互动交流</a></span>
                    <span class="gt">&gt;</span>
                    {{--<span style="color: #999;">{{$category->name}}</span>--}}
                </div>
                <!--//End crumbs-->

                <div id="tsxa_l" class="fl column">
                    @include('client.pc.interactive.module.sildeNav')
                </div>
                {{--//End --}}

                <div id="tsxa_r" class="fr column">
                    <div class="mod3 clearfix">
                        <span class="title fl">{{$cateName->name}}</span>
                    </div>

                    <table class="table-msg">
                        @if(!empty($article->name))
                        <tr>
                            <td width="10%">姓名：</td>
                            <td>{{$article->name}}</td>
                        </tr>
                        @endif

                        @if(!empty($article->title))
                        <tr>
                            <td width="10%">标题：</td>
                            <td>{{$article->title}}</td>
                        </tr>
                        @endif

                        @if(!empty($article->content))
                        <tr>
                            <td width="10%">内容：</td>
                            <td>{{$article->content}}</td>
                        </tr>
                        @endif
                        <tr>
                            <td width="10%">咨询时间：</td>
                            <td>20{{date('y-m-d h:m:s', strtotime($article->created_at))}}</td>
                        </tr>
                        <tr>
                            <td width="10%">处理状态：</td>
                            <td>已处理</td>
                        </tr>
                        @if(!empty($article->replay_content))
                        <tr>
                            <td width="10%">回复内容：</td>
                            <td>{{$article->replay_content}}</td>
                        </tr>
                        @endif
                        <tr>
                            <td width="10%">处理时间：</td>
                            <td>20{{date('y-m-d h:m:s',strtotime($article->updated_at))}}</td>
                        </tr>
                    </table>
                </div>




            </div>
        </div>
    </div>
    <!--//End 新闻资讯-->
@endsection

@section('js')
    <script>
        $(function () {
            interactivePage.detail.init();
        });
    </script>
@endsection