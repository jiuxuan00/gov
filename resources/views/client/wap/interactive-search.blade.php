@extends('client.wap.module.layouts')

@section('title')互动交流-信件搜索@endsection

@section('content')
    <style type="text/css">
        .con_box, .mailbox-form, .footer {
            width: 100%;
            float: left;
        }

        .mailbox-form {
            padding: 20px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .group {
            width: 100%;
            line-height: 35px;
            float: left;
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .group * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .group label {
            width: 80px;
            position: absolute;
            top: 0;
            left: 0;
        }

        .group .area {
            width: 100%;
            padding-left: 80px;
            float: left;
        }

        .group .area input,
        .group .area textarea {
            width: 100%;
            padding: 10px;
            line-height: 13px;
            outline: none;
            float: left;
            border: 1px solid #e2e2e2;
        }

        .mailbox-form .group .area .code-text {
            width: 120px;
            line-height: 37px;
            background: #ffc413;
            float: left;
            margin-left: 20px;
            text-align: center;
            font-size: 20px;
        }

        .mailbox-form .group .area .submit {
            background: #00a3eb;
            color: #fff;
            padding: 0 20px;
            font-size: 14px;
            float: left;
        }

        .mailbox-form .group label span {
            color: #f00;
        }
        .mailbox {
            width: 100%;
            float: left;
            overflow: hidden;
        }
        .mailbox dt,
        .mailbox dd {
            width: 100%;
            float: left;
        }
        .mailbox span {
            padding: 0 10px;
            font-size: 14px;
            height: 35px;
            line-height: 35px;
            color: #333;
            border: 1px solid #e5e5e5;
            text-align: center;
            float: left;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
        .mailbox span.col1 {
            width: 40%;
            border-top: 0;
        }
        .mailbox span.col2 {
            width: 60%;
            border-left: 0;
            border-top: 0;
        }
        .mailbox dt span {
            background: #e5efff;
        }
        
    </style>
    <div class="container">
        <form class="mailbox-form" id="mailbox-form" action="" method="post">
            {{csrf_field()}}
            <div class="group">
                <label for=""><span>*</span>手机号码：</label>
                <div class="area">
                    <input type="text" value="" name="phone">
                </div>
            </div>
            <div class="group">
                <label for=""><span>*</span>查询密码：</label>
                <div class="area">
                    <input type="password" value="" name="pwd">
                </div>
            </div>
            <div class="group">
                <label for="">&nbsp;</label>
                <div class="area">
                    <input id="mailbox-submit" class="submit" style="line-height: 35px;border: 0;" type="submit" value="搜索">
                </div>
            </div>
        </form>

        <div class="con_box">
            <div class="ld_box">
                @if(isset($message))
                    <dl class="mailbox">
                        <dt>
                            <span class="col1">信件编号</span>
                            <span class="col2">信件标题</span>
                        </dt>
                        @foreach($message as $item)
                            <dd>
                                <span class="col1">{{$item->serial}}</span>
                                <span class="col2"><a href="{{url('')}}/interactive/detail/{{$item->serial}}.html">{{$item->title}}</a></span>
                            </dd>
                        @endforeach
                    </dl>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="http://www.zhalantun.gov.cn/client/org/layer/layer.js"></script>
    <script>
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

        });
    </script>
@endsection