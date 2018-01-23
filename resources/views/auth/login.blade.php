@extends('admin.layouts.app')

@section('css')
    <style>
        body {
            background: #d9e0e7;
            font-size: 12px;
            font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;
            color: #707478;
        }

        .login {
            margin: 168px 0;
            position: relative;
            background: #2d353c!important;
        }

        .login .login-header {
            position: absolute;
            top: -80px;
            left: 50%;
            right: 0;
            width: 450px;
            padding: 0 40px;
            margin-left: -225px;
            font-weight: 300;
        }
        .login .login-header .brand {
            padding: 0;
            font-size: 28px;
        }
        .login .login-header .brand .logo {
            border: 14px solid transparent;
            border-color: #4DCACA #31A3A3 #1D8888;
            width: 28px;
            height: 28px;
            position: relative;
            font-size: 0;
            margin-right: 10px;
            top: -9px;
        }
        .navbar-logo, .coming-soon .brand .logo, .login .login-header .brand .logo {
            border-color: #4DCACA #31A3A3 #1D8888;
        }
        .login .login-header .brand small {
            font-size: 14px;
            display: block;
        }

        .login .login-header .icon {
            position: absolute;
            right: 40px;
            top: -2px;
            opacity: .1;
            filter: alpha(opacity=10);
        }
        .login .login-header .icon i {
            font-size: 70px;
        }


        .login .login-content {
            padding: 30px 40px;
            color: #999;
            width: 450px;
            margin: 0 auto;
        }
        .login .layui-input {
            font-size:16px;
        }
        .login .help-block strong{
            line-height:23px;
            color: #f00;
            font-size:14px;
            font-weight:normal;
        }
        .login .layui-form-label {
            color: #fff;
            font-size:12px;
        }
        .login .layui-form-checkbox[lay-skin=primary] span {
            color: #fff;
        }
    </style>
@endsection

@section('content')
<div class="login">
    <div class="login-header">
        <div class="brand">
            <span class="logo"></span> 扎兰屯政府
            <small>内容管理系统</small>
        </div>
        <div class="icon">
            <i class="fa fa-sign-in"></i>
        </div>
    </div>
    {{--//End--}}
    <div class="login-content">
        <form class="layui-form" role="form" method="POST" action="{{ route('login') }}">
            {{csrf_field()}}

            <div class="layui-form-item">
                <label class="layui-form-label">请输入邮箱：</label>
                <div class="layui-input-block">
                    <input type="text" name="email" lay-verify="require" placeholder="请输入邮箱" class="layui-input">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>邮箱或密码错误请重新输入</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">请输入密码：</label>
                <div class="layui-input-block">
                    <input type="password" name="password" lay-verify="require" placeholder="请输入密码" class="layui-input">
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="layui-form-item" pane="">
                <div class="layui-input-block">
                    <input type="checkbox" name="remember" lay-skin="primary" title="记住密码">
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" type="submit">立即提交</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

@section('js')
    <script>
        layui.use(['form'], function () {
            var form = layui.form
        });
    </script>
@endsection