/**
 * Script
 *
 * @package AdminBar Remover
 * @author Sujin 수진 Choi
 * @version 1.0.0
 */

jQuery( document ).ready( function($) {
	var adminbar_hidden = false;

	$( '#wpadminbar #wp-admin-bar-root-default > #wp-admin-bar-wp-logo a' ).click( function( e ) {
		e.preventDefault();

		if ( !adminbar_hidden ) {
			$( '#wpadminbar' ).css({
				'overflow' : 'hidden',
				'width' : 'initial',
				'min-width' : 'initial'
			});

			$( '#wpadminbar #wp-toolbar > ul' ).each( function( i ) {
				if ( i > 0 ) {
					$(this).hide();
				}
			});

			$( '#wpadminbar #wp-admin-bar-root-default > li' ).each( function( i ) {
				if ( i > 0 ) {
					$(this).hide();
				}
			});

			$( 'body' ).removeClass( 'admin-bar' );

			adminbar_hidden = true;
		} else {
			$( '#wpadminbar' ).removeAttr( 'style' );

			$( '#wpadminbar #wp-toolbar > ul' ).each( function( i ) {
				if ( i > 0 ) {
					$(this).show();
				}
			});

			$( '#wpadminbar #wp-admin-bar-root-default > li' ).each( function( i ) {
				if ( i > 0 ) {
					$(this).show();
				}
			});

			$( 'body' ).addClass( 'admin-bar' );

			adminbar_hidden = false;
		}
	});
});
