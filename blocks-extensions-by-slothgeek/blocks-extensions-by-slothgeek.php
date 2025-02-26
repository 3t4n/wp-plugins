<?php
/**
 * Plugin Name:       Blocks Extensions by SlothGeek
 * Plugin URI:        https://www.slothgeek.com/plugins/blocks-extensions-by-slothgeek/
 * Description:       Extensions of visibility, animation a more for blocks.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.7
 * Author:            SlothGeek
 * Author URI:        https://slothgeek.com/
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       slothtenberg-extensions
 * Domain Path: 	  /languages
 *
 * @package           sg-block
 */

define( 'SEXT_URL', plugin_dir_url( __FILE__ ) );

function create_block_slothtenberg_extensions_block_init() {
	register_block_type( __DIR__ . '/build' );

	wp_enqueue_style(
		'sext-style',
		SEXT_URL . 'build/style-index.css',
		array(),
		'initial'
	);

	wp_register_script(
		'aosjs',
		'https://unpkg.com/aos@2.3.1/dist/aos.js',
		'2.3.1',
		true
	);

	wp_enqueue_script(
		'sext-js',
		SEXT_URL.'assets/javascript/sext.js', array('aosjs'),
		'1.0.2',
		true
	);

	$script_handle = generate_block_asset_handle( 'sg-block/slothtenberg-extensions', 'editorScript' );
	wp_set_script_translations( $script_handle, 'slothtenberg-extensions', plugin_dir_path( __FILE__ ) . 'languages' );
}
add_action( 'init', 'create_block_slothtenberg_extensions_block_init' );

function slothtenberg_extensions_load_textdomain( $mofile, $domain ) {
	if ( 'slothtenberg-extensions' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
		$locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
		$mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
	}
	return $mofile;
}
add_filter( 'load_textdomain_mofile', 'slothtenberg_extensions_load_textdomain', 10, 2 );


