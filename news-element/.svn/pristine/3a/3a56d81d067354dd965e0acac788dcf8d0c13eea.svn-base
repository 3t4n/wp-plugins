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

class khobish_mega_lynk extends Widget_Base {

    public function get_name() {
        return 'khbmg_links';
    }

    public function get_title() {
        return   esc_html__('Mega Link', 'news-element');
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
            'badge', [
                'label' =>   esc_html__( 'Badge', 'news-element' ),
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

        $this->add_responsive_control(
            'btmar',
            [
                'label' =>   esc_html__( 'Bottom margin', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khobish-mega-link li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'gtyp',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .khobish-mega-link .linksocial',
            ]
        );

        $this->add_control(
            'icol',
            [
                'label' =>   esc_html__('Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish-mega-link .linksocial' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ibghcol',
            [
                'label' =>   esc_html__('Hover color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish-mega-link .linksocial:hover' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .khobish-mega-link ul' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_bdge',
            [
                'label' =>   esc_html__('Badge', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'bdglsp',
            [
                'label' =>   esc_html__( 'Left spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khobish-mega-link .khbbadge' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'bdgtsp',
            [
                'label' => __( 'Top spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -10,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .khobish-mega-link .khbbadge' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'bdgtyp',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .khobish-mega-link .khbbadge',
            ]
        );

        $this->add_responsive_control(
            'dbgpd',
            [
                'label' => __('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khobish-mega-link .khbbadge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'bbg',
            [
                'label' =>   esc_html__('Background', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .khobish-mega-link .khbbadge' => 'background: {{VALUE}};',
                ],

            ]
        );

        $this->add_control(
            'bkl',
            [
                'label' =>   esc_html__('Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .khobish-mega-link .khbbadge' => 'color: {{VALUE}};',
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
            $badge =  $item['badge']  ? '<span class="khbbadge">'.$item['badge'].'</span>' : '';
            $nofollow = ( isset($url) && $url ) ? 'rel=nofollow' : '';
            $link = $url.' '.$ext.' '.$nofollow;
            $out1 .= '
                <li><a class="linksocial" '.$link.'>'.$item['label'].$badge.'</a></li>
            ';

        }

        return '<ul>'.$out1.'</ul>';
    }

}

 if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\khobish_mega_lynk());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_mega_lynk());
}
