<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
  
 //Javascript enqueue script 
// Function to enqueue custom JavaScript for the admin
function digages_enqueue_admin_scripts() { 
    //Bootstrap js
     
    //popup order views 
    // Enqueue order-details script
    wp_enqueue_script('order-details-js', plugin_dir_url(__FILE__) . '../assets/js/order-details.js', array('jquery'), '1.5.1', true);
    wp_localize_script('order-details-js', 'orderDetailsAjax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('get_order_details_nonce')
    ));

     
 
    
    wp_enqueue_script('payment-methods', plugin_dir_url(__FILE__) . '../assets/js/popup/payment-methods.js', array('jquery'), '1.5.1', true);
    wp_localize_script('payment-methods', 'ajax_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('digages_fetch_payment_methods_nonce')
    ));


}

// Hook into the admin_enqueue_scripts action for admin scripts
add_action('admin_enqueue_scripts', 'digages_enqueue_admin_scripts');

?>