<?php
/**
 * Description: Integrated Addon for "Email Reminders" plugin, that provide functionality of automate actions based on WP Cron functionality. Like sending email reminders or periodical rules running for creation of reminders.
 * Author: wpdevelop, oplugins
 * Author URI: https://oplugins.com
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly

if ( ! defined( 'OPERA_FILE' ) )         define( 'OPERA_FILE', __FILE__ );
if ( ! defined( 'OPERA_PLUGIN_DIR' ) )   define( 'OPERA_PLUGIN_DIR', untrailingslashit( plugin_dir_path( OPERA_FILE ) ) );    // ..\home\siteurl\www\wp-content\plugins\plugin-name


/**
 * Load addon functionality,  if 'Email Reminders' plugin  activated.
 */
function opera_is_er_activated(){

	if ( ! class_exists( 'OPER' ) ) {                                                       // Check if 'Email Reminders' plugin activated
		return;
	}

	// Load here all other functionality
	require_once( OPERA_PLUGIN_DIR . '/includes/opera-functions.php' );                         // Support Functions

	require_once( OPERA_PLUGIN_DIR . '/includes/opera-view-rules.php' );                        // Views and filters
	require_once( OPERA_PLUGIN_DIR . '/includes/opera-cron-rules.php' );                        // Cron Schedules

	require_once( OPERA_PLUGIN_DIR . '/includes/opera-view-reminders.php' );                    // Views and filters
	require_once( OPERA_PLUGIN_DIR . '/includes/opera-cron-reminders.php' );                    // Cron Schedules

	require_once( OPERA_PLUGIN_DIR . '/includes/page-settings-cron.php' );                      // Page

	/*
	//Add menu
	if( is_admin() ) {
	    add_action( '_admin_menu',   array( self::$instance, 'define_admin_menu') );    // Define Menu  -  _admin_menu - Fires before the administration menu loads in the admin.
	    add_action( 'admin_footer', 'oper_print_js', 50 );								// Load my Queued JavaScript Code at  the footer of the Admin Panel page. Executed in ALL Admin Menu Pages
	}
	*/
}
add_action( 'init', 'opera_is_er_activated', 0 );


/**
 *  Remove   C R O N   Scheduled Events --  on plugin deactivation
 */
function opera_cron__remove_schedules(){

	wp_clear_scheduled_hook( 'opera_cron_hook__rule_reset' );
    wp_clear_scheduled_hook( 'opera_cron_hook__rule_run' );
    wp_clear_scheduled_hook( 'opera_cron_hook__reminders_send' );
}
register_deactivation_hook( OPERA_FILE, 'opera_cron__remove_schedules' );                   // On plugin deactivation remove CRON events