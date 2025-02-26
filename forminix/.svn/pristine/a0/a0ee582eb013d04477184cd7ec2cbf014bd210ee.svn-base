
/* ===================
    Mailchimp Scripts
=================== */

function forminix_integration_mailchimp_add(host, existing_data) {
    'use strict';
    forminix_settings_integration_popup_close();

    jQuery(".forminix_settings_integration_single_item").removeClass("forminix_settings_integration_single_item_maximized")


    /* Process existing data */
    var integration_title = "Mailchimp Integration";
    var api_key = "";
    var default_list_option = "<option value=\"\">Select List</option>";
    var tags = ""
    var double_opt_in = "0"
    var default_mapping_data = "";
    var enable_conditional_logic = "0"
    var conditional_logic_data = ""
    if(existing_data.trim().length > 0){
        var single_mailchimp_data = JSON.parse(existing_data);
        integration_title = single_mailchimp_data.integration_title
        api_key = single_mailchimp_data.api_key
        default_list_option = "<option value=\""+single_mailchimp_data.list_id+"\">"+single_mailchimp_data.list_title+"</option>"
        tags = single_mailchimp_data.tags
        double_opt_in = single_mailchimp_data.double_opt_in
        enable_conditional_logic = single_mailchimp_data.enable_conditional_logic
        conditional_logic_data = JSON.stringify(single_mailchimp_data.conditional_logic_data)

        jQuery(single_mailchimp_data.map_data).each(function (i, single_map_data) {
            var form_fields = JSON.parse(forminix_settings_form_field_data);
            var form_fields_html = "<option value=\"\">Choose Form Field</option>";
            for (var x = 0; x < form_fields.length; x++) {
                var is_selected = (form_fields[x].field_id === single_map_data.form_field_id) ? "selected" : ""
                form_fields_html += "<option value=\""+form_fields[x].field_id+"\" "+is_selected+">"+form_fields[x].field_label+"</option>";
            }
            default_mapping_data += "<div class=\"forminix_settings_single_form_element\" data-field_tag=\"" + single_map_data.field_tag + "\">\n" +
                "                       <label>" + single_map_data.field_name + "</label>\n" +
                "                       <select>\n" +
                "                           "+form_fields_html+"\n" +
                "                       </select>\n" +
                "                   </div>"
        })

    }



    var integration = "<div data-integration=\"mailchimp\" class=\"forminix_settings_integration_single_item forminix_settings_integration_single_item_maximized\">\n" +
        "                  <div class=\"forminix_settings_integration_single_item_intro\">\n" +
        "                      <h2 contenteditable=\"true\">"+integration_title+"</h2>\n" +
        "                      <div class=\"forminix_settings_integration_single_item_actions\">\n" +
        "                          <button class=\"forminix_settings_integration_single_item_minimize\" onclick=\"forminix_settings_integration_minimize(this)\"></button>\n" +
        "                          <button class=\"forminix_settings_integration_single_item_maximize\" onclick=\"forminix_settings_integration_maximize(this)\"></button>\n" +
        "                          <button class=\"forminix_settings_integration_single_item_delete\" onclick=\"forminix_settings_integration_remove(this)\">Delete</button>\n" +
        "                      </div>\n" +
        "                  </div>\n" +
        "                  <div class=\"forminix_settings_integration_single_item_content\">\n" +
        "                      <div class=\"forminix_settings_single_form_element forminix_mailchimp_api_key\">\n" +
        "                          <label>API Key</label>\n" +
        "                          <input type=\"text\" value=\""+api_key+"\" onchange=\"forminix_settings_integration_mailchimp_fetch_lists(this)\">\n" +
        "                      </div>\n" +
        "                      <div class=\"forminix_settings_single_form_element forminix_mailchimp_contact_list\">\n" +
        "                          <label>Choose Contact List</label>\n" +
        "                          <select onchange=\"forminix_settings_integration_mailchimp_fetch_fields(this)\">\n" +
        "                              "+default_list_option+"\n" +
        "                          </select>\n" +
        "                      </div>\n" +
        "                      <div class=\"forminix_settings_integration_sub_section_container\" "+ ((default_mapping_data.toString().length > 0) ? "" : "style=\"display: none;\"") +">\n" +
        "                           <span class=\"section_title\">Mapping & Settings</span>\n" +
        "                           <div class=\"forminix_mailchimp_field_mapping\">"+default_mapping_data+"</div>\n" +
        "                           <div class=\"forminix_settings_single_form_element forminix_mailchimp_tags\">\n" +
        "                               <label>Tags</label>\n" +
        "                               <input type=\"text\" value=\""+tags+"\">\n" +
        "                               <p>Use comma separated value for multiple tags. </p>\n" +
        "                           </div>\n" +
        "                           <div class=\"forminix_settings_single_form_element\">\n" +
        "                               <label>Double Opt-in</label>\n" +
        "                               <div class=\"checkbox_container horizontal left\">\n" +
        "                                   <label class=\"checkbox_item\">" +
        "                                       Enable Double Opt-in" +
        "                                       <input type=\"checkbox\"  class=\"forminix_mainchimp_double_opt_in\" "+(double_opt_in === "1" ? "checked" : "")+">" +
        "                                       <span class=\"checkmark\"></span>" +
        "                                   </label>\n" +
        "                               </div>\n" +
        "                           </div>\n" +
        "                      </div>\n" +
        "                           <div class=\"forminix_settings_single_form_element forminix_settings_integration_enable_conditional_logic\">\n" +
        "                               <div class=\"checkbox_container left\">\n" +
        "                                   <label class=\"checkbox_item\">Enable Conditional Logic<input type=\"checkbox\" onchange=\"forminix_settings_integration_show_or_hide_conditional_logic(this)\" "+(enable_conditional_logic === "1" ? "checked" : "")+"><span class=\"checkmark\"></span></label>\n" +
        "                               </div>\n" +
        "                           </div>\n" +
        "                           <div class=\"forminix_settings_integration_conditional_logic\" "+(enable_conditional_logic === "0" ? "style=\"display:none;\"" : "")+">"+forminix_settings_integration_logic_generate_html(conditional_logic_data)+"</div>\n" +
        "                  </div>\n" +
        "              </div>"

    jQuery(".forminix_settings_integration_container").append(integration)
    forminix_settings_integration_check_empty();
}

