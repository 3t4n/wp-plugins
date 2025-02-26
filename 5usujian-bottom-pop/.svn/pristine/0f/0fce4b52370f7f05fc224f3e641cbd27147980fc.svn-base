<?php
/*
Plugin Name: 5usujian-bottom-pop
Plugin URI: https://www.5usj.cn/plugins/156.html
Description: 在网页底部显示一个优雅的悬浮层，定制化表单功能可快捷收集用户资料，预约活动等
Version: 1.0.3
Author: 5usj.cn
Author URI: https://5usj.cn/
*/

if ( ! defined( 'ABSPATH' ) ) exit;

$wysj_bottom_pop_uploader = wp_upload_dir();
$wysj_pop_url = trailingslashit( plugins_url().'/'.dirname(plugin_basename(__FILE__)) );
$wysj_pop_url = str_replace( array( 'https://', 'http://' ), array( '//', '//' ), $wysj_pop_url );
define('WYSJ_POP_URL', $wysj_pop_url);

define('WYSJ_POP_DIR', plugin_dir_path( __FILE__ ));

$wysj_pop_uploads_url = trailingslashit( content_url().'/uploads/'.dirname( plugin_basename(__FILE__) ) );
$wysj_pop_uploads_url = str_replace( array( 'https://', 'http://' ), array( '//', '//' ), $wysj_pop_uploads_url );
define('WYSJ_POP_UPLOADS_URL',  $wysj_pop_uploads_url);

define('WYSJ_POP_UPLOADS_DIR', $wysj_bottom_pop_uploader['basedir'].'/'.dirname( plugin_basename(__FILE__) ) );
define('WYSJ_POP_VER','1.0.2');

global $wpdb;
define('WYSJ_POP_TABLE', $wpdb->prefix . 'wysj_btpop_list');

require_once(WYSJ_POP_DIR.'/wysj-admin/wysj-add-options.php');

$wyBtpopOptions = get_option("wysj_bt_pop_options");
$wyBpActive = get_option("wysj_btpop_active");

require_once(WYSJ_POP_DIR.'/wysj-front/wysj-front.php');
function wysj_bottom_pop(){
	global $wyBtpopOptions;
	global $wyBpActive;
	if ($wyBtpopOptions["display"] == "all") {
		wysj_bt_pop_html();
	}else{
		if (is_front_page()) {
			wysj_bt_pop_html();
		}
	}
}

if( $wyBtpopOptions['type'] != 'inside' ){
	add_action('get_footer','wysj_bottom_pop');
}

register_activation_hook( __FILE__ , 'wysj_bottom_pop_activate' );

function wysj_btpop_deleteoption(){
	delete_option("wysj_bt_pop_options");
}
if($wyBtpopOptions["delete"]=="yes"){
	register_deactivation_hook( __FILE__ , 'wysj_btpop_deleteoption' );
}

require_once(WYSJ_POP_DIR.'/wysj-admin/wysj-action.php');
if(is_admin()){require_once(WYSJ_POP_DIR.'/wysj-admin/wysj_bottom_pop_admin.php');}

//支持短代码
function wysj_bottom_pop_inside(){
	global $wyBtpopOptions;
	if( !is_admin() && $wyBtpopOptions['type'] == 'inside'){
		$string = wysj_bt_pop_html_inside();
		return $string;
	}
}
function register_wysj_btpop_shortcodes(){
	add_shortcode('wysj-btpop-form', 'wysj_bottom_pop_inside');
 }
 //短代码调用方法
 //[wysj-btpop-form]
 add_action( 'init', 'register_wysj_btpop_shortcodes');
