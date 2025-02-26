<?php

namespace Custom_WP_Framework\Admin\Models\Custom_Post_Types;

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

// Load required classes.
use Custom_WP_Framework\Includes\CWF_Config;
use Custom_WP_Framework\Includes\Core\Exceptions;
use Custom_WP_Framework\Includes\Core\Custom_Post_Types\CWF_CPT;

/**
 * Viewmodel for adding custom post types.
 * 
 * @since   1.0.0
 */
class CWF_Add_CPT_ViewModel {

    /**
     * Custom post type.
     * 
     * @since   1.0.0
     * @var     CWF_CPT     $cpt
     */
    public $cpt; 

    /**
     * Available dashicons for menu icon.
     * 
     * @since   1.0.0
     * @var     array       $dashicons
     */
    public $dashicons;

    /**
     * Auto-populate setting for all plural custom post type labels. 
     * 
     * @since   1.0.0
     * @var     bool        $post_type_label_all
     */
    public $post_type_label_all;

    /**
     * Auto-populate setting for all singular custom post type labels.
     * 
     * @since   1.0.0
     * @var     bool        $post_type_label_singular_all
     */
    public $post_type_label_singular_all;

    /**
     * Summary of validation errors.
     * 
     * @since   1.0.0
     * @var     array       $validation_summary
     */
    public $validation_summary;

    /**
     * Array of model validation errors.
     * 
     * @since   1.0.0
     * @var     array       $validation_errors 
     */
    public $validation_errors;

    /**
     * Whether model is valid or not.
     * 
     * @since   1.0.0
     * @var     bool        $model_state
     */
    public $model_state;

    /**
     * Whether model saved successfully or not.
     * 
     * @since   1.0.0
     * @var     bool        $success
     */
    public $success;

    /**
     * The id of the current logged-in user.
     * 
     * @since   1.0.0
     * @var     bigint      $current_wp_user
     */
    private $current_wp_user; 

    /**
     * Default constructor.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function __construct() {

        /**
         * Load available dashicons.
         */
        $this->load_dashicons();

        /**
         * Create new instance of custom post type.
         */
        $this->cpt = new CWF_CPT();

        /**
         * Set default auto-populate to false.
         */
        $this->post_type_label_all = false;

        /**
         * Set default auto-populate to false.
         */
        $this->post_type_label_singular_all = false;

        /**
         * Initialise validation summary and set to empty array.
         */
        $this->validation_summary = array();

        /**
         * Initialise validation errors variable and set to array.
         */
        $this->validation_errors = array(
            'post-type-key' => null,
            'post-type-label-singular' => null,
            'post-type-label' => null,
            'post-type-menu-position' => null,
            'post-type-menu-icon' => null
        );

        /**
         * Set available taxonomies to empty array.
         */
        $this->available_taxonomies = array();

        /**
         * Get available taxonomies.
         */
        $this->get_available_taxonomies();

        /**
         * Get id of current logged-in user.
         */
        $this->current_wp_user = get_current_user_id();
        
        /**
         * Set model state to valid.
         */
        $this->model_state = true;

