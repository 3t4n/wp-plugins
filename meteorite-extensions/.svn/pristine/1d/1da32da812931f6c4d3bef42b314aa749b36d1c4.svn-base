<?php

/**
 * Functions for Meteorite Widgets
 *
 * @package    	Meteorite_Extensions
 * @link        http://terra-themes.com
 * Author:      Terra Themes
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
 * Custom post types slugs
 */
function meteorite_extensions_custom_employees_slug() {
    $slug = get_theme_mod('cpts_slug_employees','employees');
    return $slug;
}
add_filter('terra_themes_employees_rewrite_slug', 'meteorite_extensions_custom_employees_slug');

function meteorite_extensions_custom_clients_slug() {
    $slug = get_theme_mod('cpts_slug_clients','clients');
    return $slug;
}
add_filter('terra_themes_clients_rewrite_slug', 'meteorite_extensions_custom_clients_slug');

function meteorite_extensions_custom_projects_slug() {
    $slug = get_theme_mod('cpts_slug_projects','projects');
    return $slug;
}
add_filter('terra_themes_projects_rewrite_slug', 'meteorite_extensions_custom_projects_slug');

function meteorite_extensions_custom_testimonials_slug() {
    $slug = get_theme_mod('cpts_slug_testimonials','testimonials');
    return $slug;
}
add_filter('terra_themes_testimonials_rewrite_slug', 'meteorite_extensions_custom_testimonials_slug');

function meteorite_extensions_custom_slides_slug() {
    $slug = get_theme_mod('cpts_slug_slides','slides');
    return $slug;
}
add_filter('terra_themes_slides_rewrite_slug', 'meteorite_extensions_custom_slides_slug');

function meteorite_extensions_custom_woocommerce_delimiter() {
    $delimiter = get_theme_mod('shop_breadcrumb_delimiter','/');
    return $delimiter;
}
add_filter('meteorite_woocommerce_delimiter', 'meteorite_extensions_custom_woocommerce_delimiter');

/**
 * Needed for Image Frame Widget
 */
if ( ! function_exists('meteorite_get_attachment_thumb_url') ) :
	function meteorite_get_attachment_thumb_url( $attachment_url = '' ) {
		if ( '' == $attachment_url ) {
			return false;
		}

		$attachment_id = attachment_url_to_postid( $attachment_url );

		if ( ! empty ( $attachment_id ) ) {
			return wp_get_attachment_thumb_url( $attachment_id );
		} else {
			return $attachment_url;
		}
	}
endif;

/**
 * Needed for project alternative image in widgets
 */
if ( ! function_exists('meteorite_get_attachment_image') ) :
	function meteorite_get_attachment_image( $attachment_url = '', $thumbSize = '' ) {
		if ( '' == $attachment_url ) {
			return false;
		}

		$attachment_id = attachment_url_to_postid( $attachment_url );

		if ( ! empty ( $attachment_id ) ) {
			return wp_get_attachment_image($attachment_id, $thumbSize);
		} else {
			return $attachment_url;
		}
	}
endif;