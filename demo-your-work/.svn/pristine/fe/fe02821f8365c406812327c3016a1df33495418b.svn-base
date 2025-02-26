<?php
/**
 * Plugin Name: Demo Your Work
 * Description: Demo Your Work is a showcase plugin for WordPress Elementor Page Builder. It's a Mac manotor when you hover, scroll up the selected image.
 * Plugin URI:  https://chamrundigital.com.my/demo-your-work-wordpress-plugin
 * Version:     1.0.1
 * Author:      ChamWebDesign
 * Author URI:  https://chamrundigital.com.my/
 * Text Domain: demo-your-work
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


define( 'Demo_Your_Work__FILE__', __FILE__ );
define('Demo_Your_Work_PLUGIN_PATH', trailingslashit(plugin_dir_path(__FILE__)));

//require_once Demo_Your_Work_PLUGIN_PATH . 'autoload.php';

/**
 * Load elementor Demo Your Work
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function Demo_Your_Work_load() {
	// Load localization file
	load_plugin_textdomain( 'demo-your-work' );

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'Demo_Your_Work_fail_load' );
		return;
	}

	// Check required version
	$elementor_version_required = '1.8.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'Demo_Your_Work_fail_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );
}
add_action( 'plugins_loaded', 'Demo_Your_Work_load' );


function Demo_Your_Work_fail_load_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . __( 'Demo Your Work is not working because you are using an old version of Elementor.', 'demo-your-work' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'demo-your-work' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}

function Demo_Your_Work_fail_load() {
	if (!current_user_can('activate_plugins')) {
		return;
	}

	$elementor = 'elementor/elementor.php';

	if (Demo_Your_Work_is_plugin_installed($elementor)) {
		$activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor);
		$message = __('<strong>Demo Your Work</strong> requires <strong>Elementor</strong> plugin to be active. Please activate Elementor to continue.', 'demo-your-work');
		$button_text = __('Activate Elementor', 'demo-your-work');
	} else {
		$activation_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');
		$message = sprintf(__('<strong>Demo Your Work</strong> requires <strong>Elementor</strong> plugin to be installed and activated. Please install Elementor to continue.', 'demo-your-work'), '<strong>', '</strong>');
		$button_text = __('Install Elementor', 'demo-your-work');
	}

	$button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';

	printf('<div class="error"><p>%1$s</p>%2$s</div>', __($message), $button);
}

	/**
     * Check if a plugin is installed
     *
     * @since v2
     */
    function Demo_Your_Work_is_plugin_installed($basename) {
        if (!function_exists('get_plugins')) {
            include_once ABSPATH . '/wp-admin/includes/plugin.php';
        }

        $installed_plugins = get_plugins();

        return isset($installed_plugins[$basename]);
    }
