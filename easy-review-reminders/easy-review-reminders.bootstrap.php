<?php
/**
 * Plugin Name:       Easy Review Reminders
 * Plugin URI:        https://marketingsuiteplugin.com/
 * Description:       Automates the process of prompting customers for a review in WooCommerce.
 * Version:           1.2.4
 * Author:            Rymera Web Co
 * Author URI:        http://rymera.com.au/
 * Text Domain:       easy-review-reminders
 */

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	// Include Necessary Files
	require_once ( 'easy-review-reminders.options.php' );
	require_once ( 'easy-review-reminders.plugin.php' );

	// Get Instance of Main Plugin Class
	$easy_review_reminders = Easy_Review_Reminders::getInstance();
	$GLOBALS[ 'easy_review_reminders' ] = $easy_review_reminders;

	// Register Activation Hook
	register_activation_hook( __FILE__ , array( $easy_review_reminders, 'errActivate' ) );

	// Register Deactivation Hook
	register_deactivation_hook( __FILE__ , array( $easy_review_reminders, 'errDeactivate' ) );

	// Plugin Initialization
	add_action( 'init', array( $easy_review_reminders, 'errInitialize' ) );

	// Execute plugin initialization ( plugin activation ) on every newly created site in a multi site set up
    add_action( 'wpmu_new_blog', array( $easy_review_reminders, 'errMultisiteInit' ), 10, 6 );

	//  Register AJAX Call Handlers
	add_action( 'init', array( $easy_review_reminders, 'errRegisterAJAXCallHandlers' ) );

	// Load Backend CSS and JS
	add_action( 'admin_enqueue_scripts', array( $easy_review_reminders, 'errLoadBackEndStylesAndScripts' ) );

	// Load Frontend CSS and JS
	add_action( 'wp_enqueue_scripts', array( $easy_review_reminders, 'errLoadFrontEndStylesAndScripts' ) );

	// Register Review Reminders CPT
	add_action( 'init', array( $easy_review_reminders, 'errRegisterReviewRemindersCPT' ) );

	// Register custom post status for ERR post type
	add_action( 'init', array( $easy_review_reminders , 'errCreateCustomPostStatus' ), 20 );

	// Used for tracking completed orders
	add_action( 'woocommerce_order_status_completed', array( $easy_review_reminders, 'errOrderStatusCompleted' ), 10, 1 );

	// Delete entry when toggling order status aside from completed.
	add_action( 'woocommerce_order_status_completed_to_on-hold', array( $easy_review_reminders, 'errRemoveEntry' ) );
	add_action( 'woocommerce_order_status_completed_to_failed', array( $easy_review_reminders, 'errRemoveEntry' ) );
	add_action( 'woocommerce_order_status_completed_to_cancelled', array( $easy_review_reminders, 'errRemoveEntry' ) );
	add_action( 'woocommerce_order_status_completed_to_processing', array( $easy_review_reminders, 'errRemoveEntry' ) );
	add_action( 'woocommerce_order_status_completed_to_refunded', array( $easy_review_reminders, 'errRemoveEntry' ) );
	add_action( 'woocommerce_order_status_completed_to_pending', array( $easy_review_reminders, 'errRemoveEntry' ) );

	// Register Settings Page
	add_filter( 'woocommerce_get_settings_pages', array( $easy_review_reminders, 'errSettings' ) );
	add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ) , array( $easy_review_reminders , 'errAddPluginListingCustomActionLinks' ) , 10 , 2 );

	// Run Email Sender
	add_action( ERR_EMAIL_SENDER_CRON, array( $easy_review_reminders, 'errEmailSender' ), 10, 3 );

	// Manually run cron jobs
	add_filter( 'admin_init', array( $easy_review_reminders, 'errRunCronManually' ) );
	add_action( 'admin_notices', array( $easy_review_reminders, 'errDebugAdminNotices' ), 100 );

	// Add custom column to Review Reminders CPT
	add_filter( 'manage_err-review-reminders_posts_columns', array( $easy_review_reminders, 'errSetNewReviewRemindersColumn' ), 10, 1 );
	add_action( 'manage_err-review-reminders_posts_custom_column' , array( $easy_review_reminders, 'errReviewRemindersNewColumns' ), 10, 2 );

	// Add our custom Endpoint for our unsubscribe page
	add_action( 'init', array( $easy_review_reminders, 'errEndpointInit' ) );
	add_action( 'template_redirect', array( $easy_review_reminders, 'errCatchEndpointVars' ) );
	add_filter( 'request', array( $easy_review_reminders, 'errEndpointFilterRequest' ), 10, 1 );
	add_filter( 'query_vars', array( $easy_review_reminders, 'errAddQueryVars' ), 10, 1 );

	// Add/Remove new meta boxes
	add_action( 'add_meta_boxes', array( $easy_review_reminders , 'errMetaBoxes' ) );

	// After customer leaves a review on any items in the email, change the status to "Reviewed"
	add_action( 'template_redirect', array( $easy_review_reminders , 'errSetSessionFlagIfCustomerClicksTheReviewLink' ) );
	add_filter( 'comment_post_redirect', array( $easy_review_reminders , 'errChangePostStatusToReviewed' ), 10, 2 );

	// Run Time Considered Not Reviewed Cron
	add_action( ERR_TIME_CONSIDERED_NOT_REVIEWED_CRON, array( $easy_review_reminders, 'errChangeStatusToNotReviewed' ), 10 );

	// Schedule Not Reviewed cron event after every or last email.
	add_action( 'err_send_email', array( $easy_review_reminders, 'errScheduleNotReviewedEvent' ), 10, 5 );

	// Orders Manager
	add_action( 'trashed_post', array( $easy_review_reminders, 'errTrashERRCPTEntry' ) );
	add_action( 'untrashed_post', array( $easy_review_reminders, 'errRestoreERRCPTEntry' ) );
	add_action( 'before_delete_post', array( $easy_review_reminders, 'errBeforeDeleteERRCPTEntry' ) );

    // Display notice message after review is added.
    add_action( 'wp_insert_comment', array( $easy_review_reminders, 'errDisplayMessageAfterReviewIsAdded' ), 10, 2 );

	// Load Plug-ins Text Domain
	add_action( 'plugins_loaded', array( $easy_review_reminders, 'errLoadPluginTextdomain' ) );

	// If a user is deleted, remove any entries associated with it
	add_action( 'delete_user', array( $easy_review_reminders, 'errDeleteUser' ) );

	// Check if Product Bundles plugin is activated
	if( in_array( 'woocommerce-product-bundles/woocommerce-product-bundles.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){

		// Display Bundled products properly on the ordered items meta box
		add_filter( 'err_order_item_class', array( $easy_review_reminders, 'errBundlesTableItemClass' ), 10, 3 );

	}

	// Check if Composite Products plugin is activated
	if( in_array( 'woocommerce-composite-products/woocommerce-composite-products.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){

		// Display Composite products properly on the ordered items meta box
		add_filter( 'err_order_item_class', array( $easy_review_reminders, 'errCompositeTableItemClass' ), 10, 3 );

	}

	// Store the comment information into the product's postmeta after the customer successfully added a review of the product.
	add_action( 'err_notice_message_after_review', array( $easy_review_reminders, 'errTrackCustomerReviewedProduct' ), 10, 2 );

}else{

    /**
     * Display admin notice that WooCommerce is not installed.
     *
     * @since 1.2.0
     */
    function errAdminNotices() {

        $adminNoticeMsg = '';
        $pluginKey 		= 'woocommerce';
        $pluginName  	= 'WooCommerce';
        $pluginFile     = 'woocommerce/woocommerce.php';
        $sptFile        = trailingslashit( WP_PLUGIN_DIR ) . plugin_basename( $pluginFile );

        $sptInstallText = '<a href="' . wp_nonce_url( 'update.php?action=install-plugin&plugin=' . $pluginKey, 'install-plugin_' . $pluginKey ) . '">' . __( 'Click here to install from WordPress.org repo &rarr;' , 'easy-review-reminders' ) . '</a>';
        if ( file_exists( $sptFile ) )
            $sptInstallText = '<a href="' . wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $pluginFile . '&amp;plugin_status=all&amp;s', 'activate-plugin_' . $pluginFile ) . '" title="' . __( 'Activate this plugin', 'easy-review-reminders' ) . '" class="edit">' . __( 'Click here to activate &rarr;', 'easy-review-reminders' ) . '</a>';

        $adminNoticeMsg .= sprintf( __( '<br/>Please ensure you have the <a href="%1$s" target="_blank">%2$s</a> plugin installed and activated.<br/>' , 'easy-review-reminders' ) , 'http://wordpress.org/plugins/' . $pluginKey . '/' , $pluginName );
        $adminNoticeMsg .= $sptInstallText . '<br/>'; ?>

        <div class="error">
            <p>
                <?php _e( '<b>Easy Review Reminders</b> plugin missing dependency.<br/>' , 'easy-review-reminders' ); ?>
                <?php echo $adminNoticeMsg; ?>
            </p>
        </div><?php

    }

    add_action( 'admin_notices' , 'errAdminNotices' );

}

/**
 * General code base to be always executed on plugin deactivation.
 *
 * @since 1.2.1
 *
 * @param boolean $network_wide Flag that determines if the plugin is activated network wide.
 */
function errGeneralDeactivationCode( $network_wide ) {

	global $wpdb;

    // check if it is a multisite network
    if ( is_multisite() ) {

        // check if the plugin has been activated on the network or on a single site
        if ( $network_wide ) {

            // get ids of all sites
            $blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );

            foreach ( $blog_ids as $blog_id ) {

                switch_to_blog( $blog_id );
                delete_option( 'err_activation_code_triggered' );

            }

            restore_current_blog();

        } else {

            // activated on a single site, in a multi-site
            delete_option( 'err_activation_code_triggered' );

        }

    } else {

        // activated on a single site
        delete_option( 'err_activation_code_triggered' );

    }
}

register_deactivation_hook( __FILE__ , 'errGeneralDeactivationCode' );
