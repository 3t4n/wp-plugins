<?php

namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;
use News_Element\Khobish_Helper;

if (!defined('ABSPATH')) 
    exit; // Exit if accessed directly


class khb_heading_blq extends Widget_Base {

    public function get_name() {
        return 'khbhdoblq';
    }

    public function get_title() {
        return   esc_html__('Heading Oblique', 'news-element');
    }

    public function get_icon() {
        return 'dashicons dashicons-edit';
    }

    public function get_categories() {
        return ['khobish-element'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_heading',
            [
                'label' =>   esc_html__('Heading', 'news-element'),
            ]
        );

        $this->add_control(
            'heading',
            [
                'type' => 'textarea',
                'label' =>   esc_html__('Heading Title', 'news-element'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'ftag',
            [
                'type' => Controls_Manager::SELECT,
                'label' =>   esc_html__('Header tag', 'news-element'),
                'default' => 'h2',
                'options' => [
                    'h1' =>   esc_html__('H1', 'news-element'),
                    'h2' =>   esc_html__('H2', 'news-element'),
                    'h3' =>   esc_html__('H3', 'news-element'),
                    'h4' =>   esc_html__('H4', 'news-element'),
                    'span' =>   esc_html__('Span', 'news-element'),
                    'p' =>   esc_html__('p', 'news-element'),
                ],
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'section_gen',
            [
                'label' =>   esc_html__('General', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'align',
            [
                'label' =>   esc_html__('Alignment', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'none' => [
                        'title' =>   esc_html__('Left', 'news-element'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'inherit' => [
                        'title' =>   esc_html__('Center', 'news-element'),
                        'icon' => 'eicon-text-align-center',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .khb-heading-oblique .main-head:before' => 'display: {{VALUE}};',
                ],                 
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'htypo',
                'label' =>   esc_html__('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .main-head',
            ]
        );

        $this->add_control(
            'txtclr',
            [
                'label' =>   esc_html__('Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .main-head .inr span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bgclr',
            [
                'label' =>   esc_html__('Background', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .main-head .inr:before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'capad',
            [
                'label' => __('Label padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .main-head .inr span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'ebcs',
            [
                'label' =>   esc_html__( 'Skew background', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -20,
                        'max' => 20,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .main-head .inr:before' => 'transform: skew({{SIZE}}deg);-webkit-transform:skew({{SIZE}}deg);',
                ],

            ]
        );

        $this->add_control(
            'fgbg',
            [
                'label' =>   esc_html__('Line color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .main-head:after,{{WRAPPER}} .main-head:before' => 'border-top-color: {{VALUE}};',
                ],               
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';
    }

}


if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\khb_heading_blq());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khb_heading_blq());
}
