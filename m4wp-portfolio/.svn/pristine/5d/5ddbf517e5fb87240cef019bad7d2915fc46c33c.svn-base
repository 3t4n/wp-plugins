<?php
/**
 * Plugin Name:       M4WP Portfolio
 * Plugin URI:        https://wordpress.org/plugins/m4wp-portfolio/
 * Description:       Adds the custom post type Portfolio and it's taxonomies.
 * Version:           1.0.2
 * Author:            Made4WP
 * Author URI:        https://made4wp.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       m4wp-portfolio
 * Domain Path:       /languages
 *
 *
 * The plugin bootstrap file.
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-m4wp-portfolio-activator.php
 */
function activate_m4wp_portfolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-m4wp-portfolio-activator.php';
	M4wp_Portfolio_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-m4wp-portfolio-deactivator.php
 */
function deactivate_m4wp_portfolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-m4wp-portfolio-deactivator.php';
	M4wp_Portfolio_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_m4wp_portfolio' );
register_deactivation_hook( __FILE__, 'deactivate_m4wp_portfolio' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-m4wp-portfolio.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_m4wp_portfolio() {

	$plugin = new M4wp_Portfolio();
	$plugin->run();

}
run_m4wp_portfolio();
