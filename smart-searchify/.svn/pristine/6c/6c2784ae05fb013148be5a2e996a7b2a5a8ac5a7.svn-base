<?php
/**
 * Plugin Name:       Smart Searchify
 * Description:       Filters posts as per the filter rules
 * Author: 			  JBi Digital
 * Author URI:        https://jbidigital.co.uk
 * Text Domain:       smart-searchify
 * Domain Path:       /languages
 * License:           GNU General Public License v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 5.0
 * Requires PHP:      7.2
 * Tested up to:      6.7
 * Version:           1.0.2
 *
 * @package Jbid
 */

namespace Jbid\Post_Filter;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Site wide constants.
define( 'JBIPF_FILE_PATH', __FILE__ );
define( 'JBIPF_DB_VERSION', '1.0.0' );
define( 'JBIPF_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'JBIPF_DIR_URL', plugin_dir_url( __FILE__ ) );


/**
 * The plugin installation.
 */
function jbid_ss_install() {

	$cur_ss_ver = get_option( 'jbid_ss_version' );

	if ( empty( $cur_ss_ver ) ) {

		// Store the plugin version only if that is not present.
		add_option( 'jbid_ss_version', JBIPF_DB_VERSION );
	}

}

register_activation_hook( __FILE__, 'Jbid\Post_Filter\jbid_ss_install' );


/**
 * This function is called and setup the plugin.
 */
function setup_plugin() {

	include_once JBIPF_DIR_PATH . 'inc/class-helpers.php';
	$helpers = new Helpers();

	include_once JBIPF_DIR_PATH . 'inc/class-enqueue-scripts.php';
	new Enqueue_Scripts();

	include_once JBIPF_DIR_PATH . 'inc/class-admin-menu.php';
	new Admin_Menu( $helpers );

	include_once JBIPF_DIR_PATH . 'inc/class-post-types.php';
	$post_types = new Post_Types( $helpers );
	$post_types->init();

	include_once JBIPF_DIR_PATH . 'inc/class-shortcodes.php';
	new Shortcodes( $helpers );

}

// Plugin bootstraping.
setup_plugin();
