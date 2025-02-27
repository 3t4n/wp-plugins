<?php if ( ! defined( 'ABSPATH' ) ) exit; 
/*
	Plugin Name: Export Customers Data
	Plugin URI: https://wordpress.org/plugins/export-customers-data
	Description: Using WooCommerce in combination with this plugin you can export customers data.
	Version: 1.2.5
	Author: Fahad Mahmood
	Author URI: http://androidbubble.com/blog/
	Text Domain: woo-cde
	Domain Path: /languages/	
	License: GPL2
	
	
	This WordPress plugin is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 2 of the License, or
	any later version.
	 
	This WordPress plugin is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.
	 
	You should have received a copy of the GNU General Public License
	along with this WordPress plugin. If not, see http://www.gnu.org/licenses/gpl-2.0.html.
*/


	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}else{
		 clearstatcache();
	}
	
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
	$wcde_all_plugins = get_plugins();
	$wcde_active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
	
	if ( array_key_exists('woocommerce/woocommerce.php', $wcde_all_plugins) && in_array('woocommerce/woocommerce.php', $wcde_active_plugins) ) {
		
		
		
		
		global $wcde_url, $wcde_data, $wcde_pro, $wcde_premium_copy, $wcde_bulk_instantiated, $wcde_activated;
	
		$wcde_bulk_instantiated = false;
		$wcde_activated = true;
		
		$wcde_premium_copy = 'https://shop.androidbubbles.com/product/export-customers-data';		
		$wcde_data = get_plugin_data(__FILE__, true, false);
		$wcde_url = plugin_dir_url(__FILE__);		
		
		define( 'WCDE_PLUGIN_DIR', dirname( __FILE__ ) );
	
		$wcde_pro_file = WCDE_PLUGIN_DIR . '/pro/wcde-pro.php';
		
		
		$wcde_pro =  file_exists($wcde_pro_file);
		
		
		require_once WCDE_PLUGIN_DIR . '/inc/functions.php';
		
		
		if($wcde_pro)
		include_once($wcde_pro_file);
		
		if(is_admin()){
			
			add_action( 'admin_menu', 'wcde_admin_menu' );	
			
			if(function_exists('wcde_plugin_linx')){
				$plugin = plugin_basename(__FILE__); 
				add_filter("plugin_action_links_$plugin", 'wcde_plugin_linx' );	
			}
			
			if(function_exists('wcde_admin_scripts') && isset($_GET['page']) && $_GET['page']=='wcde_settings')
			add_action( 'admin_enqueue_scripts', 'wcde_admin_scripts', 99 );	
			
		}else{
			if(function_exists('wcde_front_scripts'))
			add_action( 'wp_enqueue_scripts', 'wcde_front_scripts', 99 );	
		}
		
	}