function forminix_settings_integration_popup_show() {
    'use strict';
    jQuery(".forminix_settings_integration_popup_container").css("display", "flex");
}


function forminix_settings_integration_popup_close() {
    'use strict';
    jQuery(".forminix_settings_integration_popup_container").css("display", "none");
}


function forminix_settings_integration_check_empty(){
    'use strict';

    var total_integration_item = 0
    jQuery(".forminix_settings_integration_single_item").each(function (i, object) {
        total_integration_item = total_integration_item + 1
    })

    if(total_integration_item > 0){
        jQuery(".forminix_settings_integration_main_area").show()
        jQuery(".forminix_settings_integration_empty").hide()
    }else{
        jQuery(".forminix_settings_integration_main_area").hide()
        jQuery(".forminix_settings_integration_empty").show()
    }
}


function forminix_settings_integration_remove(view) {
    'use strict';
    jQuery(view).parent().parent().parent().remove()
    forminix_settings_integration_check_empty();
}

function forminix_settings_integration_minimize(view) {
    'use strict';
    jQuery(view).parent().parent().parent().removeClass("forminix_settings_integration_single_item_maximized")
}

function forminix_settings_integration_maximize(view) {
    'use strict';
    jQuery(".forminix_settings_integration_single_item").removeClass("forminix_settings_integration_single_item_maximized")
    jQuery(view).parent().parent().parent().addClass("forminix_settings_integration_single_item_maximized")
}



function forminix_settings_integration_generate_json(){
    'use strict';
    var forminix_integrations = []
    jQuery(".forminix_settings_integration_single_item").each(function (i, object) {
        var integration_type = jQuery(object).attr("data-integration")
        switch(integration_type) {
            case "mailchimp":
                if (typeof forminix_integration_mailchimp_generate_json !== "undefined") {
                    var mailchimp_json = forminix_integration_mailchimp_generate_json(object)
                    if(mailchimp_json != null){
                        var forminix_single_integration = {}
                        forminix_single_integration["integration_type"] = "mailchimp"
                        forminix_single_integration["integration_data"] = mailchimp_json
                        forminix_integrations.push(forminix_single_integration)
                    }
                }
                break;
            case "slack":
                if (typeof forminix_integration_slack_generate_json !== "undefined") {
                    var slack_json = forminix_integration_slack_generate_json(object)
                    if(slack_json != null){
                        var forminix_single_integration = {}
                        forminix_single_integration["integration_type"] = "slack"
                        forminix_single_integration["integration_data"] = slack_json
                        forminix_integrations.push(forminix_single_integration)
                    }
                }
                break;
        }
    })
    return forminix_integrations;
}



function forminix_settings_integration_generate_html(host, integration_str){
    'use strict';
    var integrations = JSON.parse(integration_str);
    jQuery(integrations).each(function (i, single_integration) {
        switch(single_integration.integration_type) {
            case "mailchimp":
                if (typeof forminix_integration_mailchimp_generate_html !== "undefined") {
                    forminix_integration_mailchimp_generate_html(host, single_integration.integration_data)
                }
                break;
            case "slack":
                if (typeof forminix_integration_slack_generate_html !== "undefined") {
                    forminix_integration_slack_generate_html(host, single_integration.integration_data)
                }
                break;
        }
    })
}




/* ==================================
Conditional Logic on Each Integration
==================================== */

function forminix_settings_integration_show_or_hide_conditional_logic(view) {
    'use strict';
    if(jQuery(view).parent().find("input[type='checkbox']:checked").length > 0) {
        jQuery(view).parent().parent().parent().parent().find(".forminix_settings_integration_conditional_logic").show()
    } else {
        jQuery(view).parent().parent().parent().parent().find(".forminix_settings_integration_conditional_logic").hide()
    }
}

function forminix_settings_integration_logic_generate_html(logics_str) {
    'use strict';
    var html = "";
    if (typeof logics_str !== "undefined") {
        if(logics_str.trim().length > 0){
            var logics = JSON.parse(logics_str);
            jQuery(logics).each(function (i, single_logic) {
                if(i === 0){
                    html += forminix_settings_integration_generate_conditional_logic_add(
                        single_logic.if,
                        single_logic.condition,
                        forminix_admin_unesc_string(single_logic.value)
                    )
                }else{
                    html += forminix_settings_integration_conditional_logic_add_sub_rule(
                        single_logic.matching_type,
                        single_logic.if,
                        single_logic.condition,
                        forminix_admin_unesc_string(single_logic.value)
                    )
                }
            })
        }
    }
    if(html === ""){
        html += forminix_settings_integration_generate_conditional_logic_add("", "", "")
    }
    return html;
}

