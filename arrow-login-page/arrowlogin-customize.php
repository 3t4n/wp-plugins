<?php
/*
Plugin Name: Arrow Login Page Free
Plugin URI: https://wordpress.org/plugins/arrow-login-page
Description: Login Page Customizer plugin by arrowplugins which allows you to completely change the layout of login, register and forgot password forms.
Version: 1.0.2
Author: ArrowPlugins
Author URI: https://profiles.wordpress.org/arrowplugins/
License: GplV2
Copyright: 2019 Arrow Plugins
*/


define( 'ARROWLOGIN_PATH', plugin_dir_path( __FILE__ ) );

define( 'ARROWLOGIN_VERSION','1.0' );

define( 'ARROW_LOGIN_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

define( 'ARROW_LOGIN_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );


if ( ! defined( 'ABSPATH' ) )
	exit;

include_once( 'includes/arrowlogin_customizer.php' );
include_once( 'includes/arrowlogin_option_menu.php' );
add_action( 'activated_plugin', function($plugin){
	if( $plugin == plugin_basename( __FILE__ ) ) {
		exit( wp_redirect( admin_url( 'admin.php?page=arrow_login_page_customizer' ) ) );
	}


});

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__),function($links){

   $links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=arrow_login_page_customizer') ) .'">Dashboard</a>';
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=arrow_login_page_customizer_support') ) .'">Support</a>';
   return $links;

} );

?>