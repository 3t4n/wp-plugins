;(function ( $, window, undefined ) {

	if ( $( '.edd-enhanced-sales-reports-subscription-modal-wrapper' ).length > 0 ) {
		// Show the popup after 5 seconds
		window.setTimeout( function() {
			$( '.edd-enhanced-sales-reports-subscription-modal-wrapper' ).addClass( 'open' );
		}, 5000 );

		// Overtake the form submission request
		$( '.edd-enhanced-sales-reports-subscription-form' ).on( 'submit', function( e ) {
			e.preventDefault();
			
			if ( $( '.edd-enhanced-sales-reports-subscription-modal' ).hasClass( 'ajaxing' ) ) {
				return; // request is already in progress
			}

			$( '.edd-enhanced-sales-reports-subscription-modal' ).addClass( 'ajaxing' );

			$.ajax( {
				url: ajaxurl,
				type: 'POST',
				dataType: 'JSON',
				data: {
					action: 'edd_enhanced_sales_reports_handle_subscription_request',
					email: $( '.edd-enhanced-sales-reports-subscription-form input' ).val(),
					security: $( '.edd-enhanced-sales-reports-subscription-form input[name="_wpnonce"]' ).val(),
				},
				success: function( data ) {
					$( '.edd-enhanced-sales-reports-subscription-modal-main' ).hide();
					$( '.edd-enhanced-sales-reports-subscription-modal-thanks' ).show();

					// auto-close the popup after 5 seconds
					window.setTimeout( function() {
						$( '.edd-enhanced-sales-reports-subscription-modal-wrapper' ).removeClass( 'open' );
					}, 5000 );
				}
			} )
			.fail( function() {
				$( '.edd-enhanced-sales-reports-subscription-error' ).show();
			} )
			.always( function() {
				$( '.edd-enhanced-sales-reports-subscription-modal' ).removeClass( 'ajaxing' );
			} );
		} );

		function store_popup_shown_status() {
			$.ajax( {
				url: ajaxurl,
				type: 'POST',
				dataType: 'JSON',
				data: {
					action: 'edd_enhanced_sales_reports_subscription_popup_shown'
				},
			} );
			
		}

		$( '.edd-enhanced-sales-reports-subscription-skip' ).on( 'click', function( e ) {
			e.preventDefault();
			$( '.edd-enhanced-sales-reports-subscription-modal-wrapper' ).removeClass( 'open' );
			store_popup_shown_status();
		} );

	}

}(jQuery, window));