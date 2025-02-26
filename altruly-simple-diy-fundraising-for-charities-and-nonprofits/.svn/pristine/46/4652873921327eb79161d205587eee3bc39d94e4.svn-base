<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://altruly.com
 * @since             1.0.0
 * @package           Altruly_Simple_Diy_Fundraising_For_Charities_And_Nonprofits
 *
 * @wordpress-plugin
 * Plugin Name:       Altruly Simple DIY Fundraising for Charities and Nonprofits
 * Plugin URI:        https://altruly.com/wordpress-fundraising-plugin
 * Description:       The easiest way to connect your users to your Altruly profile so that they can start building their own DIY fundraisers that raise donations for your cause.
 * Version:           1.0.0
 * Author:            Altruly, Inc.
 * Author URI:        https://altruly.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       altruly-simple-diy-fundraising-for-charities-and-nonprofits
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ALTRULY_SIMPLE_DIY_FUNDRAISING_FOR_CHARITIES_AND_NONPROFITS_PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-altruly-simple-diy-fundraising-for-charities-and-nonprofits-activator.php
 */
function activate_altruly_simple_diy_fundraising_for_charities_and_nonprofits() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-altruly-simple-diy-fundraising-for-charities-and-nonprofits-activator.php';
	Altruly_Simple_Diy_Fundraising_For_Charities_And_Nonprofits_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-altruly-simple-diy-fundraising-for-charities-and-nonprofits-deactivator.php
 */
function deactivate_altruly_simple_diy_fundraising_for_charities_and_nonprofits() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-altruly-simple-diy-fundraising-for-charities-and-nonprofits-deactivator.php';
	Altruly_Simple_Diy_Fundraising_For_Charities_And_Nonprofits_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_altruly_simple_diy_fundraising_for_charities_and_nonprofits' );
register_deactivation_hook( __FILE__, 'deactivate_altruly_simple_diy_fundraising_for_charities_and_nonprofits' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-altruly-simple-diy-fundraising-for-charities-and-nonprofits.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_altruly_simple_diy_fundraising_for_charities_and_nonprofits() {

	$plugin = new Altruly_Simple_Diy_Fundraising_For_Charities_And_Nonprofits();
	$plugin->run();

}
run_altruly_simple_diy_fundraising_for_charities_and_nonprofits();
