<?php

/*
Widget Name: E: Button
Description: Globally styled square, round and pill buttons.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/button/
*/

class EchelonSOEsoButton extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-button',
			__('E: Button', 'echelon-so'),
			array(
				'description' => __('Globally styled square, round and pill buttons.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/button/',
				'panels_groups' => array('eso'),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template Name
	*/

	function get_template_name($instance) {
		$allowed_templates = array('default', 'text', 'link');
		if ( in_array($instance['button']['template'], $allowed_templates) ) {
			return $instance['button']['template'];
		} else {
			return 'default';
		}
	}

	/*
	* Template Name
	*/

	function get_style_name($instance) {
		$allowed_templates = array('default', 'label');
		if ( in_array($instance['button']['template'], $allowed_templates) ) {
			return 'default';
		} else {
			return 'link_text';
		}
	}

	/*
	* Template File Variables
	*/

	function get_template_variables( $instance, $args ) {

		$return['text'] = !empty($instance['button']['text']) ? $instance['button']['text'] : '';
		$return['label'] = !empty($instance['button']['label']) ? $instance['button']['label'] : '';
		$return['target'] = !empty($instance['button']['target']) ? sow_esc_url($instance['button']['target']) : '';

		$return['button_class'] = array();
		(empty($instance['button_appearance']['button_size'])) ?: $return['button_class'][] = $instance['button_appearance']['button_size'];
		(empty($instance['button_appearance']['text_transform'])) ?: $return['button_class'][] = $instance['button_appearance']['text_transform'];
		if ( $instance['button']['template'] == 'default' || $instance['button']['template'] == 'label' ) {
			(empty($instance['button_appearance']['width'])) ?: $return['wrap_class'][] = $instance['button_appearance']['width'];
			(empty($instance['button_appearance']['line_height'])) ?: $return['button_class'][] = $instance['button_appearance']['line_height'];
		}
		if ( $instance['button']['template'] == 'default' || $instance['button']['template'] == 'label' ) {
			(empty($instance['button_appearance']['width'])) ?: $return['button_class'][] = $instance['button_appearance']['width'];
		}
		(empty($instance['button_appearance']['border_radius'])) ?: $return['button_class'][] = $instance['button_appearance']['border_radius'];
		(empty($instance['button_appearance']['font_weight'])) ?: $return['button_class'][] = $instance['button_appearance']['font_weight'];

		$return['wrap_class'] = array();
		(empty($instance['button_appearance']['align'])) ?: $return['wrap_class'][] = $instance['button_appearance']['align'];
		if ( $instance['button']['template'] == 'default' || $instance['button']['template'] == 'label' ) {
			(empty($instance['button_appearance']['width'])) ?: $return['wrap_class'][] = $instance['button_appearance']['width'];
		}

		$return['label_class'] = array();
		(empty($instance['label_appearance']['text_transform'])) ?: $return['label_class'][] = $instance['label_appearance']['text_transform'];
		(empty($instance['label_appearance']['font_weight'])) ?: $return['label_class'][] = $instance['label_appearance']['font_weight'];
		(empty($instance['label_appearance']['border_radius'])) ?: $return['label_class'][] = $instance['label_appearance']['border_radius'];

		return $return;
	}

	/*
	* Less Variables
	*/

	function get_less_variables($instance) {

		$return = array();

		if ( isset( $instance['button_appearance']['font'] ) ) {
			$button_font = siteorigin_widget_get_font( $instance['button_appearance']['font'] );
			if ( !empty($button_font) ) {
				$return['button_font'] = $button_font['family'];
			}
			if ( !empty( $button_font['weight'] ) ) {
				$return['button_font_weight'] = $button_font['weight'];
			}
		}

		if ( isset( $instance['label_appearance']['font'] ) ) {
			$label_font = siteorigin_widget_get_font( $instance['label_appearance']['font'] );
			if ( !empty($label_font) ) {
				$return['label_font'] = $label_font['family'];
			}
			if ( !empty( $label_font['weight'] ) ) {
				$return['label_font_weight'] = $label_font['weight'];
			}
		}

		if ( isset($instance['button_appearance']) ) {
			$return['button_background_color'] = !empty( $instance['button_appearance']['background_color'] ) ? $instance['button_appearance']['background_color'] : false;
			$return['button_background_hover_color'] = !empty( $instance['button_appearance']['background_hover_color'] ) ? $instance['button_appearance']['background_hover_color'] : false;
			$return['button_text_color'] = !empty( $instance['button_appearance']['text_color'] ) ? $instance['button_appearance']['text_color'] : false;
			$return['button_text_hover_color'] = !empty( $instance['button_appearance']['text_hover_color'] ) ? $instance['button_appearance']['text_hover_color'] : false;
			$return['button_border_color'] = !empty( $instance['button_appearance']['border_color'] ) ? $instance['button_appearance']['border_color'] : false;
			$return['button_border_hover_color'] = !empty( $instance['button_appearance']['border_hover_color'] ) ? $instance['button_appearance']['border_hover_color'] : false;
			$return['button_border_width'] = !empty( $instance['button_appearance']['border_width'] ) ? $instance['button_appearance']['border_width'] : false;
			$return['button_font_size'] = !empty( $instance['button_appearance']['font_size'] ) ? $instance['button_appearance']['font_size'] : false;
			$return['button_letter_spacing'] = !empty( $instance['button_appearance']['letter_spacing'] ) ? $instance['button_appearance']['letter_spacing'] : false;
		}

		if ( isset($instance['label_appearance']) ) {
			$return['label_background_color'] = !empty( $instance['label_appearance']['background_color'] ) ? $instance['label_appearance']['background_color'] : false;
			$return['label_background_hover_color'] = !empty( $instance['label_appearance']['background_hover_color'] ) ? $instance['label_appearance']['background_hover_color'] : false;
			$return['label_text_color'] = !empty( $instance['label_appearance']['text_color'] ) ? $instance['label_appearance']['text_color'] : false;
			$return['label_text_hover_color'] = !empty( $instance['label_appearance']['text_hover_color'] ) ? $instance['label_appearance']['text_hover_color'] : false;
			$return['label_border_color'] = !empty( $instance['label_appearance']['border_color'] ) ? $instance['label_appearance']['border_color'] : false;
			$return['label_border_hover_color'] = !empty( $instance['label_appearance']['border_hover_color'] ) ? $instance['label_appearance']['border_hover_color'] : false;
			$return['label_font_size'] = !empty( $instance['label_appearance']['font_size'] ) ? $instance['label_appearance']['font_size'] : false;
			$return['label_inner_padding'] = !empty( $instance['label_appearance']['inner_padding'] ) ? $instance['label_appearance']['inner_padding'] : false;
			$return['label_letter_spacing'] = !empty( $instance['label_appearance']['letter_spacing'] ) ? $instance['label_appearance']['letter_spacing'] : false;
		}

		return $return;
	}

	/*
	* Google Font
	*/

	function less_import_button_font( $instance, $args ) {
		if ( isset($instance['button_appearance']['font']) ) {
			$selected_font = siteorigin_widget_get_font( $instance['button_appearance']['font'] );
			if (!empty($selected_font['css_import'])) {
				return $selected_font['css_import'];
			} else {
				return false;
			}
		}
		return false;
	}

	function less_import_label_font( $instance, $args ) {
		if ( isset($instance['label_font']['font']) ) {
			$selected_font = siteorigin_widget_get_font( $instance['label_font']['font'] );
			if (!empty($selected_font['css_import'])) {
				return $selected_font['css_import'];
			} else {
				return false;
			}
		}
		return false;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		$return['button'] = EsoWidgetFormCorePart::section('Settings', array(
			'template' => EsoWidgetFormCorePart::select('Template', 'Choose a template for the button layout.', 'default', array(
				'default' => __('Standard Button', EsoWidgetFormPart::text_domain()),
				'label' => __('Standard With Label' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormPart::text_domain()),
				'text' => __('Text Button', EsoWidgetFormPart::text_domain()),
				'link' => __('Link Button', EsoWidgetFormPart::text_domain()),
			), array(

			), array(
				'callback' => 'select',
				'args' => array('template')
			)),
			'text' => EsoWidgetFormCorePart::text('Button Text', 'The text to use for the button.', 'My Button'),
			'label' => EsoWidgetFormCorePart::text('Label Text' . EsoWidgetFormPart::prime_tag(), 'The text to use for the buttons label.', 'My Label', array(
				'template[label]' => array( 'show' ),
				'_else[template]' => array( 'hide' ),
			)),
			'target' => EsoWidgetFormCorePart::link('Destination URL', 'Where the button takes you when clicked.'),
		));

		$return['button_appearance'] = EsoWidgetFormCorePart::section('Button Appearance', array(
			'font' => EsoWidgetFormCorePart::font('Font'),
			'background_color' => EsoWidgetFormPart::rgba('Background Color', '', EsoWidgetFormPart::get_legacy_color('global-primary-background'), array(
				'template[text]' => array('hide'),
				'template[link]' => array('hide'),
				'_else[template]' => array('show')
			)),
			'background_hover_color' => EsoWidgetFormPart::rgba('Background Hover Color', '', EsoWidgetFormPart::get_legacy_color('global-primary-background'), array(
				'template[text]' => array('hide'),
				'template[link]' => array('hide'),
				'_else[template]' => array('show')
			)),
			'text_color' => EsoWidgetFormCorePart::color('Text Color', '', EsoWidgetFormPart::get_legacy_color('global-inverse-color')),
			'text_hover_color' => EsoWidgetFormCorePart::color('Text Hover Color', '', EsoWidgetFormPart::get_legacy_color('global-inverse-color'), array(
				'template[text]' => array('hide'),
				'template[link]' => array('hide'),
				'_else[template]' => array('show')
			)),
			'border_color' => EsoWidgetFormPart::rgba('Border Color', '', EsoWidgetFormPart::get_legacy_color('global-primary-background'), array(
				'template[text]' => array('hide'),
				'template[link]' => array('hide'),
				'_else[template]' => array('show')
			)),
			'border_hover_color' => EsoWidgetFormPart::rgba('Border Hover Color', '', EsoWidgetFormPart::get_legacy_color('global-primary-background'), array(
				'template[text]' => array('hide'),
				'template[link]' => array('hide'),
				'_else[template]' => array('show')
			)),
			'letter_spacing' => EsoWidgetFormCorePart::measurement('Letter Spacing', 'Adjust the buttons letter spacing.', ''),
			'font_size' => EsoWidgetFormCorePart::measurement('Font Size', 'The font size for the text, used with link and text button templates.', '20px', array(
				'template[text]' => array('show'),
				'template[link]' => array('show'),
				'_else[template]' => array('hide')
			)),
			'button_size' => EsoWidgetFormPart::uikit('button_size', '', '', '0', array(
				'template[text]' => array('hide'),
				'template[link]' => array('hide'),
				'_else[template]' => array('show')
			)),
			'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight', '', '', '0', array(
				'template[text]' => array('hide'),
				'template[link]' => array('hide'),
				'_else[template]' => array('show')
			)),
			'width' => EsoWidgetFormPart::uikit('width', '', '', '0', array(
				'template[text]' => array('hide'),
				'template[link]' => array('hide'),
				'_else[template]' => array('show')
			)),
			'border_radius' => EsoWidgetFormPart::uikit('border_radius', '', '', '0', array(
				'template[text]' => array('hide'),
				'template[link]' => array('hide'),
				'_else[template]' => array('show')
			)),
			'border_width' => EsoWidgetFormCorePart::measurement('Border Width', 'The width for the buttons border.', '1px', array(
				'template[text]' => array('hide'),
				'template[link]' => array('hide'),
				'_else[template]' => array('show')
			)),
			'align' => EsoWidgetFormPart::uikit('align'),
			'line_height' => EsoWidgetFormPart::uikit('line_height'),
		));

		$return['label_appearance'] = EsoWidgetFormCorePart::section('Label Appearance', array(
			'font' => EsoWidgetFormCorePart::font('Font'),
			'background_color' => EsoWidgetFormPart::rgba('Background Color', '', EsoWidgetFormPart::default_color('secondary')),
			'background_hover_color' => EsoWidgetFormPart::rgba('Background Hover Color', '', EsoWidgetFormPart::default_color('secondary')),
			'text_color' => EsoWidgetFormCorePart::color('Text Color', '', EsoWidgetFormPart::default_color('inverse')),
			'text_hover_color' => EsoWidgetFormCorePart::color('Text Hover Color', '', EsoWidgetFormPart::default_color('inverse')),
			'border_color' => EsoWidgetFormPart::rgba('Border Color', '', EsoWidgetFormPart::default_color('secondary')),
			'border_hover_color' => EsoWidgetFormPart::rgba('Border Hover Color', '', EsoWidgetFormPart::default_color('secondary')),
			'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'border_radius' => EsoWidgetFormPart::uikit('border_radius'),
			'font_size' => EsoWidgetFormCorePart::measurement('Font Size', 'The font size for the label.', '15px'),
			'letter_spacing' => EsoWidgetFormCorePart::measurement('Letter Spacing', 'Adjust the buttons letter spacing.', ''),
			'inner_padding' => EsoWidgetFormCorePart::multi_measurement('Inner Padding', 'The inner padding for the label.', '5px 10px 5px 10px'),
		), array(
			'template[label]' => array( 'show' ),
			'_else[template]' => array( 'hide' ),
		));

		return $return;
	}

	/*
	* Instance modifications
	* The form changes over time
	*/

	function modify_instance( $instance )  {
		// update 2.1.0
		if ( isset( $instance['modifiers']['style'] ) ) {
			if ($instance['modifiers']['style'] == 'uk-button-text') {
				$instance['button']['template'] = 'text';
				$instance['button_appearance']['text_color'] = '#555555';
				$instance['button_appearance']['text_hover_color'] = '#555555';
				$instance['button_appearance']['font_size'] = '16px';
			}
			if ($instance['modifiers']['style'] == 'uk-button-link') {
				$instance['button']['template'] = 'link';
				$instance['button_appearance']['text_color'] = '#555555';
				$instance['button_appearance']['text_hover_color'] = '#555555';
				$instance['button_appearance']['font_size'] = '16px';
			}
			unset($instance['modifiers']['style']);
		}
		if ( isset( $instance['modifiers']['size'] ) ) {
			$instance['button_appearance']['button_size'] = $instance['modifiers']['size'];
			unset($instance['modifiers']['size']);
		}
		if ( isset( $instance['modifiers']['transform'] ) ) {
			$instance['button_appearance']['text_transform'] = $instance['modifiers']['transform'];
			unset($instance['modifiers']['transform']);
		}
		if ( isset( $instance['modifiers']['weight'] ) ) {
			$instance['button_appearance']['font_weight'] = $instance['modifiers']['weight'];
			unset($instance['modifiers']['weight']);
		}
		if ( isset( $instance['modifiers']['width'] ) ) {
			$instance['button_appearance']['width'] = $instance['modifiers']['width'];
			unset($instance['modifiers']['width']);
		}
		if ( isset( $instance['modifiers']['radius'] ) ) {
			$instance['button_appearance']['border_radius'] = $instance['modifiers']['radius'];
			unset($instance['modifiers']['radius']);
		}
		if ( isset( $instance['modifiers']['align'] ) ) {
			$instance['button_appearance']['align'] = $instance['modifiers']['align'];
			unset($instance['modifiers']['align']);
		}
		if ( isset( $instance['modifiers']['label_weight'] ) ) {
			$instance['label_appearance']['font_weight'] = $instance['modifiers']['label_weight'];
			unset($instance['modifiers']['label_weight']);
		}
		// end 2.1.0
		return $instance;
	}

}

siteorigin_widget_register('echelonso-eso-button', __FILE__, 'EchelonSOEsoButton');
