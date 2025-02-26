<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ERR_Endpoint {

    private static $_instance;
    public $unsubscribeEndpoint;

    public static function getInstance(){
        if(!self::$_instance instanceof self)
            self::$_instance = new self;
        return self::$_instance;
    }

    public function __construct(){

        $this->unsubscribeEndpoint = apply_filters( 'err_unsubscribe_endpoint', 'err-unsubscribe' );

        do_action( 'err_endpoint_construct', $this->unsubscribeEndpoint );

    }

    /**
     * Initialize Endpoint
     *
     * @since 1.0.0
     */
    public function errEndpointInit(){

    	add_rewrite_endpoint( $this->unsubscribeEndpoint, EP_ALL );
        add_filter( 'template_include', array( $this, 'errIncludeUnsubscribeTemplate' ), 10, 1 );
        flush_rewrite_rules();

    }

    /**
     * Unsusbribe email, put them in the blacklist and change post status to Cancelled
     *
     * @since 1.0.0
     */
    public function errCatchEndpointVars(){

	    global $wpdb , $easy_review_reminders;

	    if( get_query_var( $this->unsubscribeEndpoint ) ){

	        if( isset( $_GET[ 'email' ] ) && isset( $_GET[ 'token' ] ) ){
                $token      = sanitize_text_field( $_GET[ 'token' ] );
                $errEmail   = sanitize_text_field( $_GET[ 'email' ] );
                $ref        = isset( $_GET[ 'ref' ] ) ? sanitize_text_field( $_GET[ 'ref' ] ) : 'no-email-ref';
                $reason     = 'unsubscribe';

	            $errReminderExist = $wpdb->get_results(
	                $wpdb->prepare(
	                        apply_filters( "err_unsubscribe_reminders_exist_query",
	                            "SELECT post_id FROM $wpdb->postmeta
	                             WHERE meta_key = '_err_reminder_hashed_id'
	                             AND meta_value = %s
	                             LIMIT 1
	                            " ),
	                        $token
	                    )
	            );

	            // Performs security check. Redirect if reminder is not found in the db otherwise continue with the unsubscribe
	            if( empty( $errReminderExist ) ){
	                wp_redirect( site_url(), 301 ); exit;
	            }

	            $email = get_post_meta( $errReminderExist[ 0 ]->post_id, '_err_email_address', true );
	            if( $errEmail != $email ){
	                wp_redirect( site_url(), 301 ); exit;
	            }

	            // Unsuscribe
	            if( $errEmail == $email && $token == md5( $errReminderExist[ 0 ]->post_id ) ){

                    $reminderID = $errReminderExist[ 0 ]->post_id;
	                $easy_review_reminders->errAddEmailToBlacklist( $email , $reason );

                    // Update all entry with similar emails with post_status to err-cancelled
	                $similarEmails = $wpdb->get_results(
	                                        $wpdb->prepare( "SELECT p.ID FROM $wpdb->posts as p, $wpdb->postmeta as m
	                                                            WHERE p.post_type = 'ERR_CPT_NAME'
	                                                                AND p.ID = m.post_id
	                                                                AND m.meta_key = '_err_email_address'
	                                                                AND m.meta_value = %s",
	                                                        sanitize_text_field( $email )
	                                            )
	                                    );

	                foreach ( $similarEmails as $key => $reminder ) {

	                    $reminder = array(
	                        'ID'            => $reminder->ID,
	                        'post_status'   => 'err-cancelled'
	                    );

	                    wp_update_post( $reminder );

	                }

                    do_action( 'err_unsubscribe', $reminderID, $token, $errEmail, $ref, $reason );

	            }
	        }
	    }
    }

    /**
     * Render unsubscribe template
     *
     * @param string $template
     *
     * @since 1.0.0
     */
    public function errIncludeUnsubscribeTemplate( $template ){

        if( get_query_var( $this->unsubscribeEndpoint ) ){

            if( file_exists( ERR_WC_THEME_DIR . 'err-unsubscribe.php' ) )

                return ERR_WC_THEME_DIR . 'err-unsubscribe.php';

            elseif( file_exists( ERR_DIR . 'templates/err-unsubscribe.php' ) )

                return ERR_DIR . 'templates/err-unsubscribe.php';

        }

        return $template;

    }

    /**
     * Endpoint filter request.
     *
     * @param array $vars
     *
     * @since 1.0.0
     */
    public function errEndpointFilterRequest( $vars ){

	    if( isset( $vars[ $this->unsubscribeEndpoint ] ) )
	    	$vars[ $this->unsubscribeEndpoint ] = true;

	    return $vars;

    }
}
