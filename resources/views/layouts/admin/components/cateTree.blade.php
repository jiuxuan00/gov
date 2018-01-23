<div id="jstree-default">
    <ul>
        @foreach($category as $child)

             <li data-jstree='{"opened": @if(isset($cid)) @if($child->id==$cid) true @endif @endif}' >
                <span data-id="{{$child->id}}">{{$child->name}}</span>
                <ul>
                    @foreach($child->child as $children)
                        <li>
                            <span data-id="{{$children->id}}">{{$children->name}}</span>
                            <ul>
                                @foreach($children->child as $grandson)
                                    <li><span data-id="{{$grandson->id}}">{{$grandson->name}}</span></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
            {{--@endif--}}
        @endforeach
    </ul>
</div>