<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

require_once plugin_dir_path(__FILE__) . 'functions.php';
require_once plugin_dir_path(__FILE__) . 'database.php';

if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
}

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

if ( ! function_exists( 'wp_filesystem' ) ) {
    require_once ABSPATH . 'wp-admin/includes/file.php';
}

WP_Filesystem();
global $wp_filesystem;

// Register REST API endpoints
add_action('rest_api_init', function () {
    register_rest_route('emplibot/v1', '/status', array(
        'methods' => 'POST',
        'callback' => 'emplibot_api_status',
    ));
    register_rest_route('emplibot/v1', '/update', array(
        'methods' => 'POST',
        'callback' => 'emplibot_update_plugin_info',
    ));
    register_rest_route('emplibot/v1', '/blogpost', array(
        'methods' => 'POST',
        'callback' => 'emplibot_upload_blog_post',
    ));
    register_rest_route('emplibot/v1', '/image', array(
        'methods' => 'POST',
        'callback' => 'emplibot_upload_blog_image',
    ));
    register_rest_route('emplibot/v1', '/update-public-key', array(
        'methods' => 'POST',
        'callback' => 'emplibot_update_public_key',
    ));
});

function emplibot_api_status(WP_REST_Request $request) {
    $json_data = json_decode($request->get_body());

    // Verify RSA signature
    if (!emplibot_verify_rsa_signature($json_data)) 
        return emplibot_raise_public_key_error_response();

    // Check if hash already exists
    $request_hash = hash('sha256', $json_data->content);
    if (emplibot_hash_exists($request_hash))
        return emplibot_raise_hash_already_exists_error_response();
    
    emplibot_insert_hash($request_hash);

    return new WP_REST_Response(array('status' => 'OK.', 'environment' => EMPLIBOT_ENVIRONMENT), 200, array('Content-Type' => 'application/json'));
}

function emplibot_update_plugin_info(WP_REST_Request $request) {
    $json_data = json_decode($request->get_body());

    // Verify RSA signature
    if (!emplibot_verify_rsa_signature($json_data)) 
        return emplibot_raise_public_key_error_response();

    // Check if hash already exists
    $request_hash = hash('sha256', $json_data->content);
    if (emplibot_hash_exists($request_hash))
        return emplibot_raise_hash_already_exists_error_response();
    
    emplibot_insert_hash($request_hash);

    $installed_plugin_version = get_plugin_data(__FILE__)['Version'];
    $result = version_compare($installed_plugin_version, json_decode($json_data->content)->version);

    if ($result === -1) {
        update_option('emplibot_plugin_outdated', true);
    }

    return new WP_REST_Response(array('status' => 'OK.'), 200, array('Content-Type' => 'application/json'));
}

function emplibot_upload_blog_post(WP_REST_Request $request) {
    $post_body = $request->get_body();
    $json_data = json_decode($post_body);

    // Verify RSA signature
    if (!emplibot_verify_rsa_signature($json_data)) 
        return emplibot_raise_public_key_error_response();

    // Check if hash already exists
    $request_hash = hash('sha256', $json_data->content);
    if (emplibot_hash_exists($request_hash))
        return emplibot_raise_hash_already_exists_error_response();

    $post_type = sanitize_key(get_option('emplibot_options')['post_type']);
    $post_content = json_decode($json_data->content);
    $post_title = $post_content->post_title;
    $post_keyword = $post_content->post_keyword;
    $post_body = $post_content->post_content;
    $post_meta = $post_content->post_meta;
    $wordpress_category_id = $post_content->post_category_id;
    $wordpress_category_taxonomy = $post_content->post_category_taxonomy;
    $publication_status = $post_content->post_pub_status;
    $post_thumbnail_id = $post_content->thumbnail_id;
    $post_email = $post_content->author_email;
    $language_code = $post_content->language;

    $user = get_user_by('email', $post_email);
    if (!$user) {
        $user_id = 1; // Default to admin if user not found
    } else {
        $user_id = $user->ID;
    }

    $new_post = array(
        'post_title'   => $post_title,
        'post_content' => $post_body,
        'post_excerpt' => $post_meta,
        'post_status'  => $publication_status,
        'post_author'  => $user_id,
        'post_type'    => $post_type
    );

    // Insert the post
    $post_id = wp_insert_post($new_post);

    // Add post meta data
    if ($post_id) {
        emplibot_insert_hash($request_hash);

        // WPML plugin handling
        // Handle WPML language setting if WPML is active
        if (is_plugin_active('sitepress-multilingual-cms/sitepress.php') && $language_code) {
            $wpml_element_type = apply_filters('wpml_element_type', $post_type);
            $get_language_args = array('element_id' => $post_id, 'element_type' => $post_type);
            $original_post_language_info = apply_filters('wpml_element_language_details', null, $get_language_args);

            $set_language_args = array(
                'element_id' => $post_id,
                'element_type' => $wpml_element_type,
                'trid' => $original_post_language_info->trid,
                'language_code' => $language_code,
                'source_language_code' => $language_code
            );

            do_action('wpml_set_element_language_details', $set_language_args);
        }

        if ($post_meta) {
            // Set for Yoast SEO
            if (class_exists('WPSEO_Frontend')) {
                update_post_meta($post_id, '_yoast_wpseo_metadesc', $post_meta);
            }
    
            // Set for RankMath
            if (class_exists('RankMath')) {
                update_post_meta($post_id, 'rank_math_description', $post_meta);
            }
    
        }
        
        if ($post_keyword) {
            // Set for Yoast SEO
            if (class_exists('WPSEO_Frontend')) {
                update_post_meta($post_id, '_yoast_wpseo_focuskw', $post_keyword);
            }
    
            // Set for RankMath
            if (class_exists('RankMath')) {
                update_post_meta($post_id, 'rank_math_focus_keyword', $post_keyword);
            }
    
        }
    }

    // Set post categories
    if ($post_id && isset($wordpress_category_id) && isset($wordpress_category_taxonomy)) {
        wp_set_object_terms($post_id, $wordpress_category_id, $wordpress_category_taxonomy);
    }

    // Set post thumbnail
    set_post_thumbnail($post_id, $post_thumbnail_id);

    $post_url = get_permalink($post_id);

    if ($post_id && $post_url) {
        return new WP_REST_Response(array('post_id' => $post_id, 'post_url' => $post_url), 200);
    } else {
        return emplibot_raise_blogpost_upload_failed_error_response();
    }
}

