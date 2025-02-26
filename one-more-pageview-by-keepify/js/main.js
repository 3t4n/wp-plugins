
jQuery(document).ready(function($) {
	
	// When the mouse leaves the webpage area call this function
	$(document).mouseleave(function(){ 
		if(top.name != 1) {
			offsetLeft = ($(window).width() / 2) - ($('.wait-box-inner').width() / 2);
			$('.wait-box-inner').css('left', offsetLeft + 'px');
			$('.wait-box, .wait-box-inner').removeClass('hidden');
		}
	});
	
	$('.close-wait-box, .wait-box').click(function() {
		$('.wait-box, .wait-box-inner').addClass('hidden');
		top.name = 1;
	});
});