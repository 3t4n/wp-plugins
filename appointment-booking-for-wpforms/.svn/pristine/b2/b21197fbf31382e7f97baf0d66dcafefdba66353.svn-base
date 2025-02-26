<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Post_Type_Backend { 
	function __construct(){
        add_action( 'init', array($this,'custom_post_type') );
    }
    function custom_post_type() {
        $capabilities = array(
            'edit_post' => 'booknow_staffs',
            'edit_posts' => 'booknow_staffs',
            'edit_others_posts' => 'edit_others_posts',
            'publish_posts' => 'booknow_staffs',
            'read_post' => 'booknow_staffs',
            'read_private_posts' => 'booknow_staffs',
            'delete_post' => 'booknow_staffs'
        );
    	register_post_type(Booknow_Appointments_Backend::$post_type,
            array(
                'labels'      => array(
                    'name'          => esc_html__( 'Appointments', 'booknow' ),
                    'singular_name' => esc_html__( 'Appointments', 'booknow' ),
                    'add_new' => esc_html__( 'Add new appointment', 'booknow' ),
                    'edit_item' => esc_html__( 'Edit appointment', 'booknow' ),
                    'new_item ' => esc_html__( 'Add appointment', 'booknow' ),
                ),
                'public'      => true,
                'has_archive' => false,
                'rewrite'     => array( 'slug' => 'booknow' ),
                'supports'    =>array('title'),
                'show_in_menu'=> "booknow",
                'exclude_from_search' => true,
                'publicly_queryable' => false,
                'query_var'=>false,
                'capabilities'=>$capabilities
            )
        );
        register_post_type(Booknow_Services_Backend::$post_type,
            array(
                'labels'      => array(
                    'name'          => esc_html__( 'Services', 'booknow' ),
                    'singular_name' => esc_html__( 'Services', 'booknow' ),
                    'add_new' => esc_html__( 'Add new service', 'booknow' ),
                    'edit_item' => esc_html__( 'Edit service', 'booknow' ),
                    'new_item ' => esc_html__( 'Add service', 'booknow' ),
                ),
                'public'      => true,
                'has_archive' => true,
                'rewrite'     => array( 'slug' => 'booknow_services' ),
                'supports'    =>array('title','thumbnail'),
                'exclude_from_search' => true,
                'publicly_queryable' => false,
                'query_var'=>false,
                'show_in_menu'=> "booknow",
            )
        );
        register_post_type(Booknow_Staffs_Backend::$post_type,
            array(
                'labels'      => array(
                    'name'          => esc_html__( 'Staffs', 'booknow' ),
                    'singular_name' => esc_html__( 'Staffs', 'booknow' ),
                    'add_new' => esc_html__( 'Add new staff', 'booknow' ),
                    'edit_item' => esc_html__( 'Edit staff', 'booknow' ),
                    'new_item ' => esc_html__( 'Add staff', 'booknow' ),
                    'add_new_item ' => esc_html__( 'Add new staff', 'booknow' ),
                ),
                'public'      => true,
                'has_archive' => true,
                'rewrite'     => array( 'slug' => Booknow_Staffs_Backend::$post_type ),
                'supports'    =>array('title','thumbnail'),
                'show_in_menu'=> "booknow",
                'exclude_from_search' => true,
                'publicly_queryable' => false,
                'query_var'=>false,
                'capabilities'=>$capabilities
            )
        );
        register_post_type(Booknow_Customers_Backend::$post_type,
            array(
                'labels'      => array(
                    'name'          => esc_html__( 'Customers', 'booknow' ),
                    'singular_name' => esc_html__( 'Customers', 'booknow' ),
                    'add_new' => esc_html__( 'Add new Customer', 'booknow' ),
                    'edit_item' => esc_html__( 'Edit Customer', 'booknow' ),
                    'new_item ' => esc_html__( 'Add Customer', 'booknow' ),
                    'add_new_item ' => esc_html__( 'Add new Customer', 'booknow' ),
                ),
                'public'      => true,
                'has_archive' => true,
                'rewrite'     => array( 'slug' => Booknow_Customers_Backend::$post_type ),
                'supports'    =>array('title'),
                'show_in_menu'=> "booknow",
                'menu_position'=>3,
                'exclude_from_search' => true,
                'publicly_queryable' => false,
                'query_var'=>false,
                'capabilities'=>$capabilities
            )
        );
        register_post_type(Booknow_Customers_Notifications::$post_type,
            array(
                'labels'      => array(
                    'name'          => esc_html__( 'Notifications', 'booknow' ),
                    'singular_name' => esc_html__( 'Notifications', 'booknow' ),
                    'add_new' => esc_html__( 'Add new Notification', 'booknow' ),
                    'edit_item' => esc_html__( 'Edit Notification', 'booknow' ),
                    'new_item ' => esc_html__( 'Add Notification', 'booknow' ),
                    'add_new_item ' => esc_html__( 'Add new Notification', 'booknow' ),
                ),
                'public'      => true,
                'has_archive' => true,
                'rewrite'     => array( 'slug' => Booknow_Customers_Notifications::$post_type ),
                'supports'    =>array('title'),
                'show_in_menu'=> "booknow",
                'menu_position'=>5,
                'exclude_from_search' => true,
                'publicly_queryable' => false,
                'query_var'=>false,
            )
        );
    }
}
new Booknow_Post_Type_Backend;