( function( $ ) {
	
	$( function() {
		
		var pluginSlug = 'edd-enhanced-sales-reports';
		
		// Code to fire when the DOM is ready.
		$( document ).on( 'click', 'tr[data-slug="' + pluginSlug + '"] .deactivate', function( e ) {
			e.preventDefault();
			$( '.edd-enhanced-sales-reports-popup-overlay' ).addClass( 'edd-enhanced-sales-reports-active' );
			$( 'body' ).addClass( 'edd-enhanced-sales-reports-hidden' );
		} );
		
		$( document ).on( 'click', '.edd-enhanced-sales-reports-popup-button-close', function() {
			close_popup();
		} );

		$( document ).on( 'click', '.edd-enhanced-sales-reports-serveypanel,tr[data-slug="' + pluginSlug + '"] .deactivate', function( e ) {
			e.stopPropagation();
		} );
		
		$( document ).click( function() {
			close_popup();
		} );

		$( '.edd-enhanced-sales-reports-reason label' ).on( 'click', function() {
			if ( $( this ).find( 'input[type="radio"]' ).is( ':checked' ) ) {
				$( this )
					.next()
					.next( '.edd-enhanced-sales-reports-reason-input' )
					.show()
					.end()
					.end()
					.parent()
					.siblings()
					.find( '.edd-enhanced-sales-reports-reason-input' )
					.hide();
			}
		} );

		$( 'input[type="radio"][name="edd-enhanced-sales-reports-selected-reason"]' ).on( 'click', function( event ) {
			$( '.edd-enhanced-sales-reports-popup-allow-deactivate' ).removeAttr( 'disabled' );
			$( '.edd-enhanced-sales-reports-popup-skip-feedback' ).removeAttr( 'disabled' );
			$( '.message.error-message' ).hide();
			$( '.edd-enhanced-sales-reports-message' ).hide();
		} );

		$( '.edd-enhanced-sales-reports-reason-pro label' ).on( 'click', function() {
			if ( $( this ).find( 'input[type="radio"]' ).is( ':checked' ) ) {
				$( this ).next( '.edd-enhanced-sales-reports-message' )
					.show()
					.end()
					.end()
					.parent()
					.siblings()
					.find( '.edd-enhanced-sales-reports-reason-input' )
					.hide();
				
				$( this ).next( '.edd-enhanced-sales-reports-message' ).show()
				$( '.edd-enhanced-sales-reports-popup-allow-deactivate' ).attr( 'disabled', 'disabled' );
				$( '.edd-enhanced-sales-reports-popup-skip-feedback' ).attr( 'disabled', 'disabled' );
			}
		} );

		$( document ).on( 'submit', '#edd-enhanced-sales-reports-deactivate-form', function( event ) {
			event.preventDefault();
			
			var _reason = parseInt( $( 'input[type="radio"][name="edd-enhanced-sales-reports-selected-reason"]:checked' ).val() );
			var _reason_details = '';
			var deactivate_nonce = $( '.edd_enhanced_sales_reports_deactivation_nonce' ).val();
			
			if ( 2 === _reason ) {
				_reason_details = $( this ).find( 'input[type="text"][name="better_plugin"]' ).val();
			} else if ( 7 === _reason ) {
				_reason_details = $( this ).find( 'input[type="text"][name="other_reason"]' ).val();
			}

			if ( ( 7 === _reason || 2 === _reason ) && '' === _reason_details ) {
				$( '.message.error-message' ).show();
				return;
			}

			$.ajax( {
				url: ajaxurl,
				type: 'POST',
				data: {
					action: 'edd_enhanced_sales_reports_deactivation',
					reason_details: _reason,
					reason_details: _reason_details,
					edd_enhanced_sales_reports_deactivation_nonce: deactivate_nonce
				},
				beforeSend: function() {
					$( '.edd-enhanced-sales-reports-spinner' ).show();
					$( '.edd-enhanced-sales-reports-popup-allow-deactivate' ).attr( 'disabled', 'disabled' );
				}
			} ).done(function() {
				$( '.edd-enhanced-sales-reports-spinner' ).hide();
				$( '.edd-enhanced-sales-reports-popup-allow-deactivate' ).removeAttr( 'disabled' );
				window.location.href = $( 'tr[data-slug="' + pluginSlug + '"] .deactivate a' ).attr( 'href' );
			} );
		} );

		$( '.edd-enhanced-sales-reports-popup-skip-feedback' ).on( 'click', function(e) {
			window.location.href = $( 'tr[data-slug="' + pluginSlug + '"] .deactivate a' ).attr( 'href' );
		} );

		function close_popup() {
			$( '.edd-enhanced-sales-reports-popup-overlay' ).removeClass( 'edd-enhanced-sales-reports-active' );
			$( '#edd-enhanced-sales-reports-deactivate-form' ).trigger( 'reset' );
			$( '.edd-enhanced-sales-reports-popup-allow-deactivate' ).attr( 'disabled', 'disabled' );
			$( '.edd-enhanced-sales-reports-reason-input' ).hide();
			$( 'body' ).removeClass( 'edd-enhanced-sales-reports-hidden' );
			$( '.message.error-message' ).hide();
			$( '.edd-enhanced-sales-reports-message' ).hide();
		}
	} );

} )( jQuery );