<?php
/*
Plugin Name: Dynamic Post Meta Plugin
Description: The Dynamic Post Meta Plugin adds 6 short codes that allow you to add dynamic post meta data to your post content.
Author: Ben HartLenn
Author URI: https://benhartlenn.com
Version: 1.1
Text Domain: dynamic_post_meta
Domain Path: /languages
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

The Dynamic Post Meta Plugin allows you to display post meta in posts.
    Copyright (C) 2017  Ben HartLenn

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 
The Dynamic Post Meta Plugin is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Dynamic Post Meta Plugin. If not, see <http://www.gnu.org/licenses/>.

Please contact the author at https://benhartlenn.com for any inquiries.

* 
*/
if ( !function_exists( 'dynamic_post_meta_init' ) ) {
	
	function dynamic_post_meta_init() {
		
		// [post-permalink id] shortcode
		if ( !function_exists( 'dynamic_post_permalink' ) ) {
			function dynamic_post_permalink($atts=[], $content=null) {
				global $post;
				if( !empty( $atts['id'] ) ) {
					$newId = $atts['id'];
					return "<a href='" . get_permalink($newId) . "'>" . get_permalink($newId) . "</a>";
				}
				else {
					return "<a href='" . get_permalink($post->ID) . "'>" . get_permalink($post->ID) . "</a>";
				}
			}
			add_shortcode('post-permalink', 'dynamic_post_permalink');
		}
		
		// [post-date id] shortcode 
		if ( !function_exists( 'dynamic_post_date' ) ) {
			function dynamic_post_date($atts=[], $content=null) {
				global $post;
				if( !empty( $atts['id'] ) ) {
					$newId = $atts['id'];
					return __( get_the_date("M j, Y", $newId), 'dynamic_post_meta' );
				}
				else {
					return __( get_the_date("M j, Y", $post->post_date), 'dynamic_post_meta' );
				}
			}
			add_shortcode('post-date', 'dynamic_post_date');
		}
		
		// [post-modified id] shortcode
		if ( !function_exists( 'dynamic_post_modified' ) ) {
			function dynamic_post_modified($atts=[], $content=null) {
				global $post;
				if( !empty( $atts['id'] ) ) {
					$newId = $atts['id'];
					return __( get_the_modified_date("M j, Y", $newId), 'dynamic_post_meta' );
				}
				else {
					return __( get_the_modified_date("M j, Y", $post->ID), 'dynamic_post_meta' );
				}
			}
			add_shortcode('post-modified', 'dynamic_post_modified');
		}
	
		// [post-author id] shortcode
		if ( !function_exists( 'dynamic_post_author' ) ) {
			function dynamic_post_author($atts=[], $content=null) {
				global $post;
				if( !empty( $atts['id'] ) ) {
					$newId = $atts['id'];
					$new_post = get_post($newId);
					$author = get_the_author_meta( 'nickname', $new_post->post_author );
					return __( $author, 'dynamic_post_meta' );
				}
				else {
					$author = get_the_author_meta( 'nickname', $post->post_author );
					return __( $author, 'dynamic_post_meta' );
				}
			}
			add_shortcode('post-author', 'dynamic_post_author');
		}
		
		// [post-title id] shortcode
		if ( !function_exists( 'dynamic_post_title' ) ) {
			function dynamic_post_title($atts=[], $content=null) {
				global $post;
				if( !empty($atts['id']) ) {
					$newId = $atts['id'];
					return __( get_the_title($newId), 'dynamic_post_meta');
				}
				else {
					return __( $post->post_title, 'dynamic_post_meta');
				}
			}
			add_shortcode('post-title', 'dynamic_post_title');
		}
		
		// [post-excerpt id] shortcode
		if ( !function_exists( 'dynamic_post_excerpt' ) ) {
			function dynamic_post_excerpt($atts=[], $content=null) {
				global $post;
				if( !empty( $atts['id'] ) ) {
					$newId = $atts['id'];
			
					$p = new WP_Query( array(
						'p' => $newId,
						'post_type' => 'any',
					) );
			
					if($p->have_posts() ) : $p->the_post();
						return __( get_the_excerpt($p->ID), 'dynamic_post_meta' );
						wp_reset_postdata();
					endif;
				}
				else {
					return __( get_the_excerpt($post), 'dynamic_post_meta' );
				}
			}
			add_shortcode('post-excerpt', 'dynamic_post_excerpt');
		}
			
	}
}
add_action( 'init', 'dynamic_post_meta_init' );
?>