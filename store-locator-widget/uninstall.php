<?php // exit if uninstall constant is not defined
	if (!defined('WP_UNINSTALL_PLUGIN')) exit;

	// delete database table
	global $wpdb;
	$table_name = $wpdb->prefix .'myplugin_table';
	$table_name = storelocatorwidget_get_table_name();
	// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery,  WordPress.DB.DirectDatabaseQuery.NoCaching ,  WordPress.DB.DirectDatabaseQuery.SchemaChange 
	$wpdb->query( $wpdb->prepare("DROP TABLE IF EXISTS %i", $table_name));
?>