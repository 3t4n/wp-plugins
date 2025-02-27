<?php
/**
 * @wordpress-plugin
 * Plugin Name: Entries Importing for Gravity Forms
 * Description: Import an exported entries CSV into a Gravity Forms form
 * Version:     2.6.1
 * Author:      VIA Studio
 * Author URI:  https://viastudioplugins.com/
 * Requires PHP:      7.1
 */
define('VIA_GF_ENTRIES_IMPORT_VERSION', '2.6.1');
define('VIA_GF_ENTRIES_IMPORT_PLUGIN_PATH', plugin_dir_path(__FILE__));

//Load the current WP core version
include( ABSPATH . WPINC . '/version.php' );
if (version_compare($wp_version, '5.3') < 0) {
    //If WP core is < 5.3, do a PHP version check ourselves
    $php_version = phpversion();

    if (version_compare($php_version, '7.1') < 0) {
        die('This plugin requires PHP 7.1 or higher');
    }
}

require_once __DIR__ . '/vendor/autoload.php';

add_action('gform_loaded', function () {
    if (!method_exists('GFForms', 'include_addon_framework')) {
        return;
    }

    require_once(__DIR__ . '/src/class-viaentriesimport.php');

    GFAddOn::register('\ViaGF\ViaEntriesImportAddOn');
}, 5);

function via_gravityforms_entries_import_addon() {
    return \ViaGF\ViaEntriesImportAddOn::get_instance();
}
