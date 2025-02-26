/**
 * AWS Cookie Popup JavaScripts
 * 
 * @version 1.0.0
 * @since 1.0.0
 */
jQuery(document).ready(function($) {
    $('#aws-color-picker').hide();

    $('#aws-color-picker').farbtastic('.aws-color-field');
    if ( $(".aws-color-field").val().length === 0 )
        {
        var input = $( ".aws-color-field" );
         input.val( input.val() + "#ffffff" );
        }
    $('.aws-color-field').click(function() {
        $('#aws-color-picker').fadeIn();
    });

    $(document).mousedown(function() {
        $('#aws-color-picker').each(function() {
            var display = $(this).css('display');
            if ( display == 'block' )
                $(this).fadeOut();
        });
    });
});