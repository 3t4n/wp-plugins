<?php

/**
 * Plugin Name: Auto Link Tags
 * Plugin URI: https://wordpress.org/plugins/auto-link-tags
 * Description: Create automatic links to your tags in your posts.
 * Version: 0.1.0
 * Author: Patricio Tarantino
 * License: License: GPL2+
**/

/*  
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_filter('the_content', 'auto_link_tags');

function auto_link_tags($content){

    //$post_id = get_the_ID();
    $post_tags = get_the_tags();

    if ($post_tags) {
        $i = 0;
        foreach($post_tags as $tag) {
            $tags[$i] = "~<(?:a\\s.*?</a>|[^>]+>)(*SKIP)(*FAIL)|\\b(?:\\b(" . $tag->name . ")\\b(?=[^>]*(<|$)))\\b~i";
            $tag_url = get_tag_link($tag->term_id);
            $tag_html[$i] = '<a href="' . $tag_url . '" title="$1">$1</a>';
            $i++;
        }
        $content = preg_replace($tags, $tag_html, $content);
    }

    return $content;

}