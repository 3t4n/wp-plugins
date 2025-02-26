<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Advanced_Image_Box extends Widget_Base {

	public function get_name() {
		return 'advanced-image-box';
	}

	public function get_title() {
		return esc_html__( 'Advanced Image Box', 'advamentor' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

    public function get_categories() {
        return [ 'advamentor' ];
    }

	protected function _register_controls() {

  		/**
  		 * Imagebox Image Settings
  		 */
  		$this->start_controls_section(
  			'advanced_section_imagebox_content_settings',
  			[
  				'label' => esc_html__( 'Imagebox Image', 'advamentor' )
  			]
  		);

  		$this->add_control(
		  'imagebox_styles',
		  	[
		   	'label'       	=> esc_html__( 'Imagebox Styles', 'advamentor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'style1',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'style1'  	=> esc_html__( 'Style 1', 'advamentor' ),
		     		'style2' 	=> esc_html__( 'Style 2', 'advamentor' ),
		     		'style3' 	=> esc_html__( 'Style 3', 'advamentor' ),
		     	],
		     	'prefix_class' => 'imagebox-'
		  	]
		);



		$this->add_responsive_control(
			'imagebox_image_icon',
			[
				'label' => esc_html__( 'Image or Icon', 'advamentor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'none' => [
						'title' => esc_html__( 'None', 'advamentor' ),
						'icon' => 'fa fa-ban',
					],
					
					'icon' => [
						'title' => esc_html__( 'Icon', 'advamentor' ),
						'icon' => 'fa fa-info-circle',
					],
					'img' => [
						'title' => esc_html__( 'Image', 'advamentor' ),
						'icon' => 'fa fa-picture-o',
					]
				],
				'default' => 'icon',
			]
		);

		/**
		 * Condition: 'imagebox_image_icon' => 'img'
		 */
		$this->add_control(
			'imagebox_image',
			[
				'label' => esc_html__( 'Imagebox Image', 'advamentor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'imagebox_image_icon' => 'img'
				]
			]
		);

		$this->add_control(
			'imagebox_icon',
			[
				'label' => esc_html__( 'Icon', 'advamentor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-file-code-o',
				'condition' => [
					'imagebox_image_icon' => 'icon'
				]
			]
		);
		

		$this->end_controls_section();

		/**
		 * Imagebox Content
		 */
		$this->start_controls_section(
			'imagebox_content',
			[
				'label' => esc_html__( 'Imagebox Content', 'advamentor' ),
			]
		);
		$this->add_control(
			'imagebox_title',
			[
				'label' => esc_html__( 'Imagebox Title', 'advamentor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic' => [
					'active' => true
				],
				'default' => esc_html__( 'APP DEVELOPMENT', 'advamentor' )
			]
		);
		$this->add_control(
            'imagebox_text_type',
            [
                'label'                 => __( 'Content Type', 'advamentor' ),
                'type'                  => Controls_Manager::SELECT,
                'options'               => [
                    'content'       => __( 'Content', 'advamentor' ),
                    'template'      => __( 'Saved Templates', 'advamentor' ),
                ],
                'default'               => 'content',
            ]
        );

		$this->add_control(
			'imagebox_text',
			[
				'label' => esc_html__( 'Imagebox Content', 'advamentor' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'dynamic' => [
					'active' => true
				],
				'default' => esc_html__( 'Consequat interdum varius sit amet.
										Sem viverra aliquet eget sit amet
										tellus cras. Elit ut aliquam purus sit
										amet. Urna et pharetra pharetra
										massa massa ultricies mi.', 'advamentor' ),
				'condition' => [
					'imagebox_text_type'      => 'content',
				],
			]
		);
		$this->add_control(
			'advanced_show_imagebox_content',
			[
				'label' => __( 'Show Content', 'advamentor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Show', 'advamentor' ),
				'label_off' => __( 'Hide', 'advamentor' ),
				'return_value' => 'yes',
			]
		);
		$this->add_responsive_control(
			'imagebox_content_alignment',
			[
				'label' => esc_html__( 'Content Alignment', 'advamentor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'advamentor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'advamentor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'advamentor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'prefix_class' => 'advanced-imagebox-content-align-',
				'condition' => [
					'imagebox_styles' => 'style1'
				]
			]
		);
		$this->end_controls_section();

		/**
		 * ----------------------------------------------
		 * Imagebox Button
		 * ----------------------------------------------
		 */
		$this->start_controls_section(
			'imagebox_button',
			[
				'label' => esc_html__( 'Link', 'advamentor' )
			]
		);

		$this->add_control(
			'advanced_show_imagebox_button',
			[
				'label' => __( 'Show Imagebox Button', 'advamentor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'advamentor' ),
				'label_off' => __( 'No', 'advamentor' ),
				'condition'	=> [
					'advanced_show_imagebox_clickable!'	=> 'yes',
				]
			]
		);

		$this->add_control(
			'advanced_show_imagebox_clickable',
			[
				'label' => __( 'Imagebox Clickable', 'advamentor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'label_on' => __( 'Yes', 'advamentor' ),
				'label_off' => __( 'No', 'advamentor' ),
				'return_value' => 'yes',
				'condition'	=> [
					'advanced_show_imagebox_button!'	=> 'yes',
					
				]
			]
		);

		$this->add_control(
			'advanced_show_imagebox_clickable_link',
			[
				'label' => esc_html__( 'Imagebox Link', 'advamentor' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'default' => [
        			'url' => 'http://',
        			'is_external' => '',
     			],
     			'show_external' => true,
     			'condition' => [
     				'advanced_show_imagebox_clickable' => 'yes'
     			]
			]
		);

		$this->add_control(
			'imagebox_button_text',
			[
				'label' => __( 'Button Text', 'advamentor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'KNOW MORE',
				'separator'	=> 'before',
				'placeholder' => __( 'Enter button text', 'advamentor' ),
				'title' => __( 'Enter button text here', 'advamentor' ),
				'condition'	=> [
					'advanced_show_imagebox_button'	=> 'yes'
				]
			]
		);

		$this->add_control(
			'imagebox_button_link_url',
			[
				'label' => __( 'Link URL', 'advamentor' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => __( 'Enter link URL for the button', 'advamentor' ),
				'show_external'	=> true,
				'default'		=> [
					'url'	=> '#'
				],
				'title' => __( 'Enter heading for the button', 'advamentor' ),
				'condition'	=> [
					'advanced_show_imagebox_button'	=> 'yes'
				]
			]
		);
		
		$this->add_control(
			'imagebox_button_icon',
			[
				'label' => esc_html__( 'Icon', 'advamentor' ),
				'type' => Controls_Manager::ICON,
				'condition'	=> [
					'advanced_show_imagebox_button'	=> 'yes'
				]
			]
		);

		$this->add_control(
			'imagebox_button_icon_alignment',
			[
				'label' => esc_html__( 'Icon Position', 'advamentor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'advamentor' ),
					'right' => esc_html__( 'After', 'advamentor' ),
				],
				'condition' => [
					'imagebox_button_icon!' => '',
					'advanced_show_imagebox_button'	=> 'yes'
				],
			]
		);

		$this->add_control(
			'imagebox_button_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'advamentor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 60,
					],
				],
				'condition' => [
					'imagebox_button_icon!' => '',
					'advanced_show_imagebox_button'	=> 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .imagebox_button_icon_right' => 'margin-left: {{SIZE}}px;',
					'{{WRAPPER}} .imagebox_button_icon_left' => 'margin-right: {{SIZE}}px;',
				],
			]
		);
		$this->end_controls_section();

		
		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Image)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'advanced_section_imagebox_imgae_style_settings',
			[
				'label' => esc_html__( 'Image Style', 'advamentor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				
			]
		);

		$this->add_control(
			'imagebox_background_image_style1',
			[
				'label' => esc_html__( 'Imagebox Background Image', 'advamentor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url'   => plugin_dir_url( dirname( __FILE__ ) ) . '/assets/front/images/bg-white.jpg'
				],
				'selectors' => [
								'{{WRAPPER}} .advanced-imagebox' => 'background-image: url("{{URL}}");',
								
							],
				'condition' => [
					'imagebox_styles' => 'style1'
				]

				
			]
		);

		$this->add_control(
			'imagebox_background_image_style2',
			[
				'label' => esc_html__( 'Imagebox Background Image', 'advamentor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url'   => plugin_dir_url( dirname( __FILE__ ) ) . '/assets/front/images/bg-white.jpg'
				],
				'selectors' => [
								'{{WRAPPER}} .advanced-imagebox' => 'background-image: url("{{URL}}");',
								
							],
				'condition' => [
					'imagebox_styles' => 'style2'
				]
			]
		);

		$this->add_control(
			'imagebox_background_image_style3',
			[
				'label' => esc_html__( 'Imagebox Background Image', 'advamentor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url'   => plugin_dir_url( dirname( __FILE__ ) ) . '/assets/front/images/bg-white.jpg'
				],
				'selectors' => [
								'{{WRAPPER}} .advanced-imagebox' => 'background-image: url("{{URL}}");',
								
							],
				'condition' => [
					'imagebox_styles' => 'style3'
				]
			]
		);

		$this->add_control(
			'imagebox_background_image_style4',
			[
				'label' => esc_html__( 'Imagebox Background Image', 'advamentor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url'   => plugin_dir_url( dirname( __FILE__ ) ) . '/assets/front/images/bg-white.jpg'
				],
				'selectors' => [
								'{{WRAPPER}} .advanced-imagebox' => 'background-image: url("{{URL}}");',
								
							],
				'condition' => [
					'imagebox_styles' => 'style4'
				]
			]
		);

		$this->start_controls_tabs('imagebox_image_style');


				$this->add_control(
					'imagebox_image_icon_bg_color',
					[
						'label' => esc_html__( 'Background Color', 'advamentor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .advanced-imagebox .imagebox-icon img' => 'background-color: {{VALUE}};',
						]
					]
				);

				$this->add_responsive_control(
					'imagebox_image_icon_padding',
					[
						'label' => esc_html__( 'Padding', 'advamentor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
							'{{WRAPPER}} .advanced-imagebox .imagebox-icon img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						 ],
					]
				);

				$this->add_group_control(
					Group_Control_Border::get_type(),
						[
							'name' => 'imagebox_image_border',
							'label' => esc_html__( 'Border', 'advamentor' ),
							'selector' => '{{WRAPPER}} .advanced-imagebox .imagebox-icon img'
						]
				);
		
				$this->add_control(
				'imagebox_img_shape',
					[
					'label'     	=> esc_html__( 'Image Shape', 'advamentor' ),
						'type' 			=> Controls_Manager::SELECT,
						'default' 		=> 'square',
						'label_block' 	=> false,
						'options' 		=> [
							'square'  	=> esc_html__( 'Square', 'advamentor' ),
							'circle' 	=> esc_html__( 'Circle', 'advamentor' ),
						
						],
						'prefix_class' => 'advanced-imagebox-shape-',
						'condition' => [
							'imagebox_image_icon' => 'img'
						]
					]
				);

			$this->end_controls_tab();

			

		$this->end_controls_tabs();

		$this->add_control(
			'imagebox_image_resizer',
			[
				'label' => esc_html__( 'Image Resizer', 'advamentor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => '200'
				],
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .advanced-imagebox .imagebox-icon img' => 'width: {{SIZE}}px;',
					
					
				]
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'full',
				'condition' => [
					'imagebox_image[url]!' => '',
				],
				'condition' => [
					'imagebox_image_icon' => 'img',
				]
			]
		);

		$this->add_responsive_control(
			'imagebox_img_margin',
			[
				'label' => esc_html__( 'Margin', 'advamentor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .advanced-imagebox .imagebox-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->end_controls_section();


		

		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Icon Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'advanced_section_imagebox_icon_style_settings',
			[
				'label' => esc_html__( 'Icon Style', 'advamentor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
		     		'imagebox_image_icon' => 'icon'
		     	]
			]
		);

		$this->add_responsive_control(
    		'imagebox_icon_size',
    		[
        		'label' => __( 'Icon Size', 'advamentor' ),
       		'type' => Controls_Manager::SLIDER,
        		'default' => [
            	'size' => 40,
        		],
        		'range' => [
            	'px' => [
                	'min' => 20,
                	'max' => 100,
                	'step' => 1,
            	]
        		],
        		'selectors' => [
            	'{{WRAPPER}} .advanced-imagebox .imagebox-icon i' => 'font-size: {{SIZE}}px;',
        		],
    		]
		);

		$this->add_responsive_control(
    		'imagebox_icon_bg_size',
    		[
        		'label' => __( 'Icon Background Size', 'advamentor' ),
       			'type' => Controls_Manager::SLIDER,
        		'default' => [
            		'size' => 90,
        		],
        		'range' => [
            		'px' => [
                		'min' => 0,
                		'max' => 300,
                		'step' => 1,
            		]
        		],
        		'selectors' => [
            		'{{WRAPPER}} .advanced-imagebox .imagebox-icon .imagebox-icon-wrap' => 'width: {{SIZE}}px; height: {{SIZE}}px;',
        		],
        		'condition' => [
					'imagebox_icon_bg_shape!' => 'none'
				]
    		]
		);

		$this->add_responsive_control(
			'imagebox_icon_padding',
			[
				'label' => esc_html__( 'Padding', 'advamentor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .advanced-imagebox .imagebox-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'imagebox_icon_margin',
			[
				'label' => esc_html__( 'Margin', 'advamentor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .advanced-imagebox .imagebox-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

			$this->start_controls_tabs( 'imagebox_icon_style_controls' );

				$this->start_controls_tab(
					'imagebox_icon_normal',
					[
						'label'		=> esc_html__( 'Normal', 'advamentor' ),
					]
				);

					$this->add_control(
						'imagebox_icon_color',
						[
							'label' => esc_html__( 'Icon Color', 'advamentor' ),
							'type' => Controls_Manager::COLOR,
							'default' => '#284DEA',
							'selectors' => [
								'{{WRAPPER}} .advanced-imagebox .imagebox-icon i' => 'color: {{VALUE}};',
								'{{WRAPPER}} .advanced-imagebox.icon-beside-title .imagebox-content .title figure i' => 'color: {{VALUE}};',
							],
						]
					);

			
					$this->add_control(
						'imagebox_icon_bg_color',
						[
							'label' => esc_html__( 'Background Color', 'advamentor' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .advanced-imagebox .imagebox-icon .imagebox-icon-wrap' => 'background: {{VALUE}};',
							],
							'condition' => [
								'imagebox_icon_bg_shape!' => 'none',
							]
						]
					);
			
					$this->add_group_control(
						Group_Control_Border::get_type(),
							[
								'name' => 'imagebox_icon_border',
								'label' => esc_html__( 'Border', 'advamentor' ),
								'selector' => '{{WRAPPER}} .advanced-imagebox .imagebox-icon-wrap'
							]
					);
			
					$this->add_group_control(
						Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'imagebox_icon_shadow',
							'selector' => '{{WRAPPER}} .advanced-imagebox .imagebox-icon-wrap',
						]
					);

				$this->end_controls_tab();


				$this->start_controls_tab(
					'imagebox_icon_hover',
					[
						'label'		=> esc_html__( 'Hover', 'advamentor' ),
					]
				);


				$this->add_control(
					'imagebox_icon_hover_color',
					[
						'label' => esc_html__( 'Icon Color', 'advamentor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#4d4d4d',
						'selectors' => [
							'{{WRAPPER}} .advanced-imagebox:hover .imagebox-icon i' => 'color: {{VALUE}};',
							'{{WRAPPER}} .advanced-imagebox.icon-beside-title:hover .imagebox-content .title figure i' => 'color: {{VALUE}};',
						],
					]
				);
		
				$this->add_control(
					'imagebox_icon_hover_bg_color',
					[
						'label' => esc_html__( 'Background Color', 'advamentor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .advanced-imagebox:hover .imagebox-icon .imagebox-icon-wrap' => 'background: {{VALUE}};',
						],
						'condition' => [
							'imagebox_styles!' => ['style2', 'style3'],
							'imagebox_icon_bg_shape!' => 'none',
						]
					]
				);
		
				$this->add_control(
				  'imagebox_icon_hover_bg_shape',
					  [
					   'label'     	=> esc_html__( 'Background Shape', 'advamentor' ),
						 'type' 			=> Controls_Manager::SELECT,
						 'default' 		=> 'none',
						 'label_block' 	=> false,
						 'options' 		=> [
							 'none'  	=> esc_html__( 'None', 'advamentor' ),
							 'circle' 	=> esc_html__( 'Circle', 'advamentor' ),
							 'radius' 	=> esc_html__( 'Radius', 'advamentor' ),
							 'square' 	=> esc_html__( 'Square', 'advamentor' ),
						 ],
						 'prefix_class' => 'advanced-imagebox-icon-hover-bg-shape-',
					  ]
				);
		
				$this->add_group_control(
					Group_Control_Border::get_type(),
						[
							'name' => 'imagebox_hover_icon_border',
							'label' => esc_html__( 'Border', 'advamentor' ),
							'selector' => '{{WRAPPER}} .advanced-imagebox:hover .imagebox-icon-wrap'
						]
				);
		
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'imagebox_icon_hover_shadow',
						'selector' => '{{WRAPPER}} .advanced-imagebox:hover .imagebox-icon-wrap',
					]
				);

				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style ( Info Box Button Style )
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'advanced_section_imagebox_button_settings',
			[
				'label' => esc_html__( 'Button Styles', 'advamentor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'advanced_show_imagebox_button'	=> 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
			'name' => 'imagebox_button_typography',
				'selector' => '{{WRAPPER}} .advanced-imagebox .imagebox-button a.advanced-imagebox-button',
			]
		);

		$this->add_responsive_control(
			'advanced_creative_button_padding',
			[
				'label' => esc_html__( 'Button Padding', 'advamentor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .advanced-imagebox .imagebox-button a.advanced-imagebox-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'imagebox_button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'advamentor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .advanced-imagebox .imagebox-button a.advanced-imagebox-button' => 'border-radius: {{SIZE}}px;'
				],
			]
		);

		$this->start_controls_tabs('imagebox_button_styles_controls_tabs');

			$this->start_controls_tab('imagebox_button_normal', [
				'label' => esc_html__( 'Normal', 'advamentor' )
			]);

				$this->add_control(
					'imagebox_button_text_color',
					[
						'label' => esc_html__( 'Text Color', 'advamentor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#000000',
						'selectors'	=> [
							'{{WRAPPER}} .advanced-imagebox .advanced-imagebox-button' => 'color: {{VALUE}};'
						]
					]
				);

				$this->add_control(
					'imagebox_button_background_color',
					[
						'label' => esc_html__( 'Background Color', 'advamentor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#ffffff',
						'selectors'	=> [
							'{{WRAPPER}} .advanced-imagebox .advanced-imagebox-button' => 'background: {{VALUE}};'
						]
					]
				);

				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'imagebox_button_border',
						'fields_options' => [
							'border' => [
								'default' => 'solid',
							],
							'width' => [
								'default' => [
									'top' => '2',
									'right' => '2',
									'bottom' => '2',
									'left' => '2',
									'isLinked' => false,
								],
							],
							'color' => [
								'default' => '#284DEA',
							],
						],
						'selector' => '{{WRAPPER}} .advanced-imagebox .advanced-imagebox-button',

					]
				);

				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'button_box_shadow',
						'selector' => '{{WRAPPER}} .advanced-imagebox .advanced-imagebox-button',
					]
				);

			$this->end_controls_tab();

			$this->start_controls_tab('imagebox_button_hover', [
				'label' => esc_html__( 'Hover', 'advamentor' )
			]);

				$this->add_control(
					'imagebox_button_hover_text_color',
					[
						'label' => esc_html__( 'Text Color', 'advamentor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#ffffff',
						'selectors'	=> [
							'{{WRAPPER}} .advanced-imagebox .advanced-imagebox-button:hover' => 'color: {{VALUE}};'
						]
					]
				);

				$this->add_control(
					'imagebox_button_hover_background_color',
					[
						'label' => esc_html__( 'Background Color', 'advamentor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#284DEA',
						'selectors'	=> [
							'{{WRAPPER}} .advanced-imagebox .advanced-imagebox-button:hover' => 'background: {{VALUE}};'
						]
					]
				);

				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'imagebox_button_hover_border',
						'selector' => '{{WRAPPER}} .advanced-imagebox .advanced-imagebox-button:hover',
					]
				);

				

				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'button_hover_box_shadow',
						'selector' => '{{WRAPPER}} .advanced-imagebox .advanced-imagebox-button:hover',
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'advanced_section_imagebox_title_style_settings',
			[
				'label' => esc_html__( 'Color and Typography', 'advamentor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

			$this->start_controls_tabs('imagebox_content_hover_style_tab');

					$this->start_controls_tab('imagebox_content_normal_style', [
						'label'	=> esc_html__( 'Normal', 'advamentor' )
					]);

					$this->add_control(
						'imagebox_title_heading',
						[
							'label' => esc_html__( 'Title Style', 'advamentor' ),
							'type' => Controls_Manager::HEADING,
						]
					);
			
					$this->add_control(
						'imagebox_title_color',
						[
							'label' => esc_html__( 'Color', 'advamentor' ),
							'type' => Controls_Manager::COLOR,
							'default' => '#000000',
							'selectors' => [
								'{{WRAPPER}} .advanced-imagebox .imagebox-content .title' => 'color: {{VALUE}};',
							],
						]
					);
			
					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
						'name' => 'imagebox_title_typography',
							'selector' => '{{WRAPPER}} .advanced-imagebox .imagebox-content .title',
						]
					);
			
					$this->add_responsive_control(
						'imagebox_title_margin',
						[
							'label' => esc_html__( 'Margin', 'advamentor' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
									'{{WRAPPER}} .advanced-imagebox .imagebox-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_control(
						'imagebox_content_heading',
						[
							'label' => esc_html__( 'Content Style', 'advamentor' ),
							'type' => Controls_Manager::HEADING,
							'separator' => 'before'
						]
					);

					$this->add_responsive_control(
						'imagebox_content_margin',
						[
							'label' => esc_html__( 'Content Only Margin', 'advamentor' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
									'{{WRAPPER}} .advanced-imagebox .imagebox-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'imagebox_content_background',
						[
							'label' => esc_html__( 'Content Only Background', 'advamentor' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .advanced-imagebox .imagebox-content' => 'background: {{VALUE}};',
							],
						]
					);

					$this->add_responsive_control(
						'imagebox_content_only_padding',
						[
							'label' => esc_html__( 'Content Only Padding', 'advamentor' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .advanced-imagebox .imagebox-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'imagebox_content_color',
						[
							'label' => esc_html__( 'Color', 'advamentor' ),
							'type' => Controls_Manager::COLOR,
							'default' => '#000000',
							'selectors' => [
								'{{WRAPPER}} .advanced-imagebox .imagebox-content p' => 'color: {{VALUE}};',
							],
						]
					);
			
					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
						'name' => 'imagebox_content_typography_hover',
							'selector' => '{{WRAPPER}} .advanced-imagebox .imagebox-content p',
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab('imagebox_content_hover_style', [
					'label'	=> esc_html__( 'Hover', 'advamentor' )
				]);

					$this->add_control(
						'imagebox_title_hover_color',
						[
							'label' => esc_html__( 'Title Color', 'advamentor' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .advanced-imagebox:hover .imagebox-content h4' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'imagebox_content_hover_color',
						[
							'label' => esc_html__( 'Content Color', 'advamentor' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .advanced-imagebox:hover .imagebox-content p' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'imagebox_content_transition',
						[
							'label'		=> esc_html__( 'Transition', 'advamentor' ),
							'description'		=> esc_html__( 'Transition will applied to ms (ex: 300ms).', 'advamentor' ),
							'type'		=> Controls_Manager::NUMBER,
							'separator'	=> 'before',
							'min'		=> 100,
							'max'		=> 1000,
							'default'	=> 100,
							'selectors'	=> [
								'{{WRAPPER}} .advanced-imagebox:hover .imagebox-content h4' => 'transition: {{SIZE}}ms;',
								'{{WRAPPER}} .advanced-imagebox:hover .imagebox-content p' => 'transition: {{SIZE}}ms;'
							]
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();
		

	}

	/**
	 * This function is responsible for rendering divs and contents
	 * for imagebox before partial.
	 * 
	 * @param	$settings
	 */
	protected function imagebox_before( $settings ) {

		$this->add_render_attribute('imagebox_inner', 'class', 'advanced-imagebox');
		

		$target = $settings['advanced_show_imagebox_clickable_link']['is_external'] ? 'target="_blank"' : '';
		$nofollow = $settings['advanced_show_imagebox_clickable_link']['nofollow'] ? 'rel="nofollow"' : '';

		ob_start();
		?>
		<?php if( 'yes' == $settings['advanced_show_imagebox_clickable'] ) : ?><a href="<?php echo esc_url( $settings['advanced_show_imagebox_clickable_link']['url'] ) ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php endif;?>
		<div <?php echo $this->get_render_attribute_string('imagebox_inner'); ?>>
		<?php
		echo ob_get_clean();
	}

	/**
	 * This function is rendering closing divs and tags
	 * of before partial for imagebox.
	 * 
	 * @param	$settings
	 */
	protected function imagebox_after($settings) {
		ob_start();?></div><?php
		if( 'yes' == $settings['advanced_show_imagebox_clickable'] ) : ?></a><?php endif;
		echo ob_get_clean();
	}

	/**
	 * This function is rendering appropriate icon for imagebox.
	 * 
	 * @param $settings
	 */
	protected function render_imagebox_icon($settings) {

		if( 'none' == $settings['imagebox_image_icon'] ) return;

		$imagebox_image = $this->get_settings( 'imagebox_image' );
		$imagebox_image_url = Group_Control_Image_Size::get_attachment_image_src( $imagebox_image['id'], 'thumbnail', $settings );
		if( empty( $imagebox_image_url ) ) : $imagebox_image_url = $imagebox_image['url']; else: $imagebox_image_url = $imagebox_image_url; endif;

		$this->add_render_attribute(
			'imagebox_icon',
			[
				'class' => ['imagebox-icon']
			]
		);

		
		if( 'icon' == $settings['imagebox_image_icon'] ) {
			$this->add_render_attribute('imagebox_icon', 'class', 'advanced-icon-only');
		}

		ob_start();
		?>
			<div <?php echo $this->get_render_attribute_string('imagebox_icon'); ?>>

				<?php if( 'img' == $settings['imagebox_image_icon'] ) : ?>
					<img src="<?php echo esc_url( $imagebox_image_url ); ?>" alt="Icon Image">
				<?php endif; ?>

				<?php if( 'icon' == $settings['imagebox_image_icon'] ) : ?>
				<div class="imagebox-icon-wrap">
					<i class="<?php echo esc_attr( $settings['imagebox_icon'] ); ?>"></i>
				</div>
				<?php endif; ?>

			</div>
		<?php
		echo ob_get_clean();
	}


	protected function render_imagebox_content( $settings ) {

		$this->add_render_attribute( 'imagebox_content', 'class', 'imagebox-content' );
		if( 'icon' == $settings['imagebox_image_icon'] )
			$this->add_render_attribute( 'imagebox_content', 'class', 'advanced-icon-only' );

		ob_start();
		?>
			<div <?php echo $this->get_render_attribute_string('imagebox_content'); ?>>
				<h4 class="title"><?php echo $settings['imagebox_title']; ?></h4>
				<?php if( 'yes' == $settings['advanced_show_imagebox_content'] ) : ?>
					<?php if( 'content' === $settings['imagebox_text_type'] ) : ?>
						<?php if ( ! empty( $settings['imagebox_text'] ) ) : ?>
							<p><?php echo $settings['imagebox_text']; ?></p>
						<?php endif; ?>
						<?php $this->render_imagebox_button($this->get_settings_for_display()); ?>
					<?php elseif( 'template' === $settings['imagebox_text_type'] ) :
						if ( !empty( $settings['advanced_primary_templates'] ) ) {
							$advanced_template_id = $settings['advanced_primary_templates'];
							$advanced_frontend = new Frontend;

							echo $advanced_frontend->get_builder_content( $advanced_template_id, true );
						}
					endif; ?>
				<?php endif; ?>
			</div>
		<?php

		echo ob_get_clean();
	}

	/**
	 * This function rendering imagebox button
	 * 
	 * @param $settings
	 */
	protected function render_imagebox_button( $settings ) {
		if('yes' == $settings['advanced_show_imagebox_clickable'] || 'yes' != $settings['advanced_show_imagebox_button']) return;

		$this->add_render_attribute('imagebox_button', 'class', 'advanced-imagebox-button' );

		if($settings['imagebox_button_link_url']['url'])
			$this->add_render_attribute('imagebox_button', 'href', esc_url($settings['imagebox_button_link_url']['url']) );

		if('on' == $settings['imagebox_button_link_url']['is_external'])
			$this->add_render_attribute('imagebox_button', 'target', '_blank');

		if('on' == $settings['imagebox_button_link_url']['nofollow'])
			$this->add_render_attribute('imagebox_button', 'rel', 'nofollow');

		$this->add_render_attribute('button_icon', [
			'class'	=> esc_attr($settings['imagebox_button_icon']),
			'aria-hidden'	=> 'true'
		]);

		if( 'left' == $settings['imagebox_button_icon_alignment'])
			$this->add_render_attribute('button_icon', 'class', 'imagebox_button_icon_left');

		if( 'right' == $settings['imagebox_button_icon_alignment'])
			$this->add_render_attribute('button_icon', 'class', 'imagebox_button_icon_right');

		ob_start();
		?>
		<div class="imagebox-button">
			<a <?php echo $this->get_render_attribute_string('imagebox_button'); ?>>
				<?php if( 'left' == $settings['imagebox_button_icon_alignment']) : ?><i <?php echo $this->get_render_attribute_string('button_icon'); ?>></i><?php endif; ?>
				<?php echo esc_attr($settings['imagebox_button_text']); ?>
				<?php if( 'right' == $settings['imagebox_button_icon_alignment']) : ?><i <?php echo $this->get_render_attribute_string('button_icon'); ?>></i><?php endif; ?>
			</a>
		</div>
		<?php
		echo ob_get_clean();
	}

	protected function render() {
		// dump( $this->get_settings_for_display() );

		$settings = $this->get_settings_for_display();

		// $bgcolor = $this->get_settings_for_display( 'imagebox_bg_color' );

		// $settings['_background_color'] = $bgcolor;

		$this->imagebox_before( $settings );
		$this->render_imagebox_icon( $settings );
		$this->render_imagebox_content( $settings );
		$this->imagebox_after( $settings );
	}

	protected function content_template() {}
}
