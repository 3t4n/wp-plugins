jQuery( function( $ ) {
	// Toggle gateway on/off.
	$( '.edd_mollie_gateways' ).on( 'click', '.mollie-payment-gateway-method-toggle-enabled', function( event ) {
		event.preventDefault();
		
		var $link   = $( this ),
			$row    = $link.closest( 'tr' ),
			$toggle = $link.find( '.mollie-settings-input-toggle' );

		if ( $row.hasClass( 'mollie-disabled' ) ) {
			return;
		}

		var data = {
			action:     'edd_mollie_toggle_gateway_enabled',
			security:   edd_mollie_admin.nonce,
			gateway_id: $row.data( 'gateway_id' ),
		};

		$toggle.addClass( 'mollie-settings-input-toggle--loading' );

		$.ajax( {
			url:      edd_mollie_admin.ajax_url,
			data:     data,
			dataType: 'json',
			type:     'POST',
			success:  function( response ) {
				if ( true === response.data ) {
					$toggle.removeClass( 'mollie-settings-input-toggle--disabled' );
					$toggle.addClass( 'mollie-settings-input-toggle--enabled' );
					$toggle.removeClass( 'mollie-settings-input-toggle--loading' );
				} else if ( false === response.data ) {
					$toggle.removeClass( 'mollie-settings-input-toggle--enabled' );
					$toggle.addClass( 'mollie-settings-input-toggle--disabled' );
					$toggle.removeClass( 'mollie-settings-input-toggle--loading' );
				} else if ( 'needs_setup' === response.data ) {
					window.location.href = $link.attr( 'href' );
				}
			}
		} );

		return false;
	} );
	
	// Admin chargeback notice dismiss.
	$( '.edd-mollie-chargeback-notice' ).on( 'click', '.notice-dismiss', function( event ) {
		event.preventDefault();
		window.location.href = $( '.edd-mollie-chargeback-notice-dismiss' ).attr( 'href' );
	} );
	
	$( '.edd-mollie-chargeback-notice' ).on( 'click', '.dismiss-single-chargeback-notice', function( event ) {
		event.preventDefault();
		
		let $element = $( this );
		let data     = {
			action:        'wpo_edd_mollie_dismiss_single_chargeback',
			security:      edd_mollie_admin.nonce,
			chargeback_id: $( this ).closest( 'li' ).data( 'chargeback_id' ),
		};
		
		$.ajax( {
			url:   edd_mollie_admin.ajax_url,
			data:  data,
			type:  'POST',
			cache: false,
			success: function( response ) {
				if ( response.success ) {
					$element.closest( 'li' ).hide( 'slow', function() {
						$( this ).remove();
					} );
				}
			}
		} );
	} );
	
	// Remove our 'mollie_gateway' query var from main gateway section menu
	$( '.subsubsub a' ).each( function() {
		let url = $( this ).attr( 'href' );
		url     = url.replace( /&?mollie_gateway=([^&]$|[^&]*)/ig, '' );
		$( this ).attr( 'href', url );
	} );
	
} );
