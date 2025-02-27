<?php

use \DCL\Includes\DCL_Activator as Activator;
use \DCL\Includes\DCL_Deactivator as Deactivator;
use \DCL\Includes\DCL as DCL;

/**
 * The plugin bootstrap file.
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://antwerpes.com
 * @since             1.0.0
 * @package           DCL
 *
 * Plugin Name:       DocCheck Login
 * Description:       The official DocCheck plug-in enables the authentication of certified healthcare professionals and facilitates the integration of the DocCheck login.
 * Version:           1.1.5
 * Author:            antwerpes ag <opensource@antwerpes.com>
 * Author URI:        https://antwerpes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       doccheck-login
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Include the autoloader so we can dynamically include the rest of the classes.
require_once( trailingslashit( dirname( __FILE__ ) ) . 'includes/autoloader.php' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-dcl-activator.php
 */
function dcl_activate_plugin() {
	Activator::activate();
}

register_activation_hook( __FILE__, 'dcl_activate_plugin' );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-dcl-deactivator.php
 */
function dcl_deactivate_plugin() {
	Deactivator::deactivate();
}

register_deactivation_hook( __FILE__, 'dcl_deactivate_plugin' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function dcl_run_plugin() {
	$plugin = new DCL();
	$plugin->run();
}

dcl_run_plugin();
