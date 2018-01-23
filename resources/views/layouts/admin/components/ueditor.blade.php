<script type="text/javascript" charset="utf-8" src="{{asset('assets/libs/utf8-php/ueditor.config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('assets/libs/utf8-php/ueditor.all.min.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('assets/libs/utf8-php/lang/zh-cn/zh-cn.js')}}"></script>

<script id="editor" type="text/plain" style="width:100%;height:300px;display:inline-block" name="content">
    @if(isset($field->content))
        {!! $field->content !!}
    @endif
</script>


<script>
UE.getEditor('editor');
</script>