<?php

// Ensure this file is not accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include the files
require_once(plugin_dir_path(__FILE__) . '../integrations-functions/altm-fetch-yoast-keywords.php');
require_once(plugin_dir_path(__FILE__) . '../admin-functions/altm-supported-languages.php');

//Generates alt text for a given attachment ID.
function altm_generate_alt_text($attachment_id) {
    altm_log('############################################');
    altm_log('Starting altm_generate_alt_text for attachment ID: ' . $attachment_id);
    
    global $altm_supported_languages;
    $attachment = get_post($attachment_id);
    $user_id = get_option('alt_magic_user_id');
    $api_key = get_option('alt_magic_api_key');
    $use_seo_keywords = get_option('alt_magic_use_seo_keywords', 0);
    $use_post_title = get_option('alt_magic_use_post_title', 0);
    $use_woocommerce_product_name = get_option('alt_magic_woocommerce_use_product_name', 0);
    // Fetch each option individually
    $language_code = get_option('alt_magic_language');
    $language_name = isset($altm_supported_languages[$language_code]) ? $altm_supported_languages[$language_code] : 'English';


    // All logs
    altm_log('User ID: ' . $user_id);
    altm_log('Language name: ' . $language_name);
    altm_log('use_seo_keywords: ' . $use_seo_keywords);
    altm_log('use_post_title: ' . $use_post_title);
    altm_log('Attachment: ' . print_r($attachment, true));
    

    if (
        !$attachment ||
        $attachment->post_type !== 'attachment' ||
        strpos($attachment->post_mime_type, 'image/') !== 0 ||
        empty($user_id)
    ) {
        altm_log('Invalid attachment or missing user ID.');
        return false;
    }

    $image_url = wp_get_attachment_image_url($attachment_id, 'full');
    if (!$image_url) {
        altm_log('Failed to retrieve attachment URL.');
        return false;
    }

    //$image_url = set_url_scheme($image_url, 'https'); // Force HTTPS
    $file_extension = pathinfo($image_url, PATHINFO_EXTENSION);
    $image_name = substr(strrchr($image_url, '/'), 1);  

    // Image URL and file extension logs
    altm_log('Image URL: ' . $image_url);
    altm_log('File extension: ' . $file_extension);
    altm_log('Image name: ' . $image_name);
    // Yoast keywords
    $yoast_keywords = $use_seo_keywords ? altm_get_yoast_seo_keywords($attachment_id) : '';
    altm_log('Yoast keywords: ' . print_r($yoast_keywords, true));

    //get post title
    $parent_post_title = $use_post_title ? altm_get_latest_parent_title_for_attachment($attachment_id) : '';
    altm_log('Parent post title: ' . $parent_post_title);

    //get site visibility
    $site_visibility = get_option('alt_magic_private_site');
    altm_log('Site visibility: ' . $site_visibility);

    //get woocommerce product name
    $woocommerce_product_name = $use_woocommerce_product_name ? altm_get_woocommerce_product_name($attachment_id) : '';
    altm_log('WooCommerce product name: ' . $woocommerce_product_name);

    // Request body
    $request_body = array(
        'image_type'      => 'url',
        'image_url'       => $image_url,
        'user_id'         => $user_id,
        'title'           => $parent_post_title,
        'context'         => '',
        'file_extension'  => $file_extension,
        'language'        => $language_name,
        'keywords'        => $yoast_keywords,
        'image_name'      => $image_name,
        'image_id'        => $attachment_id,
        'product_name' => $woocommerce_product_name
    );


    if ($site_visibility == 1 ) {

        altm_log('Site is private');
        $image_content = base64_encode( file_get_contents( get_attached_file( $attachment_id ) ) );
        $base64_image = 'data:image/' . $file_extension . ';base64,' . $image_content;

        $request_body['image'] = $base64_image;
        $request_body['image_type'] = 'file';
        $request_body['image_url'] = '';
    }

    $args = array(
        'body'        => wp_json_encode($request_body),
        'headers'     => array(
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . $api_key // Add the auth header
        ),
        'timeout'     => 60,
        'blocking'    => true,
        'httpversion' => '1.1',
        'sslverify'   => false,
    );

    $response = wp_remote_post(ALT_MAGIC_API_BASE_URL.'/alt-generator-wp', $args); //add auth header with $api_key

    if (is_wp_error($response)) {
        altm_log('Alt Magic API request failed: ' . $response->get_error_message());
        return false;
    }

    $response_code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);
    $response_data = json_decode($response_body, true);

    if ($response_code === 200 && isset($response_data['alt_text'])) {

        altm_log('Alt text response: ' . $response_data['alt_text']);
        $alt_text = sanitize_text_field($response_data['alt_text']);

        if (!empty($alt_text)) {

            $prepend_string = get_option('alt_magic_prepend_string', '');
            $append_string = get_option('alt_magic_append_string', '');


            if (!empty($prepend_string)) {
                $alt_text = $prepend_string . ' ' . $alt_text;
            }

            if (!empty($append_string)) {
                $alt_text = $alt_text . ' ' . $append_string;
            }

            altm_process_alt_settings($attachment_id, $alt_text);
            return [true, $alt_text];
        } else {
            altm_log("Alt Magic API returned empty alt text.");
            return [false, 'empty_alt_text'];
        }
    }else if ($response_code == 403 && $response_data['message'] && $response_data['message'] == 'No credits remaining.') {
        altm_log("Alt Magic API returned 403 Forbidden. No credits remaining.");
        return [false, 'no_credits'];
    } else {
        altm_log("Alt Magic API unexpected response: Code $response_code, Body: $response_body");
        return [false, 'unexpected_response'];
    }
}

