<?php

/*
Widget Name: E: Off Canvas
Description: Off page content areas.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/off-canvas/
*/

class EchelonSOEsoOffCanvas extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-off-canvas',
			__('E: Off Canvas', 'echelon-so'),
			array(
				'description' => __('Off page content areas.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/off-canvas/',
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
		$return['content'] = $instance['off_canvas']['content'];
		$return['canvas_id'] = !empty($instance['off_canvas']['canvas_id']) ? $instance['off_canvas']['canvas_id'] : '';
		$return['mode'] = 'slide';
		$return['flip'] = $instance['off_canvas']['flip'];
		$return['overlay'] = $instance['off_canvas']['overlay'];
		$return['bg_close'] = $instance['off_canvas']['bg_close'];

		$return['background'] = !empty( $instance['appearance']['background'] ) ? $instance['appearance']['background'] : false;
		$return['close_icon'] = !empty( $instance['appearance']['close_icon'] ) ? $instance['appearance']['close_icon'] : false;
		$return['overlay_color'] = !empty( $instance['appearance']['overlay'] ) ? $instance['appearance']['overlay'] : false;

		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		$return['off_canvas'] = EsoWidgetFormCorePart::section('Settings', array(
			'canvas_id' => EsoWidgetFormCorePart::text('Target ID', 'To display the off canvas you need to add an <span style="color: #000;">Attribute Key</span> and <span style="color: #000;">Attribute Value</span> to a different widget, any widget can be used to open the off canvas. For example, add an E: Text widget to this page, open the E: Text widget and go to <span style="color: #000;">Widget Styles > Attributes</span>, find <span style="color: #000;">Attribute Key</span> and enter <span style="color: #000;">uk-toggle</span>, find <span style="color: #000;">Attribute Value</span> and enter <span style="color: #000;">target: #your_target_id</span>. When the E: Text widget is clicked the canvas will open.' . EsoWidgetFormPart::required()),
			'content' => EsoWidgetFormCorePart::builder('Content', 'Build the content of the off canvas.'),
			'mode' => EsoWidgetFormCorePart::select('Mode', 'How the off canvas should enter the viewport.', 'slide', array(
				'slide' => __('Slide', EsoWidgetFormPart::text_domain()),
				'push' => __('Push' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormPart::text_domain()),
				'reveal' => __('Reveal' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormPart::text_domain()),
			)),
			'flip' => EsoWidgetFormPart::true_false('Side', 'Which side of the screen should the off canvas enter from.', 'false', 'Right', 'Left'),
			'overlay' => EsoWidgetFormPart::true_false('Use Overlay', 'Add an overlay effect page content.', 'false', 'Yes', 'No'),
			'bg_close' => EsoWidgetFormPart::true_false('Background Close', 'Clicking outside the off canvas closes it.', 'true', 'Yes', 'No'),
		));

		$return['appearance'] = EsoWidgetFormCorePart::section('Appearance', array(
			'background' => EsoWidgetFormCorePart::color('Background', 'The background color for the off canvas.', EsoWidgetFormPart::default_color('inverse')),
			'close_icon' => EsoWidgetFormCorePart::color('Close Icon', 'The color for the off canvas close icon.', EsoWidgetFormPart::default_color('darker_grey')),
			'overlay' => EsoWidgetFormPart::rgba('Overlay', 'The color for the content overlay.', EsoWidgetFormPart::default_color('overlay')),
		));

		return $return;

	}

	/*
    * Instance modifications
    * The form changes over time
    */

    function modify_instance( $instance )  {
        // update 2.1.0
        if ( isset( $instance['modifiers']['mode'] ) ) {
            $instance['off_canvas']['mode'] = $instance['modifiers']['mode'];
            unset($instance['modifiers']['mode']);
        }
        if ( isset( $instance['modifiers']['flip'] ) ) {
            $instance['off_canvas']['flip'] = $instance['modifiers']['flip'];
            unset($instance['modifiers']['flip']);
        }
        if ( isset( $instance['modifiers']['overlay'] ) ) {
            $instance['off_canvas']['overlay'] = $instance['modifiers']['overlay'];
            unset($instance['modifiers']['overlay']);
        }
        if ( isset( $instance['modifiers']['bg-close'] ) ) {
            $instance['off_canvas']['bg_close'] = $instance['modifiers']['bg-close'];
            unset($instance['modifiers']['bg-close']);
        }
        // end 2.1.0
        return $instance;
    }

}

siteorigin_widget_register('echelonso-eso-off-canvas', __FILE__, 'EchelonSOEsoOffCanvas');
