<?php
/**
 * Plugin Name: Datalayer for WooCommerce FREE
 * Plugin URI:  https://wordpress.org/plugins/datalayer-for-ecommerce-free/
 * Description: DataLayer is an object that makes available in real time the information that is executed by users while browsing the WooCommerce Store.
 * Version:     4.6.0
 * Requires at least: 5.2.0
 * Tested up to: 6.7.1
 * Requires PHP:      7.2
 * Author:      Array.codes
 * Author URI:  https://array.codes/
 * Developer: Heitor Sousa
 * Developer URI: https://array.codes/
 * Domain Path: /languages
 * Text Domain: datalayer-for-ecommerce-free
 * *
 * WC requires at least: 4.8.0
 * WC tested up to: 9.6.0
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package Datalayer for Woocommerce FREE
 */

use DatalayerForWoocommerceFree\Activate;
use DatalayerForWoocommerceFree\Deactivate;
use DatalayerForWoocommerceFree\Init;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

if ( ! class_exists( 'Activate' ) ) :
	/**
	 * Activate function.
	 */
	function activate_datalayer_for_woocommerce() {
		Activate::activate();
	}
	register_activation_hook( __FILE__, 'activate_datalayer_for_woocommerce' );
endif;


if ( ! class_exists( 'Deactivate' ) ) :
	/**
	 * Deactivate function.
	 */
	function deactivate_datalayer_for_woocommerce() {
		Deactivate::deactivate();
	}
	register_deactivation_hook( __FILE__, 'deactivate_datalayer_for_woocommerce' );
endif;

if ( ! class_exists( 'Init' ) ) :
	Init::instance();
endif;
