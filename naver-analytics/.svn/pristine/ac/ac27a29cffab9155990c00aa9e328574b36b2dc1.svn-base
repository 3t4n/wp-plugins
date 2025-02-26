<?php
/*
Plugin Name: NAVER Analytics
Plugin URI: http://850219.com
Description: <a href="http://analytics.naver.com/">NAVER Analytics</a>를 Wordpress에서 이용할 수 있습니다.
Version: 0.9
Author: 김 민준 (Minjun Kim)
Author URI: http://850219.com
License: Copyright
Text Domain: naver-analytics
*/
define('NAVER_ANALYTICS_VERSION', '0.9');
define('NAVER_ANALYTICS_PLUGIN_URL', plugin_dir_url( __FILE__ ));

add_action('wp_head', array('NaverAnalytics', 'add_code'), 9999999);
add_action('admin_notices', array('NaverAnalytics', 'admin_warnings'));
add_action('admin_menu', array('NaverAnalytics', 'config_menu'));

class NaverAnalytics
{
	public static function getApiKey(){
		if( !get_option('naver_analytics_api_key') ) return false;
		
		return get_option('naver_analytics_api_key');
	}
	
	/**
	** Menu
	**/
	public static function config_menu(){
		if( function_exists('add_submenu_page') ) {
			add_submenu_page('plugins.php', __('NAVER Analytics 설정'), __('NAVER Analytics 설정'), 'manage_options', 'naver-analytics-key-config', array(get_class(), 'config_key'));
		}
	}

	/**
	** Add Code
	**/
	public static function add_code(){
		if(!self::getApiKey()){return false;}
		echo "<!-- NAVER Analytics for Wordpress ".NAVER_ANALYTICS_VERSION." -->\n";
		echo "<script type=\"text/javascript\" src=\"http://wcs.naver.net/wcslog.js\"></script>\n";
		echo "<script type=\"text/javascript\">if(!wcs_add) var wcs_add = {};wcs_add[\"wa\"] = \"".self::getApiKey()."\";wcs_do();</script>\n";
	}

	/**
	** Config Key
	**/
	public static function config_key(){
		if( $_POST['Submit'] ){
  		if($_POST['apikey']) {
  			update_option('naver_analytics_api_key', $_POST['apikey']);
  			$apikey_error = 0;
  			echo '<div class="wrap"><h2>NAVER Analytics 설정</h2><p>NAVER Analytics API KEY설정이 저장 되었습니다.</p><p>NAVER Analytics는 공식사이트에서 확인 하실 수 있습니다.</p><p><a href="http://analytics.naver.com" target="_blank">NAVER Analytics 시작하기 &raquo;</a></div>';
			} else {
  			$apikey_error = 1;
			}
		}
		if(!$_POST['Submit'] || $apikey_error != 0) include dirname(__FILE__)."/page_admin_setting.php";
	}
	public static function admin_warnings(){
		if(!self::getApiKey()){
			echo "<div id='naver-analytics-apikey-warning' class='updated fade'><p><strong>".__('NAVER Analytics')."</strong> ".sprintf(__('<a href="%1$s">API KEY가 입력</a>되지 않았습니다.'), "plugins.php?page=naver-analytics-key-config")."</p></div>";
		}
	}
}
?>