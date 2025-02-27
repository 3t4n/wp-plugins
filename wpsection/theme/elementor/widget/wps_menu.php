<?php

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;



class wpsection_wps_menu_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'wpsection_wps_menu';
	}

	public function get_title() {
		return __( 'Menu', 'wpsection' );
	}

	public function get_icon() {
		 return ' eicon-nav-menu';
	}

	public function get_keywords() {
		return [ 'wpsection', 'menu' ];
	}

	  public function get_categories() {
          return ['wpsection_category'];
    }


	
// Function to get available WordPress menus
protected function get_available_menus() {
    $menus = wp_get_nav_menus();
    $options = [];

    if (!empty($menus)) {
        foreach ($menus as $menu) {
            $options[$menu->slug] = $menu->name;
        }
    } else {
        $options['none'] = esc_html__('No menus found', 'wpsection');
    }

    return $options;
}

	protected function register_controls() {
		$this->start_controls_section(
			'menu_settings',
			[
				'label' => __( 'Menu General', 'wpsection' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

// Control for menu selection in Elementor widget
$this->add_control(
    'selected_menu',
    [
        'label' => esc_html__('Select Menu', 'wpsection'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => $this->get_available_menus(),  // Dynamically populate options from available menus
        'default' => 'main_menu',  // Set 'main_menu' as the default value
    ]
);

		
		
  $this->add_control(
            'wps_main_menu_container_width',
            [
                'label' => esc_html__( 'Main Section Width ', 'wpsection' ),
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
                    'size' => 1320,
                ],
                'selectors' => [
                    '{{WRAPPER}} .wps_header_area' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 

		
		


    $this->add_control(
        'enable_wps_site_logo_one',
        [
            'label' => esc_html__('Enable Logo', 'wpsection'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'yes', 
            'label_on' => esc_html__('Yes', 'wpsection'),
            'label_off' => esc_html__('No', 'wpsection'),
        ]
    );		

		
		
		
				
 $this->add_control(
    'wps_site_logo_one',
    [
        'label' => __('Logo', 'wpsection'),
		 'condition' => ['enable_wps_site_logo_one' => 'yes'],
        'type' => Controls_Manager::MEDIA,
       
    ]
);	
		
	  $this->add_control(
            'wps_main_logo_width',
            [
                'label' => esc_html__( 'Logo Width ', 'wpsection' ),
				'condition' => ['enable_wps_site_logo_one' => 'yes'],
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
                    'size' => 1320,
                ],
                'selectors' => [
                    '{{WRAPPER}} .wps_site_logo_link_one' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 		
		
 $this->add_control(
        'wps_main_logo_order',
        [
            'label'   => esc_html__( 'Logo Order', 'wpsection' ),
			 'condition' => ['enable_wps_site_logo_one' => 'yes'],
            'type'    => Controls_Manager::SELECT,
            'default' => '1',
            'options' => array(
                '1'   => esc_html__( 'Order One', 'wpsection' ),
                '2'   => esc_html__( 'Order Two', 'wpsection' ),
				'3'   => esc_html__( 'Order Three', 'wpsection' ),
				'4'   => esc_html__( 'Order Four', 'wpsection' ),
            
            ),
        ]
    );			

 $this->add_control(
        'wps_main_menu_order',
        [
            'label'   => esc_html__( 'Menu Order', 'wpsection' ),
            'type'    => Controls_Manager::SELECT,
            'default' => '2',
            'options' => array(
                '1'   => esc_html__( 'Order One', 'wpsection' ),
                '2'   => esc_html__( 'Order Two', 'wpsection' ),
				'3'   => esc_html__( 'Order Three', 'wpsection' ),
				'4'   => esc_html__( 'Order Four', 'wpsection' ),
            
            ),
        ]
    );	

		

		
    $this->add_control(
        'enable_wps_main_icon_one',
        [
            'label' => esc_html__('Enable Search', 'wpsection'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'yes', // Set the default value
            'label_on' => esc_html__('Yes', 'wpsection'),
            'label_off' => esc_html__('No', 'wpsection'),
        ]
    );	
		
$this->add_control(
    'wps_main_icon_one',
    [
        'label' => esc_html__('Icon', 'wpsection'),
        'condition' => ['enable_wps_main_icon_one' => 'yes'],
        'type' => Controls_Manager::ICONS,
        'default' => [
            'value' => 'eicon-search',
            'library' => 'regular', // Adjust the library as needed
        ],
    ]
);

			
		
 $this->add_control(
        'wps_main_search_order',
        [
            'label'   => esc_html__( 'Search Order', 'wpsection' ),
			'condition' => ['enable_wps_main_icon_one' => 'yes'],
            'type'    => Controls_Manager::SELECT,
            'default' => '3',
            'options' => array(
                '1'   => esc_html__( 'Order One', 'wpsection' ),
                '2'   => esc_html__( 'Order Two', 'wpsection' ),
				'3'   => esc_html__( 'Order Three', 'wpsection' ),
				'4'   => esc_html__( 'Order Four', 'wpsection' ),
            
            ),
        ]
    );	
		

		

$this->end_controls_section();	
		
		
//sticky menu		
$this->start_controls_section(
                    'wps_sticky_menu_settings',
                    [
                        'label' => __( 'Sticky Menu Settings', 'wpsection' ),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    ]
                ); 
		
	
	$this->add_control(
            'wps_main_slicky_width',
            [
                'label' => esc_html__( 'Sticky Width ', 'wpsection' ),
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
                    'size' => 1320,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mr_sticky-header .mr_outer-container' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 	
		
		
		
   $this->add_control(
        'enable_wps_site_logo_two',
        [
            'label' => esc_html__('Enable Logo', 'wpsection'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'yes', // Set the default value
            'label_on' => esc_html__('Yes', 'wpsection'),
            'label_off' => esc_html__('No', 'wpsection'),
        ]
    );			
		
	 $this->add_control(
    'wps_site_logo_two',
    [
        'label' => __('Logo', 'wpsection'),
		'condition' => ['enable_wps_site_logo_two' => 'yes'],
        'type' => Controls_Manager::MEDIA,
       
    ]
);		
 $this->add_control(
        'wps_main_logo_order_two',
        [
            'label'   => esc_html__( 'Logo Order', 'wpsection' ),
			'condition' => ['enable_wps_site_logo_two' => 'yes'],
            'type'    => Controls_Manager::SELECT,
            'default' => '1',
            'options' => array(
                '1'   => esc_html__( 'Order One', 'wpsection' ),
                '2'   => esc_html__( 'Order Two', 'wpsection' ),
				'3'   => esc_html__( 'Order Three', 'wpsection' ),
				'4'   => esc_html__( 'Order Four', 'wpsection' ),
            
            ),
        ]
    );			

		
		
		
 $this->add_control(
        'wps_main_menu_order_two',
        [
            'label'   => esc_html__( 'Menu Order', 'wpsection' ),
            'type'    => Controls_Manager::SELECT,
            'default' => '2',
            'options' => array(
                '1'   => esc_html__( 'Order One', 'wpsection' ),
                '2'   => esc_html__( 'Order Two', 'wpsection' ),
				'3'   => esc_html__( 'Order Three', 'wpsection' ),
				'4'   => esc_html__( 'Order Four', 'wpsection' ),
            
            ),
        ]
    );	

		
	
   $this->add_control(
        'enable_wps_main_icon_two',
        [
            'label' => esc_html__('Enable Search', 'wpsection'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'yes', // Set the default value
            'label_on' => esc_html__('Yes', 'wpsection'),
            'label_off' => esc_html__('No', 'wpsection'),
        ]
    );			
		
  $this->add_control(
    'wps_main_icon_two',
    [
        'label' => esc_html__('Icon', 'wpsection'),
		'condition' => ['enable_wps_main_icon_two' => 'yes'],
        'type' => Controls_Manager::ICONS,
        'default' => [
            'value' => 'eicon-search',
            'library' => 'solid', 
        ],
    ]
);
			
		
 $this->add_control(
        'wps_main_search_order_two',
        [
            'label'   => esc_html__( 'Search Order', 'wpsection' ),
			'condition' => ['enable_wps_main_icon_two' => 'yes'],
            'type'    => Controls_Manager::SELECT,
            'default' => '3',
            'options' => array(
                '1'   => esc_html__( 'Order One', 'wpsection' ),
                '2'   => esc_html__( 'Order Two', 'wpsection' ),
				'3'   => esc_html__( 'Order Three', 'wpsection' ),
				'4'   => esc_html__( 'Order Four', 'wpsection' ),
            
            ),
        ]
    );	
			
		
$this->end_controls_section();		
		
//Mobile Menu
$this->start_controls_section(
                    'wps_mobile_menu_settings',
                    [
                        'label' => __( 'Mobile Menu Settings', 'wpsection' ),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    ]
                ); 
		
$this->add_control(
    'wps_site_logo_three',
    [
        'label' => __('Logo', 'wpsection'),
        'type' => Controls_Manager::MEDIA,
       
    ]
);

  $this->add_control(
    'wps_mobile_icon',
    [
        'label' => esc_html__('Icon', 'wpsection'),
		'condition' => ['enable_wps_main_icon_two' => 'yes'],
        'type' => Controls_Manager::ICONS,
        'default' => [
            'value' => 'eicon-menu-bar',
            'library' => 'solid', 
        ],
    ]
);
	
		
$this->end_controls_section();	

//start of style settings		
	
$this->start_controls_section(
            'wps_menu_settings',
            array(
                'label' => __( 'Menu Main Area Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
   
       $this->add_control(
            'wps_project_block_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_header_area' => 'background: {{VALUE}} !important',
                ),
            )
        );

   	     $this->add_control(
            'wps_project_block_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_header_area:hover' => 'background: {{VALUE}} !important',
                ),
            )
        );
	$this->add_control(
			'wps_menu_text_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'wps_menu_show_text' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .wps_header_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_project_block_margin',
            array(
                'label'     => __( 'Block Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_header_area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_project_block_border',
                //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_header_area',
            ]
        );
                
            $this->add_control(
            'wps_project_block_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_header_area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_project_block_shadow',
                    //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_header_area',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_project_block_X_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_header_area:hover',
            ]
        );	
		

		$this->end_controls_section();
		

//Logo Setting

$this->start_controls_section(
            'wps_menu_logo_settings',
            array(
                'label' => __( 'LogoSettings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );


		
	 $this->add_control(
            'wps_menu_logo_width',
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
                    'size' => 1320,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

	$this->add_control(
			'wps_menu_logo_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .wps_header_area .mr_navigation > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_menu_logo_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_header_area .mr_navigation > li ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


$this->add_control(
			'hr_logo_sticky',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

	
	 $this->add_control(
            'wps_menu_sticky_logo_width',
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
                    'size' => 1320,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

	$this->add_control(
			'wps_menu_sticky_logo_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .wps_header_area .mr_navigation > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_menu_sticky_logo_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_header_area .mr_navigation > li ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

$this->add_control(
			'hr_logo_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

	
	 $this->add_control(
            'wps_menu_mobile_logo_width',
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
                    'size' => 1320,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mr_nav-logo' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

	$this->add_control(
			'wps_menu_mobile_logo_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_nav-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_menu_mobile_logo_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .mr_nav-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );



	$this->end_controls_section();



//Single Menu=========				
		
$this->start_controls_section(
            'wps_menu_one_settings',
            array(
                'label' => __( 'First Level Menu Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
		
	$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_menu_one_typography',
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}}  .wps_header_area .mr_navigation > li > a ',
            )
        );
		
	   $this->add_control(
            'wps_menu_one_color',
            array(
                'label'     => __( 'Color', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_header_area .mr_navigation > li > a' => 'color: {{VALUE}}',
                ),
            )
        );
	
   
       $this->add_control(
            'wps_menu_one_bg_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_header_area .mr_navigation > li > a' => 'background: {{VALUE}} !important',
                ),
            )
        );
  $this->add_control(
            'wps_menu_one_bg_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_header_area .mr_navigation > li:hover > a' => 'background: {{VALUE}} !important',
                ),
            )
        );

   	
	$this->add_control(
			'wps_menu_one_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .wps_header_area .mr_navigation > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_menu_one_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_header_area .mr_navigation > li ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_menu_one_border',
                //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_header_area .mr_navigation > li > a',
            ]
        );
                
            $this->add_control(
            'wps_menu_one_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_header_area .mr_navigation > li > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_menu_one_shadow',
                    //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_header_area .mr_navigation > li',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_menu_one_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_header_area .mr_navigation > li:hover',
            ]
        );	
		

		$this->end_controls_section();	
		
		
//Sticky Mennu Setting 		

$this->start_controls_section(
            'wps_menu_slicky_settings',
            array(
                'label' => __( 'Sticky Menu Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );        
   
       $this->add_control(
            'wps_slicky_bg_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_sticky-header' => 'background: {{VALUE}} !important',
                ),
            )
        );

   	     $this->add_control(
            'wps_slicky_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_sticky-header:hover' => 'background: {{VALUE}} !important',
                ),
            )
        );
	$this->add_control(
			'wps_slicky_menu_text_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'wps_menu_show_text' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .mr_sticky-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_slicky_block_margin',
            array(
                'label'     => __( 'Block Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .mr_sticky-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_slicky_menu_border',
                //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_sticky-header',
            ]
        );
                
            $this->add_control(
            'wps_slicky_menu_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_sticky-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_slicky_menu_shadow',
                    //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_sticky-header',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_slicky_menu_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_sticky-header:hover',
            ]
        );	
		

		$this->end_controls_section();		
				
//Sticky Single Menu=========				
		
$this->start_controls_section(
            'wps_menu_sticky_one_settings',
            array(
                'label' => __( 'Sticky First Level Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
		
	$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_menu_sticky_one_typography',
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}}  .mr_sticky-header .mr_navigation > li > a ',
            )
        );
		
	   $this->add_control(
            'wps_menu_sticky_one_color',
            array(
                'label'     => __( 'Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_sticky-header .mr_navigation > li > a' => 'color: {{VALUE}} !important',
                ),
            )
        );
	
   
       $this->add_control(
            'wps_menu_sticky_one_bg_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_sticky-header .mr_navigation > li > a' => 'background: {{VALUE}} !important',
                ),
            )
        );
  $this->add_control(
            'wps_menu_sticky_one_bg_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_sticky-header .mr_navigation > li:hover > a' => 'background: {{VALUE}} !important',
                ),
            )
        );

   	
	$this->add_control(
			'wps_menu_sticky_one_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_sticky-header .mr_navigation > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_menu_sticky_one_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .mr_sticky-header .mr_navigation > li ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_menu_sticky_one_border',
                //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_sticky-header .mr_navigation > li > a',
            ]
        );
                
            $this->add_control(
            'wps_menu_one_sticky_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_sticky-header .mr_navigation > li > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_menu_sticky_one_shadow',
                    //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_sticky-header .mr_navigation > li',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_menu_sticky_one_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_sticky-header .mr_navigation > li:hover',
            ]
        );	
		

		$this->end_controls_section();			
		
		
//2nd level =========				
		
$this->start_controls_section(
            'wps_menu_two_settings',
            array(
                'label' => __( 'Second Level Menu Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
		
		
	 $this->add_control(
            'wps_menu_submenu_two_width',
            [
                'label' => esc_html__( 'Submenu area Width ', 'wpsection' ),
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
                    'size' => 300,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );   		
	    $this->add_control(
            'wps_menu_two_submenu_bg_color',
            array(
                'label'     => __( 'Submenu area Background ', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul' => 'background: {{VALUE}} !important',
                ),
            )
        );	
    $this->add_control(
            'wps_menu_two_submenu_bg_hover_color',
            array(
                'label'     => __( 'Hover Submenu area Background ', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul:hover' => 'background: {{VALUE}} !important',
                ),
            )
        );		
		
$this->add_control(
			'wps_menu_submenu_two_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_menu_submenu_two_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_menu_submenu_two_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul',
            ]
        );
                
            $this->add_control(
            'wps_menu_two_submenu_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_menu_two_submenu_shadow',
                    //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_menu_two_hover_box_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul:hover',
            ]
        );			
// Separator
$this->add_control(
    'separator_menu_two',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);
		
// Single Level Two Menu 		
	$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_menu_two_typography',
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > a',
            )
        );
		
	   $this->add_control(
            'wps_menu_two_color',
            array(
                'label'     => __( 'Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > a' => 'color: {{VALUE}} !important',
                ),
            )
        );
	
   
       $this->add_control(
            'wps_menu_two_bg_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > a' => 'background: {{VALUE}} !important',
                ),
            )
        );
  $this->add_control(
            'wps_menu_two_bg_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .mr_main-menu .mr_navigation > li > ul > li:hover > a' => 'background: {{VALUE}} !important',
                ),
            )
        );

   	
	$this->add_control(
			'wps_menu_two_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_menu_two_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .mr_main-menu .mr_navigation > li > ul > li ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_menu_two_border',
                //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > a',
            ]
        );
                
            $this->add_control(
            'wps_menu_two_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_menu_two_shadow',
                    //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_menu_two_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul:hover',
            ]
        );	
		

		$this->end_controls_section();				
		
		
		
//3rd level =========				
		
$this->start_controls_section(
            'wps_menu_three_settings',
            array(
                'label' => __( 'Third Level Menu Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
		
		
	 $this->add_control(
            'wps_menu_submenu_three_width',
            [
                'label' => esc_html__( 'Submenu area Width ', 'wpsection' ),
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
                    'size' => 300,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mr_main-menu .mr_navigation li > ul > li.dropdown > ul' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );   		
	    $this->add_control(
            'wps_menu_three_submenu_bg_color',
            array(
                'label'     => __( 'Submenu area Background ', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul' => 'background: {{VALUE}} !important',
                ),
            )
        );	
    $this->add_control(
            'wps_menu_three_submenu_bg_hover_color',
            array(
                'label'     => __( 'Hover Submenu area Background ', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul:hover' => 'background: {{VALUE}} !important',
                ),
            )
        );		
		
$this->add_control(
			'wps_menu_submenu_three_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_menu_submenu_three_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_menu_submenu_three_border',
                //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul',
            ]
        );
                
            $this->add_control(
            'wps_menu_three_submenu_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_menu_three_submenu_shadow',
                    //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_menu_three_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul:hover ',
            ]
        );			
// Separator
$this->add_control(
    'separator_menu_three',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);
		
// Single Level Two Menu 		
	$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_menu_three_typography',
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul > li > a',
            )
        );
		
	   $this->add_control(
            'wps_menu_three_color',
            array(
                'label'     => __( 'Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul > li > a' => 'color: {{VALUE}} !important',
                ),
            )
        );
	
   
       $this->add_control(
            'wps_menu_three_bg_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul > li > a' => 'background: {{VALUE}} !important',
                ),
            )
        );
  $this->add_control(
            'wps_menu_three_bg_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .mr_main-menu .mr_navigation > li > ul > li > ul > li:hover > a' => 'background: {{VALUE}} !important',
                ),
            )
        );

   	
	$this->add_control(
			'wps_menu_three_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_menu_three_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .mr_main-menu .mr_navigation > li > ul > li ul > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_menu_three_border',
                //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul > li > a',
            ]
        );
                
            $this->add_control(
            'wps_menu_three_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul > li > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_menu_three_shadow',
                    //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_menu_three_hover_zz_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_main-menu .mr_navigation > li > ul > li > ul:hover',
            ]
        );	
		

		$this->end_controls_section();				
				
		
		
