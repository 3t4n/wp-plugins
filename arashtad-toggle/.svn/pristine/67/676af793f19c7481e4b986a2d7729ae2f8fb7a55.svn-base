/**
* Plugin Name: 	Arashtad Toggle
* Plugin URI:  	https://arashtad.com/wordpress-plugins/introductions/arashtad-toggle/
* Description: 	Responsive accordion widget for WordPress, created by <a href="https://arashtad.com" target="_blank">Arashtad.com</a>
* Version:     	1.2
* Author:      	Amin Shahrokhi
* Author URI:  	https://arashtad.com/
* License:     	GPL2
* License URI: 	https://www.gnu.org/licenses/gpl-2.0.html
* Copyright:	(c) 2011 - 2016 Arashtad Ltd. All Rights Reserved.
**/

jQuery.noConflict();

jQuery(document).ready(function(){

	jQuery('.artoggle').each(function(){
		var moduleID = jQuery(this).attr('id');
		jQuery(this).find('section:first-child').addClass('artoggle_active');
		jQuery(this).find('section').click(function(){
			if(jQuery(this).hasClass('artoggle_active'))
			{
				jQuery(this).removeClass('artoggle_active');
				jQuery(this).find('.artoggle_content').slideUp('fast');
			}
			else
			{
				jQuery(this).addClass('artoggle_active');
				jQuery(this).find('.artoggle_content').slideDown('fast');
			}
		});
	});

});
