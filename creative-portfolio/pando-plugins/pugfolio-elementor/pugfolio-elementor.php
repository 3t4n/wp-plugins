<?php
/**
 * Plugin Name: Pando Elementor
 * Description: Elementor sample plugin.
 * Plugin URI:  https://elementor.com/
 * Version:     1.1.0
 * Author:      Author Name
 * Author URI:  https://elementor.com/
 * Text Domain: pando-extra
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//define( 'ELEMENTOR_PANDO__FILE__', __FILE__ );

/**
 * Load Hello World
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function pando_pugfolio_load() {
	// Load localization file
	load_plugin_textdomain( 'pugfolio' );

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'pando_pugfolio_fail_load' );
		return;
	}

	// Check required version
	$elementor_version_required = '1.8.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'pando_pugfolio_fail_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );
}
add_action( 'plugins_loaded', 'pando_pugfolio_load' );


function pando_pugfolio_fail_load_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . esc_html( 'Pando Extra + Elementor is not working because you are using an old version of Elementor.', 'pugfolio' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'pugfolio' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}