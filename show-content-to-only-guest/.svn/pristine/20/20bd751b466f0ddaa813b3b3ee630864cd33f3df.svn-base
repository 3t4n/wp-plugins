<?php
/*
	Plugin Name: Show content to only guest
	Plugin URI: https://wordpress.org/plugins/show-content-to-only-guest/
	description: Show Content to only guest/visitors.
	Version: 1.1
	Author: Techeak
	Author URI: https://techeak.com
	Text Domain: show-content-to-only-guest
*/
function show_to_only_guest($atts, $content = null) {
    if(is_user_logged_in())
    	return false;
    return apply_filters('the_content', $content);
}
add_shortcode('show_to_only_guest', 'show_to_only_guest');