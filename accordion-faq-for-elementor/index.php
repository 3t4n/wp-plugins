<?php

/*
  Plugin Name: Accordion FAQ with Category
  Plugin URI: https://wordpress.org/plugins/accordion-faq-for-elementor
  Description:  Accordion FAQ is the easiest to create knowledge base docs and FAQs easily works with any theme. You can add multiple accordions and collapse with this.
  Author: Sk. Abul Hasan
  Author URI: http://www.wpmart.org/
  Version: 1.6
 */

if (!defined('ABSPATH'))
   exit;

define('afaq_6310_plugin_url', plugin_dir_path(__FILE__));
define('afaq_6310_plugin_dir_url', plugin_dir_url(__FILE__));
define ( 'afaq_6310_PLUGIN_CURRENT_VERSION', 1.6 );

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

add_shortcode('afaq_6310_faq', 'afaq_6310_faq_shortcode');

function afaq_6310_faq_shortcode($atts)
{
   extract(shortcode_atts(array('id' => ' ',), $atts));
   $ids = (int) $atts['id'];

   ob_start();
   include(afaq_6310_plugin_url . 'shortcode.php');
   return ob_get_clean();
}


add_action('admin_menu', 'afaq_6310_animated_faq');

function afaq_6310_animated_faq()
{
   $options =  afaq_6310_get_user_roles();
   add_menu_page('Accordion FAQ with category', 'Accordion FAQ with category', $options, 'afaq-6310-faq-for-elementor', 'afaq_6310_home', 'dashicons-id-alt', 100);
   add_submenu_page('afaq-6310-faq-for-elementor', 'Accordion FAQ with category', 'All FAQ', $options, 'afaq-6310-faq-for-elementor', 'afaq_6310_home');
   add_submenu_page('afaq-6310-faq-for-elementor', 'Template 01-10', 'Template 01-10', $options, 'afaq-6310-faq-01-10', 'afaq_6310_faq_01_10');
   add_submenu_page('afaq-6310-faq-for-elementor', 'Template 11-20', 'Template 11-20', $options, 'afaq-6310-faq-11-20', 'afaq_6310_faq_11_20');
   add_submenu_page('afaq-6310-faq-for-elementor', 'Manage FAQ', 'Manage FAQ', $options, 'afaq-6310-manage-faq', 'afaq_6310_manage_faq');
   add_submenu_page('afaq-6310-faq-for-elementor', 'Manage Category', 'Manage category', $options, 'afaq-6310-manage-category', 'afaq_6310_manage_category');
   add_submenu_page('afaq-6310-faq-for-elementor', 'Settings', 'Settings', 'manage_options', 'afaq-6310-faq-for-elementor-settings', 'afaq_6310_faq_settings');
   add_submenu_page('afaq-6310-faq-for-elementor', 'License', 'License', $options, 'afaq-6310-faq-for-elementor-license', 'afaq_6310_faq_lincense');
   add_submenu_page('afaq-6310-faq-for-elementor', 'Import / Export Plugin', 'Import/Export Plugin', $options, 'afaq-6310-import-export', 'afaq_6310_import_export');
   add_submenu_page('afaq-6310-faq-for-elementor', 'How to use', 'Help', $options, 'afaq-6310-faq-for-elementor-use', 'afaq_6310_faq_faq_6310_how_to_use');
   add_submenu_page('afaq-6310-faq-for-elementor', 'WpMart Plugins', 'WpMart Plugins', $options, 'afaq-6310-wpmart-plugins', 'afaq_6310_wpmart_plugins');
}

function afaq_6310_home()
{
   global $wpdb;
   wp_enqueue_style('afaq-6310-font-awesome-5-0-13', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css');
   wp_enqueue_style('afaq-6310-style', plugins_url('assets/css/style.css', __FILE__));

   $style_table = $wpdb->prefix . 'afaq_6310_style';
   include afaq_6310_plugin_url . 'header.php';
   include afaq_6310_plugin_url . 'home.php';
}

include afaq_6310_plugin_url . 'template-menu.php';
add_action('wp_ajax_afaq_6310_faq_faq_info', 'afaq_6310_faq_faq_info');


if (is_admin()) {
   add_action('wp_ajax_afaq_6310_faq_faq_details', 'afaq_6310_faq_faq_details');
} else {
   add_action('wp_ajax_nopriv_afaq_6310_faq_faq_details', 'afaq_6310_faq_faq_details');
}

add_action('wp_ajax_nopriv_afaq_6310_faq_faq_details', 'afaq_6310_faq_faq_details');
include_once(afaq_6310_plugin_url . 'settings/helper/functions.php');
register_activation_hook(__FILE__, 'afaq_6310_faq_faq_install');
function afaq_6310_activation_redirect( $plugin ) {
   if( $plugin == plugin_basename( __FILE__ ) ) {
       exit( wp_redirect( admin_url( 'admin.php?page=afaq-6310-faq-for-elementor-use' ) ) );
   }
}
add_action( 'activated_plugin', 'afaq_6310_activation_redirect' );

function afaq_6310_plugin_update_check() {
   afaq_6310_version_status(); 
}
add_action('plugins_loaded', 'afaq_6310_plugin_update_check');