// Search Style 		
		

//Search Style 		
//==================== Star of Setting area==============================================
	
$this->start_controls_section(
            'search_style_settings',
            array(
                'label' => __( 'Search Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
        


	
	        $this->add_control(
            'wps_project_icon_width',
            [
                'label' => esc_html__('Icon Box Width',  'wpsection'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 85,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mr_header-lower .wps_search_box' => 'width: {{SIZE}}{{UNIT}};',
                ]

            ]
        );


        $this->add_control(
            'wps_project_icon_height',
            [
                'label' => esc_html__('Icon Box Height', 'wpsection'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
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
                    'size' => 85,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mr_header-lower .wps_search_box' => 'height: {{SIZE}}{{UNIT}};',

                ]
            ]
        );

		
    $this->add_control(
            'wps_thumbnail_bg',
            [
                'label' => esc_html__('Background Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr_header-lower .wps_search_box' => 'background-color: {{VALUE}} !important;',
                ],
                'default' => '#000', 
            ]
        );	
		
	    $this->add_control(
            'wps_thumbnail_hover_bg',
            [
                'label' => esc_html__('Background Hover Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr_header-lower .wps_search_box:hover' => 'background: {{VALUE}} !important;',
                ],
                'default' => '#D315FF70', 
            ]
        );		
		
		
    $this->add_control(
            'thumbnail_padding',
            array(
                'label'     => __( 'Padding', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
        
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .mr_header-lower .wps_search_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    $this->add_control(
            'thumbnail_x_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_header-lower .wps_search_box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'thumbnail_border',
                'selector' => '{{WRAPPER}} .mr_header-lower .wps_search_box',
            )
        );
                
            $this->add_control(
            'thumbnail_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_header-lower .wps_search_box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );  
		
		
		
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'thumbnail_box_shadow',
                'label' => esc_html__('Box Shadow', 'wpsection'),
				'selector' => '{{WRAPPER}} .mr_header-lower .wps_search_box',
			]
		);
		
$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);		
//for sticky	
	
       $this->add_control(
            'wps_sticky_menu_icon_width',
            [
                'label' => esc_html__('Sticky Icon Box Width',  'wpsection'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 85,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mr_sticky-header .wps_search_box' => 'width: {{SIZE}}{{UNIT}};',
                ]

            ]
        );


        $this->add_control(
            'wps_sticky_menu_icon_height',
            [
                'label' => esc_html__('Sticky Icon Box Height', 'wpsection'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
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
                    'size' => 85,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mr_sticky-header .wps_search_box' => 'height: {{SIZE}}{{UNIT}};',

                ]
            ]
        );

		
    $this->add_control(
            'wps_sticky_menu_bg',
            [
                'label' => esc_html__('Sticky Background Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr_sticky-header .wps_search_box' => 'background-color: {{VALUE}} !important;',
                ],
                'default' => '#000', 
            ]
        );	
		
	    $this->add_control(
            'wps_sticky_menu_hover_bg',
            [
                'label' => esc_html__('Sticky Background Hover Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr_sticky-header .wps_search_box:hover' => 'background: {{VALUE}} !important;',
                ],
                'default' => '#D315FF70', 
            ]
        );		
		
		
    $this->add_control(
            'wps_sticky_menu_padding',
            array(
                'label'     => __( 'Sticky Padding', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
        
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .mr_sticky-header .wps_search_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

    $this->add_control(
            'wps_sticky_menu_x_margin',
            array(
                'label'     => __( 'Sticky Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_sticky-header .wps_search_box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_sticky_menu_border',
                'selector' => '{{WRAPPER}} .mr_sticky-header .wps_search_box',
            )
        );
                
            $this->add_control(
            'wps_sticky_menu_border_radius',
            array(
                'label'     => __( 'Sticky Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_sticky-header .wps_search_box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );  
		
		
		
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wps_sticky_menu_box_shadow',
                'label' => esc_html__('Sticky Box Shadow', 'wpsection'),
				'selector' => '{{WRAPPER}} .mr_sticky-header .wps_search_box',
			]
		);
				
		
		
		
		
        $this->end_controls_section();
        
//End of Search Settings
	
		

        $this->start_controls_section(
            'section_portfollio_style',
            [
                'label' => esc_html__('Search Icon Setting', 'wpsection'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
  
	   $this->add_control(
            'wps_project_icon',
            array(
                'label' => esc_html__('Show Icons', 'wpsection'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'show' => [
                        'show' => esc_html__('Show', 'wpsection'),
                        'icon' => 'eicon-check-circle',
                    ],
                    'none' => [
                        'none' => esc_html__('Hide', 'wpsection'),
                        'icon' => 'eicon-close-circle',
                    ],
                ],
                'default' => 'show',
                'selectors' => array(
                    '{{WRAPPER}}  .mr_header-lower .mr_nav-right' => 'display: {{VALUE}} !important',
                ),
            )
        );
	
		$this->add_control(
			'icon_color_alingment',
			array(
				'label' => esc_html__('Alignment', 'wpsection'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'wpsection'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'wpsection'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'wpsection'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => array(

					'{{WRAPPER}}  .mr_header-lower .wps_search_box' => 'text-align: {{VALUE}} !important',
				),
			)
		);	
		
		
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr_header-lower  .wps_search_box i' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#fff', 
            ]
        );
        $this->add_control(
            'icon_color_hover',
            [
                'label' => esc_html__('Icon Color Hover', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr_header-lower  .wps_search_box i:hover' => 'color: {{VALUE}} !important;',
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
                    '{{WRAPPER}} .mr_header-lower  .wps_search_box:hover i' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#000', 
            ]
        );
		
		

		
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_projce_icon_typo',
                'label'    => __('Typography', 'wpsection'),
                'selector' => '{{WRAPPER}} .mr_header-lower .wps_search_box i',
            )
        );
		
		
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_project_icon_border',
                'selector' => '{{WRAPPER}} .mr_header-lower .wps_search_box i',
            )
        );


        $this->add_control(
            'wps_project_icon_radious',
            array(
                'label'     => __('Border Radius', 'wpsection'),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em'],

                'selectors' => array(
                    '{{WRAPPER}} .mr_header-lower .wps_search_box i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
        
 $this->add_control(
			'hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);       
        
//sticky icon 		
  $this->add_control(
            'wps_sticky_x_menu_icon',
            array(
                'label' => esc_html__('Sticky Show Icons', 'wpsection'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'show' => [
                        'show' => esc_html__('Show', 'wpsection'),
                        'icon' => 'eicon-check-circle',
                    ],
                    'none' => [
                        'none' => esc_html__('Hide', 'wpsection'),
                        'icon' => 'eicon-close-circle',
                    ],
                ],
                'default' => 'show',
                'selectors' => array(
                    '{{WRAPPER}} .mr_sticky-header .mr_nav-right' => 'display: {{VALUE}} !important',
                ),
            )
        );
	
		$this->add_control(
			'sticky_x_menu_alingment',
			array(
				'label' => esc_html__('Sticky Alignment', 'wpsection'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'wpsection'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'wpsection'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'wpsection'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => array(

					'{{WRAPPER}}  .mr_sticky-header .wps_search_box' => 'text-align: {{VALUE}} !important',
				),
			)
		);	
		
		
        $this->add_control(
            'sticky_x_menu_icon_color',
            [
                'label' => esc_html__('Sticky Icon Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr_sticky-header .wps_search_box i' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#fff', 
            ]
        );
        $this->add_control(
            'sticky_x_menu_icon_color_hover',
            [
                'label' => esc_html__('Sticky Icon Color Hover', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr_sticky-header .wps_search_box i:hover' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#fff', 
            ]
        );
  
        $this->add_control(
            'sticky_x_menu_icon_bg_hover',
            [
                'label' => esc_html__('Sticky Background Hover Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr_sticky-header .wps_search_box:hover i' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#000', 
            ]
        );
		
		

		
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'sticky_x_menu_icon_typo',
                'label'    => __('Sticky Typography', 'wpsection'),
                'selector' => '{{WRAPPER}} .mr_sticky-header .wps_search_box i',
            )
        );
		
		
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'sticky_x_menu_icon_border',
                'selector' => '{{WRAPPER}} .mr_sticky-header .wps_search_box i',
            )
        );


        $this->add_control(
            'sticky_x_menu_icon_radious',
            array(
                'label'     => __('Sticky Border Radius', 'wpsection'),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em'],

                'selectors' => array(
                    '{{WRAPPER}} .mr_sticky-header .wps_search_box i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
		   

        $this->end_controls_section();		
				
	
//Mobile Menu area Settings 	
	
		
$this->start_controls_section(
            'wps_mobile_menu_x_settings',
            array(
                'label' => __( 'Mobile Menu Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
		
		
	 $this->add_control(
            'wps_mobile_menu_x_width',
            [
                'label' => esc_html__( 'Mobile Menu area Width ', 'wpsection' ),
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
                    'size' => 300,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mr_mobile-menu' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );   		
	    $this->add_control(
            'wps_mobile_menu_x_bg_color',
            array(
                'label'     => __( 'Submenu area Background ', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_mobile-menu .mr_menu-box' => 'background: {{VALUE}} !important',
                ),
            )
        );	
    $this->add_control(
            'wps_mobile_menu_x_bg_hover_color',
            array(
                'label'     => __( 'Hover Submenu area Background ', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_mobile-menu .mr_menu-box:hover' => 'background: {{VALUE}} !important',
                ),
            )
        );		
		
$this->add_control(
			'wps_mobile_menu_x_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_mobile-menu .mr_menu-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_mobile_menu_x_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .mr_mobile-menu .mr_menu-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_mobile_menu_x_border',
                //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_mobile-menu .mr_menu-box',
            ]
        );
                
            $this->add_control(
            'wps_mobile_menu_x_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_mobile-menu .mr_menu-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_mobile_menu_x_shadow',
                    //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_mobile-menu .mr_menu-box',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_mobile_menu_x_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_mobile-menu .mr_menu-box:hover ',
            ]
        );			
// Separator
$this->add_control(
    'separator_menu_three_ff',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);
		
// Single Level Two Menu 		
	$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_mobile_menu_x_typography',
                'label'    => __( 'Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_mobile-menu .mr_navigation li > a',
            )
        );
		
	   $this->add_control(
            'wps_mobile_menu_x_text_color',
            array(
                'label'     => __( 'Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_mobile-menu .mr_navigation li > a' => 'color: {{VALUE}} !important',
                ),
            )
        );
	
   
       $this->add_control(
            'wps_mobile_menu_x_li_bg_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mr_mobile-menu .mr_navigation li' => 'background: {{VALUE}} !important',
                ),
            )
        );
  $this->add_control(
            'wps_mobile_menu_x_li_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}}  .mr_mobile-menu .mr_navigation li:hover' => 'background: {{VALUE}} !important',
                ),
            )
        );

   	
	$this->add_control(
			'wps_mobile_menu_x_li_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_mobile-menu .mr_navigation li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_mobile_menu_x_li_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .mr_mobile-menu .mr_navigation li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_mobile_menu_x_li_border',
                //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_mobile-menu .mr_navigation li > a',
            ]
        );
                
            $this->add_control(
            'wps_mobile_menu_x_li_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .mr_mobile-menu .mr_navigation li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_mobile_menu_x_li_shadow',
                    //'condition'    => array( 'show_block' => 'show' ),
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_mobile-menu .mr_navigation li',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_mobile_menu_x_li_hover_zz_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .mr_mobile-menu .mr_navigation li:hover',
            ]
        );	
		

		$this->end_controls_section();				
				
//mobile menu icon settings 			
        $this->start_controls_section(
            'wps_mobile_burger_icon_style',
            [
                'label' => esc_html__('Mobile Burger Icon Setting', 'wpsection'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
  
	   $this->add_control(
            'wps_mobile_burger_icon',
            array(
                'label' => esc_html__('Show Icons', 'wpsection'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'show' => [
                        'show' => esc_html__('Show', 'wpsection'),
                        'icon' => 'eicon-check-circle',
                    ],
                    'none' => [
                        'none' => esc_html__('Hide', 'wpsection'),
                        'icon' => 'eicon-close-circle',
                    ],
                ],
                'default' => 'show',
                'selectors' => array(
                    '{{WRAPPER}}  .mr_menu-area .mr_mobile-nav-toggler' => 'display: {{VALUE}} !important',
                ),
            )
        );
	

		
        $this->add_control(
            'wps_mobile_burger_icon_color',
            [
                'label' => esc_html__('Icon Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr_menu-area .mr_mobile-nav-toggler i' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#fff', 
            ]
        );
        $this->add_control(
            'wps_mobile_burger_icon_color_hover',
            [
                'label' => esc_html__('Icon Color Hover', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr_menu-area .mr_mobile-nav-toggler i:hover' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#fff', 
            ]
        );
  
        $this->add_control(
            'wps_mobile_burger_icon_icon_bg_hover',
            [
                'label' => esc_html__('Background Hover Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr_menu-area .mr_mobile-nav-toggler:hover' => 'background: {{VALUE}} !important;',
                ],
                'default' => '#000', 
            ]
        );
		
		

		
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_mobile_burger_icon_typo',
                'label'    => __('Typography', 'wpsection'),
                'selector' => '{{WRAPPER}} .mr_menu-area .mr_mobile-nav-toggler i',
            )
        );
		
		
		$this->add_control(
			'wps_mobile_burger_icon_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_menu-area .mr_mobile-nav-toggler i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_mobile_burger_icon_margin',
            array(
                'label'     => __( 'Margin', 'wpsection' ),
                    //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .mr_menu-area .mr_mobile-nav-toggler' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
		
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_mobile_burger_icon_border',
                'selector' => '{{WRAPPER}} .mr_menu-area .mr_mobile-nav-toggler',
            )
        );


        $this->add_control(
            'wps_mobile_burger_icon_radious',
            array(
                'label'     => __('Border Radius', 'wpsection'),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em'],

                'selectors' => array(
                    '{{WRAPPER}} .mr_menu-area .mr_mobile-nav-toggler' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
				
//End 
	}

	protected function render() {
	 global $plugin_root, $post;
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');

?>

<?php
 echo '
 <style>
 
 //CSS code Will be here 
 

 
 //CSS code End Here
 
</style>';		
		

	
      echo '
     <script>
 jQuery(document).ready(function($)
 {

//put the js code under this line 


function headerStyle() {
	if ($(".main-header").length) {
		var windowpos = $(window).scrollTop();
		var siteHeader = $(".main-header");
		var scrollLink = $(".scroll-top");
		if (windowpos >= 110) {
			siteHeader.addClass("fixed-header");
			scrollLink.addClass("open");
		} else {
			siteHeader.removeClass("fixed-header");
			scrollLink.removeClass("open");
		}
	}
}

headerStyle();

//Submenu Dropdown Toggle
if ($(".main-header li.dropdown ul").length) {
	

	$(".main-header .navigation li.dropdown").append("<div class=\"dropdown-btn\"><span class=\"fas fa-angle-down\"></span></div>");


}


if ($(".mobile-menu").length) {
	$(".mobile-menu .menu-box").mCustomScrollbar();

	var mobileMenuContent = $(".main-header .menu-area .main-menu").html();
	$(".mobile-menu .menu-box .menu-outer").append(mobileMenuContent);
	$(".mr_menu_sticky .main-menu").append(mobileMenuContent);

	//Dropdown Button
	$(".mobile-menu li.dropdown .dropdown-btn").on("click", function() {
		$(this).toggleClass("open");
		$(this).prev("ul").slideToggle(500);
	});

	//Dropdown Button
	$(".mobile-menu li.dropdown .dropdown-btn").on("click", function() {
		$(this).prev(".megamenu").slideToggle(900);
	});

	//Menu Toggle Btn
	$(".mobile-nav-toggler").on("click", function() {
		$("body").addClass("mobile-menu-visible");
	});

	//Menu Toggle Btn
	$(".mobile-menu .menu-backdrop, .mobile-menu .close-btn").on("click", function() {
		$("body").removeClass("mobile-menu-visible");
	});
}


	$(window).on("scroll", function() {
		headerStyle();

	});



//put the code above the line 

  });
</script>';		
		
		
		
?>


  <!--Search Popup-->
        <div id="mr_search-popup" class="mr_search-popup">
            <div class="mr_popup-inner">
                <div class="mr_upper-box clearfix">
                    <div class="mr_close-search pull-right">								
<?php echo (class_exists('Elementor\Plugin')) ? '<i class="eicon-close-circle"></i>' : '<i class="dashicons dashicons-dismiss"></i>'; ?>
					</div>
                </div>
                <div class="mr_overlay-layer"></div>
                <div class="auto-container">
                    <div class="mr_search-form">
                       <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">	
                            <div class="mr_form-group">
                               <fieldset>    
									<input type="search" name="s" class="form-control" placeholder=" " required="">
									<button  class="search_button"  type="submit">						



<?php
// Check if the value is set and not empty
if (isset($settings['wps_main_icon_one']['value']) && !empty($settings['wps_main_icon_one']['value'])) {
    // Escape the value before using it
    $icon_class = esc_attr($settings['wps_main_icon_one']['value']);
    // Output the icon HTML
echo '<i class="' . esc_attr( $icon_class ) . '"></i>';
}
?>


	 
	 
								   </button>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>





        <header class="wps_header_area mr_main-header ">
            <div class="mr_header-lower">
                <div class="mr_outer-container">
                    <div class="mr_outer-box">
						
					<?php if ('yes' === $this->get_settings('enable_wps_site_logo_one')) : ?>
                        <div class="mr_logo-box order-<?php echo wp_kses($settings['wps_main_logo_order'], $allowed_tags); ?>">
							<figure class="mr_logo"> 
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="wps_site_logo_link_one">
								<img class="wps_site_logo_one" src="<?php echo esc_url( wp_get_attachment_url( $settings['wps_site_logo_one']['id'] ) ); ?>" alt="">
								</a>
							</figure> 
                        </div>	
					<?php endif; ?>
						
						
                        <div class="mr_menu-area clearfix order-<?php echo wp_kses($settings['wps_main_menu_order'], $allowed_tags); ?>">
                            <div class="mr_mobile-nav-toggler">
                                <i class="<?php echo esc_attr($settings['wps_mobile_icon']['value']); ?>"></i>
                                
                            </div>
                            <nav class="mr_main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
									<ul class="mr_navigation clearfix home-menu ">
										
									
<?php

		
// Fetch and render selected menu
$selected_menu = $this->get_settings('selected_menu'); // Fetch the selected menu slug

if ($selected_menu) {
    wp_nav_menu([
        'menu' => $selected_menu,  // Directly use the menu slug
        'container_id' => 'navbarSupportedContent',
        'container_class' => 'collapse navbar-collapse sub-menu-bar',
        'menu_class' => 'nav navbar-nav',
        'fallback_cb' => false, 
        'add_li_class' => 'nav-item',
        'items_wrap' => '%3$s',  // Only wrap menu items
        'container' => false,
        'depth' => 3,
        'walker' => new Bootstrap_walker(),  // Your custom walker (if needed)
    ]);
} else {
    echo '<ul class="nav navbar-nav"><li>' . esc_html__('No menu assigned to this location, Set a Menu', 'wpsection') . '</li></ul>';
}
	
		
?>
										
										
										
										


                                    </ul>
                                </div>
                            </nav>
                        </div>
	
						
					<?php if ('yes' === $this->get_settings('enable_wps_main_icon_one')) : ?>	
                        <div class="mr_nav-right order-<?php echo wp_kses($settings['wps_main_search_order'], $allowed_tags); ?>">
                            <div class="mr_search-box-outer mr_search-toggler wps_search_box">
             						 <i class="<?php echo esc_attr($settings['wps_main_icon_one']['value']); ?>"></i>
                            </div>
                        </div>
					<?php endif; ?>	
						
                    </div>
                </div>
            </div>

 
			
			<!--sticky Header-->
            <div class="mr_sticky-header">
                <div class="mr_outer-container">
                    <div class="mr_outer-box">
                        
					<?php if ('yes' === $this->get_settings('enable_wps_site_logo_two')) : ?>	
						<div class="mr_logo-box">
                            <figure class="mr_logo">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="wps_site_logo_link_two">
    <img class="wps_site_logo_two" src="<?php echo esc_url( wp_get_attachment_url( $settings['wps_site_logo_two']['id'] ) ); ?>" alt="">
</a>
							</figure>
                        </div>
					<?php endif; ?>
						
						
				
                        <div class="mr_menu-area clearfix">
                            <nav class="mr_main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>

				<?php if ('yes' === $this->get_settings('enable_wps_main_icon_two')) : ?>		
                        <div class="mr_nav-right">
                            <div class="mr_search-box-outer mr_search-toggler wps_search_box">
								 <i class="<?php echo esc_attr($settings['wps_main_icon_two']['value']); ?>"></i>	
                            </div>
                        </div>
						
						
						
						
						
						
				<?php endif; ?>		
                    </div>
                </div>
            </div>
		
			
			
			
        </header>
        <!-- main-header end -->



     <!-- Mobile Menu  -->
        <div class="mr_mobile-menu">
            <div class="mr_menu-backdrop"></div>
            <div class="mr_close-btn"><i class="eicon-close-circle"></i></div>
            <nav class="mr_menu-box">
                <div class="mr_nav-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="wps_site_logo_link_three">
    <img class="wps_site_logo_three" src="<?php echo esc_url( wp_get_attachment_url( $settings['wps_site_logo_three']['id'] ) ); ?>" alt="">
</a>

				</div>
                <div class="mr_menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div>        
     <!-- End Mobile Menu -->





        <?php

	}
}

// Register widget
Plugin::instance()->widgets_manager->register( new \wpsection_wps_menu_Widget() );