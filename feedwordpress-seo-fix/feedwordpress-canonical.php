<?php
/**
 * @package davidn.de
 * @version 1.0
 */
/*
Plugin Name: Feed Wordpress SEO Fix
Plugin URI: http://wordpress.org/extend/plugins/feedwordpress-seo-fix/
Description: This Plugin fixes the SEO relevant duplicate content issue for Feed Wordpress plugin.
Author: David Nellessen
Version: 1.0
Author URI: http://davidn.de

  Copyright 2012 David Nellessen (email@davidn.de)

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


class FeedWordpressCanonicalName {
	 
	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/
	
	/**
	 * Initializes the plugin.
	 */
	function __construct() {
		
		// Replace standard canonical filter.
		remove_action('wp_head', 'rel_canonical');
	  add_filter( 'wp_head', array( $this, 'rel_canonical' ) );

	} // end constructor
	
	
	
	/*--------------------------------------------*
	 * Core Functions
	 *---------------------------------------------*/
	
	/**
	 * Filter for adding the canonical link. This is similar to rel_canonical().
	 */
	function rel_canonical() {
	  // Fallback to default filter if Feed Wordpress not active.
	  if (!function_exists("get_syndication_permalink")) return rel_canonical();
	  
  	if ( !is_singular() )
  		return;
  
  	global $wp_the_query;
  	if ( !$id = $wp_the_query->get_queried_object_id() )
  		return;
  	
  	$syndication_link = get_syndication_permalink($id);
  
  	$link = $syndication_link ? $syndication_link : get_permalink( $id );
  	echo "<link rel='canonical' href='$link' />\n";
	} // end rel_canonical
	
  
} // end class

// Initiate plugin.
new FeedWordpressCanonicalName();