<?php
/**
* Plugin Name: Simple Disable For WooCommerce Admin
* Plugin URI: https://snippetfactory.dev/disable-woocommmerce-admin
* Description: Disables the new WooCommerce admin reporting and analytics tool. Deactivate this plugin if you want to use the new admin tool.
* Version: 1.0.0
* Author: snippetfactory
* Author URI: https://snippetfactory.dev
* License: GNU General Public License v2
* License URI: https://www.gnu.org/licenses/license-list.html#GPLCompatibleLicenses
* @author snippetfactory.dev
* @copyright 2020 snippetfactory.dev
*/
if ( !defined( 'ABSPATH' ) ) exit;
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' )))) {
add_filter( 'woocommerce_admin_disabled', '__return_true' );
}