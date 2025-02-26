<?php
/**
 * Afftra Blocks Main Loader
 *
 * @since 1.0.0
 * @package AfftraBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AfftraBlocks_Loader' ) ) {

	/**
	 * Afftra Blocks Loader Class
	 *
	 * @since 1.0.0
	 * @package AfftraBlocks
	 */

	class AfftraBlocks_Loader {

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
			require_once trailingslashit( AFFTRA_PLUGIN_DIR ) . '/inc/classes/register-blocks.php';
			require_once trailingslashit( AFFTRA_PLUGIN_DIR ) . '/inc/classes/register-category.php';
			require_once trailingslashit( AFFTRA_PLUGIN_DIR ) . '/inc/classes/enqueue-assets.php';
			require_once trailingslashit( AFFTRA_PLUGIN_DIR ) . '/inc/classes/dynamic-style.php';
			require_once trailingslashit( AFFTRA_PLUGIN_DIR ) . '/inc/classes/fonts-loader.php';
			require_once trailingslashit( AFFTRA_PLUGIN_DIR ) . '/inc/classes/support-svg.php';

			// Dashboard 
			require_once trailingslashit( AFFTRA_PLUGIN_DIR ) . '/inc/dashboard/dashboard.php';
		}
	}

}

	new AfftraBlocks_Loader(); // Initialize the loader class.
