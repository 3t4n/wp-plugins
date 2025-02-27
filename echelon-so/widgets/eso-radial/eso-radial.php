<?php

/*
Widget Name: E: Radial
Description: A Radial progress bar or odometer.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/radial/
*/

class EchelonSOEsoRadial extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-radial',
			__('E: Radial', 'echelon-so'),
			array(
				'description' => __('A radial progress bar or odometer.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/radial/',
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
		return $instance['radial']['template'];
	}

	/*
	* Template Variables
	*/

	function get_template_variables($instance, $args) {
		// content
		$return['int_id'] = 'ra_' . uniqid(rand(1,9999));
		$return['animate'] = !empty($instance['radial']['animate']) ? true : false;

		if (!$return['animate']) {
			$circumference = 2 * M_PI * 35;
			$return['strokeDashOffset'] = $circumference - ((absint($instance['radial']['percent']) * $circumference) / 100);
			$return['trigger_distance'] = 0;
		} else {
			$return['strokeDashOffset'] = 219.91148575129;
			$return['trigger_distance'] = absint($instance['radial']['trigger_distance']);
		}

		$return['percent'] = absint($instance['radial']['percent']);
		$return['line_cap'] = $instance['radial']['line_cap'];

		// icon
		$return['icon'] = $instance['radial']['icon'];
		$return['icon_styles'][] = !empty($instance['radial']['icon_color']) ? 'color: ' . $instance['radial']['icon_color'] : 'inherit';
		$return['icon_styles'][] = !empty($instance['radial']['icon_size']) ? 'font-size: ' . $instance['radial']['icon_size'] : 'inherit';

		// title
		$return['title'] = !empty($instance['radial']['title']) ? $instance['radial']['title'] : '';
		$return['title_class'] = array();
		$return['title_class'][] = !empty($instance['radial']['title_size']) ? $instance['radial']['title_size'] : '';

		return $return;

	}

	/*
	* Style Variables
	*/

	function get_less_variables($instance) {
		$return['radial_width'] = absint($instance['radial']['radial_width']) . '%';
		$return['line_width'] = absint($instance['radial']['line_width']);
		$return['rotation'] = 'rotate(' . intval($instance['radial']['rotation']) . 'deg)';
		$return['line_color'] = $instance['radial']['line_color'];
		$return['track_color'] = $instance['radial']['track_color'];
		return $return;
	}


	/*
	* Widget form
	*/

	function get_widget_form() {

		global $echelon_so_modifiers;

		$return['radial'] = EsoWidgetFormCorePart::section('Settings', array(
			'template' => EsoWidgetFormCorePart::select('Template', 'Choose which template to use.', 'default', array(
				'default' => __( 'Text', EsoWidgetFormPart::text_domain() ),
				'icon' => __( 'Icon', EsoWidgetFormPart::text_domain() ),
			), array(

			), array(
				'callback' => 'select',
				'args' => array( 'template' )
			)),
			'icon' => EsoWidgetFormCorePart::icon('Icon', 'The icon to use.', false, array(
				'template[icon]' => array( 'show' ),
				'_else[template]' => array( 'hide' ),
			)),
			'icon_color' => EsoWidgetFormCorePart::color('Icon Color', 'The color to use for the icon.', EsoWidgetFormPart::default_color('primary'), array(
				'template[icon]' => array( 'show' ),
				'_else[template]' => array( 'hide' ),
			)),
			'icon_size' => EsoWidgetFormCorePart::measurement('Icon Size', 'The size to use for the icon.', '40px', array(
				'template[icon]' => array( 'show' ),
				'_else[template]' => array( 'hide' ),
			)),
			'title' => EsoWidgetFormCorePart::text('Title Text', 'The text to use inside the radial.', '', array(
				'template[default]' => array( 'show' ),
				'_else[template]' => array( 'hide' ),
			)),
			'title_size' => EsoWidgetFormPart::uikit('font_size', '', '', '0', array(
				'template[default]' => array( 'show' ),
				'_else[template]' => array( 'hide' ),
			)),
			'radial_width' => EsoWidgetFormCorePart::slider('Radial Width (%)', 'The width of the raidal relative to its cell.', 100, 10, 100, true),
			'percent' => EsoWidgetFormCorePart::slider('Radial Percent', 'How much to fill the radials track with the line.', 50, 1, 100, true),
			'line_width' => EsoWidgetFormCorePart::slider('Line Width', 'How thick to make the radials line.', 3, 1, 20, true),
			'rotation' => EsoWidgetFormCorePart::slider('Line Rotation', 'Move the line around the track in degrees.', -90, -360, 360, false),
			'line_color' => EsoWidgetFormCorePart::color('Line Color', 'The color for the radials line.', EsoWidgetFormPart::default_color('primary')),
			'track_color' => EsoWidgetFormCorePart::color('Track Color', 'The color for the radials track.', EsoWidgetFormPart::default_color('light_grey')),
			'line_cap' => EsoWidgetFormCorePart::select('Line Cap', 'How to cap the ends of the line.', 'round', array(
				'round' => __( 'Round', EsoWidgetFormPart::text_domain() ),
				'square' => __( 'Square', EsoWidgetFormPart::text_domain() ),
				'butt' => __( 'Butt', EsoWidgetFormPart::text_domain() )
			)),
			'animate' => EsoWidgetFormPart::binary('Animation', 'Animate the line along the track.', '0', 'Yes', 'No', array(

			), array(
				'callback' => 'select',
				'args' => array( 'animate' )
			)),
			'trigger_distance' => EsoWidgetFormCorePart::number('Animation Inview Offset (px)', 'How far the radial needs to be inview before the animation if toggled.', 300, array(
				'animate[0]' => array('hide'),
				'animate[1]' => array('show'),
			))
		));

		return $return;

	}

}

siteorigin_widget_register('echelonso-eso-radial', __FILE__, 'EchelonSOEsoRadial');
