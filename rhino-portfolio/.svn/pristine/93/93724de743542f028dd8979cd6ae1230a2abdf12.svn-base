<?php
function rhino_post_type_portfolio(){

    $labels = array(
            'name'                  => _x( 'Portfolios', 'Portfolios', 'rhino-portfolio' ),
            'singular_name'         => _x( 'Portfolio', 'Portfolio', 'rhino-portfolio' ),
            'menu_name'             => __( 'Portfolios', 'rhino-portfolio' ),
            'parent_item_colon'     => __( 'Parent Portfolio:', 'rhino-portfolio' ),
            'all_items'             => __( 'All Portfolio', 'rhino-portfolio' ),
            'view_item'             => __( 'View Portfolio', 'rhino-portfolio' ),
            'add_new_item'          => __( 'Add New Portfolio', 'rhino-portfolio' ),
            'add_new'               => __( 'Add New Portfolio', 'rhino-portfolio' ),
            'edit_item'             => __( 'Edit Portfolio', 'rhino-portfolio' ),
            'update_item'           => __( 'Update Portfolio', 'rhino-portfolio' ),
            'search_items'          => __( 'Search Portfolio', 'rhino-portfolio' ),
            'not_found'             => __( 'No article found', 'rhino-portfolio' ),
            'not_found_in_trash'    => __( 'No article found in Trash', 'rhino-portfolio' )
        );

    $args = array(
            'labels'                => $labels,
            'public'                => true,
            'publicly_queryable'    => true,
            'show_in_menu'          => true,
            'show_in_admin_bar'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'hierarchical'          => false,
            'menu_icon'             => 'dashicons-format-gallery',
            'menu_position'         => null,
            'supports'              => array( 'title','editor','thumbnail','comments')
        );

    register_post_type('portfolio',$args);
}
add_action('init','rhino_post_type_portfolio');


/*--------------------------------------------------------------
 *          View Message When Updated portfolio
 *-------------------------------------------------------------*/
function rhino_update_message_portfolio(){
    global $post, $post_ID;

    $message['portfolio'] = array(
        0   => '',
        1   => sprintf( __('Portfolio updated. <a href="%s">View Portfolio</a>', 'rhino-portfolio' ), esc_url( get_permalink($post_ID) ) ),
        2   => __('Custom field updated.', 'rhino-portfolio' ),
        3   => __('Custom field deleted.', 'rhino-portfolio' ),
        4   => __('Portfolio updated.', 'rhino-portfolio' ),
        5   => isset($_GET['revision']) ? sprintf( __('Portfolio restored to revision from %s', 'rhino-portfolio' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6   => sprintf( __('Portfolio published. <a href="%s">View Portfolio</a>', 'rhino-portfolio' ), esc_url( get_permalink($post_ID) ) ),
        7   => __('Portfolio saved.', 'rhino-portfolio' ),
        8   => sprintf( __('Portfolio submitted. <a target="_blank" href="%s">Preview Portfolio</a>', 'rhino-portfolio' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9   => sprintf( __('Portfolio scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Portfolio</a>', 'rhino-portfolio' ), date_i18n( __( 'M j, Y @ G:i','rhino-portfolio'), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
        10  => sprintf( __('Portfolio draft updated. <a target="_blank" href="%s">Preview Portfolio</a>', 'rhino-portfolio' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        );

return $message;
}
add_filter( 'post_updated_messages', 'rhino_update_message_portfolio' );



/*--------------------------------------------------------------
 *          Register Custom Taxonomies
 *-------------------------------------------------------------*/
function rhino_create_portfolio_taxonomy(){
    $labels = array(    'name'              => _x( 'Portfolio Categories', 'taxonomy general name','rhino-portfolio'),
                        'singular_name'     => _x( 'Category', 'taxonomy singular name','rhino-portfolio' ),
                        'search_items'      => __( 'Search Category','rhino-portfolio'),
                        'all_items'         => __( 'All Category','rhino-portfolio'),
                        'parent_item'       => __( 'Parent Category','rhino-portfolio'),
                        'parent_item_colon' => __( 'Parent Category:','rhino-portfolio'),
                        'edit_item'         => __( 'Edit Category','rhino-portfolio'),
                        'update_item'       => __( 'Update Category','rhino-portfolio'),
                        'add_new_item'      => __( 'Add New Category','rhino-portfolio'),
                        'new_item_name'     => __( 'New Category Name','rhino-portfolio'),
                        'menu_name'         => __( 'Category','rhino-portfolio')
        );
    $args = array(  'hierarchical'      => true,
                    'labels'            => $labels,
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'query_var'         => true,
        );
    register_taxonomy('portfolio-cat',array( 'portfolio' ),$args);
}

add_action('init','rhino_create_portfolio_taxonomy');


/**
 * Register Portfolio Tag Taxonomies
 *
 * @return void
 */


function rhino_register_portfolio_tag_taxonomy(){
    $labels = array(
                        'name'                  => _x( 'Portfolio Tags', 'taxonomy general name', 'rhino-portfolio' ),
                        'singular_name'         => _x( 'Portfolio Tag', 'taxonomy singular name', 'rhino-portfolio' ),
                        'search_items'          => __( 'Search Portfolio Tag', 'rhino-portfolio' ),
                        'all_items'             => __( 'All Portfolio Tag', 'rhino-portfolio' ),
                        'parent_item'           => __( 'Portfolio Parent Tag', 'rhino-portfolio' ),
                        'parent_item_colon'     => __( 'Portfolio Parent Tag:', 'rhino-portfolio' ),
                        'edit_item'             => __( 'Edit Portfolio Tag', 'rhino-portfolio' ),
                        'update_item'           => __( 'Update Portfolio Tag', 'rhino-portfolio' ),
                        'add_new_item'          => __( 'Add New Portfolio Tag', 'rhino-portfolio' ),
                        'new_item_name'         => __( 'New Portfolio Tag Name', 'rhino-portfolio' ),
                        'menu_name'             => __( 'Portfolio Tag', 'rhino-portfolio' )
    );

    $args = array(
                        'hierarchical'          => false,
                        'labels'                => $labels,
                        'show_in_nav_menus'     => true,
                        'show_ui'               => true,
                        'show_admin_column'     => true,
                        'query_var'             => true
    );
    register_taxonomy( 'portfolio-tag', array( 'portfolio' ), $args );
}
add_action('init','rhino_register_portfolio_tag_taxonomy');