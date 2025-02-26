<?php
namespace EasyEddForElementor\Widgets\Customizer;


class TemplateCustomizer
{
    public function init( $base )
    {
        $this->buttonCustomization( $base );
        $this->itemPriceCustomization( $base );
        $this->registerTitleCustomizer( $base );
        $this->registerLayoutCustomizer( $base );

    }

    private function buttonCustomization ( $base )
    {
        $base->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__( 'Button', 'ele-edd-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $base->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button-typography',
                'selector' => '{{WRAPPER}} .edd-submit',
            ]
        );

        $base->add_control(
            'button-margin',
            [
                'label' => esc_html__( 'Margin', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .edd_purchase_submit_wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $base->add_control(
            'button-padding',
            [
                'label' => esc_html__( 'Padding', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .edd_purchase_submit_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $base->add_control(
            'button-color',
            [
                'label' => esc_html__( 'Button Color', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#428bca',
                'selectors' => [
                    '{{WRAPPER}} .edd-submit' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $base->add_control(
            'button-border-color',
            [
                'label' => esc_html__( 'Button Border Color', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#357ebd',
                'selectors' => [
                    '{{WRAPPER}} .edd-submit' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $base->add_control(
            'button-text-color',
            [
                'label' => esc_html__( 'Button Text Color', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .edd-submit' => 'color: {{VALUE}};',
                ],
            ]
        );

        $base->add_control(
            'button-hover-color',
            [
                'label' => esc_html__( 'Button Hover Color', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .edd-submit:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $base->add_control(
            'button-hover-border-color',
            [
                'label' => esc_html__( 'Button Hover Border Color', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#357ebd',
                'selectors' => [
                    '{{WRAPPER}} .edd-submit:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $base->add_control(
            'button-hover-text-color',
            [
                'label' => esc_html__( 'Button Hover Text Color', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .edd-submit:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $base->end_controls_section();
    }

    private function itemPriceCustomization ( $base )
    {

        $base->start_controls_section(
            'section_style_price',
            [
                'label' => esc_html__( 'Price', 'ele-edd-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $base->add_control(
            'price-color',
            [
                'label' => esc_html__( 'Price Color', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .edd_price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $base->add_control(
            'price-font-size',
            [
                'label' => esc_html__( 'Price Font Size', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'rem' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edd_price' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $base->add_control(
            'price-font-weight',
            [
                'label' => esc_html__( 'Price Font Weight', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'normal',
                'options' => [
                    'normal' => esc_html__( 'Normal', 'ele-edd-addon' ),
                    'bold' => esc_html__( 'Bold', 'ele-edd-addon' ),
                    '100' => esc_html__( '100', 'ele-edd-addon' ),
                    '200' => esc_html__( '200', 'ele-edd-addon' ),
                    '300' => esc_html__( '300', 'ele-edd-addon' ),
                    '400' => esc_html__( '400', 'ele-edd-addon' ),
                    '500' => esc_html__( '500', 'ele-edd-addon' ),
                    '600' => esc_html__( '600', 'ele-edd-addon' ),
                    '700' => esc_html__( '700', 'ele-edd-addon' ),
                    '800' => esc_html__( '800', 'ele-edd-addon' ),
                    '900' => esc_html__( '900', 'ele-edd-addon' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .edd_price' => 'font-weight: {{VALUE}};',
                ],
            ]
        );

        $base->add_control(
            'price-text-transform',
            [
                'label' => esc_html__( 'Price Text Transform', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => esc_html__( 'None', 'ele-edd-addon' ),
                    'capitalize' => esc_html__( 'Capitalize', 'ele-edd-addon' ),
                    'uppercase' => esc_html__( 'Uppercase', 'ele-edd-addon' ),
                    'lowercase' => esc_html__( 'Lowercase', 'ele-edd-addon' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .edd_price' => 'text-transform: {{VALUE}};',
                ],
            ]
        );

        $base->add_control(
            'price-text-decoration',
            [
                'label' => esc_html__( 'Price Text Decoration', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => esc_html__( 'None', 'ele-edd-addon' ),
                    'underline' => esc_html__( 'Underline', 'ele-edd-addon' ),
                    'line-through' => esc_html__( 'Line-Through', 'ele-edd-addon' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .edd_price' => 'text-decoration: {{VALUE}};',
                ],
            ]
        );

        $base->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'price-typography',
                'selector' => '{{WRAPPER}} .edd_price',
            ]
        );

        $base->add_control(
            'price-margin',
            [
                'label' => esc_html__( 'Margin', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .edd_price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $base->add_control(
            'price-padding',
            [
                'label' => esc_html__( 'Padding', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .edd_price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $base->end_controls_section();
    }

    private function registerTitleCustomizer( $base )
    {
        $base->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__( 'Title', 'ele-edd-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $base->add_control(
            'title-color',
            [
                'label' => esc_html__( 'Color', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edd-product-info h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $base->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title-typography',
                'selector' => '{{WRAPPER}} .edd-product-info h3 a',
            ]
        );

        $base->add_control(
            'title-margin',
            [
                'label' => esc_html__( 'Margin', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .edd-product-info h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $base->add_control(
            'title-padding',
            [
                'label' => esc_html__( 'Padding', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .edd-product-info h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $base->end_controls_section();
    }

    private function registerLayoutCustomizer( $base )
    {
        $base->start_controls_section(
            'section_layout_style',
            [
                'label' => esc_html__( 'Layout Margin', 'ele-edd-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $base->add_control(
            'layout-margin',
            [
                'label' => esc_html__( 'Margin', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .edd-product,{{WRAPPER}} .edd-product-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $base->end_controls_section();
    }
}