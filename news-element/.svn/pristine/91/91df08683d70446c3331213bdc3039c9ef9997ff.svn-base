<?php

namespace News_Element\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border; 
use Elementor\Scheme_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class khobish_lynks extends Widget_Base {

    public function get_name() {
        return 'khb_links';
    }

    public function get_title() {
        return   esc_html__('Links', 'news-element');
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

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'label', [
                'label' =>   esc_html__( 'Label', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,                              
            ]
        );

        $repeater1->add_control(
            'url', [
                'label' =>   esc_html__('Link', 'news-element'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' =>   esc_html__('http://your-link.com', 'news-element'),
            ]
        );        

        $this->add_control(
            'items',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater1->get_controls(),  
                'prevent_empty' => false,
                'default' => [
                    [
                        'label' =>   esc_html__( 'Home', 'news-element' ),
                    ]
                ],
                'title_field' => '{{label}}',
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

        $this->add_control(
            'tmpl',
            [
                'label' =>   esc_html__('Template', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'style_one' => [
                        'title' =>   esc_html__('Style one', 'news-element'),
                        'icon' => 'eicon-gallery-grid',
                    ],
                    'style_two' => [
                        'title' =>   esc_html__('Style two', 'news-element'),
                        'icon' => 'eicon-gallery-masonry',
                    ]

                ],
                'default' => 'style_one',               
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'gtyp',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .linksocial',
            ]
        );

        $this->add_control(
            'icol',
            [
                'label' =>   esc_html__('Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .linksocial' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ibghcol',
            [
                'label' =>   esc_html__('Hover color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .linksocial:hover' => 'color: {{VALUE}};',
                ],
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
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .khobish-customlinks ul' => 'text-align: {{VALUE}};',
                ],                 
            ]
        );

        $this->start_controls_tabs('mtabu');

        $this->start_controls_tab(
            'm1',
            [
                'label' => esc_html__( 'Style 1', 'news-element' ),
                'condition' => [
                    'tmpl' => 'style_one',
                ],                                
            ]
        );

        $this->add_responsive_control(
            'width',
            [
                'label' =>   esc_html__( 'Column width', 'news-element' ),
                'type' =>  Controls_Manager::NUMBER, 
                'default' => '100',                
                 'selectors' => [
                        '{{WRAPPER}} .khobish-customlinks.style_one li' => 'width: {{VALUE}}%;',
                 ],                              
            ]
        );

        $this->add_responsive_control(
            'ifs',
            [
                'label' =>   esc_html__( 'Padding top & bottom', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .style_one .linksocial' => 'padding-top:{{SIZE}}{{UNIT}};padding-bottom:{{SIZE}}{{UNIT}};',
                ],
            ]
        );        

        $this->add_responsive_control(
            'ifls',
            [
                'label' =>   esc_html__( 'Padding left', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .style_one .linksocial' => 'padding-left:{{SIZE}}{{UNIT}};',
                ],
            ]
        ); 

        $this->add_control(
            'ibgcol',
            [
                'label' =>   esc_html__('Border color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .style_one .linksocial' => 'border-bottom-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'm2',
            [
                'label' => esc_html__( 'Style 2', 'news-element' ), 
                'condition' => [
                    'tmpl' => 'style_two',
                ],                                
            ]
        );

        $this->add_responsive_control(
            'spadlr',
            [
                'label' =>   esc_html__( 'Padding left-right', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .style_two li' => 'padding:{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .style_two ul' => 'margin-left:-{{SIZE}}{{UNIT}};margin-right:-{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();  

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
    $widgets_manager->register(new \News_Element\Widgets\khobish_lynks());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_lynks());
}
