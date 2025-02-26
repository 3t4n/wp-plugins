<?php
/**
 * The base code for the ASD FastBuild Widgets plugin
 *
 * @package         WordPress
 * @subpackage      ASD_FastBuild_Widgets
 * Plugin Name:     ASD FastBuild Widgets
 * Plugin URI:      https://artisansitedesigns.com/plugins/asd-fastbuild-widgets/
 * Description:     Defines and widgetizes some standard content that all sites need Name/Tagline, Logo, Social Media Links, Pills Nav, Hours, Address, Phone, Email. Plugin also inserts Structured Data into the page footer in JSON-LD format.
 * Author:          Michael H Fahey
 * Author URI:      https://artisansitedesigns.com/asdpersons/michael-h-fahey/
 * Text Domain:     asd_fastbuild
 * License:         GPL3
 * Version:         2.201901281
 */

$asd_fastbuild_widgets_file_data = get_file_data( __FILE__, array( 'Version' => 'Version' ) );
$asd_fastbuild_widgets_version   = $asd_fastbuild_widgets_file_data['Version'];

/**
 * ASD FastBuild Widgets is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * ASD FastBuild Widgets is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with ASD FastBuild Widgets. If not, see
 * https://www.gnu.org/licenses/gpl.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '' );
}


if ( ! defined( 'ASD_FASTBUILD_DIR' ) ) {
	define( 'ASD_FASTBUILD_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'ASD_FASTBUILD_URL' ) ) {
	define( 'ASD_FASTBUILD_URL', plugin_dir_url( __FILE__ ) );
}

require_once 'includes/asd-admin-menu/asd-admin-menu.php';
require_once 'includes/register-site-data/register-site-data.php';

/** ----------------------------------------------------------------------------
 *   Function asd_fastbuild_plugin_action_links()
 *   Adds links to the Dashboard Plugin page for this plugin.
 *   Hooks into the plugin_action_links_asd-fastbuild-widgets filter
 *  ----------------------------------------------------------------------------
 *
 *   @param Array $actions -  Returned as an array of html links.
 */
function asd_fastbuild_plugin_action_links( $actions ) {
	if ( is_plugin_active( plugin_basename( __FILE__ ) ) ) {
		$actions[0] = '<a target="_blank" href="https://artisansitedesigns.com/plugins/asd-fastbuild-widgets/">Help</a>';
		$actions[1] = '<a href="' . admin_url() . 'admin.php?page=asd_fastbuild">Settings</a>';
	}
		return apply_filters( 'asd_fastbuild_actions', $actions );
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'asd_fastbuild_plugin_action_links' );


/** ----------------------------------------------------------------------------
 *   Function asd_fastbuild_widgets_enqueues()
 *   Enqueues WordPress built-in jQuery, plugin-provided Bootstrap
 *   plugin css page.
 *   Hooks into wp_enqueue_scripts action
 *  --------------------------------------------------------------------------*/
function asd_fastbuild_widgets_enqueues() {
	global $asd_fastbuild_widgets_version;
	wp_enqueue_script( 'jquery' );
	if ( ! defined( 'ASD_BOOTSTRAP_ENQUEUED' ) ) {
		wp_enqueue_style( 'asd-bootstrap-css', ASD_FASTBUILD_URL . 'components/bootstrap/css/bootstrap.min.css', array(), '3.3.7' );
		wp_enqueue_style( 'asd-bootstrap-xl-css', ASD_FASTBUILD_URL . 'components/bootstrap/css/bootstrap-xl.css', array(), '3.3.7' );
		wp_enqueue_style( 'asd-bootstrap-xxl-css', ASD_FASTBUILD_URL . 'components/bootstrap/css/bootstrap-xxl.css', array(), '3.3.7' );
		wp_enqueue_style( 'asd-bootstrap-other-css', ASD_FASTBUILD_URL . 'components/bootstrap/css/bootstrap-other.css', array(), '3.3.7' );
		wp_enqueue_script( 'asd-bootstrap-js', ASD_FASTBUILD_URL . 'components/bootstrap/js/bootstrap.min.js', array(), array(), '3.3.7' );
		define( 'ASD_BOOTSTRAP_ENQUEUED', 1 );
	}
	wp_enqueue_style( 'asd-fastbuild-css', ASD_FASTBUILD_URL . 'css/asd-fastbuild-widgets.css', array(), $asd_fastbuild_widgets_version );
}
add_action( 'wp_enqueue_scripts', 'asd_fastbuild_widgets_enqueues' );



/** ----------------------------------------------------------------------------
 *   Add the custom WordPress Bootstrap navwalker
 *  --------------------------------------------------------------------------*/
if ( ! defined( 'ASD_BOOTSTRAP_NAVWALKER' ) ) {
	require_once 'components/navwalker/class-wp-bootstrap-navwalker.php';
	define( 'ASD_BOOTSTRAP_NAVWALKER', 1 );
}


/** ----------------------------------------------------------------------------
 *   Add the widget definition files
 *  --------------------------------------------------------------------------*/
require_once 'includes/class-asd-widget.php';
require_once 'includes/class-asd-addresswidget.php';
require_once 'includes/class-asd-hourswidget.php';
require_once 'includes/class-asd-logowidget.php';
require_once 'includes/class-asd-nametaglinewidget.php';
require_once 'includes/class-asd-navbarwidget.php';
require_once 'includes/class-asd-pagetitlewidget.php';
require_once 'includes/class-asd-phonewidget.php';
require_once 'includes/class-asd-pillsnavwidget.php';
require_once 'includes/class-asd-socialiconswidget.php';


/** ----------------------------------------------------------------------------
 *   Function asd_register_fastbuild_widgets()
 *   Registers all the widgets
 *   Hooks into widgets_init action
 *  --------------------------------------------------------------------------*/
function asd_register_fastbuild_widgets() {
	register_widget( 'ASD_AddressWidget' );
	register_widget( 'ASD_HoursWidget' );
	register_widget( 'ASD_LogoWidget' );
	register_widget( 'ASD_NameTaglineWidget' );
	register_widget( 'ASD_NavbarWidget' );
	register_widget( 'ASD_PageTitleWidget' );
	register_widget( 'ASD_PhoneWidget' );
	register_widget( 'ASD_PillsNavWidget' );
	register_widget( 'ASD_SocialIconsWidget' );
}
add_action( 'widgets_init', 'asd_register_fastbuild_widgets' );

