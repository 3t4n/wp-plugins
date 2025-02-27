<?php
/* Template Name: その他 */

if(!defined('ABSPATH')) exit;

/* 管理画面ファイル読み込み */
function text_changer_for_welcart_enqueue_admin_style_script()
{
	wp_enqueue_style('tcw_admin-style', TEXT_CHANGER_FOR_WELCART__PLUGIN_URL . 'style_admin.css', array(), date("ymdHis", filemtime(TEXT_CHANGER_FOR_WELCART__PLUGIN_DIR . 'style_admin.css')), 'all');
}
add_action('admin_enqueue_scripts', 'text_changer_for_welcart_enqueue_admin_style_script');

/* メニュー「設定」に追加 */
function text_changer_for_welcart_create_custom_menu_page(){
	require TEXT_CHANGER_FOR_WELCART__PLUGIN_DIR . 'tcw_function_settings.php';
}
function text_changer_for_welcart_add_sub_menu() {
    add_submenu_page('options-general.php', esc_html__('Text Changer for Welcart', MAINICHI_WEB_THIS_PLUGIN_NAME_TCW), esc_html__('Text Changer for Welcart', MAINICHI_WEB_THIS_PLUGIN_NAME_TCW), 'administrator', 'tcw_function_settings', 'text_changer_for_welcart_create_custom_menu_page', 247 );
}
add_action( 'admin_menu', 'text_changer_for_welcart_add_sub_menu' );
?>