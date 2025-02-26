/**
 * Live-update changes to the Custom Color Options.
 */
( function( $ ) {
	wp.customize( 'wp_custom_color', function( value ) {
		value.bind( function( to ) {
			$( '#wp-custom-color' ).html( to );
		} );
	} );
} )( jQuery );