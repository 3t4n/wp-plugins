( function( $ ) {
    'use strict';

    $( function() {
        var hash = window.location.hash;

        $( '.js-emc-tabs__nav a' ).click( function() {

            $( this ).closest( 'ul' ).find( 'li' ).removeClass( 'active' );
            $( this ).closest( 'li' ).addClass( 'active' );
            $( this ).closest( '.js-emc-tabs' ).find( '.emc-tabs__tab' ).hide();

            $( $( this ).attr( 'href' ) ).show();

            if ( history.pushState ) {
                history.pushState( null, null, $( this ).attr( 'href' ) );
            } else {
                location.hash = $( this ).attr( 'href' );
            }

            return false;
        } );

        $( '.js-emc-tabs' ).each( function() {
            var $container = $( this );

            if ( hash.length && $container.find( hash ) ) {
                $container.find( '.js-emc-tabs__nav a[href="' + hash + '"]' ).trigger( 'click' );
            } else {
                $container.find( '.js-emc-tabs__nav li:first-child a' ).trigger( 'click' );
            }
        } );

        $( document ).on( 'change', '.js-emc-show-pages', function() {
            var $el = $( this );
            var $block = $el.closest( '.js-emc-access-block' ).find( '.js-emc-show-pages-field' );

            if ( $el.val() === 'all' ) {
                $block.removeClass( 'show' );
            } else {
                $block.addClass( 'show' );
            }
        } ).trigger( 'change' );

        $( document ).ajaxSuccess( function() {
            $( document ).find( '.js-emc-show-pages' ).trigger( 'change' );
        } );

        $( '.emc-field input[type=color]' ).wpColorPicker();

        $( '.js-show-fields' ).change( function() {

            var wrapper_class = $( this ).data( 'class-field' );

            if ( $( this ).is( ':checked' ) ) {
                $( '.' + wrapper_class ).show();
            } else {
                $( '.' + wrapper_class ).hide();
            }
        } ).trigger( 'change' );
    } );
} )( jQuery );
