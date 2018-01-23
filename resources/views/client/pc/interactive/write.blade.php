@extends('client.components.layouts')

@section('title')互动交流@endsection

@section('content')
    <div class="container mb20">
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
                        @if($cateName->id==260)
                            <span class="fr" style="color:#9f0007">已答复：13</span>
                            <span class="fr" style="margin-right: 50px;color:#9f0007">本年度收到信件：13</span>
                        @elseif($cateName->id==261)
                            <span class="fr" style="color:#9f0007">已答复：40</span>
                            <span class="fr" style="margin-right: 50px;color:#9f0007">本年度收到信件：40</span>
                        @endif

                    </div>

                    <form class="mailbox" action="/interactive/list_{{$cateName->id}}/store">
                        <input type="hidden" name="pid" value="{{$cateName->id}}">
                        <div class="group">
                            <label for=""><span>*</span>标题：</label>
                            <div class="area">
                                <input type="text" data-verify="title" value="" name="title">
                            </div>
                        </div>
                        <div class="group">
                            <label for=""><span>*</span>您的姓名：</label>
                            <div class="area">
                                <input type="text" data-verify="name" value="" name="name">
                            </div>
                        </div>
                        <div class="group">
                            <label for=""><span>*</span>邮箱地址：</label>
                            <div class="area">
                                <input type="text" data-verify="email" value="" name="email">
                            </div>
                        </div>
                        <div class="group">
                            <label for=""><span>*</span>联系电话：</label>
                            <div class="area">
                                <input type="text" data-verify="phone" value="" name="phone">
                            </div>
                        </div>
                        <div class="group">
                            <label for=""><span>*</span>查询密码：</label>
                            <div class="area">
                                <input type="text" data-verify="password" value="" name="password">
                            </div>
                        </div>
                        <div class="group">
                            <label for=""><span>*</span>通讯地址：</label>
                            <div class="area">
                                <input type="text" data-verify="address" value="" name="address">
                            </div>
                        </div>

                        <div class="group" style="width: 100%;">
                            <label for=""><span>*</span>内容：</label>
                            <div class="area" style="width: 856px">
                                <textarea style="width: 836px" data-verify="content" id="" cols="20" rows="10" name="content"></textarea>
                            </div>
                        </div>
                        <div class="group" style="width: 100%;">
                            <label for=""><span>*</span>验证码：</label>
                            <div class="area">
                                <input type="text" value="" name="code" style="width:130px">
                                <span class="code-text" id="code"></span>
                            </div>
                        </div>
                        <div class="group">
                            <label for="">&nbsp;</label>
                            <div class="area">
                                <a href="javascript:;" id="check" class="submit">确定提交</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{url('/client/org/layer/layer.js')}}"></script>
    <script>
        $(function () {
            interactivePage.list.init();
            var $form=$('form.mailbox');
            var code = 9999;
            var result = {};
            //验证码
            function codes(){
                var num1 = Math.floor(Math.random() * 100);
                var num2 = Math.floor(Math.random() * 100);
                code = num1 + num2;
                $("#code").html(num1 + "+" + num2 + "=?");
            }
            codes();
            $("#code").on('click',codes);

            //提交
            $("#check").on('click', function () {
                var $title=$('input[data-verify=title]').val(); //姓名
                var $name=$('input[data-verify=name]').val(); //姓名
                var $phone=$('input[data-verify=phone]').val(); //联系电话
                var $password=$('input[data-verify=password]').val(); //查询密码
                var $address=$('input[data-verify=address]').val(); //通讯地址
                var $content=$('textarea[data-verify=content]').val(); //通讯地址

                //标题
                if($title.length ==''){
                    layer.msg('标题不能为空！');
                    return;
                }else if($title.length > 100) {
                    layer.msg('标题字数不能大于100！');
                    return;
                }

                //姓名
                if(!isChinaName($name) || $name.length>10){
                    layer.msg('中文名字错误！')
                    return;
                }

                //联系电话
                if(!isPhoneNo($phone)||$phone.length<6 || $phone.length>11){
                    layer.msg('手机号格式错误！')
                    return;
                }

                //查询密码
                if($password.length==''){
                    layer.msg('查询密码不能为空！')
                    return;
                }



                //通讯地址
                if($address.length ==''){
                    layer.msg('通讯地址不能为空！');
                    return;
                }else if($address.length > 50) {
                    layer.msg('通讯地址字数不能大于50！');
                    return;
                }


                //信件内容
                if($content.length ==''){
                    layer.msg('内容不能为空！');
                    return;
                }else if($content.length > 500) {
                    layer.msg('内容字数不能大于500！');
                    return;
                }

                //验证码
                if ($("input[name=code]").val() == code && code != 9999) {
                    //表单数据格式化
                    var format = $form.serializeArray();
                    $.each(format, function() {
                        result[this.name] = this.value;
                    });

                    result._token='{{csrf_token()}}';
                    $.ajax({
                        url:$form.attr('action'),
                        type:'POST',
                        data:result,
                        success:function (res) {
                            if(res.status==1){
                                layer.msg(res.message);
                                setTimeout(function () {
                                    window.location.href=window.location.href;
                                },1000);
                            }
                        }
                    })
                } else {
                    layer.msg('验证码错误，请重试！');
                }
            });
            //验证
            function verifyWrite(name, message) {
                if ($('input[data-verify=' + name + ']').val() == '') {
                    layer.msg(message);
                    return;
                }
            }

            
            // 验证手机号
            function isPhoneNo(str) {
                var pattern = /^1[34578]\d{9}$/;
                return pattern.test(str);
            }

            // 验证中文名称
            function isChinaName(str) {
                var pattern = /^[\u4E00-\u9FA5]{1,6}$/;
                return pattern.test(str);
            }
        });
    </script>
@endsection