<?php
namespace Elementor;

class AEWLITE_Pricing_Table_Widget extends Widget_Base {

    public function get_name() {
        return  'aewlite-pricing-table-widget-id';
    }

    public function get_title() {
        return esc_html__( 'Pricing Table', 'astro-elementor-widgets-lite' );
    }

    public function get_script_depends() {
        return [
            'aewlite-script'
        ];
    }

    public function get_icon() {
        return 'fa fa-money';
    }

    public function get_categories() {
        return [ 'aewlite-for-elementor' ];
    }

    public function _register_controls() {
        /**
         * Header Settings
         */
        $this->start_controls_section(
            'header_section',
            [
                'label' => __( 'Header', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
            // Title
            $this->add_control(
                'header_title',
                [
                    'label'       => __( 'Title', 'astro-elementor-widgets-lite' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => __( 'Default title', 'astro-elementor-widgets-lite' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your title here', 'astro-elementor-widgets-lite' ),
                ]
            );

            // Description
            $this->add_control(
                'title_description',
                [
                    'label'       => __( 'Description', 'astro-elementor-widgets-lite' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                    'default'     => __( 'Default description', 'astro-elementor-widgets-lite' ),
                    'placeholder' => __( 'Type your description here', 'astro-elementor-widgets-lite' ),
                ]
            );
        $this->end_controls_section();
            
        /**
        * Pricing Settings
        */
        $this->start_controls_section(
            'pricing_section',
            [
                'label' => __( 'Pricing', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
            // currency
            $this->add_control(
                'pricing_currency',
                [
                    'label'       => __( 'Currency', 'astro-elementor-widgets-lite' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                    'default'     => __( '$', 'astro-elementor-widgets-lite' ),
                    'placeholder' => __( 'Type your currency here', 'astro-elementor-widgets-lite' ),
                ]
            ); 
            // price
            $this->add_control(
                'pricing_value',
                [
                    'label'       => __( 'Price', 'astro-elementor-widgets-lite' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                    'default'     => __( '100', 'astro-elementor-widgets-lite' ),
                    'placeholder' => __( 'Type your price here', 'astro-elementor-widgets-lite' ),
                ]
            );
            // Duration
            $this->add_control(
                'duration',
                [
                    'label'       => __( 'Duration', 'astro-elementor-widgets-lite' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                    'default'     => __( 'year', 'astro-elementor-widgets-lite' ),
                    'placeholder' => __( 'Type your duration here', 'astro-elementor-widgets-lite' ),
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
                    'default'     => __( 'Popular!', 'astro-elementor-widgets-lite' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your primary text here', 'astro-elementor-widgets-lite' ),
                    'condition'   => [
                        'show_top_badge' => 'yes'
                    ]
                ]
            );
        $this->end_controls_section();

        /**
        * Listing Settings
        */
        $this->start_controls_section(
            'listing_section',
            [
                'label' => __( 'Listing', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
            $repeater = new \Elementor\Repeater();
            // List Text
            $repeater->add_control(
                'list_text', [
                    'label' => __( 'Title', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'List Title' , 'astro-elementor-widgets-lite' ),
                    'label_block' => true,
                ]
            );
            // List icon
            $repeater->add_control(
                'list_icon', [
                    'label' => __( 'Icon', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::ICON,
                    'default' => __( 'List Content' , 'astro-elementor-widgets-lite' ),
                    'label_block' => true,
                ]
            );
            // Repeater
            $this->add_control(
                'list',
                [
                    'label' => __( 'Repeater List', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'list_text' => __( 'List Text #1', 'astro-elementor-widgets-lite' ),
                            'list_icon' => __( 'fa fa-cehck', 'astro-elementor-widgets-lite' ),
                        ],
                        [
                            'list_text' => __( 'List Text #2', 'astro-elementor-widgets-lite' ),
                            'list_icon' => __( 'fa fa-cehck', 'astro-elementor-widgets-lite' ),
                        ],
                    ],
                    'title_field' => '{{{ list_text }}}',
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
                    'default'     => __( 'Get This Plan', 'astro-elementor-widgets-lite' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your link text here', 'astro-elementor-widgets-lite' ),
                ]
            );

            $this->end_controls_section();


        // Style Tab
        $this->style_tab();
    }

    private function style_tab() {

        /**
         * Header Style Settings
         */
        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __( 'Header', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // Main Padding
            $this->add_responsive_control(
                'main_padding',
                [
                    'label' => __( 'Padding', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top'    => 0,
                        'right'  => 0,
                        'bottom' => 0,
                        'left'   => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            // Header Background Color
            $this->add_control(
                'header_background_color',
                [
                    'label' => __( 'Background Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header' => 'background-color: {{VALUE}}',
                    ],
                    'default' => '#fff'
                ]
            );
            // Header Title 
            $this->add_control(
                'content_title_header',
                [
                    'label' => __( 'Title', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            // Title Top Spacing
            $this->add_responsive_control(
                'content_title_top_spacing',
                [
                    'label' => __( 'Top Spacing', 'astro-elementor-widgets-lite' ),
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
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .header-title' => 'margin-top: {{SIZE}}{{UNIT}};',
                    ],
                    'description' => 'Default: 15px'
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
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .header-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .header-title' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .header-title ',
                ]
            );
            // Title Text Align ( Choose Control )
            $this->add_control(
                'title_text_align',
                [
                    'label' => __( 'Alignment', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'plugin-domain' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'plugin-domain' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'plugin-domain' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .header-title' => 'text-align: {{VALUE}}',
                    ],
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
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .header-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .header-subtitle' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .header-subtitle',
                ]
            );
            // Description Text Align
            $this->add_control(
                'description_text_align',
                [
                    'label' => __( 'Alignment', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'plugin-domain' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'plugin-domain' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'plugin-domain' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .header-subtitle' => 'text-align: {{VALUE}}',
                    ],
                ]
            );
        $this->end_controls_section();

        /**
         * Pricing Style Settings
         */
        $this->start_controls_section(
            'price_style_section',
            [
                'label' => __( 'Pricing', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
            // Padding
            $this->add_responsive_control(
                'pricing_padding',
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
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            // Margin
            $this->add_control(
                'pricing_margin',
                [
                    'label' => __( 'Margin', 'plugin-domain' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top'    => 0,
                        'right'  => 0,
                        'bottom' => 0,
                        'left'   => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            // Background Color
            $this->add_control(
                'pricing_background_color',
                [
                    'label' => __( 'Background Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-price' => 'background-color: {{VALUE}}',
                    ],
                    'default' => '#f9f9f9'
                ]
            );
            //Text Align ( Choose Control )
            $this->add_control(
                'pricing_text_align',
                [
                    'label' => __( 'Alignment', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'plugin-domain' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'plugin-domain' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'flex-end' => [
                            'title' => __( 'Right', 'plugin-domain' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-price' => 'justify-content: {{VALUE}}',
                    ],
                ]
            );
            // Pricing Value Header
            $this->add_control(
                'pricing_value_header',
                [
                    'label' => __( 'Pricing', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            // Pricing Value  Color
            $this->add_control(
                'pricing_value_color',
                [
                    'label' => __( 'Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-price .price' => 'color: {{VALUE}}',
                    ],
                ]
            );
            // Pricing Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'pricing_value_typography',
                    'label' => __( 'Typography', 'astro-elementor-widgets-lite' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    'selector' => '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-price .price',
                ]
            );
            // Pricing divider Header
            $this->add_control(
                'pricing_divider_header',
                [
                    'label' => __( 'Divider', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            // Pricing divider  Color
            $this->add_control(
                'pricing_divider_color',
                [
                    'label' => __( 'Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-price .price-divider' => 'color: {{VALUE}}',
                    ],
                ]
            );
            // Pricing divider Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'pricing_divider_typography',
                    'label' => __( 'Typography', 'astro-elementor-widgets-lite' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    'selector' => '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-price .price-divider',
                ]
            );
            // Pricing duration Header
            $this->add_control(
                'pricing_duration_header',
                [
                    'label' => __( 'Duration', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            // Pricing duration  Color
            $this->add_control(
                'pricing_duration_color',
                [
                    'label' => __( 'Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-price .price-duration' => 'color: {{VALUE}}',
                    ],
                ]
            );
            // Pricing duration Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'pricing_duration_typography',
                    'label' => __( 'Typography', 'astro-elementor-widgets-lite' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                    'selector' => '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-price .price-duration',
                ]
            );

        $this->end_controls_section();

        /**
         * Badge Style Settings
         */
        $this->start_controls_section(
            'top_badge_style_section',
            [
                'label' => __( 'Badge', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
            // Top Badge Header
            $this->add_control(
                'top_badge_header',
                [
                    'label' => __( 'Badge', 'astro-elementor-widgets-lite' ),
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
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .popular' => 'top: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .popular' => 'right: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .popular' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'selector' => '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .popular',
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
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .popular' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'selector' => '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .popular',
                ]
            );
            // Background Color
            $this->add_control(
                'top_badge_background_color',
                [
                    'label' => __( 'Background Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .popular' => 'background-color: {{VALUE}}',
                    ],
                    'default' => 'royalblue',
                ]
            );
            // Text Color
            $this->add_control(
                'top_badge_text_color',
                [
                    'label'     => __( 'Text Color', 'astro-elementor-widgets-lite' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .popular' => 'color: {{VALUE}}',
                    ],
                    'default' => '#fff',
                ]
            );
            // Text Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'top_badge_primary_typography',
                    'label'    => __( 'Text Typography', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-header .popular',
                ]
            );
        $this->end_controls_section();

        /**
         * Listing Style Settings
         */
        $this->start_controls_section(
            'listing_style_section',
            [
                'label' => __( 'Listing', 'astro-elementor-widgets-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
            // Padding
            $this->add_responsive_control(
                'listing_padding',
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
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-feature' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            // Margin
            $this->add_control(
                'listing_margin',
                [
                    'label' => __( 'Margin', 'plugin-domain' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top'    => 0,
                        'right'  => 0,
                        'bottom' => 0,
                        'left'   => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-feature' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            // Background Color
            $this->add_control(
                'listing_background_color',
                [
                    'label' => __( 'Background Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-feature' => 'background-color: {{VALUE}}',
                    ],
                    'default' => '#fff'
                ]
            );
            // Text Color
            $this->add_control(
                'listing_text_color',
                [
                    'label'     => __( 'Text Color', 'astro-elementor-widgets-lite' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-feature' => 'color: {{VALUE}}',
                    ],
                    'default'   => '#707070'
                ]
            );
            // Text Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'listing_text_typography',
                    'label'    => __( 'Text Typography', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-feature div',
                ]
            );
            //Text Align
            $this->add_control(
                'listing_text_align',
                [
                    'label' => __( 'Alignment', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'plugin-domain' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'plugin-domain' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'plugin-domain' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-feature' => 'text-align: {{VALUE}}',
                    ],
                ]
            );
            // Border Type
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'some_border',
                    'label' => __( 'Some Border', 'elementor' ),
                    'fields_options' => [
                        'border' => [
                            'default' => 'solid',
                        ],
                        'width' => [
                            'default' => [
                                'top'      => '0',
                                'right'    => '0',
                                'bottom'   => '1',
                                'left'     => '0',
                                'isLinked' =>  false,
                            ],
                        ],
                        'color' => [
                           'default' => '#F4F3F3',
                        ],
                    ],
                    'selector' => '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-feature div',
                ]
            );
            // Border Radius
            $this->add_responsive_control(
                'listing_border_radius',
                [
                    'label' => __( 'Border Radius', 'astro-elementor-widgets-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-feature div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default' => [
                        'top'    => 0,
                        'right'  => 0,
                        'bottom' => 0,
                        'left'   => 0,
                    ]
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
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-action a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            // Border Type
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'button_border',
                    'label' => __( 'Border', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-action a',
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
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-action a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            // Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_typography',
                    'label' => __( 'Typography', 'astro-elementor-widgets-lite' ),
                    'selector' => '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-action a',
                ]
            );
            //Align
            $this->add_control(
                'button_postion_align',
                [
                    'label' => __( 'Alignment', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'plugin-domain' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'plugin-domain' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'plugin-domain' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-action' => 'text-align: {{VALUE}}',
                    ],
                ]
            );
            // Background Color
            $this->add_control(
                'button_background_color',
                [
                    'label' => __( 'Background Color', 'astro-elementor-widgets-lite' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-action' => 'background-color: {{VALUE}}',
                    ],
                    'default' => '#fff'
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
                                '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-action a' => 'color: {{VALUE}}',
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
                                '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-action a' => 'background-color: {{VALUE}}',
                            ],
                            'default' => '#707070',
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
                                '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-action a:hover' => 'color: {{VALUE}}',
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
                                '{{WRAPPER}} .aewlite-pricing-table .pricing-table .pricing-table-action a:hover' => 'background-color: {{VALUE}}',
                            ],
                            'default' => '#562dd4'
                        ]
                    );
                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() { 
        $settings      = $this->get_settings_for_display();
        $target             = $settings[ 'link' ][ 'is_external' ] ? ' target="_blank"' : '';
		$nofollow           = $settings[ 'link' ][ 'nofollow' ] ? ' rel="nofollow"' : '';
        ?>
        <div class="aewlite-widgets aewlite-pricing-table">
            <div class="pricing-table">
                <div class="pricing-table-header">
                    <?php if( 'yes' === $settings[ 'show_top_badge' ] ) : ?>
                        <span class="popular"><?php echo $settings[ 'top_badge_text' ]; ?></span>
                    <?php endif; ?>
                    <h2 class="header-title"><?php echo  $settings[ 'header_title' ]; ?></h2>
                    <h2 class="header-subtitle"><?php echo $settings[ 'title_description' ]; ?></h2>
                </div>
                <div class="pricing-table-price">
                    <div class="price"><?php echo $settings[ 'pricing_currency' ]; ?><?php echo $settings[ 'pricing_value' ]; ?></div>
                    <div class="price-divider">/</div>
                    <div class="price-duration"><?php echo $settings[ 'duration' ]; ?></div>
                </div>
                <div class="pricing-table-feature">
                    <?php foreach (  $settings['list'] as $item )  : ?>
                        <div class="listing-element"><i class="<?php echo $item['list_icon']; ?>"></i> <?php echo $item['list_text']; ?></div>
                    <?php endforeach; ?>
                </div>
                <div class="pricing-table-action">
                    <a href="<?php echo esc_url( $settings[ 'link' ][ 'url' ] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="button button-pricing-action"><?php echo $settings[ 'link_text' ]; ?></a>
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
        #>
        <div class="aewlite-widgets aewlite-pricing-table">
            <div class="pricing-table">
                <div class="pricing-table-header">
                     <# if( 'yes' === settings.show_top_badge )  { #>
                        <span class="popular">{{{ settings.top_badge_text }}}</span>
                     <# } #>
                    <h2 class="header-title">{{{ settings.header_title  }}}</h2>
                    <h2 class="header-subtitle">{{{ settings.title_description  }}}</h2>
                </div>
                <div class="pricing-table-price">
                    <div class="price">{{{ settings.pricing_currency }}} {{{ settings.pricing_value }}}</div>
                    <div class="price-divider">/</div>
                    <div class="price-duration">{{{ settings.duration }}}</div>
                </div>
                <div class="pricing-table-feature">
                    <#
                        _.each( settings.list, function( item ) { #>
                        <div class="listing-element"><i class="{{{ item.list_icon }}}"></i> {{ item.list_text }}</div>
                     <# } ) #>
                </div>
                <div class="pricing-table-action">
                    <a href="{{{ settings.link.url }}}" {{ target }} {{ nofollow }} class="button button-pricing-action">{{{ settings.link_text }}}</a>
                </div>
            </div>
        </div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new AEWLITE_Pricing_Table_Widget() );