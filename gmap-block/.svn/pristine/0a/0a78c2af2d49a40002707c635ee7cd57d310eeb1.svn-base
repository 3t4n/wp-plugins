<?php
/**
 * Gmap Blocks Main Loader
 *
 * @since 1.0.0
 * @package GmapBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Gmap_Block_Loader' ) ) {

	/**
	 * Gmap Blocks Loader Class
	 *
	 * @since 1.0.0
	 * @package GmapBlock
	 */

	class Gmap_Block_Loader {

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
			require_once trailingslashit( GMAP_PLUGIN_DIR ) . '/inc/classes/register-blocks.php';
			require_once trailingslashit( GMAP_PLUGIN_DIR ) . '/inc/classes/enqueue-assets.php';
			require_once trailingslashit( GMAP_PLUGIN_DIR ) . '/inc/classes/dynamic-style.php';

			// Gmap Admin
			// if( is_admin() ) {
			// require_once trailingslashit( GMAP_PLUGIN_DIR ) . '/inc/admin/admin.php';
			// }
		}
	}
	
	new Gmap_Block_Loader(); // Initialize the loader class.
}
