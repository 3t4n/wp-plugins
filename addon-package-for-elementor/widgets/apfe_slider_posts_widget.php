<?php
namespace AddonPackageForElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class APFE_POSTS_FLEXSLIDER extends Widget_Base {


	public function get_name() {
		return 'apfe-postcarousel-flexslider';
	}


	public function get_title() {
		return __( 'Post Carousel FlexSlider', 'apfwtd' );
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
				'default' => 'basic_slider',
				'options' => [
					'basic_slider_wt' => __( 'Basic / Thumbnail Slider', 'addon-package-for-elementor' ),
					'basic_carousel' => __( 'Basic Carousel', 'addon-package-for-elementor' )
				],
			]
		);	
		
		$this->add_control(
			'slider_content',
			[
				'label' => __( 'Slider Content', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'posts_from_categrories',
				'options' => [
					'posts_from_categrories'  => __( 'Posts from Post Categories', 'addon-package-for-elementor' ),
					'specified_posts' => __( 'Specified Posts', 'addon-package-for-elementor' ),
				],
			]
		);	


		$all_categories = get_categories();
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
							'name' => 'slider_content',
							'operator' => 'in',
							'value' => [
								'posts_from_categrories'
							],
						],
					],
				],					
			]
		);	
		
		
		$args = array('numberposts'     => -1);
		$all_products = get_posts($args);
		$products = [];
		foreach ($all_products as $product) {
				$product_id = $product->ID; 
				$products[$product_id] = $product->post_title; 		
		}
	
		$this->add_control(
			'slider_show_posts',
			[
				'label' => __( 'Show Elements', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $products,
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_content',
							'operator' => 'in',
							'value' => [
								'specified_posts'
							],
						],
					],
				],					
			]
		);	

		$this->add_control(
			'slider_items',
			[
				'label' => __( 'Carousel Items', 'addon-package-for-elementor' ),
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
			'slider_slideshow',
			[
				'label' => __( 'Slider Slideshow', 'addon-package-for-elementor' ),
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

		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_carousel_posts',
			[
				'label' => __( 'Column Settings', 'addon-package-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				
			]
		);
		
		$this->add_control(
			'slider_posts_carousel_padding',
			[
				'label' => __( 'Post Element Padding', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .postcarousel ul.slides li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_type',
							'operator' => 'in',
							'value' => [
								'basic_carousel',
							],
						],
					],
				],					
			]
		);	

		$this->add_control(
			'slider_post_carousel_border_style',
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
					'{{WRAPPER}} .postcarousel ul.slides li' => 'border-style: {{VALUE}};',
					'{{WRAPPER}} #apfe_carousel .slides li' => 'border-style: {{VALUE}};',	
					//'{{WRAPPER}} #apfe_slider .slides li' => 'border-style: {{VALUE}};',					
				]				
				
			]
		);	

		$this->add_control(
			'slider_post_carousel_border_width',
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
				'{{WRAPPER}} .postcarousel ul.slides li' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} #apfe_carousel .slides li' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				//'{{WRAPPER}} #apfe_slider .slides li' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			]				
			]
		);
		
		$this->add_control(
			'slider_post_carousel_border_color',
			[
			'label' => __( 'Border Color', 'Border Control', 'addon-package-for-elementor' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '#E4E4E4',
			'selectors' => [
				'{{WRAPPER}} .postcarousel ul.slides li' => 'border-color: {{VALUE}};',
				'{{WRAPPER}} #apfe_carousel .slides li' => 'border-color: {{VALUE}};',
				//'{{WRAPPER}} #apfe_slider .slides li' => 'border-color: {{VALUE}};',
			],
			]
		);	
			
		
		$this->add_control(
			'slider_img_col_width',
			[
				'label' => __( 'Post Image Column Width (%)', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 20,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .postslider ul li img.apfe_postslider_img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_type',
							'operator' => 'in',
							'value' => [
								'basic_slider_wt',
							],
						],
					],
				],					
			]
		);		

		$this->add_control(
			'slider_content_col_width',
			[
				'label' => __( 'Post Preview Column Width (%)', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 20,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 60,
				],
				'selectors' => [
					'{{WRAPPER}} .postslider ul li .apfe_postslider_content' => 'width: {{SIZE}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_type',
							'operator' => 'in',
							'value' => [
								'basic_slider_wt',
							],
						],
					],
				],					
			]
		);		


		$this->add_control(
			'slider_img_col_padding',
			[
				'label' => __( 'Post Image Column Padding', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .postslider ul li img.apfe_postslider_img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_type',
							'operator' => 'in',
							'value' => [
								'basic_slider_wt',
							],
						],
					],
				],					
			]
		);		

		$this->add_control(
			'slider_content_col_padding',
			[
				'label' => __( 'Post Preview Column Padding', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .postslider ul li .apfe_postslider_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_type',
							'operator' => 'in',
							'value' => [
								'basic_slider_wt',
							],
						],
					],
				],					
			]
		);	


		$this->add_control(
			'slider_postslider_spacing',
			[
				'label' => __( 'Post Slider Spacing (px)', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .postslider' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_type',
							'operator' => 'in',
							'value' => [
								'basic_slider_wt',
							],
						],
					],
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
					'{{WRAPPER}} .postcarousel ul li .postcarouseltitle' => 'color: {{VALUE}}',
					'{{WRAPPER}} .postslider ul li .postcarouseltitle' => 'color: {{VALUE}}',
					
				],
			]
		);		

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'       => 'post_meta',
				'label'      => __( 'Typography', 'wordpress' ),
				'scheme'     => \Elementor\Scheme_Typography::TYPOGRAPHY_2,
				'selector'   => '{{WRAPPER}} .postcarousel ul li .postcarouseltitle, {{WRAPPER}} .postslider ul li .postcarouseltitle',
			)
		);
		
		$this->add_control(
			'opt-margin-woocarousel-title',
			[
				'label' => __( 'Margin', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .postcarousel ul li .postcarouseltitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .postslider ul li .postcarouseltitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				
			]
		);	
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_excerpt',
			[
				'label' => __( 'Excerpt Text', 'addon-package-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'slider_excerpt_color',
			[
				'label' => __( 'Color', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .postcarousel ul li .postcarouselcontent' => 'color: {{VALUE}}',
					'{{WRAPPER}} .postslider ul li .postcarouselcontent' => 'color: {{VALUE}}',
					
				],
			]
		);		

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'       => 'slider_excerpt_typo',
				'label'      => __( 'Typography', 'wordpress' ),
				'scheme'     => \Elementor\Scheme_Typography::TYPOGRAPHY_2,
				'selector'   => '{{WRAPPER}} .postcarousel ul li .postcarouselcontent, {{WRAPPER}} .postslider ul li .postcarouselcontent',
			)
		);
		
		$this->add_control(
			'opt-margin-excerpt',
			[
				'label' => __( 'Margin', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .postcarousel ul li .postcarouselcontent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .postslider ul li .postcarouselcontent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	

		$this->add_control(
			'slider_excerpt_text_align',
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
				
			]
		);			

		$this->end_controls_section();		

		$this->start_controls_section(
			'section_style_rmbtn',
			[
				'label' => __( 'Read more Button', 'addon-package-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'slider_btn_color',
			[
				'label' => __( 'Text Color', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'return_value' => 'true',
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .postslider .postcarouselrmbtn a' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .postcarousel .postcarouselrmbtn a' => 'color: {{VALUE}} !important',
				],
			]
		);		

		$this->add_control(
			'slider_btn_color_hover',
			[
				'label' => __( 'Text Color (Hover)', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'return_value' => 'true',
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .postslider .postcarouselrmbtn a:hover' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .postcarousel .postcarouselrmbtn a:hover' => 'color: {{VALUE}} !important',
				],
			]
		);		
		
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'slider_btn_background',
				'label' => __( 'Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .postslider .postcarouselrmbtn a, {{WRAPPER}} .postcarousel .postcarouselrmbtn a',
			]
		);

		$this->add_control(
			'opt-margin-btn',
			[
				'label' => __( 'Margin', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .postslider .postcarouselrmbtn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .postcarousel .postcarouselrmbtn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		
		
		$this->add_control(
			'opt-padding-btn',
			[
				'label' => __( 'Padding', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .postslider .postcarouselrmbtn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .postcarousel .postcarouselrmbtn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	


		$this->add_control(
			'opt-align-btn',
			[
				'label' => __( 'Position', 'addon-package-for-elementor' ),
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
				'default' => '#0000007A',
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
				'default' => '#000000BA',
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

		$this->start_controls_section(
			'section_style_arrows_directionnav',
			[
				'label' => __( 'Control Nav', 'addon-package-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,	
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_controlnav',
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
			'slider_nav_color_directionnav',
			[
				'label' => __( 'Bullets Color', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'return_value' => 'true',
				'default' => '#0000007D',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .flex-control-paging li a' => 'background: {{VALUE}}',
				],
			]
		);	

		$this->add_control(
			'slider_nav_color_border_directionnav',
			[
				'label' => __( 'Bullets Color (Hover)', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'return_value' => 'true',
				'default' => '#000000C2',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .flex-control-paging li a:hover' => 'background: {{VALUE}}',
					'{{WRAPPER}} .flex-control-paging li a.flex-active' => 'background: {{VALUE}}',
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

		if (isset($settings['slider_title_text_align'])) {
			$slider_title_text_align = $settings['slider_title_text_align'];
		} else {
			$slider_title_text_align = "center";	
		}		
		
		if (isset($settings['opt-align-btn'])) {
			$align_button = $settings['opt-align-btn'];
		} else {
			$align_button = "center";	
		}			
		
		if (isset($settings['slider_excerpt_text_align'])) {
			$slider_excerpt_text_align = $settings['slider_excerpt_text_align'];
		} else {
			$slider_excerpt_text_align = "center";	
		}			

		$slider_animation = "slide";	
			
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

		if (isset($settings['slider_items'])) {
			$slider_items = $settings['slider_items'];
		} else {
			$slider_items = "6";	
		}			
		
		?>
			

		<div style="display:none;" class="apfe_slider_settings" data-items="<?php echo $slider_items; ?>" data-controlnav="<?php echo $slider_controlnav; ?>" data-touch="<?php echo $slider_touch; ?>" data-slideshowspeed="<?php echo $slider_slideshow_speed; ?>" data-loop="<?php echo $slider_loop; ?>" data-slideshow="<?php echo $slider_slideshow; ?>" data-sliderspeed="<?php echo $slider_speed; ?>" data-slidertype="<?php echo $slider_animation; ?>"></div>
		
		<?php if ($slider_type == "basic_slider") { ?>

			<div class="flexslider">
				<ul class="slides">	
					<?php foreach ( $settings['gallery'] as $image ) { ?>
						<li><img src="<?php echo $image['url']; ?>" /></li>			
					<?php }	?>
				</ul>
			</div>	

		<?php } else if ($slider_type == "basic_slider_wt") { ?>

<?php
			if (isset($settings['slider_content'])) {
				if ($settings['slider_content'] == 'posts_from_categrories') {
					if (isset($settings['slider_show_cats'])) {
						$cats_array = $settings['slider_show_cats'];
						if (isset($cats_array)) {
							$catlist = "";
							foreach ($cats_array as $catid) {
								$catlist .= $catid.',';		
							}
							$catlist = substr($catlist, 0, -1);
							if (!empty($catlist)) {

							?>
							<style>
							.postslider ul li img.apfe_postslider_img {
								float: left;
								width: 40%;
							}
							
							.postslider ul li span.apfe_postslider_content {
								float: left;
								width: 60%;								
							}
							
							.postcarouselrmbtn a {
										
							}
							.postcarouselrmbtn {
								float: left;
								width: 100%;
								text-align: center;		
							}	
							.postcarouselrmbtninner {
								display: inline-flex;
							}							
							</style>
							<div id="apfe_slider" class="flexslider wt postslider">
								<ul class="slides">							
								<?php
									$args = array('numberposts'     => -1, 'category' => $catlist);
									$all_products = get_posts($args);
									$products = [];
									foreach ($all_products as $product) {
										$product_id = $product->ID; 
										$products[$product_id] = $product->post_title; 
										$thumb = get_the_post_thumbnail_url($product->ID);
										if(empty($thumb)) {
											$thumb = plugin_dir_url(__FILE__ )."../assets/img/placeholder.png";
										}
										?>
										<li>
										<img class="apfe_postslider_img" src="<?php echo $thumb; ?>" />
										<span class="apfe_postslider_content">
										<span class="postcarouseltitle" style="text-align:<?php echo $slider_title_text_align; ?>;float: left; width: -webkit-fill-available;">
										<?php echo $product->post_title; ?>
										</span>
										<span class="postcarouselcontent" style="text-align:<?php echo $slider_excerpt_text_align; ?>;word-break: break-word;float: left; width: -webkit-fill-available;">
										<?php
										$content = $product->post_content;
										echo wp_trim_words($content);
										?>
										</span>
										<span class="postcarouselrmbtn" style="text-align:<?php echo $align_button; ?>;">
										<span class="postcarouselrmbtninner">
										<a href="<?php echo get_permalink($product->ID); ?>" title="<?php echo $product->post_title; ?>">
										<?php echo __( 'Read More...', 'addon-package-for-elementor' ); ?>
										</a>
										</span>
										</span>
										</span>
										</li>	
										<?php									
									}
								?>
								</ul>
							</div>						
							<?php

							}
						}
					}
				} else if ($settings['slider_content'] == 'specified_posts') {
					if (isset($settings['slider_show_posts'])) {
						$product_array = $settings['slider_show_posts'];
						if (isset($product_array)) {
						?>
							<style>
							.postslider ul li img.apfe_postslider_img {
								float: left;
								width: 40%;
							}
							
							.postslider ul li span.apfe_postslider_content {
								float: left;
								width: 60%;								
							}
							
							.postcarouselrmbtn a {
										
							}
							.postcarouselrmbtn {
								float: left;
								width: 100%;
								text-align: center;		
							}	
							.postcarouselrmbtninner {
								display: inline-flex;
							}
							</style>						
						<div id="apfe_slider" class="flexslider wt postslider">
							<ul class="slides">							
							<?php
							foreach ($product_array as $productid) {
								$product = get_post( $productid );
								$thumb = get_the_post_thumbnail_url($productid);
								if(empty($thumb)) {
									$thumb = plugin_dir_url(__FILE__ )."../assets/img/placeholder.png";
								}								
								?>
										<li>
										<img class="apfe_postslider_img" src="<?php echo $thumb; ?>" />
										<span class="apfe_postslider_content">
										<span class="postcarouseltitle" style="text-align:<?php echo $slider_title_text_align; ?>;float: left; width: -webkit-fill-available;">
										<?php echo $product->post_title; ?>
										</span>
										<span class="postcarouselcontent" style="text-align:<?php echo $slider_excerpt_text_align; ?>;word-break: break-word;float: left; width: -webkit-fill-available;">
										<?php
										$content = $product->post_content;
										echo wp_trim_words($content);
										?>
										</span>
										<span class="postcarouselrmbtn">
										<a href="<?php echo get_permalink($product->ID); ?>" title="<?php echo $product->post_title; ?>">
										<?php echo __( 'Read More...', 'addon-package-for-elementor' ); ?>
										</a>
										</span>
										</span>
										</li>		
								<?php								
							}
							?>
							</ul>
						</div>						
						<?php								
						}	
					}
					
				}
			}
?>

			
<?php
			if (isset($settings['slider_content'])) {
				if ($settings['slider_content'] == 'posts_from_categrories') {
					if (isset($settings['slider_show_cats'])) {
						$cats_array = $settings['slider_show_cats'];
						if (isset($cats_array)) {
							$catlist = "";
							foreach ($cats_array as $catid) {
								$catlist .= $catid.',';		
							}
							$catlist = substr($catlist, 0, -1);
							if (!empty($catlist)) {

							?>
							<style>
							.postslider ul li img.apfe_postslider_img {
								float: left;
								width: 40%;
							}							
							</style>							
							<div id="apfe_carousel" class="flexslider postslider">
								<ul class="slides">							
								<?php
									$args = array('numberposts'     => -1, 'category' => $catlist);
									$all_products = get_posts($args);
									$products = [];
									foreach ($all_products as $product) {
										$product_id = $product->ID; 
										$products[$product_id] = $product->post_title; 
										$thumb = get_the_post_thumbnail_url($product->ID);
										if(empty($thumb)) {
											$thumb = plugin_dir_url(__FILE__ )."../assets/img/placeholder.png";
										}
										?>
										<li>
										<a href="<?php echo get_permalink($product->ID); ?>" title="<?php echo $product->post_title; ?>">
										<img src="<?php echo $thumb; ?>" />
										<span class="postcarouseltitle" style="display:none;float: left; width: -webkit-fill-available;">
										<?php echo $product->post_title; ?>
										</span>
										</a>
										</li>	
										<?php									
									}
								?>
								</ul>
							</div>						
							<?php

							}
						}
					}
				} else if ($settings['slider_content'] == 'specified_posts') {
					if (isset($settings['slider_show_posts'])) {
						$product_array = $settings['slider_show_posts'];
						if (isset($product_array)) {
						?>
						<style>
							.postslider ul li img.apfe_postslider_img {
								float: left;
								width: 40%;
							}							
						</style>							
						<div id="apfe_carousel" class="flexslider postslider">
							<ul class="slides">							
							<?php
							foreach ($product_array as $productid) {
								$product = get_post( $productid );
								$thumb = get_the_post_thumbnail_url($productid);
								if(empty($thumb)) {
									$thumb = plugin_dir_url(__FILE__ )."../assets/img/placeholder.png";
								}								
								?>
										<li>
										<a href="<?php echo get_permalink($product->ID); ?>" title="<?php echo $product->post_title; ?>">
										<img src="<?php echo $thumb; ?>" />
										<span class="postcarouseltitle" style="display:none;float: left; width: -webkit-fill-available;">
										<?php echo $product->post_title; ?>
										</span>
										</a>
										</li>		
								<?php								
							}
							?>
							</ul>
						</div>						
						<?php								
						}	
					}					
				}
			}
?>			

			
		<?php } else if ($slider_type == "basic_carousel") {

			if (isset($settings['slider_content'])) {
				if ($settings['slider_content'] == 'posts_from_categrories') {
					if (isset($settings['slider_show_cats'])) {
						$cats_array = $settings['slider_show_cats'];
						if (isset($cats_array)) {
							$catlist = "";
							foreach ($cats_array as $catid) {
								$catlist .= $catid.',';		
							}
							$catlist = substr($catlist, 0, -1);
							if (!empty($catlist)) {
							?>							
							<div class="flexslider carousel postcarousel">
								<ul class="slides">							
								<?php
									$args = array('numberposts'     => -1, 'category' => $catlist);
									$all_products = get_posts($args);
									$products = [];
									foreach ($all_products as $product) {
										$product_id = $product->ID; 
										$products[$product_id] = $product->post_title; 
										$thumb = get_the_post_thumbnail_url($product->ID);
										if(empty($thumb)) {
											$thumb = plugin_dir_url(__FILE__ )."../assets/img/placeholder.png";
										}
										?>
										<li>
										<img src="<?php echo $thumb; ?>" />
										<span class="postcarouseltitle" style="text-align:<?php echo $slider_title_text_align; ?>;float: left; width: -webkit-fill-available;">
										<?php echo $product->post_title; ?>
										</span>
										<span class="postcarouselcontent" style="text-align:<?php echo $slider_excerpt_text_align; ?>;word-break: break-word;float: left; width: -webkit-fill-available;">
										<?php
										$content = $product->post_content;
										echo wp_trim_words($content);
										?>
										</span>	
										<span class="postcarouselrmbtn" style="text-align:<?php echo $align_button; ?>;">
										<span class="postcarouselrmbtninner">
										<a href="<?php echo get_permalink($product->ID); ?>" title="<?php echo $product->post_title; ?>">
										<?php echo __( 'Read More...', 'addon-package-for-elementor' ); ?>
										</a>
										</span>	
										</span>											
										</li>	
										<?php									
									}
								?>
								</ul>
							</div>						
							<?php
							}						
						}
					}
				} else {
					if (isset($settings['slider_show_posts'])) {
						$product_array = $settings['slider_show_posts'];
						if (isset($product_array)) {
						?>
						<div class="flexslider carousel postcarousel">
							<ul class="slides">							
							<?php
							foreach ($product_array as $productid) {
								$product = get_post( $productid );
								$thumb = get_the_post_thumbnail_url($productid);
								if(empty($thumb)) {
									$thumb = plugin_dir_url(__FILE__ )."../assets/img/placeholder.png";
								}								
								?>
								<li>
								<img src="<?php echo $thumb; ?>" />
								<span class="postcarouseltitle" style="text-align:<?php echo $slider_title_text_align; ?>;float: left; width: -webkit-fill-available;">
								<?php echo $product->post_title; ?>
								</span>
										<span class="postcarouselcontent" style="text-align:<?php echo $slider_excerpt_text_align; ?>;word-break: break-word;float: left; width: -webkit-fill-available;">
										<?php
										$content = $product->post_content;
										echo wp_trim_words($content);
										?>
										</span>
										<span class="postcarouselrmbtn" style="text-align:<?php echo $align_button; ?>;">
										<span class="postcarouselrmbtninner">
										<a href="<?php echo get_permalink($product->ID); ?>" title="<?php echo $product->post_title; ?>">
										<?php echo __( 'Read More...', 'addon-package-for-elementor' ); ?>
										</a>
										</span>	
										</span>								
								</li>	
								<?php								
							}
							?>
							</ul>
						</div>						
						<?php								
						}						
					}	
				}
			}		
		
		} 
		
	}

}
