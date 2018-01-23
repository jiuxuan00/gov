<ul class="news_list">
    @foreach($data as $item)
        <li>
            <a target="_blank" href="/news/{{$item->pid}}/{{$item->id}}.html">
                <i class="dot"></i>{{$item->name}}<span
                        class="time">{{date('Y-m-d', strtotime($item->updated_at))}}</span></a>
        </li>
    @endforeach
</ul>