@extends('client.components.layouts')

@section('title')问卷@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('client/css/wenjuan.css').'?t='.time()}}">
@endsection


@section('content')

    <div class="wenjuan container" id="wenjuan">
        <h1>政府网站栏目满意率调查问卷</br>您对该政府网站的栏目在下列几个方面做的是否满意？</h1>
        <ul class="items">
            {{--<li>--}}
                {{--<p class="name">1、加大信息公开力度</p>--}}
                {{--<p class="radio">--}}
                    {{--<span><i></i>非常满意</span>--}}
                    {{--<span><i></i>比较满意</span>--}}
                    {{--<span><i></i>感觉一般</span>--}}
					{{--<span><i></i>不太满意</span>--}}
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
            {title:'1、加大信息公开力度',radio:['非常满意','比较满意','感觉一般','不太满意']},
            {title:'2、发布新闻及时准确',radio:['非常满意','比较满意','感觉一般','不太满意']},
            {title:'3、畅通政民互动渠道',radio:['非常满意','比较满意','感觉一般','不太满意']},
            {title:'4、宣传更多惠民措施',radio:['非常满意','比较满意','感觉一般','不太满意']},
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