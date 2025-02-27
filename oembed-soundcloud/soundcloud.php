<?php
/*
Plugin Name: Soundcloud oEmbed
Plugin URI: http://www.brandonshutter.com
Description: Enables the ability to paste a SoundCloud URL in it's own line and for oEmbed to make it play.
Version: 3.0
Author: Brandon Shutter
Author URI: http://www.brandonshutter.com
*/
 
 
function add_oembed_soundcloud(){
        wp_oembed_add_provider( 'http://soundcloud.com/*', 'http://soundcloud.com/oembed' );
}
add_action('init','add_oembed_soundcloud');