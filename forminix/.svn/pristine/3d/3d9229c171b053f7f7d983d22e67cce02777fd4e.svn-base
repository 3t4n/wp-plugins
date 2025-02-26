var forminix_settings_form_field_data = ""
var forminix_settings_wp_user_roles = ""

function forminix_settings_init(host, form_id){
    'use strict';

    forminix_current_form_id = form_id
    forminix_hide_all();
    forminix_settings_tab_init()
    forminix_settings_on_changes()
    jQuery(".forminix_settings_header .forminix_details h2").text("Form Settings")
    jQuery(".forminix_settings_copy_shortcode").text("[forminix id=\""+forminix_current_form_id+"\"]");
    jQuery("#forminix_settings").show();

    forminix_enable_tinymce("forminix_settings_field_confirmation_msg")

    forminix_settings_load_data(host)


}


function forminix_settings_load_data(host) {
    'use strict';

    jQuery(".forminix_settings_main_area").hide()
    jQuery(".forminix_settings_conditional_logic_container").empty()
    jQuery(".forminix_settings_conditional_logic_main_area").hide()
    jQuery(".forminix_settings_conditional_logic_empty").show()
    jQuery(".forminix_settings_email_container").empty()
    jQuery(".forminix_settings_email_main_area").hide()
    jQuery(".forminix_settings_email_empty").show()
    jQuery(".forminix_settings_integration_container").empty()
    jQuery(".forminix_settings_integration_main_area").hide()
    jQuery(".forminix_settings_integration_empty").show()
    jQuery(".forminix_settings_loader_container").show()

    var post_data = {
        'action': 'forminix_get_settings',
        'form_id': forminix_current_form_id
    };


    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if(obj.status === "true"){
                var settings = obj.settings;

                forminix_settings_form_field_data = settings.field_data
                forminix_settings_wp_user_roles = settings.wp_user_roles

                jQuery(".forminix_settings_header .forminix_details h2").text("Form Settings - "+settings.form_name)


                /* Confirmation Settings */
                jQuery("#forminix_settings_field_confirmation_type").val(settings.confirmation_type).trigger("change")
                tinymce.get("forminix_settings_field_confirmation_msg").setContent(forminix_admin_unesc_and_codify_string(settings.confirmation_msg))
                jQuery("#forminix_settings_field_confirmation_form_status").val(settings.confirmation_form_status)
                jQuery("#forminix_settings_field_confirmation_custom_url").val(settings.confirmation_custom_url)

                /* Form Layout Settings */
                jQuery("#forminix_settings_field_help_message_position").val(settings.help_message_position).trigger("change")
                jQuery("#forminix_settings_field_asterisk_position").val(settings.asterisk_position)

                /* Form Scheduling & Restrictions Settings */
                jQuery("#forminix_settings_field_enable_form_scheduling").val(settings.enable_form_scheduling).trigger("change")
                jQuery("#forminix_settings_field_form_scheduling_start_datetime").val(settings.form_scheduling_start_datetime)
                jQuery("#forminix_settings_field_form_scheduling_end_datetime").val(settings.form_scheduling_end_datetime)
                jQuery("#forminix_settings_field_form_scheduling_inactive_msg").val(forminix_admin_unesc_and_codify_string(settings.form_scheduling_inactive_msg))
                jQuery("#forminix_settings_field_form_scheduling_expired_msg").val(forminix_admin_unesc_and_codify_string(settings.form_scheduling_expired_msg))
                var weekday_sat = jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_sat");
                var weekday_sun = jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_sun");
                var weekday_mon = jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_mon");
                var weekday_tue = jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_tue");
                var weekday_wed = jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_wed");
                var weekday_thu = jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_thu");
                var weekday_fri = jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_fri");
                (settings.form_scheduling_exclude_weekday_sat === "1") ? weekday_sat.prop( "checked", true ) : weekday_sat.prop( "checked", false );
                (settings.form_scheduling_exclude_weekday_sun === "1") ? weekday_sun.prop( "checked", true ) : weekday_sun.prop( "checked", false );
                (settings.form_scheduling_exclude_weekday_mon === "1") ? weekday_mon.prop( "checked", true ) : weekday_mon.prop( "checked", false );
                (settings.form_scheduling_exclude_weekday_tue === "1") ? weekday_tue.prop( "checked", true ) : weekday_tue.prop( "checked", false );
                (settings.form_scheduling_exclude_weekday_wed === "1") ? weekday_wed.prop( "checked", true ) : weekday_wed.prop( "checked", false );
                (settings.form_scheduling_exclude_weekday_thu === "1") ? weekday_thu.prop( "checked", true ) : weekday_thu.prop( "checked", false );
                (settings.form_scheduling_exclude_weekday_fri === "1") ? weekday_fri.prop( "checked", true ) : weekday_fri.prop( "checked", false );

                jQuery("#forminix_settings_field_allow_logged_in_only").val(settings.allow_logged_in_only).trigger("change")
                jQuery("#forminix_settings_field_require_login_msg").val(forminix_admin_unesc_and_codify_string(settings.require_login_msg))

                jQuery("#forminix_settings_field_enable_maximum_entry_limit").val(settings.enable_maximum_entry_limit).trigger("change")
                jQuery("#forminix_settings_field_maximum_entry_amount").val(settings.maximum_entry_amount)
                jQuery("#forminix_settings_field_maximum_entry_limitation_type").val(settings.maximum_entry_limitation_type)
                jQuery("#forminix_settings_field_maximum_entry_limitation_msg").val(forminix_admin_unesc_and_codify_string(settings.maximum_entry_limitation_msg))

                /* Field Customization Settings */
                jQuery("#forminix_settings_field_bg_color").val(settings.bg_color)
                jQuery("#forminix_settings_field_bg_color_focus").val(settings.bg_color_focus)
                jQuery("#forminix_settings_field_border_color").val(settings.border_color)
                jQuery("#forminix_settings_field_border_color_focus").val(settings.border_color_focus)
                jQuery("#forminix_settings_field_text_color").val(settings.text_color)
                jQuery("#forminix_settings_field_text_color_focus").val(settings.text_color_focus)
                jQuery("#forminix_settings_field_radio_checked_bg_color").val(settings.radio_checked_bg_color)
                jQuery("#forminix_settings_field_label_color").val(settings.label_color)
                jQuery("#forminix_settings_field_padding_top_bottom").val(settings.padding_top_bottom)
                jQuery("#forminix_settings_field_padding_left_right").val(settings.padding_left_right)
                jQuery("#forminix_settings_field_text_size").val(settings.text_size)
                jQuery("#forminix_settings_field_label_text_size").val(settings.label_text_size)
                jQuery("#forminix_settings_field_help_msg_tooltip_bg_color").val(settings.help_msg_tooltip_bg_color)
                jQuery("#forminix_settings_field_help_msg_tooltip_text_color").val(settings.help_msg_tooltip_text_color)
                jQuery("#forminix_settings_field_help_msg_text_color").val(settings.help_msg_text_color)
                jQuery("#forminix_settings_field_help_msg_text_size").val(settings.help_msg_text_size)
                jQuery("#forminix_settings_field_star_rating_default_bg_color").val(settings.star_rating_default_bg_color)
                jQuery("#forminix_settings_field_star_rating_checked_bg_color").val(settings.star_rating_checked_bg_color)
                jQuery("#forminix_settings_field_range_slider_track_color").val(settings.range_slider_track_color)
                jQuery("#forminix_settings_field_range_slider_thumb_color").val(settings.range_slider_thumb_color)

                /* Conditional Logic Settings */
                forminix_settings_logic_generate_html(settings.conditional_logic)

                /* Email Notification Settings */
                forminix_settings_email_generate_html(settings.email_notification)

                /* Integration Settings */
                forminix_settings_integration_generate_html(host, settings.integrations)

                jQuery(".forminix_settings_loader_container").hide()
                jQuery(".forminix_settings_main_area").show()


            }
        }
    })
}




