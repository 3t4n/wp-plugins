<?php
/*
Plugin Name: Background Slideshow
Plugin URI: http://www.iwebix.de/background-slideshow-wordpress-plugin/
Description: Nice lightweight jQuery Background Slideshow using full-sized images
Version: 1.1
Author: Dennis Nissle, IWEBIX
Author URI: http://www.iwebix.de/
*/

/* options page */

$options_page = get_option('siteurl') . '/wp-admin/admin.php?page=background-slideshow/options.php';

function bg_slide_options_page() {
	
	add_options_page('Background Slideshow Options', 'Background Slideshow', 10, 'background-slideshow/options.php');
	
}

add_action('admin_menu', 'bg_slide_options_page');


if (!function_exists('fs_slide_credit')) {
	
	function fs_slide_credit() {
		
	    echo '<div class="copy_wrap" style="display: block; margin: 0px; clear: both;"><p style="font-size: 8px; text-align: right; display: block;">Slider by <a style="font-size: 8px; text-align: right;" href="http://www.iwebix.de/" target="_blank" title="webdesign">webdesign</a></p></div>';
	    
	}
	
}

add_action('wp_footer', 'fs_slide_credit');


function bg_slide_cut_text($text, $chars, $points = "...") {
	
	$length = strlen($text);
	if($length <= $chars) {
		return $text;
	} else {
		return substr($text, 0, $chars)." ".$points;
	}
	
}


function bg_slide_insert($atts, $content = null) {
	
	include (ABSPATH . '/wp-content/plugins/background-slideshow/background-slideshow.php');
	
}

add_shortcode("background", "bg_slide_insert");

add_action("admin_init", "bg_slide_init");
add_action('save_post', 'bg_slide_save');

function bg_slide_init() {
	
	add_meta_box("bg_slider", "Background Slideshow Options", "bg_slide_meta", "post", "normal", "high");
	add_meta_box("bg_slider", "Background Slideshow Options", "bg_slide_meta", "page", "normal", "high");
    
}

function bg_slide_meta() {
	
	global $post;
	$custom = get_post_custom($post->ID);
	$bg_slider = $custom["bg_slider"][0];
	
?>
	<div class="inside">
		<table class="form-table">
			<tr>
				<th><label for="bg_slider">Feature in Background Slideshow?</label></th>
				<td><input type="checkbox" name="bg_slider" value="1" <?php if($bg_slider == 1) { echo "checked='checked'";} ?></td>
			</tr>
		</table>
	</div>
<?php

}

function bg_slide_save() {
	
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
	
	return $post_id;
	global $post;
	
	if($post->post_type == "post" || $post->post_type == "page") {
		
		update_post_meta($post->ID, "bg_slider", $_POST["bg_slider"]);
		
	}
	
}

if(get_option("slide_blog") == 2) {
	
	// Add Slideshow to the whole blog
	
	function bg_slide_blog() {
		
		require_once(PLUGINDIR . "/background-slideshow/background-slideshow.php");
		
	}
	
	add_action('wp_head', 'bg_slide_blog');
	
}

function bg_slide_img() {
	
	$thumb = get_the_post_thumbnail($post_id, "full");
	$thumb = explode("\"", $thumb);
	return $thumb[5];
	
}

//Check for Post Thumbnail Support

add_theme_support( 'post-thumbnails' );

?>