<?php
/*
Plugin Name: Anywhere Post List Shortcode
Version: 0.4
Plugin URI: http://hibou-web.com
Description: You can simply put a "[list]" short code, to list the title of the latest article (link with) and the front page of your blog, sidebar, footer. Set category and custom post type, taxonomy also other it is also possible.
Author: Shuhei Nishimura
Author URI: https://private.hibou-web.com
License: GPLv2 or later
License URI: http://opensource.org/licenses/gpl-2.0.php GPLv2
*/

/**
 * Anywhere Post List Shortcode
 *
 * @package Anywhere Post List Shortcode
 * @version 0.4
 * @author Shuhei Nishimura <shuhei.nishimura@gmail.com>
 * @copyright Copyright (c) 2014 Shuhei Nishimura (Hibou).
 * @license http://opensource.org/licenses/gpl-2.0.php GPLv2
 * @link http://hibou-web.com
 */

function anywhere_list( $atts ) {

	global $post;
	extract( shortcode_atts( array(
		'post_type'    => 'post',
		'cat_name'     => '',
		'num'          => 10,
		'class'        => '',
		'orderby'      => 'post_date',
		'order'        => 'DESC',
		'length'       => '',
		'taxonomy'     => '',
		'term'         => '',
		'field'        => '',
		'more'         => '…',
		'post_format'  => 'standard',
		'thumbnail'    => 'on',
		'size'         => 'thumbnail',
		'slider_mode'  => '',
	), $atts ) );

	if ( ! empty( $taxonomy ) && ! empty( $term ) ) {

		$args = array(
			'post_type'      => $post_type,
			'posts_per_page' => $num,
			'orderby'        => $orderby,
			'order'          => $order,
			'tax_query'      => array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => $field,
					'terms'    => $term,
				)
			)
		);

	} else {

		$args = array(
			'post_type'      => $post_type,
			'cat_name'       => $cat_name,
			'posts_per_page' => $num,
			'order'          => $order,
			'orderby'        => $orderby,
		);

	}
	$list_posts = get_posts( $args );

	$html   = '';
	$class  = ( ! empty( $class ) ) ? "class='$class'" : '';

	if ( empty( $list_posts ) ) {
		return;
	}

	$html .= '<ul ' .  $class . '>' . "\n";

	foreach ( $list_posts as $post ) {

		setup_postdata( $post );
		$post_id    = $post->ID;
		$post_link  = get_permalink( $post_id );
		$post_title = get_the_title( $post_id );
		if ( (int)$length > 0  ) {

			$post_title = wp_trim_words( wp_strip_all_tags( $post_title ), intval( $length ), $more );

		} else {

			$post_title = get_the_title( $post_id );

		}

		if( $thumbnail === 'on' && has_post_thumbnail( $post->ID ) ) {

			$thumb_attr = array(
				'title' => trim( wp_strip_all_tags( $post_title ) ),
			);
			$post_thumbnail =  get_the_post_thumbnail( $post->ID, $size, $thumb_attr );

		} else {

			$post_thumbnail = false;

		}

		if ( ! empty( $length ) && mb_strlen( $post_title ) >= $length ) {

			$post_title = wp_trim_words( $post_title, $length, $more );

		}

		$html .= '<li>' . "\n";
		$html .= '<a href="' . esc_url( $post_link ) . '" title="' . wp_strip_all_tags( $post_title ) . '">' . "\n";
		if ( $slider_mode === 'on' ) {

			$html .= $post_thumbnail;

		} else {

			if ( $post_thumbnail ) {
				$html .= '<span class="post_thumb">' . "\n";
				$html .= $post_thumbnail . "\n";
				$html .= '</span>' . "\n";
			}
			$html .= '<span class="post_title">' . "\n";
			$html .= esc_html( $post_title ) . "\n";
			$html .= '</span>' . "\n";

		}
		$html .= '</a>' . "\n";
		$html .= '</li>' . "\n";

	}
	wp_reset_postdata();
	$html .= '</ul>' . "\n";

	return $html;

}
add_shortcode( 'list', 'anywhere_list' );

// add widget area
add_filter('widget_text', 'do_shortcode');
