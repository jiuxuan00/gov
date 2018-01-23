var imageUpload={
    init:function (options) {
        this.create(options);
    },
    create:function (options) {
        var _this=this;
        var el=$('.upload_image');
        el.append(_this.elForm(options));
        _this.submit();
    },
    elForm:function (options) {//创建form表单
        var _str='<form class="upload" action="/admin/upload" method="post" enctype="multipart/form-data">' +
            '<input id="_token" type="hidden" name="_token" value="'+options+'">'+
            '<div class="file"><input id="fileupload" type="file" name="mypic"><span>上传图片</span></div>' +
            '</form>'+
            '<div class="progress"><em class="bar" style="width: 40%;"></em><em class="percent"></em></div>';
        return _str;
    },
    submit:function () {
        var _this=this;
        var parent=$('.upload_image');
        var file=parent.find('.file');
        var progress=parent.find('.progress');
        var bar = progress.find('.bar');
        var percent = progress.find('.percent');
        var preview = parent.find('.preview');
        var form = parent.find('form.upload');
        var thumb = parent.find('input[name=thumb_url]');

        parent.on('change','input[type=file]',function () {
            form.ajaxSubmit({
                dataType:  'json',
                beforeSend: function() {
                    var percentVal = '0%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    progress.show();
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                success: function(data) {
                    parent.addClass('active');
                    preview.find('img').attr('src','/uploads/'+data.image_url).show();
                    file.find('span').text('重新上传');
                    progress.hide().html('');
                    thumb.val(data.image_url);
                },
                error:function(xhr){
                    //todo
                }
            });
        });

    }
};

//获取url参数
var getUrlParam=function(name){
    //构造一个含有目标参数的正则表达式对象
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
    //匹配目标参数
    var r = window.location.search.substr(1).match(reg);
    //返回参数值
    if (r!=null) return unescape(r[2]);
    return null;
}