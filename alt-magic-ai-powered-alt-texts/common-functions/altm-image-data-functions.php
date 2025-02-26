<?php

// Ensure this file is not accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function altm_get_image_stats() {
    global $wpdb;

    // Query to get total number of images
    $total_images_query = $wpdb->prepare("
        SELECT COUNT(*) 
        FROM {$wpdb->posts} 
        WHERE post_type = %s 
        AND post_mime_type LIKE %s
    ", 'attachment', 'image/%');
    $total_images = $wpdb->get_var($total_images_query);

    // Query to get total number of images with missing alt text
    $images_with_missing_alt_query = $wpdb->prepare("
        SELECT COUNT(*) 
        FROM {$wpdb->posts} p
        LEFT JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id AND pm.meta_key = '_wp_attachment_image_alt'
        WHERE p.post_type = %s 
        AND p.post_mime_type LIKE %s 
        AND (pm.meta_value IS NULL OR pm.meta_value = '')
    ", 'attachment', 'image/%');
    $images_with_missing_alt = $wpdb->get_var($images_with_missing_alt_query);
  
    return array(
        'total_images' => $total_images,
        'images_with_missing_alt' => $images_with_missing_alt
    );
}

add_action('wp_ajax_altm_get_image_stats', 'altm_get_image_stats');


function altm_get_image_without_alt_texts() {

    // Check nonce for security
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'get_image_without_alt_texts_nonce')) {
        wp_send_json_error(array('message' => 'Invalid nonce.'));
        return;
    }

    global $wpdb;

    $images_without_alt_query = $wpdb->prepare("
        SELECT p.ID as attachment_id, p.guid as image_url
        FROM {$wpdb->posts} p
        LEFT JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id AND pm.meta_key = '_wp_attachment_image_alt'
        WHERE p.post_type = %s 
        AND p.post_mime_type LIKE %s 
        AND (pm.meta_value IS NULL OR pm.meta_value = '')
    ", 'attachment', 'image/%');
    $images_without_alt = $wpdb->get_results($images_without_alt_query);
    altm_log('Images without alt texts: ' . print_r($images_without_alt, true));

    //altm_log('Images without alt texts: ', $images_without_alt);
    wp_send_json($images_without_alt);
}

add_action('wp_ajax_altm_get_image_without_alt_texts', 'altm_get_image_without_alt_texts');

function altm_get_all_images_data() {
    // Check nonce for security
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'get_all_images_data_nonce')) {
        wp_send_json_error(array('message' => 'Invalid nonce.'));
        return;
    }

    // Check user capabilities
    if (!current_user_can('upload_files')) {
        wp_send_json_error(array('message' => 'Insufficient permissions.'));
        return;
    }

    $all_images_query = $wpdb->prepare("
        SELECT p.ID as attachment_id, p.guid as image_url
        FROM {$wpdb->posts} p
        WHERE p.post_type = %s 
        AND p.post_mime_type LIKE %s
    ", 'attachment', 'image/%');
    $all_images = $wpdb->get_results($all_images_query);

    altm_log('All images: ' . print_r($all_images, true));
    wp_send_json($all_images);
}

add_action('wp_ajax_altm_get_all_images_data', 'altm_get_all_images_data');


function altm_get_user_credits_data() {
    $user_id = get_option('alt_magic_user_id');

    $response = wp_remote_post(ALT_MAGIC_API_BASE_URL.'/dashboard-data', array(
        'method'    => 'POST',
        'headers'   => array(
            'Content-Type' => 'application/json'
        ),
        'body'      => json_encode(array('user_id' => $user_id))
    ));

    $data = json_decode(wp_remote_retrieve_body($response), true);
    altm_log('User credits data: ' . print_r($data, true));
    return $data;
}

function altm_fetch_user_credits() {
    $data = altm_get_user_credits_data();
    wp_send_json($data);
}

add_action('wp_ajax_altm_fetch_user_credits', 'altm_fetch_user_credits');

?>
