import './upsells.css';

( function() {
	'use strict';

	const passsterOpenModal = async ( e, upsell ) => {
		e.preventDefault();
		try {
			const response = await wp.apiFetch( {
				path: `passster/v1/${ upsell }-modal`,
				method: 'GET',
			} );

			document.body.classList.add( 'modal-open' );
			document.body.insertAdjacentHTML( 'beforeend', response );

			document.addEventListener(
				'click',
				( event ) => {
					if ( event.target.matches( '.passster-modal__overlay' ) || event.target.matches( '.passster-modal__dismiss' ) ) {
						passsterCloseModal();
					}
				},
				{ once: true },
			);
		} catch ( error ) {
			console.error( 'Error fetching modal content:', error );
		}
	};

	const passsterCloseModal = () => {
		const overlay = document.querySelector( '.passster-modal__overlay' );
		if ( overlay ) {
			overlay.remove();
		}
		document.body.classList.remove( 'modal-open' );
	};

	document.querySelector( '#adminmenu #toplevel_page_passster ul li a[href="admin.php?page=#password-lists"]' )
		.addEventListener( 'click', function( e ) {
			passsterOpenModal( e, 'password-lists' );
		} );

	document.querySelector( '#adminmenu #toplevel_page_passster ul li a[href="admin.php?page=#statistics"]' )
		.addEventListener( 'click', function( e ) {
			passsterOpenModal( e, 'statistics' );
		} );
}() );
