<?php
/*
Plugin Name: Posts Per Category
Version: 0.1.2
Plugin URI: http://wordpress.org/extend/plugins/posts-per-category/
Description: Change the number of posts displayed in individual category archives and their feeds.
Author: Blazer Six
Author URI: http://www.blazersix.com/License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

------------------------------------------------------------------------
Copyright 2012  Blazer Six, Inc.

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


class Posts_Per_Category {
	var $index, $options;
	
	function __construct() {
		add_action( 'plugins_loaded', array( &$this, 'i18n' ) );
		add_action( 'plugins_loaded', array( &$this, 'admin' ) );
		
		add_action( 'parse_query', array( &$this, 'parse_query' ) );
	}
	
	function i18n() {
		load_plugin_textdomain( 'posts-per-category', false, 'posts-per-category/languages' );
	}
	
	function admin() {
		if ( is_admin() ) {
			require_once( plugin_dir_path( __FILE__ ) . 'admin/admin.php' );
		}
	}
	
	function parse_query( $query ) {
		if ( ! is_admin() && is_category() ) {
			$term = get_queried_object();
			
			if ( $term ) {
				$this->index = 'tax_category_' . $term->term_id;
				$this->options = get_option( 'posts_per_category' );
				
				if ( is_array( $this->options ) && array_key_exists( $this->index, $this->options ) ) {
					if ( is_feed() && isset( $this->options[ $this->index ]['posts_per_rss'] ) ) {
						add_filter( 'pre_option_posts_per_rss', array( &$this, 'pre_option_posts_per_rss' ) );
					} elseif ( isset( $this->options[ $this->index ]['posts_per_page'] ) ) {
						add_action( 'pre_get_posts', array( &$this, 'pre_get_posts' ) );
					}
					
				}
			}
		}
	}
	
	function pre_get_posts( $query ) {
		if ( $query->is_main_query() ) {
			$query->set( 'posts_per_page', $this->options[ $this->index ]['posts_per_page'] );
		}
	}
	
	function pre_option_posts_per_rss( $option ) {
		return $this->options[ $this->index ]['posts_per_rss'];
	}
}
$posts_per_category = new Posts_Per_Category();
?>