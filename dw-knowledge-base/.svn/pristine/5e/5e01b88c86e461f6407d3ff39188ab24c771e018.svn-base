<?php
if ( file_exists(  DWKB_DIR . '/inc/cmb2/init.php' ) ) {
	require_once  DWKB_DIR . '/inc/cmb2/init.php';
} elseif ( file_exists(  DWKB_DIR . '/inc/cmb2/init.php' ) ) {
	require_once  DWKB_DIR . '/inc/cmb2/init.php';
}
add_action( 'cmb2_admin_init', 'dwkb_register_plugin_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page
 */
function dwkb_register_plugin_options_metabox() {
	// Start with an underscore to hide fields from custom fields list
	$option_key = 'dwkb_options';
	/**
	 * Metabox for an options page. Will not be added automatically, but needs to be called with
	 * the `cmb2_metabox_form` helper function. See wiki for more info.
	 */
	$cmb_options = new_cmb2_box( array(
		'id'      => 'dwkb_options',
		'title'   => __( 'Plugin Option', 'cmb2' ),
		'hookup'  => false, // Do not need the normal user/post hookup
		'show_on' => array(
			// These are important, don't remove
			'key'   => 'options-page',
			'value' => array( $option_key )
			),
		) );
	/**
	 * Options fields ids only need
	 * to be unique within this option group.
	 * Prefix is not needed.
	 */

	$cmb_options->add_field( array(
			'name'    => __( 'Select Index Page', 'cmb2' ),
			'id'      =>  'index_page',
			'type'    => 'select',
			'options_cb' => 'cmb2_get_your_post_type_post_options',
	) );

	$cmb_options->add_field( array(
		'name'    => __( 'Knowledgebase Menu Name', 'cmb2' ),
		'id'      => 'menu_name',
		'type'    => 'text',
		'default' => 'Knowledge Base',
		) );

	$cmb_options->add_field( array(
		'name'    => __( 'Knowledgebase Slug', 'cmb2' ),
		'id'      => 'slug',
		'desc'      => 'You must update the permalink after changed this field',
		'type'    => 'text',
		'default' => 'knowledgebase',
		) );

	$cmb_options->add_field( array(
		'name'             => __( 'Knowledgebase Comment', 'cmb2' ),
		'id'               => 'comment',
		'type'             => 'radio_inline',
		'default' => 'on',
		'options'          => array(
			'on' => __( 'On', 'cmb2' ),
			'off'   => __( 'Off', 'cmb2' ),
			),
		) );

	$cmb_options->add_field( array(
		'name'             => __( 'Knowledgebase Breadcrumbs', 'cmb2' ),
		'id'               => 'breadcrumbs',
		'type'             => 'radio_inline',
		'default' => 'on',
		'options'          => array(
			'on' => __( 'On', 'cmb2' ),
			'off'   => __( 'Off', 'cmb2' ),
			),
		) );

	$cmb_options->add_field( array(
		'name'             => __( 'Knowledgebase Search', 'cmb2' ),
		'id'               => 'search',
		'type'             => 'radio_inline',
		'default' => 'on',
		'options'          => array(
			'on' => __( 'On', 'cmb2' ),
			'off'   => __( 'Off', 'cmb2' ),
			),
		) );

}

function cmb2_get_post_options( $query_args ) {

		$args = wp_parse_args( $query_args, array(
				'post_type'   => 'page',
				'numberposts' => 10,
		) );

		$posts = get_posts( $args );

		$post_options = array();
		if ( $posts ) {
				foreach ( $posts as $post ) {
					$post_options[ $post->ID ] = $post->post_title;
				}
		}

		return $post_options;
}

/**
 * Gets 5 posts for your_post_type and displays them as options
 * @return array An array of options that matches the CMB2 options array
 */
function cmb2_get_your_post_type_post_options() {
		return cmb2_get_post_options( array( 'post_type' => 'page', 'numberposts' => '' ) );
}


/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb2_dwkb_taxonomy_metaboxes( array $meta_boxes ) {

	/**
	 * Sample metabox to demonstrate each field type included
	 */


	return $meta_boxes;
}
