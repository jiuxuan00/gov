@extends('client.components.layouts')

@section('title')@endsection

@section('content')
    <style>
        .mlink {
            width:546px;
            text-align: left;
            padding: 0 10px;float: left;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;
        }
        .mlink:hover {
            text-decoration: underline;
            color: #9f0007;
        }
        .page {
            margin-top: 20px;
        }
    </style>
    <div class="container">
    @include('client.components.crumbs',['title1'=>'互动交流','title1Link'=>'/interactive','title2'=>$crumbsName])
    <!--//End crumbs-->
        <div id="tsxa_l" class="fl column">
            @include('client.pc.interactive.module.sildeNav')
        </div>


        <div id="tsxa_r" class="fr column">
            <div class="mod3 clearfix">
                <span class="title fl">{{$crumbsName}}</span>
            </div>
            <div class="mailbox-result">
                <table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <thead>
                    <tr>
                        <th width="180">信件编号</th>
                        <th>标题</th>
                        <th width="100">处理状态</th>
                        <th width="120">回复时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $item)
                        <tr>
                            <td>{{$item->serial}}</td>
                            <td><a class="mlink" href="/interactive/detail/{{$item->serial}}.html" title="{{$item->title}}">{{$item->title}}</a></td>
                            <td>@if(empty($item->re_content))未办理@else已办理@endif</td>
                            <td>{{date('Y-m-d',strtotime($item->updated_at))}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="page">
                    {{$messages->links()}}
                </div>
            </div>

        </div>


    </div>
    <!--//End 新闻资讯-->
@endsection

@section('js')
    <script>
        $(function () {
            navSelect(4);
            $('.nav_ul li').each(function (index) {
                $(this).removeClass('checked');
                if (index == 5) {
                    $(this).addClass('checked');
                }
            });
        });
    </script>
@endsection