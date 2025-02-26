<?php

namespace Elementor;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH'))
    exit;

class FlexiType_IconBox extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-icon-box';
    }

    public function get_title()
    {
        return esc_html__('Icon Box','flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-icon-box';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['flexitype', 'elements', 'Icon', 'List', 'Item'];
    }

    public function get_style_depends() {
		return [ 
			'elementor-icons-fa-solid',
			'elementor-icons-fa-brands',
			'elementor-icons-fa-regular',
		];
	}

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_icon',
            [
                'label' => esc_html__('Box Icon','flexitype-lite'),
            ]
        );
        $this->add_control(
            'box_icon',
            [
                'label' => esc_html__('Choose Icon','flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
            ]
        );
        $this->add_control(
            'boxicon_link',
            [
                'label' => esc_html__('Icon URL','flexitype-lite'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('Paste URL or Link','flexitype-lite'),
                'condition' => [
                    'box_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_position',
            [
                'label' => esc_html__('Icon Position','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex' => [
                        'title' => esc_html__('Left','flexitype-lite'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'block' => [
                        'title' => esc_html__('Top','flexitype-lite'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__('Right','flexitype-lite'),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'column-reverse' => [
                        'title' => esc_html__('Bottom','flexitype-lite'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'block',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'display: {{VALUE}}; flex-direction: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_vertical',
            [
                'label' => esc_html__('Vertical Alignment','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Top','flexitype-lite'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__('Middle','flexitype-lite'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'end' => [
                        'title' => esc_html__('Bottom','flexitype-lite'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'start',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'align-items: {{VALUE}};',
                ],
                'condition' => [
                    'icon_box_position' => ['flex', 'row-reverse'],
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_horizontal',
            [
                'label' => esc_html__('Horizontal Alignment','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Left','flexitype-lite'),
                        'icon' => 'eicon-align-start-h',
                    ],
                    'center' => [
                        'title' => esc_html__('Center','flexitype-lite'),
                        'icon' => 'eicon-justify-center-h',
                    ],
                    'space-between' => [
                        'title' => esc_html__('Between','flexitype-lite'),
                        'icon' => 'eicon-justify-space-between-h',
                    ],
                    'end' => [
                        'title' => esc_html__('End','flexitype-lite'),
                        'icon' => 'eicon-align-end-h',
                    ],
                ],
                'default' => 'start',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'icon_box_position' => ['flex', 'row-reverse'],
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_description',
            [
                'label' => esc_html__('Title & Description','flexitype-lite'),
            ]
        );
        $this->add_responsive_control(
            'icon_box_content',
            [
                'label' => esc_html__('Alignment','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left','flexitype-lite'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center','flexitype-lite'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__('Right','flexitype-lite'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item-content > a' => 'justify-content: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item-content' => 'justify-content: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item-content .title' => 'align-items: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_position',
            [
                'label' => esc_html__('Title Position','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'column' => [
                        'title' => esc_html__('Top','flexitype-lite'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'column-reverse' => [
                        'title' => esc_html__('Bottom','flexitype-lite'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'column',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content .title' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'box_title',
            [
                'label' => esc_html__('Title','flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is the heading','flexitype-lite'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'title_link',
            [
                'label' => esc_html__('Title URL','flexitype-lite'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('Paste URL or Link','flexitype-lite'),
                'condition' => [
                    'box_title[text]!' => '',
                ],
            ]
        );
        $this->add_control(
            'box_subtitle',
            [
                'label' => esc_html__('Description','flexitype-lite'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','flexitype-lite'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_badge',
            [
                'label' => esc_html__('Badge','flexitype-lite'),
            ]
        );
        $this->add_control(
            'badge_control_switch',
            [
                'label' => esc_html__( 'Show Badge','flexitype-lite' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show','flexitype-lite' ),
                'label_off' => esc_html__( 'Hide','flexitype-lite' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'badge_control_title',
            [
                'label' => esc_html__( 'Title','flexitype-lite' ),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => esc_html__( '01','flexitype-lite' ),
                'placeholder' => esc_html__( 'Type your title here','flexitype-lite' ),
                'condition' => [
                    'badge_control_switch' => 'yes'
                ]
            ]
        );
        $this->add_control(
			'number_align',
			[
				'label' => esc_html__( 'Alignment','flexitype-lite' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Start','flexitype-lite' ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__( 'End','flexitype-lite' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'toggle' => false,
                'default' => 'left',
                'condition' => [
                    'badge_control_position'  => 'badge_icon',
                    'badge_control_switch' => 'yes'
                ]
			]
		);
        $this->add_control(
            'badge_control_position',
            [
                'label' => esc_html__( 'Position','flexitype-lite' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'badge_default',
                'options' => [
                    'badge_default'  => esc_html__( 'Default','flexitype-lite' ),
                    'badge_icon' => esc_html__( 'Icon Badge','flexitype-lite' ),
                    'custom_badge' => esc_html__( 'Custom','flexitype-lite' ),
                ],
                'condition' => [
                    'badge_control_switch' => 'yes'
                ]
            ]
        );
        $this->add_responsive_control(
			'badge_horizontal_position',
			[
				'label' => esc_html__( 'Horizontal Position','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => -10,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => -10,
						'max' => 500,
					],
                ],
				'selectors' => [
					'{{WRAPPER}} .icon__box-item.custom_badge .box_badge' => 'right: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'badge_control_position'  => 'custom_badge',
                    'badge_control_switch' => 'yes'
                ]
			]
        );
        $this->add_responsive_control(
			'badge_vertical_position',
			[
				'label' => esc_html__( 'Vertical Position','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => -10,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => -10,
						'max' => 500,
					],
                ],
				'selectors' => [
					'{{WRAPPER}} .icon__box-item.custom_badge .box_badge' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'badge_control_position'  => 'custom_badge',
                    'badge_control_switch' => 'yes'
                ]
			]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_button',
            [
                'label' => esc_html__('Button','flexitype-lite'),
            ]
        );
        $this->add_control(
            'box_btn_active',
            [
                'label' => esc_html__('Enable Button','flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes','flexitype-lite'),
                'label_off' => esc_html__('No','flexitype-lite'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_responsive_control(
            'button_position',
            [
                'label' => esc_html__('Button Position','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'column-reverse' => [
                        'title' => esc_html__('Top','flexitype-lite'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'column' => [
                        'title' => esc_html__('Bottom','flexitype-lite'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'column',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content' => 'flex-direction: {{VALUE}};',
                ],
                'condition' => [
                    'box_btn_active' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'box_btn',
            [
                'label' => esc_html__('Button Text','flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More','flexitype-lite'),
                'label_block' => false,
                'condition' => [
                    'box_btn_active' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'box_btn_link',
            [
                'label' => esc_html__('Button URL','flexitype-lite'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => 'http://example.com',
                ],
                'condition' => [
                    'box_btn_active' => ['yes'],
                ],
            ]
        );
		$this->add_control(
            'button_icon',
            [
                'label' => esc_html__('Button Icon','flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'condition' => [
                    'box_btn_active' => ['yes'],
                ],
            ]
        );
		$this->add_control(
			'icon_align',
			[
				'label' => esc_html__( 'Icon Position','flexitype-lite' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before','flexitype-lite' ),
					'right' => esc_html__( 'After','flexitype-lite' ),
				],
                'condition' => [
                    'button_icon[value]!' => '',
                    'box_btn_active' => ['yes'],
                ],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'icon_box_style',
            [
                'label' => esc_html__('Box Style','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'box_style_tabs'
        );
        $this->start_controls_tab(
            'box_normal_tab',
            [
                'label' => esc_html__('Normal','flexitype-lite'),
            ]
        );
        $this->add_control(
            'box_background',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'background: {{VALUE}}',
                ],
                'separator' => 'after',
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border_type',
				'selector' => '{{WRAPPER}} .icon__box-item',
			]
		);
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_item_shadow',
                'selector' => '{{WRAPPER}} .icon__box-item',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .icon__box-item-overlay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'box_hover_tab',
            [
                'label' => esc_html__('Hover','flexitype-lite'),
            ]
        );
        $this->add_control(
            'box_hover_background',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover' => 'background: {{VALUE}}',
                ],
                'separator' => 'after',
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hover_box_border_type',
				'selector' => '{{WRAPPER}} .icon__box-item:hover',
			]
		);
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'hover_box_item_shadow',
                'selector' => '{{WRAPPER}} .icon__box-item:hover',
            ]
        );
        $this->add_responsive_control(
            'hover_box_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'hover_box_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
			'hover_box_transition',
			[
				'label' => esc_html__( 'Transition Duration','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'default' => [
					'unit' => 's',
					'size' => 0.4,
				],
				'selectors' => [
					'{{WRAPPER}} .icon__box-item' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->add_control(
            'icon_box_hover',
            [
                'label' => esc_html__('Icon','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'box_icon[value]!' => '',
                ],
            ]
        );
        $this->add_control(
            'hover_icon_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-icon svg path' => 'fill: {{VALUE}}',
                ],
                'condition' => [
                    'box_icon[value]!' => '',
                ],
            ]
        );
        $this->add_control(
            'icon_hover_background',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-icon' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'box_icon[value]!' => '',
                ],
            ]
        );
        $this->add_control(
            'icon_hover_border',
            [
                'label' => esc_html__('Border Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-icon' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'border_type!' => '',
                    'box_icon[value]!' => '',
                ],
            ]
        );
        $this->add_control(
            'box_description_hover',
            [
                'label' => esc_html__('Title','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'icon_box_description_hover',
            [
                'label' => esc_html__('Color','flexitype-lite'), 
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-content h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-content h4 a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_box_subtitle_hover',
            [
                'label' => esc_html__('Description','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'icon_box_subtitle_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-content p a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_box_hover_btn',
            [
                'label' => esc_html__('Button','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'box_btn_active' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'box_hover_btn_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .flexitype-button' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item:hover .flexitype-button .icon svg path' => 'fill: {{VALUE}}',
                ],
                'condition' => [
                    'box_btn_active' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'box_hover_btn_bg',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .flexitype-button' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'box_btn_active' => ['yes'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_hover_btn_shadow',
                'selector' => '{{WRAPPER}} .icon__box-item:hover .flexitype-button',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'icon_box_icon_style',
            [
                'label' => esc_html__('Icon Style','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'box_icon[value]!' => '',
                ],
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item-icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_background',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_color_hover',
            [
                'label' => esc_html__('Hover Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon:hover i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item-icon:hover svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-icon:hover i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-icon:hover svg path' => 'fill: {{VALUE}}',
                ],              
                'condition' => [
                    'boxicon_link[url]!' => '',
                ],
            ]
        );
        $this->add_control(
            'icon_background_hover',
            [
                'label' => esc_html__('Hover Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon:hover' => 'background: {{VALUE}}; border-color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-icon:hover' => 'background: {{VALUE}}; border-color: {{VALUE}}',
                ],
                'condition' => [
                    'boxicon_link[url]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_icon_size',
            [
                'label' => esc_html__('Font Size','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon__box-item-icon svg' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_width',
            [
                'label' => esc_html__('Max Width','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_icon_shadow',
                'selector' => '{{WRAPPER}} .icon__box-item-icon',
            ]
        );

        $this->add_responsive_control(
            'icon_vertical_position',
            [
                'label' => esc_html__('Vertical Position','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );        
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_type',
				'selector' => '{{WRAPPER}} .icon__box-item-icon',
			]
		);
        $this->add_responsive_control(
            'icon_box_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'icon_box_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'icon_box_content_style',
            [
                'label' => esc_html__('Title & Description','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'box_item_content',
            [
                'label' => esc_html__('Alignment','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Left','flexitype-lite'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center','flexitype-lite'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__('Right','flexitype-lite'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item-content .title' => 'align-items: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item-content > a' => 'justify-content: {{VALUE}};',
                ],
            ]
        );        
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border_type',
				'selector' => '{{WRAPPER}} .icon__box-item-content .title',
			]
		);
        $this->add_control(
            'hover_content_border_color',
            [
                'label' => esc_html__('Hover Border Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-content .title' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'content_border_type!' => '',
                ],
            ]
        );  
        $this->add_responsive_control(
            'icon_box_title_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_content_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_box_description',
            [
                'label' => esc_html__('Title','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_box_description_typography',
                'selector' => '{{WRAPPER}} .icon__box-item-content h4',
            ]
        );
        $this->add_control(
            'icon_box_description_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'box_description_hover_color',
            [
                'label' => esc_html__('Hover Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-content h4 a:hover' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'title_link[url]!' => '',
                ],
            ]
        );
        $this->add_control(
            'icon_box_title',
            [
                'label' => esc_html__('Description','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_box_typography',
                'selector' => '{{WRAPPER}} .icon__box-item-content p',
            ]
        );
        $this->add_control(
            'icon_box_title_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_content_width',
            [
                'label' => esc_html__('Max Width','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content p' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_title_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'icon_box_badge_style',
            [
                'label' => esc_html__( 'Badge','flexitype-lite' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'badge_control_switch' => 'yes',
                ]
            ]
        );
        $this->start_controls_tabs(
			'style_badge_tabs'
		);
		$this->start_controls_tab(
			'style_badge_normal_tab',
			[
				'label' => esc_html__( 'Normal','flexitype-lite' ),
			]
		);
        $this->add_responsive_control(
            'badge_opacity',
            [
                'label' => esc_html__('Opacity','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
				'default' => [
					'size' => 1,
				],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item .box_badge' => 'opacity: {{SIZE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'badge_typography',
                'label' => esc_html__( 'Typography','flexitype-lite' ),
                'selector' => '{{WRAPPER}} .icon__box-item .box_badge,
                {{WRAPPER}} .icon__box-item-icon span',
            ]
        );
        $this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'badge_text_stroke',
				'selector' => '{{WRAPPER}} .icon__box-item .box_badge,
				{{WRAPPER}} .icon__box-item-icon span',
			]
		);
        $this->add_control(
            'badge_text_color',
            [
                'label' => esc_html__( 'Color','flexitype-lite' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item .box_badge' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item-icon span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'badge_background',
                'label' => esc_html__( 'Background','flexitype-lite' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .icon__box-item .box_badge,
                {{WRAPPER}} .icon__box-item-icon span',
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'badge_border_type',
				'selector' => '{{WRAPPER}} .icon__box-item-icon span,
				{{WRAPPER}} .icon__box-item .box_badge',
			]
		);
        $this->add_responsive_control(
            'box_badge_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item .box_badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .icon__box-item-icon span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_badge_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item .box_badge' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .icon__box-item-icon span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_badge_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item .box_badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .icon__box-item-icon span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_badge_hover_tab',
			[
				'label' => esc_html__( 'Hover','flexitype-lite' ),
			]
		);
        $this->add_responsive_control(
            'hover_badge_opacity',
            [
                'label' => esc_html__('Opacity','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
				'default' => [
					'size' => 1,
				],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .box_badge' => 'opacity: {{SIZE}};',
                ],
            ]
        );
        $this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'hover_badge_text_stroke',
				'selector' => '{{WRAPPER}} .icon__box-item:hover .box_badge,
				{{WRAPPER}} .icon__box-item:hover .icon__box-item-icon span',
			]
		);
        $this->add_control(
            'hover_badge_text_color',
            [
                'label' => esc_html__( 'Color','flexitype-lite' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .box_badge' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-icon span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'hover_badge_background',
                'label' => esc_html__( 'Background','flexitype-lite' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .icon__box-item:hover .box_badge,
                {{WRAPPER}} .icon__box-item:hover .icon__box-item-icon span',
            ]
        );
        $this->add_control(
            'hover_badge_border_color',
            [
                'label' => esc_html__('Border Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-icon span' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item:hover .box_badge' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'badge_border_type!' => '',
                ],
            ]
        );  
        $this->add_control(
			'badge_transition',
			[
				'label' => esc_html__( 'Transition Duration','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'default' => [
					'unit' => 's',
					'size' => 0.4,
				],
				'selectors' => [
					'{{WRAPPER}} .icon__box-item-icon span' => 'transition: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .box_badge' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Button Style','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'box_btn_active' => ['yes'],
                ],
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->start_controls_tab(
            'normal_icon',
            [
                'label' => esc_html__('Normal','flexitype-lite'),
            ]
        );
        $this->add_responsive_control(
            'button_opacity',
            [
                'label' => esc_html__('Opacity','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item .flexitype-button' => 'opacity: {{SIZE}};',
                ],
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .flexitype-button',
			]
		);
        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Text Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_btn_shadow',
                'selector' => '{{WRAPPER}} .flexitype-button',
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_border_type',
				'selector' => '{{WRAPPER}} .flexitype-button',
			]
		);
        $this->add_responsive_control(
            'btn_vertical_position',
            [
                'label' => esc_html__('Vertical Position','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
			'btn_icon_text',
			[
				'label' => esc_html__( 'Icon Style','flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'button_icon[value]!' => '',
                ],
			]
		);
        $this->add_control(
            'btn_icon_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype-button svg path' => 'fill: {{VALUE}}',
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_control(
            'bg_icon_color',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype-button .icon' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_gap',
            [
                'label' => esc_html__('Gap','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_size',
            [
                'label' => esc_html__('Font Size','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype-button .icon svg' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_position',
            [
                'label' => esc_html__('Vertical Position','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -10,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'top: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype-button .icon' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'btn_icon_rotate',
            [
                'label' => esc_html__('Rotate','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -180,
						'max' => 180,
						'step' => 1,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'transform: rotate({{SIZE}}deg);',
                    '{{WRAPPER}} .flexitype-button svg' => 'transform: rotate({{SIZE}}deg);',
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype-button .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype-button .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'hover_icon',
            [
                'label' => esc_html__('Hover','flexitype-lite'),
            ]
        );
        $this->add_responsive_control(
            'hover_button_opacity',
            [
                'label' => esc_html__('Opacity','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
				'default' => [
					'size' => 1,
				],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .flexitype-button' => 'opacity: {{SIZE}};',
                ],
            ]
        );
        $this->add_control(
            'hover_btn_color',
            [
                'label' => esc_html__('Text Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item:hover .flexitype-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hover_bg_color',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'hover_btn_shadow',
                'selector' => '{{WRAPPER}} .flexitype-button:hover',
            ]
        );
        $this->add_control(
            'hover_border_color',
            [
                'label' => esc_html__('Border Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'btn_border_type!' => '',
                ],
            ]
        );
        $this->add_control(
			'btn_transition',
			[
				'label' => esc_html__( 'Transition Duration','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'default' => [
					'unit' => 's',
					'size' => 0.3,
				],
				'selectors' => [
					'{{WRAPPER}} .flexitype-button' => 'transition: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .flexitype-button i' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'hover_btn_icon_text',
			[
				'label' => esc_html__( 'Icon Style','flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'button_icon[value]!' => '',
                ],
			]
		);
        $this->add_control(
            'hover_btn_icon_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype-button:hover .icon svg path' => 'fill: {{VALUE}}',
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_control(
            'hover_bg_icon_color',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover i' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype-button:hover .icon' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'hover_btn_icon_rotate',
            [
                'label' => esc_html__('Rotate','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -180,
						'max' => 180,
						'step' => 1,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover i' => 'transform: rotate({{SIZE}}deg);',
                    '{{WRAPPER}} .flexitype-button:hover .icon svg' => 'transform: rotate({{SIZE}}deg);',
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
        $this->start_controls_section(
            'box_overlay',
            [
                'label' => esc_html__( 'Background Overlay ','flexitype-lite' ),
                'tab' => controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'box_overlay_show',
            [
                'label' => esc_html__( 'Enable Overlay','flexitype-lite' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes','flexitype-lite' ),
                'label_off' => esc_html__( 'No','flexitype-lite' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'box_overlay_direction',
            [
                'label' => esc_html__( 'Overlay Direction','flexitype-lite' ),
                'type' =>   Controls_Manager::CHOOSE,
                'options' => [
                    'from_left' => [
                        'title' => esc_html__( 'From Left','flexitype-lite' ),
                        'icon' => 'fa fa-caret-right',
                    ],
                    'from_top' => [
                        'title' => esc_html__( 'From Top','flexitype-lite' ),
                        'icon' => 'fa fa-caret-down',
                    ],
                    'from_right' => [
                        'title' => esc_html__( 'From Right','flexitype-lite' ),
                        'icon' => 'fa fa-caret-left',
                    ],
                    'from_bottom' => [
                        'title' => esc_html__( 'From Bottom','flexitype-lite' ),
                        'icon' => 'fa fa-caret-up',
                    ],

                ],
                'default' => 'from_bottom',
                'toggle' => true,
                'condition' => [
                    'box_overlay_show' => 'yes',
                ],
            ]
        );
        $this->start_controls_tabs(
            'box_overlay_tab',
            [
                'condition' => [
                    'box_overlay_show' => 'yes'
                ]
            ]
        );
        $this->start_controls_tab(
            'box_overlay_tab_n',
            [
                'label' => esc_html__( 'Normal','flexitype-lite' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'box_normal_overlay',
                'label' => esc_html__( 'Background Overlay Color','flexitype-lite' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .icon__box-item',
            ]
        );
        $this->add_control(
            'box_background_overlay',
            [
                'label' => esc_html__('Background Overlay','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item::before' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'box_overlay_tab_h',
            [
                'label' => esc_html__( 'Hover','flexitype-lite' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'box_hover_overlay',
                'label' => esc_html__( 'Background Overlay Color','flexitype-lite' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .icon__box-item:hover .icon__box-item-overlay::after',
            ]
        );
        $this->add_control(
            'box_hover_background_overlay',
            [
                'label' => esc_html__('Background Overlay','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-overlay::before' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
			'box_transition',
			[
				'label' => esc_html__( 'Transition Duration','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'default' => [
					'unit' => 's',
					'size' => 0.5,
				],
				'selectors' => [
					'{{WRAPPER}} .icon__box-item' => 'transition: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .icon__box-item::after' => 'transition: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .icon__box-item-overlay::after' => 'transition: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .icon__box-item-overlay::before' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();


        if (!empty($settings['boxicon_link']['url'])) {
            $this->add_link_attributes('boxicon_link', $settings['boxicon_link']);
        }

        if (!empty($settings['title_link']['url'])) {
            $this->add_link_attributes('title_link', $settings['title_link']);
        }

        if (!empty($settings['box_btn_link']['url'])) {
            $this->add_link_attributes('box_btn_link', $settings['box_btn_link']);
        }

        ?>

        <div class="icon__box-item <?php echo esc_attr($settings['box_overlay_direction']); ?> <?php echo esc_attr($settings['badge_control_position']); ?>">
            <?php if ('badge_default' === $settings['badge_control_position'] || 'custom_badge' === $settings['badge_control_position']) : ?>
                <div>
                    <span class="box_badge"><?php echo esc_html($settings['badge_control_title']); ?></span>
                </div>
            <?php endif; ?>
            <?php if ('yes' === $settings['box_overlay_show']): ?>
                <div class="icon__box-item-overlay"></div>
            <?php endif; ?>
            <?php if (!empty($settings['box_icon']['value'])): ?>
                <?php if (!empty($settings['boxicon_link']['url'])): ?>
                    <a <?php echo $this->get_render_attribute_string('boxicon_link'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                        <div class="icon__box-item-icon">
                            <?php \Elementor\Icons_Manager::render_icon($settings['box_icon'], ['aria-hidden' => 'true']); ?>
                            <?php if ('badge_icon' === $settings['badge_control_position']) : ?>
                                <span class="<?php echo esc_attr($settings['number_align']); ?>"><?php echo esc_html($settings['badge_control_title']); ?></span>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php else: ?>
                    <div class="icon__box-item-icon">
                        <?php \Elementor\Icons_Manager::render_icon($settings['box_icon'], ['aria-hidden' => 'true']); ?>
                        <?php if ('badge_icon' === $settings['badge_control_position']) : ?>
                            <span class="<?php echo esc_attr($settings['number_align']); ?>"><?php echo esc_html($settings['badge_control_title']); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="icon__box-item-content">
                <div class="title">
                    <?php if (!empty($settings['box_title'])): ?>
                        <h4>
                            <?php if (!empty($settings['title_link']['url'])) { ?>
                                <a <?php echo $this->get_render_attribute_string('title_link'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                                    <?php echo flexitype_lite_allow_html($settings['box_title']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </a>
                            <?php } else {
                               echo flexitype_lite_allow_html($settings['box_title']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                            } ?>
                        </h4>
                    <?php endif; ?>
                    <?php if (!empty($settings['box_subtitle'])): ?>
                        <?php echo wp_kses_post(wpautop($settings['box_subtitle'])); ?>
                    <?php endif; ?>
                </div>
                <?php if ('yes' === $settings['box_btn_active']): ?>
                <div>
                    <a class="flexitype-button <?php echo esc_attr( $settings['icon_align'] ); ?>" <?php echo $this->get_render_attribute_string('box_btn_link'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                        <?php echo esc_html($settings['box_btn']); ?>
                        <?php if (!empty($settings['button_icon']['value'])):?>
                            <span class="icon">
                                <?php \Elementor\Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']); ?>
                            </span>
                        <?php endif;?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new FlexiType_IconBox);