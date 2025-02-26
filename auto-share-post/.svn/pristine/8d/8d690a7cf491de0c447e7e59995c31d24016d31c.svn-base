<?php
/**
Plugin Name: Autoshare Post In Social Networks
Description: This Plugin Share Posts To Social
Version: 0.5.0
Author: <a href="http://mypgr.ir/">Mostafa Shiraali</a>
Author URI: http://mypgr.ir/
License: A "Slug" license name e.g. GPL2
Text Domain: autosharepost
Domain Path: /languages
 */
 
autosharepost::init();
class autosharepost
{
		public static function init()
		{
		add_action('admin_init', array(__CLASS__,'registersetting') );
		add_action('init',array(__CLASS__,'lang_init'));
		add_action('admin_init',array(__CLASS__,'lang_init'));
		add_action('admin_menu',array(__CLASS__,'menu'));
		register_activation_hook(__FILE__,array(__CLASS__,'active'));
		register_deactivation_hook(__FILE__,array(__CLASS__,'deactivate'));
		
		
		add_action('publish_post',array(__CLASS__,'publish_post'));
		}
	
		 public static function lang_init()
		 {
		   load_plugin_textdomain( 'autosharepost', false,dirname( plugin_basename( __FILE__ ) ) .'/languages/' );
		 }
		public static function menu()
		{
		global $wpdb;
		add_options_page(__("Share Feed","autosharepost"), __("Share Feed","autosharepost"), 1, 'display_options.php',array(__CLASS__,"display_options"));
		}
		
		public static function display_options()
		{
		require_once dirname(__FILE__)."/admin/display_options.php";
		}
		public static function active()
		{
		 global $wpdb;
		add_option('shf_fbappid');// Facebook info
		add_option('shf_fbappsecret');// Facebook info
		add_option('shf_accesstoken');// Facebook info
		add_option('shf_apiid');// Twitter info
		add_option('shf_apisecret');// Twitter info
		add_option('shf_twaccesstoken');// Twitter info
		add_option('shf_twaccesssecret');// Twitter info
		}
		public static function registersetting()
		{
		register_setting('autosharepost_opt','shf_fbappid');
		register_setting('autosharepost_opt','shf_fbappsecret');
		register_setting('autosharepost_opt','shf_accesstoken');
		register_setting('autosharepost_opt','shf_apiid');
		register_setting('autosharepost_opt','shf_apisecret');
		register_setting('autosharepost_opt','shf_twaccesstoken');
		register_setting('autosharepost_opt','shf_twaccesssecret');
		}
		public static function deactivate()
		{
		delete_option('shf_fbappid');
		delete_option('shf_fbappsecret');
		delete_option('shf_accesstoken');
		delete_option('shf_apiid');
		delete_option('shf_apisecret');
		delete_option('shf_twaccesstoken');
		delete_option('shf_twaccesssecret');
		}
		//Share To facebook
		public static function fb_post($app_id,$app_secret,$access_token,$link,$message)
		{
		require_once dirname(__FILE__)."/class/Facebook/autoload.php";
		  $fb = new Facebook\Facebook([
		  'app_id' => ''.$app_id.'',
		  'app_secret' => ''.$app_secret.'',
		  'default_graph_version' => 'v2.5',
		  ]);

		$linkData = [
		  'link' => ''.$link.'',
		  'message' => ''.html_entity_decode($message, ENT_COMPAT, "UTF-8").'',
		  ];

		try {
		  // Returns a `Facebook\FacebookResponse` object
		  $response = $fb->post('/me/feed', $linkData, ''.$access_token.'');
		  return $response;
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
		}	
		
		public static function twitter_post($api_id,$api_secret,$access_token,$access_secret,$message)
		{
		require_once dirname(__FILE__)."/class/codebird.php";
		\Codebird\Codebird::setConsumerKey($api_id, $api_secret);//َapiid apisecret
		$cb = \Codebird\Codebird::getInstance();
		$cb->setToken($access_token, $access_secret);
		 
		$params = array(
		  'status' => $message
		);
		$reply = $cb->statuses_update($params);
		return $reply;
		}
		public static function publish_post($post_id)
		{
		global $wpdb;
		$postinf=get_post($post_id);
		$postlink=get_permalink($post_id);
		autosharepost::fb_post(get_option('shf_fbappid'),get_option('shf_fbappsecret'),get_option('shf_accesstoken'),$postlink,$postinf->post_title);
		autosharepost::twitter_post(get_option('shf_apiid'),get_option('shf_apisecret'),get_option('shf_twaccesstoken'),get_option('shf_twaccesssecret'),$postinf->post_title."\n".$postlink);
	
		}
		
		
}
