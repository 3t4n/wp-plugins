<?php
/**
 * Carousel Controls tab.
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
class Carousel {

	/**
	 * Carousel settings.
	 *
	 * @since 1.0.0
	 * @param string $prefix sp_smart_brand_metaboxes.
	 */
	public static function section( $prefix ) {
		SPF_SMART_BRANDS::createSection(
			$prefix,
			array(
				'title'  => __( 'Carousel Settings', 'smart-brands-for-woocommerce' ),
				'icon'   => 'sp_brand-icon-carousel-settings',
				'fields' => array(
					array(
						'type'  => 'tabbed',
						'class' => 'spf-carousel-sub-tab-section',
						'tabs'  => array(
							array(
								'title'  => __( 'Carousel Controls', 'smart-brands-for-woocommerce' ),
								'icon'   => 'spf-smart-brands--icon sp_brand-icon-basic',
								'fields' => array(
									array(
										'id'         => 'carousel_autoplay',
										'type'       => 'switcher',
										'title'      => __( 'AutoPlay', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Enable/Disable auto play.', 'smart-brands-for-woocommerce' ),
										'text_on'    => __( 'Enabled', 'smart-brands-for-woocommerce' ),
										'text_off'   => __( 'Disabled', 'smart-brands-for-woocommerce' ),
										'text_width' => 96,
										'default'    => 'true',
										'dependency' => array( 'brand_layout_preset', 'any', 'carousel_layout,multi_row', true ),
									),
									array(
										'id'         => 'carousel_autoplay_speed',
										'type'       => 'slider',
										'title'      => __( 'AutoPlay Delay Time', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Set autoplay delay time in millisecond.', 'smart-brands-for-woocommerce' ),
										'title_help' => '<div class="sp_brand-info-label">AutoPlay Delay Time</div><div class="sp_brand-short-content">Set autoplay delay or interval time. The amount of time to delay between automatically cycling a brand. e.g. 1000 miliseconds(ms) = 1 second. </div>',
										'unit'       => __( 'ms', 'smart-brands-for-woocommerce' ),
										'step'       => 100,
										'min'        => 100,
										'max'        => 50000,
										'default'    => 2000,
										'dependency' => array( 'carousel_autoplay|brand_layout_preset', '==|any', 'true|carousel_layout,multi_row', true ),
									),
									array(
										'id'         => 'carousel_ticker_sliding_speed',
										'type'       => 'slider',
										'title'      => __( 'Sliding Speed', 'smart-brands-for-woocommerce' ),
										'title_help' => '<div class="sp_brand-info-label">Sliding Speed</div><div class="sp_brand-short-content">Set sliding speed. e.g. 1000 milliseconds(ms) = 1 second. </div>',
										'subtitle'   => __( 'Set sliding speed in millisecond.', 'smart-brands-for-woocommerce' ),
										'unit'       => __( 'ms', 'smart-brands-for-woocommerce' ),
										'step'       => 50,
										'min'        => 100,
										'max'        => 20000,
										'default'    => 2000,
										'dependency' => array( 'brand_layout_preset', '==', 'carousel_ticker', true ),
									),
									array(
										'id'         => 'carousel_sliding_speed',
										'type'       => 'slider',
										'title'      => __( 'Sliding Speed', 'smart-brands-for-woocommerce' ),
										'title_help' => '<div class="sp_brand-info-label">Sliding Speed</div><div class="sp_brand-short-content">Set sliding speed. e.g. 1000 milliseconds(ms) = 1 second. </div>',
										'subtitle'   => __( 'Set carousel scroll speed in millisecond.', 'smart-brands-for-woocommerce' ),
										'step'       => 50,
										'min'        => 100,
										'max'        => 20000,
										'default'    => 400,
										'unit'       => 'ms',
										'dependency' => array( 'brand_layout_preset', 'any', 'carousel_layout,multi_row', true ),
									),
									array(
										'id'         => 'carousel_pause_on_hover',
										'type'       => 'switcher',
										'title'      => __( 'Pause on Hover', 'smart-brands-for-woocommerce' ),
										'subtile'    => __( 'Enable/Disable carousel pause on hover.', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Enable/Disable Pause on Hover.', 'smart-brands-for-woocommerce' ),
										'text_on'    => __( 'Enabled', 'smart-brands-for-woocommerce' ),
										'text_off'   => __( 'Disabled', 'smart-brands-for-woocommerce' ),
										'text_width' => 96,
										'default'    => 'true',
									),
									array(
										'id'         => 'carousel_infinite_loop',
										'type'       => 'switcher',
										'title'      => __( 'Infinite Loop', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Enable/Disable Infinite Loop.', 'smart-brands-for-woocommerce' ),
										'text_on'    => __( 'Enabled', 'smart-brands-for-woocommerce' ),
										'text_off'   => __( 'Disabled', 'smart-brands-for-woocommerce' ),
										'text_width' => 96,
										'default'    => 'false',
										'dependency' => array( 'brand_layout_preset', '==', 'carousel_layout', true ),
									),
									// array(
									// 'id'         => 'carousel_row',
									// 'type'       => 'column',
									// 'class'      => 'csf_pro_option',
									// 'title'      => __( 'Carousel Row', 'smart-brands-for-woocommerce' ),
									// 'subtitle'   => __( 'Set number of rows in different devices for responsive view.', 'smart-brands-for-woocommerce' ),
									// 'default'    => array(
									// 'large_desktop' => '1',
									// 'desktop' => '1',
									// 'laptop'  => '1',
									// 'tablet'  => '1',
									// 'mobile'  => '1',
									// ),
									// 'dependency' => array( 'brand_layout_preset', 'any', 'carousel_layout,multi_row', true ),
									// ),.
									array(
										'id'       => 'carousel_direction',
										'type'     => 'button_set',
										'title'    => __( 'Carousel Direction', 'smart-brands-for-woocommerce' ),
										'subtitle' => __( 'Set a carousel direction as you need.', 'smart-brands-for-woocommerce' ),
										'options'  => array(
											'rtl' => __( 'Right to Left', 'smart-brands-for-woocommerce' ),
											'ltr' => __( 'Left to Right', 'smart-brands-for-woocommerce' ),
										),
										'default'  => 'ltr',
									),
									array(
										'id'         => 'fade_carousel',
										'type'       => 'switcher',
										'class'      => 'brand_only_pro_switcher',
										'title'      => __( 'Fade Effect', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Enable/Disable fade effect for the carousel.', 'smart-brands-for-woocommerce' ),
										'text_on'    => __( 'Enabled', 'smart-brands-for-woocommerce' ),
										'text_off'   => __( 'Disabled', 'smart-brands-for-woocommerce' ),
										'only_pro'   => true,
										'text_width' => 100,
										'default'    => false,
										'dependency' => array( 'brand_layout_preset', 'any', 'carousel_layout,multi_row', true ),
									),
								),
							),
							array(
								'title'  => __( 'Navigation', 'smart-brands-for-woocommerce' ),
								'icon'   => 'spf-smart-brands--icon sp_brand-icon-navigation',
								'fields' => array(
									array(
										'id'         => 'brands_carousel_navigation',
										'class'      => 'brands-navigation-and-pagination-style',
										'type'       => 'fieldset',
										'fields'     => array(
											array(
												'id'       => 'carousel_navigation',
												'type'     => 'switcher',
												'title'    => __( 'Navigation', 'smart-brands-for-woocommerce' ),
												'class'    => 'brands_navigation',
												'subtitle' => __( 'Show/hide navigation.', 'smart-brands-for-woocommerce' ),
												'text_on'  => __( 'Show', 'smart-brands-for-woocommerce' ),
												'text_off' => __( 'Hide', 'smart-brands-for-woocommerce' ),
												'text_width' => 77,
												'default'  => true,
												'dependency' => array( 'brand_layout_preset', 'any', 'carousel_layout,multi_row', true ),
											),
											array(
												'id'      => 'hide_on_mobile',
												'type'    => 'checkbox',
												'class'   => 'brands_hide_on_mobile',
												'title'   => __( 'Hide on Mobile', 'smart-brands-for-woocommerce' ),
												'default' => false,
												'dependency' => array( 'carousel_navigation|brand_layout_preset', '==|any', 'true|carousel_layout,multi_row', true ),
											),
										),
										'dependency' => array( 'brand_layout_preset', 'any', 'carousel_layout,multi_row', true ),
									),
									array(
										'id'         => 'carousel_nav_position',
										'type'       => 'select',
										'preview'    => true,
										'class'      => 'sp_brand-carousel-nav-position',
										'title'      => __( 'Position', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Select a position of the navigation arrows.', 'smart-brands-for-woocommerce' ),
										'options'    => array(
											'top_right'    => __( 'Top Right', 'smart-brands-for-woocommerce' ),
											'top_center'   => __( 'Top Center', 'smart-brands-for-woocommerce' ),
											'top_left'     => __( 'Top Left', 'smart-brands-for-woocommerce' ),
											'bottom_left'  => __( 'Bottom Left', 'smart-brands-for-woocommerce' ),
											'bottom_center' => __( 'Bottom Center', 'smart-brands-for-woocommerce' ),
											'bottom_right' => __( 'Bottom Right', 'smart-brands-for-woocommerce' ),
											'vertical_center_inner' => __( 'Vertical Center Inner', 'smart-brands-for-woocommerce' ),
											'vertical_outer' => __( 'Vertical Outer', 'smart-brands-for-woocommerce' ),
											'vertical_center' => __( 'Vertical Center', 'smart-brands-for-woocommerce' ),
										),
										'only_pro'   => true,
										'default'    => 'top_right',
										'dependency' => array( 'carousel_navigation|brand_layout_preset', '==|any', 'true|carousel_layout,multi_row', true ),
									),
									array(
										'id'         => 'carousel_nav_type',
										'type'       => 'button_set',
										'class'      => 'csf_pro_option',
										'title'      => __( 'Navigation Type', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Select the carousel navigation type.', 'smart-brands-for-woocommerce' ),
										'only_pro'   => true,
										'options'    => array(
											'nav_arrow' => __( 'Arrow', 'smart-brands-for-woocommerce' ),
											'nav_text'  => array(
												'option_name' => __( 'Text', 'smart-brands-for-woocommerce' ),
												'pro_only' => true,
											),
										),
										'default'    => 'nav_arrow',
										'dependency' => array( 'carousel_navigation|brand_layout_preset', '==|any', 'true|carousel_layout,multi_row', true ),
									),
									array(
										'id'         => 'nav_arrow_icon_type',
										'type'       => 'button_set',
										'class'      => 'nav_arrow_icon_type csf_pro_option',
										'title'      => __( 'Arrow Type', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Choose a navigation arrow icon for the carousel.', 'smart-brands-for-woocommerce' ),
										'only_pro'   => true,
										'options'    => array(
											'angle_arrow_horizon'  => '<i class="sp_brand-icon-angle-right"></i>',
											'chevron_arrow_horizon' => '<i class="sp_brand-icon-right-open-big"></i>',
											'arrow_right_open_1'   => '<i class="sp_brand-icon-right-open-1"></i>',
											'arrow_right_open_3'   => '<i class="sp_brand-icon-right-open-3"></i>',
											'arrow_right_open'     => '<i class="sp_brand-icon-right-open"></i>',
											'double_arrow_horizon' => '<i class="sp_brand-icon-right-open-outline"></i>',
											'bold_arrow_horizon'   => '<i class="sp_brand-icon-right"></i>',
											// 'caret_arrow_horizon'  => '<i class="sp_brand-icon-arrow-triangle-right"></i>',
											'caret_arrow_horizon'  => array(
												'option_name' => '<i class="sp_brand-icon-arrow-triangle-right"></i>',
												'pro_only' => true,
											),
										),
										'default'    => 'angle_arrow_horizon',
										'dependency' => array( 'carousel_navigation|brand_layout_preset|carousel_nav_type', '==|any|==', 'true|carousel_layout,multi_row|nav_arrow', true ),
									),
									array(
										'id'         => 'arrow_icon_size',
										'type'       => 'spinner',
										'class'      => 'csf_pro_option',
										'title'      => __( 'Icon Size', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Set font size for the arrow icon.', 'smart-brands-for-woocommerce' ),
										'default'    => '16',
										'only_pro'   => true,
										'unit'       => __( 'px', 'smart-brands-for-woocommerce' ),
										'min'        => 0,
										'dependency' => array( 'carousel_navigation|brand_layout_preset|carousel_nav_type', '==|any|==', 'true|carousel_layout,multi_row|nav_arrow', true ),
									),
									array(
										'id'         => 'carousel_navigation_color',
										'type'       => 'color_group',
										'title'      => __( 'Navigation Color', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Set color for the carousel navigation.', 'smart-brands-for-woocommerce' ),
										'options'    => array(
											'color'       => __( 'Color', 'smart-brands-for-woocommerce' ),
											'hover_color' => __( 'Hover Color', 'smart-brands-for-woocommerce' ),
											'bg_color'    => __( 'Background', 'smart-brands-for-woocommerce' ),
											'bg_hover_color' => __( 'Hover Background', 'smart-brands-for-woocommerce' ),
										),
										'default'    => array(
											'color'       => '#aaaaaa',
											'hover_color' => '#ffffff',
											'bg_color'    => 'transparent',
											'bg_hover_color' => '#0f68a9',
										),
										'dependency' => array( 'carousel_navigation|brand_layout_preset', '==|any', 'true|carousel_layout,multi_row', true ),
									),
									array(
										'id'          => 'carousel_nav_border',
										'type'        => 'border',
										'title'       => __( 'Border', 'smart-brands-for-woocommerce' ),
										'subtitle'    => __( 'Set border for navigation.', 'smart-brands-for-woocommerce' ),
										'all'         => true,
										'default'     => array(
											'all'         => '1',
											'style'       => 'solid',
											'color'       => '#000000',
											'hover_color' => '#16a08b',
										),
										'hover_color' => true,
										'dependency'  => array( 'carousel_navigation|brand_layout_preset', '==|any', 'true|carousel_layout,multi_row', true ),
									),
								),
							),
							array(
								'title'  => __( 'Pagination', 'smart-brands-for-woocommerce' ),
								'icon'   => 'spf-smart-brands--icon sp_brand-icon-pagination',
								'fields' => array(
									array(
										'id'         => 'brands_carousel_pagination',
										'class'      => 'brands-navigation-and-pagination-style',
										'type'       => 'fieldset',
										'fields'     => array(
											array(
												'id'       => 'carousel_pagination',
												'type'     => 'switcher',
												'title'    => __( 'Pagination', 'smart-brands-for-woocommerce' ),
												'class'    => 'brands_navigation',
												'subtitle' => __( 'Show/hide pagination.', 'smart-brands-for-woocommerce' ),
												'text_on'  => __( 'Show', 'smart-brands-for-woocommerce' ),
												'text_off' => __( 'Hide', 'smart-brands-for-woocommerce' ),
												'text_width' => 77,
												'default'  => true,
												'dependency' => array( 'brand_layout_preset', 'any', 'carousel_layout,multi_row', true ),
											),
											array(
												'id'      => 'hide_on_mobile',
												'type'    => 'checkbox',
												'class'   => 'brands_hide_on_mobile',
												'title'   => __( 'Hide on Mobile', 'smart-brands-for-woocommerce' ),
												'default' => false,
												'dependency' => array( 'carousel_pagination|brand_layout_preset', '==|any', 'true|carousel_layout,multi_row', true ),
											),
										),
										'dependency' => array( 'brand_layout_preset', 'any', 'carousel_layout,multi_row', true ),
									),
									array(
										'id'         => 'carousel_pagination_type',
										'type'       => 'layout_preset',
										'class'      => 'carousel_pagination_style',
										'title'      => __( 'Pagination Style', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Choose carousel pagination type.', 'smart-brands-for-woocommerce' ),
										'only_pro'   => true,
										'options'    => array(
											'dots'      => array(
												'image' => SMART_BRANDS_URL . '/core/Admin/assets/img/pagination-type/bullets.svg',
												'text'  => __( 'Bullets', 'smart-brands-for-woocommerce' ),
											),
											'dynamic'   => array(
												'image'    => SMART_BRANDS_URL . '/core/Admin/assets/img/pagination-type/dynamic.svg',
												'text'     => __( 'Dynamic', 'smart-brands-for-woocommerce' ),
												'pro_only' => true,
											),
											'strokes'   => array(
												'image'    => SMART_BRANDS_URL . '/core/Admin/assets/img/pagination-type/strokes.svg',
												'text'     => __( 'Strokes', 'smart-brands-for-woocommerce' ),
												'pro_only' => true,
											),
											'scrollbar' => array(
												'image'    => SMART_BRANDS_URL . '/core/Admin/assets/img/pagination-type/scrollbar.svg',
												'text'     => __( 'Scrollbar', 'smart-brands-for-woocommerce' ),
												'pro_only' => true,
											),
										),
										'default'    => 'dots',
										'dependency' => array( 'brand_layout_preset|carousel_pagination', 'any|==', 'carousel_layout,multi_row|true', true ),
									),
									array(
										'id'         => 'carousel_pagination_color',
										'type'       => 'color_group',
										'title'      => __( 'Pagination Color', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Set color for the carousel Pagination.', 'smart-brands-for-woocommerce' ),
										'options'    => array(
											'color'        => __( 'Color', 'smart-brands-for-woocommerce' ),
											'active_color' => __( 'Active Color', 'smart-brands-for-woocommerce' ),
										),
										'default'    => array(
											'color'        => '#aaaaaa',
											'active_color' => '#0f68a9',
										),
										'dependency' => array( 'carousel_pagination|brand_layout_preset', '==|any', 'true|carousel_layout,multi_row', true ),
									),
									array(
										'id'         => 'number_of_brand_to_scroll',
										'type'       => 'column',
										'title'      => __( 'Slide to Scroll', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Number of brand(s) to scroll at a time.', 'smart-brands-for-woocommerce' ),
										'unit'       => false,
										'default'    => array(
											'large_desktop' => '1',
											'desktop' => '1',
											'laptop'  => '1',
											'tablet'  => '1',
											'mobile'  => '1',
										),
										'dependency' => array( 'brand_layout_preset', 'any', 'carousel_layout,multi_row', true ),
									),
								),
							),
							array(
								'title'  => __( 'Miscellaneous', 'smart-brands-for-woocommerce' ),
								'icon'   => 'spf-smart-brands--icon sp_brand-icon-miscellaneous',
								'fields' => array(
									array(
										'id'         => 'carousel_free_mode',
										'type'       => 'switcher',
										'title'      => __( 'Free Mode', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Enable/Disable Free Mode.', 'smart-brands-for-woocommerce' ),
										'text_on'    => __( 'Enable', 'smart-brands-for-woocommerce' ),
										'text_off'   => __( 'Disable', 'smart-brands-for-woocommerce' ),
										'default'    => true,
										'text_width' => 96,
										'dependency' => array( 'brand_layout_preset', 'any', 'carousel_layout,multi_row', true ),
									),
									array(
										'id'         => 'carousel_mouse_wheel',
										'type'       => 'switcher',
										'title'      => __( 'Mousewheel Control', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Enable/Disable mousewheel control.', 'smart-brands-for-woocommerce' ),
										'text_on'    => __( 'Enabled', 'smart-brands-for-woocommerce' ),
										'text_off'   => __( 'Disabled', 'smart-brands-for-woocommerce' ),
										'text_width' => 96,
										'default'    => true,
										'dependency' => array( 'brand_layout_preset', 'any', 'carousel_layout,multi_row', true ),
									),
									array(
										'id'         => 'carousel_mouse_draggable',
										'type'       => 'switcher',
										'title'      => __( 'Mouse Draggable', 'smart-brands-for-woocommerce' ),
										'subtitle'   => __( 'Enable/Disable mouse draggable.', 'smart-brands-for-woocommerce' ),
										'text_on'    => __( 'Enabled', 'smart-brands-for-woocommerce' ),
										'text_off'   => __( 'Disabled', 'smart-brands-for-woocommerce' ),
										'text_width' => 94,
										'default'    => true,
										'dependency' => array( 'brand_layout_preset', 'any', 'carousel_layout,multi_row', true ),
									),
								),
							),
						),
					),
				),
			)
		);
	}
}
