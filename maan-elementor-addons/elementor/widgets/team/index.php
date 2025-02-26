<?php

namespace Elementor;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class  maan_addons_team extends Widget_Base
{

    public function get_name()
    {
        return 'maan_addons_team';
    }

    public function get_title()
    {
        return __('Team', 'maan-elementor-addons');
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
                'label' => __('Team', 'maan-elementor-addons'),
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
                'default' => __('Cristopher Henry', 'maan-elementor-addons'),
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
            'designation',
            [
                'label' => __('Designation', 'maan-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('CEO, Owner', 'maan-elementor-addons'),
            ]
        );
        $repeater->add_control(
            'content',
            [
                'label' => __('Content', 'maan-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('There is an idea to bring back all the remarkable', 'maan-elementor-addons'),
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
            ]
        );
        $repeater->add_control(
            'sc_icon_1',
            [
                'label' => esc_html__( 'Social Icons 1', 'maan-elementor-addons' ),
                'type' => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-facebook',
            ]
        );
        $repeater->add_control(
            'sc_link_1', [
                'label' => __('Social Link 1', 'maan-elementor-addons'),
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
            'sc_icon_2',
            [
                'label' => esc_html__( 'Social Icons 2', 'maan-elementor-addons' ),
                'type' => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-facebook',
            ]
        );
        $repeater->add_control(
            'sc_link_2', [
                'label' => __('Social Link 2', 'maan-elementor-addons'),
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
            'sc_icon_3',
            [
                'label' => esc_html__( 'Social Icons 3', 'maan-elementor-addons' ),
                'type' => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-facebook',
            ]
        );
        $repeater->add_control(
            'sc_link_3', [
                'label' => __('Social Link 3', 'maan-elementor-addons'),
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
            'sc_icon_4',
            [
                'label' => esc_html__( 'Social Icons 4', 'maan-elementor-addons' ),
                'type' => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-facebook',
            ]
        );
        $repeater->add_control(
            'sc_link_4', [
                'label' => __('Social Link 4', 'maan-elementor-addons'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'team_list',
            [
                'label' => __('Team List', 'maan-elementor-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('Cristopher Henry', 'maan-elementor-addons'),
                    ],
                    [
                        'title' => __('Cristopher Henry', 'maan-elementor-addons'),
                    ],
                    [
                        'title' => __('Cristopher Henry', 'maan-elementor-addons'),
                    ],
                ],
                'title_field' => '{{ title }}'
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_settings',
            [
                'label' => __('Team', 'maan-elementor-addons'),
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
$on_off = $switch->get_option('maan_addons_team');
if ($on_off == '1') {
    Plugin::instance()->widgets_manager->register(new maan_addons_team());
}