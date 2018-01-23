<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>扎兰屯市政府网 @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="{{url('wap/css/trs_web_style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('wap/css/zgtl_mobile_style_20170224.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('wap/css/zgtlmobile_list_20170224.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('wap/css/zgtl_mobile_header_style_20170224.css')}}" rel="stylesheet" type="text/css">
    @yield('css')
    <style>
        .header {
            height: 100px;
        }
        .header img {
            width: 70%;
            margin-left: 10px;
            margin-top: 10px;
        }
        .m_banner img {
            height: 23rem;
        }

        .leader_font span a {
            color: #4976bc;
        }

        .infor_top p {
            width: 30%;
            float: right;
            line-height: 3rem;
        }

        .infor_top p a {
            font-size: 1.6rem;
            color: red;
        }

        .tadoy_news {
            font-size: 1.8rem;
            font-weight: bold;
            color: red;
        }
        .h_subNav {
            padding-top: 0;
        }

        .three_module {
            height: 3rem;
            line-height: 3rem;
            border-bottom: 1px solid #7798cd;
        }

        .three_module:nth-child(3) {
            border: none;
        }
    </style>
</head>

<body>
<div class="wrapper">
    <div class="header">
        <a href="/"><img src="{{url('/wap/upload/zgtl_mobile_photo_20170224-01.png')}}"></a>
        <div class="menu_search">
            <div class="h_sch_btn"></div>
        </div>
    </div>
    {{--//End header--}}

    <div class="search_box">
        <div class="h_input">
            <form action="{{url('/search.html')}}" method="get" target="_blank">
                <input type="text" name="keyword" class="s_txt">
                <input type="submit" id="search" class="s_btn" value="检索">
            </form>
        </div>
        <div class="h_subNav">
            <div class="three_module">
                <a href="http://weibo.com/zltzwgk">微博</a>
                <span>|</span>
                <a href="{{url('/')}}">微信</a>
                <span>|</span>
                <a href="#">客户端</a>
            </div>
        </div>
    </div>
    {{--//End search_box--}}

    <div class="head_nav">
        <div class="sd_box">
            <a href="{{url('/wap/news')}}">新闻动态</a>
            <a href="{{url('/wap/gov')}}">政务公开</a>
            <a href="{{url('/wap/serve')}}">办事服务</a>
            <a href="{{url('/wap/zhalan/article/zhalan.html')}}">走近扎兰</a>
            <a href="{{url('/wap/news')}}">政务要闻</a>
            <a href="{{url('/plus/212')}}">部门动态</a>
            <a href="{{url('/plus/213')}}">乡镇之窗</a>
            <a href="{{url('/plus/214')}}">视频新闻</a>
            <a href="{{url('/plus/215')}}">通知公告</a>
            <a href="http://yfxz.zlt365.com/">依法行政</a>
            <a href="{{url('/plus/89')}}">金融服务</a>
            <a href="{{url('/plus/88')}}">政府法制</a>
            <a href="{{url('/plus/87')}}">外事侨务</a>
            <a href="{{url('/plus/93')}}">党建阵地</a>
            <a href="{{url('/interactive')}}">互动交流</a>
            <a href="{{url('/plus/91')}}">就业创业</a>
            <div class="clear"></div>
        </div>
    </div>
    {{--//End head_nav--}}


    @yield('content')

</div>

<div class="footer">
    <p style="padding-top:.8rem;line-height:2rem;">主办单位：扎兰屯市人民政府办公室 <br>承办单位：扎兰屯市人民政府办公室网络舆情中心 <br>技术支持：呼伦贝尔市乐扣思电子商务贸易有限公司</p>
</div>

<div class="back_top" id="back-to-top" style="display: block;"></div>

<script src="{{url('wap/js/jquery-1.8.3.min.js')}}"></script>
<script src="{{url('wap/js/jquery_trs_web20170227.js')}}"></script>
<script src="{{url('wap/js/jq.mobi.min.js')}}"></script>
<script src="{{url('wap/js/swipe.js')}}"></script>
<script src="{{url('wap/js/m.js')}}"></script>
<script>
    $(document).ready(function () {
        //导航上的搜索


        $('.menu_search').click(function () {
            $('.menu_search').toggleClass('changeBg');
            $('.search_box').toggleClass('dis_Block');
        });
        //首先将#back-to-top隐藏
        $("#back-to-top").hide();
        //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
        $(window).scroll(function () {
            if ($(window).scrollTop() > 150) {
                $("#back-to-top").fadeIn(500);
            }
            else {
                $("#back-to-top").fadeOut(500);
            }
        });
        //当点击跳转链接后，回到页面顶部位置
        $("#back-to-top").click(function () {
            $('body,html').animate({scrollTop: 0}, 100);
            return false;
        });
    });


</script>

@yield('js')

</body>
</html>