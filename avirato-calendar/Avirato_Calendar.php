<?php

if (!defined('ABSPATH'))
    exit;
/*
  Plugin Name: Avirato hotels booking engine
  Plugin URI: https://es.wordpress.org/plugins/avirato-calendar/
  Description: Integrate the Avirato calendar on your website in a simple way and in the format you prefer.
  Version: 5.0.5
  Author: Avirato
  Author URI: https://avirato.com/
  Text Domain: avirato-calendar
  Domain Path: /languages
 */
add_action('init', 'acip_textdomain');
register_activation_hook(__FILE__, 'acip_create_tables');
register_deactivation_hook(__FILE__, 'acip_remove_tables');
add_action('admin_menu', 'acip_aviratoCalendar_plugin_menu_admin');
add_action('admin_enqueue_scripts', 'acip_AjaxConn_Enq');
add_action('admin_init','acip_loaded_plugin');
add_action('wp_ajax_acip_AjaxConn', 'acip_AjaxConn');
add_action('wp_ajax_acip_AjaxSimple', 'acip_AjaxSimple');
add_action('wp_ajax_acip_AjaxMulti', 'acip_AjaxMulti');
add_action('wp_ajax_acip_AjaxZonas', 'acip_AjaxZonas');
add_action('admin_post_acip_form_response', 'acip_form_response');
add_action('admin_post_acip_form_editCal', 'acip_form_editCal');
add_action('admin_post_acip_form_delHab', 'acip_form_delHab');
add_shortcode('Calendario_Avirato', 'acip_shortcode_calendar');
add_action('admin_enqueue_scripts', 'acip_admin_style');
add_action('wp_footer', 'acip_hidden_Cal');
add_action('admin_init', 'acip_aviratoCalendar_content_settings');
add_action('init', 'acip_addDnsHead');
add_action('wp_head', 'acip_avircal_add_style');
add_action('wp_footer', 'acip_addStyles_oculto');
add_action('wp_head', 'acip_addStyles');


require_once (dirname(__FILE__) . '/acip_main.php');
require_once (dirname(__FILE__) . '/private/acip_options.php');
require_once (dirname(__FILE__) . '/private/function_styles.php');
require_once (dirname(__FILE__) . '/private/acip_generators.php');
require_once (dirname(__FILE__) . '/private/acip_functions.php');
