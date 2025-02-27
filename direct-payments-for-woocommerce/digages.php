<?php
/*
Plugin Name: Direct Payments for Woocommerce
Description: Enable instant payments from your customers via bank transfers, mobile money, cryptocurrency and popular P2P platforms like PayPal, Venmo, Zelle, GCash e.t.c—all with zero transaction fees. No API keys or KYC required.
Version: 1.5.1
Author: Digages
Author URI: http://digages.com/
Plugin URI: https://digages.com/direct-payments-for-woocommerce/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
ob_start(); // Start output buffering

include_once(plugin_dir_path(__FILE__) . 'functions/enqueue.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'functions/frontadminenqueue.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'functions/submenu.php'); //this line adds submenu to WooCommerce menu
include_once(plugin_dir_path(__FILE__) . 'directpayment/direct-payment.php'); //this line adds the direct payment orders to woocommerce submenu
include_once(plugin_dir_path(__FILE__) . 'directpayment/orderdetails.php'); //this line displays the desktop orders

include_once(plugin_dir_path(__FILE__) . 'functions/otherpages.php'); 
include_once(plugin_dir_path(__FILE__) . 'functions/subtab.php'); 
include_once(plugin_dir_path(__FILE__) . 'functions/pages.php');  
include_once(plugin_dir_path(__FILE__) . 'settings/gateway.php'); // General Settings page

// Bank transfer, Mobile Money and P2P settings 

include_once(plugin_dir_path(__FILE__) . 'settings/pages/banktransfer/bank_transfer_common.php');  // Checks if Bank transfer is selected from General settings, then shows options in frontend payment
include_once(plugin_dir_path(__FILE__) . 'settings/pages/mobilemoney/mobile_transfer_common.php');  // Checks if Mobile Money is selected from General settings, then shows options in frontend payment
include_once(plugin_dir_path(__FILE__) . 'settings/pages/crypto/crypto_transfer_common.php');  // Checks if Mobile Money is selected from General settings, then shows options in frontend payment
include_once(plugin_dir_path(__FILE__) . 'settings/pages/p2p/p2p_transfer_common.php');  // Checks if P2P is selected from General settings, then shows options in frontend payment

include_once(plugin_dir_path(__FILE__) . 'settings/pages/banktransfer/bank_transfer_backend.php'); // Calls Bank transfer Backend Processing
include_once(plugin_dir_path(__FILE__) . 'settings/pages/mobilemoney/mobile_transfer_backend.php'); // Calls Mobile Money Backend Processing
include_once(plugin_dir_path(__FILE__) . 'settings/pages/crypto/crypto_transfer_backend.php'); // Calls Mobile Money Backend Processing
include_once(plugin_dir_path(__FILE__) . 'settings/pages/p2p/p2p_transfer_backend.php'); // Calls P2P Backend Processing

include_once(plugin_dir_path(__FILE__) . 'functions/bankenqueue.php'); //this line adds the Bank transfer enqueue function
include_once(plugin_dir_path(__FILE__) . 'functions/mobilequeue.php'); //this line adds the Mobile Money enqueue function
include_once(plugin_dir_path(__FILE__) . 'functions/cryptoqueue.php'); //this line adds the Mobile Money enqueue function
include_once(plugin_dir_path(__FILE__) . 'functions/p2penqueue.php'); //this line adds the P2P enqueue function 

//Frontend Popup payment codes
include_once(plugin_dir_path(__FILE__) . 'functions/popupenqueue.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'frontend/main.php'); // popup entry file
include_once(plugin_dir_path(__FILE__) . 'frontend/paymentpopup.php'); // frontend popup interface entry file
include_once(plugin_dir_path(__FILE__) . 'frontend/paymethods.php'); // Gets the Bank transfer and Mobile Money details


include_once(plugin_dir_path(__FILE__) . 'others.php'); // Calls functions of frontend pop after step 3
include_once(plugin_dir_path(__FILE__) . 'functions/initialorder.php'); // Calls the first order trigger
include_once(plugin_dir_path(__FILE__) . 'functions/sendmail.php'); // Calls order emails, confirm and cancel function 

include_once(plugin_dir_path(__FILE__) . 'functions/titles.php'); // sets custom page titles for all the admin pages

include_once(plugin_dir_path(__FILE__) . 'functions/canceledpage.php'); // sets custom page titles for all the admin pages





// Add custom links to the plugin row
function digages_dpwcm_plugin_custom_meta($links, $file) { 
    if ($file === plugin_basename(__FILE__)) {
        $links[] = '<a href="https://digages.com/docs/" target="_blank">Docs</a>'; 
        $links[] = '<a href="https://digages.com/contact/" target="_blank">Support</a>';
    }
    return $links;
}

add_filter('plugin_row_meta', 'digages_dpwcm_plugin_custom_meta', 10, 2);


 
// Add custom links to the plugin row
function digages_dpwcm_settings_custom_links($links) {
    $custom_links = array(
        
        '<a href="https://digages.com/direct-payments-for-woocommerce/" target="_blank" class="tumaz_pro_pulg">Buy PRO Version</a>',
        '<a href="./admin.php?page=wc-settings&tab=checkout&section=digages_direct_payments/">Settings</a>',
    );
    
    return array_merge($links, $custom_links);
}

// Replace 'your-plugin-slug' with the correct plugin slug
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'digages_dpwcm_settings_custom_links');


// Add this code to your theme's functions.php file or a custom plugin.
add_filter('woocommerce_email_subject_customer_completed_order', 'custom_completed_order_email_subject', 10, 2);
add_filter('woocommerce_email_subject_customer_processing_order', 'custom_completed_order_email_subject', 10, 2);

function custom_completed_order_email_subject($subject, $order) {
    if (!is_object($order)) {
        return $subject;
    }
    return sprintf('Thank You! Your order #%s has been confirmed', $order->get_order_number());
}


ob_end_clean(); // Clean (erase) the output buffer and turn off output buffering

?>