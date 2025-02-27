<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

// Function to enqueue custom JavaScript for the admin
function digages_enqueue_p2p_scripts() {
    // Check if the current admin page is 'direct-payments-p2p' 
    //if ( check_admin_referer( 'direct-payments-p2p' ) ) {
        if ( isset( $_GET['page'] ) && $_GET['page'] === 'direct-payments-p2p' ) {
            
        if (!isset($_GET['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_wpnonce'])), 'digages_direct_payments_nonce')) {
            wp_die(esc_html__('Nonce verification failed', 'direct-payments-for-woocommerce'));
        }
     
        // Enqueue Notice Update

        wp_enqueue_script('digages-notice-update-scripts', plugin_dir_url(__FILE__) . '../assets/js/notice.js', array('jquery'), '1.5.1', true);
     
        // Enqueue p2p transfer JavaScript for the modal
        wp_enqueue_script('p2p-transfer-edit', plugin_dir_url(__FILE__) . '../assets/js/p2p/p2p-transfer-edit.js', array('jquery'), '1.5.1', true);

        $saved_p2p_accounts = get_option('digages_direct_p2p_accounts', array());
        // Localize the script with data for AJAX and translation
        wp_localize_script('p2p-transfer-edit', 'p2p_transfer_object', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('edit_p2p_account_nonce'),
            'success_message' => __('p2p account updated successfully.', 'direct-payments-for-woocommerce'),
            'error_message' => __('An error occurred while updating the account.', 'direct-payments-for-woocommerce'),
            'savedp2pAccounts' => wp_json_encode($saved_p2p_accounts) // Add saved P2P accounts to the localized object
        ));
 

        wp_enqueue_script(
            'p2p-transfer-save',
            plugin_dir_url(__FILE__) . '../assets/js/p2p/p2p-transfer-save.js', // Path to your JavaScript file.
            array('jquery'), // Dependencies.
            '1.5.1',
            true // Load in the footer.
        );

        wp_localize_script('p2p-transfer-save', 'p2pTransferData', array(
            'savedp2pAccounts' => get_option('digages_direct_p2p_accounts', array()),
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('save_p2p_transfer_settings')
        ));
    }
}


// Hook into the admin_enqueue_scripts action for admin scripts
add_action('admin_enqueue_scripts', 'digages_enqueue_p2p_scripts');
?>
