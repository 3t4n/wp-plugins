;(function ( $, window, undefined ) {

	$( function() {

		$( '#edd_enhanced_sales_reports_settings_tabs_header a' ).on( 'click', function( e ) {
			e.preventDefault();
			if ( $( this ).hasClass( 'edd-enhanced-sales-reports-tab-active' ) ) {
				return;
			}

			$( this )
				.addClass( 'edd-enhanced-sales-reports-tab-active' )
				.siblings( 'a' )
					.removeClass( 'edd-enhanced-sales-reports-tab-active' );

			$( $( this ).attr( 'href' ) )
				.addClass( 'edd-enhanced-sales-reports-tab-active' )
				.siblings( '.edd-enhanced-sales-reports-tab-content' )
					.removeClass( 'edd-enhanced-sales-reports-tab-active' );
		} );

		// Put General Admin Scripts Here
		$( '.edd-enhanced-sales-reports-multi-select' ).select2();

		$( '.edd-enhanced-sales-reports-upload-file' ).on( 'click', function( e ) {
			e.preventDefault();
			var $upload_field = $( this ).closest( 'td' ).find( 'input' );
			var upload_frame = wp.media( {
				title: 'Select Media',
				multiple : false,
			} );
			upload_frame.open();

			upload_frame.on( 'select', function() {
				var attachment =  upload_frame.state().get( 'selection' ).first().toJSON();
				$upload_field.val( attachment.url );
			} );
		} );

		$( '.edd-enhanced-sales-reports-update-lookup').on( 'click', function( e ) {
			e.preventDefault();
			if( $( this ).hasClass( 'edd-enhanced-sales-reports-ajaxing' ) ) {
				return;
			}
			$( this ).addClass( 'edd-enhanced-sales-reports-ajaxing' );

			$.ajax( {
				url: ajaxurl,
				type: 'POST',
				dataType: 'JSON',
				data: {
					action: 'edd_enhanced_sales_reports_populate_lookup'
				},
				success: function( d ) {
					alert( d.message );
				}
			} )
			.always( function() {
				$( '.edd-enhanced-sales-reports-update-lookup' ).removeClass( 'edd-enhanced-sales-reports-ajaxing' );
			} )
			.fail( function() {
			} );
			
		} );
	} );

}(jQuery, window));