<?php
/*
Plugin Name: WP Mobile Redirect  
Plugin URI: http://wordpress.org/plugins/mobile-redirect-plus-lite/
Description: Detect mobile device and redirect to mobile optimize website. You can also choose whether or not to redirect tablets by enabling or disabling the option. This plugin also gives you the ability to redirect back for viewing full version website.
Version: 2.6
Author: Iqbal Bary <contact@iqbalbary.com>
Author URI: http://iqbalbary.com
*/

require_once 'includes/settings.php';

if ( ! function_exists( 'mobi_plus_redirect_lite' ) ){
	function mobi_plus_redirect_lite() {
		//textdomain
		load_plugin_textdomain( 'mobiplus-lite', false, dirname(plugin_basename(__FILE__)). '/languages/' );
		//call the script
		require_once 'includes/Mobile_Detect.php';
		$detect_lite = new Mobile_Detect_Plus_Lite;

		//Get all option for Redirect setting
		$red_plus_lite = (array)get_option('mobi-setting-lite');

		//Check the session
		$session_check_lite = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		if(substr_count($session_check_lite, 'main=true')>0){
			setcookie('fullsite','true');
			return;
		}

		//Check Specific Page
		$check_url_lite = str_replace('http://', '', $session_check_lite);
		$check_url_lite = str_replace('https://', '', $check_url_lite);
		$check_url_lite = str_replace('www.', '', $check_url_lite);

		@$specific_page_lite = str_replace('http://', '', $red_plus_lite['specific_page']);
		@$specific_page_lite = str_replace('https://', '', $specific_page_lite);
		@$specific_page_lite = str_replace('www.', '', $specific_page_lite);

		if(@$red_plus_lite['redirect_page'] === 'no' && $check_url_lite != $specific_page_lite ){
			return;
		}

		//Check and Redirect
		if(!isset($_COOKIE['fullsite']) && $red_plus_lite['redirect'] === 'yes'){
			//Check Tablet
			if($detect_lite->isTablet()){
				if($red_plus_lite['redirect_tab'] === 'yes'){
					return;
				}else{
					$link_redirect_lite = $red_plus_lite['link'];
					wp_redirect( $link_redirect_lite, 302 );
					exit();
				}
			}

			//Check mobile
			if($detect_lite->isMobile()){
				$link_redirect_lite = $red_plus_lite['link'];
				wp_redirect( $link_redirect_lite, 302 );
				exit();	
			}
		}
	}

	add_action('init', 'mobi_plus_redirect_lite');
}


function mobile_plus_redirect_lite_scripts($hook) {
	if ( 'settings_page_mobile-redirect-plus-lite' != $hook ) {
        return;
    }
    wp_enqueue_style('mobile_plus_redirect_lite', plugins_url('includes/mobile-plus-redirect-lite.css', __FILE__));
    wp_enqueue_script( 'mobile_plus_redirect_lite_script', plugins_url('includes/mobile-plus-redirect-lite.js', __FILE__));
}
add_action( 'admin_enqueue_scripts', 'mobile_plus_redirect_lite_scripts' );
