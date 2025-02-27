<?php

/*
Widget Name: E: Pricing
Description: Card based pricing box.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/pricing/
*/

class EchelonSOEsoPricing extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-pricing',
			__('E: Pricing', 'echelon-so'),
			array(
				'description' => __('Card based pricing box.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/pricing/',
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

		// content
		$return['title'] = !empty($instance['pricing']['title']) ? $instance['pricing']['title'] : '';
		$return['sub_title'] = !empty($instance['pricing']['sub_title']) ? $instance['pricing']['sub_title'] : '';
		$return['symbol'] = !empty($instance['pricing']['symbol']) ? $instance['pricing']['symbol'] : '';
		$return['price'] = !empty($instance['pricing']['price']) ? $instance['pricing']['price'] : '';
		$return['link_text'] = !empty($instance['pricing']['link_text']) ? $instance['pricing']['link_text'] : '';
		$return['link_target'] = !empty($instance['pricing']['link_target']) ? sow_esc_url($instance['pricing']['link_target']) : '';
		$return['label'] = !empty($instance['pricing']['label']) ? $instance['pricing']['label'] : '';

		// modifiers
		$return['inner_class'][] = 'eso';
		(empty($instance['pricing']['padding'])) ?: $return['inner_class'][] = $instance['pricing']['padding'];

		$return['title_class'][] = 'eso';
		(empty($instance['title_appearance']['font_size'])) ?: $return['title_class'][] = $instance['title_appearance']['font_size'];
		(empty($instance['title_appearance']['font_weight'])) ?: $return['title_class'][] = $instance['title_appearance']['font_weight'];
		(empty($instance['title_appearance']['margin_bottom'])) ?: $return['title_class'][] = $instance['title_appearance']['margin_bottom'];

		$return['sub_title_class'][] = 'eso';
		(empty($instance['sub_title_appearance']['font_size'])) ?: $return['sub_title_class'][] = $instance['sub_title_appearance']['font_size'];
		(empty($instance['sub_title_appearance']['font_weight'])) ?: $return['sub_title_class'][] = $instance['sub_title_appearance']['font_weight'];
		(empty($instance['sub_title_appearance']['margin_bottom'])) ?: $return['sub_title_class'][] = $instance['sub_title_appearance']['margin_bottom'];

		$return['price_class'][] = 'eso';
		(empty($instance['price_appearance']['font_size'])) ?: $return['price_class'][] = $instance['price_appearance']['font_size'];
		(empty($instance['price_appearance']['font_weight'])) ?: $return['price_class'][] = $instance['price_appearance']['font_weight'];

		$return['price_wrap_class'][] = 'eso';
		(empty($instance['price_appearance']['margin_bottom'])) ?: $return['price_wrap_class'][] = $instance['price_appearance']['margin_bottom'];

		$return['symbol_class'][] = 'eso';
		(empty($instance['price_appearance']['symbol_font_size'])) ?: $return['symbol_class'][] = $instance['price_appearance']['symbol_font_size'];
		(empty($instance['price_appearance']['symbol_font_weight'])) ?: $return['symbol_class'][] = $instance['price_appearance']['symbol_font_weight'];

		$return['label_class'][] = 'eso';
		(empty($instance['label_appearance']['font_size'])) ?: $return['label_class'][] = $instance['label_appearance']['font_size'];
		(empty($instance['label_appearance']['font_weight'])) ?: $return['label_class'][] = $instance['label_appearance']['font_weight'];
		(empty($instance['label_appearance']['border_radius'])) ?: $return['label_class'][] = $instance['label_appearance']['border_radius'];

		$return['button_class'][] = 'eso-pricing-button';
		(empty($instance['button_appearance']['font_size'])) ?: $return['button_class'][] = $instance['button_appearance']['font_size'];
		(empty($instance['button_appearance']['font_weight'])) ?: $return['button_class'][] = $instance['button_appearance']['font_weight'];
		(empty($instance['button_appearance']['text_transform'])) ?: $return['button_class'][] = $instance['button_appearance']['text_transform'];

		// image
		$return['image'] = false;
		if ( ! empty( $instance['pricing']['image'] ) ) {
			$size = empty( $instance['pricing']['image_size'] ) ? 'full' : $instance['pricing']['image_size'];
			$attachment = wp_get_attachment_image_src( $instance['pricing']['image'], $size );
			if( !empty( $attachment ) ) {
				$return['image'] = sow_esc_url( $attachment[0] );
			}
		}

		return $return;
	}

	/*
	* Less Variables
	*/

	function get_less_variables($instance) {

		if ( isset($instance['title_appearance']) ) {
			$return['title_color'] = !empty( $instance['title_appearance']['color'] ) ? $instance['title_appearance']['color'] : false;
		}

		if ( isset($instance['sub_title_appearance']) ) {
			$return['sub_title_color'] = !empty( $instance['sub_title_appearance']['color'] ) ? $instance['sub_title_appearance']['color'] : false;
		}

		if ( isset($instance['price_appearance']) ) {
			$return['price_color'] = !empty( $instance['price_appearance']['color'] ) ? $instance['price_appearance']['color'] : false;
		}

		if ( isset($instance['label_appearance']) ) {
			$return['label_color'] = !empty( $instance['label_appearance']['color'] ) ? $instance['label_appearance']['color'] : false;
			$return['label_background'] = !empty( $instance['label_appearance']['background'] ) ? $instance['label_appearance']['background'] : false;
			$return['label_padding'] = !empty( $instance['label_appearance']['padding'] ) ? $instance['label_appearance']['padding'] : false;
		}

		if ( isset($instance['button_appearance']) ) {
			$return['button_color'] = !empty( $instance['button_appearance']['color'] ) ? $instance['button_appearance']['color'] : false;
			$return['button_hover_color'] = !empty( $instance['button_appearance']['color_hover'] ) ? $instance['button_appearance']['color_hover'] : false;
			$return['button_background'] = !empty( $instance['button_appearance']['background'] ) ? $instance['button_appearance']['background'] : false;
			$return['button_hover_background'] = !empty( $instance['button_appearance']['background_hover'] ) ? $instance['button_appearance']['background_hover'] : false;
			$return['button_padding'] = !empty( $instance['button_appearance']['padding'] ) ? $instance['button_appearance']['padding'] : false;
		}

		return $return;
	}

	/*
	* Form
	*/

	function get_widget_form() {

		$return['pricing'] = EsoWidgetFormCorePart::section('Settings', array(
			'title' => EsoWidgetFormCorePart::text('Title', 'The title to sue for the pricing card.', 'Medium Plan'),
			'sub_title' => EsoWidgetFormCorePart::text('Sub Title', 'The sub title to sue for the pricing card.', 'The medium plan is not to large or to small, its just right.'),
			'symbol' => EsoWidgetFormCorePart::text('Currency Symbol', 'The symbol to represent the currency.', '£'),
			'price' => EsoWidgetFormCorePart::number('Price', 'A number to represent the price.', 9.99),
			'link_text' => EsoWidgetFormCorePart::text('Link Text', 'The text for the cards footer link.', 'Purchase Plan'),
			'link_target' => EsoWidgetFormCorePart::link('Link Target', 'The target URL for the cards footer link.'),
			'label' => EsoWidgetFormCorePart::text('Label Text', 'The text for the cards label, leave blank for no label.', 'Best Value'),
			'image' => EsoWidgetFormCorePart::media('Image', 'An image to use with the card, leave blank for no image.'),
			'image_size' => EsoWidgetFormCorePart::image_size('Image Size', 'An image to use with the card, leave blank for no image.'),
			'padding' => EsoWidgetFormPart::uikit('padding', 'Inner Padding', '', 'uk-padding-medium')
		));

		$return['title_appearance'] = EsoWidgetFormCorePart::section('Title Appearance', array(
			'font_size' => EsoWidgetFormPart::uikit('font_size', '', '', 'uk-text-xlarge'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'margin_bottom' => EsoWidgetFormPart::uikit('margin_bottom', '', '', 'uk-margin-medium-bottom'),
			'color' => EsoWidgetFormCorePart::color('Color', 'The color for the title text.')
		));

		$return['sub_title_appearance'] = EsoWidgetFormCorePart::section('Sub Title Appearance', array(
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'margin_bottom' => EsoWidgetFormPart::uikit('margin_bottom', '', '', 'uk-margin-medium-bottom'),
			'color' => EsoWidgetFormCorePart::color('Color', 'The color for the sub title text.')
		));

		$return['price_appearance'] = EsoWidgetFormCorePart::section('Price Appearance', array(
			'font_size' => EsoWidgetFormPart::uikit('font_size', '', '', 'uk-text-xlarge'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'symbol_font_size' => EsoWidgetFormPart::uikit('font_size', 'Symbol Font Size', '', 'uk-text-large'),
			'symbol_font_weight' => EsoWidgetFormPart::uikit('font_weight', 'Symbol Font Weight'),
			'margin_bottom' => EsoWidgetFormPart::uikit('margin_bottom', '', '', 'uk-margin-medium-bottom'),
			'color' => EsoWidgetFormCorePart::color('Color', 'The color for the symbol and price text.')
		));

		$return['label_appearance'] = EsoWidgetFormCorePart::section('Label Appearance', array(
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'border_radius' => EsoWidgetFormPart::uikit('border_radius'),
			'color' => EsoWidgetFormCorePart::color('Color', 'The color for the label text.', EsoWidgetFormPart::default_color('inverse')),
			'background' => EsoWidgetFormPart::rgba('Background', 'The color for the label background.', EsoWidgetFormPart::default_color('primary')),
			'padding' => EsoWidgetFormCorePart::multi_measurement('Padding', 'The labels internal padding.', '5px 10px 5px 10px'),
		));

		$return['button_appearance'] = EsoWidgetFormCorePart::section('Button Appearance', array(
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
			'color' => EsoWidgetFormCorePart::color('Color', 'The color for the button text.', EsoWidgetFormPart::default_color('inverse')),
			'color_hover' => EsoWidgetFormCorePart::color('Text Hover Color', 'The color for the button text on hover.', EsoWidgetFormPart::default_color('inverse')),
			'background' => EsoWidgetFormCorePart::color('Background Color', 'The button background color.', EsoWidgetFormPart::default_color('primary')),
			'background_hover' => EsoWidgetFormCorePart::color('Background Hover Color', 'The button background color on hover.', EsoWidgetFormPart::default_color('primary')),
			'padding' => EsoWidgetFormCorePart::multi_measurement('Padding', 'The buttons internal padding.', '25px 0px 25px 0px'),
		));

		return $return;

	}

	/*
	* Instance modifications
	* The form changes over time
	*/

	function modify_instance( $instance )  {
		// update 2.1.0
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
		if ( isset( $instance['modifiers']['title_weight'] ) ) {
			$instance['sub_title_appearance']['font_weight'] = $instance['modifiers']['sub_title_weight'];
			unset($instance['modifiers']['sub_title_weight']);
		}
		if ( isset( $instance['modifiers']['price_size'] ) ) {
			$instance['price_appearance']['font_size'] = $instance['modifiers']['price_size'];
			unset($instance['modifiers']['price_size']);
		}
		if ( isset( $instance['modifiers']['price_weight'] ) ) {
			$instance['price_appearance']['font_weight'] = $instance['modifiers']['price_weight'];
			unset($instance['modifiers']['price_weight']);
		}
		if ( isset( $instance['modifiers']['symbol_size'] ) ) {
			$instance['price_appearance']['symbol_font_size'] = $instance['modifiers']['symbol_size'];
			unset($instance['modifiers']['symbol_size']);
		}
		if ( isset( $instance['modifiers']['symbol_weight'] ) ) {
			$instance['price_appearance']['symbol_font_weight'] = $instance['modifiers']['symbol_weight'];
			unset($instance['modifiers']['symbol_weight']);
		}
		// end 2.1.0
		return $instance;
	}

}

siteorigin_widget_register('echelonso-eso-pricing', __FILE__, 'EchelonSOEsoPricing');
