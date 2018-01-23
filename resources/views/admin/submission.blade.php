@extends('admin.layouts.app')

@section('content')
    <style>
        .layui-tab-content {
            padding-top: 20px;
        }
    </style>
    <div class="container ad-submission">
        <div class="layui-breadcrumb">
            <a href="/">后台首页</a>
            <a>报送文章</a>
        </div>
        <!--//面包屑-->


        <div class="layui-row">
            <div class="layui-col-sm12">
                <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                    <ul class="layui-tab-title">
                        <li class="layui-this">政府部门</li>
                        <li>乡镇办事处</li>
                        <li>不计排名管理员</li>
                    </ul>
                    <div class="layui-tab-content" style="height: 100px;">
                        <div class="layui-tab-item layui-show">
                            <table class="layui-table ">
                                <thead>
                                <tr>
                                    <th width="60">排名</th>
                                    <th>单位</th>
                                    <th>真实报送量&nbsp;&nbsp;|&nbsp;&nbsp;修改报送量</th>
                                    <th>总报送量</th>
                                    <th>真实采用量&nbsp;&nbsp;|&nbsp;&nbsp;修改采用量</th>
                                    <th>总采用量</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($gov as $item)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$item->department}}</td>
                                        <td>
                                            <span class="col">{{$item->post_count}}</span>
                                            <span class="col-line">|</span>
                                            <span class="col">{{$item->post_edit_count}}<i data-id="{{$item->id}}" data-type="post-edit" class="fa fa-pencil"></i></span>
                                        </td>
                                        <td><strong class="red">{{$item->post_count + $item->post_edit_count}}</td>
                                        <td>
                                            <span>{{$item->use_count}}</span>
                                            <span style="margin:0 10px;">|</span>
                                            <span>{{$item->use_edit_count}}<i data-type="use-edit" data-id="{{$item->id}}" class="fa fa-pencil"></i></span>
                                        </td>
                                        <td><strong class="red">{{$item->use_count + $item->use_edit_count}}</strong></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="layui-tab-item">
                            <table class="layui-table ">
                                <thead>
                                <tr>
                                    <th width="60">排名</th>
                                    <th>单位</th>
                                    <th>真实报送量&nbsp;&nbsp;|&nbsp;&nbsp;修改报送量</th>
                                    <th>总报送量</th>
                                    <th>真实采用量&nbsp;&nbsp;|&nbsp;&nbsp;修改采用量</th>
                                    <th>总采用量</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($xzqy as $item)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$item->department}}</td>
                                        <td>
                                            <span class="col">{{$item->post_count}}</span>
                                            <span class="col-line">|</span>
                                            <span class="col">{{$item->post_edit_count}}<i data-id="{{$item->id}}" data-type="post-edit" class="fa fa-pencil"></i></span>
                                        </td>
                                        <td><strong class="red">{{$item->post_count + $item->post_edit_count}}</td>
                                        <td>
                                            <span>{{$item->use_count}}</span>
                                            <span style="margin:0 10px;">|</span>
                                            <span>{{$item->use_edit_count}}<i data-type="use-edit" data-id="{{$item->id}}"
                                                                              class="fa fa-pencil"></i></span>
                                        </td>
                                        <td><strong class="red">{{$item->use_count + $item->use_edit_count}}</strong></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="layui-tab-item">
                            <table class="layui-table ">
                                <thead>
                                <tr>
                                    <th width="60">排名</th>
                                    <th>单位</th>
                                    <th>真实报送量&nbsp;&nbsp;|&nbsp;&nbsp;修改报送量</th>
                                    <th>总报送量</th>
                                    <th>真实采用量&nbsp;&nbsp;|&nbsp;&nbsp;修改采用量</th>
                                    <th>总采用量</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admin as $item)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$item->department}}</td>
                                        <td>
                                            <span class="col">{{$item->post_count}}</span>
                                            <span class="col-line">|</span>
                                            <span class="col">{{$item->post_edit_count}}<i data-id="{{$item->id}}" data-type="post-edit" class="fa fa-pencil"></i></span>
                                        </td>
                                        <td><strong class="red">{{$item->post_count + $item->post_edit_count}}</td>
                                        <td>
                                            <span>{{$item->use_count}}</span>
                                            <span style="margin:0 10px;">|</span>
                                            <span>{{$item->use_edit_count}}<i data-type="use-edit" data-id="{{$item->id}}"
                                                                              class="fa fa-pencil"></i></span>
                                        </td>
                                        <td><strong class="red">{{$item->use_count + $item->use_edit_count}}</strong></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection


@section('js')
    <script>
        layui.use(['form', 'layer'], function () {
            var form = layui.form;

            //修改报送量弹出层模版
            function submissionEditTemplate(id, name) {
                var html = '<form class="layui-form" action="" method="post">' +
                    '  <input type="hidden" name="_token" value="{{csrf_token()}}">' +
                    '  <input type="hidden" name="_method" value="put">' +
                    '  <input type="hidden" name="id" value="' + id + '">' +
                    '  <input type="hidden" name="name" value="' + name + '">' +
                    '  <div class=text"layui-form-item">' +
                    '    <div class="layui-input-block" style="margin-right:110px;margin-top: 40px;">' +
                    '       <input type="number" name="count" require lay-verify="required" class="layui-input">' +
                    '    </div>' +
                    '    <div class="layui-input-block" style="margin-right:110px;margin-top:20px;text-align:center;"><button id="submit" lay-submit="" lay-filter="demo1" class="layui-btn">确定</button></div>' +
                    '  </div>' +
                    '</form>';
                return html;
            }

            //提交部分封装
            function submissionSubmit(id, name) {
                layer.open({
                    type: 1,
                    title: '修改报送量',
                    skin: 'layui-layer-rim', //加上边框
                    area: ['420px', '240px'], //宽高
                    content: submissionEditTemplate(id, name),
                    success: function () {
                        //监听提交
                        form.on('submit(demo1)', function (data) {
                            $.ajax({
                                url: '/admin/submission/' + id,
                                type: 'POST',
                                data: data.field,
                                success: function (res) {
                                    layer.msg(res.messages);
                                    setTimeout(function () {
                                        window.location.href = window.location.href;
                                    }, 1000);
                                }
                            });

                            return false;
                        });
                    }
                });
            }

            //修改报送量
            $('i[data-type=post-edit]').on('click', function () {
                var id = $(this).data('id');
                submissionSubmit(id, 'post_edit_count');
            });

            //修改采用量
            $('i[data-type=use-edit]').on('click', function () {
                var id = $(this).data('id');
                submissionSubmit(id, 'use_edit_count');
            });

        });
    </script>
@endsection