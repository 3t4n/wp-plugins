<?php
/**
 * Advanced Headers Markup
 * 
 * @since 1.0.0
 */

if ( ! class_exists( 'DAIO_Advanced_Headers_Markup' ) ) {

	/**
 	 * Advanced Headers Markup Class
	 *
	 * @since 1.0.0
	 */
	class DAIO_Advanced_Headers_Markup {

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
		 *  Constructor
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts') );
		}

		/**
		 * Add Scripts
		 */
		function add_scripts() {

			wp_enqueue_script(
				'daio-adv-headers-js', 
				DAIO_ADVANCED_HEADERS_URI . 'assets/js/advanced-headers.js', 
				array( 'jQuery'), 
				DIVI_AIO_VER, 
				true 
			);

		}

	}

}

DAIO_Advanced_Headers_Markup::get_instance();