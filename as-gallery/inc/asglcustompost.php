<?php


if (!function_exists('as_gallery_post')) {
	function as_gallery_post() {
		if (current_user_can( 'manage_options' ) === true) {		

			register_post_type( 'asgallery',
				array(
					'labels' => array(
							'name' => __( 'As Gallery' ),
							'singular_name' => __( 'As Gallery' ),
							'add_new' => __( 'Add New' ),
							'add_new_item' => __( 'Add New Gallery' ),
							'edit_item' => __( 'Edit Gallery' ),
							'new_item' => __( 'New Gallery' ),
							'view_item' => __( 'View Gallery' ),
							'not_found' => __( 'Sorry, we couldn\'t find the gallery you are looking for.' )
						),
					'public' => true,
					'publicly_queryable' 	=> false,
					'exclude_from_search' 	=> false,
					'menu_position' 		=> 14,
					'has_archive' 			=> false,
					'hierarchical' 			=> false,
					'query_var'				=> false,
					'capability_type' 		=> 'page',
					'supports' 				=> array( 'title' )
				)
			);
		}
	}
	add_action( 'init', 'as_gallery_post' );
}

if (!function_exists('as_new_gallery')) {
	function as_new_gallery(){
		add_meta_box(
				'as_gallery',
				'As gallery Add',
				'as_gallery_oprion',
				'asgallery',
				'advanced'
			);

		add_meta_box(
				'as_gallery_setting',
				'As gallery Settings',
				'as_gallery_setting',
				'asgallery',
				'advanced'
			);
	}
	add_action('add_meta_boxes', 'as_new_gallery');
}

if (!function_exists('as_gallery_setting')) {
	function as_gallery_setting($post){
		require_once( as_gallery_path . '/inc/as_meta_opt_output.php' );	
	}
}
if (!function_exists('as_gallery_oprion')) {
	function as_gallery_oprion($post){
//include meta functon file

require_once( as_gallery_path . '/inc/as_meta_output.php' );

	}
}

if (!function_exists('as_gallery_save')) {
	function as_gallery_save($post_id){
		if (current_user_can( 'manage_options' ) === true) {
			if (isset($_REQUEST['as_gl_nonce']) === true) {
				if (wp_verify_nonce( $_REQUEST['as_gl_nonce'], 'as_gl_my_nonce')) {
					if (check_admin_referer( 'as_gl_my_nonce', 'as_gl_nonce' )) {						
						if (isset($_POST['as_gl_image'])){
							$as_gl_image = $_POST['as_gl_image'];

								if (is_array($as_gl_image) === true) {
									foreach ($as_gl_image as $as_gl_image) {
										if (empty($as_gl_image['image']) === false) {
											$as_gl_data[] = array(
													'image' => 	esc_url($as_gl_image['image']), 
													'title' => 	as_gl_sanitize($as_gl_image['title']), 
													'alt' 	=> 	as_gl_sanitize($as_gl_image['alt']), 
													'id' 	=> 	(intval( $as_gl_image['id'] )) ? $as_gl_image['id'] : null  
												);
										}

										
									}
								}

							update_post_meta($post_id,'as_gl_image', $as_gl_data);
						}
						
						if (empty($_POST) === false) {
							$as_gl_col_opt = trim($_POST['as_gl_col_opt']);
							$as_gl_col_opt = as_gl_sanitize($as_gl_col_opt);				
							$as_gl_col_opt = htmlentities($as_gl_col_opt);
							$as_gl_col_opt = strip_tags($as_gl_col_opt);
							update_post_meta($post_id,'as_gl_image_column', $as_gl_col_opt);
						}


						if (empty($_POST['as_gl_size']) === false) {
							$as_gl_size = trim($_POST['as_gl_size']);
							$as_gl_col_opt = as_gl_sanitize($as_gl_size);
							$as_gl_size = htmlentities($as_gl_size);
							$as_gl_size = strip_tags($as_gl_size);
							update_post_meta($post_id,'as_gl_image_size', $as_gl_size);
						}

					}
				}
			}
			
		}

	}
	add_action('save_post', 'as_gallery_save');
}

if (!function_exists('as_gl_sanitize')) {
	function as_gl_sanitize($arg){
		$arg = sanitize_text_field($arg);
		$arg = htmlentities($arg);
		$arg = strip_tags($arg);
		return $arg;
	}
}


