<ul class="third_list custom_third_list">
    <li class="lih" style="margin-bottom:20px;">
        <span style="text-align:center;background:#eee;" class="fl">标题</span>
        <span style="text-align:center;background:#eee;" class="index">索引号</span>
        <span style="text-align:center;background:#eee;" class="fr">发布时间</span>
    </li>
    @foreach($articles as $item)
        <li class="lih">
            <span class="fl"><a target="_blank" href="/government/{{$item->pid}}/{{$item->id}}.html">{{$item->name}}</a></span>
            <span class="index">01160511x/2017-{{$item->id}}</span>
            <span class="fr">20{{date('y-m-d', strtotime($item->updated_at))}}</span>
        </li>
    @endforeach
</ul>