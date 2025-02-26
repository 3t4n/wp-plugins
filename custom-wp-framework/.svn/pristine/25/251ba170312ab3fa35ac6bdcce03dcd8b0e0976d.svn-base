<?php

namespace Custom_WP_Framework\Includes\Core\Custom_Post_Types;

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

/**
 * Class for Custom Post Types.
 * 
 * @since   1.0.0
 */
class CWF_CPT {

    /**
     * The unique id of the custom post type.
     * 
     * @since   1.0.0
     * @var     bigint      $post_type_id
     */
    public $post_type_id;

    /**
     * The unique slug or key of the custom post type.
     * 
     * @since   1.0.0
     * @var     string      $post_type_key
     */
    public $post_type_key;

    /**
     * The plural label of the custom post type.
     * 
     * @since   1.0.0
     * @var     string      $post_type_label
     */
    public $post_type_label;

    /**
     * The additional labels for the custom post type.
     * 
     * @since   1.0.0
     * @var     CWF_CPT_Labels      $post_type_labels 
     */
    public $post_type_labels;

    /**
     * A short description of the custom post type.
     * 
     * @since   1.0.0
     * @var     string      $post_type_description
     */
    public $post_type_description;

    /**
     * Whether the post type is intended for use publicly either via the 
     * admin interface or by front-end users.
     * 
     * @since   1.0.0
     * @var     bool        $post_type_is_public
     */
    public $post_type_is_public;

    /**
     * Whether the post type is hierarchical (e.g. page).
     * 
     * @since   1.0.0
     * @var     bool        $post_type_is_hierarchical
     */
    public $post_type_is_hierarchical;

    /**
     * Whether to exclude posts with this post type from front end search results.
     * 
     * @since   1.0.0
     * @var     bool        $post_type_exclude_from_search
     */
    public $post_type_exclude_from_search;

    /**
     * Whether queries can be performed on the front end for the post type.
     * 
     * @since   1.0.0
     * @var     bool        $post_Type_is_publicly_queryable
     */
    public $post_type_is_publicly_queryable;

    /**
     * Whether to generate and allow a UI for managing this post type in admin.
     * 
     * @since   1.0.0
     * @var     bool        $post_type_show_in_ui
     */
    public $post_type_show_in_ui;

    /**
     * Whether to show the custom post type in the admin menu.
     * 
     * @since   1.0.0
     * @var     bool        $post_type_show_in_menu
     */
    public $post_type_show_in_menu;

    /**
     * Whether to make this post available for selection in navigation menus.
     * 
     * @since   1.0.0
     * @var     bool        $post_type_show_in_nav_menus
     */
    public $post_type_show_in_nav_menus;

    /**
     * Whather to make this post available in the admin bar.
     * 
     * @since   1.0.0
     * @var     bool        $post_type_show_in_admin_bar
     */
    public $post_type_show_in_admin_bar;

    /**
     * Whether to include the post type in the REST API.
     * 
     * @since   1.0.0
     * @var     bool        $post_type_show_in_rest
     */
    public $post_type_show_in_rest;

    /**
     * The base URL of the REST API route.
     * 
     * @since   1.0.0
     * @var     string      $post_type_rest_base
     */
    public $post_type_rest_base;

    /**
     * The REST API Controller class name.
     * 
     * @since   1.0.0
     * @var     string      $post_type_rest_controller_class
     */
    public $post_type_rest_controller_class;

    /**
     * The position in the menu order the post type should appear.
     * 
     * @since   1.0.0
     * @var     string      $post_type_menu_position
     */
    public $post_type_menu_position;

    /**
     * The URL of the icon to be used for this menu.
     * 
     * @since   1.0.0
     * @var     string      $post_type_menu_icon
     */
    public $post_type_menu_icon;

    /**
     * The capability type which the post type uses as basis for its capabilities.
     * 
     * @since   1.0.0
     * @var     string      $post_capability_type
     */
    public $post_capability_type;

    /**
     * The string to use to build the read, edit and delete capabilities.
     * 
     * @since   1.0.0
     * @var     string      $post_type_capabilities
     */
    //public $post_type_capabilities;

    /**
     * Whether to use the internal default meta capability handling.
     * 
     * @since   1.0.0
     * @var     bool        $post_type_map_meta_cap
     */
    public $post_type_map_meta_cap;

    /**
     * Core feature(s) of the post type supports.
     * 
     * @since   1.0.0
     * @var     array       $post_type_supports
     */
    public $post_type_supports;

    /**
     * Custom features of the post type supports.
     * 
     * @since   1.0.0
     * @var     array       $post_type_custom_supports
     */
    public $post_type_custom_supports;

    /**
     * Provide a callback function that sets up the meta boxes for the edit form.
     * 
     * @since   1.0.0
     * @var     string      $post_type_register_meta_box_cb
     */
    public $post_type_register_meta_box_cb;

    /**
     * An array of taxonomy identifiers that will be registered for the post type.
     * 
     * @since   1.0.0
     * @var     array       $post_type_taxonomies
     */
    public $post_type_taxonomies;

    /**
     * Whether there should be post type archives.
     * 
     * @since   1.0.0
     * @var     bool        $post_type_has_archive
     */
    public $post_type_has_archive;

    /**
     * The archive slug to use for the post type.
     * 
     * @since   1.0.0
     * @var     string      $post_type_archive_slug
     */
    public $post_type_archive_slug;

    /**
     * Whether rewrite should be triggered for this post type.
     * 
     * @since   1.0.0
     * @var     bool        $post_type_rewrite
     */
    public $post_type_rewrite;

