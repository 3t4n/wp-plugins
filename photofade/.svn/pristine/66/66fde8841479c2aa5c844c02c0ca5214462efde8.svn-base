<?php
/*
Plugin Name: PhotoFade
Plugin URI: http://davidangel.net/photofade/
Description: Create slideshows from attached images using [photofade] shortcode. Uses jQuery.
Version: 0.2.1
Author: David Angel
Author URI: http://davidangel.net
License: GPL2
*/

/*  Copyright 2011  David Angel  (email : david@davidangel.net )

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
*/

function photofade_scripts() {
   // enqeue jquery
   wp_enqueue_script("jquery");
   // register your script location, dependencies and version
   wp_register_script('innerfade', get_bloginfo('wpurl') . '/wp-content/plugins/photofade/js/jquery.innerfade.js', array('jquery'), '1.0', false);
   // enqueue the script
   wp_enqueue_script('innerfade');
}
add_action('wp_enqueue_scripts', 'photofade_scripts');

function photofade_init() {
	echo '<!-- Begin PhotoFade Code -->';
	echo "
			<link rel=\"stylesheet\" type=\"text/css\" href=\"".plugins_url()."/photofade/photofade-styles.css\" />
	     ";
	echo '<!-- End PhotoFade Code -->';

}

add_action('wp_head', 'photofade_init');


function photofade_images($atts, $content = null) {
	extract(shortcode_atts(array(
		"size" => 'large',
		"float" => 'none',
		"time" => 4000,
		"height" => 'auto', // auto, variable, or pixel height
		"order" => 'sequence', // 'sequence', 'random' or 'random_start'
		"styles" => 'on'
	), $atts));
	
	global $photofade_styles;
	
	$images =& get_children( 'post_type=attachment&orderby=menu_order&post_mime_type=image&post_parent=' . get_the_id() );
	$max_height = 0; $max_width = 0; $small_height = 99999; $small_width = 99999;
	foreach( $images as $imageID => $imagePost ) {
		$imagedata = wp_get_attachment_image_src($imageID, $size, false);
		$test_height = ($imagedata[2]+2);
		$test_width = ($imagedata[1]+2);
		if($max_height < $test_height) { $max_height = $test_height; }
		if($max_width < $test_width) { $max_width = $test_width; }
		if($small_height > $test_height) { $small_height = $test_height; }
		if($small_width > $test_width) { $small_width = $test_width; }
	}
	if($height == 'auto') {
		$containerheight = ", containerheight: '".$small_height."px'";
	}
	elseif($height=='variable') {
		$containerheight = "";
	}
	else {
		$containerheight = ", containerheight: '".$height."px'";
	}
	// Remove styles if they've been set to off.
	if($styles=='off') { $remove_styles = "$('ul').removeClass('photofade').addClass('photofade_custom');"; } else { $remove_styles = '';}
	// Output jQuery script
	$out = "
	<script type=\"text/javascript\">
	jQuery(document).ready(function($) {
	$(function(){
		var actualWidth = $max_width;
		var actualHeight = $max_height;
		var renderedWidth = $('.photofade').width();
		var renderedHeight = (actualHeight*renderedWidth)/actualWidth;
	
				$('.photofade').innerfade({
					speed: 'slow',
					timeout: $time,
					type: '$order'
					$containerheight
				});
				$remove_styles
			}
		);
	});
	</script>";
	$out .= '<ul class="photofade" style="margin:0;padding:0;list-style-type: none;">';
	
	foreach( $images as $imageID => $imagePost ) {
	$fullimage = wp_get_attachment_image($imageID, $size, false);
	$imagedata = wp_get_attachment_image_src($imageID, $size, false);
	$width = ($imagedata[1]+2);
	$height = ($imagedata[2]+2);
	$out .= '<li>'.$fullimage.'</li>';
	}
	$out .= '</ul><div class="clearfix"></div>';
	return $out;
}
add_shortcode("photofade", "photofade_images");

?>