<?php  
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

// Function to enqueue custom JavaScript for the admin
function digages_enqueue_mobile_scripts() {
    // Check if the current admin page is 'direct-payments-mobile-money'
    if (isset($_GET['page']) && $_GET['page'] === 'direct-payments-mobile-money') {
        if (!isset($_GET['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_wpnonce'])), 'digages_direct_payments_nonce')) {
            wp_die(esc_html__('Nonce verification failed', 'direct-payments-for-woocommerce'));
        }
     
        // Enqueue Notice Update

        wp_enqueue_script('digages-notice-update-scripts', plugin_dir_url(__FILE__) . '../assets/js/notice.js', array('jquery'), '1.5.1', true);
     
        // Enqueue mobile transfer JavaScript for the modal
        wp_enqueue_script('mobile-transfer-edit', plugin_dir_url(__FILE__) . '../assets/js/mobilemon/mobile-transfer-edit.js', array('jquery'), '1.5.1', true);

        $saved_mobile_accounts = get_option('digages_direct_mobile_accounts', array());
        // Localize the script with data for AJAX and translation
        wp_localize_script('mobile-transfer-edit', 'mobile_transfer_object', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('edit_mobile_account_nonce'),
            'success_message' => __('Mobile account updated successfully.', 'direct-payments-for-woocommerce'),
            'error_message' => __('An error occurred while updating the account.', 'direct-payments-for-woocommerce'),
            'savedMobileAccounts' => wp_json_encode($saved_mobile_accounts) // Add saved mobile accounts to the localized object
        ));

        // Enqueue the script for saving mobile transfer settings
        wp_enqueue_script(
            'mobile-transfer-save',
            plugin_dir_url(__FILE__) . '../assets/js/mobilemon/mobile-transfer-save.js', // Path to your JavaScript file
            array('jquery'), // Dependencies
            '1.5.1',
            true // Load in the footer
        );

        // Localize the save script with data for AJAX
        wp_localize_script('mobile-transfer-save', 'mobileTransferData', array(
            'savedMobileAccounts' => get_option('digages_direct_mobile_accounts', array()),
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('save_mobile_transfer_settings')
        ));
    }
}

// Hook into the admin_enqueue_scripts action for admin scripts
add_action('admin_enqueue_scripts', 'digages_enqueue_mobile_scripts');
?>
