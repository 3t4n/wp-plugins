<?php
/**
 * SVG File Type
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
 *  Support SVG
 */
if ( ! class_exists( 'Divi_Aio_Svg_Support' ) ) :

	class Divi_Aio_Svg_Support {

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
		public function __construct() {
			add_action( 'upload_mimes', array($this, 'daio_svg_file_type_support') );
		}

		/**
		 * Support SVG
		 */
		function daio_svg_file_type_support( $file_types ) {
			$svg_filetypes = [];
			$svg_filetypes['svg'] = 'image/svg+xml';
			$file_types = array_merge( $file_types, $svg_filetypes );
			return $file_types;
		}
		
	}

endif;

Divi_Aio_Svg_Support::get_instance();