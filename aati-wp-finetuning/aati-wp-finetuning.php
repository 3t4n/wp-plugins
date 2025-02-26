<?php
/*
Plugin Name: AATI WP Finetuning
Plugin URI: https://github.com/jseutens/aati-wp-finetuning/
Description: Finetuning a WP setup by removing or adding options
Version: 0.9.2
Author: Johan Seutens
Author URI: https://www.aati.be
Text Domain: aatiwpfinetuning
Domain Path: /languages/
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
// Check if the ABSPATH constant is defined
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// Define constants used throughout the plugin
define( 'AATIWPF_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'AATIWPF_PLUGIN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'AATIWPF_PLUGIN_FNAME', plugin_basename( __FILE__ ) );
define( 'AATIWPF_PLUGIN_DIRNAME', plugin_basename( dirname( __FILE__ ) ) );
define( 'AATIWPF_VERSION', '0.9.2' );
define( 'AATIWPF_TEXTDOMAIN', 'aatiwpfinetuning');
define( 'AATIWPF_UPLOAD_DIR', wp_upload_dir() );
if (isset($_SERVER['HTTP_HOST'])) {
  define('AATIWPF_HTTP_HOST', sanitize_text_field(wp_unslash($_SERVER['HTTP_HOST'])));
} else {
  define('AATIWPF_HTTP_HOST', 'localhost');
}
if (isset($_SERVER['SERVER_NAME'])) {
  define('AATIWPF_SERVER_NAME', sanitize_text_field(wp_unslash($_SERVER['SERVER_NAME'])));
} else {
  define('AATIWPF_SERVER_NAME', 'localhost');
}
if (isset($_SERVER['REMOTE_ADDR'])) {
  define('AATIWPF_REMOTE_ADDR', sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'])));
} else {
  define('AATIWPF_REMOTE_ADDR', 'localhost');
}
// load languages
	function aatiwpf_load_textdomain() {
		load_plugin_textdomain(AATIWPF_TEXTDOMAIN,false, AATIWPF_PLUGIN_DIRNAME. '/languages');
	}
	add_action( 'plugins_loaded', 'aatiwpf_load_textdomain');
// check if the plugin is installed and active
function aatiwpf_active_plugins_contains( $name ) {
    $active_plugins = get_option( 'active_plugins' );
    foreach ( $active_plugins as $plugin_file ) {
        // Check if the plugin directory matches the directory you're looking for
        if ( $plugin_file === $name ) {
          return true;
       }
    }
    return false;
}
require('includes/shared/aatiwpf_core.php');
require('includes/shared/aatiwpf_functions.php');
require('includes/shared/aatiwp_logon.php');
require('includes/shared/aatiwpf_anti-logon_f2b.php');
if ( aatiwpf_active_plugins_contains( 'contact-form-7/wp-contact-form-7.php' ) ) {
require('includes/shared/aatiwpf_anti-spam_cf7.php');
}
if ( aatiwpf_active_plugins_contains( 'ws-form-pro/ws-form.php' ) ) {
require('includes/shared/aatiwpf_anti-spam_wsform.php');
}
require('includes/admin/aatiwpf_settings.php');
require('includes/admin/aatiwpf_admin_page.php');
require('includes/admin/aatiwpf_cron.php');
