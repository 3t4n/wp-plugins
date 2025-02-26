<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Advanced_Countdown_Widget extends Widget_Base {

    public function get_name() {
        return 'advanced-countdown';
    }

    public function get_title() {
        return 'Advanced Countdown';
    }

    public function get_icon() {
        return 'eicon-countdown';
    }

    public function get_categories() {
        return [ 'advamentor' ];
    }

    // Registering Controls
    protected function _register_controls() {

        // Registering Countdown Global Content Controls
        $this->start_controls_section( 'advanced_countdown_global_content_controls',
            [
                'label'             => __( 'Time and Format', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_CONTENT
            ]
        );

        // Registering Countdown Global Date Control
        $this->add_control('advanced_countdown_global_date_control',
            [
                'label'             => __( 'Select Date', 'advamentor' ),
                'type'              => Controls_Manager::DATE_TIME,
                'label_block'       => false
            ]
        );

        // Registering Countdown Global Units Control
        $this->add_control('advanced_countdown_global_units_control',
            [
                'label'             => __( 'Select Units', 'advamentor' ),
                'type'              => Controls_Manager::SELECT,
                'default'           => 'DailyCounter',
                'options'           => [
                    'DailyCounter'  => __( 'Daily Counter', 'advamentor' ),
                    'HourlyCounter' => __( 'Hourly Counter', 'advamentor' ),
                    'MinuteCounter' => __( 'Minute Counter', 'advamentor' )
                ],
            ]
        );

        // Registering Countdown Global End Message Control
        $this->add_control('advanced_countdown_global_end_message_control',
            [
                'label' => __( 'Finish Message', 'advamentor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Enter message here...', 'advamentor' ),
            ]
        );

        $this->end_controls_section();

        // Registering Countdown Global Typography Controls
        $this->start_controls_section( 'advanced_countdown_global_typography_controls',
            [
                'label'             => __( 'Label Typography', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_STYLE
            ]
        );

        // Registering Countdown Global Label Typography Control
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'              => 'advanced_countdown_global_label_typography_control',
                'label'             => __( 'Typography', 'advamentor' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_1,
                'selector'          => '{{WRAPPER}} .flip-clock-label',
            ]
        );

        $this->end_controls_section();

        // Registering Countdown Global Second Label Position Controls
        $this->start_controls_section( 'advanced_countdown_global_second_label_position_controls',
            [
                'label'             => __( 'Seconds Label Position', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_STYLE
            ]
        );

        // Registering Countdown Global Label Second Horizontal Position Control
        $this->add_control('advanced_countdown_global_label_second_horizontal_control',
            [
                'label' => __( 'Seconds Horizontal Position', 'advamentor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 0,
                    'unit' => 'px'
                ],
                'selectors' => [
                    '{{WRAPPER}} .advamentor-countdown-wrapper .flip-clock-divider.seconds .flip-clock-label' => 'right: calc({{SIZE}}{{UNIT}} - 100px);',
                ],
            ]
        );

        // Registering Countdown Global Label Second Vertical Position Control
        $this->add_control('advanced_countdown_global_label_second_vertical_control',
            [
                'label' => __( 'Seconds Vertical Position', 'advamentor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 0,
                    'unit' => 'em'
                ],
                'selectors' => [
                    '{{WRAPPER}} .advamentor-countdown-wrapper .flip-clock-divider.seconds .flip-clock-label' => 'top: calc({{SIZE}}{{UNIT}} - 1.5em);',
                ],
            ]
        );

        $this->end_controls_section();

        // Registering Countdown Global Minute Label Position Controls
        $this->start_controls_section( 'advanced_countdown_global_minute_label_position_controls',
            [
                'label'             => __( 'Minutes Label Position', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_STYLE
            ]
        );

        // Registering Countdown Global Label Minute Horizontal Control
        $this->add_control('advanced_countdown_global_label_minute_horizontal_control',
            [
                'label' => __( 'Minutes Horizontal Position', 'advamentor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 0,
                    'unit' => 'px'
                ],
                'selectors' => [
                    '{{WRAPPER}} .advamentor-countdown-wrapper .flip-clock-divider.minutes .flip-clock-label' => 'right: calc({{SIZE}}{{UNIT}} - 100px);',
                ],
            ]
        );

        // Registering Countdown Global Label Minute Vertical Control
        $this->add_control('advanced_countdown_global_label_minute_vertical_control',
            [
                'label' => __( 'Minutes Vertical Position', 'advamentor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 0,
                    'unit' => 'em'
                ],
                'selectors' => [
                    '{{WRAPPER}} .advamentor-countdown-wrapper .flip-clock-divider.minutes .flip-clock-label' => 'top: calc({{SIZE}}{{UNIT}} - 1.5em);',
                ],
            ]
        );

        $this->end_controls_section();

        // Registering Countdown Global Hour Label Position Controls
        $this->start_controls_section( 'advanced_countdown_global_hour_label_position_controls',
            [
                'label'             => __( 'Hours Label Position', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_STYLE,
                'condition'         => [
                        'advanced_countdown_global_units_control!'   => 'MinuteCounter'
                ]
            ]
        );

        // Registering Countdown Global Label Hour Horizontal Control
        $this->add_control('advanced_countdown_global_label_hour_horizontal_control',
            [
                'label' => __( 'Hours Horizontal Position', 'advamentor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 0,
                    'unit' => 'px'
                ],
                'selectors' => [
                    '{{WRAPPER}} .advamentor-countdown-wrapper .flip-clock-divider.hours .flip-clock-label' => 'right: calc({{SIZE}}{{UNIT}} - 100px);',
                ],
            ]
        );

        // Registering Countdown Global Label Hour Vertical Control
        $this->add_control('advanced_countdown_global_label_hour_vertical_control',
            [
                'label' => __( 'Hours Vertical Position', 'advamentor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 0,
                    'unit' => 'em'
                ],
                'selectors' => [
                    '{{WRAPPER}} .advamentor-countdown-wrapper .flip-clock-divider.hours .flip-clock-label' => 'top: calc({{SIZE}}{{UNIT}} - 1.5em);',
                ],
            ]
        );

        $this->end_controls_section();

        // Registering Countdown Global Day Label Position Controls
        $this->start_controls_section( 'advanced_countdown_global_day_style_controls',
            [
                'label'             => __( 'Days Label Position', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_STYLE,
                'condition'         => [
                        'advanced_countdown_global_units_control'   => 'DailyCounter'
                ]
            ]
        );

        // Registering Countdown Global Label Day Horizontal Control
        $this->add_control('advanced_countdown_global_label_day_horizontal_control',
            [
                'label' => __( 'Days Horizontal Position', 'advamentor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 0,
                    'unit' => 'px'
                ],
                'selectors' => [
                    '{{WRAPPER}} .advamentor-countdown-wrapper .flip-clock-divider.days .flip-clock-label' => 'right: calc({{SIZE}}{{UNIT}} - 100px);',
                ],
            ]
        );

        // Registering Countdown Global Label Day Vertical Control
        $this->add_control('advanced_countdown_global_label_day_vertical_control',
            [
                'label' => __( 'Days Vertical Position', 'advamentor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 0,
                    'unit' => 'em'
                ],
                'selectors' => [
                    '{{WRAPPER}} .advamentor-countdown-wrapper .flip-clock-divider.days .flip-clock-label' => 'top: calc({{SIZE}}{{UNIT}} - 1.5em);',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();

            echo '<div class="advamentor-countdown-wrapper">';
            echo '<div class="advamentor-countdown-clock-' . $elementid . ' advamentor-clock-center"></div>';
            echo '<div class="message"></div>';
            echo '</div>';

    ?>

        <script type="text/javascript">
            (function($) {
                var date = new Date('<?php echo $settings['advanced_countdown_global_date_control']; ?>');
                var now = new Date();
                var diff = (date.getTime()/1000) - (now.getTime()/1000);
                if (now < date) {
                    var clock = $('.advamentor-countdown-clock-<?php echo $elementid ?>').FlipClock(diff,{
                        clockFace: '<?php echo $settings['advanced_countdown_global_units_control'] ?>',
                        countdown: true,
                        callbacks: {
                            stop: function() {
                                $('.message').html('<?php echo $settings["advanced_countdown_global_end_message_control"] ?>');
                            }
                        }
                    });
                } else {
                    $('.message').html('Please select a time in the future.');
                }

            })( jQuery );
        </script>

    <?php

    }

}