function forminix_settings_integration_generate_conditional_logic_add(condition_field, condition, value) {
    'use strict';

    var form_fields = JSON.parse(forminix_settings_form_field_data);
    var form_fields_opt = "";
    for (var i = 0; i < form_fields.length; i++) {
        form_fields_opt += "<option value=\""+form_fields[i].field_id+"\" "+(condition_field === form_fields[i].field_id ? "selected" : "")+">"+forminix_admin_unesc_string(form_fields[i].field_label)+"</option>"
    }

    var html = "<div class=\"forminix_settings_integration_conditional_logic_item\">\n" +
        "           <div class=\"forminix_settings_integration_conditional_logic_item_part_1\">\n" +
        "               <div class=\"forminix_settings_single_form_element forminix_settings_integration_conditional_logic_if\">\n" +
        "                   <label>IF</label>\n" +
        "                   <select>"+form_fields_opt+"</select>\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_integration_conditional_logic_item_part_2\">\n" +
        "               <div class=\"forminix_settings_single_form_element forminix_settings_integration_conditional_logic_condition\">\n" +
        "                   <label>Condition</label>\n" +
        "                   <select>\n" +
        "                       <option "+(condition === "equal" ? "selected" : "")+" value=\"equal\">Equal</option>\n" +
        "                       <option "+(condition === "not_equal" ? "selected" : "")+" value=\"not_equal\">Not Equal</option>\n" +
        "                       <option "+(condition === "greater_than" ? "selected" : "")+" value=\"greater_than\">Greater Than</option>\n" +
        "                       <option "+(condition === "less_than" ? "selected" : "")+" value=\"less_than\">Less Than</option>\n" +
        "                       <option "+(condition === "starts_with" ? "selected" : "")+" value=\"starts_with\">Starts With</option>\n" +
        "                       <option "+(condition === "ends_with" ? "selected" : "")+" value=\"ends_with\">Ends With</option>\n" +
        "                       <option "+(condition === "contains" ? "selected" : "")+" value=\"contains\">Contains</option>\n" +
        "                       <option "+(condition === "not_contains" ? "selected" : "")+" value=\"not_contains\">Not Contains</option>\n" +
        "                       <option "+(condition === "length_greater_than" ? "selected" : "")+" value=\"length_greater_than\">Length Greater Than</option>\n" +
        "                       <option "+(condition === "length_less_than" ? "selected" : "")+" value=\"length_less_than\">Length Less Than</option>\n" +
        "                       <option "+(condition === "filesize_greater_than" ? "selected" : "")+" value=\"filesize_greater_than\">Filesize Greater Than (Kb)</option>\n" +
        "                       <option "+(condition === "filesize_less_than" ? "selected" : "")+" value=\"filesize_less_than\">Filesize Less Than (Kb)</option>\n" +
        "                   </select>\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_integration_conditional_logic_item_part_3\">\n" +
        "               <div class=\"forminix_settings_single_form_element forminix_settings_integration_conditional_logic_value\">\n" +
        "                   <label>Value</label>\n" +
        "                   <input type=\"text\" value=\""+value+"\">\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_integration_conditional_logic_item_part_4\">\n" +
        "               <button class=\"add_rule\" onclick=\"forminix_settings_integration_conditional_logic_add_more(this)\"></button>\n" +
        "           </div>\n" +
        "       </div>"

    return html;
}

