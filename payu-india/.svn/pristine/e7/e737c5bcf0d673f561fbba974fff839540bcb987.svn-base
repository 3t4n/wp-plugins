<?php
if (!defined('ABSPATH')) {
      exit;
}
if(!function_exists('payuAdminFields')){
      function payuAdminFields(){
            $site_url = get_site_url();
            $payu_payment_success_webhook_url = $site_url . '/wp-json/payu/v1/get-payment-success-update';
            $payu_payment_failed_webhook_url = $site_url . '/wp-json/payu/v1/get-payment-failed-update';
            $payu_payment_refund_webhook_url = $site_url . '/wp-json/payu/v1/refund-status-update';
            $form_fields = array(
                  'enabled' => array(
                        'title' => __('Enable/Disable', 'payubiz'),
                        'type' => 'checkbox',
                        'label' => __('Enable PayU Plugin', 'payubiz'),
                        'default' => 'no'
                  ),
                  'checkout_express' => array(
                        'title' => __('Select Checkout Experience', 'payubiz'),
                        'type' => 'select',
                        'options' => array(
                              'redirect' => 'PayU Redirect',
                              'bolt' => 'Bolt',
                              'checkout_express' => 'CommercePro' 
                        ),
                        'default' => 'redirect'
                  ),
                  'dynamic_charges_flag' => array(
                        'title' => __('Fetch Shipping Charges from Store', 'payubiz'),
                        'type' => 'checkbox',
                        'label' => __('Fetch Shipping Charges from Store', 'payubiz'),
                        'default' => 'false'
                  ),
                  
                  'description' => array(
                        'title' => __('Description:', 'payubiz'),
                        'type' => 'textarea',
                        'description' => __(
                              'This controls the description which the user sees during checkout.',
                              'payubiz'),
                        'default' => __(
                              'Pay securely by UPI, Cards, Net Banking or Wallets through PayU.', 
                              'payubiz')
                  ),
                  'gateway_module' => array(
                        'title' => __('Gateway Mode', 'payubiz'),
                        'type' => 'select',
                        'options' => array("0" => "Select", "sandbox" => "Sandbox", "production" => "Production"),
                        'description' => __('Mode of gateway subscription.', 'payubiz')
                  ),
                  'disable_checkout' => array(
                        'title' => __('Disable Checkout Page', 'payubiz'),
                        'type' => 'checkbox',
                        'label' => __('Disable Checkout Page', 'payubiz'),
                        'default' => 'no'
                  ),
                  'enable_refund' => array(
                        'title' => __('Allow users to cancel orders & initiate refunds from email and payment confirmation page', 'payubiz'),
                        'type' => 'checkbox',
                        'label' => __('Allow users to cancel orders & initiate refunds from email and payment confirmation page', 'payubiz'),
                        'default' => 'no'
                  ),
                  'enable_webhook' => array(
                        'title' => __('Webhoook URLs', 'payubiz'),
                        'type' => 'hidden',
                        'description' => __('Please add the following URLs to the PayU dashboard webhook settings:
                        <br> <span style="font-weight:700;">Refund URL:</span> '. $payu_payment_refund_webhook_url.'<br>
                        <span style="font-weight:700;">Success URL:</span> ' .$payu_payment_success_webhook_url.'<br>
                        <span style="font-weight:700;">Failed URL:</span> '.$payu_payment_failed_webhook_url,'payubiz'),
                  ),
                  'payu_account' => array(
                        'title' => __('PayU Account', 'payubiz'),
                        'type' => 'hidden',
                        'description' => __('A PayU account is required to configure the the key & salt. <a target="_blank" href="https://onboarding.payu.in/app/account/signup?partner_name=WooCommerce&partner_source=Affiliate+Links&partner_uuid=11eb-3a29-70592552-8c2b-0a696b110fde&source=Partner">Sign up</a> for a PayU merchant account or <a target="_blank" href="https://onboarding.payu.in/app/account/login?partner_name=WooCommerce&partner_source=Affiliate+Links&partner_uuid=11eb-3a29-70592552-8c2b-0a696b110fde&source=Partner">login</a> to your existing account.'),
                  ),
                  'currency1_payu_key' => array(
                        'title' => __('PayU Key', 'payubiz'),
                        'type' => 'text',
                        'description' =>  __('The key can be found in the "Payment Gateway" tab within the "Key Salt Details" section  in the PayU dashboard.', 'payubiz')
                  ),
                  'currency1_payu_salt' => array(
                        'title' => __('PayU Salt', 'payubiz'),
                        'type' => 'text',
                        'description' =>  __('The key can be found in the "Payment Gateway" tab within the "Key Salt Details" section  in the PayU dashboard.', 'payubiz')
                  ),
                  'verify_payment' => array(
                        'title' => __('Verify Payment', 'payubiz'),
                        'type' => 'select',
                        'options' => array("0" => "Select", "yes" => "Yes", "no" => "No"),
                        'description' => __('Verify Payment at server.', 'payubiz')
                  ),
                  'redirect_page_id' => array(
                        'title' => __('Return Page'),
                        'type' => 'select',
                        'options' => payu_get_pages('Select Page'),
                        'description' => "Post payment redirect URL for which payment is not successful."
                  )
            );
            return apply_filters(
                  'wc_payu_settings',
                  $form_fields
            );
            
      }
      
}
