<div class="leader">
    @foreach($articles as $item)
    <div class="item">
        <div class="pic">
            <a href="/government/{{$item->pid}}/{{$item->id}}.html" target="_blank"><img src="{{$item->thumb_url}}" alt=""></a>
            <p>{{$item->name}}</p>
        </div>
        <div class="tit">
            <span>领导简介：</span>{{$item->description}}
            <a href="/government/{{$item->pid}}/{{$item->id}}.html" target="_blank" class="more">[更多+]</a>
        </div>
    </div>
    @endforeach
</div>