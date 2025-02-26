/*
 * simple adminbar button - hides adminbar on load
 * replaces with a tiny button to show and hide adminbar
 */

jQuery(document).ready(function($) {

    $('#wpadminbar #hide-wpadminbar').hide('slow')
    $('#wpadminbar').css('display', 'none').find('#hide-wpadminbar').show('slow');
    $('<button id="hide-wpadminbar" class="custom">AdminBar</button>').appendTo('body').click(function() {
        $('#wpadminbar').fadeToggle('slow');
    });

});
