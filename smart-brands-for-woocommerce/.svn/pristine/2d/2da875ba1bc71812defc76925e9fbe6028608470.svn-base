<?php
/**
 * Layouts tab.
 *
 * @since      2.0.0
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
 * This class is responsible for the layouts of the views options.
 *
 * @since      2.0.0
 */
class Layouts {

	/**
	 * Layouts configuration.
	 *
	 * @since 2.0.0
	 * @param string $prefix sp_smart_brand_metaboxes.
	 */
	public static function section( $prefix ) {
		SPF_SMART_BRANDS::createSection(
			$prefix,
			array(
				'fields' => array(
					array(
						'type'  => 'heading',
						'class' => 'smart-brand-options-header',
						'after' => '<i class="fa fa-life-ring"></i> Support',
						'link'  => 'https://shapedplugin.com/support/',
						'image' => SMART_BRANDS_URL . '/core/Admin/assets/img/logo.svg',
					),
					array(
						'id'      => 'brand_layout_preset',
						'type'    => 'layout_preset',
						'class'   => 'smart_brands_layout_presets active-indicator',
						'title'   => __( 'Layout Preset', 'smart-brands-for-woocommerce' ),
						'options' => array(
							'carousel_layout' => array(
								'image'           => SMART_BRANDS_URL . '/core/Admin/assets/img/layouts/carousel.svg',
								'text'            => __( 'Carousel', 'smart-brands-for-woocommerce' ),
								'option_demo_url' => 'https://demo.shapedplugin.com/smart-brands-pro/carousel/',
							),
							'grid_layout'     => array(
								'image'           => SMART_BRANDS_URL . '/core/Admin/assets/img/layouts/grid.svg',
								'text'            => __( 'Grid', 'smart-brands-for-woocommerce' ),
								'option_demo_url' => 'https://demo.shapedplugin.com/smart-brands-pro/grid/',
							),
							'carousel_ticker' => array(
								'image'           => SMART_BRANDS_URL . '/core/Admin/assets/img/layouts/ticker.svg',
								'text'            => __( 'Ticker', 'smart-brands-for-woocommerce' ),
								'option_demo_url' => 'https://demo.shapedplugin.com/smart-brands-pro/ticker/',
								'pro_only'        => true,
							),
							'multi_row'       => array(
								'image'           => SMART_BRANDS_URL . '/core/Admin/assets/img/layouts/multi-row-carousel.svg',
								'text'            => __( 'Multi-row', 'smart-brands-for-woocommerce' ),
								'option_demo_url' => 'https://demo.shapedplugin.com/smart-brands-pro/multi-row/',
								'pro_only'        => true,
							),
							'a_to_z_filter'   => array(
								'image'           => SMART_BRANDS_URL . '/core/Admin/assets/img/layouts/a-z-filtering.svg',
								'text'            => __( 'A-Z Filters', 'smart-brands-for-woocommerce' ),
								'option_demo_url' => 'https://demo.shapedplugin.com/smart-brands-pro/a-z-filtering/',
								'pro_only'        => true,
							),
							'inline_layout'   => array(
								'image'           => SMART_BRANDS_URL . '/core/Admin/assets/img/layouts/inline.svg',
								'text'            => __( 'Inline', 'smart-brands-for-woocommerce' ),
								'option_demo_url' => 'https://demo.shapedplugin.com/smart-brands-pro/inline/',
								'pro_only'        => true,
							),
							'list_layout'     => array(
								'image'           => SMART_BRANDS_URL . '/core/Admin/assets/img/layouts/list.svg',
								'text'            => __( 'List', 'smart-brands-for-woocommerce' ),
								'option_demo_url' => 'https://demo.shapedplugin.com/smart-brands-pro/list/',
								'pro_only'        => true,
							),
						),
						'default' => 'carousel_layout',
					),
					array(
						'type'    => 'notice',
						'style'   => 'normal',
						'class'   => 'layout-notice',
						'content' => sprintf(
							/* translators: %1$s: strong tag starts , %2$s: link tag starts %3$s: link tag and strong tag end . %4$s: another link tag starts %5$s: link tag ends. */
							__(
								'Want to unleash your creativity with beautiful %1$slayouts%2$s and design freedom? %3$sGet Pro Now!%4$s',
								'smart-brands-for-woocommerce'
							),
							'<strong><a href="https://demo.shapedplugin.com/smart-brands-pro/brand-showcase/" target="_blank">',
							'</a></strong>',
							'<strong><a target="_blank" href="https://shapedplugin.com/smart-brands/?ref=1#pricing">',
							'</a></strong>',
						),
					),
				),
			)
		);
	}
}
