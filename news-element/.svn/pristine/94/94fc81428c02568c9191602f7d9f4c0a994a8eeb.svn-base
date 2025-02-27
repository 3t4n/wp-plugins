<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
if ( ! defined( 'ABSPATH' ) ) { exit; }
// Helper Class
class News_Element_Widget_Style
{
    public function __construct()
    {
        add_action( 'newsmag_filter_tax_style', [$this, 'filter_tax_style']);
        add_action( 'newsmag_pagination_style', [$this, 'pagination_style']);
        add_action( 'newsmag_block_style', [$this, 'block_style'],10,4);
        add_action( 'newsmag_read_more_style', [$this, 'read_more_style'],10,4);
        add_action( 'newsmag_overlay_tax_style', [$this, 'overlay_tax_style'],10,2);
        add_action( 'newsmag_raised_content', [$this, 'raised_content'],10,3);
        add_action( 'newsmag_flex_list', [$this, 'flex_thumb_list'],10,3);
        add_action( 'newsmag_swiper_control', [$this, 'swiper_control']);
        add_action( 'newsmag_post_title_style', [$this, 'post_title_style'],10,3);
        add_action( 'newsmag_post_meta_style', [$this, 'post_meta'],10,2);
        add_action( 'newsmag_post_excerpt_style', [$this, 'excerpt_meta']);
        add_action( 'newsmag_post_cat_bg_style', [$this, 'bg_cat_control'],10,2);
        add_action( 'newsmag_post_bg_style', [$this, 'post_bg'],10,3);
        add_action( 'newsmag_comm_style', [$this, 'comm_style'],10,3);
        add_action( 'newsmag_heading_style', [$this, 'heading_style'],10,4);
    }

    static function heading_style($wb,$prefix,$selector,$title=""){


        $wb->add_responsive_control(
            $prefix.'clr',
            [
                'label' => __( $title.' Color', 'news-element' ),
                'type' =>  Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'color: {{VALUE}};',
                ],

            ]
        );

        $wb->add_responsive_control(
            $prefix.'mg',
            [
                'label' => __($title.' Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $wb->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => $prefix.'typ',
                'label' => __($title.' Typography', 'news-element'),
                'selector' => '{{WRAPPER}} '.$selector,
            ]
        );

    }

