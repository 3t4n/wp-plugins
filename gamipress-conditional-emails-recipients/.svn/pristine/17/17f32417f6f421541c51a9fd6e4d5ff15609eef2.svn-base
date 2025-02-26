<?php
/**
 * Filters
 *
 * @package GamiPress\Conditional_Emails\Recipients\Filters
 * @since 1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Filter to determine if a conditional email should be sent
 *
 * @since 1.0.0
 *
 * @param bool      $send_email
 * @param int       $user_id
 * @param int       $conditional_email_id
 * @param stdClass  $conditional_email
 *
 * @return bool
 */
function gamipress_conditional_emails_recipients_send_email( $send_email, $user_id, $conditional_email_id, $conditional_email ) {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_gamipress_conditional_emails_recipients_';

    // Shorthand
    $id = $conditional_email_id;

    $recipients = ct_get_object_meta( $id, $prefix . 'recipients' );

    if( is_array( $recipients ) && count( $recipients ) ) {

        // Parse subject and content (applying tags on conditional email user ID
        $subject = gamipress_conditional_emails_parse_subject( $user_id, $conditional_email );
        $content = gamipress_conditional_emails_parse_content( $user_id, $conditional_email );

        // Loop al custom recipients
        foreach( $recipients as $recipient_id ) {

            $recipient = get_userdata( $recipient_id );

            // Skip not registered users
            if( ! $recipient ) continue;

            // Send email to the recipient
            gamipress_send_email( $recipient->user_email, $subject, $content );

        }

    }

    $only_recipients = ct_get_object_meta( $id, $prefix . 'only_recipients', true );

    // Disable send email to original user if only recipients options was checked
    if( $only_recipients === 'on' )
        $send_email = false;

    return $send_email;

}
add_filter( 'gamipress_conditional_emails_send_email', 'gamipress_conditional_emails_recipients_send_email', 10, 4 );