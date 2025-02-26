<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function load_SMUZSFTW() {


	load_SMUZSFTW_classes();

}

function load_SMUZSFTW_classes() {


	SMUZSFTW_admin( 'ui/ui.php' );

	SMUZSFTW_public( 'classes/class-SMUZSF-public.php' );

	$feed_public = new SMUZSFTW_Public();

	$feed_public->init();
	
	do_action( 'SMUZSFTW_classes_loaded'  );
	
}

function SMUZSFTW_SMUZSFTW_loaded() {

	do_action( 'SMUZSFTW_loaded' );

}

function SMUZSFTW_admin( $file_name, $require = true ) {

	if ( $require )
		require SMUZSFTW_PLUGIN_ADMIN_DIRECTORY . $file_name;
	else
		include SMUZSFTW_PLUGIN_ADMIN_DIRECTORY . $file_name;

}

function SMUZSFTW_public( $file_name, $require = true ) {

	if ( $require )
		require SMUZSFTW_PLUGIN_PUBLIC_DIRECTORY . $file_name;
	else
		include SMUZSFTW_PLUGIN_PUBLIC_DIRECTORY . $file_name;

}

function SMUZSFTW_include_admin( $file_name, $require = true ) {

	if ( $require )
		require SMUZSFTW_PLUGIN_INCLUDE_ADMIN_DIRECTORY . $file_name;
	else
		include SMUZSFTW_PLUGIN_INCLUDE_ADMIN_DIRECTORY . $file_name;

}

function SMUZSFTW_view_admin_path( $view_name, $is_php = true ) {

	$directory = SMUZSFTW_PLUGIN_ADMIN_DIRECTORY . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;

	if ( strpos( $view_name, '.php' ) === FALSE && $is_php )
		return  $directory . $view_name . '.php';

	return $directory . $view_name;

}

function SMUZSFTW_view_public_path( $view_name, $is_php = true ) {

	$directory = SMUZSFTW_PLUGIN_PUBLIC_DIRECTORY;

	if ( strpos( $view_name, '.php' ) === FALSE && $is_php )
		return  $directory . $view_name . '.php';

	return $directory . $view_name;

}

function SMUZSFTW_public_image_url( $image_name ) {

	return plugins_url( 'publics/images/' . $image_name, SMUZSFTW_MAIN_FILE );

}

function SMUZSFTW_image_admin_url( $image_name ) {

	return plugins_url( 'admin/images/' . $image_name, SMUZSFTW_MAIN_FILE );

}

function SMUZSFTW_get_option( $feed_id, $option_name, $single = true ) {

	return get_post_meta( $feed_id, $option_name, $single );

}