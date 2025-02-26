<?php

/*
Plugin Name: Albumize
Plugin URI: http://www.litschers.com/wordpress/albumize/
Description: This plugin organizes Wordpress 2.5+ galleries into albums for easy display using parent/child pages and custom fields
Version: 1.2
Author: Ken Litscher
Author URI: http://www.litschers.com

Changelog:

1.0: Initial Release
1.1: Fixed content output bug
	 Fixed cover thumbnail ordering bug
	 Added number of pictures in gallery to output
	 Added "alt" tag to thumbnail image
1.2: Added new styling ability
*/

function albumize_func($attr) {

	global $id;
if (isset($attr['style'])){$style=strtolower($attr['style']);}
	else{$style='hor';}	
$pages = get_pages('child_of='.$id.'&sort_column=post_date&sort_order=asc');
    foreach($pages as $page)
    {    
		$files = get_children("post_parent=".$page->ID."&post_type=attachment&post_mime_type=image&orderby=menu_order&order=ASC");
if($files){
        
		$keys = array_keys($files);
		if (get_post_meta($page->ID, 'alb_cover', 'TRUE'))
			{$i = get_post_meta($page->ID, 'alb_cover', 'TRUE')-1;}
		else
			{$i = 0;}
		$thumb=wp_get_attachment_thumb_url($keys[$i]);
        
	}
        $album .= '
<div class="albumize_gallery_'.$style.'">
		<div class="albumize_thumb_'.$style.'"><a href="' .get_page_link($page->ID). '"><img src="'.$thumb . '" alt="' .$page->post_title. '" /></a></div>
		<div class="albumize_title_'.$style.'"><a href="' .get_page_link($page->ID). '">' .$page->post_title. '</a></div>
		<div class="albumize_desc_'.$style.'">'.get_post_meta($page->ID, 'alb_blurb', 'TRUE').' <span class="albumize_count_'.$style.'">'. count($keys) .' pictures</span></div>
</div>';



       	
//	*/		
}

	return $album;
	}

function albumize_css() {
	if ( !defined('WP_CONTENT_URL') )
    	define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
	echo "
	<link rel='stylesheet' href='".WP_CONTENT_URL."/plugins/albumize/albumize.css' type='text/css' media='all' />";
}
add_shortcode('albumize', 'albumize_func');
add_action('wp_head', 'albumize_css');
?>