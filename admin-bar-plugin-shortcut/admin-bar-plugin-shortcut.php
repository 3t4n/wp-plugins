<?php
/**
* Plugin Name: Add Plugins From Admin Bar
* Plugin URI: https://github.com/rakshithvasudev/add-plugins-from-admin-bar
* Description: Adds a shortcut to install plugin in the admin bar.
* Version: 1.0 
* Author: Rakshith
* Author URI:https://github.com/rakshithvasudev/
* License: GPLv2 
*/


add_action('admin_bar_menu', 'add_items');

function add_items($admin_bar)
{

$url = site_url();
$admin_bar->add_menu( array(
    'id'     => 'add-plugin',
    'parent' => 'new-content',
    'title' => 'Plugin',
    'href'  =>  $url."/wp-admin/plugin-install.php",
    'meta'  => array(
      'title' => __('Install a new Plugin'),
    ),
) );
}
?>