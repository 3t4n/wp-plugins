<?php

/*
Widget Name: E: Overlay
Description: Overlay two different page builder layouts.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/overlay/
*/

class EchelonSOEsoOverlay extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-overlay',
			__('E: Overlay', 'echelon-so'),
			array(
				'description' => __('Overlay two different page builder layouts.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/overlay/',
				'panels_groups' => array('eso'),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Get the variales we need
	*/

	function get_template_variables($instance, $args) {

		// content
		$return['content'] = $instance['overlay']['content'];
		$return['overlay_content'] = $instance['overlay']['overlay_content'];

		// modifiers
		$return['overlay_class'] = array();
		(empty($instance['overlay_settings']['position'])) ?: $return['overlay_class'][] = $instance['overlay_settings']['position'];
		(empty($instance['overlay_settings']['position_size'])) ?: $return['overlay_class'][] = $instance['overlay_settings']['position_size'];
		(empty($instance['overlay_settings']['width'])) ?: $return['overlay_class'][] = $instance['overlay_settings']['width'];
		(empty($instance['overlay_settings']['padding_remove'])) ?: $return['overlay_class'][] = $instance['overlay_settings']['padding_remove'];

		$return['wrap_class'] = array();
		(empty($instance['overlay_settings']['height'])) ?: $return['wrap_class'][] = $instance['overlay_settings']['height'];

		if ( !empty($instance['overlay_settings']['flex_h']) || !empty($instance['overlay_settings']['flex_v']) ) {
			$return['overlay_class'][] = 'uk-flex';
		}

		(empty($instance['overlay_settings']['flex_h'])) ?: $return['overlay_class'][] = $instance['overlay_settings']['flex_h'];
		(empty($instance['overlay_settings']['flex_v'])) ?: $return['overlay_class'][] = $instance['overlay_settings']['flex_v'];

		// transition
		if (defined('ECHELONSO_PRIME')) {
			if ( empty($instance['overlay_settings']['transition_children']) ) {
				(empty($instance['overlay']['transition'])) ?: $return['wrap_class'][] = 'uk-transition-toggle';
				(empty($instance['overlay']['transition'])) ?: $return['overlay_class'][] = $instance['overlay']['transition'];
			} else {
				(empty($instance['overlay_settings']['transition_children'])) ?: $return['wrap_class'][] = 'uk-transition-toggle';
			}
		}

		return $return;
	}

	/*
	* Less Variables
	*/

	function get_less_variables($instance) {

		$return = array();

		if ( isset($instance['overlay_settings']) ) {
			$return['overlay_color'] = !empty( $instance['overlay_settings']['overlay_color'] ) ? $instance['overlay_settings']['overlay_color'] : false;
			$return['overlay_hover_color'] = !empty( $instance['overlay_settings']['overlay_hover_color'] ) ? $instance['overlay_settings']['overlay_hover_color'] : false;
		}

		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		$return['overlay'] = EsoWidgetFormCorePart::section('Settings', array(
			'template' => EsoWidgetFormCorePart::select('Template', '', 'default', array(
				'default' => __('Overlay', EsoWidgetFormPart::text_domain()),
				'transition' => __('Overlay & Transition' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormPart::text_domain())
			), array(

			), array(
				'callback' => 'select',
				'args' => array( 'template' )
			)),
			'transition' => EsoWidgetFormPart::uikit('transition', 'Transition' . EsoWidgetFormPart::prime_tag(), 'Display the Overlay Content using this transition when hovered or focused.' . EsoWidgetFormPart::exclusive('Transition Children'), '0', array(
				'template[transition]' => array( 'show' ),
				'_else[template]' => array( 'hide' ),
			)),
			'content' => EsoWidgetFormCorePart::builder('Base Content', 'The content that is visible as the background.'),
			'overlay_content' => EsoWidgetFormCorePart::builder('Overlay Content', 'The content that is visible as the foreground in the voerlay.'),
		));

		$return['overlay_settings'] = EsoWidgetFormCorePart::section('Overlay', array(
			'overlay_color' => EsoWidgetFormPart::rgba('Color', 'The background color for the overlay.', EsoWidgetFormPart::default_color('overlay')),
			'overlay_hover_color' => EsoWidgetFormPart::rgba('Hover Color', 'The background color for the overlay when hovered or focused.', EsoWidgetFormPart::default_color('overlay_hover')),
			'position' => EsoWidgetFormPart::uikit('position', '', '', 'uk-position-bottom', array(), array(
				'callback' => 'select',
				'args' => array('position')
			)),
			'position_size' => EsoWidgetFormPart::uikit('position_size'),
			'padding_remove' => EsoWidgetFormCorePart::select('Remove Padding', 'Remove the internal padding added to the overlay content.', '0', array(
				'0' => __('No', EsoWidgetFormPart::text_domain()),
				'uk-padding-remove' => __('Yes', EsoWidgetFormPart::text_domain()),
			)),
			'width' => EsoWidgetFormPart::uikit('width'),
			'flex_v' => EsoWidgetFormPart::uikit('flex_v', '', '', '0', array(
				'position[uk-position-cover]' => array( 'show' ),
				'_else[position]' => array( 'hide' ),
			)),
			'flex_h' => EsoWidgetFormPart::uikit('flex_h', '', '', '0', array(
				'position[uk-position-cover]' => array( 'show' ),
				'_else[position]' => array( 'hide' ),
			)),
			'transition_children' => EsoWidgetFormPart::binary('Transition Children', 'Toggle transitions on the overlays child widgets only. Some child widgets support transitions natively, other can use the Hover Transition Feature.' . EsoWidgetFormPart::important(), '0', 'Yes', 'No')
		));

		return $return;

	}

	/*
	* Instance modifications
	* The form changes over time
	*/

	function modify_instance( $instance )  {
		// update 2.1.0
		if ( isset( $instance['modifiers']['transition'] ) ) {
			$instance['overlay']['transition'] = $instance['modifiers']['transition'];
			unset($instance['modifiers']['transition']);
		}
		if ( isset( $instance['modifiers']['position'] ) ) {
			$instance['overlay_settings']['position'] = $instance['modifiers']['position'];
			unset($instance['modifiers']['position']);
		}
		if ( isset( $instance['modifiers']['position_size'] ) ) {
			$instance['overlay_settings']['position_size'] = $instance['modifiers']['position_size'];
			unset($instance['modifiers']['position_size']);
		}
		if ( isset( $instance['modifiers']['padding'] ) ) {
			$instance['overlay_settings']['padding_remove'] = $instance['modifiers']['padding'];
			unset($instance['modifiers']['padding']);
		}
		if ( isset( $instance['modifiers']['width'] ) ) {
			$instance['overlay_settings']['width'] = $instance['modifiers']['width'];
			unset($instance['modifiers']['width']);
		}
		if ( isset( $instance['modifiers']['horizontal'] ) ) {
			$instance['overlay_settings']['flex_h'] = $instance['modifiers']['horizontal'];
			unset($instance['modifiers']['horizontal']);
		}
		if ( isset( $instance['modifiers']['vertical'] ) ) {
			$instance['overlay_settings']['flex_v'] = $instance['modifiers']['vertical'];
			unset($instance['modifiers']['vertical']);
		}
		if ( isset( $instance['modifiers']['transition_toggle'] ) ) {
			$instance['overlay_settings']['transition_children'] = $instance['modifiers']['transition_toggle'];
			unset($instance['modifiers']['transition_toggle']);
		}
		// end 2.1.0
		return $instance;
	}

}

siteorigin_widget_register('echelonso-eso-overlay', __FILE__, 'EchelonSOEsoOverlay');
