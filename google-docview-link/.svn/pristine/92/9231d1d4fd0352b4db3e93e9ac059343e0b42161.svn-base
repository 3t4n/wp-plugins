<?php
/*
Plugin Name: Google DocView Link
Plugin URI: http://just.thinkofit.com/google-docview-link/
Description: Create shortcodes for generating links to view a document with the Google Document Viewer
Version: 1.0.2
Author: David R. Woolley
Author URI: http://thinkofit.com/drwool
*/

/*  Copyright 2012 David R. Woolley  (email : drwool@thinkofit.com)

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
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


/*
	The Google Document Viewer requires passing the URL of a document to be shown,
	and said URL must be URL-encoded. Since it is a pain to URL-encode URLs by hand,
	and since encoded URLs are hard to read, this plugin provides an easy way to generate
	url-encoded URLS. Two shortcodes are provided:

	1. [gdocview_url] is passed a URL and returns it URL-encoded.

	The URL argument may be a full URL (starting with http) or a local URL starting with a slash.
	If a local URL is passed, the WordPress site URL is automatically prepended.

	2. [gdocview_link] is passed a URL and an optional text label, and returns a full clickable link.

	As with [gdocview_url] the URL may be a full URL or a local URL starting with a slash.
	If no label is passed, the default label "View Online" is used.

	See the readme.txt file for examples.
*/



/*
	This function generates a URL for the Google Document Viewer to
	display a document located at the URL passed in the argument.

	URL argument may be a full URL (starting with http) or a local URL starting with a slash.
	If a local URL is passed, the WordPress site URL is automatically prepended.
*/
function drw_gdvl_url_encode ($url) {
	if (substr($url, 0, 4) != "http") {
		$url = get_site_url().$url;
	}
	return 'http://docs.google.com/viewer?url='.urlencode($url);
}


/*
	This function does the same thing as drw_gdvl_url_encode but is designed to be
	called via a WordPress shortcode.
*/
function drw_gdvl_url_func( $atts ) {
	extract( shortcode_atts( array(
		'url' => '',
	), $atts ) );

	return drw_gdvl_url_encode ($url);
}

add_shortcode( 'gdocview_url', 'drw_gdvl_url_func' );



/*
	This function, designed to be called via a shortcode, generates a clickable link to view
	the document at the specified URL with the Google Document Viewer. The optional "label"
	argument specifies the clickable text be displayed;  if blank, the default is "View Online".
*/
function drw_gdvl_link_func( $atts ) {
	extract( shortcode_atts( array(
		'url' => '',
		'label' => 'View Online',
	), $atts ) );

	return '<a href="'.drw_gdvl_url_encode($url).'">'.$label.'</a>';
}

add_shortcode( 'gdocview_link', 'drw_gdvl_link_func' );

?>
