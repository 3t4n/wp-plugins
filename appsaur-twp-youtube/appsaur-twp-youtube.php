<?php
/*
 * Plugin Name: Appsaur TWP Youtube
 * Plugin URI:
 * Description: Add movie from youtube to your page
 * Version:     1.0.0
 * Author:      Appsaur.co, Krzysztof Telewski
 * Author URI:  http://www.appsaur.co/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: appsaur-twp-youtube
 * Domain Path: /appsaur-twp-youtube
 *
 * Appsaur TWP Youtube is a free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Appsaur TWP Youtube is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WP Admin Protect. If not, see {URI to Plugin License}.
*/

if ( ! defined( 'ABSPATH' ) ) exit;


if (!defined('ATWPYT_PLUGIN_NAME')) {
	define('ATWPYT_PLUGIN_NAME', 'appsaur-twp-youtube');
}

if (!defined('ATWPYT_LANG_DIR')) {
	define('ATWPYT_LANG_DIR', dirname( plugin_basename(__FILE__) ) . '/lang/' );
}




add_action('plugins_loaded', 'atwp_youtube_load_textdomain');

add_action('admin_menu', 'atwp_youtube_menu');	

register_deactivation_hook(__FILE__, 'atwp_youtube_uninstall');

add_shortcode( 'twp_vid', 'atwp_youtube_shortcode' );	

function atwp_youtube_load_textdomain() {
	load_plugin_textdomain( 'twp-youtube', false, TWPYT_LANG_DIR  );
}

function atwp_youtube_plugin() {	
	global $wpdb;
	wp_enqueue_script('saved_sctipt',plugins_url(ATWPYT_PLUGIN_NAME.'/script/cloud.js'));
	wp_enqueue_style('test.css',plugins_url(ATWPYT_PLUGIN_NAME.'/style/global.css'));
	require plugin_dir_path(__FILE__).'/controller/install.php';
	require plugin_dir_path(__FILE__).'mth.php';
}

function atwp_youtube_menu() {
	add_menu_page('App TWP Youtube', 'Appsaur TWP Youtube', 'administrator', 'appsaur-twp-youtube', 'atwp_youtube_plugin', 'dashicons-menu');
}

function atwp_youtube_uninstall(){
	global $wpdb;
	$wpdb->query("DROP TABLE `".$wpdb->prefix."twp_vid`");
	$wpdb->query("DROP TABLE `".$wpdb->prefix."twp_vid_cat`");
}


	
function atwp_youtube_shortcode( $atts ) {
	global $wpdb;
	wp_enqueue_script('shortcode_sctipt',plugins_url().'/appsaur-twp-youtube/script/shortcode.js');
	wp_enqueue_style('shortcode_style',plugins_url().'/appsaur-twp-youtube/style/shortcode.css');
	if($atts['cat']!=''){
		$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid_cat` WHERE `id`='".$atts['cat']."' LIMIT 1");	
		if($sql){
			$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid` WHERE `cat`='".$sql[0]->id."' ORDER BY `id` ASC");
			if($sql){
				foreach($sql as $row){
					$shrt.='<div class="thumb" data-cat="'.$atts['cat'].'" style="width:'.$row->twidth.'px;height:'.$row->theight.'px;" data-pwidth="'.$row->pwidth.'" data-pheight="'.$row->pheight.'" data-vid="'.$row->vid.'"><i class="dashicons dashicons-video-alt3"></i><img class="thumb-img" data-id="0" src="https://img.youtube.com/vi/'.$row->vid.'/'.$row->thumbnail.'.jpg"  style="width:'.$row->twidth.'px;height:'.$row->theight.'px;" /><div class="playlist" style="display:none;">'.json_encode($sql).'</div></div>';

				}
			}
		}
	}
	if($atts['cat']=='no-category'){
		$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid` WHERE `cat`='0' ORDER BY `id` ASC");
		if($sql){
			foreach($sql as $row){
				$shrt.='<div class="thumb" data-cat="'.$atts['cat'].'" style="width:'.$row->twidth.'px;height:'.$row->theight.'px;" data-pwidth="'.$row->pwidth.'" data-pheight="'.$row->pheight.'" data-vid="'.$row->vid.'"><i class="dashicons dashicons-video-alt3"></i><img class="thumb-img" data-id="0" src="https://img.youtube.com/vi/'.$row->vid.'/'.$row->thumbnail.'.jpg"  style="width:'.$row->twidth.'px;height:'.$row->theight.'px;" /><div class="playlist" style="display:none;">'.json_encode($sql).'</div></div>';

			}
		}
	}
	if($atts['cat']=='all'){
		$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid` ORDER BY `id` ASC");
		if($sql){
			foreach($sql as $row){
				$shrt.='<div class="thumb" data-cat="'.$atts['cat'].'" style="width:'.$row->twidth.'px;height:'.$row->theight.'px;" data-pwidth="'.$row->pwidth.'" data-pheight="'.$row->pheight.'" data-vid="'.$row->vid.'"><i class="dashicons dashicons-video-alt3"></i><img class="thumb-img" data-id="0" src="https://img.youtube.com/vi/'.$row->vid.'/'.$row->thumbnail.'.jpg"  style="width:'.$row->twidth.'px;height:'.$row->theight.'px;" /><div class="playlist" style="display:none;">'.json_encode($sql).'</div></div>';

			}
		}
	}
	elseif($atts['id']!=''){
		$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."twp_vid` WHERE `vid`='".$atts['id']."' LIMIT 1");
		if($sql){
			foreach($sql as $row){
				$shrt.='<div class="thumb" style="width:'.$row->twidth.'px;height:'.$row->theight.'px;" data-pwidth="'.$row->pwidth.'" data-pheight="'.$row->pheight.'" data-vid="'.$row->vid.'"><i class="dashicons dashicons-video-alt3"></i><img class="thumb-img" data-id="0" src="https://img.youtube.com/vi/'.$row->vid.'/'.$row->thumbnail.'.jpg"   style="width:'.$row->twidth.'px;height:'.$row->theight.'px;" /></div>';
			}
		}
			
	}
	

	return $shrt;
}




