<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	function addonp_place_currency_sign_field(){
    $option = get_option( 'addonp_place_currency_sign_field' );
    ?>
       <select id="addonp_place_currency_sign_field" name="addonp_place_currency_sign_field">
           <option value="front_space" <?php if ( $option == 'front_space') echo ' selected'; ?>>$ 10</option>
           <option value="front_no_space" <?php if ( $option == 'front_no_space') echo ' selected'; ?>>$10</option>
           <option value="back_no_space" <?php if ( $option == 'back_no_space') echo ' selected'; ?>>10$</option>
           <option value="back_space" <?php if ( $option == 'back_space') echo ' selected'; ?>>10 $</option>
        </select>
    <?php   }

	function addonp_currency_sign_field(){ ?>
    <input title="<?php _e('Currency Sign', 'addonpayments' ); ?>" type="text" name="addonp_currency_sign_field" value="<?php echo get_option('addonp_currency_sign_field'); ?>"  size="40" />
    <?php }


	function addonp_shipping_fields_to_screen_front_label_field(){
	   $option = maybe_unserialize( get_option( 'addonp_shipping_fields_to_screen_front_label_field' ) );
	   $fields = array(
			'user_type' 				=> __( 'User Type', 				    'addonpayments' ),
			'Full_Name' 				=> __( 'Shipping Full Name', 		    'addonpayments' ),
			'shipping_country' 			=> __( 'Shipping Country', 			    'addonpayments' ),
			'shipping_state' 			=> __( 'Shipping State', 			    'addonpayments' ),
			'shipping_postcode' 		=> __( 'Shipping Postcode', 		    'addonpayments' ),
			'shipping_address' 			=> __( 'Shipping Address', 			    'addonpayments' ),
			'shipping_email' 			=> __( 'Shipping Email', 			    'addonpayments' ),
			'shipping_phone' 			=> __( 'Shipping Phone', 			    'addonpayments' ),
			'shipping_city' 			=> __( 'Shipping City', 			    'addonpayments' ),
		);

	   ?>
	   <select multiple="multiple" id="addonp_shipping_fields_to_screen_front_label_field" name="addonp_shipping_fields_to_screen_front_label_field[]" class="js-shipping-fields-fron-retention">
	       <?php
			   foreach ( $fields as $code => $field ) { ?>
					<option value="<?php echo $code; ?>" <?php if ( $option && in_array( $code, $option ) ) echo ' selected'; ?>><?php echo $field; ?></option>
				<?php } ?>
	    </select>
	<?php   }

	function addonp_billing_fields_to_screen_front_label_field(){
	   $option = maybe_unserialize( get_option( 'addonp_billing_fields_to_screen_front_label_field' ) );
	   $fields = array(
			'full_name_billing' 		=> __( 'Billing Full Name',			'addonpayments' ),
			'nic_tic_vat_name_billing' 	=> __( 'Billing NIC / TIC / VAT',	'addonpayments' ),
			'billing_country' 			=> __( 'Billing Country', 			'addonpayments' ),
			'billing_state' 			=> __( 'Billing State', 			'addonpayments' ),
			'billing_postcode' 			=> __( 'Billing Postcode', 			'addonpayments' ),
			'billing_address' 			=> __( 'Billing Address', 			'addonpayments' ),
			'billing_email' 			=> __( 'Billing Email', 			'addonpayments' ),
			'billing_phone' 			=> __( 'Billing Phone', 			'addonpayments' ),
			'billing_city' 			    => __( 'Billing City', 			    'addonpayments' ),
		);

	   ?>
	   <select multiple="multiple" id="addonp_billing_fields_to_screen_front_label_field" name="addonp_billing_fields_to_screen_front_label_field[]" class="js-billing-fields-fron-retention">
	       <?php
			   foreach ( $fields as $code => $field ) { ?>
					<option value="<?php echo $code; ?>" <?php if ( $option && in_array( $code, $option ) ) echo ' selected'; ?>><?php echo $field; ?></option>
				<?php } ?>
	    </select>
	<?php   }

	function addonp_coment1_fields_to_screen_front_label_field(){ ?>

      <input type="checkbox" class="js-switch-addonp_coment1_fields_to_screen_front" title="<?php _e('Show Comment for users Order', 'addonpayments' ); ?>" name="addonp_coment1_fields_to_screen_front_label_field" value="1" <?php checked(1, get_option('addonp_coment1_fields_to_screen_front_label_field'), true); ?>/>
    <?php }

	function addonp_show_price_with_tax_field(){ ?>

      <input type="checkbox" class="js-switch-addonp_show_price_with_tax" title="<?php _e('Show price with tax', 'addonpayments' ); ?>" name="addonp_show_price_with_tax_field" value="1" <?php checked(1, get_option('addonp_show_price_with_tax_field'), true); ?>/>
    <?php }

	function addonp_post_price_included_tax_field(){ ?>
    <input title="<?php _e('Text after price with Tax (Empty for default)', 'addonpayments' ); ?>" type="text" name="addonp_post_price_included_tax_field" value="<?php echo get_option('addonp_post_price_included_tax_field'); ?>"  size="40" />
    <?php }

	function addonp_post_price_excluded_tax_field(){ ?>
    <input title="<?php _e('Text after price without Tax (Empty for default)', 'addonpayments' ); ?>" type="text" name="addonp_post_price_excluded_tax_field" value="<?php echo get_option('addonp_post_price_excluded_tax_field'); ?>"  size="40" />
    <?php }

	function addonp_show_text_retention_field(){ ?>

      <input type="checkbox" class="js-switch-addonp_show_text_retention" title="<?php _e('Show text retention', 'addonpayments' ); ?>" name="addonp_show_text_retention_field" value="1" <?php checked(1, get_option('addonp_show_text_retention_field'), true); ?>/>
    <?php }

	function addonp_text_active_retention_field(){ ?>
    <input title="<?php _e('Text active retention (Empty for default)', 'addonpayments' ); ?>" type="text" name="addonp_text_active_retention_field" value="<?php echo get_option('addonp_text_active_retention_field'); ?>"  size="40" />
    <?php }

	function addonp_text_buy_now_field(){ ?>
    <input title="<?php _e('Text Buy Now Button (Empty for default)', 'addonpayments' ); ?>" type="text" name="addonp_text_buy_now_field" value="<?php echo get_option('addonp_text_buy_now_field'); ?>"  size="40" />
    <?php }

	function addonp_text_pay_now(){ ?>
    <input title="<?php _e('Text Pay Now Button (Empty for default)', 'addonpayments' ); ?>" type="text" name="addonp_text_pay_now" value="<?php echo get_option('addonp_text_pay_now'); ?>"  size="40" />
    <?php }

	function addonp_text_continue_to_pay_button_field(){ ?>
    <input title="<?php _e('Text Continue to Pay Button (Empty for default)', 'addonpayments' ); ?>" type="text" name="addonp_text_continue_to_pay_button_field" value="<?php echo get_option('addonp_text_continue_to_pay_button_field'); ?>"  size="40" />
    <?php }

	function addonp_text_pay_addonpayments(){ ?>
    <input title="<?php _e('Text Pay Now Button at AddonPayments (Empty for default)', 'addonpayments' ); ?>" type="text" name="addonp_text_pay_addonpayments" value="<?php echo get_option('addonp_text_pay_addonpayments'); ?>"  size="40" />
    <?php }

	function addonp_addonpayments_language_field(){
        $language_codes = array(
            'Spanish'	 => 'ES',
            'English' 	 => 'GB',
            'French' 	 => 'FR',
			'Irish' 	 => 'GA',
			'German' 	 => 'DE',
			'Italian' 	 => 'IT',
			'Chinese' 	 => 'ZH',
			'Norwegian'	 => 'NO',
			'Swedish'	 => 'SV',
			'Catalan' 	 => 'CA',
			'Portuguese' => 'PT'
        );
    $option = get_option( 'addonp_addonpayments_language_field' );
    ?>
       <select id="addonp_addonpayments_language_field" name="addonp_addonpayments_language_field" class="js-addonpayments-language-list">
           <?php
           foreach ( $language_codes as $language => $code ) { ?>
                <option value="<?php echo $code; ?>" <?php if ( $option == $code ) echo ' selected'; ?>><?php echo $language; ?></option>
            <?php } ?>
        </select>
    <?php   }














	function display_addonp_frontend_panel_fields(){

		add_settings_section( 'addonp-frontend-settings-section', NULL, NULL, 'addonp-frontend-settings-options' );







		add_settings_field( 'addonp_currency_sign_field', __('Currency Sign EX: $', 'addonpayments'), 'addonp_currency_sign_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_place_currency_sign_field', __('Currency Sign position', 'addonpayments'), 'addonp_place_currency_sign_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_shipping_fields_to_screen_front_label_field', __('Select Shipping Fields to show', 'addonpayments'), 'addonp_shipping_fields_to_screen_front_label_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_billing_fields_to_screen_front_label_field', __('Select Billing Fields to show', 'addonpayments'), 'addonp_billing_fields_to_screen_front_label_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_coment1_fields_to_screen_front_label_field', __('Show Comment for users Order', 'addonpayments'), 'addonp_coment1_fields_to_screen_front_label_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_show_price_with_tax_field', __('Show price with Tax', 'addonpayments'), 'addonp_show_price_with_tax_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_post_price_included_tax_field', __('Text after price with Tax (Empty for default)', 'addonpayments'), 'addonp_post_price_included_tax_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_post_price_excluded_tax_field', __('Text after price without Tax (Empty for default)', 'addonpayments'), 'addonp_post_price_excluded_tax_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_show_text_retention_field', __('Show text retention', 'addonpayments'), 'addonp_show_text_retention_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_text_active_retention_field', __('Text active retention (Empty for default)', 'addonpayments'), 'addonp_text_active_retention_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_text_buy_now_field', __('Text Buy Now Button (Empty for default)', 'addonpayments'), 'addonp_text_buy_now_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_text_pay_now', __('Text Pay Now Button (Empty for default)', 'addonpayments'), 'addonp_text_pay_now', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_text_continue_to_pay_button_field', __('Text Continue to Pay Button (Empty for default)', 'addonpayments'), 'addonp_text_continue_to_pay_button_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_text_pay_addonpayments', __('Text Pay Now Button at AddonPayments (Empty for default)', 'addonpayments'), 'addonp_text_pay_addonpayments', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );
		add_settings_field( 'addonp_addonpayments_language_field', __('AddonPayment Language', 'addonpayments'), 'addonp_addonpayments_language_field', 'addonp-frontend-settings-options', 'addonp-frontend-settings-section' );







		// register all setings

		register_setting('addonp-frontend-settings-section', 'addonp_currency_sign_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_place_currency_sign_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_shipping_fields_to_screen_front_label_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_billing_fields_to_screen_front_label_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_coment1_fields_to_screen_front_label_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_show_price_with_tax_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_post_price_included_tax_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_post_price_excluded_tax_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_show_text_retention_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_text_active_retention_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_text_buy_now_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_text_pay_now' );
		register_setting('addonp-frontend-settings-section', 'addonp_text_continue_to_pay_button_field' );
		register_setting('addonp-frontend-settings-section', 'addonp_text_pay_addonpayments' );
		register_setting('addonp-frontend-settings-section', 'addonp_addonpayments_language_field' );


		}

	add_action('admin_init', 'display_addonp_frontend_panel_fields');