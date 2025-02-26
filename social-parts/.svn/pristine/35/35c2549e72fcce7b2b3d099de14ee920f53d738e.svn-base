<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
} else {
	require_once plugin_dir_path( __FILE__ ) . 'social-parts.php';
	global $wpdb;
	$table_name = $wpdb->prefix . SOCIAL_PARTS_TABLE_NAME;
	$sql        = "DROP TABLE IF EXISTS $table_name";
	$wpdb->query( $sql );
	delete_option( 'social_parts_version' );
}