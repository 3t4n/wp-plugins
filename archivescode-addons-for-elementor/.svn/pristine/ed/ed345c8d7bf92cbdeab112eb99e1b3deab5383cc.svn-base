<?php

namespace AfeFlipbox\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 * AFE Widget: AFE Fancy Flip Box
 * Description: Fancy flip box with awesome animation.
 * Author Name: Archivescode
 * Author URL: https://archivescode.com/about-us
 * Version: 1.0.0
 */

class Afe_Flipbox extends Widget_Base {

	public function get_name() {
		return 'afe-flipbox';
	}

	public function get_title() {
		return __( 'AFE Flipbox', AFE_SLUG );
	}

	public function get_icon() {
		return 'eicon-flip-box';
	}

	public function get_categories() {
		return [ 'archivescode' ];
	}
	protected function _register_controls() {
		$this->start_controls_section(
	        'section_box_setting',
	        [ 'label' => __( 'Settings', AFE_SLUG ), ]
	    );

	    $this->add_control(
			'afe_flipbox_effect',
			[
				'label' => __( 'Flip Effect', AFE_SLUG ),
				'type' => Controls_Manager::SELECT,
				'default' => 'flip',
				'options' => [
					'flip' => 'Flip',
					'slide' => 'Slide',
					'push' => 'Push',
					'zoom-in' => 'Zoom In',
					'zoom-out' => 'Zoom Out',
					'fade' => 'Fade',
					'cube' => 'Cube (pro version)',
					'cube-3d' => 'Cube 3D (pro version)',
					'cover' => 'Cover (pro version)',
				],
				'prefix_class' => 'afe-flipbox-effect-',
			]
		);
		$this->add_control(
			'afe_flipbox_direction',
			[
				'label' => __( 'Flip Direction', AFE_SLUG ),
				'type' => Controls_Manager::SELECT,
				'default' => 'right',
				'options' => [
					'left' => __( 'Left', AFE_SLUG ),
					'right' => __( 'Right', AFE_SLUG ),
					'up' => __( 'Up', AFE_SLUG ),
					'down' => __( 'Down', AFE_SLUG ),
				],
				'condition' => [
					'afe_flipbox_effect!' => [
							'fade',
							'zoom-in',
							'zoom-out',
						],
				],
				'prefix_class' => 'afe-flipbox-direction-',
			]
		);
	    $this->add_responsive_control(
			'afe_flipbox_height',
			[
				'label' => __( 'Height', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000,
					],
					'vh' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default' => [
		            'size' => 400,
		            'unit' => 'px',
		        ],
				'size_units' => [ 'px', 'vh' ],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-front-overlay' => 'height: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-overlay' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);		
	    
	    $this->end_controls_section();

	    //start front content
	    $this->start_controls_section(
			'afe_section_front_content',
			[
				'label' => __( 'Front', AFE_SLUG ),
			]
		);
		$this->start_controls_tabs( 'afe_front_content_tabs' );

		$this->start_controls_tab( 'afe_front_content_tab', [ 'label' => __( 'Content', AFE_SLUG ) ] );
		$this->add_control(
			'afe_front_element',
			[
				'label' => __( 'Front Element', AFE_SLUG ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'none' => [
						'title' => __( 'None', AFE_SLUG ),
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
				'default' => 'icon',
			]
		);
		$this->add_control(
			'afe_front_image',
			[
				'label' => __( 'Choose Image', AFE_SLUG ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'afe_front_element' => 'image',
				],
			]
		);
		$this->add_control(
			'afe_front_icon',
			[
				'label' => __( 'Icon', AFE_SLUG ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-send-o',
				'condition' => [
					'afe_front_element' => 'icon',
				],
			]
		);
		$this->add_control(
			'afe_title_front',
			[
				'label' => __( 'Title & Description', AFE_SLUG ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'This is the heading', AFE_SLUG ),
				'placeholder' => __( 'Your Title', AFE_SLUG ),
				'label_block' => true,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'afe_description_front',
			[
				'label' => __( 'Description', AFE_SLUG ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', AFE_SLUG ),
				'placeholder' => __( 'Your Description', AFE_SLUG ),
				'title' => __( 'Input image text here', AFE_SLUG ),
				'separator' => 'none',
				'rows' => 10,
				'show_label' => false,
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab( 'afe_front_background_tab', [ 'label' => __( 'Background', AFE_SLUG ) ] );
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'afe_background_front',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front',
			]
		);
		$this->add_control(
			'afe_background_overlay_front',
			[
				'label' => __( 'Background Overlay', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-front-overlay' => 'background-color: {{VALUE}};',
				],
				'separator' => 'before',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_background_front_image[id]',
							'operator' => '!=',
							'value' => '',
						],
						[
							'name' => 'afe_background_front_background',
							'operator' => '!=',
							'value' => 'gradient',
						],
					],
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		//end front content
		//start back content
		$this->start_controls_section(
			'afe_section_back_content',
			[
				'label' => __( 'Back', AFE_SLUG ),
			]
		);

		$this->start_controls_tabs( 'afe_back_content_tabs' );

		$this->start_controls_tab( 'afe_back_content_tab', [ 'label' => __( 'Content', AFE_SLUG ) ] );
		$this->add_control(
			'afe_back_element',
			[
				'label' => __( 'Front Element', AFE_SLUG ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'none' => [
						'title' => __( 'None', AFE_SLUG ),
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
				'default' => 'none',
			]
		);
		$this->add_control(
			'afe_back_image',
			[
				'label' => __( 'Choose Image', AFE_SLUG ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'afe_back_element' => 'image',
				],
			]
		);
		$this->add_control(
			'afe_back_icon',
			[
				'label' => __( 'Icon', AFE_SLUG ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-star',
				'condition' => [
					'afe_back_element' => 'icon',
				],
			]
		);
		$this->add_control(
			'afe_title_back',
			[
				'label' => __( 'Title & Description', AFE_SLUG ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'This is the heading', AFE_SLUG ),
				'placeholder' => __( 'Your Title', AFE_SLUG ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'afe_description_back',
			[
				'label' => __( 'Description', AFE_SLUG ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', AFE_SLUG ),
				'placeholder' => __( 'Your Description', AFE_SLUG ),
				'title' => __( 'Input image text here', AFE_SLUG ),
				'separator' => 'none',
				'rows' => 10,
				'show_label' => false,
			]
		);

		$this->add_control(
			'afe_button_text',
			[
				'label' => __( 'Button Text', AFE_SLUG ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Click Here', AFE_SLUG ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'afe_link',
			[
				'label' => __( 'Link', AFE_SLUG ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'http://your-link.com', AFE_SLUG ),
			]
		);

		$this->add_control(
			'afe_link_click',
			[
				'label' => __( 'Apply Link On', AFE_SLUG ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'box' => __( 'Whole Box', AFE_SLUG ),
					'button' => __( 'Button Only', AFE_SLUG ),
				],
				'default' => 'button',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_link[url]',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'afe_back_background_tab', [ 'label' => __( 'Background', AFE_SLUG ) ] );

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'afe_background_back',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back',
			]
		);

		$this->add_control(
			'afe_background_overlay_back',
			[
				'label' => __( 'Background Overlay', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-overlay' => 'background-color: {{VALUE}};',
				],
				'separator' => 'before',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_background_back_image[id]',
							'operator' => '!=',
							'value' => '',
						],
						[
							'name' => 'afe_background_back',
							'operator' => '!=',
							'value' => 'gradient',
						],
					],
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		//end back content

	    // end control content

		// begin control style front
		$this->start_controls_section(
			'afe_section_style_front',
			[
				'label' => __( 'Front', AFE_SLUG ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'afe_padding_front',
			[
				'label' => __( 'Padding', AFE_SLUG ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-front-overlay' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'afe_alignment_front',
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-front-overlay .afe-flipbox-front-content' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'afe_vertical_position_front',
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
				'default'	=> 'middle',
				'selectors_dictionary' => [
					'top' => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-front-overlay' => 'align-items: {{VALUE}}',
				],
				'separator' => 'after',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'afe_border_front',
				'selector' => '{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'afe_heading_image_front_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Image', AFE_SLUG ),
				'condition' => [
					'afe_front_element' => 'image',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'afe_image_front_spacing',
			[
				'label' => __( 'Spacing', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-image-front' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'afe_front_element' => 'image',
				],
			]
		);

		$this->add_control(
			'afe_image_front_width',
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
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-image-front' => 'width: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'afe_front_element' => 'image',
				],
			]
		);

		$this->add_control(
			'afe_image_front_opacity',
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
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-image-front' => 'opacity: {{SIZE}};',
				],
				'condition' => [
					'afe_front_element' => 'image',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'afe_image_front_border',
				'label' => __( 'Image Border', AFE_SLUG ),
				'selector' => '{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-image-front img',
				'condition' => [
					'afe_front_element' => 'image',
				],
			]
		);

		$this->add_control(
			'afe_image_front_border_radius',
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
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-image-front img' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'afe_front_element' => 'image',
				],
			]
		);

		$this->add_control(
			'afe_heading_icon_front_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Icon', AFE_SLUG ),
				'condition' => [
					'afe_front_element' => 'icon',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'afe_icon_front_spacing',
			[
				'label' => __( 'Spacing', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'	=> [
					'size'	=> 10,
					'unit'	=> 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-icon-front' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'afe_front_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_front_color',
			[
				'label' => __( 'Icon Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'default' => '#95D059',
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-icon-front' => 'color: {{VALUE}}; border-color: {{VALUE}}',
				],
				'condition' => [
					'afe_front_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_front_background_color',
			[
				'label' => __( 'Icon Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-icon-front' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'afe_front_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_front_size',
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
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-icon-front' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'afe_front_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_front_padding',
			[
				'label' => __( 'Icon Padding', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-icon-front' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default'	=> [
					'size'	=> 30,
					'unit'	=> 'px',
				],
				'condition' => [
					'afe_front_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_front_rotate',
			[
				'label' => __( 'Icon Rotate', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-icon-front i' => '-webkit-transform: rotate({{SIZE}}{{UNIT}});-moz-transform: rotate({{SIZE}}{{UNIT}});-o-transform: rotate({{SIZE}}{{UNIT}});-ms-transform: rotate({{SIZE}}{{UNIT}});transform: rotate({{SIZE}}{{UNIT}})',
				],
				'condition' => [
					'afe_front_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_front_border_width',
			[
				'label' => __( 'Border Width', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-icon-front' => 'border-width: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'afe_front_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_front_border_radius',
			[
				'label' => __( 'Border Radius', AFE_SLUG ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-icon-front' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition' => [
					'afe_front_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_heading_title_style_front',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Title', AFE_SLUG ),
				'separator' => 'before',
				'condition' => [
					'afe_title_front!' => '',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_title_front',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_title_spacing_front',
			[
				'label' => __( 'Spacing', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'	=> [
					'size'	=> 5,
					'unit'	=> 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-title-front' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_description_front',
							'operator' => '!=',
							'value' => '',
						],
						[
							'name' => 'afe_title_front',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_title_color_front',
			[
				'label' => __( 'Text Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-title-front' => 'color: {{VALUE}}',

				],
				'default'	=> '#ffffff',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_title_front',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'afe_title_typography_front',
				'label' => __( 'Typography', AFE_SLUG ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-title-front',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_title_front',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_heading_description_style_front',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Description', AFE_SLUG ),
				'separator' => 'before',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_description_front',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_description_color_front',
			[
				'label' => __( 'Text Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-description-front' => 'color: {{VALUE}}',
				],
				'default'	=> '#ffffff',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_description_front',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'afe_description_typography_front',
				'label' => __( 'Typography', AFE_SLUG ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-front .afe-flipbox-description-front',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_description_front',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->end_controls_section();
		//end style front
		$this->start_controls_section(
			'afe_section_style_back',
			[
				'label' => __( 'Back', AFE_SLUG ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'afe_padding_back',
			[
				'label' => __( 'Padding', AFE_SLUG ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-overlay' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'afe_alignment_back',
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-overlay' => 'text-align: {{VALUE}}',
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-button' => 'margin-{{VALUE}}: 0',
				],
			]
		);

		$this->add_control(
			'afe_vertical_position_back',
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
				'default' => 'center',
				'selectors_dictionary' => [
					'top' => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-overlay' => 'align-items: {{VALUE}}',
				],
				'separator' => 'after',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'afe_border_back',
				'selector' => '{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'afe_heading_image_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Image', AFE_SLUG ),
				'condition' => [
					'afe_back_element' => 'image',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'afe_image_back_spacing',
			[
				'label' => __( 'Spacing', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'	=> [
					'size'	=> 5,
					'unit'	=> 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-image-back' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'afe_back_element' => 'image',
				],
			]
		);

		$this->add_control(
			'afe_image_back_width',
			[
				'label' => __( 'Size (%)', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'default' => [
					'size'	=> '50',
					'unit' => '%',
				],
				'range' => [
					'%' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-image-back' => 'width: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'afe_back_element' => 'image',
				],
			]
		);

		$this->add_control(
			'afe_image_back_opacity',
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
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-image-back' => 'opacity: {{SIZE}};',
				],
				'condition' => [
					'afe_back_element' => 'image',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'afe_image_back_border',
				'label' => __( 'Image Border', AFE_SLUG ),
				'selector' => '{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-image-back img',
				'condition' => [
					'afe_back_element' => 'image',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'afe_image_back_border_radius',
			[
				'label' => __( 'Border Radius', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'	=> [
					'size'	=> 0,
					'unit'	=> '%',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-image-back img' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'afe_back_element' => 'image',
				],
			]
		);

		$this->add_control(
			'afe_heading_icon_back_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Icon', AFE_SLUG ),
				'condition' => [
					'afe_back_element' => 'icon',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'afe_icon_back_spacing',
			[
				'label' => __( 'Spacing', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-icon-back' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'afe_back_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_back_primary_color',
			[
				'label' => __( 'Icon & Border Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'default' => '#95D059',
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-icon-back' => 'color: {{VALUE}}; border-color: {{VALUE}}',
				],
				'condition' => [
					'afe_back_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_back_background_color',
			[
				'label' => __( 'Icon Background Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-icon-back' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'afe_back_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_back_size',
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
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-icon-back' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'afe_back_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_back_padding',
			[
				'label' => __( 'Icon Padding', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-icon-back' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'	=> [
					'size'	=> 30,
					'unit'	=> 'px',
				],
				'condition' => [
					'afe_back_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_back_rotate',
			[
				'label' => __( 'Icon Rotate', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-icon-back i' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
				'condition' => [
					'afe_back_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_back_border_width',
			[
				'label' => __( 'Border Width', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-icon-back' => 'border-width: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'afe_back_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'afe_icon_back_border_radius',
			[
				'label' => __( 'Border Radius', AFE_SLUG ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-back-icon-back' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'afe_back_element' => 'icon',
				],
			]
		);
		$this->add_control(
			'afe_heading_title_style_back',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Title', AFE_SLUG ),
				'separator' => 'before',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_title_back',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_title_spacing_back',
			[
				'label' => __( 'Spacing', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-title-back' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_title_back',
							'operator' => '!=',
							'value' => '',
						],
						[
							'name' => 'afe_description_back',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_title_color_back',
			[
				'label' => __( 'Text Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'default'	=> '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-title-back' => 'color: {{VALUE}}',

				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_title_back',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'afe_title_typography_back',
				'label' => __( 'Typography', AFE_SLUG ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-title-back',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_title_back',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_heading_description_style_back',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Description', AFE_SLUG ),
				'separator' => 'before',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_description_back',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_description_spacing_back',
			[
				'label' => __( 'Spacing', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'	=> [
					'size'	=> 5,
					'unit'	=> 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-description-back' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_description_back',
							'operator' => '!=',
							'value' => '',
						],
						[
							'name' => 'afe_button_text',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_description_color_back',
			[
				'label' => __( 'Text Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-description-back' => 'color: {{VALUE}}',

				],
				'default'	=> '#ffffff',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_description_back',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'afe_description_typography_back',
				'label' => __( 'Typography', AFE_SLUG ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-description-back',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_description_back',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_heading_button',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Button', AFE_SLUG ),
				'separator' => 'before',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_button_text',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_button_size',
			[
				'label' => __( 'Size', AFE_SLUG ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => [
					'xs' => __( 'Extra Small', AFE_SLUG ),
					'sm' => __( 'Small', AFE_SLUG ),
					'md' => __( 'Medium', AFE_SLUG ),
					'lg' => __( 'Large', AFE_SLUG ),
					'xl' => __( 'Extra Large', AFE_SLUG ),
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_button_text',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'afe_button_typography',
				'label' => __( 'Typography', AFE_SLUG ),
				'selector' => '{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-button',
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_button_text',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->start_controls_tabs( 'afe_button_tabs' );

		$this->start_controls_tab( 'afe_normal',
			[
				'label' => __( 'Normal', AFE_SLUG ),
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_button_text',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_button_text_color',
			[
				'label' => __( 'Text Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-button' => 'color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_button_text',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_button_background_color',
			[
				'label' => __( 'Background Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-button' => 'background-color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_button_text',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_button_border_color',
			[
				'label' => __( 'Border Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-button' => 'border-color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_button_text',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'afe__button_hover',
			[
				'label' => __( 'Hover', AFE_SLUG ),
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_button_text',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_button_hover_text_color',
			[
				'label' => __( 'Text Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-button:hover' => 'color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_button_text',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_button_hover_background_color',
			[
				'label' => __( 'Background Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-button:hover' => 'background-color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_button_text',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_button_hover_border_color',
			[
				'label' => __( 'Border Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-button:hover' => 'border-color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_button_text',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'afe_button_border_width',
			[
				'label' => __( 'Border Width', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-button' => 'border-width: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_button_text',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'afe_button_border_radius',
			[
				'label' => __( 'Border Radius', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-flipbox-container .afe-flipbox .afe-flipbox-back .afe-flipbox-button' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
				'conditions' => [
					'terms' => [
						[
							'name' => 'afe_button_text',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->end_controls_section();
		// end control style
		
	}

	protected function render() {
		$settings = $this->get_settings(); 
		//echo "<pre>" . print_r($settings, true) . "</pre>";
		?>
		<div class="afe-flipbox-container">
			<div class="afe-flipbox" data-width="<?php echo $settings['afe_flipbox_height']['size'].''.$settings['afe_flipbox_height']['unit']; ?>">
			<div class="afe-flipbox-front">
				<div class="afe-flipbox-front-overlay">
					<div class="afe-flipbox-front-content">
						<?php if ($settings['afe_front_element'] === 'image' && !empty($settings['afe_front_image']['url'])) { ?>
							<div class="afe-flipbox-image-front">
								<img src="<?php echo $settings['afe_front_image']['url']; ?>">
							</div>
						<?php } else if ($settings['afe_front_element'] === 'icon' && !empty($settings['afe_front_icon'])) { ?>
							<div class="afe-flipbox-icon-front">
								<i class="<?php echo $settings['afe_front_icon']; ?>"></i>
							</div>
			
						<?php } ?>
						<?php if (!empty($settings['afe_title_front'])) { ?>
							<h3 class="afe-flipbox-title-front">
								<?php echo $settings['afe_title_front']; ?>
							</h3>
						<?php } ?>
						<?php if (!empty($settings['afe_description_front'])) { ?>
							<div class="afe-flipbox-description-front">
								<?php echo $settings['afe_description_front']; ?>
							</div>
						<?php } ?>
					</div>
				</div>				
			</div><!-- end afe-flipbox-front-->
			<div class="afe-flipbox-back">
				<?php					
					$afe_back_wrapper_tag = 'div';
					$afe_back_button_tag = 'a';
					$afe_link_url = empty( $settings['afe_link']['url'] ) ? '#' : $settings['afe_link']['url'];
					$this->add_render_attribute( 'afe_back_button', 'class', [
							'afe-flipbox-button',
							'afe-button-' . $settings['afe_button_size'],
						]
					);
					$this->add_render_attribute( 'afe_back_wrapper', 'class', 'afe-flipbox-back-wrapper' );
					if(!empty($settings['afe_link_click']) && ($settings['afe_link_click'] === 'box')){
						$afe_back_wrapper_tag = 'a';
						$afe_back_button_tag = 'button';
						$this->add_render_attribute('afe_back_wrapper', 'href', $afe_link_url);
						if($settings['afe_link']['is_external']){
							$this->add_render_attribute('afe_back_wrapper', 'target' , '_blank');
						}
					}else{
						$this->add_render_attribute('afe_back_button', 'href', $afe_link_url);
						if ($settings['afe_link']['is_external']) {
							$this->add_render_attribute('afe_back_button', 'target', '_blank');
						}
					}
					echo '<' . $afe_back_wrapper_tag .' '. $this->get_render_attribute_string( 'afe_back_wrapper' ) .'>';
					?>
					<div class="afe-flipbox-back-overlay">
						<div class="afe-flipbox-content-back">
							<?php if ($settings['afe_back_element'] === 'image' && !empty($settings['afe_back_image']['url'])) { ?>
							<div class="afe-flipbox-back-image-back">
								<img src="<?php echo $settings['afe_back_image']['url']; ?>">
							</div>
							<?php } else if ($settings['afe_back_element'] === 'icon' && !empty($settings['afe_back_icon'])) { ?>
								<div class="afe-flipbox-back-icon-back">
									<i class="<?php echo $settings['afe_back_icon']; ?>"></i>
								</div>
				
							<?php } ?>
							<?php if (!empty($settings['afe_title_back'])) { ?>
								<h3 class="afe-flipbox-title-back">
									<?php echo $settings['afe_title_back']; ?>
								</h3>
							<?php } ?>
							<?php if (!empty($settings['afe_description_back'])) { ?>
								<div class="afe-flipbox-description-back">
									<?php echo $settings['afe_description_back']; ?>
								</div>
							<?php } ?>
							<?php if ( !empty( $settings['afe_button_text'] ) ) { ?>
								<<?php echo $afe_back_button_tag; ?> <?php echo $this->get_render_attribute_string( 'afe_back_button' ); ?>>
									<?php echo $settings['afe_button_text']; ?>
								</<?php echo $afe_back_button_tag; ?>>
							<?php } ?>
						</div>
					</div>
					<?php echo '</' . $afe_back_wrapper_tag .'>'; ?>				
			</div><!-- end afe-flipbox-back -->
		</div><!-- end afe-flipbox-hover -->
		</div><!-- end afe-flipbox-->
		<?php	
	}

	protected function _content_template() { ?>
		<div class="afe-flipbox-container" ontouchstart="this.classList.toggle('hover');">
			<div class="afe-flipbox" data-width="{{ settings.afe_flipbox_height.size}} {{settings.afe_flipbox_height.unit}}">
			<div class="afe-flipbox-front">
				<div class="afe-flipbox-front-overlay">
					<div class="afe-front-content">
					<# if (settings.afe_front_element === 'image' && settings.afe_front_image.url !== '') { #>
						<div class="afe-flipbox-image-front">
							<img src="{{ settings.afe_front_image.url }}">
						</div>
					<# } else if (settings.afe_front_element === 'icon' && settings.afe_front_icon !== '') { #>
						<div class="afe-flipbox-icon-front">
							<i class="{{ settings.afe_front_icon }}"></i>
						</div>
		
					<# }
					if ( settings.afe_title_front !== '' ) { #>
						<h3 class="afe-flipbox-title-front">
							{{ settings.afe_title_front }}
						</h3>
					<# }
					if (settings.afe_description_front !== '') { #>
						<div class="afe-flipbox-description-front">
							{{ settings.afe_description_front }}
						</div>
					<# } #>
					</div>
				</div>				
			</div><!-- end afe-flipbox-front-->
			<div class="afe-flipbox-back">
				<#
					var afe_back_wrapper_tag = 'div';
					var afe_back_button_tag = 'a';
					var afe_link_url =  (settings.afe_link.url  === '') ? '#' : settings.afe_link.url;
					var afe_button_class = 'afe-flipbox-button afe-button-' + settings.afe_button_size;
					var afe_back_wrapper_class = 'class="afe-flipbox-back-wrapper"';
					var afe_back_wrapper_link = '';
					var afe_back_button_link = '';
					if( settings.afe_link_click !== '' && settings.afe_link_click === 'box'){
						afe_back_wrapper_tag = 'a';
						afe_back_button_tag = 'button';

						afe_back_wrapper_link = 'href="'+afe_link_url+'"';
						if(settings.afe_link.is_external){
							afe_back_wrapper_link += ' target="_blank"';
						}
					}else{
						afe_back_button_link = 'href="'+ afe_link_url+'"';
						if (settings.afe_link.is_external) {
							afe_back_button_link += ' target"_blank"';
						}
					}
				#>
					<{{ afe_back_wrapper_tag }} {{ afe_back_wrapper_class }} {{ afe_back_wrapper_link }} >
					<div class="afe-flipbox-back-overlay">
						<div class="afe-flipbox-content-back">
							<# if ( settings.afe_back_element === 'image' && settings.afe_back_image.url !== '') { #>
								<div class="afe-flipbox-back-image-back">
									<img src="{{ settings.afe_back_image.url }}">
								</div>
							<# } else if (settings.afe_back_element === 'icon' && settings.afe_back_icon !== '') { #>
								<div class="afe-flipbox-back-icon-back">
									<i class="{{ settings.afe_back_icon }}"></i>
								</div>
				
							<# }
							if ( settings.afe_title_back !== '') { #>
								<h3 class="afe-flipbox-title-back">
									{{ settings.afe_title_back }}
								</h3>
							<# }
							if ( settings.afe_description_back !== '') { #>
								<div class="afe-flipbox-description-back">
									{{ settings.afe_description_back }}
								</div>
							<# }
							if ( settings.afe_button_text !== '' ) { #>
								<{{ afe_back_button_tag }} class="{{afe_button_class}}" {{ afe_back_button_link }}>
										{{ settings.afe_button_text }}
								</{{ afe_back_button_tag }}>
							<# } #>
						</div>
					</div>
					</ <# afe_back_wrapper_tag; #> >
			</div><!-- end afe-flipbox-back -->
		</div>
		</div><!-- end afe-flipbox-->
	<?php }
}
return __NAMESPACE__."\\Afe_Flipbox"; 
