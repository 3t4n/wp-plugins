<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       artisare.lv
 * @since      1.0.0
 *
 * @package    Simplest_Post_Image_Gallery
 * @subpackage Simplest_Post_Image_Gallery/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Simplest_Post_Image_Gallery
 * @subpackage Simplest_Post_Image_Gallery/admin
 * @author     artisare <wordpress@artisare.lv>
 */
add_action( 'admin_enqueue_scripts', 'simplestpostimagegallery_admin_scripts' );
add_action('admin_init', 'simplestpostimagegallery_init_plugin_output');
add_action('save_post', 'simplestpostimagegallery_save_post_images');

function simplestpostimagegallery_admin_scripts() {
	wp_enqueue_style( 'Simplest_Post_Image_Gallery-admin', plugin_dir_url( __FILE__ ) . 'css/simplest-post-image-gallery-admin.css', array(), '1.01', 'all' );
	wp_enqueue_script( 'Simplest_Post_Image_Gallery-admin', plugin_dir_url( __FILE__ ) . 'js/simplest-post-image-gallery-admin.js', array( 'jquery' ), '1.01', false );
	}

function simplestpostimagegallery_save_post_images(){
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){ return $post->ID; }
		update_post_meta($post->ID, "post_images", $_POST["post_images"]); /* ToDo: save unique values only*/
	}

function simplestpostimagegallery_init_plugin_output(){
		$post_types = get_post_types();
		foreach ( $post_types as $post_type )	{
			add_meta_box("simplest-post-image-gallery", "Post Image Gallery", "simplestpostimagegallery_post_images_output_admin", $post_type, "normal", "low");
		}
	}

function simplestpostimagegallery_post_images_output_admin(){
	global $post;
	$post_meta = get_post_custom($post->ID);
	$post_images = $post_meta["post_images"][0];
	$count = 0;

	$query_images_args = array(
		'post_type' => 'attachment',
		'post_mime_type' =>array(
				'jpg|jpeg|jpe' => 'image/jpeg',
				'gif' => 'image/gif',
				'png' => 'image/png',
				),
		'post_status' => 'inherit',
		'posts_per_page' => -1,
		);
	$query_images = new WP_Query( $query_images_args );
	$post_images_array = explode(',', $post_images);

	$images = array();
	echo '<div class="link_header">';
	echo '<div class="frame">';
	
	foreach ( $query_images->posts as $file)
		{
			if(in_array($images[]= $file->ID, $post_images_array))
				{
				echo '<label><input type="checkbox" group="images" value="'.$images[]= $file->ID.'" checked /><img src="'.$images[]= $file->guid.'" width="60" height="60" /></label>';
				}
			else{
				echo '<label><input type="checkbox" group="images" value="'.$images[]= $file->ID.'" /><img src="'.$images[]= $file->guid.'" width="60" height="60" /></label>';
				}
		$count++;
		}
	echo '<br /><br /></div></div>';
	echo '<input type="hidden" name="post_images" class="field" value="'.$post_images.'" />';
	echo '<div class="images_count"><span>Images: <b>'.$count.'</b></span> <div class="count-selected"></div></div>';

	}