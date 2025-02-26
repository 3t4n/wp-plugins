<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.davidschlegl.at
 * @since             1.0.0
 * @package           Bfelan
 *
 * @wordpress-plugin
 * Plugin Name:       External Links Advertisement Note
 * Plugin URI:        www.blogofant.de/elan
 * Description:       External links will be marked as advertisement. You can choose your own word and style.
 * Version:           1.0.2
 * Author:            David Schlegl
 * Author URI:        https://www.davidschlegl.at
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bfelan
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Plugin Links
add_filter( 'plugin_row_meta', 'bfelan_meta_links', 10, 2 );

function bfelan_meta_links( $links, $file ) {

	$plugin = plugin_basename(__FILE__);
	
	// create the links
	if ( $file == $plugin ) {
		
		$supportlink = 'https://wordpress.org/support/plugin/external-links-advertisement-note/';
		$donatelink = 'https://www.paypal.me/davidschlegl';
		$reviewlink = 'https://de.wordpress.org/plugins/external-links-advertisement-note/#reviews';
		$twitterlink = 'https://twitter.com/DavidSchlegl';
		$facebooklink = 'https://facebook.com/davidschlegl.at';
		$iconstyle = 'style="-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;"';
		
		return array_merge( $links, array(
			'<a href="' . $twitterlink . '"><span class="dashicons dashicons-twitter" ' . $iconstyle . 'title="David Schlegl on Twitter"></span></a>',
			'<a href="' . $facebooklink . '"><span class="dashicons dashicons-facebook" ' . $iconstyle . 'title="David Schlegl on Facebook"></span></a>',
			'<a href="' . $reviewlink . '"><span class="dashicons dashicons-star-filled"' . $iconstyle . 'title="Review this Plugin"></span></a>',
			'<a href="' . $supportlink . '"> <span class="dashicons dashicons-lightbulb" ' . $iconstyle . 'title="Plugin Support"></span></a>',
			'<a href="' . $donatelink . '"><span class="dashicons dashicons-heart"' . $iconstyle . 'title="Donate"></span></a>'
		) );
	}
	
	return $links;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BFELAN_VERSION', '1.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bfelan-activator.php
 */
function activate_bfelan() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bfelan-activator.php';
	Bfelan_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bfelan-deactivator.php
 */
function deactivate_bfelan() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bfelan-deactivator.php';
	Bfelan_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bfelan' );
register_deactivation_hook( __FILE__, 'deactivate_bfelan' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bfelan.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bfelan() {

	$plugin = new Bfelan();
	$plugin->run();

}
run_bfelan();
