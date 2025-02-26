<?php
/**
 * Custom Post Type.
 * 
 * Register the Custom Post Type.
 */
add_action( 'init', 'ctrlv_create_post_type' );

function ctrlv_create_post_type() {
	register_post_type( 'ctrlv_templates',
		array(
			'labels' => array(
				'name' 			=> __( 'Templates', 'ctrlv' ),
				'menu_name'		=> __( 'Templates', 'ctrlv' ),
				'singular_name' => __( 'Template', 'ctrlv' ),
				'add_new' 		=> __( 'Add Template', 'ctrlv' ),
				'edit_item'		=> __( 'Edit Template', 'ctrlv' ),
				'add_new_item'       => __( 'Add New Template', 'ctrlv' ),
				'new_item'           => __( 'New Template', 'ctrlv' ),
				'view_item'          => __( 'View Template', 'ctrlv' ),
				'search_items'       => __( 'Search Templates', 'ctrlv' ),
				'not_found'          => __( 'No Templates found', 'ctrlv' ),
				'not_found_in_trash' => __( 'No Templates found in Trash', 'ctrlv' )
			),
		'public' 				=> false,
		'show_ui' 				=> true,
		'has_archive' 			=> false,
		'show_in_nav_menus' 	=> false,
		'publicly_queryable' 	=> true,
		'show_in_nav_menus' 	=> false,
		'menu_icon'				=> plugins_url() . '/control-v/imgs/custom-post-icon.png',
		'rewrite' 				=> false,
		'capabilities' => array(
			'publish_posts' 		=> 'manage_options',
			'edit_posts' 			=> 'manage_options',
			'edit_others_posts' 	=> 'manage_options',
			'delete_posts' 			=> 'manage_options',
			'delete_others_posts' 	=> 'manage_options',
			'read_private_posts' 	=> 'manage_options',
			'edit_post' 			=> 'manage_options',
			'delete_post' 			=> 'manage_options',
			'read_post' 			=> 'manage_options',
		),
		'supports' 				=> array( 'thumbnail', 'title', 'editor' ),
		)
	);
}


/**
 * Custom Taxonomy.
 *
 * Register the Custom Taxonomy for the Templates CPT.
 */
 
add_action( 'init', 'ctrlv_cpt_tax' );

function ctrlv_cpt_tax() {

	register_taxonomy(
		'ctrlv_templates_cat',
		'ctrlv_templates',
		array(
			'label' 		=> __( 'Categories', 'ctrlv' ),
			'hierarchical'	=> true,
		)
	);
}


/**
 * Taxonomy Filter
 *
 * Filter templates by Taxonomy in WP Admin.
 */
add_action( 'restrict_manage_posts', 'ctrlv_add_taxonomy_filters' );
 
function ctrlv_add_taxonomy_filters() {
	global $typenow;
 
	$taxonomies = array('ctrlv_templates_cat');
	
	if( $typenow == 'ctrlv_templates' ){
 
		foreach ($taxonomies as $tax_slug) {
			if ( !isset($_GET[$tax_slug]) ) {
				$_GET[$tax_slug] = '';
			}
			$tax_obj = get_taxonomy($tax_slug);
			$tax_name = $tax_obj->labels->name;
			$terms = get_terms($tax_slug);
			if(count($terms) > 0) {
				echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
				echo "<option value=''>Show All $tax_name</option>";
				foreach ($terms as $term) { 
					echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
				}
				echo "</select>";
			}
		}
	}
}



/**
 * Show ID
 *
 * Show ID and Shortcode for specific templates.
 */
add_filter('manage_posts_columns', 'posts_columns_id', 5);

function posts_columns_id( $defaults ){
	global $typenow;
	
	if( $typenow == 'ctrlv_templates' ){
		$defaults['wps_post_id'] = __( 'Shortcode', 'ctrlv' );
		return $defaults;
	}
	return $defaults;
}

add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);

function posts_custom_id_columns( $column_name, $id ){
	global $typenow;
	
	if( $typenow == 'ctrlv_templates' ){
			if( $column_name === 'wps_post_id' ) {
					echo '[ctrlv_template id="'.$id.'"]';
		}
	}
}


