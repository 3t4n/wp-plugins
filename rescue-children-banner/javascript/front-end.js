jQuery( document ).ready( function() {
	// Show the link to download the plugin when the user hovers over the banner
	jQuery( '#rcb_container' ).hover(
		function() {
			jQuery( '#rcb_add-icon' ).fadeIn();
		},
		
		function() {
			jQuery( '#rcb_add-icon' ).fadeOut();
		}
	);
} );
