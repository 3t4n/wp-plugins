<?php

/**
 *
 *
 * @link              https://readysteadywebsites.com
 * @since             1.0.0
 * @package           RSW_BeaverBuilder_Responsive_UI
 *
 * @wordpress-plugin
 * Plugin Name:       Responsive UI for Beaver Builder
 * Plugin URI:        https://readysteadywebsites.com/bb-ui/
 * Description:       When you have set Visibility settings in Beaver Builder, it's not easy to see what rows, columns and modules appear on different devices. This plugin adds a visual guide with a click of a button.
 * Version:           1.0.5
 * Author:            Ready Steady Websites
 * Author URI:        https://readysteadywebsites.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rsw-bb-responsive-ui
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

/**
 * Current plugin version.
 */
define('RSW_BB_RESPONSIVE_UI_VERSION', '1.0.5');

/**
 * Plugin activation
 * This action is documented in includes/class-rsw-bb-responsive-ui-activator.php
 */
function activate_RSW_BeaverBuilder_Responsive_UI()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-rsw-bb-responsive-ui-activator.php';
    RSW_BeaverBuilder_Responsive_UI_Activator::activate();
}

/**
 * Plugin deactivation.
 * This action is documented in includes/class-rsw-bb-responsive-ui-deactivator.php
 */
function deactivate_RSW_BeaverBuilder_Responsive_UI()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-rsw-bb-responsive-ui-deactivator.php';
    RSW_BeaverBuilder_Responsive_UI_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_RSW_BeaverBuilder_Responsive_UI');
register_deactivation_hook(__FILE__, 'deactivate_RSW_BeaverBuilder_Responsive_UI');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-rsw-bb-responsive-ui.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_RSW_BeaverBuilder_Responsive_UI()
{
    $plugin = new RSW_BeaverBuilder_Responsive_UI();
    $plugin->run();
}
run_RSW_BeaverBuilder_Responsive_UI();
