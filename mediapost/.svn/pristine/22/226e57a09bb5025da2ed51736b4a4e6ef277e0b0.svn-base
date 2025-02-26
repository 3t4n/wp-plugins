<?php
/*
Plugin Name: @MediaPost - Formulário de cadastro
Plugin URI: https://wordpress.org/plugins/mediapost/
Description: Crie e integre formulários de cadastro de seu site com sua conta @MediaPost
Version: 1.0.3
Author: @MediaPost
Author URI: https://www.mediapost.com.br/
Text Domain: mpwp_forms
*/

defined( 'ABSPATH' ) or exit;

define( 'MPWP_DIR', plugin_dir_path( __FILE__ ) );
define( 'MPWP_URL', plugins_url('', __FILE__ ) );
define( 'MPWP_PREFIX', 'mpwp_forms' );
define( 'MPWP_VERSION', '1.0.2' );
define( 'MPWP_WP_REQUIRED_VERSION', '3' );
define( 'MPWP_POST_TYPE', 'mpwp-forms' );
define( 'MPWP_SETTINGS_SLUG', 'mpwp_forms_settings' );
define( 'MPWP_FORMS_SLUG', 'mpwp_forms_forms' );
define( 'MPWP_LISTS_SLUG', 'mpwp_forms_lists' );
define( 'MPWP_FIELDS_SLUG', 'mpwp_forms_fields' );
define( 'MPWP_VERSION_SLUG', 'mpwp_forms_version' );

register_activation_hook( __FILE__, 'mpwpFormsInstall' );
function mpwpFormsInstall() {
	require_once( MPWP_DIR . '/install.php' );
}

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'mpwpFormsActionLinks' );
function mpwpFormsActionLinks( $links ) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=mpwp_settings') ) .'">' . esc_attr__( "Configurações", "mpwp_forms" ) . '</a>';
   $links[] = '<a href="'. esc_url('https://www.mediapost.com.br/criar-conta?como_conheceu=Plugin%20Wordpress') . '" target="_blank">' . esc_attr__( "Criar conta", "mpwp_forms" ) . '</a>';
   return $links;
}

require_once( MPWP_DIR . 'includes/client/MapiClient.php' );
require_once( MPWP_DIR . 'includes/functions.php' );
require_once( MPWP_DIR . 'includes/shortcode.php' );
require_once( MPWP_DIR . 'includes/widget.php' );

function mpwpFormsSubscribe() {
	require_once( MPWP_DIR . 'includes/subscribe.php' );
}


function mpwpFormsEnqueueAdminFiles() {
	wp_register_style( 'mpwp-default-css', MPWP_URL . '/assets/css/default.css', false );
	wp_enqueue_style( 'mpwp-default-css' );
	wp_register_style( 'mpwp-colorpicker-css', MPWP_URL . '/assets/css/colorpicker_custom.css', false );
	wp_enqueue_style( 'mpwp-colorpicker-css' );
	wp_register_script( 'mpwp-colorpicker-js', MPWP_URL . '/assets/js/colorpicker.js', array( 'jquery' ) );
	wp_enqueue_script( 'mpwp-colorpicker-js' );
	wp_register_script( 'mpwp-default-js', MPWP_URL . '/assets/js/default.js', array( 'jquery' ) );
	wp_enqueue_script( 'mpwp-default-js' );
}

add_action( 'admin_enqueue_scripts', 'mpwpFormsEnqueueAdminFiles' );

if ( is_admin() ){
	require_once( MPWP_DIR . 'includes/admin/menus.php' );
	require_once( MPWP_DIR . 'includes/admin/admin.php' );
	require_once( MPWP_DIR . 'includes/admin/forms.php' );
	require_once( MPWP_DIR . 'includes/admin/form.php' );
} else {
	add_action( 'init', 'mpwpFormsSubscribe' );
}
?>