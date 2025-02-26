
/* ==================
 Email Notification
================== */


function forminix_settings_email_check_empty(){
    'use strict';

    var total_email_item = 0
    jQuery(".forminix_settings_email_single_item").each(function (i, object) {
        total_email_item = total_email_item + 1
    })

    if(total_email_item > 0){
        jQuery(".forminix_settings_email_main_area").show()
        jQuery(".forminix_settings_email_empty").hide()
    }else{
        jQuery(".forminix_settings_email_main_area").hide()
        jQuery(".forminix_settings_email_empty").show()
    }
}

function forminix_settings_email_remove(view) {
    'use strict';
    jQuery(view).parent().parent().parent().remove()
    forminix_settings_email_check_empty();
}

function forminix_settings_email_minimize(view) {
    'use strict';
    jQuery(view).parent().parent().parent().removeClass("forminix_settings_email_single_item_maximized")
}

function forminix_settings_email_maximize(view) {
    'use strict';
    jQuery(".forminix_settings_email_single_item").removeClass("forminix_settings_email_single_item_maximized")
    jQuery(view).parent().parent().parent().addClass("forminix_settings_email_single_item_maximized")
}
function forminix_settings_email_send_to_change(view) {
    'use strict';
    var send_to = jQuery(view).val();
    if(send_to === "custom_email"){
        jQuery(view).parent().parent().parent().find(".forminix_settings_email_custom_email").show()
        jQuery(view).parent().parent().parent().find(".forminix_settings_email_email_field").hide()
    }else{
        jQuery(view).parent().parent().parent().find(".forminix_settings_email_custom_email").hide()
        jQuery(view).parent().parent().parent().find(".forminix_settings_email_email_field").show()
    }
}
function forminix_settings_email_body_format_change(view) {
    'use strict';
    if(jQuery(view).parent().find("input[type='checkbox']:checked").length > 0) {
        jQuery(view).parent().parent().parent().parent().find(".forminix_settings_email_raw").show()
        jQuery(view).parent().parent().parent().parent().find(".forminix_settings_email_html").hide()
    } else {
        jQuery(view).parent().parent().parent().parent().find(".forminix_settings_email_raw").hide()
        jQuery(view).parent().parent().parent().parent().find(".forminix_settings_email_html").show()
    }
}


function forminix_settings_email_generate_unique_tinymce_id(){
    'use strict';
    var forminix_settings_email_unique_tinymce_id = []
    jQuery(".forminix_settings_email_single_item .forminix_settings_single_form_element.forminix_settings_email_html").each(function (i, object) {
        forminix_settings_email_unique_tinymce_id.push(jQuery(object).find("textarea").attr("id"))
    });
    var id = Math.random().toString(36).substr(2, 9);
    while(jQuery.inArray(id, forminix_settings_email_unique_tinymce_id) !== -1) {
        id = Math.random().toString(36).substr(2, 9);
    }
    forminix_settings_email_unique_tinymce_id.push(id);
    return id;
}