function forminix_settings_save_data(host) {
    'use strict';

    jQuery(".forminix_settings_save_btn").text("Saving...")

    var post_data = {
        'action': 'forminix_update_settings',
        'form_id': forminix_current_form_id,
        /* Confirmation Settings */
        'confirmation_type': jQuery("#forminix_settings_field_confirmation_type").val(),
        'confirmation_msg': forminix_admin_esc_string(tinymce.get("forminix_settings_field_confirmation_msg").getContent()),
        'confirmation_form_status': jQuery("#forminix_settings_field_confirmation_form_status").val(),
        'confirmation_custom_url': jQuery("#forminix_settings_field_confirmation_custom_url").val(),

        /* Form Layout Settings */
        'help_message_position': jQuery("#forminix_settings_field_help_message_position").val(),
        'asterisk_position': jQuery("#forminix_settings_field_asterisk_position").val(),

        /* Form Scheduling & Restrictions Settings */
        'enable_form_scheduling': jQuery("#forminix_settings_field_enable_form_scheduling").val(),
        'form_scheduling_start_datetime': jQuery("#forminix_settings_field_form_scheduling_start_datetime").val(),
        'form_scheduling_end_datetime': jQuery("#forminix_settings_field_form_scheduling_end_datetime").val(),
        'form_scheduling_inactive_msg': forminix_admin_esc_string(jQuery("#forminix_settings_field_form_scheduling_inactive_msg").val()),
        'form_scheduling_expired_msg': forminix_admin_esc_string(jQuery("#forminix_settings_field_form_scheduling_expired_msg").val()),
        'form_scheduling_exclude_weekday_sat': (jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_sat:checked").length>0) ? "1" : "0",
        'form_scheduling_exclude_weekday_sun': (jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_sun:checked").length>0) ? "1" : "0",
        'form_scheduling_exclude_weekday_mon': (jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_mon:checked").length>0) ? "1" : "0",
        'form_scheduling_exclude_weekday_tue': (jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_tue:checked").length>0) ? "1" : "0",
        'form_scheduling_exclude_weekday_wed': (jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_wed:checked").length>0) ? "1" : "0",
        'form_scheduling_exclude_weekday_thu': (jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_thu:checked").length>0) ? "1" : "0",
        'form_scheduling_exclude_weekday_fri': (jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_fri:checked").length>0) ? "1" : "0",

        'allow_logged_in_only': jQuery("#forminix_settings_field_allow_logged_in_only").val(),
        'require_login_msg': forminix_admin_esc_string(jQuery("#forminix_settings_field_require_login_msg").val()),

        'enable_maximum_entry_limit': jQuery("#forminix_settings_field_enable_maximum_entry_limit").val(),
        'maximum_entry_amount': jQuery("#forminix_settings_field_maximum_entry_amount").val(),
        'maximum_entry_limitation_type': jQuery("#forminix_settings_field_maximum_entry_limitation_type").val(),
        'maximum_entry_limitation_msg': forminix_admin_esc_string(jQuery("#forminix_settings_field_maximum_entry_limitation_msg").val()),

        /* Field Customization Settings */
        'bg_color': jQuery("#forminix_settings_field_bg_color").val(),
        'bg_color_focus': jQuery("#forminix_settings_field_bg_color_focus").val(),
        'border_color': jQuery("#forminix_settings_field_border_color").val(),
        'border_color_focus': jQuery("#forminix_settings_field_border_color_focus").val(),
        'text_color': jQuery("#forminix_settings_field_text_color").val(),
        'text_color_focus': jQuery("#forminix_settings_field_text_color_focus").val(),
        'radio_checked_bg_color': jQuery("#forminix_settings_field_radio_checked_bg_color").val(),
        'label_color': jQuery("#forminix_settings_field_label_color").val(),
        'padding_top_bottom': jQuery("#forminix_settings_field_padding_top_bottom").val(),
        'padding_left_right': jQuery("#forminix_settings_field_padding_left_right").val(),
        'text_size': jQuery("#forminix_settings_field_text_size").val(),
        'label_text_size': jQuery("#forminix_settings_field_label_text_size").val(),
        'help_msg_tooltip_bg_color': jQuery("#forminix_settings_field_help_msg_tooltip_bg_color").val(),
        'help_msg_tooltip_text_color': jQuery("#forminix_settings_field_help_msg_tooltip_text_color").val(),
        'help_msg_text_color': jQuery("#forminix_settings_field_help_msg_text_color").val(),
        'help_msg_text_size': jQuery("#forminix_settings_field_help_msg_text_size").val(),
        'star_rating_default_bg_color': jQuery("#forminix_settings_field_star_rating_default_bg_color").val(),
        'star_rating_checked_bg_color': jQuery("#forminix_settings_field_star_rating_checked_bg_color").val(),
        'range_slider_track_color': jQuery("#forminix_settings_field_range_slider_track_color").val(),
        'range_slider_thumb_color': jQuery("#forminix_settings_field_range_slider_thumb_color").val(),

        'conditional_logic': JSON.stringify(forminix_settings_logic_generate_json()),
        'email_notification': JSON.stringify(forminix_settings_email_generate_json()),
        'integrations': JSON.stringify(forminix_settings_integration_generate_json()),
    };


    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if(obj.status === "true"){


                jQuery(".forminix_settings_save_btn").text("Saved!")
                setTimeout(function() {
                    jQuery(".forminix_settings_save_btn").text("Save Settings")
                }, 1500);

            }
        }
    })
}




function forminix_settings_tab_init(){
    'use strict';

    jQuery(".forminix_settings_tab_body").hide();
    jQuery(".forminix_settings_tab_body[data-id='tab_general']").show();
    jQuery( ".forminix_settings_tab_menu_item").removeClass('active');
    jQuery( ".forminix_settings_tab_menu_item[data-tab='tab_general']").addClass('active');

    jQuery( ".forminix_settings_tab_menu_item").unbind( "click" );
    jQuery( ".forminix_settings_tab_menu_item" ).bind( "click", function() {

        jQuery( ".forminix_settings_tab_menu_item").removeClass('active');
        jQuery(this).addClass('active');

        jQuery(".forminix_settings_tab_body").hide();
        jQuery(".forminix_settings_tab_body[data-id='"+jQuery(this).data('tab')+"']").show();
    });

}


function forminix_settings_on_changes(){
    'use strict';

    jQuery( "#forminix_settings_field_confirmation_type").unbind("change").bind("change", function() {
        if(jQuery( "#forminix_settings_field_confirmation_type").val() === "same_page"){
            jQuery("#forminix_settings_field_confirmation_msg").parent().show()
            jQuery("#forminix_settings_field_confirmation_form_status").parent().show()
            jQuery("#forminix_settings_field_confirmation_custom_url").parent().hide()
        }else if(jQuery( "#forminix_settings_field_confirmation_type").val() === "custom_url"){
            jQuery("#forminix_settings_field_confirmation_msg").parent().hide()
            jQuery("#forminix_settings_field_confirmation_form_status").parent().hide()
            jQuery("#forminix_settings_field_confirmation_custom_url").parent().show()
        }
    });


    jQuery( "#forminix_settings_field_help_message_position").unbind("change").bind("change", function() {
        if(jQuery( "#forminix_settings_field_help_message_position").val() === "beside_label"){
            jQuery("#forminix_settings_field_help_msg_tooltip_bg_color").parent().parent().parent().parent().show()
            jQuery("#forminix_settings_field_help_msg_text_color").parent().parent().parent().parent().hide()
        }else if(jQuery( "#forminix_settings_field_help_message_position").val() === "below_field"){
            jQuery("#forminix_settings_field_help_msg_tooltip_bg_color").parent().parent().parent().parent().hide()
            jQuery("#forminix_settings_field_help_msg_text_color").parent().parent().parent().parent().show()
        }
    });


    jQuery( "#forminix_settings_field_enable_form_scheduling").unbind("change").bind("change", function() {
        if(jQuery( "#forminix_settings_field_enable_form_scheduling").val() === "1"){
            jQuery("#forminix_settings_field_form_scheduling_start_datetime").parent().parent().parent().parent().show()
        }else if(jQuery( "#forminix_settings_field_enable_form_scheduling").val() === "0"){
            jQuery("#forminix_settings_field_form_scheduling_start_datetime").parent().parent().parent().parent().hide()
        }
    });

    jQuery( "#forminix_settings_field_allow_logged_in_only").unbind("change").bind("change", function() {
        if(jQuery( "#forminix_settings_field_allow_logged_in_only").val() === "1"){
            jQuery("#forminix_settings_field_require_login_msg").parent().show()
        }else if(jQuery( "#forminix_settings_field_allow_logged_in_only").val() === "0"){
            jQuery("#forminix_settings_field_require_login_msg").parent().hide()
        }
    });

    jQuery( "#forminix_settings_field_enable_maximum_entry_limit").unbind("change").bind("change", function() {
        if(jQuery( "#forminix_settings_field_enable_maximum_entry_limit").val() === "1"){
            jQuery("#forminix_settings_field_maximum_entry_amount").parent().parent().parent().parent().show()
        }else if(jQuery( "#forminix_settings_field_enable_maximum_entry_limit").val() === "0"){
            jQuery("#forminix_settings_field_maximum_entry_amount").parent().parent().parent().parent().hide()
        }
    });
}


function forminix_settings_restore_defaults(host){
    'use strict';

    var comfirm_msg = "Are you sure to restore the default settings?";
    if (confirm(comfirm_msg) === true) {
        /* Confirmation Settings */
        jQuery("#forminix_settings_field_confirmation_type").val("same_page").trigger("change")
        tinymce.get("forminix_settings_field_confirmation_msg").setContent("Thank you for your message. We will get in touch with you shortly.")
        jQuery("#forminix_settings_field_confirmation_form_status").val("hide_form")
        jQuery("#forminix_settings_field_confirmation_custom_url").val("hide_form")

        /* Form Layout Settings */
        jQuery("#forminix_settings_field_help_message_position").val("beside_label").trigger("change")
        jQuery("#forminix_settings_field_asterisk_position").val("none")

        /* Form Scheduling & Restrictions Settings */
        jQuery("#forminix_settings_field_enable_form_scheduling").val("0").trigger("change")
        jQuery("#forminix_settings_field_form_scheduling_start_datetime").val("")
        jQuery("#forminix_settings_field_form_scheduling_end_datetime").val("")
        jQuery("#forminix_settings_field_form_scheduling_inactive_msg").val("Submission to this form has not started yet.")
        jQuery("#forminix_settings_field_form_scheduling_expired_msg").val("Submission to this form has expired.")
        jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_sat").prop( "checked", false );
        jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_sun").prop( "checked", false );
        jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_mon").prop( "checked", false );
        jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_tue").prop( "checked", false );
        jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_wed").prop( "checked", false );
        jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_thu").prop( "checked", false );
        jQuery(".forminix_settings_field_form_scheduling_exclude_weekday_fri").prop( "checked", false );

        jQuery("#forminix_settings_field_allow_logged_in_only").val("0").trigger("change")
        jQuery("#forminix_settings_field_require_login_msg").val("You must be logged in to submit the form.")

        jQuery("#forminix_settings_field_enable_maximum_entry_limit").val("0").trigger("change")
        jQuery("#forminix_settings_field_maximum_entry_amount").val("0")
        jQuery("#forminix_settings_field_maximum_entry_limitation_type").val("total_entries")
        jQuery("#forminix_settings_field_maximum_entry_limitation_msg").val("Maximum number of entries exceeded.")

        /* Field Customization Settings */
        jQuery("#forminix_settings_field_bg_color").val("#F6F8FA")
        jQuery("#forminix_settings_field_bg_color_focus").val("#FFFFFF")
        jQuery("#forminix_settings_field_border_color").val("#E4E4E6")
        jQuery("#forminix_settings_field_border_color_focus").val("#d9d9db")
        jQuery("#forminix_settings_field_text_color").val("#43454b")
        jQuery("#forminix_settings_field_text_color_focus").val("#43454b")
        jQuery("#forminix_settings_field_radio_checked_bg_color").val("#787B83")
        jQuery("#forminix_settings_field_label_color").val("#2B2A2D")
        jQuery("#forminix_settings_field_padding_top_bottom").val("6")
        jQuery("#forminix_settings_field_padding_left_right").val("12")
        jQuery("#forminix_settings_field_text_size").val("14")
        jQuery("#forminix_settings_field_label_text_size").val("16")
        jQuery("#forminix_settings_field_help_msg_tooltip_bg_color").val("#2B2A2D")
        jQuery("#forminix_settings_field_help_msg_tooltip_text_color").val("#ffffff")
        jQuery("#forminix_settings_field_help_msg_text_color").val("#8a8a8a")
        jQuery("#forminix_settings_field_help_msg_text_size").val("13")
        jQuery("#forminix_settings_field_star_rating_default_bg_color").val("#c8c8c8")
        jQuery("#forminix_settings_field_star_rating_checked_bg_color").val("#ffc107")
        jQuery("#forminix_settings_field_range_slider_track_color").val("#dadae5")
        jQuery("#forminix_settings_field_range_slider_thumb_color").val("#3264fe")
    }
}



function forminix_settings_delete_form(host){
    'use strict';

    var comfirm_msg = "Are you sure to delete the entire form as well as all the entries recorded?";
    if (confirm(comfirm_msg) === true) {
        var post_data = {
            'action': 'forminix_delete_form',
            'form_id': forminix_current_form_id
        };
        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: post_data,
            success: function (data) {
                var obj = JSON.parse(data);

                if(obj.status == "true"){
                    forminix_forms_init(host)
                }
            }
        })
    }
}


function forminix_settings_copy_shortcode(){
    'use strict';
    var temp = jQuery("<input>");
    jQuery("body").append(temp);
    temp.val(jQuery(".forminix_settings_copy_shortcode").text()).select();
    document.execCommand("copy");
    temp.remove();
    alert("Shortcode Copied to Clipboard")
}



function forminix_settings_export_form(host){
    'use strict';
    forminix_show_pro_popup("", "");
}


function forminix_settings_confirmation_msg_or_url_shortcode_popup_show(view, unique_tinymce_id) {
    'use strict';

    var form_fields = JSON.parse(forminix_settings_form_field_data);

    jQuery(".forminix_settings_shortcode_popup_items").empty();
    for (var i = 0; i < form_fields.length; i++) {
        var htmlDiv = "<div class=\"forminix_settings_shortcode_popup_item\">\n" +
            "           <span class=\"field_name\">"+form_fields[i].field_label+"</span>\n" +
            "           <span class=\"field_id\">{field_"+form_fields[i].field_id+"}</span>\n" +
            "       </div>";
        jQuery(".forminix_settings_shortcode_popup_items").append(htmlDiv);
    }

    /*Predefined Shortcodes*/
    var predefinedDiv = "<div class=\"forminix_settings_shortcode_popup_item\">\n" +
        "               <span class=\"field_name\">Source URL</span>\n" +
        "               <span class=\"field_id\">{source_url}</span>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_shortcode_popup_item\">\n" +
        "               <span class=\"field_name\">User Agent</span>\n" +
        "               <span class=\"field_id\">{user_agent}</span>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_shortcode_popup_item\">\n" +
        "               <span class=\"field_name\">User IP</span>\n" +
        "               <span class=\"field_id\">{user_ip}</span>\n" +
        "           </div>";
    jQuery(".forminix_settings_shortcode_popup_items").append(predefinedDiv);


    jQuery( ".forminix_settings_shortcode_popup_item").unbind( "click" );
    jQuery( ".forminix_settings_shortcode_popup_item" ).bind( "click", function() {
        var shortCode = jQuery(this).find("span.field_id").text()
        if(unique_tinymce_id === ""){
            var textarea = jQuery(view).parent().parent().find('input').eq(0)
            var caretPos = textarea[0].selectionStart;
            var textAreaTxt = textarea.val();
            var txtToAdd = shortCode;
            textarea.val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
        }else{
            tinymce.get(unique_tinymce_id).execCommand('mceInsertContent', false, " "+shortCode+" ");
        }
        forminix_settings_shortcode_popup_close();
    });

    jQuery(".forminix_settings_shortcode_popup_container").css("display", "flex");
}

function forminix_settings_shortcode_popup_close() {
    'use strict';
    jQuery(".forminix_settings_shortcode_popup_container").css("display", "none");
}