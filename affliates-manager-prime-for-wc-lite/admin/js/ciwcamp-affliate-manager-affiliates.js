(function( $ ) {
    'use strict';

    $(document).ready(function() {

    /**
	 *	this file is included for functionalility of Admin dashboard page
	 *
	 * @since    1.0.0
	 */	

    var ciwcamp_active_tab = $("#ciwcamp-active-data").val();

    var ciwcamp_affiliate_status = "all";
    
    if(ciwcamp_active_tab=="ciwcamp-affiliates")
    {
        $("#ciwcamp_affiliates_table").dataTable().fnDestroy();
        ciwcamp_afiiliate_status_ajax(ciwcamp_affiliate_status);
    }

    $("#ciwcamp-affiliates-btn").click(function(){

        $("#ciwcamp_affiliates_table").dataTable().fnDestroy();
        ciwcamp_afiiliate_status_ajax(ciwcamp_affiliate_status);

    });


    /**
	 *	this function is used to affiliates list ajax
	 *
	 * @since    1.0.0
	 */	

    function ciwcamp_afiiliate_status_ajax(status)
    {
        ciwcamp_affiliate_status_counter();
        var  ciwcamp_datatable = $(document).find('#ciwcamp_affiliates_table').DataTable( {
            "processing" : true,
            "serverSide" : true,
            "bsortable"  : true,
            "info"       : false,
            select       : true,
            "ajax"       : {
                data: {
                    action: 'ciwcamp_affiliates_list_action',
                    'ciwcamp_affiliate_status' : status
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
                    "searchable": false,
                }
            ],
            order : [[2, 'asc']],
        });

    }


    /**
	 *	this function is used for admin dashboard page count data ajax
	 *
	 * @since    1.0.0
	 */	

    function ciwcamp_affiliate_status_counter()
    {
        var ciwcamp_get_affiliate_count_data = {
            'action': 'ciwcamp_affiliate_status_count_action',
            'ciwcamp_affiliate_status_count': 'Yes',
        
        };
        jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_get_affiliate_count_data, function(response)
        {
        if(response!="")
        {
                var ciwcamp_res = JSON.parse(response);
                $("#ciwcamp-all-affiliate-count").text(ciwcamp_res[0]);
                $("#ciwcamp-disabled-affiliate-count").text(ciwcamp_res[1]);
                $("#ciwcamp-banned-affiliate-count").text(ciwcamp_res[2]);
                $("#ciwcamp-rejected-affiliate-count").text(ciwcamp_res[3]);
                $("#ciwcamp-pending-affiliate-count").text(ciwcamp_res[4]);

        } });
    }

    $("#ciwcamp-affiliates-all").addClass("active");
    $("#ciwcamp-affiliates-disbaled").removeClass("active");
    $("#ciwcamp-affiliates-banned").removeClass("active");
    $("#ciwcamp-affiliates-rejected").removeClass("active");
    $("#ciwcamp-affiliates-pending").removeClass("active");
    $("#ciwcamp_affiliates_table").dataTable().fnDestroy();

    $("#ciwcamp-affiliates-all").click(function(){
        $("#ciwcamp-affiliates-all").addClass("active");
        $("#ciwcamp-affiliates-disbaled").removeClass("active");
        $("#ciwcamp-affiliates-banned").removeClass("active");
        $("#ciwcamp-affiliates-rejected").removeClass("active");
        $("#ciwcamp-affiliates-pending").removeClass("active");
        ciwcamp_affiliate_status='all';
        $("#ciwcamp_affiliates_table").dataTable().fnDestroy()
        ciwcamp_afiiliate_status_ajax(ciwcamp_affiliate_status);            
    });

    $("#ciwcamp-affiliates-disbaled").click(function(){
        $("#ciwcamp-affiliates-all").removeClass("active");
        $("#ciwcamp-affiliates-disbaled").addClass("active");
        $("#ciwcamp-affiliates-banned").removeClass("active");
        $("#ciwcamp-affiliates-rejected").removeClass("active");
        $("#ciwcamp-affiliates-pending").removeClass("active");
        ciwcamp_affiliate_status='Disable';
        $("#ciwcamp_affiliates_table").dataTable().fnDestroy()
        ciwcamp_afiiliate_status_ajax(ciwcamp_affiliate_status);

    });

    $("#ciwcamp-affiliates-banned").click(function(){
        $("#ciwcamp-affiliates-all").removeClass("active");
        $("#ciwcamp-affiliates-disbaled").removeClass("active");
        $("#ciwcamp-affiliates-banned").addClass("active");
        $("#ciwcamp-affiliates-rejected").removeClass("active");
        $("#ciwcamp-affiliates-pending").removeClass("active");
        ciwcamp_affiliate_status='Banned';
        $("#ciwcamp_affiliates_table").dataTable().fnDestroy()
        ciwcamp_afiiliate_status_ajax(ciwcamp_affiliate_status);

    });

    $("#ciwcamp-affiliates-rejected").click(function(){
        $("#ciwcamp-affiliates-all").removeClass("active");
        $("#ciwcamp-affiliates-disbaled").removeClass("active");
        $("#ciwcamp-affiliates-banned").removeClass("active");
        $("#ciwcamp-affiliates-rejected").addClass("active");
        $("#ciwcamp-affiliates-pending").removeClass("active");
        $("#ciwcamp_affiliates_table").dataTable().fnDestroy();
        ciwcamp_affiliate_status='Reject';
        ciwcamp_afiiliate_status_ajax(ciwcamp_affiliate_status);

    });

    $("#ciwcamp-affiliates-pending").click(function(){
        $("#ciwcamp-affiliates-all").removeClass("active");
        $("#ciwcamp-affiliates-disbaled").removeClass("active");
        $("#ciwcamp-affiliates-banned").removeClass("active");
        $("#ciwcamp-affiliates-rejected").removeClass("active");
        $("#ciwcamp-affiliates-pending").addClass("active");
        ciwcamp_affiliate_status='1';
        $("#ciwcamp_affiliates_table").dataTable().fnDestroy()
        ciwcamp_afiiliate_status_ajax(ciwcamp_affiliate_status);

    });

    $('#ciwcamp-select-all-affiliate').on('change', function() { 

        $(document).find('.ciwcamp-select-affiliate').prop('checked', $(this).prop("checked"));  

    });

    $('.ciwcamp-select-affiliate').change(function(){

        if($('.ciwcamp-select-affiliate:checked').length == $('.ciwcamp-select-affiliate').length)
        {
            $(document).find('#ciwcamp-select-all-affiliate').prop('checked',true);
        }
        else
        {
            $(document).find('#ciwcamp-select-all-affiliate').prop('checked',false);
        }
    });

    $("#ciwcamp-generate-password").click(function(e)
    {
        e.preventDefault();
        var ciwcamp_password_data = {
            'action': 'ciwcamp_a_generate_password_action',
            'ciwcamp_affiliate_password' : 'yes'
        };
        jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_password_data, function(ciwcamp_response)
        {

            if(ciwcamp_response!="")
            {
                var ciwcamp_res = JSON.parse(ciwcamp_response);
                $("#ciwcamp-affiliate-password").val(ciwcamp_res);
            }
        });
    });


    $("#ciwcamp-create-affiliate").click(function(){

        var ciwcamp_affiliate_username = $("#ciwcamp-affiliate-username").val();

        var ciwcamp_affiliate_email = $("#ciwcamp-affiliate-email").val();

        var ciwcamp_affiliate_fname = $("#ciwcamp-affiliate-fname").val();

        var ciwcamp_affiliate_lname = $("#ciwcamp-affiliate-lname").val();

        var ciwcamp_affiliate_contact = $("#ciwcamp-affiliate-contact").val();

        var ciwcamp_affiliate_password = $("#ciwcamp-affiliate-password").val();

        var ciwcamp_affiliate_account_number = $("#ciwcamp-affiliate-account-number").val();

        var ciwcamp_affiliate_bank_name = $("#ciwcamp-affiliate-bank-name").val();

        var ciwcamp_affiliate_bank_address = $("#ciwcamp-affiliate-bank-address").val();

        var ciwcamp_affiliate_bank_rounting_number = $("#ciwcamp-affiliate-bank-rounting-number").val();

        var ciwcamp_affiliate_bank_iban = $("#ciwcamp-affiliate-bank-iban").val();

        var ciwcamp_affiliate_bank_swift = $("#ciwcamp-affiliate-bank-swift").val();

        var ciwcamp_affiliate_payment_email = $("#ciwcamp-affiliate-payment-email").val();

        var ciwcamp_affiliate_bank_strip_id = $("#ciwcamp-affiliate-bank-strip-id").val();

        if(ciwcamp_affiliate_username == "")
        {
            toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_username_required);
        }
        else if (ciwcamp_affiliate_email == "")
        {
            toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_email_required);
        }
        else if (ciwcamp_affiliate_fname == "")
        {
            toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_fname_required);
        }
        else if (ciwcamp_affiliate_lname == "")
        {
            toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_lname_required);
        }
        else if (ciwcamp_affiliate_contact == "")
        {
            toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_contact_required);
        }
        else if (ciwcamp_affiliate_password == "")
        {
            toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_password_required);
        }
        else
        {
            var ciwcamp_create_affiliate_data = {
                'action': 'ciwcamp_create_affiliate_action',
                'ciwcamp_affiliate_username' : ciwcamp_affiliate_username,
                'ciwcamp_affiliate_email' : ciwcamp_affiliate_email,
                'ciwcamp_affiliate_fname' : ciwcamp_affiliate_fname,
                'ciwcamp_affiliate_lname' : ciwcamp_affiliate_lname,
                'ciwcamp_affiliate_contact' : ciwcamp_affiliate_contact,
                'ciwcamp_affiliate_password' : ciwcamp_affiliate_password,
                'ciwcamp_affiliate_account_number' : ciwcamp_affiliate_account_number,
                'ciwcamp_affiliate_bank_name' : ciwcamp_affiliate_bank_name, 
                'ciwcamp_affiliate_bank_address' : ciwcamp_affiliate_bank_address,
                'ciwcamp_affiliate_bank_rounting_number' : ciwcamp_affiliate_bank_rounting_number, 
                'ciwcamp_affiliate_bank_iban' : ciwcamp_affiliate_bank_iban,
                'ciwcamp_affiliate_bank_swift' : ciwcamp_affiliate_bank_swift, 
                'ciwcamp_affiliate_payment_email' : ciwcamp_affiliate_payment_email,
                'ciwcamp_affiliate_bank_strip_id' : ciwcamp_affiliate_bank_strip_id 
               
            };
            jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_create_affiliate_data, function(response)
            {
               var res = JSON.parse(response);
               if(res == "username_exists")
               {
                    toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_username_exist);
               }
               else if(res == "invalid_email")
               {
                    toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_invalid_email);
               }
               else if(res == "email_exists")
               {
                    toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_email_exists);
               }
               else if(res == "ciwcamp_registered")
               {
                    var defulat_status = "all";

                    toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_created);

                    $("#create-affiliate-form").trigger("reset"); 

                    $("#ciwcamp_affiliates_table").dataTable().fnDestroy();

                    ciwcamp_afiiliate_status_ajax(defulat_status);

                    $("#create-affiliate-modal-preview").removeClass("show");
                    $("#create-affiliate-modal-preview").css("display", "none");
                    $(".modal-backdrop").removeClass("modal-backdrop");
               }
            });
        }
    });
 

    var ciwcamp_action_reason = $("ciwcamp-action-reason").val();
    var ciwcamp_selected_affiliate_id = new Array();
        $("#ciwcamp-affiliate-apply-action").click(function(){
        var defulat_status = "all";
        $(".ciwcamp-select-affiliate:checked").each(function(){
            ciwcamp_selected_affiliate_id.push($(this).val());
        });
        var ciwcamp_selected_action = $('#ciwcamp-affiliate-bulk-action option').filter(':selected').val();

        var ciwcamp_action_reason = $("#ciwcamp-action-reason").val();
        if(ciwcamp_selected_affiliate_id=="")
        {
            toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_please_select_affiliate);
        }
        else if(ciwcamp_selected_action=="")
        {
            toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_please_select_action);
        }
        else if(ciwcamp_selected_action == "Disable" || ciwcamp_selected_action == "Reject" || ciwcamp_selected_action== "Banned")
        {
            $("#ciwcamp-reason-modal").addClass("show");
            $("#ciwcamp-reason-modal").css("display" , "block");
        }
        else
        {
            ciwcamp_apply_action_ajax(ciwcamp_selected_action, ciwcamp_selected_affiliate_id, ciwcamp_action_reason)
        }
        ciwcamp_selected_affiliate_id = [];
    });  

    var ciwcamp_selected_affiliate_id = new Array();
    $("#ciwcamp-apply-action-with-reason").click(function(){
        var defulat_status = "all";
        $(".ciwcamp-select-affiliate:checked").each(function(){
            ciwcamp_selected_affiliate_id.push($(this).val());
        });
        var ciwcamp_selected_action = $('#ciwcamp-affiliate-bulk-action option').filter(':selected').val();

        var ciwcamp_action_reason = $("#ciwcamp-action-reason").val();

        if(ciwcamp_selected_affiliate_id=="")
        {
            toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_please_select_affiliate);
        }
        else if(ciwcamp_selected_action=="")
        {
            toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_please_select_action);
        }
        else
        {
            ciwcamp_apply_action_ajax(ciwcamp_selected_action, ciwcamp_selected_affiliate_id, ciwcamp_action_reason)
        }
        ciwcamp_selected_affiliate_id = [];
    });  

    $("#ciwcamp-reason-close").on("click", function(e){
        e.preventDefault();          
        $("#ciwcamp-reason-modal").removeClass("show");
        $("#ciwcamp-reason-modal").css("display" , "none");
    });
        

    /**
	 *	this function is used to apply action on affiliates
	 *
	 * @since    1.0.0
	 */	

    function ciwcamp_apply_action_ajax(ciwcamp_selected_action, ciwcamp_selected_affiliate_id, ciwcamp_action_reason)
    {
        ciwcamp_affiliate_status_counter();
        var defulat_status = "all";
        var ciwcamp_change_status_data = {
            'action': 'ciwcamp_change_affiliate_status_action',
            'ciwcamp_selected_action': ciwcamp_selected_action,
            'ciwcamp_selected_affiliate_id': ciwcamp_selected_affiliate_id,
            'ciwcamp_action_reason': ciwcamp_action_reason
           
        };
        jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_change_status_data, function(response)
        {
           if(response==1)
           {
                toastr.success('Action applied!');
                $("#ciwcamp-reason-form").trigger("reset"); 
                $("#ciwcamp_affiliates_table").dataTable().fnDestroy();
                ciwcamp_afiiliate_status_ajax(ciwcamp_selected_action);
                $("#ciwcamp-reason-modal").removeClass("show");
                $("#ciwcamp-reason-modal").css("display", "none");
           }
           else
           {
                toastr.error(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
                $("#ciwcamp_affiliates_table").dataTable().fnDestroy();
                ciwcamp_afiiliate_status_ajax(defulat_status);
           }
        });
    }

    $(document).on('click','.ciwcamp-affiliate-delete', function (e){
        e.preventDefault();
        var ciwcamp_affiliate_id =  $(this).attr("data-id");
        var defulat_status = "all";
        if(ciwcamp_affiliate_id=="")
        {
            toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
        }
        else
        {
            var checkstr =  confirm('Are you sure you want to delete this Affiliate?');
            if(checkstr == true)
            {
                var ciwcamp_delete_affiliate_data = {
                    'action': 'ciwcamp_delete_affiliate_action',
                    'ciwcamp_affiliate_id': ciwcamp_affiliate_id,
                };
                jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_delete_affiliate_data, function(response)
                {
                    if(response==1)
                    {
                        toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_deleted); 
                        $("#ciwcamp_affiliates_table").dataTable().fnDestroy();
                        ciwcamp_afiiliate_status_ajax(defulat_status);
                    }
                    else
                    {
                        toastr.error(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
                        $("#ciwcamp_affiliates_table").dataTable().fnDestroy();
                        ciwcamp_afiiliate_status_ajax(defulat_status);
                    }
                });
            }
            else
            {
                return false;
            }
           
        }
    });

});
    
})( jQuery );

