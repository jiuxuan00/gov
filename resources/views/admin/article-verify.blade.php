@extends('admin.layouts.app')

@section('content')
    <div class="container ad-article">
        <div class="layui-breadcrumb">
            <a href="/">后台首页</a>
            <a>文章管理</a>
        </div>
        <!--//面包屑-->

        <div class="ad-slide">

        </div>
        {{--//End slide--}}

        <div class="layui-col-sm12" style="padding-left: 220px;">
            <table class="layui-hide" id="article-list" lay-filter="article-list"></table>
        </div>

    </div>


    <script type="text/html" id="select-cate">
        <i class="fa fa-edit"></i>
    </script>

    {{--表格操作模版--}}
    <script type="text/html" id="barDemo">
        <a href="" class="layui-btn layui-btn-small layui-btn-normal" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-small layui-btn-primary" lay-event="del">删除</a>
        <a class="layui-btn layui-btn-small layui-btn-danger" lay-event="checked">审核</a>
    </script>
    {{--//End表格操作模版--}}

    <script type="text/html" id="select-cate">
        <form class="layui-form" action="" method="post">
            {{csrf_field()}}
            <div class="layui-form-item">
                <div class="layui-input-block" style="margin-right:110px;margin-top:40px;">
                    <select id="level-1" lay-filter="level-1">
                        <option value="">请选择</option>
                    </select>
                </div>
                <div class="layui-input-block" style="margin-top: 20px;margin-right:110px;margin-bottom: 20px;">
                    <select id="level-2" lay-filter="level-2">
                        <option value="">请选择</option>
                    </select>
                </div>
                <div class="layui-input-block" style="margin-right:110px;">
                    <select id="level-3" lay-filter="level-3">
                        <option value="">请选择</option>
                    </select>
                </div>
                <div class="layui-input-block" style="margin-right:110px;text-align: center;margin-top: 20px;">
                    <button class="layui-btn" id="submit">立即提交</button>
                </div>
            </div>
        </form>
    </script>

@endsection


@section('js')
    <script>
        layui.use(['form', 'table'], function () {
            var form = layui.form;
            var table = layui.table;

            //点击部门
            var $slide = $('.ad-slide');
            $slide.on('click', 'a', function () {
                var id = $(this).data('id');
                $slide.find('a').removeClass('active');
                $(this).addClass('active');
                //获取文章数据并渲染
                table.render({
                    elem: '#article-list',
                    url: '/admin/article/user/' + id,
                    cols: [
                        [
                            {field: 'id', width: 80, title: '文章ID', sort: true},
                            // {field: 'sort', width: 60, title: '排序'},
                            {field: 'cate_name',event: 'selectCate', width: 100, title: '所属分类'},
                            {field: 'name',width:200, title: '文章标题'},
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
                    done:function () {
                        $('a[lay-event=checked]').each(function () {
                            var $role='{{Auth::user()->role}}';
                            if($role==1){
                                $(this).hide();
                            }
                        });
                    }
                });
                return false;
            });

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
                    $(this).attr('href','/admin/article/'+data.id+'/edit')
                }else if(obj.event=='selectCate'){
                    var article_id = data.id;
                    var categories = [];
                    var selectPid = ''; //分类id
                    layer.open({
                        type: 1,
                        title: '选择分类',
                        skin: 'layui-layer-rim', //加上边框
                        area: ['600px', '500px'], //宽高
                        content: '<form class="layui-form" action="" method="post">' +
                        '{{csrf_field()}}' +
                        '                <div class="layui-form-item">' +
                        '                    <div class="layui-input-block" style="margin-right:110px;margin-top:40px;">' +
                        '                        <select id="level-1" lay-filter="level-1">' +
                        '                            <option value="">请选择</option>' +
                        '                        </select>' +
                        '                    </div>' +
                        '                    <div class="layui-input-block" style="margin-top: 20px;margin-right:110px;margin-bottom: 20px;">' +
                        '                        <select id="level-2" lay-filter="level-2">' +
                        '                            <option value="">请选择</option>' +
                        '                        </select>' +
                        '                    </div>' +
                        '                    <div class="layui-input-block" style="margin-right:110px;">' +
                        '                        <select id="level-3" lay-filter="level-3">' +
                        '                            <option value="">请选择</option>' +
                        '                        </select>' +
                        '                    </div>' +
                        '                    <div class="layui-input-block" style="margin-right:110px;text-align: center;margin-top: 20px;">' +
                        '                         <button class="layui-btn" id="submit">立即提交</button>' +
                        '                    </div>' +
                        '                </div>' +
                        '            </form>',
                        success: function () {
                            //获取分类
                            $.ajax({
                                url: '/admin/cates',
                                type: 'GET',
                                dataType: 'json',
                                success: function (res) {
                                    var html = createOption(res);
                                    categories = res;
                                    $('#level-1').html('<option value="">请选择</option>' + html);
                                    $('#level-2').html('<option value="">请选择</option>');
                                    $('#level-3').html('<option value="">请选择</option>');
                                    form.render();

                                    form.on('select(level-1)', function (_data) {
                                        var _index = _data.elem.selectedIndex - 1;
                                        selectPid = _data.value;

                                        $('#level-2').html('<option value="">请选择</option>' + createOption(categories[_index].children));
                                        form.render();

                                        form.on('select(level-2)', function (_data2) {
                                            var _index2 = _data2.elem.selectedIndex-1;
                                            selectPid = _data2.value;

                                            $('#level-3').html('<option value="">请选择</option>' + createOption(categories[_index].children[_index2].children));
                                            form.render();
                                        });

                                        form.on('select(level-3)', function (_data3) {
                                            var _index3 = _data3.elem.selectedIndex;
                                            selectPid = _data3.value;
                                        });

                                    });

                                }
                            });

                            //监听提交,fun
                            $('#submit').on('click', function () {
                                var data = {
                                    _token: '{{csrf_token()}}',
                                    id: article_id,
                                    pid: selectPid
                                };

                                $.ajax({
                                    url: '/admin/article/'+article_id+'/update',
                                    type: 'POST',
                                    data: data,
                                    dataType: 'json',
                                    success: function (res) {
                                        layer.msg(res.messages);
//                                        setTimeout(function () {
//                                            window.location.href = window.location.href;
//                                        }, 1000)
                                    }
                                });

                                return false;
                            });

                        }
                    });
                }else if(obj.event=='checked'){//审核
                    $.ajax({
                        type: 'POST',
                        url: '/admin/article/' + data.id +'/checked',
                        data: {
                            '_token': '{{csrf_token()}}',
                            'id':data.id
                        },
                        success: function (res) {
                            layer.msg(res.messages,function () {
                                table.render({
                                    elem: '#article-list',
                                    url: '/admin/article/user/' + data.user_id,
                                    cols: [
                                        [
                                            {field: 'id', width: 80, title: '文章ID', sort: true},
                                            // {field: 'sort', width: 60, title: '排序'},
                                            {field: 'cate_name',event: 'selectCate', width: 100, title: '所属分类'},
                                            {field: 'name',width:200, title: '文章标题'},
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

        });
    </script>
@endsection