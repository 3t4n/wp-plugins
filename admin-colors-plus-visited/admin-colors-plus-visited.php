<?php
/*
Plugin Name: Admin Colors Plus Visited
Plugin URI: http://smithsrus.com/downloads/wordpress-admin-color-plus-visited/
Description: New WordPress admin color schemes like the built in Blue and Grey schemes, but adds a color for visited links. Now the dashboard news you've already read will have a different color. Activate then select the color scheme in your user profile.
Version: 1.2
Author: Doug Smith
Author URI: http://smithsrus.com/
License: GPL2+
*/

add_action('admin_init','fresh_plus_visited');

function fresh_plus_visited() {
	wp_admin_css_color( 'classic-visited', __( 'Blue Plus Visited' ), plugins_url( 'colors-blue-plus-visited.css' , __FILE__ ),
		array( '#5589aa', '#cfdfe9', '#d1e5ee', '#eff8ff', '#d54e21' ) );
	wp_admin_css_color( 'fresh-visited', __( 'Gray Plus Visited' ), plugins_url( 'colors-gray-plus-visited.css' , __FILE__),
		array( '#7c7976', '#c6c6c6', '#e0e0e0', '#f1f1f1', '#d54e21' ) );
}
?>