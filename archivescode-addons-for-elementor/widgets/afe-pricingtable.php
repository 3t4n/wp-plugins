<?php

namespace AfePricingtable\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 * AFE Widget: AFE Pricing Table
 * Description: Fancy Pricing Table awesome animation.
 * Author Name: Archivescode
 * Author URL: https://archivescode.com/about-us
 * Version: 1.0.0
 */
class Afe_Pricingtable extends Widget_Base {

	public function get_name() {
		return 'afe-pricing-table';
	}

	public function get_title() {
		return __( 'Afe Pricing Table', AFE_SLUG );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'archivescode' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_header',
			[
				'label' => __( 'Header', AFE_SLUG ),
			]
		);
		$this->add_control(
			'afe_header_element',
			[
				'label' => __( 'Front Element', AFE_SLUG ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'text' => [
						'title' => __( 'Text', AFE_SLUG ),
						'icon' => 'fa fa-ban',
					],
					'image' => [
						'title' => __( 'Image', AFE_SLUG ),
						'icon' => 'fa fa-picture-o',
					],
					'icon' => [
						'title' => __( 'Icon', AFE_SLUG ),
						'icon' => 'fa fa-star',
					],
				],
				'default' => 'text',
			]
		);
		$this->add_control(
			'afe_header_image',
			[
				'label' => __( 'Choose Image', AFE_SLUG ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'afe_header_element' => 'image',
				],
			]
		);
		$this->add_control(
			'afe_header_icon',
			[
				'label' => __( 'Icon', AFE_SLUG ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-send-o',
				'condition' => [
					'afe_header_element' => 'icon',
				],
			]
		);
		$this->add_control(
			'heading',
			[
				'label' => __( 'Title', AFE_SLUG ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Header Table', AFE_SLUG ),
				'condition' => [
					'afe_header_element' => 'text',
				],
			]
		);

		$this->add_control(
			'sub_heading',
			[
				'label' => __( 'Subtitle', AFE_SLUG ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Subtittle Table', AFE_SLUG ),
				'condition' => [
					'afe_header_element' => 'text',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_pricing',
			[
				'label' => __( 'Pricing', AFE_SLUG ),
			]
		);

		$this->add_control(
			'currency_symbol',
			[
				'label' => __( 'Currency Symbol', AFE_SLUG ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'None', AFE_SLUG ),
					'dollar' => '&#36; ' . _x( 'Dollar', 'Currency Symbol', AFE_SLUG ),
					'euro' => '&#128; ' . _x( 'Euro', 'Currency Symbol', AFE_SLUG ),
					'baht' => '&#3647; ' . _x( 'Baht', 'Currency Symbol', AFE_SLUG ),
					'franc' => '&#8355; ' . _x( 'Franc', 'Currency Symbol', AFE_SLUG ),
					'guilder' => '&fnof; ' . _x( 'Guilder', 'Currency Symbol', AFE_SLUG ),
					'krona' => 'kr ' . _x( 'Krona', 'Currency Symbol', AFE_SLUG ),
					'lira' => '&#8356; ' . _x( 'Lira', 'Currency Symbol', AFE_SLUG ),
					'peseta' => '&#8359 ' . _x( 'Peseta', 'Currency Symbol', AFE_SLUG ),
					'peso' => '&#8369; ' . _x( 'Peso', 'Currency Symbol', AFE_SLUG ),
					'pound' => '&#163; ' . _x( 'Pound Sterling', 'Currency Symbol', AFE_SLUG ),
					'real' => 'R$ ' . _x( 'Real', 'Currency Symbol', AFE_SLUG ),
					'ruble' => '&#8381; ' . _x( 'Ruble', 'Currency Symbol', AFE_SLUG ),
					'rupee' => '&#8360; ' . _x( 'Rupee', 'Currency Symbol', AFE_SLUG ),
					'indian_rupee' => '&#8377; ' . _x( 'Rupee (Indian)', 'Currency Symbol', AFE_SLUG ),
					'shekel' => '&#8362; ' . _x( 'Shekel', 'Currency Symbol', AFE_SLUG ),
					'yen' => '&#165; ' . _x( 'Yen/Yuan', 'Currency Symbol', AFE_SLUG ),
					'won' => '&#8361; ' . _x( 'Won', 'Currency Symbol', AFE_SLUG ),
					'custom' => __( 'Custom', AFE_SLUG ),
				],
				'default' => 'dollar',
			]
		);

		$this->add_control(
			'currency_symbol_custom',
			[
				'label' => __( 'Custom Symbol', AFE_SLUG ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'currency_symbol' => 'custom',
				],
			]
		);

		$this->add_control(
			'price',
			[
				'label' => __( 'Price', AFE_SLUG ),
				'type' => Controls_Manager::TEXT,
				'default' => '39.99',
			]
		);

		$this->add_control(
			'currency_format',
			[
				'label' => __( 'Currency Format', AFE_SLUG ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => '1,234.56 (Default)',
					',' => '1.234,56',
				],
			]
		);

		$this->add_control(
			'sale',
			[
				'label' => __( 'Sale', AFE_SLUG ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', AFE_SLUG ),
				'label_off' => __( 'Off', AFE_SLUG ),
				'default' => '',
			]
		);

		$this->add_control(
			'original_price',
			[
				'label' => __( 'Original Price', AFE_SLUG ),
				'type' => Controls_Manager::NUMBER,
				'default' => '59',
				'condition' => [
					'sale' => 'yes',
				],
			]
		);

		$this->add_control(
			'period',
			[
				'label' => __( 'Period', AFE_SLUG ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Monthly', AFE_SLUG ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_features',
			[
				'label' => __( 'Features', AFE_SLUG ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_text',
			[
				'label' => __( 'Text', AFE_SLUG ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Item', AFE_SLUG ),
			]
		);

		$repeater->add_control(
			'item_icon',
			[
				'label' => __( 'Icon', AFE_SLUG ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-check-circle',
			]
		);

		$repeater->add_control(
			'item_icon_color',
			[
				'label' => __( 'Icon Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'features_list',
			[
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'item_text' => __( 'List Item #1', AFE_SLUG ),
						'item_icon' => 'fa fa-check-circle',
					],
					[
						'item_text' => __( 'List Item #2', AFE_SLUG ),
						'item_icon' => 'fa fa-check-circle',
					],
					[
						'item_text' => __( 'List Item #3', AFE_SLUG ),
						'item_icon' => 'fa fa-check-circle',
					],
				],
				'title_field' => '{{{ item_text }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_footer',
			[
				'label' => __( 'Footer', AFE_SLUG ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', AFE_SLUG ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Click Here', AFE_SLUG ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', AFE_SLUG ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', AFE_SLUG ),
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->add_control(
			'footer_additional_info',
			[
				'label' => __( 'Additional Info', AFE_SLUG ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Custom Footer Text', AFE_SLUG ),
				'rows' => 2,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_ribbon',
			[
				'label' => __( 'Ribbon', AFE_SLUG ),
			]
		);

		$this->add_control(
			'show_ribbon',
			[
				'label' => __( 'Show', AFE_SLUG ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'ribbon_title',
			[
				'label' => __( 'Title', AFE_SLUG ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Featured', AFE_SLUG ),
				'condition' => [
					'show_ribbon' => 'yes',
				],
			]
		);

		$this->add_control(
			'ribbon_horizontal_position',
			[
				'label' => __( 'Horizontal Position', AFE_SLUG ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', AFE_SLUG ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => __( 'Right', AFE_SLUG ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'condition' => [
					'show_ribbon' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_header_style',
			[
				'label' => __( 'Header', AFE_SLUG ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'header_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .afe-table .afe-table_header',
			]
		);

		$this->add_responsive_control(
			'header_padding',
			[
				'label' => __( 'Padding', AFE_SLUG ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .afe-table_header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_heading_style',
			[
				'label' => __( 'Title', AFE_SLUG ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'afe_header_element' => 'text',
				],
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' => __( 'Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-table_heading' => 'color: {{VALUE}}',
				],
				'condition' => [
					'afe_header_element' => 'text',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .afe-table_heading',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'condition' => [
					'afe_header_element' => 'text',
				],
			]
		);

		$this->add_control(
			'heading_sub_heading_style',
			[
				'label' => __( 'Sub Title', AFE_SLUG ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'afe_header_element' => 'text',
				],
			]
		);

		$this->add_control(
			'sub_heading_color',
			[
				'label' => __( 'Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-table_subheading' => 'color: {{VALUE}}',
				],
				'condition' => [
					'afe_header_element' => 'text',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_heading_typography',
				'selector' => '{{WRAPPER}} .afe-table_subheading',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'condition' => [
					'afe_header_element' => 'text',
				],
			]
		);
		// end text style
		// start icon style
		$this->add_control(
			'afe_icon_color',
			[
				'label' => __( 'Icon Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'default' => '#95D059',
				'selectors' => [
					'{{WRAPPER}} .afe-table_icon .icon-box' => 'color: {{VALUE}}; border-color: {{VALUE}}',
				],
				'condition' => [
					'afe_header_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_background_color',
			[
				'label' => __( 'Icon Background', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .afe-table_icon .icon-box' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'afe_header_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_size',
			[
				'label' => __( 'Icon Size', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'em' => [
						'min' => 2,
						'max' => 100,
					],
				],
				'default'	=> [
					'size'	=> 3,
					'unit'	=> 'em',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_icon .icon-box i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'afe_header_element' => 'icon',
				],
			]
		);
		$this->add_control(
			'afe_icon_padding',
			[
				'label' => __( 'Icon Padding', AFE_SLUG ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .afe-table_icon .icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition' => [
					'afe_header_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_rotate',
			[
				'label' => __( 'Icon Rotate', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_icon i' => '-webkit-transform: rotate({{SIZE}}{{UNIT}});-moz-transform: rotate({{SIZE}}{{UNIT}});-o-transform: rotate({{SIZE}}{{UNIT}});-ms-transform: rotate({{SIZE}}{{UNIT}});transform: rotate({{SIZE}}{{UNIT}})',
				],
				'condition' => [
					'afe_header_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_border_width',
			[
				'label' => __( 'Border Width', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .afe-table_icon .icon-box' => 'border-width: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'afe_header_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_border_radius',
			[
				'label' => __( 'Border Radius', AFE_SLUG ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .afe-table_icon .icon-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition' => [
					'afe_header_element' => 'icon',
				],
			]
		);
		//end icon style
		//start image style
		$this->add_control(
			'afe_image_width',
			[
				'label' => __( 'Size (%)', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'default' => [
					'size'	=> 50,
					'unit' 	=> '%',
				],
				'range' => [
					'%' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_image .image-box' => 'width: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'afe_header_element' => 'image',
				],
			]
		);

		$this->add_control(
			'afe_image_opacity',
			[
				'label' => __( 'Opacity (%)', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_image .image-box' => 'opacity: {{SIZE}};',
				],
				'condition' => [
					'afe_header_element' => 'image',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'afe_image_border',
				'label' => __( 'Image Border', AFE_SLUG ),
				'selector' => '{{WRAPPER}} .afe-table_image .image-box img',
				'condition' => [
					'afe_header_element' => 'image',
				],
			]
		);

		$this->add_control(
			'afe_image_border_radius',
			[
				'label' => __( 'Border Radius', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_image .image-box img' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'afe_header_element' => 'image',
				],
			]
		);
		//end image style
		$this->end_controls_section();

		$this->start_controls_section(
			'section_pricing_element_style',
			[
				'label' => __( 'Pricing', AFE_SLUG ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);

		$this->add_control(
			'pricing_element_bg_color',
			[
				'label' => __( 'Background Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-table_price' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'pricing_element_padding',
			[
				'label' => __( 'Padding', AFE_SLUG ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .afe-table_price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'price_color',
			[
				'label' => __( 'Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-table_currency, {{WRAPPER}} .afe-table_integer-part, {{WRAPPER}} .afe-table_fractional-part' => 'color: {{VALUE}}',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .afe-table_price',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'heading_currency_style',
			[
				'label' => __( 'Currency Symbol', AFE_SLUG ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'currency_symbol!' => '',
				],
			]
		);

		$this->add_control(
			'currency_size',
			[
				'label' => __( 'Size', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_currency' => 'font-size: calc({{SIZE}}em/100)',
				],
				'condition' => [
					'currency_symbol!' => '',
				],
			]
		);

		$this->add_control(
			'currency_position',
			[
				'label' => __( 'Position', AFE_SLUG ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'default' => 'before',
				'options' => [
					'before' => [
						'title' => __( 'Before', AFE_SLUG ),
						'icon' => 'eicon-h-align-left',
					],
					'after' => [
						'title' => __( 'After', AFE_SLUG ),
						'icon' => 'eicon-h-align-right',
					],
				],
			]
		);

		$this->add_control(
			'currency_vertical_position',
			[
				'label' => __( 'Vertical Position', AFE_SLUG ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'top' => [
						'title' => __( 'Top', AFE_SLUG ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => __( 'Middle', AFE_SLUG ),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => __( 'Bottom', AFE_SLUG ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'top',
				'selectors_dictionary' => [
					'top' => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_currency' => 'align-self: {{VALUE}}',
				],
				'condition' => [
					'currency_symbol!' => '',
				],
			]
		);

		$this->add_control(
			'fractional_part_style',
			[
				'label' => __( 'Fractional Part', AFE_SLUG ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'fractional-part_size',
			[
				'label' => __( 'Size', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_fractional-part' => 'font-size: calc({{SIZE}}em/100)',
				],
			]
		);

		$this->add_control(
			'fractional_part_vertical_position',
			[
				'label' => __( 'Vertical Position', AFE_SLUG ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'top' => [
						'title' => __( 'Top', AFE_SLUG ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => __( 'Middle', AFE_SLUG ),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => __( 'Bottom', AFE_SLUG ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'top',
				'selectors_dictionary' => [
					'top' => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_after-price' => 'justify-content: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'heading_original_price_style',
			[
				'label' => __( 'Original Price', AFE_SLUG ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'sale' => 'yes',
					'original_price!' => '',
				],
			]
		);

		$this->add_control(
			'original_price_color',
			[
				'label' => __( 'Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_original-price' => 'color: {{VALUE}}',
				],
				'condition' => [
					'sale' => 'yes',
					'original_price!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'original_price_typography',
				'selector' => '{{WRAPPER}} .afe-table_original-price',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'condition' => [
					'sale' => 'yes',
					'original_price!' => '',
				],
			]
		);

		$this->add_control(
			'original_price_vertical_position',
			[
				'label' => __( 'Vertical Position', AFE_SLUG ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'top' => [
						'title' => __( 'Top', AFE_SLUG ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => __( 'Middle', AFE_SLUG ),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => __( 'Bottom', AFE_SLUG ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'selectors_dictionary' => [
					'top' => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'default' => 'bottom',
				'selectors' => [
					'{{WRAPPER}} .afe-table_original-price' => 'align-self: {{VALUE}}',
				],
				'condition' => [
					'sale' => 'yes',
					'original_price!' => '',
				],
			]
		);

		$this->add_control(
			'heading_period_style',
			[
				'label' => __( 'Period', AFE_SLUG ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'period!' => '',
				],
			]
		);

		$this->add_control(
			'period_color',
			[
				'label' => __( 'Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_period' => 'color: {{VALUE}}',
				],
				'condition' => [
					'period!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'period_typography',
				'selector' => '{{WRAPPER}} .afe-table_period',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'condition' => [
					'period!' => '',
				],
			]
		);

		$this->add_control(
			'period_position',
			[
				'label' => __( 'Position', AFE_SLUG ),
				'type' => Controls_Manager::SELECT,
				'label_block' => false,
				'options' => [
					'below' => __( 'Below', AFE_SLUG ),
					'beside' => __( 'Beside', AFE_SLUG ),
				],
				'default' => 'below',
				'condition' => [
					'period!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_features_list_style',
			[
				'label' => __( 'Features', AFE_SLUG ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);

		$this->add_control(
			'features_list_bg_color',
			[
				'label' => __( 'Background Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .afe-table_features-list' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'features_list_padding',
			[
				'label' => __( 'Padding', AFE_SLUG ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .afe-table_features-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'features_list_color',
			[
				'label' => __( 'Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .afe-table_features-list' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'features_list_typography',
				'selector' => '{{WRAPPER}} .afe-table_features-list li',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'features_list_alignment',
			[
				'label' => __( 'Alignment', AFE_SLUG ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', AFE_SLUG ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', AFE_SLUG ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', AFE_SLUG ),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_features-list' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'item_width',
			[
				'label' => __( 'Width', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 25,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_feature-inner' => 'margin-left: calc((100% - {{SIZE}}%)/2); margin-right: calc((100% - {{SIZE}}%)/2)',
				],
			]
		);

		$this->add_control(
			'list_divider',
			[
				'label' => __( 'Divider', AFE_SLUG ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'divider_style',
			[
				'label' => __( 'Style', AFE_SLUG ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'solid' => __( 'Solid', AFE_SLUG ),
					'double' => __( 'Double', AFE_SLUG ),
					'dotted' => __( 'Dotted', AFE_SLUG ),
					'dashed' => __( 'Dashed', AFE_SLUG ),
				],
				'default' => 'solid',
				'condition' => [
					'list_divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_features-list li:before' => 'border-top-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label' => __( 'Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ddd',
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'condition' => [
					'list_divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_features-list li:before' => 'border-top-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'divider_weight',
			[
				'label' => __( 'Weight', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 2,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 10,
					],
				],
				'condition' => [
					'list_divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_features-list li:before' => 'border-top-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'divider_width',
			[
				'label' => __( 'Width', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'condition' => [
					'list_divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_features-list li:before' => 'margin-left: calc((100% - {{SIZE}}%)/2); margin-right: calc((100% - {{SIZE}}%)/2)',
				],
			]
		);

		$this->add_control(
			'divider_gap',
			[
				'label' => __( 'Gap', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'condition' => [
					'list_divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_features-list li:before' => 'margin-top: {{SIZE}}{{UNIT}}; margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_footer_style',
			[
				'label' => __( 'Footer', AFE_SLUG ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);

		$this->add_control(
			'footer_bg_color',
			[
				'label' => __( 'Background Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-table_footer' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'footer_padding',
			[
				'label' => __( 'Padding', AFE_SLUG ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .afe-table_footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_footer_button',
			[
				'label' => __( 'Button', AFE_SLUG ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_size',
			[
				'label' => __( 'Size', AFE_SLUG ),
				'type' => Controls_Manager::SELECT,
				'default' => 'md',
				'options' => [
					'xs' => __( 'Extra Small', AFE_SLUG ),
					'sm' => __( 'Small', AFE_SLUG ),
					'md' => __( 'Medium', AFE_SLUG ),
					'lg' => __( 'Large', AFE_SLUG ),
					'xl' => __( 'Extra Large', AFE_SLUG ),
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', AFE_SLUG ),
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .afe-table_button' => 'color: {{VALUE}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .afe-table_button',
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label' => __( 'Background Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_button' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(), [
				'name' => 'button_border',
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .afe-table_button',
				'condition' => [
					'button_text!' => '',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', AFE_SLUG ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .afe-table_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_text_padding',
			[
				'label' => __( 'Text Padding', AFE_SLUG ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .afe-table_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', AFE_SLUG ),
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label' => __( 'Text Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-table_button:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-table_button:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-table_button:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_hover_animation',
			[
				'label' => __( 'Animation', AFE_SLUG ),
				'type' => Controls_Manager::HOVER_ANIMATION,
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'heading_additional_info',
			[
				'label' => __( 'Additional Info', AFE_SLUG ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'footer_additional_info!' => '',
				],
			]
		);

		$this->add_control(
			'additional_info_color',
			[
				'label' => __( 'Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_additional_info' => 'color: {{VALUE}}',
				],
				'condition' => [
					'footer_additional_info!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'additional_info_typography',
				'selector' => '{{WRAPPER}} .afe-table_additional_info',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'condition' => [
					'footer_additional_info!' => '',
				],
			]
		);

		$this->add_control(
			'additional_info_margin',
			[
				'label' => __( 'Margin', AFE_SLUG ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'top' => 15,
					'right' => 30,
					'bottom' => 0,
					'left' => 30,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_additional_info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition' => [
					'footer_additional_info!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_ribbon_style',
			[
				'label' => __( 'Ribbon', AFE_SLUG ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
				'condition' => [
					'show_ribbon' => 'yes',
				],
			]
		);

		$this->add_control(
			'ribbon_bg_color',
			[
				'label' => __( 'Background Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_ribbon-inner' => 'background-color: {{VALUE}}',
				],
			]
		);

		$ribbon_distance_transform = is_rtl() ? 'translateY(-50%) translateX({{SIZE}}{{UNIT}}) rotate(-45deg)' : 'translateY(-50%) translateX(-50%) translateX({{SIZE}}{{UNIT}}) rotate(-45deg)';

		$this->add_responsive_control(
			'ribbon_distance',
			[
				'label' => __( 'Distance', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-table_ribbon-inner' => 'margin-top: {{SIZE}}{{UNIT}}; transform: ' . $ribbon_distance_transform,
				],
			]
		);

		$this->add_control(
			'ribbon_text_color',
			[
				'label' => __( 'Text Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .afe-table_ribbon-inner' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ribbon_typography',
				'selector' => '{{WRAPPER}} .afe-table_ribbon-inner',
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .afe-table_ribbon-inner',
			]
		);

		$this->end_controls_section();
	}

	private function render_currency_symbol( $symbol, $location ) {
		$currency_position = $this->get_settings( 'currency_position' );
		$location_setting = ! empty( $currency_position ) ? $currency_position : 'before';
		if ( ! empty( $symbol ) && $location === $location_setting ) {
			echo '<span class="afe-table_currency afe-currency-' . $location . '">' . $symbol . '</span>';
		}
	}

	private function get_currency_symbol( $symbol_name ) {
		$symbols = [
			'dollar' => '&#36;',
			'euro' => '&#128;',
			'franc' => '&#8355;',
			'pound' => '&#163;',
			'ruble' => '&#8381;',
			'shekel' => '&#8362;',
			'baht' => '&#3647;',
			'yen' => '&#165;',
			'won' => '&#8361;',
			'guilder' => '&fnof;',
			'peso' => '&#8369;',
			'peseta' => '&#8359',
			'lira' => '&#8356;',
			'rupee' => '&#8360;',
			'indian_rupee' => '&#8377;',
			'real' => 'R$',
			'krona' => 'kr',
		];
		return isset( $symbols[ $symbol_name ] ) ? $symbols[ $symbol_name ] : '';
	}

	protected function render() {
		$settings = $this->get_settings();
		$symbol = '';

		if ( ! empty( $settings['currency_symbol'] ) ) {
			if ( 'custom' !== $settings['currency_symbol'] ) {
				$symbol = $this->get_currency_symbol( $settings['currency_symbol'] );
			} else {
				$symbol = $settings['currency_symbol_custom'];
			}
		}
		$currency_format = empty( $settings['currency_format'] ) ? '.' : $settings['currency_format'];
		$price = explode( $currency_format, $settings['price'] );
		$intpart = $price[0];
		$fraction = '';
		if ( 2 === count( $price ) ) {
			$fraction = $price[1];
		}

		$this->add_render_attribute( 'button_text', 'class', [
			'afe-table_button',
			'afe-btn',
			'afe-size-' . $settings['button_size'],
		] );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'button_text', 'href', $settings['link']['url'] );

			if ( ! empty( $settings['link']['is_external'] ) ) {
				$this->add_render_attribute( 'button_text', 'target', '_blank' );
			}
		}

		if ( ! empty( $settings['button_hover_animation'] ) ) {
			$this->add_render_attribute( 'button_text', 'class', 'afe-animation-' . $settings['button_hover_animation'] );
		}

		$this->add_render_attribute( 'afe_header_icon', 'class', 'afe-table_icon' );
		$this->add_render_attribute( 'afe_header_image', 'class', 'afe-table_image' );
		$this->add_render_attribute( 'heading', 'class', 'afe-table_heading' );
		$this->add_render_attribute( 'sub_heading', 'class', 'afe-table_subheading' );
		$this->add_render_attribute( 'period', 'class', ['afe-table_period', 'afe-typo-excluded'] );
		$this->add_render_attribute( 'footer_additional_info', 'class', 'afe-table_additional_info' );
		$this->add_render_attribute( 'ribbon_title', 'class', 'afe-table_ribbon-inner' );

		$this->add_inline_editing_attributes( 'heading', 'none' );
		$this->add_inline_editing_attributes( 'sub_heading', 'none' );
		$this->add_inline_editing_attributes( 'period', 'none' );
		$this->add_inline_editing_attributes( 'footer_additional_info' );
		$this->add_inline_editing_attributes( 'button_text' );
		$this->add_inline_editing_attributes( 'ribbon_title' );

		$period_position = $settings['period_position'];
		$period_element = '<span ' . $this->get_render_attribute_string( 'period' ) . '>' . $settings['period'] . '</span>';
		?>

		<div class="afe-table">
			<?php if ( 'text' === $settings['afe_header_element'] ) : ?>
				<?php if ( $settings['heading'] || $settings['sub_heading'] ) : ?>
					<div class="afe-table_header">
						<?php if ( ! empty( $settings['heading'] ) ) : ?>
							<h3 <?php echo $this->get_render_attribute_string( 'heading' ); ?>><?php echo $settings['heading']; ?></h3>
						<?php endif; ?>

						<?php if ( ! empty( $settings['sub_heading'] ) ) : ?>
							<span <?php echo $this->get_render_attribute_string( 'sub_heading' ); ?>><?php echo $settings['sub_heading']; ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			<?php if ( 'icon' === $settings['afe_header_element'] ) : ?>
				<?php if ( $settings['afe_header_icon']) : ?>
					<div class="afe-table_header">
						<div <?php echo $this->get_render_attribute_string( 'afe_header_icon' ); ?>>
							<div class="icon-box">
								<i class="<?php echo $settings['afe_header_icon']; ?>"></i>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( 'image' === $settings['afe_header_element'] ) : ?>
				<?php if ( $settings['afe_header_image']) : ?>
					<div class="afe-table_header">
						<div <?php echo $this->get_render_attribute_string( 'afe_header_image' ); ?>><div class="image-box"><img src="<?php echo $settings['afe_header_image']['url']; ?>" /></div></div>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<div class="afe-table_price">
				<?php if ( 'yes' === $settings['sale'] && ! empty( $settings['original_price'] ) ) : ?>
					<div class="afe-table_original-price afe-typo-excluded"><?php echo $symbol . $settings['original_price']; ?></div>
				<?php endif; ?>
				<?php $this->render_currency_symbol( $symbol, 'before' ); ?>
				<?php if ( ! empty( $intpart ) || 0 <= $intpart ) : ?>
					<span class="afe-table_integer-part"><?php echo $intpart; ?></span>
				<?php endif; ?>

				<?php if ( '' !== $fraction || ( ! empty( $settings['period'] ) && 'beside' === $period_position ) ) : ?>
					<div class="afe-table_after-price">
						<span class="afe-table_fractional-part"><?php echo $fraction; ?></span>

						<?php if ( ! empty( $settings['period'] ) && 'beside' === $period_position ) : ?>
							<?php echo $period_element; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php $this->render_currency_symbol( $symbol, 'after' ); ?>

				<?php if ( ! empty( $settings['period'] ) && 'below' === $period_position ) : ?>
					<?php echo $period_element; ?>
				<?php endif; ?>
			</div>

			<?php if ( ! empty( $settings['features_list'] ) ) : ?>
				<ul class="afe-table_features-list">
					<?php foreach ( $settings['features_list'] as $index => $item ) :
						$repeater_setting_key = $this->get_repeater_setting_key( 'item_text', 'features_list', $index );
						$this->add_inline_editing_attributes( $repeater_setting_key );
						?>
						<li class="afe-repeater-item-<?php echo $item['_id']; ?>">
							<div class="afe-table_feature-inner">
								<?php if ( ! empty( $item['item_icon'] ) ) : ?>
									<i class="<?php echo esc_attr( $item['item_icon'] ); ?>" aria-hidden="true"></i>
								<?php endif; ?>
								<?php if ( ! empty( $item['item_text'] ) ) : ?>
									<span <?php echo $this->get_render_attribute_string( $repeater_setting_key ); ?>>
										<?php echo $item['item_text']; ?>
									</span>
								<?php else :
									echo '&nbsp;';
								endif;
								?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ( ! empty( $settings['button_text'] ) || ! empty( $settings['footer_additional_info'] ) ) : ?>
			<div class="afe-table_footer">
				<?php if ( ! empty( $settings['button_text'] ) ) : ?>
					<a <?php echo $this->get_render_attribute_string( 'button_text' ); ?>><?php echo $settings['button_text']; ?></a>
				<?php endif; ?>

				<?php if ( ! empty( $settings['footer_additional_info'] ) ) : ?>
					<div <?php echo $this->get_render_attribute_string( 'footer_additional_info' ); ?>><?php echo $settings['footer_additional_info']; ?></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>

	<?php if ( 'yes' === $settings['show_ribbon'] && ! empty( $settings['ribbon_title'] ) ) :
		$this->add_render_attribute( 'ribbon-wrapper', 'class', 'afe-table_ribbon' );

		if ( ! empty( $settings['ribbon_horizontal_position'] ) ) :
			$this->add_render_attribute( 'ribbon-wrapper', 'class', 'ribbon-' . $settings['ribbon_horizontal_position'] );
		endif;

		?>
		<div <?php echo $this->get_render_attribute_string( 'ribbon-wrapper' ); ?>>
			<div <?php echo $this->get_render_attribute_string( 'ribbon_title' ); ?>><?php echo $settings['ribbon_title']; ?></div>
		</div>
	<?php endif;
}

protected function _content_template() {
	?>
	<#
	var symbols = {
	dollar: '&#36;',
	euro: '&#128;',
	franc: '&#8355;',
	pound: '&#163;',
	ruble: '&#8381;',
	shekel: '&#8362;',
	baht: '&#3647;',
	yen: '&#165;',
	won: '&#8361;',
	guilder: '&fnof;',
	peso: '&#8369;',
	peseta: '&#8359;',
	lira: '&#8356;',
	rupee: '&#8360;',
	indian_rupee: '&#8377;',
	real: 'R$',
	krona: 'kr'
};

var symbol = '';

if ( settings.currency_symbol ) {
if ( 'custom' !== settings.currency_symbol ) {
symbol = symbols[ settings.currency_symbol ] || '';
} else {
symbol = settings.currency_symbol_custom;
}
}

var buttonClasses = 'afe-table_button afe-btn afe-size-' + settings.button_size;

if ( settings.button_hover_animation ) {
buttonClasses += ' afe-animation-' + settings.button_hover_animation;
}

view.addRenderAttribute( 'afe_header_icon', 'class', 'afe-table_icon' );
view.addRenderAttribute( 'afe_header_image', 'class', 'afe-table_image' );
view.addRenderAttribute( 'heading', 'class', 'afe-table_heading' );
view.addRenderAttribute( 'sub_heading', 'class', 'afe-table_subheading' );
view.addRenderAttribute( 'period', 'class', ['afe-table_period', 'afe-typo-excluded'] );
view.addRenderAttribute( 'footer_additional_info', 'class', 'afe-table_additional_info'  );
view.addRenderAttribute( 'button_text', 'class', buttonClasses  );
view.addRenderAttribute( 'ribbon_title', 'class', 'afe-table_ribbon-inner'  );

view.addInlineEditingAttributes( 'heading', 'none' );
view.addInlineEditingAttributes( 'sub_heading', 'none' );
view.addInlineEditingAttributes( 'period', 'none' );
view.addInlineEditingAttributes( 'footer_additional_info' );
view.addInlineEditingAttributes( 'button_text' );
view.addInlineEditingAttributes( 'ribbon_title' );

var currencyFormat = settings.currency_format || '.',
price = settings.price.split( currencyFormat ),
intpart = price[0],
fraction = price[1],

periodElement = '<span ' + view.getRenderAttributeString( "period" ) + '>' + settings.period + '</span>';


#>
<div class="afe-table">
	<# if ('text' == settings.afe_header_element ) { #>
		<# if ( settings.heading || settings.sub_heading ) { #>
		<div class="afe-table_header">
			<# if ( settings.heading ) { #>
			<h3 {{{ view.getRenderAttributeString( 'heading' ) }}}>{{{ settings.heading }}}</h3>
			<# } #>
			<# if ( settings.sub_heading ) { #>
			<span {{{ view.getRenderAttributeString( 'sub_heading' ) }}}>{{{ settings.sub_heading }}}</span>
			<# } #>
		</div>
		<# } #>
	<# } #>

	<# if ('icon' == settings.afe_header_element ) { #>
		<# if ( settings.afe_header_icon ) { #>
			<div class="afe-table_header">
				<div {{{ view.getRenderAttributeString( 'afe_header_icon' ) }}}>
					<div class="icon-box">
						<i class="{{{ settings.afe_header_icon }}}"></i>
					</div>
				</div>
			</div>
		<# } #>
	<# } #>
	<# if ('image' == settings.afe_header_element ) { #>
		<# if ( settings.afe_header_image ) { #>
			<div class="afe-table_header">
				<div {{{ view.getRenderAttributeString( 'afe_header_image' ) }}}>
					<div class="image-box">
						<img src="{{{ settings.afe_header_image.url }}}" />
					</div>
				</div>
			</div>
		<# } #>
	<# } #>

	<div class="afe-table_price">
		<# if ( settings.sale && settings.original_price ) { #>
		<div class="afe-table_original-price afe-typo-excluded">{{{ symbol + settings.original_price }}}</div>
		<# } #>

		<# if ( ! _.isEmpty( symbol ) && ( 'before' == settings.currency_position || _.isEmpty( settings.currency_position ) ) ) { #>
		<span class="afe-table_currency afe-currency-before">{{{ symbol }}}</span>
		<# } #>
		<# if ( intpart ) { #>
		<span class="afe-table_integer-part">{{{ intpart }}}</span>
		<# } #>
		<div class="afe-table_after-price">
			<# if ( fraction ) { #>
			<span class="afe-table_fractional-part">{{{ fraction }}}</span>
			<# } #>
			<# if ( settings.period && 'beside' === settings.period_position ) { #>
			{{{ periodElement }}}
			<# } #>
		</div>

		<# if ( ! _.isEmpty( symbol ) && 'after' == settings.currency_position ) { #>
		<span class="afe-table_currency afe-currency-after">{{{ symbol }}}</span>
		<# } #>

		<# if ( settings.period && 'below' === settings.period_position ) { #>
		{{{ periodElement }}}
		<# } #>
	</div>

	<# if ( settings.features_list ) { #>
	<ul class="afe-table_features-list">
		<# _.each( settings.features_list, function( item, index ) {

		var featureKey = view.getRepeaterSettingKey( 'item_text', 'features_list', index );

		view.addInlineEditingAttributes( featureKey ); #>

		<li class="afe-repeater-item-{{ item._id }}">
			<div class="afe-table_feature-inner">
				<# if ( item.item_icon ) { #>
				<i class="{{ item.item_icon }}" aria-hidden="true"></i>
				<# } #>
				<# if ( ! _.isEmpty( item.item_text.trim() ) ) { #>
				<span {{{ view.getRenderAttributeString( featureKey ) }}}>{{{ item.item_text }}}</span>
				<# } else { #>
				&nbsp;
				<# } #>
			</div>
		</li>
		<# } ); #>
	</ul>
	<# } #>

	<# if ( settings.button_text || settings.footer_additional_info ) { #>
	<div class="afe-table_footer">
		<# if ( settings.button_text ) { #>
		<a href="#" {{{ view.getRenderAttributeString( 'button_text' ) }}}>{{{ settings.button_text }}}</a>
		<# } #>
		<# if ( settings.footer_additional_info ) { #>
		<p {{{ view.getRenderAttributeString( 'footer_additional_info' ) }}}>{{{ settings.footer_additional_info }}}</p>
		<# } #>
	</div>
	<# } #>   
</div>

<# if ( 'yes' === settings.show_ribbon && settings.ribbon_title ) {
var ribbonClasses = 'afe-table_ribbon';
if ( settings.ribbon_horizontal_position ) {
ribbonClasses += ' ribbon-' + settings.ribbon_horizontal_position;
} #>
<div class="{{ ribbonClasses }}">
	<div {{{ view.getRenderAttributeString( 'ribbon_title' ) }}}>{{{ settings.ribbon_title }}}</div>
</div>
<# } #>
<?php
}
}
return __NAMESPACE__."\\Afe_Pricingtable";