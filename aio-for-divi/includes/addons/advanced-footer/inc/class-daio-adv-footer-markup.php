<?php
/**
 * Advanced Footer Markup
 * 
 * @since 1.0.0
 */

if ( ! class_exists( 'DAIO_Advanced_Footer_Markup' ) ) {

	/**
 	 * Advanced Footer Markup Class
	 *
	 * @since 1.0.0
	 */
	class DAIO_Advanced_Footer_Markup {

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

			add_action( 'body_class', array( $this, 'add_body_class' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts') );

		}

		/**
		 * Add Body Classes
		 *
		 * @return array
		 */
		function add_body_class( $classes ) {

			$sticky_footer = daio_get_option( 'daio-sticky-footer' );
			
			if ( '1' == $sticky_footer  ) {
				$classes[] = 'daio-footer-sticky-enabled';
			}

			return $classes;
			
		}

		/**
		 * Add Scripts
		 */
		function add_scripts() {

			wp_enqueue_script(
				'daio-adv-footer-js', 
				DAIO_ADVANCED_FOOTER_URI . 'assets/js/advanced-footer.js', 
				array( 'jQuery'), 
				DIVI_AIO_VER, 
				true 
			);

		}

	}
}

DAIO_Advanced_Footer_Markup::get_instance();