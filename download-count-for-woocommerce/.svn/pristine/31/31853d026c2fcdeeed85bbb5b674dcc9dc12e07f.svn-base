<?php
/**
 * Uninstall
 *
 * @package Download Count for WooCommerce
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

global $wpdb;
$option_names = array();
$wp_options   = $wpdb->get_results(
	"
	SELECT option_name
	FROM {$wpdb->prefix}options
	WHERE option_name LIKE '%%downloadcountwoo%%'
	"
);
foreach ( $wp_options as $wp_option ) {
	$option_names[] = $wp_option->option_name;
}

/* For Single site */
if ( ! is_multisite() ) {
	foreach ( $option_names as $option_name ) {
		delete_option( $option_name );
	}
	$blogusers = get_users( array( 'fields' => array( 'ID' ) ) );
	foreach ( $blogusers as $user ) {
		delete_user_option( $user->ID, 'downloadcountwoo', false );
		delete_user_option( $user->ID, 'downloadcountwoo_search_text', false );
	}
} else {
	/* For Multisite */
	$blog_ids = $wpdb->get_col( "SELECT blog_id FROM {$wpdb->prefix}blogs" );
	$original_blog_id = get_current_blog_id();
	foreach ( $blog_ids as $blogid ) {
		switch_to_blog( $blogid );
		foreach ( $option_names as $option_name ) {
			delete_option( $option_name );
		}
		$blogusers = get_users(
			array(
				'blog_id' => $blogid,
				'fields' => array( 'ID' ),
			)
		);
		foreach ( $blogusers as $user ) {
			delete_user_option( $user->ID, 'downloadcountwoo', false );
			delete_user_option( $user->ID, 'downloadcountwoo_search_text', false );
		}
	}
	switch_to_blog( $original_blog_id );

	/* For site options. */
	foreach ( $option_names as $option_name ) {
		delete_site_option( $option_name );
	}
}
