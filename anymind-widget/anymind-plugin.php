<?php
/*
Plugin Name: AnyMind Widget
Plugin URI: : https://anymind.com
Description: AnyMind Widget
Version: 1.1
Author: Anymind
Author URI: https://anymind.com
License: GPLv2 or later
*
* Copyright 2018 Anymind.com
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* ( at your option ) any later version.
*
*/

  /* Runs when plugin is activated */
  register_activation_hook(__FILE__, 'anymind_widget_install');

  /* Runs on plugin deactivation*/
  register_deactivation_hook(__FILE__, 'anymind_widget_remove');

  function anymind_widget_install()
  {
      /* Creates new database field */
      add_option("anymind_widget_data", 'Default', '', 'no');
  }

  function anymind_widget_remove()
  {
      /* Deletes the database field */
      delete_option('anymind_widget_data');
  }

  if (is_admin()) {
      /* Call the html code */
      add_action('admin_menu', 'anymind_widget_admin_menu');

      function anymind_widget_admin_menu()
      {
          add_options_page('AnyMind Widget', 'AnyMind Widget', 'administrator', 'AnyMind-Widget', 'anymind_widget_html_admin_page');
      }
  }

  function anymind_widget_html_admin_page()
  {
      include('admin-panel.php');
      include('anymind-widget-id.php');
  }

  function anymind_admin_styles()
  {
      wp_register_style('anymind-style', plugins_url('style.css', __FILE__), array(), '20181019', 'all');
      wp_enqueue_style('anymind-style');
  }
  add_action('admin_print_styles', 'anymind_admin_styles');


  function anymind_widget_implement($variable)
  {
      $widget_id = get_option('setWidgetId', '');

      $_widgetScript = "<script type='text/javascript'>
      (function(d,id,amWidgetId){if(d.getElementById(id))return;var a='https://app.anymind.com/sdk/widget-sdk.js',t=d.getElementsByTagName('head')[0],s=d.createElement('script');s.id=id;s.setAttribute('data-widgetid',amWidgetId);s.src=a,t.appendChild(s)})(document,'anymind-widget-jssdk','$widget_id');
          </script>";

      print $_widgetScript;
  }
  add_action('wp_footer', 'anymind_widget_implement');
?>
