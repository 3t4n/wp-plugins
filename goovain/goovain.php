<?php
/*
Plugin Name: GooVain
Plugin URI: https://github.com/ADeMen/
Description: A simple Goo.gl URL + vanity shortener for WordPress .
Author: Aaron DeMent
Version: 1.5
Author URI: http://dementedsugar.com
*/
function googl_shortlink( $url, $post_id = false ) {
	global $post;
  
	$VainURl = file_get_contents('goo_pref/goo_pref.txt', true);
	$googleAPI = file_get_contents('goo_pref/goo_pref2.txt', true);

	if ( ! $post_id && $post ) $post_id = $post->ID;
	elseif ( $post_id ) $post = get_post( $post_id );

	if ( $post && $post->post_status != 'publish' )
		return "";

	$shortlink = $url;
  	$shortlink =  str_replace( 'goo.gl/', $VainURl, $shortlink );

	if ( ( is_singular() || $post ) && ! is_front_page() ) {
		$shortlink = get_post_meta( $post_id, '_googl_shortlink', true );
		if ( $shortlink )
			return $shortlink;

		$permalink = get_permalink( $post_id );
		$shortlink = googl_shorten( $permalink );

		if ( $shortlink !== $url ) {
			add_post_meta( $post_id, '_googl_shortlink', $shortlink, true );
		  $shortlink =  str_replace( 'goo.gl/', $VainURl, $shortlink );
			return $shortlink;
		}
		else {
			return $url;
		}
	} elseif ( is_front_page() ) {
		$shortlink = (string) get_option( '_googl_shortlink_home' );
	  $shortlink =  str_replace( 'goo.gl/', $VainURl, $shortlink );
		if ( $shortlink )
			return $shortlink;

		$googl_shortlink = googl_shorten( home_url( '/' ) );
		if ( $googl_shortlink !== $shortlink ) {
			update_option( '_googl_shortlink_home', $googl_shortlink );
		    	$googl_shortlink =  str_replace( 'goo.gl/', $VainURl, $googl_shortlink );
			return $googl_shortlink;
		} else {
			return home_url( '/' );
		}
	}
}
add_filter( 'get_shortlink', 'googl_shortlink', 9, 2 );

function googl_shorten( $url ) {

		$VainURl = file_get_contents('goo_pref/goo_pref.txt', true);
		$googleAPI = file_get_contents('goo_pref/goo_pref2.txt', true);

		$result = wp_remote_post( add_query_arg( 'key', apply_filters( 'googl_api_key', $googleAPI ), 'https://www.googleapis.com/urlshortener/v1/url' ), array(
			  'body' => json_encode( array( 'longUrl' => esc_url_raw( $url ) ) ),
			  'headers' => array( 'Content-Type' => 'application/json' ),
	) );

	// Return the URL if the request got an error.
	if ( is_wp_error( $result ) )
		return $url;

	  $result = json_decode( $result['body'] );
	  $shortlink = $result->id;
	  $shortlink =  str_replace( 'goo.gl/', $VainURl, $shortlink );
	  if ( $shortlink )
		  return $shortlink;
  
	  		return $url;
	}

function googl_post_columns( $columns ) {
	$columns['shortlink'] = 'Shortlink';
	return $columns;
}

add_filter( 'manage_edit-post_columns', 'googl_post_columns' );


function googl_custom_columns( $column ) {
	if ( 'shortlink' == $column ) {

	  $VainURl = file_get_contents('goo_pref/goo_pref.txt', true);
	  $googleAPI = file_get_contents('goo_pref/goo_pref2.txt', true);
	 
	  $shorturl = wp_get_shortlink(); 
	  $shorturl = str_replace( 'goo.gl/', $VainURl, $shorturl );
	  $shorturl_caption = str_replace( 'http://', '', $shorturl );
	  	printf( '<a href="%s">%s</a> ', esc_url( $shorturl ), esc_html( $shorturl_caption ) );
	}
}

add_action( 'manage_posts_custom_column', 'googl_custom_columns' );

function googl_save_post( $post_ID, $post ) {
	// Don't act on auto drafts and revisions.
	if ( 'auto-draft' == $post->post_status || 'revision' == $post->post_type )
		return;

	delete_post_meta( $post_ID, '_googl_shortlink' );
}
add_action( 'save_post', 'googl_save_post', 10, 2 );

include 'goo_settings.php';

/* jetpack use short link */
/* Grab the shortlink*/
function custshortlink( $post ) {
	global $post;

	if ( !$post )
		return;

	$post_id = $post->ID;
	return wp_get_shortlink( $post_id );
}

/* Enable the plugin only when Jetpack and Sharedaddy are enabled */
function custshortlink_enable() {
	if (
		class_exists( 'Jetpack' ) && method_exists( 'Jetpack', 'get_active_modules' ) && in_array( 'sharedaddy', Jetpack::get_active_modules() )
		) {
		add_filter( 'sharing_permalink', 'custshortlink' );
	}
}
add_action( 'plugins_loaded', 'custshortlink_enable' );
?>