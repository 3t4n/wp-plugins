<?php
namespace NKS_Search\Assets;

/**
 * Namespace bootstrap
 *
 * @return void
 */
function bootstrap() {
	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\nk_search_assets' );
}

/**
 * nk_search_assets
 *
 * @return void
 */
function nk_search_assets() {
	$local_globals = array(
		'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
		'ajaxAction' => 'nks_search',
		'nOnce'      => wp_create_nonce( 'nks' )
	);
	wp_enqueue_style( 'nks-css', NKS_ASSETS . '/css/nk-search.css', array(), '1.0.0' );
	wp_enqueue_script( 'nks-js', NKS_ASSETS . '/js/nk-search.js', array( 'jquery' ), '1.0.0', true );
	wp_localize_script( 'nks-js', 'nks', $local_globals );
}
