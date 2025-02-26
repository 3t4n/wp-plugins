<?php

/*
Plugin Name: Anhlinh Contact List
Plugin URI: https://thanhansoft.com/anhlinh-contact-list
Description: Contact List, Messages, Zalo, Email, Call Button
Author: Thanhansoft
Version: 1.0.0
Author URI: https://thanhansoft.com
*/

define('ALCL_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ALCL_VIEWS_DIR', ALCL_PLUGIN_DIR . '/views');

register_activation_hook(__FILE__, 'alcl_call_button_active');
register_deactivation_hook(__FILE__, 'alcl_call_button_deactive');

function alcl_call_button_active(){
  $al_call_button_options = array(
    'anhlinh_contact_list_hotline' 	=> '0942 xxx xxx',
    'anhlinh_contact_list_messenger' 	=> 'Nickname facebook',
    'anhlinh_contact_list_zalo' 	=> '0942xxxxxx',
    'anhlinh_contact_list_email' 	=> 'your_email@gmail.com'
  );
  add_option("anhlinh_contact_list", $al_call_button_options);
}

function alcl_call_button_deactive(){
  global $wpdb;
  $table_name = $wpdb->prefix . "options";
  $wpdb->update($table_name,
      array('autoload'=>'no'), 
      array('option_name'=>'anhlinh_contact_list'),
      array('%s'),
      array('%s')
  );
}

if (!is_admin()) {
  require_once ALCL_PLUGIN_DIR . '/public.php';
  new AnhlinhContactListPublic();
} else {
  require_once ALCL_PLUGIN_DIR . '/admin.php';
  new AnhlinhContactListAdmin();

  $plugin = plugin_basename(__FILE__);
  add_filter("plugin_action_links_$plugin", 'alcl_plugin_settings_link');
}

function alcl_plugin_settings_link($links){
  $settings_link = '<a href="admin.php?page=anhlinh-contact-list-setting">Settings</a>';
  array_unshift($links, $settings_link);
  return $links;
}