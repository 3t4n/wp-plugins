<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

function digages_direct_payments_page_content() {
    // Call the function to display the settings tabs
    digages_direct_payments_settings_tabys();
    digages_direct_payments_settings_tabyis(); 

    // Verify nonce to ensure the request is legitimate
    $nonce = isset($_GET['_wpnonce']) ? sanitize_text_field(wp_unslash($_GET['_wpnonce'])) : '';

    if (!wp_verify_nonce($nonce, 'digages_direct_payments_nonce')) {
        wp_die(esc_html__('Nonce verification failed', 'direct-payments-for-woocommerce'));
    }

    // Determine the current section or tab based on the URL parameter
    $current_section = isset($_GET['section']) ? sanitize_text_field(wp_unslash($_GET['section'])) : 'general';
    $current_subsection = isset($_GET['subsection']) ? sanitize_text_field(wp_unslash($_GET['subsection'])) : '';

    // Display the appropriate settings page content based on the section or subsection
    echo '<div class="wrap">';

    switch ($current_subsection) {
        case 'bank_transfer':
            echo '<h2>' . esc_html__('Bank Transfer Settings', 'direct-payments-for-woocommerce') . '</h2>';
            // Include specific content or settings for Bank Transfer
            break;
        case 'mobile_money':
            echo '<h2>' . esc_html__('Mobile Money Settings', 'direct-payments-for-woocommerce') . '</h2>';
            // Include specific content or settings for Mobile Money
            break;
            case 'crypto':
                echo '<h2>' . esc_html__('Cryptocurrency Settings', 'direct-payments-for-woocommerce') . '</h2>';
                // Include specific content or settings for Mobile Money
                break;
        case 'peer_to_peer':
            echo '<h2>' . esc_html__('Peer-to-Peer Settings', 'direct-payments-for-woocommerce') . '</h2>';
            // Include specific content or settings for Peer-to-Peer
            break;
        case 'about':
            echo '<h2>' . esc_html__('About', 'direct-payments-for-woocommerce') . '</h2>';
            // Include specific content or settings for About
            break; 
        default: 
            // Include default content or settings for General 
            break;
    }

    echo '</div>';
}

function digages_bank_transfer_page_callback() {
    digages_direct_payments_page_content();
    include_once(plugin_dir_path(__FILE__) . '../settings/pages/banktransfer/bank_transfer.php'); 
}

function digages_mobile_money_page_callback() {
    digages_direct_payments_page_content();
    include_once(plugin_dir_path(__FILE__) . '../settings/pages/mobilemoney/mobile_transfer.php'); 
}

function digages_cryptocurrency_page_callback() {
    digages_direct_payments_page_content();
    include_once(plugin_dir_path(__FILE__) . '../settings/pages/crypto/crypto_transfer.php'); 
}
function digages_p2p_page_callback() {
    digages_direct_payments_page_content();
    include_once(plugin_dir_path(__FILE__) . '../settings/pages/p2p/p2p_transfer.php');
}

function digages_about_page_callback() {
    digages_direct_payments_page_content();
    include_once(plugin_dir_path(__FILE__) . '../settings/pages/about.php');
}
 

?>