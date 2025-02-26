( function ( $ ) {
	"use strict";

	var sc  = $( '#acb_shortcode' );
	var scv = sc.val();
	var new_val = scv;

	$( document.body ).on( 'click', '.acb_copy', function( event ) {
		event.preventDefault();
		$( this ).parents( 'div' ).find( 'textarea' ).select();
		document.execCommand( 'copy' );
	} );

	$( document.body ).on( 'change', '.shortcode_opts input[type=checkbox]', function( event ) {
		var d = $( this ).attr( 'data-unchecked' );
		var c = $( this ).attr( 'data-checked' );
		new_val = new_val.replace( ' ]', ']' );
		new_val = new_val.replace(/  +/g, ' ');
		if ( d ) {
			if ( ! $( this ).is( ':checked' ) ) {
				new_val = new_val.replace( '[acb', '[acb ' + d );
				sc.val( new_val );
			} else {
				new_val = new_val.replace( ' ' + d, '' );
				sc.val( new_val );
			}
		} else if ( c ) {
			if ( $( this ).is( ':checked' ) ) {
				new_val = new_val.replace( '[acb', '[acb ' + c );
				sc.val( new_val );
			} else {
				new_val = new_val.replace( ' ' + c, '' );
				sc.val( new_val );
			}
		}
	} );

	$( document.body ).on( 'change', '.shortcode_opts input[type=number]', function( event ) {
		var d = $( this ).attr( 'data-text' );
		var c = $( this ).attr( 'data-current' );
		if ( ! $( this ).val() ) {
			return;
		}
		d = d.replace( '{val}', $( this ).val() );
		$( this ).attr( 'data-current', d );
		new_val = new_val.replace( '[acb', '[acb ' + d );
		if ( c ) {
			new_val = new_val.replace( c, '' );
		}
		new_val = new_val.replace( ' ]', ']' );
		new_val = new_val.replace(/  +/g, ' ');
		sc.val( new_val );
	} );

} )(jQuery);