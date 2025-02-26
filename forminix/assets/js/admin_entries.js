
var forminix_entries_selected_ids = []

function forminix_entries_init(host, form_id){
    'use strict';

    forminix_current_form_id = form_id
    forminix_entries_selected_ids = []
    forminix_hide_all();
    jQuery(".forminix_entries_copy_shortcode").text("[forminix id=\""+forminix_current_form_id+"\"]");
    jQuery("#forminix_entries").show();

    forminix_entries_list(host)
}



function forminix_entries_refresh(host) {
    'use strict';
    forminix_entries_init(host, forminix_current_form_id)
}


function forminix_entries_destroy_datatable() {
    'use strict';
    if (jQuery.fn.DataTable.isDataTable('.forminix_entries_datatable')) {
        jQuery('.forminix_entries_datatable').dataTable().fnDestroy();
    }
}

function forminix_entries_reinit_datatable() {
    'use strict';
    if (jQuery.fn.DataTable.isDataTable('.forminix_entries_datatable')) {
        jQuery('.forminix_entries_datatable').dataTable().fnDestroy();
    }
    jQuery('.forminix_entries_datatable').DataTable({
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "pageLength": 25
    });
}

function forminix_entries_list(host) {
    'use strict';

    forminix_entries_destroy_datatable()
    jQuery(".forminix_entries_empty").hide()
    jQuery(".forminix_entries_main_area").hide()
    jQuery(".forminix_entries_main_area .forminix_entries_datatable_tbody").empty()
    jQuery(".forminix_entries_loader_container").show()
    jQuery(".forminix_entries_header .forminix_details h2").text("Form Entries")
    jQuery(".forminix_entries_datatable_action_area .forminix_entries_bulk_action").css("display", "none");
    jQuery(".forminix_entries_datatable_action_area .forminix_entries_bulk_action select").val("");
    jQuery(".forminix_entries_datatable thead input[type='checkbox']").prop('checked', false);

    var post_data = {
        'action': 'forminix_list_entries',
        'form_id': forminix_current_form_id
    };


    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if(obj.status === "true"){

                jQuery(".forminix_entries_header .forminix_details h2").text("Form Entries - "+obj.form_name)

                var entries = obj.entries;

                for (var i = 0; i < entries.length; i++) {

                    var itemHTML = "<tr class=\""+entries[i].read_status+"\">\n" +
                        "               <td>\n" +
                        "                   <label class=\"forminix_entries_datatable_checkbox\">\n" +
                        "                       <input type=\"checkbox\" onchange=\"forminix_entries_checkbox_select(this, `"+entries[i].entry_id+"`)\">\n" +
                        "                       <span class=\"checkmark\"></span>\n" +
                        "                   </label>\n" +
                        "               </td>\n" +
                        "               <td>\n" +
                        "                   <span class=\"forminix_entries_data_username\">"+entries[i].user_name+"</span>\n" +
                        "                   <span class=\"forminix_entries_data_ip\">IP: "+entries[i].user_ip+"</span>\n" +
                        "               </td>\n" +
                        "               <td>\n" +
                        "                   <span class=\"forminix_entries_data_date\">"+entries[i].submission_time+"</span>\n" +
                        "               </td>\n" +
                        "               <td>\n" +
                        "                   <span class=\"forminix_entries_data_browser\">"+entries[i].user_browser+"</span>\n" +
                        "               </td>\n" +
                        "               <td class=\"action_container\">\n" +
                        "                   <div class=\"forminix_entries_card_action\">\n" +
                        "                       <div class=\"forminix_entries_card_action_item\" onclick=\"forminix_entry_init(`"+host+"`, `"+entries[i].entry_id+"`)\">View</div>\n" +
                        "                       <div class=\"forminix_entries_card_action_item\" onclick=\"forminix_entries_delete(`"+host+"`, [`"+entries[i].entry_id+"`])\">Delete</div>\n" +
                        "                   </div>\n" +
                        "               </td>\n" +
                        "           </tr>";


                    jQuery(".forminix_entries_main_area .forminix_entries_datatable_tbody").append(itemHTML)
                }

                if(entries.length > 0){
                    jQuery(".forminix_entries_loader_container").hide()
                    jQuery(".forminix_entries_main_area").show()
                    forminix_entries_reinit_datatable()
                }else{
                    jQuery(".forminix_entries_loader_container").hide()
                    jQuery(".forminix_entries_empty").show()
                }


            }
        }
    })
}

