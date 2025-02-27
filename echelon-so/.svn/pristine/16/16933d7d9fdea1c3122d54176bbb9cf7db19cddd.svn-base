<?php
/*
Widget Name: E: Feature
Description: Icon based small and large feature boxes.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/feature/
*/

class EchelonSOEsoFeature extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-feature',
			__('E: Feature', 'echelon-so'),
			array(
				'description' => __('Icon based small and large feature boxes.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/feature/',
				'panels_groups' => array('eso'),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template
	*/

	function get_template_name($instance) {
		return $instance['feature']['template'];
	}

	/*
	* Template Variables
	*/

	function get_template_variables($instance, $args) {

		$return = array();

		// content
		$return['title'] = !empty($instance['feature']['title']) ? $instance['feature']['title'] : '';
		$return['body'] = !empty($instance['feature']['body']) ? $instance['feature']['body'] : '';

		// link
		$return['link_target'] = !empty($instance['feature']['link_target']) ? sow_esc_url($instance['feature']['link_target']) : '';
		$return['link_text'] = !empty($instance['feature']['link_text']) ? $instance['feature']['link_text'] : '';

		// icon
		$return['icon_styles']['color'] = 'color: ' . (!empty($instance['icon_appearance']['color']) ? $instance['icon_appearance']['color'] : 'inherit');
		$return['icon_styles']['size'] = 'font-size: ' . (!empty($instance['icon_appearance']['size']) ? $instance['icon_appearance']['size'] : '40px');
		$return['icon'] = !empty($instance['feature']['icon']) ? $instance['feature']['icon'] : '';

		// modifiers
		$return['feature_class'] = array();
		(empty($instance['feature']['text_align'])) ?: $return['feature_class'][] = $instance['feature']['text_align'];
		(empty($instance['feature']['padding'])) ?: $return['feature_class'][] = $instance['feature']['padding'];

		$return['icon_class_default'] = array();
		(empty($instance['icon_appearance']['margin_right'])) ?: $return['icon_class_default'][] = $instance['icon_appearance']['margin_right'];

		$return['wrap_class'] = array();
		(empty($instance['feature']['flex_v'])) ?: $return['wrap_class'][] = $instance['feature']['flex_v'];

		$return['icon_class_large'] = array();
		(empty($instance['icon_appearance']['margin_bottom'])) ?: $return['icon_class_large'][] = $instance['icon_appearance']['margin_bottom'];

		$return['title_class'] = array();
		(empty($instance['title_appearance']['font_weight'])) ?: $return['title_class'][] = $instance['title_appearance']['font_weight'];
		(empty($instance['title_appearance']['font_size'])) ?: $return['title_class'][] = $instance['title_appearance']['font_size'];
		(empty($instance['title_appearance']['margin_bottom'])) ?: $return['title_class'][] = $instance['title_appearance']['margin_bottom'];
		(empty($instance['title_appearance']['line_height'])) ?: $return['title_class'][] = $instance['title_appearance']['line_height'];

		$return['body_class'] = array();
		(empty($instance['body_appearance']['font_weight'])) ?: $return['body_class'][] = $instance['body_appearance']['font_weight'];
		(empty($instance['body_appearance']['font_size'])) ?: $return['body_class'][] = $instance['body_appearance']['font_size'];
		(empty($instance['body_appearance']['margin_bottom'])) ?: $return['body_class'][] = $instance['body_appearance']['margin_bottom'];

		// image
		$return['image'] = false;
		if ( ! empty( $instance['feature']['image'] ) ) {
			$size = empty( $instance['feature']['image_size'] ) ? 'full' : $instance['feature']['image_size'];
			$attachment = wp_get_attachment_image_src( $instance['feature']['image'], $size );
			if( !empty( $attachment ) ) {
				$return['image'] = sow_esc_url( $attachment[0] );
			}
		}

		$return['image_class'] = array();
		(empty($instance['feature']['image_radius'])) ?: $return['image_class'][] = $instance['feature']['image_radius'];

		$return['link_class'] = array();
		(empty($instance['link_appearance']['font_size'])) ?: $return['link_class'][] = $instance['link_appearance']['font_size'];

		return $return;
	}

	/*
	* Less Variables
	*/

	function get_less_variables($instance) {

		$return = array();

		if ( isset($instance['title_appearance']) ) {
			$return['title_color'] = !empty( $instance['title_appearance']['color'] ) ? $instance['title_appearance']['color'] : false;
		}

		if ( isset($instance['body_appearance']) ) {
			$return['body_color'] = !empty( $instance['body_appearance']['color'] ) ? $instance['body_appearance']['color'] : false;
		}

		if ( isset($instance['link_appearance']) ) {
			$return['link_color'] = !empty( $instance['link_appearance']['color'] ) ? $instance['link_appearance']['color'] : false;
		}

		return $return;

	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		$return['feature'] = EsoWidgetFormCorePart::section('Settings', array(
			'template' => EsoWidgetFormCorePart::select('Template', 'Create a small or large feature.', 'default', array(
				'default' => __('Small', EsoWidgetFormPart::text_domain()),
				'large' => __('Large', EsoWidgetFormPart::text_domain()),
			), array(

			), array(
				'callback' => 'select',
				'args' => array('template')
			)),
			'title' => EsoWidgetFormCorePart::text('Title', 'The features title text.', 'My Feature'),
			'body' => EsoWidgetFormCorePart::text('Body', 'The features main body text.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel velit et sem.'),
			'link_text' => EsoWidgetFormCorePart::text('Link Text', 'The text to use for the features link.', 'Learn More'),
			'link_target' => EsoWidgetFormCorePart::link('Link Destination', 'The URL to features link goes to.', 'https://example.com'),
			'icon' => EsoWidgetFormCorePart::icon('Icon', 'An icon to use for the feature.' . EsoWidgetFormPart::exclusive('Image')),
			'image' => EsoWidgetFormCorePart::media('Image', 'An image to use for the feature.' . EsoWidgetFormPart::exclusive('Icon')),
			'image_size' => EsoWidgetFormCorePart::image_size('Image Size', 'The image size to use for the features image.' . EsoWidgetFormPart::exclusive('Icon')),
			'image_radius' => EsoWidgetFormPart::uikit('border_radius', 'Image Border Radius', 'Adjust the image border radius.' . EsoWidgetFormPart::exclusive('Icon')),
			'padding' => EsoWidgetFormPart::uikit('padding', 'Inner Padding'),
			'text_align' => EsoWidgetFormPart::uikit('text_align'),
			'flex_v' => EsoWidgetFormPart::uikit('flex_v', 'Vertical Alignment', 'Choose how to align the features content vertically.' . EsoWidgetFormPart::important(), 'uk-flex-top', array(
				'template[default]' => array('show'),
				'_else[template]' => array('hide'),
			)),
		));

		$return['title_appearance'] = EsoWidgetFormCorePart::section('Title Appearance', array(
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'margin_bottom' => EsoWidgetFormPart::uikit('margin_bottom', '', '', 'uk-margin-tiny-bottom'),
			'line_height' => EsoWidgetFormPart::uikit('line_height'),
			'color' => EsoWidgetFormCorePart::color()
		));

		$return['body_appearance'] = EsoWidgetFormCorePart::section('Body Appearance', array(
			'font_size' => EsoWidgetFormPart::uikit('font_size', '', '', 'uk-text-small'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'margin_bottom' => EsoWidgetFormPart::uikit('margin_bottom', '', '', 'uk-margin-tiny-bottom'),
			'color' => EsoWidgetFormCorePart::color()
		));

		$return['link_appearance'] = EsoWidgetFormCorePart::section('Link Appearance', array(
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'color' => EsoWidgetFormCorePart::color()
		));

		$return['icon_appearance'] = EsoWidgetFormCorePart::section('Icon & Image Appearance', array(
			'margin_right' => EsoWidgetFormPart::uikit('margin_right', '', '', 'uk-margin-small-right', array(
				'template[default]' => array('show'),
				'_else[template]' => array('hide'),
			)),
			'margin_bottom' => EsoWidgetFormPart::uikit('margin_bottom', '', '', 'uk-margin-small-bottom', array(
				'template[default]' => array('hide'),
				'_else[template]' => array('show'),
			)),
			'color' => EsoWidgetFormCorePart::color('Icon Color', 'The color for icons.' . EsoWidgetFormPart::exclusive('Image'), EsoWidgetFormPart::default_color('primary')),
			'size' => EsoWidgetFormCorePart::measurement('Icon Size', 'The size for icons.' . EsoWidgetFormPart::exclusive('Image'), '40px'),
		));

		return $return;

	}

	/*
	* Instance modifications
	* The form changes over time
	*/

	function modify_instance( $instance )  {
		// update 2.1.0
		if ( isset( $instance['modifiers']['padding'] ) ) {
			$instance['feature']['padding'] = $instance['modifiers']['padding'];
			unset($instance['modifiers']['padding']);
		}
		if ( isset( $instance['modifiers']['alignment'] ) ) {
			$instance['feature']['text_align'] = $instance['modifiers']['alignment'];
			unset($instance['modifiers']['alignment']);
		}
		if ( isset( $instance['modifiers']['icon_margin_right'] ) ) {
			$instance['icon_appearance']['margin_right'] = $instance['modifiers']['icon_margin_right'];
			unset($instance['modifiers']['icon_margin_right']);
		}
		if ( isset( $instance['modifiers']['icon_margin_bottom'] ) ) {
			$instance['icon_appearance']['margin_bottom'] = $instance['modifiers']['icon_margin_bottom'];
			unset($instance['modifiers']['icon_margin_bottom']);
		}
		if ( isset( $instance['modifiers']['title_size'] ) ) {
			$instance['title_appearance']['font_weight'] = $instance['modifiers']['title_size'];
			unset($instance['modifiers']['title_weight']);
		}
		if ( isset( $instance['modifiers']['title_size'] ) ) {
			$instance['title_appearance']['font_size'] = $instance['modifiers']['title_size'];
			unset($instance['modifiers']['title_size']);
		}
		if ( isset( $instance['modifiers']['title_margin'] ) ) {
			$instance['title_appearance']['margin_bottom'] = $instance['modifiers']['title_margin'];
			unset($instance['modifiers']['title_margin']);
		}
		if ( isset( $instance['modifiers']['body_size'] ) ) {
			$instance['body_appearance']['font_size'] = $instance['modifiers']['body_size'];
			unset($instance['modifiers']['body_size']);
		}
		if ( isset( $instance['modifiers']['body_weight'] ) ) {
			$instance['body_appearance']['font_weight'] = $instance['modifiers']['body_weight'];
			unset($instance['modifiers']['body_weight']);
		}
		if ( isset( $instance['modifiers']['body_margin'] ) ) {
			$instance['body_appearance']['margin_bottom'] = $instance['modifiers']['body_margin'];
			unset($instance['modifiers']['body_margin']);
		}

		// end 2.1.0
		return $instance;
	}

}

siteorigin_widget_register('echelonso-eso-feature', __FILE__, 'EchelonSOEsoFeature');
