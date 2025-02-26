
/* ==================
 Conditional Logic
================== */


function forminix_settings_logic_check_empty(){
    'use strict';

    var total_logic_item = 0
    jQuery(".forminix_settings_conditional_logic_item").each(function (i, object) {
        total_logic_item = total_logic_item + 1
    })

    if(total_logic_item > 0){
        jQuery(".forminix_settings_conditional_logic_main_area").show()
        jQuery(".forminix_settings_conditional_logic_empty").hide()
    }else{
        jQuery(".forminix_settings_conditional_logic_main_area").hide()
        jQuery(".forminix_settings_conditional_logic_empty").show()
    }
}


function forminix_settings_logic_remove(view) {
    'use strict';
    jQuery(view).parent().parent().remove()
    forminix_settings_logic_check_empty();
}

function forminix_settings_logic_and_or_select_change(view) {
    'use strict';

    jQuery(view).parent().parent().parent().parent().find(".forminix_settings_conditional_logic_or_and_select").val(jQuery(view).val())

}



function forminix_settings_logic_add(condition_field, condition, value, target_field) {
    'use strict';

    var form_fields = JSON.parse(forminix_settings_form_field_data);
    var form_fields_condition_opt = "";
    var form_fields_target_opt = "";
    for (var i = 0; i < form_fields.length; i++) {
        form_fields_condition_opt += "<option value=\""+form_fields[i].field_id+"\" "+(condition_field === form_fields[i].field_id ? "selected" : "")+">"+forminix_admin_unesc_string(form_fields[i].field_label)+"</option>"
    }
    for (var i = 0; i < form_fields.length; i++) {
        form_fields_target_opt += "<option value=\""+form_fields[i].field_id+"\" "+(target_field === form_fields[i].field_id ? "selected" : "")+">"+forminix_admin_unesc_string(form_fields[i].field_label)+"</option>"
    }

    var logic = "<div class=\"forminix_settings_conditional_logic_item\">\n" +
        "           <div class=\"forminix_settings_conditional_logic_item_part_1\">\n" +
        "               <div class=\"forminix_settings_conditional_logic_item_part_1_rule\">\n" +
        "                   <div class=\"forminix_settings_conditional_logic_item_part_1_rule_part_1\">\n" +
        "                       <div class=\"forminix_settings_single_form_element\">\n" +
        "                           <label>IF</label>\n" +
        "                           <select>\n" +
        "                               "+form_fields_condition_opt+"\n" +
        "                           </select>\n" +
        "                       </div>\n" +
        "                   </div>\n" +
        "                   <div class=\"forminix_settings_conditional_logic_item_part_1_rule_part_2\">\n" +
        "                       <div class=\"forminix_settings_single_form_element\">\n" +
        "                           <label>Condition</label>\n" +
        "                           <select>\n" +
        "                               <option "+(condition === "equal" ? "selected" : "")+" value=\"equal\">Equal</option>\n" +
        "                               <option "+(condition === "not_equal" ? "selected" : "")+" value=\"not_equal\">Not Equal</option>\n" +
        "                               <option "+(condition === "greater_than" ? "selected" : "")+" value=\"greater_than\">Greater Than</option>\n" +
        "                               <option "+(condition === "less_than" ? "selected" : "")+" value=\"less_than\">Less Than</option>\n" +
        "                               <option "+(condition === "starts_with" ? "selected" : "")+" value=\"starts_with\">Starts With</option>\n" +
        "                               <option "+(condition === "ends_with" ? "selected" : "")+" value=\"ends_with\">Ends With</option>\n" +
        "                               <option "+(condition === "contains" ? "selected" : "")+" value=\"contains\">Contains</option>\n" +
        "                               <option "+(condition === "not_contains" ? "selected" : "")+" value=\"not_contains\">Not Contains</option>\n" +
        "                               <option "+(condition === "length_greater_than" ? "selected" : "")+" value=\"length_greater_than\">Length Greater Than</option>\n" +
        "                               <option "+(condition === "length_less_than" ? "selected" : "")+" value=\"length_less_than\">Length Less Than</option>\n" +
        "                               <option "+(condition === "filesize_greater_than" ? "selected" : "")+" value=\"filesize_greater_than\">Filesize Greater Than (Kb)</option>\n" +
        "                               <option "+(condition === "filesize_less_than" ? "selected" : "")+" value=\"filesize_less_than\">Filesize Less Than (Kb)</option>\n" +
        "                           </select>\n" +
        "                       </div>\n" +
        "                   </div>\n" +
        "                   <div class=\"forminix_settings_conditional_logic_item_part_1_rule_part_3\">\n" +
        "                       <div class=\"forminix_settings_single_form_element\">\n" +
        "                           <label>Value</label>\n" +
        "                           <input type=\"text\" value=\""+value+"\"/>\n" +
        "                       </div>\n" +
        "                   </div>\n" +
        "                   <div class=\"forminix_settings_conditional_logic_item_part_1_rule_part_4\">\n" +
        "                       <button class=\"add_rule\" onclick=\"forminix_settings_logic_add_rule_inside_item(this, ``, ``, ``, ``)\"></button>\n" +
        "                   </div>\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_conditional_logic_item_part_2\">\n" +
        "               <div class=\"forminix_settings_single_form_element\">\n" +
        "                   <label>Then Display</label>\n" +
        "                   <select>\n" +
        "                       "+form_fields_target_opt+"\n" +
        "                   </select>\n" +
        "               </div>\n" +
        "               <button class=\"remove_rule\" onclick=\"forminix_settings_logic_remove(this)\"></button>\n" +
        "           </div>\n" +
        "       </div>"

    jQuery(".forminix_settings_conditional_logic_container").append(logic)
    forminix_settings_logic_check_empty();

}





