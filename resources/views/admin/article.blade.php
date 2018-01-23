@extends('admin.layouts.app')

@section('content')
    <div class="container ad-article">
        <div class="layui-breadcrumb">
            <a href="/">后台首页</a>
            <a>文章管理</a>
        </div>
        <!--//面包屑-->

        <div class="ad-slide">
            @if(Auth::user()->role==0)
                <div class="layui-collapse " lay-accordion="">
                    <ul class="layui-nav layui-nav-tree layui-bg-cyan layui-inline" lay-filter="demo"
                        style="margin-right: 10px;">
                        <li class="layui-nav-item">
                            <a class="link" data-type="status" href="javascript:;">未审核文章</a>
                        </li>
                        <li class="layui-nav-item">
                            <a class="link" data-type="user" data-id="1" href="javascript:;">管理员</a>
                        </li>
                        <li class="layui-nav-item">
                            <a href="javascript:;">政府部门</a>
                            <dl class="layui-nav-child">
                                @foreach($users as $item)
                                    @if($item->type==1)
                                        <dd><a class="link" data-type="user" href="javascript:;" data-id="{{$item->id}}">{{$item->name}}</a></dd>
                                    @endif
                                @endforeach
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a href="javascript:;">乡镇办事处</a>
                            <dl class="layui-nav-child">
                                @foreach($users as $item)
                                    @if($item->type==2)
                                        <dd><a class="link" data-type="user" href="javascript:;" data-id="{{$item->id}}">{{$item->name}}</a></dd>
                                    @endif
                                @endforeach
                            </dl>
                        </li>

                    </ul>
                </div>
            @else
                <a class="link" href="javascript:;" data-type="user" data-id="{{Auth::user()->id}}" title="{{Auth::user()->name}}">查看全部文章</a>
            @endif
        </div>
        {{--//End slide--}}

        <div class="layui-col-sm12" style="padding-left: 220px;">
            <table class="layui-hide" id="article-list" lay-filter="article-list"></table>
        </div>

    </div>


    {{--表格操作模版--}}
    <script type="text/html" id="barDemo">
        <a href="" class="layui-btn layui-btn-small layui-btn-normal" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-small layui-btn-primary" lay-event="del">删除</a>
        <a class="layui-btn layui-btn-small layui-btn-danger" lay-event="checked">审核</a>
    </script>
    {{--//End表格操作模版--}}

    <template id="select-cate">
        <div class="layui-form">
            <style>
                .layui-input-block {
                    margin-right: 110px;
                    margin-top: 20px;
                }
            </style>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <select id="level-1" lay-filter="level-1">
                        <option value="">请选择</option>
                    </select>
                </div>
                <div class="layui-input-block">
                    <select id="level-2" lay-filter="level-2">
                        <option value="">请选择</option>
                    </select>
                </div>
                <div class="layui-input-block">
                    <select id="level-3" lay-filter="level-3">
                        <option value="">请选择</option>
                    </select>
                </div>
                <div class="layui-input-block">
                    <select id="level-4" lay-filter="level-4">
                        <option value="">请选择</option>
                    </select>
                </div>
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="submit">立即提交</button>
                </div>
            </div>
        </div>
    </template>

@endsection


@section('js')
    <script>
        layui.use(['form', 'table'], function () {
            var form = layui.form;
            var table = layui.table;

            //点击部门
            var $slide = $('.ad-slide');
            $slide.on('click', 'a.link', function () {
                var id = $(this).data('id');
                var type = $(this).data('type');
                var url = '';

                //选中
                $slide.find('a').removeClass('active');
                $(this).addClass('active');

                //判断请求url
                if (type == 'status') {
                    url='/admin/article/verify'
                } else if (type == 'user') {
                    url='/admin/article/user/' + id;
                }

                //获取文章数据并渲染
                table.render({
                    elem: '#article-list',
                    url: url,
                    cols: [
                        [
                            {field: 'id', width: 80, title: '文章ID', sort: true},
                            {field: 'cate_name', event: 'selectCate', width: 100, title: '所属分类'},
                            {field: 'name', width: 200, title: '文章标题'},
                            {field: 'subname', width: 120, title: '副标题'},
                            {field: 'thumb_url', width: 80, title: '缩略图'},
                            {field: 'author', width: 70, title: '作者'},
                            {field: 'department', width: 90, title: '审核人'},
                            {field: 'department', width: 90, title: '文章来源'},
                            {field: 'count', width: 70, title: '阅读量'},
                            {field: 'status', width: 90, title: '审核状态', sort: true},
                            {field: 'updated_at', width: 110, title: '发布时间', sort: true},
                            {fixed: 'right', width: 160, align: 'center', toolbar: '#barDemo', title: '操作'}
                        ]
                    ],
                    page: true,
                    limit: 20,
                    done: function () {
                        $('a[lay-event=checked]').each(function () {
                            var $role = '{{Auth::user()->role}}';
                            if ($role == 1) {
                                $(this).hide();
                            }
                        });
                    }
                });

                //操作
                table.on('tool(article-list)', function (obj) {
                    var data = obj.data;
                    if (obj.event === 'del') {//删除
                        layer.confirm('你确定要删除此文章吗', function (index) {
                            obj.del();
                            layer.close(index);
                            $.ajax({
                                type: 'POST',
                                url: '/admin/article/' + data.id,
                                data: {
                                    '_token': '{{csrf_token()}}'
                                },
                                success: function (res) {
                                    layer.msg(res.messages);
                                }
                            });
                        });
                    } else if (obj.event === 'edit') {//编辑文章
                        $(this).attr('href', '/admin/article/' + data.id + '/edit')
                    } else if (obj.event == 'selectCate') {
                        var article_id = data.id;
                        var categories = [];
                        var selectPid = ''; //分类id

                        layer.open({
                            type: 1,
                            title: '选择分类',
                            skin: 'layui-layer-rim', //加上边框
                            area: ['600px', '500px'], //宽高
                            content: $('#select-cate').html(),
                            success: function () {

                                //初始化
                                getCates(1, 0);


                                //一级
                                form.on('select(level-1)', function (data) {
                                    getCates(2, data.value);
                                });

                                //二级
                                form.on('select(level-2)', function (data) {
                                    getCates(3, data.value);
                                });

                                //三级
                                form.on('select(level-3)', function (data) {
                                    getCates(4, data.value);
                                });

                                //提交
                                form.on('submit(submit)', function(data){
                                    var data = {
                                        _token: '{{csrf_token()}}',
                                        id: article_id,
                                        pid: selectPid
                                    };

                                    $.ajax({
                                        url: '/admin/article/' + article_id + '/update',
                                        type: 'POST',
                                        data: data,
                                        dataType: 'json',
                                        success: function (res) {
                                            layer.msg(res.messages);
                                            setTimeout(function () {
                                                window.location.href=window.location.href;
                                            },2000);
                                        }
                                    });

                                    return false;
                                });


                                //创建option
                                function createOption(data) {
                                    var html = '';
                                    if (data.length > 0) {
                                        for (var i = 0; i < data.length; i++) {
                                            html += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                                        }
                                    }
                                    return html;
                                }

                                //获取分类  index是选择框的索引  id是选中的id
                                function getCates(index, id) {
                                    if (id >= 0) {
                                        $.ajax({
                                            url: '/admin/api/cate/' + id,
                                            type: 'GET',
                                            dataType: 'json',
                                            success: function (res) {
                                                $('#level-' + index).html((id == 0 ? '<option value="0">顶级分类</option>' : '<option value="-1">请选择</option>') + createOption(res));
                                                form.render();
                                            }
                                        });
                                        selectPid = id;
                                    }
                                }
                            }
                        });
                    } else if (obj.event == 'checked') {//审核
                        $.ajax({
                            type: 'POST',
                            url: '/admin/article/' + data.id + '/checked',
                            data: {
                                '_token': '{{csrf_token()}}',
                                'id': data.id
                            },
                            success: function (res) {
                                layer.msg(res.messages, function () {
                                    table.render({
                                        elem: '#article-list',
                                        url: url,
                                        cols: [
                                            [
                                                {field: 'id', width: 80, title: '文章ID', sort: true},
                                                {field: 'cate_name', event: 'selectCate', width: 100, title: '所属分类'},
                                                {field: 'name', width: 200, title: '文章标题'},
                                                {field: 'subname', width: 120, title: '副标题'},
                                                {field: 'thumb_url', width: 80, title: '缩略图'},
                                                {field: 'author', width: 70, title: '作者'},
                                                {field: 'department', width: 90, title: '审核人'},
                                                {field: 'department', width: 90, title: '文章来源'},
                                                {field: 'count', width: 70, title: '阅读量'},
                                                {field: 'status', width: 90, title: '审核状态', sort: true},
                                                {field: 'updated_at', width: 110, title: '发布时间', sort: true},
                                                {fixed: 'right', width: 160, align: 'center', toolbar: '#barDemo', title: '操作' }
                                            ]
                                        ],
                                        page: true,
                                        limit: 20
                                    });
                                });

                            }
                        });
                    }
                });

                return false;
            });



            //动态生成option
            function createOption(data) {
                console.log(data)
                var option = '';
                for (var i = 0; i < data.length; i++) {
                    option += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                }
                return option;
            }

        });
    </script>
@endsection