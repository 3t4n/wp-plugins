(function( $ ) {
	'use strict';

	$(document).ready(function() {
	    
	    /**
    	 * this function is used for send ajax of save profile
    	 *
    	 * @since    1.0.0
    	 */

        $(document).on('click','#ciwcamp-save-profile-data-btn', function (e){
            e.preventDefault();

            var ciwcamp_profile_first_name = $("#ciwcamp-profile-first-name").val();

            var ciwcamp_profile_last_name = $("#ciwcamp-profile-last-name").val();   
            
            var ciwcamp_profile_contact = $("#ciwcamp-profile-contact").val();

            var ciwcamp_profile_account_number = $("#ciwcamp-profile-account-number").val();   

            var ciwcamp_profile_bank_name = $("#ciwcamp-profile-bank-name").val();

            var ciwcamp_profile_bank_addr = $("#ciwcamp-profile-bank-addr").val();   

            var ciwcamp_profile_rounting_number = $("#ciwcamp-profile-rounting-number").val();

            var ciwcamp_profile_bank_iban = $("#ciwcamp-profile-bank-iban").val();   

            var ciwcamp_profile_bank_swift = $("#ciwcamp-profile-bank-swift").val();

            var ciwcamp_profile_payment_email = $("#ciwcamp-profile-payment-email").val();   

            var ciwcamp_profile_bank_stripe_id = $("#ciwcamp-profile-bank-stripe-id").val();

            var ciwcamp_affiliate_profile_data = {
                'action': 'ciwcamp_save_affiliate_profile_action',
                'ciwcamp_profile_first_name': ciwcamp_profile_first_name,
                'ciwcamp_profile_last_name': ciwcamp_profile_last_name,
                'ciwcamp_profile_contact': ciwcamp_profile_contact,
                'ciwcamp_profile_account_number': ciwcamp_profile_account_number,
                'ciwcamp_profile_bank_name': ciwcamp_profile_bank_name,
                'ciwcamp_profile_bank_addr': ciwcamp_profile_bank_addr,
                'ciwcamp_profile_rounting_number': ciwcamp_profile_rounting_number,
                'ciwcamp_profile_bank_iban': ciwcamp_profile_bank_iban,
                'ciwcamp_profile_bank_swift': ciwcamp_profile_bank_swift,
                'ciwcamp_profile_payment_email': ciwcamp_profile_payment_email,
                'ciwcamp_profile_bank_stripe_id': ciwcamp_profile_bank_stripe_id
               
            };
            jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_affiliate_profile_data, function(response)
            {
                if(response==1)
                {
                    toastr.success(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_affiliate_profile_saved);
                }
                else if(response==0)
                {
                    toastr.error(ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_somthing_wrong);    
                }
               
            });
        });
    });

})( jQuery );
