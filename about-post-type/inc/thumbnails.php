<?php
/*********************************************************************************************************
* Add Thumbnails in about us post type
**********************************************************************************************************/


	add_filter('manage_about_post_type_posts_columns', 'about_post_type_columns', 5);
	add_action('manage_about_post_type_posts_custom_column', 'about_post_type_posts_columns', 5, 2);

	function about_post_type_columns($defaults){
		$defaults['about_post_type_thumbs'] = __('About  US Image');
		return $defaults;
	}

	function about_post_type_posts_columns($column_name, $id){
			if($column_name === 'about_post_type_thumbs'){
			echo the_post_thumbnail( 'featured-thumbnail' );
		}
	}
	
