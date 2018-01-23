<ul>
    @foreach($data as $item)
        <li><a href="{{url('/plus').'/'.$item->pid.'/'.$item->id.'.html'}}">{{$item->name}}</a></li>
    @endforeach
</ul>
<div class="more_a"><a href="{{url('/plus').'/'.$cateId}}">更多</a></div>