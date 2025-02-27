<?php 





  $this->add_control(
        'filter_category',
        [
            'label'     => esc_html__( 'Category Filter', 'wpsection' ),
            'type'      => \Elementor\Controls_Manager::SELECT,
            'default'   => 'no_cat',
            'options'   => [
                'single_cat' => esc_html__( 'Single Category', 'wpsection' ),
                'multi_cat'  => esc_html__( 'Multiple Categories', 'wpsection' ),
                'no_cat'     => esc_html__( 'Not from Categories', 'wpsection' ),
            ],
        ]
    );

    $this->add_control(
        'query_category',
        [
            'label'       => __( 'Multiple Categories', 'wpsection' ),
            'condition'   => [
                'filter_category' => 'multi_cat'
            ],
            'type'        => \Elementor\Controls_Manager::SELECT2,
            'multiple'    => true,
            'options'     => nest_get_product_x_categories(), // Use slugs
            'default'     => [],
            'description' => esc_html__( 'Select categories.', 'wpsection' ),
        ]
    );

    $this->add_control(
        'query_category_2',
        [
            'label'       => __( 'Single Category', 'wpsection' ),
            'condition'   => [
                'filter_category' => 'single_cat'
            ],
            'type'        => \Elementor\Controls_Manager::SELECT,
            'options'     => nest_get_product_x_categories(), // Use slugs
            'default'     => '',
            'description' => esc_html__( 'Select a category.', 'wpsection' ),
        ]
    );




$this->add_control(
    'product_grid_type',
    array(
        'label'   => esc_html__( 'Products Type', 'wpsection' ),
        'type'    =>  \Elementor\Controls_Manager::SELECT,
        'default' => 'recent_products', // Set default value to 'none'
        'options' => array(
            'none'                  => esc_html__( 'None', 'wpsection' ),  
            'sale_products'         => esc_html__( 'Sale Products', 'wpsection' ),
            'best_selling_products' => esc_html__( 'Best Selling Products', 'wpsection' ),
            'recent_products'       => esc_html__( 'Recent Products', 'wpsection' ),
            'top_rated_products'    => esc_html__( 'Top Rated Products', 'wpsection' ),
            'in_stock'              => esc_html__( 'In Stock', 'wpsection' ),
            'out_of_stock'          => esc_html__( 'Out of Stock', 'wpsection' ),
            'featured_products'     => esc_html__( 'Featured Products', 'wpsection' ),
            'product_price_low_to_high' => esc_html__( 'Price: Low to High', 'wpsection' ),
            'product_price_high_to_low' => esc_html__( 'Price: High to Low', 'wpsection' ),
            'product_tag'           => esc_html__( 'Tags', 'wpsection' ),
        ),
    )
);




//Tags Settings 
$this->add_control(
    'filter_tag',
    array(
        'label'     => esc_html__( 'Tag Filter', 'wpsection' ),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'condition' => array(
            'product_grid_type' => 'product_tag'

        ),
        'default'   => 'multi_tag',
        'options'   => array(
            'single_tag' => esc_html__( 'Single Tag', 'wpsection' ),
            'multi_tag'  => esc_html__( 'Multiple Tag', 'wpsection' ),
        ),
    )
);

$this->add_control(
    'query_tag',
    array(
        'label'       => __( 'Multiple Tag', 'wpsection' ),
        'condition'   => array(
            'product_grid_type' => 'product_tag',
            'filter_tag'   => 'multi_tag'
        ),
        'type'        => \Elementor\Controls_Manager::SELECT2,
        'multiple'    => true,
        'options'     => mr_shop_product_tag_list(), 
        'default'     => ' ', 
        'description' => esc_html__( 'Set Tags', 'wpsection' ),
    )
);

