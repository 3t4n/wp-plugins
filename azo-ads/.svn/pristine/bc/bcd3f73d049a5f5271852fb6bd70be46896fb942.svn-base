<?php
/**
 * AZO Ads
 *
 * @package   AZO_Ads
 * @author    AZO Team <support@azonow.com>
 * @license   GPL-2.0+
 * @link      https://azonow.com
 * @copyright since 2023 AZO Team
 *
 * @wordpress-plugin
 * Plugin Name:       AZO Ads
 * Plugin URI:        https://ads.azonow.com
 * Description:       A powerful tool to manage your ads in WordPress easily.
 * Version:           1.6.4
 * Author:            AZO Team
 * Author URI:        https://azonow.com
 * Text Domain:       azo-ads
 * Domain Path:       /languages
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// define importantly constant
define( 'AZOADS_BASE', plugin_basename( __FILE__ ) );
define( 'AZOADS_BASE_PATH', plugin_dir_path( __FILE__ ) );
define( 'AZOADS_BASE_URL', plugin_dir_url( __FILE__ ) );
define( 'AZOADS_BASE_DIR', dirname( AZOADS_BASE ) );
define( 'AZOADS_NAME', 'AZO Ads' );
define( 'AZOADS_SLUG', 'azo-ads' );
define( 'AZOADS_URL', 'https://azonow.com/' );
define( 'AZOADS_NEWS_URL', AZOADS_URL );
define( 'AZOADS_VERSION', '1.6.4' );

// INIT plugin
// on plugin activation
register_activation_hook( __FILE__, "azoads_activate" );
// activate plugin
function azoads_activate() {
	// execute tasks on plugin activation

	// insert DB Tables
	azoads_init_db();
}
// initialize DB Table
function azoads_init_db() {
    global $wpdb;
	// create DB Table
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . "azoads_report";
    $sql = "
    CREATE TABLE $table_name (
        `ID` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `post_id` bigint(20) UNSIGNED NOT NULL,
        `type` tinyint(1) UNSIGNED NOT NULL COMMENT '1:impression, 2:click',
        `device` tinyint(1) UNSIGNED NOT NULL COMMENT '1:mobile, 2:tablet, 3:desktop',
        `timeline` int(11) UNSIGNED NOT NULL,
        `ip_address` varchar(255) NOT NULL,
        `url` varchar(255) NOT NULL,
        `referrer` varchar(255) NOT NULL,
        `user_agent` varchar(255) NOT NULL,
        INDEX (`post_id`),
        INDEX (`type`),
        INDEX (`device`),
        INDEX (`timeline`)
    ) $charset_collate;
    ";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    maybe_create_table( $table_name, $sql );

}

// on plugin de-activation
register_deactivation_hook( __FILE__, "azoads_deactivate" );
// de-activate Plugin
function azoads_deactivate() {
	// execute tasks on plugin de-activation
    // this work maybe done later by AZO Team
}

// on plugin azoads_uninstall
register_uninstall_hook( __FILE__, "azoads_uninstall" );
// azoads_uninstall Plugin
function azoads_uninstall() {
    global $wpdb;

	// execute tasks on plugin azoads_uninstall
    $azoads_options = get_option( 'azoads_options' );
    if ( isset( $azoads_options['settings']['misc_delete_data'] ) && $azoads_options['settings']['misc_delete_data'] == 1 ) {
        // 1: delete AZO Ads Post Type
        $post_ids = $wpdb->get_col(
            $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE post_type = %s", AZOADS_SLUG )
        );
        if ( $post_ids ) {
            $wpdb->delete(
                $wpdb->posts,
                [ 'post_type' => AZOADS_SLUG ],
                [ '%s' ]
            );
            $wpdb->query(
                $wpdb->prepare( "DELETE FROM {$wpdb->postmeta} WHERE post_id IN( %s )", implode( ',', $post_ids ) )
            );
        }

        // 2: delete all settings
        delete_option( 'azoads_options' );

        // 3: delete report data
        $report_table_name = $wpdb->prefix . "azoads_report";
        $wpdb->query( 'DROP TABLE IF EXISTS ' . $report_table_name );
    }
}

// load main functions
require_once AZOADS_BASE_PATH . 'includes/init.php';
require_once AZOADS_BASE_PATH . 'includes/enqueues.php';
require_once AZOADS_BASE_PATH . 'includes/functions.php';
require_once AZOADS_BASE_PATH . 'includes/ajax.php';
require_once AZOADS_BASE_PATH . 'includes/template-functions.php';
require_once AZOADS_BASE_PATH . 'includes/hooks.php';
require_once AZOADS_BASE_PATH . 'classes/class-azo-ads-admin.php';
require_once AZOADS_BASE_PATH . 'classes/class-azo-ads-admin-menu.php';

// load admin functionality
if ( is_admin() ) {
	AZOADS_Admin::get_instance();
}