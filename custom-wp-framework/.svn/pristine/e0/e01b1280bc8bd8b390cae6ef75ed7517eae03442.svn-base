<?php

namespace Custom_WP_Framework\Admin\Models\Custom_Post_Types;

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

// Load required classes.
use Custom_WP_Framework\Includes\CWF_Config;
use Custom_WP_Framework\Includes\Core\Exceptions;
use Custom_WP_Framework\Includes\Helpers\CWF_Utils;

/**
 * The data model class for custom post types.
 * 
 * Handles all data functions and interactions for custom post types.
 * 
 * @since   1.0.0
 */
class CWF_CPT_DataModel {
    
    /**
     * The custom post type table.
     * 
     * @since   1.0.0
     * @var     string  $cpt_table
     */
    private $cpt_table;

    /**
     * Collection of custom post types.
     * 
     * @since   1.0.0
     * @var     array   $cpt_collection
     */
    public $cpt_collection;

    /**
     * Variable to store raw results of SQL queries.
     * 
     * @since   1.0.0
     * @var     object  $results
     */
    public $results;

    /**
     * Variable to store custom post type viewmodel.
     * 
     * @since   1.0.0
     * @var     model   $view_data
     */
    public $view_data;
    
    /**
     * Variable to store the global $wpdb class.
     * 
     * @since   1.0.0
     * @var     object  $wpdb
     */
    private $wpdb;

    /**
     * Placeholder text for labels column.
     * 
     * @since   1.0.0
     * @var     array   $label_placeholders    
     */
    private $label_placeholders;

    /**
     * Placeholder text for settings column.
     * 
     * @since   1.0.0
     * @var     array   $settings_placeholders
     */
    private $settings_placeholders;

    /**
     * Default constructor method.
     * 
     * @since   1.0.0
     * @param   viewmodel 
     * @return  void
     */
    public function __construct( &$model = null ) {

        /**
         * The WordPress class to interact with the database.
         * 
         * @since 	1.0.0
         * @var		object	$wpdb
         */
        global $wpdb;

        /**
         * Assign global WordPress $wpdb to class variable.
         */
        $this->wpdb = $wpdb;

        /**
         * Assign supplied viewmodel to class variable.
         */
        $this->view_data = $model;

        /**
         * The name of the table that stores custom post types in the database.
         */
        $this->cpt_table = $wpdb->prefix . 'cwf_custom_post_types';

        /**
         * Initialise empty array of custom post type objects.
         */
        $this->cpt_collection = array();

        /**
         * Assign null to variable that stores results of SQL queries.
         */
        $this->results = null;

        /**
         * Assign default text to label placeholders.
         */
        $this->label_placeholders = array( 
            'label'                         => '<strong>Label (Plural): </strong>%s<br />',
            'label_singular'                => '<strong>Label (Singular): </strong>%s<br />',
            'label_add_new'                 => '<strong>Label (Add New): </strong>%s<br />',
            'label_add_new_item'            => '<strong>Label (Add New Item): </strong>%s<br />',
            'label_edit_item'               => '<strong>Label (Edit Item): </strong>%s<br />',
            'label_new_item'                => '<strong>Label (New Item): </strong>%s<br />',
            'label_view_item'               => '<strong>Label (View Item): </strong>%s<br />',
            'label_view_items'              => '<strong>Label (View Items): </strong>%s<br />',
            'label_search_items'            => '<strong>Label (Search Items): </strong>%s<br />',
            'label_not_found'               => '<strong>Label (Not found): </strong>%s<br />',
            'label_not_found_in_trash'      => '<strong>Label (Not found in trash): </strong>%s<br />',
            'label_parent_item_colon'       => '<strong>Label (Parent Item Colon): </strong>%s<br />',
            'label_all_items'               => '<strong>Label (All Items): </strong>%s<br />',
            'label_archives'                => '<strong>Label (Archives): </strong>%s<br />',
            'label_attributes'              => '<strong>Label (Uploaded to this item): </strong>%s<br />',
            'label_insert_into_item'        => '<strong>Label (Insert into item): </strong>%s<br />',
            'label_uploaded_to_this_item'   => '<strong>Label (Uploaded to this item): </strong>%s<br />',
            'label_featured_image'          => '<strong>Label (Featured image): </strong>%s<br />',
            'label_set_featured_image'      => '<strong>Label (Set featured image): </strong>%s<br />',
            'label_remove_featured_image'   => '<strong>Label (Remove featured image): </strong>%s<br />',
            'label_use_featured_image'      => '<strong>Label (Use featured image): </strong>%s<br />',
            'label_filter_items_list'       => '<strong>Label (Filter items list): </strong>%s<br />',
            'label_menu_name'               => '<strong>Label (Menu name): </strong>%s<br />',
            'label_items_list_navigation'   => '<strong>Label (Items list navigation): </strong>%s<br />',
            'label_items_list'              => '<strong>Label (Items list): </strong>%s<br />',
            'label_item_published'          => '<strong>Label (Item published): </strong>%s<br />',
            'label_item_published_privately'=> '<strong>Label (Item published privately): </strong>%s<br />',
            'label_item_reverted_to_draft'  => '<strong>Label (Item reverted to draft): </strong>%s<br />',
            'label_item_scheduled'          => '<strong>Label (Item scheduled): </strong>%s<br />',
            'label_item_updated'            => '<strong>Label (Item updated): </strong>%s<br />',
        );

        /**
         * Assign default text to setting placeholders.
         */
        $this->settings_placeholders = array(
            'is_public'                 => '<strong>Public: </strong>%s<br />',
            'is_hierarchical'           => '<strong>Hierarchical: </strong>%s<br />',
            'exclude_from_search'       => '<strong>Exclude from search: </strong>%s<br />',
            'publicly_queryable'        => '<strong>Publicly queryable: </strong>%s<br />',
            'show_in_ui'                => '<strong>Show in UI: </strong>%s<br />',
            'show_in_menu'              => '<strong>Show in menu: </strong>%s<br />',
            'show_in_nav_menus'         => '<strong>Show in nav menus: </strong>%s<br />',
            'show_in_admin_bar'         => '<strong>Show in admin bar: </strong>%s<br />',
            'show_in_rest'              => '<strong>Show in REST: </strong>%s<br />',
            'rest_base'                 => '<strong>REST base: </strong>%s<br />',
            'rest_controller_class'     => '<strong>REST controller class: </strong>%s<br />',
            'menu_position'             => '<strong>Menu position: </strong>%s<br />',
            'menu_icon'                 => '<strong>Menu icon: </strong>%s<br />',
            'capability_type'           => '<strong>Capability type: </strong>%s<br ?>',
            'supports'                  => '<strong>Supports: </strong>%s<br />',
            'has_archive'               => '<strong>Has archive: </strong>%s<br />',
            'archive_slug'              => '<strong>Archive slug: </strong>%s<br />',
            'rewrite'                   => '<strong>Rewrite: </strong>%s<br />',
            'rewrite_rules'             => '<strong>Rewrite rules: </strong><ul class="cwf-table-ul">',
            'rewrite_rules_slug'        => '<li><strong>Slug: </strong>%s</li>',
            'rewrite_rules_with_front'  => '<li><strong>With Front: </strong>%s</li>',
            'rewrite_rules_feeds'       => '<li><strong>Feeds: </strong>%s</li>',
            'rewrite_rules_pages'       => '<li><strong>Pages: </strong>%s</li></ul>',
            'query_var'                 => '<strong>Query var: </strong>%s<br />',
            'query_var_slug'            => '<strong>Query var slug: </strong>%s<br />',
            'can_export'                => '<strong>Can export: </strong>%s<br />',
            'delete_with_user'          => '<strong>Delete with user: </strong>%s<br />',
        );
    }

    /**
     * Get select range of custom post types registered by plugin.
     * 
     * @since   1.0.0
     * @param   int     $offset     The starting point to return rows.
     * @param   int     $limit      The maximum number of returned rows.
     * @return  void
     */
    public function get_cwf_custom_post_types( $offset = 0, $limit = 10, $active = true ) {

        /**
         * Reset cpt collection.
         */
        $this->cpt_collection = array();
         
        /**
         * SQL for retrieving custom post types registered by plugin.
         * 
         * @since   1.0.0
         * @var     string  $sql
         */
        $sql = "SELECT * FROM " . $this->cpt_table
            . " WHERE cpt_is_active = " . ( $active ? '1' : '0' )
            . " LIMIT " . $offset . ", " . $limit;

        /**
         * Clear class $wpdb SQL cache.
         */
        $this->wpdb->flush();

        /**
         * Execute SQL query to retrieve custom post types.
         */    
        $this->results = $this->wpdb->get_results( $sql );

        /**
         * Check for errors with last query. 
         */
        if( $this->wpdb->last_error !== '' ) {
            /**
             * If error, throw new exception.
             */
            throw new \Exception( 'Error occurred: ' . $this->wpdb->last_error );
        }
    }

