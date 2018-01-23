@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="layui-breadcrumb">
            <a href="/">后台首页</a>
            <a>分类管理</a>
        </div>
        <!--//面包屑-->

        <div class="ad-slide">
            <ul id="demo1"></ul>
        </div>
        {{--//End--}}

        <div class="layui-col-sm12" style="padding-left: 220px;">
            <table class="layui-hide" id="article-list" lay-filter="cate-table"></table>
        </div>
    </div>


    {{--表格操作模版--}}
    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-small layui-btn-primary" lay-event="del">删除</a>
    </script>
    {{--//End表格操作模版--}}


@endsection


@section('js')
    <script>
        layui.use(['tree', 'layer', 'table', 'form'], function () {
            var layer = layui.layer,
                $ = layui.jquery,
                table = layui.table,
                form = layui.form;

            getCateTree();


            table.on('tool(cate-table)', function (obj) {
                var data = obj.data;
                //修改分类名称
                if (obj.event === 'editName') {
                    layer.prompt({
                        formType: 3,
                        title: data.name,
                        value: data.name
                    }, function (value, index) {//value 修改值
                        $.ajax({
                            url: '/admin/cate/' + data.pid + '/' + data.id + '/update',
                            type: 'POST',
                            data: {
                                '_token': '{{csrf_token()}}',
                                '_method': 'put',
                                'name': value,
                                'id': data.id,
                                'pid': data.pid,
                                'sort':data.sort
                            },
                            success: function (res) {
                                layer.close(index);
                                layer.msg(res.message);
                                getCateTree();
                                //同步更新表格和缓存对应的值
                                obj.update({
                                    name: value
                                });
                            }
                        });
                    });
                }

                //修改所属分类
                if (obj.event === 'selectCate') {
                    var article_id = data.id;
                    var cate = data.name;
                    var categories = [];
                    var selectPid = ''; //分类id

                    if(data.pid==0){
                        layer.msg('一级分类不能修改');
                        return;
                    }

                    var layerIndex = layer.open({
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
                                            var _index2 = _data2.elem.selectedIndex - 1;
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
                                var _data = {
                                    '_token': '{{csrf_token()}}',
                                    '_method': 'put',
                                    id: article_id,
                                    pid: selectPid,
                                    name: cate
                                };

                                $.ajax({
                                    url: '/admin/cate/' + data.pid + '/' + data.id + '/update',
                                    type: 'POST',
                                    data: _data,
                                    dataType: 'json',
                                    success: function (res) {
                                        layer.msg(res.message);
                                        setTimeout(function () {
                                            window.location.href = window.location.href;
                                        },1000)
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
                        }
                    });
                }

                //修改分类排序
                if(obj.event === 'editsort'){
                    layer.prompt({
                        formType: 3,
                        title: '分类排序，只能是数字',
                        value: data.sort.toString()
                    }, function (value, index) {//value 修改值
                        $.ajax({
                            url: '/admin/cate/' + data.pid + '/' + data.id + '/update',
                            type: 'POST',
                            data: {
                                '_token': '{{csrf_token()}}',
                                '_method': 'put',
                                'name': data.name,
                                'id': data.id,
                                'pid': data.pid,
                                'sort':value
                            },
                            success: function (res) {
                                layer.close(index);
                                layer.msg(res.message);
                                getCateTree();
                                //同步更新表格和缓存对应的值
                                obj.update({
                                    sort: value
                                });
                            }
                        });
                    });
                }


            });







            //获取分类树
            function getCateTree() {
                $('#demo1').html('');
                $.ajax({
                    url: '/admin/cates',
                    type: 'GET',
                    success: function (res) {
                        layui.tree({
                            elem: '#demo1', //指定元素
                            target: '_blank', //是否新选项卡打开（比如节点返回href才有效）
                            click: function (item) { //点击节点回调
                                // layer.msg('当前节名称：' + item.name + '<br>全部参数：' + JSON.stringify(item));
                                table.render({
                                    elem: '#article-list',
                                    url: '/admin/cate/' + item.pid + '/' + item.id,
                                    cols: [
                                        [
                                            {field: 'id', title: '分类ID'},
                                            {field: 'cate_name', event: 'selectCate', title: '所属分类'},
                                            {field: 'name', event: 'editName', title: '分类名称'},
                                            {field: 'sort', event: 'editsort', title: '分类排序'},
                                            // {fixed: 'right', width: 160, align: 'center', toolbar: '#barDemo', title: '操作' }
                                        ]
                                    ],
                                });
                            },
                            nodes: res
                        });
                    }
                });
            }
        });
    </script>
@endsection