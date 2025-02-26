<?php
/**
 * Defines the Add_PowerSlider class
 *
 * @package        WordPress
 * @subpackage     ASD_RockAndRoll_PowerSlider
 * Author:         Michael H Fahey
 * Author URI:     https://artisansitedesigns.com/staff/michael-h-fahey
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '' );
}

/** ----------------------------------------------------------------------------
 *   class Add_PowerSlider
 *   instantiated by an instance of the powerslider shortcode class,
 *   which also passes along the shortcode parameters.
 *  ------------------------------------------------------------------------- */
class Add_PowerSlider {

	/** ------------------------------------------------------------------------
	 *
	 *   @var $parameters
	 *   to contain parameters from the shortcode
	 *  ------------------------------------------------------------------------- */
	protected $parameters = array();

	/** -----------------------------------------------------------------------
	 *
	 *   @var $powerslider_id
	 *  ------------------------------------------------------------------------- */
	protected $powerslider_id = false;

	/** -----------------------------------------------------------------------
	 *
	 *   @var $atts_orig
	 *   the original attributes passed from the shortcode
	 *  ------------------------------------------------------------------------- */
	protected $atts_orig = array();

	/** --------------------------------------------------------------------------
	 *   contsructor
	 *   get $parameters from the shortcode, and get the powerslider ID too
	 *  ---------------------------------------------------------------------------
	 *
	 *   @param Array $atts - Parameters passed from the shortcode through
	 *   the ASD_PowerSliderShortcode instance.
	 */
	public function __construct( $atts ) {
		$this->atts_orig = $atts;
		self::set_default_parameters();
		self::set_parameters( $atts );
	}

	/** ----------------------------------------------------------------------------
	 *   function set_default_parameters()
	 *   sets default/failsafe options for shortcode parameters
	 *  --------------------------------------------------------------------------*/
	protected function set_default_parameters() {
		$this->parameters = array(
			'post_type'   => 'powerslider',
			'post_status' => 'publish',
			'orderby'     => 'menu_order',
			'order'       => 'ASC',
		);
	}

	/** ----------------------------------------------------------------------------
	 *   function set_parameters( $atts )
	 *   Parses through shortcode options passed in $atts, and adds query
	 *   parameters to $parameters member variable
	 *  ----------------------------------------------------------------------------
	 *
	 *   @param Array $atts - options passed from the shortcode through
	 *   the PowerSlider_Shortcode instance.
	 */
	protected function set_parameters( $atts ) {

		if ( isset( $atts['powersliderid'] ) ) {
			$powerslider_ids              = explode( ',', sanitize_text_field( $atts['powersliderid'] ) );
			$this->parameters['post__in'] = $powerslider_ids;
			unset( $this->atts_orig['powersliderid'] );
		}
		if ( isset( $atts['powersliderslug'] ) ) {
			$this->parameters['name'] = $atts['powersliderslug'];
			unset( $this->atts_orig['powersliderslug'] );
		}
		if ( isset( $atts['powerslidername'] ) ) {
			$this->parameters['title'] = $atts['powerslidername'];
			unset( $this->atts_orig['powerslidername'] );
		}

	}


