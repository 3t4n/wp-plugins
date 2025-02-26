<?php

/* Plugin Name: Complete social plugin
   Description: All social networking websites content share button plugin
   Author: Kunwar Asif Ali Khan
   Version: 1.0
   Author URI: http://www.sprybirds.com
*/
wp_register_style( 'plugin-styles', WP_PLUGIN_URL . '/all-sociable/_styles/_style.css' );
wp_enqueue_style('plugin-styles');

function sprybirds_all_social_sharing_buttons($content) {
		
 // Show this on post and page only. Add filter is_home() for home page
 if(is_singular()){
   // Get current page URL
   $shortURL = urlencode(get_permalink());
   // Get current page title
   $shortTitle = get_the_title();
   // Construct sharing URL without using any script
   $twitterURL = 'https://twitter.com/intent/tweet?text='.$shortTitle.'&amp;url='.$shortURL.'&amp;original_referer='.$shortURL;
   $sprybirdsURL = 'http://sprybirds.com/get-content?url='.$shortURL;
   $facebookURL = 'https://www.facebook.com/sharer.php?u='.$shortURL;
   $googleURL = 'https://plus.google.com/share?url='.$shortURL;
   $bufferURL = 'https://bufferapp.com/add?url='.$shortURL.'&amp;text='.$shortTitle;
   // Add sharing button at the end of page/page content
   $content .= '<div class="sb-share-social">';
   $content .= '<h5>SHARE ON</h5><a class="sprybirds-all-share-link sb-share-sprybirds" href="'.$sprybirdsURL.'" target="_blank">Sprybirds</a>';
   $content .= '<a class="sprybirds-all-share-link sb-share-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
   $content .= '<a class="sprybirds-all-share-link sb-share-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
   $content .= '<a class="sprybirds-all-share-link sb-share-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
   $content .= '<a class="sprybirds-all-share-link sb-share-buffer" href="'.$bufferURL.'" target="_blank">Buffer</a>';
   $content .= '</div>';
   return $content;
 }else{
	// if not post/page then don't include sharing button
	return $content;
 }
};
add_filter( 'the_content', 'sprybirds_all_social_sharing_buttons');

?>