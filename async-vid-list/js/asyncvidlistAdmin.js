/////////////////////async-vid-list 
jQuery(function() {
	jQuery( "#accordion" ).accordion({ heightStyle: "content" ,  });
});
jQuery(function(){
	jQuery('#accordion').click(function(event) {
	var jQuerytarget = jQuery(event.target);
	if( jQuerytarget.is('h3') ) {
		jQuery('html, h3').animate({
			scrollTop: jQuery(this).offset().top -25
		}, 1000);
		}
	});
});
jQuery(function() {
    $( document ).tooltip();
});