function forminix_entries_datatable_search(field){
    'use strict';
    if (jQuery.fn.DataTable.isDataTable('.forminix_entries_datatable')) {
        jQuery('.forminix_entries_datatable').DataTable().search( jQuery(field).val() ).draw();
    }
}



function forminix_entries_checkbox_select_all(field) {
    'use strict';
    jQuery(".forminix_entries_datatable_tbody input[type='checkbox']").each(function (i, object) {
        if(jQuery(field).is(':checked')) {
            jQuery(object).prop('checked', true).change();
        }else{
            jQuery(object).prop('checked', false).change();
        }
    })
}

function forminix_entries_checkbox_select(field, entry_id){
    'use strict';
    if(jQuery(field).is(':checked')) {
        if(jQuery.inArray(entry_id, forminix_entries_selected_ids) === -1) {
            forminix_entries_selected_ids.push(entry_id)
        }
    } else {
        jQuery(".forminix_entries_datatable thead input[type='checkbox']").prop('checked', false)
        forminix_entries_selected_ids.splice(jQuery.inArray(entry_id, forminix_entries_selected_ids), 1);
    }

    if(forminix_entries_selected_ids.length > 0){
        jQuery(".forminix_entries_datatable_action_area .forminix_entries_bulk_action").css("display", "flex");
    }else{
        jQuery(".forminix_entries_datatable_action_area .forminix_entries_bulk_action").css("display", "none");
    }

}




function forminix_entries_bulk_action(host){
    'use strict';

    var action = jQuery(".forminix_entries_bulk_action select").val();
    if(action === "delete"){
        forminix_entries_delete(host, forminix_entries_selected_ids)
    }else if(action === "read"){
        forminix_entries_change_read_status(host, forminix_entries_selected_ids, "read")
    } else if(action === "unread"){
        forminix_entries_change_read_status(host, forminix_entries_selected_ids, "unread")
    }else if(action === "export_csv"){
        forminix_show_pro_popup("", "");
    }
}



function forminix_entries_delete(host, entry_ids){
    'use strict';

    var comfirm_msg = "Are you sure to delete the entry?";
    if(entry_ids.length > 1){
        comfirm_msg = "Are you sure to delete the selected entries?"
    }

    if (confirm(comfirm_msg) === true) {
        var post_data = {
            'action': 'forminix_delete_entries',
            'entries': JSON.stringify(entry_ids)
        };
        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: post_data,
            success: function (data) {
                var obj = JSON.parse(data);

                if(obj.status == "true"){
                    forminix_entries_list(host)
                }
            }
        })
    }
}


function forminix_entries_change_read_status(host, entry_ids, new_status){
    'use strict';

    var comfirm_msg = "Are you sure to change the read status of the entry?";
    if(entry_ids.length > 1){
        comfirm_msg = "Are you sure to change the status of the selected entries?"
    }

    if (confirm(comfirm_msg) === true) {
        var post_data = {
            'action': 'forminix_change_status_entries',
            'new_status': new_status,
            'entries': JSON.stringify(entry_ids)
        };
        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: post_data,
            success: function (data) {
                var obj = JSON.parse(data);

                if(obj.status == "true"){
                    forminix_entries_list(host)
                }
            }
        })
    }
}

function forminix_entries_export_as_csv(host){
    'use strict';

    forminix_show_pro_popup("", "");
}

function forminix_entries_copy_shortcode(){
    'use strict';

    var temp = jQuery("<input>");
    jQuery("body").append(temp);
    temp.val(jQuery(".forminix_entries_copy_shortcode").text()).select();
    document.execCommand("copy");
    temp.remove();
    alert("Shortcode Copied to Clipboard")
}