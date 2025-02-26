<?php
/*
Plugin Name: Document Library Hub
Description: Organizing documents in customizable formats, with advanced access control options.
Version: 1.0.0
Author: WPRetro
Author URI: https://wpretro.com/document-library-hub/
Text Domain: document-library-hub
Domain Path: /languages/
Requires at least: 5.0
Tested up to: 6.7.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

use Wpretro\DocumentLibraryHub\Main;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'DLHP_PLUGIN_VERSION' ) ) {
	define( 'DLHP_PLUGIN_VERSION', '1.0.0' );
}

if ( ! defined( 'DLHP_PLUGIN_FILE' ) ) {
	define( 'DLHP_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'DLHP_PLUGIN_URL' ) ) {
	define( 'DLHP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

// Include autoloader.
require_once __DIR__ . '/vendor/autoload.php';

new Main();

// Register activation hook to set the flush rewrite rules flag
register_activation_hook( DLHP_PLUGIN_FILE, function() {
    update_option( 'dlhp_flush_rewrite_rules', true );
} );

function dlhp_load_plugin_textdomain() {
    load_plugin_textdomain( 'document-library-hub' );
}
add_action( 'plugins_loaded', 'dlhp_load_plugin_textdomain' );