$this->add_control(
    'query_tag_2',
    array(
        'label'       => __( 'Single Tag', 'wpsection' ),
        'condition'   => array(
            'product_grid_type' => 'product_tag',
            'filter_tag'   => 'single_tag'
        ),
        'type'        => \Elementor\Controls_Manager::SELECT,
        'options'     => mr_shop_product_tag_list(), 
        'default'     => ' ',
        'description' => esc_html__( 'Select a Tag', 'wpsection' ),
    )
);









      $this->add_control(
            'query_number',
              array(
            
                'label'   => esc_html__( 'Number of post', 'wpsection' ),
                'label_block' => false,
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            )
        );
   
     $this->add_control(
            'query_orderby',
          array(
                'label'   => esc_html__( 'Order By', 'wpsection' ),
                'label_block' => false,
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'date',
                'options' => array(
                    'date'       => esc_html__( 'Date', 'wpsection' ),
                    'title'      => esc_html__( 'Title', 'wpsection' ),
                    'menu_order' => esc_html__( 'Menu Order', 'wpsection' ),
                    'rand'       => esc_html__( 'Random', 'wpsection' ),
                ),
            )
        );

   $this->add_control(
            'query_order',
            array(
                'label'   => esc_html__( 'Order', 'wpsection' ),
                'label_block' => false,
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => array(
                    'DESC' => esc_html__( 'DESC', 'wpsection' ),
                    'ASC'  => esc_html__( 'ASC', 'wpsection' ),
                ),
                'separator' => 'after'
            )
        );


    $this->add_control(
            'wps_columns',
            array(
                'label' => __( 'Normal Columns Settings', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1'  => __( '1 Column', 'wpsection' ),
                    '2' => __( '2 Columns', 'wpsection' ),
                    '3' => __( '3 Columns', 'wpsection' ),
                    '4' => __( '4 Columns', 'wpsection' ),
                    '5' => __( '5 Columns', 'wpsection' ),
                    '6' => __( '6 Columns', 'wpsection' ),
                    '7' => __( '7 Columns', 'wpsection' ),
                    '8' => __( '8 Columns', 'wpsection' ),
                    '9' => __( '9 Columns', 'wpsection' ),
                    '10' => __( '10 Columns', 'wpsection' ),
                ],
            )
        );

    $this->add_control(
            'wps_columns_tab',
            array(
                'label' => __( 'Tab Columns Settings', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1'  => __( '1 Column', 'wpsection' ),
                    '2' => __( '2 Columns', 'wpsection' ),
                    '3' => __( '3 Columns', 'wpsection' ),
                    '4' => __( '4 Columns', 'wpsection' ),
					'5' => __( '5 Columns', 'wpsection' ),
                    '6' => __( '6 Columns', 'wpsection' ),
					'7' => __( '7 Columns', 'wpsection' ),
					'8' => __( '8 Columns', 'wpsection' ),
					'9' => __( '9 Columns', 'wpsection' ),
					'10' => __( '10 Columns', 'wpsection' ),
                ],
            )
        );

 $this->add_control(
            'wps_columns_mobile',
            array(
                'label' => __( 'Mobile Columns Settings', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1'  => __( '1 Column', 'wpsection' ),
                    '2' => __( '2 Columns', 'wpsection' ),
                    '3' => __( '3 Columns', 'wpsection' ),
                    '4' => __( '4 Columns', 'wpsection' ),
					'5' => __( '5 Columns', 'wpsection' ),
                    '6' => __( '6 Columns', 'wpsection' ),
                ],
            )
        );


    $this->add_control(
            'container_width',
            [
                'label' => esc_html__( 'Section Width ', 'wpsection' ),
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
                    '{{WRAPPER}} .auto-container' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );    



    $this->add_control(
                'show_features_expand',
               array(
                    'label' => __( 'Features Text Expand', 'wpsection' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '0',
                    'placeholder' => __( 'Show Features Text Expand', 'wpsection' ),
                )
            );

  $this->add_control(
            'wps_columns_expand',
            array(
                'label' => __( 'Expand Settings', 'wpsection' ),
				 'condition'    => array( 'show_features_expand' => '1' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'top'  => __( 'Expand on Top', 'wpsection' ),
                    'bottom' => __( 'Expand to Bottom', 'wpsection' ),
               
                ],
            )
        );

$this->add_control(
    'expand_top_height',
    [
        'label' => esc_html__( 'Expand Top Height ', 'wpsection' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'condition' => [
            'wps_columns_expand' => 'top',  // First condition
            'show_features_expand' => '1',   // Second condition
        ],
        'size_units' => [ 'px', '%' ],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 300,
                'step' => 1,
            ],
            '%' => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'default' => [
            'unit' => 'px',
            'size' => 80,
        ],
        'selectors' => [
            '{{WRAPPER}} .mr_shop .product-block_hr_001:hover .wps_hide_two_block .hider_area_2' => 'height: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .mr_shop .product-block_hr_001:hover .wps_hide_two_block .wps_product_details.product_bottom.mr_bottom' => 'margin-top: -{{SIZE}}{{UNIT}};',
        ],
    ]
);
 



    $this->add_control(
                'wps_block_pagination',
                [
                    'label'   => __('Enable Pagination', 'wpsection'),
                    'type'    => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'no',
                ]
            );
			
    //End of Genaral Settings

$this->end_controls_section();