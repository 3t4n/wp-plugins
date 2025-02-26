<?php
/**
	 * Plugin Name: AutoListicle: Automatically Update Numbered List Articles
	 * Plugin URI: https://smartwp.com/autolisticle
	 * Description: Automatically keep your numbered lists in articles displaying the correct number by using this shortcode [auto-list-number].
	 * Version: 1.2.4
	 * Text Domain: autolisticle
	 * Author: Andy Feliciotti
	 * Author URI: https://smartwp.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//Reset the list numbers function
function auto_list_number_reset() {
	global $auto_list_numbers;
	if( isset($auto_list_numbers) && is_array($auto_list_numbers) ){
		foreach($auto_list_numbers as $loop => $num){
			$auto_list_numbers[$loop] = 0;
		}
	}
	
	return;
}

//Reset list numbers at the start of every loop
function auto_list_number_reset_count_content($content) {
	auto_list_number_reset();
	return $content;
}
add_filter( 'the_content', 'auto_list_number_reset_count_content', PHP_INT_MIN );

//Shortcode function to display numbers in articles that automatically increment
function auto_list_number_shortcode_func( $atts ) {
	global $auto_list_numbers;
	global $post;

	if(empty($auto_list_numbers)){
		$auto_list_numbers = array();
	}

	$output = '';
	$atts = shortcode_atts( array(
		'name' => 'default',
		'wrapper' => null,
		'after' => '.',
		'display' => 'increase',
	), $atts );

	// Sanitize inputs
	$atts['name'] = sanitize_text_field($atts['name']);
	$atts['wrapper'] = sanitize_key($atts['wrapper']);
	$atts['after'] = sanitize_text_field($atts['after']);
	$atts['display'] = sanitize_text_field($atts['display']);

	if($atts['display'] == 'increase'){
		if(!isset($auto_list_numbers[$atts['name']])){
			$auto_list_numbers[$atts['name']] = '1';
		}else{
			$auto_list_numbers[$atts['name']]++;
		}
	}

	if($atts['wrapper']){
		if( !empty( $auto_list_numbers[ $atts['name'] ] ) ) {
			$auto_list_numbers_display = sprintf(
				'<%1$s class="auto-list-number auto-list-number-%2$d">%2$d%3$s</%1$s>',
				esc_attr($atts['wrapper']),
				intval($auto_list_numbers[$atts['name']]),
				esc_html($atts['after'])
			);
		}
	}else{
		if( !empty( $auto_list_numbers[ $atts['name'] ] ) ) {
			$auto_list_numbers_display = intval($auto_list_numbers[$atts['name']]) . esc_html($atts['after']);
		}
	}

	if($atts['display'] == 'total'){
		if($atts['name'] == 'default'){ $atts['name'] = null; }
		$pattern = get_shortcode_regex();
		preg_match_all('/'.$pattern.'/s', $post->post_content, $matches);
		if(is_array($matches[2])){
			$i = 0;
			$total = 0;
			foreach($matches[2] as $match){
				if(strtolower($match) == 'auto-list-number' && (empty(shortcode_parse_atts($matches[3][$i])['display']) || shortcode_parse_atts($matches[3][$i])['display'] != 'total') && (empty(shortcode_parse_atts($matches[3][$i])['name']) || shortcode_parse_atts($matches[3][$i])['name'] == $atts['name'])){
					$total++;
				}
				$i++;
			}
		}
		$auto_list_numbers_display = intval($total);
	}

	$output .= $auto_list_numbers_display;

	return $output;
}
add_shortcode( 'auto-list-number', 'auto_list_number_shortcode_func' );
add_shortcode( 'AUTO-LIST-NUMBER', 'auto_list_number_shortcode_func' );

//Shortcode to reset the autolisticle loop
function auto_list_number_force_reset_shortcode_func() {
	auto_list_number_reset();
	return;
}
add_shortcode( 'auto-list-number-force-reset', 'auto_list_number_force_reset_shortcode_func' );
