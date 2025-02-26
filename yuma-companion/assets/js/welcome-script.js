jQuery(document).ready(function(){
    jQuery(".yuma-accordion-header ul li").on( 'click', function(){
        var active = jQuery( this ).data('trigger');
        jQuery( '.yuma-accordion-header ul li, .yuma-accordion-content .content' ).removeClass( 'active' );
        jQuery( this ).addClass( 'active' );
        jQuery( '.yuma-accordion-content .content.' + active ).addClass( 'active' );

    } );
});