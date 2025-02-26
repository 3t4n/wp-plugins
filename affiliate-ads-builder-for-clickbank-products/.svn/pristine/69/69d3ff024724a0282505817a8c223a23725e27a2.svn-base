<?php
/*
* Plugin Name: Clickbank Affiliate Ads By MyCBGenie 
* Plugin URI: http://mycbgenie.com
* Description: Display ClickBank ads on your site. And it is responsive, means it looks good any devices. Automatically senses your page content and ads are served accordingly! 
* Version: 2.2
* Author: MyCBGenie.com
* Author URI: http://www.mycbgenie.com
*/

if (!defined('MYCBGENIE_ADS_ACTIVE_VERSION'))
    define('MYCBGENIE_ADS_ACTIVE_VERSION', '2.2');



if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
	

require_once 'mycbgenie_ad_widget.inc.php';
require_once 'redirect.inc.php';
require_once 'general.inc.php';

require_once 'text_ads.inc.php';
require_once 'vertical_horizontal_carousel.inc.php';
require_once  'banner_ads.inc.php';
require_once  'image_ads.inc.php';
require_once  'settings.inc.php';
require_once  'cURL_ajax.inc.php';



//add_filter( 'the_content', 'do_shortcode',1 );
//remove_filter( 'the_content', 'do_shortcode' );
// add_filter('the_content', 'do_shortcode', 1);
//add_filter( 'the_content', 'mycbgenie_ads_single_post_pre_content_filter' );
add_filter( 'the_content', 'mycbgenie_ads_single_post_content_filter' );


if (mycbgenie_check_woo_active()  ) {

		
			//add_action('woocommerce_before_main_content','mycbgenie_ads_woo_single_product_content_top_filter', 1 );
			//add_action('woocommerce_after_main_content','mycbgenie_ads_woo_single_product_content_bottom_filter', 100 );

			//add_action('woocommerce_before_shop_loop','mycbgenie_ads_woo_single_product_content_top_filter', 1 );
			//add_action('woocommerce_after_shop_loop','mycbgenie_ads_woo_single_product_content_bottom_filter', 100 );

		//sinle page			
			add_action('woocommerce_before_single_product','mycbgenie_ads_woo_single_product_content_top_filter', 10 );
			add_action('woocommerce_after_single_product_summary','mycbgenie_ads_woo_single_product_content_bottom_filter', 100 );
			
		//shoop or category page
		if (get_option('mycbgenie_ad_top_thumbnail_location')=="shop_loop"){ 

					add_action('woocommerce_before_shop_loop','mycbgenie_ads_woo_single_product_content_top_filter', 1 );
		}
		elseif (get_option('mycbgenie_ad_top_thumbnail_location')=="breadcrumb"){  
		
			
					add_action('woocommerce_archive_description','mycbgenie_ads_woo_single_product_content_top_filter', 1 );

		}
		else{
					add_action('woocommerce_before_main_content','mycbgenie_ads_woo_single_product_content_top_filter', 1 );

		}


			
		if (get_option('mycbgenie_ad_bottom_thumbnail_location')=="before_footer"){  
//echo 'yua';		
					add_action('woocommerce_after_main_content','mycbgenie_ads_woo_single_product_content_bottom_filter', 100 );

		}
		else{
		
					add_action('woocommerce_after_shop_loop','mycbgenie_ads_woo_single_product_content_bottom_filter', 100 );
		}
			

	
			
	//}
			
}


//do_action('woocommerce_before_main_content','mycbgenie_ads_woo_single_product_content_top_filter' );

function mycbgenie_carousel_ads_load_scripts(){


	//	wp_enqueue_script('mycbgenie-ads-slider-js', plugins_url('bxslider_carousel/js/jquery.bxslider.min.js', __FILE__), array('jquery'));
	//	wp_enqueue_script('mycbgenie-ads-main-js', plugins_url('bxslider_carousel/js/main.js', __FILE__));
	//	wp_enqueue_style('mycbgenie-ads-slider-css', plugins_url('bxslider_carousel/styles/jquery.bxslider.css', __FILE__));
	//	wp_enqueue_style('mycbgenie-ads-main-css', plugins_url('bxslider_carousel/styles/main.css', __FILE__));
	//	wp_enqueue_style('mycbgenie-ads-css', plugins_url('bxslider_carousel/styles/controls.css', __FILE__));



}

	//add_action( 'wp_enqueue_scripts',  'mycbgenie_carousel_ads_load_scripts') ;

	add_action('admin_enqueue_scripts', 'mycbgenie_admin_settings_script') ;
	
	function mycbgenie_admin_settings_script(){
	  	wp_enqueue_script('mycbgenie_dashboard_settings', 	plugin_dir_url(__FILE__).'js/dashboard_settings.js', array('jquery'),'',false );
	}

	//use this plugin_basename( __FILE__ );
  	$prefix = is_network_admin() ? 'network_admin_' : '';
	add_filter("{$prefix}plugin_action_links_affiliate-ads-builder-for-clickbank-products/mycbgenie_clickbank_affiliate_ads.php",    'mycbgenie_ads_settings_link');


	add_action('admin_menu', 'mycbgenie_ads_sidebar_menu');

	
	//version change
	add_action('admin_init', 'mycbgenie_ads_version_update');
	
	add_shortcode('mycbgenie_text_ad', 'mycbgenie_text_ad_shortcode');
	add_shortcode('mycbgenie_carousel_ad', 'mycbgenie_carousel_ad_shortcode');
	add_shortcode('mycbgenie_image_ad', 'mycbgenie_image_ad_shortcode');
	add_shortcode('mycbgenie_banner_ad', 'mycbgenie_banner_ad_shortcode');
	
	add_filter('widget_text', 'do_shortcode');

	
/*
	wp_localize_script('mycbgenie_image_ads_div_js','mycbgenie_image_ads_vars', array(
		'global_mycbgenie_image_nonce' => wp_create_nonce('local_mycbgenie_image_nonce'),
		'ajaxadminurl' => admin_url('admin-ajax.php')
	));
	add_action('wp_ajax_mycbgenie_ajax_carousel_ads_action',   'mycbgenie_ajax_carousel_ads_function' );  
	

	 need to ernable only if you are using native kind of wordpress AJAX in Js file of IMAGE Ads.
	add_action('wp_ajax_mycbgenie_ajax_image_ads_action',   'mycbgenie_ajax_image_ads_function' );  
	*/
	


?>