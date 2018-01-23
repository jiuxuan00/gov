@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="layui-breadcrumb">
            <a href="/">后台首页</a>
            <a>信箱管理</a>
        </div>
        <!--//面包屑-->

        <form class="layui-form" action="" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="type" value="{{$message->type}}">
            <div class="layui-form-item">
                <label class="layui-form-label">编号：</label>
                <div class="layui-input-block">
                    <input type="text" name="serial" class="layui-input disabled" value="{{$message->serial}}" disabled>
                </div>
            </div>
            {{--//End--}}
            <div class="layui-form-item">
                <label class="layui-form-label">文章标题：</label>
                <div class="layui-input-block">
                    <input type="text" name="title" class="layui-input disabled" value="{{$message->title}}" disabled>
                </div>
            </div>
            {{--//End--}}
            <div class="layui-form-item">
                <label class="layui-form-label">姓名：</label>
                <div class="layui-input-block">
                    <input type="text" name="name" class="layui-input disabled" value="{{$message->name}}" disabled>
                </div>
            </div>
            {{--//End--}}
            <div class="layui-form-item">
                <label class="layui-form-label">邮箱：</label>
                <div class="layui-input-block">
                    <input type="text" name="email" class="layui-input disabled" value="{{$message->email}}" disabled>
                </div>
            </div>
            {{--//End--}}
            <div class="layui-form-item">
                <label class="layui-form-label">联系电话：</label>
                <div class="layui-input-block">
                    <input type="text" name="phone" class="layui-input disabled" value="{{$message->phone}}" disabled>
                </div>
            </div>
            {{--//End--}}
            <div class="layui-form-item">
                <label class="layui-form-label">联系地址：</label>
                <div class="layui-input-block">
                    <input type="text" name="address" class="layui-input disabled" value="{{$message->address}}" disabled>
                </div>
            </div>
            {{--//End--}}
            <div class="layui-form-item">
                <label class="layui-form-label">信件内容：</label>
                <div class="layui-input-block">
                    <textarea  name="content" class="layui-textarea disabled" disabled>{{$message->content}}</textarea>
                </div>
            </div>
            {{--//End--}}
            <div class="layui-form-item">
                <label class="layui-form-label">是否公开</label>
                <div class="layui-input-block">
                    <input type="radio" name="is_display" value="0" title="不公开" checked="">
                    <input type="radio" name="is_display" value="1" title="公开">
                </div>
            </div>
            {{--//End--}}
            <div class="layui-form-item">
                <label class="layui-form-label">回复单位：</label>
                <div class="layui-input-block">
                    <input type="text" name="department" class="layui-input" value="{{$message->department}}">
                </div>
            </div>
            {{--//End--}}
            <div class="layui-form-item">
                <label class="layui-form-label">回复内容：</label>
                <div class="layui-input-block">
                    <textarea  name="re_content" class="layui-textarea">{{$message->re_content}}</textarea>
                </div>
            </div>
            {{--//End--}}
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="messageSubmit">立即提交</button>
                </div>
            </div>
        </form>

    </div>
@endsection


@section('js')
    <script>
        layui.use(['form'], function () {
            var form = layui.form;

            form.on('submit(messageSubmit)', function(data){
                $.ajax({
                    url:"{{url('/admin/message/detail/').'/'.$message->id}}",
                    type:'POST',
                    data:data.field,
                    success:function (res) {
                        if(res.status==1){//成功
                            layer.msg(res.message);
                            setTimeout(function () {
                                window.location.href='/admin/message/show?type='+res.type;
                            },1000);
                        }else if(res.status==0){
                            layer.msg(res.message);
                        }
                    }
                });

                return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
            });



        });
    </script>
@endsection