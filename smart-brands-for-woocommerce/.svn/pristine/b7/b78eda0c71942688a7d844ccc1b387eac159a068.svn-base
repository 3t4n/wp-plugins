<?php
/**
 * Product Loop or Shop Page tab.
 *
 * @since      1.0.0
 *
 * @package    smart_brands_for_wc
 * @subpackage smart_brands_for_wc/Admin/Settings
 * @author     ShapedPlugin<support@shapedplugin.com>
 */

namespace ShapedPlugin\SmartBrands\Admin\Settings;

use ShapedPlugin\SmartBrands\Admin\Framework\Classes\SPF_SMART_BRANDS;

// Cannot access directly.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * This class is responsible for product Loop/shop page tab in settings page.
 *
 * @since      1.0.0
 */
class LoopPage {

	/**
	 * Loop or shop page settings.
	 *
	 * @since 1.0.0
	 * @param string $prefix sp_smart_brand_settings.
	 */
	public static function section( $prefix ) {
		SPF_SMART_BRANDS::createSection(
			$prefix,
			array(
				'title'  => __( 'Shop Page Settings', 'smart-brands-for-woocommerce' ),
				'icon'   => 'sp_brand-icon-loop-page',
				'fields' => array(
					array(
						'id'         => 'enable_brand_in_loop_page',
						'type'       => 'switcher',
						'only_pro'   => true,
						'title'      => __( 'Brand on Product Shop Page', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Show/hide brand on the shop, category, tags, search pages.', 'smart-brands-for-woocommerce' ),
						'text_on'    => __( 'show', 'smart-brands-for-woocommerce' ),
						'text_off'   => __( 'hide', 'smart-brands-for-woocommerce' ),
						'default'    => true,
						'text_width' => 77,
					),
					array(
						'id'         => 'brand_position_in_loop_page',
						'type'       => 'select',
						'only_pro'   => true,
						'title'      => __( 'Brand Position on Product Shop Page', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Select a position for the brand on the shop, category, tags, search pages.', 'smart-brands-for-woocommerce' ),
						'title_help' => __( 'The position may not work if your shop page does not remain WooCommerce default hooks', 'smart-brands-for-woocommerce' ),
						'options'    => array(
							'after_price'       => __( 'After Price', 'smart-brands-for-woocommerce' ),
							'after_add_to_cart' => array(
								'text'     => __( 'After Add to Cart (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
						),
						'default'    => 'after_price',
						'dependency' => array( 'enable_brand_in_loop_page', '==', 'true' ),
					),
					array(
						'id'         => 'loop_product_brand_content',
						'type'       => 'select',
						'only_pro'   => true,
						'title'      => __( 'Brand Content on Shop Page', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Brand content on the shop, category, tags, search pages.', 'smart-brands-for-woocommerce' ),
						'options'    => array(
							'only_name'      => __( 'Only Name', 'smart-brands-for-woocommerce' ),
							'only_logo'      => array(
								'text'     => __( 'Only Logo (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
							'both_logo_name' => array(
								'text'     => __( 'Both Logo and Name (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
						),
						'default'    => 'only_name',
						'dependency' => array( 'enable_brand_in_loop_page', '==', 'true' ),
					),
					array(
						'id'         => 'sort_by_brand',
						'type'       => 'switcher',
						'only_pro'   => true,
						'class'      => 'brand_only_pro_switcher',
						'title'      => __( 'Sort by Brand', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Sort by brand on the loop or shop page.', 'smart-brands-for-woocommerce' ),
						'text_on'    => __( 'Enabled', 'smart-brands-for-woocommerce' ),
						'text_off'   => __( 'Disabled', 'smart-brands-for-woocommerce' ),
						'default'    => true,
						'text_width' => 96,
						'dependency' => array( 'enable_brand_in_loop_page', '==', 'true' ),
					),
					array(
						'id'         => 'brand_logo_size_in_loop_page',
						'type'       => 'image_sizes',
						'only_pro'   => true,
						'title'      => __( 'Brand Logo Size on Shop Page', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Set a size for the brand logo on the loop or shop page.', 'smart-brands-for-woocommerce' ),
						'chosen'     => true,
						'default'    => 'medium',
						'dependency' => array( 'enable_brand_in_loop_page', '==', 'true' ),
					),
					array(
						'type'    => 'submessage',
						'content' => sprintf(
							/* translators: %1$s: bold tag starts, %2$s: bold tag ends, %3$s: link tag starts %4$s: link tag ends %5$s: another link tag start %6$s: link tag ends */
							__( 'To showcase the brands effectively on the %3$sproduct shop page%4$s and grow sales, %5$sUpgrade to Pro!%6$s', 'smart-brands-for-woocommerce' ),
							'<strong>',
							'</strong>',
							'<a href="https://demo.shapedplugin.com/smart-brands-pro/" target="_blank"><strong>',
							'</strong></a>',
							'<a href="https://shapedplugin.com/smart-brands/?ref=1#pricing" target="_blank"><strong>',
							'</strong></a>'
						),
					),
				),
			)
		);
	}
}
