@extends('admin.layouts.app')

@section('content')
    <div class="container ad-article ad-article-edit">

        <div class="">
            @if(count($errors)>0)
                @if(is_object($errors))
                    @foreach($errors->all() as $value)
                        <h1>{{$value}}</h1>
                    @endforeach
                @else
                    <h1>{{$errors}}</h1>
                @endif

            @endif
        </div>


        <form class="layui-form" action="{{url('/admin/article').'/'.$article->id}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            <div class="layui-form-item">
                <label class="layui-form-label">文章标题：</label>
                <div class="layui-input-block">
                    <input type="text" name="name" lay-verify="required" class="layui-input" value="{{$article->name}}">
                </div>
            </div>
            {{--//end 文章标题--}}
            <div class="layui-form-item">
                <label class="layui-form-label">副标题：</label>
                <div class="layui-input-block">
                    <input type="text" name="subname" lay-verify="title" class="layui-input" value="{{$article->subname}}">
                </div>
            </div>
            {{--//end 副标题--}}
            <div class="layui-form-item">
                <label class="layui-form-label">缩略图：</label>
                <div class="layui-input-block">
                    <div class="upload_image active">
                        <div class="preview"><img width="100" height="100" src="/uploads/{{$article->thumb_url}}" style="display: block;"></div>
                        <input type="hidden" name="thumb_url" value="{{old('thumb_url')}}">
                    </div>
                </div>
            </div>
            {{--//end 缩略图--}}
            @if(Auth::user()->role==0)
            <div class="layui-form-item">
                <label class="layui-form-label">设置属性：</label>
                <div class="layui-input-block">
                    <input type="checkbox" name="flags" value="1" title="轮播图" @if($article->flags==1) checked="" @endif>
                </div>
            </div>
            @endif
            {{--//end 设置属性--}}
            <div class="layui-form-item">
                <label class="layui-form-label">视频：</label>
                <div class="layui-input-block">
                    <input type="text" name="video" lay-verify="title" class="layui-input" value="{{$article->video}}">
                </div>
            </div>
            {{--//end 作者--}}
            <div class="layui-form-item">
                <label class="layui-form-label">作者：</label>
                <div class="layui-input-inline">
                    <input type="text" name="author" lay-verify="title" class="layui-input" value="{{$article->author}}">
                </div>
            </div>
            {{--//end 作者--}}
            <div class="layui-form-item">
                <label class="layui-form-label">审核人：</label>
                <div class="layui-input-inline">
                    <input type="text" name="department" lay-verify="title" class="layui-input" value="{{$article->department}}">
                </div>
            </div>
            {{--//end 审核人--}}
            <div class="layui-form-item">
                <label class="layui-form-label">文章来源：</label>
                <div class="layui-input-inline">
                    <input type="text" name="source" lay-verify="title" class="layui-input" value="{{$article->source}}">
                    <input type="hidden" name="user_id" lay-verify="title" class="layui-input" value="{{$article->user_id}}">
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
                    <input type="number" name="count" lay-verify="title" class="layui-input" value="{{$article->count}}">
                </div>
            </div>
            {{--//end 阅读量--}}
            <div class="layui-form-item">
                <label class="layui-form-label">排序：</label>
                <div class="layui-input-inline">
                    <input type="number" name="sort" lay-verify="title" class="layui-input" value="{{$article->sort}}">
                </div>
            </div>
            {{--//end 排序--}}
            <div class="layui-form-item">
                <label class="layui-form-label">发布时间：</label>
                <div class="layui-input-inline">
                    {{--<input type="text" name="updated_at" id="date" class="layui-input" value="{{date('Y-m-d', time($article->updated_at))}}">--}}
                    <input type="text" name="updated_at" id="date" class="layui-input" value="{{$article->updated_at}}">
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

@endsection


@section('js')
    <script src="{{url('/admin/plugins/jquery/jquery.form.min.js')}}"></script>
    <script src="{{url('/admin/js/utils.js')}}"></script>
    <script>
        layui.use(['jquery', 'laydate','form'], function () {
            var $ = layui.jquery,
                laydate = layui.laydate,
                form= layui.form;

            //执行一个laydate实例
            laydate.render({
                elem: '#date' //指定元素
            });

            //上传图片
            var _token=$('.layui-form input[name=_token]').val();
            imageUpload.init(_token);

            //iframe自适应
            $(window).on('resize', function () {
                var winH = $('.layui-body').height();
                $('iframe').css('height', winH + 'px');
            }).resize();


        });
    </script>
@endsection