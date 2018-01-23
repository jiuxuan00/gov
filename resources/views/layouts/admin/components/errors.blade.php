@if(count($errors)>0)
    <div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">×</span>
        </button>
        @if(is_object($errors))
            @foreach($errors->all() as $errors)
                <p>{{$errors}}</p>
            @endforeach
        @else
            <p>{{$errors}}</p>
        @endif
    </div>
@endif