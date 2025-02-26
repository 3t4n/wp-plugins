<?php
/*
Plugin Name: Nofollow Blogroll SEO
Plugin URI: http://www.web-articles.info
Description: A simple plugin that adds rel="nofollow" attribute to non-homepage Blogroll Links. Improves SEO while still giving link love to your favorite sites.
Author: Mircea Duhan
Version: 1.2
Author URI: http://www.web-articles.info
*/

/*  Copyright 2009-2010

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


// Begin the Plugin

    function nofollow_blogroll_seo($content) {
		if ( function_exists('is_front_page') ) {
			if ( !is_front_page() ) { foreach ($content as $link) { $link->link_rel = trim("nofollow $link->link_rel"); } }
			}		
		else {
			if ( !is_home() ) { foreach ($content as $link) { $link->link_rel = trim("nofollow $link->link_rel"); } }
			}
		
        return $content;
    	}

    add_filter ('get_bookmarks', 'nofollow_blogroll_seo');
    
?>