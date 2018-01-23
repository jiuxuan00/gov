@extends('admin.layouts.app')

@section('content')
    <div class="container ad-article">
        <div class="layui-breadcrumb">
            <a href="/">后台首页</a>
            <a>修改密码</a>
        </div>
        <!--//面包屑-->

        <form class="layui-form" action="" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            <div class="layui-form-item">
                <label class="layui-form-label">用户名：</label>
                <div class="layui-input-block">
                    <input type="text" name="name" lay-verify="required" class="layui-input" disabled value="{{Auth::user()->name}}">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">新密码：</label>
                <div class="layui-input-block">
                    <input type="text" name="password" lay-verify="required" class="layui-input" value="">
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
                </div>
            </div>
        </form>
    </div>




@endsection


@section('js')
    <script>
        layui.use(['form'], function () {
            var form=layui.form;

            //监听提交
            form.on('submit(submit)', function(data){
                $.ajax({
                    url:'/admin/password/'+1+'/update',
                    type:'POST',
                    data:data.field,
                    success:function (res) {
                        layer.alert(res.message)
                        setTimeout(function () {
                            window.location.href=window.location.href;
                        },2000);
                    }
                });
                return false;
            });
        });
    </script>
@endsection