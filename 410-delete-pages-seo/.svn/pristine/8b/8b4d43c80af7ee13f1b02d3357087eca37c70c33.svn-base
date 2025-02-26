<?php 
if( !defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') ) 
	exit;

function remove_410_deletepages_table(){
	global $wpdb;
	$table = $wpdb->prefix . '410_links';
	$wpdb->query( "DROP TABLE $table;" );
}

remove_410_deletepages_table();
delete_option( 'deletepages_410_options_version' );
delete_option( 'deletepages_410_max_404s' );
delete_option( 'deletepages_410_all_in_list' );
