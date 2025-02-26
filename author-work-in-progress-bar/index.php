<?php
/*
Plugin Name: Author WIP Progress Bar
Plugin URI: http://www.authorbiztools.com/wip-progress-bar/
Description: Progress Bar plugin for writers
Version: 1.0
Author: Alan Petersen
Author URI: http://www.alanpetersen.com
*/
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) 
{
	die;
} // end if

/**
 * Here we have defined plugin paths so that we can use
 * it anywhere inside the plugin
 */
define('PBP_PROGRESSBAR_DIR_PATH', plugin_dir_path(__FILE__));
define('PBP_PROGRESSBAR_URL_PATH', plugins_url('', __FILE__).'/');

// including necessary files
include "progress_widget.php";
include('functions.php');


//Registering Admin Menus
function pbp_progressbar_admin_menu()
{
	add_menu_page('Progress Bar', 'Progress Bar', 10, 'generate-shortcode', 'pbp_progress_empty_function');
	add_submenu_page("generate-shortcode", "Generate Shortcode", "Generate Shortcode", 10, "generate-shortcode", "pbp_generate_shortcode");
}
add_action("admin_menu", "pbp_progressbar_admin_menu");

//Empty Function
function pbp_progress_empty_function(){}

//All the backend listing will be handled here
function pbp_generate_shortcode()
{
	include('generate_shortcode.php');
}

// Include the necessary scripts
function pbp_progressbar_backend_scripts() 
{ 
	wp_register_style( 'pbp_progressbar_admin_css', PBP_PROGRESSBAR_URL_PATH.'css/admin.css', false, '1.0.0' );
    wp_enqueue_style( 'pbp_progressbar_admin_css' );
}
/**
 * All required scripts and css files will be included on 
 * only those pages.
 */
if (
	isset($_GET['page']) && 
	(
		$_GET['page'] == 'generate-shortcode'
	)
) 
{
	add_action('admin_enqueue_scripts', 'pbp_progressbar_backend_scripts');
}

add_shortcode('progressbar', 'pbp_progressbar_shortcode');
add_action('wp_head', 'pbp_progress_bar_head');