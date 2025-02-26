<?php
/**
 *
 * @package   CcPopUp
 * @author    Chop-Chop.org <talk@chop-chop.org>
 * @license   GPL-2.0+
 * @link      https://wordpress.org/plugins/pop-up/
 * @copyright 2014-2020
 *
 * @wordpress-plugin
 * Plugin Name:       Pop-Up Chop Chop
 * Plugin URI:        https://wordpress.org/plugins/pop-up/
 * Description:       An elegant Pop Up in just a few clicks.
 * Version:           2.1.7
 * Author:            Chop-Chop.org
 * Author URI:        https://chop-chop.org
 * Text Domain:       cc-pop-up-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'CC_PU_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CC_PU_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-chch-pop-up.php' );


/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 */
register_activation_hook( __FILE__, array( 'CcPopUp', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'CcPopUp', 'deactivate' ) );



add_action( 'init', array( 'CcPopUp', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * The code below is intended to to give the lightest footprint possible.
 */


if (is_admin()) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-chch-pop-up-admin.php' );
	add_action( 'plugins_loaded', array( 'CcPopUpAdmin', 'get_instance' ) );

}
