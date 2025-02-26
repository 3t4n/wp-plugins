<?php
namespace AddonPackageForElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class APFE_WOO_FLEXSLIDER extends Widget_Base {


	public function get_name() {
		return 'apfe-woo-flexslider';
	}


	public function get_title() {
		return __( 'WooCommerce FlexSlider', 'addon-package-for-elementor' );
	}


	public function get_icon() {
		return 'eicon-slides';
	}


	public function get_categories() {
		return [ 'general' ];
	}


	public function get_script_depends() {
		return [ 'addon-package-for-elementor' ];
	}


	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Slider Settings', 'addon-package-for-elementor' ),
			]
		);
		
		$this->add_control(
			'slider_type',
			[
				'label' => __( 'Slider Type', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'woo_product_carousel',
				'options' => [
					'woo_product_carousel'  => __( 'Woo Product Carousel', 'addon-package-for-elementor' ),
					'woo_categorie_carousel'  => __( 'Woo Categorie Carousel', 'addon-package-for-elementor' )
				],
			]
		);	


		$this->add_control(
			'slider_show_type',
			[
				'label' => __( 'Slider Content', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'all',
				'options' => [
					'all' => __( 'All Products', 'addon-package-for-elementor' ),
					'featured'  => __( 'Featured Products', 'addon-package-for-elementor' ),
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_type',
							'operator' => 'in',
							'value' => [
								'woo_product_carousel'
							],
						],
					],
				],					
			]
		);
		
		
		$this->add_control(
			'slider_show_type_cat',
			[
				'label' => __( 'Slider Content', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'all',
				'options' => [
					'all' => __( 'All Categories', 'addon-package-for-elementor' ),
					'selected_categories'  => __( 'Selected Categories', 'addon-package-for-elementor' ),
					'selected_sub_of_categories'  => __( 'Subcategories of selected Maincategories', 'addon-package-for-elementor' ),
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_type',
							'operator' => 'in',
							'value' => [
								'woo_categorie_carousel'
							],
						],
					],
				],					
			]
		);		



		$taxonomy     = 'product_cat';
		$orderby      = 'name';  
		$show_count   = 0;      // 1 for yes, 0 for no
		$pad_counts   = 0;      // 1 for yes, 0 for no
		$hierarchical = 1;      // 1 for yes, 0 for no  
		$title        = '';  
		$empty        = 0;

		$args = array(
			'taxonomy'     => $taxonomy,
			'orderby'      => $orderby,
			'show_count'   => $show_count,
			'pad_counts'   => $pad_counts,
			'hierarchical' => $hierarchical,
			'title_li'     => $title,
			'hide_empty'   => $empty
			);
		$all_categories = get_categories( $args );
		$categories = [];
		foreach ($all_categories as $cat) {
			if($cat->category_parent == 0) {
				$category_id = $cat->term_id; 
				$categories[$category_id] = $cat->name; 		
			}
		}
	
		$this->add_control(
			'slider_show_cats',
			[
				'label' => __( 'Show Elements', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $categories,
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_type',
							'operator' => 'in',
							'value' => [
								'woo_categorie_carousel'
							],
						],
					],
				],					
			]
		);		
		
		
		$this->add_control(
			'slider_items',
			[
				'label' => __( 'Slider Items', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '6',
				'options' => [
					'2' => __( '2', 'addon-package-for-elementor' ),
					'3'  => __( '3', 'addon-package-for-elementor' ),
					'4' => __( '4', 'addon-package-for-elementor' ),
					'5' => __( '5', 'addon-package-for-elementor' ),
					'6' => __( '6', 'addon-package-for-elementor' )
				],					
			]
		);		


		$this->add_control(
			'slider_animation',
			[
				'label' => __( 'Slider Animation', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => [
					'slide'  => __( 'Slide', 'addon-package-for-elementor' ),
					'fade' => __( 'Fade', 'addon-package-for-elementor' )
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_type',
							'operator' => 'in',
							'value' => [
								'woo_product_carousel1'
							],
						],
					],
				],				
			]
		);


		$this->add_control(
			'slider_slideshow',
			[
				'label' => __( 'Slider Sideshow', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'addon-package-for-elementor' ),
				'label_off' => __( 'No', 'addon-package-for-elementor' ),
				'return_value' => 'true',
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'slider_loop',
			[
				'label' => __( 'Slider Loop', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'addon-package-for-elementor' ),
				'label_off' => __( 'No', 'addon-package-for-elementor' ),
				'return_value' => 'true',
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'slider_touch',
			[
				'label' => __( 'Touch Support', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'addon-package-for-elementor' ),
				'label_off' => __( 'No', 'addon-package-for-elementor' ),
				'return_value' => 'true',
				'default' => 'no',
			]
		);

		$this->add_control(
			'slider_controlnav',
			[
				'label' => __( 'Slider ControlNav', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'addon-package-for-elementor' ),
				'label_off' => __( 'No', 'addon-package-for-elementor' ),
				'return_value' => 'true',
				'default' => 'no',
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_type',
							'operator' => 'in',
							'value' => [
								'basic_slider',
								'basic_carousel',
							],
						],
					],
				],					
			]
		);		
		

		$this->add_control(
			'slider_speed',
			[
				'label' => __( 'Animation Speed', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 100,
				'max' => 5000,
				'step' => 100,
				'default' => 600,
			]
		);

		$this->add_control(
			'slider_slideshow_speed',
			[
				'label' => __( 'Slideshow Speed', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 100,
				'max' => 5000,
				'step' => 100,
				'default' => 7000,
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_slideshow',
							'operator' => 'in',
							'value' => [
								'true',
							],
						],
					],
				],				
			]
		);
		
		
		$this->add_control(
			'slider_show_title',
			[
				'label' => __( 'Show Title', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'addon-package-for-elementor' ),
				'label_off' => __( 'No', 'addon-package-for-elementor' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);		


		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_item',
			[
				'label' => __( 'Item', 'addon-package-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'slider_woo_product_border_style',
			[
				'label' => __( 'Border Style', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => __( 'None', 'addon-package-for-elementor' ),
					'solid' => __( 'Solid', 'Border Control', 'addon-package-for-elementor' ),
					'double' => __( 'Double', 'Border Control', 'addon-package-for-elementor' ),
					'dotted' => __( 'Dotted', 'Border Control', 'addon-package-for-elementor' ),
					'dashed' => __( 'Dashed', 'Border Control', 'addon-package-for-elementor' ),
				],
				'default' => 'solid',
				'selectors' => [
				'{{WRAPPER}} .woocarousel li.product' => 'border-style: {{VALUE}};',
				'{{WRAPPER}} .woocarousel .slides li' => 'border-style: {{VALUE}};',				
				],
				
			]
		);	

		$this->add_control(
			'slider_woo_product_border_width',
			[
			'label' => __( 'Border Width', 'Border Control', 'addon-package-for-elementor' ),
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'default' => [
					'top' => '4',
					'right' => '4',
					'bottom' => '4',
					'left' => '4',
					'unit' => 'px',
					'isLinked' => 'false',
				],				
			'selectors' => [
				'{{WRAPPER}} .woocarousel li.product' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .woocarousel .slides li' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			]
			]
		);
		
		$this->add_control(
			'slider_woo_product_border_color',
			[
			'label' => __( 'Border Color', 'Border Control', 'addon-package-for-elementor' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '#E4E4E4',
			'selectors' => [
				'{{WRAPPER}} .woocarousel li.product' => 'border-color: {{VALUE}};',
				'{{WRAPPER}} .woocarousel .slides li' => 'border-color: {{VALUE}};',
			],
			]
		);	
		
		$this->add_control(
			'slider_woo_product_padding',
			[
				'label' => __( 'Padding', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'top' => '15',
					'right' => '15',
					'bottom' => '15',
					'left' => '15',
					'unit' => 'px',
					'isLinked' => 'false',
				],				
				'selectors' => [
					'{{WRAPPER}} .woocarousel li.product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .woocarousel .slides li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
			]
		);		

		$this->add_control(
			'slider_woo_product_margin',
			[
				'label' => __( 'Margin', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocarousel li.product' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .woocarousel .slides li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',				
				],			
			]
		);		

		$this->end_controls_section();


		
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Title', 'addon-package-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'slider_title_color',
			[
				'label' => __( 'Color', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .woocarousel .woocommerce-loop-product__title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .woocarousel .slides .woocarousel-title' => 'color: {{VALUE}}',
				],
			]
		);		

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'       => 'post_meta',
				'label'      => __( 'Typography', 'wordpress' ),
				'scheme'     => \Elementor\Scheme_Typography::TYPOGRAPHY_2,
				'selector'   => '{{WRAPPER}} .woocarousel .woocommerce-loop-product__title, {{WRAPPER}} .woocarousel .slides .woocarousel-title',
			)
		);
		
		$this->add_control(
			'opt-margin-woocarousel-title',
			[
				'label' => __( 'Margin', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocarousel .woocommerce-loop-product__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .woocarousel .slides li .woocarousel-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; display: block;',				
				],
			]
		);	

		$this->add_control(
			'slider_title_text_align',
			[
				'label' => __( 'Alignment', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'addon-package-for-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'addon-package-for-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'addon-package-for-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selector'   => '{{WRAPPER}} .woocarousel .woocommerce-loop-product__title, {{WRAPPER}} .woocarousel .woocarousel-title',
				
			]
		);	

		$this->end_controls_section();

		
		$this->start_controls_section(
			'section_style_price',
			[
				'label' => __( 'Price', 'addon-package-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_type',
							'operator' => 'in',
							'value' => [
								'woo_product_carousel',
							],
						],
					],
				],	
			]
		);

		$this->add_control(
			'slider_price_color',
			[
				'label' => __( 'Text Color', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#333',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .woocarousel .price .woocommerce-Price-amount' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'       => 'slider_woo_product_price_typography',
				'label'      => __( 'Typography', 'wordpress' ),
				'scheme'     => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector'   => '{{WRAPPER}} .woocarousel .price .woocommerce-Price-amount',			
			)
		);		
		
		$this->add_control(
			'slider_woo_product_price_padding',
			[
				'label' => __( 'Padding', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '15',
					'left' => '0',
					'unit' => 'px',
					'isLinked' => 'false',
				],					
				'selectors' => [
					'{{WRAPPER}} .woocarousel li.product .price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
			]
		);		

		$this->add_control(
			'slider_woo_product_price_margin',
			[
				'label' => __( 'Margin', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocarousel li.product .price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
			]
		);			

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_add_to_cart',
			[
				'label' => __( 'Add To Cart Button', 'addon-package-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_type',
							'operator' => 'in',
							'value' => [
								'woo_product_carousel',
							],
						],
					],
				],					
			]
		);


		$this->add_control(
			'slider_woo_show_atcbtn',
			[
				'label' => __( 'Show Button', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'addon-package-for-elementor' ),
				'label_off' => __( 'No', 'addon-package-for-elementor' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'slider_woo_product_atcbtn_background',
			[
				'label' => __( 'Background Color', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .woocarousel li.product .add_to_cart_button' => 'background-color: {{VALUE}}',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_woo_show_atcbtn',
							'operator' => 'in',
							'value' => [
								'true',
							],
						],
					],
				],									
			]
		);	
		
		$this->add_control(
			'slider_woo_product_atcbtn_color',
			[
				'label' => __( 'Text Color', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#FFFFFF',
				'selectors' => [
					'{{WRAPPER}} .woocarousel li.product .add_to_cart_button' => 'color: {{VALUE}}',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_woo_show_atcbtn',
							'operator' => 'in',
							'value' => [
								'true',
							],
						],
					],
				],				
			]
		);			


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'       => 'slider_woo_product_atcbtn_typography',
				'label'      => __( 'Typography', 'wordpress' ),
				'scheme'     => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector'   => '{{WRAPPER}} .woocarousel li.product .add_to_cart_button',
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_woo_show_atcbtn',
							'operator' => 'in',
							'value' => [
								'true',
							],
						],
					],
				],				
			)
		);

		$this->add_control(
			'slider_woo_product_atcbtn_padding',
			[
				'label' => __( 'Padding', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'top' => '15',
					'right' => '15',
					'bottom' => '15',
					'left' => '15',
					'unit' => 'px',
					'isLinked' => 'false',
				],
				'selectors' => [
					'{{WRAPPER}} .woocarousel li.product .add_to_cart_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_woo_show_atcbtn',
							'operator' => 'in',
							'value' => [
								'true',
							],
						],
					],
				],				
			]
		);	
		
		$this->add_control(
			'slider_woo_product_atcbtn_margin',
			[
				'label' => __( 'Margin', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocarousel li.product .add_to_cart_button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_woo_show_atcbtn',
							'operator' => 'in',
							'value' => [
								'true',
							],
						],
					],
				],				
			]
		);			
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_style_arrows',
			[
				'label' => __( 'Direction Nav', 'addon-package-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);		
		
		$this->add_control(
			'slider_nav_color',
			[
				'label' => __( 'Arrows Color', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'return_value' => 'true',
				'default' => '#000000C2',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .flex-direction-nav a:before' => 'color: {{VALUE}}',
				],
			]
		);	

		$this->add_control(
			'slider_nav_color_border',
			[
				'label' => __( 'Arrows (Shadow Color)', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'return_value' => 'true',
				'default' => '#FFFFFF5E',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .flex-direction-nav a:before' => 'text-shadow: 1px 1px 0 {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		
	}


	protected function render() {
		
		$settings = $this->get_settings_for_display();

		if (isset($settings['slider_type'])) {
			$slider_type = $settings['slider_type'];
		} else {
			$slider_type = "basic_slider";	
		}	
		if (isset($settings['slider_show_type'])) {
			$slider_show_type = $settings['slider_show_type'];
		} else {
			$slider_show_type = "all";	
		}		
		if (isset($settings['slider_items'])) {
			$slider_items = $settings['slider_items'];
		} else {
			$slider_items = "1";	
		}			
		if (isset($settings['slider_animation']) && !empty($settings['slider_animation'])) {
			$slider_animation = $settings['slider_animation'];
		} else {
			$slider_animation = "slide";	
		}			
		if (isset($settings['slider_slideshow']) && $settings['slider_slideshow'] != "no" && !empty($settings['slider_slideshow'])) {
			$slider_slideshow = "true";
		} else {
			$slider_slideshow = "false";	
		}		
		if (isset($settings['slider_loop']) && $settings['slider_loop'] != "no" && !empty($settings['slider_loop'])) {
			$slider_loop =  "true";
		} else {
			$slider_loop = "false";	
		}
		if (isset($settings['slider_touch']) && $settings['slider_touch'] != "no" && !empty($settings['slider_touch'])) {
			$slider_touch =  "true";
		} else {
			$slider_touch = "false";	
		}	
		if (isset($settings['slider_show_title']) && $settings['slider_show_title'] != "no" && !empty($settings['slider_show_title'])) {
			$slider_show_title =  "true";
		} else {
			$slider_show_title = "false";	
		}		
		if (isset($settings['slider_woo_show_atcbtn']) && $settings['slider_woo_show_atcbtn'] != "no" && !empty($settings['slider_woo_show_atcbtn'])) {
			$slider_woo_show_atcbtn =  "true";
		} else {
			$slider_woo_show_atcbtn = "false";	
		}			
		if (isset($settings['slider_controlnav']) && $settings['slider_controlnav'] != "no" && !empty($settings['slider_controlnav'])) {
			$slider_controlnav =  "true";
		} else {
			$slider_controlnav = "false";	
		}				
		if (isset($settings['slider_speed'])) {
			$slider_speed = $settings['slider_speed'];
		} else {
			$slider_speed = "600";	
		}		
		if (isset($settings['slider_slideshow_speed'])) {
			$slider_slideshow_speed = $settings['slider_slideshow_speed'];
		} else {
			$slider_slideshow_speed = "7000";	
		}	

		if (isset($settings['slider_title_text_align'])) {
			$slider_title_text_align = $settings['slider_title_text_align'];
		} else {
			$slider_title_text_align = "center";	
		}	
	
		if (isset($settings['slider_show_cats'])) {
			$slider_show_cats = $settings['slider_show_cats'];
		} else {
			$slider_show_cats = array();	
		}		
		
		if (isset($settings['slider_show_type_cat'])) {
			$slider_show_type_cat = $settings['slider_show_type_cat'];
		} else {
			$slider_show_type_cat = "all";	
		}			
		
		?>
		
		<div style="display:none;" class="apfe_slider_settings" data-items="<?php echo $slider_items; ?>" data-woo-type="<?php echo $slider_show_type; ?>" data-controlnav="<?php echo $slider_controlnav; ?>" data-touch="<?php echo $slider_touch; ?>" data-slideshowspeed="<?php echo $slider_slideshow_speed; ?>" data-loop="<?php echo $slider_loop; ?>" data-slideshow="<?php echo $slider_slideshow; ?>" data-sliderspeed="<?php echo $slider_speed; ?>" data-slidertype="<?php echo $slider_animation; ?>"></div>
		
		<?php if ($slider_type == "woo_product_carousel") { ?>
		<?php $uniqe_id = "woocarousel_id_".uniqid(); ?>
			<div class="flexslider carousel woocarousel">
				<style>
					.slides.<?php echo $uniqe_id; ?> {
						text-align: <?php echo $slider_title_text_align; ?>
					}
					<?php if ($slider_show_title == "false") { ?>
					.slides.<?php echo $uniqe_id; ?> h2.woocommerce-loop-product__title {
						display: none;
					}
					<?php } ?>
					<?php if ($slider_woo_show_atcbtn == "false") { ?>
					.slides.<?php echo $uniqe_id; ?> .add_to_cart_button  {
						display: none !Important;
					}
					<?php } ?>					
					
				</style>			
				<ul class="slides <?php echo $uniqe_id; ?>">	
				
				<?php
					if ($slider_show_type == 'featured') {
						$tax_query[] = array(
							'taxonomy' => 'product_visibility',
							'field'    => 'name',
							'terms'    => 'featured',
							'operator' => 'IN', 
						);
						$loop_products = new \WP_Query( array(
							'post_type'           => 'product',
							'post_status'         => 'publish',
							'ignore_sticky_posts' => 1,
							'posts_per_page'      => $products,
							'orderby'             => $orderby,
							'order'               => $order == 'asc' ? 'asc' : 'desc',
							'tax_query'           => $tax_query
						) );					
					} else if ($slider_show_type == 'all') {
						$loop_products = new \WP_Query( array(
							'post_type'           => 'product',
							'post_status'         => 'publish',
							'ignore_sticky_posts' => 1
						) );
					} else {
						$loop_products = new \WP_Query( array(
							'post_type'           => 'product',
							'post_status'         => 'publish',
							'ignore_sticky_posts' => 1
						) );
					}
					
					
					if ($loop_products->have_posts()) {
						
						while ($loop_products->have_posts()) {
							
							$loop_products->the_post();
							
							wc_get_template_part('content', 'product');
							
						}
						
					} else {
						
						do_action( 'woocommerce_no_products_found' );
						
					}
					
					wp_reset_postdata();
					
					do_action('woocommerce_after_shop_loop');	
							
				?>
				
				</ul>
				
			</div>	

		<?php } else if ($slider_type == "woo_categorie_carousel") {

			$orderby = 'name';
			
			$order = 'asc';
			
			$hide_empty = false;
			
			$taxonomy = 'product_cat';
			
			if ($slider_show_type_cat == "all") {
				$cat_args = array(
					'orderby'    => $orderby,
					'order'      => $order,
					'hide_empty' => $hide_empty,
				);
			} else if ($slider_show_type_cat == "selected_categories") {
				$cat_args = array(
					'orderby'    => $orderby,
					'order'      => $order,
					'hide_empty' => $hide_empty,
					'include' => $slider_show_cats,
					'orderby'  => 'include',
				);			
			} else if ($slider_show_type_cat == "selected_sub_of_categories") {
				$all_term_ids = array();
				foreach ($slider_show_cats as $cat_id) {
					$terms    = get_terms([
						'taxonomy'    => $taxonomy,
						'hide_empty'  => $hide_empty,
						'parent'      => $cat_id
					]);
					$output = '<ul class="subcategories-list">';
					foreach ( $terms as $term ) {
						$all_term_ids[] = $term->term_id;
					}
				}
				$cat_args = array(
					'orderby'    => $orderby,
					'order'      => $order,
					'hide_empty' => $hide_empty,
					'include' => $all_term_ids,
					'orderby'  => 'include',
				);
			} else {
				$cat_args = array(
					'orderby'    => $orderby,
					'order'      => $order,
					'hide_empty' => $hide_empty,
				);				
			}
				 
			$product_categories = get_terms( 'product_cat', $cat_args );

			if( !empty($product_categories) ) { ?>
			
				<div class="flexslider carousel woocarousel">
				
					<ul class="slides">	
					
						<?php
						foreach ($product_categories as $key => $category) {
							
							$cat_thumb_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
							
							$shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog' );	
							
							if (isset($shop_catalog_img[0])) {
								
								$cat_image = $shop_catalog_img[0];
								
							} else {
								
								$cat_image = plugin_dir_url(__FILE__ )."../assets/img/placeholder.png";
								
							}
						?>
					
						<li>
						
							<a href="<?php echo get_term_link($category); ?>" >
							
								<img src="<?php echo $cat_image; ?>" alt="<?php echo $category->name; ?>" />
								
								<?php if ($slider_show_title == "true") { ?>
								
									<span class="woocarousel-title" style="text-align:<?php echo $slider_title_text_align; ?>"><?php echo $category->name; ?></span>
								
								<?php } ?>
								
							</a>
							
						</li>
					
					<?php } ?>
					
					</ul>
					
				</div>
				
			<?php } ?>
				
				
				
				
			
		<?php } else if ($slider_type == "basic_carousel") { ?>

			<div class="flexslider carousel">
				<ul class="slides">	
					<?php foreach ( $settings['gallery'] as $image ) { ?>
						<li><img src="<?php echo $image['url']; ?>" /></li>			
					<?php }	?>
				</ul>
			</div>

		<?php } ?>
		
	<?php
	}

	 protected function _content_template2() {
	 }

}
