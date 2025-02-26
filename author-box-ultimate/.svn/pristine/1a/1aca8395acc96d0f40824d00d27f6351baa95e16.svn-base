<?php
/*
Plugin Name: Author Box Ultimate
Plugin URI: 
Description: Fully responsive and mobile ready meet the Author Box plugin for wordpress.
Version: 1.0
Author: paratheme
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit; // exit if direct access.

define('author_box_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('author_box_plugin_dir', plugin_dir_path( __FILE__ ) );
define('author_box_wp_url', 'https://wordpress.org/plugins/author-box-ultimate/' );
define('author_box_pro_url', '' );
define('author_box_demo_url', '' );
define('author_box_conatct_url', '' );
define('author_box_qa_url', 'http://paratheme.com/qa' );
define('author_box_plugin_name', 'Author Box Ultimate' );
define('author_box_share_url', 'https://wordpress.org/plugins/author-box-ultimate/' );




require_once( plugin_dir_path( __FILE__ ) . 'includes/author-box-functions.php');



//Themes php files
require_once( plugin_dir_path( __FILE__ ) . 'themes/flat/index.php');




function author_box_init_scripts()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('author_box_js', plugins_url( '/js/author-box-scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script('author_box_js', 'author_box_ajax', array( 'author_box_ajaxurl' => admin_url( 'admin-ajax.php')));
		
		wp_enqueue_style('author-box-css', author_box_plugin_url.'css/author-box-style.css');
		wp_enqueue_style('author-box-admin', author_box_plugin_url.'css/author-box-admin.css');
		
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'author-box-color-picker', plugins_url('/js/author-box-color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		

		
		// Style for themes
		wp_enqueue_style('author-box-style-flat', author_box_plugin_url.'themes/flat/style.css');
		

		
	}
add_action("init","author_box_init_scripts");




register_activation_hook(__FILE__, 'author_box_activation');
register_uninstall_hook(__FILE__, 'author_box_uninstall');

function author_box_activation(){
		$author_box_version= "1.0";
		update_option('author_box_version', $author_box_version); //update plugin version.
		
		$author_box_customer_type= "free"; //customer_type "free"
		update_option('author_box_customer_type', $author_box_customer_type); //update plugin customer type.
	}




function author_box_uninstall()
	{
		delete_option( 'author_box_version' ); //delete option from database.
		delete_option( 'author_box_customer_type' ); //delete option from database.
		delete_option( 'author_box_enable' ); //delete option from database.
		delete_option( 'author_box_themes' ); //delete option from database.
		delete_option( 'author_box_posttype' ); //delete option from database.	
		delete_option( 'author_box_social_links' ); //delete option from database.			
		delete_option( 'author_box_social_links_margin' ); //delete option from database.	
	}






add_action('admin_menu', 'author_box_menu_init');



function author_box_menu_help(){
	include('author-box-help.php');	
	}


function author_box_menu_settings(){
	include('author-box-settings.php');	
	}



function author_box_menu_init() {
	add_menu_page(__('author_box','author_box'), __('Author Box','author_box'), 'manage_options', 'author_box_menu_settings', 'author_box_menu_settings');
	
	add_submenu_page('author_box_menu_settings', __('Help & Upgrade','menu-author_box'), __('Help & Upgrade','menu-author_box'), 'manage_options', 'author_box_menu_help', 'author_box_menu_help');
	
	
	
	}















function author_box_display($content){

	$author_box_enable = get_option( 'author_box_enable' );
	
	if($author_box_enable=='yes')
		{
		
			$author_box_posttype = get_option( 'author_box_posttype' );
			if($author_box_posttype==NULL)
				{
					$type ="none";
				}
			else
				{
					$type = "";
				foreach ( $author_box_posttype as  $post_type => $post_type_value )
					{
				
					$type .= $post_type.",";
					}
				}
		
		
		
		
		
		
			if ( is_singular(explode(',',$type))) 
				{	
		
					$author_box_themes = get_option( 'author_box_themes' );
					
					$author_box_display = '';
					$author_box_display .= $content;
		
					$author_box_display .= '<div class="author-box-container">';
					
					if($author_box_themes== "flat")
						{
							$author_box_display.= author_box_themes_flat(get_the_ID());
						}
				
				
				
					$author_box_display .='</div>';
					
					
					
					return $author_box_display;
				
				}
			else
				{
					return $content;
				}
			
		}
	else
		
		{
			return $content;
		}


	
	
	

}


add_filter('the_content', 'author_box_display');


















?>