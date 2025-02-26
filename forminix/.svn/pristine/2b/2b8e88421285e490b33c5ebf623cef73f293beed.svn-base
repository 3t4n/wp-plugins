function forminix_client_esc_string(str){
    'use strict';
    return str.replaceAll('&', '::forminix_amp::')
        .replaceAll('<', '::forminix_left_arrow::')
        .replaceAll('>', '::forminix_right_arrow::')
        .replaceAll('"', '::forminix_dbl_quote::')
        .replaceAll("'", '::forminix_sin_quote::')
        .replaceAll("`", '::forminix_grave::')
        .replaceAll("\\", '::forminix_backslash::');
    return str;
}

function forminix_client_unesc_string(str){
    'use strict';
    return str.replaceAll('::forminix_amp::', '&amp;')
        .replaceAll('::forminix_left_arrow::', '&lt;')
        .replaceAll('::forminix_right_arrow::', '&gt;')
        .replaceAll('::forminix_dbl_quote::', '&quot;')
        .replaceAll('::forminix_sin_quote::', "&#039;")
        .replaceAll('::forminix_grave::', "&#96;")
        .replaceAll('::forminix_backslash::', "&#92;");
}



function forminix_form_submit(unique_id) {
    'use strict';

    forminix_form_remove_all_errors(unique_id)
    var is_error_occurred = false;
    var form_data = new FormData();
    jQuery("#forminix_form_"+unique_id+" .forminix_single_form_element[data-field_id]").each(function (i, object) {
        var field_id = jQuery(object).attr("data-field_id")
        var field_slug = jQuery(object).attr("data-field_slug")
        var field_required_error_msg = jQuery(object).attr("data-required_error_msg")
        var field_value = "";




        if(field_slug === "dropdown"){
            field_value = jQuery(object).find("select").val();
        }else if(field_slug === "country"){
            field_value = jQuery(object).find("select").val();
        }else if(field_slug === "radio"){
            field_value = jQuery(object).find("input[type ='radio']:checked").val();
        }else if(field_slug === "checkbox"){
            field_value = jQuery(object).find("input[type ='checkbox']:checked").map( function() {
                return this.value;
            }).get().join("::forminix_separator::");
        }else if(field_slug === "star_rating"){
            field_value = jQuery(object).find("input[type ='radio']:checked").val();
        }else if(field_slug === "text_area"){
            field_value = jQuery(object).find("textarea").val();
        }else if(field_slug === "rich_text"){
            field_value = jQuery(object).find("textarea").val();
        }else if(field_slug === "file"){
            var files_arr = []
            jQuery.each(jQuery(object).find("input[type ='file']").get(0).files, function(i, single_file) {
                files_arr.push(single_file)
            });
            field_value = files_arr
        }else if(field_slug === "grecaptcha"){
            field_value = jQuery(object).find(".forminix_grecaptcha").attr("data-response")
        }else if(field_slug === "color_picker"){
            field_value = jQuery(object).find("input[type ='hidden']").val();
        }else{
            field_value = jQuery(object).find("input").val();
        }

        field_value = (field_value === undefined) ? "" : field_value;


        /* Check Validation */
        if(field_slug === "dropdown"){
            /* Required Field Check */
            if (jQuery(object).find("select").prop('required') && field_value.length === 0 && !jQuery(object).hasClass("forminix_hidden_by_logic")) {
                is_error_occurred = true
                jQuery(object).addClass("forminix_field_error_occurred").find(".forminix_element_field_main").append("<div class=\"forminix_field_required_error_msg\">"+field_required_error_msg+"</div>")
            }
        }else if(field_slug === "country"){
            /* Required Field Check */
            if (jQuery(object).find("select").prop('required') && field_value.length === 0 && !jQuery(object).hasClass("forminix_hidden_by_logic")) {
                is_error_occurred = true
                jQuery(object).addClass("forminix_field_error_occurred").find(".forminix_element_field_main").append("<div class=\"forminix_field_required_error_msg\">"+field_required_error_msg+"</div>")
            }
        }else if(field_slug === "radio"){
            /* Required Field Check */
            if (jQuery(object).find("input[type ='radio']").prop('required') && field_value.length === 0 && !jQuery(object).hasClass("forminix_hidden_by_logic")) {
                is_error_occurred = true
                jQuery(object).addClass("forminix_field_error_occurred").find(".forminix_element_field_main").append("<div class=\"forminix_field_required_error_msg\">"+field_required_error_msg+"</div>")
            }
        }else if(field_slug === "checkbox"){
            /* Required Field Check */
            if (jQuery(object).find("input[type ='checkbox']").prop('required') && field_value.length === 0 && !jQuery(object).hasClass("forminix_hidden_by_logic")) {
                is_error_occurred = true
                jQuery(object).addClass("forminix_field_error_occurred").find(".forminix_element_field_main").append("<div class=\"forminix_field_required_error_msg\">"+field_required_error_msg+"</div>")
            }
        }else if(field_slug === "star_rating"){
            /* Required Field Check */
            if (jQuery(object).find("input[type ='radio']").prop('required') && field_value.length === 0 && !jQuery(object).hasClass("forminix_hidden_by_logic")) {
                is_error_occurred = true
                jQuery(object).addClass("forminix_field_error_occurred").find(".forminix_element_field_main").append("<div class=\"forminix_field_required_error_msg\">"+field_required_error_msg+"</div>")
            }
        }else if(field_slug === "text_area"){
            /* Required Field Check */
            if (jQuery(object).find("textarea").prop('required') && field_value.length === 0 && !jQuery(object).hasClass("forminix_hidden_by_logic")) {
                is_error_occurred = true
                jQuery(object).addClass("forminix_field_error_occurred").find(".forminix_element_field_main").append("<div class=\"forminix_field_required_error_msg\">"+field_required_error_msg+"</div>")
            }
            /* Min Length Check */
            var field_min_length = jQuery(object).find("textarea").attr('minlength')
            if (field_min_length !== undefined){
                if(jQuery.isNumeric(field_min_length) && field_value.length > 0){
                    if(field_value.length < field_min_length){
                        is_error_occurred = true
                        jQuery(object).addClass("forminix_field_error_occurred")
                    }
                }
            }
            /* Max Length Check */
            var field_max_length = jQuery(object).find("textarea").attr('maxlength')
            if (field_max_length !== undefined){
                if(jQuery.isNumeric(field_max_length) && field_value.length > 0){
                    if(field_value.length > field_max_length){
                        is_error_occurred = true
                        jQuery(object).addClass("forminix_field_error_occurred")
                    }
                }
            }
        }else if(field_slug === "rich_text"){
            /* Required Field Check */
            if (jQuery(object).find("textarea").prop('required') && field_value.length === 0 && !jQuery(object).hasClass("forminix_hidden_by_logic")) {
                is_error_occurred = true
                jQuery(object).addClass("forminix_field_error_occurred").find(".forminix_element_field_main").append("<div class=\"forminix_field_required_error_msg\">"+field_required_error_msg+"</div>")
            }
        }else if(field_slug === "file"){
            /* Required Field Check */
            var file_fake_path = jQuery(object).find("input[type ='file']").val()
            if (jQuery(object).find("input[type ='file']").prop('required') && file_fake_path.length === 0 && !jQuery(object).hasClass("forminix_hidden_by_logic")) {
                is_error_occurred = true
                jQuery(object).addClass("forminix_field_error_occurred").find(".forminix_element_field_main").append("<div class=\"forminix_field_required_error_msg\">"+field_required_error_msg+"</div>")
            }
            /* Allowed File Type Check */
            var allowed_ext = jQuery(object).find("input[type ='file']").attr('accept')
            if (allowed_ext !== undefined){
                if(allowed_ext.length > 0 && file_fake_path.length > 0){
                    jQuery(jQuery(object).find("input[type ='file']").get(0).files).each(function(i, single_file) {
                        if(!forminix_is_file_extension_allowed(single_file.name, allowed_ext)){
                            is_error_occurred = true
                            jQuery(object).addClass("forminix_field_error_occurred")
                        }
                    });
                }
            }
            /* Allowed File Size Check */
            var max_filesize = jQuery(object).attr('data-max_filesize')
            if (max_filesize !== undefined){
                if(jQuery.isNumeric(max_filesize) && file_fake_path.length > 0){
                    jQuery(jQuery(object).find("input[type ='file']").get(0).files).each(function(i, single_file) {
                        var size = single_file.size;
                        size = size / 1024;
                        if(size > max_filesize){
                            is_error_occurred = true
                            jQuery(object).addClass("forminix_field_error_occurred")
                        }
                    });
                }
            }
        }else if(field_slug === "grecaptcha"){
            /* Required Field Check */
            if (field_value.length === 0) {
                is_error_occurred = true
                jQuery(object).addClass("forminix_field_error_occurred")
            }
        }else if(field_slug === "color_picker"){
            /* Required Field Check */
            if (jQuery(object).find("input[type ='hidden']").prop('required') && field_value.length === 0 && !jQuery(object).hasClass("forminix_hidden_by_logic")) {
                is_error_occurred = true
                jQuery(object).addClass("forminix_field_error_occurred").find(".forminix_element_field_main").append("<div class=\"forminix_field_required_error_msg\">"+field_required_error_msg+"</div>")
            }
        }else{
            /* Required Field Check */
            if (jQuery(object).find("input").prop('required') && field_value.length === 0 && !jQuery(object).hasClass("forminix_hidden_by_logic")) {
                is_error_occurred = true
                jQuery(object).addClass("forminix_field_error_occurred").find(".forminix_element_field_main").append("<div class=\"forminix_field_required_error_msg\">"+field_required_error_msg+"</div>")
            }
            /* URL Field Check */
            if (jQuery(object).find("input").attr('type') === "url" && field_value.length > 0) {
                if(!forminix_is_url_valid(field_value)){
                    is_error_occurred = true
                    jQuery(object).addClass("forminix_field_error_occurred")
                }
            }
            /* Email Field Check */
            if (jQuery(object).find("input").attr('type') === "email" && field_value.length > 0) {
                if(!forminix_is_email_valid(field_value)){
                    is_error_occurred = true
                    jQuery(object).addClass("forminix_field_error_occurred")
                }
            }
            /* Min Number Value Check */
            var field_min_value = jQuery(object).find("input").attr('min')
            if (field_min_value !== undefined){
                if(jQuery.isNumeric(field_min_value) && field_value.length > 0){
                    if(Number(field_value) < Number(field_min_value)){
                        is_error_occurred = true
                        jQuery(object).addClass("forminix_field_error_occurred")
                    }
                }
            }
            /* Max Number Value Check */
            var field_max_value = jQuery(object).find("input").attr('max')
            if (field_max_value !== undefined){
                if(jQuery.isNumeric(field_max_value) && field_value.length > 0){
                    if(Number(field_value) > Number(field_max_value)){
                        is_error_occurred = true
                        jQuery(object).addClass("forminix_field_error_occurred")
                    }
                }
            }
            /* Min Length Check */
            var field_min_length = jQuery(object).find("input").attr('minlength')
            if (field_min_length !== undefined){
                if(jQuery.isNumeric(field_min_length) && field_value.length > 0){
                    if(field_value.length < field_min_length){
                        is_error_occurred = true
                        jQuery(object).addClass("forminix_field_error_occurred")
                    }
                }
            }
            /* Max Length Check */
            var field_max_length = jQuery(object).find("input").attr('maxlength')
            if (field_max_length !== undefined){
                if(jQuery.isNumeric(field_max_length) && field_value.length > 0){
                    if(field_value.length > field_max_length){
                        is_error_occurred = true
                        jQuery(object).addClass("forminix_field_error_occurred")
                    }
                }
            }
            /* Pattern Check */
            var field_pattern = jQuery(object).find("input").attr('pattern')
            if (field_pattern !== undefined){
                if(field_pattern.length > 0 && field_value.length > 0){
                    var regex = new RegExp("^(["+field_pattern+"]{0,})$", "g");
                    var pattern_match = field_value.match(regex);
                    if(pattern_match === null){
                        is_error_occurred = true
                        jQuery(object).addClass("forminix_field_error_occurred")
                    }
                }
            }
        }

        if (typeof field_value == "string") {
            field_value = forminix_client_esc_string(field_value);
        }

        if(jQuery.isArray(field_value)){ // For Files
            jQuery(field_value).each(function(i, single_file) {
                form_data.append("field_id_"+field_id+"[]", single_file)
            })
        }else{
            form_data.append("field_id_"+field_id, field_value)
        }
    });



    if(!is_error_occurred){
        var submit_btn = jQuery("#forminix_form_"+unique_id+" .forminix_single_form_element[data-field_slug='submit_btn'] button")
        var submit_btn_text = jQuery(submit_btn).text()
        jQuery(submit_btn).empty().append("<div class=\"submitting_loader\"></div>")

        form_data.append("action", "forminix_client_submit_form")
        form_data.append("security", forminix_client_script_object.security)
        form_data.append("form_id", jQuery("#forminix_form_"+unique_id).attr("data-form_id"))


        jQuery.ajax({
            url: forminix_client_script_object.ajaxurl,
            type: "POST",
            data: form_data,
            enctype: "multipart/form-data",
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                jQuery(submit_btn).empty().text(submit_btn_text)
                var obj = JSON.parse(data);
                if(obj.status === "true") {
                    var settings = obj.settings;
                    forminix_form_submission_done(unique_id, settings)
                }
            }
        })
    }else{
        jQuery([document.documentElement, document.body]).animate({
            scrollTop: jQuery("#forminix_form_"+unique_id+" .forminix_field_error_occurred").offset().top - 50
        }, 500);
    }
}


