<?php
/**
 * Plugin Name: AltVision - AI Alt Text Generator
 * Plugin URI: https://altvision.cstate.se
 * Description: Automatically generate accurate alt text for your images using AI vision technology.
 * Version: 1.0.7
 * Author: Christopher State
 * Author URI: https://cstate.se
 * License: GPL v2 or later
 * Text Domain: altvision-ai-alt-text-generator
 */

if (!defined('ABSPATH')) {
    exit;
}

define('ALTVISION_VERSION', '1.0.0');
define('ALTVISION_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ALTVISION_PLUGIN_URL', plugin_dir_url(__FILE__));

// Autoloader
require_once ALTVISION_PLUGIN_DIR . 'includes/class-altvision-loader.php';

// Initialize plugin
function altvision_init() {
    $loader = new AltVision_Loader();
    $loader->run();
}
add_action('plugins_loaded', 'altvision_init');


// add cleanup on deactivation:
register_deactivation_hook(__FILE__, 'altvision_deactivate');

function altvision_deactivate() {
    wp_clear_scheduled_hook('altvision_check_license');
    delete_transient('altvision_license_check');
}

register_uninstall_hook(__FILE__, 'altvision_uninstall');

function altvision_uninstall() {
    delete_option('altvision_settings');
    delete_option('altvision_license_status');
    delete_transient('altvision_license_check');
    wp_clear_scheduled_hook('altvision_check_license');
}