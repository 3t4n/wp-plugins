<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
// Callback functions for hidden pages
function digages_direct_payments_settings_tabs() {
    // Only verify the nonce for actions where it is needed, not for navigation.
    if (isset($_POST['action']) && $_POST['action'] === 'some_sensitive_action') {
        if (!isset($_POST['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), 'digages_direct_payments_nonce')) {
            wp_die(esc_html__('Nonce verification failed', 'direct-payments-for-woocommerce'));
        }
    }

    // Show subsection links if on the digages_direct_payments settings page
    if (isset($_GET['section']) && in_array(sanitize_text_field(wp_unslash($_GET['section'])), ['digages_direct_payments', 'direct-payments-bank-transfer', 'direct-payments-mobile-money'])) {
        echo '<h2 class="nav-tab-wrapper"></h2>';

        // Links to subsections
     
        echo '<div class="digage_tabahref">';
        $nonce = wp_create_nonce('digages_direct_payments_nonce');
        echo '<a href="' . esc_url(add_query_arg(['page' => 'wc-settings', 'tab' => 'checkout', 'section' => 'digages_direct_payments', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  >General</a> | ';        
        echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-bank-transfer', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  >Bank Transfer</a> | ';
        echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-mobile-money', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  >Mobile Money</a> | ';
        echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-cryptocurrency', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  >Crypto</a> | ';
        echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-p2p', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  >Peer-to-Peer</a> | ';
        echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-about', '_wpnonce' => $nonce], admin_url('admin.php'))) . '" >About</a> | ';
        echo '</div>';
    }
}


// Callback functions for hidden pages
function digages_direct_payments_settings_tabys() {
    echo '<h2 class="nav-tab-wrapper">';
    echo '<a href="' . esc_url(add_query_arg('tab', 'general', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">General</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'products', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">Products</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'shipping', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">Shipping</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'checkout', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab nav-tab-active">Payments</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'account', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">Accounts & Privacy</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'email', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">Emails</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'integration', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">Integration</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'site-visibility', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">Site visibility</a>';
    echo '<a href="' . esc_url(add_query_arg('tab', 'advanced', admin_url('admin.php?page=wc-settings'))) . '" class="nav-tab">Advanced</a>';
    echo '</h2>';
}

function digages_direct_payments_settings_tabyis() {
    echo '<h2 class="nav-tab-wrapper"></h2>';
        
    // Links to subsections
   
    echo '<div class="digage_tabahref">';
    $nonce = wp_create_nonce('digages_direct_payments_nonce');
    echo '<a href="' . esc_url(add_query_arg(['page' => 'wc-settings', 'tab' => 'checkout', 'section' => 'digages_direct_payments', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  >General</a> | ';        
    echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-bank-transfer', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  >Bank Transfer</a> | ';
    echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-mobile-money', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  >Mobile Money</a> | ';
    echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-cryptocurrency', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  >Crypto</a> | ';
    echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-p2p', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  >Peer-to-Peer</a> | ';
    echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-about', '_wpnonce' => $nonce], admin_url('admin.php'))) . '"  >About</a> | ';
    echo '</div>';
}

add_action('woocommerce_settings_tabs', 'digages_direct_payments_settings_tabs');
?>