function emplibot_upload_blog_image(WP_REST_Request $request) {

    $post_body = $request->get_body();
    $json_data = json_decode($post_body);

    $sig_res = emplibot_verify_rsa_signature($json_data);

    // Verify RSA signature
    if (!emplibot_verify_rsa_signature($json_data)) 
        return emplibot_raise_public_key_error_response();

    // Check if hash already exists
    $request_hash = hash('sha256', $json_data->content);
    if (emplibot_hash_exists($request_hash))
        return emplibot_raise_hash_already_exists_error_response();

    $post_content = json_decode($json_data->content);
    $image_filename = $post_content->image_filename;
    $image_alt_text = $post_content->image_alt_text;
    $user = get_user_by('email', $post_content->author);

    if (!$user) {
        $user = (object) array('ID' => 1); // Default to admin if user not found
    }

    $base64_image = $post_content->image_base64string;

    // Decode the base64 string
    $imageData = base64_decode($base64_image);

    // Get the image info, including MIME type
    $imageInfo = getimagesizefromstring($imageData);
    $fileExtension = image_type_to_extension($imageInfo[2], false);

    // Create a unique filename
    $upload_dir = wp_upload_dir();
    $unique_filename = wp_unique_filename($upload_dir['path'], $image_filename);
    $image_path = $upload_dir['basedir'] . '/emplibot/' . $unique_filename . '.' . $fileExtension;

    // Save the image data to the uploads directory
    WP_Filesystem();
    global $wp_filesystem;

    // Initialize the WP filesystem
    if ( WP_Filesystem() ) {

        // Ensure the directory exists, or create it
        if ( ! $wp_filesystem->is_dir( dirname( $image_path ) ) ) {
            $wp_filesystem->mkdir( dirname( $image_path ) );
        }

        // Write to the file
        $wp_filesystem->put_contents( $image_path, $imageData, FS_CHMOD_FILE );
    }

    // Prepare attachment data
    $attachment = array(
        'post_title'     => sanitize_file_name(pathinfo($unique_filename, PATHINFO_FILENAME)),
        'post_mime_type' => $imageInfo['mime'],
        'post_author'    => $user->ID,
        'post_status'    => 'inherit', // It's good practice to set the post status to 'inherit' for attachments
    );

    // Insert the attachment
    $attachment_id = wp_insert_attachment($attachment, $image_path);

    // Check if the attachment was inserted successfully
    if ( ! is_wp_error( $attachment_id ) ) {
        // Generate metadata for the attachment and update the database
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        $attachment_data = wp_generate_attachment_metadata( $attachment_id, $image_path );
        wp_update_attachment_metadata( $attachment_id, $attachment_data );

        // Determine the alt text
        if ( ! empty( $image_alt_text ) ) {
            $alt_text = sanitize_text_field( $image_alt_text );
        } else {
            $alt_text = sanitize_text_field( pathinfo( $image_filename, PATHINFO_FILENAME ) );
        }

        // Update the attachment's alt text
        update_post_meta( $attachment_id, '_wp_attachment_image_alt', $alt_text );
    } else {
        return emplibot_raise_image_upload_failed_error_response();
    }

    // Insert the hash to prevent duplicate uploads
    emplibot_insert_hash($request_hash);

    // Return the response with attachment details
    return new WP_REST_Response(array(
        'attachment_id'  => $attachment_id,
        'attachment_url' => wp_get_attachment_url($attachment_id),
        'alt_text'       => isset( $alt_text ) ? $alt_text : '',
    ), 200);
}

function emplibot_update_public_key(WP_REST_Request $request) {
    $json_data = json_decode($request->get_body());

    // Check if hash already exists
    if (emplibot_hash_exists(hash('sha256', $json_data->content)))
        return emplibot_raise_hash_already_exists_error_response();

    emplibot_insert_hash(hash('sha256', $json_data->content));
    
    $success = emplibot_get_newest_public_key();
    if(!$success) 
        return emplibot_raise_public_key_update_error_response();

    return new WP_REST_Response(array('status' => 'OK.'), 200, array('Content-Type' => 'application/json'));
}
