<ul class="news_list">
    @foreach($data as $item)
        <li>
            <a target="_blank" href="/government/{{$item->pid}}/{{$item->id}}.html">
                <i class="dot"></i>{{$item->name}}<span
                        class="time">{{date('Y-m-d', strtotime($item->created_at))}}</span></a>
        </li>
    @endforeach
</ul>