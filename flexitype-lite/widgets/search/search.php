<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class FlexiType_Search extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-search';
    }

    public function get_title()
    {
        return esc_html__('Search', 'flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-search';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['elements', 'Search', 'Icon', 'header'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Search Setting', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'search_icon',
            [
                'label' => esc_html__('Search Icon', 'flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-search',
					'library' => 'fa-solid',
				],
            ]
        );
        $this->add_control(
            'close_icon',
            [
                'label' => esc_html__('Close Icon', 'flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-times',
					'library' => 'fa-solid',
				],
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('Placeholder', 'flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Search..', 'flexitype-lite'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Search Icon', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'menu_align',
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
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search .search' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'search_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype-search-icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'search_bg_color',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-icon' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_size',
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
                    '{{WRAPPER}} .flexitype-search-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype-search-icon svg' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_width',
            [
                'label' => esc_html__('Max Width', 'flexitype-lite'),
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
                    '{{WRAPPER}} .flexitype-search-icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'search_border_type',
                'selector' => '{{WRAPPER}} .flexitype-search-icon',
            ]
        );
        $this->add_responsive_control(
            'search_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'close_style_section',
            [
                'label' => esc_html__('Close Icon', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'close_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype-search-box-icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'close_bg_color',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box-icon' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'close_size',
            [
                'label' => esc_html__('Font Size', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype-search-box-icon svg' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'close_width',
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
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box-icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'close_border_type',
                'selector' => '{{WRAPPER}} .flexitype-search-box-icon',
            ]
        );
        $this->add_responsive_control(
            'search_input_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'input_style',
            [
                'label' => esc_html__('Input Style', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'input_box_height',
            [
                'label' => esc_html__('Height', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 150,
                    ],
                ],
                'default' => [
                    'size' => 60,
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box input' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'input_box_background',
            [
                'label' => esc_html__('Background Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box input' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'input_box_typography',
                'selector' => '{{WRAPPER}} .flexitype-search-box input',
            ]
        );
        $this->add_control(
            'input_box_text_color',
            [
                'label' => esc_html__('Text Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box input' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'input_box_placeholder_color',
            [
                'label' => esc_html__('Placeholder Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box input::-webkit-input-placeholder' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'input_box_border',
                'label' => esc_html__('Border', 'flexitype-lite'),
                'selector' => '{{WRAPPER}} .flexitype-search-box input',
            ]
        );
        $this->add_control(
            'input_box_focus_border',
            [
                'label' => esc_html__('Focus Border Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box input:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'input_box_border_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box input' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'input_box_padding',
            [
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'input_button_style',
            [
                'label' => esc_html__('Button', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('submit_style_tabs');

        $this->start_controls_tab(
            'submit_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'input_box_size',
            [
                'label' => esc_html__('Font Size', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box button i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype-search-box button svg' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'input_button_width',
            [
                'label' => esc_html__('Width', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'input_button_height',
            [
                'label' => esc_html__('Height', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box button' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'input_submit_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box button i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .flexitype-search-box button svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'input_submit_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box button' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'input_submit_border',
                'label' => esc_html__('Border', 'flexitype-lite'),
                'selector' => '{{WRAPPER}} .flexitype-search-box button',
            ]
        );
        $this->add_responsive_control(
            'input_submit_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box button' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'input_submit_margin',
            [
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'submit_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'flexitype-lite'),
            ]
        );

        $this->add_control(
            'input_submit_color_hover',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box button:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .flexitype-search-box button:hover svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'input_submit_background_hover',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box button:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'input_hover_border',
                'label' => esc_html__('Border', 'flexitype-lite'),
                'selector' => '{{WRAPPER}} .flexitype-search-box button:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="flexitype-search">
            <div class="search">
                <span class="flexitype-search-icon open">
                    <?php \Elementor\Icons_Manager::render_icon($settings['search_icon'], ['aria-hidden' => 'true']); ?>
                </span>
            </div>
            <div class="flexitype-search-box">
                <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search" placeholder="<?php echo esc_attr($settings['btn_text']); ?>"
                        value="<?php the_search_query(); ?>" name="s">
                    <button value="Search" type="submit">
                        <?php \Elementor\Icons_Manager::render_icon($settings['search_icon'], ['aria-hidden' => 'true']); ?>
                    </button>
                </form>
                <span class="flexitype-search-box-icon">                    
                    <?php \Elementor\Icons_Manager::render_icon($settings['close_icon'], ['aria-hidden' => 'true']); ?>
                </span>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new FlexiType_Search);