function forminix_settings_logic_add_rule_inside_item(view, matching_type, condition_field, condition, value) {
    'use strict';

    var form_fields = JSON.parse(forminix_settings_form_field_data);
    var form_fields_opt = "";
    for (var i = 0; i < form_fields.length; i++) {
        form_fields_opt += "<option value=\""+form_fields[i].field_id+"\" "+(condition_field === form_fields[i].field_id ? "selected" : "")+">"+forminix_admin_unesc_string(form_fields[i].field_label)+"</option>"
    }

    var rule = "<div class=\"forminix_settings_conditional_logic_item_part_1_rule\">\n" +
        "           <div class=\"forminix_settings_conditional_logic_item_part_1_rule_part_0\">\n" +
        "               <div class=\"forminix_settings_single_form_element\">\n" +
        "                   <select class=\"forminix_settings_conditional_logic_or_and_select\" onchange=\"forminix_settings_logic_and_or_select_change(this)\">\n" +
        "                       <option "+(matching_type === "or" ? "selected" : "")+" value=\"or\">OR</option>\n" +
        "                       <option "+(matching_type === "and" ? "selected" : "")+" value=\"and\">AND</option>\n" +
        "                   </select>\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_conditional_logic_item_part_1_rule_part_1_mini\">\n" +
        "               <div class=\"forminix_settings_single_form_element\">\n" +
        "                   <select>\n" +
        "                       "+form_fields_opt+"\n" +
        "                   </select>\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_conditional_logic_item_part_1_rule_part_2\">\n" +
        "               <div class=\"forminix_settings_single_form_element\">\n" +
        "                   <select>\n" +
        "                               <option "+(condition === "equal" ? "selected" : "")+" value=\"equal\">Equal</option>\n" +
        "                               <option "+(condition === "not_equal" ? "selected" : "")+" value=\"not_equal\">Not Equal</option>\n" +
        "                               <option "+(condition === "greater_than" ? "selected" : "")+" value=\"greater_than\">Greater Than</option>\n" +
        "                               <option "+(condition === "less_than" ? "selected" : "")+" value=\"less_than\">Less Than</option>\n" +
        "                               <option "+(condition === "starts_with" ? "selected" : "")+" value=\"starts_with\">Starts With</option>\n" +
        "                               <option "+(condition === "ends_with" ? "selected" : "")+" value=\"ends_with\">Ends With</option>\n" +
        "                               <option "+(condition === "contains" ? "selected" : "")+" value=\"contains\">Contains</option>\n" +
        "                               <option "+(condition === "not_contains" ? "selected" : "")+" value=\"not_contains\">Not Contains</option>\n" +
        "                               <option "+(condition === "length_greater_than" ? "selected" : "")+" value=\"length_greater_than\">Length Greater Than</option>\n" +
        "                               <option "+(condition === "length_less_than" ? "selected" : "")+" value=\"length_less_than\">Length Less Than</option>\n" +
        "                               <option "+(condition === "filesize_greater_than" ? "selected" : "")+" value=\"filesize_greater_than\">Filesize Greater Than (Kb)</option>\n" +
        "                               <option "+(condition === "filesize_less_than" ? "selected" : "")+" value=\"filesize_less_than\">Filesize Less Than (Kb)</option>\n" +
        "                   </select>\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_conditional_logic_item_part_1_rule_part_3\">\n" +
        "               <div class=\"forminix_settings_single_form_element\">\n" +
        "                   <input type=\"text\" value=\""+value+"\"/>\n" +
        "               </div>\n" +
        "           </div>\n" +
        "           <div class=\"forminix_settings_conditional_logic_item_part_1_rule_part_4\">\n" +
        "               <button class=\"remove_rule\" onclick=\"forminix_settings_logic_remove_rule_from_item(this)\"></button>\n" +
        "           </div>\n" +
        "       </div>"

    jQuery(view).parent().parent().parent().append(rule)

}


