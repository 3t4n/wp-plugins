<?php
/**
 * Plugin Name: Ad Blocking Alert
 * Plugin URI: 
 * Description: Detects if a user is using any sort of ad blocking software such as adblock or abp, fully customizable to allow image and text popups and also ability to stop the user from browsing the site or allow them to hide the warning and continue.
 * Version: 1.0.3
 * Author: deano1987
 * Author URI: http://deano.me
 */

class ABA {
	public function __construct() {
		register_activation_hook(__FILE__, array($this, 'install'));
		register_deactivation_hook(__FILE__, array($this, 'uninstall'));
		
		add_action('admin_menu', array($this, 'menu'));
		add_action('wp_footer', array($this, 'itih'), 0);
		add_action( 'admin_init', array($this, 'registerSettings') );
	}
	
	//register input
	public function registerSettings() {
		register_setting('adb_settings', "adb_status");
		register_setting('adb_settings', "adb_display_status");
		register_setting('adb_settings', "adb_display_message");
		register_setting('adb_settings', "adb_display_image");
	}
	
	//activation
	public function install() {
		add_option("adb_status", 1);
		add_option("adb_display_status", 0);
		add_option("adb_display_message", 'Uh oh, it looks like you have adBlock or an ad blocking application enabled. Please disable it or add us your whitelist then refresh the page to close this message.');
		add_option("adb_display_image", plugins_url("img/alert.png", __FILE__));
	}
	
	//uninstall
	public function uninstall() {
		delete_option("adb_status");
		delete_option("adb_display_status");
		delete_option("adb_display_message");
		delete_option("adb_display_image");
	}
	
	public function settingsPage() {
		include_once('includes/settings.php');
	}
	
	public function itih() {
		if(get_option("adb_status") == 1) {
			//wp_enqueue_style('style', plugins_url("css/style.css", __FILE__));
			$path = explode('wp-content', dirname(__FILE__));
			$path = '/wp-content' . $path[1];
			include_once("includes/jj.php");
		}
	}
	
	public function menu() {
		add_menu_page('Ad Blocking Alert Settings', 'Ad Blocking Alert', 'administrator', "ad_block_alerter_settings", array($this, "settingsPage"), plugins_url("img/alerter.png", __FILE__), null);
	}
}
$obj = new ABA();?>