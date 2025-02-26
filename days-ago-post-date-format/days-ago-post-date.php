<?php
/*
Plugin Name: Days Ago Post Date Format
Plugin URI: http://phpboys.in
Description: Human Redable Post Date Format Like 2 mins ago, 2 months age,  1 year ago
Version: 1.0
Author: Praveen
Author URI: http://phpboys.in
*/

//override date display for possible hooks

add_filter( 'get_the_date', 'dadf__convert_to_time_ago' , 10, 1 ); 
add_filter( 'the_date', 'dadf__convert_to_time_ago' , 10, 1 ); 
add_filter( 'get_the_time', 'dadf__convert_to_time_ago' , 10, 1 ); 
add_filter( 'the_time', 'dadf__convert_to_time_ago' , 10, 1 );
 
/* Callback function for post time and date filter hooks */
function dadf__convert_to_time_ago( $post_time ) {
	global $post;
	$post_time = strtotime( $post->post_date ); 
	return human_time_diff( $post_time, current_time( 'timestamp' ) ).' '.__( 'ago' );
}

