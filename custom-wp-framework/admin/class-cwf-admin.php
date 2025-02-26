<?php

namespace Custom_WP_Framework\Admin;

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

// Load required classes.
use Custom_WP_Framework\Admin\Controllers;

/**
 * Main admin class for plugin.
 * 
 * @since   1.0.0
 */
class CWF_Admin {

    /**
     * Controller for custom post types.
     * 
     * @since   1.0.0
     * @var     CWF_CPT_Controller      $custom_post_types_controller
     */
    private $custom_post_types_controller;
    
    /**
     * Default constructor method.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function __construct() {

        /**
         * Load required files and classes.
         */
        $this->load_dependencies();

        /**
         * Create new instance of custom post types controller.
         */
        $this->custom_post_types_controller = new Controllers\CWF_CPT_Controller();

    }

    /**
     * Load required files and classes.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function load_dependencies() {
        
        /**
         * Load file containing custom post types controller class.
         */
        if ( ! class_exists( 'WP_List_Table' ) ) {

            /**
             * Load file containing WP_List_Table class.
             */
            require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
		}

    }

    /**
     * Register admin menu pages.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function register_admin_pages() {

        /**
         * Custom Post Type admin pages
         */
        $this->create_admin_menu(); 
        $this->create_admin_cpt_add_page();
        $this->create_admin_cpt_edit_page();
        $this->create_admin_cpt_delete_page();
        $this->create_admin_cpt_disable_page();
        $this->create_admin_cpt_enable_page();
        
    }

    /**
     * Create admin menu. 
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    private function create_admin_menu() {
        
        add_menu_page( 
			__( 'Custom WP Framework', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
			__( 'Custom WP Framework', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
			'manage_options',
			'custom-wp-framework-admin',
            array( $this->custom_post_types_controller, 'render_cpt_page' ),
            'dashicons-editor-code',
			50
        ); 

        add_submenu_page(
			'custom-wp-framework-admin',
			__( 'Custom Post Types', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
			__( 'Custom Post Types', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
			'manage_options',
			'custom-wp-framework-admin',
			array( $this->custom_post_types_controller, 'render_cpt_page' )
		);
    }

    /**
     * Create admin page for adding custom post types.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function create_admin_cpt_add_page() {
        
        add_submenu_page(
            null,
            __( 'Add Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
            __( 'Edit Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
            'manage_options',
            'custom-wp-framework-admin-cpt-add',
            array( $this->custom_post_types_controller, 'render_cpt_add_page' )
        );
    }

    /**
     * Create admin page for editing custom post types.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function create_admin_cpt_edit_page() {

        add_submenu_page(
            null,
            __( 'Edit Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
            __( 'Edit Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
            'manage_options',
            'custom-wp-framework-admin-cpt-edit',
            array( $this->custom_post_types_controller, 'render_cpt_edit_page' )
        );
    }

    /**
     * Create admin page for deleting custom post types.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function create_admin_cpt_delete_page() {

        add_submenu_page(
            null,
            __( 'Delete Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
            __( 'Delete Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
            'manage_options',
            'custom-wp-framework-admin-cpt-delete',
            array( $this->custom_post_types_controller, 'render_cpt_delete_page' )
        );
    }

    /**
     * Create admin page for disabling custom post types.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function create_admin_cpt_disable_page() {

        add_submenu_page(
            null,
            __( 'Disable Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
            __( 'Disable Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
            'manage_options',
            'custom-wp-framework-admin-cpt-disable',
            array( $this->custom_post_types_controller, 'render_cpt_disable_page' )
        );

    }

    /**
     * Create admin page for enabling custom post types.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function create_admin_cpt_enable_page() {

        add_submenu_page(
            null,
            __( 'Enable Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
            __( 'Enable Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
            'manage_options',
            'custom-wp-framework-admin-cpt-enable',
            array( $this->custom_post_types_controller, 'render_cpt_enable_page' )
        );

    }
}