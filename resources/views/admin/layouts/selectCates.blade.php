@extends('admin.layouts.app')

@section('content')
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
@endsection

@section('js')
    <script>
        layui.use(['layer', 'form'], function () {
            var form = layui.form;

            (function () {
                //最终的分类id
                var resultId = '';

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
                        resultId = id;
                        console.log(resultId)
                    }
                }
            })();


        });
    </script>
@endsection