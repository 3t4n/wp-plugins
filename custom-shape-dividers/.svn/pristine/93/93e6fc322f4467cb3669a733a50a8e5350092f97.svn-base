<?php
/*
 * Plugin Name:       Custom Shape Dividers
 * Plugin URI:        /
 * Description:       We created this free tool to make it easier for designers and non designers to use a beautiful SVG shape divider for their latest project. We hope you enjoy this tool.
 * Version:           1.1
 * Requires at least: 5.6
 * Author:            Vikas Ratudi
 * Author URI:        https://www.instagram.com/ratudi_vikas/?r=nametag
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       customshapedividers
 * Tags:              custom shape diviers, shape dividers, svg dividers, divider, shape builder, free dividers, free svg shape
*/

defined('ABSPATH') || die("You Can't Access this File Directly");

define('CUSTOMSHAPEDIVIDERS_PLUGIN_PATH',plugin_dir_path(__FILE__));
define('CUSTOMSHAPEDIVIDERS_PLUGIN_URL',plugin_dir_url(__FILE__));
define('CUSTOMSHAPEDIVIDERS_PLUGIN_FILE', __FILE__);
include CUSTOMSHAPEDIVIDERS_PLUGIN_PATH."inc/db.php";
include CUSTOMSHAPEDIVIDERS_PLUGIN_PATH."inc/metaboxes.php";

add_action('admin_enqueue_scripts','customshapedividers_admin_enqueue_scripts');

	function customshapedividers_admin_enqueue_scripts(){
		wp_enqueue_script('jquery');
		wp_enqueue_style('customshapedividers_dev_style', CUSTOMSHAPEDIVIDERS_PLUGIN_URL."assets/css/style.css");
		wp_enqueue_script('customshapedividers_dev_script', CUSTOMSHAPEDIVIDERS_PLUGIN_URL."assets/js/custom.js",
				array(),'1.0.0',false);
		wp_localize_script('customshapedividers_dev_script','ajax_object',admin_url("admin-ajax.php"));
	}

	//ADMIN MENU
	add_action('admin_menu','customshapedividers_plugin_menu');
	function customshapedividers_plugin_menu(){

		add_menu_page('customshapedividers','Dividers','manage_options','customshapedividers','customshapedividers_options_func','dashicons-admin-appearance',$position=null);

	}

	function customshapedividers_options_func(){
		include CUSTOMSHAPEDIVIDERS_PLUGIN_PATH."inc/customshapedividershome.php";
	}
	

	
	// form save

	add_action('wp_ajax_customshapedividerssave','customshapedividerssave');

	function customshapedividerssave(){

		if(!isset($_REQUEST['vfm-nonce']) || !wp_verify_nonce($_REQUEST['vfm-nonce'],'mycustomshapedividersave') ){
			wp_send_json_error([
				'status'=>'0'
			]);
		}


		if($_REQUEST['param']=='save_customshapedivider'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'customshapebuild';
			$data = array(
			"iwantit"=>sanitize_text_field($_REQUEST['iwantit'])
			);
			// $wpdb->insert($table, $data);

			$where = array( 'id' => '1');
			$wpdb->update($table, $data,$where);

			echo json_encode(array("status"=>1,"message"=>"Data inserted successful"));
		}
		wp_die();

	}

	// form save

