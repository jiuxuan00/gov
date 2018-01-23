@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="layui-breadcrumb">
            <a href="/">后台首页</a>
            <a>信箱管理</a>
        </div>
        <!--//面包屑-->

        <table class="layui-table" id="messages" lay-filter="messages"></table>

    </div>


    <script type="text/html" id="messageHandle">
        <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">详情</a>
        <a class="layui-btn layui-btn-xs" lay-event="select" id="select">分配</a>
    </script>




    <div id="selectUser" style="display: none;" class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">政府部门</li>
            <li>乡镇办事处</li>
        </ul>
        <div class="layui-tab-content" style="height: 100px;">
            <div class="layui-tab-item layui-show"></div>
            <div class="layui-tab-item"></div>
        </div>
    </div>

@endsection


@section('js')
    <script src="{{url('/admin/js/utils.js')}}"></script>
    <script>
        layui.use(['table', 'layer'], function () {
            var table = layui.table;

            //渲染表格
            table.render({
                elem: '#messages',
                url: '/admin/message/type_' + getUrlParam('type'),
                cellMinWidth: 80,
                cols: [[
                    {field: 'serial', width: 100, sort: true, title: '编号'},
                    {field: 'name', width: 100, title: '姓名'},
                    {field: 'email', width: 150, title: '邮箱'},
                    {field: 'phone', width: 110, title: '电话'},
                    {field: 'address', width: 160, title: '联系地址'},
                    {field: 'title', title: '信件标题'},
                    {field: 'content', width: 200, title: '信件内容'},
                    {field: 'created_at', width: 150, title: '提交日期'},
                    {field: 'is_display', width: 80, title: '是否公开'},
                    {field: 'department', width: 120, title: '回复单位'},
                    {field: 're_content', width: 120, title: '回复内容'},
                    {field: 're_time', width: 120, title: '回复时间'},
                    {fixed: 'right', width: 120, align: 'center', toolbar: '#messageHandle', title: '操作'}
                ]],
                done: function () {
                    var $role = "{{Auth::user()->role}}";
                    if ($role != 0) {
                        $('#select').remove();
                    }
                }
            });

            //监听表格
            table.on('tool(messages)', function (obj) {
                var data = obj.data;
                if (obj.event === 'detail') {
                    window.location.href = '/admin/message/detail/' + data.id + '/edit';
                } else if (obj.event === 'select') {
                    var parent=$('#selectUser');
                    $.ajax({
                        url: '/admin/message/users',
                        type: 'GET',
                        success: function (res) {
                            renderUserToSpan(res);
                            layer.open({
                                type: 1,
                                content: parent,
                                area: ['720px', '520px'],
                            });
                        }
                    });

                    //监听选择用户
                    parent.on('click','span',function () {
                        $.ajax({
                            url: '/admin/message/users/selected',
                            type: 'POST',
                            data:{
                                '_token':'{{csrf_token()}}',
                                'id':data.id,
                                'user_id':$(this).data('uid'),
                                'department':$(this).html()
                            },
                            success: function (res) {
                                layer.msg(res.message);
                                setTimeout(function () {
                                    layer.closeAll();
                                },1000);
                                setTimeout(function () {
                                    window.location.href=window.location.href
                                },1000);
                            }
                        })
                    });


                    //渲染DOM
                    function renderUserToSpan(data) {
                        var strType1 = '';  //政府部门
                        var strType2 = '';  //乡镇办事处
                        for (var i = 0; i < data.length; i++) {
                            if(data[i].type==1){
                                strType1+='<span data-uid="'+data[i].id+'">'+data[i].name+'</span>';
                            }else if(data[i].type==2){
                                strType2+='<span data-uid="'+data[i].id+'">'+data[i].name+'</span>';
                            }
                        }
                        strType1='<div class="message-users">'+strType1+'</div>';
                        strType2='<div class="message-users">'+strType2+'</div>';
                        parent.find('.layui-tab-item').eq(0).html(strType1);
                        parent.find('.layui-tab-item').eq(1).html(strType2);
                    }




                }
            });

        });
    </script>
@endsection