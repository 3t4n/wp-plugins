<?php
/**
 * Plugin Name: Shift4Shop Online Store
 * Description: This is an official plugin of Shift4Shop, to fetch products from your shop and display it in widget.
 * Author: shift4shop
 * Author URI: https://www.shift4shop.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package shift4shop
 */

/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('Shift4Shop_URL', plugin_dir_url( __FILE__ ) . '/');
define('Shift4Shop_PATH', plugin_basename( __FILE__ ));

require_once('inc/options.php');
require_once('inc/widget.php');
require_once('inc/shortcode.php');

add_filter('plugin_action_links_'.Shift4Shop_PATH, 'shift4shop_settings_link');
function shift4shop_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'options-general.php?page=shift4shop' ) .
		'">' . __('Settings') . '</a>';
	return $links;
}