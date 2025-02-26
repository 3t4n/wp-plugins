/*
 * underCover - Detect Below the Fold Views (http://www.userfirstinteractive.com/)
 *
 * Copyright (c) 2009 UserFirst Interactive
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * @author Scott D. Brooks 
 *
 * @created by UserFirst Interactive (creations@userfirstinteractive.com)
 * 
 * Version:  1.0
 * 
 */
var codeToExecute		= function() {};

(function($){	
	$.fn.undercover = function(options) {	
		var below_the_fold_triggered = false;	
		var defaults = {
			number_of_pixels_below_fold: 	200,
			execute:						""	 // no function assigned by default
		};
		var options 			= $.extend(defaults, options);
		
		if (options.execute == "") {
			alert("The underTheCovers jQuery Plugin has been misconfigured.  Please add the function you wish to execute when the visitor scrolls below the fold.");
		}
		codeToExecute = options.execute;
		
        $(window).bind("scroll", function(event) {        	
            if (belowthefold(options.number_of_pixels_below_fold)) {
            	if (below_the_fold_triggered == false) {
            		below_the_fold_triggered = true;
            		codeToExecute();
            	}
            }
            
            /* detects if user has looked to the RIGHT of the fold
            if (rightoffold()) {
            	codeToExecute();
            } 
            */            
        });		
		
	};

    function belowthefold(offset) {
        if ($(window).scrollTop() > offset) {
        	return true;
        } else {
        	return false;
        }
    }
	
    function rightoffold() {
        if ($(window).scrollLeft() > 0) {
        	return true;
        } else {
        	return false;
        }
    }    
		
})(jQuery);