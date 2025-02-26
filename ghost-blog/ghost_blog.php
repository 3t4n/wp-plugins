<?php
/*
Plugin Name: Ghost blog
Plugin URI: http://www.yaaahaaa.com/2009/07/24/ghost-blog.html
Description: For the ghost blog function
Author: Adam Lai
Version: 1.3
Author URI: http://www.yaaahaaa.com
*/

// [ghost=872] ==>> get the 872 blog's content
function ghost_blog()
{
	global $wpdb;
	global $post;
	
	$content = $post->post_content;
	
	$search = "@\[ghost=(\d+)\]@i";
	if (preg_match_all($search, $content, $matches, PREG_SET_ORDER)) 
	{
		foreach ($matches as $match) 
		{
			$ghost_id = trim($match[1]);
			
			$inner_query = new WP_Query("page_id=$ghost_id");
			if( $inner_query->have_posts() )
			{
				$inner_query->the_post();
			}
		}
	}
}
add_filter('the_post', 'ghost_blog', $priority=1);

?>