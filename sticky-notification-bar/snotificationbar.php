<?php
/*
Plugin Name: Sticky Notification Bar
Plugin URI: http://www.wpfruits.com/downloads/wp-plugins/notification-bar-plugin/
Description: This plugin will show notification at top of the header.
Author: WPFruits
Version: 1.0.7
Author URI: http://www.wpfruits.com
*/
// ----------------------------------------------------------------------------------

// include all required files ------------
include_once('admin/snbar-admin.php');
include_once('front/snbar-front.php');
function snbar_backend_scripts() {
	if(is_admin()){
		wp_enqueue_script('jquery');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
        wp_enqueue_script('farbtastic');
        wp_enqueue_style('farbtastic');		
		wp_enqueue_script('snbar-admin-script', plugins_url('admin/js/snbar-admin.js',__FILE__), array('jquery','media-upload','thickbox'));
		wp_enqueue_style('snbar-admin-style',plugins_url('admin/css/snbar-admin.css',__FILE__), false, '1.0.0' );
	}
}
add_action('admin_init', 'snbar_backend_scripts');

function snbar_frontend_script(){
	if(!is_admin()){
        wp_enqueue_script('jquery');
		wp_enqueue_script('snbar-front-script',plugins_url('front/js/snotificationbar.js',__FILE__), array('jquery'));	
		wp_enqueue_style('snbar-front-style',plugins_url('front/css/snotificationbar.css',__FILE__));
	}
}
add_action('wp_enqueue_scripts', 'snbar_frontend_script');

add_action('admin_menu', 'Sticky_notification_bar_plugin_admin_menu');
function Sticky_notification_bar_plugin_admin_menu(){
     add_menu_page('sticky_notification_bar', ' Sticky Notification Bar','administrator', 'sticky_notification_bar', 'sticky_notification_bar_backend_menu',plugins_url('images/snbar-icon.png',__FILE__));
}
	
function snbar_defaults(){
	    $default = array(
		'snbar_defaultposition' => 'Top',
		'snbar_color_scheme' => '#0F67A1',
		'snbar_sticky_distance' => '100',
        'snbar_bar_width_mode' => 'Full width',
		'snbar_bar_width' => '',
		'snbar_facebookUrl'=> 'http://www.wpfruits.com',
		'snbar_twitterUrl'=> 'http://www.wpfruits.com',
		'snbar_linkedinUrl'=> 'http://www.wpfruits.com',
		'snbar_googleUrl'=> 'http://www.wpfruits.com',
		'snbar_rssUrl'=> 'http://www.wpfruits.com',
		'snbar_facebookLike'=> '1',
    	'snbar_logo_chkbox'=> '1',
		'snbar_logo_path'=> plugins_url('images/default_logo.jpg',__FILE__),
		'snbar_content_type'=> 'Text',
		'snbar_content_color'=> '#000000',
		'snbar_search_chk'=> '1',
		'snbar_content_textarea'=> 'Simply dummy text of the printing and typesetting industry.',        		
		'snbar_scrolltop_btn_chk'=> '1',
		'snbar_set_cookie_btn'=> '1',
    );
return $default;
}

function snbar_options_updates() {
		$options = $_POST['Snbar_options'];
		
		if(!isset($options['snbar_facebookLike']))
		$options['snbar_facebookLike']='0';
		
		if(!isset($options['snbar_search_chk']))
		$options['snbar_search_chk']='0';
		
		if(!isset($options['snbar_logo_chkbox']))
		$options['snbar_logo_chkbox']='0';
		
		if(!isset($options['snbar_scrolltop_btn_chk']))
		$options['snbar_scrolltop_btn_chk']='0';
         
		if(!isset($options['snbar_menu_select']))
		$options['snbar_menu_select']='0';
		
		if(!isset($options['snbar_set_cookie_btn']))
		$options['snbar_set_cookie_btn']='0';
		
	    $snbar_update_val = array(
		'snbar_defaultposition' => $options['snbar_defaultposition'],
		'snbar_color_scheme' => $options['snbar_color_scheme'],
    	'snbar_sticky_distance' =>$options['snbar_sticky_distance'],
    	'snbar_bar_width_mode' =>$options['snbar_bar_width_mode'],
    	'snbar_bar_width' => $options['snbar_bar_width'],
		'snbar_facebookUrl' => $options['snbar_facebookUrl'],		
		'snbar_twitterUrl'=> $options['snbar_twitterUrl'],	
		'snbar_linkedinUrl'=> $options['snbar_linkedinUrl']	,
		'snbar_googleUrl'=> $options['snbar_googleUrl'],	
		'snbar_rssUrl'=> $options['snbar_rssUrl'],	
		'snbar_facebookLike'=> $options['snbar_facebookLike'],	
		'snbar_logo_chkbox'=> $options['snbar_logo_chkbox']	,
		'snbar_logo_path'=> $options['snbar_logo_path'],	
		'snbar_content_type'=> $options['snbar_content_type'],
		'snbar_content_color'=> $options['snbar_content_color'],
		'snbar_search_chk'=> $options['snbar_search_chk'],	
		'snbar_content_textarea'=>$options['snbar_content_textarea'],	
		'snbar_menu_select'=>$options['snbar_menu_select'],	
		'snbar_scrolltop_btn_chk' =>$options['snbar_scrolltop_btn_chk'],
        'snbar_set_cookie_btn' => $options['snbar_set_cookie_btn']			
		
    );
return $snbar_update_val;
}

if(isset($_POST['snbar_update'])){
	update_option('Snbar_options', snbar_options_updates());
}

function Sticky_notification_bar_plugin_install() {  
	$snbar_options_chk = get_option('Snbar_options');
	if($snbar_options_chk=="")	
	add_option('Snbar_options', snbar_defaults());
} 

// get sticky notification bar version
function stickybar_get_version(){
	if ( ! function_exists( 'get_plugins' ) )
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$plugin_file = basename( ( __FILE__ ) );
	return $plugin_folder[$plugin_file]['Version'];
}


// Runs when plugin is activated and creates new database field
register_activation_hook(__FILE__,'Sticky_notification_bar_plugin_install');
?>