    static function bg_cat_control($wb,$prefix){

        $wb->add_responsive_control(
            $prefix.'brd',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .cat-bg' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'pd',
            [
                'label' => __('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cat-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $wb->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => $prefix.'typ',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .cat-bg',
            ]
        );

        $wb->add_control(
            $prefix.'clr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cat-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'bgd',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cat-bg' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

    }
    
    static function comm_style($wb,$prefix,$selector){

        $wb->add_control(
            $prefix.'clr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'bgd',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $wb->add_control(
            $prefix.'hclr',
            [
                'label' => __( 'Hover color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $selector.':hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'hbgd',
            [
                'label' => __( 'Hover background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $selector.':hover' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix . 'brd',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'pd',
            [
                'label' => __('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $wb->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => $prefix . 'typ',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} ' . $selector,
            ]
        );

    }        

    static function post_bg($wb,$prefix,$selector){

        $wb->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => $prefix . 'bg',
                'label' => __('Overlay background', 'news-element'),
                'selector' => '{{WRAPPER}} ' . $selector.' .inrwrp::before',
            ]
        );

        $wb->add_responsive_control(
            $prefix.'bpd',
            [
                'label' => __('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} ' . $selector.' .inrwrp' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $wb->add_responsive_control(
            $prefix.'bht',
            [
                'label' => __( 'Height', 'news-element' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1000,
                    ],

                ],
                'size_units' => ['px','%'],                
                'selectors' => [
                    '{{WRAPPER}} ' . $selector.' .inrwrp' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix . 'brd',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} ' . $selector.' .inrwrp' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_control(
            $prefix . 'ps',
            [
                'label' => __('Position', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'center' => [
                        'title' => __('Center', 'news-element'),
                        'icon' => ' eicon-align-center-v',
                    ],
                    'flex-start' => [
                        'title' => __('Start', 'news-element'),
                        'icon' => ' eicon-align-center-v',
                    ],                    
                    'flex-end' => [
                        'title' => __('Flex end', 'news-element'),
                        'icon' => ' eicon-align-end-v',
                    ],
                    'baseline' => [
                        'title' => __('Baseline', 'news-element'),
                        'icon' => ' eicon-v-align-bottom',
                    ]
                ],
                'default' => 'flex-end',
                'selectors' => [
                    '{{WRAPPER}} ' . $selector.' .inrwrp' => 'align-items: {{VALUE}};',
                ],
            ]
        );

    }
    
    static function excerpt_meta($wb)
    {
        $wb->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'exc_typo',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .entry_excerpt',
            ]
        );

        $wb->add_control(
            'exc_clr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry_excerpt' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            'exc_pd',
            [
                'label' => esc_html__('Padding', 'educat'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .entry_excerpt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

    }
    static function post_meta($wb,$alt)
    {

        $wb->add_responsive_control(
            'mtsp',
            [
                'label' => __('Meta spacing', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .meta-space' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $wb->add_responsive_control(
            'pmkl',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            'pmkll',
            [
                'label' => __( 'Link Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        if($alt){

            $wb->add_responsive_control(
                'pm1clr',
                [
                    'label' => __( 'Light Color', 'news-element' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} '.$alt.' .leffect-1' => 'color: {{VALUE}};',
                        
                    ],
                ]
            );
    
            $wb->add_responsive_control(
                'pm1lclr',
                [
                    'label' => __( 'Light Link Color', 'news-element' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} '.$alt.' .leffect-1 a' => 'color: {{VALUE}};',
                    ],
                ]
            );

        }

        $wb->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'pm1typ',
                'selector' => '{{WRAPPER}} .leffect-1',
                'label' => __( 'Typography', 'news-element' ),
            ]
        );

        $wb->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'pmlktyp',
                'selector' => '{{WRAPPER}} .leffect-1 a',
                'label' => __( 'Link Typography', 'news-element' ),
            ]
        );

    }    

    static function post_title_style($wb,$prefix,$selector){

        $wb->add_control(
            $prefix .'nef',
            [
                'label' => __( 'Disable background', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' a' => 'padding: 0;border-color:transparent;box-shadow:none;',
                ],
            ]
        );        
        $wb->add_control(
            $prefix .'bg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    $prefix.'nef!' => 'yes',
                ],                
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' a' => 'background: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            $prefix .'bkl',
            [
                'label' => __( 'Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    $prefix.'nef!' => 'yes',
                ],                
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' a' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            $prefix .'bxd',
            [
                'label' => __( 'Box shadow color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    $prefix.'nef!' => 'yes',
                ],                
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' a' => 'box-shadow: 0 3px 0 {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix .'clr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix .'klmp',
            [
                'label' => __( 'Line clamp', 'news-element' ),
                'condition' => [
                    $prefix.'nef' => 'yes',
                ],                 
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => '-webkit-line-clamp: {{SIZE}};display:-webkit-box;',
                ],

            ]
        );

        $wb->add_responsive_control(
            $prefix .'mrg',
          [
             'label' =>   esc_html__( 'Margin', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $wb->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => $prefix .'typ',
                'selector' => '{{WRAPPER}} ' . $selector,
                'label' => __( 'Typography', 'news-element' ),
            ]
        );

    }        
    static function flex_thumb_list($wb,$prefix,$selector){

        $wb->add_responsive_control(
            $prefix.'bg',
            [
                'label' => __( 'Wrapper background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'background: {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'bdk',
            [
                'label' => __( 'Wrapper border', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'br',
            [
                'label' => __( 'Wrapper border radius', 'news-element' ),
                'type' => Controls_Manager::SLIDER,             
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'pd',
            [
                'label' => __( 'Wrapper padding', 'news-element' ),
                'type' => Controls_Manager::SLIDER,             
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'gpu',
            [
                'label' => __( 'Thumb gap', 'news-element' ),
                'type' => Controls_Manager::SLIDER,             
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'wdr',
            [
                'label' => __( 'Thumb width', 'news-element' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1000,
                    ],

                ],
                'size_units' => ['px','%'],                
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' .ft-thumbwrap' => 'width: {{SIZE}}{{UNIT}};flex:0 0 {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'ht',
            [
                'label' => __( 'Thumb height', 'news-element' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1000,
                    ],

                ],
                'size_units' => ['px','%'],                
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' .ft-thumbwrap img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'brd',
            [
                'label' => __( 'Thumb border radius', 'news-element' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1000,
                    ],

                ],
                'size_units' => ['px','%'],                
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' .ft-thumbwrap' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'blk',
            [
                'label' => __('Flex direction', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'column' => [
                        'title' => __('Column', 'news-element'),
                        'icon' => ' eicon-document-file',
                    ],
                    'row' => [
                        'title' => __('Row', 'news-element'),
                        'icon' => 'eicon-image-rollover',
                    ],
                    'row-reverse' => [
                        'title' => __('Row reverse', 'news-element'),
                        'icon' => ' eicon-document-file',
                    ],
                ],
                'label_block' => true,
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'flex-direction: {{VALUE}};',
                ],                
            ]
        );

        $wb->add_responsive_control(
            $prefix.'tal',
            [
                'label' => __('Text alignment', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'news-element'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'news-element'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'news-element'),
                        'icon' => 'eicon-text-align-right',
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            $prefix.'cntbg',
            [
                'label' => __( 'Content background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    $prefix.'blk' => 'column',
                ],                
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' .excerpt-wrap' => 'background: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            $prefix.'cntbdr',
            [
                'label' => __( 'Content border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    $prefix.'blk' => 'column',
                ],                
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' .excerpt-wrap' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            $prefix.'cntcn',
            [
                'label' => __( 'Center Content', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'condition' => [
                    $prefix.'blk' => 'column',
                ],                 
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' .excerpt-wrap' => 'margin: 0px auto;',
                ],
            ]
        );

        $wb->add_control(
            $prefix.'lau',
            [
                'label' => __( 'Left auto value', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'condition' => [
                    $prefix.'blk' => 'column',
                ],                 
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' .excerpt-wrap' => 'left: auto;',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'cntwd',
            [
                'label' => __( 'Content width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'size_units' => [ '%'],
                'condition' => [
                    $prefix.'blk' => 'column',
                ], 
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' .excerpt-wrap' => 'width: {{SIZE}}%;',
                ],

            ]
        );

        $wb->add_responsive_control(
            $prefix.'cntbt',
            [
                'label' => __( 'Content border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'condition' => [
                    $prefix.'blk' => 'column',
                ], 
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' .excerpt-wrap' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $wb->add_responsive_control(
            $prefix.'cntbrt',
            [
                'label' => __( 'Content padding', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'size_units' => ['px','%'],                
                'condition' => [
                    $prefix.'blk' => 'column', 
                ], 
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' .excerpt-wrap' => 'padding: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $wb->add_responsive_control(
            $prefix.'rtns',
            [
                'label' => __( 'Raised top margin', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'condition' => [
                    $prefix.'blk' => 'column',
                ], 
                'size_units' => [ '%'],
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' .excerpt-wrap' => 'margin-top: -{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $wb->add_responsive_control(
            $prefix.'hoth',
            [
                'label' => __( 'Hide overlaythumb', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,             
                'selectors' => [
                    '{{WRAPPER}} '.$selector.' .khboverlaythumb' => 'display: none;',
                ],
            ]
        );

    }

    static function raised_content($wb,$prefix,$selector){

        $wb->add_control(
            $prefix.'raised',
            [
                'label' => __( 'Raised content', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'news-element' ),
                'label_off' => __( 'No', 'news-element' ),
            ]
        );

        $wb->add_control(
            $prefix.'centercnt',
            [
                'label' => __( 'Center Content', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'margin: 0px auto;',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'raised_width',
            [
                'label' => __( 'Raised content width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ '%'],
                'condition' => [
                    $prefix.'raised' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'width: {{SIZE}}%;',
                ],

            ]
        );

        $wb->add_responsive_control(
            $prefix.'raised_top',
            [
                'label' => __( 'Raised top margin', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'condition' => [
                    $prefix.'raised' => 'yes',
                ],
                'size_units' => [ '%'],
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'margin-top: -{{SIZE}}{{UNIT}};',
                ],

            ]
        );

    }

    static function swiper_control($wb)
    {

        $wb->start_controls_section(
            'section_carousel',
            [
                'label' => esc_html__('Carousel', 'educat'),
                'tab' => Controls_Manager::TAB_STYLE,
                // 'condition' => [
                //     'disp' => 'slide',
                // ],                
            ]
        );

        $wb->add_responsive_control(
            'swpgpd',
            [
                'label' => esc_html__('Wrapper padding', 'educat'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['em', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .swiper.news-swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_control(
            'fcwe',
            [
                'label' => esc_html__('Full width carousel', 'educat'),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .swiper.news-swiper-slide' => 'overflow:inherit;',
                ],
            ]
        );

        $wb->add_control(
            'arrow',
            [
                'label' => esc_html__('Show arrow', 'educat'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'educat'),
                'label_off' => esc_html__('No', 'educat'),
            ]
        );

        $wb->add_control(
            'mouse',
            [
                'label' => esc_html__('Mouse scroll', 'educat'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'educat'),
                'label_off' => esc_html__('No', 'educat'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $wb->add_control(
            'centermode',
            [
                'label' => esc_html__('Center mode', 'educat'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'educat'),
                'label_off' => esc_html__('No', 'educat'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $wb->add_control(
            'cover',
            [
                'label' => esc_html__('Enable coverflow', 'educat'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'educat'),
                'label_off' => esc_html__('No', 'educat'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $wb->add_control(
            'dot',
            [
                'label' => esc_html__('Show dot', 'educat'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'educat'),
                'label_off' => esc_html__('No', 'educat'),
            ]
        );

        $wb->add_control(
            'space',
            [
                'label' => esc_html__('Spacing', 'educat'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'default' => [
                    'size' => 30,
                ],
            ]
        );

        $wb->add_control(
            'item',
            [
                'label' => esc_html__('Item for laptop', 'educat'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => .5,
                    ],
                ],
                'default' => [
                    'size' => 3,
                ],
                'size_units' => ['px'],
            ]
        );

        $wb->add_control(
            'item_tab',
            [
                'label' => esc_html__('Item for Tablet', 'educat'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => .5,
                    ],
                ],
                'default' => [
                    'size' => 2,
                ],
                'size_units' => ['px'],
            ]
        );

        $wb->add_control(
            'item_mob',
            [
                'label' => esc_html__('Item for Mobile', 'educat'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => .5,
                    ],
                ],
                'default' => [
                    'size' => 2,
                ],
                'size_units' => ['px'],
            ]
        );

        $wb->add_control(
            'auto',
            [
                'label' => esc_html__('Autoplay', 'educat'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'educat'),
                'label_off' => esc_html__('No', 'educat'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $wb->add_control(
            'speed',
            [
                'label' => esc_html__('Slide speed', 'educat'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 8000,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 3000,
                ],
                'condition' => [
                    'auto' => 'yes',
                ],
            ]
        );

        $wb->end_controls_section();

        $wb->start_controls_section(
            'section_arow',
            [
                'label' => esc_html__('Arrow', 'educat'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'arrow' => 'yes',
                ],
            ]
        );
        $wb->add_control(
            'previkn',
            [
                'label' => esc_html__('Previous icon', 'educat'),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,
            ]
        );

        $wb->add_control(
            'nextikn',
            [
                'label' => esc_html__('Next icon', 'educat'),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,
            ]
        );
        $wb->add_responsive_control(
            'ar_wh',
            [
                'label' => esc_html__('Width & height', 'educat'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_control(
            'arbg',
            [
                'label' => esc_html__('Background', 'educat'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'background: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'arclr',
            [
                'label' => esc_html__('Color', 'educat'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'arhbg',
            [
                'label' => esc_html__('Hover background', 'educat'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'arhclr',
            [
                'label' => esc_html__('Hover color', 'educat'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'dbclr',
            [
                'label' => esc_html__('Border color', 'educat'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            'arrad',
            [
                'label' => esc_html__('Border radius', 'educat'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            'arfx',
            [
                'label' => esc_html__('Font size', 'educat'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->end_controls_section();

        $wb->start_controls_section(
            'section_caroucs',
            [
                'label' => esc_html__('Dot', 'educat'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'dot' => 'yes',
                ],
            ]
        );

        $wb->add_control(
            'dal',
            [
                'label' => esc_html__('Alignment', 'educat'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'educat'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'educat'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'educat'),
                        'icon' => 'eicon-h-align-right',
                    ]
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            'dot_sp',
            [
                'label' => esc_html__('Spacing', 'educat'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-bullets .swiper-pagination-bullet' => 'margin:0px {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            'dot_whp',
            [
                'label' => esc_html__('Width & height', 'educat'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-bullets .swiper-pagination-bullet' => 'width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            'dvp',
            [
                'label' => esc_html__('Vertical position', 'educat'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],

                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination' => 'bottom:{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $wb->add_control(
            'dt-m',
            [
                'label' => esc_html__('Main color', 'educat'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination span' => 'background: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'dt-s',
            [
                'label' => esc_html__('Active color', 'educat'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination span.swiper-pagination-bullet-active' => 'background: {{VALUE}};',
                ],
            ]
        );

        $wb->end_controls_section();
        

    }

    static function overlay_tax_style($wb,$prefix){

        $wb->add_responsive_control(
            $prefix.'vps',
            [
                'label' => __('Top Position', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb' => 'top: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $wb->add_responsive_control(
            $prefix.'lps',
            [
                'label' => __('Left Position', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb' => 'left: {{SIZE}}{{UNIT}};',
                ]
            ]
        ); 
     
        $wb->add_responsive_control(
            $prefix.'rps',
            [
                'label' => __('Right Position', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb' => 'right: {{SIZE}}{{UNIT}};',
                ]
            ]
        );


        $wb->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => $prefix.'typo',
                'selector' => '{{WRAPPER}} .khboverlaythumb .cat-bg',
            ]
        );

        $wb->add_responsive_control(
            $prefix.'pad',
            [
                'label' => __('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb .cat-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $wb->add_control(
            $prefix.'clr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb .cat-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            $prefix.'bg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb .cat-bg' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $wb->add_control(
            $prefix.'brad',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb .cat-bg' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

    }

    static function read_more_style($wb){
        $wb->start_controls_section(
            'section_readmore',
            [
                'label' => __('Read more', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $wb->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .btn-more',
            ]
        );

        $wb->add_control(
            'btn_color',
            [
                'label' => __( 'Button color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'btn_colorbg',
            [
                'label' => __( 'Button background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'background: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'btn_color-h',
            [
                'label' => __( 'Button color hover', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'btn_colorbgh',
            [
                'label' => __( 'Button background hover', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'btn_bcol',
            [
                'label' => __( 'Button border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'btn_bcolh',
            [
                'label' => __( 'Button border hover', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $wb->add_control(
            'bbtnwidth',
            [
                'label' => __( 'Border width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'border-width: {{SIZE}}{{UNIT}};border-style:solid',
                ],

            ]
        );

        $wb->add_control(
            'bbtnradius',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $wb->add_responsive_control(
            'btn-pad',
            [
                'label' => __('Button padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $wb->end_controls_section();
    }
    static function block_style($wb,$prefix,$selector,$label){

        $wb->add_control(
            $prefix.'bg',
            [
                'label' => __( $label.' background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'background: {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'pad',
            [
                'label' => __($label.' padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $wb->add_control(
            $prefix.'bdr',
            [
                'label' => __( $label.' border', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            $prefix.'brd',
            [
                'label' => __( $label.' border-radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} '.$selector => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

    }
    static function pagination_style($wb){

        $wb->start_controls_section(
            'section_button',
            [
                'label' => __('Pagination', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'pagination!' => '',
                ],
            ]
        );

        $wb->add_control(
            'vcenar',
            [
                'label' => __( 'Vertical center arrow', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .prev-next' => 'top: 50%;transform: translateY(-50%);position: absolute;left: 0;    right: 0;',
                ],
            ]
        );

        $wb->add_control(
            'pnpgj',
            [
                'label' => __( 'Left right arrow', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .prev-next' => 'justify-content:space-between;',
                    '{{WRAPPER}} .middle-bar' => 'flex: 1;',
                ],
            ]
        );

        $wb->add_responsive_control(
            'pnxt_w',
            [
                'label' => __( 'Prev next height & width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],

                ],
                'condition' => [
                    'pagination' => ['prev_next','numeric'],
                ],
                'size_units' => [ 'px','%'],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination .prev,{{WRAPPER}} .khobish_pagination .next,{{WRAPPER}} li .page-numbers' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $wb->add_responsive_control(
            'pnspcingt',
            [
                'label' => __( 'Prev next inner spacing', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'condition' => [
                    'pagination' => 'prev_next',
                ],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination' => 'gap:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            'load_more_w',
            [
                'label' => __( 'Button width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],

                ],
                'condition' => [
                    'pagination' => 'load_more',
                ],
                'size_units' => [ 'px','%'],
                'selectors' => [
                    '{{WRAPPER}} .load-more .mz_next' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $wb->add_responsive_control(
            'load_more_h',
            [
                'label' => __( 'Button height', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],

                ],
                'condition' => [
                    'pagination' => 'load_more',
                ],
                'size_units' => [ 'px','%'],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination.load-more a' => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $wb->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typographyy',
                'selector' => '{{WRAPPER}} .khobish_pagination',
            ]
        );

        $wb->add_control(
            'align_btn',
            [
                'label' => __('Alignment', 'webangon'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __('Left', 'webangon'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'webangon'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', 'webangon'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            'btn_margin',
            [
                'label' => __('Margin', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $wb->add_control(
            'btn_colorr',
            [
                'label' => __('Color', 'webangon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'btn_bg',
            [
                'label' => __('Backgroundcolor', 'webangon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a' => 'background: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'btn-border_color',
            [
                'label' => __( 'Border color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'btn_colorh',
            [
                'label' => __('Hover color', 'webangon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'btn_bgh',
            [
                'label' => __('Hover background color', 'webangon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'btn-border_colorh',
            [
                'label' => __( 'Hover Border color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'btn-border-radius',
            [
                'label' => __( 'Border radius', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $wb->add_responsive_control(
            'pgisepclr',
            [
                'label' => __('Vertical line color', 'webangon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mz_prev:before,{{WRAPPER}} .mz_next:after,{{WRAPPER}} .load-more .mz_next:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .middle-bar span' => 'background: {{VALUE}};',
                ],
            ]
        );

        $wb->add_responsive_control(
            'pgisepspac',
            [
                'label' => __( 'Vertical line spacing', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .load-more .mz_next:before' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $wb->end_controls_section();


    }
    static function filter_tax_style($wb)
    {
        $wb->start_controls_section(
            'section_header4',
            [
                'label' => __('Filter', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'filtr!' => 'yes',
                ],
            ]
        );

        $wb->add_responsive_control(
            'sp_bt_sp',
            [
                'label' => __( 'Bottom spacing', 'news-element' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .kb-filter-bar' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->add_control(
            'header_color',
            [
                'label' => __( 'Title color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leftpart h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'header_typography',
                'label' => __('Title typography', 'news-element'),
                'selector' => '{{WRAPPER}} .leftpart h3',
            ]
        );

        $wb->add_control(
            'header_colorh',
            [
                'label' => __( 'Taxonomy color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rightpart a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_control(
            'ta_color',
            [
                'label' => __( 'Taxonomy active color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rightpart a:hover,{{WRAPPER}} .rightpart a.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $wb->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'lheader_typography',
                'label' => __('Taxonomy Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .rightpart a,{{WRAPPER}} .rightpart',
            ]
        );

        $wb->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sepbg',
                'label' => __('Separator background', 'news-element'),
                'selector' => '{{WRAPPER}} .centerpart span',
            ]
        );

        $wb->add_responsive_control(
            'sepf_ht',
            [
                'label' => __( 'Separator height', 'news-element' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .centerpart span' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $wb->end_controls_section();
    }
}    

new News_Element_Widget_Style();