@extends('admin.layouts.app')

@section('content')
    <style>
        .layui-input {
            line-height: 38px;
        }

        .layui-textarea {
            min-height: 60px;
            max-height: 130px;
            height: 130px;
            overflow-y: scroll
        }

        .disabled {
            background: #eee;
        }
    </style>
    <div class="ad-article">

        <div class="layui-breadcrumb">
            <a href="/">后台首页</a>
            <a href="javascript:;">依法申请公开</a>
            <a href="javascript:;">回复</a>
        </div>
        <!--//面包屑-->

        <div class="">
            @if(count($errors)>0)
                @foreach($errors->all() as $value)
                    {{$value}}
                @endforeach
            @endif
        </div>

        <div class="container ad-article">
            <form class="layui-form" action="" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">姓名</label>
                        <div class="layui-input-inline">
                            <div class="layui-input disabled">{{$data->name}}</div>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">邮箱</label>
                        <div class="layui-input-inline">
                            <div class="layui-input disabled">{{$data->email}}</div>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">联系电话</label>
                        <div class="layui-input-inline">
                            <div class="layui-input disabled">{{$data->phone}}</div>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">通讯地址</label>
                        <div class="layui-input-inline">
                            <div class="layui-input disabled">{{$data->address}}</div>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">查询密码</label>
                        <div class="layui-input-inline">
                            <div class="layui-input disabled">{{$data->password}}</div>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">申请内容描述：</label>
                    <div class="layui-input-block">
                        <div class="layui-textarea disabled">{{$data->content}}</div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">索引号</label>
                    <div class="layui-input-inline">
                        <input type="text" name="serial" lay-verify="title" class="layui-input" value="{{$data->serial}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">公开标题：</label>
                    <div class="layui-input-block">
                        <input type="text" name="public_title" lay-verify="title" class="layui-input" value="{{$data->public_title}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">公开时间：</label>
                    <div class="layui-input-inline">
                        <input type="text" class="layui-input" id="date" name="public_time" placeholder="yyyy-MM-dd"
                               value="{{$data->public_time}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">审核人：</label>
                    <div class="layui-input-inline">
                        <input type="text" name="auditor" lay-verify="title" class="layui-input" value="{{$data->auditor}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">浏览量：</label>
                    <div class="layui-input-inline">
                        <input type="number" name="count" lay-verify="title" class="layui-input"
                               value="{{$data->count}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">发布机构：</label>
                    <div class="layui-input-inline">
                        <input type="text" name="publisher" lay-verify="title" class="layui-input"
                               value="{{$data->publisher}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">公开内容：</label>
                    <div class="layui-input-block">
                        @include('admin.layouts.ueditor-apply')
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">是否公开：</label>
                    <div class="layui-input-block">
                        <input type="radio" name="is_display" value="1" title="是" @if($data->is_display==1) checked="" @endif>
                        <input type="radio" name="is_display" value="0" title="否" @if($data->is_display==0) checked="" @endif>
                    </div>
                </div>
                {{--//end--}}
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection


@section('js')
    <script src="{{url('/admin/plugins/jquery/jquery.form.min.js')}}"></script>
    <script src="{{url('/admin/js/utils.js')}}"></script>
    <script>
        layui.use(['form', 'laydate'], function () {
            var form = layui.form,
                laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#date', //指定元素
                format: 'yyyy-MM-dd HH:mm:ss'
            });

            //监听提交
            form.on('submit(submit)', function (data) {
                $.ajax({
                    url: '/admin/apply/{{$data->id}}/update',
                    type: 'POST',
                    data: data.field,
                    success: function (res) {
                        if (res.status == 1) {
                            layer.msg(res.message);
                            setTimeout(function () {
                                window.location.href = '/admin/apply';
                            }, 2000);
                        }

                    }
                })

                return false;
            });


        });
    </script>
@endsection