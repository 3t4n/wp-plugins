function forminix_entry_init(host, entry_id){
    'use strict';

    forminix_hide_all();
    jQuery("#forminix_entry").show();

    jQuery( ".forminix_entry_header .forminix_close_icon").unbind( "click" );
    jQuery( ".forminix_entry_header .forminix_close_icon" ).bind( "click", function() {
        forminix_entries_init(host, forminix_current_form_id)
    });

    jQuery( ".forminix_entry_back_to_all").unbind( "click" );
    jQuery( ".forminix_entry_back_to_all" ).bind( "click", function() {
        forminix_entries_init(host, forminix_current_form_id)
    });

    forminix_entry_load_data(host, entry_id)


}


function forminix_entry_load_data(host, entry_id) {
    'use strict';

    jQuery(".forminix_entry_main_area").hide()
    jQuery(".forminix_entry_main_area .forminix_entry_field_data_body").empty()
    jQuery(".forminix_entry_main_area .forminix_entry_submission_info_body").empty()
    jQuery(".forminix_entry_main_area .forminix_entry_payment_data").hide()
    jQuery(".forminix_entry_main_area .forminix_entry_payment_data_body").empty()
    jQuery(".forminix_entry_loader_container").show()

    var post_data = {
        'action': 'forminix_get_entry',
        'entry_id': entry_id
    };


    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if(obj.status === "true"){

                /* Submission Info */
                var infoHTML = "<div class=\"forminix_entry_single_info\">\n" +
                    "               <strong>Submitted At: </strong> "+obj.submission_time+"\n" +
                    "           </div>\n" +
                    "           <div class=\"forminix_entry_single_info\">\n" +
                    "               <strong>Submitted By: </strong> "+obj.user_name+"\n" +
                    "           </div>\n" +
                    "           <div class=\"forminix_entry_single_info\">\n" +
                    "               <strong>IP: </strong> "+obj.user_ip+"\n" +
                    "           </div>\n" +
                    "           <div class=\"forminix_entry_single_info\">\n" +
                    "               <strong>URL: </strong> "+obj.user_page_url+"\n" +
                    "           </div>\n" +
                    "           <div class=\"forminix_entry_single_info\">\n" +
                    "               <strong>Browser: </strong> "+obj.user_browser+"\n" +
                    "           </div>\n" +
                    "           <div class=\"forminix_entry_single_info\">\n" +
                    "               <strong>Platform: </strong> "+obj.user_platform+"\n" +
                    "           </div>\n" +
                    "           <div class=\"forminix_entry_single_info\">\n" +
                    "               <strong>Status: </strong> Read <span class=\"forminix_entry_change_status\" onclick=\"forminix_entry_change_read_status(`"+host+"`, [`"+entry_id+"`], `unread`)\">Change to Unread</span>\n" +
                    "           </div>";
                jQuery(".forminix_entry_main_area .forminix_entry_submission_info_body").append(infoHTML)


                /* Field Data */
                var field_data = obj.field_data;
                for (var i = 0; i < field_data.length; i++) {
                    var itemHTML = ""
                    if(field_data[i].field_slug === "rich_text"){
                        itemHTML = "<div class=\"forminix_entry_single_field\">\n" +
                            "               <div class=\"forminix_entry_field_label\">"+forminix_admin_unesc_string(field_data[i].field_label)+"</div>\n" +
                            "               <div class=\"forminix_entry_field_value\">"+forminix_admin_unesc_string(field_data[i].field_value)+"</div>\n" +
                            "           </div>";
                    }else{
                        itemHTML = "<div class=\"forminix_entry_single_field\">\n" +
                            "               <div class=\"forminix_entry_field_label\">"+forminix_admin_unesc_string(field_data[i].field_label)+"</div>\n" +
                            "               <div class=\"forminix_entry_field_value\">"+forminix_auto_linkify_string(forminix_admin_unesc_string(field_data[i].field_value))+"</div>\n" +
                            "           </div>";
                    }

                    jQuery(".forminix_entry_main_area .forminix_entry_field_data_body").append(itemHTML)
                }


                /* Payment Data */
                var payment_data = obj.payment_data;
                if (typeof payment_data.has_payment !== "undefined") {
                    if(payment_data.has_payment === "1"){


                        if(payment_data.payment_status === "unpaid"){
                            payment_data.payment_status = "<span style=\"color:red;\">Unpaid</span>"
                        }else if(payment_data.payment_status === "paid"){
                            payment_data.payment_status = "<span style=\"color:green;\">Paid</span>"
                        }

                        if(payment_data.payment_method === "paypal"){
                            payment_data.payment_method = "PayPal"
                        }

                        var infoHTML = "<div class=\"forminix_entry_single_field\">\n" +
                            "               <div class=\"forminix_entry_field_label\">Payment Status</div>\n" +
                            "               <div class=\"forminix_entry_field_value\">"+payment_data.payment_status+"</div>\n" +
                            "           </div>\n" +
                            "           <div class=\"forminix_entry_single_field\">\n" +
                            "               <div class=\"forminix_entry_field_label\">Payment Method</div>\n" +
                            "               <div class=\"forminix_entry_field_value\">"+payment_data.payment_method+"</div>\n" +
                            "           </div>\n" +
                            "           <div class=\"forminix_entry_single_field\">\n" +
                            "               <div class=\"forminix_entry_field_label\">Payment Amount</div>\n" +
                            "               <div class=\"forminix_entry_field_value\">"+payment_data.payment_amount+"</div>\n" +
                            "           </div>";


                        /* For PayPal */
                        if(payment_data.payment_paypal_txn_id.toString().trim().length > 0){
                            infoHTML += "<div class=\"forminix_entry_single_field\">\n" +
                                "               <div class=\"forminix_entry_field_label\">PayPal Txn ID</div>\n" +
                                "               <div class=\"forminix_entry_field_value\">"+payment_data.payment_paypal_txn_id+"</div>\n" +
                                "           </div>";
                        }
                        if(payment_data.payment_paypal_payer_email.toString().trim().length > 0){
                            infoHTML += "<div class=\"forminix_entry_single_field\">\n" +
                                "               <div class=\"forminix_entry_field_label\">Payer Email</div>\n" +
                                "               <div class=\"forminix_entry_field_value\">"+payment_data.payment_paypal_payer_email+"</div>\n" +
                                "           </div>";
                        }


                        jQuery(".forminix_entry_main_area .forminix_entry_payment_data_body").append(infoHTML)
                        jQuery(".forminix_entry_main_area .forminix_entry_payment_data").show()
                    }

                }

                jQuery(".forminix_entry_loader_container").hide()
                jQuery(".forminix_entry_main_area").show()


            }
        }
    })
}



function forminix_entry_change_read_status(host, entry_ids, new_status){
    'use strict';

    var comfirm_msg = "Are you sure to change the read status of this entry?";

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
                    if(new_status === "unread"){
                        jQuery(".forminix_entry_submission_info_body .forminix_entry_change_status")
                            .parent()
                            .html("<strong>Status: </strong> Unread <span class=\"forminix_entry_change_status\" onclick=\"forminix_entry_change_read_status(`"+host+"`, [`"+entry_ids+"`], `read`)\">Change to Read</span>")
                    }else if(new_status === "read"){
                        jQuery(".forminix_entry_submission_info_body .forminix_entry_change_status")
                            .parent()
                            .html("<strong>Status: </strong> Read <span class=\"forminix_entry_change_status\" onclick=\"forminix_entry_change_read_status(`"+host+"`, [`"+entry_ids+"`], `unread`)\">Change to Unread</span>")
                    }
                }
            }
        })
    }
}