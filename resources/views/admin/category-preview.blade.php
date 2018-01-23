@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="layui-breadcrumb">
            <a href="/">后台首页</a>
            <a>前台预览</a>
        </div>
        <!--//面包屑-->

        <div class="ad-slide">
            <ul id="demo1"></ul>
        </div>
        {{--//End--}}

        <div class="layui-col-sm12" style="padding-left: 220px;">
            <table class="layui-hide" id="article-list" lay-filter="article-list"></table>
        </div>
    </div>


@endsection


@section('js')
    <script>
        layui.use(['tree', 'layer','table'], function () {
            var layer = layui.layer,
                $ = layui.jquery,
                table = layui.table;


            $.ajax({
                url: '/admin/cates',
                type: 'GET',
                success: function (res) {
                    layui.tree({
                        elem: '#demo1', //指定元素
                        target: '_blank', //是否新选项卡打开（比如节点返回href才有效）
                        click: function (item) { //点击节点回调
                            // layer.msg('当前节名称：' + item.name + '<br>全部参数：' + JSON.stringify(item));
                            console.log(item);
                            table.render({
                                elem: '#article-list',
                                url: '/admin/cate/art_' + item.id,
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
                                        {field: 'updated_at', width: 150, title: '发布时间', sort: true},
                                    ]
                                ],
                                page: true,
                                limit: 20
                            });
                        },
                        nodes: res
                    });
                }
            });





        });
    </script>
@endsection