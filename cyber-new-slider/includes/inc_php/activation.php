<?php


/**
 *
 * CyberSlider Activation Hooks
 *
 */

register_activation_hook(CS_ROOT_FILE, 'cyberslider_activation_hook');
register_deactivation_hook(CS_ROOT_FILE, 'cyberslider_deactivation_hook');
register_uninstall_hook(CS_ROOT_FILE, 'cyberslider_uninstall_hook');

/**
 *
 * Create Tabels on activation
 *
 */

function cyberslider_activation_hook() {

	// Let the $wpdb global
	global $wpdb;
	$charset_collate = '';
	$table_name = $wpdb->prefix . "cyberslider";
	$table_name_slides = $wpdb->prefix . "cyberslider_slides";

	// Get DB collate
	if(!empty($wpdb->charset)) {
		$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
	}

	// if not empty
	if(!empty($wpdb->collate)) {
		$charset_collate .= " COLLATE $wpdb->collate";
	}

	// Building the query. Creating table for sliders
	$sql = "CREATE TABLE $table_name (
			  id int(10) NOT NULL AUTO_INCREMENT,
			  name varchar(100) NOT NULL,
			  author int(10) NOT NULL DEFAULT 0,
			  settings mediumtext NOT NULL,
			  date_created datetime NOT NULL,
			  PRIMARY KEY  (id)
			) $charset_collate;";

	// Building the query. Creating table for slides
	$sql_slides = "CREATE TABLE $table_name_slides (
			  id int(10) NOT NULL AUTO_INCREMENT,
			  slider_id int(10) NOT NULL DEFAULT 0,
			  title varchar(100) NOT NULL,
			  settings mediumtext NOT NULL,
			  PRIMARY KEY  (id)
			) $charset_collate;";

	// Executing the query
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

	// Execute the query one by one
	dbDelta($sql);
	dbDelta($sql_slides);

}