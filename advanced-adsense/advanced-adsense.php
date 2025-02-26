<?php
/*
Plugin Name: Advanced Adsense
Plugin URI: http://thejimgaudet.com/advanced-adsense/
Description: A simple plugin to help make your Google AdSense Ads display better, more relevant ads.
Version: 1.1
Author: Jim Gaudet
Author URI: http://thejimgaudet.com/

Copyright 2009  Jim Gaudet  (email : theone@thejimgaudet.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

*/
?>
<?php

add_option('advadwhere');

add_action('admin_menu', 'advanced_adSense_menu');
add_action( 'admin_init', 'register_mysettings' );

function register_mysettings() { // whitelist options
  register_setting( 'advadwhere-group', 'advadwhere' );
}

function advanced_adSense_menu() {
  add_options_page('Advanced AdSense Options', 'Advanced AdSense', 8, 'advancedadsense', 'adv_adsense_options');
}

function adv_adsense_options() {
  echo '<div class="wrap">';
  echo '<h2>Advanced AdSense</h2>';
  echo '<p>A simple plugin to help make your Google AdSense Ads display better, more relevant ads. I hope you like this WordPress plugin. Say thanks by stopping by my site.</p>';
  echo '<p>Just select Content or Tags to have the Google Ad Section code placed...</p>';
  echo '<p><a title="Costa Rica Web Design" href="http://thejimgaudet.com/web-design/">Costa Rica Web Design</a></p>';
  echo '<form method="post" action="options.php">';
  echo settings_fields( 'advadwhere-group' );
  echo '<table class="form-table">';
  echo '<tr valign="top">';
  echo '<th scope="row">Select Area</th>';
  echo '<td>';
	$advwhere = get_option('advadwhere');
	$showad = "";
	if($advwhere=="content") {
		$showad = '<select name="advadwhere"><option value="content" selected="selected">Content</option><option value="tags">Tags</option></select>';
	} elseif($advwhere=="tags") {
		$showad = '<select name="advadwhere"><option value="content">Content</option><option value="tags" selected="selected">Tags</option></select>';
	} else {
		$showad = '<select name="advadwhere"><option value="content" selected="selected">Content</option><option value="tags">Tags</option></select>';
	}
  echo $showad;
  echo '</td>';
  echo '</table>';
  echo '<p class="submit">';
  echo '<input type="submit" class="button-primary" value="Save Changes" />';
  echo '</p>';
  echo '</form>';
  echo '</div>';
}

$filterad = get_option('advadwhere');
if($filterad=="content") {
	add_filter('the_content', 'adsense_ad_tjg');
} elseif($filterad=="tags") {
	add_filter('the_tags', 'adsense_ad_tjg');
} else {
	add_filter('the_content', 'adsense_ad_tjg');
}

function adsense_ad_tjg($content) { 
	$content = "<!-- Advanced AdSense by Jim Gaudet --><!-- google_ad_section_start -->".$content."<!-- Advanced AdSense by Jim Gaudet --><!-- google_ad_section_end -->";
	return $content;
}
?>