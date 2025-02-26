<?php
/*
Plugin Name: Ni WooCommerce Cost Of Goods
Description: Ni WooCommerce Cost Of Goods adds cost prices and offers profit insights, helping you optimize pricing and enhance profitability in your store.
Author: anzia
Version: 3.2.8
Author URI: http://naziinfotech.com/
Plugin URI: https://wordpress.org/plugins/ni-woocommerce-cost-of-goods/
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/agpl-3.0.html
Text Domain: wooreportcog
Domain Path: /languages/
Requires at least: 4.7
Tested up to: 6.6.2
WC requires at least: 3.0.0
WC tested up to: 9.3.3
Last Updated Date: 12-October-2024
Requires PHP: 7.0
*/
if ( ! defined( 'ABSPATH' ) ) { exit;}
if( !class_exists( 'Ni_WooCommerce_Cost_Of_Goods' ) ) {
	class Ni_WooCommerce_Cost_Of_Goods{
		var $ni_constant = array();  
		 public function __construct(){
			 $this->ni_constant = array(
				 "prefix" 		  => "ni-",
				 "manage_options" => "manage_options",
				 "menu"   		  => "ni-cost-of-goods",
				 "file_path"   	  => __FILE__,
				);
			include("include/ni-woocommerce-cost-of-goods-init.php");
			$obj_init =  new Ni_WooCommerce_Cost_Of_Goods_Init($this->ni_constant);
			add_action( 'plugins_loaded',  array(&$this,'plugins_loaded') );
			add_filter( 'plugin_action_links', array( $this, 'plugin_action_links_ni_cost_of_goods' ), 10, 2);

			add_action('before_woocommerce_init', function() {
				if (class_exists('\Automattic\WooCommerce\Utilities\FeaturesUtil')) {
					\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
				}
			});
		 }
		 function plugin_action_links_ni_cost_of_goods($actions, $plugin_file){
		 	static $plugin;

			if (!isset($plugin))
				$plugin = plugin_basename(__FILE__);
				
			if ($plugin == $plugin_file) {
					$buy_pro = array('buypro' => '<a href="http://naziinfotech.com/product/ni-woocommerce-cost-of-good-pro/" target="_blank">' . __('Buy Pro', 'wooreportcog') . '</a>');
					$site_link = array('support' => '<a href="http://naziinfotech.com" target="_blank">' . __('Support', 'wooreportcog') . '</a>');
					$email_link = array('email' => '<a href="mailto:support@naziinfotech.com" target="_top">' . __('Email', 'wooreportcog') . '</a>');
					
					$actions = array_merge($site_link, $actions);
					$actions = array_merge($email_link, $actions);
					$actions = array_merge($buy_pro, $actions);
			}
				
			return $actions;
		 }
		 function plugins_loaded(){
			//load_plugin_textdomain('wooreportcog', WP_PLUGIN_DIR.'/ni-woocommerce-cost-of-goods/languages','ni-woocommerce-cost-of-goods/languages');
			load_plugin_textdomain('wooreportcog', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		 }	
	}
	$obj = new Ni_WooCommerce_Cost_Of_Goods();
}
?>