<?php

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;



if (class_exists('MrwooMart')) {
if (class_exists('woocommerce')) {


class wpsection_wps_ajax_search_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'wpsection_wps_ajax_search';
	}

	public function get_title() {
		return __( 'Ajax Product Search', 'wpsection' );
	}

	public function get_icon() {
		 return ' eicon-product-add-to-cart';
	}

	public function get_keywords() {
		return [ 'wpsection', 'menu' ];
	}

	  public function get_categories() {
          return ['wpsection_shop'];
    }


	

	protected function register_controls() {
		$this->start_controls_section(
			'wps_ajax_shortcode_settings',
			[
				'label' => __( 'Ajax Search General Setting', 'wpsection' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

	
	
	
	
	$this->add_control(
			'wps_ajax_shortcode_title', [
				'label'       => esc_html__( 'Title', 'wpsection' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Search',
				'dynamic'     => [
					'active' => true,
				],
			]
		);

     $this->add_control(
                    'wps_ajax_icon',
                    array(
                        'label' => esc_html__( 'Show Icon', 'wpsection' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'show' => [
                                'show' => esc_html__( 'Show', 'wpsection' ), 
                                'icon' => 'eicon-check-circle',
                            ],
                            'none' => [
                                'none' => esc_html__( 'Hide', 'wpsection' ),
                                'icon' => 'eicon-close-circle',
                            ],
                        ],
                        'default' => 'show',
                        'selectors' => array(
                            '{{WRAPPER}} .wps_search_product_input i ' => 'display: {{VALUE}} !important',

                        ),
                    )
                );  


   $this->add_control(
                    'wps_ajax_thumbnail',
                    array(
                        'label' => esc_html__( 'Show Thumbnail', 'wpsection' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'show' => [
                                'show' => esc_html__( 'Show', 'wpsection' ), 
                                'icon' => 'eicon-check-circle',
                            ],
                            'none' => [
                                'none' => esc_html__( 'Hide', 'wpsection' ),
                                'icon' => 'eicon-close-circle',
                            ],
                        ],
                        'default' => 'show',
                        'selectors' => array(
                            '{{WRAPPER}} .wps_ajax_search_result .search-results-table td img' => 'display: {{VALUE}} !important',

                        ),
                    )
                ); 

   $this->add_control(
                    'wps_ajax_title',
                    array(
                        'label' => esc_html__( 'Show title', 'wpsection' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'show' => [
                                'show' => esc_html__( 'Show', 'wpsection' ), 
                                'icon' => 'eicon-check-circle',
                            ],
                            'none' => [
                                'none' => esc_html__( 'Hide', 'wpsection' ),
                                'icon' => 'eicon-close-circle',
                            ],
                        ],
                        'default' => 'show',
                        'selectors' => array(
                            '{{WRAPPER}} .wps_ajax_search_result .search-results-table td a' => 'display: {{VALUE}} !important',

                        ),
                    )
                ); 


   $this->add_control(
                    'wps_ajax_rating',
                    array(
                        'label' => esc_html__( 'Show Rating', 'wpsection' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'show' => [
                                'show' => esc_html__( 'Show', 'wpsection' ), 
                                'icon' => 'eicon-check-circle',
                            ],
                            'none' => [
                                'none' => esc_html__( 'Hide', 'wpsection' ),
                                'icon' => 'eicon-close-circle',
                            ],
                        ],
                        'default' => 'show',
                        'selectors' => array(
                            '{{WRAPPER}} .wps_ajax_search_result .search-results-table td .rating' => 'display: {{VALUE}} !important',

                        ),
                    )
                ); 

   $this->add_control(
                    'wps_ajax_price',
                    array(
                        'label' => esc_html__( 'Show Price', 'wpsection' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'show' => [
                                'show' => esc_html__( 'Show', 'wpsection' ), 
                                'icon' => 'eicon-check-circle',
                            ],
                            'none' => [
                                'none' => esc_html__( 'Hide', 'wpsection' ),
                                'icon' => 'eicon-close-circle',
                            ],
                        ],
                        'default' => 'show',
                        'selectors' => array(
                            '{{WRAPPER}} .wps_ajax_search_price.price' => 'display: {{VALUE}} !important',

                        ),
                    )
                ); 



   $this->add_control(
                    'wps_ajax_amount',
                    array(
                        'label' => esc_html__( 'Show Amount', 'wpsection' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'show' => [
                                'show' => esc_html__( 'Show', 'wpsection' ), 
                                'icon' => 'eicon-check-circle',
                            ],
                            'none' => [
                                'none' => esc_html__( 'Hide', 'wpsection' ),
                                'icon' => 'eicon-close-circle',
                            ],
                        ],
                        'default' => 'show',
                        'selectors' => array(
                            '{{WRAPPER}} .wps_ajax_search_result .search-results-table td.quantity' => 'display: {{VALUE}} !important',

                        ),
                    )
                ); 

   $this->add_control(
                    'wps_ajax_addtocart',
                    array(
                        'label' => esc_html__( 'Show Add to Cart', 'wpsection' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'show' => [
                                'show' => esc_html__( 'Show', 'wpsection' ), 
                                'icon' => 'eicon-check-circle',
                            ],
                            'none' => [
                                'none' => esc_html__( 'Hide', 'wpsection' ),
                                'icon' => 'eicon-close-circle',
                            ],
                        ],
                        'default' => 'show',
                        'selectors' => array(
                            '{{WRAPPER}} .wps_ajax_search_result .search-results-table td .add-to-cart' => 'display: {{VALUE}} !important',

                        ),
                    )
                ); 





	

$this->add_control(
    'show_image_900',
    array(
        'label' => esc_html__( 'Hide Image under 900px', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
            'show' => [
                'show' => esc_html__( 'Show', 'wpsection' ),
                'icon' => 'eicon-check-circle',
            ],
            'none' => [
                'none' => esc_html__( 'Hide', 'wpsection' ),
                'icon' => 'eicon-close-circle',
            ],
        ],
        'default' => 'show',
        'selectors' => array(
            '{{WRAPPER}} .wps_product_search' => '{{VALUE}}',
        ),
    )
);

// Custom CSS
echo '
<style>
    @media screen and (max-width: 1000px) {
        .wps_product_search {
            display: none !important;
        }
    }
</style>';


      
        $this->add_control(
            'wps_ajax_shortcode',
            [
                'label' => __( 'Language Shortcode', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( '[wps_ajax_search]', 'wpsection' ),
            ]
        ); 




$this->end_controls_section();


// Style Settings

//start of style settings		
	
$this->start_controls_section(
            'wps_ajax_settings',
            array(
                'label' => __( 'Area Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
   
       $this->add_control(
            'wps_ajax_area_bg_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_ajax_search_area' => 'background: {{VALUE}} !important',
                ),
            )
        );

   	     $this->add_control(
            'wps_ajax_area_hover_color',
            array(
                'label'     => __( 'Background Hover Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_ajax_search_area:hover' => 'background: {{VALUE}} !important',
                ),
            )
        );
        
        
	$this->add_control(
			'wps_ajax_area_x_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .wps_ajax_search_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_ajax_area_margin',
            array(
                'label'     => __( 'Block Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}}  .wps_ajax_search_area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

		
		
 
	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_ajax_area_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_ajax_search_area',
            ]
        );
                
            $this->add_control(
            'wps_ajax_area_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_ajax_search_area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_ajax_area_shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_ajax_search_area',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_ajax_area_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_ajax_search_area:hover',
            ]
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
                'name'     => 'wps_ajax_typography',
                'label'    => __( 'Text Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}}  .wps-product_search[type="text"] ',
            )
        );
		
	   $this->add_control(
            'wps_ajax_color',
            array(
                'label'     => __( 'Text Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps-product_search[type="text"] ' => 'color: {{VALUE}} !important',
                ),
            )
        );  
        

	$this->add_control(
			'wps_ajax_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} .wps-product_search[type="text"] ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
                    '{{WRAPPER}} .wps_search_product_input i' => 'color: {{VALUE}} !important;',
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
                    '{{WRAPPER}} .wps_search_product_input i:hover' => 'color: {{VALUE}} !important;',
                ],
                'default' => '#fff', 
            ]
        );
        
          $this->add_control(
            'wps_project_icon_bg_color',
            [
                'label' => esc_html__('Background  Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wps_search_product_input i' => 'background: {{VALUE}} !important;',
                ],
                'default' => '#000', 
            ]
        );
		
  
        $this->add_control(
            'wps_project_icon_bg_hover',
            [
                'label' => esc_html__('Background Hover Color', 'wpsection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wps_search_product_input:hover i' => 'background: {{VALUE}} !important;',
                ],
                'default' => '#000', 
            ]
        );
		
		

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_projce_icon_typo',
                'label'    => __('Typography', 'wpsection'),
                'selector' => '{{WRAPPER}} .wps_search_product_input i',
            )
        );
        
        		$this->add_control(
			'wps_projce_icon_margin',
			array(
				'label'     => __( 'Margin', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} .wps_search_product_input i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
        
		
			$this->add_control(
			'wps_projce_icon_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} .wps_search_product_input i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            array(
                'name' => 'wps_project_icon_border',
                'selector' => '{{WRAPPER}} .wps_search_product_input i',
            )
        );


        $this->add_control(
            'wps_project_icon_radious',
            array(
                'label'     => __('Border Radius', 'wpsection'),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em'],

                'selectors' => array(
                    '{{WRAPPER}} .wps_search_product_input i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


  $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_project_icon_shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_search_product_input i',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_project_icon_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_search_product_input i:hover',
            ]
        );	
		
		$this->end_controls_section();

//Expand Area




$this->start_controls_section(
            'wps_ajax_result_settings',
            array(
                'label' => __( 'Search Result Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
        
       	
 $this->add_control(
                    'wps_ajax_result_alingment',
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
                            '{{WRAPPER}}  .wps_product_search .wps_search_product' => 'text-align: {{VALUE}} !important',
                        ),
                    )
                ); 	
 
 
   
       $this->add_control(
            'wps_ajax_result_color',
            array(
                'label'     => __( 'Background Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_product_search .wps_search_product' => 'background: {{VALUE}} !important',
                ),
            )
        );


	$this->add_control(
			'wps_ajax_result_block_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} .wps_product_search .wps_search_product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		
	$this->add_control(
            'wps_ajax_result_block_margin',
            array(
                'label'     => __( 'Block Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .wps_product_search .wps_search_product' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_ajax_result_block_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_product_search .wps_search_product',
            ]
        );
                
        $this->add_control(
            'wps_ajax_result_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .wps_product_search .wps_search_product' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_ajax_result_block_shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_product_search .wps_search_product',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_ajax_result_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_product_search .wps_search_product:hover',
            ]
        );	
		


	$this->end_controls_section();	

// Details Expand List

$this->start_controls_section(
            'wps_ajax_result_list_settings',
            array(
                'label' => __( 'List Settings', 'wpsection' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
        


    	$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_ajax_result_list_typography',
                'label'    => __( 'Text Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}}  ..wps_ajax_search_result tr',
            )
        );
		
	   $this->add_control(
            'wps_ajax_result_list_color',
            array(
                'label'     => __( 'Text Color', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} ..wps_ajax_search_result tr' => 'color: {{VALUE}} !important',
                ),
            )
        );  
        

	$this->add_control(
			'wps_ajax_result_list_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} ..wps_ajax_search_result tr' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);




		
	$this->add_control(
            'wps_ajax_result_list_margin',
            array(
                'label'     => __( 'Block Margin', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  ..wps_ajax_search_result tr' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );


	
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wps_ajax_result_list_border',
                'label' => esc_html__( 'Box Border', 'wpsection' ),
                'selector' => '{{WRAPPER}} ..wps_ajax_search_result tr',
            ]
        );
                
        $this->add_control(
            'wps_ajax_result_list_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} ..wps_ajax_search_result tr' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );	
		
		
	
    $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_ajax_result_list_shadow',
                'label' => esc_html__( 'Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} ..wps_ajax_search_result tr',
            ]
        );
		
      $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wps_ajax_result_list_hover_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_ajax_search_result tr:hover',
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
                'name'     => 'wps_ajax_search_text_a_typography',
                'label'    => __( 'Text Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}}  .wps_ajax_search_result .search-results-table td a',
            )
        );
		
	   $this->add_control(
            'wps_ajax_search_text_a_color',
            array(
                'label'     => __( 'Text Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_ajax_search_result .search-results-table td a' => 'color: {{VALUE}} !important',
                ),
            )
        );  
        

	$this->add_control(
			'wps_ajax_search_text_a_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} .wps_ajax_search_result .search-results-table td a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);


$this->add_control(
			'hr_menu_one_second_b',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);



    	$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_ajax_search_text_b_typography',
                'label'    => __( 'Rating Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}}  .wps_ajax_search_result .search-results-table .rating i',
            )
        );
		
	   $this->add_control(
            'wps_ajax_search_text_b_color',
            array(
                'label'     => __( 'Rating Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_ajax_search_result .search-results-table .rating i' => 'color: {{VALUE}} !important',
                ),
            )
        );  
        

	$this->add_control(
			'wps_ajax_search_text_b_padding',
			array(
				'label'     => __( 'Rating Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} .wps_ajax_search_result .search-results-table .rating i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

$this->add_control(
			'hr_menu_one_second_c',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);



    	$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'     => 'wps_ajax_search_text_c_typography',
                'label'    => __( 'Rating Typography', 'wpsection' ),
                'selector' => '{{WRAPPER}} .wps_ajax_search_result .wps_ajax_search_price.price',
            )
        );
		
	   $this->add_control(
            'wps_ajax_search_text_c_color',
            array(
                'label'     => __( 'Rating Color', 'wpsection' ),
                //'condition'    => array( 'show_block' => 'show' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .wps_ajax_search_result .wps_ajax_search_price.price' => 'color: {{VALUE}} !important',
                ),
            )
        );  
        

	$this->add_control(
			'wps_ajax_search_text_c_padding',
			array(
				'label'     => __( 'Rating Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
		
				'selectors' => array(
					'{{WRAPPER}} .wps_ajax_search_result .wps_ajax_search_price.price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
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
 

 
</style>';		
		

?>


<div class="wps_ajax_search_area">

<?php echo do_shortcode($settings['wps_ajax_shortcode']); ?>

</div>
<?php

	}
}

// Register widget
Plugin::instance()->widgets_manager->register( new \wpsection_wps_ajax_search_Widget() );
	
} }