@extends('client.wap.module.layouts')

@section('style')

@endsection


@section('content')
    <div class="content">
        @include('client.wap.module.focus')
        {{--//End 轮播图--}}


        @foreach($data as $cate)
        <div class="leader_action">
            <div class="ld_title">
                <div class="gover_ser"><h1>{{$cate->name}}<i></i></h1><div class="clear"></div></div>
            </div>
            <div class="ld_box">
                <div class="ld_lists">
                    <ul>
                        @foreach($cate->articles as $article)
                        <li><a href="{{url('/plus').'/'.$article->pid.'/'.$article->id.'.html'}}">{{$article->name}}</a></li>
                        @endforeach
                    </ul>
                    <div class="more_a">
                        <a href="{{url('/plus').'/'.$cate->id}}">更多</a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
@endsection


@section('js')
    <script>
        $(function () {
            //政务要闻
            $("[rel=news_span]").tab('[rel=news_ul]', 'current', '');
            //便民提示
            $("[rel=tips_span]").tab('[rel=tips_ul]', 'current', '');
            //政策法规
            $("[rel=rules_span]").tab('[rel=rules_ul]', 'current', '');
        })
    </script>
@endsection