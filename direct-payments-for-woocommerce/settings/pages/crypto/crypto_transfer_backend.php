<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Toggle crypto account status
add_action('wp_ajax_digages_toggle_crypto_account_status', 'digages_toggle_crypto_account_status');
function digages_toggle_crypto_account_status() {
    // Ensure nonce verification
    check_ajax_referer('save_crypto_transfer_settings', 'crypto_transfer_nonce');

    // Fetch existing crypto accounts
    $crypto_accounts = get_option('digages_direct_crypto_accounts', array());

    // Get the index and status
    $index = isset($_POST['index']) ? intval($_POST['index']) : null;
    $enabled = isset($_POST['enabled']) ? intval($_POST['enabled']) : 0;

    if ($index === null || !isset($crypto_accounts[$index])) {
        wp_send_json_error(array('message' => 'Invalid account index'));
    }

    // Update the status of the specified account
    $crypto_accounts[$index]['enabled'] = $enabled;
    update_option('digages_direct_crypto_accounts', $crypto_accounts);

    wp_send_json_success();
}

// Save new crypto account
// Save new crypto account
add_action('wp_ajax_save_crypto_account', 'digages_save_crypto_account');
function digages_save_crypto_account() {
    // Ensure nonce verification
    check_ajax_referer('save_crypto_transfer_settings', 'crypto_transfer_nonce');

    // Fetch crypto accounts
    $crypto_accounts = get_option('digages_direct_crypto_accounts', array());

    // Sanitize and prepare crypto account data
    if (isset($_POST['crypto_name']) && isset($_POST['account_name']) && isset($_POST['phone_number']) ) {

        // Unsplash before sanitizing
        $new_account = array(
            'crypto_name'     => sanitize_text_field(wp_unslash($_POST['crypto_name'])),
            'account_name'  => sanitize_text_field(wp_unslash($_POST['account_name'])),
            'phone_number'=> sanitize_text_field(wp_unslash($_POST['phone_number'])), 
            'enabled'       => 1 // Default enabled
        );

        // Add new account
        $crypto_accounts[] = $new_account;
        update_option('digages_direct_crypto_accounts', $crypto_accounts);

        wp_send_json_success();
    }

    wp_send_json_error('Missing required data');
}


// Edit existing crypto account
// Edit existing crypto account
add_action('wp_ajax_edit_crypto_account', 'digages_edit_crypto_account');
function digages_edit_crypto_account() {
    // Ensure nonce verification
    check_ajax_referer('save_crypto_transfer_settings', 'crypto_transfer_nonce');

    // Fetch existing crypto accounts
    $crypto_accounts = get_option('digages_direct_crypto_accounts', array());

    // Get the index of the account to be edited
    $index = isset($_POST['index']) ? intval($_POST['index']) : null;

    if ($index === null || !isset($crypto_accounts[$index])) {
        wp_send_json_error(array('message' => 'Invalid account index'));
    }

    // Sanitize and prepare updated account data
    if (isset($_POST['crypto_name']) && isset($_POST['account_name']) && isset($_POST['phone_number']) ) {

        // Unsplash before sanitizing
        $updated_account = array(
            'crypto_name'     => sanitize_text_field(wp_unslash($_POST['crypto_name'])),
            'account_name'  => sanitize_text_field(wp_unslash($_POST['account_name'])),
            'phone_number'=> sanitize_text_field(wp_unslash($_POST['phone_number'])), 
            'enabled'       => isset($crypto_accounts[$index]['enabled']) ? $crypto_accounts[$index]['enabled'] : 1
        );

        // Update the selected account
        $crypto_accounts[$index] = $updated_account;
        update_option('digages_direct_crypto_accounts', $crypto_accounts);

        wp_send_json_success();
    }

    wp_send_json_error('Missing required data');
}


// Delete crypto account
add_action('wp_ajax_delete_crypto_account', 'digages_delete_crypto_account');
function digages_delete_crypto_account() {
    // Ensure nonce verification
    check_ajax_referer('save_crypto_transfer_settings', 'crypto_transfer_nonce');

    // Fetch existing crypto accounts
    $crypto_accounts = get_option('digages_direct_crypto_accounts', array());

    // Get the index of the account to be deleted
    $index = isset($_POST['index']) ? intval($_POST['index']) : null;

    if ($index === null || !isset($crypto_accounts[$index])) {
        wp_send_json_error(array('message' => 'Invalid account index'));
    }

    // Remove the selected account and re-index the array
    unset($crypto_accounts[$index]);
    $crypto_accounts = array_values($crypto_accounts);

    // Save the updated list
    update_option('digages_direct_crypto_accounts', $crypto_accounts);

    wp_send_json_success();
}

?>