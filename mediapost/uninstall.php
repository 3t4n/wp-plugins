<?php
defined( 'ABSPATH' ) or exit;

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}
	
delete_option( MPWP_VERSION_SLUG );
delete_option( MPWP_FIELDS_SLUG );
delete_option( MPWP_FORMS_SLUG );
delete_option( MPWP_LISTS_SLUG );
delete_option( MPWP_SETTINGS_SLUG );

$forms = get_posts(
	array(
		'posts_per_page' => '1000',
		'post_type' 	 => MPWP_POST_TYPE,
		'post_status' 	 => array(
			'publish',
			'pending',
			'draft',
			'auto-draft',
			'future',
			'private',
			'inherit',
			'trash'
		)
	)
);

foreach ( $forms as &$form ){
	wp_delete_post( $form->ID, true );
}
?>