<script type="text/javascript" charset="utf-8" src="{{asset('/admin/plugins/ueditor/ueditor.config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('/admin/plugins/ueditor/ueditor.all.min.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('/admin/plugins/ueditor/lang/zh-cn/zh-cn.js')}}"></script>

<script id="editor" type="text/plain" style="width:100%;height:300px;display:inline-block" name="content">
    @if(isset($article->content))
        {!! $article->content !!}
    @endif
</script>


<script>
UE.getEditor('editor');
</script>