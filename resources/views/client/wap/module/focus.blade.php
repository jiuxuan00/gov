{{--<div class="tadoy_news">--}}
    {{--<a href="">我市召开迎接党的十九大安全稳定工作会议</a>--}}
{{--</div>--}}
<div class="m_banner_con">
    <div class="m_banner scroll_img_div" style="visibility: visible;">
        <ul class="slide_list">
            @foreach($focus as $item)
                <li>
                    <a href="{{url('/plus').'/'.$item->pid.'/'.$item->id.'.html'}}"><img src="/uploads/{{$item->thumb_url}}" alt=""></a>
                    <p class="text">{{$item->name}}</p>
                </li>
            @endforeach
        </ul>
    </div>
    <ul class="slide_nav scroll_img_ul">
        <li class=""></li>
        <li class=""></li>
        <li class=""></li>
        <li class="selected"></li>
    </ul>
</div>