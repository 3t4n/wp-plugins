<?php
/**
 * Helper functions
 *
 * @package Axle_Demo_Importer
 */

/**
 * Get settings.
 *
 * @since 1.0.0
 *
 * @param string $key Key,
 * @return mixed Value.
 */
function axle_demo_importer_get_demo_content_settings( $key ) {
	$theme_support = get_theme_support( 'axle-demo-importer' );
	if ( is_array( $theme_support ) && ! empty( $theme_support[0] ) && is_array( $theme_support[0] ) ) {
		$config = $theme_support[0];
	} else {
		$config = array();
	}

	$default = array(
		'zip_file'          => '',
		'zip_file_remote'   => '',
		'static_front_page' => true,
		'static_page'       => 'front-page',
		'posts_page'        => 'blog',
		'menu_locations'    => array(),
	);

	$options = array_merge( $default, $config );

	$value = null;

	if ( isset( $options[ $key ] ) ) {
		$value = $options[ $key ];
	}

	return $value;
}
