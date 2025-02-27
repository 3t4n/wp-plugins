<?php
namespace News_Element\Widgets;
use Elementor;
use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use News_Element\Khobish_Helper;
use WP_Query;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class khobish_breadcum extends Widget_Base {

    public function get_name() {
        return 'khbbredcum';
    }

    public function get_title() {
        return   esc_html__('Breadcum', 'news-element');
    }

    public function get_icon() {
        return 'dashicons dashicons-update';
    }

    public function get_categories() {
        return ['khobish-builder'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_heading',
            [
                'label' =>   esc_html__('Breadcum', 'news-element'),
            ]
        );
 
        $this->add_control(
            'icon', [
                'label' =>   esc_html__( 'Separator Icon', 'news-element' ),
                'type' => Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'fas fa-chevron-right',
					'library' => 'solid',
				],
            ]
        );

        $this->add_control(
            'home', [
                'label' =>   esc_html__( 'Home label', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Home',
            ]
        );

        $this->add_control(
            'author', [
                'label' =>   esc_html__( 'Author archive', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Author archive for ',
            ]
        );

        $this->add_control(
            'search', [
                'label' =>   esc_html__( 'Search archive', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Search query for: ',
            ]
        );

        $this->add_control(
            'error', [
                'label' =>   esc_html__( 'Not found', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Error 404',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_general',
            [
                'label' =>   esc_html__('General', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
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
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .xlbreadcrumb' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title',
            [
                'label' =>   esc_html__('Title', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'l_color',
            [
                'label' =>   esc_html__( 'Link color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlbreadcrumb a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'lh_color',
            [
                'label' =>   esc_html__( 'Link hover color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlbreadcrumb a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlbreadcrumb' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'selector' => '{{WRAPPER}} .xlbreadcrumb',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_sepa',
            [
                'label' =>   esc_html__('Separator', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'itsp',
            [
                'label' => __( 'Spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xlbreadcrumb .delimiter' => 'padding:0px {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'dcolor',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .delimiter' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ditsp',
            [
                'label' => __( 'Font size', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xlbreadcrumb .delimiter' => 'font-size:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings();
        if ( Plugin::instance()->editor->is_edit_mode() ){
            echo '<div class="xlbreadcrumb"><a href="#" rel="v:url" property="v:title">Home</a><span class="delimiter"><i class="tivo ti-arrow-right" aria-hidden="true"></i></span><span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="#">Travel</a></span><span class="delimiter"><i class="tivo ti-arrow-right" aria-hidden="true"></i></span><span class="current">African Olympians and Paralympians prepare for their London odyssey</span></div>';
        } else {
            echo Khobish_Helper::thepack_hansel_breadcum($settings['icon'],$settings['home'],$settings['author'],$settings['search'],$settings['error']);
        }
    }
}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\khobish_breadcum());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_breadcum());
}
