
jQuery(document).ready(function() {

/**
 * Helper window utils
 *
 * Opening and closing the helper window.
 */
 
jQuery('.ctrlv-help-button, .add-content, .ctrlv-helper-shade').click(function() {

	event.preventDefault();

	jQuery('#ctrlv-helper-window, .ctrlv-helper-shade').toggle();
	

});


/**
 * Filter Layouts
 *
 * Functionality for filtering the Layouts per Taxonomy/Category.
 */
 
jQuery('#ctrlv-filter').on( 'change', function() {

	if ( this.value === 'all' ) {

		jQuery('[filter-id^=category-]').show();
		
	} else {

		jQuery('[filter-id^=category-]').hide();
		jQuery('[filter-id=category-'+this.value+']').show();
		
	}

});

/**
 * Send to TinyMCE
 *
 * Get content of target div by id and send this to the TinyMCE editor.
 */
 
jQuery(".add-content").click(function() {

			//Get button attribute value of "snippet", which is the same as the target div.
			var snippetid = jQuery(this).attr('snippet');
			
			//find the snippet div and get the html content.
			var sendto = jQuery('#'+snippetid+'').html();
			
			//send to TinyMCE.
            var win = window.dialogArguments || opener || parent || top;
            win.send_to_editor(sendto);

            return false;
});
    
});