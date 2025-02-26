<?php
/*
Plugin Name: Guerrilla's Redacted Text
Plugin URI: http://madebyguerrilla.com
Description: Add a simple shortcode to your post where you want names and info redacted and instantly black it out.
Version: 1.0.0
Author: Mike Smith
Author URI: http://www.madebyguerrilla.com
*/

/*  Copyright 2014  Mike Smith (email : hi@madebyguerrilla.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* This code adds the social sharing stylesheet to your website */
function guerrilla_redacted_text_style()
{
	wp_register_style( 'guerrilla-redacted-text', plugins_url( '/style.css', __FILE__ ), array(), '20141205', 'all' );
	wp_enqueue_style( 'guerrilla-redacted-text' );
}
add_action( 'wp_enqueue_scripts', 'guerrilla_redacted_text_style' );

// Redacted shortcode
function redactedtext($atts, $content = null) {
	extract(shortcode_atts(array(
		"length" => '' // length options are 'medium', 'large' and 'extra' with the default being blank
	), $atts));
	return '<span class="redacted '.$length.'">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>';
}

add_shortcode("redacted", "redactedtext");


?>