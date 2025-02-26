<?php

// Ensure this file is not accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Automatically generate alt text when an attachment is added.
 */

function altm_generate_alt_text_on_attachment_add($attachment_id) {
    altm_log('Generating alt text for new attachment: ' . $attachment_id);
    // Fetch the specific option for auto-generating alt text
    $alt_magic_auto_generate = get_option('alt_magic_auto_generate');
    $alt_magic_account_active = get_option('alt_magic_account_active');

    $user_credits = altm_get_user_credits_data();
   

    if ($user_credits['credits_available'] > 0) {

        if ($alt_magic_account_active == 1) {
            if ($alt_magic_auto_generate == 1) {   
                altm_log('Generating alt text for new attachment: ' . $attachment_id);
                altm_generate_alt_text($attachment_id);
            } else {
                altm_log('Auto-generating alt text is disabled.');
            }
        } else {
            altm_log('Alt Magic account is not active.');
        }
    } else {
        // Set a transient to show an admin notice
        altm_send_notification_to_user();
        set_transient('alt_magic_no_credits_notice', true, 60);
        altm_log('Not enough credits to generate alt text.');
    }
}

add_action('add_attachment', 'altm_generate_alt_text_on_attachment_add');

// Hook to display admin notice
add_action('admin_notices', 'alt_magic_no_credits_notice');

function alt_magic_no_credits_notice() {
    if (get_transient('alt_magic_no_credits_notice')) {
        $screen = get_current_screen();
        if ($screen->id === 'upload' || $screen->id === 'media') {
            ?>
            <div class="notice notice-error is-dismissible">
                <p><?php esc_html_e('Alt Magic Alert: Not enough credits to generate alt text. Please purchase more credits.', 'alt-magic-ai-powered-alt-texts'); ?></p>
            </div>
            <?php
            // Delete the transient after displaying the notice
            delete_transient('alt_magic_no_credits_notice');
        }
    }
}


function altm_send_notification_to_user() {
    $user_id = get_option('alt_magic_user_id');
    $api_key = get_option('alt_magic_api_key'); // Fetch the API key from options

    $response = wp_remote_post(ALT_MAGIC_API_BASE_URL.'/empty-credits-notification', array(
        'method'    => 'POST',
        'headers'   => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $api_key // Include the API key in the headers
        ),
        'body' => wp_json_encode(array('user_id' => $user_id)) // Use wp_json_encode instead of json_encode
    ));

    $data = json_decode(wp_remote_retrieve_body($response), true);
    return $data;
}

?>