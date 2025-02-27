<?php
/**
 * Geomap Block Loader
 *
 * @since 1.0.0
 * @package GeomapBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'GeomapBlockLoader' ) ) {  

	/**
	 * Geomap Block Loader Class
	 *
	 * @since 1.0.0
	 * @package GeomapBlock
	 */
	class GeomapBlockLoader {

		/**
		 * GeomapBlockLoader Instance
		 *
		 * @since 1.0.0
		 * @var GeomapBlockLoader
		 */
		private static $instance = null;

		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function __construct() {
			$this->includes();
		}

		/**
		 * Include Files
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function includes() {
			require_once GEOMAP_BLOCK_PLUGIN_DIR . 'inc/classes/register-blocks.php';
		}

		/**
		 * GeomapBlockLoader Instance
		 *
		 * @since 1.0.0
		 * @return GeomapBlockLoader
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

}

// Initialize the loader class
GeomapBlockLoader::get_instance();
