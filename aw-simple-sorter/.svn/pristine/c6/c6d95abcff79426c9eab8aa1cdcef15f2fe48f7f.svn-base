jQuery(document).ready(function() {

	// show/hide by clicking a button
	jQuery('.aw_ss_button').click(function() {
		
		// remove aw-ss-active-button class from all buttons
		jQuery('.aw_ss_button').each(function() {
			jQuery(this).removeClass('aw_ss_active_button');
		});
		
		// add aw-ss-active-group class to the clicked button
		jQuery(this).addClass('aw_ss_active_button');
		
		var aw_ss_button_ID = jQuery(this).attr('id');
		
		var myUIeffect = aw_ss_script_vars.jQueryUIeffect;
		
		if (aw_ss_button_ID == 'aw_ss_show_all') {			
			jQuery('.aw_ss_post_wrapper').show(myUIeffect, 800);
		} else {
			jQuery('.aw_ss_post_wrapper').each(function() {
				if (!jQuery(this).hasClass(aw_ss_button_ID)) {
					jQuery(this).hide(myUIeffect, 800);		
				} else {
					jQuery(this).show(myUIeffect, 800);
				}
			});
		}					
	});
	
	// show/hide by choosing option in select
	jQuery('#aw_ss_select').change(function() {
		
		var aw_selected_ID = jQuery(this).children(':selected').attr('id');;
		
		var myUIeffect2 = aw_ss_script_vars.jQueryUIeffect;
		
		if (aw_selected_ID == 'aw_ss_show_all_select') {			
			jQuery('.aw_ss_post_wrapper').show(myUIeffect2, 800);

		} else {
			
			jQuery('.aw_ss_post_wrapper').each(function() {
				if (!jQuery(this).hasClass(aw_selected_ID)) {
					jQuery(this).hide(myUIeffect2, 800);		
				} else {
					jQuery(this).show(myUIeffect2, 800);
				}
			});
		}
		
	});
	
	// add/remove class on/off hover
	jQuery('.aw_ss_post_wrapper').hover(function () {
		
		var aw_ss_fih = jQuery(this).find('.aw_ss_featured_image').height();		
		
		jQuery(this).find('.aw_ss_hoverbox').addClass('aw_ss_hoverbox_transition').css({
			'height': aw_ss_fih,
		});
	}, function(){    	
    	jQuery(this).find('.aw_ss_hoverbox').removeClass('aw_ss_hoverbox_transition');
	});
	
});