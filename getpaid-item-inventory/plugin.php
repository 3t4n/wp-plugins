<?php
/**
 * This is the main plugin file, here we declare and call the important stuff
 *
 * @package           GETPAID-ITEM-INVENTORY
 * @copyright         2021 AyeCode Ltd
 * @license           GPLv3
 * @since             1.0.0
 *
 * Plugin Name: GetPaid > Item Inventory
 * Plugin URI: https://wpgetpaid.com/downloads/item-inventory/
 * Description: Allows you to manage stock and inventory.
 * Version: 2.0
 * Author: AyeCode Ltd
 * Author URI: https://wpgetpaid.com/
 * Requires at least: 4.9
 * Tested up to: 6.5
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: getpaid-item-inventory
 * Domain Path: /languages
 */

// Exit if accessed directly
if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'GETPAID_ITEM_INVENTORY_VERSION', '2.0' );
define( 'GETPAID_ITEM_INVENTORY_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Registers GetPaid as a required plugin.
 */
function getpaid_item_inventory_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'GetPaid/Invoicing',
			'slug'      => 'invoicing',
            'required'  => true,
            'version'   => '2.5.0',
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 */
	$config = array(
		'id'           => 'getpaid-item-inventory',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                                       // Default absolute path to bundled plugins.
		'menu'         => 'getpaid-item-inventory-install-plugins', // Menu slug.
		'parent_slug'  => 'plugins.php',                            // Parent menu slug.
		'capability'   => 'manage_options',                         // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                                     // Show admin notices or not.
		'dismissable'  => false,                                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                                       // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                                    // Automatically activate plugins after installation or not.
		'message'      => '',                                       // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'getpaid_item_inventory_register_required_plugins' );
require_once GETPAID_ITEM_INVENTORY_DIR . 'includes/class-tgm-plugin-activation.php';

/**
 * Register our autoloader.
 *
 */
function getpaid_item_inventory_autoload_locations( $locations ) {
    $locations[] = GETPAID_ITEM_INVENTORY_DIR . 'includes';
    return $locations;
}
add_filter( 'getpaid_autoload_locations', 'getpaid_item_inventory_autoload_locations' );


/**
 * Load the plugin.
 *
 */
function getpaid_item_inventory_init_hooks() {
    $GLOBALS['getpaid_item_inventory'] = new GetPaid_Item_Inventory();
}
add_action( 'getpaid_actions', 'getpaid_item_inventory_init_hooks' );


/**
 * Load the text domain
 *
 */
function getpaid_item_inventory_load_plugin_textdomain() {

	load_plugin_textdomain(
		'getpaid-item-inventory',
		false,
		'getpaid-item-inventory/languages/'
	);

}
add_action( 'init', 'getpaid_item_inventory_load_plugin_textdomain' );
