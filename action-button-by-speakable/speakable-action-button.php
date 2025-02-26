<?php
/*
Plugin Name: Action Button by Speakable
Description: Use the [action_button] shortcode to embed the Action Button on any post!
Version: 1.0
Author: Speakable, PBC
Author URI: http://speakable.org
License: GPLv2 or later

*/

//main function
function speakable_action_button( $atts, $content = null ) {
	
	//checks to see if a widget id was provided in the shortcode
	$a = shortcode_atts( array(
		'id' => 'null',
	), $atts );

	$id = $a['id'];
	if ($id !== 'null') {

	//DVD: widget by ID is not currently working
	//the WP requirement to use enqueue doesn't allow us to place our JS in the DOM next to the container div
	$sp_widget_block = <<<EOD
	<!--ACTION BUTTON WIDGET--> 
	<div data-action-button-widget-id="$id"></div>	
EOD;
	} else {

	//regular embed
	$sp_widget_block = <<<'EOD'
	<!--ACTION BUTTON WIDGET--> 
	<div id="action_button_container"></div>
EOD;

	}

	//loads the embed script in the footer
	wp_enqueue_script( 'sp_widget.min.js' );

	//returns the div container where the shortcode is placed
	return $sp_widget_block;
}

//create shortcode
add_shortcode('action_button', 'speakable_action_button');

//seperate enqueue and register to keep the embed JS only on pages that include the shortcode
add_action( 'wp_enqueue_scripts', 'sp_register_ab_script' );

function sp_register_ab_script() {
	wp_register_script( 'sp_widget.min.js', 'https://embed.actionbutton.co/widget/widget.min.js', array(), null, true);
}
