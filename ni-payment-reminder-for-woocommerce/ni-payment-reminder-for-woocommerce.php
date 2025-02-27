<?php
/*
Plugin Name: Ni Payment Reminder For WooCommerce
Description: Ni Payment Reminder for WooCommerce Plugin | Send Payment Reminders.
Author: 	 anzia
Version: 	 1.2.9
Author URI:  http://naziinfotech.com/
Plugin URI:  https://wordpress.org/plugins/ni-payment-reminder-for-woocommerce/
License:	 GPLv3 or later
License URI: http://www.gnu.org/licenses/agpl-3.0.html
Requires at least: 4.7
Tested up to: 6.4.3
WC requires at least: 3.0.0
WC tested up to: 8.7.0
Last Updated Date: 24-March-2024
Requires PHP: 7.0

*/
if ( ! defined( 'ABSPATH' ) ) { exit;} 
if( !class_exists( 'Ni_Payment_Reminder_For_WooCommerce' ) ) {
	class Ni_Payment_Reminder_For_WooCommerce {
		public function __construct(){
			add_action( 'activated_plugin',  array(&$this,'niwoopr_activation_redirect' ));
			
			include_once("includes/niwoopr-core.php");
			$niwoopr_core =  new Ni_WooPR_Core();
			
		}
		static   function niwoopr_activation_redirect($plugin){
			 if( $plugin == plugin_basename( __FILE__ ) ) {
				exit( wp_redirect( admin_url( 'admin.php?page=niwoopr-setting' ) ) );
			}
		}
	}
	$objniprfw =  new Ni_Payment_Reminder_For_WooCommerce();
}
?>