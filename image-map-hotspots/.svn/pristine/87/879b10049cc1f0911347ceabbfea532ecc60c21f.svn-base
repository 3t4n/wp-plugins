<?php
/*
  Plugin Name: Image Hotspot - Map Image Annotation
  Plugin URI: https://wordpress.org/plugins/image-map-hotspots/
  Description: Image hotspot lets you easily add custom tooltips to your images and add hotspot when highlighting them. Furthermore, you have the option of setting customized tooltip content, position, animation, and more.
  Author: Sk Abul Hasan
  Author URI: https://www.wpmart.org/
  Version: 2.7
 */

if (!defined('ABSPATH'))
   exit;

define('imh_6310_plugin_url', plugin_dir_path(__FILE__));
define('imh_6310_plugin_dir_url', plugin_dir_url(__FILE__));
define('imh_6310_PLUGIN_CURRENT_VERSION', 2.7);

add_shortcode('imh_6310_image_map', 'imh_6310_image_map_shortcode');

function imh_6310_image_map_shortcode($atts)
{
   extract(shortcode_atts(array('id' => ' ',), $atts));
   $ids = (int) $atts['id'];

   ob_start();
   include(imh_6310_plugin_url . 'shortcode.php');
   return ob_get_clean();
}


add_action('admin_menu', 'imh_6310_image_map_menu');

function imh_6310_image_map_menu()
{
   $options = imh_6310_get_user_roles();
   add_menu_page('Image Map Hotspot', 'Image Map Hotspot', $options, 'imh-6310-image-map-hotspot', 'imh_6310_home', 'dashicons-format-image', 20);
   add_submenu_page('imh-6310-image-map-hotspot', 'Image Map Hotspot', 'All Image Map Hotspot',  $options, 'imh-6310-image-map-hotspot', 'imh_6310_home');
   add_submenu_page('imh-6310-image-map-hotspot', 'Settings', 'Settings', $options, 'imh-6310-image-map-hotspot-setting', 'imh_6310_image_map_hotspot_setting');
   add_submenu_page('imh-6310-image-map-hotspot', 'Import / Export Plugin', 'Import/Export Plugin', $options, 'imh-6310-image-map-hotspot-import-export', 'imh_6310_image_map_hotspot_import_export');
   add_submenu_page('imh-6310-image-map-hotspot', 'License', 'License', $options, 'imh-6310-image-map-hotspot-license', 'imh_6310_image_map_hotspot_lincense');
   add_submenu_page('imh-6310-image-map-hotspot', 'How to use', 'Help', $options, 'imh-6310-image-map-hotspot-use', 'imh_6310_image_map_hotspot_how_to_use');
   add_submenu_page('imh-6310-image-map-hotspot', 'WpMart Plugins', 'WpMart Plugins', $options, 'imh-6310-wpmart-plugins', 'imh_6310_wpmart_plugins');
}

include imh_6310_plugin_url . 'template-menu.php';

register_activation_hook(__FILE__, 'imh_6310_image_map_install');
include_once(imh_6310_plugin_url . 'functions.php');

function imh_6310_activation_redirect($plugin)
{
   if ($plugin == plugin_basename(__FILE__)) {
      exit(wp_redirect(admin_url('admin.php?page=imh-6310-image-map-hotspot-use')));
   }
}
add_action('activated_plugin', 'imh_6310_activation_redirect');

add_action('admin_enqueue_scripts', 'imh_6310_link_css_js');


function imh_6310_plugin_update_check()
{
   imh_6310_version_status();
   imh_6310_check_field_exists();
}
add_action('plugins_loaded', 'imh_6310_plugin_update_check');

function imh_6310_head_css()
{
   $custom_css = ".imh-6310-point-icons{display: none}";
   wp_register_style('imh-6310-head-css', "");
   wp_enqueue_style('imh-6310-head-css');
   wp_add_inline_style('imh-6310-head-css', $custom_css);
}
add_action('wp_enqueue_scripts', 'imh_6310_head_css', 999);
