@extends('admin.layouts.app')

@section('content')
    <div class="container ad-article">
        <div class="layui-breadcrumb">
            <a href="/">后台首页</a>
            <a>文章管理</a>
        </div>
        <!--//面包屑-->


        <div class="layui-row">
            <div class="layui-col-sm12">
                <table id="x-img" class="layui-table">
                    <thead>
                    <tr>
                        <th width="10">ID</th>
                        <th width="24">排序</th>
                        <th width="90">所属分类</th>
                        <th>文章标题</th>
                        <th width="36">副标题</th>
                        <th width="36">缩略图</th>
                        <th>作者</th>
                        <th width="60">审核人</th>
                        <th width="60">文章来源</th>
                        <th width="36">阅读量</th>
                        <th width="48">审核状态</th>
                        <th width="63">发布时间</th>
                        <th width="76">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{$article->id}}</td>
                            <td>{{$article->sort}}</td>
                            <td><span>{{$article->cate_name}}&nbsp;<i class="fa fa-pencil" data-type="cate-edit"
                                                                      data-id="{{$article->id}}"
                                                                      title="编辑"></i></span></td>
                            <td><p class="z-text-hide">{{$article->name}}</p></td>
                            <td>{{$article->subname}}</td>
                            <td><img width="20" height="20" src="/uploads/{{$article->thumb_url}}" alt=""></td>
                            <td>{{$article->author}}</td>
                            <td>{{$article->department}}</td>
                            <td>{{Auth::user()->department}}</td>
                            <td>{{$article->count}}</td>
                            <td>
                                @if($article->status == 0)
                                    未审核
                                @elseif($article->status==1)
                                    已审核
                                @endif
                            </td>
                            <td>{{date('Y-m-d', time($article->updated_at))}}</td>

                            <td>
                                <a data-id="{{$article->id}}"
                                   class="layui-btn layui-btn-small layui-btn-normal edit">修改</a>
                                @if(Auth::user()->role == 0)
                                    <a href="" class="layui-btn layui-btn-small layui-btn-danger">删除</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="layui-box layui-laypage layui-laypage-default">
                    {{ $articles->render() }}
                </div>
            </div>
        </div>

    </div>


@endsection


@section('js')
    <script>
        layui.use(['form', 'laydate', 'layer'], function () {
            var form = layui.form;
            var laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#date' //指定元素
            });


            //弹出即全屏
            $('.edit').on('click', function () {
                //iframe自适应
                var winH = $(window).height();


                var index = layer.open({
                    type: 2,
                    content: '/admin/article/' + $(this).data('id') + '/edit',
                    area: ['320px', winH + 'px'],
                    maxmin: true
                });
                layer.full(index);

            });


            //选择分类
            (function () {

                $('i[data-type=cate-edit]').on('click', function () {
                    var article_id = $(this).data('id');
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
                                url: '/admin/api/menu',
                                type: 'GET',
                                dataType: 'json',
                                success: function (res) {
                                    var html = createOption(res);
                                    categories = res;
                                    $('#level-1').html('<option value="">请选择</option>'+html);
                                    $('#level-2').html('<option value="">请选择</option>');
                                    $('#level-3').html('<option value="">请选择</option>');
                                    form.render();

                                    form.on('select(level-1)', function (_data) {
                                        var _index = _data.elem.selectedIndex-1;
                                        selectPid = _data.value;

                                        $('#level-2').html('<option value="">请选择</option>'+createOption(categories[_index].children));
                                        form.render();

                                        form.on('select(level-2)', function (_data2) {
                                            var _index2 = _data2.elem.selectedIndex-1;
                                            selectPid = _data2.value;

                                            $('#level-3').html('<option value="">请选择</option>'+createOption(categories[_index].children[_index2].children));
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
                                    pid: selectPid,
                                };

                                $.ajax({
                                    url: '/admin/api/update',
                                    type: 'POST',
                                    data: data,
                                    dataType: 'json',
                                    success: function (res) {
                                        layer.msg(res.messages);
                                        setTimeout(function(){
                                            window.location.href=window.location.href;
                                        },1000)
                                    }
                                });

                                return false;
                            });

                        }
                    });


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

            })();

            //所属分类


        });
    </script>
@endsection