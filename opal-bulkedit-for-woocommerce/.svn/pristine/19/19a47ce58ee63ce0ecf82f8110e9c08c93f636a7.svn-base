<?php
/**
 * Opal Bulkedit for Woocommerce
 *
 * @package       opal-bulkedit-for-woocommerce
 * @author        WPOPAL
 * @version       1.1.0
 *
 * @wordpress-plugin
 * Plugin Name:   Opal Bulkedit for Woocommerce
 * Plugin URI:    https://wpopal.com/contact/
 * Description:   Advanced extension of WooCommerce allow Bulk Edit Products, Prices, Attributes and More ...
 * Version:       1.1.0
 * Author:        WPOPAL
 * Author URI:    https://wpopal.com
 * License:       GPLv2 or later
 * License URI:   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain:   opal-bulkedit-for-woocommerce
 * Domain Path:   /languages
 * Requires Plugins: woocommerce
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

// Plugin name
define( 'OPBW_NAME', 'Opal Bulkedit for Woocommerce' );
define( 'OPBW_TEXTDOMAIN', 'opal-bulkedit-for-woocommerce' );
define( 'OPBW_SHOWHISTORY', false );

// Plugin version
define( 'OPBW_VERSION', '1.1.0' );

// Plugin Root File
define( 'OPBW_PLUGIN_FILE', __FILE__ );

// Plugin base
define( 'OPBW_PLUGIN_BASE', plugin_basename( OPBW_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'OPBW_PLUGIN_DIR',	plugin_dir_path( OPBW_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'OPBW_PLUGIN_URL',	plugin_dir_url( OPBW_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once OPBW_PLUGIN_DIR . 'includes/class-opal-bulkedit-for-woocommerce.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  LexusTeam
 * @since   1.1.0
 * @return  object|OPBW_Start_Instance
 */
function opbw() {
	return OPBW_Start_Instance::instance();
}
opbw();
