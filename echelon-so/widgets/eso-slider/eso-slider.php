<?php

/*
Widget Name: E: Slider
Description: Slider framework for other widgets.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/slider/
*/

class EchelonSOEsoSlider extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-slider',
			__('E: Slider', 'echelon-so'),
			array(
				'description' => __('Slider framework for other widgets.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/slider/',
				'panels_groups' => array('eso'),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template
	*/

	function get_template_name($instance) {
		if (empty($instance['slide_nav_settings']['nav_placement'])) {
			return 'default';
		} else {
			return $instance['slide_nav_settings']['nav_placement'];
		}
	}

	/*
	* Template Variables
	*/

	function get_template_variables($instance, $args) {

		// content
		$return['frames'] = !empty( $instance['frames'] ) ? $instance['frames'] : false;

		// slide settings
		$return['autoplay'] = !empty($instance['slide_settings']['slider_autoplay']) ? 'true' : 'false';
		$return['autoplay_interval'] = !empty($instance['slide_settings']['autoplay_interval']) ? absint($instance['slide_settings']['autoplay_interval'] * 1000) : '3000';
		$return['center'] = !empty($instance['slide_settings']['center']) ? 'true' : 'false';
		$return['lightbox'] = !empty($instance['slide_settings']['lightbox']) ? 'uk-lightbox' : '';
		$return['transition_toggle'] = !empty($instance['slide_settings']['transition_toggle']) ? 'uk-transition-active' : 'eso';

		// items
		$return['items_class'][] = 'eso-slider-items-class';
		(empty($instance['slide_settings']['col_width'])) ?: $return['items_class'][] = $instance['slide_settings']['col_width'];
		(empty($instance['slide_settings']['col_width_s'])) ?: $return['items_class'][] = $instance['slide_settings']['col_width_s'];
		(empty($instance['slide_settings']['col_width_m'])) ?: $return['items_class'][] = $instance['slide_settings']['col_width_m'];
		(empty($instance['slide_settings']['col_width_l'])) ?: $return['items_class'][] = $instance['slide_settings']['col_width_l'];
		(empty($instance['slide_settings']['grid'])) ?: $return['items_class'][] = $instance['slide_settings']['grid'];
		(empty($instance['slide_settings']['margin_top'])) ?: $return['items_class'][] = $instance['slide_settings']['margin_top'];
		(empty($instance['slide_settings']['margin_bottom'])) ?: $return['items_class'][] = $instance['slide_settings']['margin_bottom'];

		// navs
		$return['slide_nav_settings'] = $instance['slide_nav_settings'];
		$return['nav_visibility'] = empty($instance['slide_nav_settings']['nav_visibility']) ? 'uk-hidden' : 'eso';
		$return['show_nav'] = empty($instance['slide_nav_settings']['nav_visibility']) ? false : true;
		$return['dot_visibility'] = empty($instance['slide_nav_settings']['dot_visibility']) ? 'uk-hidden' : 'eso';
		$return['show_dot'] = empty($instance['slide_nav_settings']['dot_visibility']) ? false : true;

		$return['nav_container_class'][] = 'eso';
		(empty($instance['slide_nav_settings']['nav_position'])) ?: $return['nav_container_class'][] = $instance['slide_nav_settings']['nav_position'];
		(empty($instance['slide_nav_settings']['nav_position_size'])) ?: $return['nav_container_class'][] = $instance['slide_nav_settings']['nav_position_size'];
		(empty($instance['slide_nav_settings']['nav_hidden_hover'])) ?: $return['nav_container_class'][] = 'uk-hidden-hover';
		(empty($instance['slide_nav_settings']['nav_hidden_touch'])) ?: $return['nav_container_class'][] = 'uk-hidden-Touch';

		$return['nav_position'] = !empty($instance['slide_nav_settings']['nav_position']) ? $instance['slide_nav_settings']['nav_position'] : 'eso';
		$return['nav_position_size'] = !empty($instance['slide_nav_settings']['nav_position_size']) ? $instance['slide_nav_settings']['nav_position_size'] : 'eso';
		$return['nav_hidden_hover'] = !empty($instance['slide_nav_settings']['nav_hidden_hover']) ? 'uk-hidden-hover' : 'eso';
		$return['nav_hidden_touch'] = !empty($instance['slide_nav_settings']['nav_hidden_touch']) ? 'uk-hidden-touch' : 'eso';

		return $return;
	}

	/*
	* Less Variables
	*/

	function get_less_variables($instance) {

		if ( isset($instance['slidenav_appearance']) ) {
			$return['arrow_color'] = !empty( $instance['slidenav_appearance']['arrow_color'] ) ? $instance['slidenav_appearance']['arrow_color'] : false;
			$return['arrow_hover_color'] = !empty( $instance['slidenav_appearance']['arrow_hover_color'] ) ? $instance['slidenav_appearance']['arrow_hover_color'] : false;
			// $return['arrow_click_color'] = !empty( $instance['slidenav_appearance']['arrow_click_color'] ) ? $instance['slidenav_appearance']['arrow_click_color'] : false;
			$return['arrow_background_color'] = !empty( $instance['slidenav_appearance']['arrow_background_color'] ) ? $instance['slidenav_appearance']['arrow_background_color'] : false;
			$return['arrow_previous_padding'] = !empty( $instance['slidenav_appearance']['arrow_previous_padding'] ) ? $instance['slidenav_appearance']['arrow_previous_padding'] : false;
			$return['arrow_next_padding'] = !empty( $instance['slidenav_appearance']['arrow_next_padding'] ) ? $instance['slidenav_appearance']['arrow_next_padding'] : false;
		}

		if ( isset($instance['dotnav_appearance']) ) {
			$return['dotnav_border'] = !empty( $instance['dotnav_appearance']['dotnav_border'] ) ? $instance['dotnav_appearance']['dotnav_border'] : false;
			$return['dotnav_active_background'] = !empty( $instance['dotnav_appearance']['dotnav_active_background'] ) ? $instance['dotnav_appearance']['dotnav_active_background'] : false;
			$return['dotnav_hover_background'] = !empty( $instance['dotnav_appearance']['dotnav_hover_background'] ) ? $instance['dotnav_appearance']['dotnav_hover_background'] : false;
			$return['dotnav_background'] = !empty( $instance['dotnav_appearance']['dotnav_background'] ) ? $instance['dotnav_appearance']['dotnav_background'] : false;
			$return['dotnav_onclick_background'] = !empty( $instance['dotnav_appearance']['dotnav_onclick_background'] ) ? $instance['dotnav_appearance']['dotnav_onclick_background'] : false;
			$return['dotnav_size'] = !empty( $instance['dotnav_appearance']['dotnav_size'] ) ? $instance['dotnav_appearance']['dotnav_size'] : false;
		}

		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so, $echelon_so_modifiers;

		$return['frames'] = array(
			'type' => 'repeater',
			'label' => __( 'Slider Frames' , 'echelon-so' ),
			'item_name'  => __( 'Frame', 'siteorigin-widgets' ),
			'fields' => array(
				'content' => array(
					'type' => 'builder',
					'label' => __( 'Content', 'echelon-so' )
				),
			)
		);

		$return['slide_settings'] = EsoWidgetFormPart::slide_settings();
		$return['slide_nav_settings'] = EsoWidgetFormPart::slide_nav_settings();
		$return['slidenav_appearance'] = EsoWidgetFormPart::slidenav_appearance();
		$return['dotnav_appearance'] = EsoWidgetFormPart::dotnav_appearance();

		return $return;

	}

	/*
	* Instance modifications
	* The form changes over time
	*/

	function modify_instance( $instance )  {
		// update 2.1.0
		if ( isset( $instance['slider']['template'] ) ) {
			if ( $instance['slider']['template'] == 'center' ) {
				$instance['slide_settings']['center'] = 'true';
			}
			unset($instance['slider']['template']);
		}
		if ( isset( $instance['slider']['lightbox'] ) ) {
			if ( !empty($instance['slider']['lightbox']) ) {
				$instance['slide_settings']['lightbox'] = '1';
			}
			unset($instance['slider']['lightbox']);
		}
		if ( isset( $instance['modifiers']['col_width'] ) ) {
			$instance['slide_settings']['col_width'] = $instance['modifiers']['col_width'];
			unset($instance['modifiers']['col_width']);
		}
		if ( isset( $instance['modifiers']['col_width_s'] ) ) {
			$instance['slide_settings']['col_width_s'] = $instance['modifiers']['col_width_s'];
			unset($instance['modifiers']['col_width_s']);
		}
		if ( isset( $instance['modifiers']['col_width_m'] ) ) {
			$instance['slide_settings']['col_width_m'] = $instance['modifiers']['col_width_m'];
			unset($instance['modifiers']['col_width_m']);
		}
		if ( isset( $instance['modifiers']['col_width_l'] ) ) {
			$instance['slide_settings']['col_width_l'] = $instance['modifiers']['col_width_l'];
			unset($instance['modifiers']['col_width_l']);
		}
		if ( isset( $instance['modifiers']['grid'] ) ) {
			$instance['slide_settings']['grid'] = $instance['modifiers']['grid'];
			unset($instance['modifiers']['grid']);
		}
		if ( isset( $instance['modifiers']['autoplay'] ) ) {
			$instance['slide_settings']['autoplay'] = $instance['modifiers']['autoplay'];
			unset($instance['modifiers']['autoplay']);
		}
		if ( isset( $instance['modifiers']['autoplay_interval'] ) ) {
			$instance['slide_settings']['autoplay_interval'] = $instance['modifiers']['autoplay_interval'];
			unset($instance['modifiers']['autoplay_interval']);
		}
		if ( isset( $instance['modifiers']['transition'] ) ) {
			$instance['slide_settings']['transition_toggle'] = $instance['modifiers']['transition'];
			unset($instance['modifiers']['transition']);
		}
		if ( isset( $instance['modifiers']['nav_outside'] ) ) {
			$instance['slidenav']['position']['slidenav_outside'] = $instance['modifiers']['nav_outside'];
			unset($instance['modifiers']['nav_outside']);
		}
		if ( isset( $instance['modifiers']['show_nav'] ) ) {
			$instance['slidenav']['slidenav_visibility'] = $instance['modifiers']['show_nav'];
			unset($instance['modifiers']['show_nav']);
		}
		if ( isset( $instance['modifiers']['show_dot'] ) ) {
			$instance['dotnav']['dotnav_visibility'] = $instance['modifiers']['show_dot'];
			unset($instance['modifiers']['show_dot']);
		}
		// end 2.1.0
		return $instance;
	}

}

siteorigin_widget_register('echelonso-eso-slider', __FILE__, 'EchelonSOEsoSlider');
