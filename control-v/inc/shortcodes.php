<?php
/* ==========================================================================
   Shortcodes
   ========================================================================== */
 
/**
 * Latest Posts
 */
add_shortcode( 'lirtemp_latest_posts', 'lirtemp_latest_posts' );

function ctrlv_latest_posts( $atts ) {

	$a = shortcode_atts( array(
        'numberposts' => 3,
        'post_type' => 'post',
		'offset' =>	0
    ), $atts );

	$args = array(
		'numberposts' => $a['numberposts'],
		'offset' => $a['offset'],
		'category' => 0,
		'orderby' => 'post_date',
		'order' => 'DESC',
		'include' => '',
		'exclude' => '',
		'meta_key' => '',
		'meta_value' => '',
		'post_type' => $a['post_type'],
		'post_status' => 'publish',
		'suppress_filters' => true );

    $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
	$return = '<div class="container">';
	
	foreach( $recent_posts as $recent ){
		$return .= '<div class="col-md-4"><h2>'.$recent['post_title'].'</h2><p>'. $recent['post_content'] . '</p></div>';
	}
	$return .= '</div>';
	
	return $return;
}


