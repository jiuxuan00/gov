<style type="text/css">
    .con_box, .mailbox,.footer {
        width: 100%;
        float: left;
    }
    .group {
        width: 100%;
        line-height: 35px;
        float: left;
        position: relative;
        overflow: hidden;
        margin-bottom: 20px;
    }
    .group * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }
    .group label {
        width: 80px;
        position: absolute;
        top: 0;
        left: 0;
    }
    .group .area {
        width: 100%;
        padding-left: 80px;
        float: left;
    }
    .group .area input,
    .group .area textarea{
        width: 100%;
        padding: 10px;
        line-height: 13px;
        outline: none;
        float: left;
    }
    .mailbox .group .area .code-text {
        width: 120px;
        line-height: 37px;
        background: #ffc413;
        float: left;
        margin-left: 20px;
        text-align: center;
        font-size: 20px;
    }
    .mailbox .group .area .submit {
        background: #00a3eb;
        color: #fff;
        padding: 0 20px;
        font-size: 14px;
        float: left;
    }
    .mailbox .group label span {
        color: #f00;
    }
</style>
<div class="leader_form">
    <form class="mailbox" action="/interactive/list_{{$dataId}}/store">
        <input type="hidden" name="pid" value="{{$dataId}}">
        <div class="group">
            <label for=""><span>*</span>标题：</label>
            <div class="area">
                <input type="text" data-verify="title" value="" name="title">
            </div>
        </div>
        <div class="group">
            <label for=""><span>*</span>您的姓名：</label>
            <div class="area">
                <input type="text" data-verify="name" value="" name="name">
            </div>
        </div>
        <div class="group">
            <label for=""><span>*</span>邮箱地址：</label>
            <div class="area">
                <input type="text" data-verify="email" value="" name="email">
            </div>
        </div>
        <div class="group">
            <label for=""><span>*</span>联系电话：</label>
            <div class="area">
                <input type="text" data-verify="phone" value="" name="phone">
            </div>
        </div>
        <div class="group">
            <label for=""><span>*</span>查询密码：</label>
            <div class="area">
                <input type="text" data-verify="password" value="" name="password">
            </div>
        </div>
        <div class="group">
            <label for=""><span>*</span>通讯地址：</label>
            <div class="area">
                <input type="text" data-verify="address" value="" name="address">
            </div>
        </div>

        <div class="group" style="width: 100%;">
            <label for=""><span>*</span>内容：</label>
            <div class="area">
                <textarea data-verify="content" id="" cols="20" rows="10" name="content"></textarea>
            </div>
        </div>
        <div class="group" style="width: 100%;">
            <label for=""><span>*</span>验证码：</label>
            <div class="area">
                <input type="text" value="" name="code" style="width:100px">
                <span class="code-text" id="code">57+62=?</span>
            </div>
        </div>
        <div class="group">
            <label for="">&nbsp;</label>
            <div class="area">
                <a href="javascript:;" id="check" class="submit">确定提交</a>
            </div>
        </div>
    </form>
</div>
