<?php

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;



class wpsection_wps_language_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'wpsection_wps_language';
	}

	public function get_title() {
		return __( 'Language Switcher', 'wpsection' );
	}

	public function get_icon() {
		 return ' eicon-text-area
';
	}

	public function get_keywords() {
		return [ 'wpsection', 'menu' ];
	}

	  public function get_categories() {
          return ['wpsection_category'];
    }


	

	protected function register_controls() {
		$this->start_controls_section(
			'language_settings',
			[
				'label' => __( 'Language Switcher General', 'wpsection' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

	
	
	$this->add_control(
			'wps_language_header_title', [
				'label'       => esc_html__( 'Title', 'wpsection' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Lang',
				'dynamic'     => [
					'active' => true,
				],
			]
		);


  $this->add_control(
    'wps_language_header_title_icon',
    [
        'label' => esc_html__('Icon', 'wpsection'),
        'type' => Controls_Manager::ICONS,
        'default' => [
            'value' => 'fa fa-language',
            'library' => 'solid', 
        ],
    ]
);
	
	
	

		

 $this->add_control(
            'language_enable',
            [
                'label' => __('Language List show / hide', 'wpsection'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'wpsection'),
                'label_off' => __('No', 'wpsection'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'language_type',
            [
                'label' => __('Language Type', 'wpsection'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'custom_language'   => esc_html__( 'Custom Language', 'wpsection' ),
                    'using_short_code'   => esc_html__( 'Using Shortcode', 'wpsection' ), 
                ],
                'default' => 'custom_language',
                'condition' => [
                    'language_enable' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'lang_def_title',
            [
                'label' => __( 'Default Language Text', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'English', 'wpsection' ),
                'condition' => [
                    'language_type' => 'custom_language'
                ],
            ]
            
      
            
            
        );
        
         $this->add_control(
             
        'language_def_image',
        [
            'label' => __( 'Image', 'wpsection' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
             'condition' => [
                    'language_type' => 'custom_language'
                ],
        ] 
             
        );
        
        $repeater_three = new \Elementor\Repeater();
        $repeater_three->add_control(
        'language_icon_image',
        [
            'label' => __( 'Image', 'wpsection' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ] 
       );
        $repeater_three->add_control(
            'language_text',
            [
                'label' => __( 'Language Text', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'English', 'wpsection' ),
            ]
        );
  
        $repeater_three->add_control(
            'language_link',
            [
                'label' => __( 'Link', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'wpsection' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'language_repeater',
            [
                'label' => __('Language Content', 'wpsection'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_three->get_controls(),
                'default' => [
                    [
                       'language_text' =>  __('Français', 'wpsection'),
                       'language_link' =>  __('#', 'wpsection'),
                    ],
                    [
                        'language_text' =>  __('Deutsch', 'wpsection'),
                        'language_link' =>  __('#', 'wpsection'),
                    ],
                    [
                        'language_text' =>  __('Pусский ', 'wpsection'),
                        'language_link' =>  __('#', 'wpsection'),
                    ], 
                ],
                'title_field' => '{{{ language_text }}}',
                'condition' => [
                    'language_type' => 'custom_language'
                ],
            ]
        ); 
        $this->add_control(
            'language_shortcode',
            [
                'label' => __( 'Language Shortcode', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( '[trp_language language="en_US"]', 'wpsection' ),
                'condition' => [
                    'language_type' => 'using_short_code'
                ],
            ]
        ); 




$this->end_controls_section();


// Style Settings

//start of style settings		
	
$this->start_controls_section(
            'wps_lang_settings',
            array(
                'label' => __( 'Area Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
   
       $this->add_control(
            'wps_lang_area_bg_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt-current-lang' => 'background: {{VALUE}} !important',
                ),
            )
        );

   	     $this->add_control(
            'wps_lang_area_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt-current-lang:hover' => 'background: {{VALUE}} !important',
                ),
            )
        );
	$this->add_control(
			'wps_lang_area_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'wps_menu_show_text' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .wps_language_shortcode .gt-current-lang' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_lang_area_margin',
            array(
                'label'     => __( 'Block Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_language_shortcode .gt-current-lang' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_lang_area_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt-current-lang',
            ]
        );
                
            $this->add_control(
            'wps_lang_area_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt-current-lang' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_lang_area_shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt-current-lang',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_lang_area_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt-current-lang:hover',
            ]
        );	
		

		$this->end_controls_section();
		
// Language Headaer area SEttings

$this->start_controls_section(
            'wps_main_settings',
            array(
                'label' => __( 'Main Lang Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
		

 $this->add_control(
            'wps_lang_icon_color',
            [
                'label' => esc_html__('Icon Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .language_pre_text i' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#222', 
            ]
        );
        $this->add_control(
            'wps_lang_icon_color_hover',
            [
                'label' => esc_html__('Icon Color Hover', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .language_pre_text i:hover' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#fff', 
            ]
        );
  
        $this->add_control(
            'wps_lang_icon_bg_hover',
            [
                'label' => esc_html__('Background Hover Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .language_pre_text:hover i' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#000', 
            ]
        );
		
		

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_lang_icon_typo',
                'label'    => __('Typography', 'wpsection'),
                'selector' => '{{WRAPPER}} .language_pre_text i',
            )
        );
		
			$this->add_control(
			'wps_lang_icon_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} .language_pre_text i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_lang_icon_border',
                'selector' => '{{WRAPPER}} .language_pre_text i',
            )
        );


        $this->add_control(
            'wps_lang_icon_radious',
            array(
                'label'     => __('Border Radius', 'wpsection'),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em'],

                'selectors' => array(
                    '{{WRAPPER}} .language_pre_text i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


$this->add_control(
			'hr_menu_one_x',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);



    	$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_lang_typography',
                'label'    => __( 'Text Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}}  .language_def_text',
            )
        );
		
	   $this->add_control(
            'wps_lang_text_olor',
            array(
                'label'     => __( 'Text Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .language_def_text' => 'color: {{VALUE}}',
                ),
            )
        );  
        

	$this->add_control(
			'wps_lang_text_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} .language_def_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);



     $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_lang_text_x_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .language_def_text',
            ]
        );
                
            $this->add_control(
            'wps_lang_text_x_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .language_def_text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		



		$this->end_controls_section();


//Single Menu=========				
		
$this->start_controls_section(
            'wps_lang_one_settings',
            array(
                'label' => __( 'First Level Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
		
	$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_lang_one_typography',
                'label'    => __( 'Title Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}}  .wps_language_shortcode .gt-current-lang',
  
                
            )
        );
		
	   $this->add_control(
            'wps_lang_one_color',
            array(
                'label'     => __( 'Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt-current-lang' => 'color: {{VALUE}} !important',
                ),
            )
        );
	
   
       $this->add_control(
            'wps_lang_one_bg_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt-current-lang' => 'background: {{VALUE}} !important',
                ),
            )
        );
  $this->add_control(
            'wps_lang_one_bg_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt-current-lang' => 'background: {{VALUE}} !important',
                ),
            )
        );

   	
	$this->add_control(
			'wps_lang_one_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .wps_language_shortcode .gt-current-lang' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_lang_one_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_language_shortcode .gt-current-lang' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_lang_one_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt-current-lang',
            ]
        );
                
            $this->add_control(
            'wps_lang_one_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt-current-lang' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_lang_one_shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt-current-lang',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_lang_one_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt-current-lang:hover',
            ]
        );	
		


$this->add_control(
			'hr_logo_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

// current Image
		
	 $this->add_control(
            'wps_lang_logo_width',
            [
                'label' => esc_html__( 'Logo Width ', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 3000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 60,
                ],
                'selectors' => [
                    '{{WRAPPER}} .wps_language_shortcode .gt-current-lang img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

	$this->add_control(
			'wps_lang_logo_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .wps_language_shortcode .gt-current-lang img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_lang_logo_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_language_shortcode .gt-current-lang img ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );



        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_lang_logo_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt-current-lang img',
            ]
        );
                
            $this->add_control(
            'wps_lang_logo_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt-current-lang img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_lang_logo_shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt-current-lang img',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_lang_logo_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt-current-lang img:hover',
            ]
        );

	$this->end_controls_section();


// Expanded Area ==============
//expand start of style settings		
	
$this->start_controls_section(
            'wps_lang_expand_settings',
            array(
                'label' => __( 'Expand Area Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
   
       $this->add_control(
            'wps_lang_ex_area_bg_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                 'default' => '#fff',
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt_options' => 'background: {{VALUE}} !important',
                ),
            )
        );

	 $this->add_control(
            'wps_lang_ex_area_width',
            [
                'label' => esc_html__( 'Area Width ', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 3000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 60,
                ],
                'selectors' => [
                    '{{WRAPPER}} .wps_language_shortcode .gt_options.gt-open' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


   	     $this->add_control(
            'wps_lang_ex_area_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt_options:hover' => 'background: {{VALUE}} !important',
                ),
            )
        );
	$this->add_control(
			'wps_lang_ex_area_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'wps_menu_show_text' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .wps_language_shortcode .gt_options' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_lang_ex_area_margin',
            array(
                'label'     => __( 'Block Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_language_shortcode .gt_options' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_lang_ex_area_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt_options',
            ]
        );
                
            $this->add_control(
            'wps_lang_ex_area_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt_options' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_lang_ex_area_shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt_options',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_lang_ex_area_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt_options:hover',
            ]
        );	
		

		$this->end_controls_section();
		

//Expand Single Menu=========				
		
$this->start_controls_section(
            'wps_lang_ex_one_settings',
            array(
                'label' => __( 'Expanded  Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
		
	$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_lang_ex_one_typography',
                'label'    => __( 'Expanded Title Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}}  .wps_language_shortcode .gt_options a ',
            )
        );
		
	   $this->add_control(
            'wps_lang_one_ex_color',
            array(
                'label'     => __( 'Color', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt_options a ' => 'color: {{VALUE}} !important',
                ),
            )
        );
	
   
       $this->add_control(
            'wps_lang_one_ex_bg_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt_options a ' => 'background: {{VALUE}} !important',
                ),
            )
        );
  $this->add_control(
            'wps_lang_one_ex_bg_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt_options a ' => 'background: {{VALUE}} !important',
                ),
            )
        );

   	
	$this->add_control(
			'wps_lang_one_ex_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .wps_language_shortcode .gt_options a ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_lang_one_ex_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_language_shortcode .gt_options a ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_lang_one_ex_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt_options a ',
            ]
        );
                
            $this->add_control(
            'wps_lang_one_ex_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt_options a ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_lang_one_ex_shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt_options a ',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_lang_one_ex_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt_options a :hover',
            ]
        );	
		


$this->add_control(
			'hr_logoex_',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

// current Image
		
	 $this->add_control(
            'wps_lang_ex_logo_width',
            [
                'label' => esc_html__( 'Logo Width ', 'wpsection' ),
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
                    'unit' => 'px',
                    'size' => 60,
                ],
                'selectors' => [
                    '{{WRAPPER}} .wps_language_shortcode .gt_options img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

	$this->add_control(
			'wps_lang_ex_logo_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .wps_language_shortcode .gt_options img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_lang_ex_logo_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_language_shortcode .gt_options img ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );



        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_lang_ex_logo_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt_options   img',
            ]
        );
                
            $this->add_control(
            'wps_lang_logo_ex_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_language_shortcode .gt_options img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_lang_ex_logo_shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt_options img ',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_lang_ex_logo_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_language_shortcode .gt_options   img:hover',
            ]
        );

	$this->end_controls_section();

				
//End 
	}

	protected function render() {
		global $plugin_root;
		$settings = $this->get_settings_for_display();

?>

<?php
 echo '
 <style>
 
 //CSS code Will be here 
 


.language_shortcode {
    position: relative
}

.language_shortcode .gt_float_switcher .gt-selected {
    background: 0 0!important;
	z-index: 99 !important;
}

.language_shortcode .gt-current-lang {
    display: flex;
    align-items: center
}

.language_shortcode .gt_float_switcher-arrow {
    background-image: unset!important;
    transform: unset!important;
    background-size: unset!important;
    height: unset!important
}


.language_shortcode .gt_float_switcher {
    background: unset!important;
    box-shadow: unset!important;
    display: flex!important;
    font-size: 17px!important;
    line-height: normal!important;
    text-transform: capitalize!important;
}

.language_shortcode .gt_float_switcher img {
    position: relative;

}

.language_shortcode .gt_float_switcher .gt_options {
    min-width: 240px;
    position: absolute!important;
    top: 100%;
}

.language_shortcode .gt_float_switcher .gt_options a {
    font-size: 16px;
    font-weight: 600;
    border-bottom: 1px solid var(--color-set-one-bor-1);
    transition: .5s ease-in-out;
    -ms-transition: .5s ease-in-out;
    -moz-transition: .5s ease-in-out;
    -o-transition: .5s ease-in-out
}


.wps_language_switcher .custom-dropdown {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

.wps_language_switcher .selected-option {
  padding: 10px;
  border: 1px solid #ccc;
}

.wps_language_switcher .dropdown-options {
  display: none;
  position: absolute;
  background-color: #fff;
  border: 1px solid #ccc;
  z-index: 1;
}

.wps_language_switcher .option {
  padding: 10px;
  cursor: pointer;
}

.wps_language_switcher .custom-dropdown.open .dropdown-options {
  display: block;
}
 
 
 
 .wps_language_shortcode {
    display: flex;
}

.language_pre_text {
    display: flex;
    align-items: center;
}

.wps_language_switcher .selected-option {
    display: flex;
    border: none;
}
.wps_language_switcher {
    z-index: 99;
    position: relative;
}
.wps_language_switcher .option {
    display: flex;
    align-items: center;
}

.wps_language_switcher .dropdown-options {
    width: 160px;
}
.wps_language_switcher .selected-option img {width: 28px;margin-right: 9px;flex-shrink: 0;}
 //CSS code End Here
 
</style>';		
		

	

echo '
<script>
document.addEventListener("DOMContentLoaded", function() {
  var dropdown = document.getElementById("language-dropdown");

  // Add null check for the dropdown
  if (!dropdown) return;

  var selectedOption = dropdown.querySelector(".selected-option");
  var options = dropdown.querySelectorAll(".option");

  selectedOption.addEventListener("click", function() {
    dropdown.classList.toggle("open");
  });

  options.forEach(function(option) {
    option.addEventListener("click", function() {
      var url = this.getAttribute("data-value");
      if (url) {
        window.open(url, "_blank");
        selectedOption.textContent = this.textContent;
        dropdown.classList.remove("open");
      }
    });
  });

  // Close dropdown when clicking outside
  window.addEventListener("click", function(e) {
    if (!dropdown.contains(e.target) && !selectedOption.contains(e.target)) {
      dropdown.classList.remove("open");
    }
  });
});
</script>';



?>

<div class="wps_language_shortcode">
    <div class="language_pre_text">
        <i class="<?php echo esc_attr($settings['wps_language_header_title_icon']['value']); ?>"></i>
        <span class="language_def_text">
            <?php echo esc_html($settings['wps_language_header_title']); ?>
        </span>
    </div>

    <?php if ($settings['language_enable'] == true) : ?>
        <?php if ($settings['language_type'] == 'using_short_code') : ?>
            <div class="language_shortcode">
                <?php echo do_shortcode(wp_kses_post($settings['language_shortcode'])); ?>
            </div>
        <?php else : ?>
            <div class="wps_language_switcher">
                <div class="custom-dropdown" id="language-dropdown">

                    <div class="selected-option gt-current-lang">
                        <img src="<?php echo esc_url($settings['language_def_image']['url']); ?>">
                        <span class="gt-lang-code">
                            <?php echo esc_html($settings['lang_def_title']); ?>
                        </span>
                    </div>

                    <div class="dropdown-options gt_options gt-open">
                        <?php foreach ($settings['language_repeater'] as $key => $lang_repeater) :
                            if (!empty($lang_repeater['language_text'])) :
                                $language_value = !empty($lang_repeater['language_link']['url']) ? esc_url($lang_repeater['language_link']['url']) : '#';
                        ?>
                       <a class="option" data-value="<?php echo esc_attr($language_value); ?>">
    <img src="<?php echo esc_url($lang_repeater['language_icon_image']['url']); ?>" alt="<?php echo esc_attr($lang_repeater['language_text']); ?>">
    <?php echo esc_html($lang_repeater['language_text']); ?>
</a>

						
                        <?php
                            endif;
                        endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>




<?php

	}
}

// Register widget
Plugin::instance()->widgets_manager->register( new \wpsection_wps_language_Widget() );