(function( $ ) {
    'use strict';

    $(document).ready(function() {  

    /**
	 *	this file is included for functionalility of affiliate details page page
	 *
	 * @since    1.0.0
	 */	


    $(document).on('click','.ciwcamp-affiliate-details', function (e){
        e.preventDefault();

        var ciwcamp_affiliate_id =  $(this).attr("data-id");
        
        if(ciwcamp_affiliate_id=="")
        {
            toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
        }
        else
        {
            var ciwcamp_affiliate_details_data = {
                'action': 'ciwcamp_affiliate_details_action',
                'ciwcamp_affiliate_id': ciwcamp_affiliate_id,
            };
            jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_affiliate_details_data, function(response)
            {
                if(response!="")
                {
                    $("#ciwcamp-affiliate-details").css("display", "inline");
                    $("#ciwcamp-dashboard").css("display", "none");
                    $("#ciwcamp-affiliates").css("display", "none");
                    $("#ciwcamp-withdraw").css("display", "none");
                    $("#ciwcamp-sales").css("display", "none");
                    $("#ciwcamp-product-commission").css("display", "none");
                    $("#ciwcamp-category-commission").css("display", "none");
                    $("#ciwcamp-comman-commission").css("display", "none");
                    $("#ciwcamp-payments").css("display", "none");
                    $("#ciwcamp-settings").css("display", "none");   
                    var ciwcamp_res = JSON.parse(response);
                    $("#ciwcamp-total-visits-counter").text(ciwcamp_res[0]);
                    $("#ciwcamp-total-conversion-counter").text(ciwcamp_res[1]);
                    $("#ciwcamp-total-withdraw-counter").text(ciwcamp_res[2]);
                    $("#ciwcamp-total-balance-counter").text(ciwcamp_res[3]);
                    $("#ciwcamp-affiliate-profile-username").val(ciwcamp_res[4][0]);
                    $("#ciwcamp-affiliate-profile-email").val(ciwcamp_res[4][1]);
                    $("#ciwcamp-affiliate-profile-first-name").val(ciwcamp_res[4][2]);
                    $("#ciwcamp-affiliate-profile-last-name").val(ciwcamp_res[4][3]);
                    $("#ciwcamp-affiliate-profile-register-date").val(ciwcamp_res[4][4]);
                    $("#ciwcamp-affiliate-profile-contact").val(ciwcamp_res[4][5]);
                    $("#ciwcamp-affiliate-profile-status").val(ciwcamp_res[4][6]);
                    $("#ciwcamp-affiliate-profile-parent-id").val(ciwcamp_res[4][7]);
                    $("#ciwcamp-affiliate-profile-bank-account-number").val(ciwcamp_res[4][8]);
                    $("#ciwcamp-affiliate-profile-bank-name").val(ciwcamp_res[4][9]);
                    $("#ciwcamp-affiliate-profile-bank-address").val(ciwcamp_res[4][10]);
                    $("#ciwcamp-affiliate-profile-bank-rounting").val(ciwcamp_res[4][11]);
                    $("#ciwcamp-affiliate-profile-bank-iban").val(ciwcamp_res[4][12]);
                    $("#ciwcamp-affiliate-profile-bank-swift").val(ciwcamp_res[4][13]);
                    $("#ciwcamp-affiliate-profile-payment-email").val(ciwcamp_res[4][14]);
                    $("#ciwcamp-affiliate-profile-strip-id").val(ciwcamp_res[4][15]);
                    $("#ciwcamp-affiliate-profile-id").val(ciwcamp_affiliate_id);
                }
                else
                {
                    toastr.error(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
                }
            });


            $("#ciwcamp-affiliates-wise-sales").dataTable().fnDestroy();
                var  ciwcamp_affiliates_wise_sales = $(document).find('#ciwcamp-affiliates-wise-sales').DataTable( {
                    "processing" : true,
                    "serverSide" : true,
                    "bsortable"  : true,
                    "info"       : false,
                    select       : true,
                    "ajax"       : {
                        data: {
                            action: 'ciwcamp_an_affliate_sales_list_action',
                            'ciwcamp_affiliate_id' : ciwcamp_affiliate_id
                            },
                        type      : 'POST',
                        dataType  : 'json',
                        url       : ciwcamp_ajax_object.ciwcamp_ajax_url,
                        
                    },
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_text_search,
                        'processing':  "<div class='ciwcamp-loader'><img src='"+ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_loader_src+"'/></div>"
                    },
                    columnDefs : [
                        {
                            "targets": [0],
                            "orderable": false,
                            "searchable": true,
                        }
                    ],
                    order : [[1, 'asc']],
                });


            $("#ciwcamp-affiliates-withdraw").dataTable().fnDestroy();
            var  ciwcamp_affiliates_wise_sales = $(document).find('#ciwcamp-affiliates-withdraw').DataTable( {
                "processing" : true,
                "serverSide" : true,
                "bsortable"  : true,
                "info"       : false,
                select       : true,
                "ajax"       : {
                    data: {
                        action: 'ciwcamp_affiliate_withdraw_list_action',
                        'ciwcamp_affiliate_id' : ciwcamp_affiliate_id
                        },
                    type      : 'POST',
                    dataType  : 'json',
                    url       : ciwcamp_ajax_object.ciwcamp_ajax_url,
                    
                },
                columnDefs : [
                    {
                        "targets": [0],
                        "orderable": false,
                        "searchable": true,
                    }
                ],
                order : [[1, 'asc']],
            });
        }
    });


    $(document).on('click','#ciwcamp-editable-btn', function (e){
        e.preventDefault();
        $(".ciwcamp-editable").prop('disabled', false);
    });


    $(document).on('click','#ciwcamp-update-affiliate-profile', function (e){
        e.preventDefault();
        
        var ciwcamp_affiliate_profile_first_name = $("#ciwcamp-affiliate-profile-first-name").val();

        var ciwcamp_affiliate_profile_last_name = $("#ciwcamp-affiliate-profile-last-name").val();

        var ciwcamp_affiliate_profile_bank_name = $("#ciwcamp-affiliate-profile-bank-name").val();

        var ciwcamp_affiliate_profile_bank_account_number = $("#ciwcamp-affiliate-profile-bank-account-number").val();

        var ciwcamp_affiliate_profile_bank_address = $("#ciwcamp-affiliate-profile-bank-address").val();

        var ciwcamp_affiliate_profile_bank_rounting = $("#ciwcamp-affiliate-profile-bank-rounting").val();

        var ciwcamp_affiliate_profile_bank_iban = $("#ciwcamp-affiliate-profile-bank-iban").val();

        var ciwcamp_affiliate_profile_bank_swift = $("#ciwcamp-affiliate-profile-bank-swift").val();

        var ciwcamp_affiliate_profile_payment_email = $("#ciwcamp-affiliate-profile-payment-email").val();

        var ciwcamp_affiliate_profile_strip_id = $("#ciwcamp-affiliate-profile-strip-id").val();

        var ciwcamp_affiliate_profile_contact = $("#ciwcamp-affiliate-profile-contact").val();

        var ciwcamp_affiliate_profile_id = $("#ciwcamp-affiliate-profile-id").val();

        if(ciwcamp_affiliate_profile_id=="") 
        {
            toastr.error(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
        }
        else 
        {
            var ciwcamp_affiliate_profile_data = {
                'action': 'ciwcamp_update_affiliate_action',
                'ciwcamp_affiliate_profile_id': ciwcamp_affiliate_profile_id,
                'ciwcamp_affiliate_profile_first_name': ciwcamp_affiliate_profile_first_name,
                'ciwcamp_affiliate_profile_last_name': ciwcamp_affiliate_profile_last_name,
                'ciwcamp_affiliate_profile_bank_name': ciwcamp_affiliate_profile_bank_name,
                'ciwcamp_affiliate_profile_bank_account_number': ciwcamp_affiliate_profile_bank_account_number,
                'ciwcamp_affiliate_profile_bank_address': ciwcamp_affiliate_profile_bank_address,
                'ciwcamp_affiliate_profile_bank_rounting': ciwcamp_affiliate_profile_bank_rounting,
                'ciwcamp_affiliate_profile_bank_iban': ciwcamp_affiliate_profile_bank_iban,
                'ciwcamp_affiliate_profile_bank_swift': ciwcamp_affiliate_profile_bank_swift,
                'ciwcamp_affiliate_profile_payment_email': ciwcamp_affiliate_profile_payment_email,
                'ciwcamp_affiliate_profile_strip_id': ciwcamp_affiliate_profile_strip_id,  
                'ciwcamp_affiliate_profile_contact' : ciwcamp_affiliate_profile_contact,

            };
            jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_affiliate_profile_data, function(response)
            {
                if(response==1)
                {
                    toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_updated); 
                }
                else
                {
                    toastr.error(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
                }
            });
        }

    });
});
    

})( jQuery );

