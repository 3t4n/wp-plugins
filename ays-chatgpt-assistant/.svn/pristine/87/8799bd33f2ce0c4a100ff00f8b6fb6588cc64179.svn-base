<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ays-pro.com/
 * @since             1.0.0
 * @package           Ays_Chatgpt_Assistant
 *
 * @wordpress-plugin
 * Plugin Name:       AI Assistant with ChatGPT by AYS
 * Plugin URI:        https://https://ays-pro.com/wordpress
 * Description:       Ays ChatGPT Assistant Plugin for Wordpress
 * Version:           1.0.0
 * Author:            Ays ChatGPT Assistant Team
 * Author URI:        https://ays-pro.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ays-chatgpt-assistant
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
define( 'CHATGPT_ASSISTANT_VERSION', '1.0.0' );
define( 'CHATGPT_ASSISTANT_NAME_VERSION', '1.0.0' );
define( 'CHATGPT_ASSISTANT_NAME', 'ays-chatgpt-assistant' );
define( 'CHATGPT_ASSISTANT_DB_PREFIX', 'ayschatgpt_' );

if( ! defined( 'CHATGPT_ASSISTANT_BASENAME' ) )
    define( 'CHATGPT_ASSISTANT_BASENAME', plugin_basename( __FILE__ ) );

if( ! defined( 'CHATGPT_ASSISTANT_DIR' ) )
    define( 'CHATGPT_ASSISTANT_DIR', plugin_dir_path( __FILE__ ) );

if( ! defined( 'CHATGPT_ASSISTANT_BASE_URL' ) )
    define( 'CHATGPT_ASSISTANT_BASE_URL', plugin_dir_url(__FILE__ ) );

if( ! defined( 'CHATGPT_ASSISTANT_ADMIN_PATH' ) )
    define( 'CHATGPT_ASSISTANT_ADMIN_PATH', plugin_dir_path( __FILE__ ) . 'admin' );

if( ! defined( 'CHATGPT_ASSISTANT_ADMIN_URL' ) )
    define( 'CHATGPT_ASSISTANT_ADMIN_URL', plugin_dir_url( __FILE__ ) . 'admin' );

if( ! defined( 'CHATGPT_ASSISTANT_PUBLIC_PATH' ) )
    define( 'CHATGPT_ASSISTANT_PUBLIC_PATH', plugin_dir_path( __FILE__ ) . 'public' );

if( ! defined( 'CHATGPT_ASSISTANT_PUBLIC_URL' ) )
    define( 'CHATGPT_ASSISTANT_PUBLIC_URL', plugin_dir_url( __FILE__ ) . 'public' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-chatgpt-assistant-activator.php
 */
function activate_chatgpt_assistant() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-chatgpt-assistant-activator.php';
	Chatgpt_Assistant_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-chatgpt-assistant-deactivator.php
 */
function deactivate_chatgpt_assistant() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-chatgpt-assistant-deactivator.php';
	Chatgpt_Assistant_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_chatgpt_assistant' );
register_deactivation_hook( __FILE__, 'deactivate_chatgpt_assistant' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-chatgpt-assistant.php';
// require plugin_dir_path( __FILE__ ) . 'assistant/chatgpt-assistant-block.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_chatgpt_assistant() {

	$plugin = new Chatgpt_Assistant();
	$plugin->run();

}
run_chatgpt_assistant();
