<?php
/**
 * Advanced Footer
 *
 * @package Divi AiO
 */

define( 'DAIO_ADVANCED_FOOTER_DIR', DIVI_AIO_DIR . 'includes/addons/advanced-footer/' );
define( 'DAIO_ADVANCED_FOOTER_URI', DIVI_AIO_URI . 'includes/addons/advanced-footer/' );

if ( ! class_exists( 'DAIO_Advanced_Footer' ) ) {

	/**
	 * Avanced Footer class
	 */
	class DAIO_Advanced_Footer {

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

			require_once DAIO_ADVANCED_FOOTER_DIR . 'inc/class-daio-adv-footer-loader.php';
			require_once DAIO_ADVANCED_FOOTER_DIR . 'inc/class-daio-adv-footer-markup.php';

			if ( ! is_admin() ) {
				require_once DAIO_ADVANCED_FOOTER_DIR . 'inc/daio-dynamic-css.php';
			}

		}
	}

	DAIO_Advanced_Footer::get_instance();
}