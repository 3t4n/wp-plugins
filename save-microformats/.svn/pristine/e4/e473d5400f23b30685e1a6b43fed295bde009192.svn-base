<?php
/*
Plugin Name: Save Microformats
Plugin URI: http://notizblog.org/projects/save-microformats/
Description: To save a posted hCal als iCal using with the <a href="http://technorati.com/events/">technorati converter</a>. Just put &lt;!&#8211;&#8211;hcal&#8211;&#8211;&gt; in the post field where the link should be displayed.
Version: 1.2.1
Author: Pfefferle
Author URI: http://notizblog.org/
*/

// Pre-2.6 compatibility
if ( ! defined( 'WP_CONTENT_URL' ) )
    define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
    define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
    define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
    define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

// register
if (isset($wp_version)) {
  add_filter('the_content', array('SaveUF', 'save_hcal'));
  add_filter('the_content', array('SaveUF', 'save_hcard'));
}

class SaveUF {
	function save_hcal($content) {
		$wrapper = 'http://feeds.technorati.com/event/';
		$imagelink = WP_PLUGIN_URL . '/save-microformats/icon-hcalendar.png';
		$desc = 'add this event to your favorite calendar';
		$link = '<a href="'.$wrapper.urlencode(get_permalink($post->ID)).'" title="'.$desc.'"><img src="'.$imagelink.'" alt="'.$desc.'" style="border: none;" /></a>';
	    if (is_single() || is_page()) {
	        $content=str_ireplace('<!--save-hcal-->',$link,$content);
	    }
	    return $content;
	}
	
	function save_hcard($content) {
		$wrapper = 'http://feeds.technorati.com/contact/';
		$imagelink = WP_PLUGIN_URL . '/save-microformats/icon-hcard.png';
		$desc = 'add this contact to your favorite address-book';
		$link = '<a href="'.$wrapper.urlencode(get_permalink($post->ID)).'" title="'.$desc.'"><img src="'.$imagelink.'" alt="'.$desc.'" style="border: none;" /></a>';
	    if (is_single() || is_page()) {
	        $content=str_ireplace('<!--save-hcard-->',$link,$content);
	    }
	    return $content;
	}
}
?>
