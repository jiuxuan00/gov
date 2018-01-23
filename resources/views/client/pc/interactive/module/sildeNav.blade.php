<div class="portlet">
    <div class="nav_third">
        <div class="nav_name">互动交流</div>
        <ul class="nav_ul">
            @foreach($children as $item)
                <li @if($item->id == $cateName->id) class="yili checked" @else class="yili" @endif>
                    <a target="_blank" class="yia" href="/interactive/list_{{$item->id}}">{{$item->name}}</a>
                </li>
            @endforeach
                <li class="yili"><a href="/interactive/mail_260" title="市长信箱列表" target="_blank">市长信箱列表</a></li>
                <li class="yili"><a href="/interactive/mail_261" title="部门信箱列表" target="_blank">部门信箱列表</a></li>
                <li class="yili"><a href="/interactive/search" title="信件搜索" target="_blank">信件搜索</a></li>
                <li class="yili"><a href="/interactive/zxbs" title="信件搜索" target="_blank">在线办事</a></li>
        </ul>
        <div class="pic"><img src="{{url('/client/uploads/201709301102.jpg')}}" alt=""></div>
    </div>
</div>