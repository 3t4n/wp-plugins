<?php
/*
Plugin Name: All The Ipsums
Plugin URI: 
Description: The penultimate Lorem Ipsum Shortcode Generator
Version: 1.0
Author: John Hartley
Author URI: http://www.johnbhartley.com
License: GPL2
*/

// ZOMBIE IPSUM
function ati_zombie_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '5'
	), $atts ) );

	$p = "{$p}";

	// include the array of text
	include_once('ipsums/zombie.php');

	// shuffle them zombies
	shuffle($zombarray);

	// grab $p amount of <p>
	$zombarray = array_slice($zombarray, 0, $p);
	
	// line up and output the zeds
	foreach($zombarray as $brain) {
		echo $brain;
	}
}
add_shortcode( 'zombie', 'ati_zombie_ipsum' );

// CAT IPSUM
function ati_kitty_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '5'
	), $atts ) );

	$p = "{$p}";

	// include the array of text
	include_once('ipsums/kitty.php');

	// shuffle them zombies
	shuffle($kittycats);

	// grab $p amount of <p>
	$kittycats = array_slice($kittycats, 0, $p);
	
	// line up and output the zeds
	foreach($kittycats as $meow) {
		echo $meow;
	}


}
add_shortcode( 'kitty', 'ati_kitty_ipsum' );

// BACON IPSUM
function ati_bacon_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '5',
		'type' => 'all-meat'
	), $atts ) );

	$p = "{$p}";
	$type = "{$type}";
	$bacon = 'http://baconipsum.com/api/?type='.$type.'&paras='.$p;
	
	// get the contents of the json file
	$strip = file_get_contents($bacon);
	
	// read the json as an array
	$strip = json_decode($strip, true);
		
	// line up and output the bacon
	foreach($strip as $delicious) {
		echo '<p>'.$delicious.'</p>';
	}

}
add_shortcode( 'bacon', 'ati_bacon_ipsum' );

// Pommie Ipsum
// http://www.pommyipsum.com/text.php/?selection=10
function ati_pommie_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '5',
	), $atts ) );

	$cricket = 'http://www.pommyipsum.com/text.php/?selection='.$p;
	
	// get the contents of the json file
	$bedford = file_get_contents($cricket);
	return $bedford;
}
add_shortcode( 'pommie', 'ati_pommie_ipsum' );

// Skate Ipsum
// http://skateipsum.com/get/3/1/JSON

function ati_skater_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '5',
	), $atts ) );

	$tony_hawk = 'http://skateipsum.com/get/'.$p.'/0/JSON';
	
	// get the contents of the json file
	$burnquist = file_get_contents($tony_hawk);
	
	// read the json as an array
	$big_air = json_decode($burnquist, true);
	
	$skateboard = '';

	// line up and output the bacon
	foreach($big_air as $sweet) {
		$skateboard .= '<p>'.$sweet.'</p>';
	}

	return $skateboard;

}
add_shortcode( 'skater', 'ati_skater_ipsum' );

// Metaphor Ipsum

function ati_metaphor_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '5',
		's' => '5'
	), $atts ) );

	$simile = 'http://metaphorpsum.com/paragraphs/'.$p.'/'.$s.'/?p=true';
	
	// get the contents of the json file
	$likeas = file_get_contents($simile);
	echo $likeas;
}
add_shortcode( 'metaphor', 'ati_metaphor_ipsum' );

// Batman Ipsum
function ati_batman_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '5'
	), $atts ) );

	// include the array of text
	include_once('ipsums/batman.php');

	// shuffle them zombies
	shuffle($bruce_wayne);

	// grab $p amount of <p>
	$bruce_waynes = array_slice($bruce_wayne, 0, $p);
	
	// line up and output the zeds
	foreach($bruce_waynes as $batman) {
		echo $batman;
	}


}
add_shortcode( 'batman', 'ati_batman_ipsum' );