function forminix_settings_integration_mailchimp_fetch_lists(view) {
    'use strict';
    var api_key = jQuery(view).parent().parent().parent().find(".forminix_mailchimp_api_key input").val()
    if(api_key.trim().length > 0){

        jQuery(view).parent().parent().parent().parent().find(".forminix_mailchimp_contact_list select").empty().append("<option value=\"\">Fetching List...</option>")

        var post_data = {
            'action': 'forminix_mailchimp_fetch_lists',
            'api_key': api_key
        };

        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: post_data,
            success: function (data) {
                var obj = JSON.parse(data);
                if(obj.status === "true"){
                    var contact_lists = obj.lists;

                    jQuery(view).parent().parent().parent().parent().find(".forminix_mailchimp_contact_list select").empty()

                    for(var i = 0; i < contact_lists.length; i++){
                        jQuery(view).parent().parent().parent().parent().find(".forminix_mailchimp_contact_list select").append("<option value=\"" + contact_lists[i].id + "\">" + contact_lists[i].text + "</option>")
                    }
                    jQuery(view).parent().parent().parent().parent().find(".forminix_mailchimp_contact_list select").trigger("change")

                }
            }
        })
    }
}



function forminix_settings_integration_mailchimp_fetch_fields(view) {
    'use strict';
    var api_key = jQuery(view).parent().parent().find(".forminix_mailchimp_api_key input").val()
    var list_id = jQuery(view).parent().parent().find(".forminix_mailchimp_contact_list select").val()
    if(list_id){
        if(api_key.trim().length > 0 && list_id.trim().length > 0){

            jQuery(view).parent().parent().find(".forminix_settings_integration_sub_section_container").hide()
            jQuery(view).parent().parent().find(".forminix_mailchimp_field_mapping").empty()

            var post_data = {
                'action': 'forminix_mailchimp_fetch_fields',
                'api_key': api_key,
                'list_id': list_id
            };

            jQuery.ajax({
                url: ajaxurl,
                type: "POST",
                data: post_data,
                success: function (data) {
                    var obj = JSON.parse(data);
                    if(obj.status === "true"){
                        var fields = obj.fields;


                        var form_fields = JSON.parse(forminix_settings_form_field_data);
                        var form_fields_html = "<option value=\"\">Choose Form Field</option>";
                        for (var x = 0; x < form_fields.length; x++) {
                            form_fields_html += "<option value=\""+form_fields[x].field_id+"\">"+form_fields[x].field_label+"</option>";
                        }

                        for(var i = 0; i < fields.length; i++){
                            var html = "<div class=\"forminix_settings_single_form_element\" data-field_tag=\"" + fields[i].tag + "\">\n" +
                                "           <label>► " + fields[i].name + "</label>\n" +
                                "           <select>\n" +
                                "               "+form_fields_html+"\n" +
                                "           </select>\n" +
                                "       </div>"
                            jQuery(view).parent().parent().find(".forminix_mailchimp_field_mapping").append(html)
                        }

                        if(fields.length > 0){
                            jQuery(view).parent().parent().find(".forminix_settings_integration_sub_section_container").show()
                        }

                    }
                }
            })
        }
    }

}


