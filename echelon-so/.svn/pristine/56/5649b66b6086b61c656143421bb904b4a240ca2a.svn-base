<?php

/*
Widget Name: E: Text
Description: Display text blocks in various sizes.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/text/
*/

class EchelonSOEsoText extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-text',
			__('E: Text', 'echelon-so'),
			array(
				'description' => __('Display text blocks in various sizes.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/text/',
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
		// global $echelon_so_modifiers;
		$return['text'] = !empty($instance['text']['text']) ? $instance['text']['text'] : '';

		$return['text_modifiers'] = array();
		(empty($instance['modifiers']['size'])) ?: $return['text_modifiers'][] = $instance['modifiers']['size'];
		(empty($instance['modifiers']['weight'])) ?: $return['text_modifiers'][] = $instance['modifiers']['weight'];
		(empty($instance['modifiers']['transform'])) ?: $return['text_modifiers'][] = $instance['modifiers']['transform'];
		(empty($instance['modifiers']['alignment'])) ?: $return['text_modifiers'][] = $instance['modifiers']['alignment'];
		(empty($instance['modifiers']['inverse'])) ?: $return['text_modifiers'][] = $instance['modifiers']['inverse'];

		return $return;
	}

	/*
	* Google Font
	*/

	function less_import_google_font( $instance, $args ) {
		if ( isset($instance['modifiers']['font']) ) {
			$selected_font = siteorigin_widget_get_font( $instance['modifiers']['font'] );
			if (!empty($selected_font['css_import'])) {
				return $selected_font['css_import'];
			} else {
				return false;
			}
		}
		return false;
	}

	/*
	* Less
	*/


	function get_less_variables($instance) {
		if ( isset( $instance['modifiers']['font'] ) ) {
			$font = siteorigin_widget_get_font( $instance['modifiers']['font'] );
			$return['font'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$return['font_weight'] = $font['weight'];
			}
		}
		$return['span_color'] = !empty($instance['modifiers']['span_color']) ? $instance['modifiers']['span_color'] : false;
		$return['color'] = !empty($instance['modifiers']['color']) ? $instance['modifiers']['color'] : false;
		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		$return['text'] = EsoWidgetFormCorePart::section('Settings', array(
			'text' => EsoWidgetFormCorePart::text('Text', 'The text to display. Text inside SPAN tags be styled with a different appearance.')
		));

		$return['modifiers'] = EsoWidgetFormCorePart::section('Appearance', array(
			'color' => EsoWidgetFormCorePart::color('Text Color'),
			'span_color' => EsoWidgetFormCorePart::color('Span Color'),
			'font' => EsoWidgetFormCorePart::font('Font'),
			'size' => EsoWidgetFormPart::uikit('font_size'),
			'weight' => EsoWidgetFormPart::uikit('font_weight'),
			'transform' => EsoWidgetFormPart::uikit('text_transform'),
			'alignment' => EsoWidgetFormPart::uikit('text_align')
		));

		return $return;

	}

	/*
    * Instance modifications
    * The form changes over time
    */

    function modify_instance( $instance )  {
        // update 2.1.0
        if ( isset( $instance['text']['span_color'] ) ) {
            $instance['modifiers']['span_color'] = $instance['text']['span_color'];
            unset($instance['text']['span_color']);
        }
        if ( isset( $instance['text']['font'] ) ) {
            $instance['modifiers']['font'] = $instance['text']['font'];
            unset($instance['text']['font']);
        }
        if ( isset( $instance['modifiers']['inverse'] ) ) {
			if ( !empty($instance['modifiers']['inverse']) ) {
				$instance['modifiers']['color'] = '#ffffff';
			}
            unset($instance['modifiers']['inverse']);
        }
        // end 2.1.0
        return $instance;
    }

}

siteorigin_widget_register('echelonso-eso-text', __FILE__, 'EchelonSOEsoText');
