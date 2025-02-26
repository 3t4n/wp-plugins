<?php
/**
 * Plugin Name: Basic Visitor Counter
 * Plugin URI: https://www.trickyenough.com
 * Description: A simple WordPress plugin to count website visitors with admin control for visitor tracking.
 * Version: 1.2.4
 * Author: Trickyenough
 * Author URI: https://github.com/vishvajit424
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: basic-visitor-counter
 */ 

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Include required files
require_once plugin_dir_path(__FILE__) . 'includes/class-basivicoun-core.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-basivicoun-admin.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-basivicoun-tracker.php';
// Ensure the activation hook is called in the main plugin file
register_activation_hook(__FILE__, ['Basivicoun_Core', 'activate']);
register_deactivation_hook(__FILE__, ['Basivicoun_Core', 'deactivate']);
// Initialize the plugin
function basivicoun_init() {
    $basivicoun_core = new Basivicoun_Core();
    $basivicoun_core->initialize();
}
add_action('plugins_loaded', 'basivicoun_init');
