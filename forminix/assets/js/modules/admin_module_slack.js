
/* ===================
    Slack Scripts
=================== */

function forminix_integration_slack_add(host, existing_data) {
    'use strict';
    forminix_settings_integration_popup_close();

    jQuery(".forminix_settings_integration_single_item").removeClass("forminix_settings_integration_single_item_maximized")

    /* Process existing data */
    var integration_title = "Slack Notification";
    var webhook_url = "";
    var msg_body = "You have received a new form entry at your form.";
    var enable_conditional_logic = "0"
    var conditional_logic_data = ""
    if(existing_data.trim().length > 0){
        var single_slack_data = JSON.parse(existing_data);
        integration_title = single_slack_data.integration_title
        webhook_url = single_slack_data.webhook_url
        msg_body = single_slack_data.msg_body
        enable_conditional_logic = single_slack_data.enable_conditional_logic
        conditional_logic_data = JSON.stringify(single_slack_data.conditional_logic_data)
    }
    var integration = "<div data-integration=\"slack\" class=\"forminix_settings_integration_single_item forminix_settings_integration_single_item_maximized\">\n" +
        "                  <div class=\"forminix_settings_integration_single_item_intro\">\n" +
        "                      <h2 contenteditable=\"true\">"+integration_title+"</h2>\n" +
        "                      <div class=\"forminix_settings_integration_single_item_actions\">\n" +
        "                          <button class=\"forminix_settings_integration_single_item_minimize\" onclick=\"forminix_settings_integration_minimize(this)\"></button>\n" +
        "                          <button class=\"forminix_settings_integration_single_item_maximize\" onclick=\"forminix_settings_integration_maximize(this)\"></button>\n" +
        "                          <button class=\"forminix_settings_integration_single_item_delete\" onclick=\"forminix_settings_integration_remove(this)\">Delete</button>\n" +
        "                      </div>\n" +
        "                  </div>\n" +
        "                  <div class=\"forminix_settings_integration_single_item_content\">\n" +
        "                       <div class=\"forminix_settings_single_form_element forminix_slack_webhook_url\">\n" +
        "                           <label>Webhook URL</label>\n" +
        "                           <input type=\"text\" value=\""+webhook_url+"\">\n" +
        "                       </div>\n" +
        "                       <div class=\"forminix_settings_single_form_element forminix_slack_msg_body\">\n" +
        "                           <div class=\"forminix_settings_single_form_element_label_action_container\">\n" +
        "                              <label>Notification Message</label>\n" +
        "                              <button class=\"forminix_settings_open_shortcode_popup_btn\" onclick=\"forminix_forminix_integration_slack_shortcode_popup_show(this)\">Add Shortcode</button>\n" +
        "                           </div>\n" +
        "                           <textarea rows=\"4\">"+msg_body+"</textarea>\n" +
        "                       </div>\n" +
        "                       <div class=\"forminix_settings_single_form_element forminix_settings_integration_enable_conditional_logic\">\n" +
        "                           <div class=\"checkbox_container left\">\n" +
        "                               <label class=\"checkbox_item\">Enable Conditional Logic<input type=\"checkbox\" onchange=\"forminix_settings_integration_show_or_hide_conditional_logic(this)\" "+(enable_conditional_logic === "1" ? "checked" : "")+"><span class=\"checkmark\"></span></label>\n" +
        "                           </div>\n" +
        "                       </div>\n" +
        "                       <div class=\"forminix_settings_integration_conditional_logic\" "+(enable_conditional_logic === "0" ? "style=\"display:none;\"" : "")+">"+forminix_settings_integration_logic_generate_html(conditional_logic_data)+"</div>\n" +
        "                  </div>\n" +
        "              </div>"

    jQuery(".forminix_settings_integration_container").append(integration)
    forminix_settings_integration_check_empty();
}


function forminix_forminix_integration_slack_shortcode_popup_show(view) {
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
        var textarea = jQuery(view).parent().parent().find('textarea').eq(0)
        var caretPos = textarea[0].selectionStart;
        var textAreaTxt = textarea.val();
        var txtToAdd = shortCode;
        textarea.val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
        forminix_settings_shortcode_popup_close();
    });

    jQuery(".forminix_settings_shortcode_popup_container").css("display", "flex");
}


function forminix_integration_slack_generate_html(host, json_object) {
    'use strict';
    forminix_integration_slack_add(host, JSON.stringify(json_object))
}


function forminix_integration_slack_generate_json(object) {
    'use strict';
    /* Checks for Incomplete Slack Integration */
    var is_webhook_url = false

    var forminix_slack_single_item = {}
    var integration_title = jQuery(object).find("h2").text()
    var webhook_url = jQuery(object).find(".forminix_slack_webhook_url input").val()
    var msg_body = jQuery(object).find(".forminix_slack_msg_body textarea").val()

    if(webhook_url.trim().length > 0){
        is_webhook_url = true
    }

    if(is_webhook_url){
        forminix_slack_single_item["integration_title"] = integration_title
        forminix_slack_single_item["webhook_url"] = webhook_url
        forminix_slack_single_item["msg_body"] = msg_body

        if(jQuery(object).find(".forminix_settings_integration_enable_conditional_logic input[type='checkbox']:checked").length > 0){
            forminix_slack_single_item["enable_conditional_logic"] = "1"
            forminix_slack_single_item["conditional_logic_data"] = forminix_settings_integration_conditional_logic_generate_json(object)
        }else{
            forminix_slack_single_item["enable_conditional_logic"] = "0"
            forminix_slack_single_item["conditional_logic_data"] = []
        }

        return forminix_slack_single_item;
    }else{
        alert("You have an incomplete Slack Integration.")
        return null;
    }
}