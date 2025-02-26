<?php
/*
Plugin Name: BLV SocialLogin Nextend
Description: Customize Nextend's "Nextend Google Connect", "Nextend Facebook Connect" and "Nextend Google Connect" plug-ins. This plugin controls the display of the login button.
Version: 1.0.2
Plugin URI: https://crebow.info/nextend-blv-sociallogin/
Author: Tomoya Matsumoto
Author URI: https://crebow.info/
License: GPLv2
Text Domain: nextend-blv-sociallogin
Domain Path: /languages
*/

$blvnsllang = dirname( plugin_basename( __FILE__ ) ) . "/languages";
load_plugin_textdomain( "nextend-blv-sociallogin", false, $blvnsllang );

define( 'BLVNSL_VERSION', '1.0.2' );
define( 'BLVNSL_REQUIRED_WP_VERSION', '4.9.2' );
define( 'BLVNSL_PLUGIN', __FILE__ );
define( 'BLVNSL_PLUGIN_BASENAME', plugin_basename( BLVNSL_PLUGIN ) );
define( 'BLVNSL_PLUGIN_NAME', trim( dirname( BLVNSL_PLUGIN_BASENAME ), '/' ) );
define( 'BLVNSL_PLUGIN_DIR', untrailingslashit( dirname( BLVNSL_PLUGIN ) ) );
define( 'BLVNSL_PLUGIN_URL', plugins_url( BLVNSL_PLUGIN_NAME ) );


include_once( plugin_dir_path( __FILE__ ) . 'classes/functions.php' );
/*=================================================
Management screen
=================================================*/
class BLVNSL_Menu_Add_Class{
  public function __construct() {
    add_action('admin_menu', array($this , 'action' ) );
  }
  function action() {
    $page_title		=	'BLV SocialLogin Nextend Settings';
    $menu_title		=	'BLV SocialLogin Nextend';
    $capability		=	'administrator';
    $menu_slug		=	'blvnsl';
    $function		  =	'blvnsl_toplevel_page';
    add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function );
    add_action( 'admin_init', 'blvnsl_register_setting' );
  }
}
new BLVNSL_Menu_Add_Class();

include_once( plugin_dir_path( __FILE__ ) . 'inc/dashboard-toplevel.php' );
include_once( plugin_dir_path( __FILE__ ) . 'classes/output.php' );
