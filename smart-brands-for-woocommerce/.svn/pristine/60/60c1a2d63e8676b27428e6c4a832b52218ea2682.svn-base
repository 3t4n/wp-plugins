<?php
/**
 * The Dynamic CSS Style file.
 *
 * It provides all the external style of the generated shortcode/view.
 *
 * @link       https://shapedplugin.com
 * @since      1.0.0
 *
 * @package    smart_brands_for_wc
 * @subpackage smart_brands_for_wc/Frontend/partials
 * @author     ShapedPlugin<support@shapedplugin.com>
 */

/**
 * It provides all the configurations of generated shortcode/view.
 */
require 'configurations.php';
$section_title_text = get_the_title( $views_id );
// Section Title style.
if ( $show_section_title && ! empty( $section_title_text ) ) {
	$custom_css .= '
    #smart-brand-main-area-' . $views_id . ' .sp-smart-brand-section .sp-smart-brand-section-title{
		margin: ' . $section_title_margin['top'] . $section_title_margin_unit . ' ' . $section_title_margin['right'] . $section_title_margin_unit . ' ' . $section_title_margin['bottom'] . $section_title_margin_unit . ' ' . $section_title_margin['left'] . $section_title_margin_unit . ';
}';
} else {
	$custom_css .= '
    #smart-brand-main-area-' . $views_id . ' .sp-smart-brand-carousel{
    margin-top: 65px;
}';
}

// Background, Hover color style and Vertical alignment for Item.
$_brands_space = ( $space_between_brands / 2 );
$custom_css   .= '
#smart-brand-main-area-' . $views_id . ' .sp-smart-brands-grid .sp-smart-brands-row {
	margin-left: -' . $_brands_space . 'px;
	margin-right: -' . $_brands_space . 'px;
}
#smart-brand-main-area-' . $views_id . ' .sp-smart-brands-grid .sp-smart-brands-row [class*=spf-smart-brands-col-] {
	padding-left: ' . $_brands_space . 'px;
	padding-right: ' . $_brands_space . 'px;
	padding-bottom: ' . $space_between_brands . 'px;
}
#smart-brand-main-area-' . $views_id . ' .sp-brand-term-row {
    border: ' . $_border_width . 'px ' . $_border_style . ' ' . $_border_color . ';
    border-radius: ' . $_radius . $_border_radius_unit . ';
	overflow: hidden;
	padding: ' . $product_brand_top_padding . 'px ' . $product_brand_right_padding . 'px ' . $product_brand_bottom_padding . 'px ' . $product_brand_left_padding . 'px;
}#smart-brand-main-area-' . $views_id . ' .sp-brand-term-row:hover {
    border-color: ' . $_border_hover_color . ';
}#smart-brand-main-area-' . $views_id . ' .sp-smart-brand-carousel .swiper-wrapper,
#smart-brand-main-area-' . $views_id . ' .sp-smart-brands-grid .sp-smart-brands-row {
    align-items: ' . $brand_vertical_alignment . ';
}';

// Carousel navigation color.
if ( $carousel_navigation ) {
	// Carousel Navigation color properties.
	$carousel_nav_color     = isset( $views_meta['carousel_navigation_color'] ) ? $views_meta['carousel_navigation_color'] : array(
		'color'          => '#aaaaaa',
		'hover_color'    => '#ffffff',
		'bg_color'       => 'transparent',
		'bg_hover_color' => '#63a37b',
	);
	$color                  = $carousel_nav_color['color'];
	$hover_color            = $carousel_nav_color['hover_color'];
	$background_color       = $carousel_nav_color['bg_color'];
	$background_hover_color = $carousel_nav_color['bg_hover_color'];

	// Carousel Nav Border properties.
	$carousel_nav_border = isset( $views_meta['carousel_nav_border'] ) ? $views_meta['carousel_nav_border'] : array(
		'all'         => '1',
		'style'       => 'solid',
		'color'       => '#000000',
		'hover_color' => '#16a08b',
	);

	$custom_css .= '#smart-brand-main-area-' . $views_id . ' .sp-smart-brand-carousel .sp-brand-button-next,
    #smart-brand-main-area-' . $views_id . ' .sp-smart-brand-carousel .sp-brand-button-prev{
        background-color: ' . $background_color . ';
		border: ' . $carousel_nav_border['all'] . 'px ' . $carousel_nav_border['style'] . ' ' . $carousel_nav_border['color'] . ';
    }#smart-brand-main-area-' . $views_id . ' .sp-smart-brand-carousel .sp-brand-button-next:hover,
    #smart-brand-main-area-' . $views_id . ' .sp-smart-brand-carousel .sp-brand-button-prev:hover{
        background-color: ' . $background_hover_color . ';
		border-color: ' . $carousel_nav_border['hover_color'] . ';
    }#smart-brand-main-area-' . $views_id . ' .sp-smart-brand-carousel .sp-brand-button-next:after,
    #smart-brand-main-area-' . $views_id . ' .sp-smart-brand-carousel .sp-brand-button-prev:after{
        color : ' . $color . ';
    }#smart-brand-main-area-' . $views_id . ' .sp-smart-brand-carousel .sp-brand-button-next:hover::after,
    #smart-brand-main-area-' . $views_id . ' .sp-smart-brand-carousel .sp-brand-button-prev:hover::after{
        color : ' . $hover_color . ';
    }
	#smart-brand-main-area-' . $views_id . ' .sp-smart-brand-carousel .sp-brand-button-prev {
		margin-right: ' . ( 40 + (int) $carousel_nav_border['all'] ) . 'px;
	}';
}

// Hide navigation on mobile if the option is enabled.
if ( $nav_hide_on_mobile ) {
	$custom_css .= '@media screen and (max-width: 479px) {
        #smart-brand-main-area-' . $views_id . ' .sp-smart-brand-carousel .sp-brand-button-prev,
        #smart-brand-main-area-' . $views_id . ' .sp-smart-brand-carousel .sp-brand-button-next {
            display: none;
        }
    }';
}

// Carousel Pagination color.
if ( $carousel_pagination ) {
	$carousel_pag_color = isset( $views_meta['carousel_pagination_color'] ) ? $views_meta['carousel_pagination_color'] : array(
		'color'        => '#aaaaaa',
		'active_color' => '#63a37b',
	);
	$color              = $carousel_pag_color['color'];
	$active_color       = $carousel_pag_color['active_color'];

	$custom_css .= '
    #smart-brand-main-area-' . $views_id . ' .sp-brand-pagination .swiper-pagination-bullet{
        background: ' . $color . ';
    }#smart-brand-main-area-' . $views_id . ' .sp-brand-pagination .swiper-pagination-bullet-active{
        background: ' . $active_color . ';
    }';
}

// Hide pagination on mobile if the option is enabled.
if ( $pagination_hide_on_mobile ) {
	$custom_css .= '@media screen and (max-width: 479px) {
        #smart-brand-main-area-' . $views_id . ' .sp-brand-pagination {
            display: none;
        }
    }';
}
