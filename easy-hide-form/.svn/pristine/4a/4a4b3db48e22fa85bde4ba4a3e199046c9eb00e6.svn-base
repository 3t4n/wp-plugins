<?php

/**
 * @link              https://bitbucket.org/allouise/easy-hide-form/
 * @since             1.0.0
 * @package           Alf_Easy_Hide_Form
 *
 * @wordpress-plugin
 * Plugin Name:       Easy Hide Form
 * Plugin URI:        https://bitbucket.org/allouise/easy-hide-form/
 * Description:       Plugin for easy and quick hiding Wordpress Reply/Comment Forms
 * Version:           1.0.0
 * Author:            Allyson Flores
 * Author URI:        http://allysonflores.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       easy-hide-form
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
define( 'ALF_EASY_HIDE_FORM_VERSION', '1.0.0' );
define( 'ALF_EASY_HIDE_FORM_TITLE', 'Easy Hide Form' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-easy-hide-form-activator.php
 */
function activate_alf_easy_hide_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-hide-form-activator.php';
	Alf_Easy_Hide_Form_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-easy-hide-form-deactivator.php
 */
function deactivate_alf_easy_hide_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-hide-form-deactivator.php';
	Alf_Easy_Hide_Form_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_alf_easy_hide_form' );
register_deactivation_hook( __FILE__, 'deactivate_alf_easy_hide_form' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-easy-hide-form.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_alf_easy_hide_form() {

	$plugin = new Alf_Easy_Hide_Form();
	$plugin->run();

}
run_alf_easy_hide_form();
