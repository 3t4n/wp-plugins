/**
 * Customize Background-Size JS
 *
 * @package  Customize Background-Size
 * @author   Matt Varone | @sksmatt | mattvarone.com
 */
( function( $ ){
    wp.customize( 'mv_background_size', function( value ) {
        value.bind( function( to ) {
            $('#customize-preview > iframe').contents().find('body').css('background-size',to);
        } );
    } );
} )( jQuery );
