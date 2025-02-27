<?php

/*
Widget Name: E: Reuse Layout
Description: Display the content from a reusable layout.
Author: Echelon
Author URI: https://echelonso.com
*/


class EchelonSOEsoReuseLayout extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-reuse-layout',
			__('E: Reuse Layout', 'echelon-so'),
			array(
				'description' => __('Display the content from an Echelon layout.', 'echelon-so' ),
				'panels_groups' => array('eso'),
			),
			false,
			array(),
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form() {

		$return['option'] = EsoWidgetFormCorePart::section('Settings', array(
			'layout' => EsoWidgetFormCorePart::select('Layout', 'Choose which Echelon Layout to get the content from.', '0', EsoWidgetFormPart::get_layout_select_options())
		));

		return $return;
	}

}


siteorigin_widget_register('echelonso-eso-reuse-layout', __FILE__, 'EchelonSOEsoReuseLayout');
