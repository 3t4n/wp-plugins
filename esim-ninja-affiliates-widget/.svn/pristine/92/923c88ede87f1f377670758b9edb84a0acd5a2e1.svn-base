<?php
/*
Plugin Name: eSIM.Ninja Affiliates Widget
Plugin URI: https://wordpress.org/plugins/esim-ninja-affiliates-widget/
Description: eSIM.Ninja places an eSIM travel mobile data plans price comparison widget on your pages and posts to monetize your GEO related travel content.
Author: ARGH! Team
Version: 1.0.6
Requires at least: 4.0.1
Requires PHP: 5.6.2
Author URI: https://argh.team/
Text Domain: esim-ninja-affiliates-widget
Domain Path: /languages
*/

namespace eSimNinja;

defined( 'ABSPATH' ) || exit;

// Define Plugin constants.
if ( ! defined( 'ESIM_NINJA_PLUGIN_FILE' ) ) {
	define( 'ESIM_NINJA_PLUGIN_FILE', __FILE__ );
}
if ( ! defined( 'ESIM_NINJA_PLUGIN_PATH' ) ) {
	define( 'ESIM_NINJA_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'ESIM_NINJA_PLUGIN_URL' ) ) {
	define( 'ESIM_NINJA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

add_action( 'plugins_loaded', function () {
	load_plugin_textdomain( 'esim-ninja-affiliates-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
} );

require_once ESIM_NINJA_PLUGIN_PATH . 'includes/class-esim-ninja-shortcode.php';
if ( is_admin() ) {
	require_once ESIM_NINJA_PLUGIN_PATH . 'includes/class-esim-ninja-settings.php';
	new ESimNinjaSettings();
}