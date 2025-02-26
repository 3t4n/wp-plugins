<?php
/*
Plugin Name: Display product variations dropdown on shop page
Description: Display product variations dropdown on shop page and category page
Author: anzia
Version: 1.1.3
Author URI: http://naziinfotech.com/
Plugin URI: https://wordpress.org/plugins/display-variation-dropdown-on-shop-page/
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/agpl-3.0.html
Requires at least: 4.7
Tested up to: 6.5.3
WC requires at least: 3.0.0
WC tested up to: 8.9.1
Last Updated Date: 31-May-2024
Requires PHP: 7.0
*/
if ( ! defined( 'ABSPATH' ) ) { exit;}
if( !class_exists( 'Ni_Variation_Dropdown_Shop_Page' ) ) {
	class Ni_Variation_Dropdown_Shop_Page{
		var $nidsrfw_constant = array();  
		 public function __construct(){
			 
			 	add_action( 'activated_plugin',  array(&$this,'niwoovd_activation_redirect' ));
			 	add_filter( 'plugin_action_links',  array(&$this,'niwoovd_plugin_action_links'), 10, 5 );
			 
			include("includes/ni-variation-dropdown-shop-page-init.php");
			$obj_init =  new Ni_Variation_Dropdown_Shop_Page_Init($this->nidsrfw_constant);
		 }
		 function niwoovd_plugin_action_links($actions, $plugin_file){
		 	static $plugin;

			if (!isset($plugin))
				$plugin = plugin_basename(__FILE__);
				if ($plugin == $plugin_file) {
						  $settings_url = admin_url() . 'admin.php?page=niwoovd-setting';
							$settings = array('settings' => '<a href='. $settings_url.'>' . __('Settings', '') . '</a>');
							$site_link = array('support' => '<a href="http://naziinfotech.com" target="_blank">Support</a>');
							$email_link = array('email' => '<a href="mailto:support@naziinfotech.com" target="_top">Email</a>');
					
							$actions = array_merge($settings, $actions);
							$actions = array_merge($site_link, $actions);
							$actions = array_merge($email_link, $actions);
						
					}
				
				return $actions;
		 }
		 static   function niwoovd_activation_redirect($plugin){
			 if( $plugin == plugin_basename( __FILE__ ) ) {
				 
				 
				exit( wp_redirect( admin_url( 'admin.php?page=niwoovd-setting' ) ) );
			}
		}
	}
	$obj = new Ni_Variation_Dropdown_Shop_Page();
}
?>