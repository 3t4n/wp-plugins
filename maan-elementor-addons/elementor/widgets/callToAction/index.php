<?php

namespace Elementor;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class  maan_addons_call_to_action extends Widget_Base
{

    public function get_name()
    {
        return 'maan_addons_call_to_action';
    }

    public function get_title()
    {
        return __('Call To Action', 'maan-elementor-addons');
    }

    public function get_icon()
    {
        return 'eicon-form-horizontal';
    }

    public function get_categories()
    {
        return ['maan-elementor-addons'];
    }

    public function helper_functions(){
        $helper = new \maan_addons_helper();
        return $helper;
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'cta_section',
            [
                'label' => __('Call To Action', 'maan-elementor-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'layout',
            [
                'label' => __( 'Layout', 'maan-elementor-addons' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => false,
                'options' => [
                    'layout1' => __( 'Layout 1', 'maan-elementor-addons' ),
                    'layout2' => __( 'Layout 2', 'maan-elementor-addons' ),
                    'layout3' => __( 'Layout 3', 'maan-elementor-addons' ),
                    'layout4' => __( 'Layout 4', 'maan-elementor-addons' ),
                    'layout5' => __( 'Layout 5', 'maan-elementor-addons' ),
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'title_section',
            [
                'label' => __('Title', 'maan-elementor-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'maan-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Do you have any Question', 'maan-elementor-addons'),
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label'   => __( 'HTML Tag', 'maan-elementor-addons' ),
                'type'    => Controls_Manager::SELECT,
                'options' => $this->helper_functions()->html_tag_lists(),
                'default' => 'h2',
            ]
        );
        $this->add_control(
            'ttc',
            [
                'label' => __('Color', 'maan-elementor-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .me-cta-widget .me-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttt',
                'label' => __('Typography', 'maan-elementor-addons'),
                'selector' => '{{WRAPPER}} .me-cta-widget .me-title',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'maan-elementor-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'content',
            [
                'label' => __('Content', 'maan-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Ask anything about our products, we will give you Instant Answerer', 'maan-elementor-addons'),
            ]
        );
        $this->add_control(
            'content_tag',
            [
                'label'   => __( 'HTML Tag', 'maan-elementor-addons' ),
                'type'    => Controls_Manager::SELECT,
                'options' => $this->helper_functions()->html_tag_lists(),
                'default' => 'p',
            ]
        );
        $this->add_control(
            'ctc',
            [
                'label' => __('Color', 'maan-elementor-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .me-cta-widget .me-content' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ctt',
                'label' => __('Typography', 'maan-elementor-addons'),
                'selector' => '{{WRAPPER}} .me-cta-widget .me-content',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'button_section',
            [
                'label' => __('Button', 'maan-elementor-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'text',
            [
                'label' => __('Button', 'maan-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contact Us', 'maan-elementor-addons'),
            ]
        );
        $this->add_control(
            'btn_img',
            [
                'label' => __( 'Button Image', 'moda' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'layout' => 'layout2',
                ],
            ]
        );
        $this->add_control(
            'link', [
                'label' => __('Link', 'maan-elementor-addons'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'button2_section',
            [
                'label' => __('Button 2', 'maan-elementor-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout' => 'layout2',
                ],
            ]
        );
        $this->add_control(
            'text2',
            [
                'label' => __('Button', 'maan-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('App Store', 'maan-elementor-addons'),
            ]
        );
        $this->add_control(
            'btn_img2',
            [
                'label' => __( 'Button Image', 'moda' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'link2', [
                'label' => __('Link', 'maan-elementor-addons'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'ctaimg_section',
            [
                'label' => __('Image', 'maan-elementor-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout' => 'layout4',
                ],
            ]
        );
        $this->add_control(
            'cta_img',
            [
                'label' => __( 'Image', 'moda' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'image_size',
            [
                'label'   => __( 'Size', 'maan-elementor-addons' ),
                'type'    => Controls_Manager::SELECT,
                'options' => get_intermediate_image_sizes(),
                'default' => '1',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_settings',
            [
                'label' => __('Call To Action', 'maan-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'cta_bg_img',
            [
                'label' => __( 'CTA BG Image', 'moda' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'cta_bg',
                'label' => esc_html__('Background', 'maan-elementor-addons'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .page__left-sidebar',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        include dirname(__FILE__). '/' . $settings['layout']. '.php';

    }
}
$switch = new \maan_addons_helper();
$on_off = $switch->get_option('maan_addons_call_to_action');
if ($on_off == '1') {
    Plugin::instance()->widgets_manager->register(new maan_addons_call_to_action());
}