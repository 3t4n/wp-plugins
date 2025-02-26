<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	if ( ! function_exists( 'itls_logo_showcase_register_custom_post' ) )
	{

		add_action('init', 'itls_logo_showcase_register_custom_post');
		function itls_logo_showcase_register_custom_post() {
			$args = array(
				'description' => __('Project Name',ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
				'show_ui' => true,
				'show_in_menu' => true,
				'show_in_nav_menus' => true,
				'exclude_from_search' => true,
				'menu_icon' => 'dashicons-schedule',
				'labels' => array(
					'name'=> __('Logos',ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
					'singular_name' => __('Logo',ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
                    'all_items' => __('All Logos',ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
					'add_new' => __('Add Logo',ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
					'add_new_item' => __('Add Logo',ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
					'edit' => __('Edit Logo',ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
					'editls_item' => __('Edit Logo',ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
					'new-item' => 'New Logo',
					'view' => __('View Logo',ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
					'view_item' => __('View Logo',ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
					'search_items' => __('Search Logo',ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
					'not_found' => __('No Logo Found',ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
					'not_found_in_trash' => __('No Logo Found in Trash',ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
					'parent' => __('Parent Logo',ITLS_LOGO_SHOWCASE_TEXTDOMAIN)
				),
				'public' => true,
                'publicly_queriable' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => false,
				'supports' => array('title','thumbnail' ,'page-attributes'),
				'has_archive' => false,
			);
		
			register_post_type(  ITLS_Custom_Post  , $args );
		}
		
		
		add_action( 'init', 'itls_create_taxonomy' );
		function itls_create_taxonomy() {
			$labels = array(
			  'name'                       => __('Category', ITLS_LOGO_SHOWCASE_TEXTDOMAIN ),
			  'singular_name'              => __('Category', ITLS_LOGO_SHOWCASE_TEXTDOMAIN ),
			  'search_items'               => __( 'Search Categories', ITLS_LOGO_SHOWCASE_TEXTDOMAIN ),
			  'popular_items'              => __( 'Popular Categories' , ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
			  'all_items'                  => __( 'All Categories' , ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
			  'parent_item'                => null,
			  'parent_item_colon'          => null,
			  'editls_item'                  => __( 'Edit Category' , ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
			  'update_item'                => __( 'Update Category' , ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
			  'add_new_item'               => __( 'Add New Category' , ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
			  'new_item_name'              => __( 'New Category Name' , ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
			  'separate_items_with_commas' => __( 'Separate Categories with commas' , ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
			  'add_or_remove_items'        => __( 'Add or remove Categories' , ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
			  'choose_from_most_used'      => __( 'Choose from the most used Categories' , ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
			  'not_found'                  => __( 'No Categories found.' , ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
			  'menu_name'                  => __( 'Categories' , ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
			 );
		
			 $args = array(
			 	'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array('slug' => 'category' )
			 );
		
			register_taxonomy( ITLS_Custom_Post_Taxonomy, ITLS_Custom_Post , $args );
		}
		
	}

    // add thumbnail and order columns in custom post edit page
    add_filter( 'manage_posts_columns', 'itls_logo_showcase_columns_head' );
    add_action( 'manage_posts_custom_column', 'itls_logo_showcase_columns_content', 10, 2 );
    function itls_logo_showcase_columns_head($defaults)
    {
        global $post;
        if (isset($_GET['post_type']) && ($_GET['post_type'] == ITLS_Custom_Post )) {
            $new = array();
            if(!isset($_GET['order']) || $_GET['order']=='desc' )
                $order = 'asc';
            else if( $_GET['order']=='asc' )
                $order = 'desc';

            foreach($defaults as $key => $title) {
                if($key == 'title')
                    $new['featured_image'] = __("Image" ,ITLS_LOGO_SHOWCASE_TEXTDOMAIN);
                if ($key=='date') // Put the Thumbnail column before the Author column
                    $new[ITLS_LOGO_SHOWCASE_FIELDS_PERFIX.'order'] = '<a href="edit.php?post_type='.ITLS_Custom_Post.'&orderby=menu_order&order='.$order.'">'.__("Order" ,ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</a>';
                $new[$key] = $title;
            }
            return $new;
        }
        return $defaults;
    }

    // SHOW THE FEATURED IMAGE in admin

    function itls_logo_showcase_columns_content($column_name, $post_ID)
    {
        global $post;
        if ($post->post_type == ITLS_Custom_Post) {

            if ($column_name == ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'order') {
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
?>