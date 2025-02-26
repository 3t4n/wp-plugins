<?php
/**
 * Display tab.
 *
 * @since      1.0.0
 *
 * @package    smart_brands_for_wc
 * @subpackage smart_brands_for_wc/Admin/Views
 * @author     ShapedPlugin<support@shapedplugin.com>
 */

namespace ShapedPlugin\SmartBrands\Admin\Views;

use ShapedPlugin\SmartBrands\Admin\Framework\Classes\SPF_SMART_BRANDS;

// Cannot access directly.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * This class is responsible for Display options tab in Smart Brand Views page.
 *
 * @since      1.0.0
 */
class Display {

	/**
	 * Display settings.
	 *
	 * @since 1.0.0
	 * @param string $prefix sp_smart_brand_metaboxes.
	 */
	public static function section( $prefix ) {
		SPF_SMART_BRANDS::createSection(
			$prefix,
			array(
				'title'  => __( 'Display Settings', 'smart-brands-for-woocommerce' ),
				'icon'   => 'sp_brand-icon-display-settings',
				'fields' => array(
					array(
						'id'         => 'show_brand_section_title',
						'type'       => 'switcher',
						'title'      => __( 'Brand Section Title', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Show/Hide Brand section title.', 'smart-brands-for-woocommerce' ),
						'text_on'    => __( 'Show', 'smart-brands-for-woocommerce' ),
						'text_off'   => __( 'Hide', 'smart-brands-for-woocommerce' ),
						'default'    => true,
						'text_width' => 75,
					),
					array(
						'id'         => 'show_brand_logo',
						'type'       => 'switcher',
						'title'      => __( 'Brand Logo', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Show/Hide Brand Logo.', 'smart-brands-for-woocommerce' ),
						'text_on'    => __( 'Show', 'smart-brands-for-woocommerce' ),
						'text_off'   => __( 'Hide', 'smart-brands-for-woocommerce' ),
						'default'    => true,
						'text_width' => 75,
					),
					array(
						'id'         => 'show_brand_name',
						'type'       => 'switcher',
						'only_pro'   => true,
						'class'      => 'brand_only_pro_switcher',
						'title'      => __( 'Brand Name', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Show/Hide Brand Name.', 'smart-brands-for-woocommerce' ),
						'text_on'    => __( 'Show', 'smart-brands-for-woocommerce' ),
						'text_off'   => __( 'Hide', 'smart-brands-for-woocommerce' ),
						'default'    => true,
						'text_width' => 75,
					),
					array(
						'id'         => 'show_brand_description',
						'type'       => 'switcher',
						'only_pro'   => true,
						'class'      => 'brand_only_pro_switcher',
						'title'      => __( 'Brand Description', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Show/Hide Brand Description.', 'smart-brands-for-woocommerce' ),
						'text_on'    => __( 'Show', 'smart-brands-for-woocommerce' ),
						'text_off'   => __( 'Hide', 'smart-brands-for-woocommerce' ),
						'default'    => true,
						'text_width' => 75,
					),
					array(
						'id'         => 'brand_content_position',
						'type'       => 'layout_preset',
						'only_pro'   => true,
						'class'      => 'sbfw_content_position_img_width',
						'title'      => __( 'Brands Content Position', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Select a position for the brands.', 'smart-brands-for-woocommerce' ),
						'desc'       => sprintf(
							/* translators: 1: start link tag, 2: close tag. */
							__( 'To display the brand\'s various content positions, including names and descriptions, %1$sUpgrade to Pro!%2$s', 'smart-brands-for-woocommerce' ),
							'<strong><a target="_blank" href="https://shapedplugin.com/smart-brands/?ref=1#pricing">',
							'</a></strong>'
						),
						'options'    => array(
							'top-thumb'    => array(
								'image' => SMART_BRANDS_URL . '/core/Admin/assets/img/content-positions/top.svg',
								'text'  => __( 'Top', 'smart-brands-for-woocommerce' ),
							),
							'bottom-thumb' => array(
								'image'    => SMART_BRANDS_URL . '/core/Admin/assets/img/content-positions/bottom.svg',
								'text'     => __( 'Bottom', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
							'left-thumb'   => array(
								'image'    => SMART_BRANDS_URL . '/core/Admin/assets/img/content-positions/left.svg',
								'text'     => __( 'Left', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
							'right-thumb'  => array(
								'image'    => SMART_BRANDS_URL . '/core/Admin/assets/img/content-positions/right.svg',
								'text'     => __( 'Right', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
						),
						'default'    => 'top-thumb',
						'dependency' => array( 'brand_layout_preset', '!=', 'list_layout', true ),
					),
					array(
						'id'       => 'brand_vertical_alignment',
						'type'     => 'layout_preset',
						'class'    => 'sbfw_content_position_img_width',
						'title'    => __( 'Vertical Alignment', 'smart-brands-for-woocommerce' ),
						'subtitle' => __( 'Set vertical alignment', 'smart-brands-for-woocommerce' ),
						'options'  => array(
							'start'  => array(
								'image' => SMART_BRANDS_URL . '/core/Admin/assets/img/content-positions/vert-align-top.svg',
								'text'  => __( 'Top', 'smart-brands-for-woocommerce' ),
							),
							'center' => array(
								'image' => SMART_BRANDS_URL . '/core/Admin/assets/img/content-positions/vert-align-middle.svg',
								'text'  => __( 'Middle', 'smart-brands-for-woocommerce' ),
							),
							'end'    => array(
								'image' => SMART_BRANDS_URL . '/core/Admin/assets/img/content-positions/vert-align-bottom.svg',
								'text'  => __( 'Bottom', 'smart-brands-for-woocommerce' ),
							),
						),
						'default'  => 'center',
					),
					array(
						'id'         => 'product_brand_border',
						'type'       => 'border',
						'title'      => __( 'Border', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Set border for Product brand.', 'smart-brands-for-woocommerce' ),
						'all'        => true,
						'radius'     => true,
						'show_units' => true,
						'default'    => array(
							'all'         => '0',
							'style'       => 'solid',
							'color'       => '#ddd',
							'hover_color' => '#ddd',
							'radius'      => '0',
							'unit'        => 'px',
						),
						'units'      => array( 'px', '%' ),
					),
					array(
						'id'         => 'product_brands_inner_padding',
						'type'       => 'spacing',
						'title'      => __( 'Items Inner Padding', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Set items inner padding for the brands.', 'smart-brands-for-woocommerce' ),
						'style'      => false,
						'color'      => false,
						'all'        => false,
						'units'      => array( 'px' ),
						'default'    => array(
							'top'    => '0',
							'right'  => '0',
							'bottom' => '0',
							'left'   => '0',
						),
						'attributes' => array(
							'min' => 0,
						),
					),
					/**
					 * Pagination section.
					 */
					array(
						'type'       => 'subheading',
						'content'    => __( 'Ajax Pagination (PRO)', 'smart-brands-for-woocommerce' ),
						'dependency' => array( 'brand_layout_preset', '!=', 'carousel_layout', true ),
					),
					array(
						'id'         => 'brand_grid_pagination',
						'type'       => 'switcher',
						'only_pro'   => true,
						'class'      => 'brand_only_pro_switcher',
						'title'      => __( 'Pagination', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Enable/Disable pagination.', 'smart-brands-for-woocommerce' ),
						'text_on'    => __( 'Enabled', 'smart-brands-for-woocommerce' ),
						'text_off'   => __( 'Disabled', 'smart-brands-for-woocommerce' ),
						'text_width' => 95,
						'default'    => false,
						'dependency' => array( 'brand_layout_preset|brand_grid_pagination', '!=|==', 'carousel_layout', true ),
					),
					array(
						'id'         => 'brand_pagination_type',
						'type'       => 'radio',
						'only_pro'   => true,
						'class'      => 'csf_pro_option',
						'title'      => __( 'Pagination Type', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Choose a pagination type.', 'smart-brands-for-woocommerce' ),
						'options'    => array(
							'ajax_load_more'  => __( 'Load More Button (Ajax)', 'smart-brands-for-woocommerce' ),
							'infinite_scroll' => __( 'Infinite Scroll (Ajax)', 'smart-brands-for-woocommerce' ),
						),
						'default'    => 'ajax_load_more',
						'dependency' => array( 'brand_layout_preset', '!=', 'carousel_layout', true ),
					),
					array(
						'id'         => 'brand_per_page',
						'type'       => 'spinner',
						'only_pro'   => true,
						'class'      => 'csf_pro_option',
						'title'      => __( 'Item(s) To Show Per page', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Set item(s) to show per page.', 'smart-brands-for-woocommerce' ),
						'default'    => '8',
						'min'        => 1,
						'max'        => 10000,
						'dependency' => array( 'brand_layout_preset', '!=', 'carousel_layout', true ),
					),
					array(
						'id'         => 'brand_load_more_label',
						'type'       => 'text',
						'only_pro'   => true,
						'class'      => 'csf_pro_option',
						'title'      => __( 'Load more button label', 'smart-brands-for-woocommerce' ),
						'default'    => __( 'Load More', 'smart-brands-for-woocommerce' ),
						'dependency' => array( 'brand_layout_preset', '!=', 'carousel_layout', true ),
					),
				),
			)
		);
	}
}