	/** ----------------------------------------------------------------------------
	 *   function output_powerslider()
	 *   Queries the database for slides based on data in the parameters array
	 *   does a have_posts() loop with a shortcode template
	 *   and concantenates and returns $output
	 *  --------------------------------------------------------------------------*/
	public function output_powerslider() {

		$powersliders = new WP_Query( $this->parameters );

		if ( $powersliders->have_posts() ) {

			$powersliders->the_post();

			global $post;
			$cur_powerslider_id = $post->ID;

			echo "\r\n";
			echo '<div class="clearfix">' . "\r\n";
			echo '   <div class="powerslider_frame" id="powerslider_frame_' . esc_attr( $cur_powerslider_id ) . '">' . "\r\n";
			echo '      <div class="powerslider" id="powerslider_' . esc_attr( $cur_powerslider_id ) . '">' . "\r\n";

			$powerslides = new Add_PowerSlides( $this->atts_orig );

			echo ( wp_kses_post( $powerslides->output_customposts() ) );

			echo '      </div>' . "\r\n";
			echo '   </div>' . "\r\n";
			echo '</div>' . "\r\n";

			$autoplay         = false;
			$autoplay_speed   = false;
			$arrows           = false;
			$centermode       = false;
			$centerpadding    = false;
			$dots             = false;
			$draggable        = false;
			$fade             = false;
			$infinite         = false;
			$pauseonfocus     = false;
			$pauseonhover     = false;
			$pauseondotshover = false;
			$script           = false;
			$style            = false;
			$slidestoshow     = false;
			$slidestoscroll   = false;
			$speed            = false;
			$swipe            = false;
			$swipetoslide     = false;
			$touchmove        = false;
			$vertical         = false;

			$custom = get_post_custom( $cur_powerslider_id );

			if ( $custom ) {
				if ( isset( $custom['autoplay'][0] ) ) {
					$autoplay = $custom['autoplay'][0];
				}
				if ( isset( $custom['autoplay_speed'][0] ) ) {
					$autoplay_speed = $custom['autoplay_speed'][0];
				}
				if ( isset( $custom['arrows'][0] ) ) {
					$arrows = $custom['arrows'][0];
				}
				if ( isset( $custom['centermode'][0] ) ) {
					$centermode = $custom['centermode'][0];
				}
				if ( isset( $custom['centerpadding'][0] ) ) {
					$centerpadding = $custom['centerpadding'][0];
				}
				if ( isset( $custom['dots'][0] ) ) {
					$dots = $custom['dots'][0];
				}
				if ( isset( $custom['draggable'][0] ) ) {
					$draggable = $custom['draggable'][0];
				}
				if ( isset( $custom['fade'][0] ) ) {
					$fade = $custom['fade'][0];
				}
				if ( isset( $custom['infinite'][0] ) ) {
					$infinite = $custom['infinite'][0];
				}
				if ( isset( $custom['pauseonfocus'][0] ) ) {
					$pauseonfocus = $custom['pauseonfocus'][0];
				}
				if ( isset( $custom['pauseonhover'][0] ) ) {
					$pauseonhover = $custom['pauseonhover'][0];
				}
				if ( isset( $custom['pauseondotshover'][0] ) ) {
					$pauseondotshover = $custom['pauseondotshover'][0];
				}
				if ( isset( $custom['script'][0] ) ) {
					$script = $custom['script'][0];
				}
				if ( isset( $custom['style'][0] ) ) {
					$style = $custom['style'][0];
				}
				if ( isset( $custom['slidestoshow'][0] ) ) {
					$slidestoshow = $custom['slidestoshow'][0];
				}
				if ( isset( $custom['slidestoscroll'][0] ) ) {
					$slidestoscroll = $custom['slidestoscroll'][0];
				}
				if ( isset( $custom['speed'][0] ) ) {
					$speed = $custom['speed'][0];
				}
				if ( isset( $custom['swipe'][0] ) ) {
					$swipe = $custom['swipe'][0];
				}
				if ( isset( $custom['swipetoslide'][0] ) ) {
					$swipetoslide = $custom['swipetoslide'][0];
				}
				if ( isset( $custom['touchmove'][0] ) ) {
					$touchmove = $custom['touchmove'][0];
				}
				if ( isset( $custom['vertical'][0] ) ) {
					$vertical = $custom['vertical'][0];
				}
			}

			echo '<script type="text/javascript">' . "\r\n";

			/* begin of document ready */
			echo '   jQuery(document).ready(function() { ' . "\r\n";

			/* initialize powerslider */
			echo '      jQuery("#powerslider_' . esc_attr( $cur_powerslider_id ) . '").slick ({ ' . "\r\n";
			if ( $autoplay ) {
				echo ' autoplay:' . esc_attr( $autoplay ) . ' ,' . "\r\n";
			}
			if ( $autoplay_speed ) {
				echo ' autoplaySpeed:' . esc_attr( $autoplay_speed ) . ' ,' . "\r\n";
			}
			if ( $arrows ) {
				echo ' arrows:' . esc_attr( $arrows ) . ' ,' . "\r\n";
			}
			if ( $centermode ) {
				echo ' centerMode:' . esc_attr( $centermode ) . ' ,' . "\r\n";
			}
			if ( $dots ) {
				echo ' dots:' . esc_attr( $dots ) . ' ,' . "\r\n";
			}
			if ( $draggable ) {
				echo ' draggable:' . esc_attr( $draggable ) . ' ,' . "\r\n";
			}
			if ( $fade ) {
				echo ' fade:' . esc_attr( $fade ) . ' ,' . "\r\n";
			}
			if ( $infinite ) {
				echo ' infinite:' . esc_attr( $infinite ) . ' ,' . "\r\n";
			}
			if ( $pauseonfocus ) {
				echo ' pauseOnFocus:' . esc_attr( $pauseonfocus ) . ' ,' . "\r\n";
			}
			if ( $pauseonhover ) {
				echo ' pauseOnHover:' . esc_attr( $pauseonhover ) . ' ,' . "\r\n";
			}
			if ( $pauseondotshover ) {
				echo ' pauseOnDotsHover:' . esc_attr( $pauseondotshover ) . ' ,' . "\r\n";
			}
			if ( $slidestoshow ) {
				echo ' slidesToShow:' . esc_attr( $slidestoshow ) . ' ,' . "\r\n";
			}
			if ( $slidestoscroll ) {
				echo ' slidesToScroll:' . esc_attr( $slidestoscroll ) . ' ,' . "\r\n";
			}
			if ( $speed ) {
				echo ' speed:' . esc_attr( $speed ) . ' ,' . "\r\n";
			}
			if ( $swipe ) {
				echo ' swipe:' . esc_attr( $swipe ) . ' ,' . "\r\n";
			}
			if ( $swipetoslide ) {
				echo ' swipeToSlide:' . esc_attr( $swipetoslide ) . ' ,' . "\r\n";
			}
			if ( $touchmove ) {
				echo ' touchMove:' . esc_attr( $touchmove ) . ' ,' . "\r\n";
			}
			if ( $vertical ) {
				echo ' vertical:' . esc_attr( $vertical ) . ' ,' . "\r\n";
			}
			echo '      });' . "\r\n";

			/* end of document ready */
			echo '   });' . "\r\n\r\n";

			echo( wp_kses_post( $powerslides->output_powerslide_after_script_triggers( $cur_powerslider_id ) ) );
			echo( wp_kses_post( $powerslides->output_powerslide_after_scripts( $cur_powerslider_id ) ) );
			echo( wp_kses_post( $powerslides->output_powerslide_before_script_triggers( $cur_powerslider_id ) ) );
			echo( wp_kses_post( $powerslides->output_powerslide_before_scripts( $cur_powerslider_id ) ) );
			if ( $script ) {
				echo( wp_kses_post( $script ) );
			}

			echo '</script>' . "\r\n";

			if ( $style ) {
				echo '<style type="text/css">' . "\r\n";
				echo wp_kses_post( $style . "\r\n" );
				echo '</style>' . "\r\n";
			}
		} else {
			echo '<div class="no_powerslider"></div>' . "\r\n";
		}

	}

}