        /**
         * Initialise success flag and set to null.
         */
        $this->success = null;

    }

    /**
     * Load dashicons from external JSON file.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function load_dashicons() {
        /**
         * Get contents of JSON file.
         */
        $file = file_get_contents( CUSTOM_WP_FRAMEWORK_FOLDER . 'admin/models/dashicons.json' );
        
        /**
         * Load dashicons from file contents.
         */
        $this->dashicons = ( json_decode( $file, true ) );
    }

    /**
     * Get id for current logged in user.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function get_user(){

        /**
         * Return current logged in user id.
         */
        return $this->current_wp_user;
    }

    /**
     * Get available taxonomies.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    private function get_available_taxonomies(){
        
        /**
         * Set args param to empty array.
         */
        $args = array();

        /**
         * Set output param for available taxonomies.
         */
        $output = 'objects';

        /**
         * Get available taxonomies using defined params.
         */
        $taxonomies = get_taxonomies( $args, $output );

        /**
         * Remove superfluous Core WP taxonomies from output.
         */
        unset( $taxonomies['nav_menu'] );
        unset( $taxonomies['link_category'] );
        unset( $taxonomies['post_format'] );

        /**
         * Re-index array and assign to classproperty.
         */ 
        $this->available_taxonomies = array_values( $taxonomies );
    }

    /**
     * Check that post type key is unique.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function is_unique_post_type() {

        /**
         * Get the names of all registered post types.
         */
        $registered_post_types = get_post_types( [], 'names' );
        
        /**
         * Get known reserved post names.
         */
        $reserved_post_types = CWF_Config::get_setting_value( 'reserved_post_types' );
        
        /**
         * Check that proposed name is not already registered.
         */
        if ( in_array( $this->cpt->post_type_key, $registered_post_types ) ||
            in_array( $this->cpt->post_type_key, $reserved_post_types ) ) {
            return false;
        }
        return true;
    }

    /**
     * Validate data of viewmodel.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function validate(){
        
        /**
         * Check that data submitted from form.
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
        if( ! isset( $_POST['cwf_add_cpt_nonce_field'] )
            || ! wp_verify_nonce( $_POST['cwf_add_cpt_nonce_field'], 'cwf_add_cpt' ) ) {
            
            /**
             * Throw exception if nonce could not be verified.
             */
            throw new Exceptions\CWF_Exception_102();
        }
        
        /**
         * Verify post type key is valid.
         */
        if( ! isset( $_POST['post-type-key']) ) {

            /**
             * Define validation error message.
             */
            $validation_error_msg = __( 'Post Type Key is a required field.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );
            
            /**
             * Add error message to validation errors.
             */
            $this->validation_errors['post-type-key'] = $validation_error_msg;
            
            /**
             * Add error message to validation summary.
             */
            $this->validation_summary[] = $validation_error_msg;

            /**
             * Set valid model state to false.
             */
            $this->model_state = false;
        } 
        else {

            /**
             * Sanitize and assign post type key value.
             */
            $this->cpt->post_type_key = strtolower( sanitize_text_field( $_POST['post-type-key'] ) );
            
            /**
             * Verify post type key is unique. 
             */
            if( ! $this->is_unique_post_type() ) {

                /**
                 * Define validation error message.
                 */
                $validation_error_msg = __( 'A post type already exists with the specified post type key.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );
                
                /**
                 * Add error message to validation errors.
                 */
                $this->validation_errors['post-type-key'] = $validation_error_msg;
                
                /**
                 * Add error message to validation summary.
                 */
                $this->validation_summary[] = $validation_error_msg;
                
                /**
                 * Set valid model to false.
                 */
                $this->model_state = false;
            }
        }

        /**
         * Verify post type lable (singular) is valid.
         */
        if ( ! isset( $_POST['post-type-label-singular']) ) {

            /**
             * Define validation error message.
             */
            $validation_error_msg = __( 'Post Type Label (Singular) is a required field.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );
            
            /**
             * Add error message to validation errors.
             */
            $this->validation_errors['post-type-label-singular'] = $validation_error_msg;
            
            /**
             * Add error message to validation summary. 
             */
            $this->validation_summary[] = $validation_error_msg;
            
            /**
             * Set valid model to false.
             */
            $this->model_state = false;
        } 
        else { 

            /**
             * Sanitise and assign post type singular name.
             */
            $this->cpt->post_type_labels->singular_name = sanitize_text_field( $_POST['post-type-label-singular'] );
        }

        /**
         * Verify post type label (plural) is valid.
         */
        if ( ! isset( $_POST['post-type-label']) ) {
            
            /**
             * Define validation error message. 
             */
            $validation_error_msg = __( 'Post Type Label (Plural) is a required field.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );
            
            /**
             * Add error message to validation errors.
             */
            $this->validation_errors['post-type-label'] = $validation_error_msg;
            
            /**
             * Add error message to validation summary.
             */
            $this->validation_summary[] = $validation_error_msg;
            
            /**
             * Set valid model to false.
             */
            $this->model_state = false;
        } 
        else { 

            /**
             * Sanitise and assign post type label (plural).
             */
            $this->cpt->post_type_label = sanitize_text_field( $_POST['post-type-label'] );
            
            /**
             * Sanitise and assign post type label name.
             */
            $this->cpt->post_type_labels->name = sanitize_text_field( $_POST['post-type-label'] );
        }

        /**
         * Assign post type label auto-populate checkboxes.
         */
        $this->post_type_label_all = isset( $_POST['post-type-label-all'] ) && ! empty( $_POST['post-type-label-all']) ? boolval( sanitize_key( $_POST['post-type-label-all'] ) ) : false;
        $this->post_type_label_singular_all = isset( $_POST['post-type-label-singular-all'] ) && ! empty( $_POST['post-type-label-singular-all'] ) ? boolval( sanitize_key( $_POST['post-type-label-singular-all'] ) ) : false;

        /**
         * Assign post type settings.
         */
        $this->cpt->post_type_is_public = isset( $_POST['post-type-is-public'] ) && ! empty( $_POST['post-type-is-public'] ) ? boolval( sanitize_key( $_POST['post-type-is-public'] ) ) : false;
        $this->cpt->post_type_is_hierarchical = isset( $_POST['post-type-is-hierarchical'] ) && ! empty( $_POST['post-type-is-hierarchical'] ) ? boolval( sanitize_key( $_POST['post-type-is-hierarchical'] ) ) : false;
        $this->cpt->post_type_exclude_from_search = isset( $_POST['post-type-exclude-from-search'] ) && ! empty( $_POST['post-type-exclude-from-search'] ) ? boolval( sanitize_key( $_POST['post-type-exclude-from-search'] ) ) : false;
        $this->cpt->post_type_is_publicly_queryable = isset( $_POST['post-type-publicly-queryable'] ) && ! empty( $_POST['post-type-publicly-queryable'] ) ? boolval( sanitize_key( $_POST['post-type-publicly-queryable'] ) ) : false;
        $this->cpt->post_type_show_in_ui = isset( $_POST['post-type-show-ui'] ) && ! empty( $_POST['post-type-show-ui'] ) ? boolval( sanitize_key( $_POST['post-type-show-ui'] ) ) : false;
        $this->cpt->post_type_show_in_menu = isset( $_POST['post-type-show-in-menu'] ) && ! empty( $_POST['post-type-show-in-menu'] ) ? boolval( sanitize_key( $_POST['post-type-show-in-menu'] ) ) : false;
        $this->cpt->post_type_show_in_nav_menus = isset( $_POST['post-type-show-in-nav-menus'] ) && ! empty( $_POST['post-type-show-in-nav-menus'] ) ? boolval( sanitize_key( $_POST['post-type-show-in-nav-menus'] ) ) : false;
        $this->cpt->post_type_show_in_admin_bar = isset( $_POST['post-type-show-in-admin-bar'] ) && ! empty( $_POST['post-type-show-in-admin-bar'] ) ? boolval( sanitize_key( $_POST['post-type-show-in-admin-bar'] ) ): false;
        $this->cpt->post_type_show_in_rest = isset( $_POST['post-type-show-in-rest'] ) && ! empty( $_POST['post-type-show-in-rest'] ) ? boolval( sanitize_key( $_POST['post-type-show-in-rest'] ) ) : false;
        $this->cpt->post_type_rest_base = empty( $_POST['post-type-rest-base'] ) ? $this->cpt->post_type_key : sanitize_text_field( strtolower( $_POST['post-type-rest-base'] ) );
        $this->cpt->post_type_rest_controller_class = empty( $_POST['post-type-rest-controller-class-name'] ) ? 'WP_REST_Posts_Controller' : sanitize_text_field( $_POST['post-type-rest-controller-class-name'] );

        /**
         * Assign post type labels.
         */
        $this->cpt->post_type_labels->add_new = empty( $_POST['post-type-label-add-new'] ) ? 'Add New' : sanitize_text_field( $_POST['post-type-label-add-new'] );
        $this->cpt->post_type_labels->add_new_item = empty( $_POST['post-type-label-add-new-item'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'Add New Page' : 'Add New Post') : sanitize_text_field( $_POST['post-type-label-add-new-item'] );
        $this->cpt->post_type_labels->edit_item = empty( $_POST['post-type-label-edit-item'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'Edit Page' : 'Edit Post' ) : sanitize_text_field( $_POST['post-type-label-edit-item'] );
        $this->cpt->post_type_labels->new_item = empty( $_POST['post-type-label-new-item'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'New Page' : 'New Post' ) : sanitize_text_field( $_POST['post-type-label-new-item'] );
        $this->cpt->post_type_labels->view_item = empty( $_POST['post-type-label-view-item'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'View Page' : 'View Post' ) : sanitize_text_field( $_POST['post-type-label-view-item'] );
        $this->cpt->post_type_labels->view_items = empty( $_POST['post-type-label-view-items'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'View Pages' : 'View Posts' ) : sanitize_text_field( $_POST['post-type-label-view-items'] );
        $this->cpt->post_type_labels->search_items = empty( $_POST['post-type-label-search-items'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'Search Pages' : 'Search Posts' ) : sanitize_text_field( $_POST['post-type-label-search-items'] );
        $this->cpt->post_type_labels->not_found = empty( $_POST['post-type-label-not-found'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'No pages found' : 'No posts found' ) : sanitize_text_field( $_POST['post-type-label-not-found'] );
        $this->cpt->post_type_labels->not_found_in_trash = empty( $_POST['post-type-label-not-found-in-trash'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'No pages found in trash' : 'No posts found in trash' ) : sanitize_text_field( $_POST['post-type-label-not-found-in-trash'] );
        $this->cpt->post_type_labels->parent_item_colon = empty( $_POST['post-type-label-parent-item-colon'] ) ? 'Parent Page:': sanitize_text_field( $_POST['post-type-label-parent-item-colon'] );
        $this->cpt->post_type_labels->all_items = empty( $_POST['post-type-label-all-items'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'All Pages' : 'All Posts' ) : sanitize_text_field( $_POST['post-type-label-all-items'] );
        $this->cpt->post_type_labels->archives = empty( $_POST['post-type-label-archives'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'Page Archives' : 'Post Archives' ) : sanitize_text_field( $_POST['post-type-label-archives'] );
        $this->cpt->post_type_labels->attributes = empty( $_POST['post-type-label-attributes'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'Page Attributes' : 'Post Attributes' ) : sanitize_text_field( $_POST['post-type-label-attributes'] );
        $this->cpt->post_type_labels->insert_into_item = empty( $_POST['post-type-label-insert-into-item'] ) ? ($this->cpt->post_type_is_hierarchical ? 'Insert into page' : 'Insert into post' ) : sanitize_text_field( $_POST['post-type-label-insert-into-item'] );
        $this->cpt->post_type_labels->uploaded_to_this_item = empty( $_POST['post-type-label-uploaded-to-this-item'] ) ? ($this->cpt->post_type_is_hierarchical ? 'Uploaded to this page' : 'Uploaded to this post' ) : sanitize_text_field( $_POST['post-type-label-uploaded-to-this-item'] );
        $this->cpt->post_type_labels->featured_image = empty( $_POST['post-type-label-featured-image'] ) ? 'Featured image' : sanitize_text_field( $_POST['post-type-label-featured-image'] );
        $this->cpt->post_type_labels->set_featured_image = empty( $_POST['post-type-label-set-featured-image'] ) ? 'Set featured image' : sanitize_text_field( $_POST['post-type-label-set-featured-image'] );
        $this->cpt->post_type_labels->remove_featured_image = empty( $_POST['post-type-label-remove-featured-image'] ) ? 'Remove featured image' : sanitize_text_field( $_POST['post-type-label-remove-featured-image'] );
        $this->cpt->post_type_labels->use_featured_image = empty( $_POST['post-type-label-use-featured-image'] )  ? 'Use as featured image' : sanitize_text_field( $_POST['post-type-label-use-featured-image'] );
        $this->cpt->post_type_labels->menu_name = empty( $_POST['post-type-label-menu-name'] ) ? $this->cpt->post_type_label : sanitize_text_field( $_POST['post-type-label-menu-name'] );
        $this->cpt->post_type_labels->filter_items_list = empty( $_POST['post-type-label-filter-items-list']) ? ( $this->cpt->post_type_is_hierarchical ? 'Filter pages list' : 'Filter posts list' ) : sanitize_text_field( $_POST['post-type-label-filter-items-list'] );
        $this->cpt->post_type_labels->items_list_navigation = empty( $_POST['post-type-label-items-list-navigation'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'Pages list navigation' : 'Posts list navigation' ) : sanitize_text_field( $_POST['post-type-label-items-list-navigation'] );
        $this->cpt->post_type_labels->items_list = empty( $_POST['post-type-label-items-list'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'Pages list' : 'Posts list' ) : sanitize_text_field( $_POST['post-type-label-items-list'] );
        $this->cpt->post_type_labels->item_published = empty( $_POST['post-type-label-item-published'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'Page published' : 'Post published' ) : sanitize_text_field( $_POST['post-type-label-item-published'] );
        $this->cpt->post_type_labels->item_published_privately = empty( $_POST['post-type-label-item-published-privately'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'Page published privately' : 'Post published privately' ) : sanitize_text_field( $_POST['post-type-label-item-published-privately'] );
        $this->cpt->post_type_labels->item_reverted_to_draft = empty( $_POST['post-type-label-item-reverted-to-draft'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'Page reverted to draft' : 'Post reverted to draft' ) : sanitize_text_field( $_POST['post-type-label-item-reverted-to-draft'] );
        $this->cpt->post_type_labels->item_scheduled = empty( $_POST['post-type-label-item-scheduled'] ) ? ( $this->cpt->post_type_is_hierarchical ? 'Page scheduled' : 'Post scheduled' ) : sanitize_text_field( $_POST['post-type-label-item-scheduled'] );
        $this->cpt->post_type_labels->item_updated = empty( $_POST['post-type-label-item-updated'] ) ? ( $this->cpt->post_type_hierarchical ? 'Page updated' : 'Post updated') : sanitize_text_field( $_POST['post-type-label-item-updated'] );
        $this->cpt->post_type_description = empty( $_POST['post-type-description'] ) ? '' : sanitize_text_field( $_POST['post-type-description'] );

        /**
         * Verify post type menu position is valid.
         */
        if( isset( $_POST['post-type-menu-position'] ) ) {

            if( ! empty( $_POST['post-type-menu-position']) ) {

                /**
                 * Sanitise and assign post type menu position.
                 */
                $this->cpt->post_type_menu_position = sanitize_text_field( $_POST['post-type-menu-position'] );
                
                /**
                 * Verify post type menu position is numeric.
                 */
                if( ! is_numeric( $this->cpt->post_type_menu_position ) ) {
                    
                    /**
                     * Define validation error message.
                     */
                    $validation_error_msg = __( 'Menu position must be a numeric value.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );
                    
                    /**
                     * Add error message to validation errors.
                     */
                    $this->validation_errors['post-type-menu-position'] = $validation_error_msg;
                    
                    /**
                     * Add error message to validation summary.
                     */
                    $this->validation_summary[] = $validation_error_msg;
                    
                    /**
                     * Set valid model state to false.
                     */
                    $this->model_state = false;
                }

                /**
                 * Verify post type menu position in valid range.
                 */
                if( $this->cpt->post_type_menu_position < 5 || $this->cpt->post_type_menu_position > 100 ){
                    
                    /**
                     * Define validation error message.
                     */
                    $validation_error_msg = __( 'Menu position must be between 5 and 100.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );
                    
                    /**
                     * Add error message to validation errors.
                     */
                    $this->validation_errors['post-type-menu-position'] = $validation_error_msg;
                    
                    /**
                     * Add error message to validation summary.
                     */
                    $this->validation_summary[] = $validation_error_msg;

                    /**
                     * Set valid model state to false.
                     */
                    $this->model_state = false;
                }
            }
        }

        /**
         * Verify post type menu icon is valid.
         */
        if( isset( $_POST['post-type-menu-icon']) ) {

            /**
             * Sanitise and assign post type menu icon.
             */
            $this->cpt->post_type_menu_icon = sanitize_text_field( $_POST['post-type-menu-icon']);

            /**
             * Verify menu icon is valid image URL if not dashicon.
             */
            if( ! in_array($this->cpt->post_type_menu_icon, $this->dashicons)){
                if( ! filter_var($this->cpt->post_type_menu_icon, FILTER_VALIDATE_URL)){
                    
                    /**
                     * Define validation error message.
                     */
                    $validation_error_msg = __( 'Please provide a valid image file URL for menu icon.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );
                    
                    /**
                     * Add error message to validation errors.
                     */
                    $this->validation_errors['post-type-menu-icon'] = $validation_error_msg;
                    
                    /**
                     * Add error message to validation summary.
                     */
                    $this->validation_summary[] = $validation_error_msg;

                    /**
                     * Set valid model state to false.
                     */
                    $this->model_state = false;
                }
                else {

                    /**
                     * Get dimensions of image.
                     */
                    list( $width, $height, $type, $attr ) = getimagesize( $this->cpt->post_type_menu_icon );
                    
                    /**
                     * Verify image dimensions are valid.
                     */
                    if( $width > 20 || $height > 20 ) {

                        /**
                         * Define validation error message.
                         */
                        $validation_error_msg = __( 'The image for the menu icon must not be greater than 20 x 20 pixels.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );
                        
                        /**
                         * Add error message to validation errors.
                         */
                        $this->validation_errors['post-type-menu-icon'] = $validation_error_msg;
                        
                        /**
                         * Add error message to validation summary.
                         */
                        $this->validation_summary[] = $validation_error_msg;
                        
                        /**
                         * Set valid model state to false.
                         */
                        $this->model_state = false;
                    }
                }
            }
        }
        else {
            /**
             * Assign post type menu icon.
             */
            $this->cpt->post_type_menu_icon = 'dashicons-admin-post';
        }
        
        /**
         * Assign post capability type.
         */
        $this->cpt->post_capability_type = sanitize_key( $_POST['post-type-capability-type'] );

        /**
         * Assign post type supports.
         */
        $this->cpt->post_type_supports["title"] = isset( $_POST["post-type-supports-title"] ) && ! empty( $_POST['post-type-supports-title']) ? boolval( sanitize_key( $_POST["post-type-supports-title"] ) ) : false;
        $this->cpt->post_type_supports["editor"] = isset( $_POST["post-type-supports-editor"] ) && ! empty( $_POST['post-type-supports-editor'] ) ? boolval( sanitize_key( $_POST["post-type-supports-editor"] ) ) : false;
        $this->cpt->post_type_supports["thumbnail"] = isset( $_POST["post-type-supports-thumbnails"] ) && ! empty( $_POST['post-type-supports-thumbnails'] ) ? boolval( sanitize_key( $_POST["post-type-supports-thumbnails"] ) ) : false;
        $this->cpt->post_type_supports["comments"] = isset( $_POST["post-type-supports-comments"] ) && ! empty( $_POST['post-type-supports-comments'] ) ? boolval( sanitize_key( $_POST["post-type-supports-comments"] ) ) : false;
        $this->cpt->post_type_supports["revisions"] = isset( $_POST["post-type-supports-revisions"] ) && ! empty( $_POST['post-type-supports-revisions'] ) ? boolval( sanitize_key( $_POST["post-type-supports-revisions"] ) ) : false;
        $this->cpt->post_type_supports["trackbacks"] = isset( $_POST["post-type-supports-trackbacks"] ) && ! empty( $_POST['post-type-supports-trackbacks'] ) ? boolval( sanitize_key( $_POST["post-type-supports-trackbacks"] ) ) : false;
        $this->cpt->post_type_supports["author"] = isset( $_POST["post-type-supports-author"] ) && ! empty( $_POST['post-type-supports-author'] ) ? boolval( sanitize_key( $_POST["post-type-supports-author"] ) ) : false;
        $this->cpt->post_type_supports["excerpt"] = isset( $_POST["post-type-supports-excerpt"] ) && ! empty( $_POST['post-type-supports-excerpt'] ) ? boolval( sanitize_key( $_POST["post-type-supports-excerpt"] ) ) : false;
        $this->cpt->post_type_supports["page-attributes"] = isset( $_POST["post-type-supports-page-attributes"] ) && ! empty( $_POST['post-type-supports-page-attributes'] ) ? boolval( sanitize_key( $_POST["post-type-supports-page-attributes"] ) ) : false;
        $this->cpt->post_type_supports["custom-fields"] = isset( $_POST["post-type-supports-custom-fields"] ) && ! empty( $_POST['post-type-supports-custom-fields'] ) ? boolval( sanitize_key( $_POST["post-type-supports-custom-fields"] ) ) : false;
        $this->cpt->post_type_supports["post-formats"] = isset( $_POST["post-type-supports-post-formats"] ) && ! empty( $_POST['post-type-supports-post-formats'] ) ? boolval( sanitize_key( $_POST["post-type-supports-post-formats"] ) ) : false;

        /**
         * Assign post type custom supports.
         */
        $this->cpt->post_type_custom_supports = array();
        if( isset( $_POST['post-type-custom-support'] ) ) {
            if( is_array( $_POST['post-type-custom-support'] ) ) {
                if( sizeof( $_POST['post-type-custom-support'] > 0 ) ) {
                    foreach( $_POST['post-type-custom-support'] as $support ) {
                        $this->cpt->post_type_custom_supports[] = sanitize_key( $support );
                    }
                }
            }
        }

        /**
         * Assign post type archive.
         */
        $this->cpt->post_type_has_archive = isset( $_POST['post-type-has-archive'] ) && ! empty( $_POST['post-type-has-archive'] ) ? boolval( sanitize_key( $_POST['post-type-has-archive'] ) ) : false;
        $this->cpt->post_type_archive_slug = isset( $_POST['post-type-archive-slug'] ) && $this->cpt->post_type_has_archive ? sanitize_text_field( strtolower( $_POST['post-type-archive-slug'] ) ) : $this->cpt->post_type_key;

        /**
         * Assign post type rewrite rules.
         */
        $this->cpt->post_type_rewrite = isset( $_POST['post-type-rewrite'] ) && ! empty( $_POST['post-type-rewrite'] ) ? boolval( sanitize_key( $_POST['post-type-rewrite'] ) ) : false;
        $this->cpt->post_type_rewrite_rules['slug'] = empty( $_POST['post-type-rewrite-slug'] ) ? $this->cpt->post_type_key : sanitize_text_field( $_POST['post-type-rewrite-slug'] );
        $this->cpt->post_type_rewrite_rules['with-front'] = isset( $_POST["post-type-rewrite-with-front"] ) && ! empty( $_POST['post-type-rewrite-with-front'] ) ? boolval( sanitize_key( $_POST['post-type-rewrite-with-front'] ) ) : false;
        $this->cpt->post_type_rewrite_rules['feeds'] = isset( $_POST['post-type-rewrite-feeds'] ) && ! empty( $_POST['post-type-rewrite-feeds'] ) ? boolval( sanitize_key( $_POST['post-type-rewrite-feeds'] ) ) : false;
        $this->cpt->post_type_rewrite_rules['pages'] = isset( $_POST['post-type-rewrite-pages'] ) && ! empty( $_POST['post-type-rewrite-pages'] ) ? boolval( sanitize_key( $_POST['post-type-rewrite-pages'] ) ) : false;

        /**
         * Assign query var.
         */
        $this->cpt->post_type_query_var = isset( $_POST['post-type-query-var'] ) && ! empty( $_POST['post-type-query-var'] ) ? boolval( sanitize_key( $_POST['post-type-query-var'] ) ) : false;
        $this->cpt->post_type_query_var_slug = ! empty ( $_POST['post-type-query-var-slug'] ) && $this->cpt->post_type_query_var ? sanitize_text_field( strtolower( $_POST['post-type-query-var-slug'] ) ) : $this->cpt->post_type_key; 

        /**
         * Assign can export setting.
         */
        $this->cpt->post_type_can_export = isset( $_POST['post-type-can-export'] ) && ! empty( $_POST['post-type-can-export']) ? boolval( sanitize_key( $_POST['post-type-can-export'] ) ) : false;

        /**
         * Assign delete with user setting.
         */
        $this->cpt->post_type_delete_with_user = isset( $_POST['post-type-delete-with-user'] ) && ! empty( $_POST['post-type-delete-with-user'] ) ? boolval( sanitize_key( $_POST['post-type-delete-with-user'] ) ) : false;

        /**
         * Assign registered taxonomies.
         */
        $this->cpt->post_type_taxonomies = array();
        if( isset( $_POST['post-type-taxonomies'] ) ) {
            if( is_array( $_POST['post-type-taxonomies'] ) ) {
                if( sizeof( $_POST['post-type-taxonomies'] ) > 0 ) {
                    foreach( $_POST['post-type-taxonomies'] as $taxonomy ) {
                        $this->cpt->post_type_taxonomies[] = sanitize_key( $taxonomy );
                    }
                }
            }
        }

        /**
         * Return model state.
         */
        return $this->model_state;
    }
}