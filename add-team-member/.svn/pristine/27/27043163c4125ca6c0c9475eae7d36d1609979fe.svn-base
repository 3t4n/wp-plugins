<?php
					/*
					Plugin Name: Add Your Team
					Description: A Plugin to add staff member's or employee's of the company/organisation.
					Version:1.0.2
					Author: priyanshu.mittal,vibhorp
					Author URI: http://appointpress.com
					Plugin URI: http://appointpress.com
					
					This program is free software; you can redistribute it and/or modify
					it under the terms of the GNU General Public License as published by
					the Free Software Foundation; either version 3 of the License, or
					(at your option) any later version.
	
					This program is distributed in the hope that it will be useful,
					but WITHOUT ANY WARRANTY; without even the implied warranty of
					MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
					GNU General Public License for more details.
	
					You should have received a copy of the GNU General Public License
					along with this program. If not, see <http://www.gnu.org/licenses/>.
					*/
?>
<?php 
				define( 'ADD_YOUR_TEAM_PATH', plugin_dir_path( __FILE__ ) );
				require ADD_YOUR_TEAM_PATH . 'teamshortcode.php';

					// Create Team Member Post Type
					add_action( 'init', 'sci_create_post_type_team' );
					
					//add meta box descripton to the team post type
					add_action('admin_init','sci_team_meta');
					function sci_team_meta(	){  require ADD_YOUR_TEAM_PATH . 'classes/class-metabox.php';  }
					function sci_create_post_type_team() {
							register_post_type( 'sci_team',array(
							'labels' => array(
							'name' => 'Add  Team',
							'singular_name' => 'Add Your Team Member',
							'add_new' => __('Add New Member', 'sis_spa'),
							'add_new_item' => __('Add New Member','sis_spa'),
							'edit_item' => __('Edit Team Member','sis_spa'),
							'new_item' => __('New Link','sis_spa'),
							'all_items' => __('All Team Members','sis_spa'),
							'view_item' => __('View Team','sis_spa'),
							'search_items' => __('Search Links','sis_spa'),
							'not_found' =>  __('No Links found','sis_spa'),
							'not_found_in_trash' => __('No Links found in Trash','sis_spa'), 
						                       ),
							'supports' => array('title','thumbnail'),
							'show_in_nav_menus' => false,
							'public' => true,
							'public' => true,
						 	)
				);
}

					


?>