<?php
/**
 * Plugin Name: Fancy Product For Elementor
 * Description: This plugin adds an amazing and customizable Woocommerce box widget(with many options) to the Elementor page builder plugin.
 * Plugin URI:  http://themeprix.com/free-wordpress-themes-and-plugin/
 * Version:     3.0.1
 * Author:      ThemePrix
 * Author URI:  https://themeprix.com/
 * Text Domain: fancy-product-for-elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


define( 'fancy_product_for_elementor__FILE__', __FILE__ );
define('fancy_product_for_elementor_PLUGIN_PATH', trailingslashit(plugin_dir_path(__FILE__)));

require_once fancy_product_for_elementor_PLUGIN_PATH . 'autoload.php';

/**
 * Load elementor fancy Woocommerce
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function fancy_product_for_elementor_load() {
	// Load localization file
	load_plugin_textdomain( 'fancy-product-for-elementor' );

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'fancy_product_for_elementor_fail_load' );
		return;
	}

	// Check required version
	$elementor_version_required = '1.8.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'fancy_product_for_elementor_fail_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );
}
add_action( 'plugins_loaded', 'fancy_product_for_elementor_load' );


function fancy_product_for_elementor_fail_load_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . __( 'Fancy Product For Elementor is not working because you are using an old version of Elementor.', 'fancy-product-for-elementor' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'fancy-product-for-elementor' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}

function fancy_product_for_elementor_fail_load() {
	if (!current_user_can('activate_plugins')) {
		return;
	}

	$elementor = 'elementor/elementor.php';

	if (fancy_product_for_elementor_is_plugin_installed($elementor)) {
		$activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor);
		$message = __('<strong>Fancy Product For Elementor</strong> requires <strong>Elementor</strong> plugin to be active. Please activate Elementor to continue.', 'fancy-product-for-elementor');
		$button_text = __('Activate Elementor', 'fancy-product-for-elementor');
	} else {
		$activation_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');
		$message = sprintf(__('<strong>Fancy Product For Elementor</strong> requires <strong>Elementor</strong> plugin to be installed and activated. Please install Elementor to continue.', 'fancy-product-for-elementor'), '<strong>', '</strong>');
		$button_text = __('Install Elementor', 'fancy-product-for-elementor');
	}

	$button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';

	printf('<div class="error"><p>%1$s</p>%2$s</div>', __($message), $button);
}

	/**
     * Check if a plugin is installed
     *
     * @since v2
     */
    function fancy_product_for_elementor_is_plugin_installed($basename) {
        if (!function_exists('get_plugins')) {
            include_once ABSPATH . '/wp-admin/includes/plugin.php';
        }

        $installed_plugins = get_plugins();

        return isset($installed_plugins[$basename]);
    }
