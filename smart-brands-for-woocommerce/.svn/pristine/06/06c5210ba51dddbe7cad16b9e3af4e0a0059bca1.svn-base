<?php
/**
 * The shortcode/view configurations file.
 *
 * It provides all the configurations/settings of generated shortcode/view.
 *
 * @link       https://shapedplugin.com
 * @since      1.0.0
 *
 * @package    smart_brands_for_wc
 * @subpackage smart_brands_for_wc/Frontend/partials
 * @author     ShapedPlugin<support@shapedplugin.com>
 */

/*
 * General Tab.
*/
$layout_preset            = isset( $layout_meta['brand_layout_preset'] ) ? $layout_meta['brand_layout_preset'] : '';
$show_brand_logo          = isset( $views_meta['show_brand_logo'] ) ? $views_meta['show_brand_logo'] : true;
$brand_vertical_alignment = isset( $views_meta['brand_vertical_alignment'] ) ? $views_meta['brand_vertical_alignment'] : 'center';
$show_product_count       = isset( $views_meta['show_brand_product_count'] ) ? $views_meta['show_brand_product_count'] : false;
// Responsive Column.
$columns            = isset( $views_meta['number_of_column'] ) ? $views_meta['number_of_column'] : '';
$lg_desktop_screen  = $columns['large_desktop'] ?? '4';
$desktop_screen     = $columns['desktop'] ?? '4';
$laptop_screen      = $columns['laptop'] ?? '3';
$tablet_screen      = $columns['tablet'] ?? '2';
$mobile_screen      = $columns['mobile'] ?? '1';
$smart_brand_column = "spf-smart-brands-col-xs-$mobile_screen spf-smart-brands-col-sm-$tablet_screen spf-smart-brands-col-md-$laptop_screen spf-smart-brands-col-lg-$desktop_screen spf-smart-brands-col-xl-$lg_desktop_screen";
$order_by           = $views_meta['order_by'];
$brand_order        = $views_meta['order'];
$preloader          = $views_meta['enable_preloader'];

/*
 * Display Tab.
*/
$show_section_title        = $views_meta['show_brand_section_title'];
$section_title_margin      = isset( $views_meta['section_title_margin_around'] ) ? $views_meta['section_title_margin_around'] : array(
	'top'    => '0',
	'right'  => '0',
	'bottom' => '30',
	'left'   => '0',
	'unit'   => 'px',
);
$section_title_margin_unit = isset( $section_title_margin['unit'] ) ? $section_title_margin['unit'] : 'px';

$space_between_brands = isset( $views_meta['space_between_brands']['all'] ) ? (int) $views_meta['space_between_brands']['all'] : 15;
// Brands border properties.
$product_brand_border = isset( $views_meta['product_brand_border'] ) ? $views_meta['product_brand_border'] : array(
	'all'         => '0',
	'style'       => 'solid',
	'color'       => '#ddd',
	'hover_color' => '#ddd',
	'radius'      => '0',
	'unit'        => 'px',
);

$_border_width       = isset( $product_brand_border['all'] ) ? $product_brand_border['all'] : '0';
$_border_style       = isset( $product_brand_border['style'] ) ? $product_brand_border['style'] : 'solid';
$_border_color       = isset( $product_brand_border['color'] ) ? $product_brand_border['color'] : '#ddd';
$_border_hover_color = isset( $product_brand_border['hover_color'] ) ? $product_brand_border['hover_color'] : '#ddd';
$_border_radius_unit = isset( $product_brand_border['unit'] ) ? $product_brand_border['unit'] : 'px';

$_radius = isset( $product_brand_border['radius'] ) ? $product_brand_border['radius'] : '0';
// Items Inner Padding properties.
$product_brands_inner_padding = isset( $views_meta['product_brands_inner_padding'] ) ? $views_meta['product_brands_inner_padding'] : '';
$product_brand_top_padding    = isset( $product_brands_inner_padding['top'] ) ? $product_brands_inner_padding['top'] : '0';
$product_brand_right_padding  = isset( $product_brands_inner_padding['right'] ) ? $product_brands_inner_padding['right'] : '0';
$product_brand_bottom_padding = isset( $product_brands_inner_padding['bottom'] ) ? $product_brands_inner_padding['bottom'] : '0';
$product_brand_left_padding   = isset( $product_brands_inner_padding['left'] ) ? $product_brands_inner_padding['left'] : '0';

/*
 * Carousel Tab.
*/
$autoplay         = isset( $views_meta['carousel_autoplay'] ) && $views_meta['carousel_autoplay'] ? 'true' : 'false';
$autoplay_speed   = isset( $views_meta['carousel_autoplay_speed'] ) ? $views_meta['carousel_autoplay_speed'] : 2000;
$sliding_speed    = isset( $views_meta['carousel_sliding_speed'] ) ? $views_meta['carousel_sliding_speed'] : 400;
$pause_on_hover   = isset( $views_meta['carousel_pause_on_hover'] ) && $views_meta['carousel_pause_on_hover'] ? 'true' : 'false';
$infinite_loop    = isset( $views_meta['carousel_infinite_loop'] ) && $views_meta['carousel_infinite_loop'] ? 'true' : 'false';
$free_mode        = isset( $views_meta['carousel_free_mode'] ) && $views_meta['carousel_free_mode'] ? 'true' : 'false';
$_mouse_wheel     = isset( $views_meta['carousel_mouse_wheel'] ) && $views_meta['carousel_mouse_wheel'] ? 'true' : 'false';
$_mouse_draggable = isset( $views_meta['carousel_mouse_draggable'] ) && $views_meta['carousel_mouse_draggable'] ? 'true' : 'false';

// slide to scroll.
$slide_to_scroll = isset( $views_meta['number_of_brand_to_scroll'] ) ? $views_meta['number_of_brand_to_scroll'] : array(
	'large_desktop' => '1',
	'desktop'       => '1',
	'laptop'        => '1',
	'tablet'        => '1',
	'mobile'        => '1',
);
$large_desktop   = $slide_to_scroll['large_desktop'];
$desktop         = $slide_to_scroll['large_desktop'];
$laptop          = $slide_to_scroll['laptop'];
$tablet          = $slide_to_scroll['tablet'];
$mobile          = $slide_to_scroll['mobile'];

$_nav_configs        = isset( $views_meta['brands_carousel_navigation'] ) ? $views_meta['brands_carousel_navigation'] : '';
$carousel_navigation = isset( $_nav_configs['carousel_navigation'] ) ? $_nav_configs['carousel_navigation'] : true;
$nav_hide_on_mobile  = isset( $_nav_configs['hide_on_mobile'] ) ? $_nav_configs['hide_on_mobile'] : false;

$_pagination_configs       = isset( $views_meta['brands_carousel_pagination'] ) ? $views_meta['brands_carousel_pagination'] : '';
$carousel_pagination       = isset( $_pagination_configs['carousel_pagination'] ) ? $_pagination_configs['carousel_pagination'] : true;
$pagination_hide_on_mobile = isset( $_pagination_configs['hide_on_mobile'] ) ? $_pagination_configs['hide_on_mobile'] : false;
