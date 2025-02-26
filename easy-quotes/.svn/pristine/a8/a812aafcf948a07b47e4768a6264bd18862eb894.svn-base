( function ( $ ) {
	$( document ).on( 'click', '.editinline', function () {
		id = '#' + $( '.inline-edit-row' ).attr( 'id' );
		selector = '#post-' + id.replace( '#edit-', '' );
		quote_author = $( selector ).find( '.quote_author' ).text();
		quote_date = $( selector ).find( '.quote_date' ).text();
		quote_rating = $( selector )
			.find( '.quote_rating span' )
			.data( 'value' );
		$( id ).find( '.quote_author' ).val( quote_author );
		$( id ).find( '.quote_date' ).val( quote_date );
		$( id ).find( '.quote_rating' ).val( quote_rating );
	} );
} )( jQuery );
