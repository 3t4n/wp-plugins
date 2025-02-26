var old_data_for_unsaved_data_on_leave = {"form_name" : "", "form_fields" : ""};

const forminix_builder_sortable_options_1 = {
    connectWith: '.forminix_builder_single_form_element_column',
    placeholder: "elements_placeholder",
    revert: false,
    receive: function(event, ui) {
        jQuery(this).find('.forminix_builder_sidebar_field').replaceWith(forminix_builder_generate_field_html(ui.item, "0"));

        /* Enable TinyMCE on Rich Text Field */
        forminix_builder_rich_text_enable_tinymce()

        /* Reload All Sortable */
        forminix_builder_reload_all_sortable()
    },
    appendTo: 'body',
    helper: 'clone'
};


const forminix_builder_sortable_options_2 = {
    connectWith: '.forminix_builder_single_form_element_column, .forminix_builder_form_elements',
    placeholder: "elements_placeholder",
    revert: false,
    receive: function(event, ui) {
        jQuery(this).find('.forminix_builder_sidebar_field').replaceWith(forminix_builder_generate_field_html(ui.item, "0"));

        /* Enable TinyMCE on Rich Text Field */
        forminix_builder_rich_text_enable_tinymce()

        /* Reload All Sortable */
        forminix_builder_reload_all_sortable()
    },
    appendTo: 'body',
    helper: 'clone'
};

function forminix_builder_check_unsaved_data_on_leave() {
    'use strict';
    window.onbeforeunload = function (e) {
        var new_data_for_unsaved_data_on_leave = {
            "form_name" : jQuery(".forminix_builder_form_name").text(),
            "form_fields" : JSON.stringify(forminix_builder_generate_html_to_json(jQuery(".forminix_builder_form_elements")))
        }
        if((old_data_for_unsaved_data_on_leave["form_name"] != new_data_for_unsaved_data_on_leave["form_name"])
            || old_data_for_unsaved_data_on_leave["form_fields"] != new_data_for_unsaved_data_on_leave["form_fields"]){
            e.preventDefault();
            e.returnValue = '';
        }
    };
}

function forminix_builder_leave(host) {
    'use strict';
    var new_data_for_unsaved_data_on_leave = {
        "form_name" : jQuery(".forminix_builder_form_name").text(),
        "form_fields" : JSON.stringify(forminix_builder_generate_html_to_json(jQuery(".forminix_builder_form_elements")))
    }
    if((old_data_for_unsaved_data_on_leave["form_name"] != new_data_for_unsaved_data_on_leave["form_name"])
        || old_data_for_unsaved_data_on_leave["form_fields"] != new_data_for_unsaved_data_on_leave["form_fields"]){
        if (confirm("Are you sure to leave unsaved?") == true) {
            forminix_forms_init(host);
            window.onbeforeunload = null;
        }
    }else{
        forminix_forms_init(host);
        window.onbeforeunload = null;
    }
}

function forminix_builder_reload_all_sortable() {
    'use strict';
    if (jQuery('.forminix_builder_form_elements').hasClass('ui-sortable')){
        jQuery(".forminix_builder_form_elements").sortable("destroy");
    }
    jQuery(".forminix_builder_single_form_element_column").each(function (i, object) {
        if (jQuery(object).hasClass('ui-sortable')){
            jQuery(object).sortable("destroy");
        }
    })
    jQuery(".forminix_builder_form_elements").sortable(forminix_builder_sortable_options_1);
    jQuery(".forminix_builder_single_form_element_column").sortable(forminix_builder_sortable_options_2);
}

function forminix_builder_init(host, form_id){
    'use strict';
    forminix_current_form_id = form_id
    forminix_hide_all();
    forminix_builder_nav_init()
    forminix_builder_slider_init()
    forminix_builder_drag_and_drop_init()
    forminix_builder_check_unsaved_data_on_leave()
    jQuery("#forminix_builder").show();

    if(forminix_current_form_id === "0"){
        jQuery(".forminix_builder_form_name").text("Untitled Form")
        jQuery(".forminix_builder_editor .forminix_builder_loader_container").hide()
        jQuery(".forminix_builder_editor .forminix_builder_form").show()
        jQuery(".forminix_builder_copy_shortcode").hide();
        jQuery(".forminix_builder_form_elements .forminix_builder_single_form_element_column_container").remove()
        jQuery(".forminix_builder_form_elements .forminix_builder_single_form_element").remove()
        jQuery(".forminix_builder_form_elements_empty").show()
        /* Update saved data with latest information */
        old_data_for_unsaved_data_on_leave["form_name"] = jQuery(".forminix_builder_form_name").text()
    }else{
        forminix_builder_fetch_form()
        jQuery(".forminix_builder_copy_shortcode").text("[forminix id=\""+forminix_current_form_id+"\"]").show();
    }

}


function forminix_builder_nav_init(){
    'use strict';

    jQuery(".forminix_builder_sidebar_nav_body").css("display", "none")
    jQuery(".forminix_builder_sidebar_nav_body[data-id='nav_fields']").show();
    jQuery( ".forminix_builder_sidebar_nav_item").removeClass('active');
    jQuery( ".forminix_builder_sidebar_nav_item[data-target='nav_fields']").addClass('active');

    jQuery( ".forminix_builder_sidebar_nav_item").unbind( "click" );
    jQuery( ".forminix_builder_sidebar_nav_item" ).bind( "click", function() {

        jQuery( ".forminix_builder_sidebar_nav_item").removeClass('active');
        jQuery(this).addClass('active');

        jQuery(".forminix_builder_sidebar_nav_body").css("display", "none")
        jQuery(".forminix_builder_sidebar_nav_body[data-id='"+jQuery(this).data('target')+"']").css("display", "flex")
    });

}

function forminix_builder_slider_init(){
    'use strict';

    jQuery(".forminix_builder_sidebar_slider_body").hide();
    jQuery(".forminix_builder_sidebar_slider_body[data-id='slider_general']").show();
    jQuery( ".forminix_builder_sidebar_slider_item").removeClass('active');
    jQuery( ".forminix_builder_sidebar_slider_item[data-slider='slider_general']").addClass('active');

    jQuery( ".forminix_builder_sidebar_slider_item").unbind( "click" );
    jQuery( ".forminix_builder_sidebar_slider_item" ).bind( "click", function() {

        jQuery( ".forminix_builder_sidebar_slider_item").removeClass('active');
        jQuery(this).addClass('active');

        jQuery(".forminix_builder_sidebar_slider_body").hide();
        jQuery(".forminix_builder_sidebar_slider_body[data-id='"+jQuery(this).data('slider')+"']").show();
    });

}


function forminix_builder_drag_and_drop_init(){
    'use strict';

    jQuery(".forminix_builder_sidebar_slider_body").hide();
    jQuery(".forminix_builder_sidebar_slider_body[data-id='slider_general']").show();


    forminix_builder_reload_all_sortable();

    jQuery( ".forminix_builder_form_elements_empty" ).droppable({
        accept: ".forminix_builder_sidebar_field",
        hoverClass: "drop_hover",
        drop: function( event, ui ) {

            jQuery( ".forminix_builder_form_elements" ).append(forminix_builder_generate_field_html(ui.draggable, "0"))
            forminix_builder_add_or_remove_submit_btn()

            /* Enable TinyMCE on Rich Text Field */
            forminix_builder_rich_text_enable_tinymce()

            /* Reload All Sortable */
            forminix_builder_reload_all_sortable()

            forminix_builder_check_elements_empty()

        }
    });

    jQuery( ".forminix_builder_sidebar_field" ).draggable({
        connectToSortable: '.forminix_builder_form_elements, .forminix_builder_single_form_element_column',
        start: function( event, ui ) {
            jQuery(ui.helper).addClass('drag_started');
        },
        appendTo: 'body',
        containment: ".forminix_builder_body",
        helper: 'clone',
    });


}


