<?php
/**
 * Plugin Name: Simple Virtu Widget
 * Plugin URI:
 * Description: Enables Virtu Systems mortgage widget and shortcode.
 * Version:     1.2.1
 * Author:      hayk
 * Author URI:  https://hayk.500plus.org/
 * Text Domain: simple-virtu-widget
 * Domain Path: /languages
 * License:     GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * Simple Virtu Widget is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * Simple Virtu Widget is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Simple Virtu Widget. If not, see https://www.gnu.org/licenses/gpl-3.0.txt.
 *
 */
function activate_simple_virtu_widget() {
	if (!get_option('virtu_mortgage_agent_id')) {
		add_option('virtu_mortgage_agent_id', '');
	}
	if (!get_option('virtu_mortgage_ega_tracking_id')) {
		add_option('virtu_mortgage_ega_tracking_id', '');
	}
	if (!get_option('virtu_mortgage_agent_id_from_url')) {
		add_option('virtu_mortgage_agent_id_from_url', '');
	}
}

function deactive_simple_virtu_widget() {

}

function uninstall_simple_virtu_widget() {
	delete_option('virtu_mortgage_agent_id');
	delete_option('virtu_mortgage_ega_tracking_id');
	delete_option('virtu_mortgage_agent_id_from_url');
}

function admin_init_simple_virtu_widget() {
	register_setting('simple-virtu-widget', 'virtu_mortgage_agent_id');
	register_setting('simple-virtu-widget', 'virtu_mortgage_ega_tracking_id');
	register_setting('simple-virtu-widget', 'virtu_mortgage_agent_id_from_url');
}

function admin_menu_simple_virtu_widget() {
	add_options_page('Simple Virtu Widget', 'Simple Virtu Widget', 'manage_options', 'simple-virtu-widget', 'options_page_simple_virtu_widget');
}

function options_page_simple_virtu_widget() {
	include ( plugin_dir_path(__FILE__) . 'options.php' );
}

function simple_virtu_widget() {
	wp_enqueue_script('simple-virtu-widget', 'https://bkr.jarvis.su/virtu-widget/virtu-widgets.js');

	$res = '<virtu-widget';

	if (get_option('virtu_mortgage_agent_id_from_url') && $virtu_mortgage_agent_id = get_query_var('vaid')) {
		$res .= ' managerID="'.$virtu_mortgage_agent_id.'"';
	} elseif ($virtu_mortgage_agent_id = get_option('virtu_mortgage_agent_id')) {
		$res .= ' managerID="'.$virtu_mortgage_agent_id.'"';
	}

	if ($virtu_mortgage_ega_tracking_id = get_option('virtu_mortgage_ega_tracking_id')) {
		$res .= ' gaID="'.$virtu_mortgage_ega_tracking_id.'"';
	}

	$res .= '></virtu-widget>';
	return $res;
}

register_activation_hook(__FILE__, 'activate_simple_virtu_widget');
register_deactivation_hook(__FILE__, 'deactive_simple_virtu_widget');
register_uninstall_hook(__FILE__, 'uninstall_simple_virtu_widget');

if (is_admin()) {
	add_action('admin_init', 'admin_init_simple_virtu_widget');
	add_action('admin_menu', 'admin_menu_simple_virtu_widget');
}

add_shortcode('virtu-widget', 'simple_virtu_widget');

if(!function_exists('wp_get_current_user')) {
	include (ABSPATH . 'wp-includes/pluggable.php');
}

add_action('init', 'add_get_val');
function add_get_val() {
	global $wp;
	$wp->add_query_var('vaid');
}

function simple_virtu_widget_locale() {
	load_plugin_textdomain( 'simple-virtu-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'simple_virtu_widget_locale' );
