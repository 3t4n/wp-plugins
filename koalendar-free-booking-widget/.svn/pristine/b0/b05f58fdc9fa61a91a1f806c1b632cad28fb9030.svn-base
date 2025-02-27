<?php
/*
Plugin Name: Koalendar | Free Booking Widget
Plugin URI: https://Koalendar.com?utm_source=wp_plugin
Description: Embed a FREE <a href="https://Koalendar.com?utm_source=wp_plugin" target="blank">Koalendar Online Booking Widget</a> into your site. The tag to embed is: <code>[koalendar link="your-booking-page-link"]</code>
Version: 1.0.3
Author: Koalendar
Author URI: https://Koalendar.com/?utm_source=wp_plugin
License: GPL2
*/


/**
 * Embed Koalendar iframe like:
 * <iframe src="https://koalendar.com/e/demo?embed=true" width="100%" height="800px" frameborder="0"></iframe>
 */

function embed_koalendar( $atts ) {
	extract( shortcode_atts( array(
		'link' => 'https://koalendar.com/e/demo',
		'width' => '100%',
		'height' => "660",
	), $atts ) );

	$link = esc_url( sanitize_text_field($link) );
	$width = esc_attr( sanitize_text_field($width) );
	$height = esc_attr( sanitize_text_field($height) );

	return "<iframe src=\"$link?embed=true\" width=\"$width\" height=\"$height\" frameBorder=\"0\"></iframe>";
}
add_shortcode( 'koalendar', 'embed_koalendar' );