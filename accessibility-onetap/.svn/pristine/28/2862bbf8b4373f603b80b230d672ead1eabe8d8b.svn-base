/* eslint no-undef: "off", no-alert: "off" */
( function( $ ) {
	// Attach a click event listener to all <a> tags with href starting with '#'
	$( 'a[href^="#"]' ).on( 'click', function( event ) {
		// Get the target element based on the href attribute of the clicked link
		const target = $( $.attr( this, 'href' ) );

		// Check if the target element exists
		if ( target.length ) {
			// Prevent the default anchor link behavior (default jump)
			event.preventDefault();

			// Set the offset for how far above the target the scroll should stop
			const offset = 110;

			// Animate scrolling to the target element minus the offset
			$( 'html, body' ).animate( {
				scrollTop: target.offset().top - offset,
			}, 0 ); // Duration of the scroll (0 means no animation)
		}
	} );

	const link = document.querySelectorAll(
		'.wrap .tabs .mycontainer .myrow .box-menu a'
	);
	const row = document.querySelectorAll( '.wrap .data-content' );

	link.forEach( function( item, index ) {
		link[ index ].addEventListener( 'click', function() {
			// Get id
			const getId = '.' + this.getAttribute( 'myid' );

			// Remove all class active link
			link.forEach( function( element ) {
				element.classList.remove( 'active' );
			} );

			// Active class link
			this.classList.add( 'active' );

			// Hide all data content
			row.forEach( function( element ) {
				element.classList.add( 'hide' );
				element.classList.remove( 'active' );
			} );

			// Show data content active current
			document
				.querySelector( getId + '.data-content' )
				.classList.remove( 'hide' );
			document
				.querySelector( getId + '.data-content' )
				.classList.add( 'active' );
		} );
	} );
}( jQuery ) );
