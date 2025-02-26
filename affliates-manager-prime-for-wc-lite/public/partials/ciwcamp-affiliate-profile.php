<?php 

	/**
	 * this file is included for affiliate profile page
	 *
	 * @since    1.0.0
	 */
?>
<?php $ciwcamp_affiliate_id = get_current_user_id(); ?>

<form class="text-center border border-light p-5 card" action="#!">
    <div class="float-left">
        <p class="h4 mb-4 "><?php esc_html_e( 'Profile Details','ciwcamp-affliate-manager' ); ?></p>
    </div> 
    <div class="form-row mb-4">
        <div class="col">
            <label><?php esc_html_e( 'First Name : ','ciwcamp-affliate-manager' ); ?></label>
            <input type="text" id="ciwcamp-profile-first-name" class="form-control" placeholder="First name" 
            value="<?php esc_html_e(get_usermeta($ciwcamp_affiliate_id, 'first_name'), 'ciwcamp-affliate-manager' ); ?>">
        </div>
        <div class="col">
            <label><?php esc_html_e( 'Last Name : ','ciwcamp-affliate-manager' ); ?></label>
            <input type="text" id="ciwcamp-profile-last-name" class="form-control" placeholder="Last name" 
            value="<?php esc_html_e(get_usermeta($ciwcamp_affiliate_id, 'last_name'), 'ciwcamp-affliate-manager' ); ?>">
        </div>
        <div class="col">
            <label><?php esc_html_e( 'Contact : ','ciwcamp-affliate-manager' ); ?></label>
            <input type="text" id="ciwcamp-profile-contact" class="form-control" placeholder="Contact" 
            value="<?php esc_html_e(get_usermeta($ciwcamp_affiliate_id, 'ciwcamp_reg_contact'), 'ciwcamp-affliate-manager' ); ?>">
        </div>   
    </div> 
    <div class="form-row mb-4">
        <div class="col">
            <label><?php esc_html_e( 'Account Number : ','ciwcamp-affliate-manager' ); ?></label>
            <input type="text" id="ciwcamp-profile-account-number" class="form-control" placeholder="Account Number" 
            value="<?php esc_html_e(get_usermeta($ciwcamp_affiliate_id, 'ciwcamp_affiliate_account_number'), 'ciwcamp-affliate-manager' ); ?>">
        </div>
        <div class="col">
            <label><?php esc_html_e( 'Bank Name : ','ciwcamp-affliate-manager' ); ?></label>
            <input type="text" id="ciwcamp-profile-bank-name" class="form-control" placeholder="Bank name" 
            value="<?php esc_html_e(get_usermeta($ciwcamp_affiliate_id, 'ciwcamp_affiliate_bank_name'), 'ciwcamp-affliate-manager' ); ?>">
        </div>
        <div class="col">
            <label><?php esc_html_e( 'Bank Address : ','ciwcamp-affliate-manager' ); ?></label>
            <input type="text" id="ciwcamp-profile-bank-addr" class="form-control" placeholder="Bank Address" 
            value="<?php esc_html_e(get_usermeta($ciwcamp_affiliate_id, 'ciwcamp_affiliate_bank_address'), 'ciwcamp-affliate-manager' ); ?>">
        </div>   
    </div> 
    <div class="form-row mb-4">
        <div class="col">
            <label><?php esc_html_e( 'Bank Routing Number : ','ciwcamp-affliate-manager' ); ?></label>
            <input type="text" id="ciwcamp-profile-rounting-number" class="form-control" placeholder="Bank Routing Number" 
            value="<?php esc_html_e(get_usermeta($ciwcamp_affiliate_id, 'ciwcamp_affiliate_bank_rounting_number'), 'ciwcamp-affliate-manager' ); ?>">
        </div>
        <div class="col">
            <label><?php esc_html_e( 'Bank IBAN : ','ciwcamp-affliate-manager' ); ?></label>
            <input type="text" id="ciwcamp-profile-bank-iban" class="form-control" placeholder="Bank IBAN" 
            value="<?php esc_html_e(get_usermeta($ciwcamp_affiliate_id, 'ciwcamp_affiliate_bank_iban'), 'ciwcamp-affliate-manager' ); ?>">
        </div>
        <div class="col">
            <label><?php esc_html_e( 'Bank Swift : ','ciwcamp-affliate-manager' ); ?></label>
            <input type="text" id="ciwcamp-profile-bank-swift" class="form-control" placeholder="Bank Swift" 
            value="<?php esc_html_e(get_usermeta($ciwcamp_affiliate_id, 'ciwcamp_affiliate_bank_swift'), 'ciwcamp-affliate-manager' ); ?>">
        </div>   
    </div> 
    <div class="form-row mb-4">
        <div class="col">
            <label><?php esc_html_e( 'Payment Email ID : ','ciwcamp-affliate-manager' ); ?></label>
            <input type="text" id="ciwcamp-profile-payment-email" class="form-control" placeholder="Payment Email ID" 
            value="<?php esc_html_e(get_usermeta($ciwcamp_affiliate_id, 'ciwcamp_affiliate_payment_email'), 'ciwcamp-affliate-manager' ); ?>">
        </div>
        <div class="col">
            <label><?php esc_html_e( 'Bank Stripe ID: ','ciwcamp-affliate-manager' ); ?> </label>
            <input type="text" id="ciwcamp-profile-bank-stripe-id" class="form-control" placeholder="Bank Stripe ID" 
            value="<?php esc_html_e(get_usermeta($ciwcamp_affiliate_id, 'ciwcamp_affiliate_bank_strip_id'), 'ciwcamp-affliate-manager' ); ?>">
        </div> 
    </div> 
    <div class="form-row mb-4">
        <div class="col">
            <button class="btn btn-primary" id="ciwcamp-save-profile-data-btn"><?php esc_html_e( 'Save Profile ','ciwcamp-affliate-manager' ); ?></button>
        </div>

    </div> 
</form>
