<?php

global $wpdb;

$charset_collate = $wpdb->get_charset_collate();
$awetube_db_version = '1.0.0';
$table_name = $wpdb->prefix . 'awetube_playlist';

$sql = "CREATE TABLE $table_name (
	id mediumint(11) NOT NULL AUTO_INCREMENT,
	user_id varchar(200) NULL,
	post_id varchar(200) NULL,
	added varchar(200) NULL,
	UNIQUE KEY id (id)
) $charset_collate;";

require_once ABSPATH . 'wp-admin/includes/upgrade.php';
dbDelta( $sql );
add_option( 'awetube_db_version', $awetube_db_version );
