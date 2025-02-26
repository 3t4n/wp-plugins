(function ($) {
	"use strict";	
	$(document).ready(function(){
		/*======================================
		//  Wow JS
		======================================*/ 		
		var window_width = $(window).width();   
        if(window_width > 767){
            new WOW().init();
		}
	});
})(jQuery);	