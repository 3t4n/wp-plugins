<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

if (!defined('ABSPATH')) 
    exit; // Exit if accessed directly


class ne_heading_2 extends Widget_Base {

    public function get_name() {
        return 'khbhdyin2';
    } 

    public function get_title() {
        return   esc_html__('Heading 2', 'news-element');
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
                 ],
                'default' => 'one',               
            ]
        );

        $this->add_control(
            'heading',
            [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Heading Title', 'news-element'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'link',
            [
                'type' => Controls_Manager::URL,
                'label' =>   esc_html__('Link', 'news-element'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'ftag',
            [
                'type' => Controls_Manager::SELECT,
                'label' =>   esc_html__('HTML tag', 'news-element'),
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

        $this->add_responsive_control(
            'cntwh',
            [
                'label' => esc_html__('Padding', 'the-pack-addon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['em', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .ne-label>*' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'cntclr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ne-label>*' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cntty',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .ne-label>*',
            ]
        );

        $this->add_control(
            'spklr',
            [
                'label' => __( 'Separator color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .one .ne-label:after' => 'border-bottom-color: {{VALUE}};',
                    '{{WRAPPER}} .two:after' => 'border-left-color: {{VALUE}};border-right-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cntbd',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .ne-label>*',
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
    $widgets_manager->register(new \News_Element\Widgets\ne_heading_2());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\ne_heading_2());
}
