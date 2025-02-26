<?php

/******************************************************************
/* UnInstall All Video Gallery Tables
******************************************************************/
function allvideogallery_db_uninstall() {
	global $wpdb;

	$table_name = $wpdb->prefix . "allvideogallery_profiles";
	$wpdb->query("DROP TABLE IF EXISTS $table_name");
	
	$table_name = $wpdb->prefix . "allvideogallery_categories";
	$wpdb->query("DROP TABLE IF EXISTS $table_name");
	
	$table_name = $wpdb->prefix . "allvideogallery_videos";
	$wpdb->query("DROP TABLE IF EXISTS $table_name");
	
	if(get_site_option('allvideogallery_license')) {
		$table_name = $wpdb->prefix . "allvideogallery_license";
		$wpdb->query("DROP TABLE IF EXISTS $table_name");
		
		delete_option( "allvideogallery_license", "1" );
	}
	
	delete_option( "allvideogallery_version", "1.2" );
}
    
?>