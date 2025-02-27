<?php
/**
 * Plugin functions
 *
 * @package  includes
 * @version  0.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* ------------------------------------------------------------------------------- */

if ( ! function_exists('wpoai_get_meta') ) :
/**
 * Get meta value
 *
 * @param array $args = array (
 * 		@type int id - post ID
 * 		@type string key - meta key
 * 		@type mixed default - default value
 * 		@type bool single - whether to return only single result
 * 		@type string prefix - meta key prefix
 * )
 * @return mixed
 */
function wpoai_get_meta( $args = array() ) {

	$defaults = array(
		'id' => null, 
		'key' => null,
		'default' => '',
		'single' => true,
		'prefix' => wpopenai()->plugin_meta_prefix(),
		'esc' => null,
	);

	$instance = wp_parse_args( $args, $defaults );
	extract( $instance );

	if ( is_null( $id ) || is_null( $key ) )
		return;

	$value = get_post_meta( $id , $prefix . $key , $single );

	if ( isset( $value ) )
		$return = $value;
	else
		$return = $default;

	if ( !is_null( $esc ) ) {
		if ( $esc == 'attr' )
			$return = esc_attr( $return ); 
		elseif ( $esc == 'url' )
			$return = esc_url( $return ); 
	}

	return apply_filters( 'wpoai_get_meta' , $return , $instance );
}
endif;

/* ------------------------------------------------------------------------------- */

if ( ! function_exists('wpoai_who_can_access') ) :
/**
 * 'Who can access' function
 *
 * @return string
 */
function wpoai_who_can_access( $screen = null, $args = null ) {
	switch( $screen ) {
		case 'settings_page':
			return apply_filters( 'wpoai_who_can_access', 'manage_options', $screen, $args );
		case 'blocks_scripts':
		default:
			return apply_filters( 'wpoai_who_can_access', ( current_user_can( 'manage_options' ) ? true : false ), $screen, $args );
	}
}
endif;

/* ------------------------------------------------------------------------------- */

if ( ! function_exists('wpoai_ai_engines_options') ) :
/**
 * available AI engines
 *
 * @return string
 */
function wpoai_ai_engines_options() {
	return apply_filters( 'wpoai_ai_engines_options', array( 'ai21', 'openai' ) );
}
endif;

/* ------------------------------------------------------------------------------- */

if ( ! function_exists('wpoai_openai_models') ) :
/**
 * available OpenAI models
 *
 * @return string
 */
function wpoai_openai_models() {
	return apply_filters( 'wpoai_openai_models', array( 
		'text-davinci-insert-002',
		'text-davinci-insert-001',
		'text-davinci-edit-001',
		'davinci',
		'curie',
		'babbage',
		'ada',
		'davinci-instruct-beta-v3',
		'curie-instruct-beta-v2',
		'babbage-instruct-beta',
		'ada-instruct-beta',
		'text-davinci-002',
		'text-davinci-001',
		'text-curie-001',
		'text-babbage-001',
		'text-ada-001',
		// 'davinci-codex',
		// 'cushman-codex'
	) );
}
endif;

/* ------------------------------------------------------------------------------- */

if ( ! function_exists('wpoai_wizards_options') ) :
/**
 * available wizards
 *
 * @return string
 */
function wpoai_wizards_options() {
	return apply_filters( 'wpoai_wizards_options', array( 
		'instant_article',
		'rewrite_article'
	) );
}
endif;

/* ------------------------------------------------------------------------------- */

if ( ! function_exists('wpoai_unique_id') ) :
/**
 * Generate unique ID
 *
 * @return string
 */
function wpoai_unique_id( $prefix = '' ) {
	$local_time  = current_datetime();
	$current_time = $local_time->getTimestamp() + $local_time->getOffset();
	return apply_filters( 'wpoai_unique_id', $prefix . $current_time . rand( 1000, 9999 ), $prefix );
}
endif;