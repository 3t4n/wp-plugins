jQuery(document).ready(function($){
	$('#facebook-like-box-pop-up-close, body').click( function() { unload_fblb(); });
	function unload_fblb() { $('#facebook-like-box-pop-up, .facebook-like-box-pop-up-overlay').fadeOut("slow"); }
	function load_fblb() { 
		$('#facebook-like-box-pop-up, .facebook-like-box-pop-up-overlay').fadeIn("slow"); 
		$('.facebook-like-box-pop-up-overlay').css("opacity", 0.5); 
	}
	
	cookieElement = document.getElementById("facebook-like-box-pop-up-cookie-info");
	if (cookieElement) {
		time = cookieElement.getAttribute("data-time");
		prefix = cookieElement.getAttribute("data-prefix");
		path = cookieElement.getAttribute("data-path");
		domain = cookieElement.getAttribute("data-domain");
		value = 1;
	    var date = new Date();
	    date.setTime(date.getTime()+(time));
	    var expires = "; expires="+date.toGMTString();
	    document.cookie = prefix+"="+value+expires+"; path=/";
	}
	
	var mainElement = $('body').find(".facebook-like-box-pop-up-main");
	var shortcodeElement = $('body').find(".facebook-like-box-pop-up-shortcode");
	
	if (mainElement.length && shortcodeElement.length) {
		mainElement.remove();
	}
	window.fbAsyncInit = function () {
	    FB.Event.subscribe("xfbml.render", function () {
	    	load_fblb();
	    });
	};
});