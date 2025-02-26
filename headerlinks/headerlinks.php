<?php
/*
Plugin Name: Headerlinks
Plugin URI: http://purl.org/david/projects/headerlinks
Description: Adds permalinks to headers
Version: 0.1
Author: David Roberts
Author URI: http://purl.org/david

    Copyright 2008 David Roberts <dvdr18@gmail.com>

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

add_action('wp_head', 'headerlinks_head');
function headerlinks_head() {
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'
	     . get_bloginfo("wpurl") . '/wp-content/plugins/headerlinks/headerlinks.css" />' . "\n";
}

add_filter('the_content', 'headerlinks_process_content', 9);
function headerlinks_process_content($content) {
	if(is_single() || is_page())
		return preg_replace_callback("/\<(h[1-6])\>(.*?)\<\/h[1-6]\>/", "headerlinks_process_header", $content);
	else
		return $content;
}
function headerlinks_process_header($header) {
	$tag = $header[1];
	$title = $header[2];
	$plink = sanitize_title($title);
	$linksymbol = "&#182;"; // pilcrow (¶) also &para;
	return '<' . $tag . '>'
	     . $title
	     . '<a class="headerlink" name="' . $plink . '" href="#' . $plink . '" title="Permalink to this header">' . $linksymbol . '</a>'
	     . '</' . $tag . '>';
}

?>
