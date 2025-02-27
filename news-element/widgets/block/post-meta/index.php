<?php

namespace News_Element\Widgets;
use Elementor;
use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use News_Element\Khobish_Helper;

class khobish_thmbld_meta extends Widget_Base{
    public function get_name() {
        return 'khbthpmeta';
    }

    public function get_title() {
        return   esc_html__( 'Post meta', 'news-element' );
    }

    public function get_icon() {
        return 'dashicons dashicons-chart-bar';
    }

    public function get_categories() {
        return [ 'khobish-builder' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_title',
            [
                'label' =>   esc_html__( 'Post Meta', 'news-element' ),
            ]
        );

        $r1 = new \Elementor\Repeater();
        $r1->add_control(
            'meta', [
                'label' =>   esc_html__( 'Post meta', 'news-element' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => false,
                'options' =>  Khobish_Helper::magnews_meta_fields(),
            ]
        );

        $this->add_control(
            'metas',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $r1->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->add_control(
            'emphasis',
            [
                'label' => __( 'Emphasis first letter', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_dgeneral',
            [
                'label' =>   esc_html__('General', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'mxwid',
            [
                'label' =>   esc_html__( 'Wrapper width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .khobish-single-meta' => 'max-width: {{SIZE}}{{UNIT}};margin:0px auto;',
                ],

            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' =>   esc_html__('Content Alignment', 'news-element'),
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
                ],
                'selectors' => [
                    '{{WRAPPER}} .khobish-single-meta' => 'text-align: {{VALUE}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'talign',
            [
                'label' =>   esc_html__('Text alignment', 'news-element'),
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
                ],
                'selectors' => [
                    '{{WRAPPER}} .khobish-single-meta .inr' => 'text-align: {{VALUE}};',
                ],

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_general',
            [
                'label' =>   esc_html__('Title', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        do_action('newsmag_post_title_style', $this,'sb_','.entry_title');

        // $this->add_group_control(
        //     Group_Control_Typography::get_type(),
        //     [
        //         'name' => 'title_typ',
        //         'label' =>   esc_html__( 'Typography', 'news-element' ),
        //         'selector' => '{{WRAPPER}} .entry_title',
        //     ]
        // );

        // $this->add_control(
        //     'titlemargins',
        //     [
        //         'label' =>   esc_html__('Margin', 'news-element'),
        //         'type' => Controls_Manager::DIMENSIONS,
        //         'size_units' => [ 'px', 'em' ],
        //         'selectors' => [
        //             '{{WRAPPER}} .entry_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );
        // $this->add_control(
        //     'titlecolor',
        //     [
        //         'label' =>   esc_html__( 'Color', 'news-element' ),
        //         'type' => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .entry_title' => 'color: {{VALUE}};'
        //         ],
        //     ]
        // );
  
        $this->end_controls_section();

        $this->start_controls_section(
            'section_emphasis',
            [
                'label' =>   esc_html__('Emphasis', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'emphasis' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'emtps',
            [
                'label' =>   esc_html__( 'Top position', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'size_units' => ['px','%','vh'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ],

                ],
                'selectors' => [
                    '{{WRAPPER}} .entry_title:before' => 'top: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'emlps',
            [
                'label' =>   esc_html__( 'Left position', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'size_units' => ['px','%','vh'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 1500,
                        'step' => 1,
                    ],

                ],
                'selectors' => [
                    '{{WRAPPER}} .entry_title:before' => 'left: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'emtypo',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .entry_title:before',
            ]
        );

        $this->add_control(
            'emclr',
            [
                'label' => __('Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry_title:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_bmeta',
            [
                'label' => __('Meta', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        do_action('newsmag_post_meta_style', $this,'');

        $this->end_controls_section();

        $this->start_controls_section(
            'section_fblock',
            [
                'label' => __('Excerpt', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        do_action('newsmag_post_excerpt_style', $this);

        $this->end_controls_section();

        $this->start_controls_section(
            'section_catbg',
            [
                'label' =>   esc_html__('Category background', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        do_action('newsmag_post_cat_bg_style', $this,'cdx_');

        $this->end_controls_section();


        $this->start_controls_section(
            'section_tag',
            [
                'label' =>   esc_html__('Tag', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tblock',
            [
                'label' =>   esc_html__( 'Display block', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' =>   esc_html__( 'Yes', 'news-element' ),
                'label_off' =>   esc_html__( 'No', 'news-element' ),
                'selectors' => [
                    '{{WRAPPER}} .tags-links' => 'display:block;',
                ],
            ]
        );


        $this->add_control(
            'tagpaddings',
            [
                'label' =>   esc_html__('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tags-links span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'tagmargins',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tags-links span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tag_typ',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .tags-links span',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'tag_border',
                'label' =>   esc_html__( 'Border', 'news-element' ),
                'selector' => '{{WRAPPER}} .tags-links span',
            ]
        );
        $this->add_control(
            'tag-bradius',
            [
                'label' =>   esc_html__( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tags-links span' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );
        $this->add_control(
            'tagbg',
            [
                'label' =>   esc_html__( 'Tag background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tags-links span' => 'background: {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'tagtxt',
            [
                'label' =>   esc_html__( 'Tag color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tags-links a' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'tagbgh',
            [
                'label' =>   esc_html__( 'Tag background hover', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tags-links span:hover' => 'background: {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'tagtxth',
            [
                'label' =>   esc_html__( 'Tag color hover', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tags-links span:hover a' => 'color: {{VALUE}};'
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render( ) {

        $settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';

    }
}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\khobish_thmbld_meta());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_thmbld_meta());
}
