<?php

/******************************************************************
/* UnInstall the ImageRotator Tables
******************************************************************/
function appten_imagerotator_db_uninstall() {
	global $wpdb;
	global $appten_imagerotator_version;

	$table_name = $wpdb->prefix . "appten_imagerotator";
	$wpdb->query("DROP TABLE IF EXISTS $table_name");

	delete_option( "appten_imagerotator_version", $appten_imagerotator_version );
}
    
?>