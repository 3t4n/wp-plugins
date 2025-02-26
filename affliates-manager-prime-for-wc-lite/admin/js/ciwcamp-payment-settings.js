(function( $ ) {
	'use strict';
	
	/**
     *  this file is used for payment setting functionality page
     *
     * @since    1.0.0
     */	

	$(document).ready(function() {


    /**
     *   thiis function is used for stripe details ajax
     *
     * @since    1.0.0
     */	
     
    function ciwcamp_stripe_details_ajax(ciwcamp_active_stripe, ciwcamp_stripe_client_id, ciwcamp_stripe_secret_key, ciwcamp_stripe_publishable_key, ciwcamp_stripe_test_box)
    {
        
        var ciwcamp_stripe_details_data = {
            'action': 'ciwcamp_save_stripe_details_action',
            'ciwcamp_active_stripe': ciwcamp_active_stripe,
            'ciwcamp_stripe_client_id': ciwcamp_stripe_client_id,
            'ciwcamp_stripe_secret_key': ciwcamp_stripe_secret_key,
            'ciwcamp_stripe_publishable_key': ciwcamp_stripe_publishable_key,
            'ciwcamp_stripe_test_box': ciwcamp_stripe_test_box
            
        };
        jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_stripe_details_data, function(response)
        {
            if(response==1)
            {
                toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_stripe_details_saved);
            }
            else
            {
                toastr.error(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
            }
        });
    }
        
    $(document).on('click','#ciwcamp-save-bank-transfer', function (e){
        e.preventDefault(); 
        var ciwcamp_active_bank_tranfer = $("#ciwcamp-active-bank-tranfer:checked").val(); 
        if(!ciwcamp_active_bank_tranfer)
        {
            ciwcamp_active_bank_tranfer = "";
        } 
        var ciwcamp_bank_transfer_details_data = {
            'action': 'ciwcamp_save_bank_transfer_details_action',
            'ciwcamp_active_bank_tranfer': ciwcamp_active_bank_tranfer,
            
        };
        jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_bank_transfer_details_data, function(response)
        {
            if(response==1)
            {
                toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_bank_transfer_activated);
            }
            else if(response==2)
            {
                toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_bank_transfer_deactivated);
            }
            else 
            {
                toastr.error(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
            }
        });

    });

    $(document).on('click','#ciwcamp-save-cash-transfer', function (e){
        e.preventDefault(); 
        var ciwcamp_active_cash_transfer = $("#ciwcamp-active-cash-tranfer:checked").val();   
        if(!ciwcamp_active_cash_transfer)
        {
            ciwcamp_active_cash_transfer = "";
        }
        var ciwcamp_cash_transfer_details_data = {
            'action': 'ciwcamp_save_cash_transfer_details_action',
            'ciwcamp_active_cash_transfer': ciwcamp_active_cash_transfer,
            
        };
        jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_cash_transfer_details_data, function(response)
        {
            if(response==1)
            {
                toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_cash_transfer_activated);
            }
            else if(response==2)
            {
                toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_cash_transfer_deactivated);
            }
            else 
            {
                toastr.error(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
            }
        });

    });


});
})( jQuery );
