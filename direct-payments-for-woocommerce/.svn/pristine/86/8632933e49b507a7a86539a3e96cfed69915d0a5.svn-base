<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Enqueue scripts and styles
function digages_direct_pop_payments_enqueue_scripts(){

     
    // Enqueue custom styles and scripts for both frontend and admin
    $digages_direct_payments_settings = get_option('woocommerce_digages_direct_payments_settings');
    $accent_color = $digages_direct_payments_settings['accent_color'];
    $site_url = get_site_url();
    wp_enqueue_style('digages-direct-payments-css', plugin_dir_url(__FILE__) . '../assets/css/digages-direct-payments.css', array(), '1.5.1');
    wp_add_inline_style( 'digages-direct-payments-css', ":root { --accent-color: $accent_color; }" );
     
    // Enqueue custom JS to handle modal behavior
    wp_enqueue_script('custom-digages-mobilemoney-modal', plugin_dir_url(__FILE__) . '../assets/js/custom-digages-mobilemoney-modal.js', array('jquery'), '1.5.1', true);
    
    // Pass the SVG path to JavaScript
    wp_localize_script('custom-digages-mobilemoney-modal', 'loadersvg', array(
        'svgPath' => plugins_url('../assets/img/poploader.svg', __FILE__),
        'siteUrl' => $site_url
    ));
    
    wp_enqueue_script('payment-methods', plugin_dir_url(__FILE__) . '../assets/js/payment-methods.js', array('jquery'), '1.5.1', true);
    wp_localize_script('payment-methods', 'ajax_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('digages_fetch_payment_methods_nonce')
    ));
 
}

add_action('wp_enqueue_scripts', 'digages_direct_pop_payments_enqueue_scripts'); // Frontend 

 

?>