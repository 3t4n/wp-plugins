<?php
defined( 'ABSPATH' ) or exit;
function mbo_register_post_type()
{
    $options = mbo_get_options();
    $create_posts = ( version_compare( get_bloginfo( 'version' ), '4.5', '>' ) or is_multisite() ) ? 'do_not_allow' : false;
    $args = array
    (
        'labels' => array
        (
            'name'					=> _x( 'Order Bumps', 'post type general name', 'molongui-bump-offer' ),
            'singular_name'			=> _x( 'Order Bump', 'post type singular name', 'molongui-bump-offer' ),
            'menu_name'             => _x( 'Order Bumps', 'Admin menu name', 'molongui-bump-offer' ),
            'add_new'				=> _x( 'Add New', MOLONGUI_BUMP_OFFER_CPT, 'molongui-bump-offer' ),
            'add_new_item'			=> __( 'Add New Order Bump', 'molongui-bump-offer' ),
            'edit'                  => __( 'Edit', 'molongui-bump-offer' ),
            'edit_item'				=> __( 'Edit Order Bump', 'molongui-bump-offer' ),
            'new_item'				=> __( 'New Order Bump', 'molongui-bump-offer' ),
            'view_item'				=> __( 'View Order Bump', 'molongui-bump-offer' ),
            'search_items'			=> __( 'Search Order Bumps', 'molongui-bump-offer' ),
            'not_found'				=> __( 'No Order Bumps Found', 'molongui-bump-offer' ),
            'not_found_in_trash'	=> __( 'No Order Bumps Found in the Trash', 'molongui-bump-offer' ),
            'filter_items_list'     => __( 'Filter Order Bumps', 'molongui-bump-offer' ),
            'items_list_navigation' => __( 'Order Bumps Navigation', 'molongui-bump-offer' ),
            'items_list'            => __( 'Order Bumps List', 'molongui-bump-offer' ),
        ),
        'description'			=> __( "This is where you can add new order bumps that customers can easily add to their Order.", 'molongui-bump-offer' ),
        'public'				=> false,
        'show_ui'               => true,
        'capability_type'       => 'shop_coupon',
        'capabilities'          => array( 'create_posts' => $create_posts ),
        'map_meta_cap'          => true,
        'publicly_queryable'    => false,
        'exclude_from_search'   => true,
        'can_export'            => false,
        'show_in_menu'          => current_user_can( 'manage_woocommerce' ) ? $options['submenu_location'] : false,
        'hierarchical'          => false,
        'rewrite'               => false,
        'query_var'             => false,
        'supports'              => array( 'title' ),
        'show_in_nav_menus'     => false,
        'show_in_admin_bar'     => true,
        'has_archive'			=> false,
    );
    register_post_type( MOLONGUI_BUMP_OFFER_CPT, $args );
}
add_action( 'init', 'mbo_register_post_type' );
function mbo_post_updated_messages( $msg )
{
    $msg[ MOLONGUI_BUMP_OFFER_CPT ] = array
    (
        0  => '',                                                              // Unused. Messages start at index 1.
        1  => __( "Deal updated.", 'molongui-bump-offer' ),
        2  => __( "Custom field updated.", 'molongui-bump-offer' ),            // Probably better do not touch
        3  => __( "Custom field deleted.", 'molongui-bump-offer' ),            // Probably better do not touch
        4  => __( "Deal updated.", 'molongui-bump-offer' ),
        5  => __( "Deal restored to revision", 'molongui-bump-offer' ),
        6  => __( "Deal published.", 'molongui-bump-offer' ),
        7  => __( "Deal saved.", 'molongui-bump-offer' ),
        8  => __( "Deal submitted.", 'molongui-bump-offer' ),
        9  => __( "Deal scheduled.", 'molongui-bump-offer' ),
        10 => __( "Deal draft updated.", 'molongui-bump-offer' ),
    );

    return $msg;
}

add_filter( 'post_updated_messages', 'mbo_post_updated_messages' );