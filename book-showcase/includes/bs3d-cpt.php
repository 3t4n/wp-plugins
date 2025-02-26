<?php
/**
 * Deny direct access
 */
if ( ! defined( 'ABSPATH' ) ) die( BS3D_ALERT_MSG );

/**
 * Registers Books showcases-showcase post type.
 */
function bs3d_init() {
    $labels = array(
        'name'               => _x( 'Books', 'post type general name', BS3D_TEXTDOMAIN ),
        'singular_name'      => _x( 'Book', 'post type singular name', BS3D_TEXTDOMAIN ),
        'menu_name'          => _x( 'Books Showcase', 'admin menu', BS3D_TEXTDOMAIN ),
        'name_admin_bar'     => _x( 'Book', 'add new on admin bar', BS3D_TEXTDOMAIN ),
        'add_new'            => _x( 'Add New', 'book', BS3D_TEXTDOMAIN ),
        'add_new_item'       => __( 'Add New Book', BS3D_TEXTDOMAIN ),
        'new_item'           => __( 'New Book', BS3D_TEXTDOMAIN ),
        'edit_item'          => __( 'Edit Book', BS3D_TEXTDOMAIN ),
        'view_item'          => __( 'View Book', BS3D_TEXTDOMAIN ),
        'all_items'          => __( 'All Books', BS3D_TEXTDOMAIN ),
        'search_items'       => __( 'Search Books', BS3D_TEXTDOMAIN ),
        'parent_item_colon'  => __( 'Parent Books:', BS3D_TEXTDOMAIN ),
        'not_found'          => __( 'No books found.', BS3D_TEXTDOMAIN ),
        'not_found_in_trash' => __( 'No books found in Trash.', BS3D_TEXTDOMAIN )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', BS3D_TEXTDOMAIN ),
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'bs3dbook' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title' ),
        'menu_icon'           => 'dashicons-book'

    );

    register_post_type( 'bs3dbook', $args );
}

add_action( 'init', 'bs3d_init' );




/**
 * Registers 3d Book showcase shortcode generator post type.
 */
function bs3d_sg_init() {
    $labels = array(
        'name'               => _x( 'All Generated Shortcodes', BS3D_TEXTDOMAIN ),
        'singular_name'      => _x( 'Shortcode Generator', BS3D_TEXTDOMAIN ),
        'menu_name'          => _x( 'Shortcode Generator', BS3D_TEXTDOMAIN ),
        'all_items'          => __( 'Shortcode Generator', BS3D_TEXTDOMAIN ),
        'add_new'            => _x( 'Generate New Shortcode', BS3D_TEXTDOMAIN ),
        'add_new_item'       => __( 'Generate New Shortcode', BS3D_TEXTDOMAIN ),
        'new_item'           => __( 'Generate New Shortcode', BS3D_TEXTDOMAIN ),
        'edit_item'          => __( 'Edit Generated Shortcode', BS3D_TEXTDOMAIN ),
        'view_item'          => __( 'View Generated Shortcode', BS3D_TEXTDOMAIN ),
        'name_admin_bar'     => __( 'Book Showcase  Shortcode', BS3D_TEXTDOMAIN ),
        'search_items'       => __( 'Search Generated Shortcode', BS3D_TEXTDOMAIN ),
        'parent_item_colon'  => __( 'Parent Generated Shortcodes:', BS3D_TEXTDOMAIN ),
        'not_found'          => __( 'No Generated Shortcode found.', BS3D_TEXTDOMAIN ),
        'not_found_in_trash' => __( 'No Generated Shortcode found in Trash.', BS3D_TEXTDOMAIN )
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_ui'             => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'shortcode' ),
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array( 'title' ),
        'show_in_nav_menus'   => false,
        'show_in_menu'        => 'edit.php?post_type=bs3dbook',
    );

    register_post_type( 'bs3d_sgenerator', $args );
}

add_action( 'init', 'bs3d_sg_init' );


/**
 * Customizes messages of 3d Book Showcase shortcode generator post type.
 *
 * @param array $messages
 *
 * @return array
 */
function bs3d_sg_updated_messages( $messages ) {
    global $post;
    $messages['bs3d_sgenerator'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => __( 'Updated.', BS3D_TEXTDOMAIN ),
        2  => __( 'Field updated.', BS3D_TEXTDOMAIN ),
        3  => __( 'Field deleted.', BS3D_TEXTDOMAIN ),
        4  => __( 'Updated.', BS3D_TEXTDOMAIN ),
        5  => isset( $_GET['revision'] ) ? sprintf( __( 'Restored to revision from %s', BS3D_TEXTDOMAIN ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => __( 'Published.', BS3D_TEXTDOMAIN ),
        7  => __( 'Saved.', BS3D_TEXTDOMAIN ),
        8  => __( 'Submitted.', BS3D_TEXTDOMAIN ),
        9  => sprintf(
            __( 'Scheduled for: <strong>%1$s</strong>.', BS3D_TEXTDOMAIN ),
            date_i18n( __( 'M j, Y @ G:i', BS3D_TEXTDOMAIN ), strtotime( $post->post_date ) )
        ),
        10 => __( 'Draft updated.', BS3D_TEXTDOMAIN )
    );

    return $messages;
}

add_filter( 'post_updated_messages', 'bs3d_sg_updated_messages' );

/**
 * Customizes messages of 3d Book Showcase shortcode generator post type.
 *
 * @param array $messages
 *
 * @return array
 */
function bs3d_updated_messages( $messages ) {
    global $post;
    $messages['bs3dbook'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => __( 'Updated.', BS3D_TEXTDOMAIN ),
        2  => __( 'Field updated.', BS3D_TEXTDOMAIN ),
        3  => __( 'Field deleted.', BS3D_TEXTDOMAIN ),
        4  => __( 'Updated.', BS3D_TEXTDOMAIN ),
        5  => isset( $_GET['revision'] ) ? sprintf( __( 'Restored to revision from %s', BS3D_TEXTDOMAIN ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => __( 'Published.', BS3D_TEXTDOMAIN ),
        7  => __( 'Saved.', BS3D_TEXTDOMAIN ),
        8  => __( 'Submitted.', BS3D_TEXTDOMAIN ),
        9  => sprintf(
            __( 'Scheduled for: <strong>%1$s</strong>.', BS3D_TEXTDOMAIN ),
            date_i18n( __( 'M j, Y @ G:i', BS3D_TEXTDOMAIN ), strtotime( $post->post_date ) )
        ),
        10 => __( 'Draft updated.', BS3D_TEXTDOMAIN )
    );

    return $messages;
}

add_filter( 'post_updated_messages', 'bs3d_updated_messages' );

/**
 * Change the placeholder of title input box
 * @param string $title Name of the book
 *
 * @return string
 */
function bs3d_change_title_text( $title ){
    $screen = get_current_screen();
    if  ( 'bs3dbook' == $screen->post_type ) {
        $title = 'Enter a book name';
    }else if('bs3d_sgenerator' == $screen->post_type){
        $title = 'Enter a shortcode name';
    }
    return $title;
}

add_filter( 'enter_title_here', 'bs3d_change_title_text' );

