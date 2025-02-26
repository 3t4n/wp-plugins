<?php
/*
Plugin Name: Archives By Category
Plugin URI: http://herselfswebtools.com/2007/10/here-is-a-quick-way-to-print-a-list-of-all-your-posts-by-category-in-wordpress.html
Description: Creates a link list of posts sorted by category and ordered by title alphabetically
Author: Linda MacPhee-Cobb [ credit also to Frucomerci whose plugin I shamelessly hacked. ]
Version: 1.0
Author URI: http://timestocome.com
*/




function archives_by_category() {

	global $wpdb, $post;
	
	$tp = $wpdb->prefix;

	$pc_header = get_option('pc_header');

	$sort_code = 'ORDER BY cat_name ASC, post_title ASC';
	$the_output = NULL;


	$last_posts = (array)$wpdb->get_results("
		SELECT post_date, ID, post_title, cat_name, cat_ID
		FROM {$tp}posts, {$tp}post2cat, {$tp}categories 
		WHERE {$tp}posts.ID = {$tp}post2cat.post_id 
		AND {$tp}categories.cat_ID = {$tp}post2cat.category_id
		AND post_status = 'publish' 
		AND post_type != 'page' 
		AND post_date < NOW() 
		{$hide_check} 
		{$sort_code}
	");

	if (empty($last_posts)) {
		return NULL;
	}

	$the_output .= stripslashes($ddle_header); 

	$used_cats = array();;
	$i = 0;
	foreach ($last_posts as $posts) {
		if (in_array($posts->cat_name, $used_cats)) {
			unset($last_posts[$i]);
		} else {
			$used_cats[] = $posts->cat_name;
		}
		$i++;
	}
	$last_posts = array_values($last_posts);

	$the_output .= '<ul>';
	foreach ($last_posts as $posts) {

	  $the_output .= '<li><h3><a name="' . apply_filters('list_cats', $posts->cat_name, $posts) . '">' . apply_filters('list_cats', $posts->cat_name, $posts) . '</a></h3></li>';

    $where = apply_filters('getarchives_where', "WHERE post_type = 'post' AND post_status = 'publish' AND post_category=5" , $r );
    
    $arcresults = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND ID IN (Select post_id FROM $wpdb->post2cat WHERE category_id =$posts->cat_ID) ORDER BY post_title ASC");
		
		foreach ( $arcresults as $arcresult ) {
	    $the_output .= '<li><a href="' . get_permalink($arcresult->ID) . '">' . apply_filters('the_title', $arcresult->post_title) . '</a></li>';
		}
    
    $the_output .= '';
	}
	$the_output .= '</ul>';
	return $the_output;
}


function pc_generate_local($content) {
	$content = str_replace("<!-- archivessbycategory -->", archives_by_category(), $content);
	return $content;
}

add_filter('the_content', 'pc_generate_local');


?>