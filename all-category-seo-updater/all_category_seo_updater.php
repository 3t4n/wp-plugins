<?php
/*
Plugin Name: All Category SEO Updater
Plugin URI: http://bradleygsmith.com/open-source-contributions/all-category-seo-updater-wordpress-plugin
Description: SEO for your Wordpress categories. <a href="options-general.php?page=all_category_seo_updater.php">Options configuration panel</a>
Version: 0.2.7
Author: Bradley G. Smith
Author URI: http://bradleygsmith.com
*/

/*
Copyright (C) 2008-2009 Bradley G. Smith, bradleygsmith.com (bradleyglen AT gmail DOT com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/*
This plugin pulls some valuable code from the All In One SEO Pack plugin. The All Category SEO Updater is meant to work in tandem with the All In One SEO Pack. It is a work in progress.
*/

$tmp_file = __FILE__;
if(!function_exists('__autoload2')){
	function __autoload2($class)
	{
		require_once(dirname(__FILE__).'/php/'.$class.'.class.php');
	}
}

add_option("acsu_do_log", null, 'All Category SEO Updater Plugin write log file', 'yes');
add_option("acsu_php_version_check", null, 'Check PHP Version', 'yes');

__autoload2('allCategorySeoUpdater');
if(class_exists('allCategorySeoUpdater')){
	$acsu = new allCategorySeoUpdater($tmp_file);
}

if(!function_exists("acsu_admin")){
	function acsu_admin(){
		global $acsu;
		if(!isset($acsu)){
			return;
		}
		if(function_exists('add_options_page')) {
			add_options_page('All Category SEO', 'All Category SEO', 9, basename(__FILE__), array(&$acsu, 'options_panel'));
		}
	}
}

if(isset($acsu)){
	//actions
	if(!function_exists('darray2')){
		function darray2($array, $exit = true){
			echo '<pre>';
			print_r($array);
			echo '</pre>';
			if($exit){
				exit();
			}
		}
	}
	
	if(!function_exists('remove_aiosp_head')){
		function remove_aiosp_head(){
			#global $wp_filter;
			global $wp_query;
			global $aiosp;

			#var_dump($aiosp->wp_filter_id); // For debugging. Should be '1' or '0'
			if(is_category() && !is_feed()){
				remove_action('wp_head', array($aiosp, 'wp_head'));
				remove_action('wp_head', 'wp_head');
				remove_action('wp_head', array(&$aiosp, 'wp_head'));
			}
		}
	}
	global $wpdb;
	
	#add_action('wp', array(&$acsu, 'pause_head'), 1);
	add_action('template_redirect', array(&$acsu, 'template_redirecter'), 2, 1);
	add_action('wp_head', array(&$acsu, 'wp_header'), 2, 1);
	add_action('wp_head', array(&$acsu, 'wp_stylesheet'));
	add_action('wp_print_scripts', array(&$acsu, 'wp_scripts'));
	#add_action( 'init', create_function( '$aiosp', "remove_action( 'wp_head', 'wp_head' );" ) );
	add_action('admin_print_styles', array(&$acsu, 'wp_stylesheet'));
	#add_action('admin_print_scripts', array(&$acsu, 'wp_scripts'));

	add_action('admin_menu', 'acsu_admin');
	add_action('wp_head', 'remove_aiosp_head', 9, 1);

	//filters
	add_filter('loop_start', array(&$acsu, 'replace_cat_title'));

	//install
	$acsu_version = $acsu->version;
	register_activation_hook(__FILE__, array(&$acsu, 'acsu_install'));

	//updates
	$installed_version = get_option('acsu_version');
	
	if($installed_version != $acsu_version){
		$table_name = $wpdb->prefix."allcategoryseoupdater";
		if($wpdb->get_var("SHOW TABLES LIKE '".$table_name."'") != $table_name){
			$sql = "CREATE TABLE ".$table_name." (
				id int(10) NOT NULL AUTO_INCREMENT,
				cat_id int(10) NOT NULL,
				dte DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
				h1_text text NOT NULL,
				h1_color VARCHAR(55) NOT NULL,
				h1_font_size int(10) NOT NULL,
				h1_font_weight VARCHAR(55) NOT NULL,
				category_description text NOT NULL,
				page_title VARCHAR(65) NOT NULL,
				meta_keywords text NOT NULL,
				meta_description text NOT NULL,
				activated tinyint(1) DEFAULT '0' NOT NULL,
				UNIQUE KEY id (id),
				FOREIGN KEY cat_id (cat_id) references wp_terms (term_id)
			);";
		}
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);

		update_option('acsu_php_version_check', '1.0'); //on upgrade run the aiosp updater
		update_option('acsu_version', $acsu_version);
	}
	$current_php = phpversion();
	$registered_php = get_option('acsu_php_version_check');
	if($current_php > $registered_php){
		$registered_php = $acsu->detect_php_version();
		update_option('acsu_php_version_check', $registered_php);
	}
}

//add_option();
?>