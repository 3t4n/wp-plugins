<?php
/**
 * It fires on plugin deletion.

 * @package Content No Cache
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die();
	exit;
}

global $wpdb;
if( $wpdb ) {
    $wpdb->query( "DELETE FROM wp_posts WHERE post_type='eos_dyn_content'" ); // Deleete all CNC custom post types.
}