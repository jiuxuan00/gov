@extends('client.components.layouts')

@section('title')互动交流-信件搜索@endsection

@section('content')
    <div class="container">
        <div class="crumbs">
            <span><i class="icon_map"></i></span>
            <span>位置：</span>
            <span><a target="_blank" href="">首页</a></span>
            <span class="gt">&gt;</span>
            <span><a target="_blank" href="/interactive">互动交流</a></span>
            <span class="gt">&gt;</span>
            <span style="color: #999;">信件搜索</span>
        </div>
        <!--//End crumbs-->

        <div id="tsxa_l" class="fl column">
            <div class="portlet">
                <div class="nav_third">
                    <div class="nav_name">互动交流</div>
                    <ul class="nav_ul">
                        @foreach($children as $item)
                            <li class="yili">
                                <a target="_blank" class="yia" href="/interactive/list_{{$item->id}}">{{$item->name}}</a>
                            </li>
                        @endforeach
                        <li class="yili checked"><a href="/interactive/search?phone=" title="信件搜索" target="_blank">信件搜索</a></li>
                    </ul>
                    <div class="pic"><img src="{{url('/client/uploads/201709301102.jpg')}}" alt=""></div>
                </div>
            </div>
        </div>
        {{--//End --}}


        <div id="tsxa_r" class="fr column">
            <div class="mod3 clearfix">
                <span class="title fl">信件搜索</span>
            </div>
            <div class="mailbox-search">
                <form id="mailbox-form" action="" method="post">
                    {{csrf_field()}}
                    <div class="item">
                        <label for="">手机号：</label>
                        <input name="phone" placeholder="请输入手机号" value="{{ old('phone') }}" class="ipt">
                    </div>
                    <div class="item">
                        <label for="">查询密码：</label>
                        <input name="pwd" placeholder="请输入查询密码" class="ipt">
                    </div>
                    <div class="item">
                        <input id="mailbox-submit" class="btn" type="submit" value="搜索">
                    </div>
                </form>
            </div>
            {{--//End--}}
            <div class="mailbox-result">
                <table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <thead>
                    <tr>
                        <th width="140">信件编号</th>
                        <th>标题</th>
                        <th width="100">处理状态</th>
                        <th width="120">回复时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @if(!empty($message))
                        @if(is_object($message))
                                @foreach($message as $item)
                                    <td>{{$item->serial}}</td>
                                    <td><a href="/interactive/detail/{{$item->serial}}.html">{{$item->title}}</a></td>
                                    <td>@if(empty($item->re_content))未办理@else已办理@endif</td>
                                    <td>{{date('Y-m-d',strtotime($item->updated_at))}}</td>
                                @endforeach
                            @elseif(is_string($message))
                                <td colspan="4">
                                    <span style="color:red;">{{$message}}</span>
                                </td>
                        @endif
                    @endif
                    </tr>
                    </tbody>
                </table>

            </div>

        </div>

    </div>
@endsection

@section('js')
    <script>
        navSelect(4);
    $('#mailbox-form').submit(function () {
       var $phone=$(this).find('input[name=phone]').val();
       var $pwd=$(this).find('input[name=pwd]').val();

       //验证手机
       if($phone=='' || $phone.length>11){
            layer.msg('手机号输入错误！');
            return false;
       }
        //验证密码
        if($pwd==''){
            layer.msg('查询密码错误！');
            return false;
        }
    });
    </script>
@endsection