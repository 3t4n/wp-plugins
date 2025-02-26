/*
	Alobaidi Slider Script
*/

jQuery(window).load(function() {
	
	var is_touch_device = 'ontouchstart' in document.documentElement; // check if touch devices
    if(is_touch_device){
		jQuery('.alobaidi_slider_next, .alobaidi_slider_prev, .alobaidi_slider_content').addClass('is_touch');
	}
	
	jQuery(".alobaidi_slider_wrap ul").filter(function( index ) { // when have 1 image only, remove next and prev buttons
		return jQuery( "li", this ).length === 1;
    }).closest(".alobaidi_slider_wrap").find("i").remove();
	
	jQuery('#alobaidi_slider li:first-child').addClass('alobaidi_slider_moving');
	jQuery('#alobaidi_slider li').addClass('animated');
	
	jQuery(".alobaidi_slider_next").click(function () { // when click on next button
		var $nextButton = jQuery(this);
		var $sliderContainer = $nextButton.closest('.alobaidi_slider_content');
		var $first = $sliderContainer.find('li:first-child');
		var $next;
		
	  	$alobaidi_slider_moving = $sliderContainer.find('.alobaidi_slider_moving');
	  	$next = $alobaidi_slider_moving.next('li').length ? $alobaidi_slider_moving.next('li') : $first;

	  	$alobaidi_slider_moving.removeClass("fadeInLeft fadeInRight");
	  	$alobaidi_slider_moving.removeClass("alobaidi_slider_moving").fadeOut(500);

	  	$next.addClass('fadeInRight');
	  	$next.addClass('alobaidi_slider_moving').fadeIn(500);
	});

	jQuery(".alobaidi_slider_prev").click(function () { // when click on prev button
		var $prevButton = jQuery(this);
		var $sliderContainer = $prevButton.closest('.alobaidi_slider_content');
		var $last = $sliderContainer.find('li:last-child');
		var $prev;
		
    	$alobaidi_slider_moving =  $sliderContainer.find(".alobaidi_slider_moving");
    	$prev = $alobaidi_slider_moving.prev('li').length ? $alobaidi_slider_moving.prev('li') : $last;
		
    	$alobaidi_slider_moving.removeClass("fadeInRight fadeInLeft");
		$alobaidi_slider_moving.removeClass("alobaidi_slider_moving").fadeOut(500);
		
		$prev.addClass('fadeInLeft');
    	$prev.addClass('alobaidi_slider_moving').fadeIn(500);
	});
	
});