function forminix_form_remove_all_errors(unique_id) {
    'use strict';
    jQuery("#forminix_form_"+unique_id+" .forminix_single_form_element[data-field_id]").each(function (i, object) {
        jQuery(object).removeClass("forminix_field_error_occurred").find(".forminix_field_required_error_msg").remove()
    })
}

function forminix_field_remove_errors(view) {
    'use strict';
    jQuery(view).closest(".forminix_single_form_element").removeClass("forminix_field_error_occurred").find(".forminix_field_required_error_msg").remove()
}

function forminix_populate_filename_on_select(view){
    'use strict';
    var file_names = []
    jQuery(jQuery(view).parent().find("input[type ='file']").get(0).files).each(function(i, single_file) {
        file_names.push(single_file.name)
    });
    var filename = file_names.join(", ")
    if(filename.length > 30){
        filename = filename.substring(0, 17) + "..." + filename.substr(filename.length - 10);
    }
    jQuery(view).parent().find("label").text(filename)
}


/* Validation Methods */
function forminix_is_url_valid(url) {
    'use strict';
    return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
}
function forminix_is_email_valid(email) {
    'use strict';
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
function forminix_is_file_extension_allowed(file_name, allowed_ext) {
    'use strict';
    var is_ext_matched = false;
    var file_ext = file_name.replace(/^.*\./, '');
    var accept_ext_arr = allowed_ext.split(',');
    jQuery.each(accept_ext_arr, function(index, item) {
        if(item.toLowerCase().trim() === "."+file_ext.toLowerCase()){
            is_ext_matched = true;
        }
    });
    return is_ext_matched;
}





function forminix_form_submission_done(unique_id, settings){
    'use strict';

    /* Process PayPal Payment URL */
    if (typeof settings.paypal_payment_url !== "undefined") {
        var submit_btn = jQuery("#forminix_form_"+unique_id+" .forminix_single_form_element[data-field_slug='submit_btn'] button")
        jQuery(submit_btn).empty().append("<div class=\"submitting_loader\"></div>")
        window.location.href = settings.paypal_payment_url;
        return;
    }

    if(settings.confirmation_type === "same_page"){
        if(settings.confirmation_form_status === "hide_form"){
            jQuery("#forminix_form_"+unique_id+" .forminix_single_form_element_column_container").remove()
            jQuery("#forminix_form_"+unique_id+" .forminix_single_form_element").remove()
        }else if(settings.confirmation_form_status === "reset_form"){
            jQuery("#forminix_form_"+unique_id+" .forminix_single_form_element[data-field_id]").each(function (i, object) {
                var field_slug = jQuery(object).attr("data-field_slug")
                if(field_slug === "dropdown"){
                    jQuery(object).find("select").val("");
                }else if(field_slug === "country"){
                    jQuery(object).find("select").val("");
                }else if(field_slug === "radio"){
                    jQuery(object).find("input[type ='radio']:checked").removeAttr('checked');
                }else if(field_slug === "checkbox"){
                    jQuery(object).find("input[type ='checkbox']:checked").removeAttr('checked');
                }else if(field_slug === "star_rating"){
                    jQuery(object).find("input[type ='radio']:checked").removeAttr('checked');
                }else if(field_slug === "text_area"){
                    jQuery(object).find("textarea").val("");
                }else if(field_slug === "rich_text"){
                    jQuery(object).find("textarea").val("");
                    tinymce.get("forminix_field_id_"+jQuery(object).attr("data-field_id")).setContent("")
                }else if(field_slug === "grecaptcha"){
                    grecaptcha.reset();
                }else if(field_slug === "color_picker"){
                    jQuery(object).find("input[type ='hidden']").val("");
                    jQuery(object).find("input[type ='color']").val("");
                    jQuery(object).find(".color_picker_area label").text("");
                }else{
                    jQuery(object).find("input").val("");
                }
            });
        }
        jQuery("#forminix_form_"+unique_id+" .forminix_form_confirmation_msg").remove()
        jQuery("#forminix_form_"+unique_id).prepend(
            "<div class=\"forminix_form_confirmation_msg\">\n" +
            "     "+settings.confirmation_msg+"\n" +
            "</div>"
        )
        jQuery([document.documentElement, document.body]).animate({
            scrollTop: jQuery("#forminix_form_"+unique_id+" .forminix_form_confirmation_msg").offset().top - 50
        }, 500);
    }else if(settings.confirmation_type === "custom_url"){
        window.location.href = settings.confirmation_custom_url;
    }
}






/* =======================
    Conditional Logic
 ======================= */

function forminix_form_init_conditional_logic(unique_id, logics_str) {
    'use strict';
    var logics = JSON.parse(logics_str);

    jQuery(logics).each(function (i, single_logic) {
        var rules = single_logic.rules;
        for (var x = 0; x < rules.length; x++) {

            var single_form_element = jQuery("#forminix_form_"+unique_id+" .forminix_single_form_element[data-field_id='"+rules[x].if+"'")
            var field_slug = jQuery(single_form_element).attr("data-field_slug")
            if(field_slug === "radio"){
                jQuery(single_form_element).find("input[type ='radio']").bind( "change", function() {
                    forminix_form_conditional_logic_value_change_listener(unique_id, single_logic)
                });
            }else if(field_slug === "checkbox"){
                jQuery(single_form_element).find("input[type ='checkbox']").bind( "change", function() {
                    forminix_form_conditional_logic_value_change_listener(unique_id, single_logic)
                });
            }else if(field_slug === "star_rating"){
                jQuery(single_form_element).find("input[type ='radio']").bind( "change", function() {
                    forminix_form_conditional_logic_value_change_listener(unique_id, single_logic)
                });
            }else if(field_slug === "file"){
                jQuery(single_form_element).find("input[type ='file']").bind( "change", function() {
                    forminix_form_conditional_logic_value_change_listener(unique_id, single_logic)
                });
            }else{
                jQuery("#forminix_form_"+unique_id+" #forminix_field_id_"+rules[x].if).bind( "change", function() {
                    forminix_form_conditional_logic_value_change_listener(unique_id, single_logic)
                });
            }

        }
    })
}

function forminix_form_conditional_logic_value_change_listener(unique_id, single_logic) {
    'use strict';
    var condition_checkmark = []
    var target_field_id = single_logic.target_field
    var matching_type = single_logic.matching_type /* OR, AND */
    var rules = single_logic.rules;
    for (var x = 0; x < rules.length; x++) {

        /* Get the if field latest value */
        var single_form_element = jQuery("#forminix_form_"+unique_id+" .forminix_single_form_element[data-field_id='"+rules[x].if+"'")
        var field_slug = jQuery(single_form_element).attr("data-field_slug")
        var field_value = ""
        if(field_slug === "radio"){
            field_value = jQuery(single_form_element).find("input[type ='radio']:checked").val();
        }else if(field_slug === "checkbox"){
            field_value = jQuery(single_form_element).find("input[type ='checkbox']:checked").map( function() {
                return this.value;
            }).get().join(",");
        }else if(field_slug === "star_rating"){
            field_value = jQuery(single_form_element).find("input[type ='radio']:checked").val();
        }else if(field_slug === "file"){
            var file_fake_path = jQuery(single_form_element).find("input[type ='file']").val()
            if(file_fake_path.length > 0){
                var file_ext = file_fake_path.replace(/^.*\./, '');
                var file_size = jQuery(single_form_element).find("input[type ='file']").get(0).files[0].size;
                file_size = file_size / 1024;
                field_value = {"file_ext" : file_ext, "file_size" : file_size}
            }else{
                field_value = ""
            }
        }else{
            field_value = jQuery("#forminix_form_"+unique_id+" #forminix_field_id_"+rules[x].if).val();
        }
        if (typeof field_value == "string") {
            field_value = forminix_client_esc_string(field_value);
        }
        /* Get the if field latest value */

        var required_value = rules[x].value
        var condition = rules[x].condition
        if(condition === "equal"){
            if(field_value == required_value){condition_checkmark.push(1)}else{condition_checkmark.push(0)}
        }else if(condition === "not_equal"){
            if(field_value != required_value){condition_checkmark.push(1)}else{condition_checkmark.push(0)}
        }else if(condition === "greater_than"){
            if(Number(field_value) > Number(required_value)){condition_checkmark.push(1)}else{condition_checkmark.push(0)}
        }else if(condition === "less_than"){
            if(Number(field_value) < Number(required_value)){condition_checkmark.push(1)}else{condition_checkmark.push(0)}
        }else if(condition === "starts_with"){
            if(field_value.startsWith(required_value)){condition_checkmark.push(1)}else{condition_checkmark.push(0)}
        }else if(condition === "ends_with"){
            if(field_value.endsWith(required_value)){condition_checkmark.push(1)}else{condition_checkmark.push(0)}
        }else if(condition === "contains"){
            if(field_value.includes(required_value)){condition_checkmark.push(1)}else{condition_checkmark.push(0)}
        }else if(condition === "not_contains"){
            if(!field_value.includes(required_value)){condition_checkmark.push(1)}else{condition_checkmark.push(0)}
        }else if(condition === "length_greater_than"){
            if(field_value.length > required_value){condition_checkmark.push(1)}else{condition_checkmark.push(0)}
        }else if(condition === "length_less_than"){
            if(field_value.length < required_value){condition_checkmark.push(1)}else{condition_checkmark.push(0)}
        }else if(condition === "filesize_greater_than"){
            if(Number(field_value.file_size) > Number(required_value)){condition_checkmark.push(1)}else{condition_checkmark.push(0)}
        }else if(condition === "filesize_less_than"){
            if(Number(field_value.file_size) < Number(required_value)){condition_checkmark.push(1)}else{condition_checkmark.push(0)}
        }
    }

    var is_logic_matched = false
    if(matching_type === "or"){
        if(jQuery.inArray(1, condition_checkmark) !== -1) {
            is_logic_matched = true
        }
    }else if(matching_type === "and"){
        if(jQuery.inArray(0, condition_checkmark) === -1) {
            is_logic_matched = true
        }
    }
    if(is_logic_matched){
        jQuery("#forminix_form_"+unique_id+" .forminix_single_form_element[data-field_id='"+target_field_id+"']").removeClass("forminix_hidden_by_logic")
    }else{
        jQuery("#forminix_form_"+unique_id+" .forminix_single_form_element[data-field_id='"+target_field_id+"']").addClass("forminix_hidden_by_logic")
        /* Clear the Value */
        var target_field_container = jQuery("#forminix_form_"+unique_id+" .forminix_single_form_element[data-field_id='"+target_field_id+"'")
        var target_field_slug = jQuery(target_field_container).attr("data-field_slug")
        if(target_field_slug === "radio"){
            jQuery(target_field_container).find("input[type ='radio']").prop('checked', false);
        }else if(target_field_slug === "checkbox"){
            jQuery(target_field_container).find("input[type ='checkbox']").prop('checked', false);
        }else if(target_field_slug === "star_rating"){
            jQuery(target_field_container).find("input[type ='radio']").prop('checked', false);
        }else{
            jQuery("#forminix_form_"+unique_id+" #forminix_field_id_"+target_field_id).val("")
        }
    }
}