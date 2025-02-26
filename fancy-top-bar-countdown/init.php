<?php
/**
 * Plugin Name: Fancy Top Bar Countdown
 * Plugin URI: http://demo.99plugins.ninja/topbarcountdown/
 * Description: Top Bar Countdown, widget, shortcode and coming soon page
 * Version: 1.0
 * Author: 99plugins
 * Author URI: http://99plugins.com
 * Requires at least: 4.1
 * Tested up to: 4.3
 *
 * Text Domain: nn-count-down
 * Domain Path: languages
 *
 * @package  nn-count-down
 * @category Core
 * @author 99plugins
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'NN_COUNT_DOWN_VERSION', '1.0' );
define( 'NN_COUNT_DOWN_SLUG', 'nn_count_down' );
define( 'NN_COUNT_DOWN_DIR', plugin_dir_path( __FILE__ ) );
define( 'NN_COUNT_DOWN_URI', plugin_dir_url( __FILE__ ) );
define( 'NN_COUNT_DOWN_ASSETS_URI', plugin_dir_url( __FILE__ ) . 'assets/' );



// Loading main file
require_once NN_COUNT_DOWN_DIR . 'includes/class-nn-count-down.php'; 

if ( ! function_exists( 'nn_count_down_init' ) ) {

	/**
	 * setup the plugin
	 *
	 * @return void
	 * @author 99plugins
	 **/
	function nn_count_down_init() {
		global $nn_count_down;
 
		$nn_count_down = NN_Count_Down::get_instance();

		load_plugin_textdomain( NN_COUNT_DOWN_SLUG, false, dirname( plugin_basename( __FILE__ ) ) . '/language' );
	}
}
	add_action( 'plugins_loaded', 'nn_count_down_init' );