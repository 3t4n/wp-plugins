jQuery(document).ready(function() {
	var offset = 1;

	jQuery("a#more-posts-button").live('click', function(e){
		e.preventDefault();
        jQuery(this).after('<div id="loader"></div>');
		jQuery(this).remove();
		// Set data for WP Action
		var data = {
			action:'get_more_posts',
			offset:offset
		};
		
 		// Access global URL declared in plugin
		var url = wpajax.ajaxurl;
		
		jQuery.post(url, data, function(html) {
			jQuery('#posts-list').append('<div class="more-posts"></div>');
			jQuery('.more-posts').hide().append(html).slideDown(450, function() {
				jQuery('html, body').animate({ scrollTop: jQuery(this).offset().top - 10 }, 450);
			}).attr('class', 'extra-posts');
            jQuery('#loader').remove();
			offset++;
		});
		return false;	
	});	
});