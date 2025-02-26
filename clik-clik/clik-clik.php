<?php
/**
 * @package   Clik_Clik
 * @author    Clik Clik <support@clikclik.com.au>
 * @license   GPL-2.0+
 * @link      http://www.clikclik.com.au
 * @copyright 2014 Clik Clik
 *
 * @wordpress-plugin
 * Plugin Name:       Clik Clik
 * Plugin URI:        http://www.clikclik.com.au
 * Description:       Accept online bookings, right within your Wordpress website by using Clik Clik.
 * Version:           1.0.0
 * Author:            Clik Clik
 * Author URI:        http://www.clikclik.com.au
 * Text Domain:       clik-clik-en
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-clik-clik.php` with the name of the plugin's class file
 *
 */
require_once( plugin_dir_path( __FILE__ ) . 'public/class-clik-clik.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * @TODO:
 *
 * - replace Clik_Clik with the name of the class defined in
 *   `class-clik-clik.php`
 */
register_activation_hook( __FILE__, array( 'Clik_Clik', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Clik_Clik', 'deactivate' ) );

/*
 * @TODO:
 *
 * - replace Clik_Clik with the name of the class defined in
 *   `class-clik-clik.php`
 */
add_action( 'plugins_loaded', array( 'Clik_Clik', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-clik-clik-admin.php` with the name of the plugin's admin file
 * - replace Clik_Clik_Admin with the name of the class defined in
 *   `class-clik-clik-admin.php`
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-clik-clik-admin.php' );
	add_action( 'plugins_loaded', array( 'Clik_Clik_Admin', 'get_instance' ) );

}
