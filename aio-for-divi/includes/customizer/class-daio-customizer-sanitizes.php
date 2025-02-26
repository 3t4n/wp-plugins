<?php
/**
 * Divi AiO Customizer Sanitize.
 *
 * @package     Divi AiO
 * @author      DiviPeople
 * @copyright   Copyright (c) 2019, Brainmade Labs
 * @link        https://aio.divipeople.com
 * @since       Divi AiO 1.0.0
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customizer Sanitizes
 */
if ( ! class_exists( 'DAIO_Customizer_Sanitizes' ) ) :

	class DAIO_Customizer_Sanitizes {

		/**
		 * Instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() { }

		// Integer number
		public static function sanitize_integer( $input ) {
			return absint( $input );
		}

	}

endif;

DAIO_Customizer_Sanitizes::get_instance();
