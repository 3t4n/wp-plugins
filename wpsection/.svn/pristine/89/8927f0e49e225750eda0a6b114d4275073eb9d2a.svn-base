<?php
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Plugin;

class WPSection_wps_text_run_Widget extends Widget_Base {

    public function get_name() {
        return 'wpsection_wps_text_run';
    }

    public function get_title() {
        return __( 'Text Run', 'wpsection' );
    }

    public function get_icon() {
        return 'eicon-code-highlight';
    }

    public function get_keywords() {
        return [ 'wpsection', 'flip', 'text', 'slider', 'carousel' ];
    }

    public function get_categories() {
        return [ 'wpsection_shop' ]; // Ensure this category exists in Elementor
    }

    protected function _register_controls() {
        // Registering the section for text flip content
        $this->start_controls_section(
            'wps_text_run_settings',
            [
                'label' => esc_html__( 'Text Run Settings', 'wpsection' ),
            ]
        );
		
	
		

        $this->add_control(
    'animation_speed',
    [
        'label' => __( 'Animation Speed (seconds)', 'wpsection' ),
        'type' => Controls_Manager::NUMBER,
        'default' => 190,
        'min' => 10,
        'max' => 1000,
        'step' => 10,
        'description' => __( 'Set the speed for the scroll animation (higher values make it slower).', 'wpsection' ),
    ]
);


    // Add a toggle for endless loop
    $this->add_control(
        'endless_loop',
        [
            'label' => __( 'Endless Loop', 'wpsection' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'wpsection' ),
            'label_off' => __( 'No', 'wpsection' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

        // Repeater for adding multiple text and image pairs
          $repeater = new \Elementor\Repeater();

        // Control for text content
        $repeater->add_control(
            'flip_title',
            [
                'label' => __( 'Text to Run', 'wpsection' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'This is Text Run ', 'wpsection' ),
                'placeholder' => __( 'Enter text here', 'wpsection' ),
            ]
        );

    

	
        // Control for adding an image
        $repeater->add_control(
            'flip_image',
            [
                'label' => __( 'Image', 'wpsection' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
                'description' => __( 'Select an image to display with the text', 'wpsection' ),
            ]
        );
		
		
$repeater->add_control(
    'flip_link',
    [
        'label' => __( 'Link', 'wpsection' ),
        'type' => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'wpsection' ),
        'default' => [
            'url' => '',
            'is_external' => false,
            'nofollow' => false,
        ],
    ]
);	

        // Adding repeater to the widget
        $this->add_control(
            'text_image_repeater',
            [
                'label' => __( 'Text and Image Sets', 'wpsection' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                    'default' => [
                    [
                        'flip_title' => __( 'Title 1', 'wpsection' ),
                  
                    ],
                    [
                        'flip_title' => __( 'Title 2', 'wpsection' ),
                    
                    ],
                ],
                'title_field' => '{{{ flip_title }}}',
            ]
        );

		

		
        $this->end_controls_section();
		
$this->start_controls_section(
    'category_style_section',
    [
        'label' => __( 'Category Item Style', 'wpsection' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    ]
);



// Title Style

$this->add_control(
    'title_run_color',
    [
        'label'     => __( 'Title Color', 'wpsection' ),
        'type'      => Controls_Manager::COLOR,
        'default'   => '#333',
        'selectors' => [
            '{{WRAPPER}} .wps_text_run_title' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name'     => 'title_run_typography',
        'label'    => __( 'Title Typography', 'wpsection' ),
        'selector' => '{{WRAPPER}} .wps_text_run_title',
    ]
);


		
   $this->add_control(
            'title_run_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
             
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_text_run_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

        $this->add_control(
            'title_run_typography__padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ), 
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .wps_text_run_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );		
		

		
// Thumbnail Style
  $this->add_control(
            'wps_text_run_thumb_width',
            [
                'label' => esc_html__( 'Image Width ', 'wpsection' ),
					'separator' => 'before',
                'type' => \Elementor\Controls_Manager::SLIDER,
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
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .wps_text_run_iamge_box img' => 'max-width: {{SIZE}}{{UNIT}}!important;',
                    
                ],
            ]
        );  

  $this->add_control(
            'wps_text_run_thumbnail_height',
            [
                'label' => esc_html__( 'Max Image Height ', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
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
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .wps_text_run_iamge_box img' => 'max-height: {{SIZE}}{{UNIT}}!important;',
                    
                ],
            ]
        );  



		

$this->add_control(
    'block_text_run_thumb_padding',
    [
        'label'      => __( 'Padding', 'wpsection' ),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'default'    => [
            'top'    => '10',
            'right'  => '10',
            'bottom' => '10',
            'left'   => '10',
            'unit'   => 'px',
        ],
        'selectors'  => [
            '{{WRAPPER}} .wps_text_run_iamge_box img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);


$this->add_control(
    'block_text_run_thumb_margin',
    [
        'label'      => __( 'Margin', 'wpsection' ),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'default'    => [
            'top'    => '10',
            'right'  => '10',
            'bottom' => '10',
            'left'   => '10',
            'unit'   => 'px',
        ],
        'selectors'  => [
            '{{WRAPPER}} .wps_text_run_iamge_box img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);


$this->add_control(
    'block__text_run_thumb_bg_color',
    [
        'label'     => __( 'Background Color', 'wpsection' ),
        'type'      => Controls_Manager::COLOR,
        'default'   => '#ffffff',
        'selectors' => [
            '{{WRAPPER}} .wps_text_run_iamge_box img' => 'background-color: {{VALUE}};',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name'        => 'block_text_run_thumb_border',
        'label'       => __( 'Border', 'wpsection' ),
        'selector'    => '{{WRAPPER}} .wps_text_run_iamge_box img',
        'description' => __( 'Set border for the category block.', 'wpsection' ),
    ]
);



        $this->add_control(
            'block_text_run_thumb_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
   
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_text_run_iamge_box img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
		
			
$this->end_controls_section();
		
// Block Area
$this->start_controls_section(
    'category_run_block_style_section',
    [
        'label' => __( 'Area Block Style', 'wpsection' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    ]
);

		

$this->add_control(
    'block__run_padding',
    [
        'label'      => __( 'Padding', 'wpsection' ),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'default'    => [
            'top'    => '10',
            'right'  => '10',
            'bottom' => '10',
            'left'   => '10',
            'unit'   => 'px',
        ],
        'selectors'  => [
            '{{WRAPPER}} .wps_text_run_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);


$this->add_control(
    'block_run_margin',
    [
        'label'      => __( 'Margin', 'wpsection' ),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'default'    => [
            'top'    => '10',
            'right'  => '10',
            'bottom' => '10',
            'left'   => '10',
            'unit'   => 'px',
        ],
        'selectors'  => [
            '{{WRAPPER}} .wps_text_run_area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);


$this->add_control(
    'block_run_bg_color',
    [
        'label'     => __( 'Background Color', 'wpsection' ),
        'type'      => Controls_Manager::COLOR,
        'default'   => '#ffffff',
        'selectors' => [
            '{{WRAPPER}} .wps_text_run_area' => 'background-color: {{VALUE}};',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name'        => 'block_run_border',
        'label'       => __( 'Border', 'wpsection' ),
        'selector'    => '{{WRAPPER}} .wps_text_run_area',
        'description' => __( 'Set border for the category block.', 'wpsection' ),
    ]
);



        $this->add_control(
            'block_run_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
   
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_text_run_area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
				
		

$this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name'     => 'block_run_box_shadow',
        'label'    => __( 'Box Shadow', 'wpsection' ),
        'selector' => '{{WRAPPER}} .wps_text_run_area',
    ]
);




$this->end_controls_section();		
		
    }

protected function render() {
    $settings = $this->get_settings_for_display(); 
	 $allowed_tags = wp_kses_allowed_html('post');
    $animation_speed = ! empty( $settings['animation_speed'] ) ? $settings['animation_speed'] : 190;
    $endless_loop = ( $settings['endless_loop'] === 'yes' ) ? 'infinite' : '1';
    ?>
    <section class="featured-section wps_text_run_section">
        <div class="large-container">
            <div class="inner-container">
                <div class="featured-list" 
                     style="animation-duration: <?php echo esc_attr( $animation_speed ); ?>s; animation-iteration-count: <?php echo esc_attr( $endless_loop ); ?>;">
                    <?php
                    // Loop through items; duplicate only if endless loop is enabled
                    $repeat_count = ( $settings['endless_loop'] === 'yes' ) ? 2 : 1;
                    for ( $i = 0; $i < $repeat_count; $i++ ) {
                        if ( ! empty( $settings['text_image_repeater'] ) ) {
                            foreach ( $settings['text_image_repeater'] as $item ) {
                             

						$image_url = ! empty( $item['flip_image']['url'] ) ? $item['flip_image']['url'] : 'assets/images/default.png';
                        $link = ! empty( $item['flip_link']['url'] ) ? $item['flip_link']['url'] : '#';
                        $is_external = ! empty( $item['flip_link']['is_external'] ) ? ' target="_blank"' : '';
                        $nofollow = ! empty( $item['flip_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                        ?>
					
					<a href="<?php echo esc_url( $link ); ?>" 
   <?php echo esc_attr( $is_external ) . ' ' . esc_attr( $nofollow ); ?>>

                         
                                <div class="single-featured wps_text_run_area">
                                    <figure class="image-box wps_text_run_iamge_box">
                                        <img src="<?php echo esc_url( $image_url ); ?>" alt="">
                                    </figure>
                                    <p class="wps_text_run_title"> <?php echo wp_kses($item['flip_title'], $allowed_tags); ?></p>
                                </div>
						  
					</a>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <style>
        .featured-section {
            position: relative;
            overflow: hidden;
        }

        .featured-section .inner-container {
            position: relative;
            overflow: hidden;
        }

        .featured-section .featured-list {
            position: relative;
            display: flex;
            width: max-content;
            animation: scroll-left <?php echo esc_attr( $animation_speed ); ?>s linear;
        }

        @keyframes scroll-left {
            0% {
                transform: translateX(0%);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        .featured-section .single-featured {
            position: relative;
        }

        .featured-section .single-featured .image-box {
            position: absolute;
            left: 0px;
            top: 0px;
        }

    </style>
    <?php
}


}

// Register the widget with Elementor
Plugin::instance()->widgets_manager->register_widget_type( new WPSection_wps_text_run_Widget() );
