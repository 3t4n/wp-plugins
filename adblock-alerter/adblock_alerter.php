<?php
/**
 * Plugin Name: adBlock Alerter
 * Plugin URI: https://wordpress.org/plugins/adblock-alerter/
 * Description: Detects if a user is using adBlock, adBlock Plus or any other software that might be disabling ads on your website and promptly gives them a message to disable it/add your website to their whitelist. The message is totally customizable. To setup your plugin, click 'adBlock Alerter' on your left sidebar.
 * Version: 0.8.5
 * Author: SWD
 * Author URI: http://www.superwebdev.com
 * License: GPLv2
 */

class ABA {
	public function __construct() {
		register_activation_hook(__FILE__, array($this, 'install'));
		register_deactivation_hook(__FILE__, array($this, 'uninstall'));
		
		add_action('admin_menu', array($this, 'menu'));
		add_action('wp_head', array($this, 'itih'), 0);
		add_action("wp_footer", array($this, "itif"));
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
			wp_enqueue_style('style', plugins_url("css/style.css", __FILE__));
			include_once("includes/jj.php");
		}
	}
	
	public function itif() {
		if(get_option("adb_status") == 1) {
			echo '<script>blocker.init();</script>';
		}
	}
	
	public function menu() {
		add_menu_page('adBlock Alerter Settings', 'adBlock Alerter', 'administrator', "ad_block_alerter_settings", array($this, "settingsPage"), plugins_url("img/alerter.png", __FILE__), null);
	}
}
$obj = new ABA();?>