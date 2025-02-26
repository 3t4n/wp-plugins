<?php
/*
Plugin Name: Auto Read More Generator.
Plugin URI: http://iindev.com/contact-iindev/
Description: This plugin will put a "Read More..." link for each post of the blog page after the first image and the first paragraph. If no image present at the beginning, it will only show the first paragraph and the read more link after that. 
Version: 1.0
Author: IINDEV
Author URI: http://iindev.com
*/
function the_content_with_readmore_link($more_link_text = null, $stripteaser = 0) {
	$content = get_the_content($more_link_text, $stripteaser);
	$content = apply_filters('the_content', $content);
	$content = explode("</p>", $content);
	
	
	foreach ($content as $key => $value){
		
		if 	($value != null || $value != ''){
			if (  !stripos( $content[$key], '<img' )  === false ){
				echo $content[$key];
				for($i = $key+1; $i < count($content); $i++  ){
					echo $content[$i];
					if 	($content[$i] != null || $content[$i] != '') break;
				}
			}
			else{
				for($i = $key; $i < count($content); $i++  ){
					echo $content[$i];
					if 	($content[$i] != null || $content[$i] != '') break;
				}
			}	
			break;						
		}
		else echo $value;
	}
	echo '&nbsp;<a href="' . get_permalink($post->ID) . '" >Read More...</a>';
}
?>
