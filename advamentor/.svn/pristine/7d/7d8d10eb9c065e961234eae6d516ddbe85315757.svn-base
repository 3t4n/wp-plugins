<?php
namespace Elementor;

use Elementor\Modules\DynamicTags\Module as TagsModule;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Advanced_FlipBox_Widget extends Widget_Base {

	public function get_name() {
		return 'advanced-flipbox';
	}

	public function get_title() {
		return esc_html__( 'Advanced FlipBox', 'advamentor' );
	}

	public function get_icon() {
		return 'eicon-flip-box';
	}

    public function get_categories() {
        return [ 'advamentor' ];
    }

	protected function _register_controls() {

  		/**
  		 * Flipbox Image Settings
  		 */
  		$this->start_controls_section(
  			'advanced_flipbox_content_settings',
  			[
  				'label' => esc_html__( 'Flipbox Settings', 'advamentor' )
  			]
  		);

  		$this->add_control(
		  'flipbox_styles',
		  	[
		   	'label'       	=> esc_html__( 'Flipbox Styles', 'advamentor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'style1',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'style1'  	=> esc_html__( 'Style1', 'advamentor' ),
		     		'style2' 	=> esc_html__( 'Style2', 'advamentor' ),
		     		'style3' 	=> esc_html__( 'Style3', 'advamentor' ),
		     		'style4' 	=> esc_html__( 'Style4', 'advamentor' ),
		     		'style5' 	=> esc_html__( 'Style5', 'advamentor' ),
		     		'style6' 	=> esc_html__( 'Style6', 'advamentor' ),
		     	],
		  	]
		);

		$this->end_controls_section();

		/**
		 * Flipbox Content
		 */
		$this->start_controls_section(
			'advanced_flipbox_content',
			[
				'label' => esc_html__( 'Flipbox Content', 'advamentor' ),
			]
		);

		$this->start_controls_tabs('advanced_flipbox_content_tabs');

			$this->start_controls_tab(
				'advanced_flipbox_content_front',
				[
					'label'	=> __( 'Front', 'advamentor' )
				]
			);

			

			$this->add_control(
				'advanced_flipbox_front_side_text',
				[
					'label' => esc_html__( 'Front Text', 'advamentor' ),
					'type' => Controls_Manager::WYSIWYG,
					'label_block' => true,
					'default' => __( 'Make a team and Play your favourits.', 'advamentor' ),
				]
			);

			$this->end_controls_tab();
			
			
			$this->start_controls_tab(
				'advanced_flipbox_content_back',
				[
					'label'	=> __( 'Back', 'advamentor' )
				]
			);

			

			$this->add_control(
				'advanced_flipbox_back_text',
				[
					'label' => esc_html__( 'Back Text', 'advamentor' ),
					'type' => Controls_Manager::WYSIWYG,
					'label_block' => true,
					'default' => __( 'Make a team and Play your favourits.', 'advamentor' ),
				]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();
			
		

		$this->end_controls_section();

		/**
		 * ----------------------------------------------
		 * Flipbox Link
		 * ----------------------------------------------
		 */
		$this->start_controls_section(
			'flixbox_link_section',
			[
				'label' => esc_html__( 'Link', 'advamentor' )
			]
		);

		$this->add_control(
            'flipbox_link_type',
            [
                'label'                 => __( 'Link Type', 'advamentor' ),
                'type'                  => Controls_Manager::SELECT,
                'default'               => 'none',
                'options'               => [
                    'none'      => __( 'None', 'advamentor' ),
                    'box'       => __( 'Box', 'advamentor' ),
                    'title'     => __( 'Title', 'advamentor' ),
                    'button'    => __( 'Button', 'advamentor' ),
                ],
            ]
        );

        $this->add_control(
            'flipbox_link',
            [
                'label'                 => __( 'Link', 'advamentor' ),
                'type'                  => Controls_Manager::URL,
				'dynamic'               => [
					'active'        => true,
                    'categories'    => [
                        TagsModule::POST_META_CATEGORY,
                        TagsModule::URL_CATEGORY
                    ],
				],
                'placeholder'           => 'https://www.themexa.com',
                'default'               => [
                    'url' => '#',
                ],
                'condition'             => [
                    'flipbox_link_type!'   => 'none',
                ],
            ]
        );

        $this->add_control(
            'flipbox_button_text',
            [
                'label'                 => __( 'Button Text', 'advamentor' ),
                'type'                  => Controls_Manager::TEXT,
				'dynamic'               => [
					'active'   => true,
				],
                'default'               => __( 'Get Started', 'advamentor' ),
                'condition'             => [
                    'flipbox_link_type'   => 'button',
                ],
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label'                 => __( 'Button Icon', 'advamentor' ),
                'type'                  => Controls_Manager::ICON,
                'default'               => '',
                'condition'             => [
                    'flipbox_link_type'   => 'button',
                ],
            ]
        );
        
        $this->add_control(
            'button_icon_position',
            [
                'label'                 => __( 'Icon Position', 'advamentor' ),
                'type'                  => Controls_Manager::SELECT,
                'default'               => 'after',
                'options'               => [
                    'after'     => __( 'After', 'advamentor' ),
                    'before'    => __( 'Before', 'advamentor' ),
                ],
                'condition'             => [
                    'flipbox_link_type'     => 'button',
                    'button_icon!'  => '',
                ],
            ]
        );

		$this->end_controls_section();

        
		/**
		 * -------------------------------------------
		 * Tab Style (Flipbox Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'advanced_flipbox_style_settings',
			[
				'label' => esc_html__( 'Filp Box Style', 'advamentor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'advanced_flipbox_front_side_bg_color_style1',
			[
				'label' => esc_html__( 'Front Background Color', 'advamentor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#587a1c',
				'selectors' => [
					'{{WRAPPER}} .advanced-flipbox-front-container' => 'background: {{VALUE}};',
				],

				'condition' => [
		     		'flipbox_styles' => 'style1'
		     	],
			]
		);

		$this->add_control(
			'advanced_flipbox_front_side_bg_color_style2',
			[
				'label' => esc_html__( 'Front Background Color', 'advamentor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#314776',
				'selectors' => [
					'{{WRAPPER}} .advanced-flipbox-front-container' => 'background: {{VALUE}};',
				],

				'condition' => [
		     		'flipbox_styles' => 'style2'
		     	],
			]
		);

		$this->add_control(
			'advanced_flipbox_front_side_bg_color_style3',
			[
				'label' => esc_html__( 'Front Background Color', 'advamentor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#317636',
				'selectors' => [
					'{{WRAPPER}} .advanced-flipbox-front-container' => 'background: {{VALUE}};',
				],

				'condition' => [
		     		'flipbox_styles' => 'style3'
		     	],
			]
		);

		$this->add_control(
			'advanced_flipbox_front_side_bg_color_style4',
			[
				'label' => esc_html__( 'Front Background Color', 'advamentor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#5e22d4',
				'selectors' => [
					'{{WRAPPER}} .advanced-flipbox-front-container' => 'background: {{VALUE}};',
				],

				'condition' => [
		     		'flipbox_styles' => 'style4'
		     	],
			]
		);

		$this->add_control(
			'advanced_flipbox_front_side_bg_color_style5',
			[
				'label' => esc_html__( 'Front Background Color', 'advamentor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#c60265',
				'selectors' => [
					'{{WRAPPER}} .advanced-flipbox-front-container' => 'background: {{VALUE}};',
				],

				'condition' => [
		     		'flipbox_styles' => 'style5'
		     	],
			]
		);

		
		$this->add_control(
			'advanced_flipbox_front_side_bg_color_style6',
			[
				'label' => esc_html__( 'Front Background Color', 'advamentor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#b47e18',
				'selectors' => [
					'{{WRAPPER}} .advanced-flipbox-front-container' => 'background: {{VALUE}};',
				],

				'condition' => [
		     		'flipbox_styles' => 'style6'
		     	],
			]
		);

		$this->add_control(
			'advanced_flipbox_back_bg_color_style6',
			[
				'label' => esc_html__( 'Back Background Color', 'advamentor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#003366',
				'selectors' => [
					'{{WRAPPER}} .advanced-flipbox-rear-container' => 'background: {{VALUE}};',
				],
				'condition' => [
		     		'flipbox_styles' => 'style6'
		     	],
			]
		);

		$this->add_control(
			'advanced_flipbox_back_bg_color_style1',
			[
				'label' => esc_html__( 'Back Background Color', 'advamentor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#6758c9',
				'selectors' => [
					'{{WRAPPER}} .advanced-flipbox-rear-container' => 'background: {{VALUE}};',
				],
				'condition' => [
		     		'flipbox_styles' => 'style1'
		     	],
			]
		);

		$this->add_control(
			'advanced_flipbox_back_bg_color_style2',
			[
				'label' => esc_html__( 'Back Background Color', 'advamentor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#565151',
				'selectors' => [
					'{{WRAPPER}} .advanced-flipbox-rear-container' => 'background: {{VALUE}};',
				],
				'condition' => [
		     		'flipbox_styles' => 'style2'
		     	],
			]
		);

		$this->add_control(
			'advanced_flipbox_back_bg_color_style3',
			[
				'label' => esc_html__( 'Back Background Color', 'advamentor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#90c999',
				'selectors' => [
					'{{WRAPPER}} .advanced-flipbox-rear-container' => 'background: {{VALUE}};',
				],
				'condition' => [
		     		'flipbox_styles' => 'style3'
		     	],
			]
		);

		$this->add_control(
			'advanced_flipbox_back_bg_color_style4',
			[
				'label' => esc_html__( 'Back Background Color', 'advamentor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#b5c990',
				'selectors' => [
					'{{WRAPPER}} .advanced-flipbox-rear-container' => 'background: {{VALUE}};',
				],
				'condition' => [
		     		'flipbox_styles' => 'style4'
		     	],
			]
		);

		$this->add_control(
			'advanced_flipbox_back_bg_color_style5',
			[
				'label' => esc_html__( 'Back Background Color', 'advamentor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f0d89d',
				'selectors' => [
					'{{WRAPPER}} .advanced-flipbox-rear-container' => 'background: {{VALUE}};',
				],
				'condition' => [
		     		'flipbox_styles' => 'style5'
		     	],
			]
		);

		$this->add_responsive_control(
			'advanced_flipbox_front_side_back_padding',
			[
				'label' => esc_html__( 'Content Padding', 'advamentor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .advanced-flipbox-front-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 					'{{WRAPPER}} .advanced-flipbox-rear-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'advanced_flipbox__border',
					'label' => esc_html__( 'Border Style', 'advamentor' ),
					'selector' => '{{WRAPPER}} .advanced-flipbox-front-container, {{WRAPPER}} .advanced-flipbox-rear-container',
				]
		);

		$this->add_control(
			'advanced_flipbox_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'advamentor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units'	=> [ 'px', '%' ],
				'range' => [
					'px' => [
						'min'	=> 0,
						'step'	=> 1,
						'max'	=> 500,
					],
					'%'	=> [
						'min'	=> 0,
						'step'	=> 3,
						'max'	=> 100
					]
				],
				'selectors' => [
					'{{WRAPPER}} .advanced-flipbox-front-container'	=> 'border-radius: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .advanced-flipbox-rear-container'	=> 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'advanced_flipbox_shadow',
				'selector' => '{{WRAPPER}} .advanced-flipbox-front-container, {{WRAPPER}} .advanced-flipbox-rear-container'
			]
		);

		$this->end_controls_section();

		
		

		/**
		 * -------------------------------------------
		 * Tab Style (Flip Box Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'advanced_flipbox_title_style_settings',
			[
				'label' => esc_html__( 'Color and Typography', 'advamentor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		
		$this->start_controls_tabs('advanced_flipbox_typo_style_settings');
			$this->start_controls_tab('advanced_flipbox_typo_style_front_side_settings', [
				'label' => esc_html__( 'Front', 'advamentor' )
			]);

				/**
				 * Content
				 */
				$this->add_control(
					'advanced_flipbox_front_side_content_heading',
					[
						'label' => esc_html__( 'Content Style', 'advamentor' ),
						'type' => Controls_Manager::HEADING,
						'separator' => 'before'
					]
				);

				$this->add_control(
					'advanced_flipbox_front_side_content_color',
					[
						'label' => esc_html__( 'Color', 'advamentor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .advanced-flipbox-front-container .advanced-flipbox-content' => 'color: {{VALUE}};',
						]
					]
				);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
		            	'name' => 'advanced_flipbox_front_side_content_typography',
						'selector' => '{{WRAPPER}} .advanced-flipbox-front-container .advanced-flipbox-content'
					]
				);
				
			$this->end_controls_tab();

			$this->start_controls_tab('advanced_flipbox_typo_style_back_settings', [
				'label' => esc_html__( 'Back', 'advamentor' )
			]);

				

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
		            	'name' => 'advanced_flipbox_back_icon_typography',
						'selector' => '{{WRAPPER}} .advanced-flipbox-rear-container .advanced-flipbox-icon-image i'
					]
				);

				/**
				 * Content
				 */
				$this->add_control(
					'advanced_flipbox_back_content_heading',
					[
						'label' => esc_html__( 'Content Style', 'advamentor' ),
						'type' => Controls_Manager::HEADING,
						'separator' => 'before'
					]
				);

				$this->add_control(
					'advanced_flipbox_back_content_color',
					[
						'label' => esc_html__( 'Color', 'advamentor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .advanced-flipbox-rear-container .advanced-flipbox-content' => 'color: {{VALUE}};',
						]
					]
				);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
		            	'name' => 'advanced_flipbox_back_content_typography',
						'selector' => '{{WRAPPER}} .advanced-flipbox-rear-container .advanced-flipbox-content'
					]
				);

			$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Flip Box Button Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'advanced_flipbox_button_style_settings',
			[
				'label' => esc_html__( 'Button Style', 'advamentor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'flipbox_link_type'	=> 'button'
				]
			]
		);

		$this->start_controls_tabs( 'flipbox_button_style_settings' );

			$this->start_controls_tab(
				'flipbox_button_normal_style',
				[
					'label'	=> __( 'Normal', 'advamentor' )
				]
			);
				$this->add_responsive_control(
					'advanced_flipbox_button_margin',
					[
						'label' => esc_html__( 'Margin', 'advamentor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em' ],
						'selectors' => [
			 				'{{WRAPPER}} .advanced-flipbox-container .advanced-flipbox-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			 			],
					]
				);

				$this->add_responsive_control(
					'advanced_flipbox_button_padding',
					[
						'label' => esc_html__( 'Padding', 'advamentor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em' ],
						'selectors' => [
			 				'{{WRAPPER}} .advanced-flipbox-container .advanced-flipbox-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			 			],
					]
				);

				$this->add_control(
					'advanced_flipbox_button_color',
					[
						'label' => esc_html__( 'Color', 'advamentor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#ffffff',
						'selectors' => [
							'{{WRAPPER}} .advanced-flipbox-container .advanced-flipbox-button' => 'color: {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'advanced_flipbox_button_bg_color',
					[
						'label' => esc_html__( 'Background', 'advamentor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#000000',
						'selectors' => [
							'{{WRAPPER}} .advanced-flipbox-container .advanced-flipbox-button' => 'background: {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'advanced_flipbox_button_border_radius',
					[
						'label' => esc_html__( 'Border Radius', 'advamentor' ),
						'type' => Controls_Manager::SLIDER,
						'size_units'	=> [ 'px' ],
						'range' => [
							'px' => [
								'min'	=> 0,
								'step'	=> 1,
								'max'	=> 100,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .advanced-flipbox-container .advanced-flipbox-button'	=> 'border-radius: {{SIZE}}{{UNIT}};',
						],
					]
				);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
		            	'name'		=> 'advanced_flipbox_button_typography',
						'selector'	=> '{{WRAPPER}} .advanced-flipbox-container .advanced-flipbox-button'
					]
				);
			$this->end_controls_tab();

			$this->start_controls_tab(
				'flipbox_button_hover_style',
				[
					'label'	=> __( 'Hover', 'advamentor' )
				]
			);
				$this->add_control(
					'advanced_flipbox_button_hover_color',
					[
						'label' => esc_html__( 'Color', 'advamentor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#ffffff',
						'selectors' => [
							'{{WRAPPER}} .advanced-flipbox-container .advanced-flipbox-button:hover' => 'color: {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'advanced_flipbox_button_hover_bg_color',
					[
						'label' => esc_html__( 'Background', 'advamentor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#000000',
						'selectors' => [
							'{{WRAPPER}} .advanced-flipbox-container .advanced-flipbox-button:hover' => 'background: {{VALUE}};',
						],
					]
				);
			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}


	protected function render() {

   		$settings = $this->get_settings();
	  	$flipbox_if_html_tag = 'div';
	  	$this->add_render_attribute('flipbox-container', 'class', 'advanced-flipbox-flip-card');

	  	if( $settings['flipbox_link_type'] != 'none' ) {
	  		if( ! empty($settings['flipbox_link']['url']) ) {
	  			if( $settings['flipbox_link_type'] == 'box' ) {
	  				$flipbox_if_html_tag = 'a';

	  				$this->add_render_attribute( 'flipbox-container', 'href', esc_url($settings['flipbox_link']['url']) );

	  				if( $settings['flipbox_link']['is_external'] ) {
	  					$this->add_render_attribute( 'flipbox-container', 'target', '_blank' );
	  				}

	  				if( $settings['flipbox_link']['nofollow'] ) {
	  					$this->add_render_attribute('flipbox-container', 'rel', 'nofollow');
	  				}
	  			} elseif( $settings['flipbox_link_type'] == 'title' ) {
	  				$flipbox_if_html_title_tag = 'a';

	  				

	  				if( $settings['flipbox_link']['is_external'] ) {
	  					$this->add_render_attribute('flipbox-title-container', 'target', '_blank');
	  				}

	  				if( $settings['flipbox_link']['nofollow'] ) {
	  					$this->add_render_attribute('flipbox-title-container', 'rel', 'nofollow');
	  				}
	  			} elseif( $settings['flipbox_link_type'] == 'button' ) {
	  				$this->add_render_attribute(
	  					'advanced-flipbox-button-container',
	  					[
	  						'class'	=> 'advanced-flipbox-button',
	  						'href'	=> $settings['flipbox_link']['url']
	  					]
	  				);

	  				if($settings['flipbox_link']['is_external']) {
	  					$this->add_render_attribute('advanced-flipbox-button-container', 'target', '_blank' );
	  				}

	  				if($settings['flipbox_link']['nofollow']) {
	  					$this->add_render_attribute('advanced-flipbox-button-container', 'rel', 'nofollow' );
	  				}
	  			}
	  		}
	  	}

	  	$this->add_render_attribute(
	  		'advanced_flipbox_main_wrap',
	  		[
	  			'class'	=> [
	  				'advanced-flipbox-container',
	  				'flipbox-effect-flip',
	  				'flipbox-effect-'.esc_attr( $settings['flipbox_styles'] )
	  			]
	  		]
	  	);

	?>

	<div <?php echo $this->get_render_attribute_string('advanced_flipbox_main_wrap'); ?>>

	    <<?php echo $flipbox_if_html_tag,' ',$this->get_render_attribute_string('flipbox-container'); ?>>
	        <div class="advanced-flipbox-front-container">
	            <div class="advanced-flipbox-slider-display-table">
	                <div class="advanced-flipbox-vertical-align">
	                    <div class="advanced-flipbox-padding">
	                        
	                        <div class="advanced-flipbox-content">
	                           <p><?php echo __( $settings['advanced_flipbox_front_side_text'], 'advamentor' ); ?></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class="advanced-flipbox-rear-container">
	            <div class="advanced-flipbox-slider-display-table">
	                <div class="advanced-flipbox-vertical-align">
	                    <div class="advanced-flipbox-padding">
	                        <div class="advanced-flipbox-content">
	                           <p><?php echo __( $settings['advanced_flipbox_back_text'], 'advamentor' ); ?></p>
	                        </div>

	                        <?php if( $settings['flipbox_link_type'] == 'button' && ! empty($settings['flipbox_button_text']) ) : ?>
	                        	<a <?php echo $this->get_render_attribute_string('advanced-flipbox-button-container'); ?>>
	                        		<?php if( ! empty($settings['button_icon']) && 'before' == $settings['button_icon_position'] ) : ?>
	                        			<i class="<?php echo $settings['button_icon']; ?>"></i>
	                        		<?php endif; ?>
	                        		<?php echo esc_attr($settings['flipbox_button_text']); ?>
	                        		<?php if( ! empty($settings['button_icon']) && 'after' == $settings['button_icon_position'] ) : ?>
	                        			<i class="<?php echo $settings['button_icon']; ?>"></i>
	                        		<?php endif; ?>
	                        	</a>
	                        <?php endif; ?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </<?php echo $flipbox_if_html_tag; ?>>
	</div>

	<?php
	}
}
