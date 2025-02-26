<?php
/*
Plugin Name: Admin post tag filter
Description: Allowed admin to filter the posts or pages using tags.
Version: 2.0
Author: kiranpatil353, clarionwpdeveloper
Author URI: https://www.clariontech.com/
Plugin URI: https://wordpress.org/plugins/author-filters
Text Domain: admin-post-tag-filter
*/

function aptf_manage_posts_by_tag(){
	global $wp_taxonomies;
	if ( is_array( $wp_taxonomies ) )
	{
		$no_category_and_links = array('');
		foreach( $wp_taxonomies as $tax )
		{
			
				if($tax->label=='Tags'){ 
				$the_terms = get_terms($tax->name,'orderby=name&hide_empty=0' );
				$content  = '<select name="'.$tax->name.'" id="'.$tax->name.'" class="posttagfilter">';
				$content .= '<option value=""> All '.$tax->label.'</option>';
				
				foreach ($the_terms as $term){
					$selected_tag = '';
					
					$content .= '<option value="' . $term->slug . '"> '. $term->slug . '</option>';
				}
				$content .= '</select>';
				$content = str_replace('post_tag', 'tag', $content); 
				echo($content);
			}
		}
	}
}

add_action('restrict_manage_posts', 'aptf_manage_posts_by_tag');

function admin_post_tag_filter_load_plugin_textdomain() {
	load_plugin_textdomain( 'admin-post-tag-filter', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'admin_post_tag_filter_load_plugin_textdomain' );