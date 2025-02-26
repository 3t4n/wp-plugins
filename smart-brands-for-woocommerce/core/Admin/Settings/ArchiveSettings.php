<?php
/**
 * Brand Single Archive Settings tab.
 *
 * @since      1.0.8
 *
 * @package    Smart_Brands_Pro
 * @subpackage Smart_Brands_Pro/Admin/Settings
 * @author     ShapedPlugin<support@shapedplugin.com>
 */

namespace ShapedPlugin\SmartBrands\Admin\Settings;

use ShapedPlugin\SmartBrands\Admin\Framework\Classes\SPF_SMART_BRANDS;


// Cannot access directly.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * This class is responsible for brand archive page in settings page.
 *
 * @since      1.0.0
 */
class ArchiveSettings {

	/**
	 * Archive page settings.
	 *
	 * @since 1.0.0
	 * @param string $prefix sp_smart_brand_settings.
	 */
	public static function section( $prefix ) {
		SPF_SMART_BRANDS::createSection(
			$prefix,
			array(
				'title'  => __( 'Brand Archive Page (Pro)', 'smart-brands-for-woocommerce' ),
				'icon'   => 'sp_brand-icon-resp-break',
				'fields' => array(
					array(
						'id'       => 'brand_description',
						'type'     => 'select',
						'only_pro' => true,
						'title'    => __( 'Brand Description Position', 'smart-brands-for-woocommerce' ),
						'subtitle' => __( 'select a position for the brand description in archive page.', 'smart-brands-for-woocommerce' ),
						'options'  => array(
							'after_product_loop'  => array(
								'text'     => __( 'After Product Loop (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
							'before_product_loop' => array(
								'text'     => __( 'Before Product Loop (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
							'hide'                => array(
								'text'     => __( 'Hide (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
						),
						'default'  => 'after_product_loop',
					),
					array(
						'id'       => 'brand_banner',
						'type'     => 'select',
						'only_pro' => true,
						'title'    => __( 'Brand Banner Position', 'smart-brands-for-woocommerce' ),
						'subtitle' => __( 'select a position for the brand banner in archive page.', 'smart-brands-for-woocommerce' ),
						'options'  => array(
							'before_product_loop' => array(
								'text'     => __( 'Before Product Loop (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
							'after_product_loop'  => array(
								'text'     => __( 'After Product Loop (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
							'hide'                => array(
								'text'     => __( 'Hide (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
						),
						'default'  => 'before_product_loop',
					),
					array(
						'id'       => 'brand_page',
						'type'     => 'select',
						'only_pro' => true,
						'title'    => __( 'Brand Page', 'smart-brands-for-woocommerce' ),
						'subtitle' => __( 'select a brand breadcrumbs.', 'smart-brands-for-woocommerce' ),
						'options'  => array(
							'sample_page' => array(
								'text'     => __( 'Sample Page (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
							'-'           => array(
								'text'     => __( ' - (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
							'cart'        => array(
								'text'     => __( 'Cart (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
							'my_account'  => array(
								'text'     => __( 'My Account (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
							'shop'        => array(
								'text'     => __( 'Shop (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
							'Checkout'    => array(
								'text'     => __( 'Checkout (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
						),
						'default'  => 'sample_page',
					),
					array(
						'type'    => 'submessage',
						'content' => sprintf(
							/* translators: 1: start link tag, 2: close tag. */
							__( '%1$sUpgrade to Pro%2$s, To access the brand archive page\'s powerful settings!', 'smart-brands-for-woocommerce' ),
							'<strong><a target="_blank" href="https://shapedplugin.com/smart-brands/?ref=1#pricing">',
							'</a></strong>'
						),
					),
				),
			)
		);
	}
}
