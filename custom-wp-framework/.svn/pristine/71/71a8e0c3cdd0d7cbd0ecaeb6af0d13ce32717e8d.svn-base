<?php

namespace Custom_WP_Framework\Admin\Controllers;

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

// Load required classes;
use Custom_WP_Framework\Admin\Models;
use Custom_WP_Framework\Includes\Helpers\CWF_Utils;
use Custom_WP_Framework\Includes\Core\Exceptions;
use Custom_WP_Framework\Includes\Core\Custom_Post_Types\CWF_CPT;
use Custom_WP_Framework\Includes\CWF_Config;

/**
 * Custom Post Type Controller.
 * 
 * The controller class for the plugin's CPT admin pages.
 * 
 * @since   1.0.0
 */
class CWF_CPT_Controller {
    
    /**
     * The viewmodel for the add cpt admin page.
     * 
     * @since   1.0.0
     * @var     CWF_Add_CPT_ViewModel   $add_cpt_viewmodel
     */
    public $add_cpt_viewmodel;

    /**
     * The viewmodel for the cpt admin page.
     * 
     * @since   1.0.0
     * @var     CWF_CPT_ViewModel   $cpt_viewmodel
     */
    public $cpt_viewmodel;

    /**
     * The viewmodel of the delete cpt admin page.
     * 
     * @since   1.0.0
     * @var     CWF_Delete_CPT_ViewModel    $delete_cpt_viewmodel
     */
    public $delete_cpt_viewmodel;

    /**
     * The viewmodel of the edit cpt admin page.
     * 
     * @since   1.0.0
     * @var     CWF_Edit_CPT_ViewModel  $edit_cpt_viewmodel
     */
    public $edit_cpt_viewmodel;

    /**
     * The viewmodel of the enable cpt admin page.
     * 
     * @since   1.0.0
     * @var     CWF_Enable_CPT_ViewModel    $enable_cpt_viewmodel
     */
    public $enable_cpt_viewmodel;
    
    /**
     * Admin page screen names.
     * 
     * @since   1.0.0
     * @var     array   $cwf_cpt_screens
     */
    public $cwf_cpt_screens;

    /**
     * The data model for all cpt admin pages.
     * 
     * @since   1.0.0
     * @var     CWF_CPT_DataModel   $cpt_datamodel
     */
    public $model_cpt;

    /**
     * The main cpt URL.
     * 
     * @since   1.0.0
     * @var     string
     */
    private const CPT_ADMIN_URL = 'admin.php?page=custom-wp-framework-admin';

    /**
     * The add cpt URL.
     * 
     * @since   1.00
     * @var     string
     */
    private const ADD_CPT_ADMIN_URL = 'admin.php?page=custom-wp-framework-admin-cpt-add';

    /**
     * The edit cpt URL.
     * 
     * @since   1.0.0
     * @var     string
     */
    private const EDIT_CPT_ADMIN_URL = 'admin.php?page=custom-wp-framework-admin-cpt-edit';

    /**
     * Default constructor.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function __construct() {

        /**
         * Retrieve screen names for custom post type admin pages. 
         */
        $this->cwf_cpt_screens = CWF_Config::get_setting_value( 'admin_screens\\custom_post_types' );

