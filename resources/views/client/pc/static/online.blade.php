@extends('client.components.layouts')

@section('title')网上投诉@endsection

@section('content')
    <style>
        .btns {
            width: 100%;
            text-align: center;
            float: left;
            padding-top:100px;
            padding-bottom:160px;
        }
        .btns a {
            padding:13px 30px;
            background: #0C6EDD;
            color: #fff;
            font-size: 16px;
            display: inline-block;
            margin:0 30px;
        }
        .footer {
            margin-top:0;
        }
    </style>
    <div class="container">
        <div class="btns">
            <a href="http://110.16.70.9:5555/html/leaderMailbox/index.html?regionCode=150783000000" target="_blank">领导信箱</a>
            <a href="http://110.16.70.9:5555/html/onlineComplaint/index.html?regionCode=150783000000" target="_blank">网上投诉</a>
        </div>
    </div>
@endsection