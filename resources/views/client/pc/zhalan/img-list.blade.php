<div class="title"></div>
<div class="pic">
    <ul>
        @foreach($data as $item)
            <li>
                <a target="_blank" href="/zhalan/{{$item->pid}}/{{$item->id}}.html">
                    <img src="{{$item->thumb_url}}" alt="">
                    <p>{{$item->name}}</p>
                </a>
            </li>
        @endforeach
    </ul>
    {{--<div class="page">--}}
    {{--{{ $zlmp->links() }}--}}
    {{--</div>--}}
</div>