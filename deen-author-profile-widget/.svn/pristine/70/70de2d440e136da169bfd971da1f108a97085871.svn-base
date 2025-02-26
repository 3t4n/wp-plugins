<?php
/*
 * Plugin Name: DeenWap - Author Profile Widget For Elementor
 * Description: DeenWap - Author Profile Widget For Elementor creates responsive author profile, To showcase author name, description, video, rating, social profiles and more.
 * Version: 1.0.3
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * Elementor tested up to: 3.8.0
 * Author: Debuggers Studio
 * Author URI: https://debuggersstudio.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: deen-author-profile-widget
 * Domain Path: /languages
 */
 if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'WPDEEN__FILE__', __FILE__ );
define( 'WPDEEN__DIR__', __DIR__ );
define( 'WPDEEN_URL', plugins_url( '/', WPDEEN__FILE__ ) );
define( 'WPDEEN_ASSETS_URL', WPDEEN_URL . 'assets/' );
define( 'WPDEEN_VERSION', '1.0.3' );

function wpdeen_load_plugin_data() {
	require_once( WPDEEN__DIR__ . '/includes/wpdeen-widget.php' );
	\Author_Profile_Widget_Wp\Profile_Widget_WP::instance();

}
add_action( 'plugins_loaded', 'wpdeen_load_plugin_data' );