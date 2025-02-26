<?php
/**
 * Plugin Name: Add trailing text to title
 * Plugin URI: https://osumi.es/add-trailing-text-to-title
 * Description: This plugin adds custom text trailing to the window title
 * Version: 1.0.0
 * Author: Iñigo Gorosabel
 * Author URI: https://osumi.es
 * License: GPL2
 */

function add_trailing_text_to_title_alter_title( $title, $id=null ){
  if (
    get_option('add_trailing_text_to_title_title_text') &&
    get_option('add_trailing_text_to_title_title_text')!=''
  ){
    $separator = ' - ';
    if (
      get_option('add_trailing_text_to_title_text_separator') &&
      get_option('add_trailing_text_to_title_text_separator')!=''
    ){
      $separator = get_option('add_trailing_text_to_title_text_separator');
    }
    if (is_array($title)){
      $title['site']   = '';
      $title['title'] .= $separator . get_option('add_trailing_text_to_title_title_text');
    }
    else{
      $title = $title . $separator . get_option('add_trailing_text_to_title_title_text');
    }
  }
  return $title;
}

function add_trailing_text_to_title(){
  global $wp_version;
  if (floatval($wp_version)<4.4){
    add_filter( 'wp_title', 'add_trailing_text_to_title_alter_title', 10, 2 );
  }
  else{
    add_filter( 'document_title_parts', 'add_trailing_text_to_title_alter_title', 0 );
  }
}
add_action( 'init', 'add_trailing_text_to_title' );

function add_trailing_text_to_title_menu() {
  add_menu_page('Add trailing text to title settings', 'Title text settings', 'administrator', 'add-trailing-text-to-title-title-text-settings', 'add_trailing_text_to_title_page', 'dashicons-admin-generic');
}
add_action( 'admin_menu', 'add_trailing_text_to_title_menu' );

function add_trailing_text_to_title_page(){
  $bare_url = 'options.php';
  $complete_url = wp_nonce_url( $bare_url, 'trash-settings_'.time() );
  include( dirname(__FILE__) .'/add-trailing-text-to-title-plugin/admin/add-trailing-text-to-title-plugin-admin.php' );
}

function add_trailing_text_to_title_settings(){
  register_setting( 'add-trailing-text-to-title-settings-group', 'add_trailing_text_to_title_title_text' );
  register_setting( 'add-trailing-text-to-title-settings-group', 'add_trailing_text_to_title_text_separator' );
}
add_action( 'admin_init', 'add_trailing_text_to_title_settings' );