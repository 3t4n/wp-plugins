function forminix_forms_init(host){
    'use strict';

    forminix_current_form_id = "0"
    forminix_hide_all();
    jQuery("#forminix_forms").show();

    forminix_forms_list(host)
}

function forminix_forms_list(host) {
    'use strict';

    jQuery(".forminix_forms_empty").hide()
    jQuery(".forminix_forms_main_area").hide()
    jQuery(".forminix_forms_main_area .forminix_forms_card_container").empty()
    jQuery(".forminix_forms_loader_container").show()

    var post_data = {
        'action': 'forminix_list_forms'
    };


    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if(obj.status === "true"){

                var forms = obj.forms;

                for (var i = 0; i < forms.length; i++) {

                    var itemHTML = "<div class=\"forminix_forms_card\">\n" +
                        "               <img class=\"forminix_forms_card_icon\" src=\""+host+"assets/img/forms/forminix_forms_card_icon.svg\"/>\n" +
                        "               <h3>"+forms[i].form_name+"</h3>\n" +
                        "               <div class=\"forminix_forms_card_details\">\n" +
                        "                   <p>Created at "+forms[i].created_at+"</p>\n" +
                        "                   <p>Total "+forms[i].total_views+" Views and "+forms[i].total_entries+" Entries Recorded</p>\n" +
                        "                   <p>Shortcode: [forminix id=\""+forms[i].form_id+"\"]</p>\n" +
                        "               </div>\n" +
                        "               <div class=\"forminix_forms_card_action\">\n" +
                        "                   <div class=\"forminix_forms_card_action_item\" onclick=\"forminix_builder_init(`"+host+"`, `"+forms[i].form_id+"`)\">Edit Form</div>\n" +
                        "                   <div class=\"forminix_forms_card_action_item\" onclick=\"forminix_entries_init(`"+host+"`, `"+forms[i].form_id+"`)\">View Entries</div>\n" +
                        "                   <div class=\"forminix_forms_card_action_item\" onclick=\"forminix_settings_init(`"+host+"`, `"+forms[i].form_id+"`)\">Settings</div>\n" +
                        "               </div>\n" +
                        "           </div>";


                    jQuery(".forminix_forms_main_area .forminix_forms_card_container").append(itemHTML)
                }

                if(forms.length > 0){
                    jQuery(".forminix_forms_loader_container").hide()
                    jQuery(".forminix_forms_main_area").show()
                }else{
                    jQuery(".forminix_forms_loader_container").hide()
                    jQuery(".forminix_forms_empty").show()
                }


            }
        }
    })
}



function forminix_forms_create_popup_show(host) {
    'use strict';
    jQuery(".forminix_forms_create_popup_container").css("display", "flex");
}

function forminix_forms_create_popup_close() {
    'use strict';
    jQuery(".forminix_forms_create_popup_container").css("display", "none");
}



function forminix_forms_import_form(host) {
    'use strict';

    forminix_show_pro_popup("", "");
}


function forminix_forms_import_demo_form(host, demo_slug, view) {
    'use strict';

    jQuery.get(host+"assets/imports/"+demo_slug+".txt", function(data) {
        var obj = JSON.parse(data);
        if(obj.form_settings.length > 0){

            var demo_template_title = jQuery(view).find("span").text()
            jQuery(view).find("span").text('Importing ...')

            var post_data = {
                'action': 'forminix_import_form',
                'json_data': JSON.stringify(obj)
            };
            jQuery.ajax({
                url: ajaxurl,
                type: "POST",
                data: post_data,
                success: function (data) {
                    var obj = JSON.parse(data);
                    if(obj.status == "true"){
                        forminix_builder_init(host, obj.form_id)
                    }
                    jQuery(view).find("span").text(demo_template_title)
                }
            })
        }else{
            alert("Something not working. Please contact support@forminix.com about this issue.")
        }

    });

}