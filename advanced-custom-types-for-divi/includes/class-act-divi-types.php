<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.advancedcustomtypes.io
 * @since      1.0.1
 *
 * @package    ACT_Divi
 * @subpackage ACT_Divi/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.1
 * @package    ACT_Divi
 * @subpackage ACT_Divi/includes
 * @author     Pablo Capello <hola@capellopablo.com>
 */
class ACT_Divi_Types {

	/**
	 * Register custom post type: Movie
	 *
	 * @since    1.0.1
	 */
    function register_cpt_movie() {

        /**
         * Post Type: Movies.
         */

        $labels = array(
            "name" => __( "Movies", "act-divi" ),
            "singular_name" => __( "Movie", "act-divi" ),
        );

        $args = array(
            "label" => __( "Movies", "act-divi" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "movie", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
        );

        register_post_type( "act_movie", $args );
    }


    function register_cpt_member() {

        /**
         * Post Type: Members.
         */

        $labels = array(
            "name" => __( "Members", "act-divi" ),
            "singular_name" => __( "Member", "act-divi" ),
        );

        $args = array(
            "label" => __( "Members", "act-divi" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "member", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
        );

        register_post_type( "act_member", $args );
    }

    function register_cpt_service() {

        /**
         * Post Type: Services.
         */

        $labels = array(
            "name" => __( "Services", "act-divi" ),
            "singular_name" => __( "Service", "act-divi" ),
        );

        $args = array(
            "label" => __( "Services", "act-divi" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "service", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
        );

        register_post_type( "act_service", $args );
    }


    function register_cpt_event() {

        /**
         * Post Type: Events.
         */

        $labels = array(
            "name" => __( "Events", "act-divi" ),
            "singular_name" => __( "Event", "act-divi" ),
        );

        $args = array(
            "label" => __( "Events", "act-divi" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "event", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
        );

        register_post_type( "act_event", $args );
    }


    function register_cpt_property() {

        /**
         * Post Type: Properties.
         */

        $labels = array(
            "name" => __( "Properties", "act-divi" ),
            "singular_name" => __( "Property", "act-divi" ),
        );

        $args = array(
            "label" => __( "Properties", "act-divi" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "property", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
        );

        register_post_type( "act_property", $args );
    }



    function register_cpt_office() {

        /**
         * Post Type: Offices.
         */

        $labels = array(
            "name" => __( "Offices", "act-divi" ),
            "singular_name" => __( "Office", "act-divi" ),
        );

        $args = array(
            "label" => __( "Offices", "act-divi" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "office", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
        );

        register_post_type( "act_office", $args );
    }


    function register_cpt_course() {

        /**
         * Post Type: Courses.
         */

        $labels = array(
            "name" => __( "Courses", "act-divi" ),
            "singular_name" => __( "Course", "act-divi" ),
        );

        $args = array(
            "label" => __( "Courses", "act-divi" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "course", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
        );

        register_post_type( "act_course", $args );
    }

    function register_cpt_product() {

        /**
         * Post Type: Products.
         */

        $labels = array(
            "name" => __( "Products", "act-divi" ),
            "singular_name" => __( "Product", "act-divi" ),
        );

        $args = array(
            "label" => __( "Products", "act-divi" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "product", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
        );

        register_post_type( "act_product", $args );
    }


    function register_cpt_listing() {

        /**
         * Post Type: Listings.
         */

        $labels = array(
            "name" => __( "Listings", "act-divi" ),
            "singular_name" => __( "Listing", "act-divi" ),
        );

        $args = array(
            "label" => __( "Listings", "act-divi" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "listing", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
        );

        register_post_type( "act_listing", $args );
    }

    function register_cpt_testimonial() {

        /**
         * Post Type: Testimonials.
         */

        $labels = array(
            "name" => __( "Testimonials", "act-divi" ),
            "singular_name" => __( "Testimonial", "act-divi" ),
        );

        $args = array(
            "label" => __( "Testimonials", "act-divi" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "testimonial", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
        );

        register_post_type( "act_testimonial", $args );
    }


    function register_cpt_shop() {

        /**
         * Post Type: Shops.
         */

        $labels = array(
            "name" => __( "Shops", "act-divi" ),
            "singular_name" => __( "Shop", "act-divi" ),
        );

        $args = array(
            "label" => __( "Shops", "act-divi" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "shop", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
        );

        register_post_type( "act_shop", $args );
    }


    function register_cpt_location() {

        /**
         * Post Type: Locations.
         */

        $labels = array(
            "name" => __( "Locations", "act-divi" ),
            "singular_name" => __( "Location", "act-divi" ),
        );

        $args = array(
            "label" => __( "Locations", "act-divi" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "location", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
        );

        register_post_type( "act_location", $args );
    }


    function register_cpt_feature() {

        /**
         * Post Type: Features.
         */

        $labels = array(
            "name" => __( "Features", "act-divi" ),
            "singular_name" => __( "Feature", "act-divi" ),
        );

        $args = array(
            "label" => __( "Features", "act-divi" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "feature", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
        );

        register_post_type( "act_feature", $args );
    }


    function register_cpt_milestone() {

        /**
         * Post Type: Milestones.
         */

        $labels = array(
            "name" => __( "Milestones", "act-divi" ),
            "singular_name" => __( "Milestone", "act-divi" ),
        );

        $args = array(
            "label" => __( "Milestones", "act-divi" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "milestone", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
        );

        register_post_type( "act_milestone", $args );
    }


}
