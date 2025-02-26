<?php
/**
 * General tab.
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
 * This class is responsible for General tab in Smart Brand Views page.
 *
 * @since      1.0.0
 */
class General {

	/**
	 * General settings.
	 *
	 * @since 1.0.0
	 * @param string $prefix sp_smart_brand_metaboxes.
	 */
	public static function section( $prefix ) {
		SPF_SMART_BRANDS::createSection(
			$prefix,
			array(
				'title'  => __( 'General Settings', 'smart-brands-for-woocommerce' ),
				'icon'   => 'sp_brand-icon-general',
				'fields' => array(
					array(
						'id'         => 'number_of_column',
						'type'       => 'column',
						'title'      => __( 'Columns', 'smart-brands-for-woocommerce' ),
						'title_help' => sprintf(
							/* translators: %1$s: icon and strong tag start, %2$s: strong tag ends, %3$s: icon and strong tag start %4$s: icon and strong tag start %5$s: icon and strong tag start %6$s: icon and strong tag start */
							__( '%1$sLarge Desktop%2$s - is larger than 1200px,%3$sDesktop%2$s - size is larger than 992px,%4$sLaptop%2$s - size is larger than 768,%5$sTablet%2$s- size is larger than 600px,%6$sMobile%2$s - size is smaller than 599px.', 'smart-brands-for-woocommerce' ),
							'<i class="fa fa-television"></i> <strong>',
							'</strong>',
							'<br><i class="fa fa-desktop"></i> <strong>',
							'<br> <i class="fa fa-laptop"></i> <strong>',
							'<br> <i class="fa fa-tablet"></i> <strong>',
							'<br> <i class="fa fa-mobile"></i> <strong>',
						),
						'subtitle'   => __( 'Set number of row in different devices for responsive view.', 'smart-brands-for-woocommerce' ),
						'default'    => array(
							'large_desktop' => '4',
							'desktop'       => '4',
							'laptop'        => '3',
							'tablet'        => '2',
							'mobile'        => '1',
						),
						'min'        => '1',
					),
					array(
						'id'          => 'space_between_brands',
						'type'        => 'spacing',
						'title'       => __( 'Space Between Brands', 'smart-brands-for-woocommerce' ),
						'subtitle'    => __( 'Set space in pixel between brands.', 'smart-brands-for-woocommerce' ),
						'output_mode' => 'margin',
						'all'         => true,
						'all_text'    => false,
						'all_icon'    => '<i class="fa fa-arrows-h"></i>',
						'units'       => array(
							esc_html__( 'px', 'smart-brands-for-woocommerce' ),
						),
						'default'     => array(
							'all'  => '15',
							'unit' => 'px',
						),
					),
					array(
						'id'       => 'show_brands_from',
						'type'     => 'select',
						'title'    => __( 'Filter Brands', 'smart-brands-for-woocommerce' ),
						'subtitle' => __( 'Select an option to display by filtering brands.', 'smart-brands-for-woocommerce' ),
						'only_pro' => true,
						'options'  => array(
							'latest'   => __( 'All', 'smart-brands-for-woocommerce' ),
							'specific' => array(
								'text'     => __( 'Specific (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
							'exclude'  => array(
								'text'     => __( 'Exclude (Pro)', 'smart-brands-for-woocommerce' ),
								'pro_only' => true,
							),
						),
						'default'  => 'latest',
					),
					array(
						'id'         => 'show_brand_product_count',
						'type'       => 'switcher',
						'title'      => __( 'Product Count', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'It shows the number of products associated with each brand.', 'smart-brands-for-woocommerce' ),
						'title_help' => __( 'It shows the number of products associated with each brand.', 'smart-brands-for-woocommerce' ),
						'text_on'    => __( 'Enabled', 'smart-brands-for-woocommerce' ),
						'text_off'   => __( 'Disabled', 'smart-brands-for-woocommerce' ),
						'default'    => false,
						'text_width' => 100,
					),
					array(
						'id'       => 'hide_brand_without_product',
						'type'     => 'checkbox',
						'only_pro' => true,
						'class'    => 'csf_pro_option',
						'title'    => __( 'Hide Empty Brands', 'smart-brands-for-woocommerce' ),
						'subtitle' => __( 'Check to hide the brands those don\'t have any product (Pro).', 'smart-brands-for-woocommerce' ),
						'default'  => false,
					),
					array(
						'id'       => 'hide_brand_without_logo',
						'type'     => 'checkbox',
						'only_pro' => true,
						'class'    => 'csf_pro_option',
						'title'    => __( 'Hide Brands Without Logo', 'smart-brands-for-woocommerce' ),
						'subtitle' => __( 'Check to hide brands those don\'t have any logo (Pro).', 'smart-brands-for-woocommerce' ),
					),
					array(
						'id'       => 'order_by',
						'type'     => 'select',
						'title'    => __( 'Order By', 'smart-brands-for-woocommerce' ),
						'subtitle' => __( 'Select an order by option.', 'smart-brands-for-woocommerce' ),
						'options'  => array(
							'rand' => __( 'Random', 'smart-brands-for-woocommerce' ),
							'date' => __( 'Date', 'smart-brands-for-woocommerce' ),
							'name' => __( 'Name', 'smart-brands-for-woocommerce' ),
						),
						'default'  => 'menu_order',
					),
					array(
						'id'         => 'order',
						'type'       => 'select',
						'title'      => __( 'Order', 'smart-brands-for-woocommerce' ),
						'options'    => array(
							'ASC'  => __( 'Ascending', 'smart-brands-for-woocommerce' ),
							'DESC' => __( 'Descending', 'smart-brands-for-woocommerce' ),
						),
						'default'    => 'DESC',
						'subtitle'   => __( 'Select an order option.', 'smart-brands-for-woocommerce' ),
						'dependency' => array( 'order_by', '!=', 'rand', true ),
					),
					array(
						'id'         => 'enable_preloader',
						'type'       => 'switcher',
						'title'      => __( 'Preloader', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Smart brands will be hidden until page load completed and ajax pagination.', 'smart-brands-for-woocommerce' ),
						'text_on'    => __( 'Enabled', 'smart-brands-for-woocommerce' ),
						'text_off'   => __( 'Disabled', 'smart-brands-for-woocommerce' ),
						'text_width' => 100,
						'default'    => true,
					),
					array(
						'id'      => 'brand_section_ajax_live_filter',
						'type'    => 'subheading',
						'content' => __( 'Ajax A-Z Live Filters (Pro)', 'smart-brands-for-woocommerce' ),
					),
					array(
						'type'    => 'notice',
						'style'   => 'normal',
						'class'   => 'brands-live-filter-notice',
						'content' => sprintf(
							/* translators: %1$s: bold tag starts, %2$s: bold tag ends, %3$s: link tag starts %4$s: link tag ends %5$s: another link tag start %6$s: link tag ends */
							__(
								'To let your visitors filter brands by %3$sA-Z filter%4$s with various filter button styles, %5$sUpgrade to Pro%6$s.',
								'smart-brands-for-woocommerce'
							),
							'<strong>',
							'</strong>',
							'<a href="https://demo.shapedplugin.com/smart-brands-pro/a-z-filtering/" target="_blank"><strong>',
							'</strong></a>',
							'<a href="https://shapedplugin.com/smart-brands/?ref=1#pricing" target="_blank"><strong>',
							'</strong></a>'
						),
						// 'dependency' => array( 'brand_live_filter', '==', 'true', true ),
					),
					array(
						'id'         => 'brand_live_filter',
						'class'      => 'brand-a-to-z-filter',
						'type'       => 'switcher',
						'only_pro'   => true,
						'title'      => __( 'Ajax A-Z Live Filters', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Enable ajax live filter to navigate brands through the A-Z alphabetical filters.', 'smart-brands-for-woocommerce' ),
						'text_on'    => __( 'Enabled', 'smart-brands-for-woocommerce' ),
						'text_off'   => __( 'Disabled', 'smart-brands-for-woocommerce' ),
						'default'    => false,
						'text_width' => 100,
					),
					array(
						'id'         => 'brand_filter_button_type',
						'type'       => 'layout_preset',
						'class'      => 'csf_pro_option',
						'only_pro'   => true,
						'title'      => __( 'Filter Type', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Choose a filter button type.', 'smart-brands-for-woocommerce' ),
						'options'    => array(
							'button'   => array(
								'image' => SMART_BRANDS_URL . '/core/Admin/assets/img/filter-type/button.svg',
								'text'  => __( 'Button', 'smart-brands-for-woocommerce' ),
							),
							'dropdown' => array(
								'image' => SMART_BRANDS_URL . '/core/Admin/assets/img/filter-type/dropdown.svg',
								'text'  => __( 'Dropdown', 'smart-brands-for-woocommerce' ),
							),
						),
						'default'    => 'button',
						'dependency' => array( 'brand_live_filter', '==', 'true', true ),
					),
					array(
						'id'         => 'brand_all_tab',
						'type'       => 'switcher',
						'only_pro'   => true,
						'class'      => 'ajax-filter-options csf_pro_option',
						'title'      => __( '"All" Tab', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Show/Hide "All" tab.', 'smart-brands-for-woocommerce' ),
						'default'    => true,
						'text_on'    => __( 'Show', 'smart-brands-for-woocommerce' ),
						'text_off'   => __( 'Hide', 'smart-brands-for-woocommerce' ),
						'text_width' => 80,
						'dependency' => array( 'brand_live_filter', '==', 'true', true ),
					),
					array(
						'id'         => 'brand_all_tab_text',
						'type'       => 'text',
						'only_pro'   => true,
						'class'      => 'brand_all_tab_text ajax-filter-options csf_pro_option',
						'title'      => __( '"All" Tab Label', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Set "All" tab label text.', 'smart-brands-for-woocommerce' ),
						'default'    => 'All',
						'dependency' => array( 'brand_live_filter|brand_all_tab', '==|==', 'true|true', true ),
					),
					array(
						'id'         => 'filter_btn_align',
						'class'      => 'filter_align ajax-filter-options csf_pro_option',
						'type'       => 'button_set',
						'only_pro'   => true,
						'title'      => __( 'Alignment', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Choose filter button alignment.', 'smart-brands-for-woocommerce' ),
						'options'    => array(
							'left'   => '<i class="fa fa-align-left" title="Left"></i>',
							'center' => '<i class="fa fa-align-center" title="Center"></i>',
							'right'  => '<i class="fa fa-align-right" title="Right"></i>',
						),
						'default'    => 'center',
						'dependency' => array( 'brand_live_filter', '==', 'true', true ),
					),
					array(
						'id'         => 'brand_filter_button_color',
						'type'       => 'color_group',
						'only_pro'   => true,
						'title'      => __( 'Color', 'smart-brands-for-woocommerce' ),
						'subtitle'   => __( 'Set filter button color.', 'smart-brands-for-woocommerce' ),
						'class'      => 'ajax-filter-options csf_pro_option',
						'options'    => array(
							'color1' => __( 'Color', 'smart-brands-for-woocommerce' ),
							'color2' => __( 'Hover Color', 'smart-brands-for-woocommerce' ),
							'color3' => __( 'Background', 'smart-brands-for-woocommerce' ),
							'color4' => __( 'Hover Background', 'smart-brands-for-woocommerce' ),
						),
						'default'    => array(
							'color1' => '#444444',
							'color2' => '#ffffff',
							'color3' => '#e2e2e2',
							'color4' => '#513880',
						),
						'dependency' => array( 'brand_live_filter|brand_filter_button_type', '==|==', 'true|button', true ),
					),
					array(
						'id'          => 'brand_filter_button_border',
						'type'        => 'border',
						'only_pro'    => true,
						'class'       => 'ajax-filter-options csf_pro_option',
						'title'       => __( 'Border', 'smart-brands-for-woocommerce' ),
						'subtitle'    => __( 'Set filter button border.', 'smart-brands-for-woocommerce' ),
						'default'     => array(
							'all'         => '0',
							'style'       => 'solid',
							'color'       => '#444444',
							'hover_color' => '#513880',
							'radius'      => '2',
						),
						'all'         => true,
						'hover_color' => true,
						'radius'      => true,
						'dependency'  => array( 'brand_live_filter|brand_filter_button_type', '==|==', 'true|button', true ),
					),
				),
			)
		);
	}
}
