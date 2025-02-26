<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( 'on' == nncd_get_option( 'nncd_enable_count_down' ) ) {
	add_action( 'wp_head', 'nncd_count_down_display', 12 );
}

/**
 * undocumented function
 *
 * @return void
 * @author
 **/
function nncd_count_down_display() {
	load_template( NN_COUNT_DOWN_DIR . 'templates/nncd-count-down-display.php' );
}

/**
 * Create Widget
 *
 * @return void
 * @author
 **/
add_action( 'widgets_init', 'nncd_register_widget_image' );

function nncd_register_widget_image(){
	register_widget('countdown99plugin' );
}

/**
 * If Visual Composer Active
 *
 * @return void
 * @author
 **/
if ( function_exists( 'vc_map' ) ) {
	add_action( 'vc_before_init', 'nncd_integrateWithVC' );
}

add_action( 'plugins_loaded', array( 'NN_Count_Down', 'get_instance' ) );