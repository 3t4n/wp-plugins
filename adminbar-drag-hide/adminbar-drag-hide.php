<?php

/*
Plugin Name: Adminbar drag & hide
Version: 1.0
Description: Enhance adminbar usability and customization, addign a handle for drag and a button for hide. Particularly advised for website who has a "work in progress" layout.
Author: Finsa
*/

$GLOBALS['plugin-name'] = basename(__FILE__);

define('ADH_PLUGIN_URL', plugin_dir_url(__FILE__));

$GLOBALS['list_settings'] = ["wp-logo", "customize", "comments", "updates", "wpseo-menu", "search"];
$GLOBALS['use-plugin'] = 1;


/* FRONT END ---------------------------*/
if (!is_admin()) {
  require_once('include/front-end.php');
}

/* BACK END ----------------------------*/
require_once('include/settings.php');

/* USER PAGE ---------------------------*/
require_once('include/user-page.php');


add_action('admin_menu', 'adh_change_action_links');

function adh_change_action_links()
{
  if (is_admin()) {
    add_filter('plugin_action_links_' . plugin_basename(__FILE__),  'adh_settings_link');
  }
}

function adh_settings_link(array $links)
{
  $url = get_admin_url() . "admin.php?page=adminbar-drag-hide%2Finclude%2Fsettings.php";
  $settings_link = '<a href="' . $url . '">' . __('Settings', 'textdomain') . '</a>';
  $links[] = $settings_link;
  return $links;
}
