<?php
/**
 * Plugin Name: Central Media Library for network websites
 * Description: Central Media Library for network websites
 * Author: kirtikumar solanki
 * Version: 1.0.0
 * Author URI: #
 * License: GPLv2 or later
 * Text Domain: cmlfnw
 * Network: true
 * Author: Kirtikumar Solanki
 * Domain Path: /languages
 */

namespace CentralMedia\SharedMedia;

require_once __DIR__ . '/inc/cmlfnw-namespace.php';
require_once __DIR__ . '/inc/cmlfnw-ajax-actions.php';
require_once __DIR__ . '/inc/cmlfnw-class-rest-posts-controller.php';

// Replace the default wp_ajax_query_attachments handler with our own.


// Replace the default wp_ajax_save_attachment handler with our own.
remove_action( 'wp_ajax_save-attachment', 'wp_ajax_save_attachment', 1 );
add_action( 'wp_ajax_save-attachment', __NAMESPACE__ . '\\cmlfnw_ajax_save_attachment', 1 );

// Add custom Ajax handler for deleting attachments.
add_action( 'wp_ajax_delete-attachment', __NAMESPACE__ . '\\cmlfnw_ajax_delete_attachment', 1 );

// Switch to blog during REST API requests.
add_filter( 'rest_request_before_callbacks', __NAMESPACE__ . '\\cmlfnw_switch_blog_in_rest', 10, 3 );
add_filter( 'rest_request_after_callbacks', __NAMESPACE__ . '\\cmlfnw_restore_blog_in_rest', 99, 3 );
add_filter( 'rest_dispatch_request', __NAMESPACE__ . '\\cmlfnw_rest_dispatch_requests', 10, 2 );

// Modify the upload processes.
add_filter( 'upload_dir', __NAMESPACE__ . '\\cmlfnw_filter_upload_dir', 5 ); // Ensure this fires before other filters.
add_filter( 'image_downsize', __NAMESPACE__ . '\\cmlfnw_filter_image_downsize', 10, 3 );
add_filter( 'plupload_default_settings', __NAMESPACE__ . '\\cmlfnw_filter_plupload_default_settings' );

// Modify data handling for attachments.
add_filter( 'wp_insert_attachment_data', __NAMESPACE__ . '\\cmlfnw_switch_to_main_blog_in_filter' );
add_action( 'attachment_updated', __NAMESPACE__ . '\\cmlfnw_switch_to_main_blog' );
add_action( 'add_attachment', __NAMESPACE__ . '\\cmlfnw_restore_current_blog_in_action', 11 );
add_action( 'edit_attachment', __NAMESPACE__ . '\\cmlfnw_restore_current_blog_in_action', 11 );

// Set auth cookies for the plugins directory.
add_action( 'set_auth_cookie', __NAMESPACE__ . '\\cmlfnw_set_client_mu_cookie_path', 10, 5 );
