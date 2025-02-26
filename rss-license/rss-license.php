<?php
/*
Plugin Name: RSS License
Version: 0.1
Plugin URI: http://room-303.com/blog/
Description: Allows one to include the wpLicense copyright in blog feeds.
Author: Patryk Zawadzki
Author URI: http://room-303.com/blog/
*/

function append_rss_license($contents) {
	if (!is_feed())
		return $contents;

	$license_uri = get_option('cc_content_license_uri');
	$license_name = get_option('cc_content_license');
	$license_attribName = get_option('cc_content_attributionName');
	$license_attribURL = get_option('cc_content_attributionURL');

	$result = '<a href="'.get_permalink().'">'.get_the_title().'</a> &copy;';

	if($license_attribURL) {
		$result .= ' <a href="'.$license_attribURL.'" rel="cc:attributionURL">';
	}
	if($license_attribName)
		$result .= $license_attribName;
	else {	
		$result .= $license_attribURL;
	}
	if($license_attribURL) {
		$result .= '</a>';
	}
	$result .= ', <a rel="license" href="'.$license_uri.'">'.$license_name.'</a>.';

	return $contents . '<p><small>'.$result.'</small></p>';
}

add_filter('the_content', 'append_rss_license');
//add_filter('the_excerpt_rss', 'append_rss_license');
