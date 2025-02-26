// show message

function showMessage(message)
{
   jQuery("#wls_dialog").show();
}
// Save settings for Global.
function wls_click_credit_link()
{



       var state = jQuery('#wls_author_linking').attr('checked') ? '1' : '0';
        var dataLink = {
            action  : 'wls_set_support_link',
            state   : state
        };

        jQuery.post(ajax_object.ajax_url, dataLink, function(respond) {
            if(jQuery('#wls_author_linking').attr('checked')){
                jQuery("#wls_support_title_1").hide();
                jQuery("#wls_support_title_2").show();
                jQuery("#wls_support_title_3").hide();
            }
            else {
                jQuery('#wls-notice-support-view').show();
                jQuery("#wls_support_title_1").show();
                jQuery("#wls_support_title_2").hide();
                jQuery("#wls_support_title_3").show();
            }
        });

}
