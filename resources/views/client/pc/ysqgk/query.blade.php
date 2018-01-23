@extends('client.components.layouts')

@section('title')互动交流-信件搜索@endsection

@section('content')
    <div class="container">
    @include('client.components.crumbs',['title1'=>'依申请公开','title1Link'=>'/ysqgk','title2'=>'依申请公开查询'])
    <!--//End crumbs-->

        <div id="tsxa_l" class="fl column">
            @include('client.pc.ysqgk.module.slide',['id'=>3])
        </div>
        {{--//End --}}


        <div id="tsxa_r" class="fr column">
            <div class="mod3 clearfix">
                <span class="title fl">依申请公开查询</span>
            </div>
            <div class="mailbox-search">
                <form id="mailbox-form" action="" method="post">
                    <div class="item">
                        <label for="">手机号：</label>
                        <input name="phone" placeholder="请输入手机号" value="15311482734" class="ipt">
                    </div>
                    <div class="item">
                        <label for="">查询密码：</label>
                        <input name="pwd" placeholder="请输入查询密码" value="111" class="ipt">
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
                        <th>公开标题</th>
                        <th width="180">索引号</th>
                        <th width="100">公开时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="content">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection

@section('js')
    <script>
        navSelect(3);
        $('#mailbox-form').submit(function () {
            var $phone = $(this).find('input[name=phone]').val();
            var $pwd = $(this).find('input[name=pwd]').val();

            //验证手机
            if ($phone == '' || $phone.length > 11) {
                layer.msg('手机号输入错误！');
                return false;
            }
            //验证密码
            if ($pwd == '') {
                layer.msg('查询密码错误！');
                return false;
            }

            //提交数据
            $.ajax({
                url: '/ysqgk/query/search',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'phone': $phone,
                    'password': $pwd,
                },
                success: function (res) {
                    // var data=res[0];
                    if (res.status == 0) {
                        layer.msg(res.data);
                    }
                    if (res.status == 1) {
                        $('#content td').eq(0).html('<a href="/ysqgk/detail/'+res.data.id+'.html">' + res.data.public_title + '</a>');
                        $('#content td').eq(1).html(res.data.serial);
                        $('#content td').eq(2).html(res.data.public_time.substr(0, 10));
                    }
                }
            })

            return false;


        });
    </script>
@endsection