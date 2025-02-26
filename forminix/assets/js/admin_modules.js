
function forminix_module_update_activated_modules(host, element) {
    'use strict';

    var is_enabled = jQuery(element).parent().find('input:checked').length > 0

    jQuery(element).parent().parent().find(".forminix_modules_card_status").text("Please wait...")


    var forminix_modules_activated_modules = []
    jQuery(".forminix_modules_card_container .forminix_modules_card").each(function (i, module) {
        if(jQuery(module).find('input:checked').length > 0){
            forminix_modules_activated_modules.push(jQuery(module).attr("data-module"))
        }
    })



    var post_data = {
        'action': 'forminix_modules_update_activated',
        'modules': JSON.stringify(forminix_modules_activated_modules)
    };
    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if(obj.status == "true"){
                if(is_enabled){
                    jQuery(element).parent().parent().find(".forminix_modules_card_status").text("Currently Enabled")
                }else{
                    jQuery(element).parent().parent().find(".forminix_modules_card_status").text("Currently Disabled")
                }
            }
        }
    })
}
