<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ERR_Reminder_Manager {

    private static $_instance;
    private $errCron;

    public function __construct(){

        $this->errCron = ERR_Cron::getInstance();

    }

    public static function getInstance(){
        if(!self::$_instance instanceof self)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * Unset all cron events when ERR CPT entry is trashed.
     *
     * @param int $orderID
     *
     * @return bool
     * @since 1.0.0
     */
    public function errCreateNewEntry( $orderID ){

        $userID = get_post_meta( $orderID, '_customer_user', true );
        $orderEmail = get_post_meta( $orderID, '_billing_email', true );
        
        // insert new post
        $insertPost = array(
                    'post_type'         => ERR_CPT_NAME,
                    'comment_status'    => 'closed',
                    'ping_status'       => 'closed',
                    'post_status'       => 'err-pending-review',
                    'post_author'       => 0
                );

        // Insert the post into the database
        $reminderID = wp_insert_post( $insertPost );

        $title = apply_filters( 'err_cpt_entry_title', 'Reminder #' . $reminderID, $reminderID );

        $updatePost = array(
            'ID'            => $reminderID,
            'post_title'    => $title,
            'post_name'     => $title,
        );

        // Update post title and post name
        wp_update_post( $updatePost );

        // Update the post meta of the post
        update_post_meta( $reminderID, '_err_order_id', $orderID );
        update_post_meta( $reminderID, '_err_reminder_hashed_id', md5( $reminderID ) );
        update_post_meta( $reminderID, '_err_reminder_customer_id', $userID );
        update_post_meta( $reminderID, '_err_reminder_date_pending', current_time( 'Y-m-d H:i:s' ) );
        update_post_meta( $reminderID, '_err_email_address', $orderEmail );

        // Schedule a unique cron single event to run the errEmailSender function
        $this->errCron->errScheduleEmailEvent( $reminderID );

        do_action( 'err_order_completed', $reminderID, $orderID );

        return $reminderID;

    }

    /**
     * Unset all cron events when ERR CPT or Order entry are trashed.
     *
     * @param int $postID
     *
     * @since 1.0.0
     * @since 1.1.0 If the order is trashed we completely removed the associated ERR entry from the ERR listings only if the ERR status is in 'err-pending-review', 'err-reviewed', 'err-cancelled', 'err-not-reviewed' or 'trash'
     */
    public function errTrashERRCPTEntry( $postID ){

        switch ( get_post_type( $postID ) ) {

            case ERR_CPT_NAME:

                $this->errCron->errUnscheduleCronEventsByreminderID( $postID );

                do_action( 'err_trash_err_cpt_entry', $postID );

                break;
            
            case 'shop_order':

                $reminderID = get_post_meta( $postID, '_reminder_id', true );

                if( $reminderID && in_array( get_post_status( $reminderID ), array( 'err-pending-review', 'err-reviewed', 'err-cancelled', 'err-not-reviewed', 'trash' ) ) ){

                    wp_delete_post( $reminderID, true );
                    $this->errCron->errUnscheduleCronEventsByreminderID( $reminderID );

                }

                break;

            default:
                return;

        }
    }

    /**
     * Set cron events when ERR CPT and Order entry are restored from trash.
     *
     * @param int $postID
     *
     * @since 1.0.0
     * @since 1.1.0 If an order is restored and the status is completed then we re-create a review reminder entry
     */
    public function errRestoreERRCPTEntry( $postID ){

        switch ( get_post_type( $postID ) ) {

            case ERR_CPT_NAME:

                $errStatus      = get_post_meta( $postID, '_err_email_status', true );
                $dateCreated    = get_the_date( 'Y-m-d H:i:s', $postID );
                $dateCreated    = get_gmt_from_date( $dateCreated );
                $today          = current_time( 'Y-m-d H:i:s', true );
                $emailKeys      = array();

                // Set email args for those pending emails
                if( ! empty( $errStatus ) ){
                    foreach ( $errStatus as $emailKey => $email ) {
                        if( $email[ 'status' ] === 'pending' ){

                            $timeUnit                   = 'Days';
                            $daysAfterSuccessfulOrder   = $email[ 'days_after_successful_order' ];
                            $daysAfterSuccessfulOrder   = '+ ' . $daysAfterSuccessfulOrder . ' ' . $timeUnit;
                            $daysAfterSuccessfulOrder   = apply_filters( 'err_days_after_successful_order', $daysAfterSuccessfulOrder );
                            $execTime                   = strtotime( $daysAfterSuccessfulOrder, strtotime( $dateCreated ) );
                            
                            // If the time still in the future we use the reminder creation date
                            if( $execTime > strtotime( $today ) ){

                                $emailKeys[ $emailKey ][ 'execTime' ] = $execTime;

                            }else{

                                // If time already past we use date today
                                $emailKeys[ $emailKey ][ 'execTime' ] = strtotime( $daysAfterSuccessfulOrder, strtotime( $today ) );

                            }
                        }
                    }
                }

                // If there are pending emails to set then schedule again
                if( ! empty( $emailKeys ) ){
                    $this->errCron->errScheduleEmailEvent( $postID, $emailKeys, true );
                }

                break;

            case 'shop_order':

                $reminderID     = get_post_meta( $postID, '_reminder_id', true );
                $orderStatus    = get_post_status( $postID );

                if( $reminderID && get_post_status( $reminderID ) !== false )
                    wp_untrash_post( $reminderID );

                // If order is in complete status then re-create
                if( $orderStatus == 'wc-completed' )
                    $this->errCreateNewEntry( $postID );

                break;

            default:
                return;

        }

        do_action( 'err_restore_err_cpt_entry', $postID );

    }

    /**
     * Before the entry is deleted, we must remove any cron events attached.
     *
     * @param int $reminderID
     *
     * @since 1.0.0
     */
    public function errBeforeDeleteERRCPTEntry( $reminderID ){

        if( get_post_type( $reminderID ) !== ERR_CPT_NAME ) return;
        
        $this->errCron->errUnscheduleCronEventsByreminderID( $reminderID );

        do_action( 'err_delete_err_cpt_entry', $reminderID );

    }

    /**
     * Delete entry when toggling order status aside from completed.
     *
     * @param int $orderID
     *
     * @since 1.0.0
     */
    public function errRemoveEntry( $orderID ){

        global $wpdb;

        $reminderID = get_post_meta( $orderID, '_reminder_id', true );

        if( get_post_status( $reminderID ) !== false ){

            // Remove attached cron
            $this->errCron->errUnscheduleCronEventsByreminderID( $reminderID );

            wp_delete_post( $reminderID, true );

        }
    }
}