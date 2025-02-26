<?php
/**
 * Admin
 *
 * @package GamiPress\Conditional_Emails\Recipients\Admin
 * @since 1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Register custom CMB2 meta boxes
 *
 * @since  1.0.0
 */
function gamipress_conditional_emails_recipients_meta_boxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_gamipress_conditional_emails_recipients_';

    // Condition Configuration
    gamipress_add_meta_box(
        'gamipress-conditional-email-recipients',
        __( 'Recipients', 'gamipress-conditional-emails-recipients' ),
        'gamipress_conditional_emails',
        array(
            $prefix . 'recipients' => array(
                'name'              => __( 'Recipients', 'gamipress-conditional-emails-recipients' ),
                'desc'              => __( 'Choose additional recipients to send this email.', 'gamipress-conditional-emails-recipients' ),
                'type'              => 'advanced_select',
                'classes' 	        => 'gamipress-user-selector',
                'attributes' 	    => array(
                    'data-close-on-select' => 'false',
                ),
                'multiple'          => true,
                'options_cb'        => 'gamipress_options_cb_users'
            ),
            $prefix . 'only_recipients' => array(
                'name'              => __( 'Send only to recipients', 'gamipress-conditional-emails-recipients' ),
                'desc'              => __( 'Check this option to force email\'s send only to recipients and not to the user that meet the condition.', 'gamipress-conditional-emails-recipients' ),
                'type'              => 'checkbox',
                'classes' 	        => 'gamipress-switch',
            ),
        )
    );

}
add_action( 'cmb2_admin_init', 'gamipress_conditional_emails_recipients_meta_boxes' );
