<?php

/**
 * Plugin Name:		Custom WP Framework
 * Description:		Custom WP Framework allows you to create custom post types through a user-friendly interface - no coding knowledge required! 
 * Version:	        1.0.0
 * Author: 	        Pull Clicks
 * Author URI:  	https://pullclicks.com/
 * License:      	GPLv2
 * License URI: 	https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:		custom-wp-framework-text-domain
 */

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

// Load required classes.
use Custom_WP_Framework\Includes\CWF_Plugin;
use Custom_WP_Framework\Includes\Installers\{CWF_Activator, CWF_Deactivator, CWF_Uninstaller};

/**
 * The version number of the plugin.
 * 
 * @since 	1.0.0
 * @var 	string 
 */ 
define( 'CUSTOM_WP_FRAMEWORK_VERSION', '1.0.0' ); 

/**
 * The root folder of the plugin.
 * 
 * @since 	1.0.0
 * @var 	string
 */
define( 'CUSTOM_WP_FRAMEWORK_FOLDER', trailingslashit( plugin_dir_path( __FILE__ ) ) ); 

/**
 * The URI-friendly name of the plugin.
 * 
 * @since 	1.0.0
 * @var 	string
 */
define( 'CUSTOM_WP_FRAMEWORK_PLUGIN_NAME', 'custom-wp-framework' ); 

/**
 * The text domain of the plugin.
 * 
 * @since 	1.0.0
 * @var 	string
 */
define( 'CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN', 'custom-wp-framework-text-domain' );

/**
 * Activate the plugin.
 * 
 * @since 	1.0.0
 * @param 	void
 * @return 	void
 */
function activate_custom_wp_framework() {

	/**
	 * Function that runs all installation code for the plugin. 
	 */
	CWF_Activator::activate_cwf_plugin();
}

/**
 * Deactivate the plugin.
 * 
 * @since 	1.0.0
 * @param 	void
 * @return 	void
 */
function deactivate_custom_wp_framework() {

	/** 
	 * Function that runs all deactivation code for the plugin.
	 */
	CWF_Deactivator::deactivate_cwf_plugin();
}

/**
 * Uninstall the plugin.
 * 
 * @since 	1.0.0
 * @param 	void
 * @return 	void
 */
function uninstall_custom_wp_framework() {

	/**
	 * Function that runs all uninstall code for the plugin.
	 */
	CWF_Uninstaller::uninstall_cwf_plugin();
}

/**
 * Set the activation method for the plugin.
 */
register_activation_hook( __FILE__ , 'activate_custom_wp_framework' );

/**
 * Set the deactivation method for the plugin.
 */
register_deactivation_hook( __FILE__ , 'deactivate_custom_wp_framework' );

/**
 * Set the uninstall hook for the plugin. 
 */
register_uninstall_hook( __FILE__ , 'uninstall_custom_wp_framework' );

/**
 * Include the plugin autoloader so classes can be loaded dynamically.
 */
require_once( trailingslashit( dirname( __FILE__ ) ) . 'includes/autoloader.php' );

/**
 * Function to execute plugin.
 */
function run_custom_wp_framework() {

	/**
	 * Create new instance of the main plugin class.
	 * 
	 * @since	1.0.0
	 * @var		object		$plugin
	 */ 
	$cwf_plugin = new CWF_Plugin();

}

/**
 * Execute Custom WP Framework plugin.
 */
run_custom_wp_framework();