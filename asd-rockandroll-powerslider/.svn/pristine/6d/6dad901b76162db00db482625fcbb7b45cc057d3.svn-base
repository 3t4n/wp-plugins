<?php
/**
 * Defines the Add_PowerSlides class
 *
 * @package        WordPress
 * @subpackage     ASD_RockAndRoll_PowerSlider
 * Author:         Michael H Fahey
 * Author URI:     https://artisansitedesigns.com/staff/michael-h-fahey
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '' );
}

$output_powerslides_index;

/** ----------------------------------------------------------------------------
 *   instantiated by an instance of the shortcode class,
 *   which also passes along the shortcode parameters.
 *  --------------------------------------------------------------------------*/
class Add_PowerSlides extends ASD_AddCustomPosts_1_201811241 {

	/** ----------------------------------------------------------------------------
	 *   constructor
	 *   calls two functions, to set default parameters,
	 *   and another to parse parameters from the shortcode
	 *  ----------------------------------------------------------------------------
	 *
	 *   @param Array $atts - Parameters passed from the shortcode through
	 *   the Add_PowerSlider instance.
	 */
	public function __construct( $atts ) {
		parent::__construct( $atts, ASD_ROCKANDROLL_POWERSLIDER_DIR, 'powerslides-template.php', 'any' );
		self::set_more_parameters( $atts );
	}

	/** ----------------------------------------------------------------------------
	 *   function set_more_parameters( $atts )
	 *   reads the $atts passed from the shortcode, sets up query parameters
	 *  ----------------------------------------------------------------------------
	 *
	 *   @param Array $atts - Parameters passed from the shortcode through
	 *   the Add_PowerSlider instance.
	 */
	protected function set_more_parameters( $atts ) {

		if ( isset( $atts['image_ids'] ) ) {
			$slides_ids                         = explode( ',', $atts['image_ids'] );
			$this->parameters['post__in']       = $slides_ids;
			$this->parameters['post_mime_type'] = 'image';
			$this->parameters['post_type']      = 'attachment';
			$this->parameters['post_status']    = 'inherit';
		}
		if ( isset( $atts['image_category'] ) ) {
			$this->parameters['category_name']  = $atts['image_category'];
			$this->parameters['post_mime_type'] = 'image';
			$this->parameters['post_type']      = 'attachment';
			$this->parameters['post_status']    = 'inherit';
		} elseif ( isset( $atts['image_cats'] ) ) {
			$this->parameters['cat']            = $atts['image_cats'];
			$this->parameters['post_mime_type'] = 'image';
			$this->parameters['post_type']      = 'attachment';
			$this->parameters['post_status']    = 'inherit';
		}

		if ( isset( $atts['product_ids'] ) ) {
			$slides_ids                   = explode( ',', $atts['product_ids'] );
			$this->parameters['template'] = 'woo-products-template.php';
		}

		if ( isset( $atts['product_cat'] ) ) {
			$this->parameters['product_cat'] = $atts['product_cat'];
			if ( ! isset( $atts['template'] ) ) {
				$this->parameters['template'] = 'woo-products-template.php';
			}
		}

	}




	/** ----------------------------------------------------------------------------
	 *   function output_powerslide_before_scripts()
	 *
	 *   If a "before script" has been stored in the powerslider, output it
	 *  ----------------------------------------------------------------------------
	 *
	 *   @param int $powerslider_id - ID of the powerslider we are making script for.
	 */
	public function output_powerslide_before_scripts( $powerslider_id ) {
		if ( ! $this->parameters ) {
			return 'no arguments';
		}
		$matching = new WP_Query( $this->parameters );
		$output   = '';

		if ( $matching->have_posts() ) {
			/* build out the other individual powerslide functions */
			$matching = new WP_Query( $this->parameters );
			while ( $matching->have_posts() ) {
				global $post;
				$matching->the_post();
				if ( get_post_type() === 'powerslide' ) {
					$powerslide_before_script = get_post_meta( $post->ID, 'powerslide_before_script', 'false' );
					if ( $powerslide_before_script ) {
						$output .= '     function powerslide_before_' . esc_attr( $post->ID ) . '() {' . "\r\n";
						$output .= $powerslide_before_script . "\r\n";
						$output .= '     };' . "\r\n\r\n";
					}
				}
			}
		}
		return $output;
	}


