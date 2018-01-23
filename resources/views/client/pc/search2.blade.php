@extends('client.components.layouts')

@section('title')搜索结果@endsection


@section('content')
    <div class="hd">
        <div class="crumbs" style="margin: 10px 0;">
            <span><i class="icon_map"></i></span>
            <span>位置：</span>
            <span><a target="_blank" href="/">首页</a></span>
            <span class="gt">&gt;</span>
            <span style="color: #999;">高级搜索</span>
        </div>
        <!--//End crumbs-->
    </div>
    <div class="container search-result" style="padding-top: 20px;">
        <div class="group">
            <label for="" style="font-size: 20px;">高级搜索</label>
        </div>
        <div class="group">
            <label for="">检索关键词：</label>
            <div class="ipt">
                <input type="text" class="item" placeholder="站内搜索">
            </div>
        </div>
        <div class="group">
            <label for="">时间段选择：</label>
            <div class="ipt date-ipt">
                <span style="left: 10px">从：</span>
                <input type="text" class="item date-item" placeholder="YYYY-MM-DD" lay-key="">
                <span style="left: 290px;">至：</span>
                <input type="text" class="item date-item" placeholder="YYYY-MM-DD" lay-key="">
            </div>
        </div>
        <div class="group">
            <label for="">搜索词位置：</label>
            <div class="ipt">
                <span><input type="radio"><em>标题</em></span>
                <span><input type="radio"><em>正文</em></span>
            </div>
        </div>
        <div class="group" style="border-bottom:0;">
            <label for="">&nbsp;</label>
            <div class="ipt">
                <a href="" class="submit">确定</a>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('client/org/laydate/laydate.js')}}"></script>
    <script>
       $(function () {
           lay('.date-item').each(function(){
               laydate.render({
                   elem: this,
                   trigger: 'click'
               });
           });
           // laydate.render({
           //     elem: '#date1',
           //     theme: 'grid'
           // });
           //
           // laydate.render({
           //     elem: '#date2',
           //     theme: 'grid'
           // });
       })
    </script>
@endsection