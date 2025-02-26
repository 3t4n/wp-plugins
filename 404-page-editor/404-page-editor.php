<?php
/*
Plugin Name: 404 Page Editor
Description: Tired of the text on the default 404 pages? Change the text of the default WordPress 404 pages or, as soon as we start adding them, just choose one of our seasonal, custom designed or industry-related 404 pages for your WordPress website.
Version: 0.0.03
Author: WP Hippos
Author URI: https://wphippos.com/
Plugin URI: https://wphippos.com/wordpress/plugins/404-page-editor
Stable tag: trunk
*/
include('modules/functions.php');
#include('modules/shortcodes.php');
include('modules/settings.php');
#include('modules/meta_box.php');
#include('modules/widgets.php');
include('modules/hooks.php');
#include('modules/cpt.php');
include('modules/scripts.php');
#include('modules/ajax.php');

register_activation_hook( __FILE__, 'w404_archive_pro_activate_dir_create' );


function w404_archive_pro_activate_dir_create() {  
		   $upload = wp_upload_dir(); 
		   $upload_dir = $upload['basedir']; 
		   $upload_dir = $upload_dir . '/404-page-editor';
		   if (! is_dir($upload_dir)) { 
				mkdir( $upload_dir, 0700 ); 
		   }	
		   $theme = get_template_directory();	
		   $uploader_404_main = wp_upload_dir();
		   $uploader_404 = $uploader_404_main['basedir']; 
		   $uploader_404 = $uploader_404 . '/404-page-editor';
		   if( is_file( $theme.'/404.php') ){	
				copy( $theme.'/404.php', $uploader_404.'/404.php' );
				copy( $theme.'/404.php', $uploader_404.'/404_backup.php' );

			}		
	} 
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'w404_plugin_action_links' );

function w404_plugin_action_links( $links ) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, '/options-general.php?page=w404_config') ) .'">'.__('Settings', '404-page-editor').'</a>';
   return $links;
   
}

add_action( 'after_switch_theme', 'file_404_update_on_theme_switching' );

function file_404_update_on_theme_switching(){	

			w404_make_backup();	
			$theme = get_template_directory();
			$uploader_404_main = wp_upload_dir();	
			$uploader_404 = $uploader_404_main['basedir']; 
			$uploader_404 = $uploader_404 . '/404-page-editor';
			if( is_file( $theme.'/404.php') ){
				copy( $theme.'/404.php', $uploader_404.'/404.php' );	
			}			
		
		}
		
		
/** * Class WP_Docs_Class_w404_archive. */
class WP_Docs_Class_w404_archive {  

		/*  Constructor */ 
		
		public function __construct() {  
			add_filter('template_include', array( $this,'w404_archive_pro_redirect')); 
		}  	 

		/* Handle 404 Template override . */
		public function w404_archive_pro_redirect($template){
			global $wp_query;	
				if ( is_404() ) {	
					$uploader_404_main = wp_upload_dir();	
					$uploader_404 = $uploader_404_main['basedir'];	
					$template = $uploader_404 . '/404-page-editor/404.php';
				}		
			
			return $template;



			}
			
}
$wpdocsclass = new WP_Docs_Class_w404_archive();
?>