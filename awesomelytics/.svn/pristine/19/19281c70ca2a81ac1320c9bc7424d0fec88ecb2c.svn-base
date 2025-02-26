<?php
/*
Plugin Name: Awesomelytics
Version: 0.1.11
Plugin URI: https://www.awesomelytics.com
Author: Joshua McGee
Author URI: http://joshuamcgee.com
Description: Adds Awesomelytics tracking code
*/

function add_awesomelytics_scripts() {
  wp_register_script( 'awesomelytics-setup', plugins_url() . '/awesomelytics/js/awesomelytics-setup.js' );
  wp_enqueue_script( 'awesomelytics', 'https://www.awesomelytics.com/v1/a.js', array( 'awesomelytics-setup' ) );
}
add_action('wp_enqueue_scripts', 'add_awesomelytics_scripts');

function awesomelytics_management_page() {
  add_options_page( 'Awesomelytics', 'Awesomelytics', 'activate_plugins', 'awesomelytics', 'awesomelytics_settings' );
}
add_action('admin_menu', 'awesomelytics_management_page');

function register_awesomelytics_admin_styles() {
	wp_register_style( 'awesomelytics-admin-styles', plugins_url( 'awesomelytics/css/admin.css' ) );
	wp_enqueue_style( 'awesomelytics-admin-styles' );
}
add_action( 'admin_enqueue_scripts', 'register_awesomelytics_admin_styles' );

function add_awesomelytics_action_links ( $links ) {
  $settings_link = '<a href="' . admin_url( 'options-general.php?page=awesomelytics' ) . '">' . 'Settings' . '</a>';
  array_unshift( $links, $settings_link ); // before other links
  return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_awesomelytics_action_links' );

function awesomelytics_settings() {
  echo '<div class="wrap" id="awesomelytics-settings">';
  echo '<h2>Awesomelytics</h2>';
  echo '<p>';
  echo '<a href="https://www.awesomelytics.com/join?domain=' . get_option( 'siteurl' ) . '&email=' . get_option( 'admin_email' ) . '" target="_blank">Activate your site at Awesomelytics</a>';
  echo '</p>';
  echo '</div>';
}
?>
