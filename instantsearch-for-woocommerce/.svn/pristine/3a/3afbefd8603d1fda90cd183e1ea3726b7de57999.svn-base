<?php
/**
 *
 * @package   WCISPlugin
 * @license   GPL-2.0+
 * @copyright 2014 InstantSearchPlus
 *
 * @wordpress-plugin
 * Plugin Name:       Search, Collections, Filtering, Merchandising & Personalization for WooCommerce by Fast Simon
 * Plugin URI:        https://wordpress.org/plugins/instantsearch-for-woocommerce/
 * Description:       WooCommerce best conversion optimization platform: search, collections, filters, merchandising & Personalization  by Fast Simon
 * Version:           3.0.55
 * Author:            Fast Simon Inc
 * Author URI:        www.fastsimon.com
 * Text Domain:       instantsearch-for-woocommerce
 * License:           GPL-2.0+
 * Domain Path:       /languages
 * WC requires at least: 2.0.0
 * WC tested up to: 9.5.*
 */

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once(plugin_dir_path( __FILE__ ) . 'public/wcis_plugin.php');
require_once(plugin_dir_path( __FILE__ ) . 'widget/instantsearch-for-woocommerce-widget.php');
require_once(plugin_dir_path(__FILE__) . 'public/serving.php');
require_once(plugin_dir_path(__FILE__) . 'public/autocomplete.php');
require_once(plugin_dir_path(__FILE__) . 'public/wcis_product_cat_utils.php');

if (function_exists('wp_is_block_theme') && wp_is_block_theme()) {
    require_once(plugin_dir_path(__FILE__) . 'blocks/wcis_blocks.php');
}

register_activation_hook( __FILE__, array( WCISPlugin::get_instance(), 'activate' ) );
register_deactivation_hook( __FILE__, array( WCISPlugin::get_instance(), 'deactivate' ) );

register_uninstall_hook( __FILE__, array( 'WCISPlugin', 'uninstall' ) );

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( 'WCISPlugin', 'wcis_add_action_links'));

add_shortcode('isp_search_box', array( WCISPlugin::get_instance(), 'get_isp_search_box_form' ));
add_shortcode('wcis_serp_results', array( WCISPlugin::get_instance(), 'wcis_serp_results_shortcode' ));
add_shortcode(WCISCategory::$CATEGORY_SHORTCODE, array( WCISPlugin::get_instance(), 'wcis_category_shortcode' ));

?>