<?php
/*
 * Plugin Name: VS Meta Description
 * Description: With this lightweight plugin you can add a meta description to your website.
 * Version: 7.7
 * Author: Guido
 * Author URI: https://www.guido.site
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Requires PHP: 7.0
 * Requires at least: 5.0
 * Text Domain: very-simple-meta-description
 */

// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// add excerpt to pages
function vsmd_page_excerpt() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'vsmd_page_excerpt' );

// add settings link
function vsmd_action_links( $links ) {
	$settingslink = array( '<a href="'. admin_url( 'options-general.php?page=vsmd' ) .'">'.__('Settings', 'very-simple-meta-description').'</a>' );
	return array_merge( $links, $settingslink );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'vsmd_action_links' );

// include meta description in head
function vsmd_meta_description() {
	// no meta description at 404 or search results page
	if ( is_404() || is_search() )
		return;
	// set global
	global $post;
	// get settings
	$vsmd_meta = get_option( 'vsmd-setting-5' );
	$vsmd_homepage = get_option( 'vsmd-setting-1' );
	$vsmd_post_page = get_option( 'vsmd-setting-2' );
	$vsmd_post_cat_tag_description = get_option( 'vsmd-setting-7' );
	$vsmd_product = get_option( 'vsmd-setting-3' );
	$vsmd_product_cat_tag_description = get_option( 'vsmd-setting-6' );
	if ( class_exists( 'woocommerce' ) ) {
		$vsmd_shop_page = get_post( get_option( 'woocommerce_shop_page_id' ) );
		$vsmd_shop_excerpt = $vsmd_shop_page->post_excerpt;
	}
	// post or page
	if ( ( $vsmd_post_page == 'yes' ) && is_singular( array('post', 'page') ) && has_excerpt($post->ID) ) {
		$vsmd_excerpt = wp_strip_all_tags( get_the_excerpt(), true );
		echo "\r\n".'<meta name="description" content="'.esc_attr( $vsmd_excerpt ).'" />'."\r\n";
	// woo shop page
	} elseif ( class_exists( 'woocommerce' ) && ( $vsmd_post_page == 'yes' ) && is_shop() && ( !empty($vsmd_shop_excerpt) ) ) {
		$vsmd_excerpt = wp_strip_all_tags( $vsmd_shop_excerpt, true );
		echo "\r\n".'<meta name="description" content="'.esc_attr( $vsmd_excerpt ).'" />'."\r\n";
	// category description
	} elseif ( ( $vsmd_post_cat_tag_description == 'yes' ) && is_category() && ( !empty(category_description() ) ) ) {
		$vsmd_excerpt = wp_strip_all_tags( category_description(), true );
		echo "\r\n".'<meta name="description" content="'.esc_attr( $vsmd_excerpt ).'" />'."\r\n";
	// tag description
	} elseif ( ( $vsmd_post_cat_tag_description == 'yes' ) && is_tag() && ( !empty(tag_description() ) ) ) {
		$vsmd_excerpt = wp_strip_all_tags( tag_description(), true );
		echo "\r\n".'<meta name="description" content="'.esc_attr( $vsmd_excerpt ).'" />'."\r\n";	
	// woo product short description
	} elseif ( class_exists( 'woocommerce' ) && ( $vsmd_product == 'yes' ) && is_singular( 'product' ) && has_excerpt($post->ID) ) {
		$vsmd_excerpt = wp_strip_all_tags( get_the_excerpt(), true );
		echo "\r\n".'<meta name="description" content="'.esc_attr( $vsmd_excerpt ).'" />'."\r\n";
	// woo product category description
	} elseif ( class_exists( 'woocommerce' ) && ( $vsmd_product_cat_tag_description == 'yes' ) && is_product_category() && ( !empty(category_description() ) ) ) {
		$vsmd_excerpt = wp_strip_all_tags( category_description(), true );
		echo "\r\n".'<meta name="description" content="'.esc_attr( $vsmd_excerpt ).'" />'."\r\n";
	// woo product tag description
	} elseif ( class_exists( 'woocommerce' ) && ( $vsmd_product_cat_tag_description == 'yes' ) && is_product_tag() && ( !empty(tag_description() ) ) ) {
		$vsmd_excerpt = wp_strip_all_tags( tag_description(), true );
		echo "\r\n".'<meta name="description" content="'.esc_attr( $vsmd_excerpt ).'" />'."\r\n";	
	// homepage
	} elseif ( $vsmd_homepage == 'yes' ) {
		if ( is_front_page() ) {
			if ( !empty( $vsmd_meta ) ) {
				echo "\r\n".'<meta name="description" content="'.esc_attr($vsmd_meta).'" />'."\r\n";
			}
		}
	// everything else
	} else {
		if ( !empty($vsmd_meta) ) {
			echo "\r\n".'<meta name="description" content="'.esc_attr($vsmd_meta).'" />'."\r\n";
		}
	}
}
add_action( 'wp_head', 'vsmd_meta_description' );

// include options file
include 'vsmd-options.php';
