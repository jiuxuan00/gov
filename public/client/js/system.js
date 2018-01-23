$(function () {
    //home
    (function () {
        //新闻tab
        $('.news').tab({
            triggerEvent: 'mouseover',
            selectLine: true,
        });


        //今日扎兰等
        $('.banner').tab();

        //政府公开
        $('.tabox').tab({
            triggerEvent: 'mouseover',
        });

        //扎兰旅游
        $('.view .cont').tab({
            triggerEvent: 'mouseover',
        });

        //报送统计
        $('.cont-tab').tab({
            triggerEvent: 'mouseover'
        });


    })();

    //header focus
    (function () {
        var $img = $('.header .focus img123123');
        var $size = $img.length - 1;
        var cur = 0;
        $img.eq(0).show();
        setInterval(function () {
            if (cur < $size) {
                cur++;
            } else {
                cur = 0;
            }
            $img.eq(cur).fadeIn().siblings('img').fadeOut();
        }, 5000);
    })();

    //导航上面轮播图
    autoSlide('.header .focus img');

    //今日扎兰轮播
    (function () {
        var $obj = $('.focus');
        var $ul = $obj.find('ul');
        var $uli = $ul.find('li');
        var $uliWidth = $uli.width();
        var $uliSize = $uli.length;
        var $ulWidth = $uliSize * $uliWidth;

        var $ol = $obj.find('ol');
        var $oli = $ol.find('li');

        var $prev = $obj.find('.prev');
        var $next = $obj.find('.next');

        var $cur = 0;
        var $timer = null;
        var $speed = 5000;
        var $scrollSpeed = 500;


        //ul宽度
        $ul.css('width', $ulWidth + 'px');


        //小焦点
        $oli.hover(function () {
            clearInterval($timer);
            $cur = $(this).index();
            slideImg();
        }, function () {
            $timer = setInterval(slideImgRight, $speed);
        });

        //下一张
        $next.on('mousedown', function () {
            clearInterval($timer);
            slideImgRight();
        });
        $next.on('mouseup', function () {
            $timer = setInterval(slideImgRight, $speed);
        });


        //上一张
        $prev.on('mousedown', function () {
            clearInterval($timer);
            slideImgLeft();
        });
        $prev.on('mouseup', function () {
            $timer = setInterval(slideImgRight, $speed);
        });


        //正方向运动
        function slideImgRight() {
            $cur++;
            $cur > ($uliSize - 1) ? $cur = 0 : '';
            slideImg();
        }

        //反方向运动
        function slideImgLeft() {
            $cur--;
            $cur < 0 ? $cur = ($uliSize - 1) : '';
            slideImg();
        }


        //图片和小焦点
        function slideImg() {
            //小焦点
            $oli.eq($cur).addClass('active').siblings('li').removeClass('active');
            //图片滚动
            $ul.stop(true, true).animate({'margin-left': -$cur * $uliWidth + 'px'}, $scrollSpeed);
        }

        //定时滚动
        $timer = setInterval(slideImgRight, $speed);
    })();


    //热点回应
    /*(function () {
        var $obj = $('.msgloop');
        var $con = $obj.find('.con');
        var $ul = $con.find('ul');
        var $sumWidth = 0;
        var $speed = 0;
        var $time = 30;

        if ($obj.length > 0) {
            $con.find('li').each(function () {
                $sumWidth += parseInt($(this).width() + 21);
            });

            $con.append($ul.clone(true)).css('width', $sumWidth * 2 + 'px');

            function scrollText() {
                var $diff = $sumWidth + $con.position().left;
                $diff <= 0 ? $speed = 0 : $speed--;
                $con.css('left', $speed + 'px');
            }

            $ul.hover(function () {
                clearInterval($timer)
            }, function () {
                $timer = setInterval(scrollText, $time);
            })
            var $timer = setInterval(scrollText, $time);
        }
    })();*/

    marginRightZero('.img_list li:last-child');

    borderBottomZero('.home .main .view .part:last-child');

    //通知公告
    (function () {
        var $obj = $('.gonggao');
        var $ul = $obj.find('.news_list');
        var $li = $ul.find('li').eq(0);
        var $liHeight = $li.height();
        var timer = null;

        //定时
        timer = setInterval(scrollTop, 1500);

        $ul.hover(function () {
            clearInterval(timer);
        }, function () {
            timer = setInterval(scrollTop, 1500);
        })

        //像上滚动
        function scrollTop() {
            $ul.animate({'margin-top': -$liHeight + 'px'}, 700, function () {
                $ul.find('li:eq(0)').appendTo($ul);
                $ul.css({"margin-top": 0})
            })
        }
    })();


    //在线访谈
    (function () {
        var $parent = $('div[data-title="marginTop"]');
        var $ul = $parent.find('.online');
        var $ulHeight = $ul.height();
        var $sTop = 0;
        var timer = null;

        //复制
        $ul.append($ul.html());

        timer = setInterval(scrollTop, 30);

        $parent.hover(function () {
            clearInterval(timer);
        }, function () {
            timer = setInterval(scrollTop, 30);
        });

        //滚动
        function scrollTop() {
            if ($sTop > $ulHeight) {
                $sTop -= $ulHeight;
            } else {
                $sTop++;
            }
            $parent.css({'margin-top': -$sTop + 'px'});
        }

    })();


    //标语轮播
    autoSlide('.slogan img');


    //政务公开
    $('.gongkai .tabox .cont .news_list li:odd').css('margin-right', 0);


    //政务微信弹出层
    $('#wechat').on('click', function () {

    });

});


