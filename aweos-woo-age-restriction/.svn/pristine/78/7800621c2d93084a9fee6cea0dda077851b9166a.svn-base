<?php 

/**
 * Plugin Name: AWEOS Woo Age Restriction
 * Description: Restrict your shop categories for under-age users with a popup
 * Version: 1.1
 * Author: AWEOS
 * Author URI: https://aweos.de
 * License: GPLv3
 */

if ( !defined( 'ABSPATH' ) ) exit;

require_once 'vendor/autoload.php';
require_once 'database.php';
require_once 'helper.php';
require_once 'admin-menu.php';
require_once 'twig-loader.php';
require_once 'enqueue.php';
require_once 'ajax-handler.php';

function awar_register_activation_hook() {
	// activaton hook, requirements and default values for the database

	if ( version_compare(get_bloginfo( 'version' ), '4.5', '<') ) {
		wp_die( 'Please update WordPress to use this plugin' );
	}

	// default data
	awar_settings('add');
}

register_activation_hook( __FILE__, 'awar_register_activation_hook');
