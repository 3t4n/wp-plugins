<?php
/*
Plugin Name: Add to your SociBook Social Bookmarking Button
Version: 0.1
Plugin URI: http://wordpress.org/extend/plugins/add-to-your-socibook-social-bookmarking-button/
Description: This plugin puts a social bookmarking button on every post so that user can add content to socibook.com. When a post from your site is added to socibook people then can view it on socibook.com and if they like it they will enter your site from the link or vote for it, that way your posts will get popularity and people will come to your site from us. Visit <a href="http://socibook.com" target="_blank">plugin page</a>.
Author: Biser Markov
Author URI: http://socibook.com/
*/

function add_me($content) {

    global $post;
	
	$my_width = '100%';
	
	$my_align = 'left';
	
	$my_images_folder = get_settings('home') . '/wp-content/plugins/add-to-your-socibook-social-bookmarking-button/images/';
	
	$my_link = get_permalink($post->ID);	
    $my_title = get_the_title($post->ID);

	if ( !is_feed() && !is_page() ) {
		$content .= "\n\n" . '<!-- Begin /add-to-your-socibook-social-bookmarking-button/ plugin -->' . "\n"
                  . '<!-- http://wordpress.org/extend/plugins/add-to-your-socibook-social-bookmarking-button/ -->' . "\n"
                  . '<div>' . "\n"
				  
                  . '<a href="http://socibook.com/submit.php?url=' . $my_title . '&amp;url=' . $my_link . '" target="_blank" rel="nofollow" title="SociBook"><img src="' . $my_images_folder . 'socibook.png" alt="SociBook" title="SociBook" /></a>' .	"\n"			  
                  . '</div>' . "\n"
				  . '<!-- End /add-to-your-socibook-social-bookmarking-button/ plugin -->' . "\n\n";				  
    }				  
	return $content;
}

add_filter('the_content', 'add_me', 1097);

?>