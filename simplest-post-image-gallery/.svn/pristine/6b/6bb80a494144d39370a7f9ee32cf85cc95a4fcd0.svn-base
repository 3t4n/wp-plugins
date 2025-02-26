<?php

/**
 * Plugin Name:       Simplest Post Image gallery
 * Plugin URI:        artisare.lv/wordpress-plugins
 * Description:       Simplest Post/Page image gallery. Attach images to each of the posts. Comes with the basic and intuitive admin interface.
 * Version:           1.0.0
 * Author:            artisare
 * Author URI:        artisare.lv
 * License:           GPL-2.0
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simplest-post-image-gallery
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'simplestpostimagegallery_VERSION', '1.0.0' );

include plugin_dir_path( __FILE__ ) . 'admin/class-simplest-post-image-gallery-admin.php';

/*
function simplest_post_image_gallery_images_output($post_id){
	$post_images_array = explode(',', get_post_meta($post_id, 'post_images', true));
	foreach($post_images_array as $image){
		$url = wp_get_attachment_image_src($image, 1, 1);
		echo '<a href="'.$url[0].'" class="lightbox">'.wp_get_attachment_image($image,'thumbnail', 1, 1).'</a>';
		}
	}
*/

/**
* @param string $return_data What kind of data to return. Possible values are 'url' or 'image_id'
* @return array Returns false if no images or a) associative array (image_id => 'full image url') b) array of image IDs
*/
function simplest_post_image_gallery_array($post_id, $return_data = 'url'){
	$return = array();
	$post_images_array = array_filter(explode(',', get_post_meta($post_id, 'post_images', true)));
	if (!empty($post_images_array))
		{
		foreach($post_images_array as $image_id){
			if ($return_data == 'image_id') 
				{array_push($return, $image_id);} 
			elseif ($return_data == 'url') {
				$url = wp_get_attachment_image_src($image_id, 1, 1);
				$return[$image_id] = $url[0];}
				}
		return $return;
		}
	else return false;
	}