<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Advanced_Banner_Widget extends Widget_Base {

    public function get_name() {
        return 'advanced-banner';
    }

    public function get_title() {
        return 'Advanced Banner';
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    public function get_categories() {
        return [ 'advamentor' ];
    }

    // Registering Controls
    protected function _register_controls() {


        // Registering Global Title Controls
        $this->start_controls_section( 'advanced_banner_global_title_control',
            [
                'label'         => __( 'Title', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );

        // Registering Global Primary Title Controls
        $this->add_control( 'advanced_banner_global_primary_title_control',
            [
                'label'         => __( 'Primary Title', 'advamentor' ),
                'placeholder'   => __( 'Enter the primary title', 'advamentor' ),
                'type'          => Controls_Manager::TEXT,
                'dynamic'       => [
                    'active'    => true
                ],
                'default'       => __( 'Advamentor Primary Title', 'advamentor' ),
                'label_block'   => false,
            ]
        );

        $this->end_controls_section();


        // Registering Global Description Controls
        $this->start_controls_section( 'advanced_banner_global_description_control',
            [
                'label'         => __( 'Description', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );

        // Registering Global Description Content Controls
        $this->add_control( 'advanced_banner_global_description_content_control',
            [
                'label'         => __( 'Content', 'advamentor' ),
                'description'   => __( 'Enter description content', 'advamentor' ),
                'type'          => Controls_Manager::WYSIWYG,
                'dynamic'       => [
                    'active'    => true
                ],
                'default'       => __( 'American Engineers began developing digital technologyin the mid-twentieth century. Their techniqueswere based on mathematical Concepts.', 'advamentor' ),
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();


        // Registering Global Button Controls
        $this->start_controls_section( 'advanced_banner_global_button_control',
            [
                'label'         => __( 'Button', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );

        // Registering Global Button Text Controls
        $this->add_control( 'advanced_banner_global_button_text_control',
            [
                'label'         => __( 'Button Text', 'advamentor' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => 'VIEW MORE',
                'separator'     => 'before',
                'placeholder'   => __( 'Enter button text', 'advamentor' ),
            ]
        );

        // Registering Global Button URL Controls
        $this->add_control( 'advanced_banner_global_button_url',
            [
                'label'         => __( 'Link URL', 'advamentor' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                'placeholder'   => __( 'Enter link URL for the button', 'advamentor' ),
                'show_external' => true,
                'default'       => [
                    'url'       => '#'
                ],
            ]
        );

        $this->end_controls_section();


        // Registering Preset Style Controls
        $this->start_controls_section( 'advanced_banner_preset_style_control',
            [
                'label'         => __( 'Presets', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );

        // Registering Preset Selector Controls
        $this->add_control( 'advanced_banner_preset_selector_control',
            [
                'label'         => __( 'Select Preset', 'advamentor' ),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'aetrio'    => 'Aetrio',
                    'eeta'      => 'Eeta',
                    'evezza'    => 'Evezza',
                    'hostezza'  => 'Hostezza',
                    'rozzby'    => 'Rozzby',
                    'ziofy'     => 'Ziofy',
                ],
                'default'       => 'aetrio',
                'prefix_class'  => 'advanced-banner-',
            ]
        );

        $this->end_controls_section();


        // Registering Preset Background Controls
        $this->start_controls_section( 'advanced_banner_preset_background_control',
            [
                'label'         => __( 'Background', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );

        // Registering Preset Background Group Controls
        $this->add_group_control( Group_Control_Background::get_type(),
            [
                'name'          => 'advanced_banner_background_control',
                'label'         => __( 'Background Options', 'plugin-domain' ),
                'types'         => [ 
                    'classic', 
                    'gradient', 
                    'video' 
                ],
                'selector'      => '{{WRAPPER}} .advanced-banner-description',
            ]
        );

        // Registering Aetrio Background Image Controls
        $this->add_control( 'advanced_banner_aetrio_background_image_control',
            [
                'label'         => __( 'Background Image', 'advamentor' ),
                'description'   => __( 'Upload/Select an image for the background', 'advamentor' ),
                'type'          => Controls_Manager::MEDIA,
                'dynamic'       => [
                    'active'    => true
                ],
                'default'       => [
                    'url'       => plugin_dir_url( dirname( __FILE__ ) ) . '/../../../assets/front/images/advanced-banner/aetrio.png'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio',
                ],
                'show_external' => true,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-description' => 'background-image: url("{{URL}}");',
                ],
            ]
        );

        // Registering Eeta Background Image Controls
        $this->add_control( 'advanced_banner_eeta_background_image_control',
            [
                'label'         => __( 'Background Image', 'advamentor' ),
                'description'   => __( 'Upload/Select an image for the background', 'advamentor' ),
                'type'          => Controls_Manager::MEDIA,
                'dynamic'       => [
                    'active'    => true
                ],
                'default'       => [
                    'url'       => plugin_dir_url( dirname( __FILE__ ) ) . '/../../../assets/front/images/advanced-banner/eeta.png'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta',
                ],
                'show_external' => true,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-description' => 'background-image: url("{{URL}}");',
                ],
            ]
        );

        // Registering Evezza Background Image Controls
        $this->add_control( 'advanced_banner_evezza_background_image_control',
            [
                'label'         => __( 'Background Image', 'advamentor' ),
                'description'   => __( 'Upload/Select an image for the background', 'advamentor' ),
                'type'          => Controls_Manager::MEDIA,
                'dynamic'       => [
                    'active'    => true
                ],
                'default'       => [
                    'url'       => plugin_dir_url( dirname( __FILE__ ) ) . '/../../../assets/front/images/advanced-banner/evezza.png'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza',
                ],
                'show_external' => true,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-description' => 'background-image: url("{{URL}}");',
                ],
            ]
        );

        // Registering Hostezza Background Image Controls
        $this->add_control( 'advanced_banner_hostezza_background_image_control',
            [
                'label'         => __( 'Background Image', 'advamentor' ),
                'description'   => __( 'Upload/Select an image for the background', 'advamentor' ),
                'type'          => Controls_Manager::MEDIA,
                'dynamic'       => [
                    'active'    => true
                ],
                'default'       => [
                    'url'       => plugin_dir_url( dirname( __FILE__ ) ) . '/../../../assets/front/images/advanced-banner/hostezza.png'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza',
                ],
                'show_external' => true,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-description' => 'background-image: url("{{URL}}");',
                ],
            ]
        );

        // Registering Rozzby Background Image Controls
        $this->add_control( 'advanced_banner_rozzby_background_image_control',
            [
                'label'         => __( 'Background Image', 'advamentor' ),
                'description'   => __( 'Upload/Select an image for the background', 'advamentor' ),
                'type'          => Controls_Manager::MEDIA,
                'dynamic'       => [
                    'active'    => true
                ],
                'default'       => [
                    'url'       => plugin_dir_url( dirname( __FILE__ ) ) . '/../../../assets/front/images/advanced-banner/rozzby.png'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby',
                ],
                'show_external' => true,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-description' => 'background-image: url("{{URL}}");',
                ],
            ]
        );

        // Registering Ziofy Background Image Controls
        $this->add_control( 'advanced_banner_ziofy_background_image_control',
            [
                'label'         => __( 'Background Image', 'advamentor' ),
                'description'   => __( 'Upload/Select an image for the background', 'advamentor' ),
                'type'          => Controls_Manager::MEDIA,
                'dynamic'       => [
                    'active'    => true
                ],
                'default'       => [
                    'url'       => plugin_dir_url( dirname( __FILE__ ) ) . '/../../../assets/advanced-banner/ziofy.png'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy',
                ],
                'show_external' => true,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-description' => 'background-image: url("{{URL}}");',
                ],
            ]
        );

        $this->end_controls_section();


        // Registering Global Container Styles Controls
        $this->start_controls_section( 'advanced_banner_global_container_style_control',
            [
                'label'         => __( 'Container', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );

        // Registering Global Container CSS Filter Controls
        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name'          => 'advanced_banner_global_container_css_filters_control',
                'selector'      => '{{WRAPPER}} .advanced-banner-ib',
            ]
        );

        // Registering Global Container Border Controls
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'          => 'advanced_banner_global_container_border_control',
                'selector'      => ' {{WRAPPER}} .advanced-banner-description'
            ]
        );

        // Registering Global Container Border Controls
        $this->add_control( 'advanced_banner_global_container_border_color_control',
            [
                'label'         => __( 'Border Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-description' => 'border-color: {{VALUE}};'
                ]
            ]
        );

        // Registering Global Container Border Radius Controls
        $this->add_responsive_control( 'advanced_banner_global_container_border_radius_control',
            [
                'label'         => __( 'Border Radius', 'advamentor' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'selectors'     => [
                    ' {{WRAPPER}} .advanced-banner-description' => 'border-radius: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        // Registering Aetrio Text Align Controls
        $this->add_control( 'advanced_banner_aetrio_text_align_control',
            [
                'label'         => __( 'Text Align', 'advamentor' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title'     => __( 'Left', 'advamentor' ),
                        'icon'      => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title'     => __( 'Center', 'advamentor' ),
                        'icon'      => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title'     => __( 'Right', 'advamentor' ),
                        'icon'      => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'center',
                'toggle'        => false,
                'prefix_class'  => 'advanced-banner-text-align-',

                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-primary-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .banner-button'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        // Registering Eeta Text Align Controls
        $this->add_control( 'advanced_banner_eeta_text_align_control',
            [
                'label'         => __( 'Text Align', 'advamentor' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title'     => __( 'Left', 'advamentor' ),
                        'icon'      => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title'     => __( 'Center', 'advamentor' ),
                        'icon'      => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title'     => __( 'Right', 'advamentor' ),
                        'icon'      => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'left',
                'toggle'        => false,
                'prefix_class'  => 'advanced-banner-text-align-',

                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-primary-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .banner-button'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        // Registering Evezza Text Align Controls
        $this->add_control( 'advanced_banner_evezza_text_align_control',
            [
                'label'         => __( 'Text Align', 'advamentor' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title'     => __( 'Left', 'advamentor' ),
                        'icon'      => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title'     => __( 'Center', 'advamentor' ),
                        'icon'      => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title'     => __( 'Right', 'advamentor' ),
                        'icon'      => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'center',
                'toggle'        => false,
                'prefix_class'  => 'advanced-banner-text-align-',

                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-primary-title, {{WRAPPER}} .advanced-banner-secondary-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .banner-button'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        // Registering Hostezza Text Align Controls
        $this->add_control( 'advanced_banner_hostezza_text_align_control',
            [
                'label'         => __( 'Text Align', 'advamentor' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title'     => __( 'Left', 'advamentor' ),
                        'icon'      => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title'     => __( 'Center', 'advamentor' ),
                        'icon'      => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title'     => __( 'Right', 'advamentor' ),
                        'icon'      => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'left',
                'toggle'        => false,
                'prefix_class'  => 'advanced-banner-text-align-',

                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-primary-title, {{WRAPPER}} .advanced-banner-secondary-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .banner-button'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        // Registering Rozzby Text Align Controls
        $this->add_control( 'advanced_banner_rozzby_text_align_control',
            [
                'label'         => __( 'Text Align', 'advamentor' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title'     => __( 'Left', 'advamentor' ),
                        'icon'      => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title'     => __( 'Center', 'advamentor' ),
                        'icon'      => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title'     => __( 'Right', 'advamentor' ),
                        'icon'      => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'left',
                'toggle'        => false,
                'prefix_class'  => 'advanced-banner-text-align-',

                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-primary-title, {{WRAPPER}} .advanced-banner-secondary-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .banner-button'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        // Registering Ziofy Text Align Controls
        $this->add_control( 'advanced_banner_ziofy_text_align_control',
            [
                'label'         => __( 'Text Align', 'advamentor' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title'     => __( 'Left', 'advamentor' ),
                        'icon'      => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title'     => __( 'Center', 'advamentor' ),
                        'icon'      => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title'     => __( 'Right', 'advamentor' ),
                        'icon'      => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'center',
                'toggle'        => false,
                'prefix_class'  => 'advanced-banner-text-align-',

                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-primary-title, {{WRAPPER}} .advanced-banner-secondary-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .banner-button'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        $this->end_controls_section();

        // Registering Primary Title Style Controls
        $this->start_controls_section( 'advanced_banner_primary_title_style_control',
            [
                'label'         => __( 'Title', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );

        //  Registering Aetrio Primary Title Color Controls
        $this->add_control( 'advanced_banner_aetrio_primary_title_color_control',
            [
                'label'         => __( 'Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-primary-title' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Primary Title Color Controls
        $this->add_control( 'advanced_banner_eeta_primary_title_color_control',
            [
                'label'         => __( 'Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#39465c',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-primary-title' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Primary Title Color Controls
        $this->add_control( 'advanced_banner_evezza_primary_title_color_control',
            [
                'label'         => __( 'Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-primary-title' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Primary Title Color Controls
        $this->add_control( 'advanced_banner_hostezza_primary_title_color_control',
            [
                'label'         => __( 'Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#000000',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-primary-title' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Primary Title Color Controls
        $this->add_control( 'advanced_banner_rozzby_primary_title_color_control',
            [
                'label'         => __( 'Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#000000',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-primary-title' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Primary Title Color Controls
        $this->add_control( 'advanced_banner_ziofy_primary_title_color_control',
            [
                'label'         => __( 'Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#000000',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-primary-title' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Primary Title Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_aetrio_primary_title_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                'selector'      => '{{WRAPPER}} .advanced-banner-description .advanced-banner-primary-title',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Primary Title Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_eeta_primary_title_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                'selector'      => '{{WRAPPER}} .advanced-banner-description .advanced-banner-primary-title',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Primary Title Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_evezza_primary_title_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                'selector'      => '{{WRAPPER}} .advanced-banner-description .advanced-banner-primary-title',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Primary Title Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_hostezza_primary_title_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                'selector'      => '{{WRAPPER}} .advanced-banner-description .advanced-banner-primary-title',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Primary Title Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_rozzby_primary_title_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                'selector'      => '{{WRAPPER}} .advanced-banner-description .advanced-banner-primary-title',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Primary Title Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_ziofy_primary_title_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                'selector'      => '{{WRAPPER}} .advanced-banner-description .advanced-banner-primary-title',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Primary Title Text Shadow Controls
        $this->add_group_control( Group_Control_Text_Shadow::get_type(),
            [
                'label'         => __( 'Text Shadow','advamentor' ),
                'name'          => 'advanced_banner_aetrio_primary_title_text_shadow_control',
                'selector'      => '{{WRAPPER}} .advanced-banner-description .advanced-banner-primary-title',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Primary Title Text Shadow Controls
        $this->add_group_control( Group_Control_Text_Shadow::get_type(),
            [
                'label'         => __( 'Text Shadow','advamentor' ),
                'name'          => 'advanced_banner_eeta_primary_title_text_shadow_control',
                'selector'      => '{{WRAPPER}} .advanced-banner-description .advanced-banner-primary-title',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Primary Title Text Shadow Controls
        $this->add_group_control( Group_Control_Text_Shadow::get_type(),
            [
                'label'         => __( 'Text Shadow','advamentor' ),
                'name'          => 'advanced_banner_evezza_primary_title_text_shadow_control',
                'selector'      => '{{WRAPPER}} .advanced-banner-description .advanced-banner-primary-title',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Primary Title Text Shadow Controls
        $this->add_group_control( Group_Control_Text_Shadow::get_type(),
            [
                'label'         => __( 'Text Shadow','advamentor' ),
                'name'          => 'advanced_banner_hostezza_primary_title_text_shadow_control',
                'selector'      => '{{WRAPPER}} .advanced-banner-description .advanced-banner-primary-title',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Primary Title Text Shadow Controls
        $this->add_group_control( Group_Control_Text_Shadow::get_type(),
            [
                'label'         => __( 'Text Shadow','advamentor' ),
                'name'          => 'advanced_banner_rozzby_primary_title_text_shadow_control',
                'selector'      => '{{WRAPPER}} .advanced-banner-description .advanced-banner-primary-title',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Primary Title Text Shadow Controls
        $this->add_group_control( Group_Control_Text_Shadow::get_type(),
            [
                'label'         => __( 'Text Shadow','advamentor' ),
                'name'          => 'advanced_banner_ziofy_primary_title_text_shadow_control',
                'selector'      => '{{WRAPPER}} .advanced-banner-description .advanced-banner-primary-title',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Primary Title Padding Controls
        $this->add_responsive_control( 'advanced_banner_aetrio_primary_title_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-primary-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Primary Title Padding Controls
        $this->add_responsive_control( 'advanced_banner_eeta_primary_title_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-primary-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Primary Title Padding Controls
        $this->add_responsive_control( 'advanced_banner_evezza_primary_title_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-primary-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Primary Title Padding Controls
        $this->add_responsive_control( 'advanced_banner_hostezza_primary_title_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-primary-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Primary Title Padding Controls
        $this->add_responsive_control( 'advanced_banner_rozzby_primary_title_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-primary-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Primary Title Padding Controls
        $this->add_responsive_control( 'advanced_banner_ziofy_primary_title_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-primary-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Primary Title Margin Controls
        $this->add_responsive_control( 'advanced_banner_aetrio_primary_title_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-primary-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Primary Title Margin Controls
        $this->add_responsive_control( 'advanced_banner_eeta_primary_title_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-primary-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Primary Title Margin Controls
        $this->add_responsive_control( 'advanced_banner_evezza_primary_title_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-primary-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Primary Title Margin Controls
        $this->add_responsive_control( 'advanced_banner_hostezza_primary_title_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-primary-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Primary Title Margin Controls
        $this->add_responsive_control( 'advanced_banner_rozzby_primary_title_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-primary-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Primary Title Margin Controls
        $this->add_responsive_control( 'advanced_banner_ziofy_primary_title_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-primary-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        $this->end_controls_section();


        //  Registering Content Style Controls
        $this->start_controls_section( 'advanced_banner_content_style_control',
            [
                'label'         => __( 'Description', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );

        //  Registering Aetrio Content Color Controls
        $this->add_control( 'advanced_banner_aetrio_content_text_color_control',
            [
                'label'         => __( 'Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Content Color Controls
        $this->add_control( 'advanced_banner_eeta_content_text_color_control',
            [
                'label'         => __( 'Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#39465c',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Content Color Controls
        $this->add_control( 'advanced_banner_evezza_content_text_color_control',
            [
                'label'         => __( 'Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Content Color Controls
        $this->add_control( 'advanced_banner_hostezza_content_text_color_control',
            [
                'label'         => __( 'Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#000000',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Content Color Controls
        $this->add_control( 'advanced_banner_rozzby_content_text_color_control',
            [
                'label'         => __( 'Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#000000',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Content Color Controls
        $this->add_control( 'advanced_banner_ziofy_content_text_color_control',
            [
                'label'         => __( 'Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#000000',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Content Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_aetrio_content_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-content',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Content Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_eeta_content_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-content',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Content Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_evezza_content_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-content',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Content Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_hostezza_content_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-content',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Content Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_rozzby_content_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-content',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Content Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_ziofy_content_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-content',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Content Width Controls
        $this->add_responsive_control( 'advanced_banner_aetrio_content_width_control',
            [
                'label'         => __( 'Content Width', 'advamentor' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'default'       => [
                    'unit'      => '%',
                    'size'      => 50,
                ],
                'selectors'     => [
                    ' {{WRAPPER}} .advanced-banner-content' => 'width: {{SIZE}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Content Width Controls
        $this->add_responsive_control( 'advanced_banner_eeta_content_width_control',
            [
                'label'         => __( 'Content Width', 'advamentor' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'default'       => [
                    'unit'      => '%',
                    'size'      => 50,
                ],
                'selectors'     => [
                    ' {{WRAPPER}} .advanced-banner-content' => 'width: {{SIZE}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Content Width Controls
        $this->add_responsive_control( 'advanced_banner_evezza_content_width_control',
            [
                'label'         => __( 'Content Width', 'advamentor' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'default'       => [
                    'unit'      => '%',
                    'size'      => 50,
                ],

                'selectors'     => [
                    ' {{WRAPPER}} .advanced-banner-content' => 'width: {{SIZE}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Content Width Controls
        $this->add_responsive_control( 'advanced_banner_hostezza_content_width_control',
            [
                'label'         => __( 'Content Width', 'advamentor' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'default'       => [
                    'unit'      => '%',
                    'size'      => 50,
                ],

                'selectors'     => [
                    ' {{WRAPPER}} .advanced-banner-content' => 'width: {{SIZE}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Content Width Controls
        $this->add_responsive_control( 'advanced_banner_rozzby_content_width_control',
            [
                'label'         => __( 'Content Width', 'advamentor' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'default'       => [
                    'unit'      => '%',
                    'size'      => 50,
                ],

                'selectors'     => [
                    ' {{WRAPPER}} .advanced-banner-content' => 'width: {{SIZE}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Content Width Controls
        $this->add_responsive_control( 'advanced_banner_ziofy_content_width_control',
            [
                'label'         => __( 'Content Width', 'advamentor' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'default'       => [
                    'unit'      => '%',
                    'size'      => 50,
                ],

                'selectors'     => [
                    ' {{WRAPPER}} .advanced-banner-content' => 'width: {{SIZE}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Content Text Shadow Controls
        $this->add_group_control( Group_Control_Text_Shadow::get_type(),
            [
                'label'         => __( 'Text Shadow','advamentor' ),
                'name'          => 'advanced_banner_aetrio_content_text_shadow_control',
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-content',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Aetrio Content Text Shadow Controls
        $this->add_group_control( Group_Control_Text_Shadow::get_type(),
            [
                'label'         => __( 'Text Shadow','advamentor' ),
                'name'          => 'advanced_banner_eeta_content_text_shadow_control',
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-content',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Content Text Shadow Controls
        $this->add_group_control( Group_Control_Text_Shadow::get_type(),
            [
                'label'         => __( 'Text Shadow','advamentor' ),
                'name'          => 'advanced_banner_evezza_content_text_shadow_control',
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-content',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Content Text Shadow Controls
        $this->add_group_control( Group_Control_Text_Shadow::get_type(),
            [
                'label'         => __( 'Text Shadow','advamentor' ),
                'name'          => 'advanced_banner_hostezza_content_text_shadow_control',
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-content',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Content Text Shadow Controls
        $this->add_group_control( Group_Control_Text_Shadow::get_type(),
            [
                'label'         => __( 'Text Shadow','advamentor' ),
                'name'          => 'advanced_banner_rozzby_content_text_shadow_control',
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-content',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering ziofy Content Text Shadow Controls
        $this->add_group_control( Group_Control_Text_Shadow::get_type(),
            [
                'label'         => __( 'Text Shadow','advamentor' ),
                'name'          => 'advanced_banner_ziofy_content_text_shadow_control',
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-content',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Content Text Padding Controls
        $this->add_responsive_control( 'advanced_banner_aetrio_content_text_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Content Text Padding Controls
        $this->add_responsive_control( 'advanced_banner_eeta_content_text_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Content Text Padding Controls
        $this->add_responsive_control( 'advanced_banner_evezza_content_text_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Content Text Padding Controls
        $this->add_responsive_control( 'advanced_banner_hostezza_content_text_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Content Text Padding Controls
        $this->add_responsive_control( 'advanced_banner_rozzby_content_text_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Content Text Padding Controls
        $this->add_responsive_control( 'advanced_banner_ziofy_content_text_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Content Text margin Controls
        $this->add_responsive_control( 'advanced_banner_aetrio_content_text_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Content Text margin Controls
        $this->add_responsive_control( 'advanced_banner_eeta_content_text_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Content Text margin Controls
        $this->add_responsive_control( 'advanced_banner_evezza_content_text_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Content Text margin Controls
        $this->add_responsive_control( 'advanced_banner_hostezza_content_text_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Content Text margin Controls
        $this->add_responsive_control( 'advanced_banner_rozzby_content_text_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Content Text margin Controls
        $this->add_responsive_control( 'advanced_banner_ziofy_content_text_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        $this->end_controls_section();


        //  Registering Button Style Controls
        $this->start_controls_section( 'advanced_banner_button_style_control',
            [
                'label'         => __( 'Button', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_STYLE,

            ]
        );

        //  Registering Aetrio Button Text Color Controls
        $this->add_control( 'advanced_banner_aetrio_button_text_color_control',
            [
                'label'         => __( 'Text Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Button Text Color Controls
        $this->add_control( 'advanced_banner_eeta_button_text_color_control',
            [
                'label'         => __( 'Text Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#39465c',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Button Text Color Controls
        $this->add_control( 'advanced_banner_evezza_button_text_color_control',
            [
                'label'         => __( 'Text Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Button Text Color Controls
        $this->add_control( 'advanced_banner_hostezza_button_text_color_control',
            [
                'label'         => __( 'Text Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Button Text Color Controls
        $this->add_control( 'advanced_banner_rozzby_button_text_color_control',
            [
                'label'         => __( 'Text Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#000000',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Button Text Color Controls
        $this->add_control( 'advanced_banner_ziofy_button_text_color_control',
            [
                'label'         => __( 'Text Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#274dea',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Button Text Color on Hover Controls
        $this->add_control( 'advanced_banner_aetrio_button_hover_text_color_control',
            [
                'label'         => __( 'Text Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'scheme'        => [
                    'type'      => Scheme_Color::get_type(),
                    'value'     => Scheme_Color::COLOR_3,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Button Text Color on Hover Controls
        $this->add_control( 'advanced_banner_eeta_button_hover_text_color_control',
            [
                'label'         => __( 'Text Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#f6aa09',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Button Text Color on Hover Controls
        $this->add_control( 'advanced_banner_evezza_button_hover_text_color_control',
            [
                'label'         => __( 'Text Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Button Text Color on Hover Controls
        $this->add_control( 'advanced_banner_hostezza_button_hover_text_color_control',
            [
                'label'         => __( 'Text Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#4776e6',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Button Text Color on Hover Controls
        $this->add_control( 'advanced_banner_rozzby_button_hover_text_color_control',
            [
                'label'         => __( 'Text Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#000000',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Button Text Color on Hover Controls
        $this->add_control( 'advanced_banner_ziofy_button_hover_text_color_control',
            [
                'label'         => __( 'Text Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Button Text Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_aetrio_button_text_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_3,
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-button',

                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Button Text Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_eeta_button_text_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_3,
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-button',

                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Button Text Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_evezza_button_text_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_3,
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-button',

                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Button Text Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_hostezza_button_text_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_3,
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-button',

                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Button Text Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_rozzby_button_text_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_3,
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-button',

                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Button Text Typography Controls
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'          => 'advanced_banner_ziofy_button_text_typography_control',
                'scheme'        => Scheme_Typography::TYPOGRAPHY_3,
                'selector'      => '{{WRAPPER}} .advanced-banner .advanced-banner-button',

                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering aetrio Button Background Color Controls
        $this->add_control( 'advanced_banner_aetrio_button_background_color_control',
            [
                'label'         => __( 'Background Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'background-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Button Background Color Controls
        $this->add_control( 'advanced_banner_eeta_button_background_color_control',
            [
                'label'         => __( 'Background Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#f6aa09',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'background-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Button Background Color Controls
        $this->add_control( 'advanced_banner_evezza_button_background_color_control',
            [
                'label'         => __( 'Background Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#F6AA0A',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'background-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Button Background Color Controls
        $this->add_control( 'advanced_banner_hostezza_button_background_color_control',
            [
                'label'         => __( 'Background Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#4776e6',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'background-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Button Background Color Controls
        $this->add_control( 'advanced_banner_rozzby_button_background_color_control',
            [
                'label'         => __( 'Background Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => 'transparent',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'background-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Button Background Color Controls
        $this->add_control( 'advanced_banner_ziofy_button_background_color_control',
            [
                'label'         => __( 'Background Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => 'transparent',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'background-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Evezza Button on Hover Background Color Controls
        $this->add_control( 'advanced_banner_aetrio_button_hover_background_color_control',
            [
                'label'         => __( 'Background Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'background-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Button on Hover Background Color Controls
        $this->add_control( 'advanced_banner_eeta_button_hover_background_color_control',
            [
                'label'         => __( 'Background Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'background-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Button on Hover Background Color Controls
        $this->add_control( 'advanced_banner_evezza_button_hover_background_color_control',
            [
                'label'         => __( 'Background Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => 'transparent',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'background-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Button on Hover Background Color Controls
        $this->add_control( 'advanced_banner_hostezza_button_hover_background_color_control',
            [
                'label'         => __( 'Background Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => 'transparent',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'background-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Button on Hover Background Color Controls
        $this->add_control( 'advanced_banner_rozzby_button_hover_background_color_control',
            [
                'label'         => __( 'Background Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#92ca52',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'background-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Button on Hover Background Color Controls
        $this->add_control( 'advanced_banner_ziofy_button_hover_background_color_control',
            [
                'label'         => __( 'Background Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#274dea',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'background-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Button Border Controls
        $this->add_group_control( Group_Control_Border::get_type(),
            [
                'name'          => 'advanced_banner_aetrio_button_border_control',
                'selector'      => ' {{WRAPPER}} .advanced-banner-button',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Button Border Controls
        $this->add_group_control( Group_Control_Border::get_type(),
            [
                'name'          => 'advanced_banner_eeta_button_border_control',
                'selector'      => ' {{WRAPPER}} .advanced-banner-button',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Button Border Controls
        $this->add_group_control( Group_Control_Border::get_type(),
            [
                'name'          => 'advanced_banner_evezza_button_border_control',
                'selector'      => ' {{WRAPPER}} .advanced-banner-button',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Button Border Controls
        $this->add_group_control( Group_Control_Border::get_type(),
            [
                'name'          => 'advanced_banner_hostezza_button_border_control',
                'selector'      => ' {{WRAPPER}} .advanced-banner-button',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Button Border Controls
        $this->add_group_control( Group_Control_Border::get_type(),
            [
                'name'          => 'advanced_banner_rozzby_button_border_control',
                'selector'      => ' {{WRAPPER}} .advanced-banner-button',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering ziofy Button Border Controls
        $this->add_group_control( Group_Control_Border::get_type(),
            [
                'name'          => 'advanced_banner_ziofy_button_border_control',
                'selector'      => ' {{WRAPPER}} .advanced-banner-button',
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Button Border Color Controls
        $this->add_control( 'advanced_banner_aetrio_button_border_color_control',
            [
                'label'         => __( 'Border Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'border-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Button Border Color Controls
        $this->add_control( 'advanced_banner_eeta_button_border_color_control',
            [
                'label'         => __( 'Border Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#f6aa09',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'border-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Button Border Color Controls
        $this->add_control( 'advanced_banner_evezza_button_border_color_control',
            [
                'label'         => __( 'Border Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#F6AA0A',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'border-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Button Border Color Controls
        $this->add_control( 'advanced_banner_hostezza_button_border_color_control',
            [
                'label'         => __( 'Border Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#4776e6',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'border-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Button Border Color Controls
        $this->add_control( 'advanced_banner_rozzby_button_border_color_control',
            [
                'label'         => __( 'Border Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#92ca52',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'border-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Button Border Color Controls
        $this->add_control( 'advanced_banner_ziofy_button_border_color_control',
            [
                'label'         => __( 'Border Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#274dea',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button' => 'border-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Button on hover Border Color Controls
        $this->add_control( 'advanced_banner_aetrio_button_hover_border_color_control',
            [
                'label'         => __( 'Border Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'border-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Button on hover Border Color Controls
        $this->add_control( 'advanced_banner_eeta_button_hover_border_color_control',
            [
                'label'         => __( 'Border Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#f6aa09',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'border-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Button on hover Border Color Controls
        $this->add_control( 'advanced_banner_evezza_button_hover_border_color_control',
            [
                'label'         => __( 'Border Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#F6AA0A',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'border-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Button on hover Border Color Controls
        $this->add_control( 'advanced_banner_hostezza_button_hover_border_color_control',
            [
                'label'         => __( 'Border Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#4776e6',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'border-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Button on hover Border Color Controls
        $this->add_control( 'advanced_banner_rozzby_button_hover_border_color_control',
            [
                'label'         => __( 'Border Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#92ca52',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'border-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering ziofy Button on hover Border Color Controls
        $this->add_control( 'advanced_banner_ziofy_button_hover_border_color_control',
            [
                'label'         => __( 'Border Color on Hover', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#274dea',
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button:hover' => 'border-color: {{VALUE}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Button Border Radius Controls
        $this->add_responsive_control( 'advanced_banner_aetrio_button_border_radius_control',
            [
                'label'         => __( 'Border Radius', 'advamentor' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'selectors'     => [
                    ' {{WRAPPER}} .advanced-banner-button' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Button Border Radius Controls
        $this->add_responsive_control( 'advanced_banner_eeta_button_border_radius_control',
            [
                'label'         => __( 'Border Radius', 'advamentor' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'selectors'     => [
                    ' {{WRAPPER}} .advanced-banner-button' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Button Border Radius Controls
        $this->add_responsive_control( 'advanced_banner_evezza_button_border_radius_control',
            [
                'label'         => __( 'Border Radius', 'advamentor' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'selectors'     => [
                    ' {{WRAPPER}} .advanced-banner-button' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Button Border Radius Controls
        $this->add_responsive_control( 'advanced_banner_hostezza_button_border_radius_control',
            [
                'label'         => __( 'Border Radius', 'advamentor' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'selectors'     => [
                    ' {{WRAPPER}} .advanced-banner-button' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Button Border Radius Controls
        $this->add_responsive_control( 'advanced_banner_rozzby_button_border_radius_control',
            [
                'label'         => __( 'Border Radius', 'advamentor' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'selectors'     => [
                    ' {{WRAPPER}} .advanced-banner-button' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Button Border Radius Controls
        $this->add_responsive_control( 'advanced_banner_ziofy_button_border_radius_control',
            [
                'label'         => __( 'Border Radius', 'advamentor' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%' ,'em'],
                'selectors'     => [
                    ' {{WRAPPER}} .advanced-banner-button' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Evezza Button Padding Controls
        $this->add_responsive_control( 'advanced_banner_aetrio_button_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button, {{WRAPPER}} .advanced-banner .banner-button'        => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Button Padding Controls
        $this->add_responsive_control( 'advanced_banner_eeta_button_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button, {{WRAPPER}} .advanced-banner .banner-button'        => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Button Padding Controls
        $this->add_responsive_control( 'advanced_banner_evezza_button_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button, {{WRAPPER}} .advanced-banner .banner-button'        => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Button Padding Controls
        $this->add_responsive_control( 'advanced_banner_hostezza_button_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button, {{WRAPPER}} .advanced-banner .banner-button'        => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Button Padding Controls
        $this->add_responsive_control( 'advanced_banner_rozzby_button_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button, {{WRAPPER}} .advanced-banner .banner-button'        => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Button Padding Controls
        $this->add_responsive_control( 'advanced_banner_ziofy_button_padding_control',
            [
                'label'         => __( 'Padding', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button, {{WRAPPER}} .advanced-banner .banner-button'        => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        //  Registering Aetrio Button Margin Controls
        $this->add_responsive_control( 'aadvanced_banner_aetrio_button_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button, {{WRAPPER}} .advanced-banner .banner-button'        => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'aetrio'
                ],
            ]
        );

        //  Registering Eeta Button Margin Controls
        $this->add_responsive_control( 'advanced_banner_eeta_button_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button, {{WRAPPER}} .advanced-banner .banner-button'        => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'eeta'
                ],
            ]
        );

        //  Registering Evezza Button Margin Controls
        $this->add_responsive_control( 'advanced_banner_evezza_button_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button, {{WRAPPER}} .advanced-banner .banner-button'        => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'evezza'
                ],
            ]
        );

        //  Registering Hostezza Button Margin Controls
        $this->add_responsive_control( 'advanced_banner_hostezza_button_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button, {{WRAPPER}} .advanced-banner .banner-button'        => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'hostezza'
                ],
            ]
        );

        //  Registering Rozzby Button Margin Controls
        $this->add_responsive_control( 'advanced_banner_rozzby_button_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button, {{WRAPPER}} .advanced-banner .banner-button'        => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'rozzby'
                ],
            ]
        );

        //  Registering Ziofy Button Margin Controls
        $this->add_responsive_control( 'advanced_banner_ziofy_button_margin_control',
            [
                'label'         => __( 'Margin', 'advamentor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner .advanced-banner-button, {{WRAPPER}} .advanced-banner .banner-button'        => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'advanced_banner_preset_selector_control' => 'ziofy'
                ],
            ]
        );

        $this->end_controls_section();
    }


    protected function render() {
        $settings   = $this->get_settings_for_display();
        $this->add_inline_editing_attributes( 'advanced_banner_global_primary_title_control' );
        $this->add_inline_editing_attributes( 'advanced_banner_global_description_content_control', 'advanced' );

        $title                = $settings[ 'advanced_banner_global_primary_title_control' ];
        $full_description     = $settings[ 'advanced_banner_global_description_content_control' ];
        $button_text          = $settings['advanced_banner_global_button_text_control'];

        $full_title           = '<h1 class="advanced-banner-primary-title">' .$title. '</h1>';

        $this->add_render_attribute( 'banner_button', 'class', 'advanced-banner-button' );
        $this->add_render_attribute( 'Text', 'class', 'advanced_banner_text' );

        
        $this->add_render_attribute( 'banner_button', 'href', esc_url($settings['advanced_banner_global_button_url']['url']) );

        if( 'on' == $settings['advanced_banner_global_button_url']['is_external'])
            $this->add_render_attribute( 'banner_button', 'target', '_blank' );

        if( 'on' == $settings['advanced_banner_global_button_url']['nofollow'])
            $this->add_render_attribute( 'banner_button', 'rel', 'nofollow' );

        ?>
        <div class="advanced-banner">
            <div class="advanced-banner-ib">
                <div class="advanced-banner-description">
                    <?php echo $full_title; ?>
                    <div class="advanced-banner-content">
                        <?php echo $full_description; ?>
                    </div>
                    <div class="banner-button">
                        <a <?php echo $this->get_render_attribute_string( 'banner_button' ); ?>>
                            <?php echo $button_text; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

}