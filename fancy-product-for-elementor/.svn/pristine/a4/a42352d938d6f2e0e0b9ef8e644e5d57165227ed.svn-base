<?php
namespace FancyProductForElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Image_Size;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Fancy Woocommerce
 *
 * Elementor widget for Elementor Fancy Woocommerce.
 *
 * @since 1.0.0
 */
class Fancy_Product_For_Elementor extends Widget_Base {

	use \FancyProductForElementor\Traits\Helper;
	use \FancyProductForElementor\Traits\Styles;

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'fancy-product-for-elementor';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Fancy Product For Elementor', 'fancy-product-for-elementor' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-woocommerce';
	}

	public function get_keywords() {
		return [ 'products', 'grid', 'item', 'loop', 'query', 'woocommerce', 'ecommerce', 'fancy' ];
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general-elements' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'snapsvg', 'fancy-product-for-elementor' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_type',
			[
				'label' => __( 'Product Settings', 'fancy-product-for-elementor' ),
			]
		);

		$this->add_control(
            'tp_woo_products_filter',
            [
                'label' => esc_html__('Filter By', 'fancy-product-for-elementor'),
                'type' => Controls_Manager::SELECT,
                'default' => 'recent-products',
                'options' => [
                    'recent-products' => esc_html__('Recent Products', 'fancy-product-for-elementor'),
                    'featured-products' => esc_html__('Featured Products', 'fancy-product-for-elementor'),
                    'best-selling-products' => esc_html__('Best Selling Products', 'fancy-product-for-elementor'),
                    'sale-products' => esc_html__('Sale Products', 'fancy-product-for-elementor'),
                    'top-products' => esc_html__('Top Rated Products', 'fancy-product-for-elementor'),
                ],
            ]
		);

		$this->add_control(
            'tp_woo_products_styles',
            [
                'label' => esc_html__('Style', 'fancy-product-for-elementor'),
                'type' => Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1'  => esc_html__('Style 1', 'fancy-product-for-elementor'),
                    '2'  => esc_html__('Style 2', 'fancy-product-for-elementor'),
                    '3'  => esc_html__('Style 3', 'fancy-product-for-elementor'),
					'4'  => esc_html__('Style 4', 'fancy-product-for-elementor'),
					'5'  => esc_html__('Style 5', 'fancy-product-for-elementor'),
					'6'  => esc_html__('Style 6', 'fancy-product-for-elementor'),

                ],
            ]
		);
		
		$this->add_control(
            'tp_woo_products_column',
            [
                'label' => esc_html__('Columns', 'fancy-product-for-elementor'),
                'type' => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1' => esc_html__('1', 'fancy-product-for-elementor'),
                    '2' => esc_html__('2', 'fancy-product-for-elementor'),
                    '3' => esc_html__('3', 'fancy-product-for-elementor'),
                    '4' => esc_html__('4', 'fancy-product-for-elementor'),
                    '5' => esc_html__('5', 'fancy-product-for-elementor'),
                    '6' => esc_html__('6', 'fancy-product-for-elementor'),
                ],
            ]
		);
		
		$this->add_control(
            'tp_woo_products_count',
            [
                'label' => __('Products Count', 'fancy-product-for-elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 8,
                'min' => 1,
                'max' => 1000,
                'step' => 1,
            ]
		);
		
		$this->add_control(
            'tp_woo_products_categories',
            [
                'label' => esc_html__('Product Categories', 'fancy-product-for-elementor'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => $this->fancy_product_for_elementor_product_cats(),
            ]
		);

		$this->add_control(
            'tp_woo_products_tags',
            [
                'label' => esc_html__('Product Tags', 'fancy-product-for-elementor'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => $this->fancy_product_for_elementor_product_tags(),
            ]
		);

		$this->add_control('tp_woo_products_order_by',
		[
			'label'         => __( 'Order By', 'fancy-product-for-elementor' ),
			'type'          => Controls_Manager::SELECT,
			'separator'     => 'before',
			'label_block'   => true,
			'options'       => [
				'none'          => __('None', 'fancy-product-for-elementor'),
				'ID'            => __('ID', 'fancy-product-for-elementor'),
				'author'        => __('Author', 'fancy-product-for-elementor'),
				'title'         => __('Title', 'fancy-product-for-elementor'),
				'name'          => __('Name', 'fancy-product-for-elementor'),
				'date'          => __('Date', 'fancy-product-for-elementor'),
				'modified'      => __('Last Modified', 'fancy-product-for-elementor'),
				'rand'          => __('Random', 'fancy-product-for-elementor'),
				'comment_count' => __('Number of Comments', 'fancy-product-for-elementor'),
			],
			'default'       => 'date'
		]
	);
	
	$this->add_control('tp_woo_products_order',
		[
			'label'         => __( 'Order', 'fancy-product-for-elementor' ),
			'type'          => Controls_Manager::SELECT,
			'label_block'   => true,
			'options'       => [
				'DESC'  => __('Descending', 'fancy-product-for-elementor'),
				'ASC'   => __('Ascending', 'fancy-product-for-elementor'),
			],
			'default'       => 'DESC'
		]
	);


		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'tp_woo_products_img',
				'default' => 'woocommerce_thumbnail',
				'label' => __('Image Size', 'fancy-product-for-elementor'),
                'exclude' => [
					'custom'
				]
			]
		);

		$this->add_control(
            'tp_woo_products_desc_length',
            [
                'label' => __('Description Words Length', 'fancy-product-for-elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 18,
                'min' => 1,
                'max' => 50,
                'step' => 1,
            ]
		);

		$this->add_control(
            'tp_woo_products_show_sale',
            [
                'label' => esc_html__('Show Product Sale Badge?', 'fancy-product-for-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
		);
		
		$this->add_control(
            'tp_woo_products_show_desc',
            [
                'label' => esc_html__('Show Product Description?', 'fancy-product-for-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
		);
		
		$this->add_control(
            'tp_woo_products_show_price',
            [
                'label' => esc_html__('Show Product Price?', 'fancy-product-for-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
		);
		
		$this->add_control(
            'tp_woo_products_show_add_to_cart',
            [
                'label' => esc_html__('Show Add to Cart Button?', 'fancy-product-for-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_pagination',
			[
				'label' => __( 'Pagination Settings', 'fancy-product-for-elementor' ),
			]
		);

		$this->add_control(
            'tp_woo_products_show_pagination',
            [
                'label' => esc_html__('Show Pagination?', 'fancy-product-for-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
            ]
		);

		$this->add_control(
            'tp_woo_products_per_page',
            [
                'label' => __('Products Per Page', 'fancy-product-for-elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
                'min' => 1,
                'max' => 1000,
                'step' => 1,
            ]
		);

		$this->add_control(
			'tp_woo_products_pagination_prev',
			[
				'label' => __( 'Previous Text', 'fancy-product-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				 ],
				 'default' => '<',
		 		'placeholder' => __( 'Like Prev or <', 'fancy-product-for-elementor' ),
			]
		);

		$this->add_control(
			'tp_woo_products_pagination_next',
			[
				'label' => __( 'Next Text', 'fancy-product-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				 ],
				'default' => '>',
		 		'placeholder' => __( 'Like Next or >', 'fancy-product-for-elementor' ),
			]
		);


		$this->end_controls_section();

/**
 * ======================= [   Styles Tab   ] ===========================================
 */




  /**
 * ======================= [   General Settings   ] ===========================================
 */

$this->start_controls_section(
	'tp_woo_products_general_styles',
	[
		'label' => esc_html__('General Settings', 'fancy-product-for-elementor'),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

		$this->add_responsive_control(
			'tp_woo_products_gutter',
			[
				'label'     => esc_html__( 'Product Spacing', 'fancy-product-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 50,
					],
				],
				'default'       => [
					'size' => 10,
				],
				'selectors' => [
					' {{WRAPPER}} .tp-few__container--style-1 .tp-few_item  .tp-few_inner' => 'margin: {{SIZE}}px !important ;',
					' {{WRAPPER}} .tp-few__container--style-2 .tp-few_item  .tp-few_inner' => 'margin: {{SIZE}}px !important ;',
					' {{WRAPPER}} .tp-few__container--style-3 .tp-few_item  .tp-few_inner' => 'margin: {{SIZE}}px !important ;',
					' {{WRAPPER}} .tp-few__container--style-4 .tp-few_item' => 'padding: {{SIZE}}px !important ;',
					' {{WRAPPER}} .tp-few__container--style-5 .tp-few_item' => 'padding: {{SIZE}}px !important ;',
					' {{WRAPPER}} .tp-few__container--style-6 .tp-few_item' => 'padding: {{SIZE}}px !important ;',
					' {{WRAPPER}} .tp-few__container--style-7 .tp-few_item' => 'padding: {{SIZE}}px !important ;',
					' {{WRAPPER}} .tp-few__container--style-8 .tp-few_item' => 'padding: {{SIZE}}px !important ;',
					' {{WRAPPER}} .tp-few__container--style-9 .tp-few_item' => 'padding: {{SIZE}}px !important ;',
					' {{WRAPPER}} .tp-few__container--style-10 .tp-few_item' => 'padding: {{SIZE}}px !important ;',
				],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tp-few__wrapper .tp-few_item  .tp-few_inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tp-few__container--style-10 .tp-few_item .tp-few_inner img, {{WRAPPER}} .tp-few__container--style-10 .tp-few_item  .tp-few_front, {{WRAPPER}} .tp-few__container--style-10 .tp-few_item  .tp-few_back'=> 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tp-few__container--style-9 .tp-few_item  .tp-few_inner img, {{WRAPPER}} .tp-few__container--style-9 .tp-few_item  .tp-few_front, {{WRAPPER}} .tp-few__container--style-9 .tp-few_item  .tp-few_back'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tp-few__container--style-8 .tp-few_item  .tp-few_inner img, {{WRAPPER}} .tp-few__container--style-8 .tp-few_item  .tp-few_front, {{WRAPPER}} .tp-few__container--style-8 .tp-few_item  .tp-few_back'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tp-few__container--style-7 .tp-few_item  .tp-few_inner img, {{WRAPPER}} .tp-few__container--style-7 .tp-few_item  .tp-few_front, {{WRAPPER}} .tp-few__container--style-7 .tp-few_item  .tp-few_back'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tp-few__container--style-6 .tp-few_item  .tp-few_inner img, {{WRAPPER}} .tp-few__container--style-6 .tp-few_item  .tp-few_front, {{WRAPPER}} .tp-few__container--style-6 .tp-few_item  .tp-few_back'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tp-few__container--style-5 .tp-few_item  .tp-few_inner img, {{WRAPPER}} .tp-few__container--style-5 .tp-few_item  .tp-few_front, {{WRAPPER}} .tp-few__container--style-5 .tp-few_item  .tp-few_back'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tp-few__container--style-4 .tp-few_item  .tp-few_inner img, {{WRAPPER}} .tp-few__container--style-4 .tp-few_item  .tp-few_front, {{WRAPPER}} .tp-few__container--style-4 .tp-few_item  .tp-few_back'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tp-few__container--style-4 .tp-few_item  .tp-few_inner .tp-few_back' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tp-few__container--style-4 .tp-few_item  .tp-few_inner .tp-few__img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

$this->start_controls_tabs('tp_woo_products_general_settings_tabs');

	$this->start_controls_tab('normal11', ['label' => esc_html__('Normal', 'fancy-product-for-elementor')]);

			$this->add_control(
				'tp_woo_products_content_bg',
				[
					'label' => esc_html__('Content Background Normal', 'fancy-product-for-elementor'),
					'type' => Controls_Manager::COLOR,
					'default' => '#E2465B',
					'selectors' => [
						'{{WRAPPER}} .tp-few_item svg path' => 'fill: {{VALUE}};',
						
					],
				]
			);

			$this->add_control(
				'tp_woo_products_content_border_bg',
				[
					'label' => esc_html__('Content Border color(Style 10)', 'fancy-product-for-elementor'),
					'type' => Controls_Manager::COLOR,
					'default' => '#2c3f52',
					'selectors' => [
						'{{WRAPPER}} .tp-few__container--style-10 figure.tp-few_inner.cs-hover .tp-few_back' => 'box-shadow: 0 0 0 10px {{VALUE}};',
						'{{WRAPPER}} .tp-few__container--style-10 figure.tp-few_inner:hover .tp-few_back'    => 'box-shadow: 0 0 0 10px {{VALUE}};',
					],
					'condition' => [
						'tp_woo_products_styles' => '10',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'tp_woo_products_main_border',
					'selector' => '{{WRAPPER}} .tp-few_item .tp-few_inner',
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'tp_woo_products_item_box_shadow',
					'label' => __( 'Product Item Box Shadow ', 'fancy-product-for-elementor' ),
					'selector' => '{{WRAPPER}} .tp-few__wrapper .tp-few_item  .tp-few_inner',
				]
			);


	$this->end_controls_tab();

	$this->start_controls_tab('hover11', ['label' => esc_html__('Hover', 'fancy-product-for-elementor')]);


			$this->add_control(
				'tp_woo_products_content_bg_hover',
				[
					'label' => esc_html__('Content Background Hover', 'fancy-product-for-elementor'),
					'type' => Controls_Manager::COLOR,
					'default' => '#E2465B',
					'selectors' => [
						'{{WRAPPER}} .tp-few_item:hover svg path' => 'fill: {{VALUE}};',
						'{{WRAPPER}} .tp-few__container--style-4 .tp-few_item:hover .tp-few_back' => 'background-color: {{VALUE}};',
						'{{WRAPPER}} .tp-few__container--style-4 .tp-few_item .tp-few__content' => 'background-color: {{VALUE}};',
						'{{WRAPPER}} .tp-few__wrapper--ver2 .tp-few_item .tp-few_back' => 'background-color: {{VALUE}};',
						'{{WRAPPER}} .tp-few__container--style-10 .tp-few_item .tp-few_back' => 'background-color: {{VALUE}};',
					], 
				]
			);

			$this->add_control(
				'border_radius',
				[
					'label' => __( 'Border Radius', 'elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .tp-few__wrapper .tp-few_item:hover .tp-few_inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'tp_woo_products_main_border_hover',
					'selector' => '{{WRAPPER}} .tp-few_item:hover .tp-few_inner',
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'tp_woo_products_item_box_shadow_hover',
					'label' => __( 'Product Item Box Shadow Hover', 'fancy-product-for-elementor' ),
					'selector' => '{{WRAPPER}} .tp-few__wrapper .tp-few_item:hover .tp-few_inner',
				]
			);

		$this->end_controls_tab();

	$this->end_controls_tabs();

$this->end_controls_section();









 /**
 * ======================= [   Product Title   ] ===========================================
 */

		$this->start_controls_section(
            'tp_woo_products_title_styles',
            [
                'label' => esc_html__('Product Title', 'fancy-product-for-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

					$this->add_control(
						'tp_woo_products_title_color',
						[
							'label' => esc_html__('Title Color', 'fancy-product-for-elementor'),
							'type' => Controls_Manager::COLOR,
							'default' => '#00FFDE',
							'selectors' => [
								'{{WRAPPER}} .tp-few_item .tp-few__title' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'tp_woo_products_title_color_hover',
						[
							'label' => esc_html__('Title Text Hover Color', 'fancy-product-for-elementor'),
							'type' => Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tp-few_item:hover .tp-few__title' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'tp_woo_products_title_typography',
							'selector' => '{{WRAPPER}} .tp-few_item .tp-few__title',
							'default' => [
								'font_size' => [
									'unit' => 'px',
									'size' => '16',
								]
							]
						]
					);



		$this->end_controls_section();
		





 /**
 * ======================= [   Product Description   ] ===========================================
 */

		$this->start_controls_section(
            'tp_woo_products_desc_styles',
            [
                'label' => esc_html__('Product Description', 'fancy-product-for-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

					$this->add_control(
						'tp_woo_products_desc_color',
						[
							'label' => esc_html__('Description Color', 'fancy-product-for-elementor'),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tp-few_item .tp-few__desc' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'tp_woo_products_desc_typography',
							'selector' => '{{WRAPPER}} .tp-few_item .tp-few_inner .tp-few__desc',
						]
					);

		$this->end_controls_section();
		






 /**
 * ======================= [   Price Tab   ] ===========================================
 */

$this->start_controls_section(
	'tp_woo_products_price_styles',
	[
		'label' => esc_html__('Price Settings', 'fancy-product-for-elementor'),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

			$this->add_control(
				'tp_woo_products_price_color_normal',
				[
					'label' => esc_html__('Normal Price Color', 'fancy-product-for-elementor'),
					'type' => Controls_Manager::COLOR,
					'default' => '#FFBC55',
					'selectors' => [
						'{{WRAPPER}} .tp-few_item .tp-few__price > span.woocommerce-Price-amount.amount ' => 'color: {{VALUE}};',
						'{{WRAPPER}} .tp-few_item .tp-few__price ins span.woocommerce-Price-amount.amount' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'tp_woo_products_price_color_old',
				[
					'label' => esc_html__('Old Price Color', 'fancy-product-for-elementor'),
					'type' => Controls_Manager::COLOR,
					'default' => '#DA4423',
					'selectors' => [
						'{{WRAPPER}} .tp-few_item .tp-few__price > del span.woocommerce-Price-amount.amount' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'tp_woo_products_price_typo',
					'selector' => 
						'{{WRAPPER}} .tp-few_item .tp-few_inner .tp-few__content .tp-few__price,
						 {{WRAPPER}} .tp-few__wrapper.tp-few__wrapper--ver2 .tp-few_front .tp-few__price',
				]
			);

$this->end_controls_section();






 /**
 * ======================= [   On Sale Badge   ] ===========================================
 */

$this->start_controls_section(
	'tp_woo_products_sale_styles',
	[
		'label' => esc_html__('On Sale Badge', 'fancy-product-for-elementor'),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

$this->add_group_control(
	Group_Control_Typography::get_type(),
	[
		'name' => 'tp_woo_products_on_sale_typography',
		'selector' => '{{WRAPPER}} .tp-few_item  .tp-few__sale',
	]
);

$this->add_responsive_control(
	'tp_woo_products_on_sale_padding',
	[
		'label' => esc_html__( 'Padding', 'fancy-product-for-elementor' ),
		'type' => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', '%', 'em' ],
		'default' => [
			'top' => '1',
			'left' => '3',
			'bottom' => '1',
			'right' => '3',
			'unit' => 'px',
		],
		'selectors' => [
			'{{WRAPPER}} .tp-few_item  .tp-few__sale' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_group_control(
	Group_Control_Border::get_type(),
	[
		'name' => 'tp_woo_products_on_sale_badge_border',
		'selector' => '{{WRAPPER}} .tp-few_item .tp-few__sale',
	]
);

$this->add_control(
	'border_radius',
	[
		'label' => __( 'Border Radius', 'elementor' ),
		'type' => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', '%' ],
		'selectors' => [
			'{{WRAPPER}} .tp-few_item .tp-few__sale' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->start_controls_tabs('tp_woo_products_on_sale_badge_tabs');

$this->start_controls_tab('normalsale', ['label' => esc_html__('Normal', 'fancy-product-for-elementor')]);


			$this->add_control(
				'tp_woo_products_on_sale_badge_bg',
				[
					'label' => esc_html__('Background Color', 'fancy-product-for-elementor'),
					'type' => Controls_Manager::COLOR,
					'default' => '#e74c3c',
					'selectors' => [
						'{{WRAPPER}} .tp-few_item .tp-few__sale' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'tp_woo_products_on_sale_badge_color',
				[
					'label' => esc_html__('Text Color', 'fancy-product-for-elementor'),
					'type' => Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tp-few_item .tp-few__sale' => 'color: {{VALUE}};',
					],
				]
			);

			

$this->end_controls_tab();



$this->start_controls_tab('hoversale', ['label' => esc_html__('Hover', 'fancy-product-for-elementor')]);

		$this->add_control(
			'tp_woo_products_on_sale_badge_bg_hover',
			[
				'label' => esc_html__('Background Color(hover)', 'fancy-product-for-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '#39CEBD',
				'selectors' => [
					'{{WRAPPER}} .tp-few_item:hover .tp-few__sale' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tp_woo_products_on_sale_badge_color_hover',
			[
				'label' => esc_html__('Text Color(hover)', 'fancy-product-for-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .tp-few_item:hover .tp-few__sale' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'tp_woo_products_on_sale_badge_border_hover',
				'selector' => '{{WRAPPER}} .tp-few_item:hover .tp-few__sale',
			]
		);

$this->end_controls_tab();

$this->end_controls_tabs();

			

$this->end_controls_section();



		

 /**
 * =================================== [   Add To Cart   ] ===========================================
 */
$this->start_controls_section(
	'tp_woo_products_add_to_cart_styles',
	[
		'label' => esc_html__('Add to Cart Button Styles', 'fancy-product-for-elementor'),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

$this->add_responsive_control(
	'tp_woo_products_add_to_cart_padding',
	[
		'label' => esc_html__( 'Padding', 'fancy-product-for-elementor' ),
		'type' => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', '%', 'em' ],
		'default' => [
			'top' => '5',
			'left' => '10',
			'bottom' => '5',
			'right' => '10',
			'unit' => 'px',
		],
		'selectors' => [
			'{{WRAPPER}} .tp-few_item .tp-few__link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_responsive_control(
	'tp_woo_products_padding_left',
	[
		'label' => esc_html__( 'Button Width', 'fancy-product-for-elementor' ),
		'type' => Controls_Manager::SLIDER,
		'range' => [
			'%' => [
				'min' => 0,
				'max' => 100,
			],
		],
		'selectors' => [
			'{{WRAPPER}} .tp-few_item .tp-few__link' => 'width:{{SIZE}}%;',
		],
		'condition' => [
			'tp_woo_products_styles!' => '2',
		],
	]
);

$this->start_controls_tabs('tp_woo_products_add_to_cart_style_tabs');

$this->start_controls_tab('normal', ['label' => esc_html__('Normal', 'fancy-product-for-elementor')]);

$this->add_control(
	'tp_woo_products_add_to_cart_color',
	[
		'label' => esc_html__('Button Text Color', 'fancy-product-for-elementor'),
		'type' => Controls_Manager::COLOR,
		'default' => '#ffffff',
		'selectors' => [
			'{{WRAPPER}} .tp-few_item .tp-few__link' => 'color: {{VALUE}};',
		],
	]
);

$this->add_control(
	'tp_woo_products_add_to_cart_background',
	[
		'label' => esc_html__('Button Background Color', 'fancy-product-for-elementor'),
		'type' => Controls_Manager::COLOR,
		'default' => '#39CEBD',
		'selectors' => [
			'{{WRAPPER}} .tp-few_item .tp-few__link' => 'background-color: {{VALUE}};',
		],
	]
);

$this->add_group_control(
	Group_Control_Border::get_type(),
	[
		'name' => 'tp_woo_products_add_to_cart_border',
		'selector' => '{{WRAPPER}} .tp-few_item .tp-few__link',
	]
);

$this->add_group_control(
	Group_Control_Typography::get_type(),
	[
		'name' => 'tp_woo_products_add_to_cart_typography',
		'selector' => '{{WRAPPER}} .tp-few_item .tp-few__link',
		'default' => [
			'font_size' => [
				'unit' => 'px',
				'size' => '12'
			]
		]
	]
);

$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	[
		'name' => 'tp_woo_products_add_to_cart_box_shadow',
		'label' => __( 'Box Shadow', 'fancy-product-for-elementor' ),
		'selector' => '{{WRAPPER}} .tp-few_item .tp-few__link',
	]
);

$this->end_controls_tab();



$this->start_controls_tab('tp_woo_products_add_to_cart_hover_styles', ['label' => esc_html__('Hover', 'fancy-product-for-elementor')]);

$this->add_control(
	'tp_woo_products_add_to_cart_color_hover',
	[
		'label' => esc_html__('Button Text Color', 'fancy-product-for-elementor'),
		'type' => Controls_Manager::COLOR,
		'default' => '#39CEBD',
		'selectors' => [
			'{{WRAPPER}} .tp-few_item .tp-few__link:hover' => 'color: {{VALUE}};',
		],
	]
);

$this->add_control(
	'tp_woo_products_add_to_cart_background_hover',
	[
		'label' => esc_html__('Button Background Color', 'fancy-product-for-elementor'),
		'type' => Controls_Manager::COLOR,
		'default' => '#fff',
		'selectors' => [
			'{{WRAPPER}} .tp-few_item .tp-few__link:hover' => 'background-color: {{VALUE}};',
		],
	]
);

$this->add_group_control(
	Group_Control_Border::get_type(),
	[
		'name' => 'tp_woo_products_add_to_cart_border_hover',
		'selector' => '{{WRAPPER}} .tp-few_item .tp-few__link:hover',
	]
);

$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	[
		'name' => 'tp_woo_products_add_to_cart_box_shadow_hover',
		'label' => __( 'Box Shadow', 'fancy-product-for-elementor' ),
		'selector' => '{{WRAPPER}} .tp-few_item .tp-few__link:hover',
	]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();


 /**
 * =================================== [   Pagination   ] ===========================================
 */
$this->start_controls_section(
	'tp_woo_products_pagination_styles',
	[
		'label' => esc_html__('Pagination Styles', 'fancy-product-for-elementor'),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

$this->add_responsive_control(
	'tp_woo_products_pagination_padding',
	[
		'label' => esc_html__( 'Padding', 'fancy-product-for-elementor' ),
		'type' => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', '%', 'em' ],
		'default' => [
			'top' => '5',
			'left' => '10',
			'bottom' => '5',
			'right' => '10',
			'unit' => 'px',
		],
		'selectors' => [
			'{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_responsive_control('tp_woo_products_pagination_margin',
            [
                'label'         => __('Margin', 'fancy-product-for-elementor'),
                'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => ['px', 'em', '%'],
				'default' => [
					'top' => '7',
					'left' => '7',
					'bottom' => '7',
					'right' => '7',
					'unit' => 'px',
				],
                'selectors'     => [
                    '{{WRAPPER}} .tp-few__pagination ul.page-numbers li ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

		$this->add_responsive_control(
			'tp_woo_products_pagination_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

$this->start_controls_tabs('tp_woo_products_pagination_style_tabs');

	$this->start_controls_tab('normal1', ['label' => esc_html__('Normal', 'fancy-product-for-elementor')]);

		$this->add_control(
			'tp_woo_products_pagination_color',
			[
				'label' => esc_html__('Page Link Text Color', 'fancy-product-for-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tp_woo_products_pagination_background',
			[
				'label' => esc_html__('Page Link Background Color', 'fancy-product-for-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '#39CEBD',
				'selectors' => [
					'{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'tp_woo_products_pagination_border',
				'selector' => '{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tp_woo_products_pagination_typography',
				'selector' => '{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers',
				'default' => [
					'font_size' => [
						'unit' => 'px',
						'size' => '12'
					]
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'tp_woo_products_pagination_box_shadow',
				'label' => __( 'Box Shadow', 'fancy-product-for-elementor' ),
				'selector' => '{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers',
			]
		);

	$this->end_controls_tab();




		$this->start_controls_tab('tp_woo_products_pagination_hover_styles',
			[
				'label' => __('Hover', 'fancy-product-for-elementor'),
				
			]
		);

			$this->add_control(
				'tp_woo_products_pagination_color_hover',
				[
					'label' => esc_html__('Page Link Hover Color', 'fancy-product-for-elementor'),
					'type' => Controls_Manager::COLOR,
					'default' => '#39CEBD',
					'selectors' => [
						'{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'tp_woo_products_pagination_background_hover',
				[
					'label' => esc_html__('Page Link Hover Background Color', 'fancy-product-for-elementor'),
					'type' => Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers:hover' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'tp_woo_products_pagination_border_hover',
					'selector' => '{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers:hover',
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'tp_woo_products_pagination_box_shadow_hover',
					'label' => __( 'Page Link Hover Box Shadow', 'fancy-product-for-elementor' ),
					'selector' => '{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers:hover',
				]
			);

		$this->end_controls_tab();


		$this->start_controls_tab('tp_woo_products_pagination_active_styles',
			[
				'label'         => __('Active', 'fancy-product-for-elementor'),
				
			]
		);

			$this->add_control(
				'tp_woo_products_pagination_color_active',
				[
					'label' => esc_html__('Page Link Active Color', 'fancy-product-for-elementor'),
					'type' => Controls_Manager::COLOR,
					'default' => '#39CEBD',
					'selectors' => [
						'{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers.current' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'tp_woo_products_pagination_background_active',
				[
					'label' => esc_html__('Page Link Active Background Color', 'fancy-product-for-elementor'),
					'type' => Controls_Manager::COLOR,
					'default' => '#efefef',
					'selectors' => [
						'{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers.current' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'tp_woo_products_pagination_border_active',
					'selector' => '{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers.current',
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'tp_woo_products_pagination_box_shadow_active',
					'label' => __( 'Page Link Active Box Shadow', 'fancy-product-for-elementor' ),
					'selector' => '{{WRAPPER}} .tp-few__pagination ul.page-numbers li .page-numbers.current',
				]
			);

		$this->end_controls_tab();

	$this->end_controls_tabs();

$this->end_controls_section();


	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();


		$tp_woo_products['styles']            = $settings['tp_woo_products_styles'];
		$tp_woo_products['filter']            = $settings['tp_woo_products_filter'];
		$tp_woo_products['count']             = $settings['tp_woo_products_count'] ?: 4;
		$tp_woo_products['column']            = $settings['tp_woo_products_column'] ?: 3;
		$tp_woo_products['desc_length']       = $settings['tp_woo_products_desc_length'] ?: 18;
		$tp_woo_products['cats']              = $settings['tp_woo_products_categories'];
		$tp_woo_products['img']               = $settings['tp_woo_products_img_size'];
		$tp_woo_products['styles']            = $settings['tp_woo_products_styles'] ?: '2';
		$tp_woo_products['show_sale']         = $settings['tp_woo_products_show_sale'];
		$tp_woo_products['show_desc']         = $settings['tp_woo_products_show_desc'];
		$tp_woo_products['show_price']        = $settings['tp_woo_products_show_price'];
		$tp_woo_products['show_add_to_cart']  = $settings['tp_woo_products_show_add_to_cart'];
		
		$tp_woo_products['tp_woo_products_show_pagination'] = $settings['tp_woo_products_show_pagination'];
		$tp_woo_products['tp_woo_products_per_page']        = $settings['tp_woo_products_per_page'];

		$tp_woo_pagination          = $tp_woo_products['tp_woo_products_show_pagination'];
		$tp_woo_pagination_per_page = $tp_woo_products['tp_woo_products_per_page'];

		$tp_woo_next_text = $settings['tp_woo_products_pagination_next'];
		$tp_woo_prev_text = $settings['tp_woo_products_pagination_prev'];

		$args = [
            'post_type' => 'product',
			'posts_per_page' => ( $tp_woo_pagination === 'yes' ) ? $tp_woo_products['tp_woo_products_per_page'] : $tp_woo_products['count'],
			'order' => $settings['tp_woo_products_order'],
			'orderby' => $settings['tp_woo_products_order_by'],
		];

		if ( $tp_woo_pagination == "yes" ) {
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args['paged'] = $paged;
		}

		
		
		if ( ! empty( $tp_woo_products['cats'] ) ) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $tp_woo_products['cats'],
                    'operator' => 'IN',
                ],
            ];
		}

		if ( $settings['tp_woo_products_filter'] == 'featured-products' ) {
            $args['tax_query'] = [
                'relation' => 'AND',
                [
					'taxonomy' => 'product_visibility',
                    'field' => 'name',
                    'terms' => 'featured'
                ]
            ];

            if( $tp_woo_products['cats'] ) {
                $args['tax_query'][] = [
					'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $tp_woo_products['cats']
                ];
            }

        } else if ($tp_woo_products['filter'] == 'best-selling-products') {
            $args['meta_key'] = 'total_sales';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
        } else if ($tp_woo_products['filter'] == 'sale-products') {
            $args['meta_query'] = [
                'relation' => 'OR',
                [
                    'key' => '_sale_price',
                    'value' => 0,
                    'compare' => '>',
                    'type' => 'numeric',
                ], [
                    'key' => '_min_variation_sale_price',
                    'value' => 0,
                    'compare' => '>',
                    'type' => 'numeric',
                ],
            ];
        } else if ($tp_woo_products['filter'] == 'top-products') {
            $args['meta_key'] = '_wc_average_rating';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
		}
		
		if( !empty( $settings['tp_woo_products_tags'] ) ) {
			$args['tag_id'] = implode(",",$settings['tp_woo_products_tags']);
			$args['tax_query'][] = [
				'taxonomy' => 'product_tag',
				'field' => 'slug',
				'terms' => $settings['tp_woo_products_tags'],
			];
		}
		
		$query = new \WP_Query($args);

		ob_start();

        if ($query->have_posts()) {
			// 01 - render the wrapper Start tags according to the styles.
			$this->render_wrapper_start_tags( $tp_woo_products['styles'], $tp_woo_products['column'] );

			// 02 - render the loop according to the style.
			while ($query->have_posts()) {

				$query->the_post();
				$product = wc_get_product( get_the_ID() );

				if ( $tp_woo_products['styles'] == '1' || $tp_woo_products['styles'] == '2' || $tp_woo_products['styles'] == '3' ) {
					$svg_tag_hover = $this->render_svg_styles( $tp_woo_products['styles'] );
					$this->svg_styles( $product, $tp_woo_products, $svg_tag_hover );
				}

				if ( $tp_woo_products['styles'] == '4' || 
					 $tp_woo_products['styles'] == '5' || 
					 $tp_woo_products['styles'] == '6' || 
					 $tp_woo_products['styles'] == '7' || 
					 $tp_woo_products['styles'] == '8' || 
					 $tp_woo_products['styles'] == '9' || 
					 $tp_woo_products['styles'] == '10') {
					$this->second_version_styles( $product, $tp_woo_products );
				}

			}

			// 03 - render the wrapper End tags according to the styles.
			$this->render_wrapper_end_tags($tp_woo_products['styles'] );

		} else {
			_e('<p class="no-posts-found">No posts found!</p>', 'fancy-product-for-elementor');
		}

		wp_reset_postdata();
if( $tp_woo_products['tp_woo_products_show_pagination'] == 'yes' ) {
		
		$total = $query->max_num_pages;
		$total =  $tp_woo_products['count'] / $tp_woo_pagination_per_page;
		$total = 1;
		$pgn_count = $tp_woo_products['count'];
		$pgn_per_page = $tp_woo_pagination_per_page;
		if ( $pgn_count > $pgn_per_page ) {
			if ( $pgn_count % $pgn_per_page === 0 ) {
				$total = $pgn_count / $pgn_per_page;
			} else {
				$total = 1 + ( $pgn_count / $pgn_per_page );
			}
		}
		if ( $total > 1 )  {
			 // get the current page
			 if ( !$current_page = get_query_var('paged') ) {
			   $current_page = 1;
			 }
			 ?>
			 <div class="tp-few__pagination">
				<?php
				 echo paginate_links(array(
					  'current'      => $current_page,
					  'total'        => $total,
					  'type'         => 'list',
					  'format'       => '?paged=%#%',
					  'prev_text'    => $tp_woo_prev_text,
					  'next_text'    => $tp_woo_next_text,
				 ));
				 ?>
		   </div>
		   <?php
		}
}

		echo ob_get_clean();
	}

	public function render_svg_styles( $svg_style ) {

		if ( $svg_style === '' ) {
			return;
		}

		$data_path_hover = "";
		switch ( $svg_style ) {
			case '1' : 
				return [
					'hover' => 'M 180,160 0,218 0,0 180,0 z',
					'tag'   => '<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 180,34.57627 -180,0 L 0,0 180,0 z"/></svg>',
				];
				break;
			case '2' : 
				return [
					'hover' =>'m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z',
					'tag'   => '<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z"/></svg>',
				];
				break;
			case '3' : 
				return [
					'hover' =>'M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z ', 
					'tag'   => '<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 0,0 0,38 90,58 180.5,38 180,0 z"/></svg>',
					];
				break;
			default:
				return false;
				
		}

	}


	public function render_wrapper_start_tags( $selected_style, $selected_column ) {
		if ( $selected_style == '1' || $selected_style == '2' || $selected_style == '3' ) {
			?>
				<div class="tp-few__container tp-few__container--style-<?php echo $selected_style; ?>">
				<div class="tp-few__wrapper tp-few__wrapper tp-few__wrapper--ver1 tp-few__wrapper--col-<?php echo $selected_column; ?>">
			<?php
		}

		if ( $selected_style == '4' || $selected_style == '5' || $selected_style == '6' || 
		$selected_style == '7' || $selected_style == '8' || $selected_style == '9' || $selected_style == '10') {
		?>
		<div class="no-touch">
			<div class="grid tp-few__container--style-<?php echo $selected_style; ?> tp-few__wrapper tp-few__wrapper--ver2 tp-few__wrapper--col-<?php echo $selected_column; ?>">
		<?php
		}

	}

	public function render_wrapper_end_tags( $selected_style ) {
		if ( $selected_style == '1' || $selected_style == '2' || $selected_style == '3' ) {
			?>
			</div>	
			</div>
			<?php
		}

		if ( $selected_style == '4' || $selected_style == '5' || $selected_style == '6' || 
		$selected_style == '7' || $selected_style == '8' || $selected_style == '9' || $selected_style == '10' ) {
			?>
		</div>	
		</div>
			<?php
		}

	}

	
}
