@extends('client.components.layouts')


@section('content')
    <style>
        .container {background: #fff;}
        .link {
            width: 647px;
            padding: 0 20px;
            display: inline-block;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }
        .link:hover {
            text-decoration: underline;
        }
    </style>


    <div class="container">
        <div class="bd article artlist">
            <div class="hd">
                @include('client.components.crumbs',['title1'=>'政务公开','title1Link'=>'/government','title2'=>'依申请公开'])
                <!--//End crumbs-->

                <div id="tsxa_l" class="fl column">
                    @include('client.pc.ysqgk.module.slide',['id'=>0])
                </div>

                <div id="tsxa_r" class="fr column">
                    <div class="mod3 clearfix">
                        <span class="title fl">依申请公开目录</span>
                    </div>
                    <div class="mailbox-result">
                        <table width="100%" border="0" cellspacing="1" cellpadding="0">
                            <thead>
                            <tr>
                                <th>公开标题</th>
                                <th width="180">索引号</th>
                                <th width="100">公开时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td><a class="link" href="/ysqgk/detail/{{$item->id}}.html" title="{{$item->public_title}}" target="_blank">{{$item->public_title}}</a></td>
                                <td>{{$item->serial}}</td>
                                <td>{{date('Y-m-d',strtotime($item->public_time))}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            navSelect(3)
        })
    </script>
@endsection