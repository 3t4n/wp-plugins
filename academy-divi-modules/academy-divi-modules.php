<?php
/*
Plugin Name: Academy Divi Modules
Plugin URI:  https://academylms.net/academy-divi-module/
Description: Academy Divi Integration - Design your eLearning website using Divi & Academy Divi Modules.
Version:     1.0.2
Author:      kodezen
Author URI:  https://kodezen.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: academy-divi-modules
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'ACDM_VERSION', '1.0.2' );
define( 'ACDM_PLUGIN_URL', plugins_url( '/', __FILE__ ) );
define( 'ACDM_CORE_ROOT_URI', plugin_dir_url( __FILE__ ) );
define( 'ACDM_ASSETS', trailingslashit( ACDM_CORE_ROOT_URI . 'assets' ) );

if ( ! function_exists( 'acdm_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.2
 */
function acdm_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/AcademyDiviModules.php';
}
add_action( 'divi_extensions_init', 'acdm_initialize_extension' );
endif;
