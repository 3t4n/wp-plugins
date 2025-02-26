<?php

/**
 * Pressfore Preloaders
 *
 * @link              http://pressfore.com
 * @since             1.0.0
 * @package           Pressfore Preloaders
 *
 * Plugin Name:       Pressfore Preloaders
 * Plugin URI:        http://pressfore.com/item/pressfore-preloaders/
 * Description:       Best free wordpress preloaders plugin for creating stunning spinners/preloaders which will be displayed while your page is loading.
 * Version:           1.0.2
 * Author:            pressfore
 * Author URI:        http://pressfore.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       green-ink-pro
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if( !defined('PRESSFORE_PRELOADERS_ASSETS_DIR') ) {
	define('PRESSFORE_PRELOADERS_ASSETS_DIR', plugin_dir_url(__FILE__) . 'assets/');
}

if( !defined('PRESSFORE_PRELOADERS_DIR') ) {
	define('PRESSFORE_PRELOADERS_DIR', plugin_dir_path(__FILE__));
}


function pressfore_preloaders_load_customize_classes() {

	require_once 'inc/control-button-preview.php';
	require_once 'inc/control-radio-image.php';
	require_once 'inc/options.php';

}

add_action( 'customize_register', 'pressfore_preloaders_load_customize_classes', 0 );


function pressfore_preloaders_init() {

	require_once 'inc/setup.php';
	require_once 'inc/preloaders.php';
	new Pressfore_Preloaders();

	require_once 'inc/render.php';
}

add_action( 'init', 'pressfore_preloaders_init' );

/**
 *
 * Default option getter/setter
 *
 * @param $name
 * @param $default
 * @return string
 */
function pressfore_preloaders_options($name, $default = false) {
	$options = ( get_option( 'pf_loaders' ) ) ? get_option( 'pf_loaders' ) : null;

	if ( isset( $options[ $name ] ) ) {
		return apply_filters( "pf_loaders_$name", $options[ $name ] );
	}

	return apply_filters( "pf_loaders_$name", $default );
}