<?php
/*
Plugin Name: percent encode capital letter
Plugin URI: http://wordpress.org/extend/plugins/percent-encode-capital-letter/
Description: This plugin makes regular URL by which percent encoding was carried out with a capital letter.
Author: wokamoto
Version: 1.0.0
Author URI: http://dogmap.jp/

License:
 Released under the GPL license
  http://www.gnu.org/copyleft/gpl.html

  Copyright 2011 (email : wokamoto1973@gmail.com)

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

function percent_encode_capital_letter($uri) {
	static $toupper;
	if (!isset($toupper))
		$toupper = create_function('$m', 'return strtoupper($m[0]);');
	$uri = preg_replace_callback('/(%[0-9a-f]{2}?)+/', $toupper, $uri);
	return $uri;
}
add_filter('post_link', 'percent_encode_capital_letter');
add_filter('page_link', 'percent_encode_capital_letter');
add_filter('tag_link', 'percent_encode_capital_letter');
add_filter('category_link', 'percent_encode_capital_letter');
add_filter('preview_post_link', 'percent_encode_capital_letter');
add_filter('get_the_guid', 'percent_encode_capital_letter');
?>