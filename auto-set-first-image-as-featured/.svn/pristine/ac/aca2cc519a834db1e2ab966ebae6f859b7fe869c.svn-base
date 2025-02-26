<?php
/*
Plugin URI: https://wordpress.org/plugins/auto-set-first-image-as-featured/
Author: BehroozDante
Author URI: https://BehroozDante.ir/
Email: behroozdante@gmail.com
*/
if (!defined( 'ABSPATH' ) ) {
exit;
}
?>
<?php

add_theme_support('post-thumbnails');

function function_dante_auto_set_first_image_featured($metadata, $object_id, $meta_key, $single){
 
 
   
   if ($meta_key !== '_thumbnail_id' || $metadata) {
		return $metadata;
	}

 
	preg_match('~<img[^>]+wp-image-(\\d+)~', get_post_field('post_content', $object_id), $matches);
	if ($matches) {
		return $matches[1];
	}
	return $metadata;
 

}

add_filter( 'get_post_metadata', 'function_dante_auto_set_first_image_featured', 100, 4 );
?>