function altm_process_alt_settings($attachment_id, $alt_text) {
    // Fetch each option individually
    $use_for_title = get_option('alt_magic_use_for_title', 0);
    $use_for_caption = get_option('alt_magic_use_for_caption', 0);
    $use_for_description = get_option('alt_magic_use_for_description', 0);
    

    altm_log('use_for_title: ' . $use_for_title);
    altm_log('use_for_caption: ' . $use_for_caption);
    altm_log('use_for_description: ' . $use_for_description);

    $attachment_value_updates = array();

    if ($use_for_title == 1) {
        altm_log('Updating post title with: ' . $alt_text);
        $attachment_value_updates['post_title'] = $alt_text;
    }
    if ($use_for_caption == 1) {
        altm_log('Updating post caption with: ' . $alt_text);
        $attachment_value_updates['post_excerpt'] = $alt_text;
    }
    if ($use_for_description == 1) {
        altm_log('Updating post description with: ' . $alt_text);
        $attachment_value_updates['post_content'] = $alt_text;
    }

    if (!empty($attachment_value_updates)) {
        $attachment_value_updates['ID'] = $attachment_id;
        wp_update_post($attachment_value_updates);
    }

    update_post_meta($attachment_id, '_wp_attachment_image_alt', $alt_text);
    altm_update_alt_text_in_all_posts($attachment_id, $alt_text);
}

//get the latest parent title for a given attachment
function altm_get_latest_parent_title_for_attachment($attachment_id) {
    $attachment = get_post($attachment_id);
    if ($attachment) {
        $parents = get_post_ancestors($attachment_id);
        if (!empty($parents)) {
            $latest_parent_id = $parents[0]; // The first item is the most recent parent
            $latest_parent = get_post($latest_parent_id);
            if ($latest_parent) {
                return $latest_parent->post_title;
            }
        }
        return '';
    }
    return ''; // Return empty string if attachment doesn't exist
}

function altm_get_woocommerce_product_name($attachment_id) {
    $product_image = get_post($attachment_id); // Retrieve the post object
    if ($product_image) {
        $parents = get_post_ancestors($attachment_id);
        if (!empty($parents)) {
            $latest_parent_id = $parents[0]; // The first item is the most recent parent
            $latest_parent = get_post($latest_parent_id);
            if ($latest_parent) {
                return $latest_parent->post_title;
            }
        }
        return '';
    } 
    return '';
}

?>