<?php
    /*
    Plugin Name: Active Directory SSO
    Plugin URI: http://wordpress.org/plugins/active-directory-sso/
    Description: Wordpress plugin for implementing  Single Sign On for Active Directory.
    Author: Joey Wohleb
    Version: 0.2.8
    Author URI: http://joeywohleb.com/
    */

    function ad_sso_admin_actions() {
    	add_options_page("AD SSO Settings", "AD SSO Settings", 1, "ad-sso-settings", "ad_sso_admin");
	}

    function ad_sso_admin() {
    	require_once("ad-sso-admin.php");
    }

    function ad_sso_authenticte_user() {
    	require_once("ad-sso-user.php");
    }

    // Add settings link on plugin page
    function ad_sso_settings_link($links) {
      $settings_link = '<a href="options-general.php?page=ad-sso-settings">' . __( 'Settings' ) . '</a>';
      array_unshift($links, $settings_link);
      return $links;
    }

    $plugin = plugin_basename(__FILE__);
    add_filter("plugin_action_links_$plugin", 'ad_sso_settings_link' );

	add_action('admin_menu', 'ad_sso_admin_actions');
    add_action('after_setup_theme', 'ad_sso_authenticte_user' );

?>