<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
// setting plugin title
// Hook into admin_title to modify the <title> tag in the head

function digages_plugin_custom_admin_title( $admin_title, $title ) {
    // Map of page parameters to custom titles
    $pages = [
        'direct-payments-bank-transfer' => 'Bank Transfer Settings',
        'direct-payments-mobile-money' => 'Mobile Money Settings',
        'direct-payments-cryptocurrency' => 'Cryptocurrency Settings',
        'direct-payments-p2p' => 'Peer-to-peer Settings',
        'direct-payments-about' => 'About - Direct Payments For Woocommerce Settings',
        'wc-settings&tab=checkout&section=digages_direct_payments' => 'Direct Payments For Woocommerce Settings',
        'direct-payments' => 'Orders - Direct Payments For Woocommerce Settings',
        'direct-payments&status=wc-processing' => 'Processing Orders - Direct Payments For Woocommerce Settings',
        'direct-payments&status=wc-on-hold' => 'On Hold Orders - Direct Payments For Woocommerce Settings',
        'direct-payments&status=wc-completed' => 'Completed Orders - Direct Payments For Woocommerce Settings',
        'direct-payments&status=wc-cancelled' => 'Cancelled Orders - Direct Payments For Woocommerce Settings',
        'direct-payments&status=all' => 'All Orders - Direct Payments For Woocommerce Settings'
    ];

    // Check if the 'page' parameter exists and is not empty
    // phpcs:ignore WordPress.Security.NonceVerification.Recommended
    if ( isset( $_GET['page'] ) ) { 
        // Remove slashes and sanitize the 'page' parameter
        // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        $page = sanitize_text_field( wp_unslash( $_GET['page'] ) );
        
        // Check if the page exists in the mapping
        $page_title = $pages[ $page ] ?? null;
        
        // If a custom title is found, update the admin title
        return $page_title ? $page_title . ' - ' . esc_html(wp_strip_all_tags(get_bloginfo( 'name' ))) : $admin_title;
    }

    return $admin_title;
}
add_filter( 'admin_title', 'digages_plugin_custom_admin_title', 10, 2 );

?>