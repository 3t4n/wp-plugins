<?php
/**
 * Plugin Name:       Neve Hooks
 * Description:       Easily add your own content in Neve using the Hooks panel in customizer.
 * Version:           1.0.1
 * Author:            ThemeIsle
 * Author URI:        https://themeisle.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       neve-hooks
 * Domain Path:       /languages
 * WordPress Available:  yes
 * Requires License:    no
 */

/**
 * Neve Hooks Init
 */
function neve_hooks_init() {

	/**
	 * Check if Neve theme is active
	 */
	if ( defined( 'NEVE_VERSION' ) && function_exists( 'neve_hooks' ) ) {

		define( 'NEVE_HOOKS_DIR', plugin_dir_path(  __FILE__) );

		require_once NEVE_HOOKS_DIR . 'includes/neve-hooks-customizer.php';
		require_once NEVE_HOOKS_DIR . 'includes/neve-hooks-markup.php';
	}
}
add_action( 'after_setup_theme', 'neve_hooks_init' );

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function neve_hooks_load_textdomain() {
    load_plugin_textdomain( 'neve-hooks', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

add_action( 'init', 'neve_hooks_load_textdomain' );
