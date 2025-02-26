<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
    exit;

class FlexiType_Team extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-team';
    }

    public function get_title()
    {
        return esc_html__('Team Member', 'flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-person';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['flexitype', 'Team', 'Member'];
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
            'section_head',
            [
                'label' => esc_html__('Team Content', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'select_design',
            [
                'label' => esc_html__('Select Team Style', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'design-1' => esc_html__('Team 01', 'flexitype-lite'),
                    'design-2' => esc_html__('Team 02', 'flexitype-lite'),
                    'design-3' => esc_html__('Team 03', 'flexitype-lite'),
                ],
                'default' => 'design-1',
                'label_block' => false,
            ]
        );
        $this->add_control(
            'team_image',
            [
                'label' => esc_html__('Team Image', 'flexitype-lite'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'title_one',
            [
                'label' => esc_html__('Name', 'flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Amelia Clover', 'flexitype-lite'),
                'label_block' => false,
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__('Position', 'flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Senior Advisor', 'flexitype-lite'),
                'label_block' => false,
            ]
        );    
        $this->add_control(
            'team_url',
            [
                'label' => esc_html__('Single URL', 'flexitype-lite'),                
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('Paste URL or Link','flexitype-lite'),
            ]
        );
        $this->add_responsive_control(
            'team_content_align',
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
                    'right' => [
                        'title' => esc_html__('Right','flexitype-lite'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );
        $this->add_control(
            'team_content_position',
            [
                'label' => esc_html__('Content Position', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'relative' => esc_html__('Default', 'flexitype-lite'),
                    'absolute' => esc_html__('Absolute', 'flexitype-lite'),
                ],
                'default' => 'relative',
                'label_block' => false,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team_two-item-content' => 'position: {{VALUE}};',
                ],
                'condition' => [
                    'select_design' => ['design-2'],
                ]
            ]
        );
        $this->add_control(
            'team_content_visibility',
            [
                'label' => esc_html__('Content Visibility', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'team_four' => esc_html__('Hidden', 'flexitype-lite'),
                    'visibility_hidden' => esc_html__('Visible', 'flexitype-lite'),
                ],
                'default' => 'visibility_hidden',
                'label_block' => false,
                'condition' => [
                    'select_design' => ['design-2'],
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_icon',
            [
                'label' => esc_html__('Social Icon', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'show_social',
            [
                'label' => esc_html__('Show Social', 'flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'flexitype-lite'),
                'label_off' => esc_html__('No', 'flexitype-lite'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'share_icon',
            [
                'label' => esc_html__('Share Icon','flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-share-alt',
					'library' => 'fa-solid',
				],
                'condition' => [
                    'select_design' => ['design-1'],
                    'show_social' => 'yes',
                ]
            ]
        );
        $social_item = new Repeater();
        $social_item->add_control(
            'social_icon',
            [
                'label' => esc_html__('Icon', 'flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-brands',
                ],
            ]
        );
        $social_item->add_control(
            'social_link',
            [
                'label' => esc_html__('URL', 'flexitype-lite'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => 'https://facebook.com',
                ],
            ]
        );
        $this->add_control(
            'social_media',
            [
                'label' => esc_html__('Social Icons', 'flexitype-lite'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $social_item->get_controls(),
                'default' => [
                    [
                        'social_icon' => esc_html__('fab fa-facebook-f', 'flexitype-lite'),
                    ],
                ],
                'condition' => [
                    'show_social' => ['yes'],
                ],
                'title_field' => '{{{ social_icon }}}',
            ]
        );
        $this->add_control(
            'team_social_visibility',
            [
                'label' => esc_html__('Social Visibility', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'visibility_hidden' => esc_html__('Hidden', 'flexitype-lite'),
                    'visibility_visible team_four' => esc_html__('Visible', 'flexitype-lite'),
                ],
                'default' => 'visibility_hidden',
                'label_block' => false,
                'condition' => [
                    'select_design' => ['design-2'],
                    'show_social' => 'yes',
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_image_style',
            [
                'label' => esc_html__('Item Style', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->start_controls_tab(
            'style_normal_tabs',
            [
                'label' => esc_html__('Normal', 'flexitype-lite'),
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ]
            ]
        );
        $this->add_control(
            'image_radius',
            [
                'label' => esc_html__('Image', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_responsive_control(
            'team_image_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_two-item-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_three-item-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_image_height',
            [
                'label' => esc_html__('Height', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 5,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-image img' => 'height: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .flexitype_team_two-item-image img' => 'height: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .flexitype_team_three-item-image img' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tabs',
            [
                'label' => esc_html__('Hover', 'flexitype-lite'),
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ]
            ]
        );
        $this->add_control(
            'team_hover_name',
            [
                'label' => esc_html__('Name', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'team_title_hover',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item:hover .flexitype_team-item-content .title h6' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item:hover .flexitype_team_two-item-content h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'team_hover_position',
            [
                'label' => esc_html__('Position', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'team_position_hover',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item:hover .flexitype_team-item-content .title span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item:hover .flexitype_team_two-item-content span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'team_hover_content',
            [
                'label' => esc_html__('Content', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'team_hover_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item:hover .flexitype_team-item-content' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item:hover .flexitype_team_two-item-content' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_hover_y_position',
            [
                'label' => esc_html__('Y Position', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -80,
                        'max' => 0,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team_two-item:hover .flexitype_team_two-item-content' => 'transform: translateY({{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .flexitype_team-item:hover .flexitype_team-item-content' => 'transform: translateY({{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ]
            ]
        );
		$this->add_control(
			'team_hover_share_icon',
			[
				'label' => esc_html__( 'Share Icon', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'condition' => [
                    'select_design' => ['design-1'],
                ]
			]
		);
		$this->add_control(
			'team_hover_social_icon',
			[
				'label' => esc_html__( 'Social Icon', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'condition' => [
                    'select_design' => ['design-2'],
                ]
			]
		);
        $this->add_control(
            'team_hover_share_icon_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item:hover .flexitype_team-item-content-icon span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team-item:hover .flexitype_team-item-content-icon span svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item:hover .flexitype_team_two-item-content-social ul li a i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item:hover .flexitype_team_two-item-content-social ul li a svg path' => 'fill: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ]
            ]
        );
        $this->add_control(
            'team_hover_share_icon_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item:hover .flexitype_team-item-content-icon span' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item:hover .flexitype_team_two-item-content-social ul li a' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ]
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
        $this->start_controls_section(
            'team_name_style',
            [
                'label' => esc_html__('Name', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_title_typography',
                'selector' => '{{WRAPPER}} .flexitype_team-item-content .title h6,
                {{WRAPPER}} .flexitype_team_two-item-content h6,
                {{WRAPPER}} .flexitype_team_three-item-image-content h6',
            ]
        );
        $this->add_control(
            'team_title_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content .title h6' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item-content h6' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_three-item-image-content h6 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_three-item-image-content h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'team_title_bg',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team_three-item-image-content h6 a' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_three-item-image-content h6' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-3'],
                ]
            ]
        );
        $this->add_control(
            'hover_title_color',
            [
                'label' => esc_html__('Hover Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content .title h6 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item-image-content .title h6 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_three-item-image-content h6 a:hover' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'team_url[url]!' => '',
                    'select_design' => ['design-1'],
                ],
            ]
        );
        $this->add_responsive_control(
            'title_position',
            [
                'label' => esc_html__('Name Position', 'flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'column' => [
                        'title' => esc_html__('Top', 'flexitype-lite'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'column-reverse' => [
                        'title' => esc_html__('Bottom', 'flexitype-lite'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'column',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content .title' => 'flex-direction: {{VALUE}};',
                    '{{WRAPPER}} .flexitype_team_two-item-content .title' => 'flex-direction: {{VALUE}};',
                    '{{WRAPPER}} .flexitype_team_three-item-image-content' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_title_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_two-item-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'team_position_style',
            [
                'label' => esc_html__('Position', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_subtitle_typography',
                'selector' => '{{WRAPPER}} .flexitype_team-item-content .title span,
                {{WRAPPER}} .flexitype_team_two-item-content span,
                {{WRAPPER}} .flexitype_team_three-item-image-content span',
            ]
        );
        $this->add_control(
            'team_subtitle_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content .title span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item-content span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_three-item-image-content span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'team_subtitle_bg',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team_three-item-image-content span' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-3'],
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_content_style',
            [
                'label' => esc_html__('Content', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ],
            ]
        );
        $this->add_control(
            'team_content_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item-content' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_normal',
                'selector' => '{{WRAPPER}} .flexitype_team-item-content,
                {{WRAPPER}} .flexitype_team_two-item-content',
                'separator' => 'before',
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border_type',
				'selector' => '{{WRAPPER}} .flexitype_team-item-content,
				{{WRAPPER}} .flexitype_team_two-item-content',
			]
		);
        $this->add_responsive_control(
            'team_content_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_two-item-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_content_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_two-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_content_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_two-item-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_icon_style',
            [
                'label' => esc_html__('Icon', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_social' => ['yes'],
                ]
            ]
        );
        $this->start_controls_tabs(
            'style_tab'
        );
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'flexitype-lite'),
            ]
        );
		$this->add_control(
			'team_social',
			[
				'label' => esc_html__( 'Social Icon', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
			]
		);
        $this->add_control(
            'team_icon_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content-social ul li a i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team-item-content-social ul li a svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item-content-social ul li a i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item-content-social ul li a svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_three-item-image-social ul li a i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_three-item-image-social ul li a svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'team_icon_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content-social ul li a' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item-content-social ul li a' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_three-item-image-social ul li a' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_space',
            [
                'label' => esc_html__('Gap', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
					'unit' => 'px',
					'size' => 8,
				],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content-social ul' => 'gap: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_two-item-content-social ul' => 'gap: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_three-item-image-social ul' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_width',
            [
                'label' => esc_html__('Max Width', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
					'unit' => 'px',
					'size' => 45,
				],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content-social ul li a' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_two-item-content-social ul li a' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_three-item-image-social ul li a' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );        
        $this->add_responsive_control(
            'social_icon_size',
            [
                'label' => esc_html__('Icon Size', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
					'unit' => 'px',
					'size' => 14,
				],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content-social ul li a i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team-item-content-social ul li a svg' => 'max-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_two-item-content-social ul li a i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_two-item-content-social ul li a svg' => 'max-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_three-item-image-social ul li a i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_three-item-image-social ul li a svg' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_social_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content-social ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_two-item-content-social ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_three-item-image-social ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
			'team_share',
			[
				'label' => esc_html__( 'Share Icon', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'select_design' => ['design-1'],
                ]
			]
		);
		$this->add_control(
			'share_icon_position',
			[
				'label' => __( 'Position', 'flexitype-lite' ),
				'type' => Controls_Manager::POPOVER_TOGGLE,
				'label_off' => __( 'None', 'flexitype-lite' ),
				'label_on' => __( 'Custom', 'flexitype-lite' ),
				'return_value' => 'yes',
                'condition' => [
                    'select_design' => ['design-1'],
                ]
			]
		);
		$this->start_popover();
		$this->add_responsive_control(
			'share_position_y',
			[
				'label' => __( 'Vertical', 'flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .flexitype_team-item-content-icon' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'share_position_x',
			[
				'label' => __( 'Horizontal', 'flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .flexitype_team-item-content-icon' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_popover();

        $this->add_control(
            'team_share_icon_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content-icon span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item-image-icon span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team-item-content-icon span svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item-image-icon span svg path' => 'fill: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );
        $this->add_control(
            'team_share_icon_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content-icon span' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item-image-icon span' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );
        $this->add_responsive_control(
            'share_icon_width',
            [
                'label' => esc_html__('Max Width', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
					'unit' => 'px',
					'size' => 45,
				],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content-icon span' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team-item-content-icon .flexitype_team-item-content-social' => 'bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_two-item-image-icon span' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
                ], 
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );        
        $this->add_responsive_control(
            'share_icon_size',
            [
                'label' => esc_html__('Icon Size', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
					'unit' => 'px',
					'size' => 14,
				],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content-icon span' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team-item-content-icon span svg' => 'max-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_two-item-image-icon span' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_two-item-image-icon span svg' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );
        $this->add_responsive_control(
            'team_share_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content-icon span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_team_two-item-image-icon span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'flexitype-lite'),                
            ]
        );
		$this->add_control(
			'team_hover_social',
			[
				'label' => esc_html__( 'Social Icon', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
			]
		);
        $this->add_control(
            'team_icon_hover_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content-social ul li a:hover i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item:hover .flexitype_team_two-item-content-social ul li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item:hover .flexitype_team_two-item-content-social ul li a:hover svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_three-item-image-social ul li a:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'team_icon_hover_bg',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item-content-social ul li a:hover' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_two-item:hover .flexitype_team_two-item-content-social ul li a:hover' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_team_three-item-image-social ul li a:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
			'team_hover_share',
			[
				'label' => esc_html__( 'Share Icon', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'condition' => [
                    'select_design' => ['design-1'],
                ]
			]
		);
        $this->add_control(
            'team_share_hover_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item:hover .flexitype_team-item-content-icon span:hover' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );
        $this->add_control(
            'team_share_hover_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_team-item:hover .flexitype_team-item-content-icon span:hover' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs(); 
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if (!empty($settings['team_url']['url'])) {
            $this->add_link_attributes('team_url', $settings['team_url']);
        }
        $team_image = $settings['team_image'];

        include ('template/team-style-one.php');
        include ('template/team-style-two.php');
        include ('template/team-style-three.php');

    }
}

Plugin::instance()->widgets_manager->register(new FlexiType_Team);