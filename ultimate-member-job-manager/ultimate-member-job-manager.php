<?php
/**
 * Plugin Name: Ultimate Member Job Manager
 * Plugin URI: http://suiteplugins.com/
 * Description: This plugin integrates WP Job Manager and Ultimate Member user profiles.
 * Author: SuitePlugins
 * Author URI: http://suiteplugins.com
 * Version: 1.0.1.2
 * Requires at least: 5.4
 * Tested up to: 6.5.2
 * Network: true
 * Text Domain: ultimate-member-job-manager
 * Domain Path: /languages/
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * 
 * @package Ultimate Member Job Manager
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'ULTIMATE_MEMBER_WP_JOB_MANAGER_PLUGIN_DIR ' ) ) {
	define( 'ULTIMATE_MEMBER_WP_JOB_MANAGER_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
}

if ( ! defined( 'ULTIMATE_MEMBER_WP_JOB_MANAGER ' ) ) {
	define( 'ULTIMATE_MEMBER_WP_JOB_MANAGER', plugin_dir_path( __FILE__ ) . 'ultimate-member-components/wp-job-manager/' );
}


// I18n
add_action( 'plugins_loaded', 'ultimate_member_job_manager_load_textdomain' );
function ultimate_member_job_manager_load_textdomain() {
	$domain = 'ultimate-member-job-manager';

	$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

	// wp-content/languages/um-events/plugin-name-de_DE.mo
	load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );

	// wp-content/plugins/um-events/languages/plugin-name-de_DE.mo
	load_plugin_textdomain( $domain, false, basename( __DIR__ ) . '/languages/' );
}

function init_um_wp_job_manager_component() {
	include ULTIMATE_MEMBER_WP_JOB_MANAGER . 'class-um-wp-job-manager.php';
}

add_action( 'init', 'init_um_wp_job_manager_component', 40 );
