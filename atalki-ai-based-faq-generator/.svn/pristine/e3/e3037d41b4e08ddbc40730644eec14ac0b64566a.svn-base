<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://blackzoid.com/
 * @since             1.0.0
 * @package           Atalki_Faq_Generator
 *
 * @wordpress-plugin
 * Plugin Name:       ATALKI - AI Based FAQ Generator
 * Plugin URI:        https://www.atalki.com/
 * Description:       atalki, a No Code web platform , is the fastest way to create a FREE personalised, shareable, smart FAQ webpage from text document within seconds.
 * Version:           1.0.0
 * Author:            BlackZoid
 * Author URI:        https://blackzoid.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       atalki-faq-generator
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

if(defined("SCRIPT_DEBUG") && SCRIPT_DEBUG){
	define( 'ATALKI_FAQ_GENERATOR_VERSION', time() );	
}else{
	define( 'ATALKI_FAQ_GENERATOR_VERSION', '1.0.0' );
} 
if (!defined('ATALKI_FAQ_GENERATOR_DIR_PATH')) {
    define('ATALKI_FAQ_GENERATOR_DIR_PATH', dirname(__FILE__));      // Plugin dir
}
if (!defined('ATALKI_FAQ_GENERATOR_PLUGIN_URL')) {
    define('ATALKI_FAQ_GENERATOR_PLUGIN_URL', plugin_dir_url(__FILE__));   // Plugin url
}
if (!defined('ATALKI_FAQ_GENERATOR_SLG_BASENAME')) {
    define('ATALKI_FAQ_GENERATOR_SLG_BASENAME', basename(ATALKI_FAQ_GENERATOR_DIR_PATH));
}

if (!defined('ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN')) {
    define('ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN', "https://www.atalki.com/");
}
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-atalki-faq-generator-activator.php
 */
function activate_atalki_faq_generator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-atalki-faq-generator-activator.php';
	Atalki_Faq_Generator_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-atalki-faq-generator-deactivator.php
 */
function deactivate_atalki_faq_generator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-atalki-faq-generator-deactivator.php';
	Atalki_Faq_Generator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_atalki_faq_generator' );
register_deactivation_hook( __FILE__, 'deactivate_atalki_faq_generator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-atalki-faq-generator.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
global $atalki_plugin;
function run_atalki_faq_generator() {
	global $atalki_plugin;
	$atalki_plugin = new Atalki_Faq_Generator();
	$atalki_plugin->run();

}
run_atalki_faq_generator();

add_action("init", function() {
	if ( ! @session_id() ) {
        @session_start();
    }
});