        /**
         * Define hooks for custom post type admin pages.
         */
        $this->define_cpt_hooks();
   
    }

    /**
     * Define hooks for custom post type admin pages.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function define_cpt_hooks() {

        /**
         * Save custom post type data.
         */
        add_action( 'admin_post_cwf_add_cpt', array( &$this, 'save_cpt_data' ) );

        /**
         * Update custom post type data.
         */
        add_action( 'admin_post_cwf_edit_cpt', array( &$this, 'update_cpt_data' ) );

        /**
         * Delete custom post type(s).
         */
        add_action( 'admin_post_cwf_delete_cpt', array( &$this, 'delete_cpt_data' ) );
        add_action( 'admin_post_cwf_bulk_delete_cpt', array( &$this, 'bulk_delete_cpt' ) );

        /**
         * Disable custom post type(s).
         */
        add_action( 'admin_post_cwf_disable_cpt', array( &$this, 'disable_cpt' ) );
        add_action( 'admin_post_cwf_bulk_disable_cpt', array(&$this, 'bulk_disable_cpt' ) );

        /**
         * Enable custom post type(s).
         */
        add_action( 'admin_post_cwf_enable_cpt', array( &$this, 'enable_cpt' ) );
        add_action( 'admin_post_cwf_bulk_enable_cpt', array( &$this, 'bulk_enable_cpt' ) );

        /**
         * Enqueue styles for CPT admin pages.
         */
        add_action( 'admin_enqueue_scripts', array( &$this, 'enqueue_cpt_styles' ) );
        
        /**
         * Enqueue scripts for CPT admin pages.
         */
        add_action( 'admin_enqueue_scripts', array( &$this, 'enqueue_cpt_scripts' ) );


    }

    /**
     * Enqueue necessary styles for CPT admin pages.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function enqueue_cpt_styles() {

        $screen = get_current_screen();

        if( is_admin() ) {

            if( in_array( $screen->base, $this->cwf_cpt_screens ) ) { 
        
                /**
                 * Enqueue style for ThickBox (modal).
                 */
                wp_enqueue_style(' thickbox ');
    
                /**
                 * Enqueue plugin stylesheet for custom post types.
                 */
                wp_enqueue_style( CUSTOM_WP_FRAMEWORK_PLUGIN_NAME . '-cpt-admin', plugin_dir_url( dirname ( __FILE__ ) ) . 'assets/css/cwf-admin-cpt.css', array(), CUSTOM_WP_FRAMEWORK_VERSION, 'all' );
            
            }
        }
    }
    
    /**
     * Enqueue necessary scripts for CPT admin pages.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function enqueue_cpt_scripts() {

        $screen = get_current_screen();
        
        if( in_array( $screen->base, $this->cwf_cpt_screens ) ) {

            /**
             *  Enqueue WordPress jQuery. 
             */        
            wp_enqueue_script( 'jquery' );

            /**
             * Enqueue script for ThickBox (modal).
             */
            wp_enqueue_script( 'thickbox' );

            /**
             * Enqueue script for WordPress Media Upload modal. 
             */
            wp_enqueue_script( 'media-upload' );

            /**
             * Enqueue script for PostBox. 
             */
            wp_enqueue_script( 'postbox' );

            /**
             * Enqueue custom plugin script for PostBox.
             */
            wp_enqueue_script( 'postbox-edit', plugin_dir_url( dirname ( __FILE__ ) ) . 'assets/js/cwf-postbox.js', array('jquery', 'postbox' ) );
            
            /**
             * Enqueue custom plugin script for WordPress Media Upload modal.
             */
            wp_enqueue_script( CUSTOM_WP_FRAMEWORK_PLUGIN_NAME . '-admin-media-uploader', plugin_dir_url( dirname ( __FILE__ ) ) . 'assets/js/cwf-admin-media-uploader.js', array('jquery'), CUSTOM_WP_FRAMEWORK_VERSION, 'all' );
            
            /**
             * Enqueue custom plugin script for custom post type admin pages.
             */
            wp_enqueue_script( CUSTOM_WP_FRAMEWORK_PLUGIN_NAME . '-cpt-admin', plugin_dir_url( dirname ( __FILE__ ) ) . 'assets/js/cwf-admin-cpt.js', array(), CUSTOM_WP_FRAMEWORK_VERSION, 'all' );
            
            /**
             * Localize script variables for custom post type admin pages.
             */
            wp_localize_script( CUSTOM_WP_FRAMEWORK_PLUGIN_NAME . '-cpt-admin', 'cwf_cpt_vars', array(
                'post_url'              => esc_url( admin_url( 'admin-post.php' ) ),
                'nonce'                 => wp_create_nonce( 'cwf_bulk_action_cpt' ),
                'delete_title'          => esc_html( __( 'Bulk Delete', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
                'disable_title'         => esc_html( __( 'Bulk Disable', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
                'enable_title'          => esc_html( __( 'Bulk Enable', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
                'delete_warning'        => esc_html( __( 'WARNING: Deleting a custom post type will also remove all associated posts and custom field/taxonomy data. This action is permanent and cannot be undone. We recommend taking a backup of the database before proceeding in case you need to restore any data.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
                'disable_warning'       => esc_html( __( 'WARNING: Disabling a custom post type will cause it to disappear from the front-end and admin dashboard. It will NOT delete the custom post type or related data. This action can also be reversed if necessary.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
                'enable_warning'        => esc_html( __( 'WARNING: Enabling a custom post type may cause its posts to reappear on the front-end of the website.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
                'delete_confirmation'   => esc_html( __( 'Are you sure you want to delete these post types?', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
                'disable_confirmation'  => esc_html( __( 'Are you sure you want to disable these post types?', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
                'enable_confirmation'   => esc_html( __( 'Are you sure you want to enable these post types?', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
                )
            ); 

            /**
             * Enqueue custom plugin script for tag input field.
             */
            wp_enqueue_script( CUSTOM_WP_FRAMEWORK_PLUGIN_NAME . '-admin-tag-input', plugin_dir_url ( dirname ( __FILE__ ) ) . 'assets/js/cwf-admin-tag-input.js', array(), CUSTOM_WP_FRAMEWORK_VERSION, 'all' );
            
            /**
             * Enqueue all scripts, styles, settings and templates to us all media JS APIs.
             */
            wp_enqueue_media();

        }
    }

    /**
     * Display main custom post type page.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function render_cpt_page() {

        try {

            /**
             * Create new instance of Custom_WP_Framework_CPT_ViewModel.
             */
            $this->cpt_viewmodel = new Models\Custom_Post_Types\CWF_CPT_ViewModel();

            /**
             * Check for URL parameters and construct notification message if applicable.
             */
            if( isset( $_GET['result'] ) && ! empty( $_GET['result'] ) ) {

                switch( sanitize_key( $_GET['result'] ) ) {

                    case 'delete-success':
                        $this->cpt_viewmodel->notification_message = esc_html( __( "Custom Post Type(s) successfully deleted.", CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) );
                        break;
                    case 'disable-success':
                        $this->cpt_viewmodel->notification_message = esc_html( __( "Custom Post Type(s) successfully disabled.", CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) );
                        break;
                    case 'enable-success':
                        $this->cpt_viewmodel->notification_message = esc_html( __( "Custom Post Type(s) successfully enabled.", CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) );
                        break;
                    case 'delete-failure':
                        $this->cpt_viewmodel->notification_message = esc_html( __( "Custom Post Type(s) could not be successfully deleted.", CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) );
                        break;
                    case 'disable-failure':
                        $this->cpt_viewmodel->notification_message = esc_html( __( "Custom Post Type(s) could not be successfully disabled.", CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) );
                        break;
                    case 'enable-failure':
                        $this->cpt_viewmodel->notification_message = esc_html( __( "Custom Post Type(s) could not be successfully enabled.", CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) );
                        break;
                }
            }

            /**
             * Include file containing view for main custom post type page. 
             */
            include CUSTOM_WP_FRAMEWORK_FOLDER . 'admin/views/custom-post-types/view-cpt.php';

        }
        catch (\Exception $e) {

            /**
             * Log Exception details.
             */
            CWF_Utils::log_exception( $e );

            /**
             * Quit and display error.
             */
            CWF_Utils::display_exception( $e );

        }
    }

    /**
     * Display page for adding new custom post type.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function render_cpt_add_page() {

        try {

            /**
             * Create new instance of Custom_WP_Framework_Add_CPT_ViewModel.
             */
            $this->add_cpt_viewmodel = new Models\Custom_Post_Types\CWF_Add_CPT_ViewModel();
            
            /**
             * If exists, retrieve the transient containing (POST) data for this user.
             */
            $cwf_add_cpt_transient = get_transient( 'cwf-add-cpt-viewmodel-transient-'. get_current_user_id() );

            /**
             * If transient exists, cast to current instance of Custom_WP_Framwork_Add_CPT_ViewModel.
             */
            if( $cwf_add_cpt_transient ) { 
            
                /**
                 * Assign transient data to current viewmodel. 
                 */
                $this->add_cpt_viewmodel = $cwf_add_cpt_transient;
            
                /**
                 * Delete transient as no longer required. 
                 */
                delete_transient( 'cwf-add-cpt-viewmodel-transient-'. get_current_user_id() );
            }

            /**
             * Load file containing view for adding new custom post type. 
             */
            include CUSTOM_WP_FRAMEWORK_FOLDER . 'admin/views/custom-post-types/view-cpt-add.php';

        }
        catch( \Exception $e ) {

            /**
             * Log Exception details.
             */
            CWF_Utils::log_exception( $e );

            /**
             * Quit and display error.
             */
            CWF_Utils::display_exception( $e );

        } 
    }

    /**
     * Display page for editing an existing custom post type.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function render_cpt_edit_page() {

        try {

            /**
             * If exists, retrieve the transient containing (POST) data for this user.
             */
            $cwf_edit_cpt_transient = get_transient( 'cwf-edit-cpt-viewmodel-transient-' . get_current_user_id() );

            /**
             * If GET id parameter exists, attempt to retrieve cpt from database.
             */
            if ( isset( $_GET['id'] ) && ! empty( $_GET['id'] ) ) {

                /**
                 * If transient exists, cast to current instance of Custom_WP_Framework_Edit_CPT_ViewModel
                 */
                if( $cwf_edit_cpt_transient ) {

                    /**
                     * Assign transient data to current viewmodel.
                     */
                    $this->edit_cpt_viewmodel = $cwf_edit_cpt_transient;

                    /**
                     * Delete transient as no longer required.
                     */
                    delete_transient( 'cwf-edit-cpt-viewmodel-transient-' . get_current_user_id() );

                }
                else {

                    /**
                     * Create new instance of Custom_WP_Framework_Edit_CPT_ViewModel with sanitized id parameter.
                     */
                    $this->edit_cpt_viewmodel = new Models\Custom_Post_Types\CWF_Edit_CPT_ViewModel( filter_var( $_GET['id'] , FILTER_SANITIZE_NUMBER_INT ) );

                    /**
                     * Create new instance of cpt datamodel.
                     */
                    $this->model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel();

                    /**
                     * Retrieve cpt using post type id provided.
                     */
                    $this->model_cpt->get_single_cwf_custom_post_type( $this->edit_cpt_viewmodel->cpt->post_type_id );

                    /**
                     * If custom post type is not found in database, throw invalid id exception. 
                     */
                    if( empty( $this->model_cpt->cpt_collection ) || sizeof( $this->model_cpt->cpt_collection ) === 0 ) {
                        throw new Exceptions\CWF_Exception_103();
                    }

                    /**
                     * Format result to cpt object. 
                     */
                    $this->model_cpt->populate_cpt_viewmodel( $this->edit_cpt_viewmodel );

                }

                /**
                 * Load file containing the view for editing an existing custom post type.
                 */
                include CUSTOM_WP_FRAMEWORK_FOLDER . 'admin/views/custom-post-types/view-cpt-edit.php';

            }
            else {

                throw new Exceptions\CWF_Exception_103();
                
            }
        }
        catch( \Exception $e ) {

            /**
             * Log Exception details.
             */
            CWF_Utils::log_exception( $e );

            /**
             * Quit and display error.
             */
            CWF_Utils::display_exception( $e );

        } 
    }

    /**
     * Display page for deleting existing custom post types.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function render_cpt_delete_page() {

        try {

            if( isset( $_GET['id'] ) && ! empty( $_GET['id'] ) ) {

                /**
                 * Create new instance of Custom_WP_Framework_Delete_CPT_ViewModel.
                 */
                $this->delete_cpt_viewmodel = new Models\Custom_Post_Types\CWF_Delete_CPT_ViewModel();

                /**
                 * Assign sanitized id parameter to model. 
                 */
                $this->delete_cpt_viewmodel->cpt->post_type_id = filter_var( $_GET['id'], FILTER_SANITIZE_NUMBER_INT );

                /**
                 * Create new instance of cpt datamodel.
                 */
                $this->model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel();

                /**
                 * Retrieve cpt using post type id provided.
                 */
                $this->model_cpt->get_single_cwf_custom_post_type( $this->delete_cpt_viewmodel->cpt->post_type_id );

                /**
                 * If custom post type is not found in database, throw invalid id exception. 
                 */
                if( empty( $this->model_cpt->cpt_collection ) || sizeof( $this->model_cpt->cpt_collection ) === 0 ) {
                    throw new Exceptions\CWF_Exception_103();
                }

                /**
                 * Retrieve post name label from results.
                 */
                $this->delete_cpt_viewmodel->cpt->post_type_labels->name = $this->model_cpt->cpt_collection[0]->cpt_key;

                /**
                 * Load file containing the view for deleting existing custom post types.
                 */
                include CUSTOM_WP_FRAMEWORK_FOLDER . 'admin/views/custom-post-types/view-cpt-delete.php';
            }
            else {

                throw new Exceptions\CWF_Exception_103();

            }
        }
        catch( \Exception $e ) {

            /**
             * Log Exception details.
             */
            CWF_Utils::log_exception( $e );

            /**
             * Quit and display error.
             */
            CWF_Utils::display_exception( $e );

        } 
    }

    /**
     *  Display page for disabling existing custom post types.
     * 
     *  @since  1.0.0
     *  @param  void
     *  @return void
     */
    public function render_cpt_disable_page() {

        try {

            if( isset( $_GET['id'] ) && ! empty( $_GET['id'] ) ) {

                /**
                 * Create new instance of Custom_WP_Framework_Disable_CPT_ViewModel.
                 */
                $this->disable_cpt_viewmodel = new Models\Custom_Post_Types\CWF_Disable_CPT_ViewModel();
        
                /**
                 * Assign sanitized id parameter to model.
                 */
                $this->disable_cpt_viewmodel->cpt->post_type_id = filter_var( $_GET['id'], FILTER_SANITIZE_NUMBER_INT );
           
                /**
                 * Create new instance of cpt datamodel.
                 */
                $this->model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel();

                /**
                 * Retrieve cpt using post type id provided.
                 */
                $this->model_cpt->get_single_cwf_custom_post_type( $this->disable_cpt_viewmodel->cpt->post_type_id );

                /**
                 * If custom post type is not found in database, throw invalid id exception. 
                 */
                if( empty( $this->model_cpt->cpt_collection ) || sizeof( $this->model_cpt->cpt_collection ) === 0 ) {
                    throw new Exceptions\CWF_Exception_103();
                }

                /**
                 * Retrieve post name label from results.
                 */
                $this->disable_cpt_viewmodel->cpt->post_type_labels->name = $this->model_cpt->cpt_collection[0]->cpt_key;

                /**
                 * Load file containing the disable cpt view.
                 */
                include CUSTOM_WP_FRAMEWORK_FOLDER . 'admin/views/custom-post-types/view-cpt-disable.php';

            }
            else {

                throw new Exceptions\CWF_Exception_103(); 

            }
        }
        catch (\Exception $e) {

            /**
             * Log Exception details.
             */
            CWF_Utils::log_exception( $e );

            /**
             * Quit and display error.
             */
            CWF_Utils::display_exception( $e );

        }
    }

    /**
     * Display page for enabling existing custom post types.
     */
    public function render_cpt_enable_page() {

        try {

            if( isset( $_GET['id'] ) && ! empty( $_GET['id'] ) ) {

                /**
                 * Create new instance of Custom_WP_Framework_Enable_CPT_ViewModel.
                 */
                $this->enable_cpt_viewmodel = new Models\Custom_Post_Types\CWF_Enable_CPT_ViewModel();

                /**
                 * Assign sanitized id parameter to model.
                 */
                $this->enable_cpt_viewmodel->cpt->post_type_id = filter_var( $_GET['id'], FILTER_SANITIZE_NUMBER_INT );
            
                /**
                 * Create new instance of cpt datamodel.
                 */
                $this->model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel();

                /**
                 * Retrieve cpt using post type id provided.
                 */
                $this->model_cpt->get_single_cwf_custom_post_type( $this->enable_cpt_viewmodel->cpt->post_type_id );

                /**
                 * If custom post type is not found in database, throw invalid id exception. 
                 */
                if( empty( $this->model_cpt->cpt_collection ) || sizeof( $this->model_cpt->cpt_collection ) === 0 ) {
                    throw new Exceptions\CWF_Exception_103();
                }

                /**
                 * Retrieve post name label from results.
                 */
                $this->enable_cpt_viewmodel->cpt->post_type_labels->name = $this->model_cpt->cpt_collection[0]->cpt_key;

                /**
                 * Load file containing the enable cpt view.
                 */
                include CUSTOM_WP_FRAMEWORK_FOLDER . 'admin/views/custom-post-types/view-cpt-enable.php';

            }
            else {

                throw new Exceptions\CWF_Exception_103();

            }
        }
        catch (\Exception $e) {

            /**
             * Log Exception details.
             */
            CWF_Utils::log_exception( $e );

            /**
             * Quit and display error.
             */
            CWF_Utils::display_exception( $e );

        }
    }

    /**
     * Function to save data when adding new custom post type.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void 
     */
    public function save_cpt_data() {

        try {

             /**
             * If model is not set, create new instance of class.
             */
            if( ! isset( $this->add_cpt_viewmodel ) ) {
                
                /**
                * Create new instance of Custom_WP_Framework_Add_CPT_ViewModel. 
                */ 
                $this->add_cpt_viewmodel = new Models\Custom_Post_Types\CWF_Add_CPT_ViewModel();
            }

            /**
             * Validate POST data and check model is valid.
             */
            $valid_model = $this->add_cpt_viewmodel->validate();

            /**
             * If model is valid, save custom post type to database. 
             */
            if( $valid_model ) {

                /**
                 * Create new instance of Custom_WP_Framework_CPT_DataModel.
                 */
                $this->model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel( $this->add_cpt_viewmodel );

                /**
                 * Insert custom post type to database table and check save status.
                 */
                $this->add_cpt_viewmodel->success = (bool) $this->model_cpt->insert_cpt();
                
                /**
                 * If custom post type saved, reset custom post type data.
                 */
                if( $this->add_cpt_viewmodel->success ) {
                    
                    /**
                    * Reset custom post type by creating new instance. 
                    */
                    $this->add_cpt_viewmodel->cpt = new CWF_CPT();

                    /**
                     * Reset auto-populate setting for singular post type label. 
                     */
                    $this->add_cpt_viewmodel->post_type_label_singular_all = false;

                    /**
                     * Reset auto-populate setting for plural post type label.
                     */
                    $this->add_cpt_viewmodel->post_type_label_all = false;

                    /**
                     * Update rewrite flush required setting to true. 
                     */
                    update_option( 'cwf_rewrite_required', 1 );
                }
            }

             /**
             * Create user-specific transient for viewmodel. 
             */
            set_transient( 'cwf-add-cpt-viewmodel-transient-'. get_current_user_id(), $this->add_cpt_viewmodel, 60 );

            /**
             * Redirect browser to view for adding new custom post type. 
             */
            wp_redirect( admin_url( self::ADD_CPT_ADMIN_URL ) );

        }
        catch( \Exception $e ) {

            /**
             * Log Exception details.
             */
            CWF_Utils::log_exception( $e );

            /**
             * Quit and display error.
             */
            CWF_Utils::display_exception( $e );
        
        }
    }

    /**
     * Function to update existing custom post type in database.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function update_cpt_data() {

        try {

            /**
             * If model is not set, create new instance of class.
             */
            if( ! isset( $this->edit_cpt_viewmodel ) ) {

                /**
                 * Create new instance of Custom_WP_Framework_Edit_CPT_ViewModel.
                 */
                $this->edit_cpt_viewmodel = new Models\Custom_Post_Types\CWF_Edit_CPT_ViewModel();

            }

            /**
             * Validate POST data and check model is valid.
             */
            $valid_model = $this->edit_cpt_viewmodel->validate();

            if( $valid_model ) {

                /**
                 * Create new instance of CWF_CPT_DataModel.
                 */
                $this->model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel( $this->edit_cpt_viewmodel );

                /**
                 * Check that custom post type id relates to row in database.
                 */
                $this->model_cpt->get_single_cwf_custom_post_type( $this->model_cpt->view_data->cpt->post_type_id );

                /**
                 * If custom post type was found in the database, continue with update request.
                 */
                if( ! empty( $this->model_cpt->cpt_collection ) && sizeof( $this->model_cpt->cpt_collection ) > 0 ) {

                    /**
                     * Update custom post type.
                     */
                    $this->edit_cpt_viewmodel->success = $this->model_cpt->update_cpt();

                    /**
                     * If custom post type updated, redirect to main cpt page.
                     */
                    if ( $this->edit_cpt_viewmodel->success === 1 ) {

                        /**
                         * Update rewrite flush required setting to true. 
                         */
                        update_option( 'cwf_rewrite_required', 1 );

                    }
                }
                else {

                    throw new \Exceptions\CWF_Exception_103();

                }
            }

            /**
             * Create user-specific transient for viewmodel. 
             */
            set_transient( 'cwf-edit-cpt-viewmodel-transient-'. get_current_user_id(), $this->edit_cpt_viewmodel, 60 );

            /**
             * Redirect browser to view for adding editing custom post type. 
             */
            wp_redirect( admin_url( self::EDIT_CPT_ADMIN_URL . '&id=' . $this->edit_cpt_viewmodel->cpt->post_type_id ) );

        }
        catch( \Exception $e ){

            /**
             * Log Exception details.
             */
            CWF_Utils::log_exception( $e );

            /**
             * Quit and display error.
             */
            CWF_Utils::display_exception( $e );

        }
    }

    /**
     * Function to delete custom post type and related data in database.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function delete_cpt_data() {

        try {

            /**
             * If model is not set, create new instance of class.
             */
            if( ! isset( $this->delete_cpt_viewmodel ) ) {

                /**
                 * Create new instance of Custom_WP_Framework_Delete_CPT_ViewModel. 
                 */ 
                $this->delete_cpt_viewmodel = new Models\Custom_Post_Types\CWF_Delete_CPT_ViewModel();
            }

            /**
             * Validate POST data and check model is valid.
             */
            $valid_model = $this->delete_cpt_viewmodel->validate();

            if( $valid_model ) {

                /**
                 * Abort delete and redirect user if cancellation request received.
                 */
                if( 'Cancel and go back' === $_POST['submit'] ) {

                    /**
                     * Redirect user to CPT admin page. 
                     */
                    wp_redirect( admin_url( self::CPT_ADMIN_URL ) );
                }
                elseif( 'Delete' === $_POST['submit'] ) {

                    /**
                     * Sanitize and assign post id to viewmodel.
                     */
                    $this->delete_cpt_viewmodel->cpt->post_type_id = filter_var( $_POST['cwf-cpt-id'], FILTER_SANITIZE_NUMBER_INT );

                    /**
                     * Create new instance of Custom_WP_Framework_CPT_DataModel.
                     */
                    $this->model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel( $this->delete_cpt_viewmodel );

                    /**
                     * Check that custom post type id relates to row in database.
                     */
                    $this->model_cpt->get_single_cwf_custom_post_type( $this->delete_cpt_viewmodel->cpt->post_type_id );

                    /**
                     * If custom post type was found in the database, continue with delete request.
                     */
                    if( ! empty( $this->model_cpt->cpt_collection ) && sizeof( $this->model_cpt->cpt_collection ) > 0 ) {

                        /**
                         * Delete custom post type from database.
                         */
                        $this->delete_cpt_viewmodel->success = $this->model_cpt->delete_cpt( $this->model_cpt->view_data->cpt->post_type_id );

                        /**
                         * If custom post type successfully deleted, delete associated data and update rewrite flush.
                         */
                        if( $this->delete_cpt_viewmodel->success === 1 ) {

                             /**
                             * Get all posts of the custom post type.
                             * 
                             * @since   1.0.0
                             * @var     array       $cpt_posts
                             */
                            $cpt_posts = get_posts( array( 'post_type'=> strval( $this->model_cpt->cpt_collection[0]->cpt_key ), 'numberposts' => -1 ) );

                            /**
                             * Delete all posts and data associated with CPT. 
                             */
                            foreach( $cpt_posts as $cpt_post ) {
                                wp_delete_post( $cpt_post->ID, true );
                            }

                            /**
                             * Update rewrite flush required setting to true. 
                             */
                            update_option( 'cwf_rewrite_required', 1 );

                            /**
                             * Redirect with success message.
                             */
                            wp_redirect( admin_url( self::CPT_ADMIN_URL . "&result=delete-success" ) );
                        }
                        else {

                            /**
                             * Redirect with failure message.
                             */
                            wp_redirect( admin_url( self::CPT_ADMIN_URL . "&result=delete-failure" ) );

                        }
                    }
                }
            }
        }
        catch( \Exception $e ) {

            /**
             * Log Exception details.
             */
            CWF_Utils::log_exception( $e );

            /**
             * Quit and display error.
             */
            CWF_Utils::display_exception( $e );
        }
    }

    /**
     * Function to disable custom post type.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function disable_cpt() {
        
        try{

            /**
             * If model is not set, create new instance of class.
             */
            if( ! isset( $this->disable_cpt_viewmodel ) ) {
                
                /**
                 * Create new instance of Custom_WP_Framework_Disable_CPT_ViewModel.
                 */
                $this->disable_cpt_viewmodel = new Models\Custom_Post_Types\CWF_Disable_CPT_ViewModel();

            }

            /**
             * Validate POST data and check model is valid.
             */
            $valid_model = $this->disable_cpt_viewmodel->validate();

            if( $valid_model ) {

                /**
                 * Abort disable and redirect user if cancellation request received.
                 */
                if( 'Cancel and go back' === $_POST['submit'] ) {

                    /**
                     * Redirect user to CPT admin page. 
                     */
                    wp_redirect( admin_url( self::CPT_ADMIN_URL ) );

                }
                elseif ( 'Disable' === $_POST['submit'] ) {

                    /**
                     * Sanitize and assign post id to viewmodel.
                     */
                    $this->disable_cpt_viewmodel->cpt->post_type_id = filter_var( $_POST['cwf-cpt-id'], FILTER_SANITIZE_NUMBER_INT );

                    /**
                     * Create new instance of Custom_WP_Framework_CPT_DataModel.
                     */
                    $this->model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel( $this->disable_cpt_viewmodel );

                    /**
                     * Check that custom post type id relates to row in database.  
                     */
                    $this->model_cpt->get_single_cwf_custom_post_type( $this->model_cpt->view_data->cpt->post_type_id );

                    /**
                     * If custom post type was found in the database, continue with disable request.
                     */
                    if( ! empty( $this->model_cpt->cpt_collection ) && sizeof( $this->model_cpt->cpt_collection ) > 0 ) {

                        /**
                         * Disable custom post type from database.
                         */
                        $this->disable_cpt_viewmodel->success = $this->model_cpt->disable_cpt( $this->model_cpt->view_data->cpt->post_type_id );

                        /**
                         * If custom post type successfully disabled, update rewrite flush.  
                         */
                        if ( $this->disable_cpt_viewmodel->success === 1 ) {
                                
                            /**
                             * Update rewrite flush required setting to true. 
                             */
                            update_option( 'cwf_rewrite_required', 1 );

                            /**
                             * Redirect user to CPT admin page with success message. 
                             */
                            wp_redirect( admin_url( self::CPT_ADMIN_URL . "&result=disable-success" ) );

                        }
                        else {

                            /**
                             * Redirect user to CPT admin page with failure message.
                             */
                            wp_redirect( admin_url( self::CPT_ADMIN_URL . "&result=disable-failure" ) );

                        }
                    }
                    else {

                        throw new \Exceptions\CWF_Exception_103();

                    }
                }
            }
        }
        catch( \Exception $e ) {

            /**
             * Log Exception details.
             */
            CWF_Utils::log_exception( $e );

            /**
             * Quit and display error.
             */
            CWF_Utils::display_exception( $e );
        }
    }

    /**
     * Function to enable custom post type.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function enable_cpt() {

        try {

            /**
             * If model is not set, create new instance of class.
             */
            if( ! isset( $this->enable_cpt_viewmodel ) ) {

                /**
                 * Create new instance of Custom_WP_Framework_Enable_CPT_ViewModel.
                 */
                $this->enable_cpt_viewmodel = new Models\Custom_Post_Types\CWF_Enable_CPT_ViewModel();

            }

            /**
             * Validate POST data and check model is valid.
             */
            $valid_model = $this->enable_cpt_viewmodel->validate();

            if( $valid_model ) {

                /**
                 * Abort delete and redirect user if cancellation request received.
                 */
                if( 'Cancel and go back' === $_POST['submit'] ) {

                     /**
                     * Redirect user to CPT admin page. 
                     */
                    wp_redirect( admin_url( self::CPT_ADMIN_URL ) );

                }
                elseif( 'Enable' === $_POST['submit'] ) {

                    /**
                     * Sanitize and assign post id to viewmodel.
                     */
                    $this->enable_cpt_viewmodel->cpt->post_type_id = filter_var( $_POST['cwf-cpt-id'], FILTER_SANITIZE_NUMBER_INT );

                    /**
                     * Create new instance of Custom_WP_Framework_CPT_DataModel.
                     */
                    $this->model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel( $this->enable_cpt_viewmodel );

                    /**
                     * Check that custom post type id relates to row in database.
                     */
                    $this->model_cpt->get_single_cwf_custom_post_type( $this->model_cpt->view_data->cpt->post_type_id );

                    /**
                     * If custom post type was found in the database, continue with enable request.
                     */
                    if ( ! empty( $this->model_cpt->cpt_collection ) && sizeof( $this->model_cpt->cpt_collection ) > 0 ) {

                        /**
                         * Enable custom post type from database.
                         */
                        $this->enable_cpt_viewmodel->success = $this->model_cpt->enable_cpt( $this->model_cpt->view_data->cpt->post_type_id );

                        /**
                         * If custom post type successfully enabled, update rewrite flush.
                         */
                        if( $this->enable_cpt_viewmodel->success === 1 ) {

                            /**
                             * Update rewrite flush required setting to true. 
                             */
                            update_option( 'cwf_rewrite_required', 1 );

                            /**
                             * Redirect with success message.
                             */
                            wp_redirect( admin_url( self::CPT_ADMIN_URL . "&result=enable-success" ) );

                        }
                        else {

                            /**
                             * Redirect user to CPT admin page with failure message.
                             */
                            wp_redirect( admin_url( self::CPT_ADMIN_URL . "&result=enable-failure" ) );

                        }
                    }
                    else {

                        throw new \Exceptions\CWF_Exception_103();

                    }
                }
            }
        }
        catch( \Exception $e ) {

            /**
             * Log Exception details.
             */
            CWF_Utils::log_exception( $e );

            /**
             * Quit and display error.
             */
            CWF_Utils::display_exception( $e );

        }
    }

    /**
     * Function to bulk delete custom post types and related data in database.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function bulk_delete_cpt() {

        try {

            if( $this->validate_bulk_action() ) {

                /**
                 * Delete each requested custom post type and related data.
                 */
                foreach( $_POST['cwf-cpt-id'] as $custom_post_type_id ) {

                    /**
                     * Create new instance of Custom_WP_Framework_CPT_DataModel.
                     */
                    $this->model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel();

                    /**
                     * Sanitize post id value.
                     */
                    $custom_post_type_id = filter_var( $custom_post_type_id, FILTER_SANITIZE_NUMBER_INT );

                    /**
                     * Check that custom post type id relates to row in database.
                     */
                    $this->model_cpt->get_single_cwf_custom_post_type( $custom_post_type_id );

                    /**
                     * If custom post type was found in the database, continue with delete request.
                     */
                    if( ! empty( $this->model_cpt->cpt_collection ) && sizeof( $this->model_cpt->cpt_collection ) > 0 ) { 

                        /**
                         * Delete custom post type from database.
                         */
                        $this->model_cpt->delete_cpt( intval( $custom_post_type_id ) );

                        /**
                         * Get all posts of the custom post type.
                         * 
                         * @since   1.0.0
                         * @var     array       $cpt_posts
                         */
                        $cpt_posts = get_posts( array( 'post_type'=> strval( $this->model_cpt->cpt_collection[0]->cpt_key ), 'numberposts' => -1 ) );

                        /**
                         * Delete all posts and data associated with CPT. 
                         */
                        foreach( $cpt_posts as $cpt_post ) {
                            wp_delete_post( $cpt_post->ID, true );
                        }
                    }
                }

                /**
                 * Update rewrite flush required setting to true. 
                 */
                update_option( 'cwf_rewrite_required', 1 );

                /**
                 * Redirect with success messag.
                 */
                wp_redirect( admin_url( self::CPT_ADMIN_URL . "&result=delete-success" ) );
            }
        }
        catch( \Exception $e ) {

            /**
             * Log Exception details.
             */
            CWF_Utils::log_exception( $e );

            /**
             * Quit and display error.
             */
            CWF_Utils::display_exception( $e );
        }
    }

    /**
     * Function to bulk disable custom post types.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function bulk_disable_cpt() {
    
        try {

            if( $this->validate_bulk_action() ) {

                /**
                 * Disable each requested custom post type.
                 */
                foreach( $_POST['cwf-cpt-id'] as $custom_post_type_id ) {

                    /**
                     * Create new instance of Custom_WP_Framework_CPT_DataModel.
                     */
                    $this->model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel();

                    /**
                     * Sanitize post id value.
                     */
                    $custom_post_type_id = filter_var( $custom_post_type_id, FILTER_SANITIZE_NUMBER_INT );

                    /**
                     * Check that custom post type id relates to row in database.
                     */
                    $this->model_cpt->get_single_cwf_custom_post_type( $custom_post_type_id );

                    /**
                     * If custom post type was found in the database, continue with disable request.
                     */
                    if( ! empty( $this->model_cpt->cpt_collection ) && sizeof( $this->model_cpt->cpt_collection ) > 0 ) {

                        /**
                         * Disable custom post type from database.
                         */
                        $this->model_cpt->disable_cpt( intval( $custom_post_type_id ) );
                    }
                }

                /**
                 * Update rewrite flush required setting to true.
                 */
                update_option( 'cwf_rewrite_required', 1 );

                /**
                 * Redirect with success message.
                 */
                wp_redirect( admin_url( self::CPT_ADMIN_URL . "&result=disable-success" ) );

            }
        }
        catch( \Exception $e) {

            /**
             * Log Exception details.
             */
            CWF_Utils::log_exception( $e );

            /**
             * Quit and display error.
             */
            CWF_Utils::display_exception( $e );

        }
    }

    /**
     * Function to bulk enable custom post types.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function bulk_enable_cpt() {

        try {

            if( $this->validate_bulk_action() ) {

                /**
                 * Enable each requested custom post type.
                 */
                foreach( $_POST['cwf-cpt-id'] as $custom_post_type_id ) {

                    /**
                     * Create new instance of Custom_WP_Framework_CPT_DataModel.
                     */
                    $this->model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel();

                    /**
                     * Sanitize post id value.
                     */
                    $custom_post_type_id = filter_var( $custom_post_type_id, FILTER_SANITIZE_NUMBER_INT );

                    /**
                     * Check that custom post type id relates to row in database.
                     */
                    $this->model_cpt->get_single_cwf_custom_post_type( $custom_post_type_id );

                    /**
                     * If custom post type was found in the database, continue with enable request.
                     */
                    if ( ! empty( $this->model_cpt->cpt_collection ) && sizeof( $this->model_cpt->cpt_collection ) > 0 ) {

                        /**
                         * Enable custom post type from database.
                         */
                        $this->model_cpt->enable_cpt( intval( $custom_post_type_id ) );

                    }
                }

                /**
                 * Update rewrite flush required setting to true.
                 */
                update_option( 'cwf_rewrite_required', 1 );

                /**
                 * Redirect with success message.
                 */
                wp_redirect( admin_url( self::CPT_ADMIN_URL . "&result=enable-success" ) );

            }
        }
        catch( \Exception $e ) {

            /**
             * Log Exception details.
             */
            CWF_Utils::log_exception( $e );

            /**
             * Quit and display error.
             */
            CWF_Utils::display_exception( $e );

        }
    }

    /**
     * Validates bulk action post data.
     * 
     * @since   1.0.0
     * @param   void
     * @return  bool
     */
    public function validate_bulk_action() {

        /**
         * Check that data submitted.
         */
        if( empty( $_POST ) ) {

            /**
             * Throw exception if data not submitted.
             */
            throw new Exceptions\CWF_Exception_101();

        }

        /**
         * Verify WP nonce is valid.
         */
        if( ! isset( $_POST['nonce'] ) 
            || ! wp_verify_nonce( $_POST['nonce'], 'cwf_bulk_action_cpt' ) ) {
            
            /**
             * Throw exception if nonce could not be verified. 
             */
            throw new Exceptions\CWF_Exception_102();
        }

        /**
         * Verify post type id valid.
         */
        if ( ! isset( $_POST['cwf-cpt-id'] ) ) {

            /**
             * Throw exception if post type id is empty.
             */
            throw new Exceptions\CWF_Exception_103();
        }

        return true;

    }
}