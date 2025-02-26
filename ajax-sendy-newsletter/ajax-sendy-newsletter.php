<?php
/**
 * Plugin Name: Newsletter using Sendy
 * Description: Newsletter that send subscription for sendy using ajax
 * Version: 1.1
 * Author: Simplior
 * Author URI: https://www.simplior.com/
 * Text Domain: ajax-sendy-newsletter
 * Domain Path: /i18n/languages/
 * Requires at least: 5.6
 * Requires PHP: 7.0
 *
 * @package Newsletter using Sendy
 */

/**
 * Returns the main instance.
 *
 * @since  1.1
 */
function sendy_plugin_init() {
	require plugin_dir_path( __FILE__ ) . 'inc/class-wp-sendy-newsletter.php';
	$class_wp_sendy_newsletter = new WP_Sendy_Newsletter();

	require plugin_dir_path( __FILE__ ) . 'inc/admin/class-wp-sendy-settings.php';
	$class_wp_sendy_settings = new WP_Sendy_Settings();

	load_plugin_textdomain( 'ajax-sendy-newsletter', false, basename( dirname( __FILE__ ) ) . '/languages' );

}
add_action( 'plugins_loaded', 'sendy_plugin_init' );
