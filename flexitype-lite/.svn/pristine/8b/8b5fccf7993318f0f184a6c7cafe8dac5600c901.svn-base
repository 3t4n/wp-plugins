<?php

use Elementor\Element_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;

if (!defined('ABSPATH'))
    exit;
function flexitype_lite_register_controls_sticky( $section) {

    $section->start_controls_section(
        'section_sticky_controls',
        [
            'label' => esc_html__( 'FlexiType Sticky', 'flexitype-lite' ),
            'tab'   => Controls_Manager::TAB_ADVANCED,
        ]
    );

    $section->add_control(
        'section_sticky_on',
        [
            'label'        => esc_html__( 'Enable', 'flexitype-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
        ]
    );

    $section->add_control(
        'select_sticky_style',
        [
            'label' => esc_html__('Sticky Style', 'flexitype-lite'),
            'type' => Controls_Manager::SELECT,
            'label_block' => false,
            'options' => [
                'design-1' => esc_html__('Normal', 'flexitype-lite'),
                'design-2' => esc_html__('Animate', 'flexitype-lite'),
            ],
            'default' => 'design-1',
            'condition' => [
                'section_sticky_on' => 'yes',
            ],
        ]
    );

    $section->add_responsive_control(
        'section_sticky_offset',
        [
            'label'     => esc_html__( 'Offset', 'flexitype-lite' ),
            'type'      => Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}.header__sticky.header__sticky-sticky-menu' => 'margin-top: {{SIZE}}px;',
                '{{WRAPPER}}.flexitype_sticky' => 'top: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'section_sticky_on' => 'yes',
            ],
        ]
    );

    $section->add_control(
        'section_sticky_active_bg',
        [
            'label'     => esc_html__( 'Background', 'flexitype-lite' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}.header__sticky.header__sticky-sticky-menu' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'section_sticky_on' => 'yes',
                'select_sticky_style' => 'design-2',
            ],
        ]
    );

    $section->add_responsive_control(
        'section_sticky_active_padding',
        [
            'label'      => esc_html__( 'Padding', 'flexitype-lite' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors'  => [
                '{{WRAPPER}}.header__sticky.header__sticky-sticky-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition'  => [
                'section_sticky_on' => 'yes',
                'select_sticky_style' => 'design-2',
            ],
        ]
    );

    $section->add_group_control(
        Group_Control_Box_Shadow::get_type(),
        [
            'label'     => esc_html__( 'Box Shadow', 'flexitype-lite' ),
            'name'      => 'section_sticky_active_shadow',
            'selector'  => '{{WRAPPER}}.header__sticky.header__sticky-sticky-menu',
            'condition' => [
                'section_sticky_on' => 'yes',
                'select_sticky_style' => 'design-2',
            ],
        ]
    );

    $section->end_controls_section();
}

add_action( 'elementor/element/section/section_advanced/after_section_end', 'flexitype_lite_register_controls_sticky');
add_action( 'elementor/element/column/section_advanced/after_section_end', 'flexitype_lite_register_controls_sticky');
add_action( 'elementor/element/container/section_layout/after_section_end', 'flexitype_lite_register_controls_sticky');
/**
 * Sticky Before Render
 *
 */
 function flexitype_lite_sticky_before_render( $section ) {
    $settings = $section->get_settings_for_display();

    if ( ! empty( $settings['section_sticky_on'] ) == 'yes' ) {
        $section->add_render_attribute( '_wrapper', 'class', 'header__sticky flexitype_sticky' );
    }
}

add_action( 'elementor/frontend/section/before_render', 'flexitype_lite_sticky_before_render');
add_action( 'elementor/frontend/container/before_render', 'flexitype_lite_sticky_before_render');
add_action( 'elementor/frontend/column/before_render', 'flexitype_lite_sticky_before_render');