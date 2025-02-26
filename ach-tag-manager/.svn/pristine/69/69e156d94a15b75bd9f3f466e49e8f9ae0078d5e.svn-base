<?php
/*
 * Plugin Name: ACh Tag Manager
 * Plugin URI: https://wordpress.org/plugins/ach-tag-manager
 * Description: ACh Tag Manager is a free tool for everyone to manage Global Site Tag, Google Tag Manager, and Google Analytics. Set up Google Analytics 4 property (GA4).
 * Author: ACh
 * Version: 1.0.1
 * Author URI: https://ach.li
 * Text Domain: ach-tag-manager
 * Domain Path: /languages/
 */


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define( 'ACHTM_URL', plugin_dir_url( __FILE__ ) );
define( 'ACHTM_PATH', plugin_dir_path( __FILE__ ) );
define( 'ACHTM_BASENAME', plugin_basename( __FILE__ ) );
define( 'ACHTM_PLUGIN_VERSION', '1.0.1' );

require_once( ACHTM_PATH. 'includes/achtm-settings.php' );
require_once( ACHTM_PATH. 'includes/achtm-tools.php' );

// Load plugin styles.
function achtm_admin_style() {
	$current_screen = get_current_screen();
    if ( strpos( $current_screen->base, 'achtm' ) !== false ) {
		wp_enqueue_style( 'achtm_style', ACHTM_URL. 'assets/css/style.css', array(), '1.0.0' );
		wp_style_add_data( 'achtm_style', 'rtl', 'replace' );
		wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
		wp_enqueue_script( 'jquery-achTabs', ACHTM_URL. 'assets/js/jquery-achtmTabs.js', array(), '1.0.0', false );
	}
}
add_action( 'admin_enqueue_scripts', 'achtm_admin_style', 100, 10 );

// Plugin activation hook and notice.
register_activation_hook( __FILE__, 'achtm_plugin_activation' );
register_deactivation_hook( __FILE__, 'achtm_plugin_deactivation' );

function achtm_plugin_activation() {
    if ( ! current_user_can( 'activate_plugins' ) ) {
        return;
    }
    set_transient( 'achtm-admin-notice-on-activation', true, 5 );
}

/*
function achtm_plugin_deactivation() {
	if( get_option( 'achtm_google_anaytics_code' ) ) {
		delete_option( 'achtm_google_anaytics_code' );
	}
	if( get_option( 'achtm_tag_manager_id' ) ) {
		delete_option( 'achtm_tag_manager_id' );
	}
	if( get_option( 'achtm_google_measurement_id' ) ) {
		delete_option( 'achtm_google_measurement_id' );
	}
}
*/

function achtm_plugin_install_notice() { 
    if( get_transient( 'achtm-admin-notice-on-activation' ) ) { ?>
        <div class="notice notice-success is-dismissible">
            <p><strong><?php printf( __( 'Thanks for installing %1$s v%2$s plugin. 😎 Click <a href="%3$s">here</a> to configure plugin settings.', 'ach-tag-manager' ), 'ACh Tag Manager', ACHTM_PLUGIN_VERSION, admin_url( 'options-general.php?page=achtm' ) ); ?></strong></p>
        </div> <?php
        delete_transient( 'achtm-admin-notice-on-activation' );
    }
}
add_action( 'admin_notices', 'achtm_plugin_install_notice' ); 

// add plugin action links.
function achtm_add_action_links( $links ) {
    $rmlinks = array(
        '<a href="' . admin_url( 'options-general.php?page=achtm' ) . '">' . __( 'Manage', 'ach-tag-manager' ) . '</a>',
    );
    return array_merge( $rmlinks, $links );
}
add_filter( 'plugin_action_links_' . ACHTM_BASENAME, 'achtm_add_action_links', 10, 2 );

// plugin row links and elements.
function achtm_plugin_meta_links( $links, $file ) {
	$plugin = ACHTM_BASENAME;
	if ( $file == $plugin ) // only for this plugin
		return array_merge( $links, 
            array( '<a href="https://wordpress.org/support/plugin/ach-tag-manager" target="_blank">' . __( 'Support', 'ach-tag-manager' ) . '</a>' ),
            array( '<a href="https://paypal.me/AChopani/10usd" target="_blank" style="color:#3db634;">' . __( 'Buy developer a coffee', 'ach-tag-manager' ) . '</a>' )
		);
	return $links;
}
add_filter( 'plugin_row_meta', 'achtm_plugin_meta_links', 10, 2 );

/*
 * load language
 */
function achtm_load_textdomain() {
	load_plugin_textdomain('ach-tag-manager', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');
}
add_action('plugins_loaded', 'achtm_load_textdomain');

#add AChTM settings in admin side panel.
function admin_menu_achtm_settings() {
    add_options_page( 'ACh Tag Manager', 'ACh Tag Manager', 'manage_options', 'achtm', 'achtm_option_page');
}
add_action('admin_menu', 'admin_menu_achtm_settings');

?>