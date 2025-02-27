<?php
/**
 * Plugin Name:       WP DPE-GES
 * Description:       Display the DPE and GES labels of a property.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1.6
 * Author:            Sébastien Renaudeau
 * Author URI: 		  https://www.renaudeau.fr
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wpdpeges
 *
 * @package           create-block
 */

if ( ! defined( 'WPDPEGES_PLUGIN_FILE' ) ) {
	define( 'WPDPEGES_PLUGIN_FILE', __FILE__ );
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/writing-your-first-block-type/
 */
function create_block_wp_dpe_ges_block_init() {
    register_block_type( __DIR__ );
    wp_set_script_translations( 'cgb-wp-dpe-ges-editor-script', 'wpdpeges', plugin_dir_path( WPDPEGES_PLUGIN_FILE ) . 'languages');
}
add_action( 'init', 'create_block_wp_dpe_ges_block_init' );
/**
 * i18n for Shortcode
 */
function wpdpeges_languages(){
    load_plugin_textdomain( 'wpdpeges', false, dirname( plugin_basename( WPDPEGES_PLUGIN_FILE ) ) . '/languages/' );
}
add_action('plugins_loaded', 'wpdpeges_languages' );

/**
 * Settings Page
 */
require_once plugin_dir_path( WPDPEGES_PLUGIN_FILE ) . 'settings-page.php';

/**
 * Shortcode
 */
require_once plugin_dir_path( WPDPEGES_PLUGIN_FILE ) . 'shortcode/shortcode.php';

/**
 * Classic Editor Initializer.
 */
require_once plugin_dir_path( WPDPEGES_PLUGIN_FILE ) . 'TinyMCE/tiny-mce-buttons.php';