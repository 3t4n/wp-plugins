<?php
namespace Elementor;

class AEWLITE_Preview_Card_Widget extends Widget_Base {

    public function get_name() {
        return  'aewlite-preview-card-widget-id';
    }

    public function get_title() {
        return esc_html__( 'Preview Card', 'astro-elementor-widgets-lite' );
    }

    public function get_script_depends() {
        return [
            'aewlite-script'
        ];
    }

    public function get_icon() {
        return 'fa fa-picture-o';
    }

    public function get_categories() {
        return [ 'aewlite-for-elementor' ];
    }

    public function _register_controls() {
        /**
         * Image Settings
         */
        $this->start_controls_section(
            'image_section',
            [
                'label' => __( 'Image', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Image
            $this->add_control(
                'image',
                [
                    'label' => __( 'Choose Image', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            // Show Image Link
            $this->add_control(
                'show_image_link',
                [
                    'label' => __( 'Show Image Link', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'astro-elementor-widgets-lite' ),
                    'label_off' => __( 'Hide', 'astro-elementor-widgets-lite' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            // Link
            $this->add_control(
                'image_link',
                [
                    'label'         => __( 'Image Link', 'astro-elementor-widgets-lite' ),
                    'type'          => \Elementor\Controls_Manager::URL,
                    'placeholder'   => __( 'https://your-link.com', 'astro-elementor-widgets-lite' ),
                    'show_external' => true,
                    'default'       => [
                        'url'          => '',
                        'is_external'  => true,
                        'nofollow'     => true,
                    ],
                    'condition'     => [
                        'show_image_link' => 'yes'
                    ]
                ]
            );

        $this->end_controls_section();

        /**
         * Content Settings
         */
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
            // Title
            $this->add_control(
                'card_title',
                [
                    'label'       => __( 'Title', 'astro-elementor-widgets-lite' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => __( 'Default title', 'astro-elementor-widgets-lite' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your title here', 'astro-elementor-widgets-lite' ),
                ]
            );

            // Divider
            $this->add_control(
                'show_divider',
                [
                    'label'        => __( 'Show Divider', 'astro-elementor-widgets-lite' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'astro-elementor-widgets-lite' ),
                    'label_off'    => __( 'Hide', 'astro-elementor-widgets-lite' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );

            // Content
            $this->add_control(
                'card_description',
                [
                    'label'       => __( 'Description', 'astro-elementor-widgets-lite' ),
                    'type'        => \Elementor\Controls_Manager::WYSIWYG,
                    'default'     => __( 'Default description', 'astro-elementor-widgets-lite' ),
                    'placeholder' => __( 'Type your description here', 'astro-elementor-widgets-lite' ),
                ]
            );
        $this->end_controls_section();

        /**
         * Badge Settings
         */
        $this->start_controls_section(
            'badge_section',
            [
                'label' => __( 'Badge', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Top Badge
            $this->add_control(
                'show_top_badge',
                [
                    'label' => __( 'Show Top Badge', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'astro-elementor-widgets-lite' ),
                    'label_off' => __( 'Hide', 'astro-elementor-widgets-lite' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            // Top Badge Text
            $this->add_control(
                'top_badge_text',
                [
                    'label'       => __( 'Primary Text', 'astro-elementor-widgets-lite' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => __( 'On Sale!', 'astro-elementor-widgets-lite' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your primary text here', 'astro-elementor-widgets-lite' ),
                    'condition'   => [
                        'show_top_badge' => 'yes'
                    ]
                ]
            );

            // Top Badge SubText
            $this->add_control(
                'top_badge_subtext',
                [
                    'label'       => __( 'Secondary Text', 'astro-elementor-widgets-lite' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => __( 'Type your secondary text here', 'astro-elementor-widgets-lite' ),
                    'condition'   => [
                        'show_top_badge' => 'yes'
                    ]
                ]
            );

            // Divider
            $this->add_control(
                'top_middle_badge_divider',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );

            // Middle Badge
            $this->add_control(
                'show_middle_badge',
                [
                    'label' => __( 'Show Middle Badge', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'astro-elementor-widgets-lite' ),
                    'label_off' => __( 'Hide', 'astro-elementor-widgets-lite' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            // Middle Badge Text
            $this->add_control(
                'middle_badge_text',
                [
                    'label'       => __( 'Primary Text', 'astro-elementor-widgets-lite' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => __( '$19.49', 'astro-elementor-widgets-lite' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your badge primary text here', 'astro-elementor-widgets-lite' ),
                    'condition'   => [
                        'show_middle_badge' => 'yes'
                    ]
                ]
            );

            // Middle Badge SubText
            $this->add_control(
                'middle_badge_subtext',
                [
                    'label'       => __( 'Secondary Text', 'astro-elementor-widgets-lite' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => __( 'Type your secondary text here', 'astro-elementor-widgets-lite' ),
                    'condition'   => [
                        'show_middle_badge' => 'yes'
                    ]
                ]
            );

            // Divider
            $this->add_control(
                'middle_bottom_badge_divider',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );

            // Bottom Badge
            $this->add_control(
                'show_bottom_badge',
                [
                    'label' => __( 'Show Bottom badge', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'astro-elementor-widgets-lite' ),
                    'label_off' => __( 'Hide', 'astro-elementor-widgets-lite' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            // Bottom Badge Text
            $this->add_control(
                'bottom_badge_text',
                [
                    'label'       => __( 'Bottom Badge Text', 'astro-elementor-widgets-lite' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => __( '$19.49', 'astro-elementor-widgets-lite' ),
                    'placeholder' => __( 'Type your badge text here', 'astro-elementor-widgets-lite' ),
                    'label_block' => true,
                    'condition'   => [
                        'show_bottom_badge' => 'yes'
                    ]
                ]
            );

            // Bottom Badge SubText
            $this->add_control(
                'bottom_badge_subtext',
                [
                    'label'       => __( 'Secondary Text', 'astro-elementor-widgets-lite' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => __( 'Type your secondary text here', 'astro-elementor-widgets-lite' ),
                    'condition'   => [
                        'show_bottom_badge' => 'yes'
                    ]
                ]
            );

        $this->end_controls_section();

        /**
         * Button Settings
         */
        $this->start_controls_section(
            'button_section',
            [
                'label' => __( 'Button', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Link
        $this->add_control(
            'link',
            [
                'label'         => __( 'Link', 'astro-elementor-widgets-lite' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => __( 'https://your-link.com', 'astro-elementor-widgets-lite' ),
                'show_external' => true,
                'default'       => [
                    'url'          => '',
                    'is_external'  => true,
                    'nofollow'     => true,
                ],
            ]
        );

        // Link Text
        $this->add_control(
            'link_text',
            [
                'label'       => __( 'Text', 'astro-elementor-widgets-lite' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __( 'Buy Now', 'astro-elementor-widgets-lite' ),
                'label_block' => true,
                'placeholder' => __( 'Type your text here', 'astro-elementor-widgets-lite' ),
            ]
        );

        $this->end_controls_section();


        // Style Tab
        $this->style_tab();
    }

    private function style_tab() {
        /**
         * Image Style Settings
         */
        $this->start_controls_section(
            'image_style_section',
            [
                'label' => __( 'Image', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
            // Width
            $this->add_responsive_control(
                'image_width',
                [
                    'label' => __( 'Width', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'description' => 'Default: 100%',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 100,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Height
            $this->add_responsive_control(
                'image_height',
                [
                    'label'       => __( 'Height', 'astro-elementor-widgets-lite' ),
                    'type'        => Controls_Manager::SLIDER,
                    'size_units'  => [ 'px', '%' ],
                    'description' => 'Default        : 230px',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 230,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Padding
            $this->add_responsive_control(
                'image_padding',
                [
                    'label'      => __( 'Padding', 'astro-elementor-widgets-lite' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default' => [
                        'top'    => 0,
                        'right'  => 0,
                        'bottom' => 0,
                        'left'   => 0,
                    ]
                ]
            );

            // Border Type
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'image_border',
                    'label'    => __( 'Border', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .image',
                ]
            );

            // Border Radius
            $this->add_responsive_control(
                'image_border_radius',
                [
                    'label'      => __( 'Border Radius', 'astro-elementor-widgets-lite' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Box Shadow
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name'     => 'image_box_shadow',
                    'label'    => __( 'Box Shadow', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .image',
                ]
            );

            // Control Tabs
            $this->start_controls_tabs(
                'image_toggle_tabs'
            );
                // Normal State Tab
                $this->start_controls_tab(
                    'image_normal',
                    [
                        'label' => esc_html__( 'Normal', 'astro-elementor-widgets-lite')
                    ]
                );

                    // Opacity
                    $this->add_control(
                        'image_normal_opacity',
                        [
                            'label' => __( 'Opacity', 'astro-elementor-widgets-lite' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1,
                                    'step' => .1,
                                ]
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .aewlite-preview-card .image-card .image' => 'opacity: {{SIZE}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                // Hover State Tab
                $this->start_controls_tab(
                    'image_hover',
                    [
                        'label' => esc_html__( 'Hover', 'astro-elementor-widgets-lite')
                    ]
                );

                    // Opacity
                    $this->add_control(
                        'image_hover_opacity',
                        [
                            'label' => __( 'Opacity', 'astro-elementor-widgets-lite' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1,
                                    'step' => .1,
                                ]
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .aewlite-preview-card .image-card .image:hover' => 'opacity: {{SIZE}};',
                            ],
                        ]
                    );

                    // Transition Duration
                    $this->add_control(
                        'image_hover_transition',
                        [
                            'label' => __( 'Transition Duration', 'astro-elementor-widgets-lite' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => ['s'],
                            'range' => [
                                's' => [
                                    'min' => 0,
                                    'max' => 1,
                                    'step' => .1,
                                ]
                            ],
                            'default' => [
                                'unit' => 's',
                                'size' => .3,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .aewlite-preview-card .image-card .image' => 'transition: all {{SIZE}}{{UNIT}} ease-in-out;',
                            ],
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Content Style Settings
         */
        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __( 'Content', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // Padding
            $this->add_responsive_control(
                'content_padding',
                [
                    'label' => __( 'Padding', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top' => 30,
                        'left' => 30,
                        'bottom' => 30,
                        'right' => 30,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'description' => 'Default: 30px'
                ]
            );

            // Title Header
            $this->add_control(
                'content_title_header',
                [
                    'label' => __( 'Title', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            // Title Bottom Spacing
            $this->add_responsive_control(
                'content_title_bottom_spacing',
                [
                    'label' => __( 'Bottom Spacing', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 15,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                    'description' => 'Default: 15px'
                ]
            );

            // Title Color
            $this->add_control(
                'content_title_color',
                [
                    'label' => __( 'Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .title h2' => 'color: {{VALUE}}',
                    ],
                    'default' => '#111',
                ]
            );

            // Title Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'content_title_typography',
                    'label' => __( 'Typography', 'astro-elementor-widgets-lite' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .title h2',
                ]
            );

            // Description Header
            $this->add_control(
                'content_description_header',
                [
                    'label' => __( 'Description', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            // Description Bottom Spacing
            $this->add_responsive_control(
                'content_description_bottom_spacing',
                [
                    'label' => __( 'Bottom Spacing', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 15,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                    'description' => 'Default: 15px'
                ]
            );

            // Description Color
            $this->add_control(
                'content_description_color',
                [
                    'label' => __( 'Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .excerpt' => 'color: {{VALUE}}',
                    ],
                    'default' => '#707070',
                ]
            );

            // Description Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'content_description_typography',
                    'label' => __( 'Typography', 'astro-elementor-widgets-lite' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .excerpt',
                ]
            );

        $this->end_controls_section();

        /**
         * Divider Style Settings
         */
        $this->start_controls_section(
            'divider_style_section',
            [
                'label' => __( 'Divider', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // Width
            $this->add_control(
                'divider_width',
                [
                    'label' => __( 'Width', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 20,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .divider' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                    'description'=> 'Default: 20%',
                ]
            );

            // Height
            $this->add_control(
                'divider_height',
                [
                    'label' => __( 'Height', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 2,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .divider' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                    'description'=> 'Default: 2px',
                ]
            );

            // Bottom Spacing
            $this->add_control(
                'divider_bottom_spcaing',
                [
                    'label' => __( 'Bottom Spacing', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 15,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .divider' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                    'description'=> 'Default: 15px',
                ]
            );

            // Background Color
            $this->add_control(
                'divider_color',
                [
                    'label' => __( 'Background Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .divider' => 'background-color: {{VALUE}}',
                    ],
                    'default' => 'rgba( 0,0,0,0.05 )'
                ]
            );

        $this->end_controls_section();

        /**
         * Top Badge Style Settings
         */
        $this->start_controls_section(
            'top_badge_style_section',
            [
                'label' => __( 'Top Badge', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // Top Badge Header
            $this->add_control(
                'top_badge_header',
                [
                    'label' => __( 'Top Badge', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => '',
                ]
            );

            // Top Badge Offset Top
            $this->add_responsive_control(
                'top_badge_offset_top',
                [
                    'label' => __( 'Offset Top', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 15,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image .top-price-badge' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                    'description' => 'Default: 15px',
                ]
            );

            // Top Badge Offset Right
            $this->add_responsive_control(
                'top_badge_offset_right',
                [
                    'label' => __( 'Offset Right', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 30,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image .top-price-badge' => 'right: {{SIZE}}{{UNIT}};',
                    ],
                    'description' => 'Default: 30px',
                ]
            );

            // Padding
            $this->add_responsive_control(
                'top_badge_padding',
                [
                    'label' => __( 'Padding', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image .top-price-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default' => [
                        'top'    => 4,
                        'right'  => 12,
                        'bottom' => 4,
                        'left'   => 12,
                    ]
                ]
            );

            // Border Type
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'top_badge_border_type',
                    'label' => __( 'Border', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .image .top-price-badge',
                ]
            );

            // Border Radius
            $this->add_responsive_control(
                'top_badge_border_radius',
                [
                    'label' => __( 'Border Radius', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image .top-price-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default' => [
                        'top'    => 30,
                        'right'  => 30,
                        'bottom' => 30,
                        'left'   => 30,
                    ]
                ]
            );

            // Box Shadow
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'top_badge_box_shadow',
                    'label' => __( 'Box Shadow', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .image .top-price-badge',
                ]
            );

            // Background Color
            $this->add_control(
                'top_badge_background_color',
                [
                    'label' => __( 'Background Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image .top-price-badge' => 'background-color: {{VALUE}}',
                    ],
                    'default' => '#707070'
                ]
            );

            // Primary Text Color
            $this->add_control(
                'top_badge_text_color',
                [
                    'label'     => __( 'Primary Text Color', 'astro-elementor-widgets-lite' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image .top-price-badge' => 'color: {{VALUE}}',
                    ],
                    'default'   => '#fff'
                ]
            );

            // Primary Text Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'top_badge_primary_typography',
                    'label'    => __( 'Primary Text Typography', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .image .top-price-badge',
                ]
            );

            // Secondary Text Color
            $this->add_control(
                'top_badge_subtext_color',
                [
                    'label'     => __( 'Secondary Text Color', 'astro-elementor-widgets-lite' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image .top-price-badge del' => 'color: {{VALUE}}',
                    ],
                    'default'   => 'rgba( 255, 255, 255, 0.5 )'
                ]
            );

            // Secondary Text Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'top_badge_secondary_typography',
                    'label'    => __( 'Secondary Text Typography', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .image .top-price-badge del',
                ]
            );

        $this->end_controls_section();

        /**
         * Middle Badge Style Settings
         */
        $this->start_controls_section(
            'middle_badge_style_section',
            [
                'label' => __( 'Middle Badge', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // Middle Badge Header
            $this->add_control(
                'middle_badge_header',
                [
                    'label' => __( 'Middle Badge', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => '',
                ]
            );

            // Middle Badge Offset Right
            $this->add_responsive_control(
                'middle_badge_offset_right',
                [
                    'label' => __( 'Offset Right', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 30,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image .middle-price-badge' => 'right: {{SIZE}}{{UNIT}};',
                    ],
                    'description' => 'Default: 30px',
                ]
            );

            // Padding
            $this->add_responsive_control(
                'middle_badge_padding',
                [
                    'label' => __( 'Padding', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image .middle-price-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default' => [
                        'top'    => 4,
                        'right'  => 12,
                        'bottom' => 4,
                        'left'   => 12,
                    ]
                ]
            );

            // Border Type
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'middle_badge_border_type',
                    'label' => __( 'Border', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .image .middle-price-badge',
                ]
            );

            // Border Radius
            $this->add_responsive_control(
                'middle_badge_border_radius',
                [
                    'label' => __( 'Border Radius', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image .middle-price-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default' => [
                        'top'    => 30,
                        'right'  => 30,
                        'bottom' => 30,
                        'left'   => 30,
                    ]
                ]
            );

            // Box Shadow
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'middle_badge_box_shadow',
                    'label' => __( 'Box Shadow', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .image .middle-price-badge',
                ]
            );

            // Background Color
            $this->add_control(
                'middle_badge_background_color',
                [
                    'label' => __( 'Background Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image .middle-price-badge' => 'background-color: {{VALUE}}',
                    ],
                    'default' => '#562dd4'
                ]
            );

            // Primary Text Color
            $this->add_control(
                'middle_badge_text_color',
                [
                    'label' => __( 'Primary Text Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image .middle-price-badge' => 'color: {{VALUE}}',
                    ],
                    'default' => '#fff'
                ]
            );

            // Primary Text Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'middle_badge_primary_typography',
                    'label' => __( 'Primary Text Typography', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .image .middle-price-badge',
                ]
            );

            // Secondary Text Color
            $this->add_control(
                'middle_badge_subtext_color',
                [
                    'label' => __( 'Secondary Text Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .image .middle-price-badge del' => 'color: {{VALUE}}',
                    ],
                    'default' => '#fff'
                ]
            );

            // Secondary Text Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'middle_badge_secondary_typography',
                    'label' => __( 'Secondary Text Typography', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .image .middle-price-badge del',
                ]
            );

        $this->end_controls_section();

        /**
         * Bottom Badge Style Settings
         */
        $this->start_controls_section(
            'bottom_badge_style_section',
            [
                'label' => __( 'Bottom Badge', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // Bottom Badge Header
            $this->add_control(
                'bottom_badge_header',
                [
                    'label' => __( 'Bottom Badge', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => '',
                ]
            );

            // Padding
            $this->add_responsive_control(
                'bottom_badge_padding',
                [
                    'label' => __( 'Padding', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .readmore .bottom-price-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default' => [
                        'top'    => 4,
                        'right'  => 12,
                        'bottom' => 4,
                        'left'   => 12,
                    ]
                ]
            );

            // Border Type
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'bottom_badge_border_type',
                    'label' => __( 'Border', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .readmore .bottom-price-badge',
                ]
            );

            // Border Radius
            $this->add_responsive_control(
                'bottom_badge_border_radius',
                [
                    'label' => __( 'Border Radius', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .readmore .bottom-price-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default' => [
                        'top'    => 30,
                        'right'  => 30,
                        'bottom' => 30,
                        'left'   => 30,
                    ]
                ]
            );

            // Box Shadow
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'bottom_badge_box_shadow',
                    'label' => __( 'Box Shadow', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .readmore .bottom-price-badge',
                ]
            );

            // Background Color
            $this->add_control(
                'bottom_badge_background_color',
                [
                    'label' => __( 'Background Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .readmore .bottom-price-badge' => 'background-color: {{VALUE}}',
                    ],
                    'default' => '#562dd4'
                ]
            );

            // Primary Text Color
            $this->add_control(
                'bottom_badge_text_color',
                [
                    'label' => __( 'Primary Text Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .readmore .bottom-price-badge' => 'color: {{VALUE}}',
                    ],
                    'default' => '#fff'
                ]
            );

            // Primary Text Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'bottom_badge_primary_typography',
                    'label' => __( 'Primary Text Typography', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .readmore .bottom-price-badge',
                ]
            );

            // Secondary Text Color
            $this->add_control(
                'bottom_badge_subtext_color',
                [
                    'label' => __( 'Secondary Text Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .readmore .bottom-price-badge del' => 'color: {{VALUE}}',
                    ],
                    'default' => '#fff'
                ]
            );

            // Secondary Text Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'bottom_badge_secondary_typography',
                    'label' => __( 'Secondary Text Typography', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .readmore .bottom-price-badge del',
                ]
            );

        $this->end_controls_section();

        /**
         * Button Style Settings
         */
        $this->start_controls_section(
            'button_style_section',
            [
                'label' => __( 'Button', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // Padding
            $this->add_responsive_control(
                'padding',
                [
                    'label' => __( 'Padding', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top'    => 12,
                        'right'  => 25,
                        'bottom' => 12,
                        'left'   => 25,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .readmore a.button-readmore' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Border Type
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'button_border',
                    'label' => __( 'Border', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .readmore a.button-readmore',
                ]
            );

            // Border Radius
            $this->add_responsive_control(
                'button_border_radius',
                [
                    'label' => __( 'Border Radius', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top'    => 4,
                        'right'  => 4,
                        'bottom' => 4,
                        'left'   => 4,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-preview-card .image-card .readmore a.button-readmore' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_typography',
                    'label' => __( 'Typography', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-preview-card .image-card .readmore a.button-readmore',
                ]
            );

            // Button Toggle Tabs
            $this->start_controls_tabs(
                'button_style_toggle_tabs'
            );

                // Normal State
                $this->start_controls_tab(
                    'button_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'astro-elementor-widgets-lite' ),
                    ]
                );

                    // Text Color
                    $this->add_control(
                        'button_text_color_normal',
                        [
                            'label' => __( 'Text Color', 'astro-elementor-widgets-lite' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .aewlite-preview-card .image-card .readmore a.button-readmore' => 'color: {{VALUE}}',
                            ],
                            'default' => '#fff',
                        ]
                    );

                    // Background Color
                    $this->add_control(
                        'button_background_color_normal',
                        [
                            'label' => __( 'Background Color', 'astro-elementor-widgets-lite' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .aewlite-preview-card .image-card .readmore a.button-readmore' => 'background-color: {{VALUE}}',
                            ],
                            'default' => '#562dd4',
                        ]
                    );

                $this->end_controls_tab();

                // Hover State
                $this->start_controls_tab(
                    'button_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'astro-elementor-widgets-lite' ),
                    ]
                );

                    // Text Color
                    $this->add_control(
                        'button_text_color_hover',
                        [
                            'label' => __( 'Text Color', 'astro-elementor-widgets-lite' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .aewlite-preview-card .image-card .readmore a.button-readmore:hover' => 'color: {{VALUE}}',
                            ],
                            'default' => '#fff',
                        ]
                    );

                    // Background Color
                    $this->add_control(
                        'button_background_color_hover',
                        [
                            'label' => __( 'Background Color', 'astro-elementor-widgets-lite' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .aewlite-preview-card .image-card .readmore a.button-readmore:hover' => 'background-color: {{VALUE}}',
                            ],
                            'default' => '#707070'
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings           = $this->get_settings_for_display();
        $target             = $settings[ 'link' ][ 'is_external' ] ? ' target="_blank"' : '';
		$nofollow           = $settings[ 'link' ][ 'nofollow' ] ? ' rel="nofollow"' : '';
        $image_target       = $settings[ 'image_link' ][ 'is_external' ] ? ' target="_blank"' : '';
		$image_nofollow     = $settings[ 'image_link' ][ 'nofollow' ] ? ' rel="nofollow"' : '';

        ?>
        <div class="aewlite-widgets aewlite-preview-card">
            <div class="image-card">
                <div class="image-wrapper">
                    <div class="image" style="background-image: url(<?php echo esc_url( $settings[ 'image' ][ 'url' ] ); ?>);">
                        <?php if( 'yes' == $settings[ 'show_image_link' ] ) : ?><a href="<?php echo esc_url( $settings[ 'image_link' ][ 'url' ] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?>></a><?php endif; ?>
                        <?php if( 'yes' === $settings[ 'show_top_badge' ] ) : ?>
                            <span class="top-price-badge">
                                <?php if( ! empty( $settings[ 'top_badge_subtext' ] ) ) : ?>
                                    <del><?php echo $settings[ 'top_badge_subtext' ]; ?></del>
                                <?php endif; ?>
                                <?php echo $settings[ 'top_badge_text' ]; ?>
                            </span>
                        <?php endif; ?>
                        <?php if( 'yes' === $settings[ 'show_middle_badge' ] ) : ?>
                            <span class="middle-price-badge">
                                <?php if( ! empty( $settings[ 'middle_badge_subtext' ] ) ) : ?>
                                    <del><?php echo $settings[ 'middle_badge_subtext' ]; ?></del>
                                <?php endif; ?>
                                <?php echo $settings[ 'middle_badge_text' ]; ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="content">
                    <div class="title">
                        <h2><?php echo $settings[ 'card_title' ]; ?></h2>
                    </div>
                    <?php if( 'yes' === $settings[ 'show_divider' ] ) : ?>
                        <div class="divider"></div>
                    <?php endif; ?>
                    <div class="excerpt">
                        <?php echo $settings[ 'card_description' ]; ?>
                    </div>
                    <div class="readmore">
                        <a href="<?php echo esc_url( $settings[ 'link' ][ 'url' ] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="button button-readmore"><?php echo $settings[ 'link_text' ]; ?></a>

                        <?php if( 'yes' === $settings[ 'show_bottom_badge' ] ) : ?>
                            <span class="bottom-price-badge">
                                <?php if( ! empty( $settings[ 'bottom_badge_subtext' ] ) ) : ?>
                                    <del><?php echo $settings[ 'bottom_badge_subtext' ]; ?></del>
                                <?php endif; ?>
                                <?php echo $settings[ 'bottom_badge_text' ]; ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    protected function _content_template() {
        ?>
        <#
            var target          = settings.link.is_external ? ' target="_blank"' : '';
            var nofollow        = settings.link.nofollow ? ' rel="nofollow"' : '';
            var image_target    = settings.image_link.is_external ? ' target="_blank"' : '';
		    var image_nofollow  = settings.image_link.nofollow ? ' rel="nofollow"' : '';
        #>
        <!-- For Live Preview -->
        <div class="aewlite-widgets aewlite-preview-card">
            <div class="image-card">
                <div class="image" style="background-image: url({{ settings.image.url }});">
                    <# if( 'yes' === settings.show_image_link )  { #>
                        <a href="{{ settings.image_link.url }}" {{ image_target }} {{ image_nofollow }}></a>
                    <# } #>
                    <# if( 'yes' === settings.show_top_badge )  { #>
                        <span class="top-price-badge">
                            <# if( '' !== settings.top_badge_subtext ) { #>
                                <del>{{{ settings.top_badge_subtext }}}</del>
                            <# } #>
                            {{{ settings.top_badge_text }}}
                        </span>
                    <# } #>
                    <# if( 'yes' === settings.show_middle_badge )  { #>
                        <span class="middle-price-badge">
                            <# if( '' !== settings.middle_badge_subtext ) { #>
                                <del>{{{ settings.middle_badge_subtext }}}</del>
                            <# } #>
                            {{{ settings.middle_badge_text }}}
                        </span>
                    <# } #>
                </div>
                <div class="content">
                    <div class="title">
                        <h2>{{{ settings.card_title }}}</h2>
                    </div>
                    <# if( 'yes' === settings.show_divider )  { #>
                    <div class="divider"></div>
                    <# } #>
                    <div class="excerpt">
                        {{{ settings.card_description }}}
                    </div>
                    <div class="readmore">
                        <a href="{{ settings.link.url }}" {{ target }} {{ nofollow }} class="button button-readmore">{{{ settings.link_text }}}</a>
                        <# if( 'yes' === settings.show_bottom_badge )  { #>
                            <span class="bottom-price-badge">
                                <# if( '' !== settings.bottom_badge_subtext ) { #>
                                    <del>{{{ settings.bottom_badge_subtext }}}</del>
                                <# } #>
                                {{{ settings.bottom_badge_text }}}
                            </span>
                        <# } #>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

}
Plugin::instance()->widgets_manager->register_widget_type( new AEWLITE_Preview_Card_Widget() );