<?php

add_role(
	'creator',
	esc_html__( 'Creator', 'awetube' ),
	array(
		'read'         => true,
		'edit_posts'   => true,
		'delete_posts' => false,
	)
);

function awetube_creator_role_caps() {
	// Gets the simple_role role object.
	$role = get_role( 'creator' );

	// Add a new capability.
	$role->add_cap( 'upload_files' );
}

// Add simple_role capabilities, priority must be after the initial role definition.
add_action( 'init', 'awetube_creator_role_caps', 11 );

add_action( 'wp_dropdown_users_args', 'awetube_filter_authors' );
function awetube_filter_authors( $args ) {
	if ( isset( $args['who'])) {
		$args['role__in'] = ['author', 'editor', 'administrator', 'creator'];
		unset( $args['who']);
	}
	return $args;
}

add_filter( 'template_include', 'awetube_redirect_to_template', 99 );

/** Template Redirect */
function awetube_redirect_to_template( $new_template ) {

	$user    = wp_get_current_user();
	$user_id = get_current_user_id();

	$user_active = get_user_meta( $user_id, 'user_active', true );

	// author redirects.
	//if ( in_array( 'author', (array) $user->roles ) ) {
		add_filter( 'show_admin_bar', '__return_false' );
		remove_action( 'wp_head', '_admin_bar_bump_cb' );

		global $wp;
		$wp->is_404 = false;
		status_header( '200' );
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'modules/extensions/awetube-link-redirects.php';
	//}
	return $new_template;
}

function awetube_modify_page_title( $title_parts ) {
	$user = wp_get_current_user();

	global $wp;
	$wp->is_404 = false;
	status_header( '200' );
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'modules/extensions/awetube-rename.php';

	return $title_parts;
}
add_filter( 'document_title_parts', 'awetube_modify_page_title' );
