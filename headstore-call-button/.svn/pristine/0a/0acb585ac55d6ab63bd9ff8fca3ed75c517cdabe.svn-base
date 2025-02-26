<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://getpaycall.com/
 * @since             0.4.1
 * @package           Headstore_Config
 *
 * @wordpress-plugin
 * Plugin Name:       Headstore PAYCALL Button
 * Plugin URI:        http://getpaycall.com
 * Description:       Headstore PAYCALL Button is a plugin for paid video communication. You can place a "PAYCALL Button" on your page and "sell your knowledge" directly through the browser.
 * Version:           0.5.5
 * Author:            Headstore AG
 * Author URI:        http://getpaycall.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       headstore-call-button
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_headstore_config() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/headstore-call-button-activator.php';
	Headstore_Config_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_headstore_config() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/headstore-call-button-deactivator.php';
	Headstore_Config_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_headstore_config' );
register_deactivation_hook( __FILE__, 'deactivate_headstore_config' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/headstore-call-button.php';


function wpjms_frontend_resume_form_fields( $fields ) {
	/**
	*	Add additional fields to resume for PAYALL Button (wpjms_frontend_resume plugin)
	**/
	
	$fields['resume_fields']['paycallEmail'] = array(
	    'label' => __( 'PAYCALL email', 'PAYCALL email' ),
	    'type' => 'text',
	    'required' => false,
	    'placeholder' => '',
	    'priority' => 6
	);
	
	$fields['resume_fields']['paycallPassword'] = array(
	    'label' => __( 'PAYCALL Password', 'PAYCALL Password' ),
	    'type' => 'text',
	    'required' => false,
	    'placeholder' => '',
	    'priority' => 6
	);
	$fields['resume_fields']['paycallProfile'] = array(
	    'label' => __( 'PAYCALL Profile', 'PAYCALL Profile' ),
	    'type' => 'text',
	    'required' => false,
	    'placeholder' => '',
	    'priority' => 6
	);
	$fields['resume_fields']['paycallButtonType'] = array(
	    'label' => __( 'PAYCALL Button Type', 'PAYCALL Button Type' ),
	    'type' => 'text',
	    'required' => false,
	    'placeholder' => '',
	    'priority' => 6
	);
	return $fields;
}
function wpjms_admin_resume_form_fields( $fields ) {
	
	/* Not the same field?
		$fields['paycallEmail'] = array(
	   'label' => __( 'PAYCALL email', 'PAYCALL email' ),
	    'type' => 'text',
	    'required' => false,
	    'placeholder' => 'PAYCALL email',
	    'priority' => 6
	);*/

	return $fields;
	
}

function hookWPJobManager() {
	add_filter( 'submit_resume_form_fields', 'wpjms_frontend_resume_form_fields' );
	add_filter( 'resume_manager_resume_fields', 'wpjms_admin_resume_form_fields' );
	
}


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.4.1
 */
function run_headstore_config() {

	$plugin = new Headstore_Config();
	$plugin->run();
	
	hookWPJobManager();

}
run_headstore_config();
