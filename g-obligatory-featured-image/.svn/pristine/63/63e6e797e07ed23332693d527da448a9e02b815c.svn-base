<?php
//Get all post types
function gofi_get_registred_post_types () {
	global $wp_post_types;

    return array_keys( $wp_post_types );
}

add_action( 'pre_post_update', 'gofi_obligatory_publish' );
function gofi_obligatory_publish( $post_ID ) {
	global $gofi_options;
	$gofi_checked_arrayy = array();
	//Get all post types
	$all_post_typess = gofi_get_registred_post_types();
	//See if it is checked
	foreach ( $all_post_typess as $checked_post_type ) {
		if (isset($gofi_options["$checked_post_type"])) {
			array_push( $gofi_checked_arrayy, $checked_post_type );
		}
	}
	
    $post = get_post( $post_ID );
    $request_publish_try = isset($_REQUEST['publish']);
    $request_under_status_try = isset($_REQUEST['_status']) && $_REQUEST['_status'] == 'publish';
	foreach ( $gofi_checked_arrayy as $checked_post_typee ) {
		if ( $post->post_type == $checked_post_typee && ( $request_publish_try || $request_under_status_try ) && !has_post_thumbnail($post_ID) ) {
			if ( isset( $gofi_options["php_error_msgg"] ) && !empty( $gofi_options["php_error_msgg"] ) ) {
				wp_die( $gofi_options["php_error_msgg"] );
			} else {
				wp_die( 'You cannot publish without featured image !' );
			}
		}
	}
}
?>
