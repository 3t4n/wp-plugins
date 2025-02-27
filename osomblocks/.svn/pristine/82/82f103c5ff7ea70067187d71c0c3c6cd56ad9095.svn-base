<?php

namespace osom\Osom_Blocks;

add_action( 'init', __NAMESPACE__ . '\register_meta_fields' );
/**
 * Registering meta fields for block attributes that use meta storage
 */
function register_meta_fields() {
	register_meta(
		'post',
		'osom_blocks_metabox',
		array(
			'type'         => 'string',
			'single'       => true,
			'show_in_rest' => true,
		)
	);
}
