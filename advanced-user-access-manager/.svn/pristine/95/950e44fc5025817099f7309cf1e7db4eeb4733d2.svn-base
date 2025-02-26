;( function ( $ ) {

	$( function() {

		// Radio button checkbox handler
		$( '.rpa-redirect-type-choices input' ).on( 'change', function() {
			if ( 'page' === $( '.rpa-redirect-type-choices input:checked' ).attr( 'value' ) ) {
				$( 'tr[data-rpa-redirect-type="page"]' ).show();
				$( 'tr[data-rpa-redirect-type="url"]' ).hide();
			} else {
				$( 'tr[data-rpa-redirect-type="url"]' ).show();
				$( 'tr[data-rpa-redirect-type="page"]' ).hide();
			}
		} );

		$( '.rpa-redirect-type-choices-login input' ).on( 'change', function() {
			if ( 'page' === $( '.rpa-redirect-type-choices-login input:checked' ).attr( 'value' ) ) {
				$( 'tr[data-rpa-redirect-type="page"]' ).show();
				$( 'tr[data-rpa-redirect-type="url"]' ).hide();
			} else {
				$( 'tr[data-rpa-redirect-type="url"]' ).show();
				$( 'tr[data-rpa-redirect-type="page"]' ).hide();
			}
		} );

		$('.enable_choice_bg_image input').on('change', function () {
			if ( 'yes' === $( '.enable_choice_bg_image input:checked' ).attr( 'value' ) ) {
				$( 'tr[data-rpa-redirect-type="yes"]' ).show();
				$( 'tr[data-rpa-redirect-type="no"]' ).hide();
			} else {
				$( 'tr[data-rpa-redirect-type="no"]' ).show();
				$( 'tr[data-rpa-redirect-type="yes"]' ).hide();
			}
		});

		

		$( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );

	} );

}( jQuery, window ) );

