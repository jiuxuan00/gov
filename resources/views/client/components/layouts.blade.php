<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta charset="UTF-8">
    <title>@yield('title') 扎兰屯市人民政府</title>
	<meta name="description" content="扎兰屯市人民政府网欢迎您的访问" />
    <meta name="Keywords" content="扎兰屯市,扎兰屯,扎兰屯市政府网,扎兰屯政府网" />

    <link rel="stylesheet" href="{{asset('client/css/common.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/layouts.css').'?t='.time()}}">
    @yield('style')
</head>

<body>
@include('client.components.head')

@include('client.components.nav3')

@yield('content')

@include('client.components.footer')

<!--//End home-->
<div class="slide-2">
    <div class="item">
        <div class="name"><i class="icon icon1"></i></div>
    </div>
    <div class="item" id="wechat-slide">
        <div class="name"><i class="icon icon2"></i></div>
        <div class="drawer"><img src="{{url('client/images/right_ewm.jpg')}}"></div>
    </div>
    <div class="item">
        <div class="name"><a href="http://weibo.com/zltzwgk" target="_blank"><i class="icon icon3"></i></a></div>
    </div>
    <div class="item" id="goTop">
        <div class="name"><i class="icon icon4"></i></div>
    </div>
</div>


</body>
<script type="text/javascript" src="{{asset('client/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('client/org/layer/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('client/js/utils.js')}}"></script>
<script type="text/javascript" src="{{asset('client/js/system.js').'?t='.time()}}"></script>
<script>
    $(function () {
        //时间
        startTime();
    });


    function startTime() {
        var today = new Date();//定义日期对象
        var yyyy = today.getFullYear();//通过日期对象的getFullYear()方法返回年
        var MM = today.getMonth() + 1;//通过日期对象的getMonth()方法返回年
        var dd = today.getDate();//通过日期对象的getDate()方法返回年
        var hh = today.getHours();//通过日期对象的getHours方法返回小时
        var mm = today.getMinutes();//通过日期对象的getMinutes方法返回分钟
        var ss = today.getSeconds();//通过日期对象的getSeconds方法返回秒
        // 如果分钟或小时的值小于10，则在其值前加0，比如如果时间是下午3点20分9秒的话，则显示15：20：09
        MM = checkTime(MM);
        dd = checkTime(dd);
        mm = checkTime(mm);
        ss = checkTime(ss);
        var day; //用于保存星期（getDay()方法得到星期编号）
        if (today.getDay() == 0) day = "星期日 "
        if (today.getDay() == 1) day = "星期一 "
        if (today.getDay() == 2) day = "星期二 "
        if (today.getDay() == 3) day = "星期三 "
        if (today.getDay() == 4) day = "星期四 "
        if (today.getDay() == 5) day = "星期五 "
        if (today.getDay() == 6) day = "星期六 "
        document.getElementById('nowDateTimeSpan').innerHTML = yyyy + "-" + MM + "-" + dd + " " + hh + ":" + mm + ":" + ss + "   " + day;
        setTimeout('startTime()', 1000);//每一秒中重新加载startTime()方法
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }


</script>
@yield('js')
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?182a04abcd538d70d90de5336a2c45d3";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<script id="_jiucuo_" sitecode='1507830002' src='http://pucha.kaipuyun.cn/exposure/jiucuo.js'></script>

</html>