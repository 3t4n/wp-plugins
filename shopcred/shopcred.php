<?php
/**
 * Plugin Name: ShopCred - WooCommerce Builder with Products Grid & Carousel Block
 * Plugin URI: https://wpshopcred.com/
 * Description: Gutenberg Blocks for WooCommerce Product Grid,Carousel with WooCommerce Builder
 * Author: ShopCred
 * Author URI: https://wpshopcred.com/
 * Version: 1.2.8
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: shopcred
 * Requires Plugins:  woocommerce
 *
 * @package ShopCred
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SPC_FILE', __FILE__ );
define( 'SPC_DIR', plugin_dir_path( SPC_FILE ) );
define( 'SPC_URL', plugins_url( '/', SPC_FILE ) );
define( 'SPC_ASSETS', plugins_url( '/assets', SPC_FILE ) );
define( 'SPC_VER', '1.2.8' );
define( 'SPC_ROOT', dirname( plugin_basename( __FILE__ ) ) );
define( 'SPC_ASSET_VER', get_option( '__spc_asset_version', SPC_VER ) );
define( 'SPC_ADMIN', SPC_DIR . 'admin/' );	
define( 'SPC_ADMIN_URL', plugins_url( '/', __FILE__ ) . 'admin/' );
define( 'SPC_PLUGIN_NAME', 'ShopCred Products' );
define( 'SPC_PLUGIN_FREE_FOLDER_NAME_TYPE1', 'shopcred' );
define( 'SPC_PLUGIN_PRO_FOLDER_NAME_TYPE1', 'shopcred-pro' );

if ( ! defined( 'SPC_TABLET_BREAKPOINT' ) ) {
	define( 'SPC_TABLET_BREAKPOINT', '976' );
}
if ( ! defined( 'SPC_MOBILE_BREAKPOINT' ) ) {
	define( 'SPC_MOBILE_BREAKPOINT', '767' );
}

add_filter( 'plugin_action_links_'. plugin_basename(__FILE__), 'shopcred_insert_settings_url' );

/**
 * Extending plugin links
 *
 * @since 3.0.0
 */
function shopcred_insert_settings_url( $links ) {
	// settings
	$action_links = [ 
		'settings' => sprintf('<a href="admin.php?page=shopcred-dashboard-settings-page&subpage=shopcred-available-blocks">' . __('Settings', 'shopcred') . '</a>'),
	];

	return array_merge( $action_links, $links );

}

/**
 * 
 * Plugin Redirect Option Added by register_activation_hook
 * 
 */
function spc_plugin_redirect_option() {
	add_option( 'spc_do_update_redirect', true );
}
register_activation_hook( __FILE__ , 'spc_plugin_redirect_option' );


/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_shopcred() {

    if ( ! class_exists( 'Appsero\Client' ) ) {
      require_once __DIR__ . '/appsero/client/Client.php';
    }

    $client = new Appsero\Client( '4be27119-1362-4254-af81-dbd80c894bd7', 'ShopCred', __FILE__ );

    // Active insights
    $client->insights()->init();

}

appsero_init_tracker_shopcred();

function check_shopcred_pro_plugin() {
	if (!function_exists('is_plugin_active')) {
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    }
    $is_plugin_active = is_plugin_active(SPC_PLUGIN_PRO_FOLDER_NAME_TYPE1.'/shopcred-pro.php');
    wp_send_json_success(array('is_plugin_active' => $is_plugin_active));
}

function register_check_shopcred_pro_endpoint() {
    register_rest_route('custom/v1', '/check-shopcred-pro', array(
        'methods' => 'GET',
        'callback' => 'check_shopcred_pro_plugin',
		'permission_callback' => '__return_true', // Allow public access to this endpoint
    ));
}

add_action('rest_api_init', 'register_check_shopcred_pro_endpoint');

// Initiate Plugin Base Class
require_once SPC_DIR . 'includes/base.php';