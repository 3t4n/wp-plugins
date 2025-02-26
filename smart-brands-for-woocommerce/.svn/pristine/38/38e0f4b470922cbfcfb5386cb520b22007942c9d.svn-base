<?php
/**
 * Typography tab.
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
 * This class is responsible for Typography tab in Smart Brand Views page.
 *
 * @since      2.0.0
 */
class Typography {

	/**
	 * Typography options.
	 *
	 * @since 2.0.0
	 * @param string $prefix sp_smart_brand_metaboxes.
	 */
	public static function section( $prefix ) {
		SPF_SMART_BRANDS::createSection(
			$prefix,
			array(
				'title'  => __( 'Typography', 'smart-brands-for-woocommerce' ),
				'icon'   => 'sp_brand-icon-typography',
				'fields' => array(
					array(
						'id'          => 'section_title_margin_around',
						'type'        => 'spacing',
						'title'       => __( 'Section Title Margin', 'smart-brands-for-woocommerce' ),
						'subtitle'    => __( 'Set margin for section title.', 'smart-brands-for-woocommerce' ),
						'output_mode' => 'margin',
						'units'       => array(
							esc_html__( 'px', 'smart-brands-for-woocommerce' ),
							esc_html__( 'em', 'smart-brands-for-woocommerce' ),
						),
						'default'     => array(
							'top'    => '0',
							'right'  => '0',
							'bottom' => '30',
							'left'   => '0',
							'unit'   => 'px',
						),
						'dependency'  => array( 'show_brand_section_title', '==', 'true', true ),
					),
					array(
						'id'       => 'brand_name_font_load',
						'class'    => 'csf_pro_option',
						'type'     => 'switcher',
						'title'    => __( 'Load Brand Name Font', 'smart-brands-for-woocommerce' ),
						'subtitle' => __( 'On/Off google font for Brand Name.', 'smart-brands-for-woocommerce' ),
						'default'  => false,
					),
					array(
						'id'            => 'brand_name_typography',
						'type'          => 'typography',
						'title'         => __( 'Brand Name', 'smart-brands-for-woocommerce' ),
						'class'         => 'advanced csf_typo_pro_option',
						'font-style'    => true,
						'margin_bottom' => false,
						'default'       => array(
							'font-family'        => '',
							'font-weight'        => '700',
							'font-style'         => 'normal',
							'color'              => '#2f2f2f',
							'hover_color'        => '#e1624b',
							'font-size'          => '16',
							'tablet-font-size'   => '15',
							'mobile-font-size'   => '16',
							'line-height'        => '21',
							'tablet-line-height' => '21',
							'mobile-line-height' => '20',
							'letter-spacing'     => '0',
							'text-align'         => 'center',
							'text-transform'     => 'none',
							'unit'               => 'px',
							'type'               => 'google',
						),
						// 'preview_text'  => __( '', 'smart-brands-for-woocommerce' ),
					),
					array(
						'id'       => 'brand_desc_font_load',
						'type'     => 'switcher',
						'class'    => 'csf_pro_option',
						'title'    => __( 'Load Brand Description Font', 'smart-brands-for-woocommerce' ),
						'subtitle' => __( 'On/Off google font for Brand description.', 'smart-brands-for-woocommerce' ),
						'default'  => false,
					),
					array(
						'id'          => 'brand_description_typography',
						'type'        => 'typography',
						'title'       => __( 'Brand Description', 'smart-brands-for-woocommerce' ),
						'class'       => 'advanced csf_typo_pro_option',
						'font-style'  => true,
						'hover_color' => true,
						'default'     => array(
							'font-family'        => '',
							'font-weight'        => '400',
							'font-style'         => 'normal',
							'color'              => '#555',
							'hover_color'        => '#e1624b',
							'font-size'          => '14',
							'tablet-font-size'   => '13',
							'mobile-font-size'   => '12',
							'line-height'        => '21',
							'tablet-line-height' => '18',
							'mobile-line-height' => '18',
							'letter-spacing'     => '0',
							'text-align'         => 'center',
							'text-transform'     => 'none',
							'unit'               => 'px',
							'type'               => 'google',
						),
						// 'preview_text'  => __( '', 'smart-brands-for-woocommerce' ),
						// 'dependency' => array( 'show_brand_description', '==', 'true', true ),
					),
				),
			)
		);
	}
}
