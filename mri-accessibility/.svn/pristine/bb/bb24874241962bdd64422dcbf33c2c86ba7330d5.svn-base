<?php
/*
    Plugin Name: Medrankinteractive Accessibility
    Description: Medrankinteractive Accessibility Helper sidebar
    
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// define( 'ORGPRO_LINK', '#');

include_once( dirname(__FILE__)  . '/inc/org-front-functions.php');

function miah_admin() {
    include("admin/pages/org-admin.php");
}

function miah_sidebar_controls() {
    include("admin/pages/org-sidebar-controls.php");
}

function miah_accessibility_helper_admin_actions() {
    add_menu_page(
        __( 'Accessibility', 'wp-accessibility-helper' ),
        'Accessibility','manage_options','wp_accessibility','miah_admin','dashicons-universal-access-alt'
    );
    add_submenu_page(
      	'wp_accessibility',
        __( 'Widgets Order', 'wp-accessibility-helper' ),'Widgets Order','manage_options','wp_accessibility_sidebar_controls','miah_sidebar_controls'
  	);
  
  
}
add_action('admin_menu', 'miah_accessibility_helper_admin_actions');
/*********************************************
*   Load Medrankinteractive Accessibility Helper TextDomain
**********************************************/
function miah_access_helper_load_plugin_textdomain() {
	$domain = 'wp-accessibility-helper';
	$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
	if ( $loaded = load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' ) ) {
		return $loaded;
	} else {
		load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
}
add_action( 'init', 'miah_access_helper_load_plugin_textdomain' );
/*********************************************
*   Register front styles & scripts
**********************************************/
add_action( 'wp_enqueue_scripts', 'miah_access_helper_scripts' );
function miah_access_helper_scripts() {
    wp_register_style( 'wpah-front-styles',  plugin_dir_url( __FILE__ ) . 'assets/css/wp-accessibility-helper.min.css' );
    wp_enqueue_style( 'wpah-front-styles' );
    wp_enqueue_script( 'wp-accessibility-helper', plugin_dir_url( __FILE__ ) . 'assets/js/wp-accessibility-helper.min.js', array('jquery'), '1.0.0', true );
}
/*********************************************
*   Register admin styles
**********************************************/
add_action('admin_head', 'miah_admin_styles');
function miah_admin_styles() {
    wp_register_style( 'wp-accessibility-helper', plugin_dir_url( __FILE__ ).'admin/css/wp-accessibility-helper.css' );
    wp_enqueue_style( 'wp-accessibility-helper' );
    if( is_rtl() ){
        wp_register_style( 'wp-accessibility-helper-rtl', plugin_dir_url( __FILE__ ).'admin/css/wp-accessibility-helper_rtl.css' );
        wp_enqueue_style( 'wp-accessibility-helper-rtl' );
    }
}
/*********************************************
*   Register admin scripts
**********************************************/
function miah_plugin_admin_scripts() {
    wp_enqueue_script( 'jquery-ui-core');
    wp_enqueue_media();
    wp_enqueue_script( 'admin_colors', plugin_dir_url( __FILE__ ) . 'admin/js/jscolor.min.js' );
    wp_enqueue_script( 'admin_scripts', plugin_dir_url( __FILE__ ) . 'admin/js/admin_scripts.js' );
}
add_action('admin_enqueue_scripts', 'miah_plugin_admin_scripts');
/*********************************************
*   Create WP-Accessibility-Helper HTML Elements
**********************************************/
add_action('wp_footer','miah_access_helper_create_container');
function miah_access_helper_create_container() {
    include_once dirname( __FILE__ ) . '/wp-accessibility-helper-view.php';
    include_once dirname( __FILE__ ) . '/inc/org-skip-links.php';
}
if( is_admin() ) {
    include_once( dirname(__FILE__)  . '/admin/functions.php');
    include_once( dirname(__FILE__)  . '/admin/ajax-functions.php');
}
/*********************************************
*   Register ORG Skiplinks
**********************************************/
add_action( 'after_setup_theme', 'miah_register_org_skiplinks_menu' );
if ( ! function_exists( 'miah_register_org_skiplinks_menu' ) ) {
function miah_register_org_skiplinks_menu() {
    register_nav_menu( 'org_skiplinks', __( 'ORG Skiplinks menu', 'wp-accessibility-helper' ) );
}
}
add_filter('site_transient_update_plugins', 'miah_remove_update_notification');
if ( ! function_exists( 'miah_remove_update_notification' ) ) {
function miah_remove_update_notification($value) {
     unset($value->response[ plugin_basename(__FILE__) ]);
     return $value;
} 
}
