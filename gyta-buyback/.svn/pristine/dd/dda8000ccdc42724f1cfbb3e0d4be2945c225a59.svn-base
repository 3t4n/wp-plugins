<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Adds a privacy policy statement.
 */
function wcpti_plugin_add_privacy_policy_content() {
    if ( ! function_exists( 'wp_add_privacy_policy_content' ) ) {
        return;
    }
    
    $content = '<h2>' .__('Customer (Public) Privacy Information','wcpti').'</h2>';
    $content .= '<p class="privacy-policy-tutorial">' .__('This information is for your public privacy page and concerns customer data','wcpti').'</p>';
    $content .= '<p>'.sprintf(__('Your mailing address is used by EasyPost create shipping labels.  We also use EasyPost to validate the deliverability of your address.  
    					Their privacy policy is <a href="%1$s" target="_blank">here</a>.','wcpti'),'https://www.easypost.com/privacy').'</p>';
    
    $content .= '<p class="privacy-policy-tutorial">' .__('You may wish to edit the statement below to more clearly identify where your order data privacy policy exists in your document','wcpti').'</p>';
    $content .= '<p>'.__('Your payment address information (such as PayPal, Venmo, Interac, or Zelle contact information) is stored in your order data.
    					This data is used according to the WooCommerce policy sections in this document.','wcpti').'</p>';

    $content .= '<h2>' .__('WordPress Administrator (Private) Privacy Information','wcpti').'</h2>';
    $content .= '<p class="privacy-policy-tutorial">' .__('This information is for your internal use and may not be necessary for your public privacy page','wcpti').'</p>';

    $content .= '<p>'.sprintf(__('Gyta BuyBack documentation and version history is stored on an external website.    
    					Their privacy policy is <a href="%1$s" target="_blank">here</a>.','wcpti'),'https://gytabuyback.com/privacy-policy/').'</p>';
    $content .= '<p>'.sprintf(__('Gyta BuyBack uses Freemium to track basic plugin stat usage and handle premium plugin accounts and account management.    
    					Their privacy policy is <a href="%1$s" target="_blank">here</a>.','wcpti'),'https://freemius.com/privacy/').'</p>';
    $content .= '<p>'.sprintf(__('Gyta BuyBack uses EasyPost create shipping labels and verify addresses.  Your account with their system is subject to their privacy policy.    
    					Their privacy policy is <a href="%1$s" target="_blank">here</a>.','wcpti'),'https://www.easypost.com/privacy').'</p>';

    
            
    wp_add_privacy_policy_content( 'Gyta BuyBack', wp_kses_post( wpautop( $content, false ) ) );
}
 
