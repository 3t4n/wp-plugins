<?php
function imh_6310_home()
{
  global $wpdb;
  $style_table = $wpdb->prefix . 'imh_6310_style';
  include imh_6310_plugin_url . 'header.php';
  wp_enqueue_media();

  if (empty($_GET['action'])) {
    include imh_6310_plugin_url . 'home.php';
  } else if (!empty($_GET['action'])) {
    $ids = isset($_GET['styleid']) ? (int) ($_GET['styleid']) : 0;
    include imh_6310_plugin_url . "settings/annotation.php";
    include imh_6310_plugin_url . "settings/add-point-html.php";
    include imh_6310_plugin_url . "settings/edit-point-html.php";
  }
}

function imh_6310_image_map_hotspot_lincense()
{
  global $wpdb;
  include imh_6310_plugin_url . 'header.php';
  include imh_6310_plugin_url . 'license.php';
}

function imh_6310_image_map_hotspot_setting()
{
  global $wpdb;
  wp_enqueue_style('imh-6310-style', plugins_url('assets/css/style.css', __FILE__));
  wp_enqueue_style('imh-color-style', plugins_url('assets/css/jquery.minicolors.css', __FILE__));
  include imh_6310_plugin_url . 'header.php';  
  include imh_6310_plugin_url . 'settings/plugin-settings.php';
}

function imh_6310_image_map_hotspot_how_to_use()
{
  global $wpdb;
  include imh_6310_plugin_url . 'header.php';
  include imh_6310_plugin_url . 'settings/how-to-use.php';
}

function imh_6310_wpmart_plugins()
{
  global $wpdb;
  include imh_6310_plugin_url . 'header.php';
  include imh_6310_plugin_url . 'settings/wpmart-plugins.php';
}

function imh_6310_image_map_hotspot_import_export()
{
  global $wpdb;
  include imh_6310_plugin_url . 'header.php';
  include imh_6310_plugin_url . 'settings/import-export-plugins.php';
}
