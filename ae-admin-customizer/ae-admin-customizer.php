<?php
/*
* @package AE Admin Customizer
* @version 1.0.7
*
* Plugin Name: AE Admin Customizer
* Plugin URI: https://wordpress.org/plugins/ae-admin-customizer/
* Version: 1.0.7
* Description: Easily customize your admin dashboard, change wordpress logo with your company logo in admin panel, login and registration page. Now with Live preview to customize login and registration page. Enjoy.
* Author: Allan Empalmado
* Author URI: https://www.facebook.com/allan.ramirez.empalmado
* Text Domain: ae-admin-customizer
* Domain Path: /lang
*/
?>
<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/*
* AE Admin Constants
* @Since : 1.0.0
*/

// Plugin version
if ( ! defined( 'AE_ADMIN_CUSTOMIZER_VERSION' ) ) {
  define( 'AE_ADMIN_CUSTOMIZER_VERSION', '1.0.7' );
}

define("AE_ADMIN_CUSTOMIZER_PLUGIN__FILE__", __FILE__);
define("AE_ADMIN_CUSTOMIZER_PLUGIN_BASE", plugin_basename(AE_ADMIN_CUSTOMIZER_PLUGIN__FILE__));
define("AE_ADMIN_CUSTOMIZER_PLUGIN_URL", plugins_url('/', AE_ADMIN_CUSTOMIZER_PLUGIN__FILE__));
define("AE_ADMIN_CUSTOMIZER_PLUGIN_PATH", plugin_dir_path(AE_ADMIN_CUSTOMIZER_PLUGIN__FILE__));
define("AE_ADMIN_CUSTOMIZER_PLUGIN_PAGE", admin_url( 'admin.php?page=ae-admin-customizer' ));

/**
* Setup Setting Page
* @author Allan Empalmado (AppDevPH)
* @since : 1.0.0
*/
require_once(AE_ADMIN_CUSTOMIZER_PLUGIN_PATH . "inc/ae-admin-customizer-settings-class.php");

/**
* Checks if the provided value is in valid hex format
* @author Allan Empalmado (AppDevPH)
* @since : 1.0.0
* @return bool
*/
function ae_admin_valid_hex_color($value){
  if ( preg_match( '/^#[a-f0-9]{6}$/i', $value ) ) { return true; }else{ return false; }
}

/**
* Loads the plugin translated strings.
* @author Allan Empalmado (AppDevPH)
* @since : 1.0.2
*/
function ae_admin_customizer_load_textdomain()
{
    load_plugin_textdomain( 'ae-admin-customizer', false, basename( dirname( __FILE__ ) ) . '/lang' );
}
add_action('plugins_loaded', 'ae_admin_customizer_load_textdomain');

