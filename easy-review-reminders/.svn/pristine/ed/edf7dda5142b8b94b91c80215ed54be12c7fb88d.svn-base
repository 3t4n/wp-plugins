<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ERR_AJAX {

    private static $_instance;

    public static function getInstance(){
        if(!self::$_instance instanceof self)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * Blacklist email address.
     *
     * @param string $email
     * @param string $reason
     *
     * @return mixed
     * @since 1.0.0
     */
    public function errAddEmailToBlacklist( $email = null, $reason = null ){

    	$email      = defined( 'DOING_AJAX' ) && DOING_AJAX ? esc_sql( $_POST[ 'email' ] ) : esc_sql( $email );
        $reason     = defined( 'DOING_AJAX' ) && DOING_AJAX ? esc_sql( $_POST[ 'reason' ] ) : esc_sql( $reason );

        $errBlacklistedEmails = get_option( ERR_BLACKLIST_EMAILS_OPTION );

        do_action( 'err_before_add_email_to_blacklist', $email, $reason, $errBlacklistedEmails );

        if ( ! is_array( $errBlacklistedEmails ) )
            $errBlacklistedEmails = array();

        if ( ! array_key_exists( $email, $errBlacklistedEmails ) ){

            $today = current_time( 'timestamp' );
            $errBlacklistedEmails[ $email ][ 'reason' ] = $reason;
            $errBlacklistedEmails[ $email ][ 'date' ] = $today;
            update_option( ERR_BLACKLIST_EMAILS_OPTION, $errBlacklistedEmails );

            $response = array(
                            'status'    => 'success',
                            'email'     => $email,
                            'date'      => date( 'Y-m-d h:i:s A', $today ),
                            'reason'    => ucfirst( $reason ),
                            'msg'       => __( 'Email added successfully', 'easy-review-reminders' )
                        );

            do_action( 'err_add_email_to_blacklist_success', $email, $reason, $errBlacklistedEmails );

        } else {

            $response = array(
                            'status'    =>  'error',
                            'msg'       =>  sprintf( __( 'The email %1$s has already been blacklisted.', 'easy-review-reminders' ) , $email )
                        );

            do_action( 'err_add_email_to_blacklist_error', $email, $reason, $errBlacklistedEmails );

        }

        do_action( 'err_after_add_email_to_blacklist', $email, $reason, $errBlacklistedEmails );

        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ){

            header( 'Content-Type: application/json' );
            echo json_encode( $response );
            die();

        }else return $response;
    }

    /**
     * Remove email address from blacklist.
     *
     * @param string $email
     *
     * @return mixed
     * @since 1.0.0
     */
    public function errDeleteEmailFromBlacklist( $email = null ){

        $email = defined( 'DOING_AJAX' ) && DOING_AJAX ? esc_sql( $_POST[ 'email' ] ) : esc_sql( $email );

        $errBlacklistedEmails = get_option( ERR_BLACKLIST_EMAILS_OPTION );

        do_action( 'err_before_delete_email_from_blacklist', $email, $errBlacklistedEmails );

        if ( ! is_array( $errBlacklistedEmails ) )
            $errBlacklistedEmails = array();

        if( array_key_exists( $email, $errBlacklistedEmails ) ){

            unset( $errBlacklistedEmails[ $email ] );
            update_option( ERR_BLACKLIST_EMAILS_OPTION, $errBlacklistedEmails );

            $response = array(
                            'status'    => 'success',
                            'email'     => $email,
                            'msg'       => __( 'Successfully Deleted', 'easy-review-reminders' )
                        );

            do_action( 'err_delete_email_from_blacklist_success', $email, $errBlacklistedEmails );

        }else{

            $response = array(
                            'status'    => 'error',
                            'email'     => $email,
                            'msg'       => __( 'Email not found.', 'easy-review-reminders' )
                        );

            do_action( 'err_delete_email_from_blacklist_error', $email, $errBlacklistedEmails );

        }

        do_action( 'err_after_delete_email_from_blacklist', $email, $errBlacklistedEmails );

        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ){

            header( 'Content-Type: application/json' );
            echo json_encode( $response );
            die();

        }else return $response;
    }

    /**
     * Option to view the email schedule details
     *
     * @param string $key
     *
     * @since 1.0.0
     */
    public function errViewEmailSchedule( $key = null ){

        $key = defined( 'DOING_AJAX' ) && DOING_AJAX ? esc_sql( $_POST[ 'key' ] ) : esc_sql( $key );
        $scheduledData = '';

        $errEmailSchedules = get_option( ERR_EMAIL_SCHEDULES_OPTION );

        if ( ! is_array( $errEmailSchedules ) )
            $errEmailSchedules = array();

        do_action( 'err_before_view_email_schedule', $key, $errEmailSchedules );

        if ( array_key_exists( $key, $errEmailSchedules ) ){
            $scheduledData = $errEmailSchedules[ $key ];

            $scheduledData[ 'content' ] = html_entity_decode( $scheduledData[ 'content' ], ENT_QUOTES, 'UTF-8' );
            $scheduledData[ 'wrap' ]    = ucfirst( $scheduledData[ 'wrap' ] );

            $response = array(
                                'status'            => 'success',
                                'scheduled_data'    => $scheduledData,
                                'key'               => $key,
                                'msg'               => __( 'Success!', 'easy-review-reminders' )
                            );

            do_action( 'err_view_email_schedule_success', $key, $errEmailSchedules );

        }else{
            $response = array(
                                'status'    => 'error',
                                'msg'       => __( 'Error viewing schedule. Schedule not found!', 'easy-review-reminders' )
                            );

            do_action( 'err_view_email_schedule_error', $key, $errEmailSchedules );

        }

        do_action( 'err_after_view_email_schedule', $key, $errEmailSchedules );

        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ){

            header( 'Content-Type: application/json' );
            echo json_encode( $response );
            die();

        }else return $response;
    }

    /**
     * Update the email schedule
     *
     * @param string $key
     * @param array $email_fields
     *
     * @since 1.0.0
     */
    public function errUpdateEmailSchedule( $key = null, $emailFields = null ){

        $key            = defined( 'DOING_AJAX' ) && DOING_AJAX ? esc_sql( $_POST[ 'key' ] ) : esc_sql( $key );
        $emailFields    = defined( 'DOING_AJAX' ) && DOING_AJAX ? $_POST[ 'email_fields' ] : $emailFields;

        $errEmailSchedules = get_option( ERR_EMAIL_SCHEDULES_OPTION );

        if ( ! is_array( $errEmailSchedules ) )
            $errEmailSchedules = array();

        do_action( 'err_before_update_email_schedule', $key, $emailFields, $errEmailSchedules );

        if ( array_key_exists( $key, $errEmailSchedules) ){

            $errEmailSchedules[ $key ][ 'subject' ] = stripslashes( $emailFields[ 'subject' ] );
            $errEmailSchedules[ $key ][ 'wrap' ] = $emailFields[ 'wrap' ];
            $errEmailSchedules[ $key ][ 'heading_text' ] = ( $emailFields[ 'wrap' ] == 'yes' ) ? stripslashes( $emailFields[ 'heading_text' ] ) : '';
            $errEmailSchedules[ $key ][ 'days_after_successful_order' ] = $emailFields[ 'days_after_successful_order' ];
            $errEmailSchedules[ $key ][ 'content' ] = stripslashes( $emailFields[ 'content' ] );

            // Sort email schedules
            uasort( $errEmailSchedules, array( new ERR_Functions, 'errSortByArrayKey' ) );

            // Update schedules
            update_option( ERR_EMAIL_SCHEDULES_OPTION, $errEmailSchedules );

            // Strip tags and limit characters for js to display excerpt
            $emailFields[ 'subject' ] = ERR_Functions::errContentExcerpt( wc_clean( $errEmailSchedules[ $key ][ 'subject' ] ), 10 );
            $emailFields[ 'content' ] = ERR_Functions::errContentExcerpt( wc_clean( $errEmailSchedules[ $key ][ 'content' ] ), 10 );
            $emailFields[ 'wrap' ] = ucfirst( $emailFields[ 'wrap' ] );

            $response = array(
                                'status'        => 'success',
                                'email_fields'  => $emailFields,
                                'key'           => $key,
                                'msg'           => __( 'Successfully Updated!', 'easy-review-reminders' )
                            );

            do_action( 'err_update_email_schedule_success', $key, $emailFields, $errEmailSchedules );

        }else{

            $response = array(
                                'status'    => 'error',
                                'msg'       => __( 'Error updating schedule. Schedule not found!', 'easy-review-reminders' )
                            );

            do_action( 'err_update_email_schedule_error', $key, $emailFields, $errEmailSchedules );

        }


        do_action( 'err_after_update_email_schedule', $key, $emailFields, $errEmailSchedules );

        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ){

            header( 'Content-Type: application/json' );
            echo json_encode( $response );
            die();

        }else return $response;
    }

    /**
     * This is the function that will actually send the email.
     * Code Update: On v1.1.0 send email can now be used using AJAX request.
     *
     * @param int $reminderID
     * @param int|string $scheduleID
     * @param array $errStatus
     * @param string $email
     *
     * @return mixed
     * @since 1.0.0
     */
    public static function errSendEmail( $reminderID = null, $scheduleID = null, $errStatus = null, $email = null ){

        $reminderID = defined( 'DOING_AJAX' ) && DOING_AJAX ? sanitize_text_field( $_POST[ 'reminderID' ] ) : sanitize_text_field( $reminderID );
        $scheduleID = defined( 'DOING_AJAX' ) && DOING_AJAX ? sanitize_text_field( $_POST[ 'scheduleID' ] ) : sanitize_text_field( $scheduleID );
        $errStatus  = defined( 'DOING_AJAX' ) && DOING_AJAX ? $_POST[ 'errStatus' ] : $errStatus;
        $email      = defined( 'DOING_AJAX' ) && DOING_AJAX ? sanitize_text_field( $_POST[ 'email' ] ) : sanitize_text_field( $email );

        $wcEmails           = WC_Emails::instance();
        $errEmails          = ERR_Emails::getInstance();
        $errEmailSchedules  = get_option( ERR_EMAIL_SCHEDULES_OPTION );

        // Set Request flag
        $_REQUEST[ 'err_email_schedule_id' ] = $scheduleID;

        // Template Tags
        $tags[ 'product_list' ]         = apply_filters( 'err_email_product_list', $errEmails->errGetReminderInfo( $reminderID, 'product_list' ) );
        $tags[ 'days_ago' ]             = apply_filters( 'err_email_days_ago', $errEmails->errGetReminderInfo( $reminderID, 'days_ago' ) );
        $tags[ 'order_date' ]           = apply_filters( 'err_email_order_date', $errEmails->errGetReminderInfo( $reminderID, 'order_date' ) );
        $tags[ 'order_date_completed' ] = apply_filters( 'err_email_order_date_completed', $errEmails->errGetReminderInfo( $reminderID, 'order_date_completed' ) );
        $tags[ 'order_id' ]             = apply_filters( 'err_email_order_id', $errEmails->errGetReminderInfo( $reminderID, 'order_id' ) );
        $tags[ 'full_name' ]            = apply_filters( 'err_email_full_name', $errEmails->errGetReminderInfo( $reminderID, 'full_name' ) );
        $tags[ 'first_name' ]           = apply_filters( 'err_email_first_name', $errEmails->errGetReminderInfo( $reminderID, 'first_name' ) );
        $tags[ 'last_name' ]            = apply_filters( 'err_email_last_name', $errEmails->errGetReminderInfo( $reminderID, 'last_name' ) );
        $tags[ 'user_email' ]           = apply_filters( 'err_email_customer_email', $email );
        $tags[ 'site_url' ]             = apply_filters( 'err_email_site_url', $errEmails->errGetReminderInfo( $reminderID, 'site_url') );
        $tags[ 'site_name' ]            = apply_filters( 'err_email_site_name', $errEmails->errGetReminderInfo( $reminderID, 'site_name') );
        $tags[ 'unsubscribe' ]          = apply_filters( 'err_email_unsubscribe', $errEmails->errGetReminderInfo( $reminderID, 'unsubscribe') );
        $tags                           = apply_filters( 'err_email_template_tags', $tags, $reminderID, $scheduleID, $errStatus, $email );

        // Subject
        $excludeFromTitle = apply_filters( 'err_tags_to_exclude_from_title', array( 'product_list', 'unsubscribe' ) );
        $subject = ! empty( $errEmailSchedules[ $scheduleID ][ 'subject' ] ) ? $errEmailSchedules[ $scheduleID ][ 'subject' ] : $errEmails->errDefaultTemplate[ 'subject' ];
        $subject = $errEmails->errParseEmailContent( $subject, $tags, $excludeFromTitle );
        $subject = apply_filters( 'err_email_subject', $subject, $tags, $excludeFromTitle );

        // Body
        $template = $errEmailSchedules[ $scheduleID ][ 'content' ];
        $body = ! empty( $template ) ? $template : $errEmails->errDefaultTemplate[ 'body' ];

        // Parse email content
        if( ! empty( $body ) )
            $body = $errEmails->errParseEmailContent( $body, $tags );

        // Option to wrap the email using the default WC email header and footer
        $wcHeaderFooter = $errEmailSchedules[ $scheduleID ][ 'wrap' ];
        $headingText    = $errEmailSchedules[ $scheduleID ][ 'heading_text' ];
        $headingText    = ! empty( $headingText ) ? $headingText : $subject;

        if( $wcHeaderFooter == 'yes' )
            $body = $wcEmails->wrap_message( $headingText, $body );

        // Add "powered by" text when premium plugin is not active
        if ( ! is_plugin_active( 'easy-review-reminders-premium/easy-review-reminders-premium.bootstrap.php' ) ) {

            $poweredByLink = __( '<em>Powered By <a href="https://marketingsuiteplugin.com/product/easy-review-reminders/?utm_source=ERR&utm_medium=Powered%20By&utm_campaign=ERR">Easy Review Reminders - Marketing Suite</a></em>', 'easy-review-reminders' );
            $wcEmailFooter = wp_kses_post( wptexturize( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) ) );

            if ( $wcHeaderFooter == 'yes' )
                $body = str_replace( $wcEmailFooter, $poweredByLink, $body );
            else
                $body .= '<br><br><br><br>' . wpautop( $poweredByLink );
        }

        // Headers
        $fromName   = $errEmails->errWPMailFromName();
        $fromEmail  = $errEmails->errWPMailFrom();
        $headers    = $errEmails->errConstructEmailHeader( $fromName, $fromEmail );
        $headers    = apply_filters( 'err_email_headers', $headers, $reminderID, $scheduleID, $errStatus, $email );
        $to         = $email;

        // Body Content
        $body = html_entity_decode( $body );
        $body = apply_filters( 'err_email_body', $body, $tags );

        // Sending Emails
        $isSent = $wcEmails->send( $to, $subject, $body, $headers );

        if( $isSent ){

            if( ! empty( $errStatus ) ){

                $errStatus = get_post_meta( $reminderID, '_err_email_status', true );
                $errStatus[ $scheduleID ][ 'status' ] = 'sent';
                $errStatus[ $scheduleID ][ 'time_sent' ] = current_time( 'Y-m-d H:i:s', true );

                update_post_meta( $reminderID, '_err_email_status', $errStatus );

            }

            $response = array(
                                'status'        => 'success',
                                'msg'           => __( 'Email Sent!', 'easy-review-reminders' ),
                                'reminderID'    => $reminderID,
                                'scheduleID'    => $scheduleID,
                                'errStatus'     => $errStatus,
                                'email'         => $email,
                                'tags'          => $tags,
                                'timeSent'      => get_date_from_gmt( current_time( 'Y-m-d H:i:s', true ), 'F j, Y @ g:i A' )
                            );

        }else{

            if( ! empty( $errStatus ) ){

                $errStatus = get_post_meta( $reminderID, '_err_email_status', true );
                $errStatus[ $scheduleID ][ 'status' ] = 'failed';
                $errStatus[ $scheduleID ][ 'time_failed' ] = current_time( 'Y-m-d H:i:s', true );

                update_post_meta( $reminderID, '_err_email_status', $errStatus );

            }

            $response = array(
                                'status'        => 'error',
                                'timeFailed'    => get_date_from_gmt( current_time( 'Y-m-d H:i:s', true ), 'F j, Y @ g:i A' ),
                                'msg'           => __( 'Email Failed!', 'easy-review-reminders' )
                            );

        }

        do_action( 'err_send_email', $reminderID, $scheduleID, $errStatus, $email, $isSent, $response );

        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ){

            header( 'Content-Type: application/json' );
            echo json_encode( $response );
            die();

        }else return $response;
    }
}
