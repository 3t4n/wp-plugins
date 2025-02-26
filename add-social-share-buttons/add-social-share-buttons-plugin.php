<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://thedotstore.com
 * @since             1.0.0
 * @package           Add_Social_Share_Buttons_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Add Social Share Buttons for Whatsapp and Viber
 * Plugin URI:        https://wordpress.org/plugins/add-social-share-buttons/
 * Description:       Easy to Add Social Share Buttons in Custom Post, Page and Product page.  Add social buttons to share your posts for Whatsapp Facebook, Twitter, Google+, Pinterest, and Linkedin. Automatically display buttons on page, post and product page.
 * Version:           1.3
 * Author:            Thedotstore
 * Author URI:        https://thedotstore.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       add-social-share-buttons-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * define plugin basename
 */
if (!defined('ASSB_PATH')) {
    define('ASSB_PATH', plugin_dir_url(__FILE__));
}
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-add-social-share-buttons-plugin-activator.php
 */
function activate_add_social_share_buttons_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-add-social-share-buttons-plugin-activator.php';
	Add_Social_Share_Buttons_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-add-social-share-buttons-plugin-deactivator.php
 */
function deactivate_add_social_share_buttons_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-add-social-share-buttons-plugin-deactivator.php';
	Add_Social_Share_Buttons_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_add_social_share_buttons_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_add_social_share_buttons_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-add-social-share-buttons-plugin.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/constant.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_add_social_share_buttons_plugin() {

	$plugin = new Add_Social_Share_Buttons_Plugin();
	$plugin->run();

}
run_add_social_share_buttons_plugin();
