<?php

namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use News_Element\Khobish_Helper;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow; 
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class ne_nav_menu extends Widget_Base {

    public function get_name() {
        return 'khb_navmenu';
    }

    public function get_title() {
        return   esc_html__('Menu nav', 'news-element');
    }

    public function get_icon() {
        return 'dashicons dashicons-editor-paragraph';
    }

    public function get_categories() {
        return [ 'khobish-element' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_process_1',
            [
                'label' =>   esc_html__('Content', 'news-element'),
            ]
        );

        $this->add_control(
            'native',
            [
                'label' => esc_html__('WordPress nav menu', 'the-pack-addon'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'menu',
            [
                'label' => esc_html__('Menu', 'the-pack-addon'),
                'type' => Controls_Manager::SELECT2,
                'options' => Khobish_Helper::thepack_drop_menu_select(),
                'label_block' => true,
                'condition' => [
                    'native' => 'yes',
                ],
            ]
        );

        $cust_links = new \Elementor\Repeater();

        $cust_links->add_control(
            'item_text',
            [
                'label' => esc_html__('Title', 'the-pack-addon'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Menu Item', 'the-pack-addon'),
                'label_block' => true,
            ]
        );

        $cust_links->add_control(
            'pre',
            [
                'label' => esc_html__('Label', 'the-pack-addon'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $cust_links->add_control(
            'icon',
            [
                'label' => esc_html__('Icons', 'the-pack-addon'),
                'type' => Controls_Manager::ICONS,
            ]
        );

        $cust_links->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'the-pack-addon'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'the-pack-addon'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $cust_links->add_control(
            'has_sub',
            [
                'label' => esc_html__('Have Sub Menu', 'the-pack-addon'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'the-pack-addon'),
                'label_off' => esc_html__('No', 'the-pack-addon'),
                'return_value' => 'yes',
            ]
        );

        $cust_links->add_control(
            'sub_type',
            [
                'label' => esc_html__('Sub Menu Type', 'the-pack-addon'),
                'type' => Controls_Manager::SELECT,
                'default' => 'mega',
                'options' => [
                    'mega' => 'Mega menu',
                    'default' => 'Default nav menu',
                ],
                'condition' => [
                    'has_sub' => 'yes',
                ],
            ]
        );

        $cust_links->add_control(
            'sub_menu',
            [
                'label' => esc_html__('Sub Mega Menu', 'the-pack-addon'),
                'type' => Controls_Manager::SELECT2,
                'default' => 'no',
                'options' => Khobish_Helper::khobish_drop_posts('elementor_library'),
                'condition' => [
                    'has_sub' => 'yes',
                    'sub_type' => 'mega',
                ],
                'label_block' => true
            ]
        );

        $cust_links->add_control(
            'ajax',
            [
                'label' => esc_html__('Use ajax', 'the-pack-addon'),
                'type' => Controls_Manager::SWITCHER,
                'condition' => [
                    'has_sub' => 'yes',
                    'sub_type' => 'mega',
                ],                
            ]
        );

        $cust_links->add_responsive_control(
            'gwid',
            [
                'label' => esc_html__('Width', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],

                ],
                'size_units' => ['px','%'],
                'condition' => [
                    'has_sub' => 'yes',
                    'sub_type' => 'mega',
                ],                
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .ne-megamenu-content-wrapper' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $cust_links->add_control(
            'pos',
            [
                'label' => esc_html__('Menu position', 'the-pack-addon'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'posleft' => [
                        'title' => esc_html__('Left', 'the-pack-addon'),
                        'icon' => 'eicon-tabs',
                    ],
                    'posright' => [
                        'title' => esc_html__('Right', 'the-pack-addon'),
                        'icon' => 'eicon-text-field',
                    ],
                    'poscenter' => [
                        'title' => esc_html__('Center', 'the-pack-addon'),
                        'icon' => 'eicon-text-field',
                    ]                    
                ],
            ]
        );

        $cust_links->add_control(
            'menu_register',
            [
                'label' => esc_html__('Menu', 'the-pack-addon'),
                'type' => Controls_Manager::SELECT2,
                'options' => Khobish_Helper::thepack_drop_menu_select(),
                'condition' => [
                    'has_sub' => 'yes',
                    'sub_type' => 'default',
                ],
                'label_block' => true
            ]
        );

        $this->add_control(
            'menus',
            [
                'label' => esc_html__('Menu', 'the-pack-addon'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $cust_links->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ item_text }}}',
                'default' => [
                    [
                        'item_text' => esc_html__('Home', 'the-pack-addon'),
                    ],
                    [
                        'item_text' => esc_html__('Portfolio', 'the-pack-addon'),
                    ],
                ],
                'condition' => [
                    'native!' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_lbl',
            [
                'label' =>   esc_html__('General', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Menu align', 'news-element' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'news-element' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'news-element' ),
						'icon' => 'eicon-h-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'Right', 'news-element' ),
						'icon' => 'eicon-h-align-right',
					],
					'space-between' => [
						'title' => esc_html__( 'Space between', 'news-element' ),
						'icon' => 'eicon-h-align-right',
					],                    
				],
				'selectors' => [
					'{{WRAPPER}} .tp-menu-wrap' => 'justify-content: {{VALUE}}',
				],
			]
		);

        $this->start_controls_tabs('nvtb');

        $this->start_controls_tab(
            'nvtb1',
            [
                'label' => esc_html__('Parent', 'the-pack-addon'),
            ]
        );

        $this->add_control(
            'undeline',
            [
                'label' => esc_html__('Enable hover underline', 'the-pack-addon'),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'sep',
            [
                'label' => esc_html__('Enable separator', 'the-pack-addon'),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'gpd',
            [
                'label' => esc_html__('Gap', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap' => 'gap: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tp-menu-wrap>li>a::after' => 'left:calc(-{{SIZE}}{{UNIT}}/2)',
                ],
            ]
        );

        $this->add_control(
            'gipd',
            [
                'label' => esc_html__('Menu icon gap', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .icon-gap' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        do_action('newsmag_comm_style', $this,'fpr_','.tp-menu-wrap>li>a');

        $this->end_controls_tab();

        $this->start_controls_tab(
            'nvtb2',
            [
                'label' => esc_html__('Child', 'the-pack-addon'),
            ]
        );

        $this->add_responsive_control(
            'fbw',
            [
                'label' => esc_html__('Wrapper width', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap>li>.sub-menu' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tp-menu-wrap>li>.sub-menu li>.sub-menu' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'd-pad',
            [
                'label' => esc_html__('Wrapper padding', 'the-pack-addon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['em', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap>li .sub-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'fbbg',
            [
                'label' => esc_html__('Background', 'the-pack-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap>li>.sub-menu' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .tp-menu-wrap>li>.sub-menu li>.sub-menu' => 'background: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'rbck',
            [
                'label' => esc_html__('Hover right border', 'the-pack-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap .sub-menu>li:hover>a' => 'border-left-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cdbr',
            [
                'label' => esc_html__('Border radius', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap>li .sub-menu' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'bxde',
                'selector' => '{{WRAPPER}} .tp-menu-wrap>li>.sub-menu,{{WRAPPER}} .tp-menu-wrap>li>.sub-menu li>.sub-menu',
                'label' => esc_html__('Box shadow', 'the-pack-addon'),
            ]
        );

        do_action('newsmag_comm_style', $this,'spr_','.sub-menu a');

        $this->end_controls_tab();

        $this->start_controls_tab(
            'nvtb3',
            [
                'label' => esc_html__('Badge', 'the-pack-addon'),
            ]
        );
        
        do_action('newsmag_comm_style', $this,'bdg_','.menu-badge');

        $this->end_controls_tab();

        $this->start_controls_tab(
            'nvtb4',
            [
                'label' => esc_html__('Arrow', 'the-pack-addon'),
            ]
        );

        $this->add_responsive_control(
            'sar',
            [
                'label' => esc_html__('Sub menu arrow right spacing', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap .sub-menu>.menu-item-has-children>a:after' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sat',
            [
                'label' => esc_html__('Sub menu arrow top spacing', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap .sub-menu>.menu-item-has-children>a:after' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'afs',
            [
                'label' => esc_html__('Font size', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap .drop-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_undi',
            [
                'label' =>   esc_html__('Underline', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'undeline' => 'yes'
                ]                
            ]
        );

        $this->add_responsive_control(
            'ulr',
            [
                'label' => esc_html__('Color', 'the-pack-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap>li>a::before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ukht',
            [
                'label' => esc_html__('Height', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,               
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap>li>a::before' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ukbp',
            [
                'label' => esc_html__('Bottom spacing', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -300,
                        'max' => 300,
                    ],
                ],                 
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap>li>a::before' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_sepi',
            [
                'label' =>   esc_html__('Separator', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sep' => 'yes'
                ]                
            ]
        );

        $this->add_responsive_control(
            'sklr',
            [
                'label' => esc_html__('Color', 'the-pack-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap>li:not(:first-child)>a::after' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'skht',
            [
                'label' => esc_html__('Height', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap>li:not(:first-child)>a::after' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'skbp',
            [
                'label' => esc_html__('Width', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap>li:not(:first-child)>a::after' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'skrt',
            [
                'label' => esc_html__('Rotate', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ],
                ],                
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap>li:not(:first-child)>a::after' => 'transform: rotate({{SIZE}}deg);',
                ],
            ]
        );

        $this->add_responsive_control(
            'skybp',
            [
                'label' => esc_html__('Bottom spacing', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrap>li:not(:first-child)>a::after' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();      
        require dirname(__FILE__) .'/view.php';
    }


    private function content($content) {
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
                <li><a class="linksocial" '.$link.'>'.$item['label'].'</a></li>
            '; 

        }

        return '<ul>'.$out1.'</ul>';
    }

}


 if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\ne_nav_menu());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\ne_nav_menu());
}
