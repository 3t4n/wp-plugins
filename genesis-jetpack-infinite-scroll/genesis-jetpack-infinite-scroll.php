<?php
/**
 * Plugin Name: Jetpack Infinite Scroll For Genesis
 * Plugin URI: http://www.bringyourowndesign.net/plugins/genesis-jetpack-infinite-scroll
 * Description: Allows for the simple enabling of Jetpack Infinite Scroll for themes using the Genesis Framework (HTML5).
 * Version: 1.0
 * Author: Christopher Smith
 * Author URI: http://www.bringyourowndesign.net/
 * License: GPL2
 */

defined( 'ABSPATH' ) or die( 'No! Bad script kiddie! *swats with newpaper*' );

//* Add support for JetPack infinite scroll
/** Add CSS ID to container **/
add_filter( 'genesis_attr_content', 'byod_custom_attributes_content' );
function byod_custom_attributes_content( $attributes ) {
	$attributes['id'] = 'main-content';
	return $attributes;
 	}
 	
add_filter( 'genesis_attr_footer-widgets', 'byod_custom_attributes_footer' );
function byod_custom_attributes_footer( $attributes ) {
	$attributes['id'] = 'main-footer';
	return $attributes;
 	}
 	
/**
 * Remove pagination.
 */
add_action ( 'genesis_after_entry', 'byod_remove_pagination' );
function byod_remove_pagination() {
	remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
}

/** Add infinite scroll **/
 add_theme_support( 'infinite-scroll', array(
	 'container' => 'main-content',
	 'footer' => false,
	 'footer-widgets' => 'main-footer',
	 'render' => 'genesis_do_loop',
	 ) ); 