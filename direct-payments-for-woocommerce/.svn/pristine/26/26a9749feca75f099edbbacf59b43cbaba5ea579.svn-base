<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Toggle p2p account status
add_action('wp_ajax_digages_toggle_p2p_account_status', 'digages_toggle_p2p_account_status');
function digages_toggle_p2p_account_status() {
    // Ensure nonce verification
    check_ajax_referer('save_p2p_transfer_settings', 'p2p_transfer_nonce');

    // Fetch existing p2p accounts
    $p2p_accounts = get_option('digages_direct_p2p_accounts', array());

    // Get the index and status
    $index = isset($_POST['index']) ? intval($_POST['index']) : null;
    $enabled = isset($_POST['enabled']) ? intval($_POST['enabled']) : 0;

    if ($index === null || !isset($p2p_accounts[$index])) {
        wp_send_json_error(array('message' => 'Invalid account index'));
    }

    // Update the status of the specified account
    $p2p_accounts[$index]['enabled'] = $enabled;
    update_option('digages_direct_p2p_accounts', $p2p_accounts);

    wp_send_json_success();
}

// Save new p2p account
// Save new p2p account
add_action('wp_ajax_save_p2p_account', 'digages_save_p2p_account');
function digages_save_p2p_account() {
    // Ensure nonce verification
    check_ajax_referer('save_p2p_transfer_settings', 'p2p_transfer_nonce');

    // Fetch p2p accounts
    $p2p_accounts = get_option('digages_direct_p2p_accounts', array());

    // Sanitize and prepare p2p account data
    if (isset($_POST['p2p_name']) && isset($_POST['account_name']) && isset($_POST['account_id']) ) {

        // Unsplash before sanitizing
        $new_account = array(
            'p2p_name'     => sanitize_text_field(wp_unslash($_POST['p2p_name'])),
            'account_name'  => sanitize_text_field(wp_unslash($_POST['account_name'])),
            'account_id'=> sanitize_text_field(wp_unslash($_POST['account_id'])),
            'account_type' => isset($_POST['account_type']) ? sanitize_text_field(wp_unslash($_POST['account_type'])) : '',
            'enabled'       => 1 // Default enabled
        );

        // Add new account
        $p2p_accounts[] = $new_account;
        update_option('digages_direct_p2p_accounts', $p2p_accounts);

        wp_send_json_success();
    }

    wp_send_json_error('Missing required data');
}


// Edit existing p2p account
// Edit existing p2p account
add_action('wp_ajax_edit_p2p_account', 'digages_edit_p2p_account');
function digages_edit_p2p_account() {
    // Ensure nonce verification
    check_ajax_referer('save_p2p_transfer_settings', 'p2p_transfer_nonce');

    // Fetch existing p2p accounts
    $p2p_accounts = get_option('digages_direct_p2p_accounts', array());

    // Get the index of the account to be edited
    $index = isset($_POST['index']) ? intval($_POST['index']) : null;

    if ($index === null || !isset($p2p_accounts[$index])) {
        wp_send_json_error(array('message' => 'Invalid account index'));
    }

    // Sanitize and prepare updated account data
    if (isset($_POST['p2p_name']) && isset($_POST['account_name']) && isset($_POST['account_id']) ) {

        // Unsplash before sanitizing
        $updated_account = array(
            'p2p_name'     => sanitize_text_field(wp_unslash($_POST['p2p_name'])),
            'account_name'  => sanitize_text_field(wp_unslash($_POST['account_name'])),
            'account_id'=> sanitize_text_field(wp_unslash($_POST['account_id'])),'account_type' => isset($_POST['account_type']) ? sanitize_text_field(wp_unslash($_POST['account_type'])) : '',
            'enabled'       => isset($p2p_accounts[$index]['enabled']) ? $p2p_accounts[$index]['enabled'] : 1
        );

        // Update the selected account
        $p2p_accounts[$index] = $updated_account;
        update_option('digages_direct_p2p_accounts', $p2p_accounts);

        wp_send_json_success();
    }

    wp_send_json_error('Missing required data');
}


// Delete p2p account
add_action('wp_ajax_delete_p2p_account', 'digages_delete_p2p_account');
function digages_delete_p2p_account() {
    // Ensure nonce verification
    check_ajax_referer('save_p2p_transfer_settings', 'p2p_transfer_nonce');

    // Fetch existing p2p accounts
    $p2p_accounts = get_option('digages_direct_p2p_accounts', array());

    // Get the index of the account to be deleted
    $index = isset($_POST['index']) ? intval($_POST['index']) : null;

    if ($index === null || !isset($p2p_accounts[$index])) {
        wp_send_json_error(array('message' => 'Invalid account index'));
    }

    // Remove the selected account and re-index the array
    unset($p2p_accounts[$index]);
    $p2p_accounts = array_values($p2p_accounts);

    // Save the updated list
    update_option('digages_direct_p2p_accounts', $p2p_accounts);

    wp_send_json_success();
}

?>