//去掉margin-right
function marginRightZero(obj) {
    $(obj).css('margin-right', '0');
}

//去掉border-bottom
function borderBottomZero(obj) {
    $(obj).css('border-bottom', '0');
}


var common = {
    init: function () {
        this.footer();
        this.slide();
    },
    slide: function () {
        var body = $('.bodybg');
        var cur = 0;
        setInterval(function () {
            if (cur < 4) {
                cur++;
            } else {
                cur = 1;
            }
            body.find('img').eq(cur).fadeIn().siblings('img').fadeOut();
        }, 500000);
    },
    footer: function () {
        //底部链接
        var $parent = $('.footer .select');
        var $dt = $parent.find('dt');
        var $dd = $parent.find('dd');
        $dt.on('click', function (e) {
            e.preventDefault();
            e.stopPropagation()
            $dd.slideUp(200);
            $(this).siblings('dd').stop(true).slideToggle(200);
        });


        $(document).on('click', function () {
            $dd.slideUp(200);
        });
    }
};


//首页
var homePage = {
    init: function () {
        navSelect(0);
        this.effect();
        this.loopText();
        this.loopImg();
    },
    effect: function () {
        var $obj = $('.serve .cont');
        var $width = '485px';
        $obj.find('dd').eq(0).css('width', $width)

        $obj.find('dt').on('click', function () {
            var $dd = $(this).siblings('dd');
            $obj.find('dt').removeClass('active');
            $(this).addClass('active');
            $dd.animate({'width': $width}, 200)
                .parents('dl').siblings('dl').find('dd')
                .animate({'width': '0'}, 200)
        });
    },
    loopText: function () {
        var $obj = $('.msgloop-text');
        var $con = $obj.find('.con');
        var $ul = $con.find('ul');
        var $sumWidth = 0;
        var $speed = 0;
        var $time = 30;

        if ($obj.length > 0) {
            $con.find('li').each(function () {
                $sumWidth += parseInt($(this).width() + 21);
            });

            $con.append($ul.clone(true)).css('width', $sumWidth * 2 + 'px');

            function scrollText() {
                var $diff = $sumWidth + $con.position().left;
                $diff <= 0 ? $speed = 0 : $speed--;
                $con.css('left', $speed + 'px');
            }

            $ul.hover(function () {
                clearInterval($timer)
            }, function () {
                $timer = setInterval(scrollText, $time);
            })
            var $timer = setInterval(scrollText, $time);
        }
    },
    loopImg: function () {
        var $obj = $('.msgloop-img');
        var $con = $obj.find('.con');
        var $ul = $con.find('ul');
        var $sumWidth = 0;
        var $speed = 0;
        var $time = 30;

        if ($obj.length > 0) {
            $con.find('li').each(function () {
                $sumWidth += parseInt(318 + 21);
            });

            $con.append($ul.clone(true)).css('width', $sumWidth * 2 + 'px');

            function scrollText() {
                var $diff = $sumWidth + $con.position().left;
                $diff <= 0 ? $speed = 0 : $speed--;
                $con.css('left', $speed + 'px');
            }

            $ul.hover(function () {
                clearInterval($timer)
            }, function () {
                $timer = setInterval(scrollText, $time);
            })
            var $timer = setInterval(scrollText, $time);
        }
    },
};


//新闻资讯
var newsPage = {
    init: function () {
        navSelect(2);
        detailPage.changeFont();
    }
};

//互动平台
var interactivePage = {
    navSelect: function () {
        navSelect(4);
    },
    index: {
        init: function () {
            interactivePage.navSelect();
            this.bind();
        },
        bind: function () {
            var obj = $('div[data-type=tab-content]');
            obj.each(function () {
                var tab = $(this).find('div[data-type=tab] .link');
                var box = $(this).find('div[data-type=content] .box');

                tab.hover(function () {
                    var index = $(this).index();


                    $(this).addClass('active').siblings('.link').removeClass('active');
                    box.eq(index).show().siblings('.box').hide();
                });
            });
        }
    },
    detail: {
        init: function () {
            interactivePage.navSelect();
            detailPage.changeFont();
        }
    },
    list: {
        init: function () {
            interactivePage.navSelect();
            this.clause();
        },
        clause: function () {
            var obj = $('#clause');
            var num = 5;
            var isTrue = true;
            var timer = null;


            if (isTrue) {
                timer = setInterval(function () {
                    if (num > 0) {
                        num--;
                        obj.find('span').html(num);
                    } else {
                        obj.addClass('active').html('同意');
                        clearInterval(timer);

                        obj.on('click', function () {
                            window.location.href = $(this).attr('href');
                            return false;
                        });
                    }
                }, 1000);
                isTrue = false;


            }


        }
    }
};

