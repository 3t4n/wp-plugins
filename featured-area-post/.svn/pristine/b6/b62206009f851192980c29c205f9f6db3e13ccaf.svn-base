<?php 
/*
Plugin Name: Feaured area post plugin
Plugin URI: http://plugins.wpexpo.com/2010/06/24/featured-area-post-plugin/
Description: This plugin will allow you to select each post to different featured area useful if you are creating a magazine website where you wil have to choose different featured post in different areas.
Author: Yalamber subba
Version: 1.0
Author URI: http://yalamber.com/
usage: query_posts($query_string."&featured_area=1");
*/
add_action('admin_menu', 'add_featured_area_custom_box');
add_action('save_post', 'featured_area_save_postdata');
function add_featured_area_custom_box() {
	add_meta_box( 'featured-area-select', 'Select Featured area', 'featured_area_template', 'post', 'normal','high' );
}

function featured_area_template()
{
	global $post;
	echo '<input type="hidden" name="featured_area_noncename" id="featured_area_noncename" value="' . 
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

  // The actual fields for data entry

  echo '<label for="featured_area_select">Select desired featured area</label> ';
  echo '<select name="featured_area_select">';
  echo '<option value="">Select feaured area</option>'; 
  	//change $total_no_area to required no of feauterd area you want
	$total_no_area = 100;
	for($i=1;$i<=$total_no_area;$i++)
	{
		if(get_post_meta($post->ID, 'featured_area', true) == $i){
			$selected = ' selected="selected"';
		}
		else $selected = '';
		echo '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';	
	}
  echo '</select>';
}

function featured_area_save_postdata( $post_id ) {

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times

  if ( !wp_verify_nonce( $_POST['featured_area_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }

  // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want
  // to do anything
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;

  
  // Check permissions
  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  }

  // OK, we're authenticated: we need to find and save the data

  $mydata = $_POST['featured_area_select'];

  // Do something with $mydata 
  // probably using add_post_meta(), update_post_meta(), or 
  // a custom table (see Further Reading section below)
  if(is_numeric($mydata) and $mydata>0)
  {
	  update_post_meta($post_id, 'featured_area', $mydata);
  }
  else {
	  delete_post_meta($id, 'featured_area');
  }
  return $mydata;
}

///query_posts
function featured_area_fields($content) {
	return $content;
}

function featured_area_meta_join($content) {
	global $wpdb;
	$content .= " LEFT JOIN $wpdb->postmeta AS t1 ON (t1.post_id = $wpdb->posts.ID)";
	return $content;
}

function featured_area_where($content) {
	global $wp_query;
	$content .= " AND t1.meta_key = 'featured_area' AND t1.meta_value = '".$wp_query->query_vars['featured_area']."'";
	return $content;
}

function featured_area_orderby($content) {
	return $content;
}
add_filter('query_vars', 'featured_area_variables');
function featured_area_variables($public_query_vars) {
	$public_query_vars[] = 'featured_area';
	return $public_query_vars;
}
add_action('pre_get_posts', 'featured_area_sorting');
function featured_area_sorting($local_wp_query) 
{
	if(is_numeric($local_wp_query->get('featured_area')) and $local_wp_query->get('featured_area')>0) 
	{
		add_filter('posts_fields', 'featured_area_fields');
		add_filter('posts_join', 'featured_area_meta_join');
		add_filter('posts_where', 'featured_area_where');
		add_filter('posts_orderby', 'featured_area_orderby');
	}else{
		remove_filter('posts_fields', 'featured_area_fields');
		remove_filter('posts_join', 'featured_area_meta_join');
		remove_filter('posts_where', 'featured_area_where');
		remove_filter('posts_orderby', 'featured_area_orderby');	
	}
}
