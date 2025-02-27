<?php
/*
Plugin Name: Search engines blocked warning
Description: The plugin shows a warning in the WordPress administration header when the option "Search Engine Visibility: Discourage search engines from indexing this site" is selected.
Version: 1.0.0
Author: <a href="https://apasionados.es">Apasionados</a>
Author URI: https://apasionados.es/
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: apa_search_engine_blocked_warning
Domain Path: /languages
*/

/**
 * Search engines blocked warning
*/
function apa_search_engine_blocked_warning($bar) {
	if (get_option('blog_public') == 0) {
		$bar->add_menu(array(
			'id' => 'apa_search_engine_blocked_warning',
			'title' => '<span class="dashicons-before dashicons-hidden">' . __('Search Engines are BLOCKED', 'apa_search_engine_blocked_warning') . '</span>',
			'href' => 'options-reading.php',
			'meta' => array(
				'target' => '_self',
				'title' => __('Discourage search engines from indexing this site', 'apa_search_engine_blocked_warning'),
			),
		));
	}
}
add_action('admin_bar_menu', 'apa_search_engine_blocked_warning', 9999);

/**
 * CSS Styles
*/
function apa_search_engine_blocked_warning_css() {
	if (is_user_logged_in()) {
		echo '<style>#wpadminbar #wp-admin-bar-apa_search_engine_blocked_warning .dashicons-before { font-weight:bold; } #wpadminbar #wp-admin-bar-apa_search_engine_blocked_warning .dashicons-before::before { vertical-align: middle; padding-right: 5px; } #wpadminbar #wp-admin-bar-apa_search_engine_blocked_warning { background-color: red; }</style>';
	}
}
add_action('admin_head', 'apa_search_engine_blocked_warning_css');

/**
 * Do some check on plugin activation.
*/
function apa_search_engine_blocked_warning_f_activation() {
	$plugin_data = get_plugin_data( __FILE__ );
	$plugin_version = $plugin_data['Version'];
	$plugin_name = $plugin_data['Name'];
	$php_minimum = '5.6';
	if ( version_compare( PHP_VERSION, $php_minimum, '<' ) ) {
		deactivate_plugins( plugin_basename( __FILE__ ) );
		wp_die( '<h1>' . __('Could not activate plugin: PHP version error', 'apa-cf7sdomt' ) . '</h1><h2>PLUGIN: <i>' . $plugin_name . ' ' . $plugin_version . '</i></h2><p><strong>' . __('You are using PHP version', 'apa-cf7sdomt' ) . ' ' . PHP_VERSION . '</strong>. ' . __( 'This plugin has been tested with PHP versions', 'apa-cf7sdomt' ) . ' ' . $php_minimum . ' ' . __( 'and greater.', 'apa-cf7sdomt' ) . '</p><p>' . __('WordPress itself <a href="https://wordpress.org/about/requirements/" target="_blank">recommends using PHP version 7.2 or greater</a>. Please upgrade your PHP version or contact your Server administrator.', 'apa-cf7sdomt' ) . '</p>', __('Could not activate plugin: PHP version error', 'apa-cf7sdomt' ), array( 'back_link' => true ) );
	}
}
register_activation_hook( __FILE__, 'apa_search_engine_blocked_warning_f_activation' );

/**
 * Read translations.
 */
function apa_search_engine_blocked_warning_f_init() {
 load_plugin_textdomain( 'apa_search_engine_blocked_warning', false,  dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action('plugins_loaded', 'apa_search_engine_blocked_warning_f_init');