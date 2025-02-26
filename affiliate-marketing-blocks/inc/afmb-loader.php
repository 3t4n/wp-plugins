<?php
/**
 * Afmb Blocks Main Loader
 *
 * @since 1.0.0
 * @package Afmb-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Afmb_Loader' ) ) {

	/**
	 * Afmb Blocks Loader Class
	 *
	 * @since 1.0.0
	 * @package Afmb-blocks
	 */

	class Afmb_Loader {

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
			require_once trailingslashit( AFMB_PLUGIN_DIR ) . '/inc/classes/register-blocks.php';
			require_once trailingslashit( AFMB_PLUGIN_DIR ) . '/inc/classes/register-category.php';
			require_once trailingslashit( AFMB_PLUGIN_DIR ) . '/inc/classes/enqueue-assets.php';
			require_once trailingslashit( AFMB_PLUGIN_DIR ) . '/inc/classes/dynamic-style.php';
			require_once trailingslashit( AFMB_PLUGIN_DIR ) . '/inc/classes/fonts-loader.php';

			// Dashboard 
			require_once trailingslashit( AFMB_PLUGIN_DIR ) . '/inc/dashboard/dashboard.php';
		}
	}

}

new Afmb_Loader(); // initialize the class
