<?php
/**
*  Plugin Name:       Elementor Template Importer
*  Plugin URI:        https://webxthemes.com/am-demo-importer/
*  Description:       This plugin allows you to easily import dummy content with Elementor.
*  Version:           0.0.9
*  Requires at least: 5.2
*  Requires PHP:      7.4
*  Author:            patrickoslo
*  Author URI:        https://webxthemes.com
*  License:           GPL v2 or later
*  License URI:       https://www.gnu.org/licenses/gpl-2.0.html
*  Text Domain:       am-demo-importer
**/

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

add_action('init', 'am_demo_importer_check_activation_redirect');

function am_demo_importer_check_activation_redirect() {
  if (is_admin() && get_option('am_demo_importer_plugin_activated', false)) {
    delete_option('am_demo_importer_plugin_activated');
    wp_safe_redirect(admin_url('admin.php?page=elementortemplateimporter-wizard'));
    exit;
  }
}

register_activation_hook(__FILE__, 'am_demo_importer_activate');

function am_demo_importer_activate() {
    add_option('am_demo_importer_plugin_activated', true);
}

// License verification constant
define( 'ADI_SECRET_KEY', '670774bb523d97.74787859' );
define( 'ADI_FILE', __FILE__ );
define( 'ADI_BASE', plugin_basename( ADI_FILE ) );
define( 'ADI_DIR', plugin_dir_path( ADI_FILE ) );
define( 'ADI_VER', '0.0.7' );
define( 'ADI_URL', plugins_url( '/', ADI_FILE ) );
define( 'ADI_ADMIN_CONTROL_PANEL_ENDPOINT', 'https://webxthemes.com/wp-json/am-json-control-panel/v2/' );
define( 'ADI_THEMES_MAIN_URL', "https://webxthemes.com" );

if( ! function_exists('get_plugin_data') ) {
  require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
require ADI_DIR .'theme-wizard/config.php';