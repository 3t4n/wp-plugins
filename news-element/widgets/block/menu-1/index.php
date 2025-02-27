<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;;
use Elementor\utils;
use News_Element\Khobish_Helper;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class xlmega_menu_1 extends Widget_Base {

    public function get_name() {
        return 'xlmega1';
    }

    public function get_title() {
        return   esc_html__('Menu 1', 'news-element');
    }

    public function get_icon() {
        return 'dashicons dashicons-editor-paragraph';
    }

    public function get_categories() {
        return [ 'xlmega_menu' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_process_1',
            [
                'label' =>   esc_html__('Content', 'news-element'),
            ]
        );

        $r3 = new \Elementor\Repeater();

        $r3->add_control(
            'lbl', [
                'label' =>   esc_html__('Parts', 'news-element'),
                'type' => Controls_Manager::SELECT2,
                'default' => '',
                'options' => [
                    'center_logo'  => __( 'Center Logo', 'news-element' ),
                    'center_menu'  => __( 'Center Menu', 'news-element' ),
                    'center_fullwid_menu'  => __( 'Center Full Width Menu', 'news-element' ),
                    'logo_ad' => __( 'Logo + Ad', 'news-element' ),
                    'btn_logo_social' => __( 'Button + Logo + Social', 'news-element' ),
                    'btn_logo_search' => __( 'Button + Logo + Search', 'news-element' ),
                    'tap_logo_search' => __( 'Tap + Logo + Search', 'news-element' ),
                    'logo_menu_search'  => __( 'Logo + Menu + Search', 'news-element' ),
                    'logo_social' => __( 'Logo + Social', 'news-element' ),
                    'menu_logo_menu' => __( 'Menu-Logo-Menu', 'news-element' ),
                    'menu_search'  => __( 'Menu + Search', 'news-element' ),
                    'menu_social' => __( 'Menu + Social', 'news-element'),
                    'toggle_logo_search'  => __( 'Toggle + Logo + Search', 'news-element' ),
                    'topbar' => __( 'Topbar', 'news-element'),
                    'leftbar_nav' => __( 'Leftbar', 'news-element'),
                    'leftlogomenu' => __( 'Left logo menu', 'news-element'),
                ],
                'multiple' => false,
                'label_block' => true
            ]
        );

        $r3->add_control(
            'sticky', [
                'label' =>   esc_html__( 'Sticky', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'parts',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $r3->get_controls(),
                'prevent_empty' => false,
                'default' => [
                    [
                        'lbl' =>   esc_html__( 'Home', 'news-element' ),
                    ]
                ],
                'title_field' => '{{lbl}}',
            ]
        );

        $this->add_control(
            'tapicon', [
                'label' =>   esc_html__( 'Tap icon', 'news-element' ),
                'type' => Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'fas fa-bars',
					'library' => 'solid',
				],                
            ]
        );

        $this->add_control(
            'searchicon', [
                'label' =>   esc_html__( 'Search icon', 'news-element' ),
                'type' => Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'fas fa-search',
					'library' => 'solid',
				],                
            ]
        );

        $this->start_controls_tabs('hgr');

        $this->start_controls_tab(
            'a1',
            [
                'label' => esc_html__( 'General', 'xltab' ),
            ]
        );

        $this->add_control(
            'logo',
            [
                'label' =>   esc_html__('Logo', 'news-element'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'ad',
            [
                'label' =>   esc_html__('Ad', 'news-element'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'adurl', [
                'label' =>   esc_html__('Ad url', 'news-element'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' =>   esc_html__('http://your-link.com', 'news-element'),
            ]
        );

        $this->add_control(
            'menu',
            [
                'label'   => __( 'Main menu', 'xlmega-menu' ),
                'type'    => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>Khobish_Helper::thepack_drop_menu_select(),
            ]
        );

        $this->add_control(
            'menu2',
            [
                'label'   => __( 'Second half menu', 'xlmega-menu' ),
                'type'    => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => Khobish_Helper::thepack_drop_menu_select(),
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'a2',
            [
                'label' => esc_html__( 'Social', 'xltab' ),
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'icon', [
                'label' =>   esc_html__( 'Icon', 'news-element' ),
                'type' => Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'fas fa-chevron-right',
					'library' => 'solid',
				],                
            ]
        );

        $repeater1->add_control(
            'url', [
                'label' =>   esc_html__('Social link url', 'news-element'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' =>   esc_html__('http://your-link.com', 'news-element'),
            ]
        );

        $this->add_control(
            'socials',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater1->get_controls(),
                'prevent_empty' => false,
                'default' => [
                    [
                        'icon' =>   esc_html__( 'fab fa-facebook', 'news-element' ),
                    ]
                ], 
                'title_field' => '{{{ elementor.helpers.renderIcon( this, icon, {}, "i", "panel" ) || \'<i class="{{ icon }}" aria-hidden="true"></i>\' }}}',
            ]
        );


        $r2 = new \Elementor\Repeater();

        $r2->add_control(
            'lbl', [
                'label' =>   esc_html__('Label', 'news-element'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' =>   'Home',
            ]
        );

        $r2->add_control(
            'url', [
                'label' =>   esc_html__('Link', 'news-element'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' =>   esc_html__('http://your-link.com', 'news-element'),
            ]
        );

        $this->add_control(
            'links',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $r2->get_controls(),
                'prevent_empty' => false,
                'default' => [
                    [
                        'lbl' =>   esc_html__( 'Home', 'news-element' ),
                    ]
                ],
                'title_field' => '{{lbl}}',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'a3',
            [
                'label' => esc_html__( 'Offscreen', 'xltab' ),
            ]
        );

        $this->add_control(
            'searchlbl', [
                'label' =>   esc_html__('Search label', 'news-element'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Search for...',
            ]
        );

        $this->add_control(
            'ofs',
            [
                'label' => __( 'Offscreen Sidebar', 'plugin-name' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'ofmenu',
            [
                'label' =>   esc_html__('Menu', 'news-element'),
                'type' => Controls_Manager::SELECT2,
                'options' =>  Khobish_Helper::thepack_drop_menu_select(),
                'multiple' => false,
                'label_block' => true
            ]
        );

        $this->add_control(
            'copy', [
                'label' =>   esc_html__( 'Copyright text', 'news-element' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->start_controls_tabs('tmnubar');

        $this->start_controls_tab(
            'er1',
            [
                'label' => esc_html__( 'Button', 'xltab' ),
            ]
        );

        $this->add_control(
            'sub-btn', [
                'label' =>   esc_html__('Label', 'news-element'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' =>   'Subscribe',
            ]
        );

        $this->add_control(
            'sub-link', [
                'label' =>   esc_html__('Link', 'news-element'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' =>   esc_html__('http://your-link.com', 'news-element'),
            ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            'er2',
            [
                'label' => esc_html__( 'Date', 'xltab' ),
            ]
        );

        $this->add_control(
            'hdate',
            [
                'label' =>   esc_html__('Hide date', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' =>   esc_html__('Yes', 'news-element'),
                'label_off' =>   esc_html__('No', 'news-element'),
                'selectors' => [
                    '{{WRAPPER}} .xlm-topbar .khbdate' => 'display: none;',
                ],
            ]
        );

        $this->add_control(
            'gmt',
            [
                'label' => __('GMT zone', 'ashelement'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 15,
                        'min' => -15,
                        'step' => .5,
                    ],
                'default' => [
                    'size' => 4,
                ],
                ],
                'size_units' => [ 'px'],
                'condition' => [
                    'hdate!' => 'yes',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_lbl',
            [
                'label' =>   esc_html__('General', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stkybg',
            [
                'label' => __( 'Sticky background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlmega-sticky-wrapper.fixed,{{WRAPPER}} .xlmega-sticky-wrapper.fixed .menubarwrp' => 'background: {{VALUE}};border-bottom-width:0px;',
                ],
            ]
        );

        $this->start_controls_tabs('comst');

        $this->start_controls_tab(
            'com1',
            [
                'label' => esc_html__( 'Logo', 'xltab' ),
            ]
        );

        $this->add_responsive_control(
            'lgpdy',
            [
                'label' =>   esc_html__('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px','em'],
                'selectors' => [
                    '{{WRAPPER}} .tbsite-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'lgvpg',
            [
                'label' => __( 'Vertical position', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -50,
                        'max' => 50,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .tbsite-logo' => 'top: {{SIZE}}{{UNIT}};position: relative;',
                ],
            ]
        );

        $this->add_responsive_control(
            'lgwid',
            [
                'label' => __( 'Logo width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .tbsite-logo img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'com2',
            [
                'label' => esc_html__( 'Menu', 'xltab' ),
            ]
        );

        $this->add_responsive_control(
            'mylrpad',
            [
                'label' =>   esc_html__( 'Left right padding', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xlmega-menu-area > ul > li > a' => 'padding:0px {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .xlmega-menu-area' => 'margin-left:-{{SIZE}}{{UNIT}};margin-right:-{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'myclr',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlmega-menu-area > ul > li > a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'myclrh',
            [
                'label' => __( 'Hover color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlmega-menu-area > ul > li > a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'mybgh',
            [
                'label' => __( 'Hover background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlmega-menu-area > ul > li > a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'myhbarclr',
            [
                'label' => __( 'Hover bar color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlmega-menu-area > ul > li > a:before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'mtypo',
                'selector' => '{{WRAPPER}} .xlmega-menu-area > ul > li',
                'label' => __( 'Typography', 'webangon' ),
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'com3',
            [
                'label' => esc_html__( 'Sub', 'xltab' ),
            ]
        );

        $this->add_responsive_control(
            'sbwrt',
            [
                'label' =>   esc_html__( 'Width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],

                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .xlmega-menu-container ul li ul.sub-menu' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'sbbg',
            [
                'label' => __( 'Background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlmega-menu-container ul li ul.sub-menu' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sbwpd',
            [
                'label' =>   esc_html__('Wrapper padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px','em'],
                'selectors' => [
                    '{{WRAPPER}} .xlmega-menu-container ul li ul.sub-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sbdr',
                'label' =>   esc_html__( 'Border','news-element' ),
                'selector' => '{{WRAPPER}} .xlmega-menu-container ul li ul.sub-menu',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sbdty',
                'label' =>   esc_html__('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .xlmega-menu-container .sub-menu li a',
            ]
        );

        $this->add_control(
            'sbh',
            [
                'label' => __( 'Sub menu', 'plugin-name' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_responsive_control(
            'sbmpd',
            [
                'label' =>   esc_html__('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px','em'],
                'selectors' => [
                    '{{WRAPPER}} .xlmega-menu-container .sub-menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sbmclr',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlmega-menu-container .sub-menu li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sbmclrh',
            [
                'label' => __( 'Hover color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlmega-menu-container .sub-menu li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sbmbgrh',
            [
                'label' => __( 'Hover background color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlmega-menu-container .sub-menu li a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'com4',
            [
                'label' => esc_html__( 'Mega', 'xltab' ),
            ]
        );

        $this->add_responsive_control(
            'mgwid',
            [
                'label' => __( 'Width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .xlmegamenu-content-wrapper>div' => 'max-width: {{SIZE}}{{UNIT}};margin:0px auto;',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_tobr',
            [
                'label' =>   esc_html__('Top Bar', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'tbrht',
            [
                'label' =>   esc_html__( 'Height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xlm-topbar' => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'tblrp',
            [
                'label' =>   esc_html__( 'Left-right padding', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xlm-topbar .khbnav' => 'padding:0px {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'tbbg',
            [
                'label' => __( 'Background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlm-topbar' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->start_controls_tabs('tbtbar');

        $this->start_controls_tab(
            'tb1',
            [
                'label' => esc_html__( 'Link', 'xltab' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tblty',
                'label' => __('Typography', 'webangon'),
                'selector' => '{{WRAPPER}} .xlm-topbar .headerlink .linkcustom,{{WRAPPER}} .xlm-topbar .khbdate',
            ]
        );

        $this->add_control(
            'tblclr',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlm-topbar .headerlink .linkcustom,{{WRAPPER}} .xlm-topbar .khbdate' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'tblsp',
            [
                'label' =>   esc_html__( 'Spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xlm-topbar .headerlink li' => 'padding:0px {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .xlm-topbar .headerlink' => 'margin-left:-{{SIZE}}{{UNIT}};margin-right:-{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tb2',
            [
                'label' => esc_html__( 'Social', 'xltab' ),
            ]
        );

        $this->add_control(
            'tbsclr',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlm-topbar .headersocial a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'tbsfs',
            [
                'label' =>   esc_html__( 'Font size', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xlm-topbar .headersocial li' => 'font-size:{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'tbslh',
            [
                'label' =>   esc_html__( 'Line height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xlm-topbar .headersocial li a' => 'line-height:{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'tbssp',
            [
                'label' =>   esc_html__( 'Spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xlm-topbar .headersocial li' => 'padding:0px {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .xlm-topbar .headersocial' => 'margin-left:-{{SIZE}}{{UNIT}};margin-right:-{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_clgo',
            [
                'label' =>   esc_html__('Center Logo', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'clht',
            [
                'label' => __( 'Height', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .xlm-center-logo' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'clbg',
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'types' => [ 'none', 'classic','gradient' ],
                'selector' => '{{WRAPPER}} .xlm-center-logo',
            ]
        );

        $this->start_controls_tabs('cnsrt');

        $this->start_controls_tab(
            'sde1',
            [
                'label' => esc_html__( 'Button', 'xltab' ),
            ]
        );

        $this->add_control(
            'subbg',
            [
                'label' => __( 'Background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-cta' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'subclr',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-cta' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'subbgh',
            [
                'label' => __( 'Hover Background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-cta:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'subclrh',
            [
                'label' => __( 'Hover Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-cta:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'subpad',
            [
                'label' =>   esc_html__('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px','em'],
                'selectors' => [
                    '{{WRAPPER}} .header-cta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtypo',
                'selector' => '{{WRAPPER}} .header-cta',
                'label' => __( 'Typography', 'webangon' ),
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'sde2',
            [
                'label' => esc_html__( 'Social', 'xltab' ),
            ]
        );

        $this->add_responsive_control(
            'subsospc',
            [
                'label' =>   esc_html__( 'Item spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khblogosocial li' => 'padding:0px {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .khblogosocial .xlmega-list' => 'margin-left:-{{SIZE}}{{UNIT}};margin-right:-{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'subsowh',
            [
                'label' =>   esc_html__( 'Width & height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khblogosocial .linksocial' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'subsofs',
            [
                'label' =>   esc_html__( 'Font size', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khblogosocial .linksocial' => 'font-size: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'subsolh',
            [
                'label' =>   esc_html__( 'Line height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khblogosocial .linksocial' => 'line-height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'subsobg',
            [
                'label' => __( 'Background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khblogosocial .linksocial' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'subsoclr',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khblogosocial .linksocial' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'subsobgh',
            [
                'label' => __( 'Hover Background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khblogosocial .linksocial:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'subsoclrh',
            [
                'label' => __( 'Hover Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khblogosocial .linksocial:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'sde3',
            [
                'label' => esc_html__( 'Icon', 'xltab' ),
            ]
        );

        $this->add_control(
            'subikclr',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlm-center-logo .search-toggle,{{WRAPPER}} .xlm-center-logo .navbar-toggle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'subikfs',
            [
                'label' =>   esc_html__( 'Font size', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xlm-center-logo .search-toggle,{{WRAPPER}} .xlm-center-logo .navbar-toggle' => 'font-size: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        $this->start_controls_section(
            'section_lgoad',
            [
                'label' =>   esc_html__('Logo & Ad', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'clawde',
            [
                'label' => __( 'Max wrapper width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .xlm-logo-ad' => 'max-width: {{SIZE}}{{UNIT}};margin:0px auto;',
                ],
            ]
        );

        $this->add_responsive_control(
            'claine',
            [
                'label' => __( 'Max inner width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .xlm-logo-ad .header-flex-wrapper' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'adhtrw',
            [
                'label' => __( 'Ad width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .khbads img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'clalrp',
            [
                'label' => __( 'Left-right padding', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xlm-logo-ad .header-flex-wrapper' => 'padding:0px {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'claht',
            [
                'label' => __( 'Height', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .xlm-logo-ad' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'clabg',
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'types' => [ 'none', 'classic','gradient' ],
                'selector' => '{{WRAPPER}} .xlm-logo-ad',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_menubar',
            [
                'label' =>   esc_html__('Menu Bar', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'hydscil',
            [
                'label' => __( 'Hide social', 'your-plugin' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .menubarwrp .headersocial' => 'display: none;',
                ],
            ]
        );

        $this->add_control(
            'hydtap',
            [
                'label' => __( 'Hide tap icon', 'your-plugin' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .menubarwrp .navbar-toggle' => 'display: none;',
                ],
            ]
        );

        $this->start_controls_tabs('mbtg');

        $this->start_controls_tab(
            'mb1',
            [
                'label' => esc_html__( 'Main', 'xltab' ),
            ]
        );

        $this->add_responsive_control(
            'mbht',
            [
                'label' => __( 'Height', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .khbnav.menubar' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'mbmw',
            [
                'label' => __( 'Wrapper max width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .menubarwrp' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'mbrtps',
            [
                'label' => __( 'Raised top', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .menubarwrp' => 'top:{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .fixed .menubarwrp' => 'top:0px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'mbimw',
            [
                'label' => __( 'Wrapper inner max width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .menubarwrp .menubar' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'mblrpd',
            [
                'label' => __( 'Left-right padding', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .menubarwrp .menubar' => 'padding:0px {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'mbclr',
            [
                'label' => __( 'Background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menubarwrp' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'mbdr',
                'label' =>   esc_html__( 'Border','news-element' ),
                'selector' => '{{WRAPPER}} .menubarwrp',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'mb2',
            [
                'label' => esc_html__( 'Icons', 'xltab' ),
            ]
        );

        $this->add_responsive_control(
            'mbisp',
            [
                'label' => __( 'Spacing', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .menubar .navbar-toggle' => 'padding-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .menubar .search-toggle' => 'padding-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'mbifs',
            [
                'label' => __( 'Font size', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .menubar .navbar-toggle,{{WRAPPER}} .menubar .search-toggle,{{WRAPPER}} .menubar .linksocial' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'mbiclr',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menubar .navbar-toggle,{{WRAPPER}} .menubar .search-toggle,{{WRAPPER}} .menubar .linksocial' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'mbissp',
            [
                'label' => __( 'Social icon spacing', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .menubar .headersocial li' => 'padding:0px {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .menubar .headersocial' => 'margin-left:-{{SIZE}}{{UNIT}};margin-right:-{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_lfbr',
            [
                'label' =>   esc_html__('Left Fixed Bar', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'lfwid',
            [
                'label' => __( 'Width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xlmegaleft-bar' => 'width:{{SIZE}}{{UNIT}};',
                    'body' => 'padding-left:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'lflgw',
            [
                'label' => __( 'Logo Width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xlmegaleft-bar .logotb' => 'width:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'lfbg',
            [
                'label' => __( 'Background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlmegaleft-bar' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'lficlr',
            [
                'label' => __( 'Icon color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlmegaleft-bar .navbar-toggle,{{WRAPPER}} .xlmegaleft-bar .search-toggle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'brbxd',
                'selector' => '{{WRAPPER}} .xlmegaleft-bar',
                'label' => __( 'Box shadow', 'webangon' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_ofscne',
            [
                'label' => __('Offscreen Sidebar', 'ashelement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'ofvbg',
            [
                'label' => __( 'Overlay background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .click-capture' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ofinso',
            [
                'label' =>   esc_html__( 'Widgets spacing', 'news-element' ),
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
                    '{{WRAPPER}} .offmenuwraps .headersocial' => 'padding-bottom:{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .offmenuwraps .scrollbar-macosx' => 'margin:{{SIZE}}{{UNIT}} 0px;',
                ],

            ]
        );

        $this->add_responsive_control(
            'of-wid',
            [
                'label' =>   esc_html__( 'Width', 'news-element' ),
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
                    '{{WRAPPER}} .offsidebar' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'ofpd',
            [
                'label' => __('Padding', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .offsidebar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'ofbg',
            [
                'label' => __( 'Background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offsidebar' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->start_controls_tabs('ofre');

        $this->start_controls_tab(
            'd2',
            [
                'label' => esc_html__( 'Menu', 'xltab' ),
            ]
        );

        $this->add_control(
            'omyclr',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .momenu-list > li > a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'omyclrh',
            [
                'label' => __( 'Hover color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .momenu-list > li > a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'omtypo',
                'selector' => '{{WRAPPER}} .momenu-list > li >a',
                'label' => __( 'Typography', 'webangon' ),
            ]
        );

        $this->add_responsive_control(
            'ased2',
            [
                'label' => __('Padding', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .momenu-list > li >a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'd3',
            [
                'label' => esc_html__( 'Sub', 'xltab' ),
            ]
        );

        $this->add_control(
            'om1clr',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .momenu-list .sub-menu > li > a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'omy1lrh',
            [
                'label' => __( 'Hover color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .momenu-list .sub-menu > li > a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'om1ypo',
                'selector' => '{{WRAPPER}} .momenu-list .sub-menu > li',
                'label' => __( 'Typography', 'webangon' ),
            ]
        );

        $this->add_responsive_control(
            'as1dr2',
            [
                'label' => __('Wrapper Padding', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .momenu-list .sub-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'as1d2',
            [
                'label' => __('Item Padding', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .momenu-list .sub-menu > li >a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'd4',
            [
                'label' => esc_html__( 'Social', 'xltab' ),
            ]
        );

        $this->add_responsive_control(
            'ofsfs',
            [
                'label' =>   esc_html__( 'Font size', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .offsidebar .headersocial' => 'font-size: {{SIZE}}px;',
                ],

            ]
        );

        $this->add_responsive_control(
            'ofspd',
            [
                'label' =>   esc_html__( 'Icon spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .offsidebar .headersocial li' => 'padding-right: {{SIZE}}px;',
                ],

            ]
        );

        $this->add_control(
            'ofsclr',
            [
                'label' => __( 'Icon color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offsidebar .headersocial a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ofslrh',
            [
                'label' => __( 'Icon hover color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offsidebar .headersocial a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'd5',
            [
                'label' => esc_html__( 'Copy', 'xltab' ),
            ]
        );

        $this->add_control(
            'ofcycl',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .copyright' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ofcyclk',
            [
                'label' => __( 'Link color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .copyright a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ofcyt',
                'selector' => '{{WRAPPER}} .copyright',
                'label' => __( 'Typography', 'webangon' ),
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_search',
            [
                'label' => __('Search Sidebar', 'ashelement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'sof-wid',
            [
                'label' =>   esc_html__( 'Width', 'news-element' ),
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
                    '{{WRAPPER}} .offsearch' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'sofpd',
            [
                'label' => __('Padding', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .offsearch' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'sofbg',
            [
                'label' => __( 'Background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offsearch' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'stbdck',
            [
                'label' => __( 'Border color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offsearch .search-field' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sdwpd',
            [
                'label' => __('Padding', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .offsearch .search-field' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'sdwinbg',
            [
                'label' => __( 'Input background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offsearch .search-field' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sdwinkl',
            [
                'label' => __( 'Input color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offsearch .search-field' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sdwpty',
                'selector' => '{{WRAPPER}} .offsearch .search-field',
                'label' => __( 'Input typography', 'webangon' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_mbile',
            [
                'label' => __('Mobile Menu', 'ashelement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'mblbg',
            [
                'label' => __( 'Background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlmega-mobile-nav .menubarwrp' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'mblclr',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlmega-mobile-nav .menubar .navbar-toggle' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .xlmega-mobile-nav .menubar .search-toggle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'mblgwd',
            [
                'label' =>   esc_html__( 'Logo width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px','%'],
                'selectors' => [
                    '{{WRAPPER}} .xlmega-mobile-nav .tbsite-logo img' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'mblht',
            [
                'label' =>   esc_html__( 'Height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px','%'],
                'selectors' => [
                    '{{WRAPPER}} .xlmega-mobile-nav .menubarwrp .menubar' => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';
    }

    private function out_social_link($content) {
        $out1 = '';
        foreach ($content as $item){

            $url = $item['url']['url'];
            $ext = $item['url']['is_external'];
            $nofollow = $item['url']['nofollow'];

            $url = ( isset($url) && $url ) ? 'href='.esc_url($url). '' : '';
            $ext = ( isset($ext) && $ext ) ? 'target= _blank' : '';
            $nofollow = ( isset($url) && $url ) ? 'rel=nofollow' : '';
            $link = $url.' '.$ext.' '.$nofollow;

            $out1 .= '
                <li><a class="linksocial" '.$link.'>
                    <span class="khbicon '.$item['icon']['value'].'"></span>
                </a></li>
            ';

        }

        return '<ul class="headersocial xlmega-list">'.$out1.'</ul>';
    }

    private function out_menu_link($content) {
        $out = '';
        foreach ($content as $item){

            $url = $item['url']['url'];
            $ext = $item['url']['is_external'];
            $nofollow = $item['url']['nofollow'];

            $url = ( isset($url) && $url ) ? 'href='.esc_url($url). '' : '';
            $ext = ( isset($ext) && $ext ) ? 'target= _blank' : '';
            $nofollow = ( isset($url) && $url ) ? 'rel=nofollow' : '';
            $link = $url.' '.$ext.' '.$nofollow;

            $out .= '
                <li><a class="linkcustom" '.$link.'>'.$item['lbl'].'</a></li>
            ';

        }

        return '<ul class="headerlink xlmega-list">'.$out.'</ul>';
    }

    private function out_subs_btn($label,$link) {

        $url = $link['url'] ? 'href='.esc_url($link['url']). '' : '';
        $ext = $link['is_external'] ? 'target= _blank' : '';
        $nofollow = $link['nofollow'] ? 'rel=nofollow' : '';
        $flink = $url.' '.$ext.' '.$nofollow;
        $out = $label ? '<a '.$flink.' class="header-cta">'.$label.'</a>' : '';

        return $out;
    }

}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\xlmega_menu_1());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\xlmega_menu_1());
}
