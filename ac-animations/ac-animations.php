<?php
/**
 * Plugin Name: AC Animations
 * Description: Simplest way to add animations to all pages. Improve user's engagement with one click installation, no configuration needed.
 * Author: AnimateConversions
 * Author URI: https://animateconversions.com
 * Version: 1.0.1
 * Requires at least: 4.1
 * Requires PHP: 5.4.16
 * License: GPLv2 or later
 */


// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

define( 'ACANIMATIONS_PLUGIN_DIR', plugin_dir_path(__FILE__) );

// Include the admin page logic
require_once ACANIMATIONS_PLUGIN_DIR . 'includes/helpers.php';
require_once ACANIMATIONS_PLUGIN_DIR . 'includes/admin-page.php';
require_once ACANIMATIONS_PLUGIN_DIR . 'includes/tab-settings.php';
require_once ACANIMATIONS_PLUGIN_DIR . 'includes/tab-why.php';
require_once ACANIMATIONS_PLUGIN_DIR . 'includes/tab-license.php';


function acanimations_set_default_options() {
    // Use get_option() to check if the option already exists, and if not, set default values.
    if (!get_option('acanimations_load_location')) {
        update_option('acanimations_load_location', 'head');
    }
    if (!get_option('acanimations_elements')) {
        update_option('acanimations_elements', 'h1, h2, img');
    }
    if (!get_option('acanimations_style')) {
        update_option('acanimations_style', 'slide_up');
    }
    if (!get_option('acanimations_navigation')) {
        update_option('acanimations_navigation', 'loading');
    }
}
register_activation_hook(__FILE__, 'acanimations_set_default_options');

function acanimations_enqueue_script() {
    if (!is_admin()) {
        $load_location = get_option('acanimations_load_location');
        $in_footer = ($load_location !== 'head'); // If not "head", load in the footer

        // Enqueue the script with a conditional load location
        acanimations_enqueue_script_tag($in_footer);
    }
}
add_action('wp_enqueue_scripts', 'acanimations_enqueue_script');

add_filter('script_loader_tag', 'acanimations_add_attributes', 10, 2 );

// Load custom styles for the admin page
function acanimations_enqueue_admin_styles() {
    wp_enqueue_style('acanimations-admin-styles', plugin_dir_url(__FILE__) . 'public/admin-styles.css');
    wp_enqueue_script('acanimations-admin-scripts', plugin_dir_url(__FILE__) . 'public/admin-scripts.js');
}
add_action('admin_enqueue_scripts', 'acanimations_enqueue_admin_styles');

// Register settings
function acanimations_register_settings() {
    // Register options to store in wp_options table
    register_setting('acanimations_settings_group', 'acanimations_load_location');
    register_setting('acanimations_settings_group', 'acanimations_elements');
    register_setting('acanimations_settings_group', 'acanimations_navigation');
    register_setting('acanimations_settings_group', 'acanimations_style');
    register_setting('acanimations_license_group', 'acanimations_license_key');
}
add_action('admin_init', 'acanimations_register_settings');

