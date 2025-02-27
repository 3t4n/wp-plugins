<?php
/*
Plugin Name: Text Changer for Welcart
Description: This plugin allows you to change the text in Welcart cart pages and member pages.
Author: MAINICHI WEB
Author URI: https://mainichi-web.com/
Text Domain: text-changeer-for-welcart
Domain Path: /languages/
Requires at least: 5.0
Requires PHP: 7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Version: 1.1.0
*/

if(!defined('ABSPATH')) exit;

/* 定義 */
const MAINICHI_WEB_THIS_PLUGIN_NAME_TCW = 'text-changeer-for-welcart';
define( 'TEXT_CHANGER_FOR_WELCART__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'TEXT_CHANGER_FOR_WELCART__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
/* 翻訳 */
function text_changer_for_welcart_plugin_load_textdomain() {
	load_plugin_textdomain('text-changeer-for-welcart');
}
add_action('plugins_loaded', 'text_changer_for_welcart_plugin_load_textdomain');
/* テンプレート読み込み */
require_once( TEXT_CHANGER_FOR_WELCART__PLUGIN_DIR . 'functions/tcw_functions.php' );
require_once( TEXT_CHANGER_FOR_WELCART__PLUGIN_DIR . 'functions/tcw_other.php' );
require_once( TEXT_CHANGER_FOR_WELCART__PLUGIN_DIR . 'other_tab/other_tab_contents.php' );

/* プラグイン一覧に設定リンク追加 */
	function text_changer_for_welcart_plugin_action_links($links, $file) {
		static $this_plugin;
		if (!$this_plugin) {
			$this_plugin = plugin_basename(__FILE__);
		}
		if ($file == $this_plugin) {
			$settingsUrl = admin_url('admin.php?page=tcw_function_settings');
			$settings_link = sprintf(__('<a href="%s">Settings</a>', MAINICHI_WEB_THIS_PLUGIN_NAME_TCW), esc_url($settingsUrl));
			array_unshift($links, $settings_link);
		}
		return $links;
	}
	add_filter('plugin_action_links', 'text_changer_for_welcart_plugin_action_links', 10, 2);
?>