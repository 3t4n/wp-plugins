<?php
/*
Plugin Name: Awesome Ads - Google Adsense and Others
PLugin URI: http://wordpress.org/
Description: Awesome Ads is the easiest way to show Google Adsense and Others ads in your wordpress. You don't need to copy and paste codes.
Version: 1.0.5
Author URI: http://awsmteam.com
*/
define("NAME", "Awesome Ads");

define("NAME_", "awesome-ads");

define("PLUGIN_URL",WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)));

define("PLUGIN_PATH",WP_PLUGIN_DIR.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)));

define("ADMIN_PAGES_PATH", 'admin_pages/');

define("LIB_PATH", 'libs/');

//Includes das funções
$suported_networks[] = 'google';
$suported_networks[] = 'chitika';

require_once(LIB_PATH.'functions.php');

require_once(LIB_PATH.'awesome_google_ads.php');

require_once(LIB_PATH.'awesome_chitika_ads.php');

//Global Variables
$networks = '';

$ads = Array();

$print_counter = 0;

$load_ads_array = 0;

$positioning = array();


//Load Languages
add_action( 'init', 'awesome_ads_init' );
function awesome_ads_init() {
	global $networks;
	load_plugin_textdomain(NAME_, false, dirname( plugin_basename( __FILE__ )).'/languages' );
}

//Add Menus
add_action('admin_menu', 'create_menu');
function create_menu() {
	
	global $networks, $wp_version, $suported_networks;
	verify_adult_content();
	$google_net_array = Array('slug'=>'awesome_google_ads', 'name'=>'Google Adsense', 'active'=>'null', 'last_edit'=>date('Y-m-d'),'option_slug'=>'awesome_ads_google_json','user_option_slug'=>'awesome_ads_users_google');
	$chitika_net_array = Array('slug'=>'awesome_chitika_ads','name'=>'Chitika','active'=>'null', 'last_edit'=>date('Y-m-d'),'option_slug'=>'awesome_ads_chitika_json','user_option_slug'=>'awesome_ads_users_chitika');
	
	if(!get_option('awesome-ads-networks')){
		addNetwork($google_net_array);
		addNetwork($chitika_net_array);
	}
	else{
		$networks = json_decode(get_option('awesome-ads-networks'));
		if( count($networks) != count($suported_networks)){
			update_option('awesome-ads-networks','');
			addNetwork($google_net_array);
			addNetwork($chitika_net_array);
		}
	}
	
	if (version_compare($wp_version,"2.7-alpha", '>')) {
		add_object_page(__(NAME, NAME_), __(NAME, NAME_), 'edit_pages', NAME_, 'awesome_options_page');
		if(!$networks){
			$networks = getNetworks();
		}
		foreach($networks as $k=>$v){
			add_submenu_page(NAME_, __($v->name, NAME_), __($v->name, NAME_), 'edit_pages', $v->slug, 'awesome_options_page');
		}
	}
	else{
		add_menu_page(__(NAME, NAME_), __(NAME, NAME_), 'edit_pages', NAME_, 'awesome_options_page');
		if(!$networks){
			$networks = getNetworks();
		}
		foreach($networks as $k=>$v){
			add_submenu_page(NAME_, __($v->name, NAME_), __($v->name, NAME_), 'edit_pages', $v->slug, 'awesome_options_page');
		}
	}
	
	add_options_page(NAME, NAME, 'edit_pages', NAME_, 'awesome_options_page');
}

//Load admin page
function awesome_options_page() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	$page = $_GET['page'].'.php';
	require_once ADMIN_PAGES_PATH.$page;
}

