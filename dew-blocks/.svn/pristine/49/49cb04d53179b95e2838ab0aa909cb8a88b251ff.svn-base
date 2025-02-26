<?php
/**
 * Plugin Name:       Dew Blocks
 * Description:       A collection of custom Gutenberg blocks to extend the Gutenberg editor functionalities.
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Version:           0.0.1
 * Author:            Gutenbergkits
 * Author URI:        https://gutenbergkits.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       dew-blocks
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists( 'Dewb_Blocks_Class' ) ) {

	final class Dewb_Blocks_Class {

		protected static $instance = null;

		/**
		 * Constructor
		 * @return void
		 */
		public function __construct() {
			$this->define_constants();
			$this->includes();
		}

		/**
		 * Definte the plugin constants
		 * @return void
		 */
		public function define_constants() {
			define( 'DEWB_VERSION', '0.0.1' );
			define( 'DEWB_DIR', __DIR__ );
			define( 'DEWB_URL', plugin_dir_url( __FILE__ ) );
			define( 'DEWB_PATH', plugin_dir_path( __FILE__ ) );
		}

		/**
		 * Include all the required files
		 * @return void
		 */
		public function includes() {
			require_once trailingslashit( DEWB_DIR ) . '/inc/init.php';
		}

		/**
		 * Initialize the plugin
		 * @return \Dewblocks_Class
		 */
		public static function init() {
			if( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
	}
}

/**
 * Initialize the plugin
 * @return \Dewb_Blocks_Class
 */
function dewb_blocks_init() {
	return Dewb_Blocks_Class::init();
}

// kick-off the plugin
dewb_blocks_init();
