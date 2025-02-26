<?php
/*
 * Plugin Name:       WP Client Testimonials
 * Plugin URI:        https://wordpress.org/plugins/alpharage-testimonials/
 * Description:       WP Client Testimonials is an awesome full featured plugin for managing testimonials on your site.
 * Version:           1.0.0
 * Author:            AlphaRages
 * Author URI:        http://alpharages.com
 * License:           GPL-2.0+
 * Text Domain:       alpharage-testimonials
 * Domain Path:       /languages
 * Tags: 			  clients testimonial , testimonial , testimonials , client testimonials , clients feedback ,reviews
 */

// If this file is called directly, abort.


if (  defined( 'ALPRT_VERSION' ) ) {
	define( 'ALPRT_VERSION', '1.0.0' );
}



/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-alpharage-testimonials-activator.php
 */
function alprt_activate_testimonials() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-alpharage-testimonials-activator.php';
	ALPRT_testimonials_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-alpharage-testimonials-deactivator.php
 */
function alprt_deactivate_testimonials() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-alpharage-testimonials-deactivator.php';
	ALPRT_testimonials_Deactivator::deactivate();
}
    

register_activation_hook( __FILE__, 'alprt_activate_testimonials' );
register_deactivation_hook( __FILE__, 'alprt_deactivate_testimonials' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-alpharage-testimonials.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function alprt_run_testimonials() {

	$plugin = new ALPRT_testimonials();
	$plugin->run();

}
alprt_run_testimonials();
