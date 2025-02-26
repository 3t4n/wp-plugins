jQuery( document ).ready( function( $ ) {

	var $modal     = $( '#credly-login-modal' );
	var forShowing = 'credly-login-show';

	$( this )
		// Show modal on button click.
		.on( 'click', '#credly-login-button', function() {
			$modal.addClass( forShowing );
			setTimeout( function() {
				$( 'input[name=credly_email]' ).focus();
			}, 250 );
		} )
		// Hide modal on overlay click.
		.on( 'click', '#credly-login-overlay:visible', function() {
			$modal.removeClass( forShowing );
		} )
		// Handle Credly Login form submission.
		.on( 'submit', '#credlyform', function( e ) {
			e.preventDefault();

			var data        = $( this ).serializeArray();
			var $errorField = $( '#credly-login-error' );
			var $loader     = $( '#credly-login-loader' );

			// Clear error messages and set loader.
			$errorField.empty();
			$loader.addClass( 'active' );

			// Action property is required by Wordpress. 
			// The value matches the PHP function in the root file.
			data.push( { name: 'action', value: 'credly-login-callback' } );

			$.post(
				CredlyLogin.ajaxurl,
				data,
				function( response ) {
					// Stop loader
					$loader.removeClass( 'active' );
					if ( response.success ) {
						// Redirect to the appropriate location.
						window.location = window.location.href.indexOf( 'wp-login.php' ) > -1 ? response.admin_url : response.home_url;
					} else {
						$errorField.text( response.message );
					}
			} );
		} );
} );