function forminix_settings_email_add(existing_data) {
    'use strict';

    var notification_title = "Untitled Notification"
    var send_to = "custom_email"
    var custom_email = ""
    var email_field = ""
    var from_name = ""
    var from_email = ""
    var reply_to = ""
    var cc = ""
    var subject = ""
    var email_body = ""
    var email_body_format = "body_format_html"
    var enable_conditional_logic = "0"
    var conditional_logic_data = ""

    if(existing_data.trim().length > 0){
        var single_email_data = JSON.parse(existing_data);
        notification_title = forminix_admin_unesc_string(single_email_data.notification_title)
        send_to = single_email_data.send_to
        custom_email = single_email_data.custom_email
        email_field = single_email_data.email_field
        from_name = forminix_admin_unesc_string(single_email_data.from_name)
        from_email = single_email_data.from_email
        reply_to = single_email_data.reply_to !== undefined ? single_email_data.reply_to : ""
        cc = single_email_data.cc !== undefined ? single_email_data.cc : ""
        subject = forminix_admin_unesc_string(single_email_data.subject)
        email_body = forminix_admin_unesc_string(single_email_data.email_body)
        email_body_format = single_email_data.email_body_format
        enable_conditional_logic = single_email_data.enable_conditional_logic
        conditional_logic_data = JSON.stringify(single_email_data.conditional_logic_data)
    }

    jQuery(".forminix_settings_email_single_item").removeClass("forminix_settings_email_single_item_maximized")

    var form_fields = JSON.parse(forminix_settings_form_field_data);
    var form_fields_opt = "";
    for (var i = 0; i < form_fields.length; i++) {
        form_fields_opt += "<option value=\""+form_fields[i].field_id+"\" "+(email_field === form_fields[i].field_id ? "selected" : "")+">"+forminix_admin_unesc_string(form_fields[i].field_label)+"</option>"
    }


    var unique_tinymce_id = forminix_settings_email_generate_unique_tinymce_id();
    var email = "<div class=\"forminix_settings_email_single_item forminix_settings_email_single_item_maximized\">\n" +
        "                                        <div class=\"forminix_settings_email_single_item_intro\">\n" +
        "                                            <h2 contenteditable=\"true\">"+notification_title+"</h2>\n" +
        "                                            <div class=\"forminix_settings_email_single_item_actions\">\n" +
        "                                                <button class=\"forminix_settings_email_single_item_minimize\" onclick=\"forminix_settings_email_minimize(this)\"></button>\n" +
        "                                                <button class=\"forminix_settings_email_single_item_maximize\" onclick=\"forminix_settings_email_maximize(this)\"></button>\n" +
        "                                                <button class=\"forminix_settings_email_single_item_delete\" onclick=\"forminix_settings_email_remove(this)\">Delete</button>\n" +
        "                                            </div>\n" +
        "                                        </div>\n" +
        "                                        <div class=\"forminix_settings_email_single_item_content\">\n" +
        "                                            <div class=\"forminix_settings_single_form_element_column_container\">\n" +
        "                                                <div class=\"forminix_settings_single_form_element_column\">\n" +
        "                                                    <div class=\"forminix_settings_single_form_element forminix_settings_email_send_to\">\n" +
        "                                                        <label>Send To</label>\n" +
        "                                                        <select onchange=\"forminix_settings_email_send_to_change(this)\">\n" +
        "                                                            <option value=\"custom_email\" "+(send_to === "custom_email" ? "selected" : "")+">Custom Email</option>\n" +
        "                                                            <option value=\"email_field\" "+(send_to === "email_field" ? "selected" : "")+">Email Field</option>\n" +
        "                                                        </select>\n" +
        "                                                    </div>\n" +
        "                                                </div>\n" +
        "                                                <div class=\"forminix_settings_single_form_element_column\">\n" +
        "                                                    <div class=\"forminix_settings_single_form_element forminix_settings_email_custom_email\" "+(send_to === "email_field" ? "style=\"display:none;\"" : "")+">\n" +
        "                                                        <label>Custom Email Address</label>\n" +
        "                                                        <input type=\"email\" value=\""+custom_email+"\"/>\n" +
        "                                                    </div>\n" +
        "                                                    <div class=\"forminix_settings_single_form_element forminix_settings_email_email_field\" "+(send_to === "custom_email" ? "style=\"display:none;\"" : "")+">\n" +
        "                                                        <label>Choose Email Field</label>\n" +
        "                                                        <select>\n" +
        "                                                            "+form_fields_opt+"\n" +
        "                                                        </select>\n" +
        "                                                    </div>\n" +
        "                                                </div>\n" +
        "                                            </div>\n" +
        "                                            <div class=\"forminix_settings_single_form_element_column_container\">\n" +
        "                                                <div class=\"forminix_settings_single_form_element_column\">\n" +
        "                                                    <div class=\"forminix_settings_single_form_element forminix_settings_email_from_name\">\n" +
        "                                                        <label>From Name (Optional)</label>\n" +
        "                                                        <input type=\"text\" value=\""+from_name+"\"/>\n" +
        "                                                        <p>Site Name will be used for Empty.</p>\n" +
        "                                                    </div>\n" +
        "                                                </div>\n" +
        "                                                <div class=\"forminix_settings_single_form_element_column\">\n" +
        "                                                    <div class=\"forminix_settings_single_form_element forminix_settings_email_from_email\">\n" +
        "                                                        <label>From Email (Optional)</label>\n" +
        "                                                        <input type=\"email\" value=\""+from_email+"\"/>\n" +
        "                                                        <p>Admin Email will be used for Empty.</p>\n" +
        "                                                    </div>\n" +
        "                                                </div>\n" +
        "                                            </div>\n" +
        "                                            <div class=\"forminix_settings_single_form_element_column_container\">\n" +
        "                                                <div class=\"forminix_settings_single_form_element_column\">\n" +
        "                                                    <div class=\"forminix_settings_single_form_element forminix_settings_email_reply_to\">\n" +
        "                                                        <label>Reply To Email (Optional)</label>\n" +
        "                                                        <input type=\"email\" value=\""+reply_to+"\"/>\n" +
        "                                                        <p>Default sender email will be used for Empty.</p>\n" +
        "                                                    </div>\n" +
        "                                                </div>\n" +
        "                                                <div class=\"forminix_settings_single_form_element_column\">\n" +
        "                                                    <div class=\"forminix_settings_single_form_element forminix_settings_email_cc\">\n" +
        "                                                        <label>CC (Optional)</label>\n" +
        "                                                        <input type=\"text\" value=\""+cc+"\"/>\n" +
        "                                                        <p>Enter a comma separated list of email addresses.</p>\n" +
        "                                                    </div>\n" +
        "                                                </div>\n" +
        "                                            </div>\n" +
        "                                            <div class=\"forminix_settings_single_form_element forminix_settings_email_subject\">\n" +
        "                                                <label>Subject</label>\n" +
        "                                                <input type=\"text\" value=\""+subject+"\"/>\n" +
        "                                            </div>\n" +
        "                                            <div class=\"forminix_settings_single_form_element forminix_settings_email_html\" "+(email_body_format === "body_format_raw" ? "style=\"display:none;\"" : "")+">\n" +
        "                                                <div class=\"forminix_settings_single_form_element_label_action_container\">\n" +
        "                                                   <label>Email Body</label>\n" +
        "                                                   <button class=\"forminix_settings_open_shortcode_popup_btn\" onclick=\"forminix_settings_email_shortcode_popup_show(this, `"+unique_tinymce_id+"`)\">Add Shortcode</button>\n" +
        "                                                </div>\n" +
        "                                                <textarea id=\""+unique_tinymce_id+"\" rows=\"4\">"+email_body+"</textarea>\n" +
        "                                            </div>\n" +
        "                                            <div class=\"forminix_settings_single_form_element forminix_settings_email_raw\" "+(email_body_format === "body_format_html" ? "style=\"display:none;\"" : "")+">\n" +
        "                                                <div class=\"forminix_settings_single_form_element_label_action_container\">\n" +
        "                                                   <label>Email Body</label>\n" +
        "                                                   <button class=\"forminix_settings_open_shortcode_popup_btn\" onclick=\"forminix_settings_email_shortcode_popup_show(this, ``)\">Add Shortcode</button>\n" +
        "                                                </div>\n" +
        "                                                <textarea rows=\"4\">"+email_body+"</textarea>\n" +
        "                                            </div>\n" +
        "                                            <div class=\"forminix_settings_single_form_element forminix_settings_email_body_format\">\n" +
        "                                                <div class=\"checkbox_container left\">\n" +
        "                                                    <label class=\"checkbox_item\">Send email as RAW HTML Format<input type=\"checkbox\" onchange=\"forminix_settings_email_body_format_change(this)\" "+(email_body_format === "body_format_raw" ? "checked" : "")+"><span class=\"checkmark\"></span></label>\n" +
        "                                                </div>\n" +
        "                                            </div>\n" +
        "                                            <div class=\"forminix_settings_single_form_element forminix_settings_enable_conditional_logic\">\n" +
        "                                                <div class=\"checkbox_container left\">\n" +
        "                                                    <label class=\"checkbox_item\">Enable Conditional Logic<input type=\"checkbox\" onchange=\"forminix_settings_email_show_or_hide_conditional_logic(this)\" "+(enable_conditional_logic === "1" ? "checked" : "")+"><span class=\"checkmark\"></span></label>\n" +
        "                                                </div>\n" +
        "                                            </div>\n" +
        "                                           <div class=\"forminix_settings_email_conditional_logic\" "+(enable_conditional_logic === "0" ? "style=\"display:none;\"" : "")+">"+forminix_settings_email_logic_generate_html(conditional_logic_data)+"</div>\n" +
        "                                        </div>\n" +
        "                                    </div>"

    jQuery(".forminix_settings_email_container").append(email)
    forminix_enable_tinymce(unique_tinymce_id)
    forminix_settings_email_check_empty();

}



