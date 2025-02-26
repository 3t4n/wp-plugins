<?php
/**
 *  Defines the PowerSlider_Shortcode class.
 *
 *  @package         WordPress
 *  @subpackage      ASD_RockAndRoll_PowerSlider
 *  Author:          Michael H Fahey
 *  Author URI:      https://artisansitedesigns.com/staff/michael-h-fahey
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '' );
}

if ( ! class_exists( 'PowerSlider_Shortcode' ) ) {
	/** ----------------------------------------------------------------------------
	 *   class PowerSlider_Shortcode
	 *   used to create a shortcode for powerslider post types and instantiate the
	 *   Add_PowerSlider class to return template-formatted post data.
	 *  --------------------------------------------------------------------------*/
	class PowerSlider_Shortcode {

		/** ----------------------------------------------------------------------------
		 *   constructor
		 *   Defines a new shortcode for inserting the slider
		 *  --------------------------------------------------------------------------*/
		public function __construct() {
			add_shortcode( 'insert_powerslider', array( &$this, 'insert_powerslider' ) );
		}

		/** ----------------------------------------------------------------------------
		 *   function insert_powerslider( $shortcode_params )
		 *   This function is a callback set in the class constructor.
		 *   This function instantiates a new Add_PowerSlider class object and
		 *   passes parameter data from the shortcode to the new object.
		 *  ----------------------------------------------------------------------------
		 *
		 *   @param Array $shortcode_params - data from the shortcode.
		 */
		public function insert_powerslider( $shortcode_params ) {

			$posts = new Add_PowerSlider( $shortcode_params );
			ob_start();
			echo wp_kses_post( $posts->output_powerslider() );
			return ob_get_clean();

		}

	}

}
