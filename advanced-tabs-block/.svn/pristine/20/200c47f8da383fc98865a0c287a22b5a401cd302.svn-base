<?php
/**
 * Plugin Name:       Advanced Tabs Gutenberg Block
 * Description:       A custom Gutenberg Block to show content in tabs style.
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Version:           1.2.4
 * Author:            Zakaria Binsaifullah
 * Author URI:        https://makegutenblock.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       advanced-tabs-block
 */

// Stop Direct Access 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Blocks Final Class
 */

 if( ! class_exists( 'ATBS_BLOCKS' ) ) {

	final class ATBS_BLOCKS {

		private static $instance = null;

		/**
		 * Constructor
		 * @return void
		 */
		public function __construct() {
			$this->define_constants();
			$this->includes();
		}
	
		/**
		 * Define the plugin constants
		 * @return void
		 */
		private function define_constants() {
			define( 'ATBS_VERSION', '1.2.4' );
			define( 'ATBS_URL', plugin_dir_url( __FILE__ ) );	
			define('ATBS_DIR_PATH', plugin_dir_path(__FILE__));
			define( 'ATBS_DIR', __DIR__ );
		}

		/**
		 * Include the plugin files
		 * @return void
		 */
		private function includes() {
			require_once ATBS_DIR . '/includes/loader.php';
		}

		/**
		 * Initialize the plugin
		 * @return \ATBS_BLOCKS
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
  * Kickoff
 */
 function atbs_block_init() {
	 return ATBS_BLOCKS::init();
 }
 
 // Let's start it
 atbs_block_init();
 