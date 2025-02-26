<?php

/**
 * Plugin Name: Add File Version (AFV)
 * Plugin URI: https://wordpress.org/plugins/add-file-version-afv/
 * Description: Add file version to Wordpress CSS and JS files.
 * Author: Theydreamer Apps & Joemakev
 * Version: 1.0.6
 * Author URI: http://www.theydreamer.com
 */


//Config
include(plugin_dir_path(__FILE__) . 'config.php');

//Ajax functions
include(plugin_dir_path(__FILE__) . 'ajax-functions.php');


function afvMenu() {
	global $afv_inner_ver;


    //Check if afv_auto_ver/afv_manual_ver option has initial value
	$afv_auto_ver = get_option("afv_auto_ver");
	$afv_manual_ver = get_option("afv_manual_ver");

	if ($afv_auto_ver == "") {
        //Set initial value of afv_ver_auto
		update_option("afv_auto_ver", "enabled");
		update_option("afv_ver_target_file", "all");
		update_option("afv_manual_ver", "disabled");
		update_option("afv_manual_ver_input", "0.0.1");
	}


	//Vex modal
	wp_register_style('vex_style', plugin_dir_url(__FILE__) . 'lib/vex/vex.css');
	wp_enqueue_style('vex_style');
	wp_register_style('vex_theme_os', plugin_dir_url(__FILE__) . 'lib/vex/vex-theme-os.css');
	wp_enqueue_style('vex_theme_os');
	wp_enqueue_script('vex_combined', plugin_dir_url(__FILE__) . 'lib/vex/vex.combined.min.js');
	wp_enqueue_script('vex_combined');

    //General CSS
	wp_register_style('afv_style', plugin_dir_url(__FILE__) . 'css/style.css?' . $afv_inner_ver);
	wp_enqueue_style('afv_style');

    //Vue
	wp_enqueue_script('vue_lib', plugin_dir_url(__FILE__) . 'lib/vue/vue.min.js');
	wp_enqueue_script('vue_lib');


	//Add File Version
	add_submenu_page(
		'tools.php', //Parent menu slug
		'Add File Version', //Page Title
		'Add File Version', // Menu Title
		'manage_options', //Capability
		'afv_admin_page', //Menu slug
		'afv_admin_page' //Function
	);

}
add_action('admin_menu', 'afvMenu');


//Menu functions
include(plugin_dir_path(__FILE__) . 'menu-functions.php');


//Will be called for each included Wordpress CSS and JS files
add_filter('style_loader_src', 'afv_loader_src_filter');
add_filter('script_loader_src', 'afv_loader_src_filter');
function afv_loader_src_filter( $src ) {
	// echo "--> afv_loader_src_filter()";
	$url_parts_arr = parse_url( $src );
	/*
	//Output sample ($url_parts_arr):
	Array
	(
		[scheme] => http
		[host] => www.yon4.com
		[path] => /wp-content/themes/yon4/style.css
		[query] => ver=4.9.5
	)
	 */


	//Get other plugin options
	$afv_auto_ver = get_option("afv_auto_ver");
	$afv_manual_ver = get_option("afv_manual_ver");
	$afv_ver_target_file = get_option("afv_ver_target_file");
	$afv_manual_ver_input = get_option("afv_manual_ver_input");


	//Check if should proceed
	if($afv_auto_ver != "enabled" && $afv_manual_ver != "enabled") {
		return $src;
	}
	// echo 'afv_auto_ver: ' . $afv_auto_ver;


	//Check if CSS or JS
	$extension = pathinfo( $url_parts_arr['path'], PATHINFO_EXTENSION );
	$fileTypeArr = array('css', 'js');
	if ( ! $extension || ! in_array( $extension, $fileTypeArr ) ) {
		return $src;
	}
	// echo 'extension: ' . $extension;


	//Check file to add version
	if ($afv_ver_target_file != "all" && $extension != $afv_ver_target_file) {
		return $src;
	}


	//Check file path
	$file_path = $_SERVER['DOCUMENT_ROOT'] . parse_url($url_parts_arr['path'], PHP_URL_PATH);
	if(!is_file( $file_path)) {
		return $src;
	}


	//Create timestamp based on PHP filemtime
	//$timestamp_ver = filemtime( $file_path ) ?: filemtime( utf8_decode( $file_path ) );
	$timestamp_ver = filemtime( utf8_decode( $file_path ) );
	if ( ! $timestamp_ver ) {
		return $src;
	}

	if ( ! isset( $url_parts_arr['query'] ) ) {
		$url_parts_arr['query'] = '';
	}

	
	//Remove default versioning
	$query = array();
	parse_str( $url_parts_arr['query'], $query );
	unset( $query['v'] );
	unset( $query['ver'] );


	//Check if auto version
	if ($afv_auto_ver == "enabled") {
		$query['ver'] = "$timestamp_ver" . "_afv";
	} else if($afv_manual_ver == "enabled") {
		$query['ver'] = $afv_manual_ver_input . "_afv";
	}


	//Build query
	$url_parts_arr['query'] = build_query( $query );

	return afv_build_url( $url_parts_arr );

} //end of afv_loader_src_filter()


function afv_build_url( array $parts ) {
	return ( isset( $parts['scheme'] ) ? "{$parts['scheme']}:" : '' ) .
		   ( ( isset( $parts['user'] ) || isset( $parts['host'] ) ) ? '//' : '' ) .
		   ( isset( $parts['user'] ) ? "{$parts['user']}" : '' ) .
		   ( isset( $parts['pass'] ) ? ":{$parts['pass']}" : '' ) .
		   ( isset( $parts['user'] ) ? '@' : '' ) .
		   ( isset( $parts['host'] ) ? "{$parts['host']}" : '' ) .
		   ( isset( $parts['port'] ) ? ":{$parts['port']}" : '' ) .
		   ( isset( $parts['path'] ) ? "{$parts['path']}" : '' ) .
		   ( isset( $parts['query'] ) ? "?{$parts['query']}" : '' ) .
		   ( isset( $parts['fragment'] ) ? "#{$parts['fragment']}" : '' );
}
