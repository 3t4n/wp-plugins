<?php //phpcs:ignore
/**
 * Plugin Name:       Call to Action Block - WPPOOL
 * Plugin URI:        https://block-cta.wppool.dev/
 * Description:       Call to action WordPress gutenberg block with extended customization and flexible setting options
 * Version:           2.1.1
 * Author:            WPPOOL
 * Author URI:        https://wppool.dev
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cta-gutenberg
 * Requires at least: 5.0
 * Tested up to:      6.3
 *
 * CTAGutenberg Blocks
 *
 * @since CTAGutenberg 1.0
 * @package cta-gutenberg
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CTAGB_VERSION', '2.1.1' );
define( 'CTAGB__FILE__', __FILE__ );
define( 'CTAGB_DIR_PATH', plugin_dir_path( CTAGB__FILE__ ) );
define( 'CTAGB_FILE_PATH', plugin_dir_path( __FILE__ ) );
define( 'CTAGB_URL', plugins_url( '', __FILE__ ) );
define( 'CTAGB_DIR_URL', plugin_dir_url( __FILE__ ) );

/**
 * Run when plugin activate
 *
 * @return  void
 */
function my_activation_hook() {
	if ( ! function_exists( 'register_block_type' ) ) {
		$plugin_data = get_plugin_data( __FILE__, false );
		$message     = '<div class="error"><p>' . esc_html( 'CTA Gutenberg deactivated! It need WordPress version higher than 5.0.0 or ' ) . '<a target="_blank" href="' . esc_url( 'https://wordpress.org/plugins/gutenberg/' ) . '">' . esc_html( 'Gutenberg' ) . '</a>' . esc_html( ' plugin to run.' ) . '</p></div>';
		echo wp_kses_post( $message );
		exit;
	}
}

/**
 * Gutenberg begin
 *
 * @return  void
 */
function cta_gutenberg_begin() {
	include_once CTAGB_DIR_PATH . 'init.php';
	CTAGutenberg::instance();
}

register_activation_hook( __FILE__, 'my_activation_hook' );

add_action( 'plugins_loaded', 'cta_gutenberg_begin', 20 );
