<?php
// If uninstall was not called from WordPress, exit!
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit;

global $wpdb;
$table_name = $wpdb->prefix . 'pat_plugin_status';
$sql = "DROP TABLE IF EXISTS $table_name;";
$wpdb->query($sql);

// Cleaning up
delete_option( 'pat_activated_plugins_gwl' );
delete_option( 'pat_display_relative_date_gwl' );