function forminix_settings_email_generate_html(email_str) {
    'use strict';
    var emails = JSON.parse(email_str);
    jQuery(emails).each(function (i, single_email) {
        forminix_settings_email_add(JSON.stringify(single_email))
    })
}


function forminix_settings_email_generate_json() {
    'use strict';
    var forminix_emails = []

    jQuery(".forminix_settings_email_container .forminix_settings_email_single_item").each(function (i, object) {
        var forminix_email_single_item = {}
        forminix_email_single_item["notification_title"] = forminix_admin_esc_string(jQuery(object).find("h2").text())
        forminix_email_single_item["send_to"] = jQuery(object).find(".forminix_settings_email_send_to select").val()
        forminix_email_single_item["custom_email"] = jQuery(object).find(".forminix_settings_email_custom_email input").val()
        forminix_email_single_item["email_field"] = jQuery(object).find(".forminix_settings_email_email_field select").val()
        forminix_email_single_item["from_name"] = forminix_admin_esc_string(jQuery(object).find(".forminix_settings_email_from_name input").val())
        forminix_email_single_item["from_email"] = jQuery(object).find(".forminix_settings_email_from_email input").val()
        forminix_email_single_item["reply_to"] = jQuery(object).find(".forminix_settings_email_reply_to input").val()
        forminix_email_single_item["cc"] = jQuery(object).find(".forminix_settings_email_cc input").val()
        forminix_email_single_item["subject"] = forminix_admin_esc_string(jQuery(object).find(".forminix_settings_email_subject input").val())
        if(jQuery(object).find(".forminix_settings_email_body_format input[type='checkbox']:checked").length > 0){
            forminix_email_single_item["email_body_format"] = "body_format_raw"
            forminix_email_single_item["email_body"] = forminix_admin_esc_string(jQuery(object).find(".forminix_settings_email_raw textarea").val())
        }else{
            var unique_tinymce_id = jQuery(object).find(".forminix_settings_email_html textarea").attr("id")
            forminix_email_single_item["email_body_format"] = "body_format_html"
            forminix_email_single_item["email_body"] = forminix_admin_esc_string(tinymce.get(unique_tinymce_id).getContent())
        }


        if(jQuery(object).find(".forminix_settings_enable_conditional_logic input[type='checkbox']:checked").length > 0){
            forminix_email_single_item["enable_conditional_logic"] = "1"

            var forminix_settings_email_conditional_data = []
            jQuery(object).find(".forminix_settings_email_conditional_logic_item").each(function (x, condition_view) {
                var forminix_logic_single_data = {}
                forminix_logic_single_data["matching_type"] = jQuery(condition_view).find("select.forminix_settings_email_conditional_logic_or_and_select").val()
                forminix_logic_single_data["matching_type"] = (forminix_logic_single_data["matching_type"] === undefined) ? "or" : forminix_logic_single_data["matching_type"]
                forminix_logic_single_data["if"] = jQuery(condition_view).find(".forminix_settings_email_conditional_logic_if select").val()
                forminix_logic_single_data["condition"] = jQuery(condition_view).find(".forminix_settings_email_conditional_logic_condition select").val()
                forminix_logic_single_data["value"] = forminix_admin_esc_string(jQuery(condition_view).find(".forminix_settings_email_conditional_logic_value input").val())
                forminix_settings_email_conditional_data.push(forminix_logic_single_data)
            })

            forminix_email_single_item["conditional_logic_data"] = forminix_settings_email_conditional_data
        }else{
            forminix_email_single_item["enable_conditional_logic"] = "0"
            forminix_email_single_item["conditional_logic_data"] = []
        }

        forminix_emails.push(forminix_email_single_item)
    });
    return forminix_emails;
}



