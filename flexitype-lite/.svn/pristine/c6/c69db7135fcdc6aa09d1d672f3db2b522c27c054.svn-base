<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class FlexiType_Button extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-button';
    }

    public function get_title()
    {
        return esc_html__('Button','flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-button';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['flexitype', 'button', 'btn', 'elements'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Button','flexitype-lite'),
            ]
        );
        $this->add_responsive_control(
            'button_align',
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
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button-area' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('Text','flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More','flexitype-lite'),
                'label_block' => false,
            ]
        );
        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__('Icon','flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-plus',
					'library' => 'fa-solid',
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
                ],
			]
		);
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__('Title URL','flexitype-lite'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('Paste URL or Link','flexitype-lite'),
                'default' => [
                    'url' => 'http://example.com',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Button Style','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
			'width',
			[
				'label'			=> esc_html__( 'Width (%)','flexitype-lite' ),
				'type'			=> Controls_Manager::SLIDER,
				'selectors'		=> [
					'{{WRAPPER}} .flexitype-button' => 'width: {{SIZE}}%;',
				]
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
				'name' => 'border_type',
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
        $this->end_controls_tab();

        $this->start_controls_tab(
            'hover_icon',
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
				'name' => 'hover_border_type',
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
					'{{WRAPPER}} .flexitype-button .icon svg path' => 'transition: {{SIZE}}{{UNIT}}',
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
                    '{{WRAPPER}} .flexitype-button:hover svg path' => 'fill: {{VALUE}}',
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
                    '{{WRAPPER}} .flexitype-button:hover svg' => 'transform: rotate({{SIZE}}deg);',
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
            'button_icon_style',
            [
                'label' => esc_html__('Icon Style','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} .flexitype-button .icon svg path' => 'fill: {{VALUE}}',
                    
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
                    '{{WRAPPER}} .flexitype-button .icon svg' => 'max-width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .flexitype-button .icon svg' => 'transform: rotate({{SIZE}}deg);',
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
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if (!empty($settings['btn_url']['url'])) {
            $this->add_link_attributes('btn_url', $settings['btn_url']);
        }

        ?>
        <div class="flexitype-button-area">
        <a class="flexitype-button <?php echo esc_attr( $settings['icon_align'] ); ?>" <?php echo $this->get_render_attribute_string('btn_url'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
            <?php echo esc_html($settings['btn_text']); ?>
            <span class="icon">
                <?php if (!empty($settings['button_icon']['value'])):?>
                    <?php \Elementor\Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']); ?>
                <?php endif;?>
            </span>
        </a>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new FlexiType_Button);