<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Toggle mobile account status
add_action('wp_ajax_digages_toggle_mobile_account_status', 'digages_toggle_mobile_account_status');
function digages_toggle_mobile_account_status() {
    // Ensure nonce verification
    check_ajax_referer('save_mobile_transfer_settings', 'mobile_transfer_nonce');

    // Fetch existing mobile accounts
    $mobile_accounts = get_option('digages_direct_mobile_accounts', array());

    // Get the index and status
    $index = isset($_POST['index']) ? intval($_POST['index']) : null;
    $enabled = isset($_POST['enabled']) ? intval($_POST['enabled']) : 0;

    if ($index === null || !isset($mobile_accounts[$index])) {
        wp_send_json_error(array('message' => 'Invalid account index'));
    }

    // Update the status of the specified account
    $mobile_accounts[$index]['enabled'] = $enabled;
    update_option('digages_direct_mobile_accounts', $mobile_accounts);

    wp_send_json_success();
}

// Save new mobile account
// Save new mobile account
add_action('wp_ajax_save_mobile_account', 'digages_save_mobile_account');
function digages_save_mobile_account() {
    // Ensure nonce verification
    check_ajax_referer('save_mobile_transfer_settings', 'mobile_transfer_nonce');

    // Fetch mobile accounts
    $mobile_accounts = get_option('digages_direct_mobile_accounts', array());

    // Sanitize and prepare mobile account data
    if (isset($_POST['mobile_name']) && isset($_POST['account_name']) && isset($_POST['phone_number']) ) {

        // Unsplash before sanitizing
        $new_account = array(
            'mobile_name'     => sanitize_text_field(wp_unslash($_POST['mobile_name'])),
            'account_name'  => sanitize_text_field(wp_unslash($_POST['account_name'])),
            'phone_number'=> sanitize_text_field(wp_unslash($_POST['phone_number'])), 
            'enabled'       => 1 // Default enabled
        );

        // Add new account
        $mobile_accounts[] = $new_account;
        update_option('digages_direct_mobile_accounts', $mobile_accounts);

        wp_send_json_success();
    }

    wp_send_json_error('Missing required data');
}


// Edit existing mobile account
// Edit existing mobile account
add_action('wp_ajax_edit_mobile_account', 'digages_edit_mobile_account');
function digages_edit_mobile_account() {
    // Ensure nonce verification
    check_ajax_referer('save_mobile_transfer_settings', 'mobile_transfer_nonce');

    // Fetch existing mobile accounts
    $mobile_accounts = get_option('digages_direct_mobile_accounts', array());

    // Get the index of the account to be edited
    $index = isset($_POST['index']) ? intval($_POST['index']) : null;

    if ($index === null || !isset($mobile_accounts[$index])) {
        wp_send_json_error(array('message' => 'Invalid account index'));
    }

    // Sanitize and prepare updated account data
    if (isset($_POST['mobile_name']) && isset($_POST['account_name']) && isset($_POST['phone_number']) ) {

        // Unsplash before sanitizing
        $updated_account = array(
            'mobile_name'     => sanitize_text_field(wp_unslash($_POST['mobile_name'])),
            'account_name'  => sanitize_text_field(wp_unslash($_POST['account_name'])),
            'phone_number'=> sanitize_text_field(wp_unslash($_POST['phone_number'])), 
            'enabled'       => isset($mobile_accounts[$index]['enabled']) ? $mobile_accounts[$index]['enabled'] : 1
        );

        // Update the selected account
        $mobile_accounts[$index] = $updated_account;
        update_option('digages_direct_mobile_accounts', $mobile_accounts);

        wp_send_json_success();
    }

    wp_send_json_error('Missing required data');
}


// Delete mobile account
add_action('wp_ajax_delete_mobile_account', 'digages_delete_mobile_account');
function digages_delete_mobile_account() {
    // Ensure nonce verification
    check_ajax_referer('save_mobile_transfer_settings', 'mobile_transfer_nonce');

    // Fetch existing mobile accounts
    $mobile_accounts = get_option('digages_direct_mobile_accounts', array());

    // Get the index of the account to be deleted
    $index = isset($_POST['index']) ? intval($_POST['index']) : null;

    if ($index === null || !isset($mobile_accounts[$index])) {
        wp_send_json_error(array('message' => 'Invalid account index'));
    }

    // Remove the selected account and re-index the array
    unset($mobile_accounts[$index]);
    $mobile_accounts = array_values($mobile_accounts);

    // Save the updated list
    update_option('digages_direct_mobile_accounts', $mobile_accounts);

    wp_send_json_success();
}

?>