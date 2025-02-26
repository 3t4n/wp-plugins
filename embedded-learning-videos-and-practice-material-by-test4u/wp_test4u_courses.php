<?php 
/*
	Plugin Name: Embedded learning videos and practice material by TEST4U
	Description: Enhance your site with 40000+ categorized video tutorials for Microsoft Office, LibreOffice, OpenOffice, Long Docs, Data Analysis, UBER. 700000 users since 2003.
	Version: 1.3
	Author: infolearn-TEST4U
	Author URI: https://www.test4u.eu
	Copyright 2018 - 2026 infolearn  (email: info@infolearn.gr)
	Text Domain: test4u_embedded_material
*/


if (!defined('ABSPATH')) {
  die;
}


if(!defined('T4U_PLUGIN_DIR_NAME')) define('T4U_PLUGIN_DIR_NAME', plugin_basename(dirname(__FILE__)));

require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'t4u_config.php');
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'t4u_autoload.php');


class Test4uCourses{
	static $version = 0;
	
	static function Update() {
		$settings=self::GetSettings();
		
		
		$settings['Version'] = $version;
		update_option(T4U_PLUGIN_SETTINGS, $settings);
	}

	static function GetSettings() {
		$settings = get_option(T4U_PLUGIN_SETTINGS, []);

		if (!is_array($settings)) {
			$settings = [];
		}
		$settings = array_merge(['Version'=>0], $settings);

		return $settings;
	}
	
	static function Init() {
		$plugin_data = get_file_data(__FILE__, array('version' => 'Version'), 'plugin');
		self::$version = $plugin_data['version'];
	
		add_action('wp_ajax_T4U_plugin_institution_submit', array(__CLASS__, 'T4U_plugin_institution_submit'));
		add_action('wp_ajax_nopriv_T4U_plugin_institution_submit', array(__CLASS__, 'T4U_plugin_institution_submit'));
		
		add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'test4u_cources_settings_action_links' );

		function test4u_cources_settings_action_links( $links ) {
		   $links[] = '<a href="'. esc_url( get_admin_url(null, 'edit.php?post_type='.T4U_POST_TYPE) ) .'">Settings</a>';
		   return $links;
		}
		
		if (is_admin()) {
			add_action( 'admin_enqueue_scripts', array(__CLASS__, 'LoadPluginAdminScripts'));
			//add_action( 'admin_menu', array(__CLASS__, 'wpdocs_register_my_custom_menu_page'));
		}
		else{
			add_action( 'wp_enqueue_scripts', array(__CLASS__, 'LoadPluginScripts'));
			
			add_action('wp_head',  array(__CLASS__, 'myplugin_ajaxurl'));
			add_shortcode('T4U_form',  array('Test4uCourses', 'CreateLoginForm'));
			
		}
		
	}
	static function InitExtraAdminScripts() {
		if (is_admin()) {
			add_action( 'admin_enqueue_scripts', array(__CLASS__, 'LoadDelayedPluginAdminScripts'));
		}
	}
	
	
	static function LoadDelayedPluginAdminScripts($hook) {
		if ($hook=='edit.php' && $_GET['post_type']==T4U_POST_TYPE && !isset($_GET['page'])){
				
			echo 
			'<script type="text/javascript">
				window.onload = function(e){
					var btns = document.getElementsByClassName("page-title-action");
					
					if (1==0 && btns.length>0){
						btn = btns[btns.length-1];
						var btn2 = btn.cloneNode();
						btn2.innerHTML = "&nbsp;<span style=\'color:#f18500;font-weight:bolder;\'>Help</span>&nbsp;";
						btn2.href ="?post_type='.T4U_POST_TYPE.'&page=help-and-info";

						btn.parentNode.insertBefore(btn2, btn.nextSibling);
					}
				}
			  </script>';
		}
	}

	static function LoadPluginAdminScripts($hook) {
		if (current_user_can('edit_posts')) { 
			wp_enqueue_script( T4U_DOMAIN.'custom_js', T4U_URL.'js/panel-scripts.js', array(), '1.0');
			wp_register_style( T4U_DOMAIN.'custom_css',T4U_URL.'css/panel-styles.css', false,  '1.1');
			wp_enqueue_style ( T4U_DOMAIN.'custom_css' );
			
		}
	}

	static function LoadPluginScripts($hook) {
		wp_register_style( T4U_DOMAIN.'custom_css',T4U_URL.'css/frondend.css', false,  '1.1');
		wp_enqueue_style ( T4U_DOMAIN.'custom_css' );
	}

	static function myplugin_ajaxurl() {
	   echo '<script type="text/javascript">
			   var ajaxurl = "' . admin_url('admin-ajax.php') . '";
			 </script>';
	}
	
}


register_activation_hook(__FILE__, array('T4U_CoursesActivateUninstall', 'Activate'));
register_deactivation_hook(__FILE__, array('T4U_CoursesActivateUninstall', 'Deactivate'));
register_uninstall_hook(__FILE__, array('T4U_CoursesActivateUninstall', 'Uninstall'));

add_action( 'init', array('T4U_CoursesActivateUninstall', 'AddPostTypeCaps'), 11);
add_action( 'init', array('T4U_CoursesActivateUninstall', 'CreateCustomPostType'));

add_action( 'pre_get_posts', array('T4U_CoursesActivateUninstall', 'HideAutoCategory'));

add_action( 'admin_menu', array('T4U_CoursesActivateUninstall', 'AddExtraMenuOptions'));
add_action('admin_bar_menu', array('T4U_CoursesActivateUninstall', 'ShowAdminBarButton'), 50);
add_action( 'init', array('T4U_CoursesMetaBoxes', 'AddPostTypeMetabox'));

add_filter('the_content', array('T4U_CoursesContentParser', 'PrePostTypeParser'), 5); 
add_filter('the_content', array('T4U_CoursesContentParser', 'PostTypeParser'), 20);
add_shortcode( 'course_note', array('T4U_CoursesContentParser', 't4u_shortcode_course_notes') );

add_action('init', array('Test4uCourses', 'Init'));
add_action('admin_menu', array('Test4uCourses', 'InitExtraAdminScripts'));

add_action( 'updated_post_meta', array('T4U_CoursesContentParser', 'PostUpdated'), 10, 4 );
