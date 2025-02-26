<?php
/*
* Plugin Name: Advanced Cookies
* Plugin URI: https://www.hob-france.com/
* Description: Pour mettre votre site en conformité avec le RGPD, demandez l 'autorisation de vos utilisateurs pour déposer des cookies.
* Author: HOB France
* Version: 1.4.3
* Requires at least: 5.7
* Requires PHP: 5.6
* Text Domain: advancedcookies
* slug: advancedcookies
* Author URI: https://www.hob-france.com/
* Domain Path: /languages
*/
/* Récupération de la version actuel de l'extension */
$plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);

/* Pas touche c'est Wordpress */
defined( 'ABSPATH' ) OR exit;

/* Créatio ndes variables globales poru les chemins de fichiers et la version */
define( 'HOB_AC_URL', plugin_dir_path( __FILE__ ) );
define( 'HOB_AC_URL_SCRIPT', plugin_dir_url( __FILE__ ) );
define( 'HOB_AC_VERSION', $plugin_data['Version'] );

/* Pas touche c'est Wordpress */
global $wpdb ;

/* Liaison pour la traduction de l'extension */
add_action( 'plugins_loaded', 'hob_ac_init' );

/**
 * advancedcookies_init
 *
 * @return void
 */
function hob_ac_init() {
    add_action( 'init', 'hob_ac_load_advancedcookies' );
}

/**
 * wpdocs_load_advancedcookies
 *
 * @return void
 */
function hob_ac_load_advancedcookies() {
  load_plugin_textdomain( 'advancedcookies', '', dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

/* Récupération des classes nécessaire pour le fonctionnement de l'extension */
include( HOB_AC_URL . 'includes/Hob_ac_setup.php');
include( HOB_AC_URL . 'includes/Hob_ac_settings.php');
include( HOB_AC_URL . 'includes/Hob_ac_view.php');

$hob_ac_settings = new Hob_ac_settings;

include( HOB_AC_URL . 'includes/Hob_ac_request.php');

/* Class d'activation et de desactivation */
register_activation_hook(   __FILE__, array( 'Hob_ac_setup', 'on_activation' ) );
register_deactivation_hook( __FILE__, array( 'Hob_ac_setup', 'on_deactivation' ) );

add_action( 'plugins_loaded', array( 'Hob_ac_setup', 'init' ) );
add_action('admin_menu', 'hob_ac_plugin_create_menu');

/**
 * hob_ac_plugin_create_menu
 *
 * @return void
 */
function hob_ac_plugin_create_menu() {
  add_menu_page('Advanced Cookies', 'Advanced Cookies', 'administrator', __FILE__, 'hob_ac_plugin_settings_page' , plugins_url('/asset/img/c-logo.png', __FILE__) );
  add_action( 'admin_init', 'hob_ac_register_plugin_settings' );
}

/**
 * register_hob_ac_plugin_settings
 *
 * @return void
 */
function hob_ac_register_plugin_settings() {
  register_setting( 'hob_ac_plugin_settings-liste_com', 'hod-ac-liste-com');
  register_setting( 'hob_ac_plugin_settings-token', 'hod-ac-token');
}

/**
 * hob_ac_front_script
 * Ajout du style pour le front
 * @return void
 */
function hob_ac_front_script(){
  wp_register_style('advanced_cookies_css', HOB_AC_URL_SCRIPT . 'asset/css/front.css');

  wp_enqueue_style('advanced_cookies_css');
}

/* Si sur backoffice */
if(is_admin()){
  include( HOB_AC_URL . 'includes/Hob_ac_admin.php');
}

/* Si sur le front */
if(!is_admin()){
  add_action('wp_enqueue_scripts', "hob_ac_front_script");
  add_action('login_enqueue_scripts', "hob_ac_front_script");  

  /**
   * cookie_hob_footer
   * Activation du systeme cookie
   * @return void
   */
  function hob_ac_cookie_footer(){
    include( HOB_AC_URL . 'partials/front/front.php');
  };

  add_action('wp_footer', 'hob_ac_cookie_footer');
}