<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class FlexiType_Blog extends Widget_Base
{

    public function get_name()
    {
        return 'flexitype-blog';
    }

    public function get_title()
    {
        return esc_html__('Blog', 'flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-posts-grid';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['post', 'Toolkit', 'Blog', 'Grid', 'list'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'blog_settings',
            [
                'label' => esc_html__('Blog Settings', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'blog_date_meta',
            [
                'label' => esc_html__('Show Date', 'flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'flexitype-lite'),
                'label_off' => esc_html__('No', 'flexitype-lite'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'blog_comment_image' => 'yes',
                ],

            ]
        );
        $this->add_control(
            'blog_username_meta',
            [
                'label' => esc_html__('Show Username', 'flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'flexitype-lite'),
                'label_off' => esc_html__('No', 'flexitype-lite'),
                'return_value' => 'yes',
                'default' => 'yes',

            ]
        );
        $this->add_control(
            'blog_comment_meta',
            [
                'label' => esc_html__('Show Comment', 'flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'flexitype-lite'),
                'label_off' => esc_html__('No', 'flexitype-lite'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'blog_comment_image',
            [
                'label' => esc_html__('Show Image', 'flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'flexitype-lite'),
                'label_off' => esc_html__('No', 'flexitype-lite'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'grid_columns_des',
            [
                'label'   => esc_html__('Columns On Desktop', 'flexitype-lite'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'show_one' => esc_html__('Column 1', 'flexitype-lite'),
                    'show_two' => esc_html__('Column 2', 'flexitype-lite'),
                    'show_three' => esc_html__('Column 3', 'flexitype-lite'),
                    'show_four' => esc_html__('Column 4', 'flexitype-lite'),
                    'show_five' => esc_html__('Column 5', 'flexitype-lite'),
                ],
                'default'      => 'show_one',
                'separator' => 'before',
                'label_block'  => false,
            ]
        );
        $this->add_control(
            'grid_columns_tab',
            [
                'label'   => esc_html__('Columns On Tablet', 'flexitype-lite'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'md_show_one' => esc_html__('Column 1', 'flexitype-lite'),
                    'md_show_two' => esc_html__('Column 2', 'flexitype-lite'),
                    'md_show_three' => esc_html__('Column 3', 'flexitype-lite'),
                ],
                'default'      => 'md_show_three',
                'label_block'  => false,
            ]
           
        );
        $this->add_control(
            'grid_columns_mob',
            [
                'label' => esc_html__('Columns On Mobile', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'sm_show_one' => esc_html__('Column 1', 'flexitype-lite'),
                    'sm_show_two' => esc_html__('Column 2', 'flexitype-lite'),
                    'sm_show_three' => esc_html__('Column 3', 'flexitype-lite'),
                ],
                'default' => 'sm_show_two',
                'label_block' => false,
            ]
        );
        $this->add_responsive_control(
            'blog_item_gap',
            [
                'label' => esc_html__('Column Gap', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-area' => 'gap: {{SIZE}}px;',
                ],
            ]
        );   
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_query',
            [
                'label' => esc_html__('Blog Query', 'flexitype-lite'),
            ]
        );
        $this->add_control(
			'post_type',
			[
				'label'   => esc_html__( 'Source', 'flexitype-lite' ),
				'type'    => Controls_Manager::SELECT,
				'options' => flexitype_lite_post_types_list(),
				'default' => 'post',
			]
		);

        // happy
        $this->add_control(
            'post_count',
            [
                'label' => esc_html__('Number Of Posts', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 2,
                        'max' => 15,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 3,
                ],
            ]
        );
        $this->add_control(
            'word_limit',
            [
                'label' => esc_html__('Content Word Limit', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 5,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 10,
                ],
            ]
        );
        $this->add_control(
            'category',
            [
                'label' => esc_html__('Categories', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => flexitype_lite_categories(),
            ]
        );
        $this->add_control(
            'blog_btn_text',
            [
                'label' => esc_html__('Blog Button', 'flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'flexitype-lite'),
                'label_block' => true,
            ]
        );
		$this->add_control(
            'btn_icon',
            [
                'label' => esc_html__('Button Icon', 'flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'condition' => [
                    'blog_btn_text[value]!' => '',
                ],
            ]
        );
		$this->add_control(
			'icon_align',
			[
				'label' => esc_html__('Icon Position', 'flexitype-lite' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__('Before', 'flexitype-lite' ),
					'right' => esc_html__('After', 'flexitype-lite' ),
				],
                'condition' => [
                    'btn_icon[value]!' => '',
                    'blog_btn_text[value]!' => '',
                ],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_item_style',
            [
                'label' => esc_html__('Item', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'blog_item_content',
            [
                'label' => esc_html__('Alignment', 'flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_item_horizontal',
            [
                'label' => esc_html__('Image Position', 'flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex' => [
                        'title' => esc_html__('Left', 'flexitype-lite'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'block' => [
                        'title' => esc_html__('Top', 'flexitype-lite'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__('Right', 'flexitype-lite'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'block',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item' => 'display: {{VALUE}}; flex-direction: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_image_max',
            [
                'label' => esc_html__('Column Width (%)', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-img' => 'width: {{SIZE}}%; max-width: {{SIZE}}%;',
                ],
                'condition' => [
                    'blog_item_horizontal' => ['flex', 'row-reverse'],
                ],
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'blog_image',
            [
                'label' => esc_html__('Image', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_responsive_control(
            'blog_image_width',
            [
                'label' => esc_html__('Width', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
			'image_height',
			[
				'label' => esc_html__('Height', 'flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .blog_one-item-image img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'blog_image_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'blog_item_bg',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item' => 'background: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'blog_item_border',
				'selector' => '{{WRAPPER}} .blog_one-item',
			]
		);
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'blog_item_shadow',
                'selector' => '{{WRAPPER}} .blog_one-item',
            ]
        );
        $this->add_responsive_control(
            'blog_item_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_item_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_date_style',
            [
                'label' => esc_html__('Date & Month', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'blog_date_meta' => ['yes'],
                ],
            ]
        );
        $this->add_control(
			'blog_date_view',
			[
				'label' => esc_html__('Layout', 'flexitype-lite' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'traditional',
				'options' => [
					'traditional' => [
						'title' => esc_html__('Default', 'flexitype-lite' ),
						'icon' => 'eicon-editor-list-ul',
					],
					'inline' => [
						'title' => esc_html__('Inline', 'flexitype-lite' ),
						'icon' => 'eicon-ellipsis-h',
					],
				],
			]
		);
        $this->add_control(
			'horizontal_icon_align',
			[
				'label' => esc_html__('Horizontal Alignment', 'flexitype-lite' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Start', 'flexitype-lite' ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__('End', 'flexitype-lite' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'toggle' => false,
                'default' => 'right',
			]
		);
        $this->add_control(
			'vertical_icon_align',
			[
				'label' => esc_html__('Vertical Alignment', 'flexitype-lite' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'top' => [
						'title' => esc_html__('Top', 'flexitype-lite' ),
						'icon' => 'eicon-v-align-top',
					],
					'bottom' => [
						'title' => esc_html__('Bottom', 'flexitype-lite' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'toggle' => false,
                'default' => 'top',
			]
		);
        $this->add_control(
            'blog_date_icon',
            [
                'label' => esc_html__('Icon', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'blog_date_view' => 'inline',
                ],
            ]
        );
        $this->add_control(
            'show_calendar_icon',
            [
                'label' => esc_html__('Show Icon', 'flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'flexitype-lite'),
                'label_off' => esc_html__('No', 'flexitype-lite'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'blog_date_view' => 'inline',
                ],
            ]
        );
        $this->add_control(
            'date_icon_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image-date i' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'blog_date_view' => 'inline',
                    'show_calendar_icon' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'blog_date',
            [
                'label' => esc_html__('Date', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'selector' => '{{WRAPPER}} .blog_one-item-image-date h6',
            ]
        );
        $this->add_control(
            'date_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image-date h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'blog_month',
            [
                'label' => esc_html__('Month', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'month_typography',
                'selector' => '{{WRAPPER}} .blog_one-item-image-date span',
            ]
        );
        $this->add_control(
            'month_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image-date span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'date_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image-date' => 'background: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'date_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'date_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'date_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image-date' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_meta_style',
            [
                'label' => esc_html__('Meta', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'meta_style_tabs'
        );
        $this->start_controls_tab(
            'meta_normal_tab',
            [
                'label' => esc_html__('Normal', 'flexitype-lite'),
            ]
        );
        $this->add_control(
			'meta_view',
			[
				'label' => esc_html__('Layout', 'flexitype-lite' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => [
						'title' => esc_html__('Inline', 'flexitype-lite' ),
						'icon' => 'eicon-ellipsis-h',
					],
					'block' => [
						'title' => esc_html__('Block', 'flexitype-lite' ),
						'icon' => 'eicon-editor-list-ul',
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'display: {{VALUE}};',
                ],
			]
		);
        $this->add_control(
            'meta_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typography',
                'selector' => '{{WRAPPER}} .blog__two-item-content-meta ul li a,
                {{WRAPPER}} .blog_one-item-content-meta ul li a',
            ]
        );
        $this->add_control(
            'meta_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'meta_icon_color',
            [
                'label' => esc_html__('Icon Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta ul li a i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_icon_space',
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
                    '{{WRAPPER}} .blog_one-item-content-meta ul li a i' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_meta_position',
            [
                'label' => esc_html__('Vertical Position', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -50,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'transform: translateY({{SIZE}}{{UNIT}});',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'meta_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'blog_item_border_meta',
				'selector' => '{{WRAPPER}} .blog_one-item-content-meta',
			]
		);
        $this->add_responsive_control(
            'meta_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'meta_hover_tab',
            [
                'label' => esc_html__('Hover', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'hover_meta_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
        $this->start_controls_section(
            'blog_content_style',
            [
                'label' => esc_html__('Content', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'blog_title',
            [
                'label' => esc_html__('Title', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'blog_title_typography',
                'selector' => '{{WRAPPER}} .blog__two-item-content h6',
            ]
        );
        $this->add_control(
            'blog_title_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'blog_content_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content' => 'background: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_normal',
                'selector' => '{{WRAPPER}} .blog_one-item-content,
				{{WRAPPER}} .blog__three-item-content',
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'blog_item_border_content',
				'selector' => '{{WRAPPER}} .blog_one-item-content',
			]
		);
        $this->add_responsive_control(
            'blog_content_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_content_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_content_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
            'blog_title_hover',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content h4 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_hover',
                'selector' => '{{WRAPPER}} .blog_one-item:hover .blog_one-item-content,
				{{WRAPPER}} .log__three-item:hover .blog__three-item-content',
                'separator' => 'before',
            ]
        );
        $this->add_control(
			'content_transition',
			[
				'label' => esc_html__('Transition Duration', 'flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'default' => [
					'unit' => 's',
					'size' => 0.3,
				],
				'selectors' => [
					'{{WRAPPER}} .blog_one-item-content' => 'transition: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .blog_one-item-content-meta ul li a' => 'transition: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .blog_one-item-content h4 a' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_button_style',
            [
                'label' => esc_html__('Button', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'blog_btn_text[value]!' => '',
                ],
            ]
        );        
        $this->start_controls_tabs(
            'btn_style_tabs'
        );
        $this->start_controls_tab(
            'btn_normal',
            [
                'label' => esc_html__('Normal','flexitype-lite'),
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
        $this->add_responsive_control(
			'btn_width',
			[
				'label'			=> esc_html__( 'Width (%)','flexitype-lite' ),
				'type'			=> Controls_Manager::SLIDER,
				'selectors'		=> [
					'{{WRAPPER}} .flexitype-button' => 'width: {{SIZE}}%;',
				]
			]
		);
        $this->add_responsive_control(
            'blog_btn_align',
            [
                'label' => esc_html__('Alignment', 'flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'center' => [
                        'title' => esc_html__('Center', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'space-between' => [
                        'title' => esc_html__('Space Between', 'flexitype-lite'),
                        'icon' => 'eicon-justify-space-between-h',
                    ],
                ],
                'toggle' => false,
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'justify-content: {{VALUE}};',
                ],
				'condition' => [
					'btn_width[size]!' => '',
				],
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__('Background Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'background: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_border_type',
				'selector' => '{{WRAPPER}} .flexitype-button',
			]
		);
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_box_shadow',
                'selector' => '{{WRAPPER}} .flexitype-button',
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
        $this->add_responsive_control(
            'btn_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
			'blog_btn_icon',
			[
				'label' => esc_html__( 'Icon Style', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);
        $this->add_control(
            'btn_icon_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'color: {{VALUE}}',
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
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_rotate',
            [
                'label' => esc_html__('Rotate (deg)','flexitype-lite'),
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
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'btn_hover',
            [
                'label' => esc_html__('Hover','flexitype-lite'),
            ]
        );
        $this->add_control(
            'hover_btn_color',
            [
                'label' => esc_html__('Text Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hover_bg_color',
            [
                'label' => esc_html__('Background Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_hover_border_type',
				'selector' => '{{WRAPPER}} .flexitype-button:hover',
			]
		);
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_hover_box_shadow',
                'selector' => '{{WRAPPER}} .flexitype-button:hover',
            ]
        );
        $this->add_responsive_control(
            'hover_btn_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'hover_btn_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			]
		);
        $this->add_control(
            'hover_btn_icon_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover i' => 'color: {{VALUE}}',
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
                ],
            ]
        );
        $this->add_responsive_control(
            'hover_btn_icon_rotate',
            [
                'label' => esc_html__('Rotate (deg)','flexitype-lite'),
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
        $uniqueId = wp_rand(10, 1000);
        $grid_columns = $settings['grid_columns_des'] . ' ' . $settings['grid_columns_tab'] . ' ' . $settings['grid_columns_mob'];

        if (!empty($settings['category'])) {
            $post_query = new \WP_Query(
                array(
                    'post_type' => $settings['post_type'],
                    'post_status' => 'publish',
                    'posts_per_page' => $settings['post_count']['size'],
                    'ignore_sticky_posts' => 1,
                    'tax_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
                        array(
                            'taxonomy' => 'category',
                            'terms' => $settings['category'],
                            'field' => 'slug',
                        )
                    )
                )
            );
        } else {

            $post_query = new \WP_Query(
                array(
                    'post_type' => $settings['post_type'],
                    'post_status' => 'publish',
                    'posts_per_page' => $settings['post_count']['size'],
                    'ignore_sticky_posts' => 1,
                )
            );
        }

        ?>
        <div class="blog_one">
            <div class="blog_one-area <?php echo esc_attr($grid_columns); ?>">
                <?php include('template/blog-style-one.php'); ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new FlexiType_Blog);
