<?php
/*
Plugin Name: Breathable More Tag
Plugin URI: http://wordpress.org/extend/plugins/breathable-more-tag/
Description: Ensure that the &lt;!--more--&gt; tag has space to breathe if the following tag is block-level
Version: 1.0
Author: Ian Beck
Author URI: http://beckism.com/
*/

/*  Copyright 2012  Ian Beck

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

// Add our hook into the data saving flow
add_action('wp_insert_post_data', 'bmt_modify_post_data');

function bmt_modify_post_data($data) {
	$data['post_content'] = preg_replace('/(<!--more-->)(<(?:h[0-6]|div|p|ul|ol|dl|aside|blockquote|hr|figure)(?: [^>]*)?>)/', "$1\n\n$2", $data['post_content']);
	return $data;
}
