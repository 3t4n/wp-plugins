(function( $ ) {
	'use strict';

	$(document).ready(function() {

        /**
    	 *	this file is included for functionalility of withdraw page
    	 *
    	 * @since    1.0.0
    	 */		

        var ciwcamp_active_tab = $("#ciwcamp-active-data").val();
        
        if(ciwcamp_active_tab=="ciwcamp-withdraw")
        {
            $("#ciwcamp_withdraw_table").dataTable().fnDestroy();
            ciwcamp_withdraw_request_ajax("all");
        }

        $("#ciwcamp-withdraw-btn").click(function(){

            $("#ciwcamp_withdraw_table").dataTable().fnDestroy();
            ciwcamp_withdraw_request_ajax("all");

        });

        $("#ciwcamp-all-withdraw").click(function(){

            $("#ciwcamp_withdraw_table").dataTable().fnDestroy()
            ciwcamp_withdraw_request_ajax("all");
        });

        $("#ciwcamp-approved-witdhraw").click(function(){

            $("#ciwcamp_withdraw_table").dataTable().fnDestroy()
            ciwcamp_withdraw_request_ajax("Approved");
            });

        $("#ciwcamp-rejected-witdhraw").click(function(){

            $("#ciwcamp_withdraw_table").dataTable().fnDestroy()
            ciwcamp_withdraw_request_ajax("Rejected");
        });

        $("#ciwcamp-pending-witdhraw").click(function(){

            $("#ciwcamp_withdraw_table").dataTable().fnDestroy()
            ciwcamp_withdraw_request_ajax("Pending");
        });
        
        $(document).on('click','.ciwcamp-approve-withdraw', function (e){
            e.preventDefault();

            var ciwcamp_withdraw_id =  $(this).attr("data-id");
            
            if(ciwcamp_withdraw_id=="")
            {
                toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
            }
            else
            {
                var checkstr =  confirm(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_approve_withdraw_confirmation);

                if(checkstr == true)
                {
                    var ciwcamp_withdraw_approve_data = {
                        'action': 'ciwcamp_approve_withdraw_action',
                        'ciwcamp_withdraw_id': ciwcamp_withdraw_id,
                    
                    };
                    jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_withdraw_approve_data, function(response)
                    {
                    if(response==1)
                    {
                            toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_withdraw_approved); 
                            $("#ciwcamp_withdraw_table").dataTable().fnDestroy();
                            ciwcamp_withdraw_request_ajax();
                    }
                    else
                    {
                            toastr.error(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
                    }
                    });
                }
                else
                {
                    return false;
                }
            }
        });
    
        $(document).on('click','.ciwcamp-reject-withdraw', function (e){
            e.preventDefault();

            var ciwcamp_withdraw_id =  $(this).attr("data-id");
            
            if(ciwcamp_withdraw_id=="")
            {
                toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
            }
            else
            {
                var checkstr =  confirm(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_reject_withdraw_confirmation);

                if(checkstr == true)
                {
                    var ciwcamp_withdraw_reject_data = {
                        'action': 'ciwcamp_reject_withdraw_action',
                        'ciwcamp_withdraw_id': ciwcamp_withdraw_id
                    
                    };
                    jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_withdraw_reject_data, function(response)
                    {
                    if(response==1)
                    {
                            toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_withdraw_rejected); 
                            $("#ciwcamp_withdraw_table").dataTable().fnDestroy();
                            ciwcamp_withdraw_request_ajax();
                    }
                    else
                    {
                            toastr.error(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
                    }
                    });
                }
                else
                {
                    return false;
                }
            }
        });


        $(document).on('click','.ciwcamp-delete-withdraw', function (e){
            
            e.preventDefault();

            var ciwcamp_withdraw_id =  $(this).attr("data-id");
            
            if(ciwcamp_withdraw_id=="")
            {
                toastr.warning(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
            }
            else
            {
                var checkstr =  confirm(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_delete_withdraw_confirmation);

                if(checkstr == true)
                {

                    var ciwcamp_withdraw_delete_data = {
                        'action': 'ciwcamp_withdraw_delete_action',
                        'ciwcamp_withdraw_id': ciwcamp_withdraw_id,
                    
                    };
                    jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_withdraw_delete_data, function(response)
                    {
                    if(response==1)
                    {
                            toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_withdraw_request_deleted); 
                            $("#ciwcamp_withdraw_table").dataTable().fnDestroy();
                            ciwcamp_withdraw_request_ajax();
                    }
                    else
                    {
                            toastr.error(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
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


    /**
     *   this function is used for withdraw datatable ajax
     *
     * @since    1.0.0
     */	

	function ciwcamp_withdraw_request_ajax(ciwcamp_status)
        {

          var  ciwcamp_datatable = $(document).find('#ciwcamp_withdraw_table').DataTable( {
                "processing" : true,
                "serverSide" : true,
                "bsortable"  : true,
                "info"       : false,
                select       : true,
                "ajax"       : {
                    data: {
                        action: 'ciwcamp_withdraw_request_list_action',
                        'ciwcamp_status' : ciwcamp_status
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
})( jQuery );
