(function( $ ) {
	'use strict';
	
	/**
     * this file is used for admin setting functionality
     *
     * @since    1.0.0
     */	

	$(document).ready(function() {

    $(document).on('click','#ciwcamp-save-comman-commission-btn', function (e){
        e.preventDefault(); 

        var ciwcamp_comman_commission_type = $( "#ciwcamp-comman-commission-type option:selected" ).val();

        var ciwcamp_common_commission_value = $( "#ciwcamp-common-commission-value" ).val();

        var ciwcamp_comman_setting_data = {
            'action': 'ciwcamp_commission_setting_action',
            'ciwcamp_comman_commission_type': ciwcamp_comman_commission_type,
            'ciwcamp_common_commission_value': ciwcamp_common_commission_value,
        
        };
        jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_comman_setting_data, function(response)
        {
        if(response==1)
        {
            toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_changes_saved);
        }
        else
        {
            toastr.error(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
        }
        });

            
    });

    $(document).on('click','#ciwcamp-save-affiliate-setting-btn', function (e){
        e.preventDefault(); 
        
        var ciwcamp_signup_bonus = $( "#ciwcamp-signup-bonus" ).val();

        var ciwcamp_cookie_time = $( "#ciwcamp-cookie-time" ).val();
        
        var ciwcamp_affiliate_pending_msz = $( "#ciwcamp-affiliate-pending-msz" ).val();

        var ciwcamp_affiliate_reject_msz = $( "#ciwcamp-affiliate-reject-msz" ).val();

        var ciwcamp_affiliate_disable_msz = $( "#ciwcamp-affiliate-disable-msz" ).val();

        var ciwcamp_affiliate_ban_msz = $( "#ciwcamp-affiliate-ban-msz" ).val();

        var ciwcamp_admin_setting_data = {
            'action': 'ciwcamp_setting_action',
            'ciwcamp_signup_bonus': ciwcamp_signup_bonus,
            'ciwcamp_cookie_time' : ciwcamp_cookie_time, 
            'ciwcamp_affiliate_pending_msz' : ciwcamp_affiliate_pending_msz,
            'ciwcamp_affiliate_reject_msz' : ciwcamp_affiliate_reject_msz,
            'ciwcamp_affiliate_disable_msz' : ciwcamp_affiliate_disable_msz,
            'ciwcamp_affiliate_ban_msz' : ciwcamp_affiliate_ban_msz
        
        };
        jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_admin_setting_data, function(response)
        {
        if(response==1)
        {
            toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_changes_saved);
        }
        else
        {
            toastr.error(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_wrong_msg);
        }
        });
     
    });

});
})( jQuery );
