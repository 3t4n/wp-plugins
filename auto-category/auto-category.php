<?php
/*
Plugin Name: Auto Category
Plugin URI: http://dev.coziplace.com/free-wordpress-plugins/auto-category
Description: When assigning a sub-category to a post, wordpress treats it as a separate category with no relation to the mother category.  This plugin automatically assign mother categories to the post when saved. 
Version: 1.0
Author: Narin Olankijanan
Author URI: http://dev.coziplace.com
License: GPLv2
*/


add_action('save_post','ac_assign_cat');

function ac_assign_cat() {

$post_id = get_the_ID();

$post_categories = wp_get_post_categories( $post_id );
$cats = array();
	
foreach($post_categories as $c){
	$cat = get_category( $c );
	$cats[] = $cat->parent;
}

wp_set_post_categories( $post_id, $cats, true );

   
}


/* EOF */