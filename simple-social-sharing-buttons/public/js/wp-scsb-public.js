(function( $ ) {
	'use strict';

	//load a popup for sharing
    jQuery(document).ready(function() {
        jQuery('.scsb_share').click(function(e) {
            e.preventDefault();
            window.open(jQuery(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + (jQuery(window).height() / 2 - 275) + ', left=' + (jQuery(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
            return false;
        });
    });
	
	
    
})( jQuery );
