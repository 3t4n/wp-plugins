/**
 * Utility Javascript for Pargo Admin, not to be confused with the Pargo Admin UI written in Vue.js
 * Author: Pargo
 */

jQuery(document).ready(function($) {
   // dismiss the notice when the #pargo_rating_notice_dismiss button is clicked and call an ajax function to action the dismiss
    $('#pargo_rating_notice_dismiss').click(function() {
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'pargo_rating_notice_dismiss',
                nonce: OBJ.nonce
            },
            success: function(response) {
                $('#pargo_rating_notice').fadeOut();
            }
        });
    })
});