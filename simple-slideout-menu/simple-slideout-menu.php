<?php
/*
 Plugin Name: Simple Slideout Menu
 Plugin URI: https://wordpress.org/plugins/simple-slideout-menu
 Description: Lets you create a slideout menu on your Wordpress site.
 Version: 1.3.1
 Requires at least: 3.0
 Requires PHP: 7.4
 Author: Simple Plugins
 Author URI: https://aswin.com.np
 License: GPL v2 or later
 License URI: https://www.gnu.org/licenses/gpl-2.0.html
 Text Domain: simple-slideout-menu
 Domain Path: /languages
 */

if( ! defined( 'SIMSM_PLUGIN' )){
	define( 'SIMSM_PLUGIN', __FILE__  );
}

if( ! defined( 'SIMSM_URL' )){
	define( 'SIMSM_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
}


if( ! defined( 'SIMSM_PATH' )){
	define( 'SIMSM_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
}

include SIMSM_PATH.'includes/simsm-walker.php';
include SIMSM_PATH.'includes/init.php';