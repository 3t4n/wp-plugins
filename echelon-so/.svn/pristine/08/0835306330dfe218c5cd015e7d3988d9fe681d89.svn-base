<?php

/*
Widget Name: E: Typewriter
Description: A type out, letter by letter typewriter effect.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/typewriter/
*/

class EchelonSOEsoTypewriter extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-typewriter',
			__('E: Typewriter', 'echelon-so'),
			array(
				'description' => __('A cool typewriter effect.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/typewriter/',
				'panels_groups' => array('eso'),
			),
			false,
			array(),
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template Vars
	*/

	function get_template_variables( $instance, $args ) {

		// steps
		if (!empty($instance['strings'])) {
			// limit steps
			$sliced = array_slice($instance['strings'], 0, 3);
			$s = 'typewriter';
			foreach ($sliced as $k => $v) {
				$s .= ".typeString('".esc_js($v['text'])."')";
				$s .= '.pauseFor('.absint($v['pause_for']).')';
				if ($v['deletion_mode'] == 'delete_all') {
					$s .= '.deleteAll()';
				} else {
					$s .= '.deleteChars('.absint($v['delete_some']).')';
				}
				$s .= '.pauseFor('.absint($v['pause_for']).')';
			}
			$s .= '.start()';
		}

		$return['s'] = $s;

		// data
		$return['int_id'] = 'tw_' . uniqid(rand(1,9999));
		$return['cursor'] = !empty($instance['typewriter']['cursor']) ? $instance['typewriter']['cursor'] : '|';
		$return['loop'] = !empty($instance['typewriter']['loop']) ? 'true' : 'false';
		$return['delay'] = absint($instance['typewriter']['delay']);
		$return['before'] = $instance['before_text']['text'];
		$return['after'] = $instance['after_text']['text'];
		$return['text_color_before'] = !empty($instance['before_text']['color']) ? sanitize_hex_color($instance['before_text']['color']) : 'inherit';
		$return['text_color_typed'] = !empty($instance['typed_text']['color']) ? sanitize_hex_color($instance['typed_text']['color']) : 'inherit';
		$return['text_color_after'] = !empty($instance['after_text']['color']) ? sanitize_hex_color($instance['after_text']['color']) : 'inherit';

		// modifiers
		$return['wrap_class'] = array();
		(empty($instance['typewriter']['text_align'])) ?: $return['wrap_class'][] = $instance['typewriter']['text_align'];

		$return['before_class'] = array();
		(empty($instance['before_text']['font_size'])) ?: $return['before_class'][] = $instance['before_text']['font_size'];
		(empty($instance['before_text']['font_weight'])) ?: $return['before_class'][] = $instance['before_text']['font_weight'];

		$return['typed_class'] = array();
		(empty($instance['typed_text']['font_size'])) ?: $return['typed_class'][] = $instance['typed_text']['font_size'];
		(empty($instance['typed_text']['font_weight'])) ?: $return['typed_class'][] = $instance['typed_text']['font_weight'];

		$return['after_class'] = array();
		(empty($instance['after_text']['font_size'])) ?: $return['after_class'][] = $instance['after_text']['font_size'];
		(empty($instance['after_text']['font_weight'])) ?: $return['after_class'][] = $instance['after_text']['font_weight'];


		return $return;
	}


	function get_widget_form() {

		$return['strings'] = EsoWidgetFormCorePart::repeater('Typewriter Steps', 'A maximum of 3 steps, or unlimited with Prime.', 'Step', array(
			'text' => EsoWidgetFormCorePart::text('Text', 'The text to type.'),
			'deletion_mode' => EsoWidgetFormCorePart::select('Deletion Mode',  'How the Typewriter should handle deleting the text from this step.', 'delete_all', array(
				'delete_all' => 'Delete All Letters',
				'delete_some' => 'Delete Some Letters',
			), array(

			), array(
				'callback' => 'select',
				'args' => array( 'deletion_mode_{$repeater}' ),
			)),
			'delete_some' => EsoWidgetFormCorePart::number('Delete Letter Count', 'How many letters to delete.', '', array(
				'deletion_mode_{$repeater}[delete_some]' => array('show'),
				'deletion_mode_{$repeater}[delete_all]' => array('hide')
			)),
			'pause_for' => EsoWidgetFormCorePart::slider('Pause For', 'How long to pause before typing the next step. In milliseconds.', 1500, 0, 3000)
		));

		$return['typewriter'] = EsoWidgetFormCorePart::section('Settings', array(
			'cursor' => EsoWidgetFormCorePart::text('Cursor', 'Symbol to use for the insertion point cursor.', '|'),
			'loop' => EsoWidgetFormCorePart::checkbox('Loop', 'Repeat the Typewriter in a loop.', true),
			'delay' => EsoWidgetFormCorePart::slider('Delay', 'The time is takes for new letters to be typed. In milliseconds.', 100, 0, 3000),
			'text_align' => EsoWidgetFormPart::uikit('text_align')
		));

		$return['before_text'] = EsoWidgetFormCorePart::section('Before Text', array(
			'text' => EsoWidgetFormCorePart::text('Text', 'Add text before the typewriter.'),
			'color' => EsoWidgetFormCorePart::color('Color', 'Set the color of the text.'),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight')
		));

		$return['typed_text'] = EsoWidgetFormCorePart::section('Typed Text', array(
			'color' => EsoWidgetFormCorePart::color('Color', 'Set the color of the text.'),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight')
		));

		$return['after_text'] = EsoWidgetFormCorePart::section('After Text', array(
			'text' => EsoWidgetFormCorePart::text('Text', 'Add text before the typewriter.'),
			'color' => EsoWidgetFormCorePart::color('Color', 'Set the color of the text.'),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight')
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
		global $echelon_so;
		wp_enqueue_script( 'echelonso_typewriter', plugin_dir_url( __FILE__ ) . 'inc/typewriter.js', array('jquery'), ECHELONSO_VERSION, false );
	}

	/*
	* Instance modifications
	* The form changes over time
	*/

	function modify_instance( $instance )  {
		// update 2.1.0
		if ( isset($instance['typewriter']['before']) ) {
			$instance['before_text']['text'] = $instance['typewriter']['before'];
			unset( $instance['typewriter']['before'] );
		}
		if ( isset($instance['typewriter']['after']) ) {
			$instance['after_text']['text'] = $instance['typewriter']['after'];
			unset( $instance['typewriter']['after'] );
		}
		if ( isset($instance['typewriter']['text_color_typed']) ) {
			$instance['typed_text']['color'] = $instance['typewriter']['text_color_typed'];
			unset( $instance['typewriter']['text_color_typed'] );
		}
		if ( isset($instance['modifiers']['font_size_before']) ) {
			$instance['before_text']['font_size'] = $instance['modifiers']['font_size_before'];
			unset( $instance['modifiers']['font_size_before'] );
		}
		if ( isset($instance['modifiers']['font_weight_before']) ) {
			$instance['before_text']['font_weight'] = $instance['modifiers']['font_weight_before'];
			unset( $instance['modifiers']['font_weight_before'] );
		}
		if ( isset($instance['modifiers']['font_size_typed']) ) {
			$instance['typed_text']['font_size'] = $instance['modifiers']['font_size_typed'];
			unset( $instance['modifiers']['font_size_typed'] );
		}
		if ( isset($instance['modifiers']['font_weight_typed']) ) {
			$instance['typed_text']['font_weight'] = $instance['modifiers']['font_weight_typed'];
			unset( $instance['modifiers']['font_weight_typed'] );
		}
		if ( isset($instance['modifiers']['font_size_after']) ) {
			$instance['after_text']['font_size'] = $instance['modifiers']['font_size_after'];
			unset( $instance['modifiers']['font_size_after'] );
		}
		if ( isset($instance['modifiers']['font_weight_after']) ) {
			$instance['after_text']['font_weight'] = $instance['modifiers']['font_weight_after'];
			unset( $instance['modifiers']['font_weight_after'] );
		}
		if ( isset($instance['modifiers']['text_align']) ) {
			$instance['typewriter']['text_align'] = $instance['modifiers']['text_align'];
			unset( $instance['modifiers']['text_align'] );
		}
		// end 2.1.0
		return $instance;
	}

}

siteorigin_widget_register('echelonso-eso-typewriter', __FILE__, 'EchelonSOEsoTypewriter');