function forminix_settings_email_shortcode_popup_show(view, unique_tinymce_id) {
    'use strict';

    var form_fields = JSON.parse(forminix_settings_form_field_data);

    jQuery(".forminix_settings_shortcode_popup_items").empty();


    /*All Data Shortcodes*/
    var allDataDiv = "<div class=\"forminix_settings_shortcode_popup_item\">\n" +
        "                 <span class=\"field_name\">All Field Data</span>\n" +
        "                 <span class=\"field_id\">{all_data}</span>\n" +
        "             </div>";
    jQuery(".forminix_settings_shortcode_popup_items").append(allDataDiv);


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
            var textarea = jQuery(view).parent().parent().find('textarea').eq(0)
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





/* ======================
Email Conditional Logic
======================= */

function forminix_settings_email_show_or_hide_conditional_logic(view) {
    'use strict';
    if(jQuery(view).parent().find("input[type='checkbox']:checked").length > 0) {
        jQuery(view).parent().parent().parent().parent().find(".forminix_settings_email_conditional_logic").show()
    } else {
        jQuery(view).parent().parent().parent().parent().find(".forminix_settings_email_conditional_logic").hide()
    }
}

function forminix_settings_email_logic_generate_html(logics_str) {
    'use strict';
    var html = "";
    if (typeof logics_str !== "undefined") {
        if(logics_str.trim().length > 0){
            var logics = JSON.parse(logics_str);
            jQuery(logics).each(function (i, single_logic) {
                if(i === 0){
                    html += forminix_settings_email_generate_conditional_logic_add(
                        single_logic.if,
                        single_logic.condition,
                        forminix_admin_unesc_string(single_logic.value)
                    )
                }else{
                    html += forminix_settings_email_conditional_logic_add_sub_rule(
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
        html += forminix_settings_email_generate_conditional_logic_add("", "", "")
    }
    return html;
}

function forminix_settings_email_generate_conditional_logic_add(condition_field, condition, value) {
    'use strict';

    var form_fields = JSON.parse(forminix_settings_form_field_data);
    var form_fields_opt = "";
    for (var i = 0; i < form_fields.length; i++) {
        form_fields_opt += "<option value=\""+form_fields[i].field_id+"\" "+(condition_field === form_fields[i].field_id ? "selected" : "")+">"+forminix_admin_unesc_string(form_fields[i].field_label)+"</option>"
    }

    var html = "<div class=\"forminix_settings_email_conditional_logic_item\">\n" +
        "           <div class=\"forminix_settings_email_conditional_logic_item_part_1\">\n" +
        "               <div class=\"forminix_settings_single_form_element forminix_settings_email_conditional_logic_if\">\n" +
        "                   <label>IF</label>\n" +
        "                   <select>"+form_fields_opt+"</select>\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_email_conditional_logic_item_part_2\">\n" +
        "               <div class=\"forminix_settings_single_form_element forminix_settings_email_conditional_logic_condition\">\n" +
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
        "           <div class=\"forminix_settings_email_conditional_logic_item_part_3\">\n" +
        "               <div class=\"forminix_settings_single_form_element forminix_settings_email_conditional_logic_value\">\n" +
        "                   <label>Value</label>\n" +
        "                   <input type=\"text\" value=\""+value+"\">\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_email_conditional_logic_item_part_4\">\n" +
        "               <button class=\"add_rule\" onclick=\"forminix_settings_email_conditional_logic_add_more(this)\"></button>\n" +
        "           </div>\n" +
        "       </div>"

    return html;
}

function forminix_settings_email_conditional_logic_add_sub_rule(matching_type, condition_field, condition, value) {
    'use strict';

    var form_fields = JSON.parse(forminix_settings_form_field_data);
    var form_fields_opt = "";
    for (var i = 0; i < form_fields.length; i++) {
        form_fields_opt += "<option value=\""+form_fields[i].field_id+"\" "+(condition_field === form_fields[i].field_id ? "selected" : "")+">"+forminix_admin_unesc_string(form_fields[i].field_label)+"</option>"
    }

    var html = "<div class=\"forminix_settings_email_conditional_logic_item\">\n" +
        "           <div class=\"forminix_settings_email_conditional_logic_item_part_0\">\n" +
        "               <div class=\"forminix_settings_single_form_element\">\n" +
        "                   <select class=\"forminix_settings_email_conditional_logic_or_and_select\" onchange=\"forminix_settings_email_conditional_logic_and_or_select_change(this)\">\n" +
        "                       <option "+(matching_type === "or" ? "selected" : "")+" value=\"or\">OR</option>\n" +
        "                       <option "+(matching_type === "and" ? "selected" : "")+" value=\"and\">AND</option>\n" +
        "                   </select>\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_email_conditional_logic_item_part_1\">\n" +
        "               <div class=\"forminix_settings_single_form_element forminix_settings_email_conditional_logic_if\">\n" +
        "                   <select>"+form_fields_opt+"</select>\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_email_conditional_logic_item_part_2\">\n" +
        "               <div class=\"forminix_settings_single_form_element forminix_settings_email_conditional_logic_condition\">\n" +
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
        "           <div class=\"forminix_settings_email_conditional_logic_item_part_3\">\n" +
        "               <div class=\"forminix_settings_single_form_element forminix_settings_email_conditional_logic_value\">\n" +
        "                   <input type=\"text\" value=\""+value+"\">\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_email_conditional_logic_item_part_4\">\n" +
        "               <button class=\"remove_rule\" onclick=\"forminix_settings_email_conditional_logic_remove(this)\"></button>\n" +
        "           </div>\n" +
        "       </div>"

    return html;
}

function forminix_settings_email_conditional_logic_add_more(view) {
    'use strict';
    jQuery(view).parent().parent().parent().append(
        forminix_settings_email_conditional_logic_add_sub_rule("", "", "", "")
    )
}

function forminix_settings_email_conditional_logic_remove(view) {
    'use strict';
    jQuery(view).parent().parent().remove()
}

function forminix_settings_email_conditional_logic_and_or_select_change(view) {
    'use strict';
    jQuery(view).parent().parent().parent().parent().find(".forminix_settings_email_conditional_logic_or_and_select").val(jQuery(view).val())
}