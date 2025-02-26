<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function load_smuzisf() {


	load_smuzisf_classes();

}

function load_smuzisf_classes() {


	smuzisf_admin( 'ui/ui.php' );

	smuzisf_public( 'classes/class-smuzsf-public.php' );

	$feed_public = new Smuzisf_Public();

	$feed_public->init();
	
	do_action( 'smuzisf_classes_loaded'  );
	
}

function smuzisf_smuzisf_loaded() {

	do_action( 'smuzisf_loaded' );

}

function smuzisf_admin( $file_name, $require = true ) {

	if ( $require )
		require SMUZISF_PLUGIN_ADMIN_DIRECTORY . $file_name;
	else
		include SMUZISF_PLUGIN_ADMIN_DIRECTORY . $file_name;

}

function smuzisf_public( $file_name, $require = true ) {

	if ( $require )
		require SMUZISF_PLUGIN_PUBLIC_DIRECTORY . $file_name;
	else
		include SMUZISF_PLUGIN_PUBLIC_DIRECTORY . $file_name;

}

function smuzisf_include_admin( $file_name, $require = true ) {

	if ( $require )
		require SMUZISF_PLUGIN_INCLUDE_ADMIN_DIRECTORY . $file_name;
	else
		include SMUZISF_PLUGIN_INCLUDE_ADMIN_DIRECTORY . $file_name;

}

function smuzisf_view_admin_path( $view_name, $is_php = true ) {

	$directory = SMUZISF_PLUGIN_ADMIN_DIRECTORY . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;

	if ( strpos( $view_name, '.php' ) === FALSE && $is_php )
		return  $directory . $view_name . '.php';

	return $directory . $view_name;

}

function smuzisf_view_public_path( $view_name, $is_php = true ) {

	$directory = SMUZISF_PLUGIN_PUBLIC_DIRECTORY;

	if ( strpos( $view_name, '.php' ) === FALSE && $is_php )
		return  $directory . $view_name . '.php';

	return $directory . $view_name;

}

function smuzisf_public_image_url( $image_name ) {

	return plugins_url( 'publics/images/' . $image_name, SMUZISF_MAIN_FILE );

}

function smuzisf_image_admin_url( $image_name ) {

	return plugins_url( 'admin/images/' . $image_name, SMUZISF_MAIN_FILE );

}

function smuzisf_get_option( $feed_id, $option_name, $single = true ) {

	return get_post_meta( $feed_id, $option_name, $single );

}