function forminix_settings_integration_conditional_logic_add_sub_rule(matching_type, condition_field, condition, value) {
    'use strict';

    var form_fields = JSON.parse(forminix_settings_form_field_data);
    var form_fields_opt = "";
    for (var i = 0; i < form_fields.length; i++) {
        form_fields_opt += "<option value=\""+form_fields[i].field_id+"\" "+(condition_field === form_fields[i].field_id ? "selected" : "")+">"+forminix_admin_unesc_string(form_fields[i].field_label)+"</option>"
    }

    var html = "<div class=\"forminix_settings_integration_conditional_logic_item\">\n" +
        "           <div class=\"forminix_settings_integration_conditional_logic_item_part_0\">\n" +
        "               <div class=\"forminix_settings_single_form_element\">\n" +
        "                   <select class=\"forminix_settings_integration_conditional_logic_or_and_select\" onchange=\"forminix_settings_integration_conditional_logic_and_or_select_change(this)\">\n" +
        "                       <option "+(matching_type === "or" ? "selected" : "")+" value=\"or\">OR</option>\n" +
        "                       <option "+(matching_type === "and" ? "selected" : "")+" value=\"and\">AND</option>\n" +
        "                   </select>\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_integration_conditional_logic_item_part_1\">\n" +
        "               <div class=\"forminix_settings_single_form_element forminix_settings_integration_conditional_logic_if\">\n" +
        "                   <select>"+form_fields_opt+"</select>\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_integration_conditional_logic_item_part_2\">\n" +
        "               <div class=\"forminix_settings_single_form_element forminix_settings_integration_conditional_logic_condition\">\n" +
        "                   <select>\n" +
        "                       <option "+(condition === "equal" ? "selected" : "")+" value=\"equal\">Equal</option>\n" +
        "                       <option "+(condition === "not_equal" ? "selected" : "")+" value=\"not_equal\">Not Equal</option>\n" +
        "                       <option "+(condition === "greater_than" ? "selected" : "")+" value=\"greater_than\">Greater Than</option>\n" +
        "                       <option "+(condition === "less_than" ? "selected" : "")+" value=\"less_than\">Less Than</option>\n" +
        "                       <option "+(condition === "starts_with" ? "selected" : "")+" value=\"starts_with\">Starts With</option>\n" +
        "                       <option "+(condition === "ends_with" ? "selected" : "")+" value=\"ends_with\">Ends With</option>\n" +
        "                       <option "+(condition === "contains" ? "selected" : "")+" value=\"contains\">Contains</option>\n" +
        "                       <option "+(condition === "not_contains" ? "selected" : "")+" value=\"not_contains\">Not Contains</option>\n" +
        "                       <option "+(condition === "length_greater_than" ? "selected" : "")+" value=\"length_greater_than\">Length Greater Than</option>\n" +
        "                       <option "+(condition === "length_less_than" ? "selected" : "")+" value=\"length_less_than\">Length Less Than</option>\n" +
        "                       <option "+(condition === "filesize_greater_than" ? "selected" : "")+" value=\"filesize_greater_than\">Filesize Greater Than (Kb)</option>\n" +
        "                       <option "+(condition === "filesize_less_than" ? "selected" : "")+" value=\"filesize_less_than\">Filesize Less Than (Kb)</option>\n" +
        "                   </select>\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_integration_conditional_logic_item_part_3\">\n" +
        "               <div class=\"forminix_settings_single_form_element forminix_settings_integration_conditional_logic_value\">\n" +
        "                   <input type=\"text\" value=\""+value+"\">\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_integration_conditional_logic_item_part_4\">\n" +
        "               <button class=\"remove_rule\" onclick=\"forminix_settings_integration_conditional_logic_remove(this)\"></button>\n" +
        "           </div>\n" +
        "       </div>"

    return html;
}

function forminix_settings_integration_conditional_logic_add_more(view) {
    'use strict';
    jQuery(view).parent().parent().parent().append(
        forminix_settings_integration_conditional_logic_add_sub_rule("", "", "", "")
    )
}

function forminix_settings_integration_conditional_logic_remove(view) {
    'use strict';
    jQuery(view).parent().parent().remove()
}

function forminix_settings_integration_conditional_logic_and_or_select_change(view) {
    'use strict';
    jQuery(view).parent().parent().parent().parent().find(".forminix_settings_integration_conditional_logic_or_and_select").val(jQuery(view).val())
}

function forminix_settings_integration_conditional_logic_generate_json(object) {
    'use strict';
    var forminix_settings_integration_conditional_data = []
    jQuery(object).find(".forminix_settings_integration_conditional_logic_item").each(function (x, condition_view) {
        var forminix_logic_single_data = {}
        forminix_logic_single_data["matching_type"] = jQuery(condition_view).find("select.forminix_settings_integration_conditional_logic_or_and_select").val()
        forminix_logic_single_data["matching_type"] = (forminix_logic_single_data["matching_type"] === undefined) ? "or" : forminix_logic_single_data["matching_type"]
        forminix_logic_single_data["if"] = jQuery(condition_view).find(".forminix_settings_integration_conditional_logic_if select").val()
        forminix_logic_single_data["condition"] = jQuery(condition_view).find(".forminix_settings_integration_conditional_logic_condition select").val()
        forminix_logic_single_data["value"] = forminix_admin_esc_string(jQuery(condition_view).find(".forminix_settings_integration_conditional_logic_value input").val())
        forminix_settings_integration_conditional_data.push(forminix_logic_single_data)
    })
    return forminix_settings_integration_conditional_data;
}