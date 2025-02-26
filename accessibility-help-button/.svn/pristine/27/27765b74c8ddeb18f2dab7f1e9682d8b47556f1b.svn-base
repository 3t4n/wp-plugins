<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.stpetedesign.com
 * @since             1.0.1
 * @package           Aa508_Call
 *
 * @wordpress-plugin
 * Plugin Name:       Accessibility Help Button
 * Plugin URI:        https://www.stpetedesign.com/pro-accessibility-button/
 * Description:       This plugin helps your websites accessibility and also helps you stay WCAG compliant by allowing a disabled person get help accessing your website if they need it.
 * Version:           1.1
 * Author:            StPeteDesign
 * Author URI:        https://www.stpetedesign.com/ada-section-508-compliant/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       accessibility-help-button
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('AA508_CALL_VERSION', '1.0.1');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-aa-call-activator.php
 */
function activate_aa508_call() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-aa-call-activator.php';
    Aa508_Call_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-aa-call-deactivator.php
 */
function deactivate_aa508_call() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-aa-call-deactivator.php';
    Aa508_Call_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_aa508_call');
register_deactivation_hook(__FILE__, 'deactivate_aa508_call');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-aa-call.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_aa508_call() {

    $plugin = new Aa508_Call();
    $plugin->run();
}

run_aa508_call();

add_action('init', 'aa508_init');

function aa508_init() {
    add_filter('pre_update_option_button-text', 'aa508_update_field_button_text', 10, 2);
    add_filter('pre_update_option_ass-label', 'aa508_update_field_ass_label', 10, 2);
    add_filter('pre_update_option_phone_number', 'aa508_update_field_phone_number', 10, 2);
}

function aa508_update_field_ass_label($new_value, $old_value) {
    if (empty(sanitize_text_field($new_value))) {
        return $old_value;
    } else {
        return sanitize_text_field($new_value);
    }
}

function aa508_update_field_button_text($new_value, $old_value) {
   if (empty(sanitize_text_field($new_value))) {
        return $old_value;
    } else {
        return sanitize_text_field($new_value);
    }
}

function aa508_update_field_phone_number($new_value, $old_value) {
   if (empty(sanitize_text_field($new_value))) {
        return $old_value;
    } else {
        return sanitize_text_field($new_value);
    }
}
