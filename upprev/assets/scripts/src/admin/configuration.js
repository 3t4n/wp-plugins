jQuery( document ).ready( function( $ ) {
    /**
     * configuration
     */
    $( 'input[name="iworks_upprev_configuration"]' ).on( 'change', function() {
        $(this).closest('form').submit();
    });
    /**
     * color
     */
    $('.wpColorPicker').wpColorPicker();
});