function forminix_builder_search_field(view){
    'use strict';
    var search_text = jQuery(view).val().toString().toLowerCase()

    jQuery(view).parent().parent().find(".forminix_builder_sidebar_field").each(function (i, object) {

        if (jQuery(object).find("h3").text().toLowerCase().indexOf(search_text) >= 0){
            jQuery(object).css("display", "flex")
        }else{
            jQuery(object).css("display", "none")
        }
    });
}


function forminix_builder_generate_unique_field_id(){
    'use strict';

    var forminix_builder_unique_field_id = []
    jQuery(".forminix_builder_single_form_element").each(function (i, object) {
        forminix_builder_unique_field_id.push(jQuery(object).attr("data-field_id"))
    });
    jQuery(".forminix_builder_single_form_element_column_container").each(function (i, object) {
        forminix_builder_unique_field_id.push(jQuery(object).attr("data-field_id"))
    });

    var id = Math.random().toString(36).substr(2, 9);
    while(jQuery.inArray(id, forminix_builder_unique_field_id) !== -1) {
        id = Math.random().toString(36).substr(2, 9);
    }
    forminix_builder_unique_field_id.push(id);
    return id;
}

function forminix_builder_list_all_attr(view) {
    'use strict';

    var array = {};
    view.each(function() {
        jQuery.each(this.attributes,function(i,a){
            if (!(a.value instanceof Object)){
                if (a.name.indexOf("data-") >= 0){
                    array[a.name.replace("data-", "")] = a.value;
                }
            }
        })
    })
    return array;
}


function forminix_builder_generate_field_html(view, field_id){
    'use strict';


    if(field_id === "0"){
        field_id = forminix_builder_generate_unique_field_id()
    }

    var data_html = 'data-field_id="'+field_id+'" ';


    jQuery.each(forminix_builder_list_all_attr(jQuery(view)), function(key, value) {
        data_html += 'data-'+key+'="'+value+'" '
    })


    var html = "";
    jQuery.each(jQuery(view).data(), function(key, value) {
        if (typeof value == "string") {
            jQuery(view).data(key, forminix_admin_unesc_string(value))
        }
    })
    switch(jQuery(view).data("slug")) {
        case "simple_text":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <input type=\"text\" placeholder=\""+jQuery(view).data("placeholder")+"\" value=\""+jQuery(view).data("default_value")+"\">\n" +
                "       </div>\n" +
                "   </div>"
            break;

        case "full_name":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <input type=\"text\" placeholder=\""+jQuery(view).data("placeholder")+"\" value=\""+jQuery(view).data("default_value")+"\">\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "email_address":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <input type=\"text\" placeholder=\""+jQuery(view).data("placeholder")+"\" value=\""+jQuery(view).data("default_value")+"\">\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "number":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <input type=\"number\" placeholder=\""+jQuery(view).data("placeholder")+"\" value=\""+jQuery(view).data("default_number_value")+"\">\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "password":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <input type=\"password\" placeholder=\""+jQuery(view).data("placeholder")+"\" value=\""+jQuery(view).data("default_value")+"\">\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "phone":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <input type=\"tel\" placeholder=\""+jQuery(view).data("placeholder")+"\" value=\""+jQuery(view).data("default_value")+"\">\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "website_url":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <input type=\"text\" placeholder=\""+jQuery(view).data("placeholder")+"\" value=\""+jQuery(view).data("default_value")+"\">\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "time":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <input type=\"time\" value=\""+jQuery(view).data("default_time_value")+"\">\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "date":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <input type=\"date\" value=\""+jQuery(view).data("default_date_value")+"\">\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "datetime":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <input type=\"datetime-local\" value=\""+jQuery(view).data("default_datetime_value")+"\">\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "dropdown":
            var options_arr = jQuery(view).data("options_dropdown").split('::forminix_separator::')
            var dropdown_placeholder = jQuery(view).data("placeholder_dropdown")
            var options = ""
            if(dropdown_placeholder.toString().trim().length > 0){
                options += "<option value=\"\">"+dropdown_placeholder+"</option>"
            }
            jQuery.each(options_arr, function(key, value) {
                options += "<option value=\""+value+"\">"+value+"</option>"
            });
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <select>"+options+"</select>\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "country":
            var options_arr = jQuery(view).data("options_dropdown").split('::forminix_separator::')
            var dropdown_placeholder = jQuery(view).data("placeholder_dropdown")
            var options = ""
            if(dropdown_placeholder.toString().trim().length > 0){
                options += "<option value=\"\">"+dropdown_placeholder+"</option>"
            }
            jQuery.each(options_arr, function(key, value) {
                options += "<option value=\""+value+"\">"+value+"</option>"
            });
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <select>"+options+"</select>\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "radio":
            var orientation = jQuery(view).data("orientation")
            var options_arr = jQuery(view).data("options_radio").split('::forminix_separator::')
            var options = ""
            jQuery.each(options_arr, function(key, value) {
                options += "<label class=\"radio_item\">"+value+"\n" +
                    "           <input type=\"radio\" name=\"radio_"+field_id+"\" value=\""+value+"\">\n" +
                    "           <span class=\"checkmark\"></span>\n" +
                    "       </label>"
            });

            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <div class=\"radio_container "+ (orientation == "2" ? "horizontal" : "") +" "+jQuery(view).data("option_alignment")+"\">\n" +
                "               "+options+"\n" +
                "           </div>\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "checkbox":
            var orientation = jQuery(view).data("orientation")
            var options_arr = jQuery(view).data("options_checkbox").split('::forminix_separator::')
            var options = ""
            jQuery.each(options_arr, function(key, value) {
                options += "<label class=\"checkbox_item\">"+value+"\n" +
                    "           <input type=\"checkbox\" value=\""+value+"\">\n" +
                    "           <span class=\"checkmark\"></span>\n" +
                    "       </label>"
            });

            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <div class=\"checkbox_container "+ (orientation == "2" ? "horizontal" : "") +" "+jQuery(view).data("option_alignment")+"\">\n" +
                "               "+options+"\n" +
                "           </div>\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "star_rating":
            var star_count = Number(jQuery(view).data("star_count"))
            var star_html = ""
            for(var i = star_count; i >= 1; i--){
                star_html += "<input name=\"star_rating_"+field_id+"\" type=\"radio\" id=\"star_rating_"+field_id+"_"+i+"\" value=\""+i+"\" />\n" +
                    "           <label for=\"star_rating_"+field_id+"_"+i+"\"></label>"
            }

            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <div class=\"forminix_star_rating_container "+jQuery(view).data("star_alignment")+"\">\n" +
                "               <div class=\"forminix_star_rating\">\n" +
                "                   "+star_html+"\n" +
                "               </div>\n" +
                "           </div>\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "text_area":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <textarea rows=\""+jQuery(view).data("textarea_rows")+"\">"+jQuery(view).data("default_textarea_value")+"</textarea>\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "submit_btn":
            html = "<div class=\"forminix_builder_single_form_element\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <div class=\"custom_btn_container "+jQuery(view).data("btn_alignment")+"\">\n" +
                "           <button class=\"custom_btn "+jQuery(view).data("btn_size")+"\" style=\"background: "+jQuery(view).data("btn_bg_color")+"; color: "+jQuery(view).data("btn_txt_color")+"\">"+jQuery(view).data("btn_text")+"</button>\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "file":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <div class=\"forminix_file_picker\">\n" +
                "               <input type=\"file\">\n" +
                "               <label>"+jQuery(view).data("file_placeholder")+"</label>\n" +
                "               <span>"+jQuery(view).data("file_btn_txt")+"</span>\n" +
                "           </div>\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "custom_html":
            html = "<div class=\"forminix_builder_single_form_element\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       "+forminix_admin_codify_string(jQuery(view).data("html"))+"\n" +
                "   </div>"
            break;
        case "grecaptcha":
            html = "<div class=\"forminix_builder_single_form_element\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <div class=\"forminix_builder_grecaptcha_container "+jQuery(view).data("grecaptcha_alignment")+ " " +jQuery(view).data("grecaptcha_theme") +"\">\n" +
                "           <div class=\"forminix_builder_grecaptcha\"></div>\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "address":
            html = "<div class=\"forminix_builder_single_form_element_column_container\" data-field_id=\""+field_id+"\" data-slug=\"2_column\" onclick=\"forminix_builder_populate_container_customizer(event, `"+field_id+"`)\">\n" +
                "       <div class=\"forminix_builder_single_form_element_column forminix_builder_column_container_empty\">\n" +
                "           "+forminix_builder_generate_field_html(jQuery(".forminix_builder_sidebar_field[data-slug='simple_text']").clone().attr("data-label", "Address Line 1"), "0")+"\n" +
                "           "+forminix_builder_generate_field_html(jQuery(".forminix_builder_sidebar_field[data-slug='simple_text']").clone().attr("data-label", "City"), "0")+"\n" +
                "           "+forminix_builder_generate_field_html(jQuery(".forminix_builder_sidebar_field[data-slug='simple_text']").clone().attr("data-label", "Zip Code"), "0")+"\n" +
                "       </div>\n" +
                "       <div class=\"forminix_builder_single_form_element_column forminix_builder_column_container_empty\">\n" +
                "           "+forminix_builder_generate_field_html(jQuery(".forminix_builder_sidebar_field[data-slug='simple_text']").clone().attr("data-label", "Address Line 2"), "0")+"\n" +
                "           "+forminix_builder_generate_field_html(jQuery(".forminix_builder_sidebar_field[data-slug='simple_text']").clone().attr("data-label", "State"), "0")+"\n" +
                "           "+forminix_builder_generate_field_html(jQuery(".forminix_builder_sidebar_field[data-slug='country']").clone().attr("data-label", "Country"), "0")+"\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "rich_text":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <textarea id=\"forminix_builder_rich_text_tinymce_"+field_id+"\" class=\"forminix_builder_rich_text_tinymce_field\">"+jQuery(view).data("default_rich_text_value")+"</textarea>\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "color_picker":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <div class=\"color_picker_area\">\n" +
                "               <input type=\"color\" value=\""+jQuery(view).data("default_color_value")+"\">\n" +
                "               <label>"+jQuery(view).data("default_color_value")+"</label>\n" +
                "           </div>\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "shortcode":
            html = "<div class=\"forminix_builder_single_form_element\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       "+jQuery(view).data("shortcode")+"\n" +
                "   </div>"
            break;
        case "single_range_slider":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <div class=\"forminix_builder_range_slider_tmp\">\n" +
                "               <div class=\"range_slider_tmp_container\">\n" +
                "                   <div class=\"slider_thumb_start\"></div>\n" +
                "                   <div class=\"slider_track\"></div>\n" +
                "               </div>\n" +
                "           </div>\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "dual_range_slider":
            html = "<div class=\"forminix_builder_single_form_element "+jQuery(view).data("label_position")+"\" "+data_html+" onclick=\"forminix_builder_populate_customizer(event, `"+field_id+"`)\">\n" +
                "       <label class=\"forminix_builder_element_label\">"+jQuery(view).data("label")+"</label>\n" +
                "       <div class=\"forminix_builder_element_field_main\">\n" +
                "           <div class=\"forminix_builder_range_slider_tmp\">\n" +
                "               <div class=\"range_slider_tmp_container\">\n" +
                "                   <div class=\"slider_thumb_start\"></div>\n" +
                "                   <div class=\"slider_thumb_end\"></div>\n" +
                "                   <div class=\"slider_track dual\"></div>\n" +
                "               </div>\n" +
                "           </div>\n" +
                "       </div>\n" +
                "   </div>"
            break;
        case "2_column":
            html = "<div class=\"forminix_builder_single_form_element_column_container\" "+data_html+" onclick=\"forminix_builder_populate_container_customizer(event, `"+field_id+"`)\">\n" +
                "       <div class=\"forminix_builder_single_form_element_column forminix_builder_column_container_empty\"></div>\n" +
                "       <div class=\"forminix_builder_single_form_element_column forminix_builder_column_container_empty\"></div>\n" +
                "   </div>"
            break;

        case "3_column":
            html = "<div class=\"forminix_builder_single_form_element_column_container\" "+data_html+" onclick=\"forminix_builder_populate_container_customizer(event, `"+field_id+"`)\">\n" +
                "       <div class=\"forminix_builder_single_form_element_column forminix_builder_column_container_empty\"></div>\n" +
                "       <div class=\"forminix_builder_single_form_element_column forminix_builder_column_container_empty\"></div>\n" +
                "       <div class=\"forminix_builder_single_form_element_column forminix_builder_column_container_empty\"></div>\n" +
                "   </div>"
            break;
        case "4_column":
            html = "<div class=\"forminix_builder_single_form_element_column_container\" "+data_html+" onclick=\"forminix_builder_populate_container_customizer(event, `"+field_id+"`)\">\n" +
                "       <div class=\"forminix_builder_single_form_element_column forminix_builder_column_container_empty\"></div>\n" +
                "       <div class=\"forminix_builder_single_form_element_column forminix_builder_column_container_empty\"></div>\n" +
                "       <div class=\"forminix_builder_single_form_element_column forminix_builder_column_container_empty\"></div>\n" +
                "       <div class=\"forminix_builder_single_form_element_column forminix_builder_column_container_empty\"></div>\n" +
                "   </div>"
            break;

        default:
            break;
    }
    return html;
}




