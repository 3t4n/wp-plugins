( function($) {
	
	$( function() {
		function eddESRFetchFilteredTopProducts() {
			jQuery( '.edd-esr-widget-top-products' ).addClass( 'ajaxing' );
			jQuery.ajax( {
				url: ajaxurl,
				type: 'POST',
				dataType: 'JSON',
				data: {
					action: 'edd_enhanced_sales_reports_fetch_top_products',
					interval: jQuery( '#edd-enhanced-sales-reports-top-products-switcher' ).val(),
					security: jQuery( '.edd-esr-widget-top-products' ).attr( 'data-nonce' ),
				},
				success: function( data ) {
					jQuery( '.edd-esr-widget-top-products' )
						.find( '.edd-enhanced-sales-reports-date-switcher h4 span' )
						.html( jQuery( '#edd-enhanced-sales-reports-top-products-switcher' ).find( 'option:selected' ).html() );

					jQuery( '#edd-enhanced-sales-reports-top-products-switcher' )
						.closest( '.edd-enhanced-sales-reports-summary-widget-lower' )
						.find( 'table tbody' )
						.html( data.table );
				}
			} )
			.always( function () {
				jQuery( '.edd-esr-widget-top-products' )
					.removeClass( 'ajaxing' );
			} );
		}

		function eddESRFetchFilteredTopCustomers() {
			jQuery( '.edd-esr-widget-top-customers' ).addClass( 'ajaxing' );
			jQuery.ajax( {
				url: ajaxurl,
				type: 'POST',
				dataType: 'JSON',
				data: {
					action: 'edd_enhanced_sales_reports_fetch_top_customers',
					interval: jQuery( '#edd-enhanced-sales-reports-top-products-switcher' ).val(),
					security: jQuery( '.edd-esr-widget-top-customers' ).attr( 'data-nonce' )
				},
				success: function ( data ) {
					jQuery( '.edd-esr-widget-top-customers' )
						.find( '.edd-enhanced-sales-reports-date-switcher h4 span' )
						.html( jQuery( '#edd-enhanced-sales-reports-top-products-switcher' ).find( 'option:selected' ).html() );

					jQuery( '.edd-esr-widget-top-customers' )
						.find( 'table tbody' )
						.html( data.table );
				}
			} )
			.always( function () {
				jQuery( '.edd-esr-widget-top-customers' ).removeClass( 'ajaxing' );
			} );
		}

		jQuery( '#edd-enhanced-sales-reports-top-products-switcher' ).on( 'change', function() {
			eddESRFetchFilteredTopProducts();
			eddESRFetchFilteredTopCustomers();
		} );

		jQuery( '.edd-esr-reload-dashboard' ).on( 'click', function( e ) {
			e.preventDefault();
			jQuery( '.edd-enhanced-sales-reports-summary-widget' ).addClass( 'edd-esr-ajaxing' );
			window.location.reload();
		} );
	} );

} )( jQuery );