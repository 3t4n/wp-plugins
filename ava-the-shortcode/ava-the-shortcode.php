<?php
/*
Plugin Name: Ava The Shortcode
Description: Ava creates a shortcode which displays the current user's avatar. Or, any user's avatar. That's it? Yeah, that's it.
Version: 1.0.2
Author: Billy Wilcosky
Author URI: https://www.wilcosky.com
License: GPL2
*/
defined('ABSPATH') or die('No coochie kopi!');

function ava_shortcode($pretty)
{
		$current_user = wp_get_current_user();
		extract(shortcode_atts(array(
			'id' => $current_user->ID,
			'size' => 100,
			'default' => '',
			'alt' => '',
			'class' => '',
			'rating' => '',
			'extra_attr' => '',
			'width' => '',
			'height' => '',
			'force_display' => ''
		) , $pretty, 'get_avatar'));
		$args = array(
			'class' => $class,
			'rating' => $rating,
			'extra_attr' => $extra_attr,
			'width' => $width,
			'height' => $height,
			'force_display' => $force_display
		);
		return get_avatar($id, $size, $default, $alt, $args);
}

add_shortcode('ava', 'ava_shortcode');
?>