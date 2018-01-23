@extends('admin.layouts.app')

@section('content')
    <div class="ad-article">

        <div class="layui-breadcrumb">
            <a href="/">后台首页</a>
            <a href="/">创建文章</a>
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
            <form class="layui-form" action="{{url('/admin/article/')}}" method="post">
                {{csrf_field()}}
                <div class="layui-form-item">
                    <label class="layui-form-label">文章标题：</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" lay-verify="required" class="layui-input" value="">
                    </div>
                </div>
                {{--//end 文章标题--}}
                <div class="layui-form-item">
                    <label class="layui-form-label">副标题：</label>
                    <div class="layui-input-block">
                        <input type="text" name="subname" lay-verify="title" class="layui-input" value="">
                    </div>
                </div>
                {{--//end 副标题--}}
                <div class="layui-form-item">
                    <label class="layui-form-label">缩略图：</label>
                    <div class="layui-input-block">
                        <div class="upload_image">
                            <div class="preview"><img width="100" height="100" src=""></div>
                            <input type="hidden" name="thumb_url" value="{{old('thumb_url')}}">
                        </div>
                        {{--<input type="text" name="thumb_url" lay-verify="title" class="layui-input" value="缩略图">--}}
                    </div>
                </div>
                {{--//end 缩略图--}}
                <div class="layui-form-item">
                    <label class="layui-form-label">视频：</label>
                    <div class="layui-input-block">
                        <input type="text" name="video" lay-verify="title" class="layui-input" value="">
                    </div>
                </div>
                {{--//end 作者--}}
                <div class="layui-form-item">
                    <label class="layui-form-label">作者：</label>
                    <div class="layui-input-inline">
                        <input type="text" name="author" lay-verify="title" class="layui-input" value="">
                    </div>
                </div>
                {{--//end 作者--}}
                <div class="layui-form-item">
                    <label class="layui-form-label">审核人：</label>
                    <div class="layui-input-inline">
                        <input type="text" name="department" lay-verify="title" class="layui-input" value="">
                    </div>
                </div>
                {{--//end 审核人--}}
                <div class="layui-form-item">
                    <label class="layui-form-label">文章来源：</label>
                    <div class="layui-input-inline">
                        <input type="text" name="source" lay-verify="title" class="layui-input" value="{{Auth::user()->department}}">
                        <input type="hidden" name="user_id" lay-verify="title" class="layui-input" value="{{Auth::user()->id}}">
                    </div>
                </div>
                {{--//end 文章来源--}}
                <div class="layui-form-item">
                    <label class="layui-form-label">文章内容：</label>
                    <div class="layui-input-block">
                        @include('admin.layouts.ueditor')
                    </div>
                </div>
                {{--//end 文章来源--}}
                <div class="layui-form-item">
                    <label class="layui-form-label">阅读量：</label>
                    <div class="layui-input-inline">
                        <input type="number" name="count" lay-verify="title" class="layui-input" value="">
                    </div>
                </div>
                {{--//end 阅读量--}}
                <div class="layui-form-item">
                    <label class="layui-form-label">排序：</label>
                    <div class="layui-input-inline">
                        <input type="number" name="sort" lay-verify="title" class="layui-input" value="">
                    </div>
                </div>
                {{--//end 排序--}}
                <div class="layui-form-item">
                    <label class="layui-form-label">发布时间：</label>
                    <div class="layui-input-inline">
                        <input type="text" name="updated_at" id="date" class="layui-input">
                    </div>
                </div>
                {{--//end 阅读量--}}
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn">立即提交</button>
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
        layui.use(['jquery', 'laydate'], function () {
            var $ = layui.jquery,
                laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#date', //指定元素
                format:'yyyy-MM-dd HH:mm:ss'
            });

            //上传图片
            var _token=$('.layui-form input[name=_token]').val();
            imageUpload.init(_token);
        });
    </script>
@endsection