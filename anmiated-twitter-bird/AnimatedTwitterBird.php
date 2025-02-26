<?php
/*
Plugin Name: AnimatedTwitterBird
Plugin URI: http://www.techlineinfo.com
Description: This plugin adds an animated flying twitter bird in a blog, which refers to random HTML elements and always settles in the visible portion of the window remains.If you move the cursor over the bird, a "tweet-this" - and "follow-me" link appears. This plugin is based on the Javascript code developed by http://floern.com. For more details visit the <a href="http://www.techlineinfo.com/wordpress-plugin-displays-animated-twitter-bird/">Animated Twitter Bird Plugin Page</a>
Author: Sujith Kumar
Version: 1.0
Author URI: http://www.techlineinfo.com/
*/
/*  Copyright 2011  Sujith Kumar  (email : admin@techlineinfo.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


function addBadge() {
	if ( !is_admin() ) { 
	echo("
	<!-- twitter follow badge by techlineinfo.com -->
		<script src=' ".get_bloginfo('wpurl').'/wp-content/plugins/anmiated-twitter-bird/js/tripleflap.js'."'; ' type='text/javascript'></script><script type='text/javascript' charset='utf-8'><!--
			var twitterAccount = '" . get_option("animated_account") . "';
			var showTweet = " . get_option("animated_tweet") . ";
			var birdSprite=' ".get_bloginfo('wpurl').'/wp-content/plugins/anmiated-twitter-bird/birdsprite.png'."';
			var twitterfeedreader=' ".get_bloginfo('wpurl').'/wp-content/plugins/anmiated-twitter-bird/twitterfeedreader.php'."';
			tripleflapInit();
		--></script>
	<!-- end of twitter follow badge -->");
}
}
function animated_menu() {
	add_options_page('AnimatedTwitterBird Options', 'AnimatedTwitterBird', 8, 'AnimatedTwitterBird', 'animated_options_page');
}

function animated_options_page() {
	echo '<div class="wrap">';
	echo '<h2>AnimatedTwitterBird ' . __('Options', 'animated') . '</h2>';
	echo '<form method="post" action="options.php">';
  
	wp_nonce_field('update-options');
  
	echo '<table class="form-table" style="width: 530px;">';
	echo '<tr valign="top">';
	echo '<th scope="row">' . __('Twitter account', 'animated') . '</th>';
	echo '<td><input type="text" name="animated_account" value="' . get_option('animated_account') . '" /></td>';
	echo '</tr>';
	echo '<th scope="row">' . __('Display your Latest Tweet?', 'ATB') . '</th>';
	echo '<td><input type="radio" name="animated_tweet" value="true"'; 
	if(get_option('animated_tweet') == "true")
		echo ' checked';
	echo '/> ' . __('Yes', 'animated') . '</td>';
	
	echo '<td><input type="radio" name="animated_tweet" value="false"'; 
	if(get_option('animated_tweet') == "false")
		echo ' checked';
	echo '/> ' . __('No', 'animated') . '</td>';
	echo '</tr>';

	echo '</table>';
	echo '<p class="submit">';	
	echo '<input type="submit" class="button-primary" value="' . __('Save Changes') . '" />';
	echo '</p>';
  
	settings_fields('AnimatedTwitterBird');
  
	echo '</form>';
	echo '</div>';
	
	addBadge();
}

function animated_register_settings() {
	register_setting('AnimatedTwitterBird', 'animated_account');
	register_setting('AnimatedTwitterBird', 'animated_tweet');
	}

$plugin_dir = basename(dirname(__FILE__));

add_option("animated_account");
add_option("animated_tweet", "false");
add_action('wp_footer', 'addBadge');

if(is_admin()){
	add_action('admin_menu', 'animated_menu');
	add_action('admin_init', 'animated_register_settings');
}
?>