<?php
/**
 * Advanced Headers
 *
 * @package Divi AiO
 */

define( 'DAIO_ADVANCED_HEADERS_DIR', DIVI_AIO_DIR . 'includes/addons/advanced-headers/' );
define( 'DAIO_ADVANCED_HEADERS_URI', DIVI_AIO_URI . 'includes/addons/advanced-headers/' );

if ( ! class_exists( 'DAIO_Advanced_Headers' ) ) {

	/**
	 * Avanced headers class
	 */
	class DAIO_Advanced_Headers {

		/**
		 * Instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor function
		 */
		public function __construct() {

			require_once DAIO_ADVANCED_HEADERS_DIR . 'inc/class-daio-adv-headers-loader.php';
			require_once DAIO_ADVANCED_HEADERS_DIR . 'inc/class-daio-adv-headers-markup.php';

			if ( ! is_admin() ) {
				require_once DAIO_ADVANCED_HEADERS_DIR . 'inc/daio-dynamic-css.php';
			}
		}
	}
	
	DAIO_Advanced_Headers::get_instance();
}