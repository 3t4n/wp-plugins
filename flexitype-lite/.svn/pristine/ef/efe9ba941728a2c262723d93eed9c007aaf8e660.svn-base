<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH')) exit;

class FlexiType_Testimonial extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-testimonials';
    }

    public function get_title()
    {
        return esc_html__('Testimonials', 'flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-review';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['flexitype', 'Client', 'carousel', 'slider', 'Testimonial', 'Review'];
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
            'section_content',
            [
                'label' => esc_html__('Testimonial Content', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'select_design',
            [
                'label' => esc_html__('Select a Style', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'design-1' => esc_html__('Testimonial 01', 'flexitype-lite'),
                    'design-2' => esc_html__('Testimonial 02', 'flexitype-lite'),
                ],
                'default' => 'design-1',
                'label_block' => false,
            ]
        );
        $this->add_control(
            'testimonial_rating_icon',
            [
                'label' => esc_html__('Rating Icon', 'flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'skin' => 'inline',
                'label_block' => false,
                'exclude_inline_options' => ['svg'],
                'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
                ],
            ]
        );
        $this->add_control(
            'testimonial_quote_icon',
            [
                'label' => esc_html__('Quote Icon', 'flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'skin' => 'inline',
                'label_block' => false,
                'exclude_inline_options' => ['svg'],
                'default' => [
					'value' => 'fas fa-quote-right',
					'library' => 'fa-solid',
                ],
            ]
        );
        $testimonial_item = new Repeater();
        $testimonial_item->add_control(
            'avatar_image',
            [
                'label' => esc_html__('Avatar Image', 'flexitype-lite'),
                'type'  => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $testimonial_item->add_control(
            'test_title',
            [
                'label'   => esc_html__('Author Name', 'flexitype-lite'),
                'type'    => Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );
        $testimonial_item->add_control(
            'test_subtitle',
            [
                'label'   => esc_html__('Author Position', 'flexitype-lite'),
                'type'    => Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );
        $testimonial_item->add_control(
            'test_description',
            [
                'label'   => esc_html__('Write Content', 'flexitype-lite'),
                'type'    => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'testimonial_items',
            [
                'label' => esc_html__('Testimonial Slides', 'flexitype-lite'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $testimonial_item->get_controls(),
                'default' => [
                    [
                        'avatar_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'test_subtitle'     => esc_html__('Web Designer', 'flexitype-lite'),
                        'test_title'        => esc_html__('Sara Albert', 'flexitype-lite'),
                        'test_description'  => esc_html__('Proin pretium sem libero, nec aliquet augue lobortis in. Phasellus nibh quam, molestie id est sit amet.', 'flexitype-lite'),
                        'brand_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'avatar_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'test_subtitle'     => esc_html__('Developer', 'flexitype-lite'),
                        'test_title'        => esc_html__('Richerd William', 'flexitype-lite'),
                        'test_description'  => esc_html__('Proin pretium sem libero, nec aliquet augue lobortis in. Phasellus nibh quam, molestie id est sit amet.', 'flexitype-lite'),
                        'brand_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
                'title_field' => '{{{ test_title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Settings', 'flexitype-lite'),
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
                'default'      => 'show_three',
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
                'default'      => 'md_show_two',
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
                'default' => 'sm_show_one',
                'label_block' => false,
            ]
        );
        $this->add_responsive_control(
            'item_gap',
            [
                'label' => esc_html__('Gap', 'flexitype-lite'),
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
					'size' => 25,
				],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_item',
            [
                'label' => esc_html__('Testimonial Item', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'testimonial_item_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_two-item' => 'background: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_type',
				'selector' => '{{WRAPPER}} .flexitype_testimonial_one-item,
				{{WRAPPER}} .flexitype_testimonial_two-item',
			]
		);
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_icon_shadow',
                'selector' => '{{WRAPPER}} .flexitype_testimonial_one-item,
                {{WRAPPER}} .flexitype_testimonial_two-item',
            ]
        );
        $this->add_responsive_control(
            'testimonial_item_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_two-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testimonial_item_padding',
            [
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_two-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testimonial_item_margin',
            [
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_two-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
			'rating_name',
			[
				'label' => esc_html__( 'Rating Icon', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'condition' => [
                    'testimonial_rating_icon[value]!' => '',
                ],
			]
		);
        $this->add_control(
            'rating_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content .rating i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content .rating svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_one-item-reviews i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_one-item-reviews svg path' => 'fill: {{VALUE}}',
                ],
                'condition' => [
                    'testimonial_rating_icon[value]!' => '',
                ],
            ]
        );        
        $this->add_responsive_control(
            'rating_size',
            [
                'label' => esc_html__('Font Size', 'flexitype-lite'),
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
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content .rating i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content .rating svg' => 'max-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_one-item-reviews i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_one-item-reviews svg' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'testimonial_rating_icon[value]!' => '',
                ],
            ]
        );
		$this->add_control(
			'quote_name',
			[
				'label' => esc_html__( 'Quote Icon', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'condition' => [
                    'testimonial_quote_icon[value]!' => '',
                ],                
			]
		);
        $this->add_control(
            'quote_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content-bottom i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content-bottom  svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_one-item-icon' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_one-item-icon svg path' => 'fill: {{VALUE}}',
                ],
                'condition' => [
                    'testimonial_quote_icon[value]!' => '',
                ],
            ]
        ); 
        $this->add_responsive_control(
            'quote_size',
            [
                'label' => esc_html__('Font Size', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content-bottom i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content-bottom svg' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_one-item-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_one-item-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'testimonial_quote_icon[value]!' => '',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_item_content',
            [
                'label' => esc_html__('Item Content', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'author_avatar',
			[
				'label' => esc_html__( 'Author Avatar', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_responsive_control(
			'author_avatar_width',
			[
				'label' => esc_html__( 'Max Width','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .flexitype_testimonial_one-item-client-image img' => 'width: {{SIZE}}px;height: {{SIZE}}px;min-width: {{SIZE}}px;',
					'{{WRAPPER}} .flexitype_testimonial_two-item-content-bottom-author img' => 'width: {{SIZE}}px;height: {{SIZE}}px;min-width: {{SIZE}}px;',
				],
			]
		);
		$this->add_responsive_control(
			'author_avatar_gap',
			[
				'label' => esc_html__( 'Gap','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .flexitype_testimonial_one-item-client' => 'gap: {{SIZE}}px;',
					'{{WRAPPER}} .flexitype_testimonial_two-item-content-bottom-author' => 'gap: {{SIZE}}px;',
				],
			]
		);
		$this->add_control(
			'author_name',
			[
				'label' => esc_html__( 'Author Name', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'author_typography',
                'selector' => '{{WRAPPER}} .flexitype_testimonial_one-item-client-title h6,
                {{WRAPPER}} .flexitype_testimonial_two-item-content-bottom-author-info h6',
            ]
        );
        $this->add_control(
            'author_name_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item-client-title h6' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content-bottom-author-info h6' => 'color: {{VALUE}}',
                ],                
            ]
        );
		$this->add_control(
			'author_position',
			[
				'label' => esc_html__( 'Author Position', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'position_typography',
                'selector' => '{{WRAPPER}} .flexitype_testimonial_one-item-client-title span,
                {{WRAPPER}} .flexitype_testimonial_two-item-content-bottom-author-info span',
            ]
        );
        $this->add_control(
            'author_position_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item-client-title span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content-bottom-author-info span' => 'color: {{VALUE}}',
                ],                
            ]
        );
		$this->add_control(
			'author_content',
			[
				'label' => esc_html__( 'Author Content', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .flexitype_testimonial_one-item p,
                {{WRAPPER}} .flexitype_testimonial_two-item-content p',
                
            ]
        );
        $this->add_control(
            'author_content_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content p' => 'color: {{VALUE}}',
                ],                
            ]
        );
        $this->add_responsive_control(
            'testimonial_content_margin',
            [
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {   
        $settings   = $this->get_settings_for_display();
        $grid_columns = $settings['grid_columns_des'] . ' ' . $settings['grid_columns_tab'] . ' ' . $settings['grid_columns_mob'];

        include ('template/testimonial-style-one.php');
        include ('template/testimonial-style-two.php');

        ?>
        <?php       
    }
}

Plugin::instance()->widgets_manager->register(new FlexiType_Testimonial);
