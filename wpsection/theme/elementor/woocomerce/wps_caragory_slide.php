<?php
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;

class WPSection_WPS_Category_Slide_Widget extends Widget_Base {

    public function get_name() {
        return 'wpsection_wps_category_slide';
    }

    public function get_title() {
        return __( 'Categories Slide', 'wpsection' );
    }

    public function get_icon() {
        return 'eicon-slider-album';
    }

    public function get_keywords() {
        return [ 'wpsection', 'product', 'categories', 'slider' ];
    }

    public function get_categories() {
        return [ 'wpsection_shop' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'category_slider_settings',
            [
                'label' => esc_html__( 'Categories Slide Settings', 'wpsection' ),
            ]
        );

		   // Number of Categories to Show
        $this->add_control(
            'number',
            [
                'label' => __( 'Number of Categories', 'wpsection' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'description' => __( 'Enter the total number of categories to display.', 'wpsection' ),
            ]
        );
        // Select Categories
        $this->add_control(
            'categories',
            [
                'label' => __( 'Select Categories', 'wpsection' ),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->get_categories_list(),
                'multiple' => true,
                'default' => [],
                'description' => __( 'Select categories to include in the slider.', 'wpsection' ),
            ]
        );

     

        // Columns per View
        $this->add_control(
            'columns',
            [
                'label' => __( 'Desktop Columns Per View', 'wpsection' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 4,
             
            ]
        );
	    // Tab Columns per View
        $this->add_control(
            'columns_tab',
            [
                'label' => __( 'Tab Columns Per View', 'wpsection' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 4,
          
            ]
        );

	// Tab Columns per View
        $this->add_control(
            'columns_mobile',
            [
                'label' => __( 'Mobile Columns Per View', 'wpsection' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 2,

            ]
        );
        // Switches
        $this->add_control(
            'show_thumbnails',
            [
                'label' => __( 'Show Thumbnails', 'wpsection' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'wpsection' ),
                'label_off' => __( 'No', 'wpsection' ),
                'default' => '1',
            ]
        );

        $this->add_control(
            'show_titles',
            [
                'label' => __( 'Show Titles', 'wpsection' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'wpsection' ),
                'label_off' => __( 'No', 'wpsection' ),
                'default' => '1',
            ]
        );

        $this->add_control(
            'show_product_count',
            [
                'label' => __( 'Show Product Count', 'wpsection' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'wpsection' ),
                'label_off' => __( 'No', 'wpsection' ),
                'default' => '1',
            ]
        );

        $this->add_control(
            'show_arrows',
            [
                'label' => __( 'Show Navigation Arrows', 'wpsection' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'wpsection' ),
                'label_off' => __( 'No', 'wpsection' ),
                'default' => '1',
            ]
        );
		$this->add_control(
    'slide_auto_loop',
    [
        'label' => __( 'Autoplay Slider', 'wpsection' ),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __( 'Yes', 'wpsection' ),
        'label_off' => __( 'No', 'wpsection' ),
        'return_value' => '1',
        'default' => '1',
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
// Text Alignment
$this->add_control(
    'text_alignment',
    [
        'label'     => __( 'Text Alignment', 'wpsection' ),
        'type'      => Controls_Manager::CHOOSE,
        'options'   => [
            'left'   => [
                'title' => __( 'Left', 'wpsection' ),
                'icon'  => 'eicon-text-align-left',
            ],
            'center' => [
                'title' => __( 'Center', 'wpsection' ),
                'icon'  => 'eicon-text-align-center',
            ],
            'right'  => [
                'title' => __( 'Right', 'wpsection' ),
                'icon'  => 'eicon-text-align-right',
            ],
        ],
        'default'   => 'center',
        'selectors' => [
            '{{WRAPPER}} .category-item h3' => 'text-align: {{VALUE}};',
        ],
    ]
);
$this->add_control(
    'title_color',
    [
        'label'     => __( 'Title Color', 'wpsection' ),
        'type'      => Controls_Manager::COLOR,
        'default'   => '#333',
        'selectors' => [
            '{{WRAPPER}} .category-item h3 a' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name'     => 'title_typography',
        'label'    => __( 'Title Typography', 'wpsection' ),
        'selector' => '{{WRAPPER}} .category-item h3 a',
    ]
);


		
   $this->add_control(
            'title_typography__margin',
            array(
                'label'     => __( 'Block Margin', 'wpsection' ),
             
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .category-item h3 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

        $this->add_control(
            'title_typography__padding',
            array(
                'label'     => __( 'Block Padding', 'wpsection' ), 
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .category-item h3 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );		
		
		
// Product Count Style
$this->add_control(
    'count_text_alignment',
    [
        'label'     => __( 'Count Text Alignment', 'wpsection' ),
		'separator' => 'before',
        'type'      => Controls_Manager::CHOOSE,
        'options'   => [
            'left'   => [
                'title' => __( 'Left', 'wpsection' ),
                'icon'  => 'eicon-text-align-left',
            ],
            'center' => [
                'title' => __( 'Center', 'wpsection' ),
                'icon'  => 'eicon-text-align-center',
            ],
            'right'  => [
                'title' => __( 'Right', 'wpsection' ),
                'icon'  => 'eicon-text-align-right',
            ],
        ],
        'default'   => 'center',
        'selectors' => [
            '{{WRAPPER}} .category-item .product-count' => 'text-align: {{VALUE}};',
        ],
    ]
);
$this->add_control(
    'product_count_color',
    [
        'label'     => __( 'Product Count Color', 'wpsection' ),
        'type'      => Controls_Manager::COLOR,
        'default'   => '#555',
        'selectors' => [
            '{{WRAPPER}} .category-item .product-count' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name'     => 'product_count_typography',
        'label'    => __( 'Product Count Typography', 'wpsection' ),
        'selector' => '{{WRAPPER}} .category-item .product-count',
    ]
);

	
		
   $this->add_control(
            'count_typography__margin',
            array(
                'label'     => __( 'Block Margin', 'wpsection' ),
             
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}}  .category-item .product-count' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );

        $this->add_control(
            'count_typography__padding',
            array(
                'label'     => __( 'Block Padding', 'wpsection' ), 
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
            
                'selectors' => array(
                    '{{WRAPPER}} .category-item .product-count' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );		
		
		
		
// Thumbnail Style
  $this->add_control(
            'wps_cat_thumbnail_width',
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
                    '{{WRAPPER}} .category-item img' => 'max-width: {{SIZE}}{{UNIT}}!important;',
                    
                ],
            ]
        );  

  $this->add_control(
            'wps_cat_thumbnail_height',
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
                    '{{WRAPPER}} .category-item img' => 'max-height: {{SIZE}}{{UNIT}}!important;',
                    
                ],
            ]
        );  



		
// Padding
$this->add_control(
    'block_thumb_padding',
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
            '{{WRAPPER}} .category-item img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// Margin
$this->add_control(
    'block_thumb_margin',
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
            '{{WRAPPER}} .category-item img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// Background Color
$this->add_control(
    'block_thumb_bg_color',
    [
        'label'     => __( 'Background Color', 'wpsection' ),
        'type'      => Controls_Manager::COLOR,
        'default'   => '#ffffff',
        'selectors' => [
            '{{WRAPPER}} .category-item img' => 'background-color: {{VALUE}};',
        ],
    ]
);
// Border Style
$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name'        => 'block_thumb_border',
        'label'       => __( 'Border', 'wpsection' ),
        'selector'    => '{{WRAPPER}} .category-item img',
        'description' => __( 'Set border for the category block.', 'wpsection' ),
    ]
);
// Border Radius


        $this->add_control(
            'block_thumb_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
   
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .category-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
		
			
$this->end_controls_section();
		

$this->start_controls_section(
    'category_block_style_section',
    [
        'label' => __( 'Category Block Style', 'wpsection' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    ]
);

		
// Padding
$this->add_control(
    'block_padding',
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
            '{{WRAPPER}} .category-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// Margin
$this->add_control(
    'block_margin',
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
            '{{WRAPPER}} .category-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// Background Color
$this->add_control(
    'block_bg_color',
    [
        'label'     => __( 'Background Color', 'wpsection' ),
        'type'      => Controls_Manager::COLOR,
        'default'   => '#ffffff',
        'selectors' => [
            '{{WRAPPER}} .category-item' => 'background-color: {{VALUE}};',
        ],
    ]
);
// Border Style
$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name'        => 'block_border',
        'label'       => __( 'Border', 'wpsection' ),
        'selector'    => '{{WRAPPER}} .category-item',
        'description' => __( 'Set border for the category block.', 'wpsection' ),
    ]
);
// Border Radius


        $this->add_control(
            'block_border_radius',
            array(
                'label'     => __( 'Border Radius', 'wpsection' ),
   
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' =>  ['px', '%', 'em' ],
                'selectors' => array(
                    '{{WRAPPER}} .category-item ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ),
            )
        );
				
		
// Box Shadow
$this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name'     => 'block_box_shadow',
        'label'    => __( 'Box Shadow', 'wpsection' ),
        'selector' => '{{WRAPPER}} .category-item',
    ]
);




$this->end_controls_section();
		
		
		
		
    }

    private function get_categories_list() {
        $categories = get_terms( [ 'taxonomy' => 'product_cat', 'hide_empty' => false ] );
        $options = [];
        if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
            foreach ( $categories as $category ) {
                $options[ $category->term_id ] = $category->name;
            }
        }
        return $options;
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $categories = $settings['categories'];
        $number = $settings['number'];
        $columns = $settings['columns'];
		$columns_mobile = $settings['columns_mobile'];
		$columns_tab = $settings['columns_tab'];
        $unique_id = uniqid('categories-slider-');

        ?>

        <div id="<?php echo esc_attr( $unique_id ); ?>" class="wps_product_cat_slide categories-slider owl-carousel">
            <?php
            if ( ! empty( $categories ) ) {
                $query_args = [
                    'taxonomy'   => 'product_cat',
                    'include'    => $categories,
                    'number'     => $number,
                    'hide_empty' => false,
                ];
                $categories = get_terms( $query_args );

                foreach ( $categories as $category ) {
                    $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                    $image_url = wp_get_attachment_url( $thumbnail_id );
                    $link = get_term_link( $category );
                    $product_count = $category->count;

                    echo '<div class="category-item">';
                    if ( $settings['show_thumbnails'] && $image_url ) {
                        echo '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $category->name ) . '">';
                    }
                    if ( $settings['show_titles'] ) {
                        echo '<h3><a href="' . esc_url( $link ) . '">' . esc_html( $category->name ) . '</a></h3>';
                    }
					
if ( $settings['show_product_count'] ) {
    $product_label = $product_count === 1 ? __( 'Product', 'wpsection' ) : __( 'Products', 'wpsection' );
    
    // Translators: %1$d is the product count, and %2$s is the product label (singular or plural).
    echo '<h3 class="product-count">' . esc_html( sprintf( __( '%1$d %2$s', 'wpsection' ), intval( $product_count ), esc_html( $product_label ) ) ) . '</h3>';
}


					
					
					

                    echo '</div>';
                }
            }
            ?>
        </div>

<script>
    jQuery(document).ready(function($) {
        $('#<?php echo esc_js( $unique_id ); ?>').owlCarousel({
            loop: false,
            margin: 10,
            nav: <?php echo wp_json_encode( ! empty( $settings['show_arrows'] ) && $settings['show_arrows'] === '1' ); ?>,
            smartSpeed: 500,
            autoplay: <?php echo wp_json_encode( ! empty( $settings['slide_auto_loop'] ) && $settings['slide_auto_loop'] === '1' ); ?>,
            navText: [ '<i class="eicon-chevron-left"></i>', '<i class="eicon-chevron-right"></i>' ],
            responsive: {
                0: { items: Math.min(2, <?php echo esc_js( $columns_mobile ); ?>) },
                480: { items: Math.min(2, <?php echo esc_js( $columns_mobile ); ?>) },
                768: { items: Math.min(3, <?php echo esc_js( $columns_tab ); ?>) },
                1024: { items: <?php echo esc_js( $columns ); ?> }
            }
        });
    });
</script>





        <?php
    }
}

// Register the widget
Plugin::instance()->widgets_manager->register_widget_type( new WPSection_WPS_Category_Slide_Widget() );
