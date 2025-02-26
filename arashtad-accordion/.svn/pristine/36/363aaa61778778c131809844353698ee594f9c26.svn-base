/**
 * Arashtad Accordion
 * Responsive accordion widget for WordPress
 * Plugin URL       https://arashtad.com
 * Version          1.0
 * Author			Amin Shahrokhi
 * Author URL		http://shahrokhi.me
 * Author Email		support@arashtad.com
 * Creation Date	January 9, 2016
 * Copyright		Copyright (c) 2011 - 2016 Arashtad Ltd. All rights reserved.
 * license			GNU General Public License version 3 or later; see LICENSE.txt
**/

jQuery.noConflict();

jQuery(document).ready(function(){

	jQuery('.iccordion').each(function(){
		var moduleID = jQuery(this).attr('id');
		jQuery(this).find('section:first-child').addClass('iccordion_active');
		jQuery(this).find('section').click(function(){
			if(jQuery(this).hasClass('iccordion_active'))
			{
				return;
			}
			else
			{
				jQuery('section').removeClass('iccordion_active');
				jQuery(this).addClass('iccordion_active');
				jQuery('#'+moduleID+' .iccordion_content').slideUp('fast');
				jQuery('#'+moduleID+' .iccordion_active .iccordion_content').slideDown('fast');
			}
		});
	});

});