	/** ----------------------------------------------------------------------------
	 *   function output_powerslide_after_scripts()
	 *
	 *   If a "after script" has been stored in the powerslider, output it
	 *  ----------------------------------------------------------------------------
	 *
	 *   @param int $powerslider_id - ID of the powerslider we are making script for.
	 */
	public function output_powerslide_after_scripts( $powerslider_id ) {
		if ( ! $this->parameters ) {
			return 'no arguments';
		}
		$matching = new WP_Query( $this->parameters );
		$output   = '';

		if ( $matching->have_posts() ) {
			/* build out the other individual powerslide functions */
			$matching = new WP_Query( $this->parameters );
			while ( $matching->have_posts() ) {
				global $post;
				$matching->the_post();
				if ( get_post_type() === 'powerslide' ) {
					$powerslide_after_script = get_post_meta( $post->ID, 'powerslide_after_script', 'false' );
					if ( $powerslide_after_script ) {
						$output .= '     function powerslide_after_' . esc_attr( $post->ID ) . '() {' . "\r\n";
						$output .= $powerslide_after_script . "\r\n";
						$output .= '     };' . "\r\n\r\n";
					}
				}
			}
		}
		return $output;
	}


	/** ----------------------------------------------------------------------------
	 *   function output_powerslide_before_script_triggers()
	 *  ----------------------------------------------------------------------------
	 *
	 *   @param int $powerslider_id - ID of the powerslider we are making script for.
	 */
	public function output_powerslide_before_script_triggers( $powerslider_id ) {

		$matching = new WP_Query( $this->parameters );

		$output = '';
		if ( $matching->have_posts() ) {

			$output .= "\r\n" . '     jQuery("#powerslider_' . $powerslider_id . '").on("beforeChange", function(event, slick, currentSlide, nextSlide ) {' . "\r\n";

			/* build the switch statement to call individual powerslide functions from this event */
			$output         .= '         switch ( currentSlide ){ ' . "\r\n";
			$powerslideindex = 1;
			$script          = '';
			global $post;
			while ( $matching->have_posts() ) {
				$matching->the_post();
				$script = get_post_meta( $post->ID, 'powerslide_before_script', 'false' );
				if ( $script ) {
					$output .= '           case ' . esc_attr( $powerslideindex ) . ': ' . "\r\n";
					$output .= '                  powerslide_before_' . esc_attr( $post->ID ) . '();' . "\r\n";
					$output .= '                  break;' . "\r\n";
				}
				$powerslideindex++;
			}
			$powerslideindex = 0;
			if ( $script ) {
				$output .= '           case ' . esc_attr( $powerslideindex ) . ': ' . "\r\n";
				$output .= '                  powerslide_before_' . esc_attr( $post->ID ) . '();' . "\r\n";
				$output .= '                  break;' . "\r\n";
			}

			$output .= '         }' . "\r\n";
			$output .= '     });' . "\r\n\r\n";

		}
		return $output;
	}

	/** ----------------------------------------------------------------------------
	 *   function output_powerslide_after_script_triggers()
	 *  ----------------------------------------------------------------------------
	 *
	 *   @param int $powerslider_id - ID of the powerslider we are making script for.
	 */
	public function output_powerslide_after_script_triggers( $powerslider_id ) {

		$matching = new WP_Query( $this->parameters );

		$output                          = '';
		$first_powerslide_after_function = '';

		if ( $matching->have_posts() ) {

			$output .= "\r\n" . '     jQuery("#powerslider_' . $powerslider_id . '").on("afterChange", function(event, slick, currentSlide) {' . "\r\n";

			/* build the switch statement to call individual powerslide functions from this event */
			$output .= '         switch ( currentSlide ){ ' . "\r\n";

			$powerslideindex = 0;
			while ( $matching->have_posts() ) {
				global $post;
				$matching->the_post();
				$script = get_post_meta( $post->ID, 'powerslide_after_script', 'false' );
				if ( $script ) {
					$powerslide_function = '                  powerslide_after_' . esc_attr( $post->ID ) . '();';
					if ( 0 === $powerslideindex ) {
						$first_powerslide_after_function = $powerslide_function;
					}
					$output .= '           case ' . esc_attr( $powerslideindex ) . ': ' . "\r\n";
					$output .= $powerslide_function . "\r\n";
					$output .= '                  break;' . "\r\n";
				}
				$powerslideindex++;
			}
			$output .= '         }' . "\r\n";
			$output .= '     });' . "\r\n\r\n";

			if ( $first_powerslide_after_function ) {
				$output .= 'jQuery(document).ready(function() { ' . "\r\n";
				$output .= '   setTimeout(function(){ ' . "\r\n";
				$output .= '        ' . esc_attr( $first_powerslide_after_function ) . "\r\n";
				$output .= '   }, 10);' . "\r\n";
				$output .= '});' . "\r\n\r\n";
			}
		}
		return $output;
	}


}

