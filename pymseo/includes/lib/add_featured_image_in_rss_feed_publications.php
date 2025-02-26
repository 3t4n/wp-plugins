<?php
//###############################
//--> Agregar la imagen destacada a las RSS
// ###############################
	function pymseo_fun_add_image_featured_rss_post($content) {
	global $post;
		if(has_post_thumbnail($post->ID)) {
			$content = '<p>' . get_the_post_thumbnail($post->ID) . '</p>' . get_the_content();
		}
		return $content;
	}
	add_filter('the_excerpt_rss', 'pymseo_fun_add_image_featured_rss_post');
	add_filter('the_content_feed', 'pymseo_fun_add_image_featured_rss_post');

?>