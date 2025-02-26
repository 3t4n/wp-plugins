/**
 * Plugin Name		Arashtad Testimonials Slider
 * Plugin URI	  	https://arashtad.com/wordpress-plugins/introductions/arashtad-testimonials/
 * Description		Responsive testimonials slider widget for WordPress
 * Author			Amin Shahrokhi
 * Author URI		https://arashtad.com/
 * Author Email		support@arashtad.com
 * Creation Date	December 18, 2015
 * Copyright		Copyright (c) 2011 - 2016 Arashtad Ltd. All rights reserved.
 * License			GNU General Public License version 3 or later; see LICENSE.txt
 * License URI: 	https://www.gnu.org/licenses/gpl-2.0.html
**/

jQuery.noConflict();

jQuery(document).ready(function(){

	// Begin Testimonials
	jQuery('.testimonials').each(function(){

		// Getting ID, Delay and Height of each Testimonial
		var currentTestimony = jQuery(this).attr('id');
		var slideDelay = jQuery(this).attr('data-delay');
		var effect = jQuery(this).attr('data-effect');

		// Set the animation speed
		if(jQuery(this).attr('data-speed') > 0)
		{
			var slideSpeed = jQuery(this).attr('data-speed');
		}
		else
		{
			// If speed is not selected, add 600ms as default
			var slideSpeed = 600;
		}

		// Set the delay if is not given via HTML
		if(!slideDelay)
		{
			// If delay is not selected, add 3000ms as default
			slideDelay = 3000;
		}

		var i = 0;
		function iteratetestimony() {
		    var list = jQuery('#'+currentTestimony+' section');

			// IF THE SELECTED EFFECT IS "FADE" OR NO EFFECT IS SELECTED FIRE THE FUNCTION BELOW
			if(!effect || effect == 'fade')
			{
				list.eq(i).fadeIn(slideSpeed).delay(slideDelay).fadeOut(slideSpeed, function() {
			        i++;
			        if(i % list.length == 0) {
			           	i = 0;
			        }
			        iteratetestimony();
			    });
			}

			// IF THE SELECTED EFFECT IS "SLIDE" OR NO EFFECT IS SELECTED FIRE THE FUNCTION BELOW
			if(effect == 'slide')
			{
				list.eq(i).css({ 'margin-top':'-10em', 'display':'block' }).animate({ 'margin-top':0 }, slideSpeed).delay(slideDelay).fadeOut(slideSpeed, function() {
			        i++;
			        if(i % list.length == 0) {
			           	i = 0;
			        }
			        iteratetestimony();
			    });
			}

			// IF THE SELECTED EFFECT IS "SCROLL" OR NO EFFECT IS SELECTED FIRE THE FUNCTION BELOW
			if(effect == 'scroll')
			{
				list.eq(i).css({ 'margin-left':'-100em', 'display':'block' }).animate({ 'margin-left':0 }, slideSpeed).delay(slideDelay).fadeOut(slideSpeed, function() {
			        i++;
			        if(i % list.length == 0) {
			           	i = 0;
			        }
			        iteratetestimony();
			    });
			}
		}
		iteratetestimony();

	});
});
