<?php

// Ensure this file is not accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Generates alt text for an attachment via AJAX.
 */

function altm_generate_alt_text_ajax_handler() {
    altm_log('altm_generate_alt_text_ajax_handler called');
    
    // Check nonce for security
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'generate_alt_text_nonce')) {
        wp_send_json_error(array('message' => 'Invalid nonce.'));
        return;
    }

    // Check user capabilities
    if (!current_user_can('upload_files')) {
        wp_send_json_error(array('message' => 'Insufficient permissions.'));
        return;
    }

    // Check for the required POST parameter
    if (!isset($_POST['attachment_id'])) {
        wp_send_json_error(array('message' => 'No attachment ID provided.'));
        return;
    }

    $attachment_id = intval($_POST['attachment_id']);

    // Proceed to generate alt text
    $result = altm_generate_alt_text($attachment_id);

    if ($result[0] === false) {
        wp_send_json_error(array('message' => $result[1]));
    } else {
                
        // Prepare response data
        $response_data = array(
            'alt_text' => $result[1],
            'more_options' => array(
                'alt_magic_use_for_title' => get_option('alt_magic_use_for_title'),
                'alt_magic_use_for_caption' => get_option('alt_magic_use_for_caption'),
                'alt_magic_use_for_description' => get_option('alt_magic_use_for_description')
            )
        );
        
        wp_send_json_success($response_data);
    }
}
add_action('wp_ajax_altm_generate_alt_text_ajax', 'altm_generate_alt_text_ajax_handler');
