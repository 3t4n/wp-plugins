<?php 
/*
Plugin Name: 千易网盘(新版)
Plugin URI: http://www.waisir.com/1000eb
Description: 此插件可以在新建文章的界面直接上传文件到千易网盘,获取下载页面地址.并保存在POST编辑页面
Version: 3.3.1
Author: 歪SIR
Author URI: http://www.waisir.com
*/
/*
Change logs
1.2 Fix some jquery problems
2.0 Update the api gateway, add TinyMCE button in visual editor and quicktag in html view 
3.3 Compatible with WP V3.3

*/


/////////////////////////////////////////////////////////////////////////////////////
if( !defined('WS_QIANYI_NAME') || WS_QIANYI_NAME == '1000eb' ){
	define( 'WS_QIANYI_NAME', '1000eb' );

	
	
include_once('includes/config.php');
include_once('includes/functions.php');
/////////////////////////////////////////////////////////////////////////////////////

 
// init process for button control
add_action('admin_init', 'wp_3721up_addbuttons');
add_action('admin_print_footer_scripts','ws_3721up_addQuickTag', 99999);

/////////////////////////////////////////////////////////////////////////////////////

//add_action('dbx_post_sidebar','ws_3721up_form');

add_action( 'add_meta_boxes', 'wp_3721up_add_custom_box' );





add_action('admin_menu', 'ws_3721up_admin_menu_constructor');
add_action('admin_init', 'ws_3721up_admin_init' );
add_action('admin_print_styles-post.php', 'ws_3721up_admin_header');
add_action('admin_print_styles-post-new.php', 'ws_3721up_admin_header');
register_activation_hook( __FILE__,'ws_3721up_install');
register_uninstall_hook(__FILE__,'ws_3721up_uninstall');

}
?>