<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	if ( ! function_exists( 'itt_testimonial_register_custom_post' ) ) {
        add_action('init', 'itt_testimonial_register_custom_post');
        function itt_testimonial_register_custom_post()
        {
            $args = array(
                'description' => __('Project Name', ITT_TESTIMONIAL_TEXTDOMAIN),
                'show_ui' => true,
                'show_in_menu' => true,
                'show_in_nav_menus' => true,
                'exclude_from_search' => true,
                'menu_icon' => 'dashicons-admin-users',
                'labels' => array(
                    'name' => __('Testimonials', ITT_TESTIMONIAL_TEXTDOMAIN),
                    'singular_name' => __('Testimonial', ITT_TESTIMONIAL_TEXTDOMAIN),
                    'all_items' => __('All Testimonials', ITT_TESTIMONIAL_TEXTDOMAIN),
                    'add_new' => __('Add Testimonial', ITT_TESTIMONIAL_TEXTDOMAIN),
                    'add_new_item' => __('Add Testimonial', ITT_TESTIMONIAL_TEXTDOMAIN),
                    'edit' => __('Edit Testimonial', ITT_TESTIMONIAL_TEXTDOMAIN),
                    'editt_item' => __('Edit Testimonial', ITT_TESTIMONIAL_TEXTDOMAIN),
                    'new-item' => 'New Testimonial',
                    'view' => __('View Testimonial', ITT_TESTIMONIAL_TEXTDOMAIN),
                    'view_item' => __('View Testimonial', ITT_TESTIMONIAL_TEXTDOMAIN),
                    'search_items' => __('Search Testimonial', ITT_TESTIMONIAL_TEXTDOMAIN),
                    'not_found' => __('No Testimonial Found', ITT_TESTIMONIAL_TEXTDOMAIN),
                    'not_found_in_trash' => __('No Testimonial Found in Trash', ITT_TESTIMONIAL_TEXTDOMAIN),
                    'parent' => __('Parent Testimonial', ITT_TESTIMONIAL_TEXTDOMAIN)
                ),
                'public' => true,
                'publicly_queriable' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'rewrite' => false,
                'supports' => array('title', 'thumbnail', 'page-attributes'),
                'has_archive' => false,
            );

            register_post_type(ITT_Testimonial_Post, $args);
        }
    }
    if ( ! function_exists( 'itt_create_testimonial_taxonomy' ) )
    {
		add_action( 'init', 'itt_create_testimonial_taxonomy' );
		function itt_create_testimonial_taxonomy() {
			$labels = array(
			  'name'                       => __('Category', ITT_TESTIMONIAL_TEXTDOMAIN ),
			  'singular_name'              => __('Category', ITT_TESTIMONIAL_TEXTDOMAIN ),
			  'search_items'               => __( 'Search Categories', ITT_TESTIMONIAL_TEXTDOMAIN ),
			  'popular_items'              => __( 'Popular Categories' , ITT_TESTIMONIAL_TEXTDOMAIN),
			  'all_items'                  => __( 'All Categories' , ITT_TESTIMONIAL_TEXTDOMAIN),
			  'parent_item'                => null,
			  'parent_item_colon'          => null,
			  'editt_item'                  => __( 'Edit Category' , ITT_TESTIMONIAL_TEXTDOMAIN),
			  'update_item'                => __( 'Update Category' , ITT_TESTIMONIAL_TEXTDOMAIN),
			  'add_new_item'               => __( 'Add New Category' , ITT_TESTIMONIAL_TEXTDOMAIN),
			  'new_item_name'              => __( 'New Category Name' , ITT_TESTIMONIAL_TEXTDOMAIN),
			  'separate_items_with_commas' => __( 'Separate Categories with commas' , ITT_TESTIMONIAL_TEXTDOMAIN),
			  'add_or_remove_items'        => __( 'Add or remove Categories' , ITT_TESTIMONIAL_TEXTDOMAIN),
			  'choose_from_most_used'      => __( 'Choose from the most used Categories' , ITT_TESTIMONIAL_TEXTDOMAIN),
			  'not_found'                  => __( 'No Categories found.' , ITT_TESTIMONIAL_TEXTDOMAIN),
			  'menu_name'                  => __( 'Categories' , ITT_TESTIMONIAL_TEXTDOMAIN),
			 );
		
			 $args = array(
			 	'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array('slug' => 'category' )
			 );
		//unregister_taxonomy_for_object_type(ITT_Testimonial_Post_Taxonomy, ITT_Testimonial_Post );
			register_taxonomy( ITT_Testimonial_Post_Taxonomy, ITT_Testimonial_Post , $args );
		}
		
	}

    // add thumbnail and order columns in custom post edit page
    add_filter( 'manage_posts_columns', 'itt_testimonial_columns_head' );
    add_action( 'manage_posts_custom_column', 'itt_testimonial_columns_content', 10, 2 );
    function itt_testimonial_columns_head($defaults)
    {
        global $post;
        if ($post && $post->post_type == ITT_Testimonial_Post ) {
            $new = array();
            if(!isset($_GET['order']) || $_GET['order']=='desc' )
                $order = 'asc';
            else if( $_GET['order']=='asc' )
                $order = 'desc';

            foreach($defaults as $key => $title) {
                if($key == 'title')
                    $new['featured_image'] = __("Image" ,ITT_TESTIMONIAL_TEXTDOMAIN);
                if ($key=='date') // Put the Thumbnail column before the Author column
                    $new[ITT_TESTIMONIAL_FIELDS_PERFIX.'order'] = '<a href="edit.php?post_type='.ITT_Testimonial_Post.'&orderby=menu_order&order='.$order.'">'.__("Order" ,ITT_TESTIMONIAL_TEXTDOMAIN).'</a>';
                $new[$key] = $title;
            }
            return $new;
        }
        return $defaults;
    }

    // SHOW THE FEATURED IMAGE in admin

    function itt_testimonial_columns_content($column_name, $post_ID)
    {
        global $post;
        if ($post->post_type == ITT_Testimonial_Post) {

            if ($column_name == ITT_TESTIMONIAL_FIELDS_PERFIX . 'order') {
                echo $post->menu_order; //note that it won't update the value in the database
            }


            if ($column_name == 'featured_image') {

                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post_ID), 'thumbnail');

                if ($image != false) {
                    echo get_the_post_thumbnail(
                        $post_ID, array(
                        80,
                        80
                    ));
                }
            }
        }
    }
if(!function_exists('remove_quick_testi_edit')) {
    function remove_quick_testi_edit($actions)
    {
        global $post;
        if ($post->post_type == ITT_Testimonial_Post) {
            unset($actions['inline hide-if-no-js']);
        }
        return $actions;
    }

    if (is_admin()) {
        add_filter('post_row_actions', 'remove_quick_testi_edit', 10, 2);
    }
}
?>