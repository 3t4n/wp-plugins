<?php
/**
 * Plugin Name:       Box Slogan Block
 * Description:       Box Slogan Gutenberg block has been designed to showcase your services, important links to any post, page, or even Custom Post Type in WordPress with ease.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Manzur Ahmed
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wtrb-boxslogan-block
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( !class_exists( 'WTRB_BOXSLOGAN_BLOCK' ) ) {
	final class WTRB_BOXSLOGAN_BLOCK {

		protected static $instance = null;

		/**
		 * Constructor
		 * @return void
		 */
		public function __construct() {
			$this->wtrb_boxslogan_define_constants();
			$this->wtrb_boxslogan_includes();
		}

		/**
		 * Definte the plugin constants
		 * @return void
		 */
		public function wtrb_boxslogan_define_constants() {
			define( 'WTRB_BOXSLOGAN_VERSION', '0.1.0' );
			define( 'WTRB_BOXSLOGAN_DIR', __DIR__ );
			define( 'WTRB_BOXSLOGAN_URL', plugin_dir_url( __FILE__ ) );
			define( 'WTRB_BOXSLOGAN_PATH', plugin_dir_path( __FILE__ ) );
		}

		/**
		 * Include all the required files
		 * @return void
		 */
		public function wtrb_boxslogan_includes() {
			require_once __DIR__ . '/inc/loader.php';
		}

		/**
		 * Initialize the plugin
		 * @return \WTR_USEFUL_GUTENBERG_BLOCKS
		 */
		public static function wtrb_init() {
			if( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

	// final class ends
	}
}

/**
 * Initialize the plugin
 * @return \WTRB_BOXSLOGAN_BLOCK
 */
function wtrb_boxslogan_block_init() {
	return WTRB_BOXSLOGAN_BLOCK::wtrb_init();
}

// kick-off the plugin
wtrb_boxslogan_block_init();
