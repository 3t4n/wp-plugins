<?php

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Widget_Base;

class WPS_Countdown_Widget extends Widget_Base {

    // Widget Name
    public function get_name() {
        return 'wps-countdown';
    }

    // Widget Title
    public function get_title() {
        return __( 'Countdown', 'wpsection' );
    }

    // Widget Icon (optional)
    public function get_icon() {
        return 'eicon-countdown';
    }

    public function get_keywords() {
        return [ 'wpsection', 'Countdown' ];
    }

    public function get_categories() {
        return [ 'wpsection_category' ];
    }

    // Widget Controls
    protected function register_controls() {
        $this->start_controls_section(
            'wps_countdown_section',
            [
                'label' => esc_html__( 'Countdown', 'wpsection' ),
            ]
        );

$this->add_control(
    'countdown_date',
    [
        'label' => esc_html__( 'Countdown Date', 'wpsection' ),
        'type' => Controls_Manager::DATE_TIME,
        'default' => gmdate('Y-m-d H:i:s', strtotime('+1 week')),
    ]
);


        $this->add_control(
            'show_months',
            [
                'label' => esc_html__( 'Show Months', 'wpsection' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_days',
            [
                'label' => esc_html__( 'Show Days', 'wpsection' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_hours',
            [
                'label' => esc_html__( 'Show Hours', 'wpsection' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_minutes',
            [
                'label' => esc_html__( 'Show Minutes', 'wpsection' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_seconds',
            [
                'label' => esc_html__( 'Show Seconds', 'wpsection' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'months_text',
            [
                'label' => esc_html__( 'Months Text', 'wpsection' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'months',
            ]
        );

        $this->add_control(
            'days_text',
            [
                'label' => esc_html__( 'Days Text', 'wpsection' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'days',
            ]
        );

        $this->add_control(
            'hours_text',
            [
                'label' => esc_html__( 'Hours Text', 'wpsection' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'hours',
            ]
        );

        $this->add_control(
            'minutes_text',
            [
                'label' => esc_html__( 'Minutes Text', 'wpsection' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'minutes',
            ]
        );

        $this->add_control(
            'seconds_text',
            [
                'label' => esc_html__( 'Seconds Text', 'wpsection' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'seconds',
            ]
        );

        $this->end_controls_section();
		
//Style		
		
		
	
		$this->start_controls_section(
			'wps_date_counter',
			[
				'label' => esc_html__('Time Count Down', 'wpsection'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		
		$this->add_responsive_control(
			'wps_date_counter_width',
			[
				'label'      => esc_html__('Width', 'wpsection'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min'  => 1,
						'max'  => 2000,
						'step' => 1,
					],
					'%'  => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 100,
				],
				'selectors'  => [
					'{{WRAPPER}} .wps_date_count_area ' => 'width: {{SIZE}}{{UNIT}};',
				],
				
			]
		);	
		
		

		$this->add_responsive_control(
			'wps_date_counter_padding',
			[
				'label'      => esc_html__('Padding', 'wpsection'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .wps_date_count_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
	    $this->add_control(
            'wps_date_counter_bg',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_date_count_area' => 'background: {{VALUE}} !important',
                ),
            )
        );
	
		$this->add_responsive_control(
			'wps_date_counter_margin',
			[
				'label'      => esc_html__('Margin', 'wpsection'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .wps_date_count_area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	
		
    $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_date_counter_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_date_count_area',
            ]
        );
                
            $this->add_control(
            'wps_date_counter_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_date_count_area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );		
		
	
     $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_date_counter__shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_date_count_area',
            ]
        );	
		
		
	$this->end_controls_section();			

		
$this->start_controls_section(
            'wps_date_single',
            array(
                'label' => __( 'Content Text Style', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );	
		
		
		$this->add_responsive_control(
			'wps_date_single_width',
			[
				'label'      => esc_html__('Width', 'wpsection'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min'  => 1,
						'max'  => 2000,
						'step' => 1,
					],
					'%'  => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 100,
				],
				'selectors'  => [
					'{{WRAPPER}} .wps_date_count_area .cs-countdown span ' => 'width: {{SIZE}}{{UNIT}};',
				],
				
			]
		);	
		
	 $this->add_control(
                    'wps_date_single_alingment',
                    array(
                        'label' => esc_html__( 'Alignment', 'wpsection' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'left' => [
                                'title' => esc_html__( 'Left', 'wpsection' ),
                                'icon' => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'wpsection' ),
                                'icon' => 'eicon-text-align-center',
                            ],
                            'right' => [
                                'title' => esc_html__( 'Right', 'wpsection' ),
                                'icon' => 'eicon-text-align-right',
                            ],
                        ],
                        'default' => 'center',
                        'toggle' => true,
                        'selectors' => array(
                            '{{WRAPPER}}  .wps_date_count_area .cs-countdown ' => 'text-align: {{VALUE}} !important',
                        ),
                    )
                );  	
		
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'wps_date_typography',
				'label'    => __( 'Typography', 'wpsection' ),
				'selector' => '{{WRAPPER}} .wps_date_count_area .cs-countdown span',
			)
		);		
	


		    $this->add_control(
            'wps_date_counter_single_color',
            array(
                'label'     => __( ' Color', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_date_count_area .cs-countdown span' => 'color: {{VALUE}} !important',
                ),
            )
        );	
		
		
	    $this->add_control(
            'wps_date_counter_single_bg',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_date_count_area .cs-countdown span' => 'background: {{VALUE}} !important',
                ),
            )
        );
	
	$this->add_responsive_control(
			'wps_date_counter_single_padding',
			[
				'label'      => esc_html__('Padding', 'wpsection'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .wps_date_count_area .cs-countdown span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	
		
		$this->add_responsive_control(
			'wps_date_counter_single_margin',
			[
				'label'      => esc_html__('Margin', 'wpsection'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .wps_date_count_area .cs-countdown span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	
		
    $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_date_counter_single_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_date_count_area .cs-countdown span',
            ]
        );
                
            $this->add_control(
            'wps_date_counter_border_single_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_date_count_area .cs-countdown span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );		
		
	
     $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_date_counter_single_shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_date_count_area .cs-countdown span',
            ]
        );	
		
	
	
	



	
		$this->end_controls_section();	
		
		
		
		
		
    }

// Render Widget Output
protected function render() {
    $settings = $this->get_settings();
    $countdown_date = esc_attr( $settings['countdown_date'] );
    $show_months = $settings['show_months'] === 'yes';
    $show_days = $settings['show_days'] === 'yes';
    $show_hours = $settings['show_hours'] === 'yes';
    $show_minutes = $settings['show_minutes'] === 'yes';
    $show_seconds = $settings['show_seconds'] === 'yes';
    $unique_id = esc_attr( uniqid('wps_countdown_') ); // Generate a unique ID and escape it
    ?>

    <div id="<?php echo esc_attr($unique_id); ?>" class="wps_date_count_area">
        <div class="timer">
            <div class="cs-countdown" data-countdown="<?php echo esc_attr($countdown_date); ?>">
                <?php echo esc_html($countdown_date); ?>
            </div>
        </div>
    </div>

    <?php
    // Escaping for JS strings and variables
    echo '
    <script>
        jQuery(document).ready(function($) {
            if($("#' . esc_js( $unique_id ) . ' .timer").length) {
                var $this = $("#' . esc_js( $unique_id ) . ' .cs-countdown");
                var countdownDate = new Date($this.data("countdown"));
                var interval = setInterval(function() {
                    var now = new Date().getTime();
                    var distance = countdownDate - now;
                    if (distance < 0) {
                        clearInterval(interval);
                        $this.html("Offer expired");
                    } else {
                        var remainingTime = "";

                        var months = Math.floor(distance / (1000 * 60 * 60 * 24 * 30));
                        if (' . ($show_months ? 'true' : 'false') . ') {
                            if (months > 0) {
                                remainingTime += "<span class=\"wps_count_month\">" + months + " " + "' . esc_js( $settings['months_text'] ) . '" + "</span> ";
                            }
                        }

                        var days = Math.floor(distance % (1000 * 60 * 60 * 24 * 30) / (1000 * 60 * 60 * 24));
                        if (' . ($show_days ? 'true' : 'false') . ') {
                            if (days > 0 || months > 0) {
                                remainingTime += "<span class=\"wps_count_day\">" + days + " " + "' . esc_js( $settings['days_text'] ) . '" + "</span> ";
                            }
                        }

                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        if (' . ($show_hours ? 'true' : 'false') . ') {
                            remainingTime += "<span class=\"wps_count_hour\">" + hours + " " + "' . esc_js( $settings['hours_text'] ) . '" + "</span> ";
                        }

                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        if (' . ($show_minutes ? 'true' : 'false') . ') {
                            remainingTime += "<span class=\"wps_count_min\">" + minutes + " " + "' . esc_js( $settings['minutes_text'] ) . '" + "</span> ";
                        }

                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        if (' . ($show_seconds ? 'true' : 'false') . ') {
                            remainingTime += "<span class=\"wps_count_sec\">" + seconds + " " + "' . esc_js( $settings['seconds_text'] ) . '" + "</span>";
                        }

                        $this.html(remainingTime);
                    }
                }, 1000);
            }
        });
    </script>';

    echo '
    <style>
        #' . esc_attr($unique_id) . ' .cs-countdown {
            position: relative;
            display: flex;
            align-content: center;
        }
    </style>';
}
	
	
	
	
	
}

// Register widget
Plugin::instance()->widgets_manager->register_widget_type(new WPS_Countdown_Widget());
