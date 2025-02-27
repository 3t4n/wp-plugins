<?php
namespace News_Element\Widgets;
use Elementor;
use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use News_Element\Khobish_Helper;

class newselement_pst_nav extends Widget_Base{
    
    public function get_name() {
        return 'khb-pstnv';
    }

    public function get_title() {
        return   esc_html__('Navigation', 'news-element' );
    }

    public function get_icon() {
        return 'dashicons dashicons-category';
    }

    public function get_categories() {
        return [ 'khobish-builder' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_general',
            [
                'label' =>   esc_html__( 'General', 'news-element' ),
            ]
        );

         $this->add_control(
            'prev_id',
            [
                'label' => __('Preview Post', 'news-element'),
                'type' => Controls_Manager::SELECT2,
                'options' => Khobish_Helper::khobish_drop_posts('post'),
                'multiple' => false,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tmpl',
            [
                'label' =>   esc_html__( 'Template', 'news-element' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'one' => [
                        'title' =>   esc_html__( 'One', 'news-element' ),
                        'icon' => 'eicon-folder-o',
                    ],
                    'two' => [
                        'title' =>   esc_html__( 'Two', 'news-element' ),
                        'icon' => 'eicon-folder',
                    ],
                    'five' => [
                        'title' =>   esc_html__( 'Five', 'news-element' ),
                        'icon' => 'eicon-history',
                    ]
                ],
                'default' => 'one'
            ]
        );

        $this->add_control(
            'ptxt',
            [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Previous Text', 'news-element'),
                'label_block' => true,
                'condition' => [
                    'tmpl!' => 'one',
                ],
            ]
        );

        $this->add_control(
            'ntxt',
            [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Next Text', 'news-element'),
                'label_block' => true,
                'condition' => [
                    'tmpl!' => 'one',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section-st1',
            [
                'label' =>   esc_html__( 'General', 'news-element' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' =>   esc_html__('Border color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .postnav-wrap.one' => 'border-top:1px solid {{VALUE}};border-bottom:1px solid {{VALUE}};',
                    '{{WRAPPER}} .postnav-wrap.one .fw-col-sm-6:first-child' => 'border-right:1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            '2mwid',
            [
                'label' =>   esc_html__( 'Width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px','%' ],
                'selectors' => [
                    '{{WRAPPER}} .xl-flex-col' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            '2itsp',
            [
                'label' =>   esc_html__( 'Column spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xl-flex-row > div:first-child' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_img',
            [
                'label' => __('Image', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'tmpl' => ['five'],
                ],
            ]
        );

        $this->add_responsive_control(
            'imgwd',
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
                'size_units' => [ 'px','%' ],
                'selectors' => [
                    '{{WRAPPER}} .featured-img' => 'max-width: {{SIZE}}{{UNIT}};flex:0 0 {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'imgbrd',
            [
                'label' =>   esc_html__( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px','%' ],
                'selectors' => [
                    '{{WRAPPER}} .featured-img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'imglm',
            [
                'label' =>   esc_html__( 'Spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} a' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_bdr',
            [
                'label' => __('Bordered', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'tmpl' => ['two','three'],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nvbdrf',
                'label' =>   esc_html__( 'Border', 'news-element' ),
                'selector' => '{{WRAPPER}} .two .xl-flex-row > div:first-child',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nvbdrl',
                'label' =>   esc_html__( 'Border', 'news-element' ),
                'selector' => '{{WRAPPER}} .two .xl-flex-row > div:last-child',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_lbl',
            [
                'label' => __('Label', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'tmpl!' => ['one'],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ltypo',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .pnlable',
            ]
        );

        $this->add_control(
            'l_color',
            [
                'label' =>   esc_html__('Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pnlable' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'lmr',
            [
                'label' => __('Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .pnlable' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title',
            [
                'label' => __('Title', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttypo',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .link',
            ]
        );

        $this->add_responsive_control(
            'lclamp',    
            [
                'label' => __( 'Line clamp', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .link' => '-webkit-line-clamp: {{SIZE}};',
                ],

            ]
        );

        $this->add_control(
            'link_color',
            [
                'label' =>   esc_html__('Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'link_colorh',
            [
                'label' =>   esc_html__('Hover Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .link:hover' => 'color: {{VALUE}};',
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
    $widgets_manager->register(new \News_Element\Widgets\newselement_pst_nav());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\newselement_pst_nav());
}
