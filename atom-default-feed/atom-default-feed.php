<?php
/*
Plugin Name: Atom Default Feed
Plugin URI: http://wordpress.org/extend/plugins/atom-default-feed/
Description: Switches WordPress feeds to default to Atom format and obsoletes the RDF and RSS 0.92 feeds.
Author: Otto
Version: 1.1
Author URI: http://ottodestruct.com
License: GPL2

    Copyright 2010  Samuel Wood  (email : otto@ottodestruct.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2, 
    as published by the Free Software Foundation. 
    
    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    
    The license for this software can likely be found here: 
    http://www.gnu.org/licenses/gpl-2.0.html
    
*/

// set the default feed to atom
add_filter('default_feed','atom_default_feed');
function atom_default_feed() { return 'atom'; }

// remove the rdf and rss 0.92 feeds (nobody ever needs these)
remove_action( 'do_feed_rdf', 'do_feed_rdf', 10, 1 );
remove_action( 'do_feed_rss', 'do_feed_rss', 10, 1 );

// point those feeds at rss 2 (it is backwards compatible with both of them)
add_action( 'do_feed_rdf', 'do_feed_rss2', 10, 1 );
add_action( 'do_feed_rss', 'do_feed_rss2', 10, 1 );
