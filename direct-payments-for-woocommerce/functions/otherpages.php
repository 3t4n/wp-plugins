<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

// Register hidden pages
function digages_direct_payments_register_hidden_pages() {
    // Bank Transfer page
    add_submenu_page(null, 'Bank Transfer', 'Bank Transfer', 'manage_woocommerce', 'direct-payments-bank-transfer', 'digages_bank_transfer_page_callback');

    // Mobile Money page
    add_submenu_page(null, 'Mobile Money', 'Mobile Money', 'manage_woocommerce', 'direct-payments-mobile-money', 'digages_mobile_money_page_callback');
    // Mobile Money page
    add_submenu_page(null, 'Crypto', 'Crypto', 'manage_woocommerce', 'direct-payments-cryptocurrency', 'digages_cryptocurrency_page_callback');

    // Peer-to-Peer Payments page
    add_submenu_page(null, 'Peer-to-Peer Payments', 'Peer-to-Peer Payments', 'manage_woocommerce', 'direct-payments-p2p', 'digages_p2p_page_callback');

    // About Payments page
    add_submenu_page(null, 'About', 'About', 'manage_woocommerce', 'direct-payments-about', 'digages_about_page_callback');
 
}
add_action('admin_menu', 'digages_direct_payments_register_hidden_pages');
?>