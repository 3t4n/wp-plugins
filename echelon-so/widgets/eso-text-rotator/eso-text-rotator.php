<?php

/*
Widget Name: E: Text Rotator
Description: Automaitcally rotate text with animations.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/text-rotator/
*/

class EchelonSOEsoTextRotator extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            'echelonso-eso-text-rotator',
            __('E: Text Rotator', 'echelon-so'),
            array(
                'description' => __('Automaitcally rotate text with animations.', 'echelon-so' ),
                'help' => 'https://echelonso.com/widgets/text-rotator/',
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

        if ( !empty($instance['words']) ) {
            foreach ($instance['words'] as $k => $v) {
                $return['words'][] = $v['word'];
            }
        } else {
            $return['words'] = array();
        }

        $return['int_id'] = 'tr_' . uniqid(rand(1,9999));
        $return['speed'] = absint($instance['settings']['speed']) * 1000;

        $allowed_effects = array('fade', 'dissolve');
        if ( in_array($instance['settings']['effect'], $allowed_effects) ) {
            $return['effect'] = !empty($instance['settings']['effect']) ? $instance['settings']['effect'] : '';
        } else {
            $return['effect'] = 'fade';
        }

        $return['before'] = !empty($instance['before_text']['text']) ? $instance['before_text']['text'] : '';
        $return['after'] = !empty($instance['after_text']['text']) ? $instance['after_text']['text'] : '';
        $return['before_color'] = !empty($instance['before_text']['color']) ? $instance['before_text']['color'] : 'inherit';
        $return['inner_color'] = !empty($instance['rotated_text']['color']) ? $instance['rotated_text']['color'] : 'inherit';
        $return['after_color'] = !empty($instance['after_text']['color']) ? $instance['after_text']['color'] : 'inherit';

        $return['wrap_class'][] = 'eso';
        (empty($instance['settings']['text_align'])) ?: $return['wrap_class'][] = $instance['settings']['text_align'];

        $return['before_text_class'][] = 'eso';
        (empty($instance['before_text']['font_size'])) ?: $return['before_text_class'][] = $instance['before_text']['font_size'];
        (empty($instance['before_text']['font_weight'])) ?: $return['before_text_class'][] = $instance['before_text']['font_weight'];
        (empty($instance['before_text']['text_transform'])) ?: $return['before_text_class'][] = $instance['before_text']['text_transform'];

        $return['rotated_text_class'][] = 'eso';
        (empty($instance['rotated_text']['font_size'])) ?: $return['rotated_text_class'][] = $instance['rotated_text']['font_size'];
        (empty($instance['rotated_text']['font_weight'])) ?: $return['rotated_text_class'][] = $instance['rotated_text']['font_weight'];
        (empty($instance['rotated_text']['text_transform'])) ?: $return['rotated_text_class'][] = $instance['rotated_text']['text_transform'];

        $return['after_text_class'][] = 'eso';
        (empty($instance['after_text']['font_size'])) ?: $return['after_text_class'][] = $instance['after_text']['font_size'];
        (empty($instance['after_text']['font_weight'])) ?: $return['after_text_class'][] = $instance['after_text']['font_weight'];
        (empty($instance['after_text']['text_transform'])) ?: $return['after_text_class'][] = $instance['after_text']['text_transform'];


        return $return;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        global $echelon_so, $echelon_so_modifiers;

        $return['words'] = EsoWidgetFormCorePart::repeater('Words', '', 'Word', array(
            'word' => EsoWidgetFormCorePart::text('A Word')
        ));

        $return['settings'] = EsoWidgetFormCorePart::section('Settings', array(
            'effect' => EsoWidgetFormCorePart::select('Effect', '', 'fade', array(
                'fade' => __('Fade', 'echelon-so'),
                'dissolve' => __('Dissolve', 'echelon-so'),
                'flip' => __('Flip' . EsoWidgetFormPart::prime_tag(), 'echelon-so'),
                'flipUp' => __('Flip Up' . EsoWidgetFormPart::prime_tag(), 'echelon-so'),
                'flipCube' => __('Flip Cube' . EsoWidgetFormPart::prime_tag(), 'echelon-so'),
                'flipCubeUp' => __('Flip Cube Up' . EsoWidgetFormPart::prime_tag(), 'echelon-so'),
                'spin' => __('Spin' . EsoWidgetFormPart::prime_tag(), 'echelon-so'),
            )),
            'speed' => EsoWidgetFormCorePart::slider('Speed', '', 3, 1, 10, true),
            'text_align' => EsoWidgetFormPart::uikit('text_align')
        ));

        $return['before_text'] = EsoWidgetFormCorePart::section('Before Text', array(
			'text' => EsoWidgetFormCorePart::text('Text', 'Add text before the rotator.'),
			'color' => EsoWidgetFormCorePart::color('Color', 'Set the color of the text.'),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'text_transform' => EsoWidgetFormPart::uikit('text_transform')
		));

        $return['rotated_text'] = EsoWidgetFormCorePart::section('Rotated Text', array(
			'color' => EsoWidgetFormCorePart::color('Color', 'Set the color of the text.'),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
            'text_transform' => EsoWidgetFormPart::uikit('text_transform')
		));

		$return['after_text'] = EsoWidgetFormCorePart::section('After Text', array(
			'text' => EsoWidgetFormCorePart::text('Text', 'Add text before the rotator.'),
			'color' => EsoWidgetFormCorePart::color('Color', 'Set the color of the text.'),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
            'text_transform' => EsoWidgetFormPart::uikit('text_transform')
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
        wp_enqueue_script('echelonso_text_rotator_cdn_js', 'https://cdn.jsdelivr.net/npm/jquery.simple-text-rotator@0.0.1/jquery.simple-text-rotator.min.js', array('jquery'), '0.0.1', true);
        wp_enqueue_style('echelonso_text_rotator_cdn_css', 'https://cdn.jsdelivr.net/npm/jquery.simple-text-rotator@0.0.1/simpletextrotator.min.css', array(), '0.0.1');
    }

    /*
	* Instance modifications
	* The form changes over time
	*/

	function modify_instance( $instance )  {
		// update 2.1.0
		if ( isset($instance['text_rotator']['words']) ) {
			$instance['words'] = $instance['text_rotator']['words'];
			unset( $instance['text_rotator']['words'] );
		}
		if ( isset($instance['text_rotator']['before']) ) {
			$instance['before_text']['text'] = $instance['text_rotator']['before'];
			unset( $instance['text_rotator']['before'] );
		}
		if ( isset($instance['text_rotator']['after']) ) {
			$instance['after_text']['text'] = $instance['text_rotator']['after'];
			unset( $instance['text_rotator']['after'] );
		}
		if ( isset($instance['modifiers']['effect']) ) {
			$instance['settings']['effect'] = $instance['modifiers']['effect'];
			unset( $instance['modifiers']['effect'] );
		}
		if ( isset($instance['modifiers']['speed']) ) {
			$instance['settings']['speed'] = $instance['modifiers']['speed'];
			unset( $instance['modifiers']['speed'] );
		}
		if ( isset($instance['modifiers']['inner_color']) ) {
			$instance['rotated_text']['color'] = $instance['modifiers']['inner_color'];
			unset( $instance['modifiers']['inner_color'] );
		}
		if ( isset($instance['modifiers']['size']) ) {
			$instance['before_text']['font_size'] = $instance['modifiers']['size'];
			$instance['rotated_text']['font_size'] = $instance['modifiers']['size'];
			$instance['after_text']['font_size'] = $instance['modifiers']['size'];
			unset( $instance['modifiers']['size'] );
		}
		if ( isset($instance['modifiers']['weight']) ) {
			$instance['before_text']['font_weight'] = $instance['modifiers']['weight'];
			$instance['rotated_text']['font_weight'] = $instance['modifiers']['weight'];
			$instance['after_text']['font_weight'] = $instance['modifiers']['weight'];
			unset( $instance['modifiers']['weight'] );
		}
		if ( isset($instance['modifiers']['alignment']) ) {
			$instance['settings']['text_align'] = $instance['modifiers']['alignment'];
			unset( $instance['modifiers']['alignment'] );
		}

		// end 2.1.0
		return $instance;
	}

}

siteorigin_widget_register('echelonso-eso-text-rotator', __FILE__, 'EchelonSOEsoTextRotator');
