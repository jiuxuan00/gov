//插件->标签页
(function ($) {
    $.fn.tab = function (options) {
        // 将defaults 和 options 参数合并到{}
        var opts = $.extend({}, $.fn.tab.defaults, options);

        //
        return this.each(function () {
            var $obj = $(this);
            //初始化点击事件
            initTriggerEvent($obj, opts);
        })
    }

    //初始化点击事件
    function initTriggerEvent(obj, opts) {
        var $nav = obj.children('div[data-title="tab-nav"]');
        var $navLink = $nav.children('a[role="link"]');
        var $content = $nav.siblings('div[data-title="tab-content"]')
        var $contentPanel = $content.children('div[role="panel"]');


        $navLink.on(opts.triggerEvent, function () {
            var _this = $(this);
            var index = _this.index();

            //滑动的下划线
            if (opts.selectLine) {
                var $with = _this.width();
                var $left = parseInt(_this.position().left);
                $nav.find('.cursor').animate({'left': $left + 'px', 'width': $with + 'px'}, 100)
            }
            //
            _this.addClass(opts.tabMenuClass).siblings('a[role="link"]').removeClass(opts.tabMenuClass);
            $contentPanel.eq(index).show().siblings('div[role="panel"]').hide();

            opts.change(index);
            return false;
        });


    }

    $.fn.tab.defaults = {
        triggerEvent: 'click', //点击类型
        tabMenuClass: 'active', //tabMenu选中className
        selectLine: false, //滑动的下划线
        change: function (index) {

        }
    }

})(jQuery);



//自动轮播
var autoSlide = function (obj) {
    var $obj = $(obj);
    var $size = $obj.length - 1;
    var cur = 0;
    setInterval(function () {
        if (cur < $size) {
            cur++;
        } else {
            cur = 0;
        }
        $obj.eq(cur).fadeIn().siblings('img').fadeOut();
    }, 4000);
};

//导航
var navSelect = function (index) {
    var _li = $('#nav li');
    console.log(index)
    _li.removeClass('active');
    _li.eq(index).addClass('active');
};

//获取链接参数
var getQueryCode = function (name) {//解析url参数
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]);
    return null;
}