<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpconcierges.com/plugins/lk-insight
 * @since             1.0.0
 * @package           lkinsight
 *
 * @wordpress-plugin
 * Plugin Name:       WpConcierges LinkedIn Insights
 * Plugin URI:        https://www.wpconcierges.com/plugin-resources/lk-insight/
 * Description:       Easily place the LinkedIn Insight tag on all your WordPress site pages. Plus common event tracking for woocommerce.
 * Version:           1.0.4
 * Author:            WpConcierges
 * Author URI:        https://wpconcierges.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lkinsight
 * Domain Path:       /languages
 * WC requires at least: 3.0
 * WC tested up to: 4.8
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0
 */
define( 'LKINSIGHT_VERSION', '1.0.4' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lkinsight-activator.php
 */
function activate_lkinsight() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lkinsight-activator.php';
	LkInsight_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lkinsight-deactivator.php
 */
function deactivate_lkinsight() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lkinsight-deactivator.php';
	LkInsight_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_lkinsight' );
register_deactivation_hook( __FILE__, 'deactivate_lkinsight' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-lkinsight.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_lkinsight() {

	$plugin = new LkInsight();
	$plugin->run();

}
run_lkinsight();
