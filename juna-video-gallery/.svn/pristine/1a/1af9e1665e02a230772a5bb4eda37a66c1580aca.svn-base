<?php
/*
	Plugin Name: Juna IT Video Gallery
	Plugin URI: http://juna-it.com/index.php/video-gallery/
	Description: This Video Gallery plugin easy to use. It Helps you to create and show your videos in your web-page how you designed it.
	Version: 1.3.19
	Author: Juna-it
	Author URI: http://juna-it.com/
	License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/

add_action('widgets_init', function() {
 	register_widget('Juna_IT_Video_Gallery');
});
require_once('Video_Gallery_Widget.php');
require_once('Ajax_in_Video_Gallery.php');
require_once('Juna_IT_Video_Gallery_Shortcode.php');

add_action('wp_enqueue_scripts','Juna_IT_Video_Gallery_Style');

function Juna_IT_Video_Gallery_Style()
{
	wp_register_style( 'Juna_IT_Video_Gallery', plugins_url( '/Style/Juna_IT_Video_Gallery_Widget.css',__FILE__ ) );
	wp_register_style( 'fontawesome-css', plugins_url('/Style/junaiticons.css', __FILE__) ); 
	wp_register_style( 'Juna_IT_Video_Gallery2', plugins_url('/Style/component.css', __FILE__) ); 
	wp_register_style( 'Juna_IT_Video_Gallery3', plugins_url('/Style/demo.css', __FILE__) ); 
    wp_enqueue_style( 'fontawesome-css' );
   
	wp_enqueue_style( 'Juna_IT_Video_Gallery' );
	wp_enqueue_style( 'Juna_IT_Video_Gallery2' );
	wp_enqueue_style( 'Juna_IT_Video_Gallery3' );	

	wp_register_script('Juna_IT_Video_Gallery',plugins_url('/Scripts/Juna_IT_Video_Gallery_Widget.js',__FILE__),array('jquery','jquery-ui-core'));
	wp_localize_script('Juna_IT_Video_Gallery', 'object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	wp_enqueue_script('cwp-main', plugins_url('/Scripts/jssor.slider.mini.js', __FILE__), array('jquery', 'jquery-ui-core'));
	wp_enqueue_script('cwp-main2', plugins_url('/Scripts/modernizr.min.js', __FILE__), array('jquery', 'jquery-ui-core'));
	wp_enqueue_script( 'Juna_IT_Video_Gallery' );
}

add_action("admin_menu", 'Juna_IT_Video_Gallery_Admin_Menu' );

	function Juna_IT_Video_Gallery_Admin_Menu() 
	{
		add_menu_page('Juna_IT_Video_Gallery_Admin_Menu','Video Gallery','manage_options','Juna_IT_Video_Gallery_Admin_Menu','Manage_Juna_IT_Video_Gallery_Admin_Menu', plugins_url('/Images/video-gallery-admin.png',__FILE__));

 		add_submenu_page( 'Juna_IT_Video_Gallery_Admin_Menu', 'Juna_IT_Video_Gallery_Admin_Menu_page_1', 'Gallery Manager', 'manage_options', 'Juna_IT_Video_Gallery_Admin_Menu', 'Manage_Juna_IT_Video_Gallery_Admin_Menu');
		add_submenu_page( 'Juna_IT_Video_Gallery_Admin_Menu', 'Juna_IT_Video_Gallery_Admin_Menu_page_3', 'General Options', 'manage_options', 'Juna_IT_Video_Gallery_Admin_Menu_General_Options', 'Manage_Juna_IT_Video_Gallery_Admin_Menu_submenu_3');
		add_submenu_page( 'Juna_IT_Video_Gallery_Admin_Menu', 'Juna-IT Products', 'Juna-IT Products', 'manage_options', 'Juna_IT_Products', 'Manage_Juna_IT_Products_Video_Gallery');
	}
	function Manage_Juna_IT_Video_Gallery_Admin_Menu()
	{
		require_once('Juna_IT_Video_Gallery_Admin_Menu.php');
		require_once('Scripts/Juna_IT_Video_Gallery_Submenu1.js.php');
		require_once('Style/Juna_IT_Video_Gallery_Submenu1.css.php');
	}
	function Manage_Juna_IT_Video_Gallery_Admin_Menu_submenu_3()
	{
		require_once('Juna_IT_Video_Gallery_Admin_Menu_General_Options.php');
		require_once('Scripts/Juna_IT_Video_Gallery_Submenu3.js.php');
		require_once('Style/Juna_IT_Video_Gallery_Submenu3.css.php');
	}
	function Manage_Juna_IT_Products_Video_Gallery()
	{
		require_once('Juna-IT-Products.php');
	}

	add_action('admin_init', function() {

		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');

		wp_register_script('Juna_IT_Video_Gallery', plugins_url('Scripts/Juna_IT_Video_Gallery_Admin.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Juna_IT_Video_Gallery', 'object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script('Juna_IT_Video_Gallery');

		wp_register_style('Juna_IT_Video_Gallery', plugins_url('Style/Juna_IT_Video_Gallery_Admin_Style.css', __FILE__ ));
		wp_enqueue_style('Juna_IT_Video_Gallery');
		wp_register_style( 'fontawesome-css', plugins_url('/Style/junaiticons.css', __FILE__)); 
   		wp_enqueue_style( 'fontawesome-css' );	 
	});

	register_activation_hook(__FILE__,'Juna_IT_Video_Gallery_wp_activate');

	function Juna_IT_Video_Gallery_wp_activate()
	{
		require_once('Juna_IT_Video_Gallery_Install.php');
	}
?>