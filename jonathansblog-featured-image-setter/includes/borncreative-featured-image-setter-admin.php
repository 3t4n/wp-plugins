<?php

add_action('admin_menu', 'borncreative_featured_image_setter_admin_stuff');
function borncreative_featured_image_setter_admin_stuff()
{

	add_menu_page(
        'Born Creative',
        'Born Creative',
        'manage_options',
        'born-creative',
        '',
        'dashicons-admin-generic',
        2
    );
    
    // Create a sub-menu under the top-level menu
    add_submenu_page(
        'born-creative',
        'Set Featured Images',
        'Set Featured Images',
        'edit_others_posts',
        'set-featured-images',
        'borncreative_featured_image_setter_admin_view'
    );

}

function borncreative_featured_image_setter_admin_view()
{
	// include admin view
	if (file_exists(plugin_dir_path(__FILE__) . '../views/borncreative-featured-image-setter-admin-view.php')) {
		include_once plugin_dir_path(__FILE__) . '../views/borncreative-featured-image-setter-admin-view.php';
	}
}

add_action('admin_post_borncreative_featured_image_setter_form_response', 'borncreative_featured_image_setter_admin_save_stuff');
function borncreative_featured_image_setter_admin_save_stuff()
{
	$url = admin_url('admin.php?page=set-featured-images');
	if (!empty($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'borncreative-featured-image-setter-form-nonce')) {
		// sanitize the input
		$image_id = absint($_REQUEST['image_id']);
		// do the processing
		borncreative_featured_image_setter_set_all_posts_without_featured_image_set($image_id);
		// redirect the user to the appropriate page
		wp_safe_redirect($url);
		exit();
	} else {
		wp_die(
			__('Invalid nonce specified', 'borncreative-featured-image-setter'),
			__('Error', 'borncreative-featured-image-setter'),
			array(
				'response'     => 403,
				'back_link' => $url,
			)
		);
	}
}
