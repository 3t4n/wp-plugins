<?php
if (!defined('ABSPATH')) exit;

class Pektsekye_PizzaToppings_Setup_Install {
	

	public static function install(){
	
		if ( !class_exists( 'WooCommerce' ) ) { 
		  deactivate_plugins('pofw-pizza-toppings');
		  wp_die( __('The POFW Pizza Toppings plugin requires WooCommerce to run. Please install WooCommerce and activate.', 'pofw-pizza-toppings'));
	  }

    if ( version_compare( WC()->version, '3.0', "<" ) ) {
      wp_die(sprintf(__('WooCommerce %s or higher is required (You are running %s)', 'pofw-pizza-toppings'), '3.0', WC()->version));
    }	
    	
		self::create_tables();
		
	  add_option('pofw_pizzatoppings_min_selection', 2);
	  add_option('pofw_pizzatoppings_max_selection', 10);	
	  add_option('pofw_pizzatoppings_min_message', 'Please select more toppings');		
	  add_option('pofw_pizzatoppings_max_message', 'Sorry you have selected the maximum number of toppings');					
	}


	private static function create_tables(){
		global $wpdb;

		$wpdb->hide_errors();
		 
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		dbDelta(self::get_schema());
	}


	private static function get_schema(){
		global $wpdb;

		$collate = '';

		if ($wpdb->has_cap( 'collation')){
			if (!empty( $wpdb->charset)){
				$collate .= "DEFAULT CHARACTER SET $wpdb->charset";
			}
			if (!empty( $wpdb->collate)){
				$collate .= " COLLATE $wpdb->collate";
			}
		}
		
		return "
CREATE TABLE {$wpdb->base_prefix}pofw_pizzatoppings_product (
  `pt_product_id` int(11) NOT NULL auto_increment,
  `product_id` int(11) unsigned NOT NULL,
  `option_id` int(11)  DEFAULT NULL,  
  `min_selection` int(11) unsigned NOT NULL DEFAULT 0, 
  `max_selection` int(11) unsigned NOT NULL DEFAULT 0,             
  PRIMARY KEY (pt_product_id)  
) $collate;		
		";
		
	}

}
