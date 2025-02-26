jQuery(document).ready(function($) {

	
	get_animations();
	setTimeout(get_custom_animations, 300);


	function get_animations()
	{
		var x = { action: "GET_SELECTED_COMBO", data: {}};
		jQuery.post(MyAjax.ajaxurl, x, function (t) {
			if (t[0] != null)
			{
			var div = $("div");
			var img = $("img");
			var p = $("p");
			$("img").addClass("wow");
			$("img").addClass(t[0].img_effect);
			$("img").attr("data-wow-delay",t[0].img_delay+"s");

			if (t[0].img_offset != 0)
			{
			$("img").attr("data-wow-offset",t[0].img_offset);
			}		
			$("div").addClass("wow");
			$("div").addClass(t[0].div_effect);
			$("div").attr("data-wow-delay",t[0].div_delay+"s");

			if (t[0].div_offset	!= 0){
			$("div").attr("data-wow-offset",t[0].div_offset);
			}
			$("p").addClass("wow");
			$("p").addClass(t[0].p_effect);
			$("p").attr("data-wow-delay",t[0].p_delay+"s");

			if (t[0].p_offset)
			{
			$("p").attr("data-wow-offset",t[0].p_offset);
			}
			}
			
			
		});
	}

	function get_custom_animations()
	{
		var get_custom = {action: "GET_CUSTOM", data: {}};
		jQuery.post(MyAjax.ajaxurl, get_custom, function(t)
		{

			jQuery.each(t, function(t, n){
				$("."+n.custom_class).removeClass("lightSpeedIn rollIn wobble tada swing shake rubberBand pulse flash fadeIn fadeInUp fadeInDown fadeInRight fadeInLeft bounceIn bounceInDown bounceInLeft bounceInUp flipInX flipInY rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight zoomIn zoomInDown zoomInUp zoomInRight zoomInLeft");
				$("."+n.custom_class).addClass("wow");
				$("."+n.custom_class).addClass(n.custom_effect);
				$("."+n.custom_class).attr("data-wow-delay",n.custom_delay+"s");

				if(n.custom_offset	!= 0)
				{
				$("."+n.custom_class).attr("data-wow-offset",n.custom_offset);
				}
				
			})
			initialize_wow();
			$("body").css("display","block");
		})
	}

	 function initialize_wow()
	{
	 	wow = new WOW(
      				{
        			animateClass: 'animated',
        			offset:       300
      				}
    			);
    		wow.init();
	}

});


