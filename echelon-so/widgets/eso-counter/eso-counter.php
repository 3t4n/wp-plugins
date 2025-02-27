<?php

/*
Widget Name: E: Counter
Description: Animate the count between two numbers.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/counter/
*/

class EchelonSOEsoCounter extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-counter',
			__('E: Counter', 'echelon-so'),
			array(
				'description' => __('Animate the count between two numbers.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/counter/',
				'panels_groups' => array('eso'),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/**
	* Template Variables
	*/

	function get_template_variables($instance, $args) {
		// counter
		if ( !empty($instance['counter']['easing']) ) {
			$return['easing'] = 'true';
		} else {
			$return['easing'] = 'false';
		}
		$return['int_id'] = 'cu_' . uniqid(rand(1,9999));
		$return['grouping'] = 'false';
		$return['startVal'] = !empty($instance['counter']['start']) ? $instance['counter']['start'] : 0;
		$return['endVal'] =  !empty($instance['counter']['end']) ? $instance['counter']['end'] : 0;
		$return['duration'] = !empty($instance['counter']['duration']) ? $instance['counter']['duration'] : 0;
		$return['offset'] = !empty($instance['counter']['offset']) ? $instance['counter']['offset'] : 0;
		$return['decimal_places'] = 0;
		$return['decimal'] = '.';
		$return['separator'] = ',';
		$return['grouping'] = 'false';

		// modifiers
		$return['class'] = array();
		(empty($instance['appearance']['font_size'])) ?: $return['class'][] = $instance['appearance']['font_size'];
		(empty($instance['appearance']['font_weight'])) ?: $return['class'][] = $instance['appearance']['font_weight'];

		$return['wrapper_class'] = array();
		(empty($instance['appearance']['text_align'])) ?: $return['class'][] = $instance['appearance']['text_align'];

		return $return;
	}

	/*
	* Less
	*/


	function get_less_variables($instance) {
		if ( isset( $instance['appearance']['font'] ) ) {
			$font = siteorigin_widget_get_font( $instance['appearance']['font'] );
			$return['font'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$return['font_weight'] = $font['weight'];
			}
		}
		$return['color'] = !empty($instance['appearance']['color']) ? $instance['appearance']['color'] : false;
		return $return;
	}

	/*
	* Google Font
	*/

	function less_import_google_font( $instance, $args ) {
		if ( isset($instance['appearance']['font']) ) {
			$selected_font = siteorigin_widget_get_font( $instance['appearance']['font'] );
			if (!empty($selected_font['css_import'])) {
				return $selected_font['css_import'];
			} else {
				return false;
			}
		}
		return false;
	}

	/**
	* Widget Form
	*/

	function get_widget_form() {

		$return['counter'] = EsoWidgetFormCorePart::section('Settings', array(
			'start' => EsoWidgetFormCorePart::number('Start Number', 'The number to count from.', 1),
			'end' => EsoWidgetFormCorePart::number('End Number', 'The number to count to.', 10),
			'duration' => EsoWidgetFormCorePart::slider('Duration', 'The curation of the count in seconds.', 3, 1, 10, true),
			'easing' => EsoWidgetFormCorePart::checkbox('Easing', 'Slow the count as it nears the end number.', true),
			'use_grouping' => EsoWidgetFormPart::binary('Use Grouping', 'Group numbers in thousands and decimals.', '0', 'Yes' . EsoWidgetFormPart::prime_tag(), 'No', array(), array(
				'callback' => 'select',
				'args' => array('use_grouping')
			)),
			'separator' => EsoWidgetFormCorePart::text('Separator' . EsoWidgetFormPart::prime_tag(), 'When grouping numbers this character will be used to separate thousands.', ',', array(
				'use_grouping[1]' => array('show'),
				'use_grouping[0]' => array('hide'),
			)),
			'decimal' => EsoWidgetFormCorePart::text('Decimal' . EsoWidgetFormPart::prime_tag(), 'When grouping numbers this character will be used to separate decimals.', '.', array(
				'use_grouping[1]' => array('show'),
				'use_grouping[0]' => array('hide'),
			)),
			'decimal_places' => EsoWidgetFormCorePart::slider('Decimal Places' . EsoWidgetFormPart::prime_tag(), 'If using decimal values for the start and end numbers set the number of places here', '0', 0, 5, true, array(
				'use_grouping[1]' => array('show'),
				'use_grouping[0]' => array('hide'),
			)),
			'offset' => EsoWidgetFormCorePart::number('Inview Offset', 'How many pixels the counter needs to be in view before it is animated. Use 0 to animate as soon as the counter is visible. Recommended value 300.', 0)
		));

		$return['appearance'] = EsoWidgetFormCorePart::section('Appearance', array(
			'font' => EsoWidgetFormCorePart::font(),
			'color' => EsoWidgetFormCorePart::color('Color', 'THe counter text color.', EsoWidgetFormPart::default_color('primary')),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'text_align' => EsoWidgetFormPart::uikit('text_align'),
		));

		return $return;

	}

	/*
	* Scripts
	*/

	function initialize(){
		add_action( 'siteorigin_widgets_enqueue_frontend_scripts_' . $this->id_base, array( $this, 'enqueue_widget_scripts' ) );
	}

	function enqueue_widget_scripts($instance) {
		wp_enqueue_script( 'echelonso_countup_cdn_js', 'https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.9.3/countUp.min.js', array('jquery'), '1.9.3', false );
	}


	/*
	* Instance modifications
	* The form changes over time
	*/

	function modify_instance( $instance )  {
		// update 2.1.0
		if ( isset( $instance['counter']['font'] ) ) {
			$instance['appearance']['font'] = $instance['counter']['font'];
			unset($instance['counter']['font']);
		}
		if ( isset( $instance['modifiers']['size'] ) ) {
			$instance['appearance']['font_size'] = $instance['modifiers']['size'];
			unset($instance['modifiers']['size']);
		}
		if ( isset( $instance['modifiers']['weight'] ) ) {
			$instance['appearance']['font_weight'] = $instance['modifiers']['weight'];
			unset($instance['modifiers']['weight']);
		}
		if ( isset( $instance['modifiers']['align'] ) ) {
			$instance['appearance']['text_align'] = $instance['modifiers']['align'];
			unset($instance['modifiers']['align']);
		}
		// end 2.1.0
		return $instance;
	}

}

siteorigin_widget_register('echelonso-eso-counter', __FILE__, 'EchelonSOEsoCounter');
