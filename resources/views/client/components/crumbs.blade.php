<div class="crumbs">
    <span><i class="icon_map"></i></span>
    <span>位置：</span>
    <span><a target="_blank" href="">首页</a></span>
    @if($title1 != '')
    <span class="gt"> &gt; </span>
    <span><a target="_blank" href="{{$title1Link}}" title="{{$title1}}">{{$title1}}</a></span>
    @endif
    @if($title2 != '')
    <span class="gt"> &gt; </span>
    <span style="color: #999;">{{$title2}}</span>
    @endif
</div>