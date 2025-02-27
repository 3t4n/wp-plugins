<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Toggle bank account status
add_action('wp_ajax_digages_toggle_bank_account_status', 'digages_toggle_bank_account_status');
function digages_toggle_bank_account_status() {
    // Ensure nonce verification
    check_ajax_referer('save_bank_transfer_settings', 'bank_transfer_nonce');

    // Fetch existing bank accounts
    $bank_accounts = get_option('digages_direct_bank_accounts', array());

    // Get the index and status
    $index = isset($_POST['index']) ? intval($_POST['index']) : null;
    $enabled = isset($_POST['enabled']) ? intval($_POST['enabled']) : 0;

    if ($index === null || !isset($bank_accounts[$index])) {
        wp_send_json_error(array('message' => 'Invalid account index'));
    }

    // Update the status of the specified account
    $bank_accounts[$index]['enabled'] = $enabled;
    update_option('digages_direct_bank_accounts', $bank_accounts);

    wp_send_json_success();
}

// Save new bank account
// Save new bank account
add_action('wp_ajax_save_bank_account', 'digages_save_bank_account');
function digages_save_bank_account() {
    // Ensure nonce verification
    check_ajax_referer('save_bank_transfer_settings', 'bank_transfer_nonce');

    // Fetch bank accounts
    $bank_accounts = get_option('digages_direct_bank_accounts', array());

    // Sanitize and prepare bank account data
    if (isset($_POST['bank_name']) && isset($_POST['account_name']) && isset($_POST['account_number']) &&
        isset($_POST['sort_code']) && isset($_POST['iban']) && isset($_POST['bic_swift'])) {

        // Unsplash before sanitizing
        $new_account = array(
            'bank_name'     => sanitize_text_field(wp_unslash($_POST['bank_name'])),
            'account_name'  => sanitize_text_field(wp_unslash($_POST['account_name'])),
            'account_number'=> sanitize_text_field(wp_unslash($_POST['account_number'])),
            'sort_code'     => sanitize_text_field(wp_unslash($_POST['sort_code'])),
            'iban'          => sanitize_text_field(wp_unslash($_POST['iban'])),
            'bic_swift'     => sanitize_text_field(wp_unslash($_POST['bic_swift'])),
            'enabled'       => 1 // Default enabled
        );

        // Add new account
        $bank_accounts[] = $new_account;
        update_option('digages_direct_bank_accounts', $bank_accounts);

        wp_send_json_success();
    }

    wp_send_json_error('Missing required data');
}


// Edit existing bank account
// Edit existing bank account
add_action('wp_ajax_edit_bank_account', 'digages_edit_bank_account');
function digages_edit_bank_account() {
    // Ensure nonce verification
    check_ajax_referer('save_bank_transfer_settings', 'bank_transfer_nonce');

    // Fetch existing bank accounts
    $bank_accounts = get_option('digages_direct_bank_accounts', array());

    // Get the index of the account to be edited
    $index = isset($_POST['index']) ? intval($_POST['index']) : null;

    if ($index === null || !isset($bank_accounts[$index])) {
        wp_send_json_error(array('message' => 'Invalid account index'));
    }

    // Sanitize and prepare updated account data
    if (isset($_POST['bank_name']) && isset($_POST['account_name']) && isset($_POST['account_number']) &&
        isset($_POST['sort_code']) && isset($_POST['iban']) && isset($_POST['bic_swift'])) {

        // Unsplash before sanitizing
        $updated_account = array(
            'bank_name'     => sanitize_text_field(wp_unslash($_POST['bank_name'])),
            'account_name'  => sanitize_text_field(wp_unslash($_POST['account_name'])),
            'account_number'=> sanitize_text_field(wp_unslash($_POST['account_number'])),
            'sort_code'     => sanitize_text_field(wp_unslash($_POST['sort_code'])),
            'iban'          => sanitize_text_field(wp_unslash($_POST['iban'])),
            'bic_swift'     => sanitize_text_field(wp_unslash($_POST['bic_swift'])),
            'enabled'       => isset($bank_accounts[$index]['enabled']) ? $bank_accounts[$index]['enabled'] : 1
        );

        // Update the selected account
        $bank_accounts[$index] = $updated_account;
        update_option('digages_direct_bank_accounts', $bank_accounts);

        wp_send_json_success();
    }

    wp_send_json_error('Missing required data');
}


// Delete bank account
add_action('wp_ajax_delete_bank_account', 'digages_delete_bank_account');
function digages_delete_bank_account() {
    // Ensure nonce verification
    check_ajax_referer('save_bank_transfer_settings', 'bank_transfer_nonce');

    // Fetch existing bank accounts
    $bank_accounts = get_option('digages_direct_bank_accounts', array());

    // Get the index of the account to be deleted
    $index = isset($_POST['index']) ? intval($_POST['index']) : null;

    if ($index === null || !isset($bank_accounts[$index])) {
        wp_send_json_error(array('message' => 'Invalid account index'));
    }

    // Remove the selected account and re-index the array
    unset($bank_accounts[$index]);
    $bank_accounts = array_values($bank_accounts);

    // Save the updated list
    update_option('digages_direct_bank_accounts', $bank_accounts);

    wp_send_json_success();
}

?>