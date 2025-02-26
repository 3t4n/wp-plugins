<?php 

/*
 *Plugin Name: Google SEO Pressor Snippet Plugin
 *Plugin URI: https://www.smackcoders.com/google-seo-pressor-for-rich-snippets.html
 *Description: Automate Google Structured data for your WordPress built specially for SEO and social perspective.
 *Version: 2.0
 *Author: smackcoders
 *Author URI: https://www.smackcoders.com
 *
 * Copyright (C) 2012 Smackcoders (www.smackcoders.com)
 *
 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License, version 2, as 
 published by the Free Software Foundation.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @link https://www.smackcoders.com/google-seo-pressor-for-rich-snippets.html

 ***********************************************************************************************
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$get_debug_mode = get_option('smack_microdata_settings');
if(!empty($get_debug_mode['allowed'])){
if($get_debug_mode['allowed']['debug_mode'] != 1) {
	error_reporting(0);
	ini_set('display_errors', 'Off');
}
}
define('GSAS_version' , '2.0');
if ( ! defined( 'GSAS_PATH' ) ) {
	define( 'GSAS_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'GSAS_BASENAME' ) ) {
	define( 'GSAS_BASENAME', plugin_basename( __FILE__ ) );
}
if( !defined( 'GSAS_BASEURL' ) ) {
	define( 'GSAS_BASEURL', plugin_dir_url( __FILE__ ) );
}

define('WP_GSAS_PLUGIN_NAME', 'Google SEO Pressor Rich Snippets');
define('SMACK_IMAGE_URL', GSAS_BASEURL . 'images/');
$snippets = array('Rich snippets - Events',
	'Rich snippets - Music',
	'Rich snippets - Article',
	'Rich snippets - Breadcrumbs',
	'Rich snippets - Organizations',
	'Rich snippets - People',
	'Rich snippets - Products',
	'Rich snippets - Receipes',
	'Rich snippets - Reviews',
	'Rich snippets - Software applications',
	'Rich snippets - Videos: Facebook Share and RDFa' );
register_deactivation_hook( __FILE__, 'gsas_deactivate_now' );
function gsas_deactivate_now()
{
	delete_option( 'smack_microdata_settings');
	delete_option( 'smack_gsas_snippets_types');
}
class gsas_GoogleSnippets {
	static function gsas_install() {
		// do not generate any output here
	}
}
register_activation_hook( __FILE__, array('gsas_GoogleSnippets', 'gsas_install') );
update_option( 'smack_gsas_snippets_types' , $snippets );
function gsas_action_google_seo_snippets_includes() {
	if(is_admin()) {

		require_once( plugin_dir_path( __FILE__ ) .'microdata_form.php' );
		require_once( plugin_dir_path( __FILE__ ) .'create_meta_box.php' );
		require_once( plugin_dir_path( __FILE__ ) .'support-form.php' );

	}
	else {
		include(GSAS_PATH. 'schema/gsas_schema_for_product.php');
		include(GSAS_PATH. 'schema/gsas_schema_for_events.php');
		include(GSAS_PATH. 'schema/gsas_schema_for_music.php');
		include(GSAS_PATH. 'schema/gsas_schema_for_articles.php');
		include(GSAS_PATH. 'schema/gsas_schema_for_breadcrumbs.php');
		include(GSAS_PATH. 'schema/gsas_schema_for_videos.php');
		include(GSAS_PATH. 'schema/gsas_schema_for_software_application.php');
		include(GSAS_PATH. 'schema/gsas_schema_for_receipes.php');
		include(GSAS_PATH. 'schema/gsas_schema_for_organisation.php');
		include(GSAS_PATH. 'schema/gsas_schema_for_people.php');
		include(GSAS_PATH. 'schema/gsas_schema_for_review.php');

	}
}
add_action('plugins_loaded', 'gsas_action_google_seo_snippets_includes');

function gsas_action_google_seo_snippets_admin_init() {
	wp_enqueue_script('gsas_microdata', plugins_url('js/smack-microdata.js', __FILE__));
	wp_enqueue_style('gsas_meta_css', plugins_url('js/google_seo_meta_box.css', __FILE__));
	wp_enqueue_style('gsas_css', plugins_url('css/style.css', __FILE__));
}
add_action('admin_init', 'gsas_action_google_seo_snippets_admin_init');

function gsas_admin_menus() {
	$settings = get_option('smack_microdata_settings');
	if(!is_array($settings) && empty($settings)) {
		$settings['allowed']['debug_mode'] = 0;
		update_option('smack_microdata_settings', $settings);
	}
	add_menu_page('Google SEO Pressor Snippets', 'Google SEO Pressor Snippets', 'manage_options','plugin_configuration','gsas_microdata_configuration_page',GSAS_BASEURL ."images/icon.png");
	add_submenu_page('plugin_configuration','Contact Us','Contact Us','manage_options','gsas_support_form', 'gsas_support_form');
	add_submenu_page('plugin_configuration','FAQs','FAQs','manage_options','FAQ', 'FAQ');

}
add_action("admin_menu", "gsas_admin_menus");
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'smack_gsas_change_menu_order' );

// Move Pages above Media
function smack_gsas_change_menu_order ( $menu_order ) {
	return array(
		'index.php',
		'edit.php',
		'edit.php?post_type=page',
		'upload.php',
		'plugin_configuration',
	);
}

function gsas_send2smackers() {
	require_once( plugin_dir_path( __File__ ) . 'sendmail.php');
	die();
}
add_action('wp_ajax_gsas_send2smackers', 'gsas_send2smackers');

function gsas_remove_seo_snippets() {
	$remove_snip = new GSAS_ADD_META_BOX('Remove_snippets');
	die;
}
add_action('wp_ajax_gsas_remove_seo_snippets','gsas_remove_seo_snippets');

function gsas_author() {
	if(!empty($_POST['postdata'])){
	$gsas_autho = $_POST['postdata'];
	if ($gsas_autho == 'on') {
		$checked1 = 'checked';
	} else {
		$checked1 = "";
	}
	update_option('gsas_checked1' , $checked1);
	die();
}
}
add_action('wp_ajax_gsas_author', 'gsas_author');

function gsas_date() {
	if(!empty($_POST['postdata'])){
	$gsas_dateo = $_POST['postdata'];
	if ($gsas_dateo == 'on') {
		$checked2 = 'checked';
	} else {
		$checked2 = "";
	}
	update_option('gsas_checked2' , $checked2);
	die();
}
}
add_action('wp_ajax_gsas_date', 'gsas_date');

function gsas_enab() {
	if(!empty($_POST['postdata'])){
	$gsas_enab = $_POST['postdata'];
	if ($gsas_enab == 'on') {
		$checkenab = 'checked';
	} else {
		$checked2 = "";
	}
	update_option('gsas_enab' , $checkenab);
	die();
}
}
add_action('wp_ajax_gsas_enab', 'gsas_enab');

function gsas_display() {
	if(!empty($_POST['postdata'])){
	$gsas_disp = $_POST['postdata'];
	if ($gsas_disp == 'on') {
		$checked4 = 'checked';
	} else {
		$checked4 = "";
	}
	update_option('gsas_checked4' , $checked4);
	die();
}
}
add_action('wp_ajax_gsas_display', 'gsas_display');

function gsas_postfor() {
	if(!empty($_POST['postdata'])){
	$gsas_pfor = $_POST['postdata'];
	if ($gsas_pfor == 'on') {
		$checked3 ='checked';
	} else {
		$checked3 = "";
	}
	update_option('gsas_checked3' , $checked3);
	die();
}
}
add_action('wp_ajax_gsas_postfor', 'gsas_postfor');