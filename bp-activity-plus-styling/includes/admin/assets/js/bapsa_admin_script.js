jQuery( document ).ready( function( $ ) {

	$( '.bapsa_notice-warning' ).on( 'click', '.notice-dismiss', function() {

		var data = {

			'action'		: 'bapsa_dismiss_notification',
			'nonce'			: bapsa_admin_localize.bapsa_admin_nonce,

		};

		bapsa_dismiss_notification_option( data );

	} );

	function bapsa_dismiss_notification_option( data ) {

		jQuery.post( ajaxurl, data, function( response ) {

			console.log( response );

		} );

	} 
 	

} );