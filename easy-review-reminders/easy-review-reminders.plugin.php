<?php
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists( 'Easy_Review_Reminders' ) ) {

    if( !class_exists( 'ERR_Review_Reminders' ) )
        require_once ( ERR_INCLUDES_DIR . 'class-err-review-reminders.php' );

    if( !class_exists( 'ERR_Cron' ) )
        require_once ( ERR_INCLUDES_DIR . 'class-err-cron.php' );

    if( !class_exists( 'ERR_Emails' ) )
        require_once ( ERR_INCLUDES_DIR . 'class-err-emails.php' );

    if( !class_exists( 'ERR_AJAX' ) )
        require_once ( ERR_INCLUDES_DIR . 'class-err-ajax.php' );

    if( !class_exists( 'ERR_Endpoint' ) )
        require_once ( ERR_INCLUDES_DIR . 'class-err-endpoint.php');

    if( !class_exists( 'ERR_Custom_Meta_Boxes' ) )
        require_once ( ERR_INCLUDES_DIR . 'class-err-custom-meta-boxes.php' );

    if( !class_exists( 'ERR_Reminder_Manager' ) )
        require_once ( ERR_INCLUDES_DIR . 'class-err-reminder-manager.php' );

    if( !class_exists( 'ERR_Functions' ) )
        require_once ( ERR_INCLUDES_DIR . 'class-err-functions.php' );

    if( !class_exists( 'ERR_Bundled_Products' ) )
        require_once ( ERR_INCLUDES_DIR . 'class-err-bundled-products.php' );

    if( !class_exists( 'ERR_Composite_Products' ) )
        require_once ( ERR_INCLUDES_DIR . 'class-err-composite-products.php' );

    /**
     * Class Easy_Review_Reminders
     */
    class Easy_Review_Reminders {

        /*
	     |--------------------------------------------------------------------------------------------------------------
	     | Class Members
	     |--------------------------------------------------------------------------------------------------------------
	     */

        private static $_instance;
        private $_err_review_reminders;
        private $_err_cron;
        private $_err_emails;
        private $_err_ajax;
        private $_err_endpoint;
        private $_err_custom_meta_boxes;
        private $_err_reminder_manager;
        private $_err_bundled_products;
        private $_err_composite_products;

        const VERSION = '1.2.4';

        /*
	     |--------------------------------------------------------------------------------------------------------------
	     | Mesc Functions
	     |--------------------------------------------------------------------------------------------------------------
	     */

        /**
         * Class constructor.
         *
         * @since 1.0.0
         */
        public function __construct() {

            $this->_err_review_reminders = ERR_Review_Reminders::getInstance();
            $this->_err_cron = ERR_Cron::getInstance();
            $this->_err_emails = ERR_Emails::getInstance();
            $this->_err_ajax = ERR_AJAX::getInstance();
            $this->_err_endpoint = ERR_Endpoint::getInstance();
            $this->_err_custom_meta_boxes = ERR_Custom_Meta_Boxes::getInstance();
            $this->_err_reminder_manager = ERR_Reminder_Manager::getInstance();
            $this->_err_bundled_products = ERR_Bundled_Products::getInstance();
            $this->_err_composite_products = ERR_Composite_Products::getInstance();

        }

        /**
         * Create plugin instance.
         *
         * @return Easy_Review_Reminders
         * @since 1.0.0
         */
        public static function getInstance() {

            if( !self::$_instance instanceof self )
                self::$_instance = new self;

            return self::$_instance;

        }

        /*
	     |--------------------------------------------------------------------------------------------------------------
	     | Bootstrap/Shutdown Functions
	     |--------------------------------------------------------------------------------------------------------------
	     */

        /**
         * Plugin activation hook callback.
         *
         * @since 1.0.0
         * @access public
         *
         * @param boolean $network_wide Flag that determines if the plugin is activated network wide.
         */
        public function errActivate( $network_wide ) {

            global $wpdb;

            if( is_multisite() ){

                if( $network_wide ){

                    // get ids of all sites
                    $blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );

                    foreach( $blog_ids as $blog_id ){

                        switch_to_blog( $blog_id );
                        $this->errInitDefaultData( $blog_id );

                    }

                    restore_current_blog();

                }else{

                    // activated on a single site, in a multi-site
                    $this->errInitDefaultData( $wpdb->blogid );

                }

            }else{

                // activated on a single site
                $this->errInitDefaultData( $wpdb->blogid );

            }
        }

        /**
         * Actual function that houses the code to execute on plugin activation.
         *
         * @param $blogid
         *
         * @since 1.2.0
         */
        private function errInitDefaultData( $blogID ) {

            // Initialize CPT
            $this->_err_review_reminders->errRegisterReviewRemindersCPT();

            // Set default value for Time Considered "Not Reviewed"
            $errTimeConsideredNotReviewed = get_option( 'err_general_considered_not_reviewed' );
            if( empty( $errTimeConsideredNotReviewed ) )
                update_option( 'err_general_considered_not_reviewed', '30' );

            $errEmailSchedules = get_option( ERR_EMAIL_SCHEDULES_OPTION );

            if ( ! is_array( $errEmailSchedules ) && empty( $errEmailSchedules[ 'initial' ] ) ){

                $errEmails = ERR_Emails::getInstance();
                $errEmailSchedules = array();

                $errEmailSchedules[ 'initial' ][ 'subject' ] = stripslashes( $errEmails->errDefaultTemplate[ 'subject' ] );
                $errEmailSchedules[ 'initial' ][ 'wrap' ] = 'yes';
                $errEmailSchedules[ 'initial' ][ 'heading_text' ] = '';
                $errEmailSchedules[ 'initial' ][ 'days_after_successful_order' ] = 1;
                $errEmailSchedules[ 'initial' ][ 'content' ] = stripslashes( $errEmails->errDefaultTemplate[ 'body' ] );

                update_option( ERR_EMAIL_SCHEDULES_OPTION, $errEmailSchedules );
            }

            // Flush rewrite rules after CPT has been initialized
            flush_rewrite_rules();

            update_option( 'err_activation_code_triggered' , 'yes' );
        }

        /**
         * Method to initialize a newly created site in a multi site set up.
         *
         * @param $blogID
         * @param $userID
         * @param $domain
         * @param $path
         * @param $siteID
         * @param $meta
         *
         * @since 1.2.0
         */
        public function errMultisiteInit( $blogID , $userID , $domain , $path , $siteID , $meta ) {

            if ( is_plugin_active_for_network( 'easy-review-reminders/easy-review-reminders.bootstrap.php' ) ) {

                switch_to_blog( $blogID );
                $this->errInitDefaultData( $blogID );
                restore_current_blog();

            }
        }

        /**
         * Plugin deactivation hook callback.
         *
         * @since 1.0.0
         */
        public function errDeactivate() {

        }

        /**
         * Plugin initialization.
         *
         * @since 1.0.0
         */
        public function errInitialize() {

            if ( get_option( 'err_activation_code_triggered' , false ) !== 'yes' ) {

                if ( ! function_exists( 'is_plugin_active_for_network' ) )
                    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

                $network_wide = is_plugin_active_for_network( 'easy-review-reminders/easy-review-reminders.bootstrap.php' );
                $this->errActivate( $network_wide );

            }
        }


        /*
	    |---------------------------------------------------------------------------------------------------------------
	    | Admin Functions
	    |---------------------------------------------------------------------------------------------------------------
	    */

        /**
         * Load admin or back-end related styles and scripts.
         *
         * @since 1.0.0
         */
        public function errLoadBackEndStylesAndScripts() {

            $screen = get_current_screen();

            if( is_admin() && $screen->post_type == ERR_CPT_NAME ){

                // Styles
                wp_enqueue_style( 'err_backend_css' , ERR_CSS_URL . 'err-backend.css' , array(), self::VERSION , 'all' );

            }

            if( ( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'err_settings' ) || ( isset( $_GET['section'] ) && $_GET['section'] == "err_settings_emails_section" ) ){

                // Scripts
                wp_enqueue_script( 'err_settings_js' , ERR_JS_URL . 'app/err-settings.js', array( 'jquery' ) , self::VERSION , true );

            }

            if( isset( $_GET[ 'section' ] ) && $_GET[ 'section' ] == 'err_settings_email_schedules' ){

                // Styles
                wp_enqueue_style( 'err_email_schedules_css' , ERR_CSS_URL . 'err-email-schedules.css' , array(), self::VERSION , 'all' );
                wp_enqueue_style( 'err_toastr_css' , ERR_JS_URL . 'lib/toastr/toastr.min.css' , array() , self::VERSION , 'all' );

                // Scripts
                wp_enqueue_script( 'jquery-ui-dialog' );
                wp_enqueue_script( 'err_actions_js' , ERR_JS_URL . 'app/modules/errActions.js' , array( 'jquery' ) , self::VERSION );
                wp_enqueue_script( 'err_toastr_js' , ERR_JS_URL . 'lib/toastr/toastr.min.js' , array( 'jquery' ) , self::VERSION );
                wp_enqueue_script( 'err_backend_ajax_services_js' , ERR_JS_URL . 'app/modules/errBackendAJAXServices.js', array( 'jquery' ) , self::VERSION , true );
                wp_enqueue_script( 'err_settings_email_schedule_js' , ERR_JS_URL . 'app/err-settings-email-schedules.js', array( 'jquery' ) , self::VERSION , true );
                wp_localize_script( 'err_settings_email_schedule_js',
                                    'err_email_schedule_control_vars',
                                    array(
                                        'empty_fields_error_message'    =>  __( 'Please fill the form properly. <br/>Some fields have invalid values.', 'easy-review-reminders' ),
                                        'success_save_message'          =>  __( 'Schedule Successfully Added', 'easy-review-reminders' ),
                                        'failed_save_message'           =>  __( 'Failed To Save Schedule', 'easy-review-reminders' ),
                                        'success_edit_message'          =>  __( 'Schedule Successfully Updated', 'easy-review-reminders' ),
                                        'failed_edit_message'           =>  __( 'Failed To Update Schedule', 'easy-review-reminders' ),
                                        'failed_retrieve_message'       =>  __( 'Failed Retrieve Schedule Data', 'easy-review-reminders' ),
                                        'confirm_box_message'           =>  __( 'Clicking OK will remove the schedule from the list', 'easy-review-reminders' ),
                                        'no_schedules_message'          =>  __( 'No Schedules Found', 'easy-review-reminders' ),
                                        'failed_delete_message'         =>  __( 'Failed To Delete Schedule', 'easy-review-reminders' ),
                                        'success_delete_message'        =>  __( 'Schedule Deleted Successfully', 'easy-review-reminders' ),
                                        'failed_view'                   =>  __( 'Failed To View', 'easy-review-reminders' ),
                                        'subject_empty'                 =>  __( '"Subject" field is empty.', 'easy-review-reminders' ),
                                        'days_empty'                    =>  __( '"Days After Successful Order" field is empty.', 'easy-review-reminders' ),
                                        'days_positive_only'            =>  __( '"Days After Successful Order" only accepts positive value.', 'easy-review-reminders' ),
                                        'days_duplicate_values'         =>  __( 'Duplicate "Days After Successful Order" value.', 'easy-review-reminders' ),
                                        'content_empty'                 =>  __( '"Content" is empty.', 'easy-review-reminders' ),
                                        'heading_text_empty'            =>  __( '"Heading Text" is empty.', 'easy-review-reminders' ),

                                    ) );
            }

            if( isset( $_GET['section'] ) && $_GET['section'] == "err_blacklist_emails_section" ){

                // Styles
                wp_enqueue_style( 'err_blacklist_emails_option' , ERR_CSS_URL . 'err-blacklist-emails-option.css' , array(), self::VERSION , 'all' );
                wp_enqueue_style( 'err_toastr_css' , ERR_JS_URL . 'lib/toastr/toastr.min.css' , array() , self::VERSION , 'all' );

                // Scripts
                wp_enqueue_script( 'err_toastr_js' , ERR_JS_URL . 'lib/toastr/toastr.min.js' , array( 'jquery' ) , self::VERSION );
                wp_enqueue_script( 'err_actions_js' , ERR_JS_URL . 'app/modules/errActions.js' , array( 'jquery' ) , self::VERSION );
                wp_enqueue_script( 'err_backend_ajax_services_js' , ERR_JS_URL . 'app/modules/errBackendAJAXServices.js', array( 'jquery' ) , self::VERSION , true );
                wp_enqueue_script( 'err_settings_blacklist_js' , ERR_JS_URL . 'app/err-settings-blacklist.js', array( 'jquery' ) , self::VERSION , true );
                wp_localize_script( 'err_settings_blacklist_js',
                                    'err_blacklist_control_vars',
                                    array(
                                        'empty_fields_error_message'    =>  __( 'Please Fill The Form Properly. The following fields have empty values.', 'easy-review-reminders' ),
                                        'error_email_format'            =>  __( 'Please enter the correct email format.', 'easy-review-reminders' ),
                                        'success_save_message'          =>  __( 'Email Successfully Added', 'easy-review-reminders' ),
                                        'failed_save_message'           =>  __( 'Failed To Save Email', 'easy-review-reminders' ),
                                        'success_edit_message'          =>  __( 'Email Successfully Edited', 'easy-review-reminders' ),
                                        'failed_edit_message'           =>  __( 'Failed To Edit Email', 'easy-review-reminders' ),
                                        'failed_retrieve_message'       =>  __( 'Failed Retrieve Email Data', 'easy-review-reminders' ),
                                        'confirm_box_message'           =>  __( 'Clicking OK will remove the email from the list', 'easy-review-reminders' ),
                                        'no_custom_field_message'       =>  __( 'No Emails Found', 'easy-review-reminders' ),
                                        'failed_delete_message'         =>  __( 'Failed To Delete Email', 'easy-review-reminders' ),
                                        'success_delete_message'        =>  __( 'Email Deleted Successfully', 'easy-review-reminders' ),
                                    ) );
            }
        }

        /**
         * Load front-end related styles and scripts.
         *
         * @since 1.0.0
         */
        public function errLoadFrontEndStylesAndScripts() {

        }



        /*
	    |---------------------------------------------------------------------------------------------------------------
	    | AJAX Callbacks
	    |---------------------------------------------------------------------------------------------------------------
	    */

        /**
         * Register AJAX callbacks.
         *
         * @since 1.0.0
         */
        public function errRegisterAJAXCallHandlers() {

            add_action( 'wp_ajax_errAddEmailToBlacklist' , array( self::getInstance() , 'errAddEmailToBlacklist' ), 10, 2 );
            add_action( 'wp_ajax_errDeleteEmailFromBlacklist' , array( self::getInstance() , 'errDeleteEmailFromBlacklist' ), 10 );

            add_action( 'wp_ajax_errViewEmailSchedule' , array( self::getInstance() , 'errViewEmailSchedule' ), 10 );
            add_action( 'wp_ajax_errUpdateEmailSchedule' , array( self::getInstance() , 'errUpdateEmailSchedule' ), 10, 2 );

        }

        /*
        |---------------------------------------------------------------------------------------------------------------
        | Load Plugin Textdomain
        |---------------------------------------------------------------------------------------------------------------
        */
        /**
         * Load plugin Textdomain
         *
         * @since 1.0.0
         */
        public function errLoadPluginTextdomain() {

            load_plugin_textdomain( 'easy-review-reminders', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );

        }

        /*
        |---------------------------------------------------------------------------------------------------------------
        | Settings
        |---------------------------------------------------------------------------------------------------------------
        */


        /**
         * Settings Config for ERR
         *
         * @return array
         * @since 1.0.0
         */
        public function errSettings(){

            $settings[] = include( ERR_INCLUDES_DIR . 'class-err-settings.php' );

            return $settings;

        }

        /**
         * Add custom action links for the plugin in the plugin listings
         *
         * @param string $links
         * @param string $file
         *
         * @return array
         * @since 1.0.0
         */
        public function errAddPluginListingCustomActionLinks( $links , $file ){

            $helpLink       = '<a href="https://marketingsuiteplugin.com/knowledge-base/easy-review-reminders/?utm_source=ERR&utm_medium=Settings%20Help&utm_campaign=ERR">' . __( 'Help' , 'easy-review-reminders' ) . '</a>';
            $settingsLink   = '<a href="admin.php?page=wc-settings&tab=err_settings">' . __( 'Settings' , 'easy-review-reminders' ) . '</a>';
            array_unshift( $links, $helpLink, $settingsLink );

            return $links;
        }

        /*
        |---------------------------------------------------------------------------------------------------------------
        | Review Reminders Class
        |---------------------------------------------------------------------------------------------------------------
        */

        /**
         * Used to register new Review Reminder CPT
         *
         * @since 1.0.0
         */
        public function errRegisterReviewRemindersCPT(){

            $this->_err_review_reminders->errRegisterReviewRemindersCPT();

        }

        /**
         * Register custom post status for ERR post type
         *
         * @since 1.0.0
         */
        public function errCreateCustomPostStatus(){

            $this->_err_review_reminders->errCreateCustomPostStatus();

        }

        /**
         * Create new column on the Review Reminder CPT
         *
         * @return mixed
         * @since 1.0.0
         */
        public function errSetNewReviewRemindersColumn( $columns ){

            return $this->_err_review_reminders->errSetNewReviewRemindersColumn( $columns );

        }

        /**
         * Sets the row value of the new column
         *
         * @since 1.0.0
         */
        public function errReviewRemindersNewColumns( $columns, $postID ){

            $this->_err_review_reminders->errReviewRemindersNewColumns( $columns, $postID );

        }

        /**
         * Used for tracking completed orders
         *
         * @param int $orderID
         *
         * @since 1.0.0
         */
        public function errOrderStatusCompleted( $orderID ){

            $this->_err_review_reminders->errOrderStatusCompleted( $orderID );

        }

        /**
         * Set session flag if the customer clicks on the review link that was sent to them through email
         *
         * @since 1.0.0
         */
        public function errSetSessionFlagIfCustomerClicksTheReviewLink(){

            $this->_err_review_reminders->errSetSessionFlagIfCustomerClicksTheReviewLink();

        }

        /**
         * Change the post status to Reviewed when customers leave a review of the product
         *
         * @param string $location
         * @param object $comment
         *
         * @since 1.0.0
         */
        public function errChangePostStatusToReviewed( $location, $comment ){

            return $this->_err_review_reminders->errChangePostStatusToReviewed( $location, $comment );

        }

        /**
         * Run Time Considered Not Reviewed Cron
         *
         * @param int $reminderID
         *
         * @since 1.0.0
         */
        public function errChangeStatusToNotReviewed( $reminderID ){

            $this->_err_review_reminders->errChangeStatusToNotReviewed( $reminderID );

        }

        /**
         * Catch endpoint query vars.
         *
         * @param array $vars
         *
         * @since 1.0.0
         */
        public function errAddQueryVars( $vars ){

            return $this->_err_review_reminders->errAddQueryVars( $vars );

        }

        /**
         * Display notice message after review is added.
         *
         * @param int $commentID
         * @param object $comment
         *
         * @since 1.0.0
         */
        public function errDisplayMessageAfterReviewIsAdded( $commentID, $comment ){

            $this->_err_review_reminders->errDisplayMessageAfterReviewIsAdded( $commentID, $comment );

        }

        /**
         * If a user is deleted, remove any entries associated with it
         *
         * @since 1.1.0
         */
        public function errDeleteUser( $userID ){

            $this->_err_review_reminders->errDeleteUser( $userID );

        }

        /**
         * Store the comment information into the product's postmeta after the customer successfully added a review of the product.
         *
         * @param object $comment
         * @param array|session $postForReview
         *
         * @since 1.2.0
         */
        public function errTrackCustomerReviewedProduct( $comment, $postForReview ){

            $this->_err_review_reminders->errTrackCustomerReviewedProduct( $comment, $postForReview );

        }

        /*
        |---------------------------------------------------------------------------------------------------------------
        | Cron Class
        |---------------------------------------------------------------------------------------------------------------
        */

        /**
         * Set custom cron schedule
         *
         * @since 1.0.0
         */
        public function errRunCronManually(){

            $this->_err_cron->errRunCronManually();

        }

        /**
         * Add admin notices for debug options
         *
         * @since 1.0.0
         */
        public function errDebugAdminNotices(){

            $this->_err_cron->errDebugAdminNotices();

        }

        /**
         * Schedule Not Reviewed cron event after every or last email.
         *
         * @param int $reminderID
         * @param mixed $scheduleID
         * @param string $errStatus
         * @param string $email
         * @param bool $isSent
         *
         * @since 1.0.0
         */
        public function errScheduleNotReviewedEvent( $reminderID, $scheduleID, $errStatus, $email, $isSent ){

            if( ! empty( $errStatus ) )
                $this->_err_cron->errScheduleNotReviewedEvent( $reminderID, $scheduleID, $errStatus, $email, $isSent );

        }

        /*
        |---------------------------------------------------------------------------------------------------------------
        | Emails Class
        |---------------------------------------------------------------------------------------------------------------
        */

        /**
         * Run email sender
         *
         * @param int $reminderID
         * @param array $errEmails
         * @param string $email
         *
         * @since 1.0.0
         */
        public function errEmailSender( $reminderID, $errEmails, $email ){

            $this->_err_emails->errEmailSender( $reminderID, $errEmails, $email );

        }

        /*
        |---------------------------------------------------------------------------------------------------------------
        | AJAX Class
        |---------------------------------------------------------------------------------------------------------------
        */

        /**
         * Blacklist email address.
         *
         * @param string $email
         *
         * @since 1.0.0
         */
        public function errAddEmailToBlacklist( $email = null, $reason = null ){

            $this->_err_ajax->errAddEmailToBlacklist( $email, $reason );

        }

        /**
         * Remove email address from blacklist.
         *
         * @param string $email
         *
         * @since 1.0.0
         */
        public function errDeleteEmailFromBlacklist( $email = null ){

            $this->_err_ajax->errDeleteEmailFromBlacklist( $email );

        }

        /**
         * Option to view the email schedule details
         *
         * @param string $key
         *
         * @since 1.0.0
         */
        public function errViewEmailSchedule( $key = null ){

            $this->_err_ajax->errViewEmailSchedule( $key );

        }

        /**
         * Update the email schedule
         *
         * @param string $key
         * @param array $emailFields
         *
         * @since 1.0.0
         */
        public function errUpdateEmailSchedule( $key = null, $emailFields = null ){

            $this->_err_ajax->errUpdateEmailSchedule( $key, $emailFields );

        }

        /*
        |---------------------------------------------------------------------------------------------------------------
        | Endpoint Class
        |---------------------------------------------------------------------------------------------------------------
        */

        /**
         * Initialize Endpoint
         *
         * @since 1.0.0
         */
        public function errEndpointInit(){

            $this->_err_endpoint->errEndpointInit();

        }

        /**
         * Catch endpoint vars.
         *
         * @since 1.0.0
         */
        public function errCatchEndpointVars(){

            $this->_err_endpoint->errCatchEndpointVars();

        }

        /**
         * Endpoint filter request.
         *
         * @param array $vars
         *
         * @since 1.0.0
         */
        public function errEndpointFilterRequest( $vars ){

            return $this->_err_endpoint->errEndpointFilterRequest( $vars );

        }

        /*
        |---------------------------------------------------------------------------------------------------------------
        | Custom Meta Boxes Class
        |---------------------------------------------------------------------------------------------------------------
        */

        /**
         * Add new meta boxes
         *
         * @since 1.0.0
         */
        public function errMetaBoxes(){

            $this->_err_custom_meta_boxes->errMetaBoxes();

        }

        /*
        |---------------------------------------------------------------------------------------------------------------
        | Order Manager Class
        |---------------------------------------------------------------------------------------------------------------
        */

        /**
         * Unset all cron events when ERR CPT or Order entry are trashed.
         *
         * @param int $postID
         *
         * @since 1.0.0
         */
        public function errTrashERRCPTEntry( $postID ){

            $this->_err_reminder_manager->errTrashERRCPTEntry( $postID );

        }

        /**
         * Set cron events when ERR CPT and Order entry are restored from trash.
         *
         * @param int $postID
         *
         * @since 1.0.0
         */
        public function errRestoreERRCPTEntry( $postID ){

            $this->_err_reminder_manager->errRestoreERRCPTEntry( $postID );

        }

        /**
         * Before the entry is deleted, we must remove any cron events attached.
         *
         * @param int $reminderID
         *
         * @since 1.0.0
         */
        public function errBeforeDeleteERRCPTEntry( $reminderID ){

            $this->_err_reminder_manager->errBeforeDeleteERRCPTEntry( $reminderID );

        }

        /**
         * Delete entry when toggling order status aside from completed.
         *
         * @param int $orderID
         *
         * @since 1.0.0
         */
        public function errRemoveEntry( $orderID ){

            $this->_err_reminder_manager->errRemoveEntry( $orderID );

        }

        /*
        |---------------------------------------------------------------------------------------------------------------
        | Bundled Products Class
        |---------------------------------------------------------------------------------------------------------------
        */

        /**
         * Change the tr class of bundled items to allow their styling.
         *
         * @param string $classname
         * @param array $item
         * @param string $itemKey
         *
         * @return string
         * @since 1.1.0
         */
        public function errBundlesTableItemClass( $classname, $item, $itemKey ){

            return $this->_err_bundled_products->errBundlesTableItemClass( $classname, $item, $itemKey );

        }

        /*
        |---------------------------------------------------------------------------------------------------------------
        | Composite Products Class
        |---------------------------------------------------------------------------------------------------------------
        */

        /**
         * Change the tr class of bundled items to allow their styling.
         *
         * @param string $classname
         * @param array $item
         * @param string $itemKey
         *
         * @return string
         * @since 1.1.0
         */
        public function errCompositeTableItemClass( $classname, $item, $itemKey ){

            return $this->_err_composite_products->errCompositeTableItemClass( $classname, $item, $itemKey );

        }
    }
}