//政务公开
var governmentPage = {
    init: function () {
        navSelect(3);
        this.tab();
    },
    tab: function () {
        var _item = $('.government .midbox .item');
        _item.each(function () {
            var _span = $(this).find('.title span');
            var _div = $(this).find('.news_list');
            _span.on('click', function () {
                var index = $(this).index();
                $(this).addClass('active').siblings('span').removeClass('active');
                _div.eq(index).show().siblings('ul').hide();
            });
        });
    },
    detail: function () {
        navSelect(3);
        detailPage.changeFont();
    }
};

//在线服务
var servePage = {
    init: function () {
        navSelect(5);
    },
    detail: {
        init: function () {
            navSelect(5);
        },
        bind: function () {
            var _main = $('#main');
            _main.addClass("font_16");
            $("#font_size_plus").click(function () {
                changFontSize(1);
                return false;
            });
            $("#font_size_minus").click(function () {
                changFontSize(2);
                return false;
            });


            function changFontSize(i) {
                if (i == 1) {
                    if (_main.hasClass("font_18")) {
                        return;
                    }
                    if (_main.hasClass("font_16")) {
                        _main.removeClass("font_16").addClass("font_18");
                        return;
                    }
                    if (_main.hasClass("font_14")) {
                        _main.removeClass("font_14").addClass("font_16");
                    }
                } else if (i == 2) {
                    if (_main.hasClass("font_18")) {
                        _main.removeClass("font_18").addClass("font_16");
                        return;
                    }
                    if (_main.hasClass("font_16")) {
                        _main.removeClass("font_16").addClass("font_14");
                        return;
                    }
                    if (_main.hasClass("font_14")) {
                    }
                }
            }
        }
    }

};


//走进扎兰
var zhalanPage = {
    init: function () {
        navSelect(1);
        this.tabSelect();
    },
    tabSelect: function () {
        var link = $('.tabs .link');
        var items = $('.main .items');
        var title = items.find('.title');
        var activeIndex = getQueryCode('activeIndex');

        if (activeIndex == null) {
            activeIndex = 0;
        }


        title.html(link.eq(activeIndex).text());
        link.removeClass('active');
        link.eq(activeIndex).addClass('active');

        items.hide();
        items.eq(activeIndex).show();

        console.log(link.eq(activeIndex).text())


        // link.on('click', function () {
        //     var _index = $(this).index();
        //     var _text = $(this).text();
        //     $(this).addClass('active').siblings('.link').removeClass('active');
        //     items.eq(_index).show().siblings('.items').hide();
        //     items.eq(_index).find('.title').text(_text);
        // });
    }
};

//文章
var detailPage = {
    changeFont: function () {//修改文字大小
        var _main = $('#main');
        _main.addClass("font_16");
        $("#font_size_plus").click(function () {
            changFontSize(1);
            return false;
        });
        $("#font_size_minus").click(function () {
            changFontSize(2);
            return false;
        });


        function changFontSize(i) {
            if (i == 1) {
                if (_main.hasClass("font_18")) {
                    return;
                }
                if (_main.hasClass("font_16")) {
                    _main.removeClass("font_16").addClass("font_18");
                    return;
                }
                if (_main.hasClass("font_14")) {
                    _main.removeClass("font_14").addClass("font_16");
                }
            } else if (i == 2) {
                if (_main.hasClass("font_18")) {
                    _main.removeClass("font_18").addClass("font_16");
                    return;
                }
                if (_main.hasClass("font_16")) {
                    _main.removeClass("font_16").addClass("font_14");
                    return;
                }
                if (_main.hasClass("font_14")) {
                }
            }
        }
    }
}


$(function () {
    common.init();

    //导航
    (function () {
        var nav = $('#nav');
        var li = nav.find('.dt li');

        li.hover(function () {
            $(this).find('.dd').stop(true).slideDown('fast');
        }, function () {
            $(this).find('.dd').stop(true).slideUp('fast');
        })
    })();

    //导航上的搜索
    (function () {
        var search = $('#search');
        var ipt = search.find('.ipt');
        var submit = search.find('.submit');

        submit.live('click', function () {
            var keyword = ipt.val();
            search.addClass('active');
            if (keyword) {
                window.location.href = '/search.html?keyword=' + keyword;
            }
        });

        search.live('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
        });

        $(document).live('click', function () {
            ipt.val('');
            search.removeClass('active');
        });
    })();

    $('#wechat-slide').hover(function () {
        $(this).find('.drawer').stop(true).animate({'left': '-170px'}, 300)
    }, function () {
        $(this).find('.drawer').stop(true).animate({'left': '60px'}, 300)
    })

    $('#goTop').on('click', function () {
        $('html,body').animate({'scrollTop': 0}, 600);
    })


})