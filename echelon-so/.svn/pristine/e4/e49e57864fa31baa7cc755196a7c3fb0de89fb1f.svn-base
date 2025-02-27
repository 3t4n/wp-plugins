<?php

/*
Widget Name: E: Card
Description: Text and image based content cards.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/card/
*/

class EchelonSOEsoCard extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-card',
			__('E: Card', EsoWidgetFormPart::text_domain()),
			array(
				'description' => __('Text and image based content cards.', EsoWidgetFormPart::text_domain() ),
				'help' => 'https://echelonso.com/widgets/card/',
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
		$allowed_templates = array('default', 'sub_title');
		if ( in_array($instance['card']['template'], $allowed_templates) ) {
			return $instance['card']['template'];
		} else {
			return 'default';
		}
	}

	/*
	* Template Variables
	*/

	function get_template_variables($instance, $args) {

		$return = array();

		// content
		$return['title'] = !empty($instance['card']['title']) ? $instance['card']['title'] : '';
		$return['sub_title'] = !empty($instance['card']['sub_title']) ? $instance['card']['sub_title'] : '';
		$return['body'] = !empty($instance['card']['body']) ? $instance['card']['body'] : '';

		// link
		$return['link_target'] = !empty($instance['card']['link_target']) ? sow_esc_url($instance['card']['link_target']) : '';
		$return['link_text'] = !empty($instance['card']['link_text']) ? $instance['card']['link_text'] : '';

		// image
		if ( !empty($instance['card']['image']) ) {
			$size = empty( $instance['card']['image_size'] ) ? 'full' : $instance['card']['image_size'];
			$attachment = wp_get_attachment_image_src( $instance['card']['image'], $size );
			if( !empty( $attachment ) ) {
				$return['image'] = sow_esc_url( $attachment[0] );
			} else {
				$retrun['image'] = false;
			}
		}

		if ( !empty($instance['image_appearance']['image_2']) ) {
			$size = empty( $instance['card']['image_size'] ) ? 'full' : $instance['card']['image_size'];
			$attachment = wp_get_attachment_image_src( $instance['image_appearance']['image_2'], $size );
			if( !empty( $attachment ) ) {
				$return['image_2'] = sow_esc_url( $attachment[0] );
			} else {
				$return['image_2'] = false;
			}
		}

		$return['image_transition'] = !empty($instance['image_appearance']['image_transition']) ? $instance['image_appearance']['image_transition'] : '';

		// modifiers
		$return['card_class'][] = 'eso';
		(empty($instance['card']['padding'])) ?: $return['card_class'][] = $instance['card']['padding'];
		(empty($instance['card']['text_align'])) ?: $return['card_class'][] = $instance['card']['text_align'];

		$return['image_class'][] = 'eso';
		(empty($instance['image_appearance']['border_radius'])) ?: $return['image_class'][] = $instance['image_appearance']['border_radius'];
		(empty($instance['image_appearance']['margin_bottom'])) ?: $return['body_class'][] = $instance['image_appearance']['margin_bottom'];

		$return['title_class'][] = 'eso';
		(empty($instance['title_appearance']['font_weight'])) ?: $return['title_class'][] = $instance['title_appearance']['font_weight'];
		(empty($instance['title_appearance']['font_size'])) ?: $return['title_class'][] = $instance['title_appearance']['font_size'];
		(empty($instance['title_appearance']['text_transform'])) ?: $return['title_class'][] = $instance['title_appearance']['text_transform'];
		(empty($instance['title_appearance']['margin_bottom'])) ?: $return['title_class'][] = $instance['title_appearance']['margin_bottom'];

		$return['sub_title_class'][] = 'eso';
		(empty($instance['sub_title_appearance']['font_weight'])) ?: $return['sub_title_class'][] = $instance['sub_title_appearance']['font_weight'];
		(empty($instance['sub_title_appearance']['font_size'])) ?: $return['sub_title_class'][] = $instance['sub_title_appearance']['font_size'];
		(empty($instance['sub_title_appearance']['text_transform'])) ?: $return['sub_title_class'][] = $instance['sub_title_appearance']['text_transform'];
		(empty($instance['sub_title_appearance']['margin_bottom'])) ?: $return['sub_title_class'][] = $instance['sub_title_appearance']['margin_bottom'];

		$return['body_class'][] = 'eso';
		(empty($instance['body_appearance']['font_weight'])) ?: $return['body_class'][] = $instance['body_appearance']['font_weight'];
		(empty($instance['body_appearance']['font_size'])) ?: $return['body_class'][] = $instance['body_appearance']['font_size'];
		(empty($instance['body_appearance']['text_transform'])) ?: $return['body_class'][] = $instance['body_appearance']['text_transform'];
		(empty($instance['body_appearance']['margin_bottom'])) ?: $return['body_class'][] = $instance['body_appearance']['margin_bottom'];

		$return['footer_class'][] = 'eso';
		(empty($instance['footer_appearance']['padding_remove'])) ?: $return['footer_class'][] = $instance['footer_appearance']['padding_remove'];

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

		if ( isset($instance['sub_title_appearance']) ) {
			$return['sub_title_color'] = !empty( $instance['sub_title_appearance']['color'] ) ? $instance['sub_title_appearance']['color'] : false;
		}

		if ( isset($instance['body_appearance']) ) {
			$return['body_color'] = !empty( $instance['body_appearance']['color'] ) ? $instance['body_appearance']['color'] : false;
		}

		if ( isset($instance['footer_appearance']) ) {
			$return['link_color'] = !empty( $instance['footer_appearance']['color'] ) ? $instance['footer_appearance']['color'] : false;
		}

		return $return;

	}

	/**
	* Widget Form
	*/

	function get_widget_form() {

		$return['card'] = EsoWidgetFormCorePart::section('Settings', array(
			'template' => EsoWidgetFormCorePart::select('Template', 'Choose  a template to use.', 'default', array(
				'default' => __('Minimal', EsoWidgetFormPart::text_domain()),
				'sub_title' => __('Sub Title', EsoWidgetFormPart::text_domain()),
				'image_top' => __('Image Top' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormPart::text_domain()),
				'image_bottom' => __('Image Bottom' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormPart::text_domain()),
			), array(

			), array(
				'callback' => 'select',
				'args' => array('template')
			)),
			'image' => EsoWidgetFormCorePart::media('Card Image' . EsoWidgetFormPart::prime_tag(), 'The image to use with image based templates.', 'Choose Image', 'Update Image', 'image', false, array(
				'template[image_top]' => array('show'),
				'template[image_bottom]' => array('show'),
				'template[image_minimal]' => array('show'),
				'_else[template]' => array('hide'),
			)),
			'image_size' => EsoWidgetFormCorePart::image_size('Card Image Size' . EsoWidgetFormPart::prime_tag(), 'Choose an image size to use for the card image.', 'full', array(
				'template[image_top]' => array('show'),
				'template[image_bottom]' => array('show'),
				'template[image_minimal]' => array('show'),
				'_else[template]' => array('hide'),
			)),
			'title' => EsoWidgetFormCorePart::text('Card Title', 'The text to use for the cards title.', 'Card Title'),
			'sub_title' => EsoWidgetFormCorePart::text('Sub Title', 'The text to use for the cards sub title.', 'Card Sub Title', array(
				'template[default]' => array('hide'),
				'_else[template]' => array('show'),
			)),
			'body' => EsoWidgetFormCorePart::text('Body', 'The text to use for the main body of the Card.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
			'link_text' => EsoWidgetFormCorePart::text('Link Text', 'The text to use for the card link, if any.' . EsoWidgetFormPart::requires('Link Destination'), 'Learn More'),
			'link_target' => EsoWidgetFormCorePart::text('Link Destination', 'The destination URL for the card link, if any.' . EsoWidgetFormPart::requires('Link Text'), '#'),
			'padding' => EsoWidgetFormPart::uikit('padding', 'Inner Padding', '', 'uk-padding-medium'),
			'text_align' => EsoWidgetFormPart::uikit('text_align')
		));

		$return['image_appearance'] = EsoWidgetFormCorePart::section('Image Appearance' . EsoWidgetFormPart::prime_tag(), array(
			'border_radius' => EsoWidgetFormPart::uikit('border_radius'),
			'image_transition' => EsoWidgetFormCorePart::select('Transition', 'Add a transition to the card image.', '0', array(
				'0' => __('-', EsoWidgetFormPart::text_domain()),
				'scale' => __('Scale Up', EsoWidgetFormPart::text_domain()),
				'two_scale' => __('Two Image Scale', EsoWidgetFormPart::text_domain()),
				'two_fade' => __('Two Image Fade', EsoWidgetFormPart::text_domain())
			), array(

			), array(
				'callback' => 'select',
				'args' => array('image_transition')
			)),
			'image_2' => EsoWidgetFormCorePart::media('Supplement Image', 'To supplement image for teo image transitions.', 'Choose Image', 'Update Image', 'image', false, array(
				'image_transition[two_scale]' => array('show'),
				'image_transition[two_fade]' => array('show'),
				'_else[image_transition]' => array('hide'),
			)),
			'margin_bottom' => EsoWidgetFormPart::uikit('margin_bottom')
		), array(
			'template[image_top]' => array('show'),
			'template[image_bottom]' => array('show'),
			'template[image_minimal]' => array('show'),
			'_else[template]' => array('hide'),
		));

		$return['title_appearance'] = EsoWidgetFormCorePart::section('Title Appearance', array(
			'color' => EsoWidgetFormCorePart::color(),
			'font_size' => EsoWidgetFormPart::uikit('font_size', '', '', 'uk-text-large'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
			'margin_bottom' => EsoWidgetFormPart::uikit('margin_bottom', '', '', 'uk-margin-small-bottom')
		));

		$return['sub_title_appearance'] = EsoWidgetFormCorePart::section('Sub Title Appearance', array(
			'color' => EsoWidgetFormCorePart::color(),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
			'margin_bottom' => EsoWidgetFormPart::uikit('margin_bottom', '', '', 'uk-margin-medium-bottom')
		), array(
			'template[default]' => array('hide'),
			'_else[template]' => array('show'),
		));

		$return['body_appearance'] = EsoWidgetFormCorePart::section('Body Appearance', array(
			'color' => EsoWidgetFormCorePart::color(),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
			'margin_bottom' => EsoWidgetFormPart::uikit('margin_bottom', '', '', 'uk-margin-medium-bottom')
		));

		$return['footer_appearance'] = EsoWidgetFormCorePart::section('Footer Appearance', array(
			'color' => EsoWidgetFormCorePart::color(),
			'margin_bottom' => EsoWidgetFormPart::uikit('margin_bottom')
		));

		return $return;

	}

	/*
	* Instance modifications
	* The form changes over time
	*/

	function modify_instance( $instance )  {
		// update 2.1.0
		if ( isset( $instance['modifiers']['size'] ) ) {
			$instance['card']['size'] = $instance['modifiers']['size'];
			unset($instance['modifiers']['size']);
		}
		if ( isset( $instance['modifiers']['alignment'] ) ) {
			$instance['card']['text_align'] = $instance['modifiers']['alignment'];
			unset($instance['modifiers']['alignment']);
		}
		if ( isset( $instance['modifiers']['title_size'] ) ) {
			$instance['title_appearance']['font_size'] = $instance['modifiers']['title_size'];
			unset($instance['modifiers']['title_size']);
		}
		if ( isset( $instance['modifiers']['title_weight'] ) ) {
			$instance['title_appearance']['font_weight'] = $instance['modifiers']['title_weight'];
			unset($instance['modifiers']['title_weight']);
		}
		if ( isset( $instance['modifiers']['sub_title_size'] ) ) {
			$instance['sub_title_appearance']['font_size'] = $instance['modifiers']['sub_title_size'];
			unset($instance['modifiers']['sub_title_size']);
		}
		if ( isset( $instance['modifiers']['sub_title_weight'] ) ) {
			$instance['sub_title_appearance']['font_weight'] = $instance['modifiers']['sub_title_weight'];
			unset($instance['modifiers']['sub_title_weight']);
		}
		if ( isset( $instance['modifiers']['body_size'] ) ) {
			$instance['body_appearance']['font_size'] = $instance['modifiers']['body_size'];
			unset($instance['modifiers']['body_size']);
		}
		if ( isset( $instance['modifiers']['body_weight'] ) ) {
			$instance['body_appearance']['font_weight'] = $instance['modifiers']['body_weight'];
			unset($instance['modifiers']['body_weight']);
		}
		if ( isset( $instance['modifiers']['image_border_radius'] ) ) {
			$instance['image_appearance']['border_radius'] = $instance['modifiers']['image_border_radius'];
			unset($instance['modifiers']['image_border_radius']);
		}
		if ( isset( $instance['modifiers']['image_transition'] ) ) {
			$instance['image_appearance']['image_transition'] = $instance['modifiers']['image_transition'];
			unset($instance['modifiers']['image_transition']);
		}
		if ( isset( $instance['modifiers']['image_2'] ) ) {
			$instance['image_appearance']['image_2'] = $instance['modifiers']['image_2'];
			unset($instance['modifiers']['image_2']);
		}
		// end 2.1.0
		return $instance;
	}

}

siteorigin_widget_register('echelonso-eso-card', __FILE__, 'EchelonSOEsoCard');
