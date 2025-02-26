<?php
/*
    Plugin Name:            RSpider CSV/Aliexpress/Taobao/Amazon/Alibaba/Ebay Product Import to WooCommerce
	Plugin URI:             http://rspider.rulily.com/?from=csvPlugin
	Description:            This plugin helps easily export Woocommerce products in CSV and import products from CSV and any major e-commerce platform such as Aliexpress/Taobao/Amazon/Alibaba/Ebay to WooCommerce in 1-click, along with a powerful source engine to help you find the best product resource.

 	Author:					RSpider
 	Author URI:				http://rspider.rulily.com/?from=csvPlugin

 	Version:				1.0.3

	Requires at least: 		4.0
	Tested up to: 			4.6

	License: GPLv2 or later
*/
/* Copyright 2017-2-30 rulily (email : rspider@rulily.com)
 
This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
 
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
 
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 
*/

if ( ! defined( 'ABSPATH' ) || ! is_admin() ) {
	return;
}

/**
 * Required functions
 */
if ( ! function_exists( 'woothemes_queue_update' ) ) {
	require_once( 'woo-includes/woo-functions.php' );
}

/**
 * Plugin updates
 */
woothemes_queue_update( plugin_basename( __FILE__ ), '7ac9b00a1fe980fb61d28ab54d167d0d', '18680' );

/**
 * Check WooCommerce exists
 */
if ( ! is_woocommerce_active() ) {
	return;
}

if ( ! class_exists( 'wc_Product_CSV_Import_Suite' ) ) :

/**
 * Main CSV Import class
 */
class wc_Product_CSV_Import_Suite {

	/**
	 * Logging class
	 */
	private static $logger = false;

	/**
	 * Constructor
	 */
	public function __construct() {
		define( 'wc_PCSVIS_FILE', __FILE__ );

		add_filter( 'woocommerce_screen_ids', array( $this, 'woocommerce_screen_ids' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'rs_plugin_action_links' ) );
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
		add_action( 'init', array( $this, 'catch_export_request' ), 20 );
		add_action( 'admin_init', array( $this, 'register_importers' ) );

		include_once( 'includes/rs-pcsvis-functions.php' );
		include_once( 'includes/class-rs-pcsvis-system-status-tools.php' );
		include_once( 'includes/class-rs-pcsvis-admin-screen.php' );
		include_once( 'includes/importer/class-rs-pcsvis-importer.php' );

		if ( defined('DOING_AJAX') ) {
			include_once( 'includes/class-rs-pcsvis-ajax-handler.php' );
		}
	}
	
	/**/
	public function rs_plugin_action_links( $links ) {
			$plugin_links = array(
				'<a href="' . admin_url( 'admin.php?page=rspider_csv_import_woo' ) . '">' . __( 'Import Export', 'rspider_csv_import_woo' ) . '</a>',
				'<a href="https://rspider.rulily.com/?from=csvPlugin" target="_blank">' . __( 'RSpider', 'rspider_csv_import_woo' ) . '</a>'                
			);
			return array_merge( $plugin_links, $links );
		}

	/**
	 * Add screen ID
	 */
	public function woocommerce_screen_ids( $ids ) {
		$ids[] = 'admin'; // For import screen
		return $ids;
	}

	/**
	 * Handle localisation
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'rspider-csv-export-import-woo', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Catches an export request and exports the data. This class is only loaded in admin.
	 */
	public function catch_export_request() {
		if ( ! empty( $_GET['action'] ) && ! empty( $_GET['page'] ) && $_GET['page'] == 'rspider_csv_import_woo' ) {
			switch ( $_GET['action'] ) {
				case "export" :
					include_once( 'includes/exporter/class-rs-pcsvis-exporter.php' );
					wc_PCSVIS_Exporter::do_export( 'product' );
					//wc_PCSVIS_Exporter::do_export( 'product_variation' );
				break;
				case "export_variations" :
					include_once( 'includes/exporter/class-rs-pcsvis-exporter.php' );
					wc_PCSVIS_Exporter::do_export( 'product_variation' );
				break;
			}
		}
	}
    
	
	
	
	/**
	 * Register importers for use
	 */
	public function register_importers() {
		register_importer( 'woocommerce_csv', 'WooCommerce Products (CSV)', __('Import <strong>products</strong> to your store via a csv file.', 'rspider-csv-export-import-woo'), 'wc_PCSVIS_Importer::product_importer' );
		register_importer( 'woocommerce_variation_csv', 'WooCommerce Product Variations (CSV)', __('Import <strong>product variations</strong> to your store via a csv file.', 'rspider-csv-export-import-woo'), 'wc_PCSVIS_Importer::variation_importer' );
	}

	/**
	 * Get meta data direct from DB, avoiding get_post_meta and caches
	 * @return string
	 */
	public static function log( $message ) {
		if ( ! self::$logger ) {
			self::$logger = new wc_Logger();
		}
		self::$logger->add( 'csv-import', $message );
	}

	/**
	 * Get meta data direct from DB, avoiding get_post_meta and caches
	 * @return string
	 */
	public static function get_meta_data( $post_id, $meta_key ) {
		global $wpdb;
		$value = $wpdb->get_var( $wpdb->prepare( "SELECT meta_value from $wpdb->postmeta WHERE post_id = %d and meta_key = %s", $post_id, $meta_key ) );
		return maybe_unserialize( $value );
	}
}
endif;

new wc_Product_CSV_Import_Suite();
