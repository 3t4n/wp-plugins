<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Advanced_Counter_Widget extends Widget_Base {

    public function get_name() {
        return 'advanced-counter';
    }

    public function get_title() {
        return 'Advanced Counter';
    }

    public function get_icon() {
        return 'eicon-counter';
    }

    public function get_categories() {
        return [ 'advamentor' ];
    }

    // Registering Controls
    protected function _register_controls() {

        $this->start_controls_section( 'advanced_counter_global_content_controls',
            [
                'label'             => __( 'Content', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('advanced_counter_global_title_control',
            [
                'label' => __( 'Title', 'advamentor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your title here', 'advamentor' ),
                'default' => 'Advanced Counter',
            ]
        );

        $this->add_control( 'advanced_counter_global_start_control',
            [
                'label'             => __( 'Start', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => 0,
            ]
        );

        $this->add_control( 'advanced_counter_global_end_control',
            [
                'label'             => __( 'End', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => 99,
            ]
        );

        $this->add_control( 'advanced_counter_global_decimals_control',
            [
                'label'             => __( 'Decimals', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => 0,
            ]
        );

        $this->add_control( 'advanced_counter_global_duration_control',
            [
                'label'             => __( 'Duration (in Seconds)', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => 2,
            ]
        );

        $this->add_control( 'advanced_counter_global_use_easing_control',
            [
                'label' => __( 'Use Easing', 'advamentor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advamentor' ),
                'label_off' => __( 'No', 'advamentor' ),
                'return_value' => 'true',
                'default' => 'false',
            ]
        );

        $this->add_control( 'advanced_counter_global_use_grouping_control',
            [
                'label' => __( 'Use Grouping', 'advamentor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advamentor' ),
                'label_off' => __( 'No', 'advamentor' ),
                'return_value' => 'true',
                'default' => 'false',
            ]
        );

        $this->add_control('advanced_counter_global_separator_control',
            [
                'label' => __( 'Separator', 'advamentor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( ',', 'advamentor' ),
                'default' => ',',
            ]
        );

        $this->add_control('advanced_counter_global_prefix_control',
            [
                'label' => __( 'Prefix', 'advamentor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter prefix here', 'advamentor' ),
                'default' => '',
            ]
        );

        $this->add_control('advanced_counter_global_suffix_control',
            [
                'label' => __( 'Suffix', 'advamentor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter suffix here', 'advamentor' ),
                'default' => '',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section( 'advanced_counter_global_presets_controls',
            [
                'label'             => __( 'Presets', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control( 'advanced_counter_global_presets_control',
            [
                'label' => __( 'Presets', 'advamentor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'flat'  => __( 'Flat', 'advamentor' ),
                    'minimal'  => __( 'Minimal', 'advamentor' ),
                    'square'  => __( 'Square', 'advamentor' ),
                ],
                'default' => 'flat',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section( 'advanced_counter_global_title_controls',
            [
                'label'             => __( 'Title', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'              => 'advanced_counter_flat_title_typography_control',
                'label'             => __( 'Title Typography', 'advamentor' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_1,
                'selector'          => '{{WRAPPER}} .counter-title',
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'flat'
                ],
                'fields_options' => [
                    'font_weight' => [
                        'default' => '600',
                    ],
                    'font_family' => [
                        'default' => 'Poppins',
                    ],
                    'font_size'   => [
                        'default' => [
                            'unit' => 'px',
                            'size' => 18
                        ]
                    ],
                ],
            ]
        );

        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'              => 'advanced_counter_minimal_title_typography_control',
                'label'             => __( 'Title Typography', 'advamentor' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_1,
                'selector'          => '{{WRAPPER}} .counter-title',
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'minimal'
                ],
                'fields_options' => [
                    'font_weight' => [
                        'default' => '200',
                    ],
                    'font_family' => [
                        'default' => 'Poppins',
                    ],
                    'font_size'   => [
                        'default' => [
                            'unit' => 'px',
                            'size' => 14
                        ]
                    ],
                ],
            ]
        );

        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'              => 'advanced_counter_square_title_typography_control',
                'label'             => __( 'Title Typography', 'advamentor' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_1,
                'selector'          => '{{WRAPPER}} .counter-title',
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'square'
                ],
                'fields_options' => [
                    'font_weight' => [
                        'default' => '600',
                    ],
                    'font_family' => [
                        'default' => 'Poppins',
                    ],
                    'font_size'   => [
                        'default' => [
                            'unit' => 'px',
                            'size' => 16
                        ]
                    ],
                ],
            ]
        );

        $this->add_control( 'advanced_counter_flat_title_color_control',
            [
                'label' => __( 'Title Color', 'advamentor' ),
                'type' => Controls_Manager::COLOR,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'flat'
                ],
                'default' => '#0B68C6',
                'selectors' => [
                    '{{WRAPPER}} .counter-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control( 'advanced_counter_minimal_title_color_control',
            [
                'label' => __( 'Title Color', 'advamentor' ),
                'type' => Controls_Manager::COLOR,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'minimal'
                ],
                'default' => '#808080',
                'selectors' => [
                    '{{WRAPPER}} .counter-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control( 'advanced_counter_square_title_color_control',
            [
                'label' => __( 'Title Color', 'advamentor' ),
                'type' => Controls_Manager::COLOR,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'square'
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .counter-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control('advanced_counter_flat_title_alignment_control',
            [
                'label' => __( 'Title Alignment', 'advamentor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'advamentor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'advamentor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'advamentor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'flat'
                ]
            ]
        );

        $this->add_control('advanced_counter_minimal_title_alignment_control',
            [
                'label' => __( 'Title Alignment', 'advamentor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'advamentor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'advamentor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'advamentor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'minimal'
                ]
            ]
        );

        $this->add_control('advanced_counter_square_title_alignment_control',
            [
                'label' => __( 'Title Alignment', 'advamentor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'advamentor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'advamentor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'advamentor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'square'
                ]
            ]
        );

        $this->add_control('advanced_counter_flat_title_position_control',
            [
                'label' => __( 'Title Position', 'advamentor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'advamentor' ),
                        'icon' => 'fa fa-chevron-left',
                    ],
                    'top' => [
                        'title' => __( 'Top', 'advamentor' ),
                        'icon' => 'fa fa-chevron-up',
                    ],
                    'bottom' => [
                        'title' => __( 'Bottom', 'advamentor' ),
                        'icon' => 'fa fa-chevron-down',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'advamentor' ),
                        'icon' => 'fa fa-chevron-right',
                    ],
                ],
                'default' => 'bottom',
                'toggle' => true,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'flat'
                ]
            ]
        );

        $this->add_control('advanced_counter_minimal_title_position_control',
            [
                'label' => __( 'Title Position', 'advamentor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'advamentor' ),
                        'icon' => 'fa fa-chevron-left',
                    ],
                    'top' => [
                        'title' => __( 'Top', 'advamentor' ),
                        'icon' => 'fa fa-chevron-up',
                    ],
                    'bottom' => [
                        'title' => __( 'Bottom', 'advamentor' ),
                        'icon' => 'fa fa-chevron-down',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'advamentor' ),
                        'icon' => 'fa fa-chevron-right',
                    ],
                ],
                'default' => 'right',
                'toggle' => true,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'minimal'
                ]
            ]
        );

        $this->add_control('advanced_counter_square_title_position_control',
            [
                'label' => __( 'Title Position', 'advamentor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'advamentor' ),
                        'icon' => 'fa fa-chevron-left',
                    ],
                    'top' => [
                        'title' => __( 'Top', 'advamentor' ),
                        'icon' => 'fa fa-chevron-up',
                    ],
                    'bottom' => [
                        'title' => __( 'Bottom', 'advamentor' ),
                        'icon' => 'fa fa-chevron-down',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'advamentor' ),
                        'icon' => 'fa fa-chevron-right',
                    ],
                ],
                'default' => 'bottom',
                'toggle' => true,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'square'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section( 'advanced_counter_global_counter_controls',
            [
                'label'             => __( 'Counter', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'              => 'advanced_counter_flat_counter_typography_control',
                'label'             => __( 'Counter Typography', 'advamentor' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_1,
                'selector'          => '{{WRAPPER}} .counter-numerals',
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'flat'
                ],
                'fields_options' => [
                    'font_weight' => [
                        'default' => '600',
                    ],
                    'font_family' => [
                        'default' => 'Poppins',
                    ],
                    'font_size'   => [
                        'default' => [
                            'unit' => 'px',
                            'size' => 36,
                        ]
                    ],
                    'line_height' => [
                        'default' => [
                            'unit' => 'em',
                            'size' => 1,
                        ]
                    ]
                ],
            ]
        );

        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'              => 'advanced_counter_minimal_counter_typography_control',
                'label'             => __( 'Counter Typography', 'advamentor' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_1,
                'selector'          => '{{WRAPPER}} .counter-numerals',
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'minimal'
                ],
                'fields_options' => [
                    'font_weight' => [
                        'default' => '300',
                    ],
                    'font_family' => [
                        'default' => 'Poppins',
                    ],
                    'font_size'   => [
                        'default' => [
                            'unit' => 'px',
                            'size' => 48,
                        ]
                    ],
                    'line_height' => [
                        'default' => [
                            'unit' => 'em',
                            'size' => 1,
                        ]
                    ]
                ],
            ]
        );

        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'              => 'advanced_counter_square_counter_typography_control',
                'label'             => __( 'Counter Typography', 'advamentor' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_1,
                'selector'          => '{{WRAPPER}} .counter-numerals',
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'square'
                ],
                'fields_options' => [
                    'font_weight' => [
                        'default' => '600',
                    ],
                    'font_family' => [
                        'default' => 'Poppins',
                    ],
                    'font_size'   => [
                        'default' => [
                            'unit' => 'px',
                            'size' => 36,
                        ]
                    ],
                    'line_height' => [
                        'default' => [
                            'unit' => 'em',
                            'size' => 1,
                        ]
                    ]
                ],
            ]
        );

        $this->add_control( 'advanced_counter_flat_counter_color_control',
            [
                'label' => __( 'Counter Color', 'advamentor' ),
                'type' => Controls_Manager::COLOR,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'flat'
                ],
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .counter-numerals' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control( 'advanced_counter_minimal_counter_color_control',
            [
                'label' => __( 'Counter Color', 'advamentor' ),
                'type' => Controls_Manager::COLOR,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'minimal'
                ],
                'default' => '#202020',
                'selectors' => [
                    '{{WRAPPER}} .counter-numerals' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control( 'advanced_counter_square_counter_color_control',
            [
                'label' => __( 'Counter Color', 'advamentor' ),
                'type' => Controls_Manager::COLOR,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'square'
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .counter-numerals' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control('advanced_counter_flat_counter_alignment_control',
            [
                'label' => __( 'Counter Alignment', 'advamentor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'advamentor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'advamentor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'advamentor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'flat'
                ]
            ]
        );

        $this->add_control('advanced_counter_minimal_counter_alignment_control',
            [
                'label' => __( 'Counter Alignment', 'advamentor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'advamentor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'advamentor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'advamentor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'minimal'
                ]
            ]
        );

        $this->add_control('advanced_counter_square_counter_alignment_control',
            [
                'label' => __( 'Counter Alignment', 'advamentor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'advamentor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'advamentor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'advamentor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'square'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section( 'advanced_counter_global_background_controls',
            [
                'label'             => __( 'Background', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control( 'advanced_counter_flat_background_color_control',
            [
                'label' => __( 'Background Color', 'advamentor' ),
                'type' => Controls_Manager::COLOR,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'flat'
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}}' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control( 'advanced_counter_minimal_background_color_control',
            [
                'label' => __( 'Background Color', 'advamentor' ),
                'type' => Controls_Manager::COLOR,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'minimal'
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}}' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control( 'advanced_counter_square_background_color_control',
            [
                'label' => __( 'Background Color', 'advamentor' ),
                'type' => Controls_Manager::COLOR,
                'condition'         => [
                        'advanced_counter_global_presets_control'   => 'square'
                ],
                'default' => '#2B2B2B',
                'selectors' => [
                    '{{WRAPPER}}' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $elementid  = $this->get_id();

    ?>
        <script type="text/javascript">

            jQuery( function() {

                var options = {
                    useEasing: <?php echo $settings['advanced_counter_global_use_easing_control'] ? $settings['advanced_counter_global_use_easing_control'] : 'false'; ?>,
                    useGrouping: <?php echo $settings['advanced_counter_global_use_grouping_control'] ? $settings['advanced_counter_global_use_grouping_control'] : 'false'; ?>,
                    separator: '<?php echo $settings['advanced_counter_global_separator_control']; ?>',
                    prefix: '<?php echo $settings['advanced_counter_global_prefix_control']; ?>',
                    suffix: '<?php echo $settings['advanced_counter_global_suffix_control']; ?>',
                };

                var counter = new CountUp( 'advanced-counter-<?php echo $elementid; ?>', <?php echo $settings['advanced_counter_global_start_control']; ?>, <?php echo $settings['advanced_counter_global_end_control']; ?>, <?php echo $settings['advanced_counter_global_decimals_control']; ?>, <?php echo $settings['advanced_counter_global_duration_control']; ?>, options );
                counter.start();

            } );

        </script>
        <div class="advanced-counter advanced-counter-style-<?php echo $settings['advanced_counter_global_presets_control']; ?>">
            <?php
                if ( $settings['advanced_counter_' . $settings['advanced_counter_global_presets_control'] . '_title_position_control'] == 'top' || $settings['advanced_counter_' . $settings['advanced_counter_global_presets_control'] . '_title_position_control'] == 'left' ) {
            ?>
                <div class="counter-title" style="text-align: <?php echo $settings['advanced_counter_' . $settings['advanced_counter_global_presets_control'] . '_title_alignment_control']; ?>; <?php echo $settings['advanced_counter_' . $settings['advanced_counter_global_presets_control'] . '_title_position_control'] == 'left' ? 'display: inline-block;' : NULL; ?>"><?php echo $settings['advanced_counter_global_title_control']; ?></div>
            <?php
                }
            ?>
            <div id="advanced-counter-<?php echo $elementid; ?>" class="counter-numerals" style="<?php echo ( ( $settings['advanced_counter_' . $settings['advanced_counter_global_presets_control'] . '_title_position_control'] == 'top' ) || ( $settings['advanced_counter_' . $settings['advanced_counter_global_presets_control'] . '_title_position_control'] == 'bottom' ) ) ? 'width: 100%;' : NULL; ?>; text-align: <?php echo $settings['advanced_counter_' . $settings['advanced_counter_global_presets_control'] . '_counter_alignment_control'] . '; '; echo ( ( $settings['advanced_counter_' . $settings['advanced_counter_global_presets_control'] . '_title_position_control'] == 'left' ) || ( $settings['advanced_counter_' . $settings['advanced_counter_global_presets_control'] . '_title_position_control'] == 'right' ) ) ? 'display: inline-block;' : NULL; ?>"></div>
            <?php
                if ( $settings['advanced_counter_' . $settings['advanced_counter_global_presets_control'] . '_title_position_control'] == 'bottom' || $settings['advanced_counter_' . $settings['advanced_counter_global_presets_control'] . '_title_position_control'] == 'right' ) {
            ?>
                <div class="counter-title" style="text-align: <?php echo $settings['advanced_counter_' . $settings['advanced_counter_global_presets_control'] . '_title_alignment_control']; ?>; <?php echo $settings['advanced_counter_' . $settings['advanced_counter_global_presets_control'] . '_title_position_control'] == 'right' ? 'display: inline-block;' : NULL; ?>"><?php echo $settings['advanced_counter_global_title_control']; ?></div>
            <?php
                }
            ?>
        </div>

    <?php

    }

}
