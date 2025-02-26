<?php

/**
 *
 * @link              https://facebook.com/vanbien1983
 * @since             1.0.0
 * @package           Fee_Management
 *
 * @wordpress-plugin
 * Plugin Name:       Fee Management
 * Plugin URI:        fee-management
 * Description:       The Fee Management is a WordPress plugin to manage school and its entities such as classes, sections, students, ID cards, teachers, staff, fees, invoices, noticeboard and much more.
 * Version:           1.0.0
 * Author:            biencoder
 * Author URI:        https://facebook.com/vanbien1983
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fee-management
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

define('FEE_MANAGEMENT_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-fee-management-activator.php
 */
function activate_fee_management()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-fee-management-activator.php';
	Fee_Management_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-fee-management-deactivator.php
 */
function deactivate_fee_management()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-fee-management-deactivator.php';
	Fee_Management_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_fee_management');
register_deactivation_hook(__FILE__, 'deactivate_fee_management');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-fee-management.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_fee_management()
{

	$plugin = new Fee_Management();
	$plugin->run();
}
run_fee_management();
