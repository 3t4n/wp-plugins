<?php

namespace Elementor;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class  maan_addons_service extends Widget_Base
{

    public function get_name()
    {
        return 'maan_addons_service';
    }

    public function get_title()
    {
        return __('Service', 'maan-elementor-addons');
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
                'label' => __('Service', 'maan-elementor-addons'),
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
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'maan-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Web Design', 'maan-elementor-addons'),
            ]
        );
        $repeater->add_control(
            'img_icon',
            [
                'label' => __( 'Image / Icon', 'maan-elementor-addons' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => false,
                'options' => [
                    'image' => __( 'Image', 'maan-elementor-addons' ),
                    'icon' => __( 'Icon', 'maan-elementor-addons' ),
                ],
                'default' => 'icon',
                'toggle' => true,
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'maan-elementor-addons' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => ['img_icon' => 'icon'],
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'moda' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => ['img_icon' => 'image'],
            ]
        );
        $repeater->add_control(
            'colors',
            [
                'label' => __('Color', 'maan-elementor-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );
        $repeater->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'item_bg',
                'label' => esc_html__('Background', 'maan-elementor-addons'),
                'types' => ['classic', 'gradient'],
            ]
        );
        $repeater->add_control(
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
        $repeater->add_control(
            'content',
            [
                'label' => __('Content', 'maan-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('The European language members for family. Their separate existence.', 'maan-elementor-addons'),
            ]
        );
        $repeater->add_control(
            'btn',
            [
                'label' => __('Button', 'maan-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('read more', 'maan-elementor-addons'),
            ]
        );
        $this->add_control(
            'service_list',
            [
                'label' => __('Service List', 'maan-elementor-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('Web Design', 'maan-elementor-addons'),
                    ],
                    [
                        'title' => __('Web Design', 'maan-elementor-addons'),
                    ],
                    [
                        'title' => __('Web Design', 'maan-elementor-addons'),
                    ],
                ],
                'title_field' => '{{ title }}'
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_settings',
            [
                'label' => __('Service', 'maan-elementor-addons'),
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
        $this->add_control(
            'image_size',
            [
                'label'   => __( 'Size', 'maan-elementor-addons' ),
                'type'    => Controls_Manager::SELECT,
                'options' => get_intermediate_image_sizes(),
                'default' => '1',
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
$on_off = $switch->get_option('maan_addons_service');
if ($on_off == '1') {
    Plugin::instance()->widgets_manager->register(new maan_addons_service());
}