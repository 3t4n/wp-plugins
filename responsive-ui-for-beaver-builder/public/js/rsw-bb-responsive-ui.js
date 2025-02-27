(function( $ ) {
	'use strict';

	/**
	 *
	 * This JS only runs when Beaver Builder is running
	 *
	 */
	 $(window).on('load',function() {
		 $('.fl-builder-bar-actions').append('<button class="rsw-bb-ui-button"><span class="dashicons dashicons-admin-settings"></span> <span class="dashicons dashicons-visibility"></span><span class="dashicons dashicons-hidden"></span></button>');
		 $('.rsw-bb-ui-button').on( 'click', function(e) {
			 e.preventDefault();
			 $('.fl-builder-edit').toggleClass('rsw-bb-ui-on');
			 $('.rsw-bb-ui-button').toggleClass('rsw-bb-ui-button--on');
		 });
 	 });

})( jQuery );
