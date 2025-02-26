<?php
/*
Plugin Name: 	Hide WordPress Bar
Description: 	allows you to remove the annoying WordPress Dashboard Bar for non-admin users! so when a regular user login your website he won't see the bar.
Version:     	1.0
Author:      	Mostafa Saeed
Author URI:		mailto:mostafa.saeed543@gmail.com
License:     	GPL2
License URI: 	https://www.gnu.org/licenses/gpl-2.0.html
*/

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}
?>