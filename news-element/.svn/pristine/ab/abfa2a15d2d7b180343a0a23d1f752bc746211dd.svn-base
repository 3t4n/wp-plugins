<?php

namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use News_Element\Khobish_Helper;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background; 
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class ne_click_popup extends Widget_Base {

    public function get_name() {
        return 'khb_clickpopup';
    }

    public function get_title() {
        return   esc_html__('Click Popup', 'news-element');
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
            'icn',
            [
                'label' => esc_html__('Button icon', 'the-pack-addon'),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'lbl',
            [
                'label' => esc_html__('Button label', 'the-pack-addon'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tmpl',
            [
                'label' => esc_html__('Template', 'the-pack-addon'),
                'type' => Controls_Manager::SELECT2,
                'options' => Khobish_Helper::khobish_drop_posts('elementor_library'),
                'default' => 'no',
                'label_block' => true
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
            'pos',
            [
                'label' =>   esc_html__('Position', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' =>   esc_html__('Left', 'news-element'),
                        'icon' => 'eicon-gallery-grid',
                    ],
                    'right' => [
                        'title' =>   esc_html__('Right', 'news-element'),
                        'icon' => 'eicon-gallery-masonry',
                    ],
                    'abs' => [
                        'title' =>   esc_html__('Absolute', 'news-element'),
                        'icon' => 'eicon-gallery-masonry',
                    ] 

                ],
                'default' => 'left',               
            ]
        );

        do_action('newsmag_comm_style', $this,'fpr_','.nepoptrig');

        $this->end_controls_section();

        $this->start_controls_section(
            'section_popup',
            [
                'label' => __('Popup', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'absc',
            [
                'label' => esc_html__('Absolute center', 'the-pack-addon'),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .ne-pop-content' => 'transform: translate(-50%, -50%);',
                ],
                'condition' => [
                    'pos' => 'abs'
                ]  
            ]
        );

        $this->add_responsive_control(
            'fxe',
            [
                'label' => esc_html__('Fixed position', 'the-pack-addon'),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .ne-pop-content' => 'position: fixed;',
                ],
                'condition' => [
                    'pos' => 'abs'
                ]  
            ]
        );

        $this->add_responsive_control(
            'd-pad',
            [
                'label' => esc_html__('Wrapper padding', 'the-pack-addon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['em', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .ne-pop-content.active-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'pos' => 'abs'
                ]  
            ]
        );

        $this->add_responsive_control(
            'fbw',
            [
                'label' => esc_html__('Wrapper height', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .ne-pop-content>div' => 'height: {{SIZE}}{{UNIT}};overflow-y: auto;',
                ],
                'condition' => [
                    'pos' => 'abs'
                ]  
            ]
        );

        $this->add_responsive_control(
            'fwd',
            [
                'label' => esc_html__('Wrapper width', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .ne-pop-content>div' => 'max-width: {{SIZE}}{{UNIT}};width:100%;',
                ],
            ]
        );

        $this->add_responsive_control(
            'tsp',
            [
                'label' => esc_html__('Top position', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .ne-pop-content' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'pos' => 'abs'
                ]  
            ]
        );

        $this->add_responsive_control(
            'lsp',
            [
                'label' => esc_html__('Left position', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .ne-pop-content' => 'left: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'pos' => 'abs'
                ]  
            ]
        );

        $this->add_responsive_control(
            'bsp',
            [
                'label' => esc_html__('Bottom position', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .ne-pop-content' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'pos' => 'abs'
                ]  
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'n_bgf',
                'label' => esc_html__('Background', 'the-pack-addon'),
                'selector' => '{{WRAPPER}} .ne-abs-pos>div,{{WRAPPER}} .ne-offsidebar',
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
    $widgets_manager->register(new \News_Element\Widgets\ne_click_popup());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\ne_click_popup());
}
