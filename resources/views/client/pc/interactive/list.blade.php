@extends('client.components.layouts')

@section('title'){{$cateName->name}}@endsection

@section('content')
    <div class="interactive mb20">
        <div class="container">
        <div class="bd article artlist">
            <div class="hd">
                <div class="crumbs">
                    <span><i class="icon_map"></i></span>
                    <span>位置：</span>
                    <span><a target="_blank" href="">首页</a></span>
                    <span class="gt">&gt;</span>
                    <span style="color: #999;">互动交流</span>
                </div>
                <!--//End crumbs-->


                <div id="tsxa_l" class="fl column">
                    @include('client.pc.interactive.module.sildeNav')
                </div>

                <div id="tsxa_r" class="fr column">
                    <div class="mod3 clearfix">
                        <span class="title fl">{{$cateName->name}}</span>
                    </div>
                    @if(empty($data))
                    <ul class="third_list">
                        @foreach($data as $item)
                        <li class="lih">
                            <span class="fl"><a target="_blank" href="/interactive/{{$cateName->id}}/detail/{{$item->id}}.html" target="_blank" title="">{{$item->name}}</a></span>
                            <span class="fr">{{date('Y-m-d',strtotime($item->updated_at))}}</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="page">
                        {{ $data->links() }}
                    </div>
                    @endif



                    {{--书记市长信箱--}}
                    @if($cateName->id==260 || $cateName->id==261)
                        @include('client.pc.interactive.szyx')
                    @endif
                    {{--//ENd书记市长信箱--}}


                    {{--民意征集--}}
                    @if($cateName->id==245)
                        <ul class="third_list">
                            <li class="lih">
                                <span class="fl"><a target="_blank" href="http://new.zhalantun.gov.cn/static/wenjuan1.html">政府网站栏目满意率调查问卷</a></span>
                                <span class="fr">2017-11-08</span>
                            </li>
                            <li class="lih">
                                <span class="fl"><a target="_blank" href="http://new.zhalantun.gov.cn/static/wenjuan.html">扎兰屯市创建全国文明城市调查问卷</a></span>
                                <span class="fr">2017-10-10</span>
                            </li>

                        </ul>
                    @endif
                    {{--//End 民意征集--}}


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js')
    <script>
        $(function(){
            interactivePage.list.init();
        });
    </script>
@endsection