function forminix_builder_customizer_generate_unique_tinymce_id(){
    'use strict';
    var forminix_builder_customizer_unique_tinymce_id = []
    jQuery(".forminix_builder_field_customizer .forminix_builder_field_customizer_tinymce_field").each(function (i, object) {
        forminix_builder_customizer_unique_tinymce_id.push(jQuery(object).attr("id"))
    });
    var id = Math.random().toString(36).substr(2, 9);
    while(jQuery.inArray(id, forminix_builder_customizer_unique_tinymce_id) !== -1) {
        id = Math.random().toString(36).substr(2, 9);
    }
    return id;
}
function forminix_builder_customizer_enable_tinymce(){
    'use strict';
    jQuery(".forminix_builder_field_customizer .forminix_builder_field_customizer_tinymce_field").each(function (i, object) {

        var field_name = jQuery(object).attr("id")

        var tinymce_plugins = 'textcolor,image,lists,link'
        if(tinymce.PluginManager.lookup.link === undefined){
            tinymce_plugins = 'textcolor,image,lists'
        }
        wp.editor.remove(field_name);
        wp.editor.initialize(field_name, {
            tinymce: {
                wpautop: true,
                plugins: tinymce_plugins,
                external_plugins: {
                    'code': forminix_default_js_var.tinymce_code_plugin,
                },
                toolbar1: 'formatselect,bold,italic,forecolor,removeformat,bullist,numlist,blockquote,alignleft,aligncenter,alignright,alignjustify,image,link,code',
                height : "200"
            }
        });

        tinymce.get(field_name).on('Paste Change input Undo Redo', function () {
            jQuery(object).val(tinymce.get(field_name).getContent()).trigger("change")
        });


    });
}

function forminix_builder_rich_text_enable_tinymce(){
    'use strict';
    jQuery(".forminix_builder_form_elements .forminix_builder_rich_text_tinymce_field").each(function (i, object) {

        var tinymce_height = jQuery(object).parent().parent().attr("data-rich_text_height");
        var toolbar_plugins = jQuery(object).parent().parent().attr("data-allowed_rich_text_plugins");
        var toolbar_plugins_arr = toolbar_plugins.split('::forminix_separator::');
        toolbar_plugins = toolbar_plugins_arr.join(",");

        var field_name = jQuery(object).attr("id")

        var tinymce_plugins = 'textcolor,image,lists,link'
        if(tinymce.PluginManager.lookup.link === undefined){
            tinymce_plugins = 'textcolor,image,lists'
        }
        wp.editor.remove(field_name);
        wp.editor.initialize(field_name, {
            tinymce: {
                wpautop: true,
                plugins: tinymce_plugins,
                external_plugins: {
                    'code': forminix_default_js_var.tinymce_code_plugin,
                },
                toolbar1: toolbar_plugins,
                height : tinymce_height
            }
        });
    });
}