//Get Ads Array
function get_array_ads($author, $single, $home, $page, $category){
	
	global $doing_rss, $networks, $ads;
	
	$ads = Array();
	
	$networks = json_decode(get_option('awesome-ads-networks'));
	if($networks){
		shuffle($networks);
		
		foreach($networks as $k=>$net){
			
			if($net->active == 'on'){
					
				$slug = $net->slug;
				
				$temp = explode('_',$slug);
				
				$rede = $temp[1];
				
				$net_options = get_values_awesome_ads($slug);
				
				$func_temp = 'get_awesome_'.$rede.'_ads';
								
				$obj_temp = 'awesome_ads_'.$rede.'_positioning';
				
				$align = $net_options['values']->$obj_temp;
				
				//Home
				$prefix_temp = 'awesome_ads_'.$rede.'_home';
				if(	$home && $net_options['values']->$prefix_temp == "on"){
					$print_number = 'awesome_ads_'.$rede.'_number_ads_pages';
					for( $i=1 ; $i <= $net_options['values']->$print_number ; $i++){
						$net_options['values']->number_of_execution = $i;
						$ads['home'][]= Array('ad'=> $func_temp($net_options['values'],$net_options['users'],$author, $single),'rede'=>$rede, 'align'=>$align);
					}
				}
				
				//Category
				$prefix_temp = 'awesome_ads_'.$rede.'_category';
				if(	$category){
					$print_number = 'awesome_ads_'.$rede.'_number_ads_pages';
					for( $i=1 ; $i <= $net_options['values']->$print_number ; $i++){
						$net_options['values']->number_of_execution = $i;
						$ads['category'][]= Array('ad'=> $func_temp($net_options['values'],$net_options['users'],$author, $single),'rede'=>$rede, 'align'=>$align);
					}
				}
				
				//Page
				$prefix_temp = 'awesome_ads_'.$rede.'_pages';
				if(	$page && $net_options['values']->$prefix_temp == "on"){ 
					$print_number = 'awesome_ads_'.$rede.'_number_ads_pages';
					for( $i=1 ; $i <= $net_options['values']->$print_number ; $i++){
						$net_options['values']->number_of_execution = $i;
						$ads['page'][]= Array('ad'=> $func_temp($net_options['values'],$net_options['users'],$author, $single),'rede'=>$rede, 'align'=>$align);
					}
				}
				
				//Post
				$prefix_temp = 'awesome_ads_'.$rede.'_posts';
				if(	$single && $net_options['values']->$prefix_temp == "on"){ 
					$print_number = 'awesome_ads_'.$rede.'_number_ads_posts';
					for( $i=1 ; $i <= $net_options['values']->$print_number ; $i++){
						$net_options['values']->number_of_execution = $i;
						$ads['post'][]= Array('ad'=> $func_temp($net_options['values'],$net_options['users'],$author, $single),'rede'=>$rede, 'align'=>$align);
					}
					if ($net_options['values']->awesome_ads_google_mobile_level=='on' && wp_is_mobile()){
						$net_options['values']->number_of_execution = 0;
						$ads['post'][]= Array('ad'=> $func_temp($net_options['values'],$net_options['users'],$author, $single),'rede'=>$rede, 'align'=>$align);
					}
				}
			}
		}
	}
	return($ads);
	
}// End get_array_ads()

add_filter('the_content', 'awesome_content_filter');
function awesome_content_filter($content){
	global $doing_rss, $networks, $ads, $print_counter, $load_ads_array;
	
	if(!$load_ads_array){
		
		get_array_ads(get_the_author_meta('ID'), is_single() , is_home(), is_page(), is_category());
		
		$load_ads_array = 1;
	}
	
	if( is_single() ){
		$adsArray = $ads['post'];
		if($adsArray){
			foreach($adsArray as $ad){
				$content = placeAd( $content, $ad);
			}
		}
		return $content;
	}
	
	else if( is_home()){
		$adsArray = $ads['home'];
		if($adsArray){
			while($print_counter < count($adsArray)){
				$content = $adsArray[$print_counter]['ad'].$content;
				$print_counter++;
				break;
			}
		}
		return $content;
	}
	
	else if( is_category()){
		$adsArray = $ads['category'];
		if($adsArray){
			while($print_counter < count($adsArray)){
				echo $adsArray[$print_counter]['ad'];
				$print_counter++;
				break;
			}
		}
		return $content;
	}
	
	else if( is_page() ){
		$adsArray = $ads['page'];
		if($adsArray){		
			foreach($adsArray as $ad){
				$content = placeAd( $content, $ad);
			}
		}
		return $content;
	}
	
	else{
		return $content;
	}
}
?>