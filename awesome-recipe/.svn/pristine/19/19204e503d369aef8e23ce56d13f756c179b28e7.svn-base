<?php

/**
* For storing rating data in DB
*
*@package AwesomeRecipePlugin
*/


function arpcpt_awesome_recipe_rating(){
	
	global $wpdb;

	$arpcpt_output = array( 'status' => 1 );
	$arpcpt_post_id = absint( $_POST['rid'] );
	$arpcpt_rating = round( $_POST['rating'], 1 );
	$arpcpt_user_IP = $_SERVER['REMOTE_ADDR'];


// Get rating data from DB
$arpcpt_rating_count = $wpdb->get_var(
	"SELECT COUNT(*) FROM `" . $wpdb->prefix . "arpcpt_awesome_recipe_ratings`
	WHERE arpcpt_recipe_id='" . $arpcpt_post_id . "' AND arpcpt_user_ip='" . $arpcpt_user_IP . "'"
);


if( $arpcpt_rating_count > 0 ){
		wp_send_json( $arpcpt_output );
	}

// Store rating data into DB
	$wpdb->insert(
		$wpdb->prefix.'arpcpt_awesome_recipe_ratings',
		array(
			'arpcpt_recipe_id' => $arpcpt_post_id,
			'arpcpt_rating' => $arpcpt_rating,
			'arpcpt_user_ip' => $arpcpt_user_IP
		),
		array( '%d', '%f', '%s' )
	);

// Displaying average rating 
$arpcpt_awesome_recipe_input_data = get_post_meta( $post_id, 'arpcpt_awesome_recipe_input_data', true );
$arpcpt_awesome_recipe_input_data['arpcpt_rating_count']++;

$arpcpt_awesome_recipe_input_data['arpcpt_rating']  =   round($wpdb->get_var(
	"SELECT AVG(`arpcpt_rating`) FROM `". $wpdb->prefix ."arpcpt_awesome_recipe_ratings`
	WHERE arpcpt_recipe_id='". $post_id ."'"
), 1 );

// update post meta
update_post_meta( $post_id, 'arpcpt_awesome_recipe_input_data', $arpcpt_awesome_recipe_input_data );

// Close AJAX
	$arpcpt_output['status'] = 2;
	wp_send_json( $arpcpt_output );

}
