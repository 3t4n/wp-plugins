<?php
/**
 * Plugin Name: Geomap – Google Map Block
 * Description: Add a map to the block editor, no API key required
 * Author: 		Noruzzaman
 * Plugin URI: 	https://wordpress.org/plugins/geomap-block
 * Author URI: 	https://github.com/noruzzamans/
 * Version: 	1.0.2
 * Text Domain: geomap-block
 * Domain Path: /languages
 * License: 	GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package GeomapBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'GeomapBlock' ) ) {

	/**
	 * GeomapBlock Final Class
	 *
	 * @since 1.0.0
	 * @package GeomapBlock
	 */
	final class GeomapBlock {

		/**
		 * GeomapBlock Instance
		 *
		 * @since 1.0.0
		 */
		private static $instance;

		/**
		 * GeomapBlock Constructor
		 *
		 * @since 1.0.0
		 * @return void
		 */
		private function __construct() {
			$this->define_constants();
			$this->init();
			$this->includes();
		}

		/**
		 * GeomapBlock Define Constants
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function define_constants() {
			if ( ! defined( 'GEOMAP_BLOCK_VERSION' ) ) {
				define( 'GEOMAP_BLOCK_VERSION', '1.0.2' );
			}

			if ( ! defined( 'GEOMAP_BLOCK__FILE__' ) ) {
				define( 'GEOMAP_BLOCK__FILE__', __FILE__ );
			}

			if ( ! defined( 'GEOMAP_BLOCK_URL_FILE' ) ) {
				define( 'GEOMAP_BLOCK_URL_FILE', plugin_dir_url( GEOMAP_BLOCK__FILE__ ) );
			}

			if ( ! defined( 'GEOMAP_BLOCK_PLUGIN_DIR' ) ) {
				define( 'GEOMAP_BLOCK_PLUGIN_DIR', plugin_dir_path( GEOMAP_BLOCK__FILE__ ) );
			}

			if ( ! defined( 'GEOMAP_BLOCK_URL' ) ) {
				define( 'GEOMAP_BLOCK_URL', plugins_url( '/', GEOMAP_BLOCK_PLUGIN_DIR ) );
			}
		}

		/**
		 * GeomapBlock Init
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function init() {
			add_action( 'init', array( $this, 'load_textdomain' ) );
		}

		/**
		 * GeomapBlock Load Text Domain
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'geomap-block', false, basename( GEOMAP_BLOCK_PLUGIN_DIR ) . '/languages' );
		}

		/**
		 * GeomapBlock Instance
		 *
		 * @since 1.0.0
		 * @return GeomapBlock
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * GeomapBlock Includes Files
		 *
		 * @since 1.0.0
		 * @return void
		 */
		private function includes() {
			require_once trailingslashit( GEOMAP_BLOCK_PLUGIN_DIR ) . 'inc/geomap-block-loader.php';
		}
	}

}

/**
 * GeomapBlock
 *
 * @since 1.0.0
 * @return GeomapBlock
 */
function geomap_block() {
	return GeomapBlock::get_instance();
}
geomap_block();
