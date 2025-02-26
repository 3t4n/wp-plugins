<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Metabox of the PAGE and POST both.
// Set a unique slug-like ID
//
$wpgp_prefix_meta_opts = '_prefix_meta_options';

//
// Create a metabox
//
WPGP::createMetabox(
	$wpgp_prefix_meta_opts,
	array(
		'title'     => 'Shortcode',
		'post_type' => 'gpac_code',
		'context'   => 'side',
	)
);

//
// Create a section.
//
if ( isset( $_GET['post'] ) ) {

	WPGP::createSection(
		$wpgp_prefix_meta_opts,
		array(
			'fields' => array(

				array(
					'type'  => 'shortcode',
					'class' => 'wpgp--shortcode-field',
				),
			),
		)
	);
} else {

	WPGP::createSection(
		$wpgp_prefix_meta_opts,
		array(
			'fields' => array(

				array(
					'type'    => 'content',
					'content' => 'Shortcode will appear here after publish the slider.',
				),

			),
		)
	);
}