function forminix_builder_populate_customizer(event, field_id){
    'use strict';
    event.stopPropagation();
    /* Blur Everything Except Selected and open customizer */
    jQuery( ".forminix_builder_sidebar_nav_item[data-target='nav_customize']" ).click()
    jQuery(".forminix_builder_single_form_element_column_container").removeClass("forminix_builder_element_selected")
    jQuery(".forminix_builder_single_form_element").removeClass("forminix_builder_element_selected")
    jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").addClass("forminix_builder_element_selected")
    /* Blur Everything Except Selected */

    jQuery(".forminix_builder_field_customizer").empty()

    jQuery.each(forminix_builder_list_all_attr(jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']")), function(key, value) {
        value = forminix_admin_unesc_string(value);
        var html = "";
        switch(key) {
            case "label":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Label</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "label_position":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Label Alignment</label>\n" +
                    "       <select onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <option value=\"label_top_left\"     "+(value === "label_top_left" ? "selected" : "")+"    >Top Left</option>\n" +
                    "           <option value=\"label_top_center\"     "+(value === "label_top_center" ? "selected" : "")+"    >Top Center</option>\n" +
                    "           <option value=\"label_top_right\"     "+(value === "label_top_right" ? "selected" : "")+"    >Top Right</option>\n" +
                    "           <option value=\"label_left_left\"     "+(value === "label_left_left" ? "selected" : "")+"    >Left Left</option>\n" +
                    "           <option value=\"label_left_center\"     "+(value === "label_left_center" ? "selected" : "")+"    >Left Center</option>\n" +
                    "           <option value=\"label_left_right\"     "+(value === "label_left_right" ? "selected" : "")+"    >Left Right</option>\n" +
                    "           <option value=\"label_right_left\"     "+(value === "label_right_left" ? "selected" : "")+"    >Right Left</option>\n" +
                    "           <option value=\"label_right_center\"     "+(value === "label_right_center" ? "selected" : "")+"    >Right Center</option>\n" +
                    "           <option value=\"label_right_right\"     "+(value === "label_right_right" ? "selected" : "")+"    >Right Right</option>\n" +
                    "           <option value=\"label_bottom_left\"     "+(value === "label_bottom_left" ? "selected" : "")+"    >Bottom Left</option>\n" +
                    "           <option value=\"label_bottom_center\"     "+(value === "label_bottom_center" ? "selected" : "")+"    >Bottom Center</option>\n" +
                    "           <option value=\"label_bottom_right\"     "+(value === "label_bottom_right" ? "selected" : "")+"    >Bottom Right</option>\n" +
                    "       </select>\n" +
                    "   </div>"
                break;
            case "placeholder":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Hint Text</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "file_placeholder":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Hint Text</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "default_value":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Default Value</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "default_number_value":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Default Value</label>\n" +
                    "       <input type=\"number\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "default_time_value":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Default Value</label>\n" +
                    "       <input type=\"time\" value=\""+value+"\" onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "default_date_value":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Default Value</label>\n" +
                    "       <input type=\"date\" value=\""+value+"\" onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "default_datetime_value":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Default Value</label>\n" +
                    "       <input type=\"datetime-local\" value=\""+value+"\" onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "default_textarea_value":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Default Value</label>\n" +
                    "       <textarea rows=\"3\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">"+value+"</textarea>\n" +
                    "   </div>"
                break;
            case "textarea_rows":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Rows</label>\n" +
                    "       <input type=\"number\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "html":
                var unique_tinymce_id = forminix_builder_customizer_generate_unique_tinymce_id();
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>HTML Code</label>\n" +
                    "       <textarea id=\""+unique_tinymce_id+"\" class=\"forminix_builder_field_customizer_tinymce_field\" onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">"+value+"</textarea>\n" +
                    "   </div>"
                break;
            case "default_rich_text_value":
                var unique_tinymce_id = forminix_builder_customizer_generate_unique_tinymce_id();
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Default Value</label>\n" +
                    "       <textarea id=\""+unique_tinymce_id+"\" class=\"forminix_builder_field_customizer_tinymce_field\" onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">"+value+"</textarea>\n" +
                    "       <p>Changes will reflect on live form only.</p>\n" +
                    "   </div>"
                break;
            case "rich_text_height":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Height (px)</label>\n" +
                    "       <input type=\"number\" value=\""+value+"\" oninput=\"event.target.value = event.target.value.replace(/[^0-9]*/g,'');\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "       <p>Changes will reflect on live form only.</p>\n" +
                    "   </div>"
                break;
            case "allowed_rich_text_plugins":
                var allowed_rich_text_plugins = value.split('::forminix_separator::')
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Allowed Toolbar Plugins</label>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"undo\"         "+((jQuery.inArray("undo", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"           >Undo</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"redo\"         "+((jQuery.inArray("redo", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"                >Redo</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"formatselect\" "+((jQuery.inArray("formatselect", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"   >Format Selection</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"bold\"         "+((jQuery.inArray("bold", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"           >Bold Format</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"italic\"       "+((jQuery.inArray("italic", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"         >Italic Format</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"forecolor\"    "+((jQuery.inArray("forecolor", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"      >Text Color</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"removeformat\" "+((jQuery.inArray("removeformat", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"   >Format Remover</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"bullist\"      "+((jQuery.inArray("bullist", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"        >Bullet List</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"numlist\"      "+((jQuery.inArray("numlist", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"        >Numbered List</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"blockquote\"   "+((jQuery.inArray("blockquote", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"     >Block Quote</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"alignleft\"    "+((jQuery.inArray("alignleft", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"      >Left Align</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"aligncenter\"  "+((jQuery.inArray("aligncenter", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"    >Center Align</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"alignright\"   "+((jQuery.inArray("alignright", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"     >Right Align</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"alignjustify\" "+((jQuery.inArray("alignjustify", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"   >Justify Align</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"image\"        "+((jQuery.inArray("image", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"          >Image</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"link\"         "+((jQuery.inArray("link", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"           >Link</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"code\"         "+((jQuery.inArray("code", allowed_rich_text_plugins) !== -1) ? "checked" : "")+"           >Code Dialog</div>\n" +
                    "   </div>"
                break;
            case "max_filesize":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Maximum Filesize (Kilobyte)</label>\n" +
                    "       <input type=\"number\" value=\""+value+"\" oninput=\"event.target.value = event.target.value.replace(/[^0-9]*/g,'');\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "       <p>Keep empty for no filesize limit.</p>\n" +
                    "   </div>"
                break;
            case "allowed_file_ext":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Allowed File Extensions</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" placeholder=\"Ex: .jpg,.png,.pdf\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "       <p>Keep empty for no restriction.</p>\n" +
                    "   </div>"
                break;
            case "file_to_media_library":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Add to Media Library</label>\n" +
                    "       <select onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <option value=\"0\"     "+(value === "0" ? "selected" : "")+"    >No</option>\n" +
                    "           <option value=\"1\"     "+(value === "1" ? "selected" : "")+"    >Yes</option>\n" +
                    "       </select>\n" +
                    "   </div>"
                break;
            case "allow_multiple_file":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Allow Multiple File Upload</label>\n" +
                    "       <select onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <option value=\"0\"     "+(value === "0" ? "selected" : "")+"    >No</option>\n" +
                    "           <option value=\"1\"     "+(value === "1" ? "selected" : "")+"    >Yes</option>\n" +
                    "       </select>\n" +
                    "   </div>"
                break;
            case "min_length":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Minimum Length</label>\n" +
                    "       <input type=\"number\" value=\""+value+"\" oninput=\"event.target.value = event.target.value.replace(/[^0-9]*/g,'');\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "       <p>Keep empty for no length limit.</p>\n" +
                    "   </div>"
                break;
            case "max_length":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Maximum Length</label>\n" +
                    "       <input type=\"number\" value=\""+value+"\" oninput=\"event.target.value = event.target.value.replace(/[^0-9]*/g,'');\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "       <p>Keep empty for no length limit.</p>\n" +
                    "   </div>"
                break;
            case "min_value":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Minimum Value</label>\n" +
                    "       <input type=\"number\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "       <p>Keep empty for no minimum value limit.</p>\n" +
                    "   </div>"
                break;
            case "max_value":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Maximum Value</label>\n" +
                    "       <input type=\"number\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "       <p>Keep empty for no maximum value limit.</p>\n" +
                    "   </div>"
                break;
            case "allow_decimal":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Allow Decimal Value</label>\n" +
                    "       <select onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <option value=\"0\"     "+(value === "0" ? "selected" : "")+"    >No</option>\n" +
                    "           <option value=\"1\"     "+(value === "1" ? "selected" : "")+"    >Yes</option>\n" +
                    "       </select>\n" +
                    "   </div>"
                break;
            case "grecaptcha_site_key":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Site Key</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "       <p>Get you reCAPTCHA v2 site key from <a target=\"_blank\" href=\"http://www.google.com/recaptcha/admin\">here</a>.</p>\n" +
                    "   </div>"
                break;
            case "grecaptcha_secret_key":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Secret Key</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "       <p>Get you reCAPTCHA v2 secret key from <a target=\"_blank\" href=\"http://www.google.com/recaptcha/admin\">here</a>.</p>\n" +
                    "   </div>"
                break;
            case "grecaptcha_theme":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Theme</label>\n" +
                    "       <select onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <option value=\"light\"     "+(value === "light" ? "selected" : "")+"    >Light</option>\n" +
                    "           <option value=\"dark\"     "+(value === "dark" ? "selected" : "")+"    >Dark</option>\n" +
                    "       </select>\n" +
                    "   </div>"
                break;
            case "grecaptcha_alignment":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Alignment</label>\n" +
                    "       <select onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <option value=\"left\"     "+(value === "left" ? "selected" : "")+"    >Left</option>\n" +
                    "           <option value=\"center\"     "+(value === "center" ? "selected" : "")+"    >Center</option>\n" +
                    "           <option value=\"right\"     "+(value === "right" ? "selected" : "")+"    >Right</option>\n" +
                    "       </select>\n" +
                    "   </div>"
                break;
            case "required":
                html = "<div class=\"forminix_builder_single_field_customizer field_required\">\n" +
                    "       <label>Required Field</label>\n" +
                    "       <select onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <option value=\"0\"     "+(value === "0" ? "selected" : "")+"    >No</option>\n" +
                    "           <option value=\"1\"     "+(value === "1" ? "selected" : "")+"    >Yes</option>\n" +
                    "       </select>\n" +
                    "   </div>"
                break;
            case "required_error_msg":

                var is_field_required = jQuery(".forminix_builder_field_customizer .field_required select").val()
                var style_code = ""
                if(is_field_required == "0") {
                    style_code = "display: none;"
                }
                html = "<div class=\"forminix_builder_single_field_customizer required_error_msg\" style=\""+style_code+"\">\n" +
                    "       <label>Error Message</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "       <p>Message to show if validation fails for Required.</p>\n" +
                    "   </div>"
                break;
            case "country_flag_phone":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Show Country Flag</label>\n" +
                    "       <select onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <option value=\"0\"     "+(value === "0" ? "selected" : "")+"    >No</option>\n" +
                    "           <option value=\"1\"     "+(value === "1" ? "selected" : "")+"    >Yes</option>\n" +
                    "       </select>\n" +
                    "   </div>"
                break;
            case "orientation":
                html = "<div class=\"forminix_builder_single_field_customizer display_orientation\">\n" +
                    "       <label>Display Orientation</label>\n" +
                    "       <select onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <option value=\"1\"     "+(value === "1" ? "selected" : "")+"    >Vertical</option>\n" +
                    "           <option value=\"2\"     "+(value === "2" ? "selected" : "")+"    >Horizontal</option>\n" +
                    "       </select>\n" +
                    "   </div>"
                break;
            case "allowed_chars":
                var allowed_chars_arr = value.split('::forminix_separator::')
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Allowed Characters</label>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"a\"      "+((jQuery.inArray("a", allowed_chars_arr) !== -1) ? "checked" : "")+"    >Alphabets</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"u\"      "+((jQuery.inArray("u", allowed_chars_arr) !== -1) ? "checked" : "")+"    >Unicode</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"s\"      "+((jQuery.inArray("s", allowed_chars_arr) !== -1) ? "checked" : "")+"    >Spaces</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\".\"      "+((jQuery.inArray(".", allowed_chars_arr) !== -1) ? "checked" : "")+"    >Dots</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"-\"      "+((jQuery.inArray("-", allowed_chars_arr) !== -1) ? "checked" : "")+"    >Hyphens</div>\n" +
                    "       <div class=\"checkbox_area\"><input type=\"checkbox\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"d\"      "+((jQuery.inArray("d", allowed_chars_arr) !== -1) ? "checked" : "")+"    >Numbers</div>\n" +
                    "   </div>"
                break;
            case "placeholder_dropdown":
                html = "<div class=\"forminix_builder_single_field_customizer dropdown_placeholder\">\n" +
                    "       <label>Placeholder</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "options_dropdown":
                var options_arr = value.split('::forminix_separator::')
                html = "<div class=\"forminix_builder_single_field_customizer dropdown_options\">\n" +
                    "       <label>Options</label>\n" +
                    "       <textarea rows=\"3\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">"+options_arr.join("\n")+"</textarea>\n" +
                    "       <p>Write each option in different line.</p>\n" +
                    "   </div>"
                break;
            case "options_radio":
                var options_arr = value.split('::forminix_separator::')
                html = "<div class=\"forminix_builder_single_field_customizer dropdown_options\">\n" +
                    "       <label>Options</label>\n" +
                    "       <textarea rows=\"3\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">"+options_arr.join("\n")+"</textarea>\n" +
                    "       <p>Write each option in different line.</p>\n" +
                    "   </div>"
                break;
            case "options_checkbox":
                var options_arr = value.split('::forminix_separator::')
                html = "<div class=\"forminix_builder_single_field_customizer dropdown_options\">\n" +
                    "       <label>Options</label>\n" +
                    "       <textarea rows=\"3\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">"+options_arr.join("\n")+"</textarea>\n" +
                    "       <p>Write each option in different line.</p>\n" +
                    "   </div>"
                break;
            case "option_alignment":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Options Alignment</label>\n" +
                    "       <select onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <option value=\"left\"     "+(value === "left" ? "selected" : "")+"    >Left</option>\n" +
                    "           <option value=\"center\"     "+(value === "center" ? "selected" : "")+"    >Center</option>\n" +
                    "           <option value=\"right\"     "+(value === "right" ? "selected" : "")+"    >Right</option>\n" +
                    "       </select>\n" +
                    "   </div>"
                break;
            case "star_alignment":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Stars Alignment</label>\n" +
                    "       <select onchange=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <option value=\"left\"     "+(value === "left" ? "selected" : "")+"    >Left</option>\n" +
                    "           <option value=\"center\"     "+(value === "center" ? "selected" : "")+"    >Center</option>\n" +
                    "           <option value=\"right\"     "+(value === "right" ? "selected" : "")+"    >Right</option>\n" +
                    "       </select>\n" +
                    "   </div>"
                break;
            case "star_count":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Number of Stars</label>\n" +
                    "       <input type=\"number\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "default_color_value":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Default Color</label>\n" +
                    "       <div class=\"color_picker_area\">\n" +
                    "           <input type=\"color\" id=\"forminix_builder_color_field_default_color\" value=\""+value+"\" oninput=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <label for=\"forminix_builder_color_field_default_color\">Select Color</label>\n" +
                    "       </div>\n" +
                    "   </div>"
                break;
            case "shortcode":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Shortcode</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "default_single_range_value":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Default Range Value</label>\n" +
                    "       <input type=\"number\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "default_dual_range_min_value":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Default Minimum Value</label>\n" +
                    "       <input type=\"number\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "default_dual_range_max_value":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Default Maximum Value</label>\n" +
                    "       <input type=\"number\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "min_range_value":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Minimum Range Value</label>\n" +
                    "       <input type=\"number\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "max_range_value":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Maximum Range Value</label>\n" +
                    "       <input type=\"number\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "help_msg":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Help Message</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "       <p>Help message to show as tooltip next label.</p>\n" +
                    "   </div>"
                break;
            case "name":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Name Attribute</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" oninput=\"event.target.value = event.target.value.replace(/[^a-zA-Z0-9-_]*/g,'');\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "       <p>Only a-z, 0-9, underscore and hyphen allowed.</p>\n" +
                    "   </div>"
                break;
            case "container_class":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Container Class</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "field_class":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Field Class</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "btn_text":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Button Text</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "btn_alignment":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Button Alignment</label>\n" +
                    "       <div class=\"radio_area horizontal\"><input type=\"radio\" name=\"forminix_builder_btn_alignment\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"left\"      "+(value === "left" ? "checked" : "")+"    >Left</div>\n" +
                    "       <div class=\"radio_area horizontal\"><input type=\"radio\" name=\"forminix_builder_btn_alignment\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"center\"      "+(value === "center" ? "checked" : "")+"    >Center</div>\n" +
                    "       <div class=\"radio_area horizontal\"><input type=\"radio\" name=\"forminix_builder_btn_alignment\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"right\"      "+(value === "right" ? "checked" : "")+"    >Right</div>\n" +
                    "   </div>"
                break;
            case "btn_size":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Button Size</label>\n" +
                    "       <div class=\"radio_area\"><input type=\"radio\" name=\"forminix_builder_btn_size\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"small\"      "+(value === "small" ? "checked" : "")+"    >Small</div>\n" +
                    "       <div class=\"radio_area\"><input type=\"radio\" name=\"forminix_builder_btn_size\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"medium\"      "+(value === "medium" ? "checked" : "")+"    >Medium</div>\n" +
                    "       <div class=\"radio_area\"><input type=\"radio\" name=\"forminix_builder_btn_size\" onclick=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\" value=\"large\"      "+(value === "large" ? "checked" : "")+"    >Large</div>\n" +
                    "   </div>"
                break;
            case "btn_bg_color":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Button Background Color</label>\n" +
                    "       <div class=\"color_picker_area\">\n" +
                    "           <input type=\"color\" id=\"forminix_builder_btn_bg_color\" value=\""+value+"\" oninput=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <label for=\"forminix_builder_btn_bg_color\">Select Color</label>\n" +
                    "       </div>\n" +
                    "   </div>"
                break;
            case "btn_txt_color":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Button Text Color</label>\n" +
                    "       <div class=\"color_picker_area\">\n" +
                    "           <input type=\"color\" id=\"forminix_builder_btn_txt_color\" value=\""+value+"\" oninput=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <label for=\"forminix_builder_btn_txt_color\">Select Color</label>\n" +
                    "       </div>\n" +
                    "   </div>"
                break;
            case "file_btn_txt":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Upload Button Text</label>\n" +
                    "       <input type=\"text\" value=\""+value+"\" onkeyup=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "   </div>"
                break;
            case "file_btn_bg_color":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Button Background Color</label>\n" +
                    "       <div class=\"color_picker_area\">\n" +
                    "           <input type=\"color\" id=\"forminix_builder_file_btn_bg_color\" value=\""+value+"\" oninput=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <label for=\"forminix_builder_file_btn_bg_color\">Select Color</label>\n" +
                    "       </div>\n" +
                    "   </div>"
                break;
            case "file_btn_txt_color":
                html = "<div class=\"forminix_builder_single_field_customizer\">\n" +
                    "       <label>Button Text Color</label>\n" +
                    "       <div class=\"color_picker_area\">\n" +
                    "           <input type=\"color\" id=\"forminix_builder_file_btn_txt_color\" value=\""+value+"\" oninput=\"forminix_builder_save_customizer_data(`"+field_id+"`, this, '"+key+"')\">\n" +
                    "           <label for=\"forminix_builder_file_btn_txt_color\">Select Color</label>\n" +
                    "       </div>\n" +
                    "   </div>"
                break;
            default:
                break;
        }
        jQuery(".forminix_builder_field_customizer").append(html);
        forminix_builder_customizer_enable_tinymce();
    })

    /* Append Delete Button */
    jQuery(".forminix_builder_field_customizer").append("<div class=\"forminix_builder_field_customizer_actions\">\n" +
        "                    <button class=\"forminix_builder_field_delete_btn\" onclick=\"forminix_builder_delete_field(`"+field_id+"`)\">Delete Field</button>\n" +
        "                </div>");
}

function forminix_builder_populate_container_customizer(event, field_id) {
    'use strict';
    event.stopPropagation();
    /* Blur Everything Except Selected and open customizer */
    jQuery( ".forminix_builder_sidebar_nav_item[data-target='nav_customize']" ).click()
    jQuery(".forminix_builder_single_form_element_column_container").removeClass("forminix_builder_element_selected")
    jQuery(".forminix_builder_single_form_element").removeClass("forminix_builder_element_selected")
    jQuery(".forminix_builder_single_form_element_column_container[data-field_id='" + field_id + "']").addClass("forminix_builder_element_selected")
    /* Blur Everything Except Selected */

    jQuery(".forminix_builder_field_customizer").empty()
    /* Append Delete Button */
    jQuery(".forminix_builder_field_customizer").append("<div class=\"forminix_builder_field_customizer_actions\">\n" +
        "                    <button class=\"forminix_builder_field_delete_btn\" onclick=\"forminix_builder_delete_container(`"+field_id+"`)\">Delete Container</button>\n" +
        "                </div>");
}



function forminix_builder_delete_field(field_id){
    jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").remove()
    forminix_builder_check_elements_empty()
    forminix_builder_add_or_remove_submit_btn()
    jQuery(".forminix_builder_field_customizer").empty()
    jQuery( ".forminix_builder_sidebar_nav_item[data-target='nav_fields']" ).click()
}
function forminix_builder_delete_container(field_id){
    jQuery(".forminix_builder_single_form_element_column_container[data-field_id='" + field_id + "']").remove()
    forminix_builder_check_elements_empty()
    jQuery(".forminix_builder_field_customizer").empty()
    jQuery( ".forminix_builder_sidebar_nav_item[data-target='nav_fields']" ).click()
}

function forminix_builder_save_customizer_data(field_id, customizer_field, key){
    'use strict';

    var customizer_field_escaped_value = forminix_admin_esc_string(jQuery(customizer_field).val())
    var customizer_field_unescaped_value = jQuery(customizer_field).val()

    switch(key) {
        case "label":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").find("label").eq(0).text(customizer_field_unescaped_value)
            break;
        case "label_position":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']")
                .removeClass("label_top_left")
                .removeClass("label_top_center")
                .removeClass("label_top_right")
                .removeClass("label_left_left")
                .removeClass("label_left_center")
                .removeClass("label_left_right")
                .removeClass("label_right_left")
                .removeClass("label_right_center")
                .removeClass("label_right_right")
                .removeClass("label_bottom_left")
                .removeClass("label_bottom_center")
                .removeClass("label_bottom_right")
                .addClass(customizer_field_unescaped_value);
            break;
        case "placeholder":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] input").attr("placeholder", customizer_field_unescaped_value)
            break;
        case "file_placeholder":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] .forminix_file_picker label").text(customizer_field_unescaped_value)
            break;
        case "required":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            if(customizer_field_unescaped_value == "0") {
                jQuery(customizer_field).parent().parent().find(".required_error_msg").hide()
            }else if(customizer_field_unescaped_value == "1"){
                jQuery(customizer_field).parent().parent().find(".required_error_msg").show()
            }
            break;
        case "required_error_msg":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "country_flag_phone":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "default_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] input").val(customizer_field_unescaped_value)
            break;
        case "default_number_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] input").val(customizer_field_unescaped_value)
            break;
        case "default_time_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] input").val(customizer_field_unescaped_value)
            break;
        case "default_date_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] input").val(customizer_field_unescaped_value)
            break;
        case "default_datetime_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] input").val(customizer_field_unescaped_value)
            break;
        case "default_textarea_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] textarea").val(customizer_field_unescaped_value)
            break;
        case "textarea_rows":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] textarea").attr("rows", customizer_field_unescaped_value)
            break;
        case "html":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").html(customizer_field_unescaped_value)
            break;
        case "default_rich_text_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            tinymce.get("forminix_builder_rich_text_tinymce_"+field_id).setContent(customizer_field_unescaped_value)
            break;
        case "rich_text_height":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            /* Enable TinyMCE on Rich Text Field */
            forminix_builder_rich_text_enable_tinymce()
            break;
        case "allowed_rich_text_plugins":
            var allowed_rich_text_plugins_arr = []
            jQuery(customizer_field).parent().parent().find("input[type='checkbox']").each(function(){
                if(jQuery(this).is(':checked')){
                    allowed_rich_text_plugins_arr.push(jQuery(this).val())
                }
            });
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, allowed_rich_text_plugins_arr.join("::forminix_separator::"))
            /* Enable TinyMCE on Rich Text Field */
            forminix_builder_rich_text_enable_tinymce()
            break;
        case "max_filesize":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "allowed_file_ext":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "file_to_media_library":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "allow_multiple_file":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "min_length":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "max_length":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "min_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "max_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "allow_decimal":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "orientation":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            if(customizer_field_unescaped_value == "2"){
                jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] input").parent().parent().addClass("horizontal")
            }else{
                jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] input").parent().parent().removeClass("horizontal")
            }
            break;
        case "allowed_chars":
            var allowed_chars_arr = []
            jQuery(customizer_field).parent().parent().find("input[type='checkbox']").each(function(){
                if(jQuery(this).is(':checked')){
                    allowed_chars_arr.push(jQuery(this).val())
                }
            });
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, allowed_chars_arr.join("::forminix_separator::"))
            break;
        case "placeholder_dropdown":
            var options_arr = jQuery(customizer_field).parent().parent().find(".dropdown_options textarea").val().split('\n')
            var dropdown_placeholder = customizer_field_unescaped_value
            var options_arr_formatted = []
            jQuery.each(options_arr, function(key, value) {
                if(value.toString().trim().length > 0){options_arr_formatted.push(value.toString().trim())}
            });
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] select").empty()
            if(dropdown_placeholder.toString().trim().length > 0){
                jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] select").append(
                    jQuery("<option></option>").attr("value", "").text(dropdown_placeholder)
                );
            }
            jQuery.each(options_arr_formatted, function(key, value) {
                jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] select").append(
                    jQuery("<option></option>").attr("value", value).text(value)
                );
            });
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "options_dropdown":
            var options_arr = customizer_field_escaped_value.split('\n')
            var dropdown_placeholder = jQuery(customizer_field).parent().parent().find(".dropdown_placeholder input[type='text']").val()
            var options_arr_formatted = []
            jQuery.each(options_arr, function(key, value) {
                if(value.toString().trim().length > 0){options_arr_formatted.push(value.toString().trim())}
            });
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] select").empty()
            if(dropdown_placeholder.toString().trim().length > 0){
                jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] select").append(
                    jQuery("<option></option>").attr("value", "").text(forminix_admin_unesc_string(dropdown_placeholder))
                );
            }
            jQuery.each(options_arr_formatted, function(key, value) {
                jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] select").append(
                    jQuery("<option></option>").attr("value", value).text(value)
                );
            });
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, options_arr_formatted.join("::forminix_separator::"))
            break;
        case "options_radio":
            var options_arr = customizer_field_escaped_value.split('\n')
            var options_arr_formatted = []
            jQuery.each(options_arr, function(key, value) {
                if(value.toString().trim().length > 0){options_arr_formatted.push(value.toString().trim())}
            });
            if(options_arr_formatted.length === 0){
                options_arr_formatted.push("&nbsp;")
            }
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] label.radio_item").remove()
            jQuery.each(options_arr_formatted, function(key, value) {
                jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] div.radio_container").append(
                    "<label class=\"radio_item\">"+forminix_admin_unesc_string(value)+"\n" +
                    "    <input type=\"radio\" name=\"radio_"+field_id+"\" value=\""+value+"\">\n" +
                    "    <span class=\"checkmark\"></span>\n" +
                    "</label>"
                );
            });
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, options_arr_formatted.join("::forminix_separator::"))
            break;
        case "options_checkbox":
            var options_arr = customizer_field_escaped_value.split('\n')
            var options_arr_formatted = []
            jQuery.each(options_arr, function(key, value) {
                if(value.toString().trim().length > 0){options_arr_formatted.push(value.toString().trim())}
            });
            if(options_arr_formatted.length === 0){
                options_arr_formatted.push("&nbsp;")
            }
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] label.checkbox_item").remove()
            jQuery.each(options_arr_formatted, function(key, value) {
                jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] div.checkbox_container").append(
                    "<label class=\"checkbox_item\">"+forminix_admin_unesc_string(value)+"\n" +
                    "    <input type=\"checkbox\" value=\""+value+"\">\n" +
                    "    <span class=\"checkmark\"></span>\n" +
                    "</label>"
                );
            });
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, options_arr_formatted.join("::forminix_separator::"))
            break;
        case "option_alignment":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").find("div").eq(1)
                .removeClass("left")
                .removeClass("center")
                .removeClass("right")
                .addClass(customizer_field_unescaped_value);
            break;
        case "star_alignment":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").find("div").eq(1)
                .removeClass("left")
                .removeClass("center")
                .removeClass("right")
                .addClass(customizer_field_unescaped_value);
            break;
        case "star_count":
            var star_count = Number(customizer_field_escaped_value)
            var star_html = ""
            for(var i = star_count; i >= 1; i--){
                star_html += "<input name=\"star_rating_"+field_id+"\" type=\"radio\" id=\"star_rating_"+field_id+"_"+i+"\" value=\""+i+"\" />\n" +
                    "           <label for=\"star_rating_"+field_id+"_"+i+"\"></label>"
            }
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] .forminix_star_rating").empty().append(star_html)

            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "default_color_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").find("input").val(customizer_field_unescaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] .color_picker_area").find("label").text(customizer_field_unescaped_value)
            break;
        case "shortcode":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").text(customizer_field_unescaped_value)
            break;
        case "default_single_range_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "default_dual_range_min_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "default_dual_range_max_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "min_range_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "max_range_value":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "help_msg":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "name":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "grecaptcha_site_key":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "grecaptcha_secret_key":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "grecaptcha_theme":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").find("div").eq(0)
                .removeClass("light")
                .removeClass("dark")
                .addClass(customizer_field_unescaped_value);
            break;
        case "grecaptcha_alignment":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").find("div").eq(0)
                .removeClass("left")
                .removeClass("center")
                .removeClass("right")
                .addClass(customizer_field_unescaped_value);
            break;
        case "container_class":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "field_class":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            break;
        case "btn_text":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] button.custom_btn").text(customizer_field_unescaped_value)
            break;
        case "btn_alignment":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] div.custom_btn_container").removeClass("left").removeClass("center").removeClass("right").addClass(customizer_field_unescaped_value)
            break;
        case "btn_size":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] button.custom_btn").removeClass("small").removeClass("medium").removeClass("large").addClass(customizer_field_unescaped_value)
            break;
        case "btn_bg_color":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] button.custom_btn").css("background", customizer_field_escaped_value)
            break;
        case "btn_txt_color":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] button.custom_btn").css("color", customizer_field_escaped_value)
            break;
        case "file_btn_txt":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] .forminix_file_picker span").text(customizer_field_unescaped_value)
            break;
        case "file_btn_bg_color":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] .forminix_file_picker span").css("background", customizer_field_escaped_value)
            break;
        case "file_btn_txt_color":
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "']").attr("data-"+key, customizer_field_escaped_value)
            jQuery(".forminix_builder_single_form_element[data-field_id='" + field_id + "'] .forminix_file_picker span").css("color", customizer_field_escaped_value)
            break;
        default:
            break;
    }
}



function forminix_builder_check_elements_empty(){
    'use strict';

    var number_of_view = 0
    jQuery(".forminix_builder_single_form_element").each(function (i, object) {
        number_of_view++;
    });
    jQuery(".forminix_builder_single_form_element_column_container").each(function (i, object) {
        number_of_view++;
    });

    if(number_of_view === 0){
        jQuery(".forminix_builder_form_elements_empty").show()
    }else{
        jQuery(".forminix_builder_form_elements_empty").hide()
    }
}



function forminix_builder_add_or_remove_submit_btn(){
    'use strict';

    var number_of_view = 0
    var number_of_existing_btn = 0
    jQuery(".forminix_builder_single_form_element[data-slug!='submit_btn']").each(function (i, object) {
        number_of_view++;
    });
    jQuery(".forminix_builder_single_form_element[data-slug='submit_btn']").each(function (i, object) {
        number_of_existing_btn++;
    });

    if(number_of_view === 0){
        if(number_of_existing_btn > 0){
            var submit_btn_field_id = ""
            submit_btn_field_id = jQuery( ".forminix_builder_single_form_element[data-slug='submit_btn']" ).attr("data-field_id")
            if(submit_btn_field_id.toString().trim().length > 0){
                forminix_builder_delete_field(submit_btn_field_id)
            }
        }
    }else if(number_of_view === 1){
        if(number_of_existing_btn === 0){
            jQuery( ".forminix_builder_form_elements" ).append(forminix_builder_generate_field_html(jQuery(".forminix_builder_sidebar_field[data-slug='submit_btn']"), "0"))
        }
    }
}



function forminix_builder_generate_html_to_json(root_obj) {
    'use strict';
    var forminix_builder_base_skeleton = []

    root_obj.children().each(function (i, object) {
        if(jQuery(object).hasClass("forminix_builder_single_form_element")){
            var single_field_data = {}
            jQuery.each(forminix_builder_list_all_attr(jQuery(object)), function(key, value) {
                single_field_data[key] = value
            })
            var single_field = {}
            single_field["type"] = "field"
            single_field["field_data"] = single_field_data

            forminix_builder_base_skeleton.push(single_field)
        }

        if(jQuery(object).hasClass("forminix_builder_single_form_element_column")){
            var single_column = {}
            single_column["type"] = "column"
            single_column["data"] = forminix_builder_generate_html_to_json(jQuery(object))
            forminix_builder_base_skeleton.push(single_column)
        }

        if(jQuery(object).hasClass("forminix_builder_single_form_element_column_container")){

            var single_container_data = {}
            jQuery.each(forminix_builder_list_all_attr(jQuery(object)), function(key, value) {
                single_container_data[key] = value
            })

            var single_container = {}
            single_container["type"] = "column_container"
            single_container["container_data"] = single_container_data
            single_container["data"] = forminix_builder_generate_html_to_json(jQuery(object))
            forminix_builder_base_skeleton.push(single_container)
        }
    });
    return forminix_builder_base_skeleton;
}


function forminix_builder_generate_json_to_html(jsonObject) {
    'use strict';

    var html = "";
    jQuery.each(jsonObject, function(i, item) {

        if(item.type === "field"){
            var field_id = ""
            var field_data = ""
            jQuery.each(item.field_data, function(key, value) {
                if(key === "field_id"){
                    field_id = value
                }else{
                    field_data += "data-"+key+"=\""+value+"\" "
                }
            })
            html += forminix_builder_generate_field_html(jQuery("<div "+field_data+"></div>"), field_id)
        }


        if(item.type === "column_container"){
            var field_id = ""
            var column_container_data = ""
            jQuery.each(item.container_data, function(key, value) {
                if(key === "field_id"){
                    field_id = value
                }
                column_container_data += "data-"+key+"=\""+value+"\" "
            })
            html += "<div class=\"forminix_builder_single_form_element_column_container\" "+column_container_data+" onclick=\"forminix_builder_populate_container_customizer(event, `"+field_id+"`)\">"
            html += forminix_builder_generate_json_to_html(item.data)
            html += "</div>"
        }


        if(item.type === "column"){
            html += "<div class=\"forminix_builder_single_form_element_column forminix_builder_column_container_empty\">"
            html += forminix_builder_generate_json_to_html(item.data)
            html += "</div>"
        }

    });


    return html;
}



function forminix_builder_save_form() {
    'use strict';

    jQuery(".forminix_builder_save_form_btn").text("Saving...")

    var post_data = {
        'action': 'forminix_update_form',
        'form_id': forminix_current_form_id,
        'form_name': jQuery(".forminix_builder_form_name").text(),
        'form_fields': JSON.stringify(forminix_builder_generate_html_to_json(jQuery(".forminix_builder_form_elements")))
    };

    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if(obj.status === "true"){

                /* Update saved data with latest information */
                old_data_for_unsaved_data_on_leave = {
                    "form_name" : jQuery(".forminix_builder_form_name").text(),
                    "form_fields" : JSON.stringify(forminix_builder_generate_html_to_json(jQuery(".forminix_builder_form_elements")))
                }

                forminix_current_form_id = obj.form_id

                jQuery(".forminix_builder_copy_shortcode").text("[forminix id=\""+forminix_current_form_id+"\"]").show();

                jQuery(".forminix_builder_save_form_btn").text("Saved!")
                setTimeout(function() {
                    jQuery(".forminix_builder_save_form_btn").text("Save Form")
                }, 1500);
            }
        }
    })
}

function forminix_builder_fetch_form() {
    'use strict';

    jQuery(".forminix_builder_form_elements").empty()
    jQuery(".forminix_builder_editor .forminix_builder_form").hide()
    jQuery(".forminix_builder_editor .forminix_builder_loader_container").show()

    var post_data = {
        'action': 'forminix_get_form',
        'form_id': forminix_current_form_id
    };


    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if(obj.status === "true"){

                /* Update saved data with latest information */
                old_data_for_unsaved_data_on_leave = {
                    "form_name" : obj.form_name,
                    "form_fields" : obj.form_fields
                }

                jQuery(".forminix_builder_form_name").text(obj.form_name);

                var html = forminix_builder_generate_json_to_html(JSON.parse(obj.form_fields));
                jQuery(".forminix_builder_form_elements").append(html)
                jQuery(".forminix_builder_form_elements").sortable(forminix_builder_sortable_options_1);
                jQuery(".forminix_builder_single_form_element_column").sortable(forminix_builder_sortable_options_2);

                forminix_builder_check_elements_empty()
                jQuery(".forminix_builder_editor .forminix_builder_form").show()
                jQuery(".forminix_builder_editor .forminix_builder_loader_container").hide()

                /* Enable TinyMCE on Rich Text Field */
                forminix_builder_rich_text_enable_tinymce()
            }
        }
    })
}



function forminix_builder_copy_shortcode(){
    'use strict';

    var temp = jQuery("<input>");
    jQuery("body").append(temp);
    temp.val(jQuery(".forminix_builder_copy_shortcode").text()).select();
    document.execCommand("copy");
    temp.remove();
    alert("Shortcode Copied to Clipboard")
}