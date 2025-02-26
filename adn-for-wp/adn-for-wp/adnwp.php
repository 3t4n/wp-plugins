<?php

//error_reporting(E_ALL);

//@ini_set('display_errors', 1);

/*
Plugin Name: ADN for WordPress
URI: http://wordpress.org/extend/plugins/adn-for-wp/
Description: Simple plugin for WordPress that places an App.net share button underneath posts and pages.
Version: 1.04
Author: Virtuous Giant
Author URI: http://VirtuousGiant.com
License: GPL2
*/

global $adnwp_db_version;
$adnwp_db_version = "1.02";

function adnwp_install() {
	global $wpdb;
	global $adnwp_db_version;

	$table_name = $wpdb->prefix . "adnwp_settings";

	$sql = "CREATE TABLE ".$table_name." (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			adn_share TINYINT(1) NOT NULL,
			posts_only TINYINT(1) NOT NULL,
			UNIQUE KEY id (id)
		);";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);

	add_option("adnwp_db_version", $adnwp_db_version);
}

register_activation_hook(__FILE__, 'adnwp_install');

require_once 'adnwp-admin.php';
require_once 'adnwp-functions.php';

function register_adnwp_styles() {
	wp_register_style('adnwp-base', get_bloginfo('wpurl').'/wp-content/plugins/adn-for-wp/adnwp-style.css');
	wp_enqueue_style('adnwp-base');
}
add_action('wp_enqueue_scripts', 'register_adnwp_styles');
?>