@extends('client.components.layouts')

@section('title')问卷@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('client/css/wenjuan.css').'?t='.time()}}">
@endsection


@section('content')

    <div class="wenjuan container" id="wenjuan">
        <h1>扎兰屯市创建全国文明城市调查问卷</h1>
        <ul class="items">
            {{--<li>--}}
                {{--<p class="name">1、您认为本市宣传普及社会主义核心价值观效果如何？</p>--}}
                {{--<p class="radio">--}}
                    {{--<span><i></i>好</span>--}}
                    {{--<span><i></i>一般</span>--}}
                    {{--<span><i></i>不好</span>--}}
                {{--</p>--}}
            {{--</li>--}}


        </ul>
        <div class="btns">
            <a id="submit" href="javascript:;">提交</a>
        </div>
    </div>

@endsection


@section('js')
    <script>
        var data=[
            {title:'1、您认为本市宣传普及社会主义核心价值观效果如何？',radio:['好','一般','不好']},
            {title:'2、您认为本市发放市民文明手册效果如何？',radio:['好','一般','不好']},
            {title:'3、您认为本市道德模范等先进典型学习宣传效果如何？',radio:['好','一般','不好']},
            {title:'4、您认为本市开展家庭、家教、家风建设方面工作如何？',radio:['好','一般','不好']},
            {title:'5、您认为本市政务行为规范吗？',radio:['规范','一般','不规范']},
            {title:'6、您是否参加过本市组织的法治宣传教育活动？',radio:['经常参加','偶尔参加','没参加过']},
            {title:'7、您是否认同或愿意参加志愿服务活动？',radio:['好','一般','不好']},
            {title:'8、您身边的志愿服务活动氛围浓厚吗？',radio:['好','一般','不好']},
            {title:'9、您认为本市诚信建设工作效果如何(如假冒伪劣)？',radio:['浓厚','一般','不浓厚']},
            {title:'10、您认为本市公益广告宣传覆盖面如何？',radio:['好','一般','不好']},
            {title:'11、您认为本市刊播展示公益广告效果如何(媒体和媒介)？',radio:['好','一般','不好']},
            {title:'12、您对本市义务教育满意吗？',radio:['满意','一般','不满意']},
            {title:'13、您觉得您生活的社会环境安全吗？',radio:['安全','一般','不安全']},
            {title:'14、您认为本市打击“黄赌毒”的工作和成效如何？',radio:['好','一般','不好']},
            {title:'15、您所在社区生活便利程度如何？',radio:['好','一般','不好']},
            {title:'16、您对本市窗口单位服务质量满意吗？',radio:['满意','一般','不满意']},
            {title:'17、您对本市行政执法监管部门工作是否满意？',radio:['满意','一般','不满意']},
            {title:'18、您是否参加过环境保护、生态文明主题学习实践活动？',radio:['经常参加','偶尔参加','没参加过']},
            {title:'19、您是否知晓本市开展全国文明城市创建活动？',radio:['知道','不知道']},
            {title:'20、您是否参加过本市组织开展的精神文明创建活动？',radio:['经常参加','偶尔参加','没参加过']},
            {title:'21、您支持本市参评全国文明城市吗？',radio:['支持','无所谓','不支持']},
            {title:'22、您对本市开展文明城市创建活动满意吗？',radio:['满意','一般','不满意']}
        ];


        $(function () {
            var obj=$('#wenjuan');
            var ul=obj.find('.items');

            var html='';

            for (var i=0;i<data.length;i++){
                var radios='';
                for (var j=0;j<data[i].radio.length;j++){
                    radios+='<span><i></i>'+data[i].radio[j]+'</span>';
                }



                html+='<li>' +
                        '<p class="name">'+ data[i].title + '</p>'+
                        '<p class="radio">'+ radios + '</p>'+
                    '</li>';
            }


                ul.append(html);



            ul.on('click','li span',function () {
                $(this).addClass('active').siblings('span').removeClass('active');
            });



            $('#submit').on('click',function () {
                alert('提交成功');
                window.location.href='/';
            })

        })
    </script>
@endsection