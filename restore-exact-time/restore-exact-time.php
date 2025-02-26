<?php
/*
Plugin Name: Restore Exact Time
Plugin URI: http://nickohrn.com/wordpress-plugin-restore-exact-time
Description: Changes the date columns in the post and page interfaces to display exact times that a post or page was published.
Author: Nick Ohrn
Version: 1.0.2
Author URI: http://nickohrn.com/
*/

/*  Copyright 2008  Nick Ohrn  (email : nick@ohrnventures.com)

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

/**
 * Avoid name collisions.
 */
if(!class_exists('NFO_Restore_Exact_Time')) {

	class NFO_Restore_Exact_Time {
		
		/**
		 * Constructor.
		 */
		function NFO_Restore_Exact_Time() { }
		
		/**
		 * Adds the exact time column to the plugin.
		 */
		function custom_columns($defaults) {
			$other = array();
			$other['cb'] = $defaults['cb'];
			$other['exact'] = __('Date');
			unset($defaults['cb']);
			unset($defaults['date']);
			return array_merge($other, $defaults);
		}
		
		/**
		 * Echoes the exact time of the post/page that is being iterated over.
		 */
		function fill_column($column_name, $id) {
			if('exact' == $column_name) {
				$post = get_post($id);
				echo $post->post_date;
			}
		}
	} //end class

} // end if

/**
 * Insert action and filter hooks here
 */
add_filter('manage_posts_columns', array('NFO_Restore_Exact_Time', 'custom_columns'));
add_action('manage_posts_custom_column', array('NFO_Restore_Exact_Time', 'fill_column'), 10, 2);
add_filter('manage_pages_columns', array('NFO_Restore_Exact_Time', 'custom_columns'));
add_action('manage_pages_custom_column', array('NFO_Restore_Exact_Time', 'fill_column'), 10, 2);
	
?>
