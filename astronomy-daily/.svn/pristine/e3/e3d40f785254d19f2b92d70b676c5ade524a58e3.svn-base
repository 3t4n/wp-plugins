<?php
/**
 * @package Astronomy Daily
 */
/*
Plugin Name: Astronomy Daily
Plugin URI: https://viktov.xyz/
Description: Astronomy Daily plugin lets you embed beautiful images from space to your blog/website along with short content.
Version: 1.0
Author: Viktor Veljanovski
Author URI: https://viktov.xyz/
License: GPLv2 or later
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once('functions.php');
include_once('src/ASTRO_Widget.php');
include_once('src/ASTRO_post_type.php');
include_once('src/ASTRO_Shortcode.php');

/* Init post type */
$cpt = new ASTRO_post_type();
$shortcode = new ASTRO_Shortcode();

/* activation */
register_activation_hook(__FILE__, 'astro_cron_activation');
add_action('astro_daily_cron', 'astro_daily_cron');
function astro_cron_activation() {
	wp_schedule_event( strtotime('05:00:00'), 'daily', 'astro_daily_cron');
}

/* daily cron */
function astro_daily_cron() {
	global $wpdb;
	require_once(ABSPATH . 'wp-admin/includes/media.php');
	require_once(ABSPATH . 'wp-admin/includes/file.php');
	require_once(ABSPATH . 'wp-admin/includes/image.php');
	
	$apod_url = 'https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY';
	$json = file_get_contents($apod_url);
	$data = json_decode($json);

    $return = $wpdb->get_row("
    	SELECT ID 
    	FROM wp_posts 
    	WHERE post_title = '" . $data->title . "' && post_status = 'publish' && post_type = 'astro' ",
    	'ARRAY_N'
    );
	if ( empty($return) ) {
		$title = $data->title;
		$content = $data->explanation;
		$hd_image = $data->hdurl;
		$small_image = $data->url;
		$copyright = $data->copyright;
		if (!empty($copyright)) $copyright = 'Copyright: ' . $copyright;
		else $copyright = ' ';
		$img = '<img id="ad-image" class="thumb lightbox-photo" src="' . $hd_image . '" alt="'. $title .'"> <br><br>';
		$apod_post = array(
		    'post_title'    => $title,
		    'post_content'  => $img . $copyright . '<br><br>' . $content,
		    'post_type'		=> 'astro',
		    'post_status'   => 'publish',
		    'post_author'   => 1
		);
		$apod_id = wp_insert_post( $apod_post );
		$apod_featured_url = media_sideload_image( $hd_image, $apod_id, $title, 'src' );
		$apod_featured_id = astro_get_attachment_id_from_src($apod_featured_url);
		set_post_thumbnail($apod_id, $apod_featured_id);
	}
}

/* deactivation */
function astro_deactivation(){
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'astro_deactivation' );
