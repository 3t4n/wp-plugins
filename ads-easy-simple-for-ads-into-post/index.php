<?php
/*
Plugin Name: Ads
Plugin URI: http://appstore.probashitimes.com/
Description: A Simple Plugin That Let You Add Adsense Ads Within Post Content. Add ads anywhere you need just you need to add shortcode.
Version: 1.0.1
Author: A S M Sayem
Author URI: https://profiles.wordpress.org/asmsayem
License: GPLv2
License URL: https://www.gnu.org/licenses/gpl-2.0.html
*/

/*Constructing main index page with all php files together*/
class METAAPP {
   function __construct() {
       include_once dirname( __FILE__ ) . '/admin/install.php';
	   include_once dirname( __FILE__ ) . '/admin/functions.php';
	   include_once dirname( __FILE__ ) . '/admin/admin.php';
   }
/*Registering Install and Uninstall hooks for this plugin Ads*/
   function register() {
	   register_activation_hook(__FILE__ ,'METAAPP_install');
	   register_uninstall_hook(__FILE__, 'uninstall');
   }
/*Function to declare all WordPress Hooks for this plugin Ads*/
   function hooks()
   {
	   /*HOOKS*/
		add_action('init','metaads');
		add_action( 'admin_menu', 'METAAPP_menu' );
		add_action('wp_print_styles', 'add_stylesheet');
		add_action('admin_enqueue_scripts', 'pw_load_scripts');
		add_shortcode('metaads', 'metaads');
		add_action('admin_head', 'Adsbutton');
	   }  
}

$METAAPP = new METAAPP();
$METAAPP->register();
$METAAPP->hooks();
?>