    /**
     * Get all custom post types registered by plugin.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function get_all_cwf_custom_post_types( $active = null, $names = false ) {

        /**
         * Reset cpt collection.
         */
        $this->cpt_collection = array();

        /**
         * The SQL for retrieving the custom post types.
         * 
         * @since   1.0.0
         * @var     string  $sql
         */
        $sql = "SELECT " . ( $names ? "cpt_key" : "*" ) . " FROM " . $this->cpt_table
            . ( $active == null ? "" : " WHERE cpt_is_active = " . ( $active ? '1' : '0' ) );

        /**
         * Clear class $wpdb SQL cache.
         */
        $this->wpdb->flush();

        /**
         * Execute SQL against WordPress database and retrieve custom post types.
         */
        $this->results = $this->wpdb->get_results( $sql );

        /**
         * Check for errors with last query. 
         */
        if( $this->wpdb->last_error !== '' ) {
            /**
             * If error, throw new exception.
             */
            throw new \Exception( 'Error occurred: ' . $this->wpdb->last_error );
        }
    }

    /**
     * Get custom post type specified by id.
     * 
     * @since   1.0.0
     * @param   bigint      $id     The id for custom post type in database. 
     * @return  void 
     */
    public function get_single_cwf_custom_post_type( $id = null ) {

        /**
         * Ensure provided id is not null.
         */
        if( ! empty( $id ) ) {

            /**
             * Reset cpt collection.
             */
            $this->cpt_collection = array();

            /**
             * The SQL for retrieving the single custom post type.
             * 
             * @since   1.0.0
             * @var     string  $sql
             */
            $sql = "SELECT * FROM " . $this->cpt_table
                . " WHERE id = " . $id;

            /**
             * Clear class $wpdb SQL cache.
             */
            $this->wpdb->flush();

            /**
             * Execute SQL against WordPress database and retrieve custom post type.
             */
            $this->results = $this->wpdb->get_results( $sql );

            /**
             * Check for errors with last query. 
             */
            if( $this->wpdb->last_error !== '' ) {
                /**
                 * If error, throw new exception.
                 */
                throw new \Exception( 'Error occurred: ' . $this->wpdb->last_error );
            }

            /**
             * Add results to cpt collection. 
             */
            $this->cpt_collection[0] = $this->results[0];

        }
        else {
            throw new Exceptions\CWF_Exception_103();
        }
    }
    
    /**
     * Insert custom post type in database.
     * 
     * @since   1.0.0
     * @param   void
     * @return  bool    n/a     Return true if insert successful.
     */
    public function insert_cpt() {

        if( ! empty ( $this->view_data ) ) {
            
            /**
             * Custom post type arguments.
             * 
             * @since   1.0.0
             * @var     array   $args
             */
            $args = array(
                'labels' => array (
                    'post_type_label'               => $this->view_data->cpt->post_type_label,
                    'post_type_labels'              => array (
                        'name'                      => $this->view_data->cpt->post_type_labels->name,
                        'singular_name'             => $this->view_data->cpt->post_type_labels->singular_name,
                        'add_new'                   => $this->view_data->cpt->post_type_labels->add_new,
                        'add_new_item'              => $this->view_data->cpt->post_type_labels->add_new_item,
                        'edit_item'                 => $this->view_data->cpt->post_type_labels->edit_item,
                        'new_item'                  => $this->view_data->cpt->post_type_labels->new_item,
                        'view_item'                 => $this->view_data->cpt->post_type_labels->view_item,
                        'view_items'                => $this->view_data->cpt->post_type_labels->view_items,
                        'search_items'              => $this->view_data->cpt->post_type_labels->search_items,
                        'not_found'                 => $this->view_data->cpt->post_type_labels->not_found,
                        'not_found_in_trash'        => $this->view_data->cpt->post_type_labels->not_found_in_trash,
                        'parent_item_colon'         => $this->view_data->cpt->post_type_labels->parent_item_colon,
                        'all_items'                 => $this->view_data->cpt->post_type_labels->all_items,
                        'archives'                  => $this->view_data->cpt->post_type_labels->archives,
                        'attributes'                => $this->view_data->cpt->post_type_labels->attributes,
                        'insert_into_item'          => $this->view_data->cpt->post_type_labels->insert_into_item,
                        'uploaded_to_this_item'     => $this->view_data->cpt->post_type_labels->uploaded_to_this_item,
                        'featured_image'            => $this->view_data->cpt->post_type_labels->featured_image,
                        'set_featured_image'        => $this->view_data->cpt->post_type_labels->set_featured_image,
                        'remove_featured_image'     => $this->view_data->cpt->post_type_labels->remove_featured_image,
                        'use_featured_image'        => $this->view_data->cpt->post_type_labels->use_featured_image,
                        'menu_name'                 => $this->view_data->cpt->post_type_labels->menu_name,
                        'filter_items_list'         => $this->view_data->cpt->post_type_labels->filter_items_list,
                        'items_list_navigation'     => $this->view_data->cpt->post_type_labels->items_list_navigation,
                        'items_list'                => $this->view_data->cpt->post_type_labels->items_list,
                        'item_published'            => $this->view_data->cpt->post_type_labels->item_published,
                        'item_published_privately'  => $this->view_data->cpt->post_type_labels->item_published_privately,
                        'item_reverted_to_draft'    => $this->view_data->cpt->post_type_labels->item_reverted_to_draft,
                        'item_scheduled'            => $this->view_data->cpt->post_type_labels->item_scheduled,
                        'item_updated'              => $this->view_data->cpt->post_type_labels->item_updated
                    ),
                    'post_type_label_all'           => $this->view_data->post_type_label_all,
                    'post_type_label_singular_all'  => $this->view_data->post_type_label_singular_all,
                    'description'                   => $this->view_data->cpt->post_type_description
                ),
                'settings' => array (
                    'is_public'                     => $this->view_data->cpt->post_type_is_public,
                    'is_hierarchical'               => $this->view_data->cpt->post_type_is_hierarchical,
                    'exclude_from_search'           => $this->view_data->cpt->post_type_exclude_from_search,
                    'is_publicly_queryable'         => $this->view_data->cpt->post_type_is_publicly_queryable,
                    'show_in_ui'                    => $this->view_data->cpt->post_type_show_in_ui,
                    'show_in_menu'                  => $this->view_data->cpt->post_type_show_in_menu,
                    'show_in_nav_menus'             => $this->view_data->cpt->post_type_show_in_nav_menus,
                    'show_in_admin_bar'             => $this->view_data->cpt->post_type_show_in_admin_bar,
                    'show_in_rest'                  => $this->view_data->cpt->post_type_show_in_rest,
                    'rest_base'                     => $this->view_data->cpt->post_type_rest_base,
                    'rest_controller_class'         => $this->view_data->cpt->post_type_rest_controller_class,
                    'menu_position'                 => $this->view_data->cpt->post_type_menu_position,
                    'menu_icon'                     => $this->view_data->cpt->post_type_menu_icon,
                    'capability_type'               => $this->view_data->cpt->post_capability_type,
                    'map_meta_cap'                  => $this->view_data->cpt->post_type_map_meta_cap,
                    'supports'                      => $this->view_data->cpt->post_type_supports,
                    'custom_supports'               => $this->view_data->cpt->post_type_custom_supports,
                    'register_meta_box_cb'          => $this->view_data->cpt->post_type_register_meta_box_cb,
                    'has_archive'                   => $this->view_data->cpt->post_type_has_archive,
                    'archive_slug'                  => $this->view_data->cpt->post_type_archive_slug,
                    'rewrite'                       => $this->view_data->cpt->post_type_rewrite,
                    'rewrite_rules'                 => $this->view_data->cpt->post_type_rewrite_rules,
                    'query_var'                     => $this->view_data->cpt->post_type_query_var,
                    'query_var_slug'                => $this->view_data->cpt->post_type_query_var_slug,
                    'can_export'                    => $this->view_data->cpt->post_type_can_export,
                    'delete_with_user'              => $this->view_data->cpt->post_type_delete_with_user
                ),
                'taxonomies'                        => $this->view_data->cpt->post_type_taxonomies
            );
            
            /**
             * Clear class $wpdb SQL cache.
             */
            $this->wpdb->flush();

            /**
             * Insert custom post type in database.
             */
            $this->wpdb->insert( $this->cpt_table, array(
                'cpt_key'               => sanitize_key( $this->view_data->cpt->post_type_key ),
                'cpt_args'              => base64_encode( serialize ( $args ) ),
                'cpt_is_active'         => true, // Set to active
                'cpt_date_created'      => date( 'Y-m-d H:i:s' ),
                'cpt_date_modified'     => date( 'Y-m-d H:i:s' ),
                'cpt_last_modified_by'  => $this->view_data->get_user()
            ) );

            /**
             * Check for errors with last query. 
             */
            if( $this->wpdb->last_error !== '' ) {
                /**
                 * If error, throw new exception.
                 */
                throw new \Exception( 'Error occurred: ' . $this->wpdb->last_error );
            }

            /**
             * Retrieve id of inserted row. 
             */
            $this->view_data->cpt->post_type_id = intval( $this->wpdb->insert_id );
            
            /**
             * Return true to indicate success.
             */
            return true;
        }

        return false;
    }

    /**
     * Update specified custom post type in database.
     * 
     * @since   1.0.0
     * @param   bigint      $id     The id of the cpt to be updated.
     * @return  void
     */
    public function update_cpt() {

        if ( ! empty( $this->view_data ) ) {

            /**
             * New custom post type args.
             * 
             * @since   1.0.0
             * @var     array   $args
             */
            $args = array(
                'labels' => array (
                    'post_type_label'               => $this->view_data->cpt->post_type_label,
                    'post_type_labels'              => array (
                        'name'                      => $this->view_data->cpt->post_type_labels->name,
                        'singular_name'             => $this->view_data->cpt->post_type_labels->singular_name,
                        'add_new'                   => $this->view_data->cpt->post_type_labels->add_new,
                        'add_new_item'              => $this->view_data->cpt->post_type_labels->add_new_item,
                        'edit_item'                 => $this->view_data->cpt->post_type_labels->edit_item,
                        'new_item'                  => $this->view_data->cpt->post_type_labels->new_item,
                        'view_item'                 => $this->view_data->cpt->post_type_labels->view_item,
                        'view_items'                => $this->view_data->cpt->post_type_labels->view_items,
                        'search_items'              => $this->view_data->cpt->post_type_labels->search_items,
                        'not_found'                 => $this->view_data->cpt->post_type_labels->not_found,
                        'not_found_in_trash'        => $this->view_data->cpt->post_type_labels->not_found_in_trash,
                        'parent_item_colon'         => $this->view_data->cpt->post_type_labels->parent_item_colon,
                        'all_items'                 => $this->view_data->cpt->post_type_labels->all_items,
                        'archives'                  => $this->view_data->cpt->post_type_labels->archives,
                        'attributes'                => $this->view_data->cpt->post_type_labels->attributes,
                        'insert_into_item'          => $this->view_data->cpt->post_type_labels->insert_into_item,
                        'uploaded_to_this_item'     => $this->view_data->cpt->post_type_labels->uploaded_to_this_item,
                        'featured_image'            => $this->view_data->cpt->post_type_labels->featured_image,
                        'set_featured_image'        => $this->view_data->cpt->post_type_labels->set_featured_image,
                        'remove_featured_image'     => $this->view_data->cpt->post_type_labels->remove_featured_image,
                        'use_featured_image'        => $this->view_data->cpt->post_type_labels->use_featured_image,
                        'menu_name'                 => $this->view_data->cpt->post_type_labels->menu_name,
                        'filter_items_list'         => $this->view_data->cpt->post_type_labels->filter_items_list,
                        'items_list_navigation'     => $this->view_data->cpt->post_type_labels->items_list_navigation,
                        'items_list'                => $this->view_data->cpt->post_type_labels->items_list,
                        'item_published'            => $this->view_data->cpt->post_type_labels->item_published,
                        'item_published_privately'  => $this->view_data->cpt->post_type_labels->item_published_privately,
                        'item_reverted_to_draft'    => $this->view_data->cpt->post_type_labels->item_reverted_to_draft,
                        'item_scheduled'            => $this->view_data->cpt->post_type_labels->item_scheduled,
                        'item_updated'              => $this->view_data->cpt->post_type_labels->item_updated
                    ),
                    'post_type_label_all'           => $this->view_data->post_type_label_all,
                    'post_type_label_singular_all'  => $this->view_data->post_type_label_singular_all,
                    'description'                   => $this->view_data->cpt->post_type_description
                ),
                'settings' => array (
                    'is_public'                     => $this->view_data->cpt->post_type_is_public,
                    'is_hierarchical'               => $this->view_data->cpt->post_type_is_hierarchical,
                    'exclude_from_search'           => $this->view_data->cpt->post_type_exclude_from_search,
                    'is_publicly_queryable'         => $this->view_data->cpt->post_type_is_publicly_queryable,
                    'show_in_ui'                    => $this->view_data->cpt->post_type_show_in_ui,
                    'show_in_menu'                  => $this->view_data->cpt->post_type_show_in_menu,
                    'show_in_nav_menus'             => $this->view_data->cpt->post_type_show_in_nav_menus,
                    'show_in_admin_bar'             => $this->view_data->cpt->post_type_show_in_admin_bar,
                    'show_in_rest'                  => $this->view_data->cpt->post_type_show_in_rest,
                    'rest_base'                     => $this->view_data->cpt->post_type_rest_base,
                    'rest_controller_class'         => $this->view_data->cpt->post_type_rest_controller_class,
                    'menu_position'                 => $this->view_data->cpt->post_type_menu_position,
                    'menu_icon'                     => $this->view_data->cpt->post_type_menu_icon,
                    'capability_type'               => $this->view_data->cpt->post_capability_type,
                    'map_meta_cap'                  => $this->view_data->cpt->post_type_map_meta_cap,
                    'supports'                      => $this->view_data->cpt->post_type_supports,
                    'custom_supports'               => $this->view_data->cpt->post_type_custom_supports,
                    'register_meta_box_cb'          => $this->view_data->cpt->post_type_register_meta_box_cb,
                    'has_archive'                   => $this->view_data->cpt->post_type_has_archive,
                    'archive_slug'                  => $this->view_data->cpt->post_type_archive_slug,
                    'rewrite'                       => $this->view_data->cpt->post_type_rewrite,
                    'rewrite_rules'                 => $this->view_data->cpt->post_type_rewrite_rules,
                    'query_var'                     => $this->view_data->cpt->post_type_query_var,
                    'query_var_slug'                => $this->view_data->cpt->post_type_query_var_slug,
                    'can_export'                    => $this->view_data->cpt->post_type_can_export,
                    'delete_with_user'              => $this->view_data->cpt->post_type_delete_with_user
                ),
                'taxonomies'                        => $this->view_data->cpt->post_type_taxonomies
            );

            /**
             * Clear class $wpdb SQL cache.
             */
            $this->wpdb->flush();

            /**
             * Update cpt details.
             */
           $result = $this->wpdb->update( $this->cpt_table, 
                array(
                    'cpt_key'               => $this->view_data->cpt->post_type_key,
                    'cpt_args'              => base64_encode( serialize ( $args ) ),
                    'cpt_date_modified'     => date( 'Y-m-d H:i:s' ),
                    'cpt_last_modified_by'  => $this->view_data->get_user()
                ),
                array( 
                    'id' => $this->view_data->cpt->post_type_id 
                ), 
                array(
                    '%s',
                    '%s',
                    '%s',
                    '%d'
                ), 
                array(
                    '%d'
                ) 
            );

            /**
             * Check for errors with last query. 
             */
            if( $this->wpdb->last_error !== '' ) {
                /**
                 * If error, throw new exception.
                 */
                throw new \Exception( 'Error occurred: ' . $this->wpdb->last_error );
            }

            /**
             * Migrate posts if required.
             */
            if( $this->view_data->migrate_posts ) {

                /**
                 * Define posts table.
                 * 
                 * @since   1.0.0
                 * @var     string  $posts_tbl
                 */
                $posts_tbl = $this->wpdb->prefix . 'posts';

                /**
                 * Clear class $wpdb SQL cache.
                 */
                $this->wpdb->flush();

                /**
                 * SQL to migrate all posts to new post type.
                 */
                $this->wpdb->update(
                    $posts_tbl,
                    array(
                        'post_type'     => $this->view_data->cpt->post_type_key
                    ),
                    array(
                        'post_type'     => $this->view_data->current_post_type_key
                    ),
                    array(
                        '%s'
                    ),
                    array(
                        '%s'
                    )
                );

                /**
                 * Check for errors with last query. 
                 */
                if( $this->wpdb->last_error !== '' ) {
                    /**
                     * If error, throw new exception.
                     */
                    throw new \Exception( 'Error occurred: ' . $this->wpdb->last_error );
                }
            }
        
            /**
             * Return result of update statement.
             */
            return $result;

        }

        return false;

    }

    /**
     * Delete specified custom post type in database.
     * 
     * @since   1.0.0
     * @param   bigint      $id     The id of the cpt to be deleted. 
     * @return  void
     */
    public function delete_cpt ( $id ) {

        /**
         * Clear class $wpdb SQL cache.
         */
        $this->wpdb->flush();

        /**
         * Delete specified row from table.
        */
        $this->wpdb->delete( 
            $this->cpt_table, ['id' => $id], ['%d'] );

        /**
         * Check for errors with last query. 
         */
        if( $this->wpdb->last_error !== '' ) {
            /**
             * If error, throw new exception.
             */
            throw new \Exception( 'Error occurred: ' . $this->wpdb->last_error );
        }
    }

    /**
     * Disable specified custom post type.
     * 
     * Set is_active flag to false in database.
     * 
     * @since   1.0.0
     * @param   int     $id
     * @return  mixed   $result
     */
    public function disable_cpt ( $id = null ) {

        /**
         * Clear class $wpdb SQL cache.
         */
        $this->wpdb->flush();

        /**
         * Disable specified custom post type.
         */
        $result = $this->wpdb->update( $this->cpt_table, 
            array( 
                'cpt_is_active'         => 0,
                'cpt_date_modified'     => date( 'Y-m-d H:i:s' ),
                'cpt_last_modified_by'  => get_current_user_id()
            ), 
            array(
                'id' => $id
            ), 
            array(
                '%d',
                '%s',
                '%d'
            ),
            array(
                '%d'
            )
        );

        /**
         * Check for errors with last query. 
         */
        if( $this->wpdb->last_error !== '' ) {
            /**
             * If error, throw new exception.
             */
            throw new \Exception( 'Error occurred: ' . $this->wpdb->last_error );
        }

        return $result;
    }

    /**
     * Enable specified custom post type.
     * 
     * Set is_active flag to true in database.
     * 
     * @since   1.0.0
     * @param   int     $id
     * @return  mixed   $result
     */
    public function enable_cpt( $id = null ) {

        /**
         * Clear class $wpdb SQL cache.
         */
        $this->wpdb->flush();

        /**
         * Enable specified custom post type.
         */
        $result = $this->wpdb->update( $this->cpt_table, 
            array(
                'cpt_is_active' => 1,
                'cpt_date_modified'     => date( 'Y-m-d H:i:s' ),
                'cpt_last_modified_by'  => get_current_user_id()
            ), 
            array( 
                'id' => $id
            ), 
            array( 
                '%d',
                '%s',
                '%d'
            ), 
            array(
                '%d'
            )
        );

        /**
         * Check for errors with last query. 
         */
        if( $this->wpdb->last_error !== '' ) {
            /**
             * If error, throw new exception.
             */
            throw new \Exception( 'Error occurred: ' . $this->wpdb->last_error );
        }

        return $result;
    }

    /**
     * Get number of custom post types registered by plugin.
     * 
     * @since   1.0.0
     * @param   void
     * @return  bigint
     */
    public function get_cwf_cpt_count( $active = null ) {

        /**
         * Clear class $wpdb SQL cache.
         */
        $this->wpdb->flush();

        /**
         * SQL for retrieving number of custom post type records in the database.
         * 
         * @since   1.0.0
         * @var     string      $sql
         */
        $sql = "SELECT COUNT(*) FROM " . $this->cpt_table;
        $sql .= $active !== null ? ' WHERE cpt_is_active = ' . ( $active ? '1' : '0' ) : '';

        /**
         * Execute SQL query to retrieve count.
         */
        $row_count = $this->wpdb->get_var( $sql );

        /**
         * Check for errors with last query. 
         */
        if( $this->wpdb->last_error !== '' ) {
            /**
             * If error, throw new exception.
             */
            throw new \Exception( 'Error occurred: ' . $this->wpdb->last_error );
        }

        /**
         * Return row count value.
         */
        return empty( $row_count ) ? 0 : $row_count;
    }

    /**
     * Get post type key of registered cpt.
     * 
     * @since   1.0.0
     * @param   void
     * @return  string
     */
    public function get_cpt_post_type_key( $id ) {

        /**
         * Variable to store post type key.
         * 
         * @since   1.0.0
         * @var     string  $post_type_key
         */
        $post_type_key = '';

        if( ! empty( $id ) ) {

            /**
             * The SQL for retrieving the current cpt data.
             * 
             * @since   1.0.0
             * @var     string  $sql
             */
            $sql = "SELECT * FROM " . $this->cpt_table
            . " WHERE id = " . $id;

            /**
             * Clear class $wpdb SQL cache.
             */
            $this->wpdb->flush();

            /**
             * Execute SQL against WordPress database and retrieve custom post type.
             */
            $this->results = $this->wpdb->get_results( $sql );

            /**
             * Check for errors with last query. 
             */
            if( $this->wpdb->last_error !== '' ) {
                /**
                 * If error, throw new exception.
                 */
                throw new \Exception( 'Error occurred: ' . $this->wpdb->last_error );
            }

            /**
             * Update post type key variable. 
             */
            $post_type_key = $this->results[0]->cpt_key;

        }

        return $post_type_key;

    }

    /**
     * Get number of custom post types registered by sources other than the plugin.
     * 
     * @since   1.0.0
     * @param   void
     * @return  bigint
     */
    public function get_non_cwf_cpt_count() {

        /**
         * Get registered post types.
         * 
         * @since   1.0.0
         * @param   array   $post_types
         */
        $post_types = get_post_types();

        /**
         * Retrieve registered cwf custom post type names.
         */
        self::get_all_cwf_custom_post_types( null, true );

        /**
         * Add retrieved names to cwf post types array.
         * 
         * @since   1.0.0
         * @var     array   $cwf_post_types 
         */
        $cwf_post_types = array();
        foreach( $this->results as $result ) {
            $cwf_post_types[] = $result->cpt_key;
        }

        /**
         * Retrieve list of in-built core WP post types.
         */
        $wp_post_types = CWF_Config::get_setting_value( 'reserved_post_types' ); 

        /**
         * Remove non-applicable post types from 'other sources' array.
         */
        foreach( $post_types as $post_type ) {

            /**
             * Remove post types registered by the plugin.
             */
            if( in_array( $post_type, $cwf_post_types ) ) {
                unset( $post_types[$post_type] );
                continue;
            }

            /**
             * Remove in-built core WP post types.
             */
            if( in_array( $post_type, $wp_post_types ) ) {
                unset( $post_types[$post_type] );
                continue;
            }
        }

        return sizeof( $post_types );
    }

    /**
     * Format cpt data for register_post_type function.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     * @link    https://developer.wordpress.org/reference/functions/register_post_type/
     */
    public function registration_format() {
        
        foreach( $this->results as $cpt ){
            
            /**
             * Unserialize retrieved data.
             * 
             * @since   1.0.0
             * @var     object  $data
             */
            $data = unserialize( base64_decode( $cpt->cpt_args ) );

            /**
             * Construct arguments param for register_post_type function.
             * 
             * @since   1.0.0
             * @var     array   $cpt_args
             */
            $cpt_args = array(
                'label' => strval( $data['labels']['post_type_label'] ),
                'labels' => array(
                    'name'                      => strval( $data['labels']['post_type_label'] ),
                    'singular_name'             => strval( $data['labels']['post_type_labels']['singular_name'] ),
                    'add_new'                   => strval( $data['labels']['post_type_labels']['add_new'] ),
                    'add_new_item'              => strval( $data['labels']['post_type_labels']['add_new_item'] ),
                    'edit_item'                 => strval( $data['labels']['post_type_labels']['edit_item'] ),
                    'new_item'                  => strval( $data['labels']['post_type_labels']['new_item'] ),
                    'view_item'                 => strval( $data['labels']['post_type_labels']['view_item'] ),
                    'view_items'                => strval( $data['labels']['post_type_labels']['view_items'] ),
                    'search_items'              => strval( $data['labels']['post_type_labels']['search_items'] ),
                    'not_found'                 => strval( $data['labels']['post_type_labels']['not_found'] ),
                    'not_found_in_trash'        => strval( $data['labels']['post_type_labels']['not_found_in_trash'] ),
                    'parent_item_colon'         => strval( $data['labels']['post_type_labels']['parent_item_colon'] ),
                    'all_items'                 => strval( $data['labels']['post_type_labels']['all_items'] ),
                    'archives'                  => strval( $data['labels']['post_type_labels']['archives'] ),
                    'attributes'                => strval( $data['labels']['post_type_labels']['attributes'] ),
                    'insert_into_item'          => strval( $data['labels']['post_type_labels']['insert_into_item'] ),
                    'uploaded_to_this_item'     => strval( $data['labels']['post_type_labels']['uploaded_to_this_item'] ),
                    'featured_image'            => strval( $data['labels']['post_type_labels']['featured_image'] ),
                    'set_featured_image'        => strval( $data['labels']['post_type_labels']['set_featured_image'] ),
                    'remove_featured_image'     => strval( $data['labels']['post_type_labels']['remove_featured_image'] ),
                    'use_featured_image'        => strval( $data['labels']['post_type_labels']['use_featured_image'] ),
                    'menu_name'                 => strval( $data['labels']['post_type_labels']['menu_name'] ),
                    'filter_items_list'         => strval( $data['labels']['post_type_labels']['filter_items_list'] ),
                    'items_list_navigation'     => strval( $data['labels']['post_type_labels']['items_list_navigation'] ),
                    'items_list'                => strval( $data['labels']['post_type_labels']['items_list'] ),
                    'item_published'            => strval( $data['labels']['post_type_labels']['item_published'] ),
                    'item_published_privately'  => strval( $data['labels']['post_type_labels']['item_published_privately'] ),
                    'item_reverted_to_draft'    => strval( $data['labels']['post_type_labels']['item_reverted_to_draft'] ),
                    'item_scheduled'            => strval( $data['labels']['post_type_labels']['item_scheduled'] ),
                    'item_updated'              => strval( $data['labels']['post_type_labels']['item_updated'] ),
                ),
                'description'           => strval( $data['labels']['description'] ),
                'public'                => boolval( $data['settings']['is_public'] ),
                'hierarchical'          => boolval( $data['settings']['is_hierarchical'] ),
                'exclude_from_search'   => boolval( $data['settings']['exclude_from_search'] ),
                'publicly_queryable'    => boolval( $data['settings']['is_publicly_queryable'] ),
                'show_ui'               => boolval( $data['settings']['show_in_ui'] ),
                'show_in_nav_menus'     => boolval( $data['settings']['show_in_menu'] ),
                'show_in_admin_bar'     => boolval( $data['settings']['show_in_admin_bar'] ),
                'show_in_rest'          => boolval( $data['settings']['show_in_rest'] ),
                'rest_base'             => strval( $data['settings']['rest_base'] ),
                'rest_controller_class' => strval( $data['settings']['rest_controller_class'] ),
                'map_meta_cap'          => boolval( $data['settings']['map_meta_cap'] ),
                'can_export'            => boolval( $data['settings']['can_export'] ),
                'delete_with_user'      => boolval( $data['settings']['delete_with_user'] ), 
            );

            if( ! empty( $data['settings']['menu_position'] ) ) {
                /**
                 * Assign menu position.
                 */
                $cpt_args['menu_position'] = intval( $data['settings']['menu_position'] );
            }

            if ( ! empty( $data['settings']['menu_icon'] ) ) {
                /**
                 * Assign menu icon.
                 */
                $cpt_args['menu_icon'] = $data['settings']['menu_icon'];
            }

            if ( ! empty( $data['settings']['capability_type'] ) ) {

                /**
                 * Assign cpt capability type.
                 */
                $cpt_args['capability_type'] = $data['settings']['capability_type'];

            } 

            $cpt_args['supports'] = array();
            if ( boolval( $data['settings']['supports']['title'] ) ) array_push( $cpt_args['supports'], 'title' );
            if ( boolval( $data['settings']['supports']['editor'] ) ) array_push( $cpt_args['supports'], 'editor' );
            if ( boolval( $data['settings']['supports']['thumbnail'] ) ) array_push( $cpt_args['supports'], 'thumbnail' );
            if ( boolval( $data['settings']['supports']['comments'] ) ) array_push( $cpt_args['supports'], 'comments' );
            if ( boolval( $data['settings']['supports']['revisions'] ) ) array_push( $cpt_args['supports'], 'revisions' );
            if ( boolval( $data['settings']['supports']['trackbacks'] ) ) array_push( $cpt_args['supports'], 'trackbacks' );
            if ( boolval( $data['settings']['supports']['author'] ) ) array_push( $cpt_args['supports'], 'author' );
            if ( boolval( $data['settings']['supports']['excerpt'] ) ) array_push( $cpt_args['supports'], 'excerpt' );
            if ( boolval( $data['settings']['supports']['page-attributes'] ) ) array_push( $cpt_args['supports'], 'page-attributes' );
            if ( boolval( $data['settings']['supports']['custom-fields'] ) ) array_push( $cpt_args['supports'], 'custom-fields' );
            if ( boolval( $data['settings']['supports']['post-formats'] ) ) array_push( $cpt_args['supports'], 'post-formats' );

            if ( ! empty( $data['settings']['custom_supports'] ) ){
                foreach( $data['settings']['custom_supports'] as $custom_support ) {
                    array_push( $cpt_args['supports'], sanitize_text_field( $custom_support ) );
                }
            } 

            $cpt_args['taxonomies'] = array();
            if ( ! empty( $data['taxonomies'] ) ){
                foreach( $data['taxonomies'] as $taxonomy ) {
                    array_push( $cpt_args['taxonomies'], sanitize_text_field( $taxonomy ) );
                }
            }

            if ( ! empty( $data['settings']['has_archive'] ) ) {
                if( $data['settings']['has_archive'] && ! empty( $data['settings']['archive_slug'] ) )  {
                    $cpt_args['has_archive'] = sanitize_text_field( $data['settings']['archive_slug'] );
                }
                else {
                    $cpt_args['has_archive'] = $data['settings']['has_archive'];
                }
            }

            if ( ! empty( $data['settings']['rewrite'] ) ) {
                if ( $data['settings']['rewrite'] ) {
                    $cpt_args['rewrite'] = array(
                        'slug'          => $data['settings']['rewrite_rules']['slug'],
                        'with-front'    => $data['settings']['rewrite_rules']['with-front'],
                        'feeds'         => $data['settings']['rewrite_rules']['feeds'],
                        'pages'         => $data['settings']['rewrite_rules']['pages']
                    );
                }
                else{
                    $cpt_args['rewrite'] = $data['settings']['rewrite'];
                }
            }

            if( ! empty( $data['settings']['query_var']) ){
                if( $data['settings']['query_var'] && ! empty( $data['settings']['query_var_slug'] ) ){
                    $cpt_args['query_var'] = $data['settings']['query_var_slug'];
                }
                else {
                    $cpt_args['query_var'] = $data['settings']['query_var'];
                }
            }
            
            $this->cpt_collection[] = array(
                'cpt_key'   => $cpt->cpt_key,
                'cpt_args'  => $cpt_args,
            );
        }
    }

    /**
     * Format cpt data for admin WP_List_Table.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function tabulate_cwf_data() {

        /**
         * Assign data to columns for each custom post type. 
         */
        foreach ( $this->results as $result ) {

            /**
             * Decode and unserialize post type arguments from database.
             */
            $args = unserialize( base64_decode( $result->cpt_args ) );

            /**
             * Get post type description.
             */
            $description = empty( $args['labels']['description'] ) ? '&mdash;' : $args['labels']['description'];

            /**
             * Compile data for labels column. 
             */
            $labels  = sprintf( $this->label_placeholders['label'], esc_html( $args['labels']['post_type_labels']['name'] ) );
            $labels .= sprintf( $this->label_placeholders['label_singular'], esc_html( $args['labels']['post_type_labels']['singular_name'] ) );
            $labels .= sprintf( $this->label_placeholders['label_add_new'], esc_html( $args['labels']['post_type_labels']['add_new'] ) );
            $labels .= sprintf( $this->label_placeholders['label_add_new_item'], esc_html( $args['labels']['post_type_labels']['add_new_item'] ) );
            $labels .= sprintf( $this->label_placeholders['label_edit_item'], esc_html( $args['labels']['post_type_labels']['edit_item'] ) );
            $labels .= sprintf( $this->label_placeholders['label_new_item'], esc_html( $args['labels']['post_type_labels']['new_item'] ) );
            $labels .= sprintf( $this->label_placeholders['label_view_item'], esc_html( $args['labels']['post_type_labels']['view_item'] ) );
            $labels .= sprintf( $this->label_placeholders['label_view_items'], esc_html( $args['labels']['post_type_labels']['view_items'] ) );
            $labels .= sprintf( $this->label_placeholders['label_search_items'], esc_html( $args['labels']['post_type_labels']['search_items'] ) );
            $labels .= sprintf( $this->label_placeholders['label_not_found'], esc_html( $args['labels']['post_type_labels']['not_found'] ) );
            $labels .= sprintf( $this->label_placeholders['label_not_found_in_trash'], esc_html( $args['labels']['post_type_labels']['not_found_in_trash'] ) );
            $labels .= sprintf( $this->label_placeholders['label_parent_item_colon'], esc_html( $args['labels']['post_type_labels']['parent_item_colon'] ) );
            $labels .= sprintf( $this->label_placeholders['label_all_items'], esc_html( $args['labels']['post_type_labels']['all_items'] ) );
            $labels .= sprintf( $this->label_placeholders['label_archives'], esc_html( $args['labels']['post_type_labels']['archives'] ) );
            $labels .= sprintf( $this->label_placeholders['label_attributes'], esc_html( $args['labels']['post_type_labels']['attributes'] ) );
            $labels .= sprintf( $this->label_placeholders['label_insert_into_item'], esc_html( $args['labels']['post_type_labels']['insert_into_item'] ) );
            $labels .= sprintf( $this->label_placeholders['label_uploaded_to_this_item'], esc_html( $args['labels']['post_type_labels']['uploaded_to_this_item'] ) );
            $labels .= sprintf( $this->label_placeholders['label_featured_image'], esc_html( $args['labels']['post_type_labels']['featured_image'] ) );
            $labels .= sprintf( $this->label_placeholders['label_set_featured_image'], esc_html( $args['labels']['post_type_labels']['set_featured_image'] ) );
            $labels .= sprintf( $this->label_placeholders['label_remove_freatured_image'], esc_html( $args['labels']['post_type_labels']['remove_featured_image'] ) );
            $labels .= sprintf( $this->label_placeholders['label_use_featured_image'], esc_html( $args['labels']['post_type_labels']['use_featured_image'] ) );
            $labels .= sprintf( $this->label_placeholders['label_menu_name'], esc_html( $args['labels']['post_type_labels']['menu_name'] ) );
            $labels .= sprintf( $this->label_placeholders['label_filter_items_list'], esc_html( $args['labels']['post_type_labels']['filter_items_list'] ) );
            $labels .= sprintf( $this->label_placeholders['label_items_list_navigation'], esc_html( $args['labels']['post_type_labels']['items_list_navigation'] ) );
            $labels .= sprintf( $this->label_placeholders['label_items_list'], esc_html( $args['labels']['post_type_labels']['items_list'] ) );
            $labels .= sprintf( $this->label_placeholders['label_item_published'], esc_html( $args['labels']['post_type_labels']['item_published'] ) );
            $labels .= sprintf( $this->label_placeholders['label_item_published_privately'], esc_html( $args['labels']['post_type_labels']['item_published_privately'] ) );
            $labels .= sprintf( $this->label_placeholders['label_item_reverted_to_draft'], esc_html( $args['labels']['post_type_labels']['item_reverted_to_draft'] ) );
            $labels .= sprintf( $this->label_placeholders['label_item_scheduled'], esc_html( $args['labels']['post_type_labels']['item_scheduled'] ) );
            $labels .= sprintf( $this->label_placeholders['label_item_updated'], esc_html( $args['labels']['post_type_labels']['item_updated'] ) );
            
            /**
             * Compile data for settings column. 
             */
            $settings  = sprintf( $this->settings_placeholders['is_public'], esc_html( boolval( $args['settings']['is_public'] ) ? 'Yes' : 'No' ) );
            $settings .= sprintf( $this->settings_placeholders['is_hierarchical'], esc_html( boolval( $args['settings']['is_hierarchical'] )  ? 'Yes' : 'No' ) );
            $settings .= sprintf( $this->settings_placeholders['exclude_from_search'], esc_html( boolval( $args['settings']['exclude_from_search'] ) ? 'Yes' : 'No' ) );
            $settings .= sprintf( $this->settings_placeholders['publicly_queryable'], esc_html( boolval( $args['settings']['is_publicly_queryable'] ) ? 'Yes' : 'No' ) );
            $settings .= sprintf( $this->settings_placeholders['show_in_ui'], esc_html( boolval( $args['settings']['show_in_ui'] ) ? 'Yes' : 'No' ) );
            $settings .= sprintf( $this->settings_placeholders['show_in_menu'], esc_html( boolval( $args['settings']['show_in_menu'] ) ? 'Yes' : 'No' ) );
            $settings .= sprintf( $this->settings_placeholders['show_in_nav_menus'], esc_html( boolval( $args['settings']['show_in_nav_menus'] ) ? 'Yes' : 'No' ) );
            $settings .= sprintf( $this->settings_placeholders['show_in_admin_bar'], esc_html( boolval( $args['settings']['show_in_admin_bar'] ) ? 'Yes' : 'No' ) );
            $settings .= sprintf( $this->settings_placeholders['show_in_rest'], esc_html( boolval( $args['settings']['show_in_rest'] ) ? 'Yes' : 'No' ) );

            if( boolval( $args['settings']['show_in_rest'] ) ) {
                $settings .= sprintf( $this->settings_placeholders['rest_base'], esc_html( empty( $args['settings']['rest_base'] ) ? 'Default' : $args['settings']['rest_base'] ) );
                $settings .= sprintf( $this->settings_placeholders['rest_controller_class'], esc_html( empty( $args['settings']['rest_controller_class'] ) ? 'Default' : $args['settings']['rest_controller_class'] ) ); 
            }
           
            $settings .= sprintf( $this->settings_placeholders['menu_position'], esc_html( empty( $args['settings']['menu_position'] ) ? 'Default' : $args['settings']['menu_position'] ) );
            $settings .= sprintf( $this->settings_placeholders['menu_icon'], esc_html( basename( $args['settings']['menu_icon'] ) ) );
            $settings .= sprintf( $this->settings_placeholders['capability_type'], esc_html( $args['settings']['capability_type'] ) );

            $supports = array();
            foreach( $args['settings']['supports'] as $key => $value ) {
                if ( boolval( $value ) ) {
                    $supports[] = strval( $key );
                }
            }

            $all_supports = array_merge( $supports, $args['settings']['custom_supports'] );
            $settings .= sprintf( $this->settings_placeholders['supports'], esc_html( empty( $all_supports ) ? 'NULL' : implode( ", ", $all_supports ) ) );
            $settings .= sprintf( $this->settings_placeholders['has_archive'], esc_html( boolval( $args['settings']['has_archive'] ) ? 'Yes' : 'No' ) );

            if( boolval( $args['settings']['has_archive'] ) ) {
                $settings .= sprintf( $this->settings_placeholders['archive_slug'], esc_html( empty( $args['settings']['archive_slug'] ) ? 'Default' : $args['settings']['archive_slug'] ) );
            }

            $settings .= sprintf( $this->settings_placeholders['rewrite'], esc_html( boolval( $args['settings']['rewrite'] ) ? 'Yes' : 'No' ) );
            
            if( boolval( $args['settings']['rewrite'] ) ) {
                $settings .= $this->settings_placeholders['rewrite_rules'];
                $settings .= sprintf( $this->settings_placeholders['rewrite_rules_slug'], esc_html( empty( $args['settings']['rewrite_rules']['slug'] ) ? 'Default' : $args['settings']['rewrite_rules']['slug'] ) );
                $settings .= sprintf( $this->settings_placeholders['rewrite_rules_with_front'], esc_html( boolval( $args['settings']['rewrite_rules']['with-front'] ) ? 'Yes' : 'No' ) );
                $settings .= sprintf( $this->settings_placeholders['rewrite_rules_feeds'], esc_html( boolval( $args['settings']['rewrite_rules']['feeds'] ) ? 'Yes' : 'No' ) );
                $settings .= sprintf( $this->settings_placeholders['rewrite_rules_pages'], esc_html( boolval( $args['settings']['rewrite_rules']['pages'] ) ? 'Yes' : 'No' ) );
            }
            
            $settings .= sprintf( $this->settings_placeholders['query_var'], esc_html( boolval( $args['settings']['query_var'] ) ? 'Yes' : 'No' ) );

            if( boolval( $args['settings']['query_var'] ) ) {
                $settings .= sprintf( $this->settings_placeholders['query_var_slug'], esc_html( empty( $args['settings']['query_var_slug'] ) ? 'Default' : $args['settings']['query_var_slug'] ) ); 
            }

            $settings .= sprintf( $this->settings_placeholders['can_export'], esc_html( boolval( $args['settings']['can_export'] ) ? 'Yes' : 'No' ) );
            $settings .= sprintf( $this->settings_placeholders['delete_with_user'], esc_html( boolval( $args['settings']['delete_with_user'] ) ? 'Yes' : 'No' ) );
            
            /**
             * Compile data for taxonomies.
             */
            $taxonomies = '';
            if( empty( $args['taxonomies'] ) ) {
                $taxonomies = '&mdash;';
            }
            else {
                foreach ( $args['taxonomies'] as $taxonomy ) {
                    $taxonomy_object = get_taxonomy( $taxonomy );
                    if( boolval( $result->cpt_is_active ) ) {
                        $taxonomies .= sprintf( '<a href="%s">%s</a><br />', esc_url( admin_url( "edit-tags.php?taxonomy=" . $taxonomy . "&post_type=" . $result->cpt_key ) ), $taxonomy_object->label );
                    }
                    else {
                        $taxonomies .= sprintf( '%s<br />', esc_html( $taxonomy_object->label ) );
                    }
                }
                $taxonomies .= '</ol>';
            }

            /**
             * Add compiled data to collection. 
             */
            $this->cpt_collection[] = array(
                'id'            => $result->id,
                'post_type_key' => $result->cpt_key,
                'description'   => $description,
                'labels'        => $labels,
                'settings'      => $settings,
                'taxonomies'    => $taxonomies,
            );

        }
    }

    /**
     * Format cpt data from post objects for admin WP_List_Table.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function tabulate_object_data( $post_type_objects ) {

        /**
         * Reset cpt collection.
         */
        $this->cpt_collection = array();

        foreach( $post_type_objects as $post_type ) {

            /**
             * Get post type description.
             */
            $description = empty( $post_type->description ) ? '&mdash;' : $post_type->description;

            /**
             * Compile data for labels column.
             */
            $labels = sprintf( $this->label_placeholders['label'], $post_type->label );
            $labels .= sprintf( $this->label_placeholders['label_singular'], $post_type->labels->singular_name );
            $labels .= sprintf( $this->label_placeholders['label_add_new'], $post_type->labels->add_new );
            $labels .= sprintf( $this->label_placeholders['label_add_new_item'], $post_type->labels->add_new_item );
            $labels .= sprintf( $this->label_placeholders['label_edit_item'], $post_type->labels->edit_item );
            $labels .= sprintf( $this->label_placeholders['label_new_item'], $post_type->labels->new_item );
            $labels .= sprintf( $this->label_placeholders['label_view_item'], $post_type->labels->view_item );
            $labels .= sprintf( $this->label_placeholders['label_view_items'], $post_type->labels->view_items );
            $labels .= sprintf( $this->label_placeholders['label_search_items'], $post_type->labels->search_items );
            $labels .= sprintf( $this->label_placeholders['label_not_found'], $post_type->labels->not_found );
            $labels .= sprintf( $this->label_placeholders['label_not_found_in_trash'], $post_type->labels->not_found_in_trash );
            $labels .= sprintf( $this->label_placeholders['parent_item_colon'], $post_type->labels->parent_item_colon );
            $labels .= sprintf( $this->label_placeholders['label_all_items'], $post_type->labels->all_items );
            $labels .= sprintf( $this->label_placeholders['label_archives'], $post_type->labels->archives );
            $labels .= sprintf( $this->label_placeholders['label_attributes'], $post_type->labels->attributes );
            $lables .= sprintf( $this->label_placeholders['label_insert_into_item'], $post_type->labels->insert_into_item );
            $labels .= sprintf( $this->label_placeholders['label_uploaded_to_this_item'], $post_type->labels->uploaded_to_this_item );
            $labels .= sprintf( $this->label_placeholders['label_featured_image'], $post_type->labels->featured_image );
            $labels .= sprintf( $this->label_placeholders['label_set_featured_image'], $post_type->labels->set_featured_image );
            $labels .= sprintf( $this->label_placeholders['label_remove_featured_image'], $post_type->labels->remove_featured_image );
            $labels .= sprintf( $this->label_placeholders['label_use_featured_image'], $post_type->labels->use_featured_image );
            $labels .= sprintf( $this->label_placeholders['label_filter_items_list'], $post_type->labels->filter_items_list );
            $labels .= sprintf( $this->label_placeholders['label_menu_name'], $post_type->labels->menu_name );
            $labels .= sprintf( $this->label_placeholders['label_items_list_navigation'], $post_type->labels->items_list_navigation );
            $labels .= sprintf( $this->label_placeholders['label_items_list'], $post_type->labels->items_list );
            $labels .= sprintf( $this->label_placeholders['label_item_published'], $post_type->labels->item_published );
            $labels .= sprintf( $this->label_placeholders['label_item_published_privately'], $post_type->labels->item_published_privately );
            $labels .= sprintf( $this->label_placeholders['label_item_reverted_to_draft'], $post_type->labels->item_reverted_to_draft );
            $labels .= sprintf( $this->label_placeholders['label_item_scheduled'], $post_type->labels->item_scheduled );
            $labels .= sprintf( $this->label_placeholders['label_item_updated'], $post_type->labels->item_updated );

            /**
             * Compile data for settings column.
             */
            $settings  = sprintf( $this->settings_placeholders['is_public'], boolval( $post_type->public ) ? 'Yes' : 'No' );
            $settings .= sprintf( $this->settings_placeholders['is_hierarchical'], boolval ( $post_type->hierarchical ) ? 'Yes' : 'No' );
            $settings .= sprintf( $this->settings_placeholders['exclude_from_search'], boolval( $post_type->exclude_from_search ) ? 'Yes' : 'No' );
            $settings .= sprintf( $this->settings_placeholders['publicly_queryable'], boolval( $post_type->publicly_queryable ) ? 'Yes' : 'No' );
            $settings .= sprintf( $this->settings_placeholders['show_in_ui'], boolval( $post_type->show_ui ) ? 'Yes' : 'No' );
            $settings .= sprintf( $this->settings_placeholders['show_in_menu'], boolval( $post_type->show_in_menu ) ? 'Yes' : 'No' );
            $settings .= sprintf( $this->settings_placeholders['show_in_nav_menus'], boolval( $post_type->show_in_nav_menus ) ? 'Yes' : 'No' );
            $settings .= sprintf( $this->settings_placeholders['show_in_admin_bar'], boolval( $post_type->show_in_admin_bar ) ? 'Yes' : 'No' );
            $settings .= sprintf( $this->settings_placeholders['show_in_rest'], boolval( $post_type->show_in_rest ) ? 'Yes' : 'No' );
            
            if( $post_type->show_in_rest ) {
                $settings .= sprintf( $this->settings_placeholders['rest_base'], empty( strval( $post_type->rest_base ) ) ? 'NULL' : strval( $post_type->rest_base ) );
                $settings .= sprintf( $this->settings_placeholders['rest_controller_class'], empty( strval( $post_type->rest_controller_class ) ) ? 'NULL' : strval( $post_type->rest_base ) );
            }

            $settings .= sprintf( $this->settings_placeholders['menu_position'], ( empty( $post_type->menu_position ) ? 'Default' : $post_type->menu_position ) );
            $settings .= sprintf( $this->settings_placeholders['menu_icon'], empty( $post_type->menu_icon ) ? 'NULL' : basename( $post_type->menu_icon ) );
            $settings .= sprintf( $this->settings_placeholders['capability_type'], strval( $post_type->capability_type ) );

            $supports = get_all_post_type_supports( $post_type->name );
            $supports_list = array();
            if( is_array( $supports ) ) {
                if( sizeof( $supports ) > 0 ) {
                    foreach( $supports as $key => $value ) {
                        $supports_list[] = strval( $key ); 
                    }
                }
            }

            $settings .= sprintf( $this->settings_placeholders['supports'], empty( $supports_list ) ? 'NULL' : implode( ", ", $supports_list ) );
            $settings .= sprintf( $this->settings_placeholders['has_archive'], boolval( $post_type->has_archive ) || is_string( $post_type->has_archive ) ? 'Yes' : 'No' );
        
            if( boolval( $post_type->has_archive) || is_string( $post_type->has_archive ) ) {
                $settings .= sprintf( $this->settings_placeholders['archive_slug'], strval( $post_type->has_archive ) );
            }

            $settings .= sprintf( $this->settings_placeholders['rewrite'], boolval( $post_Type->rewrite ) || is_array( $post_type->rewrite ) ? 'Yes' : 'No' );

            if( boolval( $post_Type->rewrite ) || is_array( $post_type->rewrite ) ) {
                $settings .= $this->settings_placeholders['rewrite_rules'];
                $settings .= sprintf( $this->settings_placeholders['rewrite_rules_slug'], ( empty( $post_type->rewrite['slug'] ) ? 'Default' : $post_type->rewrite['slug'] ) );
                $settings .= sprintf( $this->settings_placeholders['rewrite_rules_with_front'], boolval( $post_type->rewrite['with-front'] ) ? 'Yes' : 'No' );
                $settings .= sprintf( $this->settings_placeholders['rewrite_rules_feeds'], ( boolval( $post_type->rewrite['feeds'] ) ? 'Yes' : 'No' ) );
                $settings .= sprintf( $this->settings_placeholders['rewrite_rules_pages'], ( boolval( $post_type->rewrite['pages'] ) ? 'Yes' : 'No' ) );
            }

            $settings .= sprintf( $this->settings_placeholders['query_var'], 'false' !== $post_type->query_var ? 'Yes' : 'No' );
            
            if( 'false' !== $post_type->query_var ) {
                $settings .= sprintf( $this->settings_placeholders['query_var_slug'], strval( $post_type->query_var ) );
            }
 
            $settings .= sprintf( $this->settings_placeholders['can_export'], boolval( $post_type->can_export ) ? 'Yes' : 'No' );
            $settings .= sprintf( $this->settings_placeholders['delete_with_user'], boolval( $post_type->delete_with_user ) ? 'Yes' : 'No' );

            /**
             * Compile data for taxonomies.
             */
            $taxonomies = '';
            $object_taxonomies = get_object_taxonomies( $post_type->name );
            if( empty( $object_taxonomies ) ) {
                $taxonomies = '&mdash;';
            }
            else {
                foreach( $object_taxonomies as $taxonomy ) {
                    $taxonomy_object = get_taxonomy ( $taxonomy );
                    $taxonomies .= sprintf( '%s<br/>', $taxonomy_object->label );
                }
            }

            $this->cpt_collection[] = array(
                'post_type_key'     => $post_type->name,
                'description'       => $description,
                'labels'            => $labels,
                'settings'          => $settings,
                'taxonomies'        => $taxonomies,
            );
        
        }
    }

    /**
     * Format cpt data for class object.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function populate_cpt_viewmodel( &$cpt_viewmodel ) {

        /**
         * Reset cpt collection.
         */
        $this->cpt_collection = array();

        foreach( $this->results as $result ) {

            /**
             * Unserialize retrieved data.
             * 
             * @since   1.0.0
             * @var     object  $data
             */
            $data = unserialize( base64_decode( $result->cpt_args ) );
            
            /**
             * Assign data to new cpt object.
             */
            $cpt_viewmodel->cpt->post_type_id = intval( $result->id );
            $cpt_viewmodel->cpt->post_type_key = strval( $result->cpt_key );
            $cpt_viewmodel->cpt->post_type_label = strval( $data['labels']['post_type_label'] );
            $cpt_viewmodel->cpt->post_type_labels->name = strval( $data['labels']['post_type_labels']['name'] ); 
            $cpt_viewmodel->cpt->post_type_labels->singular_name = strval( $data['labels']['post_type_labels']['singular_name'] );
            $cpt_viewmodel->cpt->post_type_labels->add_new = strval( $data['labels']['post_type_labels']['add_new'] );
            $cpt_viewmodel->cpt->post_type_labels->add_new_item = strval( $data['labels']['post_type_labels']['add_new_item'] );
            $cpt_viewmodel->cpt->post_type_labels->edit_item = strval( $data['labels']['post_type_labels']['edit_item'] );
            $cpt_viewmodel->cpt->post_type_labels->new_item = strval( $data['labels']['post_type_labels']['new_item'] );
            $cpt_viewmodel->cpt->post_type_labels->view_item = strval( $data['labels']['post_type_labels']['view_item'] );
            $cpt_viewmodel->cpt->post_type_labels->view_items = strval( $data['labels']['post_type_labels']['view_items'] );
            $cpt_viewmodel->cpt->post_type_labels->search_items = strval( $data['labels']['post_type_labels']['search_items'] );
            $cpt_viewmodel->cpt->post_type_labels->not_found = strval( $data['labels']['post_type_labels']['not_found'] );
            $cpt_viewmodel->cpt->post_type_labels->not_found_in_trash = strval( $data['labels']['post_type_labels']['not_found_in_trash'] );
            $cpt_viewmodel->cpt->post_type_labels->parent_item_colon = strval( $data['labels']['post_type_labels']['all_items'] );
            $cpt_viewmodel->cpt->post_type_labels->all_items = strval( $data['labels']['post_type_labels']['all_items'] );
            $cpt_viewmodel->cpt->post_type_labels->archives = strval( $data['labels']['post_type_labels']['archives'] );
            $cpt_viewmodel->cpt->post_type_labels->attributes = strval( $data['labels']['post_type_labels']['attributes'] );
            $cpt_viewmodel->cpt->post_type_labels->insert_into_item = strval( $data['labels']['post_type_labels']['insert_into_item'] );
            $cpt_viewmodel->cpt->post_type_labels->uploaded_to_this_item = strval( $data['labels']['post_type_labels']['uploaded_to_this_item'] );
            $cpt_viewmodel->cpt->post_type_labels->featured_image = strval( $data['labels']['post_type_labels']['featured_image'] );
            $cpt_viewmodel->cpt->post_type_labels->set_featured_image = strval( $data['labels']['post_type_labels']['set_featured_image'] );
            $cpt_viewmodel->cpt->post_type_labels->remove_featured_image = strval( $data['labels']['post_type_labels']['remove_featured_image'] );
            $cpt_viewmodel->cpt->post_type_labels->use_featured_image = strval( $data['labels']['post_type_labels']['use_featured_image'] );
            $cpt_viewmodel->cpt->post_type_labels->menu_name = strval( $data['labels']['post_type_labels']['menu_name'] );
            $cpt_viewmodel->cpt->post_type_labels->filter_items_list = strval( $data['labels']['post_type_labels']['filter_items_list'] );
            $cpt_viewmodel->cpt->post_type_labels->items_list_navigation = strval( $data['labels']['post_type_labels']['items_list_navigation'] );
            $cpt_viewmodel->cpt->post_type_labels->items_list = strval( $data['labels']['post_type_labels']['items_list'] );
            $cpt_viewmodel->cpt->post_type_labels->item_published = strval( $data['labels']['post_type_labels']['item_published'] );
            $cpt_viewmodel->cpt->post_type_labels->item_published_privately = strval( $data['labels']['post_type_labels']['item_published_privately'] );
            $cpt_viewmodel->cpt->post_type_labels->item_reverted_to_draft = strval( $data['labels']['post_type_labels']['item_reverted_to_draft'] );
            $cpt_viewmodel->cpt->post_type_labels->item_scheduled = strval( $data['labels']['post_type_labels']['item_scheduled'] );
            $cpt_viewmodel->cpt->post_type_labels->item_updated = strval( $data['labels']['post_type_labels']['item_updated'] );
            $cpt_viewmodel->cpt->post_type_description = strval( $data['labels']['description'] );
            $cpt_viewmodel->post_type_label_all = boolval( $data['labels']['post_type_label_all'] );
            $cpt_viewmodel->post_type_label_singular_all = boolval( $data['labels']['post_type_label_singular_all'] );
            $cpt_viewmodel->cpt->post_type_is_public = boolval( $data['settings']['is_public'] );
            $cpt_viewmodel->cpt->post_type_is_hierarchical = boolval( $data['settings']['is_hierarchical'] );
            $cpt_viewmodel->cpt->post_type_exclude_from_search = boolval( $data['settings']['exclude_from_search'] );
            $cpt_viewmodel->cpt->post_type_is_publicly_queryable = boolval( $data['settings']['is_publicly_queryable'] );
            $cpt_viewmodel->cpt->post_type_show_in_ui = boolval( $data['settings']['show_in_ui'] );
            $cpt_viewmodel->cpt->post_type_show_in_menu = boolval( $data['settings']['show_in_menu'] );
            $cpt_viewmodel->cpt->post_type_show_in_nav_menus = boolval( $data['settings']['show_in_nav_menus'] );
            $cpt_viewmodel->cpt->post_type_show_in_admin_bar = boolval( $data['settings']['show_in_admin_bar'] );
            $cpt_viewmodel->cpt->post_type_show_in_rest = boolval( $data['settings']['show_in_rest'] );
            $cpt_viewmodel->cpt->post_type_rest_base = strval( $data['settings']['rest_base'] );
            $cpt_viewmodel->cpt->post_type_rest_controller_class = strval( $data['settings']['rest_controller_class'] );
            $cpt_viewmodel->cpt->post_type_menu_position = empty( $data['settings']['menu_position']) ? null : intval( $data['menu_position'] );
            $cpt_viewmodel->cpt->post_type_menu_icon = strval( $data['settings']['menu_icon'] );
            $cpt_viewmodel->cpt->post_capability_type = strval( $data['settings']['capability_type'] );
            $cpt_viewmodel->cpt->post_type_map_meta_cap = empty( $data['settings']['map_meta_cap'] ) ? null : boolval( $data['settings']['map_meta_cap'] );
            $cpt_viewmodel->cpt->post_type_supports = $data['settings']['supports'];
            $cpt_viewmodel->cpt->post_type_custom_supports = $data['settings']['custom_supports'];
            $cpt_viewmodel->cpt->post_type_register_meta_box_cb = $data['settings']['register_meta_box_cb'];
            $cpt_viewmodel->cpt->post_type_taxonomies = $data['taxonomies'];
            $cpt_viewmodel->cpt->post_type_has_archive = boolval( $data['settings']['has_archive'] );
            $cpt_viewmodel->cpt->post_type_archive_slug = strval( $data['settings']['archive_slug'] );
            $cpt_viewmodel->cpt->post_type_rewrite = boolval( $data['settings']['rewrite'] );
            $cpt_viewmodel->cpt->post_type_rewrite_rules = $data['settings']['rewrite_rules'];
            $cpt_viewmodel->cpt->post_type_query_var = boolval( $data['settings']['query_var'] );
            $cpt_viewmodel->cpt->post_type_query_var_slug = strval( $data['settings']['query_var_slug'] );
            $cpt_viewmodel->cpt->post_type_can_export = boolval( $data['settings']['can_export'] );
            $cpt_viewmodel->cpt->post_type_delete_with_user = boolval( $data['settings']['delete_with_user'] );
        }
    }
}