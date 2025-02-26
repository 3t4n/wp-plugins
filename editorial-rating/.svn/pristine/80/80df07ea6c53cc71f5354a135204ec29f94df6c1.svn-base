<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Metabox of the POST
// Set a unique slug-like ID
//
$wpas_prefix_erbp_opts = '_wpas_er_byproduct_options';

/**
 * Get Selected Post Types.
 */
$wpas_admin_options       = get_option( '_wpas_global_options' );

//
// Create a metabox
//
WPAS::createMetabox(
	$wpas_prefix_erbp_opts,
	array(
		'title'        => __( '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/icon-128x128.gif" style="max-width: 40px;filter: drop-shadow(1px 1px 1px black);outline: 2px solid #fff;border-radius: 5px;"><span>Editorial Rating Options</span>', 'wpas_editorial_rating' ),
		'post_type'    => 'post',
		'show_restore' => false,
		'context'      => 'side',
		'class'        => ( 'PRESTIGE' === WPASER_COPY ) ? 'wpgper--metabox-erbp-wrap wpas-copy-pro' : 'wpgper--metabox-erbp-wrap wpas-copy-lite',
	)
);

//
// Section : ER Schema & Comment.
//
WPAS::createSection(
	$wpas_prefix_erbp_opts,
	array(
		'fields' => array(

			array(
				'id'          => 'wpas-cpt-review-selected-for',
				'type'        => 'select',
				'title'       => 'Select a review for schema & user review comment data :',
				'after'       => '<a href="' . esc_url( get_admin_url() . 'post-new.php?post_type=wpas_review' ) . '" target="_blank">+ Add New Review</a>',
				'placeholder' => 'Select a review',
				'chosen'      => true,
				'ajax'        => true,
				'options'     => 'posts',
				'query_args'  => array(
					'post_type' => 'wpas_review',
				),
				'class'       => 'wpas--db-tar',
			),
			array(
				'type'       => 'content',
				'content'    => '<div style="padding: 10px;text-align: center;font-size: 14px;background: antiquewhite;border: 4px solid #ffd8a5;border-radius: 3px;">⭐ If you don\'t select a review by its title here, the Schema will not get the rating values. As a result, the Schema will not work. Additionally, the user review comment options will not work if they are activated.</div>',
				'dependency' => array( 'wpas-cpt-review-selected-for', '==', '' ),
			),
			array(
				'id'         => 'wpas-cpt-schema-shows',
				'type'       => 'switcher',
				'title'      => __( 'Show/Hide Schema', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Show or hide schema for this post.', 'wpas_editorial_rating' ),
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => false,
				'dependency' => array( 'wpas-cpt-review-selected-for', '!=', '' ),
			),
			array(
				'id'         => 'wpas-cpt-schema-auth-name',
				'type'       => 'text',
				'title'      => 'Schema Author Name',
				'subtitle'   => 'Leave this blank, to get author name from post author in Schema data.',
				'dependency' => array( 'wpas-cpt-review-selected-for|wpas-cpt-schema-shows', '!=|==', '|true' ),
			),
			array(
				'id'         => 'wpas-cpt-review-comment-allowed',
				'type'       => 'switcher',
				'title'      => __( 'Allowed review in user comment. ', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Allowed/Disallowed review in user comment section on this post.', 'wpas_editorial_rating' ),
				'text_on'    => 'Allowed',
				'text_off'   => 'Disallowed',
				'text_width' => 110,
				'default'    => false,
				'class'      => 'wpas-field-switcher-pro',
				'dependency' => array( 'wpas-cpt-review-selected-for', '!=', '' ),
			),
		),
	)
);