function forminix_settings_logic_remove_rule_from_item(view) {
    'use strict';
    jQuery(view).parent().parent().remove()
}



function forminix_settings_logic_generate_html(logics_str) {
    'use strict';
    var logics = JSON.parse(logics_str);

    jQuery(logics).each(function (i, single_logic) {
        var matching_type = single_logic.matching_type
        var target_field = single_logic.target_field

        var rules = single_logic.rules;
        jQuery(rules).each(function (x, single_rule) {
            if(x === 0){
                forminix_settings_logic_add(single_rule.if, single_rule.condition, forminix_admin_unesc_string(single_rule.value), target_field)
            }else{
                forminix_settings_logic_add_rule_inside_item(
                    jQuery(".forminix_settings_conditional_logic_container")
                        .find(".forminix_settings_conditional_logic_item")
                        .eq(i)
                        .find("button.add_rule"),
                    matching_type,
                    single_rule.if,
                    single_rule.condition,
                    forminix_admin_unesc_string(single_rule.value)
                )
            }
        })
    })
}

function forminix_settings_logic_generate_json() {
    'use strict';
    var forminix_logics = []

    jQuery(".forminix_settings_conditional_logic_container .forminix_settings_conditional_logic_item").each(function (i, object) {
        var forminix_logic_single_logic = {}
        forminix_logic_single_logic["matching_type"] = jQuery(object).find(".forminix_settings_conditional_logic_item_part_1_rule_part_0 select").val()
        forminix_logic_single_logic["matching_type"] = (forminix_logic_single_logic["matching_type"] === undefined) ? "or" : forminix_logic_single_logic["matching_type"]
        forminix_logic_single_logic["target_field"] = jQuery(object).find(".forminix_settings_conditional_logic_item_part_2 select").val()

        var forminix_logic_rules = []
        jQuery(object).find(".forminix_settings_conditional_logic_item_part_1_rule").each(function (i, rule) {
            var forminix_logic_single_rule = {}
            forminix_logic_single_rule["if"] = jQuery(rule).find(".forminix_settings_conditional_logic_item_part_1_rule_part_1 select").val()
            forminix_logic_single_rule["if"] = (forminix_logic_single_rule["if"] === undefined) ? jQuery(rule).find(".forminix_settings_conditional_logic_item_part_1_rule_part_1_mini select").val() : forminix_logic_single_rule["if"];
            forminix_logic_single_rule["condition"] = jQuery(rule).find(".forminix_settings_conditional_logic_item_part_1_rule_part_2 select").val()
            forminix_logic_single_rule["value"] = forminix_admin_esc_string(jQuery(rule).find(".forminix_settings_conditional_logic_item_part_1_rule_part_3 input").val())
            forminix_logic_rules.push(forminix_logic_single_rule)
        })

        forminix_logic_single_logic["rules"] = forminix_logic_rules
        forminix_logics.push(forminix_logic_single_logic)
    });
    return forminix_logics;
}