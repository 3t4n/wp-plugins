<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class WPDuck_BAE_Block_All_Emails {

    public function __construct() {
        // Initialization moved to the main plugin file to avoid double initialization
    }

    public function init() {
        // Stop emails through WP's wp_mail function
        add_filter( 'wp_mail', array( $this, 'block_emails' ), 9999 );

        // Stop emails sent through PHP's mail function
        add_action( 'phpmailer_init', array( $this, 'block_phpmailer' ), 9999 );

        // Admin notice for email blocking
        add_action( 'admin_notices', array( $this, 'email_blocked_notice' ) );

        // Compatibility with more email plugins
        $this->add_email_plugin_support();
    }

    /**
     * Block emails sent via wp_mail by returning an empty array.
     *
     * @param array $email The email data.
     * @return array Modified email data.
     */
    public function block_emails( $email ) {
        return array(
            'to'          => '',
            'subject'     => '',
            'message'     => '',
            'headers'     => '',
            'attachments' => array(),
        );
    }

    /**
     * Block emails sent via PHPMailer by clearing all recipients and attachments.
     *
     * @param PHPMailer $phpmailer The PHPMailer instance.
     */
    public function block_phpmailer( $phpmailer ) {
        if ( ! is_object( $phpmailer ) ) {
            return;
        }

        $methods = array(
            'ClearAddresses',
            'ClearAllRecipients',
            'ClearAttachments',
            'ClearCustomHeaders',
            'ClearReplyTos',
        );

        foreach ( $methods as $method ) {
            if ( method_exists( $phpmailer, $method ) ) {
                $phpmailer->$method();
            }
        }
    }

    /**
     * Display an admin notice indicating that all emails are blocked.
     */
    public function email_blocked_notice() {
        if ( function_exists( 'current_user_can' ) && current_user_can( 'manage_options' ) ) {
            echo '<div class="notice notice-warning is-dismissible"><p>' . esc_html__( 'Block All Emails is active: All outgoing emails are blocked.', 'block-all-emails' ) . '</p></div>';
        }
    }

    /**
     * Add support for blocking emails sent via other email plugins.
     */
    public function add_email_plugin_support() {
        $filters = array(
            'aws_ses_send_raw_email',
            'wp_mail_smtp_custom_options',
            'swpsmtp_pre_send_email',
            'fluentsmtp_prepare_mail',
            'post_smtp_send_mail',
            'wp_mail_smtp_mailgun_mail_args',
            'wp_mail_smtp_sendgrid_send',
            'wp_sparkpost_maybe_send',
            'mailpoet_before_send_mail',
            'wp_smtp_sendinblue_send',
            'wp_mail_smtp_smtpcom_send',
            'wp_mail_smtp_gmail_send',
            'wpmandrill_send_mail',
            'pepipost_send_mail',
            'wp_mail_smtp_pepipost_send',
            'brevo_send_email',
        );

        foreach ( $filters as $filter ) {
            add_filter( $filter, '__return_false', 9999 );
        }
    }
}