function forminix_integration_mailchimp_generate_html(host, json_object) {
    'use strict';
    forminix_integration_mailchimp_add(host, JSON.stringify(json_object))
}


function forminix_integration_mailchimp_generate_json(object) {
    'use strict';

    /* Checks for Incomplete Mailchimp Integration */
    var is_api_key = false
    var is_list_id = false
    var is_email_tag_set = false

    var forminix_mailchimp_single_item = {}
    var integration_title = jQuery(object).find("h2").text()
    var api_key = jQuery(object).find(".forminix_mailchimp_api_key input").val()
    var list_title = jQuery(object).find(".forminix_mailchimp_contact_list select option:selected").text()
    var list_id = jQuery(object).find(".forminix_mailchimp_contact_list select").val()
    var tags = jQuery(object).find(".forminix_mailchimp_tags input").val()
    var double_opt_in = (jQuery(object).find(".forminix_mainchimp_double_opt_in:checked").length>0) ? "1" : "0"

    if(api_key.trim().length > 0 && list_id.trim().length > 0){
        is_api_key = true
        is_list_id = true
    }


    var forminix_mailchimp_map_data = []
    jQuery(object).find(".forminix_mailchimp_field_mapping .forminix_settings_single_form_element").each(function (i, map_object) {
        var forminix_mailchimp_single_map_item = {}
        forminix_mailchimp_single_map_item["field_tag"] = jQuery(map_object).attr("data-field_tag")
        forminix_mailchimp_single_map_item["field_name"] = jQuery(map_object).find("label").text()
        forminix_mailchimp_single_map_item["form_field_id"] = jQuery(map_object).find("select").val()
        forminix_mailchimp_map_data.push(forminix_mailchimp_single_map_item)

        if(forminix_mailchimp_single_map_item["field_tag"] === "EMAIL" && forminix_mailchimp_single_map_item["form_field_id"] != ""){
            is_email_tag_set = true
        }
    })

    if(is_api_key && is_list_id && is_email_tag_set){
        forminix_mailchimp_single_item["integration_title"] = integration_title
        forminix_mailchimp_single_item["api_key"] = api_key
        forminix_mailchimp_single_item["list_title"] = list_title
        forminix_mailchimp_single_item["list_id"] = list_id
        forminix_mailchimp_single_item["tags"] = tags
        forminix_mailchimp_single_item["double_opt_in"] = double_opt_in
        forminix_mailchimp_single_item["map_data"] = forminix_mailchimp_map_data

        if(jQuery(object).find(".forminix_settings_integration_enable_conditional_logic input[type='checkbox']:checked").length > 0){
            forminix_mailchimp_single_item["enable_conditional_logic"] = "1"
            forminix_mailchimp_single_item["conditional_logic_data"] = forminix_settings_integration_conditional_logic_generate_json(object)
        }else{
            forminix_mailchimp_single_item["enable_conditional_logic"] = "0"
            forminix_mailchimp_single_item["conditional_logic_data"] = []
        }

        return forminix_mailchimp_single_item;
    }else{
        alert("You have an incomplete Mailchimp Integration.")
        return null;
    }

}