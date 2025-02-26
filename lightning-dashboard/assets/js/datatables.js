jQuery(document).ready( function($) {

	// Hide left WP menu if horizontally scrolling

	jQuery( window ).scroll( function() {

		var scrollLeft = jQuery( window ).scrollLeft();

		if( scrollLeft > 0 ) {

			// Hide left admin menu

			jQuery( '#adminmenuback, #adminmenuwrap' ).hide();

		} else {

			// Show left admin menu

			jQuery( '#adminmenuback, #adminmenuwrap' ).show();
		}

	});

});