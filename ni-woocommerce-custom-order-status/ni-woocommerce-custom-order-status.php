<?php 
/*
Plugin Name: Ni WooCommerce Custom Order Status
Description: WooCommerce Custom Order Status plug-in allows you to create and manage new order statuses for WooCommerce and also show the order status report 	
Version:  2.2.6
Author:anzia
Author URI: http://naziinfotech.com/
Plugin URI: https://wordpress.org/plugins/ni-woocommerce-custom-order-status/
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/agpl-3.0.html
Requires at least: 4.7
Tested up to: 6.6.2
WC requires at least: 3.0.0
WC tested up to: 9.3.3
Last Updated Date:15-October-2024
Requires PHP: 7.0
Text Domain: niwoocos
Domain Path: languages/
*/
if ( ! defined( 'ABSPATH' ) ) { exit;}
if( !class_exists( 'ni_custom_order_status' ) ) {
	class ni_custom_order_status{
		
		var $constant =  array(
            "is_hpos_enabled" => false // Initialize with default value
        );
		
		public function __construct(){
			
			
			add_action( 'before_woocommerce_init',  array(&$this,'before_woocommerce_init') );
			add_action('plugins_loaded', array($this, 'plugins_loaded'));
		}
		function before_woocommerce_init(){
			if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
				\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
			}	 
		}
		function plugins_loaded(){
			
			 //$this->set_hpos_enabled();
			
			include_once('include/ni-custom-order-status-init.php'); 
			$obj = new ni_custom_order_status_init();  
			
			require_once("include/ni-custom-order-status-bulk-action.php");
			$obj_bulk = new ni_custom_order_status_bulk_action();
			
			require_once("include/ni-custom-order-status-email.php");
			$obj_email = new ni_custom_order_status_email();
			
			require_once("include/ni-custom-order-status-setting.php");
			$obj_setting = new ni_custom_order_status_setting();
			
		}
		function set_hpos_enabled() {
			if (  class_exists( '\Automattic\WooCommerce\Utilities\OrderUtil' ) ) {
				if ( \Automattic\WooCommerce\Utilities\OrderUtil::custom_orders_table_usage_is_enabled() ) {
					$this->constant["is_hpos_enabled"] = true;
				} else {
					$this->constant["is_hpos_enabled"] = false;
				}
			}
            
        }
	}
	$objcustome = new  ni_custom_order_status();
}