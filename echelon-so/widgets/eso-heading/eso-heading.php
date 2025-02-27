<?php

/*
Widget Name: E: Heading
Description: Various section heading styles.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/heading/
*/

class EchelonSOEsoHeading extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-heading',
			__('E: Heading', 'echelon-so'),
			array(
				'description' => __('Various section heading styles.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/heading/',
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

	function get_template_variables( $instance, $args ) {

		$return['heading'] = !empty($instance['heading']['heading']) ? $instance['heading']['heading'] : '';
		$return['sub_heading'] = !empty($instance['sub_heading']['heading']) ? $instance['sub_heading']['heading'] : '';

		$return['heading_class'][] = 'eso-heading';
		(empty($instance['heading']['font_size'])) ?: $return['heading_class'][] = $instance['heading']['font_size'];
		(empty($instance['heading']['font_weight'])) ?: $return['heading_class'][] = $instance['heading']['font_weight'];
		(empty($instance['heading']['text_transform'])) ?: $return['heading_class'][] = $instance['heading']['text_transform'];
		(empty($instance['heading']['text_align'])) ?: $return['heading_class'][] = $instance['heading']['text_align'];
		(empty($instance['heading']['line_height'])) ?: $return['heading_class'][] = $instance['heading']['line_height'];

		$return['sub_heading_class'][] = 'eso-sub-heading';
		(empty($instance['sub_heading']['font_size'])) ?: $return['sub_heading_class'][] = $instance['sub_heading']['font_size'];
		(empty($instance['sub_heading']['font_weight'])) ?: $return['sub_heading_class'][] = $instance['sub_heading']['font_weight'];
		(empty($instance['sub_heading']['text_transform'])) ?: $return['sub_heading_class'][] = $instance['sub_heading']['text_transform'];
		(empty($instance['sub_heading']['text_align'])) ?: $return['sub_heading_class'][] = $instance['sub_heading']['text_align'];
		(empty($instance['sub_heading']['line_height'])) ?: $return['heading_class'][] = $instance['sub_heading']['line_height'];

		return $return;

	}

	/*
	* Less Variables
	*/

	function get_less_variables($instance) {

		if ( $instance['heading']['font'] != 'default' ) {
			$font = siteorigin_widget_get_font( $instance['heading']['font'] );
			$less_vars['heading_font'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$less_vars['heading_font_weight'] = $font['weight'];
			}
		}

		if ( $instance['sub_heading']['font'] != 'default' ) {
			$font = siteorigin_widget_get_font( $instance['sub_heading']['font'] );
			$less_vars['sub_heading_font'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$less_vars['sub_heading_font_weight'] = $font['weight'];
			}
		}

		$less_vars['heading_color'] = !empty( $instance['heading']['color'] ) ? $instance['heading']['color'] : false;
		$less_vars['heading_letter_spacing'] = !empty( $instance['heading']['letter_spacing'] ) ? $instance['heading']['letter_spacing'] : false;
		$less_vars['sub_heading_color'] = !empty( $instance['sub_heading']['color'] ) ? $instance['sub_heading']['color'] : false;
		$less_vars['sub_heading_letter_spacing'] = !empty( $instance['sub_heading']['letter_spacing'] ) ? $instance['sub_heading']['letter_spacing'] : false;

		if ( $instance['settings']['template'] == 'bullet' ) {
			$less_vars['bullet_color'] = !empty( $instance['line_bullet']['bullet_color'] ) ? $instance['line_bullet']['bullet_color'] : false;
			$less_vars['bullet_height'] = !empty( $instance['line_bullet']['bullet_height'] ) ? $instance['line_bullet']['bullet_height'] : false;
			$less_vars['bullet_width'] = !empty( $instance['line_bullet']['bullet_width'] ) ? $instance['line_bullet']['bullet_width'] : false;
			$less_vars['bullet_margin'] = !empty( $instance['line_bullet']['bullet_margin'] ) ? $instance['line_bullet']['bullet_margin'] : false;
		}

		if ( $instance['settings']['template'] == 'divider' ) {
			$less_vars['line_color'] = !empty( $instance['line_bullet']['line_color'] ) ? $instance['line_bullet']['line_color'] : false;
			$less_vars['line_height'] = !empty( $instance['line_bullet']['line_height'] ) ? $instance['line_bullet']['line_height'] : false;
		}

		if ( $instance['settings']['template'] == 'line' ) {
			$less_vars['line_color'] = !empty( $instance['line_bullet']['line_color'] ) ? $instance['line_bullet']['line_color'] : false;
			$less_vars['line_width'] = !empty( $instance['line_bullet']['line_width'] ) ? $instance['line_bullet']['line_width'] : false;
		}

		return $less_vars;

	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		$return['settings'] = EsoWidgetFormCorePart::section('Settings',
		array(
			'template' => EsoWidgetFormCorePart::select('Template', '', 'default',
			array(
				'default' => __( 'Default', 'echelon-so' ),
				'bullet' => __( 'Bullet' . EsoWidgetFormPart::prime_tag(), 'echelon-so' ),
				'divider' => __( 'Divider' . EsoWidgetFormPart::prime_tag(), 'echelon-so' ),
				'line' => __( 'Line' . EsoWidgetFormPart::prime_tag(), 'echelon-so' ),
			), array(

			), array(
				'callback' => 'select',
				'args' => array( 'template' )
			))
		));

		$return['heading'] = EsoWidgetFormCorePart::section('Heading',
		array(
			'heading' => EsoWidgetFormCorePart::text('Text', 'The text for the heading.', 'My Heading'),
			'font' => EsoWidgetFormCorePart::font('Font', 'Use a font for the heading.'),
			'color' => EsoWidgetFormCorePart::color('Color', 'Change the color fo the heading.', EsoWidgetFormPart::default_color('darker_grey')),
			'letter_spacing' => EsoWidgetFormCorePart::measurement('Letter Spacing', 'Adjust the headings letter spacing.', ''),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
			'text_align' => EsoWidgetFormPart::uikit('text_align'),
			'line_height' => EsoWidgetFormPart::uikit('line_height'),
		));

		$return['sub_heading'] = EsoWidgetFormCorePart::section('Sub Heading' . EsoWidgetFormPart::prime_tag(),
		array(
			'heading' => EsoWidgetFormCorePart::text('Text', 'The text for the heading.', 'Sub Heading'),
			'font' => EsoWidgetFormCorePart::font('Font', 'Use a font for the heading.'),
			'color' => EsoWidgetFormCorePart::color('Color', 'Change the color of the heading.', EsoWidgetFormPart::default_color('primary')),
			'letter_spacing' => EsoWidgetFormCorePart::measurement('Letter Spacing', 'Adjust the sub headings letter spacing.', ''),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
			'text_align' => EsoWidgetFormPart::uikit('text_align'),
			'line_height' => EsoWidgetFormPart::uikit('line_height'),
		), array(
			'template[line]' => array( 'show' ),
			'_else[template]' => array( 'hide' ),
		));

		$return['line_bullet'] = EsoWidgetFormCorePart::section('Line & Bullet' . EsoWidgetFormPart::prime_tag(),
		array(
			'line_color' => EsoWidgetFormCorePart::color('Line Color', 'Change the color of the line.', EsoWidgetFormPart::default_color('light_grey'), array(
				'template[line]' => array( 'show' ),
				'template[divider]' => array( 'show' ),
				'_else[template]' => array( 'hide' ),
			)),
			'line_width' => EsoWidgetFormCorePart::measurement('Line Width', 'Change the width of the line.', '', array(
				'template[line]' => array( 'show' ),
				'_else[template]' => array( 'hide' ),
			)),
			'bullet_color' => EsoWidgetFormCorePart::color('Bullet Color', 'Change the color of the bullet.', EsoWidgetFormPart::default_color('light_grey'), array(
				'template[bullet]' => array( 'show' ),
				'_else[template]' => array( 'hide' ),
			)),
			'bullet_height' => EsoWidgetFormCorePart::measurement('Bullet Height', 'Change the height of the bullet.', '', array(
				'template[bullet]' => array( 'show' ),
				'_else[template]' => array( 'hide' ),
			)),
			'bullet_width' => EsoWidgetFormCorePart::measurement('Bullet Width', 'Change the width of the bullet.', '', array(
				'template[bullet]' => array( 'show' ),
				'_else[template]' => array( 'hide' ),
			)),
			'bullet_margin' => EsoWidgetFormCorePart::measurement('Bullet Spacing', 'Change the distance between the bullet and heading.', '', array(
				'template[bullet]' => array( 'show' ),
				'_else[template]' => array( 'hide' ),
			)),
		), array(
			'template[bullet]' => array( 'show' ),
			'template[divider]' => array( 'show' ),
			'template[line]' => array( 'show' ),
			'_else[template]' => array( 'hide' ),
		));

		return $return;

	}

	/*
	* Google Font
	*/

	function less_import_heading_font( $instance, $args ) {
		$selected_font = siteorigin_widget_get_font( $instance['heading']['font'] );
		if (!empty($selected_font['css_import'])) {
			return $selected_font['css_import'];
		} else {
			return false;
		}
	}

	function less_import_sub_heading_font( $instance, $args ) {
		$selected_font = siteorigin_widget_get_font( $instance['sub_heading']['font'] );
		if (!empty($selected_font['css_import'])) {
			return $selected_font['css_import'];
		} else {
			return false;
		}
	}

	/*
	* Instance modifications
	* The form changes over time
	*/

	function modify_instance( $instance )  {
		// update 2.1.0
		if ( isset($instance['heading']['template']) ) {
			$instance['settings']['template'] = $instance['heading']['template'];
			unset( $instance['heading']['template'] );
		}
		if ( isset($instance['modifiers']['size']) ) {
			$instance['heading']['font_size'] = $instance['modifiers']['size'];
			unset( $instance['modifiers']['size'] );
		}
		if ( isset($instance['modifiers']['weight']) ) {
			$instance['heading']['font_weight'] = $instance['modifiers']['weight'];
			unset( $instance['modifiers']['weight'] );
		}
		if ( isset($instance['modifiers']['transform']) ) {
			$instance['heading']['text_transform'] = $instance['modifiers']['transform'];
			unset( $instance['modifiers']['transform'] );
		}
		if ( isset($instance['modifiers']['alignment']) ) {
			$instance['heading']['text_align'] = $instance['modifiers']['alignment'];
			unset( $instance['modifiers']['alignment'] );
		}
		if ( isset($instance['modifiers']['inverse']) && !empty($instance['modifiers']['inverse']) ) {
			$instance['heading']['color'] = '#ffffff';
			unset( $instance['modifiers']['inverse'] );
		}
		// end 2.1.0
		return $instance;
	}

}

siteorigin_widget_register('echelonso-eso-heading', __FILE__, 'EchelonSOEsoHeading');
