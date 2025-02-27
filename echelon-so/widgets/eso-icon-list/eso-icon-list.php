<?php

/*
Widget Name: E: Icon List
Description: An icon based text list.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/icon-list/
*/

class EchelonSOEsoIconList extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-icon-list',
			__('E: Icon List', 'echelon-so'),
			array(
				'description' => __('An icon based text list.', 'echelon-so'),
				'help' => 'https://echelonso.com/widgets/icon-list/',
				'panels_groups' => array('eso'),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Tempalte Variables
	*/

	function get_template_variables($instance, $args) {

		// content
		if (!empty($instance['icon_list_items'])) {
			$return['list_items'] = $instance['icon_list_items'];
		} else {
			$return['list_items'] = false;
		}

		// modifiers
		$return['text_class'][] = 'eso';
		(empty($instance['modifiers']['font_size'])) ?: $return['text_class'][] = $instance['modifiers']['font_size'];

		$return['wrap_class'][] = 'eso';
		(empty($instance['modifiers']['align'])) ?: $return['wrap_class'][] = $instance['modifiers']['align'];

		$return['icon_size'] = !empty($instance['modifiers']['icon_size']) ? $instance['modifiers']['icon_size'] : '20px;';

		return $return;
	}

	/*
	* Tempalte Variables
	*/

	function get_widget_form() {

		global $echelon_so_modifiers;

		$return['icon_list_items'] = EsoWidgetFormCorePart::repeater('Icon List Items', '', 'List Item', array(
			'text' => EsoWidgetFormCorePart::text('Text'),
			'link_target' => EsoWidgetFormCorePart::link('Link Target'),
			'icon' => EsoWidgetFormCorePart::icon('Icon', 'Use an icon to this list item.' . EsoWidgetFormPart::exclusive('Image')),
			'image' => EsoWidgetFormCorePart::media('Image', 'Use an image for this list item. Always full image size.' . EsoWidgetFormPart::exclusive('Icon')),
			'text_color' => EsoWidgetFormCorePart::color('Text & Link Color', 'The color this items text.', EsoWidgetFormPart::default_color('darker_grey')),
			'icon_color' => EsoWidgetFormCorePart::color('Icon Color', 'The color for this items icon.' . EsoWidgetFormPart::exclusive('Image'), EsoWidgetFormPart::default_color('primary')),
		));

		$return['modifiers'] = EsoWidgetFormCorePart::section('Appearance', array(
			'align' => EsoWidgetFormPart::uikit('flex_h', 'Horizontal Alignment'),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'icon_size' => EsoWidgetFormCorePart::measurement('Icon Size', 'How big to make the icons.', '15px'),
		));

		return $return;
	}

	/*
	* Instance modifications
	* The form changes over time
	*/

	function modify_instance( $instance )  {
		// update 2.1.0
		if ( isset( $instance['icon_list']['items'] ) ) {
			$instance['icon_list_items'] = $instance['icon_list']['items'];
			unset($instance['icon_list']['items']);
		}
		// end 2.1.0
		return $instance;
	}

}

siteorigin_widget_register('echelonso-eso-icon-list', __FILE__, 'EchelonSOEsoIconList');
