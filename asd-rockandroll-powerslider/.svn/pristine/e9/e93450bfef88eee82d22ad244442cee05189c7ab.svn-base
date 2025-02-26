<?php
/**
 *  Defines the PowerSlides_Shortcode class.
 *
 *  @package         WordPress
 *  @subpackage      ASD_RockAndRoll_PowerSlider
 *  Author:          Michael H Fahey
 *  Author URI:      https://artisansitedesigns.com/staff/michael-h-fahey
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '' );
}

if ( ! class_exists( 'PowerSlides_Shortcode' ) ) {
	/** ----------------------------------------------------------------------------
	 *   class PowerSlides_Shortcode
	 *   used to create a shortcode for powerslides post types and instantiate the
	 *   Add_PowerSlides class to return template-formatted post data.
	 *  --------------------------------------------------------------------------*/
	class PowerSlides_Shortcode {

		/** ----------------------------------------------------------------------------
		 *   constructor
		 *   Defines a new shortcode for inserting the slides
		 *  --------------------------------------------------------------------------*/
		public function __construct() {
			add_shortcode( 'insert_powerslides', array( &$this, 'insert_powerslides' ) );
		}

		/** ----------------------------------------------------------------------------
		 *   function insert_powerslides( $shortcode_params )
		 *   This function is a callback set in the class constructor.
		 *   This function instantiates a new Add_PowerSlides class object and
		 *   passes parameter data from the shortcode to the new object.
		 *  ----------------------------------------------------------------------------
		 *
		 *   @param Array $shortcode_params - data from the shortcode.
		 */
		public function insert_powerslides( $shortcode_params ) {

			$posts = new Add_PowerSlides( $shortcode_params );
			ob_start();
			echo wp_kses_post( $posts->output_customposts() );
			return ob_get_clean();

		}

	}

}
