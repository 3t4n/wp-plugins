<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

delete_option('IR_Title');
delete_option('IR_Height');
delete_option('IR_SameTime');
delete_option('IR_TextLength');
delete_option('IR_type');
delete_option('IR_random');
delete_option('IR_pluginversion');
 
// for site options in Multisite
delete_site_option('IR_Title');
delete_site_option('IR_Height');
delete_site_option('IR_SameTime');
delete_site_option('IR_TextLength');
delete_site_option('IR_type');
delete_site_option('IR_random');
delete_site_option('IR_pluginversion');

global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}information_reel");