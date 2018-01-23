@extends('admin.layouts.app')

@section('content')
    <div class="layui-breadcrumb">
        <a href="/">后台首页</a>
    </div>
    <!--//面包屑-->

    <div class="container ad-main">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md3">
                <div class="panel">
                    <div class="symbol"><i class="fa fa-user"></i></div>
                    <div class="value">
                        <h3>{{$userCount}}</h3>
                        <h4>全部用户</h4>
                    </div>
                </div>
            </div>
            <div class="layui-col-md3">
                <div class="panel">
                    <div class="symbol" style="background:#dd4b39;"><i class="fa fa-user"></i></div>
                    <div class="value">
                        <h3>{{$articleCount}}</h3>
                        <h4>全部文章</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
