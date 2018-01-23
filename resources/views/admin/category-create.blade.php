@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="layui-breadcrumb">
            <a href="/">后台首页</a>
            <a>分类管理</a>
        </div>
        <!--//面包屑-->


        <div class="layui-col-sm12">
            <form class="layui-form" action="/admin/cate/store" method="post">
                {{csrf_field()}}
                <div class="layui-form-item">
                    <label class="layui-form-label">所属分类</label>
                    <input id="pid" type="hidden" name="pid" value="">
                    <div class="layui-input-inline">
                        <select id="level-1" lay-filter="level-1">
                            <option value="">请选择省</option>
                        </select>
                    </div>
                    <div class="layui-input-inline">
                        <select id="level-2" lay-filter="level-2">
                            <option value="">请选择市</option>
                        </select>
                    </div>
                    <div class="layui-input-inline">
                        <select id="level-3" lay-filter="level-3">
                            <option value="">请选择市</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">分类名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" required lay-verify="title" placeholder="请输入名称" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">排序</label>
                    <div class="layui-input-block">
                        <input type="number" name="sort" required lay-verify="title" value="0" class="layui-input">
                        <span style="color: #f00;">数值大的排前面</span>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>





@endsection


@section('js')
    <script>
        layui.use(['layer', 'form'], function () {
            var layer = layui.layer,
                form = layui.form;

            var level1 = $('#level-1');
            var level2 = $('#level-2');
            var level3 = $('#level-3');
            var indexOne = 0;
            var indexTwo = 0;
            var pid = $('#pid');

            //获取所有分类数据
            $.ajax({
                url: '/admin/cates',
                type: 'GET',
                dataType: 'json',
                success: function (res) {
                    level1.html('<option value="0">一级分类</option>' + createOption(res));
                    form.render();
                    form.on('select(level-1)', function (data1) {
                        pid.val(data1.value);
                        indexOne = data1.elem.selectedIndex - 1;
                        level2.html(createOption(res[indexOne].children));
                        form.render();
                    });

                    form.on('select(level-2)', function (data2) {
                        pid.val(data2.value);
                        console.log(pid)
                        indexTwo = data2.elem.selectedIndex;
                        level3.html(createOption(res[indexOne].children[indexTwo].children));
                        form.render();
                    });

                    form.on('select(level-3)', function (data3) {
                        pid.val(data3.value);
                    });

                }
            });

            //动态生成option
            function createOption(data) {
                var option = '';
                for (var i = 0; i < data.length; i++) {
                    option += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                }
                return option;
            }


            //提交表单
            // form.on('submit(demo1)', function (data) {
            //     layer.alert(JSON.stringify(data.field), {
            //         title: '最终的提交信息'
            //     })
            //     return false;
            // });

        });
    </script>
@endsection