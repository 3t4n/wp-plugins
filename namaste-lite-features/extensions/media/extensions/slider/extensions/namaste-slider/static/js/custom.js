jQuery( document ).ready(function( $ ){
	$(document).ready(namsliderfunction);
	$(window).on('resize',namsliderfunction);
	
	function namsliderfunction() {
		var mediaWidth = $('#bodychild').width();
		$('.namaste-fullwidth-slider .namaste-slider-holder').css({ 'width': mediaWidth+'px' });
		
		if ($('.namaste-slider-holder').width() < 768) {
		$('.namaste-slider-caption-holder').css({ 'display': 'none' });
		}
		
		if ($('.namaste-slider-holder').width() > 768) {
		$('.namaste-slider-caption-holder').css({ 'display': 'block' });
		}
	}

});

jQuery(document).ready(function($) {
	$('.nivoSlider').nivoSlider({effect:'fade',prevText: '<i class="fa fa-chevron-left"></i>',nextText: '<i class="fa fa-chevron-right"></i>',pauseTime: 8000,});
});