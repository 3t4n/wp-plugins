<?php
/*
Plugin Name: Responsive Youtube Video
Plugin URI: https://www.infyways.com/
Description: Reponsive Youtube Video is an easy to use wordpress plugin using which you can embed youtube videos into your post or pages directly using a shortcode.
Version: 1.0.0
Author: Infyways
Author URI: https://www.infyways.com/
License: GPLv2 or later
Text Domain: Infyways
*/
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2018 Infyways Solutions Private Limited.
*/


function infy_reponsive_youtube($atts) {
	
	$args = shortcode_atts( array( 'id' => null ), $atts );
	
	if ( ! empty( $args['id'] ) ) {
	
		$iframe= "<div class=\"yt_holder\"><iframe src=\"https://www.youtube.com/embed/$args[id]\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe></div>";
		
	}
	else{
		$iframe= "Youtube video id is null";
	}
	
	return $iframe;
}

function infy_reponsive_youtube_shortcode() {
	// Add shortcode.
	add_shortcode( 'responsive-youtube', 'infy_reponsive_youtube' );
}
function infy_reponsive_youtube_style() {
	wp_register_style( 'responsive-youtube',  plugin_dir_url( __FILE__ ) . 'assets/responsive-youtube.css' );
	wp_enqueue_style( 'responsive-youtube' );
}
function responsive_youtube_plugin_scripts($plugin_array)
{
    //enqueue TinyMCE plugin script with its ID.
    $plugin_array["responsive_youtube_plugin"] =  plugin_dir_url(__FILE__) . "assets/editor.js";
    return $plugin_array;
}
function infy_ryv_register_buttons_editor($buttons)
{
    //register buttons with their id.
    array_push($buttons, "green");
    return $buttons;
}

add_filter("mce_buttons", "infy_ryv_register_buttons_editor");
add_filter("mce_external_plugins", "responsive_youtube_plugin_scripts");

// Hook register shortcode function.
add_action( 'init', 'infy_reponsive_youtube_shortcode' );
add_action('wp_enqueue_scripts', 'infy_reponsive_youtube_style');