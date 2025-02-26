<?php 
/**
 * Custom Post Type
 */
    class Sirve_Custom_Post_Type{

        function __construct(){
            add_action( 'init', [ $this, 'ht_Sirve' ], 0 );
        }

        function ht_Sirve() {

            $labels = array(
                'name'                  => _x( 'All Listing', 'Post Type General Name', 'sirve' ),
                'singular_name'         => _x( 'List', 'Post Type Singular Name', 'sirve' ),
                'menu_name'             => __( 'Sirve', 'sirve' ),
                'name_admin_bar'        => __( 'Listing', 'sirve' ),
                'archives'              => __( 'List Archive', 'sirve' ),
                'attributes'            => __( 'List Attributes', 'sirve' ),
                'parent_item_colon'     => __( 'Parent Listing:', 'sirve' ),
                'all_items'             => __( 'All Listings', 'sirve' ),
                'add_new_item'          => __( 'Add New List', 'sirve' ),
                'add_new'               => __( 'Add Listing', 'sirve' ),
                'new_item'              => __( 'New Listing', 'sirve' ),
                'edit_item'             => __( 'Edit Listing', 'sirve' ),
                'update_item'           => __( 'Update Listing', 'sirve' ),
                'view_item'             => __( 'View Listing', 'sirve' ),
                'view_items'            => __( 'View Listing', 'sirve' ),
                'search_items'          => __( 'Search List', 'sirve' ),
                'not_found'             => __( 'List Not Found', 'sirve' ),
                'not_found_in_trash'    => __( 'Not List found in Trash', 'sirve' ),
                'featured_image'        => __( 'List Featured Image', 'sirve' ),
                'set_featured_image'    => __( 'Set List Featured Image', 'sirve' ),
                'remove_featured_image' => __( 'Remove List Image', 'sirve' ),
                'use_featured_image'    => __( 'Use as List Image', 'sirve' ),
                'insert_into_item'      => __( 'Insert into Listing', 'sirve' ),
                'uploaded_to_this_item' => __( 'Uploaded to this Listing', 'sirve' ),
                'items_list'            => __( 'Listing', 'sirve' ),
                'items_list_navigation' => __( 'Listing Navigation', 'sirve' ),
                'filter_items_list'     => __( 'Filter Listings', 'sirve' ),
            );

            $args = array(
                'label'                 => __( 'Listing', 'sirve' ),
                // 'description'           => __( 'Listing Description', 'sirve' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'excerpt' ),
                'hierarchical'          => false,
                'menu_icon'             => SIRVE_PL_URL . '/admin/assets/icon/sirve.png',
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'show_in_rest'          => true,
                'menu_position'         => 5,
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'capability_type'       => 'post',
            );

            //Sirve Slug overwrite or Sirve permalink overwrite 
            if(!empty( get_option( 'sirve_permalink_base' ))){
                $args['rewrite' ] = array(
                    'slug'       => get_option( 'sirve_permalink_base' ),
                    'with_front' => false,
                    'feeds'      => false,
                );
            }
            
            if(!empty( get_option( 'sirve_single_page' ))){
                $args['publicly_queryable'] = false;
                $args['public'] = false;
                $args['rewrite'] = array(
                    'slug'       => 'htsirve',
                    'with_front' => false,
                    'feeds'      => false,
                );
            }

            register_post_type( 'sirve', $args );

            // List Category
           $labels = array(
            'name'              => _x( 'Sirve Categories', 'sirve' ),
            'singular_name'     => _x( 'Category', 'sirve' ),
            'search_items'      => __( 'Search Category', 'sirve' ),
            'all_items'         => __( 'All Category', 'sirve' ),
            'parent_item'       => __( 'Parent Category', 'sirve' ),
            'parent_item_colon' => __( 'Parent Category:', 'sirve' ),
            'edit_item'         => __( 'Edit Category', 'sirve' ),
            'update_item'       => __( 'Update Category', 'sirve' ),
            'add_new_item'      => __( 'Add New Category', 'sirve' ),
            'new_item_name'     => __( 'New Category Name', 'sirve' ),
            'menu_name'         => __( 'Categories', 'sirve' ),
           );

           $args_categories = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'show_in_rest'          => true,
            'query_var'             => true,
            'publicly_queryable'    => true,
            'rewrite'               => array( 'slug' => 'sirve_category' ),
           );

           //Sirve Slug overwrite or Sirve permalink overwrite 
           if(!empty( get_option( 'sirve_category_permalink_base' ))){
                $args_categories['rewrite' ] = array(
                    'slug'       => get_option( 'sirve_category_permalink_base' ),
                    'with_front' => false,
                    'feeds'      => false,
                );
            }

           register_taxonomy('sirve_category','sirve',$args_categories);

           $tag_labels = array(
                'name'                       => _x( 'Sirve Tags', 'Taxonomy General Name', 'sirve' ),
                'singular_name'              => _x( 'Tags', 'Taxonomy Singular Name', 'sirve' ),
                'menu_name'                  => __( 'Tags', 'sirve' ),
                'all_items'                  => __( 'All Tags', 'sirve' ),
                'parent_item'                => __( 'Parent Tags', 'sirve' ),
                'parent_item_colon'          => __( 'Parent Tags:', 'sirve' ),
                'new_item_name'              => __( 'New Tag Name', 'sirve' ),
                'add_new_item'               => __( 'Add New Tag', 'sirve' ),
                'edit_item'                  => __( 'Edit Tag', 'sirve' ),
                'update_item'                => __( 'Update Tag', 'sirve' ),
                'view_item'                  => __( 'View Tag', 'sirve' ),
                'separate_items_with_commas' => __( 'Separate tags with commas', 'sirve' ),
                'add_or_remove_items'        => __( 'Add or remove tags', 'sirve' ),
                'choose_from_most_used'      => __( 'Choose from the most used', 'sirve' ),
                'popular_items'              => __( 'Popular Tags', 'sirve' ),
                'search_items'               => __( 'Search Tags', 'sirve' ),
                'not_found'                  => __( 'Not Found', 'sirve' ),
                'no_terms'                   => __( 'No tags', 'sirve' ),
                'items_list'                 => __( 'Tags list', 'sirve' ),
                'items_list_navigation'      => __( 'Tags list navigation', 'sirve' ),
            );
            $args_tags = array(
                'labels'                     => $tag_labels,
                'hierarchical'               => false,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
                'show_in_rest'               => true,
                'rewrite'                   => array( 'slug' => 'sirve_tag' ),
            );

            //Sirve tag overwrite or Sirve tag permalink overwrite 
           if(!empty( get_option( 'sirve_tag_permalink_base' ))){
                $args_tags['rewrite' ] = array(
                    'slug'       => get_option( 'sirve_tag_permalink_base' ),
                    'with_front' => false,
                    'feeds'      => false,
                );
            }
            register_taxonomy( 'sirve_tag', 'sirve', $args_tags );

            // Sirve Event
            // Event Lable Change  Event -> Type
           $event_labels = array(
            'name'              => _x( 'Listing Type', 'sirve' ),
            'singular_name'     => _x( 'Type', 'sirve' ),
            'search_items'      => __( 'Search Type', 'sirve' ),
            'all_items'         => __( 'All Pype', 'sirve' ),
            'parent_item'       => __( 'Parent Type', 'sirve' ),
            'parent_item_colon' => __( 'Parent Type:', 'sirve' ),
            'edit_item'         => __( 'Edit Type', 'sirve' ),
            'update_item'       => __( 'Update Type', 'sirve' ),
            'add_new_item'      => __( 'Add New Type', 'sirve' ),
            'new_item_name'     => __( 'New Type Name', 'sirve' ),
            'menu_name'         => __( 'Types', 'sirve' ),
           );

           $event_args = array(
                'labels'                     => $event_labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
                'show_in_rest'               => true,
                'rewrite'                   => array( 'slug' => 'sirve_event' ),
           );

            //Sirve tag overwrite or Sirve Event permalink overwrite 
            if(!empty( get_option( 'sirve_event_permalink_base' ))){
                $event_args['rewrite' ] = array(
                    'slug'       => get_option( 'sirve_event_permalink_base' ),
                    'with_front' => false,
                    'feeds'      => false,
                );
            }

           register_taxonomy('sirve_event','sirve',$event_args);
           
        }  
    }
    new Sirve_Custom_Post_Type();