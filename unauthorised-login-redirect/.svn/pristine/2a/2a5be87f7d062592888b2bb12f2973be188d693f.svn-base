<?php

if( !defined( 'ABSPATH' ) ) { exit; }

function rs_ulr_css() {
	wp_register_style( 'rs_ulr_css', RS_ULR__PLUGIN_URL.RS_ULR__BASE.'css/style.css', array(), RS_ULR__PLUGIN_VERSION, 'screen' );
	$path = rs_ulr_get_current_path();
	if( strpos( $path['path'], '='.RS_ULR__ADMIN_PAGE ) ) {
		wp_enqueue_style( 'rs_ulr_css' );
	}
}

function rs_ulr_get_current_path() {
	$protocol = explode( '//', home_url() );
	$domain = explode( '/', $protocol[1] );
	$website_root = $protocol[0].'//'.$domain[0];
	$current_path = $_SERVER['REQUEST_URI'];
	$current_path_exploded = explode( '/', $current_path );
	$current_path = array(
		'count' => count( $current_path_exploded ),
		'exploded' => $current_path_exploded,
		'full_uri' => $website_root.$current_path,
		'path' => $current_path,
		'top' => $current_path_exploded[1],
	);
	$no_query = explode( '?', $current_path['full_uri'] );
	$current_path['full_uri_no_query'] = $no_query[0];
	ksort( $current_path );
	return $current_path;
}

function rs_ulr_plugin_links( $links, $file ) {
	$plugin_file = explode( RS_ULR__PLUGIN_DIR_NAME.'/', RS_ULR__PLUGIN_FILE );
	if( ( is_array( $plugin_file ) ) && ( !empty( $plugin_file ) ) ) {
		$plugin_file = RS_ULR__PLUGIN_DIR_NAME.'/'.$plugin_file[1];
		if( $file == $plugin_file ) {
			$settings = '<a href="'.RS_ULR__PLUGIN_ADMIN_URL.'">Settings</a>';
			array_unshift( $links, $settings );
		}
	}
	return $links;
}

/*
 * Create a random string
 * @author XEWeb - http://www.xeweb.net/
 * @param $length the length of the string to create
 * @return $str the string
 */
function rs_ulr_random_string( $length = 6 ) {
	$str = '';
	$characters = array_merge( range( 'A', 'Z' ), range( '0', '9' ) );
	$max = count( $characters ) - 1;
	for( $i = 0; $i < $length; $i++ ) {
		$rand = mt_rand( 0, $max );
		$str .= $characters[$rand];
	}
	return $str;
}