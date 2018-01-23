$(function(){
	//图片轮播
    var scroll_img_len = 0;
    scroll_img_len = $(".scroll_img_div li").length;
    var circle_str = '';
    for(var i=0; i< scroll_img_len; i++){
        if(i == 0){
            circle_str += "<li class='selected'></li>";
        }else{
            circle_str += "<li></li>";
        }
    }
      	$(".scroll_img_ul").html(circle_str);
		$(".scroll_img_div").each(function(){
			//var bullets = $(this).parent(".m_banner_con").siblings(".scroll_img_ul").children("li");
			var bullets = $(".scroll_img_ul").children("li");
			var slider = Swipe($(this)[0], {
			  auto:3000,
			  continuous: true,
			  callback: function(pos) {
				 
				bullets.removeClass("selected");
				$(bullets[pos]).addClass('selected');
				if(pos == scroll_img_len -1){
					slider;
				}
			  }
			});
		  });  
    
	//menu事件绑定
	var $phone = $("#menu-btn-div").parent(".phone");
	$("#menu-btn-div .menu").bind("click", function(){
		var $span = $(this).find("span");
		if($span.hasClass("open")){
			$phone.css({"width":"0px","height":"0px"});
			$span.removeClass("open").addClass("close");
			$(".btn").removeClass("open").addClass("close");
		}else{
			$phone.css({"width":"auto","height":"auto"});
			$span.removeClass("close").addClass("open");
			$(".btn").removeClass("close").addClass("open");
		}
	});
})
