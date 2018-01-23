$(function () {
    //政务微博
    $('#wechat').on('click',function () {
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            area: '100%',
            skin: 'layui-layer-nobg', //没有背景色
            shadeClose: true,
            content: $('#tong')
        });
    });
});

$(function () {
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

            result._token='U9dbOxW39ZCTChuiaDHegGhLoHxdFeo2CXSwm000';
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