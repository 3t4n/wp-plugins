<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ERR_Cron {

    private static $_instance;
    private $errEmails;

    public function __construct(){

        $this->errEmails = ERR_Emails::getInstance();

    }
    
    public static function getInstance(){
        if(!self::$_instance instanceof self)
            self::$_instance = new self;
        return self::$_instance;
    }


    /**
    * Run cron manually
    *
    * @since 1.0.0
    */
    public function errRunCronManually(){

        // Return directly if url parameter has no debug=true
        if( isset( $_GET[ 'debug'] ) && $_GET[ 'debug'] != true ) return;

        if( isset( $_GET[ 'action' ] ) && isset( $_GET[ 'hook-name' ] ) && $_GET[ 'action' ] == 'err-manual-cron' ) {
            
            if( !current_user_can( 'manage_options' ) ) die( __( 'You are not allowed to run cron events.', 'easy-review-reminders' ) );
           
            $hookName = $_GET[ 'hook-name' ];
            check_admin_referer( 'err-manual_' . $hookName );
            
            if( $hookName == ERR_EMAIL_SENDER_CRON )
                $msgID = 1;
            elseif( $hookName == ERR_TIME_CONSIDERED_NOT_REVIEWED_CRON )
                $msgID = 2;

            if( $this->errExecuteCron( $hookName, 'manual-run' ) ) {
                wp_redirect( 'admin.php?page=wc-settings&tab=err_settings&section=err_settings_help_section&msg=' . $msgID . '&cron=' . $hookName . '&debug=true' );
            }else{
                wp_redirect( 'admin.php?page=wc-settings&tab=err_settings&section=err_settings_help_section&msg=error&cron=' . $hookName . '&debug=true' );
            }

        }elseif( isset( $_GET[ 'action'] ) && $_GET[ 'action'] == 'err_manual_run_clear_all_emails' ){

            check_admin_referer( 'err-manual-' . $_GET[ 'action'] );

            if( $this->errExecuteCron( ERR_EMAIL_SENDER_CRON, 'unschedule-hook' ) ){
                wp_redirect( 'admin.php?page=wc-settings&tab=err_settings&section=err_settings_help_section&msg=3&debug=true' );
            }else{
                wp_redirect( 'admin.php?page=wc-settings&tab=err_settings&section=err_settings_help_section&msg=error&debug=true' );
            }
        }

        do_action( 'err_run_cron_manually' );

    }

    /**
    * Run cron manually
    *
    * @param string $hookName
    * @param string $action
    *
    * @return boolean
    * @since 1.0.0
    */
    public function errExecuteCron( $hookname, $action ) {

        $metaKey = '';
        $continue = false;

        if( $hookname == ERR_EMAIL_SENDER_CRON )
            $metaKey = ERR_EMAIL_SENDER_CRON_ARGS;
        elseif( $hookname == ERR_TIME_CONSIDERED_NOT_REVIEWED_CRON )
            $metaKey = ERR_TIME_CONSIDERED_NOT_REVIEWED_CRON_ARGS;

        $sqlArgs = array(
                            'post_type'     => ERR_CPT_NAME,
                            'post_status'   => '',
                            'meta_query'    => array(
                                            array(
                                                'key'     => $metaKey,
                                                'value'   => '',
                                                'compare' => '!=',
                                            )
                                        )
                        );

        $items = new WP_Query( $sqlArgs );
        
        if ( $items->have_posts() ) {

            $continue = true;

            while ( $items->have_posts() ) { $items->the_post();

                $reminderID = get_the_id();
                $args = get_post_meta( $reminderID, $metaKey, true );

                switch ( $action ) {
                    case 'manual-run':

                        if( $hookname == ERR_EMAIL_SENDER_CRON ){

                            // Emails can have multiple schedules so we need to loop
                            foreach ( $args as $key => $arg ) {

                                // Unschedule to avoid duplicate
                                $timestamp = wp_next_scheduled( $hookname, $arg );
                                wp_unschedule_event( $timestamp, $hookname, $arg );

                                // Running it now
                                wp_schedule_single_event( current_time( 'timestamp', true ) - 1, $hookname, $arg );

                            }

                        }else{

                            // Unschedule to avoid duplicate
                            $timestamp = wp_next_scheduled( $hookname, $args );
                            wp_unschedule_event( $timestamp, $hookname, $args );

                            // Running it now
                            wp_schedule_single_event( current_time( 'timestamp', true ) - 1, $hookname, $args );

                        }

                        break;
                    
                    case 'unschedule-hook':

                        if( $hookname == ERR_EMAIL_SENDER_CRON ){

                            foreach ( $args as $key => $arg ) {

                                // Unschedule
                                $timestamp = wp_next_scheduled( $hookname, $arg );
                                wp_unschedule_event( $timestamp, $hookname, $arg );

                                foreach ( $arg[ 1 ] as $emailKey => $email ) {

                                    $errStatus = get_post_meta( $reminderID, '_err_email_status', true );
                                    $errStatus[ $emailKey ][ 'status' ] = 'failed';
                                    $errStatus[ $emailKey ][ 'time_failed' ] = current_time( 'Y-m-d H:i:s', true );

                                    update_post_meta( $reminderID, '_err_email_status', $errStatus );
                                    
                                }
                            }

                        }else{

                            // Unschedule
                            $timestamp = wp_next_scheduled( $hookname, $args );
                            wp_unschedule_event( $timestamp, $hookname, $args );

                        }

                        break;

                    default:
                        break;
                }

                // Delete post meta
                delete_post_meta( $reminderID, $metaKey );

            }
        }

        do_action( 'err_settings_run_cron', $continue, $hookname, $metaKey );

        return $continue;

    }

    /**
     * Unschedule cron events attached on the Reminder Object ID.
     *
     * @param int $reminderID
     *
     * @return boolean
     * @since 1.0.0
     */
    public function errUnscheduleCronEventsByreminderID( $reminderID ){

        $emailSenderArgs  = get_post_meta( $reminderID, ERR_EMAIL_SENDER_CRON_ARGS, true );
        $notReviewedArgs  = get_post_meta( $reminderID, ERR_TIME_CONSIDERED_NOT_REVIEWED_CRON_ARGS, true );

        // For email sender cron
        if( ! empty( $emailSenderArgs ) ) {

            // Emails can have multiple schedules so we need to loop
            foreach ( $emailSenderArgs as $key => $args ) {

                // Unschedule to avoid duplicate
                $timestamp = wp_next_scheduled( ERR_EMAIL_SENDER_CRON, $args );
                wp_unschedule_event( $timestamp, ERR_EMAIL_SENDER_CRON, $args );

            }
        }

        // For cancelled reminder cron
        if( ! empty( $notReviewedArgs ) ) {

            // Unschedule to avoid duplicate
            $timestamp = wp_next_scheduled( ERR_TIME_CONSIDERED_NOT_REVIEWED_CRON, $notReviewedArgs );
            wp_unschedule_event( $timestamp, ERR_TIME_CONSIDERED_NOT_REVIEWED_CRON, $notReviewedArgs );

        }

        do_action( 'err_unschedule_cron_events_by_reminder_id', $reminderID, $emailSenderArgs, $notReviewedArgs );

    }

    /**
    * Add admin notices for debug options
    *
    * @since 1.0.0
    */
    public function errDebugAdminNotices() {

        if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'err_settings' &&
            isset( $_GET[ 'section' ] ) && $_GET[ 'section' ] == 'err_settings_help_section' &&
            isset( $_GET[ 'msg' ] ) && 
            isset( $_GET[ 'debug' ] ) && $_GET[ 'debug' ] == 'true' ) {

            $messages = array(
                            '1' => array(
                                        'status'    => 'updated',
                                        'msg'       => __( 'Successfully run email sender function.', 'easy-review-reminders' ) ),
                            '2' => array(
                                        'status'    => 'updated',
                                        'msg'       => __( 'Successfully run time considered not reviewed function.', 'easy-review-reminders' ) ),
                            '3' => array(
                                        'status'    => 'updated',
                                        'msg'       => __( 'All scheduled emails are removed successfully.', 'easy-review-reminders' ) ),
                            'error' => array(
                                        'status'    => 'error',
                                        'msg'       => __( 'Error! This action can\'t be completed, nothing to run.', 'easy-review-reminders' ) ),
                        );

            $messages   = apply_filters( 'err_debug_admin_notices', $messages );
            $msg        = $messages[ $_GET[ 'msg' ] ][ 'msg' ];
            $status     = $messages[ $_GET[ 'msg' ] ][ 'status' ];

            echo '<div id="message" class="' . $status . ' fade"><p>' . $msg . '</p></div>';

        }

        do_action( 'err_debug_admin_notices' );

    }

    /**
     * Schedule a unique cron single event to run the email sender function
     *
     * @param int $reminderID
     * @param array $emailKeys
     * @param bool $reschedule
     *
     * @since 1.0.0
     */
    public function errScheduleEmailEvent( $reminderID, $emailKeys = array(), $reschedule = false ){

        $proceed = apply_filters( 'err_proceed_email_scheduling', true, $reminderID );

        if( $proceed === false ) 
            return;

        $errEmailSchedules = get_option( ERR_EMAIL_SCHEDULES_OPTION );

        $email          = $this->errEmails->errGetReminderInfo( $reminderID, 'recipient_email' );
        $errArgs        = array();
        $errEmailStatus = array();

        foreach ( $errEmailSchedules as $key => $val ) {

            $errStatus      = array();
            $errOnlyInitial = apply_filters( 'err_only_initial_template', $key === 'initial' ? true : false );

            if( $errOnlyInitial ){

                // Skip scheduling this email key
                if( $reschedule === true && ! array_key_exists( $key, $emailKeys ) ) continue;

                $timeUnit                   = 'Days';
                $today                      = current_time( 'Y-m-d H:i:s', true );
                $daysAfterSuccessfulOrder   = $val[ 'days_after_successful_order' ];
                $daysAfterSuccessfulOrder   = '+ ' . $daysAfterSuccessfulOrder . ' ' . $timeUnit;
                $daysAfterSuccessfulOrder   = apply_filters( 'err_days_after_successful_order', $daysAfterSuccessfulOrder );
                $timeToExecute              = ! empty( $emailKeys[ $key ][ 'execTime' ] ) ? $emailKeys[ $key ][ 'execTime' ] : strtotime( $daysAfterSuccessfulOrder, strtotime( $today ) );
                $errStatus[ $key ]  = array(
                                            'subject'                       => $val[ 'subject' ],
                                            'days_after_successful_order'   => $val[ 'days_after_successful_order' ],
                                            'status'                        => 'pending',
                                        );

                $args = array( $reminderID, $errStatus, $email );

                array_push( $errArgs, $args );
                $errEmailStatus = array_replace( $errEmailStatus, $errStatus );

                // Schedule Email
                wp_schedule_single_event( $timeToExecute, ERR_EMAIL_SENDER_CRON, $args );
                
            }
        }

        // Store Email args into ERR CPT postmeta
        update_post_meta( $reminderID, ERR_EMAIL_SENDER_CRON_ARGS, $errArgs );

        // Store Email Status into ERR CPT postmeta
        update_post_meta( $reminderID, '_err_email_status', $errEmailStatus );

        do_action( 'err_schedule_email_event', $reminderID, $email, $args );

    }

    /**
     * Schedule Not Reviewed cron event after every or last email. Auto update time when theres multiple email sent.
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

        $proceed = apply_filters( 'err_proceed_schedule_not_reviewed_event', true, $reminderID );

        if( $proceed === false )
            return;

        if( $isSent === true ){

            $timeUnit                   = 'Days';
            $timeConsideredNotReviewed  = get_option( 'err_general_considered_not_reviewed' );
            $timeConsideredNotReviewed  = ! empty( $timeConsideredNotReviewed ) ? $timeConsideredNotReviewed . ' ' . $timeUnit : '30 ' . $timeUnit;
            $timeConsideredNotReviewed  = apply_filters( 'err_considered_not_reviewed_time', $timeConsideredNotReviewed, $reminderID, $timeUnit );
            $today                      = current_time( 'Y-m-d H:i:s', true );
            $timeToExecute              = strtotime( '+' . $timeConsideredNotReviewed, strtotime( $today ) );
            $args                       = array( $reminderID );
                
            // Remove schedule
            wp_clear_scheduled_hook( ERR_TIME_CONSIDERED_NOT_REVIEWED_CRON, $args );

            // Schedule cron
            wp_schedule_single_event( $timeToExecute, ERR_TIME_CONSIDERED_NOT_REVIEWED_CRON, $args );

            // Store Time Considered Not Reviewed args into ERR CPT postmeta
            update_post_meta( $reminderID, ERR_TIME_CONSIDERED_NOT_REVIEWED_CRON_ARGS, $args );

        }

        do_action( 'err_schedule_status_not_reviewed_event', $reminderID, $scheduleID, $errStatus, $email, $isSent );

    }
}