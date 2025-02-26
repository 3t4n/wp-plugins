<?php
/**
 * @package NKS_Search
 * @version 1.0.1
 */
/*
Plugin Name: NK Search
Plugin URI: https://github.com/nandakrishnancse/nk-search/tree/master
Description: WP Search Custom Form with Auto Suggestion.
Author: NandaKrishnan
Version: 1.0.1
Author URI: https://github.com/nandakrishnancse
*/

if ( ! defined( 'NKS_ABSPATH' ) ) {
	define( 'NKS_ABSPATH', dirname( __FILE__ ) );
}
if ( ! defined( 'NKS_INCLUDES' ) ) {
	define( 'NKS_INCLUDES', dirname( __FILE__ ) . '/nk-includes' );
}
if ( ! defined( 'NKS_ASSETS' ) ) {
	define( 'NKS_ASSETS', plugin_dir_url( __FILE__ ) . '/nk-assets' );
}
if ( ! defined( 'NKS_PLUGIN_URL' ) ) {
	define( 'NKS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
require_once NKS_INCLUDES . '/assets.php';
require_once NKS_INCLUDES . '/shortcode.php';
require_once NKS_INCLUDES . '/ajax.php';
require_once NKS_INCLUDES . '/namespace.php';

/**
 * Initialize namespace Bootstrapper.
 */
add_action( 'plugins_loaded', 'NKS_Search\bootstrap' );
