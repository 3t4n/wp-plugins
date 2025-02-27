<?php  
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

// Function to enqueue custom JavaScript for the admin
function digages_enqueue_crypto_scripts() {
    // Check if the current admin page is 'direct-payments-cryptocurrency'
    if (isset($_GET['page']) && $_GET['page'] === 'direct-payments-cryptocurrency') {
        if (!isset($_GET['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_wpnonce'])), 'digages_direct_payments_nonce')) {
            wp_die(esc_html__('Nonce verification failed', 'direct-payments-for-woocommerce'));
        }
     
        // Enqueue Notice Update

        wp_enqueue_script('digages-notice-update-scripts', plugin_dir_url(__FILE__) . '../assets/js/notice.js', array('jquery'), '1.8', true);
     
        // Enqueue crypto transfer JavaScript for the modal
        wp_enqueue_script('crypto-transfer-edit', plugin_dir_url(__FILE__) . '../assets/js/crypto/crypto-transfer-edit.js', array('jquery'), '1.8', true);

        $saved_crypto_accounts = get_option('digages_direct_crypto_accounts', array());
        // Localize the script with data for AJAX and translation
        wp_localize_script('crypto-transfer-edit', 'crypto_transfer_object', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('edit_crypto_account_nonce'),
            'success_message' => __('crypto account updated successfully.', 'direct-payments-for-woocommerce'),
            'error_message' => __('An error occurred while updating the account.', 'direct-payments-for-woocommerce'),
            'savedcryptoAccounts' => wp_json_encode($saved_crypto_accounts) // Add saved crypto accounts to the localized object
        ));

        // Enqueue the script for saving crypto transfer settings
        wp_enqueue_script(
            'crypto-transfer-save',
            plugin_dir_url(__FILE__) . '../assets/js/crypto/crypto-transfer-save.js', // Path to your JavaScript file
            array('jquery'), // Dependencies
            '1.8',
            true // Load in the footer
        );

        // Localize the save script with data for AJAX
        wp_localize_script('crypto-transfer-save', 'cryptoTransferData', array(
            'savedcryptoAccounts' => get_option('digages_direct_crypto_accounts', array()),
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('save_crypto_transfer_settings')
        ));
    }
}

// Hook into the admin_enqueue_scripts action for admin scripts
add_action('admin_enqueue_scripts', 'digages_enqueue_crypto_scripts');
?>
