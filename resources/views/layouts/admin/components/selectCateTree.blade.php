@if(Auth::user()->role==0)
    <select class="form-control" name="pid">
        <option value="0">顶级分类</option>
        @foreach($category as $child)
            <option value="{{$child->id}}" @if(isset($cid)) @if($child->id==$cid) selected @endif @endif>{{$child->name}}</option>
            @foreach($child->child as $children)
                <option value="{{$children->id}}" @if(isset($cid)) @if($children->id==$cid) selected @endif @endif>{{$children->name}}</option>
                @foreach($children->child as $grandson)
                    <option value="{{$grandson->id}}" @if(isset($cid)) @if($grandson->id==$cid) selected @endif @endif>{{$grandson->name}}</option>
                @endforeach
            @endforeach
        @endforeach
    </select>
@else
    <input type="text" class="form-control" name="department" value="{{Auth::user()->department}}" disabled>
@endif