<?php
/*
Plugin Name: Archives By Category
Plugin URI: http://herselfswebtools.com/2007/10/here-is-a-quick-way-to-print-a-list-of-all-your-posts-by-category-in-wordpress.html
Description: Creates a link list of posts sorted by category and ordered by title alphabetically
Author: Linda MacPhee-Cobb 
Version: 2.3
Author URI: http://timestocome.com
*/




function archives_by_category() {

	global $wpdb, $post;
	
	$table_prefix = $wpdb->prefix;

	$pc_header = get_option('pc_header');

	$sort_code = 'ORDER BY name ASC, post_title ASC';
	$the_output = NULL;

	/* fetch posts, categories from mysql and sort by category, then by post */
	
	$last_posts = (array)$wpdb->get_results("
		select ID, post_date, post_title, post_status, name 
		from {$table_prefix}posts, {$table_prefix}terms, {$table_prefix}term_relationships, {$table_prefix}term_taxonomy 
		where {$table_prefix}posts.ID = {$table_prefix}term_relationships.object_id 
		and {$table_prefix}term_relationships.term_taxonomy_id = {$table_prefix}term_taxonomy.term_taxonomy_id 
		and {$table_prefix}term_taxonomy.term_id = {$table_prefix}terms.term_id 
		and post_status = 'publish' 
		and taxonomy = 'category'
		and post_date < NOW() 
		order by name asc, post_title asc;
	");

	if (empty($last_posts)) {
		return NULL;
	}


    /* this is what we print out on archives page */
	$the_output .= stripslashes($ddle_header); 


	/* print links and if category <a name header not printed print that first */
	$last_category = '';
	
	foreach ( $last_posts as $posts ){
		$title = $posts->post_title;
		$category = $posts->name;
		$post_number = $posts->ID;
		
		if ( $category != $last_category ){
			$the_output .= '<li><h3><a name="' . $category . '">' . $category . '</a></h3></li>';
			$last_category = $category;
		}
		$the_output .= '<li><a href="' .get_permalink($post_number) . '">' . $title . '</a></li>';
	}
  
 
  
  return $the_output;

}

/* this allows users to just put <!-- archivesbycategory --> in a post or page and not hack the template */
function pc_generate_local($content) {
	$content = str_replace("<!-- archivesbycategory -->", archives_by_category(), $content);
	return $content;
}

add_filter('the_content', 'pc_generate_local');



?>