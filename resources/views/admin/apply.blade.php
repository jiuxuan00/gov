@extends('admin.layouts.app')

@section('content')
    <div class="container ad-article">
        <div class="layui-breadcrumb">
            <a href="/">后台首页</a>
            <a>依申请公开</a>
        </div>
        <!--//面包屑-->

        <div class="layui-tab layui-tab-brief" lay-filter="selectType">
            <ul class="layui-tab-title">
                <li lay-id="1" class="layui-this">已公开</li>
                <li lay-id="0">未公开</li>
            </ul>
            <div class="layui-tab-content" style="height: 100px;">
                <table class="layui-hide" id="applay-type1" lay-filter="applayList"></table>
            </div>
        </div>


    </div>


    {{--表格操作模版--}}
    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-small layui-btn-normal" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-small layui-btn-primary" lay-event="del">删除</a>
    </script>
    {{--//End表格操作模版--}}

@endsection


@section('js')
    <script>
        layui.use(['form', 'table', 'element'], function () {
            var table = layui.table,
                element = layui.element;

            initTableRender('#applay-type1', '1');

            //点击标签  已公开/未公开
            element.on('tab(selectType)', function (elem) {
                var type = $(this).attr('lay-id');
                initTableRender('#applay-type1', type);
            });

            //监听表格  编辑和删除
            table.on('tool(applayList)', function (obj) {
                var data = obj.data;
                if (obj.event === 'del') {
                    layer.confirm('确定删除吗？', function (index) {
                        $.ajax({
                            url: '/admin/apply/destory',
                            type: 'POST',
                            data: {
                                '_token': '{{csrf_token()}}',
                                '_method': 'delete',
                                'id': data.id
                            },
                            success:function (res) {
                                layer.msg(res.message);
                                if(res.status==1){
                                    obj.del();
                                }
                                layer.close(index);
                            }
                        })
                    });
                } else if (obj.event === 'edit') {
                    window.location.href = '/admin/apply/' + data.id + '/edit';
                }
            });


            //获取文章数据并渲染
            function initTableRender(el, type) {
                table.render({
                    elem: el,
                    url: '/admin/apply/data?type=' + type,
                    cellMinWidth: '80',
                    cols: [
                        [
                            {field: 'id', width: 40, title: 'ID'},
                            {field: 'serial', width: 100, title: '索引号'},
                            {field: 'name', title: '姓名'},
                            {field: 'email', width: 100, title: '邮箱'},
                            {field: 'phone', width: 100, title: '联系电话'},
                            {field: 'address', width: 120, title: '通讯地址'},
                            {field: 'password', title: '查询密码'},
                            {field: 'content', width: 140, title: '申请内容描述'},
                            {field: 'is_display', title: '是否公开'},
                            {field: 'public_title', title: '公开标题'},
                            {field: 'public_time', width: 110, title: '公开时间'},
                            {field: 'auditor', title: '审核人'},
                            {field: 'count', title: '浏览量'},
                            {field: 'publisher', title: '发布机构'},
                            {field: 'public_content', width: 140, title: '公开内容'},
                            {fixed: 'right', width: 110, align: 'center', toolbar: '#barDemo', title: '操作'}
                        ]
                    ],
                    page: true,
                    limit: 20
                });
            }
        });
    </script>
@endsection