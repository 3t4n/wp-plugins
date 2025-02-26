
jQuery( '#sjb-settings-form' ).submit( function(e) {
	e.preventDefault();
	jQuery( '.ajax-message' ).hide();
	jQuery.post(
		ajaxurl,
		{
			action:  'sjb_admin_config',
			page_id: jQuery( '#page-id' ).val(),
			url:	 jQuery( '#job-board-url' ).val()
		},
		function ( response ) {
			if ( response.success ) {
				jQuery( '.ajax-message.notice-success' ).show();
			} else {
				jQuery( '.ajax-message.notice-error' ).show();
			}
		}
	);
} );

jQuery( '.notice-dismiss' ).click( function() {
	jQuery( this )
		.closest( '#ajax-message' )
		.hide();
} );
