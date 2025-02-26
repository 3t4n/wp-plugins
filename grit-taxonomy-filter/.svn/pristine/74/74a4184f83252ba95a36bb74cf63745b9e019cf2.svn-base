<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://grittechnologies.com
 * @since             1.0.0
 * @package           Grit_Taxonomy_Filter
 *
 * @wordpress-plugin
 * Plugin Name:       GRIT Taxonomy Filter
 * Plugin URI:        https://grittechnologies.com/plugins/
 * Description:       It adds a taxonomy filter upto three levels in page or post using shortcode.
 * Version:           1.0.0
 * Author:            Mrityunjay Kumar
 * Author URI:        https://profiles.wordpress.org/mrityunjay/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       grit-taxonomy-filter
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
define( 'Grit_Taxonomy_Filter_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_grit_taxonomy_filter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-grit-taxonomy-filter-activator.php';
	grit_taxonomy_filter_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_grit_taxonomy_filter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-grit-taxonomy-filter-deactivator.php';
	Grit_Taxonomy_Filter_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_grit_taxonomy_filter' );
register_deactivation_hook( __FILE__, 'deactivate_grit_taxonomy_filter' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-grit-taxonomy-filter.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_grit_taxonomy_filter() {

	$plugin = new Grit_Taxonomy_Filter();
	$plugin->run();

}
run_grit_taxonomy_filter();
