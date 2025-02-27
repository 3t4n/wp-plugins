<?php

/*
Widget Name: E: Filter
Description: Masonry and grid content filters.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/filter/
*/

class EchelonSOEsoFilter extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-filter',
			__('E: Filter', 'echelon-so'),
			array(
				'description' => __('Masonry and grid content filters.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/filter/',
				'panels_groups' => array('eso'),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template Variables
	*/

	function get_template_variables($instance, $args) {
		$return['items'] = !empty( $instance['items'] ) ? $instance['items'] : '';
		$return['all'] = !empty( $instance['tags']['all'] ) ? $instance['tags']['all'] : 'ALL';

		$return['masonry'] = $instance['filter']['masonry'];

		$return['items_class'][] = 'eso';
		(empty($instance['filter']['col_width'])) ?: $return['items_class'][] = $instance['filter']['col_width'];
		(empty($instance['filter']['col_width_s'])) ?: $return['items_class'][] = $instance['filter']['col_width_s'];
		(empty($instance['filter']['col_width_m'])) ?: $return['items_class'][] = $instance['filter']['col_width_m'];
		(empty($instance['filter']['col_width_l'])) ?: $return['items_class'][] = $instance['filter']['col_width_l'];
		(empty($instance['filter']['grid'])) ?: $return['items_class'][] = $instance['filter']['grid'];

		$return['nav_class'][] = 'eso';
		(empty($instance['tags']['flex_h'])) ?: $return['nav_class'][] = $instance['tags']['flex_h'];
		(empty($instance['tags']['font_weight'])) ?: $return['nav_class'][] = $instance['tags']['font_weight'];

		$return['tag_class'][] = 'eso';
		(empty($instance['tags']['border_radius'])) ?: $return['tag_class'][] = $instance['tags']['border_radius'];

		// lightbox
		$return['lightbox'] = '';
		(empty($instance['filter']['lightbox'])) ?: $return['lightbox'] = 'uk-lightbox';

		return $return;
	}


	/*
	* Less Variables
	*/

	function get_less_variables($instance) {
		$less_vars = array();
		$less_vars['padding'] = isset( $instance['tags']['padding'] ) ? $instance['tags']['padding'] : false;
		$less_vars['active_background'] = isset( $instance['tags']['active_background'] ) ? $instance['tags']['active_background'] : false;
		$less_vars['active_text'] = isset( $instance['tags']['active_text'] ) ? $instance['tags']['active_text'] : false;
		$less_vars['inactive_background'] = isset( $instance['tags']['inactive_background'] ) ? $instance['tags']['inactive_background'] : false;
		$less_vars['inactive_hover_background'] = isset( $instance['tags']['inactive_hover_background'] ) ? $instance['tags']['inactive_hover_background'] : false;
		$less_vars['inactive_text'] = isset( $instance['tags']['inactive_text'] ) ? $instance['tags']['inactive_text'] : false;
		$less_vars['inactive_hover_text'] = isset( $instance['tags']['inactive_hover_text'] ) ? $instance['tags']['inactive_hover_text'] : false;
		$less_vars['font_size'] = isset( $instance['tags']['font_size'] ) ? $instance['tags']['font_size'] : false;
		$less_vars['letter_spacing'] = isset( $instance['tags']['letter_spacing'] ) ? $instance['tags']['letter_spacing'] : false;
		return $less_vars;
	}



	/*
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so_modifiers;

		$return['items'] = EsoWidgetFormCorePart::repeater('Items', '', 'Filter Item', array(
			'content' => EsoWidgetFormCorePart::builder('Content', 'Build the content for this filterbale item.'),
			'tag' => EsoWidgetFormCorePart::text('Tag', 'Tags are automatically collated to create the Nav. To link items give them the same tag.')
		));

		$return['filter'] = EsoWidgetFormCorePart::section('Settings', array(
			'lightbox' => EsoWidgetFormCorePart::select('Lightbox', 'Setting this will allow the Filter to work with Lightbox Component widgets.', '0', array(
				'0' => __('-', 'echelon-so'),
				'slide' => __('Slide', 'echelon-so'),
			)),
			'col_width' => EsoWidgetFormPart::uikit('child_width_int', 'Columns on Small Screens', 'Divide the filter into this many columns on small screens.', 'uk-child-width-1-1'),
			'col_width_s' => EsoWidgetFormPart::uikit('child_width_s_int', 'Columns Above Small Screens', 'Divide the filter into this many columns on screens above small.', 'uk-child-width-1-2@s'),
			'col_width_m' => EsoWidgetFormPart::uikit('child_width_m_int', 'Columns Above Medium Screens', 'Divide the filter into this many columns on screens above medium.', 'uk-child-width-1-3@m'),
			'col_width_l' => EsoWidgetFormPart::uikit('child_width_l_int', 'Columns Above Large Screens', 'Divide the filter into this many columns on screens above large.', 'uk-child-width-1-3@l'),
			'grid' => EsoWidgetFormPart::uikit('grid', 'Spacing'),
			'masonry' => EsoWidgetFormPart::binary('Masonry', 'Use a masonry layout for the filter.', '0', 'Yes', 'No'),
		));

		$return['tags'] = EsoWidgetFormCorePart::section('Tag Appearance', array(
			'all' => EsoWidgetFormCorePart::text('Reset Label', 'The text to use for the tag that resets the filter.', 'ALL'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'font_size' => EsoWidgetFormCorePart::measurement('Font Size', 'Adjust the font size of the tags.', '15px'),
			'letter_spacing' => EsoWidgetFormCorePart::measurement('Font Size', 'Adjust the letter spacing of the tags.', '1px'),
			'border_radius' => EsoWidgetFormPart::uikit('border_radius'),
			'flex_h' => EsoWidgetFormPart::uikit('flex_h', 'Tag Alignment', 'How to align the tags.'),
			'padding' => EsoWidgetFormCorePart::multi_measurement('Padding', 'Adjust the padding around each tag.', '5px 10px 5px 10px'),
			'active_background' => EsoWidgetFormPart::rgba('Active Background', 'The background color for the active tag.', '#000000'),
			'active_text' => EsoWidgetFormCorePart::color('Active Text', 'The text color for the active tag.', '#ffffff'),
			'inactive_background' => EsoWidgetFormPart::rgba('Inactive Background', 'The background color for the inactive tags.', ''),
			'inactive_hover_background' => EsoWidgetFormPart::rgba('Inactive Hover Background', 'The background color for the inactive tags when hovered.', ''),
			'inactive_text' => EsoWidgetFormPart::rgba('Inactive Text', 'The text color for inactive tags.', ''),
			'inactive_hover_text' => EsoWidgetFormPart::rgba('Inactive Hover Text', 'The text color for inactive tags when hovered.', ''),
		));

		return $return;

	}

	/*
	* Instance modifications
	* The form changes over time
	*/

	function modify_instance( $instance )  {
		// update 2.1.0
		if ( isset( $instance['modifiers']['child_width'] ) ) {
			$instance['filter']['child_width'] = $instance['modifiers']['child_width'];
			unset($instance['modifiers']['child_width']);
		}
		if ( isset( $instance['modifiers']['col_width_s'] ) ) {
			$instance['filter']['col_width_s'] = $instance['modifiers']['col_width_s'];
			unset($instance['modifiers']['col_width_s']);
		}
		if ( isset( $instance['modifiers']['col_width_m'] ) ) {
			$instance['filter']['col_width_m'] = $instance['modifiers']['col_width_m'];
			unset($instance['modifiers']['col_width_m']);
		}
		if ( isset( $instance['modifiers']['col_width_l'] ) ) {
			$instance['filter']['col_width_l'] = $instance['modifiers']['col_width_l'];
			unset($instance['modifiers']['col_width_l']);
		}
		if ( isset( $instance['modifiers']['grid'] ) ) {
			$instance['filter']['grid'] = $instance['modifiers']['grid'];
			unset($instance['modifiers']['grid']);
		}
		if ( isset( $instance['modifiers']['masonry'] ) ) {
			$instance['filter']['masonry'] = $instance['modifiers']['masonry'];
			unset($instance['modifiers']['masonry']);
		}
		// end 2.1.0
		return $instance;
	}

}

siteorigin_widget_register('echelonso-eso-filter', __FILE__, 'EchelonSOEsoFilter');
