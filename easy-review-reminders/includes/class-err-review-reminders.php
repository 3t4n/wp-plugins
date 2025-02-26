<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ERR_Review_Reminders {

    private static $_instance;
    private $endpoint;
    private $reminderManager;

    public function __construct(){

        $this->endpoint = ERR_Endpoint::getInstance();
        $this->reminderManager = ERR_Reminder_Manager::getInstance();

    }

    public static function getInstance(){
        if(!self::$_instance instanceof self)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * Used to register new Review Reminders CPT
     *
     * @since 1.0.0
     */
    public function errRegisterReviewRemindersCPT(){

        $labels = array(
            'name'                  => __( 'Review Reminders', 'easy-review-reminders' ),
            'singular_name'         => __( 'Review Reminder', 'easy-review-reminders' ),
            'menu_name'             => __( 'Review Reminders', 'easy-review-reminders' ),
            'name_admin_bar'        => __( 'Review Reminders', 'easy-review-reminders' ),
            'parent_item_colon'     => __( 'Parent:', 'easy-review-reminders' ),
            'all_items'             => __( 'Review Reminders', 'easy-review-reminders' ),
            'add_new_item'          => __( 'Add New Reminder', 'easy-review-reminders' ),
            'add_new'               => __( 'Add New', 'easy-review-reminders' ),
            'new_item'              => __( 'New Reminder', 'easy-review-reminders' ),
            'edit_item'             => __( 'Edit Reminder', 'easy-review-reminders' ),
            'update_item'           => __( 'Update Reminder', 'easy-review-reminders' ),
            'view_item'             => __( 'View Reminder', 'easy-review-reminders' ),
            'search_items'          => __( 'Search Reminder', 'easy-review-reminders' ),
            'not_found'             => __( 'Not found', 'easy-review-reminders' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'easy-review-reminders' ),
        );

        $labels = apply_filters( 'err_review_reminders_cpt_labels', $labels );

        $args = array(
            'label'                 => __( 'review-reminders', 'easy-review-reminders' ),
            'description'           => __( 'Review Reminders', 'easy-review-reminders' ),
            'labels'                => $labels,
            'supports'              => array( 'title' ),
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => 'woocommerce',
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capabilities'          => array(
                                        'create_posts' => 'do_not_allow', // Removes support for the "Add New" function
            ),
            'map_meta_cap'          => true,
            'rewrite'               => array('slug' => 'err-review-reminders'),
        );

        $args = apply_filters( 'err_review_reminders_cpt_args', $args );

        register_post_type( ERR_CPT_NAME, $args );

    }

    /**
     * Register custom post status for ERR post type
     *
     * @since 1.0.0
     */
    public function errCreateCustomPostStatus(){

        register_post_status( 'err-pending-review', array(
            'label'                     => _x( 'Pending Review', 'easy-review-reminders' ),
            'label_count'               => _n_noop( 'Pending Review <span class="count">(%s)</span>', 'Pending Review <span class="count">(%s)</span>', 'easy-review-reminders' ),
            'public'                    => true,
            'show_in_admin_all_list'    => true,
            'show_in_admin_status_list' => true,
        ));

        register_post_status( 'err-reviewed', array(
            'label'                     => _x( 'Reviewed', 'easy-review-reminders' ),
            'label_count'               => _n_noop( 'Reviewed <span class="count">(%s)</span>', 'Reviewed <span class="count">(%s)</span>', 'easy-review-reminders' ),
            'public'                    => true,
            'show_in_admin_all_list'    => true,
            'show_in_admin_status_list' => true,
        ));

        register_post_status( 'err-cancelled', array(
            'label'                     => _x( 'Cancelled', 'easy-review-reminders' ),
            'label_count'               => _n_noop( 'Cancelled <span class="count">(%s)</span>', 'Cancelled <span class="count">(%s)</span>', 'easy-review-reminders' ),
            'public'                    => true,
            'show_in_admin_all_list'    => true,
            'show_in_admin_status_list' => true,
        ));

        register_post_status( 'err-not-reviewed', array(
            'label'                     => _x( 'Not Reviewed', 'easy-review-reminders' ),
            'label_count'               => _n_noop( 'Not Reviewed <span class="count">(%s)</span>', 'Not Reviewed <span class="count">(%s)</span>', 'easy-review-reminders' ),
            'public'                    => true,
            'show_in_admin_all_list'    => true,
            'show_in_admin_status_list' => true,
        ));

        do_action( 'err_custom_post_status' );

    }

    /**
     * Create new column on the Review Reminders CPT
     *
     * @return mixed
     * @since 1.0.0
     */
    public function errSetNewReviewRemindersColumn( $columns ){

        $columns = array(
                            'cb'                        => '<input type="checkbox" />',
                            'title'                     => __( 'Reminder ID', 'easy-review-reminders' ),
                            'err-reminder-date'         => __( 'Date Created', 'easy-review-reminders' ),
                            'err-reminder-customer'     => __( 'Customer', 'easy-review-reminders' ),
                            'err-reminder-quantity'     => __( 'Quantity', 'easy-review-reminders' ),
                            'err-reminder-coupons'      => __( 'Coupons', 'easy-review-reminders' ),
                            'err-reminder-order-total'  => __( 'Order Total', 'easy-review-reminders' ),
                            'err-cart-order-number'     => __( 'Order #', 'easy-review-reminders' ),
                            'err-reminder-status'       => __( 'Status', 'easy-review-reminders' ),
                    );

        return apply_filters( 'err_new_review_reminder_columns', $columns );

    }

    /**
     * Sets the row value of the new column
     *
     * @since 1.0.0
     */
    public function errReviewRemindersNewColumns( $columns, $postID ){

        $orderID    = get_post_meta( $postID, '_err_order_id', true );
        $userID     = (int) get_post_meta( $postID, '_err_reminder_customer_id', true );
        $order      = new WC_Order( $orderID );
        $orderItems = $order->get_items();

        switch ( $columns ) {

            case 'err-reminder-date':

                $date = get_the_date( 'F j, Y g:i A', $postID );
                echo apply_filters( 'err_reminder_date_column', $date );

                break;

            case 'err-reminder-customer':

                // Registered users.
                if( $userID ){

                    $user       = get_userdata( $userID );
                    $userMeta   = array_filter( get_user_meta( $userID ) );

                // Non-registered users.
                }else{

                    $user       = get_post_meta( $orderID );
                    $userMeta   = array();

                    foreach ( $user as $key => $value ) {
                        $userMeta[ ltrim( $key, '_' ) ] = $value;
                    }
                }

                if( ! empty( $user->data->user_login ) ): ?>

                    <label><?php _e( 'Customer: ', 'easy-review-reminders' ); ?></label>

                    <a href="<?php echo get_edit_user_link($userID); ?>">
                        <?php echo $user->data->user_login; ?>
                    </a><br/> <?php

                elseif( isset( $userMeta[ 'billing_first_name' ][ 0 ] ) &&
                    isset( $userMeta[ 'billing_last_name' ][ 0 ] ) ): ?>

                    <label><?php _e( 'Customer: ', 'easy-review-reminders' ); ?></label> <?php
                    echo trim( $userMeta[ 'billing_first_name' ][ 0 ] . ' ' . $userMeta[ 'billing_last_name' ][ 0 ] ) . '<br/>';

                endif;

                if( ! empty( $user->data->user_email ) ): ?>

                    <label><?php _e( 'Email: ', 'easy-review-reminders' ); ?></label>

                    <a href="mailto:<?php echo $user->data->user_email; ?>">
                        <?php echo $user->data->user_email; ?>
                    </a><br/> <?php

                elseif( isset( $userMeta[ 'billing_email' ][ 0 ] ) ): ?>

                    <label><?php _e( 'Email: ', 'easy-review-reminders' ); ?></label>

                    <a href="mailto:<?php echo $userMeta[ 'billing_email' ][ 0 ]; ?>">
                        <?php echo $userMeta[ 'billing_email' ][ 0 ]; ?>
                    </a><br/> <?php

                endif;

                if( $userID ): ?>
                    <label><?php _e( 'Role: ', 'easy-review-reminders' ); ?></label><?php
                        foreach ( $user->roles as $key => $value ) {
                            echo ucwords( str_replace( '_', ' ', $value ) ) . '<br>';
                        }
                else: ?>
                        <label><?php _e( 'Role: ', 'easy-review-reminders' ); ?></label>Guest <?php
                endif;

                do_action( 'err_reminder_customer', $columns, $postID );

                break;

            case 'err-reminder-quantity':

                $quantity = 0;

                if( !empty( $orderItems ) ):
                    foreach ( $orderItems as $key => $item ):
                        $quantity += $item[ 'qty' ];
                    endforeach;
                endif;

                echo apply_filters( 'err_reminder_quantity_column', $quantity, $postID );

                break;

            case 'err-reminder-coupons':

                $orderCoupons = $order->get_used_coupons();
                $coupons = '';

                if( !empty( $orderCoupons ) ):
                    foreach ( $orderCoupons as $key => $coupon ) :
                        $coupons .= $coupon . ', ';
                    endforeach;
                endif;

                echo apply_filters( 'err_reminder_coupons_column', rtrim( trim( $coupons ), ',' ), $postID );

                break;

            case 'err-reminder-order-total':

                $reminderTotal = $order->get_formatted_order_total();
                echo apply_filters( 'err_reminder_order_total_column', $reminderTotal, $postID );

                break;

            case 'err-cart-order-number':

                $orderID = get_post_meta( $postID, '_err_order_id', true );
                $orderLink = get_admin_url() . 'post.php?post=' . $orderID . '&action=edit';

                if( isset( $orderID ) )
                    echo sprintf( __( '<a href="%1$s">%2$s</a>', 'easy-review-reminders' ), $orderLink, $orderID );

                do_action( 'err_cart_order_number', $columns, $postID );

                break;

            case 'err-reminder-status':

                $status = get_post_status( $postID );
                $class = 'status cancelled';

                if( $status == 'err-pending-review' )
                    $class = 'status pending';
                elseif( $status == 'err-reviewed' )
                    $class = 'status reviewed';
                elseif( $status == 'err-not-reviewed' )
                    $class = 'status not-reviewed';
                elseif( $status == 'err-cancelled' )
                    $class = 'status cancelled';

                $status = str_replace( 'err-', '', $status );
                $status = str_replace( '-', ' ', $status );
                $status = ucwords( $status );
                $status = apply_filters( 'err_reminder_status_column', $status );
                echo '<span class="' . $class . '">' . $status . '</span>';

                break;
        }
    }

    /**
     * Used for tracking completed orders
     *
     * @param int $postID
     *
     * @since 1.0.0
     */
    public function errOrderStatusCompleted( $orderID ){

        $proceed    = apply_filters( 'err_proceed_create_entry', true, $orderID );
        $orderEmail = get_post_meta( $orderID, '_billing_email', true );

        if( $proceed === false )
            return;

        if( ERR_Functions::errEmailAddressIsBlacklisted( $orderEmail ) )
            return;

        $reminderID = $this->reminderManager->errCreateNewEntry( $orderID );

        if( $reminderID )
            update_post_meta( $orderID, '_reminder_id', $reminderID );

        do_action( 'err_order_completed', $reminderID, $orderID );

    }

    /**
     * Set session flag if the customer clicks on the review link that was sent to them through email
     *
     * @since 1.0.0
     */
    public function errSetSessionFlagIfCustomerClicksTheReviewLink(){

        global $wpdb, $post;

        if( ! is_admin() && is_product() && get_query_var( 'errid' ) ){

            $errid = sanitize_text_field( get_query_var( 'errid' ) );
            $ref = isset( $_GET[ 'ref' ] ) ? sanitize_text_field( $_GET[ 'ref' ] ) : 'no-email-ref';

            $errReminderExist = $wpdb->get_results(
                    $wpdb->prepare(
                            apply_filters( "err_reminder_exist_query",
                                "SELECT post_id FROM $wpdb->postmeta
                                 WHERE meta_key = '_err_reminder_hashed_id'
                                 AND meta_value = %s
                                 LIMIT 1
                                " ),
                            $errid
                        )
                    );

            if( ! empty( $errReminderExist ) ){

                do_action( 'err_before_set_flag_if_customer_clicks_review_link', $errid, $errReminderExist, $post, $ref );

                $reminderID = $errReminderExist[ 0 ]->post_id;
                WC()->session->set_customer_session_cookie( true );
                WC()->session->set( 'err_for_review', array( 'reminder_id' => $reminderID, 'product_id' => $post->ID, 'ref' => $ref ) );

                $link = trailingslashit( get_permalink( $post->ID ) ) . '#reviews';
                wp_safe_redirect( apply_filters( 'err_redirect_product_review_url', $link ) ); exit;

            }
        }
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

        // This only works on front end, also to avoid any error when getting the session at the back end
        if( ! is_admin() ){

            $postForReview = WC()->session->get( 'err_for_review' );

            if( isset( $postForReview ) && (int) $postForReview[ 'product_id' ] == (int) $comment->comment_post_ID ){

                $reminderStatus = get_post_status( (int) $postForReview[ 'reminder_id' ] );

                if( $reminderStatus == 'err-pending-review' ){

                    // Update status to reviewed
                    $reminder = array(
                        'ID'            => (int) $postForReview[ 'reminder_id' ],
                        'post_status'   => 'err-reviewed'
                    );

                    update_post_meta( $postForReview[ 'reminder_id' ], '_err_reminder_date_reviewed', current_time( 'Y-m-d H:i:s' ) );

                    wp_update_post( $reminder );

                    $cron = ERR_Cron::getInstance();
                    $cron->errUnscheduleCronEventsByreminderID( (int) $postForReview[ 'reminder_id' ] );

                    do_action( 'err_change_status_to_reviewed', $location, $comment, $postForReview );

                }

            }
        }

        return apply_filters( 'err_redirect_link_after_review', $location, $comment );

    }

    /**
     * Run Time Considered Not Reviewed Cron
     *
     * @param int $reminderID
     *
     * @since 1.0.0
     */
    public function errChangeStatusToNotReviewed( $reminderID ){

        if( get_post_status( $reminderID ) !== false && get_post_type( $reminderID ) == ERR_CPT_NAME ){

            $reminder = array(
                'ID'            => $reminderID,
                'post_status'   => 'err-not-reviewed'
            );

            wp_update_post( $reminder );

            // Set date when it was turned into err-not-reviewed status
            update_post_meta( $reminderID, '_err_not_reviewed_date', current_time( 'Y-m-d H:i:s' ) );

            $cron = ERR_Cron::getInstance();
            $cron->errUnscheduleCronEventsByreminderID( $reminderID );

        }

        do_action( 'err_change_status_to_not_reviewed', $reminderID );

    }

    /**
     * Catch endpoint query vars.
     *
     * @param array $vars
     *
     * @since 1.0.0
     */
    public function errAddQueryVars( $vars ){

        $vars[] = $this->endpoint->unsubscribeEndpoint;
        $vars[] = 'errid';

        return $vars;

    }

    /**
     * Display notice message after review is added. This only works on the front end.
     *
     * @param int $commentID
     * @param object $comment
     *
     * @since 1.0.0
     */
    public function errDisplayMessageAfterReviewIsAdded( $commentID, $comment ){

        // This only works on front end, also to avoid any error when getting the session at the back end
        if( ! is_admin() ){

            $postForReview = WC()->session->get( 'err_for_review' );

            if( isset( $postForReview ) && (int) $postForReview[ 'product_id' ] == (int) $comment->comment_post_ID ){

                $thankyouMessage    = apply_filters( 'err_product_review_msg', sprintf( __( 'Thank you for your review %1$s!', 'easy-review-reminders' ), $comment->comment_author ), $commentID, $comment );
                $noticeType         = apply_filters( 'err_product_review_notice_type', 'success' );

                wc_add_notice( $thankyouMessage, $noticeType );

                do_action( 'err_notice_message_after_review', $comment, $postForReview );

            }
        }
    }

    /**
     * If a user is deleted, remove any entries associated with it
     *
     * @since 1.1.0
     */
    public function errDeleteUser( $userID ){

        global $wpdb;

        $errEntries = $wpdb->get_results(
            $wpdb->prepare(
                    apply_filters( 'err_get_cart_entries_to_delete_query',
                        "SELECT post_id FROM $wpdb->postmeta
                         WHERE meta_key = '_err_reminder_customer_id'
                         AND meta_value = %s
                        " ),
                    $userID
                )
        );

        $errEntriesArr = array();
        $errCron = ERR_Cron::getInstance();

        foreach ( $errEntries as $entry ) {
            // Remove attached cron to the entry
            $errCron->errUnscheduleCronEventsByreminderID( $entry->post_id );
            $errEntriesArr[] = $entry->post_id;
        }

        // Delete entries
        if( ! empty( $errEntriesArr ) ){

            $errEntriesArr = implode( ', ', $errEntriesArr );
            $wpdb->query( "DELETE FROM $wpdb->postmeta WHERE $wpdb->postmeta.post_id IN (" . $errEntriesArr . ")" );
            $wpdb->query( "DELETE FROM $wpdb->posts WHERE ID IN (" . $errEntriesArr . ")" );

        }
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

        $productID      = $comment->comment_post_ID;
        $userReviews    = get_post_meta( $productID, '_err_user_reviews', true );

        if( empty( $userReviews ) )
            $userReviews = array();

        if( ! empty( $postForReview ) ){

            $review = array(
                                'reminderID'    => $postForReview[ 'reminder_id' ],
                                'ref'           => $postForReview[ 'ref' ],
                                'productID'     => $productID,
                                'commentID'     => $comment->comment_ID,
                                'user'          => $comment->user_id,
                                'comment_date'  => $comment->comment_date,
                                'comment'       => $comment->comment_content
                            );

            array_push( $userReviews, $review );

            // Store review info into product's postmeta
            update_post_meta( $productID, '_err_user_reviews', $userReviews );

        }
    }
}
