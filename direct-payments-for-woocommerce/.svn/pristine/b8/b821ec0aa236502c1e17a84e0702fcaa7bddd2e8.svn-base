<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

// Main Submenu page (Direct Payments)
function digages_direct_payments_menu() {
    add_submenu_page(
        'woocommerce',
        'Direct Payments',
        'Direct Payments',
        'manage_woocommerce',
        'digages-direct-payments',
        'digages_direct_orders_page_callback'
    );
}
// Calls the function to admin section
add_action('admin_menu', 'digages_direct_payments_menu');
?>