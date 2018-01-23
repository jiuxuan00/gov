@extends('client.components.layouts')

@section('title')@endsection

@section('content')
    <div class="container">
        @include('client.components.crumbs',['title1'=>'互动交流','title1Link'=>'/interactive','title2'=>$message->cateName])
        <!--//End crumbs-->

        <div class="article">
            <div class="hd wrap">
                <div class="content">
                    <h1>{{$message->cateName}}</h1>
                    {{--<div class="info">--}}
                        {{--<span class="date">发布日期：{{date('Y-m-d', strtotime($message->updated_at))}}</span>--}}
                        {{--<span class="laiyuan">信息来源：扎兰屯政府网</span>--}}
                    {{--</div>--}}
                    <div class="main mailbox-detail" id="main">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td colspan="2" class="bgc1">信件内容</td>
                            </tr>
                            <tr>
                                <td width="60">信件标题：</td>
                                <td>{{$message->title}}</td>
                            </tr>
                            <tr>
                                <td>提交日期：</td>
                                <td>{{$message->created_at}}</td>
                            </tr>
                            <tr>
                                <td>信件内容：</td>
                                <td>{{$message->content}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td colspan="2" class="bgc2">回复情况</td>
                            </tr>
                            <tr>
                                <td width="60">回复单位：</td>
                                <td>{{$message->department}}</td>
                            </tr>
                            <tr>
                                <td>回复时间：</td>
                                <td>{{$message->updated_at}}</td>
                            </tr>
                            <tr>
                                <td>回复内容：</td>
                                <td>{{$message->re_content}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
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
        });
    </script>
@endsection