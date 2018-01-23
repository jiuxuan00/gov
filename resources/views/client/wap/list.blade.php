@extends('client.wap.module.layouts')

@section('css')
    <style>
        .page {
            padding: 20px;
        }

        .pagination li {
            float: left;
        }

        .pagination li:first-child,
        .pagination li:last-child {
            display: none;
        }

        .pagination a,
        .pagination span {
            width: 30px;
            line-height: 30px;
            text-align: center;
            float: left;
            background: #eee;
            color: #333;
        }

        .pagination li.active span {
            background: #4976bc;
            color: #fff;
        }

        .Division {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            /*font-size: 14px!important;*/
            line-height: 21px;
        }
    </style>
@endsection


@section('content')
    <div class="content">
        <div class="local_curr"></div>
        <div class="leader_action">

            @if($cate->id=='95' || $cate->id=='96' || $cate->id=='97' || $cate->id=='98')
                <div class="infor_fourBtn">
                    <ul>
                        <li><a href="{{url('/plus/95')}}">市委</a></li>
                        <li><a href="{{url('/plus/96')}}">市人大</a></li>
                        <li><a href="{{url('/plus/97')}}">市政府</a></li>
                        <li><a href="{{url('/plus/98')}}">市政协</a></li>
                    </ul>
                </div>
                <div class="leader_win">
                    <div class="leader_win_tit">
                        <div class="flex_box">
                            <span class="current" rel="leaderWin" style="cursor: pointer;">{{$cate->name}}<i></i></span>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="leader_win_cont">
                        @foreach($articles as $article)
                            <a href="{{url('/plus').'/'.$article->pid.'/'.$article->id.'.html'}}">
                                <div class="leader_list">
                                    <div class="leader_ltop">
                                        <div class="leader_ltopimg"><img src="{{$article->thumb_url}}"></div>
                                        <div class="leader_ltopR">
                                            <h1>{{$article->name}}</h1>
                                            <div class="Division">{{$article->description}}</div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="leader_lbottom">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </a>
                            <div class="clear"></div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="ld_title">
                    <div class="flex_box noChange" style="justify-content: left;">
                        <span class="current" style="float:left;flex: none;">{{$cate->name}}<i></i></span>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="ld_box">
                    <div class="ld_lists">
                        <ul id="data">

                            @if($type==1)
                                @foreach($articles as $article)
                                    <li>
                                        <a href="{{url('/plus').'/'.$article->pid.'/'.$article->id.'.html'}}">{{$article->name}}</a>
                                    </li>
                                @endforeach
                            @elseif($type==2)
                                @foreach($articles as $article)
                                    <li>
                                        <a href="{{url('/plus').'/'.$article->id}}">{{$article->name}}</a>
                                    </li>
                                @endforeach
                            @endif

                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="local_curr"></div>
                <div class="page">
                    {!! $articles->links() !!}
                </div>
            @endif
        </div>

    </div>
@endsection


@section('js')
    <script>
        $(function () {

        })
    </script>
@endsection