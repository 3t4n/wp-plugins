$ = new jQuery.noConflict();
$(document).ready(function(){
	// scroll to top
	$(window).scroll(function () {
		if ($(this).scrollTop() > ams_psbtt.show_after_px ) {
			$('.ams-page-scroll-back-to-top-wrapper').fadeIn();
		} else {
			$('.ams-page-scroll-back-to-top-wrapper').fadeOut();
		}
	});
	$('.ams-page-scroll-back-to-top-wrapper').click(function () {
		$("html, body").animate({
			scrollTop: 0
		}, ams_psbtt.time_to_scroll );
		return false;
	});
	
	$(".ams-page-scroll-back-to-top-wrapper").hover(
		function(){
			if ( 'icon' == ams_psbtt.icon_type ) {
				$(".ams-page-scroll-back-to-top-wrapper").css('background', ams_psbtt.icon_bg_hover_color);
				$(".ams-page-scroll-back-to-top-wrapper i").css('color', ams_psbtt.icon_fg_hover_color);
			} else if ( 'text' == ams_psbtt.icon_type ) {
			
				$(".ams-page-scroll-back-to-top-wrapper").css('background', ams_psbtt.text_bg_hover_color);
				$(".ams-page-scroll-back-to-top-wrapper p").css('color', ams_psbtt.text_fg_hover_color);
			
			} else if ( 'preset' == ams_psbtt.icon_type ) {
				image_mouse_enter();
			} else if ( 'upload' == ams_psbtt.icon_type ) {
				image_mouse_enter();
			}
		}, 
		function(){
			if ( 'icon' == ams_psbtt.icon_type ) {
				$(".ams-page-scroll-back-to-top-wrapper").css('background', ams_psbtt.icon_bg_color);
				$(".ams-page-scroll-back-to-top-wrapper i").css('color', ams_psbtt.icon_fg_color);
			} else if ( 'text' == ams_psbtt.icon_type ) {
			
				$(".ams-page-scroll-back-to-top-wrapper").css('background', ams_psbtt.text_bg_color);
				$(".ams-page-scroll-back-to-top-wrapper p").css('color', ams_psbtt.text_fg_color);
			
			} else if ( 'preset' == ams_psbtt.icon_type ) {
				image_mouse_leave();
			} else if ( 'upload' == ams_psbtt.icon_type ) {
				image_mouse_leave();
			}
		}
	);
		
		function image_mouse_enter() {
			$('.ams-page-scroll-back-to-top-wrapper img').css('opacity', ams_psbtt.image_hover_opacity);
		}
		
		function image_mouse_leave() {
			$('.ams-page-scroll-back-to-top-wrapper img').css('opacity', ams_psbtt.image_opacity);
		}
});