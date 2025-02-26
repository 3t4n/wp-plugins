<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use AIEA_Elementor_Addons\Helper\Post_Helper as AIEA_Post_Helper;

/**
 * AI Addons Products Widget
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Product_Widget extends Widget_Base {
	
	private $product = null;
		
	private $overlay_ele = null;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Products widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-products';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Products widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Products', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Products widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('product');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Products widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ai-elements' ];
	}
	
	/**
	 * Retrieve the list of scripts the counter widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'ai-front-end' ];
	}
	
	public function get_style_depends() {
		return [ 'themify-icons' ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/product-demo/';
    }

	/**
	 * Register Products widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// product categories
		$product_cats = AIEA_Post_Helper::aiea_post_type_taxonomies( 'term_id', 'product_cat' );
		
		// product tags
		$product_tags = AIEA_Post_Helper::aiea_post_type_taxonomies( 'term_id', 'product_tag' );
		
		// product titles
		$product_titles = AIEA_Post_Helper::aiea_get_post_titles( 'product' );
			
		//Layout Section
		$this->start_controls_section(
			'layout_section',
			[
				'label'	=> esc_html__( 'Layout', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);		
		$this->add_control(
			'products_layout',
			[
				'label'			=> esc_html__( 'Choose Layout', 'ai-addons' ),
				'type'			=> 'aiea-image-select',
				'default'		=> 'layout-1',
				'choices'		=> [
					'layout-1'		=> [ 'thumbnail' => AIEA_URL .'assets/images/layouts/product/layout-1.jpg', 'image' => 'https://aiaddons.ai/ai-import/widget-layouts/product/layout-1.jpg', 'label' => esc_html__( 'Layout 1', 'ai-addons' ) ],
					'layout-2'		=> [ 'thumbnail' => AIEA_URL .'assets/images/layouts/product/layout-2.jpg', 'image' => 'https://aiaddons.ai/ai-import/widget-layouts/product/layout-2.jpg', 'label' => esc_html__( 'Layout 2', 'ai-addons' ) ],
					'layout-3'		=> [ 'thumbnail' => AIEA_URL .'assets/images/layouts/product/layout-3.jpg', 'image' => 'https://aiaddons.ai/ai-import/widget-layouts/product/layout-3.jpg', 'label' => esc_html__( 'Layout 3(pro)', 'ai-addons' ) ],
					'layout-4'		=> [ 'thumbnail' => AIEA_URL .'assets/images/layouts/product/layout-4.jpg', 'image' => 'https://aiaddons.ai/ai-import/widget-layouts/product/layout-4.jpg', 'label' => esc_html__( 'Layout 4(pro)', 'ai-addons' ) ],
					'custom'		=> [ 'thumbnail' => AIEA_URL .'assets/images/layouts/custom-xs.jpg', 'image' => AIEA_URL .'assets/images/layouts/custom.jpg', 'label' => esc_html__( 'Custom(pro)', 'ai-addons' ) ],
				]
			]
		);
		$this->add_control(
			'layout_pro_alert',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'Only available in pro version!', 'ai-addons'),
				'content_classes' => 'ai-elementor-warning',
				'condition' => [
					'products_layout!' => $this->get_free_options('products_layout'),
				]
			]
		);
		$this->add_control(
			'products_cols',
			[
				'type'			=> Controls_Manager::SELECT,
				'label'			=> esc_html__( 'Columns', 'ai-addons' ),
				'default'		=> '33',
				'options'		=> [
					'25'			=> esc_html__( '4', 'ai-addons' ),
					'33'			=> esc_html__( '3', 'ai-addons' ),
					'50'			=> esc_html__( '2', 'ai-addons' ),
					'100'		=> esc_html__( '1', 'ai-addons' )
				]
			]
		);
		$this->add_control(
			'pagination_opt',
			[
				'label' 		=> esc_html__( 'Pagination Enable?', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);	
		$this->end_controls_section();
		
		//Overlay Section
		$this->start_controls_section(
			'overlay_section',
			[
				'label'	=> esc_html__( 'Overlay', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'overlay_opt' 		=> 'yes'
				]
			]
		);
		$this->add_control(
			'overlay_items',
			[
				'label'				=> 'Overlay Items',
				'type'				=> 'drag-n-drop',
				'drag_items' 			=> [ 
					'visible' 		=> [ 
						'rating'		=> esc_html__( 'Rating', 'ai-addons' ),						
						'price'		=> esc_html__( 'Price', 'ai-addons' ),
					],
					'disabled'		=> [						
						'title'		=> esc_html__( 'Title', 'ai-addons' ),
						'category'		=> esc_html__( 'Category', 'ai-addons' )
					]
				],				
			]
		);
		$this->add_control(
			'overlay_cart_icon',
			[
				'label' 		=> esc_html__( 'Overlay Cart Icon', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes'
			]
		);
		$this->add_control(
			'overlay_single_icon',
			[
				'label' 		=> esc_html__( 'Overlay Link Icon', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes'
			]
		);
		$this->end_controls_section();
		
		//Filter Section
		$this->start_controls_section(
			'filter_section',
			[
				'label'	=> esc_html__( 'Products Filter', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'filter_condition',
			[
				'type'			=> Controls_Manager::SELECT,
				'label'			=> esc_html__( 'Filter Condition', 'ai-addons' ),
				'default'		=> 'or',
				'options'		=> [
					'or'			=> esc_html__( 'OR', 'ai-addons' ),
					'and'			=> esc_html__( 'AND', 'ai-addons' )
				]
			]
		);
		$this->add_control(
			'order_by',
			[
				'type'			=> Controls_Manager::SELECT,
				'label'			=> esc_html__( 'Order By', 'ai-addons' ),
				'default'		=> 'date',
				'options'		=> [
					'date'		=> esc_html__( 'Date', 'ai-addons' ),
					'rating'	=> esc_html__( 'Rating', 'ai-addons' ),
					'sales'		=> esc_html__( 'Sales', 'ai-addons' ),
					'price-low'	=> esc_html__( 'Price Low to High', 'ai-addons' ),
					'price-high'	=> esc_html__( 'Price High to Low', 'ai-addons' )
				]
			]
		);
		$this->add_control(
			'product_cats',
			[
				'label' 		=> esc_html__( 'Product Categories', 'ai-addons' ),
				'type' 			=> Controls_Manager::SELECT2,
				'multiple'	 	=> true,
				'label_block'	=> true,
				'options' 		=> $product_cats,
				'default' 		=> ''
			]
		);
		$this->add_control(
			'product_tags',
			[
				'label' 		=> esc_html__( 'Product Tags', 'ai-addons' ),
				'type' 			=> Controls_Manager::SELECT2,
				'multiple'	 	=> true,
				'label_block'	=> true,
				'options' 		=> $product_tags,
				'default' 		=> ''
			]
		);
		$this->add_control(
			'include_products',
			[
				'label' 		=> esc_html__( 'Include Products', 'ai-addons' ),
				'type' 			=> Controls_Manager::SELECT2,
				'multiple'	 	=> true,
				'label_block'	=> true,
				'options' 		=> $product_titles,
				'default' 		=> ''
			]
		);
		$this->add_control(
			'exclude_products',
			[
				'label' 		=> esc_html__( 'Exclude Products', 'ai-addons' ),
				'type' 			=> Controls_Manager::SELECT2,
				'multiple'	 	=> true,
				'label_block'	=> true,
				'options' 		=> $product_titles,
				'default' 		=> ''
			]
		);		
		$this->add_control(
			'product_per_page',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Products Per Page', 'ai-addons' ),
				'default' 		=> '12',
				'placeholder'	=> '12'
			]
		);
		$this->end_controls_section();
		
		//Title Section
		$this->start_controls_section(
			'title_section',
			[
				'label'			=> esc_html__( 'Title', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title_enable',
			[
				'label' 		=> esc_html__( 'Title Enable?', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes'
			]
		);	
		$this->add_control(
			'product_heading',
			[
				'label'			=> esc_html__( 'Product Heading Tag', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'h3',
				'options'		=> [
					'h1'		=> esc_html__( 'h1', 'ai-addons' ),
					'h2'		=> esc_html__( 'h2', 'ai-addons' ),
					'h3'		=> esc_html__( 'h3', 'ai-addons' ),
					'h4'		=> esc_html__( 'h4', 'ai-addons' ),
					'h5'		=> esc_html__( 'h5', 'ai-addons' ),
					'h6'		=> esc_html__( 'h6', 'ai-addons' ),
					'span'		=> esc_html__( 'span', 'ai-addons' ),
					'p'		=> esc_html__( 'p', 'ai-addons' ),
					'i'		=> esc_html__( 'i', 'ai-addons' ),
				]
			]
		);
		$this->add_control(
			'title_length',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Title Excerpt Length', 'ai-addons' ),
				'default' 		=> '50'
			]
		);
		$this->end_controls_section();
		
		//Category Section
		$this->start_controls_section(
			'category_section',
			[
				'label'			=> esc_html__( 'Category', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'category_enable',
			[
				'label' 		=> esc_html__( 'Category Enable?', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes'
			]
		);
		$this->end_controls_section();
		
		//Image Section
		$this->start_controls_section(
			'image_section',
			[
				'label'			=> esc_html__( 'Image', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', 
				'default' => 'full',
				'separator' => 'none',
			]
		);
		$this->end_controls_section();
		
		//Rating
		$this->start_controls_section(
			'section_rating',
			[
				'label' => esc_html__( 'Rating', 'elementor' ),
				
			]
		);
		$this->add_control(
			'rating_enable',
			[
				'label' 		=> esc_html__( 'Rating Enable?', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes'
			]
		);	
		$this->add_control(
			'star_style',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'star_fontawesome' => 'Font Awesome',
					'star_unicode' => 'Unicode',
				],
				'default' => 'star_fontawesome',
				'render_type' => 'template',
				'prefix_class' => 'elementor--star-style-',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'unmarked_star_style',
			[
				'label' => esc_html__( 'Unmarked Style', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'solid' => [
						'title' => esc_html__( 'Solid', 'elementor' ),
						'icon' => 'eicon-star',
					],
					'outline' => [
						'title' => esc_html__( 'Outline', 'elementor' ),
						'icon' => 'eicon-star-o',
					],
				],
				'default' => 'solid',
			]
		);
		$this->end_controls_section();
		
		// Style Product Section
		$this->start_controls_section(
			'section_style_product',
			[
				'label' => esc_html__( 'Product', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'product_content_styles' );
		$this->start_controls_tab(
			'icon_box_content_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		
		$this->add_responsive_control(
			'content_align',
			[
				'label' => esc_html__( 'Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'ai-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ai-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ai-addons' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'ai-addons' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .aiea-product-inner' => 'text-align: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'product_border',
				'selector' => '{{WRAPPER}} .aiea-product-inner',
			]
		);
		$this->add_responsive_control(
			'product_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aiea-product-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'product_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aiea-product-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'product_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aiea-product-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			'shadow_opt',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'box_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'shadow_opt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .aiea-product-inner' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{icon_box_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'box_shadow_pos',
			[
				'label' =>  esc_html__( 'Box Shadow Position', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					' ' => esc_html__( 'Outline', 'ai-addons' ),
					'inset' => esc_html__( 'Inset', 'ai-addons' ),
				],
				'condition' => [
					'shadow_opt' => 'yes',
				],
				'default' => ' ',
				'render_type' => 'ui',
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'product_content_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'product_hover_border',
				'selector' => '{{WRAPPER}} .aiea-product-inner:hover',
			]
		);
		$this->add_control(
			'shadow_hopt',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'product_hbox_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'shadow_hopt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .aiea-product-inner:hover' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{icon_box_hbox_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'product_hbox_shadow_pos',
			[
				'label' =>  esc_html__( 'Box Shadow Position', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					' ' => esc_html__( 'Outline', 'ai-addons' ),
					'inset' => esc_html__( 'Inset', 'ai-addons' ),
				],
				'condition' => [
					'shadow_hopt' => 'yes',
				],
				'default' => ' ',
				'render_type' => 'ui',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();	
		$this->end_controls_section();
		
		// Style Title Section
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => esc_html__( 'Title', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_text_trans',
			[
				'label'			=> esc_html__( 'Title Transform', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'none',
				'options'		=> [
					'none'			=> esc_html__( 'Default', 'ai-addons' ),
					'capitalize'	=> esc_html__( 'Capitalized', 'ai-addons' ),
					'uppercase'		=> esc_html__( 'Upper Case', 'ai-addons' ),
					'lowercase'		=> esc_html__( 'Lower Case', 'ai-addons' )
				],
				'selectors' => [
					'{{WRAPPER}} .product-title-head a' => 'text-transform: {{VALUE}};'
				],
			]
		);
		$this->start_controls_tabs( 'tabs_title_style' );
		$this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .product-title-head a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_scale',
			[
				'label' => esc_html__( 'Scale', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 0.1,
						'max' => 5,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-title-head' => 'transform: scale({{SIZE}});'
				],
			]
		);	
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_title_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);		
		$this->add_control(
			'title_hcolor',
			[
				'label' => esc_html__( 'Hover Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .products-inner:hover .product-title-head a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_hscale',
			[
				'label' => esc_html__( 'Scale', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 0.1,
						'max' => 5,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .products-inner:hover .product-title-head' => 'transform: scale({{SIZE}});'
				],
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-title-head' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-title-head' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'selector' 		=> '{{WRAPPER}} .product-title-head'
			]
		);		
		$this->end_controls_section();
		
		// Style Overlay Section
		$this->start_controls_section(
			'section_style_overlay',
			[
				'label' => esc_html__( 'Overlay', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'overlay_opt' 		=> 'yes'
				]
			]
		);
		$this->add_control(
			'bg_overlay_color',
			[
				'label' => esc_html__( 'Background', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .aiea-product-thumb-wrap:after' => 'background: {{VALUE}};'
				],
			]
		);	
		
		$this->end_controls_section();
		
		// Style Image Section		
		$this->start_controls_section(
			'section_style_image',
			[
				'label' => __( 'Image', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'resize_opt',
			[
				'label' 		=> esc_html__( 'Resize Option', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_responsive_control(
			'image_width',
			[
				'label' => esc_html__( 'Image Width', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'condition' => [
					'resize_opt' => 'yes',	
				],
				'selectors' => [
					'{{WRAPPER}} .aiea-product-thumb img' => 'width: {{SIZE}}px;',
				],
			]
		);	
		$this->add_responsive_control(
			'image_height',
			[
				'label' => esc_html__( 'Image height', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'condition' => [
					'resize_opt' => 'yes',	
				],
				'selectors' => [
					'{{WRAPPER}} .aiea-product-thumb img' => 'height: {{SIZE}}px;',
				],
			]
		);	
		$this->add_responsive_control(
			'image_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .aiea-product-thumb img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);		
		$this->add_responsive_control(
			'img_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .aiea-product-thumb img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aiea-product-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();
		
		// Style Price Section
		$this->start_controls_section(
			'section_style_price',
			[
				'label' => esc_html__( 'Price', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'price_typography',
				'selector' 		=> '{{WRAPPER}} .aiea-product-price'
			]
		);	
		$this->add_control(
			'price_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .aiea-product-price' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'price_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aiea-product-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		// Style Rating Section
		$this->start_controls_section(
			'section_style_rating',
			[
				'label' => esc_html__( 'Rating', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'rating_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aiea-rating.elementor-star-rating' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'rating_spacing',
			[
				'label' => __( 'Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .aiea-rating.elementor-star-rating > i' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .aiea-rating.elementor-star-rating' => 'margin-left: -{{SIZE}}{{UNIT}}; margin-right: -{{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->end_controls_section();
		
		// Style Category Section
		$this->start_controls_section(
			'section_style_cate',
			[
				'label' => esc_html__( 'Category', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'cate_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aiea-product-category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	
		$this->add_control(
			'cate_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .aiea-product-category > a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		// Style Button Section
		$this->start_controls_section(
			'button_section_style',
			[
				'label' => esc_html__( 'Button', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .aiea-buy-btn a',
			]
		);
		$this->add_control(
			'btn_text_trans',
			[
				'label'			=> esc_html__( 'Transform', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'none',
				'options'		=> [
					'none'			=> esc_html__( 'Default', 'ai-addons' ),
					'capitalize'	=> esc_html__( 'Capitalized', 'ai-addons' ),
					'uppercase'		=> esc_html__( 'Upper Case', 'ai-addons' ),
					'lowercase'		=> esc_html__( 'Lower Case', 'ai-addons' )
				],
				'selectors' => [
					'{{WRAPPER}} .aiea-buy-btn a' => 'text-transform: {{VALUE}};'
				],
			]
		);
		$this->start_controls_tabs( 'tabs_button_style' );		
		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .aiea-buy-btn a' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_background_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aiea-buy-btn a' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aiea-buy-btn a:hover, {{WRAPPER}} .aiea-buy-btn a:focus' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'button_background_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aiea-buy-btn a:hover, {{WRAPPER}} .aiea-buy-btn a:focus' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aiea-buy-btn a:hover, {{WRAPPER}} .aiea-buy-btn a:focus' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .aiea-buy-btn a',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aiea-buy-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .aiea-buy-btn a',
			]
		);
		$this->add_responsive_control(
			'button_text_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aiea-buy-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'button_typography',
				'selector' 		=> '{{WRAPPER}} .aiea-buy-btn a'
			]
		);
		$this->end_controls_section();

	}

	/**
	 * Render Products widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		
		// check woocommerce activated
		if( !class_exists( 'WooCommerce' ) ) {
			echo '<div class="aiea-widget-alert"><h3>'. esc_html__( 'WooCommerce Plugin Should be Activate.', 'ai-addons' ) .'</h3></div>';
			return;
		}
		
		$settings = $this->get_settings_for_display();		
		extract( $settings );
		
		// layout
		$products_layout = isset( $products_layout ) ? $products_layout : 'layout-1';		
		if( !in_array( $products_layout, $this->get_free_options('products_layout') ) ) $products_layout = 'layout-1';
		
		$this->add_render_attribute( 'product-wrapper', 'class', 'aiea-products-wrap' );
		$this->add_render_attribute( 'product-wrapper', 'class', 'aiea-product-'. $products_layout );
		$pagination_opt = isset( $pagination_opt ) && $pagination_opt == 'yes' ? true : false;
				
		// filter
		$filter_condition = isset( $filter_condition ) ? strtoupper( $filter_condition ) : 'OR';
		$ppp = isset( $product_per_page ) ? $product_per_page : 10;
		$product_cats = isset( $product_cats ) ? $product_cats : '';
		$product_tags = isset( $product_tags ) ? $product_tags : '';
		$order_by =  isset( $order_by ) ? $order_by : 'date';
		$exclude_products =  isset( $exclude_products ) ? $exclude_products : '';
		$include_products =  isset( $include_products ) ? $include_products : '';
		
		// get pagination
		global $wp_query;
		$paged = 1;
		if( get_query_var('paged') ){
			$paged = get_query_var('paged');
		}elseif( get_query_var('page') ){
			$paged = get_query_var('page');
		}
		
		// layout
		$cols = isset( $products_cols ) ? $products_cols : 50;
		$col_class = "elementor-column elementor-col-". absint( $cols );
		$this->add_render_attribute( 'product-grid-item', 'class', 'elementor-column elementor-col-'. $cols );
		
		// image options
		$thumb_size = $settings[ 'thumbnail_size' ];
		$image_sizes = get_intermediate_image_sizes();		
		$this->add_render_attribute( 'image-link', 'class', 'product-image-link' );
		if( isset( $image_target ) && $image_target == 'yes' ) $this->add_render_attribute( 'image-link', 'target', '_blank' );
		if( isset( $image_nofollow ) && $image_nofollow == 'yes' ) $this->add_render_attribute( 'image-link', 'rel', 'nofollow' );
		
		$title_enable = isset( $title_enable ) && $title_enable == 'yes' ? true : false;
		$rating_enable = isset( $rating_enable ) && $rating_enable == 'yes' ? true : false;
		
		$products_array = array(
			'product_heading' => $product_heading,
			'thumb_size' => $thumb_size,
			'image_sizes' => $image_sizes,
			'title_enable' => $title_enable,
			'rating_enable' => $rating_enable,
		);
		
		
		if( $products_layout == 'layout-2' ) {
			
		}
		
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => absint( $ppp ),
			'paged' => absint( $paged ),		
		);
		
		// append custom filters to args
		$tax_query = [ 'relation' => $filter_condition ];
		
		// include product category
		if( !empty( $product_cats ) ){
			$tax_query[] = [ 
				'taxonomy' => 'product_cat',
				'field'    => 'id',
				'terms'    => $product_cats,
				'operator' => 'IN'
			];
		}
		
		if( !empty( $product_tags ) ){
			$tax_query[] = [ 
				'taxonomy' => 'product_tag',
				'field'    => 'id',
				'terms'    => $product_tags,
				'operator' => 'IN'
			];
		}
		
		if( count( $tax_query ) > 1 ) {
			$args['tax_query'] = $tax_query;
		}
		
		// meta query
		if( $order_by == 'rating' ) {
			$args['orderby'] = [ 'meta_value_num' => 'DESC' ];
			$args['meta_key'] = '_wc_average_rating';
		} elseif( $order_by == 'sales' ) {
			$args['orderby'] = [ 'meta_value_num' => 'DESC' ];
			$args['meta_key'] = 'total_sales';
		} elseif( $order_by == 'price-low' ) {
			$args['orderby'] = [ 'meta_value_num' => 'ASC' ];
			$args['meta_key'] = '_price';
		} elseif( $order_by == 'price-high' ) {
			$args['orderby'] = [ 'meta_value_num' => 'DESC' ];
			$args['meta_key'] = '_price';
		}
		
		// exclude products
		if( !empty( $exclude_products ) ) {
			$args['post__not_in'] = $exclude_products;
		}
		
		// include products
		if( !empty( $include_products ) ) {
			$args['post__in'] = $include_products;
		}
		
		// overlay
		$overlay_opt = isset( $overlay_opt ) && $overlay_opt == 'yes' ? true : false;
		if( $overlay_opt ) {
			$this->add_render_attribute( 'product-wrapper', 'class', 'product-overlay-yes' );
			$overlay_items = isset( $overlay_items ) && !empty( $overlay_items ) ? json_decode( $overlay_items, true ) : [ 'visible' => [ 'rating' => '', 'price' => '' ] ];
			if( isset( $overlay_items['visible'] ) && !empty( $overlay_items['visible'] ) ) {
				$this->overlay_ele = $overlay_items['visible'];
			}
			$products_array['overlay_single_icon'] = isset( $overlay_single_icon ) && $overlay_single_icon == 'yes' ? true : false;
			$products_array['overlay_cart_icon'] = isset( $overlay_cart_icon ) && $overlay_cart_icon == 'yes' ? true : false;
			$this->add_render_attribute( 'overlay-wrapper', 'class', 'aiea-product-thumb-overlay' );
		}
				
		$query = new \WP_Query( $args );
		
		$row_stat = 0;
		$col_measures = array( '100' => '1', '50' => '2', '33' => '3', '25' => '4' );
			
		if ( $query->have_posts() ) {
			
			echo '<div '. $this->get_render_attribute_string( 'product-wrapper' ) .'>';
			
			// Start the Loop
			while ( $query->have_posts() ) : $query->the_post();
				
				$product_id = get_the_ID();
				$this->product = wc_get_product( $product_id );
				
				if( $row_stat == 0 ) :
					echo '<div class="elementor-container">';
				endif;				
				
					echo '<div '. $this->get_render_attribute_string( 'product-grid-item' ) .'>';
					
						$layout_fun_name = 'aiea_product_'. str_replace( "-", "_", $products_layout ); 
						$this->$layout_fun_name( $products_array );					
						
					echo '</div> <!-- .product-grid-item -->';
					
				$row_stat++;
				if( $row_stat == absint( $col_measures[$cols] ) ) :
					echo '</div><!-- .elementor-container -->';
					$row_stat = 0;
				endif;
				
			endwhile;
			
			echo '</div> <!-- .aiea-products-wrap -->';
			
			// use reset productdata to restore orginal query
			wp_reset_postdata();
			
			if( $products_layout == 'layout-3' ) {
				remove_filter( 'woocommerce_loop_add_to_cart_link', [ $this, 'aiea_add_to_cart_icon' ], 10 );
			}
			
			// pagination
			if( $pagination_opt ) {
				aiea_post_elements()->pagination( $args, $query->max_num_pages );
			}
			
			
		}// query exists
		

		echo '</div> <!-- .ai-widget-wrapper -->';

	}
	
	function aiea_product_layout_1( $products_array ) {
		$settings = $this->get_settings_for_display();
		echo '<div class="aiea-product-inner">';
		
			// image
			echo $this->aiea_products_shortcode_elements('thumb', $products_array, $settings);
			
			// title
			if( isset( $products_array['title_enable'] ) && $products_array['title_enable'] ) {
				echo $this->aiea_products_shortcode_elements('title', $products_array, $settings);
			}
			
			// category
			if( isset( $products_array['category_enable'] ) && $products_array['category_enable'] ) {
				echo $this->aiea_products_shortcode_elements('category');
			}
			
			// rating
			if( isset( $products_array['rating_enable'] ) && $products_array['rating_enable'] ) {
				echo $this->aiea_products_shortcode_elements('rating', null, $settings);
			}
			
			// price
			echo $this->aiea_products_shortcode_elements('price');
			
			// add to cart
			echo $this->aiea_products_shortcode_elements('add-to-cart', null, $settings);
			
		echo '</div> <!-- .products-inner -->';
	}
	
	function aiea_product_layout_2( $products_array ) {
		
		$settings = $this->get_settings_for_display();
		echo '<div class="aiea-product-inner">';
		
			echo '<div class="aiea-product-thumb-wrap">';
				// image
				echo $this->aiea_products_shortcode_elements('thumb', $products_array, $settings);				
				echo '<div class="aiea-product-thumb-overlay">';
					// title
					if( isset( $products_array['title_enable'] ) && $products_array['title_enable'] ) {
						echo $this->aiea_products_shortcode_elements('title', $products_array, $settings);
					}
					// rating
					if( isset( $products_array['rating_enable'] ) && $products_array['rating_enable'] ) {
						echo $this->aiea_products_shortcode_elements('rating', null, $settings);
					}
				echo '</div>';
			echo '</div>';
			
			// category
			if( isset( $products_array['category_enable'] ) && $products_array['category_enable'] ) {
				echo $this->aiea_products_shortcode_elements('category');
			}
			
			// price
			echo $this->aiea_products_shortcode_elements('price');
			
			// add to cart
			echo $this->aiea_products_shortcode_elements('add-to-cart', null, $settings);
			
		echo '</div> <!-- .products-inner -->';		
		
	}
		
	function aiea_add_to_cart_icon( $html, $product, $args ){
		return sprintf(
			'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			'<i class="ti-shopping-cart"></i>'
		);
	}
	
	function limit_text( $text, $limit ) {
		if (str_word_count($text, 0) > $limit) {
			$words = str_word_count($text, 2);
			$pos   = array_keys($words);
			$text  = substr($text, 0, $pos[$limit]);
			$text = rtrim( $text, ' ' ) . '...';
		}
		return $text;
	}
	
	function aiea_products_shortcode_elements( $element, $opts = array(), $settings = null ){
		$output = '';
		switch( $element ){
		
			case "title":
				$title_length = isset( $settings['title_length'] ) ? $settings['title_length'] : '';
				$product_title = get_the_title();
				if( $title_length ) {
					$product_title = $this->limit_text( $product_title, absint( $title_length ) );
				}
				
				$head = isset( $opts['product_heading'] ) ? $opts['product_heading'] : 'h3';
				$output .= '<div class="aiea-product-title">';
					$output .= '<'. esc_attr( $head ) .' class="product-title-head"><a href="'. esc_url( get_the_permalink() ) .'" '. $this->get_render_attribute_string( 'title-link' ) .'>'. esc_html( $product_title ) .'</a></'. esc_attr( $head ) .'>';
				$output .= '</div><!-- .aiea-product-title -->';
			break;
			
			case "single-icon":
				echo '<a href="'. esc_url( get_the_permalink() ) .'" class="aiea-single-view-icon"><i class="ti-zoom-in"></i></a>';
			break;
			
			case "thumb":
				if ( has_post_thumbnail() ) {
					
					$overlay_title_opt = isset( $settings['overlay_title_opt'] ) && $settings['overlay_title_opt'] == 'yes' ? true : false;					
					$this->add_render_attribute( 'product-thumb-atts', 'class', 'aiea-product-thumb' );
					if( $overlay_title_opt ) {
						$this->add_render_attribute( 'product-thumb-atts', 'class', 'product-overlay-active' );
					}
					
					$output .= '<div '. $this->get_render_attribute_string( 'product-thumb-atts' ) .'>';
						$img_id = get_post_thumbnail_id( get_the_ID() );
						$size = $opts['thumb_size'];
						$image_sizes = $opts['image_sizes'];
						$this->add_render_attribute( 'image_class', 'class', 'img-fluid' );
						
						if( in_array( $size, $image_sizes ) ){
							$this->add_render_attribute( 'image_class', 'class', "attachment-$size size-$size" );
							$img_attr = $this->get_render_attributes( 'image_class' );
							$img_attr['class'] = implode( " ", $img_attr['class'] );
							$output .= '<a href="'. esc_url( get_the_permalink() ) .'" '. $this->get_render_attribute_string( 'image-link' ) .'>';
								$output .= wp_get_attachment_image( $img_id, $size, false, $img_attr );
							$output .= '</a>';
						}else{
							$image_src = Group_Control_Image_Size::get_attachment_image_src( $img_id, 'thumbnail', $settings );
							if ( ! empty( $image_src ) ) {
								$img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
								$output .= '<a href="'. esc_url( get_the_permalink() ) .'" '. $this->get_render_attribute_string( 'image-link' ) .'>';
								$output .= sprintf( '<img src="%s" title="%s" alt="%s" %s />', esc_attr( $image_src ), esc_attr( get_the_title( $img_id ) ), esc_attr( $img_alt ), $this->get_render_attribute_string( 'image_class' ) );
								$output .= '</a>';
							}
						}

						if( $overlay_title_opt ) {
							$output .= '<div class="ai-product-overlay"><a href="'. esc_url( get_the_permalink() ) .'">'. esc_attr( get_the_title( get_the_ID() ) ) .'</a></div>';
						}
																		
					$output .= '</div><!-- .product-thumb -->';
				}
			break;
			
			case "category":
				$categories = get_the_terms( get_the_ID(), 'product_cat' );
				if ( ! empty( $categories ) ){
					$coutput = '<div class="aiea-product-category">';
						$coutput .= '<span class="before-icon fa fa-folder-o"></span>';
						foreach ( $categories as $category ) {
							$coutput .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>,';
						}
						$output .= rtrim( $coutput, ',' );
					$output .= '</div>';
				}
			break;
			
			case "rating":
								
				$icon = '&#xE934;';
				if ( 'star_fontawesome' === $settings['star_style'] ) {
					if ( 'outline' === $settings['unmarked_star_style'] ) {
						$icon = '&#xE933;';
					}
				} elseif ( 'star_unicode' === $settings['star_style'] ) {
					$icon = '&#9733;';

					if ( 'outline' === $settings['unmarked_star_style'] ) {
						$icon = '&#9734;';
					}
				}
				$output = '<div class="aiea-rating elementor-star-rating">';
				
				$product = $this->product;
				$rating = $product->get_average_rating();
				$filter_rating = $rating ? absint( $rating ) : 0;
				$remain_class = $rating ? str_replace( '0.', '', number_format( $rating, 1, '.', '' ) - floor( $rating ) ) : '0';
				for( $i = 0; $i < 5; $i++ ) {					
					if( $filter_rating > $i ) {
						$output .= '<i class="elementor-star-full">' . $icon . '</i>';
					} else {
						if( $remain_class ) {
							$output .= '<i class="elementor-star-'. esc_attr( $remain_class ) .'">' . $icon . '</i>';
							$remain_class = '';
						} else {
							$output .= '<i class="elementor-star-empty">' . $icon . '</i>';
						}
					}
				}
				$output .= '</div>';
			break;
			
			case "add-to-cart":
				$output .= '<div class="aiea-buy-btn product-add-to-cart">';
					$output .= do_shortcode('[add_to_cart id='. get_the_ID() .' show_price="false"]');
				$output .= '</div>';
			break;
			
			case "price":
				$product = $this->product;
				$output .= '<div class="aiea-product-price">';
					$output .= $product->get_price_html();
				$output .= '</div>';
			break;		
			
		}
		return $output; 
	}
	
	public function get_free_options( $key ) {
		$free_options = [
			$key => [ 'layout-1', 'layout-2' ]
		];
		return $free_options[$key];
	}

}