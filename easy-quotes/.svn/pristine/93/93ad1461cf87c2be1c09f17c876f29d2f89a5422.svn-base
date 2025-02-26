( function ( $ ) {
	$( document ).on( 'change', '#quote_rating', function () {
		rating = this.value;
		if ( rating > this.max ) this.value = this.max;
		if ( rating < this.min ) this.value = this.min;
		rating = this.value;

		fraction = Math.round( ( rating - Math.floor( rating ) ) * 10 );

		// Stars
		$( '.la-rating-stars use.star' ).each( function ( index ) {
			if ( index < Math.floor( rating ) )
				$( this ).attr( 'fill', 'rgb(229,187,79)' );
			else if ( index == Math.floor( rating ) && fraction > 0 ) {
				$( this ).attr( 'fill', 'url(#partialFill-' + fraction + ')' );
			} else if ( index >= rating )
				$( this ).attr( 'fill', 'rgb(255,255,255)' );
		} );
	} );
} )( jQuery );