    /**
     * Rewrite rules for the post type.
     * 
     * @since   1.0.0
     * @var     array       $post_type_rewrite_rules
     */
    public $post_type_rewrite_rules;

    /**
     * Whether to set the query_var key for the post type.
     * 
     * @since   1.0.0
     * @var     bool        $post_type_query_var
     */
    public $post_type_query_var;

    /**
     * The query_var string to use for the post type.
     * 
     * @since   1.0.0
     * @var     string      $post_type_query_var_slug
     */
    public $post_type_query_var_slug;

    /**
     * Whether to allow this post type to be exported.
     * 
     * @since   1.0.0
     * @var     bool        $post_type_can_export
     */
    public $post_type_can_export;

    /**
     * Whether to delete posts of this type when deleting a user.
     * 
     * @since   1.0.0
     * @var     bool        $post_type_delete_with_user
     */
    public $post_type_delete_with_user;

    /**
     * Default constructor method.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function __construct() {

        /**
         * Initialise post type id and set default value to null. 
         */
        $this->post_type_id = null;

        /**
         * Initialise post type key and set default value to null.
         */
        $this->post_type_key = null;

        /**
         * Initialise post type label and set default value to null.
         */
        $this->post_type_label = null;

        /**
         * Create a new instance of Custom_WP_Framework_CPT_Labels.
         */
        $this->post_type_labels = new CWF_CPT_Labels();

        /**
         * Initialise post type description and set default value to null.
         */
        $this->post_type_description = null;

        /**
         * Initialise 'is_public' variable and set default value to true.
         */
        $this->post_type_is_public = true;

        /**
         * Initialise 'is_hierarchical' variable and set default value to false.
         */
        $this->post_type_is_hierarchical = false;

        /**
         * Initialise 'exclude_from_search' variable and set default to value to false.
         */
        $this->post_type_exclude_from_search = false;

        /**
         * Initialise 'is_publicly_queryable' variable and set detaulf value to true.
         */
        $this->post_type_is_publicly_queryable = true;

        /**
         * Initialise 'show_in_ui' variable and set default value to true.
         */
        $this->post_type_show_in_ui = true;

        /**
         * Initialise 'show_in_menu' variable and set default value to true.
         */
        $this->post_type_show_in_menu = true;

        /**
         * Initialise 'show_in_nav_menus' variable and set default value to true.
         */
        $this->post_type_show_in_nav_menus = true;

        /**
         * Initialise 'show_in_admin_bar' variable and set default value to true.
         */
        $this->post_type_show_in_admin_bar = true;

        /**
         * Initialise 'show_in_rest' variable and set default value to null.
         */
        $this->post_type_show_in_rest = null;

        /**
         * Initialise rest base variable and set to null.
         */
        $this->post_type_rest_base = null;

        /**
         * Initialise rest controller class variable and set to null.
         */
        $this->post_type_rest_controller_class = null;

        /**
         * Initialise menu position variable and set to null.
         */
        $this->post_type_menu_position = null;

        /**
         * Initialise menu icon variable and set to null.
         */
        $this->post_type_menu_icon = null;

        /**
         * Initialise post capability type and set to default value 'post'.
         */
        $this->post_capability_type = 'post';

        /**
         * Initialise 'map_meta_cap' variable and set default to true.
         */
        $this->post_type_map_meta_cap = true;

        /**
         * Initialise post type supports array and set default values.
         */
        $this->post_type_supports = array(
            "title" => true,
            "editor" => true,
            "thumbnail" => true,
            "comments" => false,
            "revisions" => false,
            "trackbacks" => false,
            "author" => false,
            "excerpt" => false,
            "page-attributes" => false,
            "custom-fields" => false,
            "post-formats" => false
        ); 

        /**
         * Initialise custom supports array and set to empty array.
         */
        $this->post_type_custom_supports = array();

        /**
         * Initialise 'register_meta_box_cb' variable and set to null.
         */
        $this->post_type_register_meta_box_cb = null;

        /**
         * Initialise taxonomies array and set to null.
         */
        $this->post_type_taxonomies = null;

        /**
         * Initialise 'has_archive' variable and set default to null.
         */
        $this->post_type_has_archive = null;

        /**
         * Initialise variable for 'archive_slug' and set to null.
         */
        $this->post_type_archive_slug = null;

        /**
         * Initialise 'rewrite' variable and set default to true.
         */
        $this->post_type_rewrite = true;

        /**
         * Initialise array for rewrite rules and set default values.
         */
        $this->post_type_rewrite_rules = array(
            'slug' => null,
            'with-front' => true,
            'feeds' => null,
            'pages' => true
        );

        /**
         * Initialise 'query_var' variable and set default to true.
         */
        $this->post_type_query_var = true;

        /**
         * Initialise variable for 'query_var' slug and set default to null.
         */
        $this->post_type_query_var_slug = null;

        /**
         * Initialise variable for 'can_export' and set default to true.
         */
        $this->post_type_can_export = true;

        /**
         * Initialise 'delete_with_user' variable and set to null.
         */
        $this->post_type_delete_with_user = null;
    }

    /**
     * Set the database id of the custom post type.
     * 
     * @since   1.0.0
     * @param   bigint
     * @return  void
     */
    public function set_custom_post_type_id( $post_type_id ) {

        /**
         * Set post type id to specified value.
         */
        $this->post_type_id = $post_type_id;
    }

    /**
     * Get the database id of the custom post type.
     * 
     * @since   1.0.0
     * @param   void
     * @return  bigint  $this->post_type_id
     */
    public function get_custom_post_type_id() {

        /**
         * Return id of custom post type.
         */
        return $this->post_type_id;
    }

}