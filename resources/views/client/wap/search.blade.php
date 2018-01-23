@extends('client.wap.module.layouts')

@section('css')
    <style>
        .keyword {
            line-height: 30px;
            font-size: 14px;
            padding:10px;
        }
        .keyword strong {
            color: #c70101;
        }
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
    </style>
@endsection



@section('content')
    <div class="content">
        <div class="leader_action">
            <div class="ld_title">
                <div class="keyword">您搜索的关键词为：<strong>{{$keyword}}</strong></div>
                <div class="clear"></div>
            </div>
            <div class="ld_box">
                <div class="ld_lists">
                    <ul>
                        @foreach($articles as $item)
                        <li><a href="/plus/{{$item->pid}}/{{$item->id}}.html">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                    <div class="clear"></div>

                </div>
            </div>
            <div class="local_curr"></div>
            <div class="page">
                {{$articles->appends(['keyword' => $keyword])->links()}}
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(function () {

        })
    </script>
@endsection