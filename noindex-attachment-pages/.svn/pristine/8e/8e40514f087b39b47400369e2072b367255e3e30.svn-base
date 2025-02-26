<?php
/**
 * Plugin Name: Noindex Attachment Pages
 * Plugin URI: http://wordpress.org/plugins/noindex-attachment-pages/
 * Description: Add META ROBOTS NOINDEX to Attachment Pages in WordPress
 * Version: 1.0
 * Author: Jose A Ruiz
 * Author URI: http://twitter.com/jruizcantero
 * License: GPL2
 */
 
 
add_action('wp_head', 'jrc_noindex_attachment_pages');

function jrc_noindex_attachment_pages(){
	if (get_post_mime_type()!= false){
		echo '<meta name="robots" content="noindex,nofollow" /> ';
	}

}

?>