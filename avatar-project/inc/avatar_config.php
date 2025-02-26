<?php


function avproject_initialize_config() {

	$avproject_config = array(


		'catfaces' => array(
			'title'          => esc_html__( 'Catfaces (Illustrations)', 'avatar-project' ),
			'slug'           => 'catfaces',
			'avatars'        => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ),
			'file_extension' => 'jpg',
		),

		'blobbers' => array(
			'title'          => esc_html__( 'Blobbers (Illustrations)', 'avatar-project' ),
			'slug'           => 'blobbers',
			'avatars'        => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ),
			'file_extension' => 'jpg',
		),

		'caffeine' => array(
			'title'          => esc_html__( 'Caffeine (Illustrations)', 'avatar-project' ),
			'slug'           => 'caffeine',
			'avatars'        => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ),
			'file_extension' => 'jpg',
		),

		'random' => array(
			'title'          => esc_html__( 'Random People (Pictures)', 'avatar-project' ),
			'slug'           => 'random',
			'avatars'        => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29 ),
			'file_extension' => 'jpg',
		),


		'photographers' => array(
			'title'          => esc_html__( 'Photographers (Pictures)', 'avatar-project' ),
			'slug'           => 'photographers',
			'avatars'        => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ),
			'file_extension' => 'jpg',
		),

		'artsy' => array(
			'title'          => esc_html__( 'Artsy (Pictures)', 'avatar-project' ),
			'slug'           => 'artsy',
			'avatars'        => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14 ),
			'file_extension' => 'jpg',
		),


	);


	define( 'AVPROJECT_CONFIG', apply_filters( 'avatar_project_config', $avproject_config ) );
	define( 'AVPROJECT_SLUGS', array_keys( $avproject_config ) );

}