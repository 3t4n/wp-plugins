<?php

/*
Widget Name: E: Slabtext
Description: Automatically format text into square blocks.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/slabtext/
*/

class EchelonSOEsoSlabtext extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            'echelonso-eso-slabtext',
            __('E: Slabtext', 'echelon-so'),
            array(
                'description' => __('Automatically format text into square blocks.', 'echelon-so' ),
                'help' => 'https://echelonso.com/widgets/slabtext/',
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
        $return['text'] = !empty($instance['slabtext']['text']) ? $instance['slabtext']['text'] : '';
        $return['int_id'] = 'st_' . uniqid(rand(1,9999));
		$return['text_class'] = array();
		(empty($instance['appearance']['font_size'])) ?: $return['text_class'][] = $instance['appearance']['font_size'];
		(empty($instance['appearance']['font_weight'])) ?: $return['text_class'][] = $instance['appearance']['font_weight'];
		(empty($instance['appearance']['text_transform'])) ?: $return['text_class'][] = $instance['appearance']['text_transform'];
		(empty($instance['appearance']['text_align'])) ?: $return['text_class'][] = $instance['appearance']['text_align'];
        return $return;
    }

    /*
	* Less Variables
	*/

	function get_less_variables($instance) {
		$less_vars = array();

        if ( ! empty( $instance['appearance']['font'] ) ) {
			$font = siteorigin_widget_get_font( $instance['appearance']['font'] );
			$less_vars['font'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$less_vars['font_weight'] = $font['weight'];
			}
		}

		$less_vars['color'] = isset( $instance['appearance']['color'] ) ? $instance['appearance']['color'] : false;
		return $less_vars;
	}

    /*
	* Google Font
	*/

	function less_import_google_font( $instance, $args ) {
		$selected_font = siteorigin_widget_get_font( $instance['appearance']['font'] );
		if (!empty($selected_font['css_import'])) {
			return $selected_font['css_import'];
		} else {
			return false;
		}
	}

    /*
    * Widget Form
    */

    function get_widget_form() {

        $return['slabtext'] = EsoWidgetFormCorePart::section('Settings', array(
            'text' => EsoWidgetFormCorePart::textarea('Text', 'The text to slab.')
        ));

        $return['appearance'] = EsoWidgetFormCorePart::section('Appearance', array(
            'font' => EsoWidgetFormCorePart::font('Font', 'Use a Google font for the text.'),
            'font_size' => EsoWidgetFormPart::uikit('font_size'),
            'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
            'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
            'text_align' => EsoWidgetFormPart::uikit('text_align'),
            'color' => EsoWidgetFormCorePart::color('Color', 'Use a color for the text.'),
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
        wp_enqueue_script('echelonso_text_rotator_cdn_js', 'https://cdnjs.cloudflare.com/ajax/libs/slabText/2.3/jquery.slabtext.min.js', array('jquery'), '2.3.0', true);
    }

    /*
    * Instance modifications
    * The form changes over time
    */

    function modify_instance( $instance )  {
        // update 2.1.0
        if ( isset( $instance['slabtext']['font'] ) ) {
            $instance['appearance']['font'] = $instance['slabtext']['font'];
            unset($instance['slabtext']['font']);
        }
        if ( isset( $instance['modifiers']['size'] ) ) {
            $instance['appearance']['font_size'] = $instance['modifiers']['size'];
            unset($instance['modifiers']['size']);
        }
        if ( isset( $instance['modifiers']['weight'] ) ) {
            $instance['appearance']['font_weight'] = $instance['modifiers']['weight'];
            unset($instance['modifiers']['weight']);
        }
        if ( isset( $instance['modifiers']['transform'] ) ) {
            $instance['appearance']['text_transform'] = $instance['modifiers']['transform'];
            unset($instance['modifiers']['transform']);
        }
        if ( isset( $instance['modifiers']['alignment'] ) ) {
            $instance['appearance']['text_align'] = $instance['modifiers']['alignment'];
            unset($instance['modifiers']['alignment']);
        }
        // end 2.1.0
        return $instance;
    }

}

siteorigin_widget_register('echelonso-eso-slabtext', __FILE__, 'EchelonSOEsoSlabtext');
