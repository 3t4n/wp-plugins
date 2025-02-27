<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
Widget Name: E: Before & After
Description: Slider to compare the visual difference between two images.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/before-after/
*/

class EchelonSOEsoBeforeAfter extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-before-after',
			__('E: Before & After', 'echelon-so'),
			array(
				'description' => __('Compare the visual difference between two images.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/before-after/',
				'panels_groups' => array('eso'),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template File Variables
	*/

	function get_template_variables($instance, $args) {
		$return = array();
		if ( !empty($instance['before_after']['image_1']) ) {
			$size = empty( $instance['before_after']['image_1_size'] ) ? 'full' : $instance['before_after']['image_1_size'];
			$attachment = wp_get_attachment_image_src( $instance['before_after']['image_1'], $size );
			$return['image_1'] = sow_esc_url($attachment[0]);
		} else {
			$return['image_1'] = false;
		}
		if ( !empty($instance['before_after']['image_2']) ) {
			$size = empty( $instance['before_after']['image_1_size'] ) ? 'full' : $instance['before_after']['image_1_size'];
			$attachment = wp_get_attachment_image_src( $instance['before_after']['image_2'], $size );
			$return['image_2'] = sow_esc_url($attachment[0]);
		} else {
			$return['image_2'] = false;
		}
		$return['before_label'] = __('Before', 'echelon-so');
		$return['after_label'] = __('After', 'echelon-so');
		$return['initial_offset'] = 0.5;
		$return['orientation'] = 'horizontal';
		$return['int_id'] = 'ba_' . uniqid(rand(1,9999));
		return $return;
	}


	function get_widget_form() {

		$return['before_after'] = array(
			'type' => 'section',
			'label' => __( 'Settings' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'image_1_size' => EsoWidgetFormCorePart::image_size('Image Size', 'Choose which image size to use from those available.'),
				'image_1' => EsoWidgetFormCorePart::media('Image 1 File', 'The image to use for the left or top side of the slider.' . EsoWidgetFormPart::required()),
				'image_1_label' => EsoWidgetFormCorePart::text('Image 1 Label' . EsoWidgetFormPart::prime_tag(), 'Replace the default before text with some custom text.', 'Before'),
				'image_2' => EsoWidgetFormCorePart::media('Image 2 File', 'The image to use for the right or bottom side of the slider.' . EsoWidgetFormPart::required()),
				'image_2_label' => EsoWidgetFormCorePart::text('Image 2 Label' . EsoWidgetFormPart::prime_tag(), 'Replace the default after text with some custom text.', 'Before'),
				'orientation' => EsoWidgetFormCorePart::select('Orientation', 'Choose from a Horizontal (left / right) slider or Vertical (top / bottom) slider.', 'horizontal', array(
					'horizontal' => __('Horizontal', 'echelon-so'),
					'vertical' => __('Vertical' . EsoWidgetFormPart::prime_tag(), 'echelon-so')
				))
			)
		);

		return $return;
	}

	/*
	* Scripts
	*/

	function initialize(){
		add_action( 'siteorigin_widgets_enqueue_frontend_scripts_' . $this->id_base, array( $this, 'enqueue_widget_scripts' ) );
	}

	function enqueue_widget_scripts($instance) {
		global $echelon_so;
		$twentytwenty = 'https://cdnjs.cloudflare.com/ajax/libs/mhayes-twentytwenty/1.0.0/js/jquery.twentytwenty.min.js';
		$event_move = 'https://cdnjs.cloudflare.com/ajax/libs/mhayes-twentytwenty/1.0.0/js/jquery.event.move.min.js';
		$imagesloaded = 'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js';
		$css = 'https://cdnjs.cloudflare.com/ajax/libs/mhayes-twentytwenty/1.0.0/css/twentytwenty.min.css';
		wp_enqueue_script( 'echelonso_images_loaded', $imagesloaded, array('jquery'), '4.1.4', true );
		wp_enqueue_script( 'echelonso_twentytwenty', $twentytwenty, array('jquery', 'echelonso_images_loaded'), '1.0.0', true );
		wp_enqueue_script( 'echelonso_event_move', $event_move, array('jquery', 'echelonso_images_loaded'), '1.0.0', true );
		wp_enqueue_style( 'echelonso_twentytwenty_css', $css, array(), '1.0.0' );
	}

}

siteorigin_widget_register('echelonso-eso-before-after', __FILE__, 'EchelonSOEsoBeforeAfter');
