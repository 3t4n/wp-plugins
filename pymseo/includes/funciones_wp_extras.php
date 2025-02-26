<?php
// ###############################
// EXTRAS
// ###############################
// UX/UI -> Subir archivos no permitidos
// ###############################
add_filter( 'upload_mimes', 'fun_pymseo_upload_mimetypes', 1, 1 );
function fun_pymseo_upload_mimetypes( $mime_types ) {
  $mime_types['svg'] = 'image/svg+xml';     // Adding .svg extension
  $mime_types['json'] = 'application/json'; // Adding .json extension
    
  return $mime_types;
}





// Agregue botones sociales a su feed RSS de WordPress
	// add custom feed content
	function wpb_add_feed_content($content) {
	// Check if a feed is requested
	if(is_feed()) {
		// Encoding post link for sharing
		$permalink_encoded = urlencode(get_permalink());
		// Getting post title for the tweet
		$post_title = get_the_title(); 
		// Content you want to display below each post
		// This is where we will add our icons
		$content .= '<p>
		<a href="http://www.facebook.com/sharer/sharer.php?u=' . $permalink_encoded . '" title="Share on Facebook"><img src="Facebook icon file url goes here" title="Share on Facebook" alt="Share on Facebook" width="64px" height="64px" /></a>
		<a href="http://www.twitter.com/share?&text='. $post_title . '&amp;url=' . $permalink_encoded . '" title="Share on Twitter"><img src="Facebook icon file url goes here" title="Share on Twitter" alt="Share on Twitter" width="64px" height="64px" /></a>
		</p>';
		}
	return $content;
	}

	add_filter('the_excerpt_rss', 'wpb_add_feed_content');
	add_filter('the_content', 'wpb_add_feed_content');

	
	
	
	
	
	
	
?>