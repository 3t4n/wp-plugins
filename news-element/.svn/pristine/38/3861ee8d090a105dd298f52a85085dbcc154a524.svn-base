<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;
use News_Element\Khobish_Helper;

if (!defined('ABSPATH')) 
    exit; // Exit if accessed directly


class khobish_title_d extends Widget_Base {

    public function get_name() {
        return 'khbhdyin';
    } 

    public function get_title() {
        return   esc_html__('Heading', 'news-element');
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
            'tmpl',
            [
                'label' =>   esc_html__('Template', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'one' => [
                        'title' =>   esc_html__('One', 'news-element'),
                        'icon' => ' eicon-accordion',
                    ],
                    'two' => [
                        'title' =>   esc_html__('Two', 'news-element'),
                        'icon' => ' eicon-banner',
                    ],

                    'three' => [
                        'title' =>   esc_html__('Three', 'news-element'),
                        'icon' => ' eicon-table-of-contents',
                    ],

                    'four' => [
                        'title' =>   esc_html__('Four', 'news-element'),
                        'icon' => 'eicon-frame-expand',
                    ],

                    'five' => [
                        'title' =>   esc_html__('Five', 'news-element'),
                        'icon' => 'eicon-apps',
                    ],

                 ],
                'default' => 'one',               
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
                'tab' => Controls_Manager::TAB_STYLE,
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
            'align',
            [
                'label' =>   esc_html__('Alignment', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' =>   esc_html__('Left', 'news-element'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' =>   esc_html__('Center', 'news-element'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' =>   esc_html__('Right', 'news-element'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' =>   esc_html__('Justified', 'news-element'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .khobish-heading' => 'text-align: {{VALUE}};',
                ],                 
            ]
        );

        $this->add_control(
            'txtclr',
            [
                'label' =>   esc_html__('Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .main-head' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gbbclr',
            [
                'label' =>   esc_html__('Bottom border color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .khobish-heading' => 'border-bottom-color: {{VALUE}};',
                ],
               
            ]
        );

        $this->add_responsive_control(
            'gbowid',
            [
                'label' =>   esc_html__( 'Bottom border width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khobish-heading' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'gbrtid',
            [
                'label' =>   esc_html__( 'Bottom padding', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khobish-heading' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'ebcs',
            [
                'label' =>   esc_html__( 'Bottom margin', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .khobish-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'sbg',
            [
                'label' =>   esc_html__('Background', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .one .main-head:after' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'tmpl' => 'one',
                ],                
            ]
        );

        $this->add_responsive_control(
            'sbgwid',
            [
                'label' =>   esc_html__( 'Width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .one .main-head:after' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'tmpl' => 'one',
                ], 
            ]
        );

        $this->add_responsive_control(
            'sbght',
            [
                'label' =>   esc_html__( 'Height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .one .main-head:after' => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'sbcs',
            [
                'label' =>   esc_html__( 'Vertical position', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .one .main-head:after' => 'bottom: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Label padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .headwrp' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'fgbg',
            [
                'label' =>   esc_html__('Label background', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .headwrp' => 'background: {{VALUE}};',
                ],               
            ]
        );

        $this->add_control(
            'grbg',
            [
                'label' =>   esc_html__('Background', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .khobish-heading' => 'background: {{VALUE}};',
                ],              
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_five',
            [
                'label' => __('Template Five', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'tmpl' => 'five',
                ],                
            ]
        );

        $this->add_control(
            'fvbg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish-heading.five .headwrp:before' => 'background: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_responsive_control(
            'fvtps',
            [
                'label' =>   esc_html__( 'Top spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khobish-heading.five .headwrp:before' => 'top: {{SIZE}}px;',
                ],

            ]
        );

        $this->add_responsive_control(
            'fvwid',
            [
                'label' =>   esc_html__( 'Width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khobish-heading.five .headwrp:before' => 'width: {{SIZE}}px;',
                ],

            ]
        );

        $this->add_responsive_control(
            'fvht',
            [
                'label' =>   esc_html__( 'Height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khobish-heading.five .headwrp:before' => 'height: {{SIZE}}px;',
                ],

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_ofscne',
            [
                'label' => __('Template Four', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'tmpl' => 'four',
                ],                
            ]
        );

        $this->add_responsive_control(
            'skw',
            [
                'label' =>   esc_html__( 'Skew', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -30,
                        'max' => 30,
                        'step' => 1,
                    ]
                ],
                
                'selectors' => [
                    '{{WRAPPER}} .four .headwrp' => '-webkit-transform: skew({{SIZE}}deg);transform: skew({{SIZE}}deg);',
                ],

            ]
        );

        $this->add_responsive_control(
            'lgowid',
            [
                'label' =>   esc_html__( 'Line width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px','%'],                
                'selectors' => [
                    '{{WRAPPER}} .four .headwrp:before,{{WRAPPER}} .four .headwrp:after' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );       

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'siclr',
                'label' => __('Line color', 'news-element'),
                'selector' => '{{WRAPPER}} .four .headwrp:before,{{WRAPPER}} .four .headwrp:after',
            ]
        );

        $this->add_responsive_control(
            'sfspd',
            [
                'label' =>   esc_html__( 'Line spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .four .headwrp:before' => 'margin-right: {{SIZE}}px;',
                    '{{WRAPPER}} .four .headwrp:after' => 'margin-left: {{SIZE}}px;',
                ],

            ]
        );

        $this->add_responsive_control(
            'sfd',
            [
                'label' =>   esc_html__( 'Line height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .four .headwrp:before,{{WRAPPER}} .four .headwrp:after' => 'height: {{SIZE}}px;',
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
    $widgets_manager->register(new \News_Element\Widgets\khobish_title_d());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_title_d());
}
