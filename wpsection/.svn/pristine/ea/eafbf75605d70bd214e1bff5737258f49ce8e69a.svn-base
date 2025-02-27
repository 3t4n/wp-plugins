<?php

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;



class wpsection_wps_menu_cat_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'wpsection_wps_menu_cat';
	}

	public function get_title() {
		return __( 'Menu Catagories', 'wpsection' );
	}

	public function get_icon() {
		 return ' eicon-mega-menu';
	}

	public function get_keywords() {
		return [ 'wpsection', 'menu' ];
	}

	  public function get_categories() {
          return ['wpsection_category'];
    }


	

	protected function register_controls() {
		$this->start_controls_section(
			'cat_menu_settings',
			[
				'label' => __( 'Catagories Menu General', 'wpsection' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		
$this->add_control(
    'show_menu_cat',
    array(
        'label' => esc_html__( 'Show Expand', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
            'show' => [
                'title' => esc_html__( 'Show', 'wpsection' ), 
                'icon' => 'eicon-check-circle',
            ],
            'none' => [
                'title' => esc_html__( 'Hide', 'wpsection' ),
                'icon' => 'eicon-close-circle',
            ],
        ],
        'default' => 'show',
    )
);

$this->add_control(
    'show_menu_cat_home',
    array(
        'label' => esc_html__( 'Show Expand Home Only', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
            'show' => [
                'title' => esc_html__( 'Show', 'wpsection' ), 
                'icon' => 'eicon-check-circle',
            ],
            'none' => [
                'title' => esc_html__( 'Hide', 'wpsection' ),
                'icon' => 'eicon-close-circle',
            ],
        ],
        'default' => 'show',
    )
);
	

	$this->add_control(
			'cat_menu_title', [
				'label'       => esc_html__( 'Title', 'wpsection' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'All Categories',
				'dynamic'     => [
					'active' => true,
				],
			]
		);


  $this->add_control(
    'wps_cat_menu_icon_one',
    [
        'label' => esc_html__('Icon', 'wpsection'),
        'type' => Controls_Manager::ICONS,
        'default' => [
            'value' => 'eicon-product-categories',
            'library' => 'solid', 
        ],
    ]
);
			
	
		
//repeter
    $repeater = new Repeater();

        $repeater->add_control(
            'cat_title', [
                'label'       => esc_html__( 'Title', 'wpsection' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Catagory Name',
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        
  
        $repeater->add_control(
    'cat_icon',
    [
        'label' => esc_html__('Icon', 'wpsection'),
        'type' => Controls_Manager::ICONS,
        'default' => [
            'value' => 'eicon-product-categories',
            'library' => 'solid', 
        ],
    ]
);



 $repeater->add_control(
            'cat_link',
            [
              'label' => __( 'Button Url', 'wpsection' ),
              'type' => Controls_Manager::URL,
              'placeholder' => __( 'https://your-link.com', 'wpsection' ),
              'show_external' => true,
              'default' => [
                'url' => '',
                'is_external' => true,
                'nofollow' => true,
              ],
            
           ]
        );

        
        $repeater->add_control(
            'cat_shortcode', [
                'label'       => esc_html__( 'Shortcode', 'wpsection' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Put Shortcode Here',
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );



        
        $this->add_control(
            'repeat',
            [
                'label'       => esc_html__( 'Catagories', 'wpsection' ),
                'show_label'  => false,
                'type'        => Controls_Manager::REPEATER,
                'separator'   => 'before',
                'title_field' => '{{ title }}',
                'dynamic'     => [
                    'active' => true,
                ],
                'default'     => [
                    [
                        'title' => esc_html__( 'Catagories Repet', 'wpsection' ),
                    ],
                ],
                'fields'      => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();


//end of the repeter 
//start of style settings		
	
$this->start_controls_section(
            'wps_cat_menu_settings',
            array(
                'label' => __( 'Menu Main Area Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
        
       	
 $this->add_control(
                    'wps_cat_menu__alingment',
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
                            '{{WRAPPER}}  .wps_menu_cat_menu' => 'text-align: {{VALUE}} !important',
                        ),
                    )
                ); 	
 
        
        
  
        
   
       $this->add_control(
            'wps_cat_menu_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_menu_cat_menu' => 'background: {{VALUE}} !important',
                ),
            )
        );

   	     $this->add_control(
            'wps_cat_menu_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_menu_cat_menu:hover' => 'background: {{VALUE}} !important',
                ),
            )
        );
	$this->add_control(
			'wps_cat_menu_block_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} .wps_menu_cat_menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_cat_menu_block_margin',
            array(
                'label'     => __( 'Block Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_menu_cat_menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_cat_menu_block_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_menu_cat_menu',
            ]
        );
                
        $this->add_control(
            'wps_cat_menu_block_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_menu_cat_menu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_cat_menu_block_shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_menu_cat_menu',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_cat_menu_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_menu_cat_menu:hover',
            ]
        );	
		



$this->add_control(
			'hr_menu_one',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);



    	$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_cat_menu_one_typography',
                'label'    => __( 'Text Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}}  .wps_menu_cat_text',
            )
        );
		
	   $this->add_control(
            'wps_cat_menu_one_color',
            array(
                'label'     => __( 'Text Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_menu_cat_text' => 'color: {{VALUE}} !important',
                ),
            )
        );  
        

	$this->add_control(
			'wps_cat_menu_text_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} .wps_menu_cat_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);


$this->add_control(
			'hr_menu_w',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);


 $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wps_menu_cat_menu i' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#222', 
            ]
        );
        $this->add_control(
            'icon_color_hover',
            [
                'label' => esc_html__('Icon Color Hover', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wps_menu_cat_menu i:hover' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#fff', 
            ]
        );
  
        $this->add_control(
            'wps_project_icon_bg_hover',
            [
                'label' => esc_html__('Background Hover Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wps_menu_cat_menu:hover i' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#000', 
            ]
        );
		
		

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_projce_icon_typo',
                'label'    => __('Typography', 'wpsection'),
                'selector' => '{{WRAPPER}} .wps_menu_cat_menu .manucat_icon',
            )
        );
		
			$this->add_control(
			'wps_projce_icon_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} .wps_menu_cat_menu i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_project_icon_border',
                'selector' => '{{WRAPPER}} .wps_menu_cat_menu i',
            )
        );


        $this->add_control(
            'wps_project_icon_radious',
            array(
                'label'     => __('Border Radius', 'wpsection'),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em'],

                'selectors' => array(
                    '{{WRAPPER}} .wps_menu_cat_menu i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		$this->end_controls_section();
		

//2nd Level

$this->start_controls_section(
            'wps_cat_menu_two_settings',
            array(
                'label' => __( '2nd  Ul Level Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
        
       	




   $this->add_control(
            'ul_wps_cat_menu_second_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat_ul' => 'background: {{VALUE}} !important',
                ),
            )
        );

         $this->add_control(
            'ul_wps_cat_menu_second_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat_ul:hover' => 'background: {{VALUE}} !important',
                ),
            )
        );
    $this->add_control(
            'ul_wps_cat_menu_second_block_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
        
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat_ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
        

        
    $this->add_control(
            'ul_wps_cat_menu_second_block_margin',
            array(
                'label'     => __( 'Block Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_cat_ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


    
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'ul_wps_cat_menu_second_block_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_cat_ul',
            ]
        );
                
        $this->add_control(
            'ul_wps_cat_menu_block_second_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_cat_ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );  
        
        
    
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ul_wps_cat_menu_second_block_shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_cat_ul',
            ]
        );
        
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ul_wps_cat_menu_second_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_cat_ul:hover',
            ]
        );  
        



$this->add_control(
            'ul_hr_menu_one_second',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );






//2nd Ul

 $this->add_control(
                    'wps_cat_menu_second_alingment',
                    array(
                        'label' => esc_html__( 'Li Alignment', 'wpsection' ),
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
                            '{{WRAPPER}}  .wps_category_list' => 'text-align: {{VALUE}} !important',
                        ),
                    )
                ); 	
 
        
        
  
        
   
       $this->add_control(
            'wps_cat_menu_second_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_category_list' => 'background: {{VALUE}} !important',
                ),
            )
        );

   	     $this->add_control(
            'wps_cat_menu_second_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_category_list:hover' => 'background: {{VALUE}} !important',
                ),
            )
        );
	$this->add_control(
			'wps_cat_menu_second_block_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} .wps_category_list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_cat_menu_second_block_margin',
            array(
                'label'     => __( 'Block Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_category_list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_cat_menu_second_block_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_category_list',
            ]
        );
                
        $this->add_control(
            'wps_cat_menu_block_second_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_category_list' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_cat_menu_second_block_shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_category_list',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_cat_menu_second_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_category_list:hover',
            ]
        );	
		



$this->add_control(
			'hr_menu_one_second',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);



    	$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_cat_menu_second_one_typography',
                'label'    => __( 'Text Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}}  .wps_li_a_text ',
            )
        );
		
	   $this->add_control(
            'wps_cat_menu_second_one_color',
            array(
                'label'     => __( 'Text Color', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_li_a_text' => 'color: {{VALUE}} !important',
                ),
            )
        );  
        

	$this->add_control(
			'wps_cat_menu_second_text_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} .wps_li_a_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

  //2nd Icon  

$this->add_control(
            'hr_menu_ic',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );


 $this->add_control(
            'li_icon_color',
            [
                'label' => esc_html__('Icon Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wps_category_list i' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#222', 
            ]
        );
        $this->add_control(
            'li_icon_color_hover',
            [
                'label' => esc_html__('Icon Color Hover', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wps_category_list i:hover' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#fff', 
            ]
        );
  
        $this->add_control(
            'li_wps_project_icon_bg_hover',
            [
                'label' => esc_html__('Background Hover Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wps_category_list:hover i' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#000', 
            ]
        );
        
        

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'li_wps_projce_icon_typo',
                'label'    => __('Typography', 'wpsection'),
                'selector' => '{{WRAPPER}} .wps_category_list i',
            )
        );
        
            $this->add_control(
            'li_wps_projce_icon_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
        
                'selectors' => array(
                    '{{WRAPPER}} .wps_category_list i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'li_wps_project_icon_border',
                'selector' => '{{WRAPPER}} .wps_category_list i',
            )
        );


        $this->add_control(
            'li_wps_project_icon_radious',
            array(
                'label'     => __('Border Radius', 'wpsection'),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em'],

                'selectors' => array(
                    '{{WRAPPER}} .wps_category_list i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		$this->end_controls_section();		

//End 
	}

	protected function render() {
		global $plugin_root;
		$settings = $this->get_settings_for_display();
         $allowed_tags = wp_kses_allowed_html('post');

?>

<?php
		
		

      echo '
     <script>
 jQuery(document).ready(function($)
 {

//put the js code under this line 



//put the code above the line 

  });
</script>';		
		
		
		
?>




<div class="wps_menu_cat_area">

    <div class="outer-box">
        <div class="category-box">

            <div class="wps_menu_cat_menu">
                <i class="manucat_icon <?php echo esc_attr($settings['wps_cat_menu_icon_one']['value']); ?>"></i>
                <span class="wps_menu_cat_text"><?php echo esc_html($settings['cat_menu_title']); ?></span>
            </div>
<!-- Part 2: HTML with Conditional Class -->
			

<ul class="category-list clearfix wps_cat_ul 
    <?php 
    // Add class based on the settings and current page conditions
    if ( !empty($settings['show_menu_cat']) && $settings['show_menu_cat'] === 'show' ) {
        echo 'wps_expanded_css';
    } elseif ( !empty($settings['show_menu_cat_home']) && $settings['show_menu_cat_home'] === 'show' && (is_front_page() ) ) {
        echo 'wps_expanded_css';
    }
    ?>">
	
	

                <?php foreach($settings['repeat'] as $item): ?>
                    <li class="category-dropdown">
                        <h3 class="wps_category_list">
                            <a class="wps_category_list_a" href="<?php echo esc_url($item['cat_link']['url']); ?>">
                                <i class=" <?php echo esc_attr($item['cat_icon']['value']); ?>"></i>
                                <span class="wps_li_a_text"><?php echo esc_html($item['cat_title']); ?></span>
                            </a>
                        </h3>
                        <div class="list-inner">
                            <?php echo do_shortcode(wp_kses_post($item['cat_shortcode']), $allowed_tags); ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>

</div>







        <?php

	}
}

// Register widget
Plugin::instance()->widgets_manager->register( new \wpsection_wps_menu_cat_Widget() );