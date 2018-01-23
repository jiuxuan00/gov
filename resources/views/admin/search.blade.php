@extends('admin.layouts.app')

@section('content')
    <div class="container ad-article">
        <div class="layui-breadcrumb">
            <a href="/">后台首页</a>
            <a>搜索结果</a>
        </div>
        <!--//面包屑-->

        <div class="layui-row">
            <div class="layui-col-sm12">
                <blockquote class="layui-elem-quote">
                    <form class="layui-form" action="">
                        {{csrf_field()}}
                        <input type="hidden" name="redirect" value="/admin/search">
                        <div class="layui-form-item" style="margin-bottom: 0;">
                            <div class="layui-input-inline" style="width: 100px">
                                <select name="type" lay-filter="select">
                                    <option value="0" selected="">文章ID</option>
                                    <option value="1">文章标题</option>
                                </select>
                            </div>
                            <div class="layui-input-inline" id="input" style="width: 230px">
                                <input type="number" name="keyword" required lay-verify="required" autocomplete="off"
                                       placeholder="请输入标题" class="layui-input">
                            </div>
                            <div class="layui-input-inline">
                                <button class="layui-btn" lay-submit="" lay-filter="search">搜索</button>
                            </div>
                        </div>
                    </form>
                </blockquote>
                {{--//End--}}

                <table class="layui-hide" id="test" lay-filter="article-list"></table>

            </div>
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
        layui.use(['form', 'table', 'element'], function () {
            var form = layui.form;
            var table = layui.table;
            var element = layui.element;
            var searchResult = '';

            //搜索
            form.on('submit(search)', function (data) {
                searchResult = data.field;
                submitForm(searchResult);
                return false;
            });

            //
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
                } else if (obj.event == 'selectCate') {//选择分类
                    var article_id = data.id;
                    var categories = [];
                    var selectPid = ''; //分类id
                    var index=layer.open({
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
                                        submitForm(searchResult);
                                        setTimeout(function () {
                                            layer.close(index)
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
                                            {
                                                fixed: 'right',
                                                width: 160,
                                                align: 'center',
                                                toolbar: '#barDemo',
                                                title: '操作'
                                            }
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

            //动态生成option
            function createOption(data) {
                console.log(data)
                var option = '';
                for (var i = 0; i < data.length; i++) {
                    option += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                }
                return option;
            }

            //
            form.on('select(select)', function (data) {
                if (data.value == 0) {
                    $('#input').html('<input type="number" name="keyword" required  lay-verify="required" autocomplete="off" placeholder="请输入标题" class="layui-input">');
                } else if (data.value == 1) {
                    $('#input').html('<input type="text" name="keyword" required  lay-verify="required" autocomplete="off" placeholder="请输入标题" class="layui-input">');
                }
            });



            //搜索提交
            function submitForm(result) {
                $.ajax({
                    url: '/admin/search/result',
                    type: 'POST',
                    data: result,
                    success: function (response) {
                        table.render({
                            elem: '#test',
                            cols: [[
                                {field: 'id', width: 80, title: '文章ID'},
                                {field: 'cate_name', event: 'selectCate', width: 100, title: '所属分类'},
                                {field: 'name', width: 300, title: '文章标题'},
                                {field: 'subname', width: 120, title: '副标题'},
                                {field: 'thumb_url', width: 80, title: '缩略图'},
                                {field: 'author', width: 70, title: '作者'},
                                {field: 'department', width: 90, title: '审核人'},
                                {field: 'department', width: 90, title: '文章来源'},
                                {field: 'count', width: 70, title: '阅读量'},
                                {field: 'status', width: 90, title: '审核状态'},
                                {field: 'updated_at', width: 110, title: '发布时间'},
                                {fixed: 'right', width: 160, align: 'center', toolbar: '#barDemo', title: '操作'}
                            ]],
                            data: response
                        });
                    }
                });
            }

        });
    </script>
@endsection