<?php
/*
Plugin Name: Social Actions For Posts
Plugin URI: http://www.a-scripts.com
Description: A plugin conntecting your blog with <a href="http://www.socialactions.net">Social Actions</a> displaying related social actions as widget for each post. Plugin uses post's tags to search for related actions.
Author: Andrej Farkas
Version: 1.0
Author URI: http://www.a-scripts.com
*/

/*
Copyright 2009  Andrej Farkas (http://www.a-scripts.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details: http://www.gnu.org/licenses/gpl.txt
*/


function sc_ajax_scripts() 
{
	wp_enqueue_script( "sc_action_request", path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )."/action_request.js"), array( 'jquery' ) );
}
 
add_action('wp_print_scripts', 'sc_ajax_scripts');

function social_actions_panel()
{
	global $post;
	
	if( !is_admin() && $post->ID && !is_page() && !is_home() )
	{
		$objTagsArray = get_the_tags( $post->ID );
		
		if( is_array( $objTagsArray ) && count( $objTagsArray ) > 0 )
		{
			$strTagsNameArray = array();
			
			foreach ( $objTagsArray as $objTag )
			{
				$strTagsNameArray[] = $objTag->name;
			}
			
			printf( '<script>
						var sa_ajax_request_url = \'%s\';
						var sa_ajax_request_data = { words: \'%s\',
													 count: %d };
						var sa_ajax_loading_img = \'<img src="%s"/>\';	
					</script>
					<div class="widget widget_recent_entries">
						<h2>Social Actions</h2>
						<div id="social-actions"></div>
					</div>',
			 		path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )."/ajax_request.php"),
			 		implode( '+', $strTagsNameArray ),
			 		get_option( 'social_actions_count' ),
			 		path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )."/ajax-loader.gif") );
		}
	}
}

function social_actions_panel_setup()
{
	add_option( 'social_actions_count', '' );
	
	if( isset( $_POST['social_actions_count'] ) )
	{
		update_option( 'social_actions_count', $_POST['social_actions_count'] );
	}
	
	printf( 'Number of actions:</br>
			<input type="text" name="social_actions_count" value="%d" />',
			get_option( 'social_actions_count' ) );
}

function init_panel()
{
	register_sidebar_widget( 'Social Actions Panel', 'social_actions_panel' );
	register_widget_control( 'Social Actions Panel', 'social_actions_panel_setup' );
}

add_action( 'plugins_loaded', 'init_panel' );
