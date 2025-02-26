<?php
/**
 * Plugin Name: Add Tracking Code To WC Thank You Page
 * Plugin URI: 
 * Description: This plugin will allows you to add tracking code to the woocommerce thank you page. No need to write any code.
 * Author: Ganesh Veer
 * Author URI: 
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain :tctty 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/********************************
	Check wordpress version
********************************/
if(version_compare(get_bloginfo('version'), '4.0', '<' )){
	$message = 'Need Wordpress version 4.0 or higher'; 	
 	die($message);
}
/******************************* 
	Define Constants 
********************************/

define('TCTTY_PATH', plugin_dir_path(__FILE__));
define('TCTTY_URI', plugin_dir_url(__FILE__));

/****************************************
	Check if woocommerce is active
****************************************/
if(in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins') ) ) ){

	if(! class_exists("TCTTY_Main")){


		class TCTTY_Main{

			public function __construct(){

					/***** Include Files *******/
					require(TCTTY_PATH.'includes/activation.php');
					require(TCTTY_PATH.'views/admin/settings_page.php');
					

					/***** Include Classes *******/
					require(TCTTY_PATH.'classes/tctty_setting_page.php');
					require(TCTTY_PATH.'classes/tctty_save_setting.php');
					require(TCTTY_PATH.'classes/tctty.php');

				
					/***** Include Hooks *******/
					register_activation_hook(__FILE__, 'TCTTY_Activation');

					add_action('woocommerce_get_sections_products', array(new tctty_setting_page(), 'tctty_add_section'));
					add_filter( 'woocommerce_get_settings_products', 'tctty_setting_page_callback', 10, 2 );
					
					add_action('admin_post_tctty_save_settings_fields', array(new tctty_save_settings(), 'tctty_save_admin_fields'));

					add_action('woocommerce_thankyou', array(new TCTTY(), 'tctty_custom_tracking'));
					
			}
		}

		$tctty_main = new TCTTY_Main();

	}
}