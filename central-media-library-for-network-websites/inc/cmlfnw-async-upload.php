<?php
/**
 * Server upload handler for Plupload, forked from WordPress Core.
 *
 * This file is directly copied from core, with only one loading modification.
 * Excluding from phpcs as updating will cause more unstability and reduce maintainability
 * and we do not own this code.
 * 
 */

namespace CentralMedia\SharedMedia;

if ( isset( $_REQUEST['action'] ) && 'upload-attachment' === $_REQUEST['action'] ) {
	define( 'DOING_AJAX', true );
}

if ( ! defined( 'WP_ADMIN' ) ) {
	define( 'WP_ADMIN', true );
}

if ( defined( 'ABSPATH' ) ) {
	require_once( ABSPATH . 'wp-load.php' );
} else {
	// Guess at the default location of the wp-load.php file.
	if ( file_exists( dirname( __FILE__, 5 ) . '/wp-load.php' ) ) {
		require_once( dirname( __FILE__, 5 ) . '/wp-load.php' );
	// If not the default location, try WP as a submodule at 'wp'.
	} elseif ( file_exists( dirname( __FILE__, 5 ) . '/wp/wp-load.php' ) ) {
		require_once( dirname( __FILE__, 5 ) . '/wp/wp-load.php' );
	// If not the default location, try WP as a submodule at 'wordpress'.
	} elseif ( file_exists( dirname( __FILE__, 5 ) . '/wordpress/wp-load.php' ) ) {
		require_once( dirname( __FILE__, 5 ) . '/wordpress/wp-load.php' );
	}
}

require_once( ABSPATH . 'wp-admin/admin.php' );

header( 'Content-Type: text/html; charset=' . get_option( 'blog_charset' ) );

if ( isset( $_REQUEST['action'] ) && 'upload-attachment' === $_REQUEST['action'] ) {
	include( ABSPATH . 'wp-admin/includes/ajax-actions.php' );

	send_nosniff_header();
	nocache_headers();

	// Switch to the main blog before handling the upload.
	cmlfnw_switch_to_main_blog();

	// We can't support "attached" images to posts.
	unset( $_REQUEST['post_id'] );

	wp_ajax_upload_attachment();

	// Restore the blog before handling the upload.
	cmlfnw_restore_current_blog();

	die( '0' );
}

if ( ! current_user_can( 'upload_files' ) ) {
	wp_die( esc_html__( 'Sorry, you are not allowed to upload files.', 'cmlfnw' ) );
}

check_admin_referer('media-form');

$post_id = 0;
if ( isset( $_REQUEST['post_id'] ) ) {
	$post_id = absint( $_REQUEST['post_id'] );
	if ( ! get_post( $post_id ) || ! current_user_can( 'edit_post', $post_id ) )
		$post_id = 0;
}

if ( $_REQUEST['short'] ) {
	// Short form response - attachment ID only.
	echo esc_html($id);
} else {
	// Long form response - big chunk o html.

	$type = isset( $_REQUEST['type'] ) ? sanitize_text_field( $_REQUEST['type'] ) : '';

	/**
	 * Filters the returned ID of an uploaded attachment.
	 *
	 * The dynamic portion of the hook name, `$type`, refers to the attachment type,
	 * such as 'image', 'audio', 'video', 'file', etc.
	 *
	 * @since 2.5.0
	 *
	 * @param int $id Uploaded attachment ID.
	 */
}