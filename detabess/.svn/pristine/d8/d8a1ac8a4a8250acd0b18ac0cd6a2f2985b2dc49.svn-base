<?php
/**
 * Plugin Name: detabess
 * Description: Once you customized your original search lists on posts, convenience level of searching will boost up.
 * Plugin URI: https://detabess.com/
 * Author: Kura
 * Version: 1.0.4
 * Text Domain: detabess
 * Domain Path: /languages
 * License: GPLv2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'DTBS_SCNAME', 'detabess' );

function dtbs_load_textdomain() {
	load_plugin_textdomain( DTBS_SCNAME, false, basename( dirname( __FILE__ ) ) . '/languages' );
}


if ( ! function_exists( 'dtbs_menu' ) ) {
	function dtbs_menu() {
		$dtbs_slug = 'detabess';
		add_menu_page( __( 'detabess', DTBS_SCNAME ), __( 'detabess', DTBS_SCNAME ), 'edit_themes', $dtbs_slug, 'dtbs_info', 'dashicons-portfolio', 81 );
		add_submenu_page( $dtbs_slug, __( 'Registration List', DTBS_SCNAME ), __( 'Registration List', DTBS_SCNAME ), 'edit_theme_options', 'dtbs_list', 'dtbs_list' );
		add_submenu_page( $dtbs_slug, __( 'Resister detabess', DTBS_SCNAME ), __( 'Resister detabess', DTBS_SCNAME ), 'edit_theme_options', 'dtbs_reg', 'dtbs_reg' );
		add_submenu_page( $dtbs_slug, __( 'Manage items', DTBS_SCNAME ), __( 'Manage items', DTBS_SCNAME ), 'edit_theme_options', 'dtbs_item_mng', 'dtbs_item_mng' );
	}
}

function dtbs_loaded() {
	do_action( 'dtbs_loaded' );
}

function dtbs_create_submenus() {
	require_once plugin_dir_path( __FILE__ ) . 'detabess-list.php';
	require_once plugin_dir_path( __FILE__ ) . 'detabess-reg.php';
	require_once plugin_dir_path( __FILE__ ) . 'detabess-item.php';
	if ( ! function_exists( 'dtbs_info' ) ) {
		require_once plugin_dir_path( __FILE__ ) . 'detabess-info.php';
	}
}

function dbts_read_programs() {
	require_once plugin_dir_path( __FILE__ ) . 'detabess-functions.php';
	require_once plugin_dir_path( __FILE__ ) . 'detabess-ajax.php';
}

function dtbs_files() {
	wp_enqueue_script( 'detabess', plugins_url( 'js/detabess.js', __FILE__ ), array( 'jquery') );
	wp_enqueue_style( 'dtbs_css', plugins_url( 'css/detabess.css', __FILE__ ) );

	$site_params = array( 'site_url' => home_url() );
	wp_localize_script( 'detabess', 'def_params', $site_params );
}

function dbts_admin_script() {
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'jquery-ui-draggable' );
	wp_enqueue_script( 'jquery-ui-droppable' );
	wp_enqueue_script( 'detabess_admin', plugins_url( 'js/detabess_admin.js', __FILE__ ), array( 'jquery-ui-sortable', 'jquery-ui-draggable', 'jquery-ui-droppable' ), '', true );
}

function dbts_check_current_page_reg() {
	$current_screen = get_current_screen();
	if ( ! is_object( $current_screen ) || 'detabess_page_dtbs_reg' !== $current_screen->base ) {
		return;
	}
	if ( wp_doing_ajax() ) {
		return;
	}
}

function dtbs_admin_css() {
	wp_enqueue_style( 'detabess_admin_css', plugins_url( 'css/detabess_admin.css', __FILE__ ) );
}

require_once plugin_dir_path( __FILE__ ) . 'detabess-widget.php';

add_action( 'plugins_loaded', 'dtbs_load_textdomain' );
add_action( 'init', 'dtbs_loaded' );
add_action( 'dtbs_loaded', 'dbts_read_programs', 30 );
add_action( 'dtbs_loaded', 'dtbs_create_submenus', 30 );

add_action( 'wp_enqueue_scripts', 'dtbs_files' );
add_action( 'admin_menu', 'dtbs_menu' );

add_filter( 'get_search_query', 'dtbs_search_title' );


add_action( 'admin_enqueue_scripts', 'dtbs_admin_css' );
add_action( 'admin_enqueue_scripts', 'dbts_check_current_page_reg' );

register_activation_hook( __FILE__, 'dtbs_active_register' );
register_deactivation_hook( __FILE__, 'dtbs_deactivation_register' );
register_uninstall_hook( __FILE__, 'dtbs_plugin_uninstall' );


/**
 * プラグインの有効化処理
 */
function dtbs_active_register() {
	require_once plugin_dir_path( __FILE__ ) . 'detabess-table.php';
	dtbs_create_db_tables();
}

/**
 * プラグインの無効化処理
 */
function dtbs_deactivation_register() {
	delete_option( 'wp_dtbs_hashcode' );
}

/**
 * プラグインの削除時処理
 */
function dtbs_plugin_uninstall() {
	require_once plugin_dir_path( __FILE__ ) . 'detabess-table.php';
	dtbs_delete_db_tables();
}

/**
 * データ登録・更新系
 */
add_action( 'add_meta_boxes',   'dtbs_view_area_check' );
add_action( 'save_post',				'dtbs_item_reg' );
add_action( 'admin_enqueue_scripts',	'dbts_admin_script' );


/**
 * AJAX
 */
add_action( 'wp_footer', 'dtbs_search_ajax', 1 );
add_action( 'admin_footer', 'dtbs_search_ajax', 1 );

add_action( 'wp_ajax_dtbs_admin_child_data', 'dtbs_admin_child_data' );
add_action( 'wp_ajax_nopriv_dtbs_admin_child_data', 'dtbs_admin_child_data' );

add_action( 'wp_ajax_dtbs_admin_child_xclusion', 'dtbs_admin_child_xclusion' );
add_action( 'wp_ajax_nopriv_dtbs_admin_child_xclusion', 'dtbs_admin_child_xclusion' );

add_action( 'wp_ajax_dtbs_cdd_child_data', 'dtbs_cdd_child_data' );
add_action( 'wp_ajax_nopriv_dtbs_cdd_child_data', 'dtbs_cdd_child_data' );

add_action( 'wp_ajax_dtbs_counter', 'dtbs_counter' );
add_action( 'wp_ajax_nopriv_dtbs_counter', 'dtbs_counter' );

add_action( 'wp_ajax_dtbs_get_cdi_list', 'dtbs_get_cdi_list' );
add_action( 'wp_ajax_nopriv_dtbs_get_cdi_list', 'dtbs_get_cdi_list' );

add_action( 'wp_ajax_dtbs_get_cdd_list', 'dtbs_get_cdd_list' );
add_action( 'wp_ajax_nopriv_dtbs_get_cdd_list', 'dtbs_get_cdd_list' );


add_action( 'wp_ajax_dtbs_get_cdd_menu_list', 'dtbs_get_cdd_menu_list' );
add_action( 'wp_ajax_nopriv_dtbs_get_cdd_menu_list', 'dtbs_get_cdd_menu_list' );

add_action( 'wp_ajax_dtbs_get_cdd_edit_list', 'dtbs_get_cdd_edit_list' );
add_action( 'wp_ajax_nopriv_dtbs_get_cdd_edit_list', 'dtbs_get_cdd_edit_list' );

?>