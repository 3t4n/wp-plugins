<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              pridethemes.com
 * @since             1.0.0
 * @package           Awesome_Instagram_Feed
 *
 * @wordpress-plugin
 * Plugin Name:       Awesome Instagram Feed
 * Plugin URI:        pridethemes.com/plugins/awesome-instagram-feed
 * Description:       Awesome Instagram Feed is a very lighweight plugin used to create charming galleries of Instagram images.You can have two layout.You can either showcase instagram images into slider layout or grid layout.Use fully responsive and mobile friendly plugin to attract your website’s audience in a flash
 * Version:           1.0.0
 * Author:            Sushil Thapa
 * Author URI:        pridethemes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       awesome-instagram-feed
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
define( 'AWESOME_INSTAGRAM_FEED_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-awesome-instagram-feed-activator.php
 */
function activate_awesome_instagram_feed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-awesome-instagram-feed-activator.php';
	Awesome_Instagram_Feed_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-awesome-instagram-feed-deactivator.php
 */
function deactivate_awesome_instagram_feed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-awesome-instagram-feed-deactivator.php';
	Awesome_Instagram_Feed_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_awesome_instagram_feed' );
register_deactivation_hook( __FILE__, 'deactivate_awesome_instagram_feed' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-awesome-instagram-feed.php';

require plugin_dir_path( __FILE__ ) . '/inc/customizer-sections.php';

require plugin_dir_path( __FILE__ ) . '/inc/awesome-instagram-feed-customizer-default.php';
require plugin_dir_path( __FILE__ ) . 'includes/instagram-shortcode-functions.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_awesome_instagram_feed() {

	$plugin = new Awesome_Instagram_Feed();
	$plugin->run();

}
run_awesome_instagram_feed();

function awesome_istragram_feed_scripts() {

    wp_enqueue_style( 'ng-fontawesome-css', plugin_dir_url( __FILE__ ) . 'public/css/fontawesome.css');
    wp_enqueue_script( 'awesome_slick_js', plugin_dir_url( __FILE__ ) . 'public/js/slick.js' , array('jquery') , false, true);
    wp_enqueue_script( 'awesome_spectragram_js', plugin_dir_url( __FILE__ ) . 'public/js/spectragram.js' , array('jquery') , false, true);

    wp_enqueue_script( 'instagram_custom_js', plugin_dir_url( __FILE__ ) . 'public/js/instagram-custom.js' , array('jquery') , false, true);
}
add_action( 'wp_enqueue_scripts', 'awesome_istragram_feed_scripts' );
