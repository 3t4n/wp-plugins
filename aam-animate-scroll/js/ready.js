jQuery(document).ready(function() {
jQuery(window).bind('scroll', function(){  
	if(jQuery(this).scrollTop() > 150) {
		jQuery("#aam-scroll-div").fadeIn(500);
	}
	else
	{
		jQuery("#aam-scroll-div").fadeOut(500);
	}
});
});
