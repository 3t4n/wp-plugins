<?php
add_filter( 'rwmb_meta_boxes', 'corsi_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function corsi_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	$prefix = 'corsi_';

	$meta_boxes[] = array(
		'id' => 'corsi',
		'title' => __( 'Corsi', 'meta-box' ),
		'pages' => array( 'corsi' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => __( 'codice', 'meta-box' ),
				'id'    => "{$prefix}codice",
				'type'  => 'text',
				'std'   => __( '', 'meta-box' ),
				'clone' => false
			),
			array(
				// Field name - Will be used as label
				'name'  => __( 'data del corso', 'meta-box' ),
				'id'    => "{$prefix}datacorso",
				'type'  => 'date',
				'std'   => __( '', 'meta-box' ),
				'clone' => false
			),
			array(
				// Field name - Will be used as label
				'name'  => __( 'ora del corso', 'meta-box' ),
				'id'    => "{$prefix}oracorso",
				'type'  => 'time',
				'std'   => __( '', 'meta-box' ),
				'clone' => false
			),
			array(
				// Field name - Will be used as label
				'name'  => __( 'luogo del corso', 'meta-box' ),
				'id'    => "{$prefix}luogo",
				'type'  => 'text',
				'std'   => __( '', 'meta-box' ),
				'clone' => false
			),
			array(
				// Field name - Will be used as label
				'name'  => __( 'indirizzo del corso', 'meta-box' ),
				'id'    => "{$prefix}indirizzo",
				'type'  => 'text',
				'std'   => __( '', 'meta-box' ),
				'clone' => false
			),
			/*
			array(
				// Field name - Will be used as label
				'name'  => __( 'docenti del corso', 'meta-box' ),
				'id'    => "{$prefix}docenti",
				'type'  => 'text',
				'std'   => __( '', 'meta-box' ),
				'clone' => false
			),
			array(
				// Field name - Will be used as label
				'name'  => __( 'numero partecipanti del corso', 'meta-box' ),
				'id'    => "{$prefix}numeropartecipanti",
				'type'  => 'number',
				'std'   => __( '', 'meta-box' ),
				'clone' => false
			),
			array(
				'type' => 'heading',
				'name' => __( 'Gallery', 'meta-box' ),
				'desc' => __( 'Selezione multipla della galleria delle foto del prodotto', '{$prefix}' ),
				'id'   => 'galleryheading', // Not used but needed for plugin
			),
			array(
				'name'             => __( 'Galleria immagini', 'meta-box' ),
				'id'               => "{$prefix}galleria",
				'type'             => 'image_advanced',
			),
			array(
				'type' => 'heading',
				'name' => __( 'Allegati (solo PDF)', 'meta-box' ),
				'desc' => __( 'Allegati quali schede tecniche, manuali, certificazioni', '{$prefix}' ),
				'id'   => 'allegatiheading', // Not used but needed for plugin
			),
			array(
				'name'             => __( 'File PDF da allegare', 'meta-box' ),
				'id'               => "{$prefix}allegati",
				'type'             => 'file_advanced',
				'max_file_uploads' => 5,
			),
			array(
				'type' => 'heading',
				'name' => __( 'Video', 'meta-box' ),
				'desc' => __( 'Seleziona il video dopo averlo caricato su YouTube', '{$prefix}' ),
				'id'   => 'videoheading', // Not used but needed for plugin
			),
			array(
				'name'  => __( 'Video YouTube', 'meta-box' ),
				'id'    => "{$prefix}video",
				'type'  => 'oembed',
			),*/
		)
	);
	return $meta_boxes;
}